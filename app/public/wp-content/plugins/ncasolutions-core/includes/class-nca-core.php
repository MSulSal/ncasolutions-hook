<?php
/**
 * Core bootstrap class.
 */

if (! defined('ABSPATH')) {
    exit;
}

final class NCA_Core
{
    private const NONCE_ACTION = 'nca_core_page_fields';
    private const NONCE_NAME = 'nca_core_page_fields_nonce';
    private const SETUP_OPTION = 'nca_core_setup_version';

    public static function boot(): void
    {
        add_action('init', [self::class, 'register_image_sizes']);
        add_action('add_meta_boxes', [self::class, 'register_meta_boxes'], 10, 2);
        add_action('save_post_page', [self::class, 'save_page_meta']);
        add_action('admin_init', [self::class, 'maybe_run_setup']);
    }

    public static function activate(): void
    {
        self::run_setup();
    }

    public static function register_image_sizes(): void
    {
        add_image_size('nca-team-card', 480, 560, true);
        add_image_size('nca-service-card', 640, 400, true);
    }

    public static function register_meta_boxes(string $post_type, WP_Post $post): void
    {
        if ('page' !== $post_type) {
            return;
        }

        foreach (self::page_config() as $slug => $config) {
            if ($post->post_name !== $slug) {
                continue;
            }

            add_meta_box(
                'nca_core_page_' . $slug,
                esc_html($config['label']) . ' Fields',
                [self::class, 'render_meta_box'],
                'page',
                'normal',
                'high',
                [
                    'slug'   => $slug,
                    'fields' => $config['fields'],
                ]
            );
        }
    }

    public static function render_meta_box(WP_Post $post, array $box): void
    {
        $args = $box['args'] ?? [];
        $fields = $args['fields'] ?? [];

        wp_nonce_field(self::NONCE_ACTION, self::NONCE_NAME);

        echo '<p>Edit text, button labels/links, and image URLs for this page template.</p>';

        foreach ($fields as $field) {
            $key = $field['key'];
            $label = $field['label'];
            $type = $field['type'] ?? 'text';
            $rows = isset($field['rows']) ? (int) $field['rows'] : 4;
            $value = get_post_meta($post->ID, $key, true);
            $description = $field['description'] ?? '';

            echo '<div style="margin-bottom:16px;">';
            echo '<label style="display:block;font-weight:600;margin-bottom:6px;" for="' . esc_attr($key) . '">' . esc_html($label) . '</label>';

            if ('textarea' === $type) {
                echo '<textarea id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" rows="' . esc_attr((string) $rows) . '" style="width:100%;font-family:monospace;">' . esc_textarea((string) $value) . '</textarea>';
            } elseif ('url' === $type) {
                echo '<input id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" type="url" value="' . esc_attr((string) $value) . '" style="width:100%;">';
            } else {
                echo '<input id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" type="text" value="' . esc_attr((string) $value) . '" style="width:100%;">';
            }

            if (! empty($description)) {
                echo '<p style="margin:4px 0 0;color:#666;">' . esc_html($description) . '</p>';
            }
            echo '</div>';
        }
    }

    public static function save_page_meta(int $post_id): void
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (! current_user_can('edit_post', $post_id)) {
            return;
        }

        $nonce = $_POST[self::NONCE_NAME] ?? '';
        if (! is_string($nonce) || ! wp_verify_nonce($nonce, self::NONCE_ACTION)) {
            return;
        }

        $slug = get_post_field('post_name', $post_id);
        if (! is_string($slug) || ! isset(self::page_config()[$slug])) {
            return;
        }

