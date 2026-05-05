<?php
/**
 * Template for the Our Team page.
 *
 * @package ncasolutions
 */

get_header();

$theme_uri = get_template_directory_uri();
$post_id = get_the_ID();

$members_default = [
    ['name' => 'Nicole Davis', 'role' => 'Founder & Managing Partner', 'image' => $theme_uri . '/assets/images/team-1.png'],
    ['name' => 'Jessica Martinez', 'role' => 'Partner', 'image' => $theme_uri . '/assets/images/team-2.png'],
    ['name' => 'Aisha Thompson', 'role' => 'Partner', 'image' => $theme_uri . '/assets/images/team-3.png'],
    ['name' => 'Lauren Kim', 'role' => 'Director', 'image' => $theme_uri . '/assets/images/team-4.png'],
    ['name' => 'Michael Anderson', 'role' => 'Director', 'image' => $theme_uri . '/assets/images/team-5.png'],
    ['name' => 'Samantha Lee', 'role' => 'Senior Consultant', 'image' => $theme_uri . '/assets/images/team-6.png'],
    ['name' => 'David Park', 'role' => 'Senior Consultant', 'image' => $theme_uri . '/assets/images/team-7.png'],
    ['name' => 'Brianna Cole', 'role' => 'Consultant', 'image' => $theme_uri . '/assets/images/team-8.png'],
    ['name' => 'Marcus Johnson', 'role' => 'Consultant', 'image' => $theme_uri . '/assets/images/team-9.png'],
    ['name' => 'Emily Roberts', 'role' => 'Consultant', 'image' => $theme_uri . '/assets/images/team-10.png'],
];

$values_default = [
    ['title' => 'INNOVATION', 'text' => 'We challenge the status quo and design thoughtful solutions that create lasting value.'],
    ['title' => 'INCLUSION', 'text' => 'We embrace diverse perspectives and build environments where everyone thrives.'],
    ['title' => 'IMPACT', 'text' => 'We deliver measurable results that elevate performance and drive meaningful change.'],
];

$hero_kicker = nca_core_get_page_field($post_id, 'team_hero_kicker', 'ABOUT US');
$hero_title = nca_core_get_page_field($post_id, 'team_hero_title', 'People. Perspective.');
$hero_accent = nca_core_get_page_field($post_id, 'team_hero_accent', 'Performance.');
$hero_intro_1 = nca_core_get_page_field($post_id, 'team_hero_intro_1', 'NCA is a management consulting firm that partners with organizations to unlock performance through people.');
$hero_intro_2 = nca_core_get_page_field($post_id, 'team_hero_intro_2', 'We blend data, behavioral science, and real-world experience to design solutions that are both strategic and actionable.');
$hero_image = nca_core_get_page_field($post_id, 'team_hero_image', $theme_uri . '/assets/images/office-hero.png');

$voice_title = nca_core_get_page_field($post_id, 'team_voice_title', 'Our voice');
$voice_subhead = nca_core_get_page_field($post_id, 'team_voice_subhead', "We speak with confidence.\nWe lead with vision,\ngrounded in diversity.");
$voice_text = nca_core_get_page_field($post_id, 'team_voice_text', 'Our messaging embodies three pillars: innovation, inclusion, and impact, reflecting who we are and the unique perspectives that make us stronger. Every word we choose moves us forward. Period.');
$vision_title = nca_core_get_page_field($post_id, 'team_vision_title', 'Our vision');
$vision_tagline = nca_core_get_page_field($post_id, 'team_vision_tagline', 'Bold. Authentic. Forward.');

$values_cards = nca_core_get_page_json($post_id, 'team_values_cards_json', $values_default);
$members = nca_core_get_page_json($post_id, 'team_members_json', $members_default);

