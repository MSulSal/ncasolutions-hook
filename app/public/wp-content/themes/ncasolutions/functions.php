<?php
/**
 * Theme bootstrap.
 *
 * @package ncasolutions
 */

if (! defined('NCA_THEME_VERSION')) {
    define('NCA_THEME_VERSION', '1.0.0');
}

function nca_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 220,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    register_nav_menus([
        'primary' => __('Primary Menu', 'ncasolutions'),
        'footer'  => __('Footer Menu', 'ncasolutions'),
    ]);

    add_image_size('nca-hero-wide', 1920, 1080, true);
    add_image_size('nca-team-card', 480, 560, true);
    add_image_size('nca-section-wide', 1400, 900, true);

    add_editor_style('assets/css/editor-style.css');
}
add_action('after_setup_theme', 'nca_theme_setup');

function nca_enqueue_assets(): void
{
    $theme_version = wp_get_theme()->get('Version') ?: NCA_THEME_VERSION;

    wp_enqueue_style(
        'nca-fonts',
        get_template_directory_uri() . '/assets/css/fonts.css',
        [],
        $theme_version
    );

    wp_enqueue_style(
        'nca-base',
        get_template_directory_uri() . '/assets/css/base.css',
        ['nca-fonts'],
        $theme_version
    );

    wp_enqueue_style(
        'nca-layout',
        get_template_directory_uri() . '/assets/css/layout.css',
        ['nca-base'],
        $theme_version
    );

    wp_enqueue_style(
        'nca-pages',
        get_template_directory_uri() . '/assets/css/pages.css',
        ['nca-layout'],
        $theme_version
    );

    wp_enqueue_script(
        'nca-site',
        get_template_directory_uri() . '/assets/js/site.js',
        [],
        $theme_version,
        true
    );
}
add_action('wp_enqueue_scripts', 'nca_enqueue_assets');

function nca_body_classes(array $classes): array
{
    if (is_page()) {
        $page = get_queried_object();
        if ($page instanceof WP_Post && ! empty($page->post_name)) {
            $classes[] = 'page-' . sanitize_html_class($page->post_name);
        }
    }

    return $classes;
}
add_filter('body_class', 'nca_body_classes');

function nca_elementor_compatibility(): void
{
    if (! did_action('elementor/loaded')) {
        return;
    }

    // Keep page layouts simple so Elementor can take over content areas later.
    remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'nca_elementor_compatibility', 20);