        $fields = self::page_config()[$slug]['fields'];
        foreach ($fields as $field) {
            $key = $field['key'];
            $type = $field['type'] ?? 'text';
            $raw = $_POST[$key] ?? null;

            if (null === $raw) {
                delete_post_meta($post_id, $key);
                continue;
            }

            if (! is_string($raw)) {
                continue;
            }

            $value = trim(wp_unslash($raw));
            if ('' === $value) {
                delete_post_meta($post_id, $key);
                continue;
            }

            if ('url' === $type) {
                $value = esc_url_raw($value);
                if ('' === $value) {
                    delete_post_meta($post_id, $key);
                    continue;
                }
            } else {
                $value = sanitize_textarea_field($value);
            }

            update_post_meta($post_id, $key, $value);
        }
    }

    public static function maybe_run_setup(): void
    {
        if (! current_user_can('manage_options')) {
            return;
        }

        if (! self::setup_required()) {
            return;
        }

        self::run_setup();
    }

    private static function page_config(): array
    {
        return [
            'home' => [
                'label'  => 'Home',
                'fields' => [
                    ['key' => 'home_hero_title', 'label' => 'Hero Title (use \\n for line breaks)', 'type' => 'textarea', 'rows' => 3],
                    ['key' => 'home_hero_accent', 'label' => 'Hero Accent Text'],
                    ['key' => 'home_hero_intro', 'label' => 'Hero Intro', 'type' => 'textarea', 'rows' => 4],
                    ['key' => 'home_hero_button_label', 'label' => 'Hero Button Label'],
                    ['key' => 'home_hero_button_url', 'label' => 'Hero Button URL', 'type' => 'url'],
                    ['key' => 'home_hero_image', 'label' => 'Hero Image URL', 'type' => 'url'],
                    ['key' => 'home_behavior_title', 'label' => 'Behavior Title (use \\n for line breaks)', 'type' => 'textarea', 'rows' => 3],
                    ['key' => 'home_behavior_intro', 'label' => 'Behavior Intro', 'type' => 'textarea', 'rows' => 3],
                    ['key' => 'home_behavior_cards_json', 'label' => 'Behavior Cards JSON', 'type' => 'textarea', 'rows' => 9, 'description' => '[{"title":"IMPACT","text":"..."}, ...]'],
                    ['key' => 'home_approach_title', 'label' => 'Approach Title'],
                    ['key' => 'home_approach_text', 'label' => 'Approach Text (use \\n for line breaks)', 'type' => 'textarea', 'rows' => 7],
                    ['key' => 'home_approach_button_label', 'label' => 'Approach Button Label'],
                    ['key' => 'home_approach_button_url', 'label' => 'Approach Button URL', 'type' => 'url'],
                    ['key' => 'home_approach_image', 'label' => 'Approach Image URL', 'type' => 'url'],
                    ['key' => 'home_services_title', 'label' => 'Services Section Title'],
                    ['key' => 'home_services_intro', 'label' => 'Services Section Intro', 'type' => 'textarea', 'rows' => 4],
                    ['key' => 'home_services_button_label', 'label' => 'Services Button Label'],
                    ['key' => 'home_services_button_url', 'label' => 'Services Button URL', 'type' => 'url'],
                    ['key' => 'home_service_cards_json', 'label' => 'Service Cards JSON', 'type' => 'textarea', 'rows' => 7, 'description' => '[{"title":"LEADERSHIP"}, ...]'],
                    ['key' => 'home_strength_title', 'label' => 'Strength Title (use \\n for line breaks)', 'type' => 'textarea', 'rows' => 3],
                    ['key' => 'home_strength_text', 'label' => 'Strength Text (use \\n for line breaks)', 'type' => 'textarea', 'rows' => 8],
                    ['key' => 'home_cta_title', 'label' => 'CTA Title'],
                    ['key' => 'home_cta_text', 'label' => 'CTA Text'],
                    ['key' => 'home_cta_button_label', 'label' => 'CTA Button Label'],
                    ['key' => 'home_cta_button_url', 'label' => 'CTA Button URL', 'type' => 'url'],
                ],
            ],
            'our-team' => [
                'label'  => 'Our Team',
                'fields' => [
                    ['key' => 'team_hero_kicker', 'label' => 'Hero Kicker'],
                    ['key' => 'team_hero_title', 'label' => 'Hero Title'],
                    ['key' => 'team_hero_accent', 'label' => 'Hero Accent Text'],
                    ['key' => 'team_hero_intro_1', 'label' => 'Hero Intro Paragraph 1', 'type' => 'textarea', 'rows' => 3],
                    ['key' => 'team_hero_intro_2', 'label' => 'Hero Intro Paragraph 2', 'type' => 'textarea', 'rows' => 3],
                    ['key' => 'team_hero_image', 'label' => 'Hero Image URL', 'type' => 'url'],
                    ['key' => 'team_voice_title', 'label' => 'Voice Title'],
                    ['key' => 'team_voice_subhead', 'label' => 'Voice Subhead (use \\n for line breaks)', 'type' => 'textarea', 'rows' => 4],
                    ['key' => 'team_voice_text', 'label' => 'Voice Text', 'type' => 'textarea', 'rows' => 5],
                    ['key' => 'team_vision_title', 'label' => 'Vision Title'],
                    ['key' => 'team_vision_tagline', 'label' => 'Vision Tagline'],
                    ['key' => 'team_values_cards_json', 'label' => 'Values Cards JSON', 'type' => 'textarea', 'rows' => 9, 'description' => '[{"title":"INNOVATION","text":"..."}, ...]'],
                    ['key' => 'team_members_title', 'label' => 'Members Section Title'],
                    ['key' => 'team_members_intro', 'label' => 'Members Section Intro', 'type' => 'textarea', 'rows' => 3],
                    ['key' => 'team_members_json', 'label' => 'Team Members JSON', 'type' => 'textarea', 'rows' => 12, 'description' => '[{"name":"Nicole Davis","role":"Founder & Managing Partner","image":"https://..."}, ...]'],
                    ['key' => 'team_quote', 'label' => 'Closing Quote', 'type' => 'textarea', 'rows' => 3],
                ],
            ],
            'services' => [
                'label'  => 'Services',
                'fields' => [
                    ['key' => 'services_hero_title', 'label' => 'Hero Title'],
                    ['key' => 'services_hero_intro', 'label' => 'Hero Intro', 'type' => 'textarea', 'rows' => 4],
                    ['key' => 'services_hero_image', 'label' => 'Hero Image URL', 'type' => 'url'],
                    ['key' => 'services_what_title', 'label' => 'What We Do Title'],
                    ['key' => 'services_what_intro', 'label' => 'What We Do Intro', 'type' => 'textarea', 'rows' => 4],
                    ['key' => 'services_cards_json', 'label' => 'Service Cards JSON', 'type' => 'textarea', 'rows' => 12, 'description' => '[{"title":"LEADERSHIP","text":"...","link_label":"LEARN MORE","link_url":"#"}, ...]'],
                    ['key' => 'services_approach_kicker', 'label' => 'Approach Kicker'],
                    ['key' => 'services_approach_title', 'label' => 'Approach Title (use \\n for line breaks)', 'type' => 'textarea', 'rows' => 3],
                    ['key' => 'services_approach_text', 'label' => 'Approach Text (use \\n for line breaks)', 'type' => 'textarea', 'rows' => 7],
                    ['key' => 'services_approach_button_label', 'label' => 'Approach Button Label'],
                    ['key' => 'services_approach_button_url', 'label' => 'Approach Button URL', 'type' => 'url'],
                    ['key' => 'services_approach_image', 'label' => 'Approach Image URL', 'type' => 'url'],
                    ['key' => 'services_commit_kicker', 'label' => 'Commitment Kicker'],
                    ['key' => 'services_commit_title', 'label' => 'Commitment Title'],
                    ['key' => 'services_commit_text', 'label' => 'Commitment Text (use \\n for line breaks)', 'type' => 'textarea', 'rows' => 4],
                    ['key' => 'services_commit_button_label', 'label' => 'Commitment Button Label'],
                    ['key' => 'services_commit_button_url', 'label' => 'Commitment Button URL', 'type' => 'url'],
                    ['key' => 'services_commit_image', 'label' => 'Commitment Image URL', 'type' => 'url'],
                ],
            ],
        ];
    }

    private static function ensure_pages_exist(): void
    {
        $pages = [
            ['title' => 'Home', 'slug' => 'home'],
            ['title' => 'Our Team', 'slug' => 'our-team', 'template' => 'page-our-team.php'],
            ['title' => 'Services', 'slug' => 'services', 'template' => 'page-services.php'],
        ];

        foreach ($pages as $page) {
            $existing = get_page_by_path($page['slug'], OBJECT, 'page');

            if ($existing instanceof WP_Post) {
                $page_id = $existing->ID;

                if ('publish' !== $existing->post_status) {
                    wp_update_post([
                        'ID'          => $page_id,
                        'post_status' => 'publish',
                    ]);
                }
            } else {
                $page_id = wp_insert_post([
                    'post_type'   => 'page',
                    'post_status' => 'publish',
                    'post_title'  => $page['title'],
                    'post_name'   => $page['slug'],
                ]);
            }

            if (! is_int($page_id) || $page_id <= 0) {
                continue;
            }

            if (! empty($page['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page['template']);
            }
        }
    }

    private static function ensure_primary_menu(): void
    {
        $menu_name = 'Primary Menu';
        $menu = wp_get_nav_menu_object($menu_name);

        $menu_id = $menu ? (int) $menu->term_id : (int) wp_create_nav_menu($menu_name);
        if ($menu_id <= 0) {
            return;
        }

        $services_page = get_page_by_path('services', OBJECT, 'page');
        $team_page = get_page_by_path('our-team', OBJECT, 'page');

        $items = [
            ['title' => 'Services', 'url' => $services_page instanceof WP_Post ? get_permalink($services_page) : home_url('/services/')],
            ['title' => 'Industries', 'url' => home_url('/#')],
            ['title' => 'Our Insights', 'url' => home_url('/#')],
            ['title' => 'Our Team', 'url' => $team_page instanceof WP_Post ? get_permalink($team_page) : home_url('/our-team/')],
            ['title' => "LET'S CONNECT", 'url' => $services_page instanceof WP_Post ? get_permalink($services_page) : home_url('/services/')],
        ];

        $existing_urls = [];
        $menu_items = wp_get_nav_menu_items($menu_id);
        if (is_array($menu_items)) {
            foreach ($menu_items as $item) {
                if (isset($item->url) && is_string($item->url)) {
                    $existing_urls[] = untrailingslashit($item->url);
                }
            }
        }

        $position = 1;

        foreach ($items as $item) {
            $normalized = untrailingslashit((string) $item['url']);
            if (in_array($normalized, $existing_urls, true)) {
                continue;
            }

            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title'    => $item['title'],
                'menu-item-url'      => $item['url'],
                'menu-item-type'     => 'custom',
                'menu-item-status'   => 'publish',
                'menu-item-position' => $position++,
            ]);
        }

        $locations = get_theme_mod('nav_menu_locations', []);
        if (! is_array($locations)) {
            $locations = [];
        }
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }

    private static function assign_front_page(): void
    {
        $home_page = get_page_by_path('home', OBJECT, 'page');
        if (! $home_page instanceof WP_Post) {
            return;
        }

        update_option('show_on_front', 'page');
        update_option('page_on_front', $home_page->ID);
    }

    private static function run_setup(): void
    {
        self::ensure_pages_exist();
        self::ensure_primary_menu();
        self::assign_front_page();
        update_option(self::SETUP_OPTION, NCA_CORE_VERSION);
    }

    private static function setup_required(): bool
    {
        $version = get_option(self::SETUP_OPTION);
        if (! is_string($version) || version_compare($version, NCA_CORE_VERSION, '<')) {
            return true;
        }

        foreach (['home', 'our-team', 'services'] as $slug) {
            $page = get_page_by_path($slug, OBJECT, 'page');
            if (! $page instanceof WP_Post) {
                return true;
            }
            if ('publish' !== $page->post_status) {
                return true;
            }
        }

        $home_page = get_page_by_path('home', OBJECT, 'page');
        if (! $home_page instanceof WP_Post) {
            return true;
        }

        if ('page' !== get_option('show_on_front')) {
            return true;
        }

        if ((int) get_option('page_on_front') !== (int) $home_page->ID) {
            return true;
        }

        $locations = get_theme_mod('nav_menu_locations', []);
        if (! is_array($locations) || empty($locations['primary'])) {
            return true;
        }

        return false;
    }
}

if (! function_exists('nca_core_get_page_field')) {
    function nca_core_get_page_field(int $post_id, string $key, string $default = ''): string
    {
        $value = get_post_meta($post_id, $key, true);
        if (! is_string($value) || '' === trim($value)) {
            return $default;
        }

        return $value;
    }
}

if (! function_exists('nca_core_get_page_json')) {
    function nca_core_get_page_json(int $post_id, string $key, array $default = []): array
    {
        $value = get_post_meta($post_id, $key, true);
        if (! is_string($value) || '' === trim($value)) {
            return $default;
        }

        $decoded = json_decode($value, true);
        return is_array($decoded) ? $decoded : $default;
    }
}