$members_title = nca_core_get_page_field($post_id, 'team_members_title', 'Our team');
$members_intro = nca_core_get_page_field($post_id, 'team_members_intro', 'A diverse group of thinkers, doers, and partners&#151;united by a shared commitment to people and performance.');
$quote = nca_core_get_page_field($post_id, 'team_quote', 'We partner with organizations to unlock human potential and drive performance that lasts.');
?>
<main id="primary" class="site-main">
    <article class="nca-team-page">
        <section class="nca-team-hero">
            <img src="<?php echo esc_url($hero_image); ?>" alt="" class="nca-team-hero__image">
            <div class="nca-team-hero__overlay">
                <p class="nca-kicker"><?php echo esc_html($hero_kicker); ?></p>
                <h1 class="nca-title-xl"><?php echo esc_html($hero_title); ?><br><span class="nca-title-accent"><?php echo esc_html($hero_accent); ?></span></h1>
                <div class="nca-rule"></div>
                <p class="nca-text-md"><?php echo esc_html($hero_intro_1); ?></p>
                <p class="nca-text-md"><?php echo esc_html($hero_intro_2); ?></p>
            </div>
        </section>

        <section class="nca-team-values nca-section">
            <div class="nca-team-values__grid">
                <div class="nca-team-values__voice">
                    <h2 class="nca-title-md"><?php echo esc_html($voice_title); ?></h2>
                    <div class="nca-rule"></div>
                    <p class="nca-title-md nca-team-values__subhead"><?php echo nl2br(esc_html($voice_subhead)); ?></p>
                    <p class="nca-text-md"><?php echo esc_html($voice_text); ?></p>
                </div>

                <div class="nca-team-values__vision">
                    <h2 class="nca-title-md"><?php echo esc_html($vision_title); ?></h2>
                    <div class="nca-rule"></div>
                    <p class="nca-title-md nca-title-accent"><?php echo esc_html($vision_tagline); ?></p>

                    <div class="nca-team-values__cards">
                        <article class="nca-team-value-card">
                            <div class="nca-team-value-card__icon" aria-hidden="true">
                                <svg viewBox="0 0 64 64"><path d="M32 9c-9.9 0-18 7.8-18 17.4 0 6.1 3.2 11.5 8 14.6V51h20V41c4.8-3.1 8-8.5 8-14.6C50 16.8 41.9 9 32 9zM25 57h14M27 62h10" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </div>
                            <h3><?php echo esc_html($values_cards[0]['title'] ?? 'INNOVATION'); ?></h3>
                            <p><?php echo esc_html($values_cards[0]['text'] ?? ''); ?></p>
                        </article>
                        <article class="nca-team-value-card">
                            <div class="nca-team-value-card__icon" aria-hidden="true">
                                <svg viewBox="0 0 64 64"><circle cx="22" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="40" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M12 48c0-8 7-14 16-14s16 6 16 14M30 48c0-8 7-14 16-14 1.7 0 3.4.2 5 .7" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round"></path></svg>
                            </div>
                            <h3><?php echo esc_html($values_cards[1]['title'] ?? 'INCLUSION'); ?></h3>
                            <p><?php echo esc_html($values_cards[1]['text'] ?? ''); ?></p>
                        </article>
                        <article class="nca-team-value-card">
                            <div class="nca-team-value-card__icon" aria-hidden="true">
                                <svg viewBox="0 0 64 64"><path d="M10 49h10V31H10zM27 49h10V21H27zM44 49h10V13H44z" fill="none" stroke="currentColor" stroke-width="2.6"></path></svg>
                            </div>
                            <h3><?php echo esc_html($values_cards[2]['title'] ?? 'IMPACT'); ?></h3>
                            <p><?php echo esc_html($values_cards[2]['text'] ?? ''); ?></p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="nca-team-members nca-section">
            <div class="nca-team-members__head">
                <h2 class="nca-title-md"><?php echo esc_html($members_title); ?></h2>
                <div class="nca-rule"></div>
                <p class="nca-text-md"><?php echo wp_kses_post($members_intro); ?></p>
            </div>

            <div class="nca-team-members__grid">
                <?php foreach ($members as $member) : ?>
                    <article class="nca-team-member">
                        <div class="nca-team-member__image-wrap">
                            <img src="<?php echo esc_url((string) ($member['image'] ?? '')); ?>" alt="<?php echo esc_attr((string) ($member['name'] ?? '')); ?>" class="nca-team-member__image">
                        </div>
                        <h3><?php echo esc_html((string) ($member['name'] ?? '')); ?></h3>
                        <p><?php echo esc_html((string) ($member['role'] ?? '')); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="nca-team-quote">
            <div class="nca-team-quote__inner">
                <h2 class="nca-title-md"><?php echo esc_html($quote); ?></h2>
                <div class="nca-rule"></div>
            </div>
        </section>
    </article>
</main>
<?php
get_footer();
