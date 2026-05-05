<?php
/**
 * Front page template.
 *
 * @package ncasolutions
 */

get_header();

$theme_uri = get_template_directory_uri();
$post_id = get_the_ID();

$defaults = [
    'hero_title'            => "We shape\nthe experience",
    'hero_accent'           => 'of place.',
    'hero_intro'            => 'NCA is a management consulting firm focused on unlocking performance through people.',
    'hero_button_label'     => "LET'S CONNECT",
    'hero_button_url'       => home_url('/services/'),
    'hero_image'            => $theme_uri . '/assets/images/home-hero-collage.png',
    'behavior_title'        => "Behavior.\nPerformance.\nResults.",
    'behavior_intro'        => 'At NCA, we focus on what powers it all: people.',
    'approach_title'        => 'Our approach',
    'approach_text'         => "We partner closely with our clients to understand the human dynamics behind their challenges.\nOur approach blends data, behavioral science, and real-world experience to design solutions that are both strategic and actionable.\nWe don't just advise; we work alongside teams to implement, adapt, and sustain change.",
    'approach_button_label' => 'OUR APPROACH',
    'approach_button_url'   => home_url('/services/'),
    'approach_image'        => $theme_uri . '/assets/images/home-approach.png',
    'services_title'        => 'Our services',
    'services_intro'        => 'Our services are designed to move organizations forward&#151;developing people, shaping behavior, and driving performance at every level.',
    'services_button_label' => 'EXPLORE SERVICES',
    'services_button_url'   => home_url('/services/'),
    'strength_title'        => "Our strength\nis our people.",
    'strength_text'         => "NCA is uniquely diverse, bringing together a wide range of backgrounds, perspectives, and disciplines.\nThis diversity allows us to see challenges differently, connect more authentically, and design solutions that are truly resonant.\nWe balance analytical rigor with human understanding, ensuring our work delivers results that stick.",
    'cta_title'             => 'Ready to unlock performance through people?',
    'cta_text'              => "Let's build what's next&#151;together.",
    'cta_button_label'      => "LET'S CONNECT",
    'cta_button_url'        => home_url('/services/'),
];

$behavior_cards_default = [
    ['title' => 'IMPACT', 'text' => 'We align leadership and teams around clear priorities.'],
    ['title' => 'EXECUTION', 'text' => 'We improve execution with measurable focus and accountability.'],
    ['title' => 'EXPERIENCE', 'text' => 'We elevate customer and employee experiences.'],
    ['title' => 'OUTCOMES', 'text' => 'We drive meaningful, lasting business outcomes.'],
];

$service_cards_default = [
    ['title' => 'LEADERSHIP'],
    ['title' => 'DEVELOPMENT'],
    ['title' => 'CHANGE MANAGEMENT'],
    ['title' => 'CUSTOMER EXPERIENCE'],
    ['title' => 'INCLUSION'],
];

$hero_title = nca_core_get_page_field($post_id, 'home_hero_title', $defaults['hero_title']);
$hero_accent = nca_core_get_page_field($post_id, 'home_hero_accent', $defaults['hero_accent']);
$hero_intro = nca_core_get_page_field($post_id, 'home_hero_intro', $defaults['hero_intro']);
$hero_button_label = nca_core_get_page_field($post_id, 'home_hero_button_label', $defaults['hero_button_label']);
$hero_button_url = nca_core_get_page_field($post_id, 'home_hero_button_url', $defaults['hero_button_url']);
$hero_image = nca_core_get_page_field($post_id, 'home_hero_image', $defaults['hero_image']);

$behavior_title = nca_core_get_page_field($post_id, 'home_behavior_title', $defaults['behavior_title']);
$behavior_intro = nca_core_get_page_field($post_id, 'home_behavior_intro', $defaults['behavior_intro']);
$behavior_cards = nca_core_get_page_json($post_id, 'home_behavior_cards_json', $behavior_cards_default);

$approach_title = nca_core_get_page_field($post_id, 'home_approach_title', $defaults['approach_title']);
$approach_text = nca_core_get_page_field($post_id, 'home_approach_text', $defaults['approach_text']);
$approach_button_label = nca_core_get_page_field($post_id, 'home_approach_button_label', $defaults['approach_button_label']);
$approach_button_url = nca_core_get_page_field($post_id, 'home_approach_button_url', $defaults['approach_button_url']);
$approach_image = nca_core_get_page_field($post_id, 'home_approach_image', $defaults['approach_image']);

