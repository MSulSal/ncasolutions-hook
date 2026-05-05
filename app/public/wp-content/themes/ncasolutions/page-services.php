<?php
/**
 * Template for the Services page.
 *
 * @package ncasolutions
 */

get_header();

$theme_uri = get_template_directory_uri();
$post_id = get_the_ID();

$defaults = [
    'hero_title'             => 'Our services',
    'hero_intro'             => 'We partner with organizations to unlock performance through people. Our services combine behavioral insight with practical execution to develop people, shape behavior, and drive lasting results.',
    'hero_image'             => $theme_uri . '/assets/images/office-hero.png',
    'what_title'             => 'What we do',
    'what_intro'             => 'Our services are built to move organizations forward&#151;developing people, shaping behavior, and driving performance at every level.',
    'approach_kicker'        => 'OUR APPROACH',
    'approach_title'         => "Insight. Execution.\nImpact.",
    'approach_text'          => "We partner closely with our clients to understand the human dynamics behind their challenges.\nOur approach blends data, behavioral science, and real-world experience to design solutions that are both strategic and actionable.\nWe don't just advise; we work alongside teams to implement, adapt, and sustain change.",
    'approach_button_label'  => 'LEARN MORE ABOUT OUR APPROACH',
    'approach_button_url'    => home_url('/services/'),
    'approach_image'         => $theme_uri . '/assets/images/services-approach.png',
    'commit_kicker'          => 'OUR COMMITMENT',
    'commit_title'           => 'People are the path to performance.',
    'commit_text'            => "Behavior drives performance, and performance delivers results.\nAt NCA, we focus on what powers it all: people.",
    'commit_button_label'    => "LET'S CONNECT",
    'commit_button_url'      => home_url('/services/'),
    'commit_image'           => $theme_uri . '/assets/images/services-commitment.png',
];

$cards_default = [
    ['title' => 'LEADERSHIP', 'text' => 'We align leadership and teams around clear priorities and shared purpose.', 'link_label' => 'LEARN MORE', 'link_url' => '#'],
    ['title' => 'DEVELOPMENT', 'text' => 'We build capability and confidence to help people and teams reach their full potential.', 'link_label' => 'LEARN MORE', 'link_url' => '#'],
    ['title' => 'CHANGE MANAGEMENT', 'text' => 'We guide organizations through change with clarity, engagement, and momentum.', 'link_label' => 'LEARN MORE', 'link_url' => '#'],
    ['title' => 'CUSTOMER EXPERIENCE', 'text' => 'We design and elevate experiences that strengthen loyalty and drive value.', 'link_label' => 'LEARN MORE', 'link_url' => '#'],
    ['title' => 'INCLUSION', 'text' => 'We create inclusive cultures where people feel they belong and performance thrives.', 'link_label' => 'LEARN MORE', 'link_url' => '#'],
];

$hero_title = nca_core_get_page_field($post_id, 'services_hero_title', $defaults['hero_title']);
$hero_intro = nca_core_get_page_field($post_id, 'services_hero_intro', $defaults['hero_intro']);
$hero_image = nca_core_get_page_field($post_id, 'services_hero_image', $defaults['hero_image']);
$what_title = nca_core_get_page_field($post_id, 'services_what_title', $defaults['what_title']);
$what_intro = nca_core_get_page_field($post_id, 'services_what_intro', $defaults['what_intro']);
$cards = nca_core_get_page_json($post_id, 'services_cards_json', $cards_default);

$approach_kicker = nca_core_get_page_field($post_id, 'services_approach_kicker', $defaults['approach_kicker']);
$approach_title = nca_core_get_page_field($post_id, 'services_approach_title', $defaults['approach_title']);
$approach_text = nca_core_get_page_field($post_id, 'services_approach_text', $defaults['approach_text']);
$approach_button_label = nca_core_get_page_field($post_id, 'services_approach_button_label', $defaults['approach_button_label']);
$approach_button_url = nca_core_get_page_field($post_id, 'services_approach_button_url', $defaults['approach_button_url']);
$approach_image = nca_core_get_page_field($post_id, 'services_approach_image', $defaults['approach_image']);