$services_title = nca_core_get_page_field($post_id, 'home_services_title', $defaults['services_title']);
$services_intro = nca_core_get_page_field($post_id, 'home_services_intro', $defaults['services_intro']);
$services_button_label = nca_core_get_page_field($post_id, 'home_services_button_label', $defaults['services_button_label']);
$services_button_url = nca_core_get_page_field($post_id, 'home_services_button_url', $defaults['services_button_url']);
$service_cards = nca_core_get_page_json($post_id, 'home_service_cards_json', $service_cards_default);

$strength_title = nca_core_get_page_field($post_id, 'home_strength_title', $defaults['strength_title']);
$strength_text = nca_core_get_page_field($post_id, 'home_strength_text', $defaults['strength_text']);
$cta_title = nca_core_get_page_field($post_id, 'home_cta_title', $defaults['cta_title']);
$cta_text = nca_core_get_page_field($post_id, 'home_cta_text', $defaults['cta_text']);
$cta_button_label = nca_core_get_page_field($post_id, 'home_cta_button_label', $defaults['cta_button_label']);
$cta_button_url = nca_core_get_page_field($post_id, 'home_cta_button_url', $defaults['cta_button_url']);
?>
<main id="primary" class="site-main">
    <article class="nca-home">
        <section class="nca-home-hero">
            <div class="nca-home-hero__grid">
                <div class="nca-home-hero__copy">
                    <h1 class="nca-title-hero">
                        <?php echo nl2br(esc_html($hero_title)); ?><br>
                        <span class="nca-title-accent"><?php echo esc_html($hero_accent); ?></span>
                    </h1>
                    <div class="nca-rule"></div>
                    <p class="nca-text-md"><?php echo esc_html($hero_intro); ?></p>
                    <a class="nca-button nca-button--dark" href="<?php echo esc_url($hero_button_url); ?>"><?php echo esc_html($hero_button_label); ?> <span class="nca-button__arrow">&rarr;</span></a>
                </div>
                <div class="nca-home-hero__image-wrap">
                    <img src="<?php echo esc_url($hero_image); ?>" alt="" class="nca-home-hero__image">
                </div>
            </div>
        </section>

        <section class="nca-home-behavior nca-section">
            <div class="nca-home-behavior__grid">
                <div class="nca-home-behavior__intro">
                    <h2 class="nca-title-lg"><?php echo nl2br(esc_html($behavior_title)); ?></h2>
                    <div class="nca-rule"></div>
                    <p class="nca-text-md"><?php echo esc_html($behavior_intro); ?></p>
                </div>
                <div class="nca-home-behavior__cards nca-card-rail">
                    <article class="nca-home-card">
                        <div class="nca-home-card__icon">
                            <svg viewBox="0 0 64 64" aria-hidden="true"><circle cx="22" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="40" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M12 48c0-8 7-14 16-14s16 6 16 14M30 48c0-8 7-14 16-14 1.7 0 3.4.2 5 .7" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round"></path></svg>
                        </div>
                        <h3><?php echo esc_html($behavior_cards[0]['title'] ?? 'IMPACT'); ?></h3>
                        <p><?php echo esc_html($behavior_cards[0]['text'] ?? ''); ?></p>
                    </article>
                    <article class="nca-home-card">
                        <div class="nca-home-card__icon">
                            <svg viewBox="0 0 64 64" aria-hidden="true"><circle cx="32" cy="32" r="19" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="32" cy="32" r="10" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="32" cy="32" r="3" fill="currentColor"></circle><path d="M41 23 52 12M48 12h4v4" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                        <h3><?php echo esc_html($behavior_cards[1]['title'] ?? 'EXECUTION'); ?></h3>
                        <p><?php echo esc_html($behavior_cards[1]['text'] ?? ''); ?></p>
                    </article>
                    <article class="nca-home-card">
                        <div class="nca-home-card__icon">
                            <svg viewBox="0 0 64 64" aria-hidden="true"><circle cx="32" cy="20" r="9" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M13 49c0-10.4 8.4-18.8 19-18.8S51 38.6 51 49" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round"></path></svg>
                        </div>
                        <h3><?php echo esc_html($behavior_cards[2]['title'] ?? 'EXPERIENCE'); ?></h3>
                        <p><?php echo esc_html($behavior_cards[2]['text'] ?? ''); ?></p>
                    </article>
                    <article class="nca-home-card">
                        <div class="nca-home-card__icon">
                            <svg viewBox="0 0 64 64" aria-hidden="true"><path d="M10 49h10V31H10zM27 49h10V21H27zM44 49h10V13H44z" fill="none" stroke="currentColor" stroke-width="2.6"></path></svg>
                        </div>
                        <h3><?php echo esc_html($behavior_cards[3]['title'] ?? 'OUTCOMES'); ?></h3>
                        <p><?php echo esc_html($behavior_cards[3]['text'] ?? ''); ?></p>
                    </article>
                </div>
            </div>
        </section>

        <section class="nca-home-approach">
            <div class="nca-home-approach__copy nca-dark-slab">
                <h2 class="nca-title-md"><?php echo esc_html($approach_title); ?></h2>
                <div class="nca-rule"></div>
                <p class="nca-text-md"><?php echo nl2br(esc_html($approach_text)); ?></p>
                <a class="nca-button nca-button--outline" href="<?php echo esc_url($approach_button_url); ?>"><?php echo esc_html($approach_button_label); ?> <span class="nca-button__arrow">&rarr;</span></a>
            </div>
            <div class="nca-home-approach__image-wrap">
                <img src="<?php echo esc_url($approach_image); ?>" alt="" class="nca-home-approach__image">
            </div>
        </section>

        <section class="nca-home-services nca-section--tight">
            <div class="nca-home-services__grid">
                <div class="nca-home-services__intro">
                    <h2 class="nca-title-md"><?php echo esc_html($services_title); ?></h2>
                    <p class="nca-text-sm"><?php echo wp_kses_post($services_intro); ?></p>
                    <a class="nca-button nca-button--outline" href="<?php echo esc_url($services_button_url); ?>"><?php echo esc_html($services_button_label); ?> <span class="nca-button__arrow">&rarr;</span></a>
                </div>
                <div class="nca-home-services__cards nca-card-rail">
                    <article class="nca-home-service-card">
                        <span class="nca-home-service-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><circle cx="22" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="40" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M12 48c0-8 7-14 16-14s16 6 16 14M30 48c0-8 7-14 16-14 1.7 0 3.4.2 5 .7" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round"></path></svg></span>
                        <h3><?php echo esc_html($service_cards[0]['title'] ?? 'LEADERSHIP'); ?></h3>
                    </article>
                    <article class="nca-home-service-card">
                        <span class="nca-home-service-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><path d="M11 45 24 31l10 10 18-19M46 22h6v6" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"></path></svg></span>
                        <h3><?php echo esc_html($service_cards[1]['title'] ?? 'DEVELOPMENT'); ?></h3>
                    </article>
                    <article class="nca-home-service-card">
                        <span class="nca-home-service-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><path d="M14 26a19 19 0 0 1 11-12l4-1M50 38a19 19 0 0 1-11 12l-4 1M14 26l1-8 8 1M50 38l-1 8-8-1M50 26a19 19 0 0 0-11-12M14 38a19 19 0 0 0 11 12" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"></path></svg></span>
                        <h3><?php echo esc_html($service_cards[2]['title'] ?? 'CHANGE MANAGEMENT'); ?></h3>
                    </article>
                    <article class="nca-home-service-card">
                        <span class="nca-home-service-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><circle cx="28" cy="22" r="9" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M10 50c0-10.4 8.4-18.8 19-18.8S48 39.6 48 50M47 20l2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-3-5.6 3 1.1-6.2-4.5-4.4 6.2-.9z" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linejoin="round"></path></svg></span>
                        <h3><?php echo esc_html($service_cards[3]['title'] ?? 'CUSTOMER EXPERIENCE'); ?></h3>
                    </article>
                    <article class="nca-home-service-card">
                        <span class="nca-home-service-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><circle cx="18" cy="22" r="7" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="32" cy="18" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="46" cy="22" r="7" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M8 50c0-8 6.5-14 14.5-14h19C49.5 36 56 42 56 50" fill="none" stroke="currentColor" stroke-width="2.6"></path></svg></span>
                        <h3><?php echo esc_html($service_cards[4]['title'] ?? 'INCLUSION'); ?></h3>
                    </article>
                </div>
            </div>
        </section>

        <section class="nca-home-bottom">
            <div class="nca-home-bottom__strength nca-dark-slab">
                <h2 class="nca-title-md"><?php echo nl2br(esc_html($strength_title)); ?></h2>
                <div class="nca-rule"></div>
                <p class="nca-text-sm"><?php echo nl2br(esc_html($strength_text)); ?></p>
            </div>
            <div class="nca-home-bottom__cta">
                <h2 class="nca-title-md"><?php echo esc_html($cta_title); ?></h2>
                <div class="nca-rule"></div>
                <p class="nca-text-md"><?php echo wp_kses_post($cta_text); ?></p>
                <a class="nca-button nca-button--dark" href="<?php echo esc_url($cta_button_url); ?>"><?php echo esc_html($cta_button_label); ?> <span class="nca-button__arrow">&rarr;</span></a>
            </div>
        </section>
    </article>
</main>
<?php
get_footer();