$commit_kicker = nca_core_get_page_field($post_id, 'services_commit_kicker', $defaults['commit_kicker']);
$commit_title = nca_core_get_page_field($post_id, 'services_commit_title', $defaults['commit_title']);
$commit_text = nca_core_get_page_field($post_id, 'services_commit_text', $defaults['commit_text']);
$commit_button_label = nca_core_get_page_field($post_id, 'services_commit_button_label', $defaults['commit_button_label']);
$commit_button_url = nca_core_get_page_field($post_id, 'services_commit_button_url', $defaults['commit_button_url']);
$commit_image = nca_core_get_page_field($post_id, 'services_commit_image', $defaults['commit_image']);
?>
<main id="primary" class="site-main">
    <article class="nca-services-page">
        <section class="nca-services-hero">
            <img src="<?php echo esc_url($hero_image); ?>" alt="" class="nca-services-hero__image">
            <div class="nca-services-hero__overlay">
                <h1 class="nca-title-xl"><?php echo esc_html($hero_title); ?></h1>
                <div class="nca-rule"></div>
                <p class="nca-text-md"><?php echo esc_html($hero_intro); ?></p>
            </div>
        </section>

        <section class="nca-services-what nca-section">
            <div class="nca-services-what__head">
                <h2 class="nca-title-lg"><?php echo esc_html($what_title); ?></h2>
                <p class="nca-text-md"><?php echo wp_kses_post($what_intro); ?></p>
                <div class="nca-rule"></div>
            </div>

            <div class="nca-services-what__cards nca-card-rail">
                <article class="nca-services-card">
                    <div class="nca-services-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><circle cx="32" cy="20" r="9" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M13 49c0-10.4 8.4-18.8 19-18.8S51 38.6 51 49" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round"></path></svg></div>
                    <h3><?php echo esc_html($cards[0]['title'] ?? 'LEADERSHIP'); ?></h3>
                    <p><?php echo esc_html($cards[0]['text'] ?? ''); ?></p>
                    <a href="<?php echo esc_url((string) ($cards[0]['link_url'] ?? '#')); ?>" class="nca-services-card__link"><?php echo esc_html((string) ($cards[0]['link_label'] ?? 'LEARN MORE')); ?> <span class="nca-button__arrow">&rarr;</span></a>
                </article>

                <article class="nca-services-card">
                    <div class="nca-services-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><path d="M11 45 24 31l10 10 18-19M46 22h6v6" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
                    <h3><?php echo esc_html($cards[1]['title'] ?? 'DEVELOPMENT'); ?></h3>
                    <p><?php echo esc_html($cards[1]['text'] ?? ''); ?></p>
                    <a href="<?php echo esc_url((string) ($cards[1]['link_url'] ?? '#')); ?>" class="nca-services-card__link"><?php echo esc_html((string) ($cards[1]['link_label'] ?? 'LEARN MORE')); ?> <span class="nca-button__arrow">&rarr;</span></a>
                </article>

                <article class="nca-services-card">
                    <div class="nca-services-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><path d="M14 26a19 19 0 0 1 11-12l4-1M50 38a19 19 0 0 1-11 12l-4 1M14 26l1-8 8 1M50 38l-1 8-8-1M50 26a19 19 0 0 0-11-12M14 38a19 19 0 0 0 11 12" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
                    <h3><?php echo esc_html($cards[2]['title'] ?? 'CHANGE MANAGEMENT'); ?></h3>
                    <p><?php echo esc_html($cards[2]['text'] ?? ''); ?></p>
                    <a href="<?php echo esc_url((string) ($cards[2]['link_url'] ?? '#')); ?>" class="nca-services-card__link"><?php echo esc_html((string) ($cards[2]['link_label'] ?? 'LEARN MORE')); ?> <span class="nca-button__arrow">&rarr;</span></a>
                </article>

                <article class="nca-services-card">
                    <div class="nca-services-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><circle cx="28" cy="22" r="9" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M10 50c0-10.4 8.4-18.8 19-18.8S48 39.6 48 50M47 20l2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-3-5.6 3 1.1-6.2-4.5-4.4 6.2-.9z" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linejoin="round"></path></svg></div>
                    <h3><?php echo esc_html($cards[3]['title'] ?? 'CUSTOMER EXPERIENCE'); ?></h3>
                    <p><?php echo esc_html($cards[3]['text'] ?? ''); ?></p>
                    <a href="<?php echo esc_url((string) ($cards[3]['link_url'] ?? '#')); ?>" class="nca-services-card__link"><?php echo esc_html((string) ($cards[3]['link_label'] ?? 'LEARN MORE')); ?> <span class="nca-button__arrow">&rarr;</span></a>
                </article>

                <article class="nca-services-card">
                    <div class="nca-services-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><circle cx="18" cy="22" r="7" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="32" cy="18" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="46" cy="22" r="7" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M8 50c0-8 6.5-14 14.5-14h19C49.5 36 56 42 56 50" fill="none" stroke="currentColor" stroke-width="2.6"></path></svg></div>
                    <h3><?php echo esc_html($cards[4]['title'] ?? 'INCLUSION'); ?></h3>
                    <p><?php echo esc_html($cards[4]['text'] ?? ''); ?></p>
                    <a href="<?php echo esc_url((string) ($cards[4]['link_url'] ?? '#')); ?>" class="nca-services-card__link"><?php echo esc_html((string) ($cards[4]['link_label'] ?? 'LEARN MORE')); ?> <span class="nca-button__arrow">&rarr;</span></a>
                </article>
            </div>
        </section>

        <section class="nca-services-approach">
            <div class="nca-services-approach__copy">
                <p class="nca-kicker"><?php echo esc_html($approach_kicker); ?></p>
                <h2 class="nca-title-md"><?php echo nl2br(esc_html($approach_title)); ?></h2>
                <div class="nca-rule"></div>
                <p class="nca-text-md"><?php echo nl2br(esc_html($approach_text)); ?></p>
                <a class="nca-button nca-button--outline" href="<?php echo esc_url($approach_button_url); ?>"><?php echo esc_html($approach_button_label); ?> <span class="nca-button__arrow">&rarr;</span></a>
            </div>
            <div class="nca-services-approach__image-wrap">
                <img src="<?php echo esc_url($approach_image); ?>" alt="" class="nca-services-approach__image">
            </div>
        </section>

        <section class="nca-services-commitment">
            <div class="nca-services-commitment__image-wrap">
                <img src="<?php echo esc_url($commit_image); ?>" alt="" class="nca-services-commitment__image">
            </div>
            <div class="nca-services-commitment__copy">
                <p class="nca-kicker"><?php echo esc_html($commit_kicker); ?></p>
                <h2 class="nca-title-md"><?php echo esc_html($commit_title); ?></h2>
                <div class="nca-rule"></div>
                <p class="nca-text-md"><?php echo nl2br(esc_html($commit_text)); ?></p>
                <a class="nca-button nca-button--outline" href="<?php echo esc_url($commit_button_url); ?>"><?php echo esc_html($commit_button_label); ?> <span class="nca-button__arrow">&rarr;</span></a>
            </div>
        </section>
    </article>
</main>
<?php
get_footer();
