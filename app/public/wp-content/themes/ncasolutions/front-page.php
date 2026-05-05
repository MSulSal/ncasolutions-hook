<?php
/**
 * Front page template.
 *
 * @package ncasolutions
 */

get_header();

$theme_uri = get_template_directory_uri();
?>
<main id="primary" class="site-main">
    <article class="nca-home">
        <section class="nca-home-hero">
            <div class="nca-home-hero__grid">
                <div class="nca-home-hero__copy">
                    <h1 class="nca-title-hero">
                        We shape<br>
                        the experience<br>
                        <span class="nca-title-accent">of place.</span>
                    </h1>
                    <div class="nca-rule"></div>
                    <p class="nca-text-md">NCA is a management consulting firm focused on unlocking performance through people.</p>
                    <a class="nca-button nca-button--dark" href="<?php echo esc_url(home_url('/services/')); ?>">LET'S CONNECT <span class="nca-button__arrow">&rarr;</span></a>
                </div>
                <div class="nca-home-hero__image-wrap">
                    <img src="<?php echo esc_url($theme_uri . '/assets/images/home-hero-collage.png'); ?>" alt="" class="nca-home-hero__image">
                </div>
            </div>
        </section>

        <section class="nca-home-behavior nca-section">
            <div class="nca-home-behavior__grid">
                <div class="nca-home-behavior__intro">
                    <h2 class="nca-title-lg">Behavior.<br>Performance.<br>Results.</h2>
                    <div class="nca-rule"></div>
                    <p class="nca-text-md">At NCA, we focus on what powers it all: people.</p>
                </div>
                <div class="nca-home-behavior__cards nca-card-rail">
                    <article class="nca-home-card">
                        <div class="nca-home-card__icon">
                            <svg viewBox="0 0 64 64" aria-hidden="true"><circle cx="22" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="40" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M12 48c0-8 7-14 16-14s16 6 16 14M30 48c0-8 7-14 16-14 1.7 0 3.4.2 5 .7" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round"></path></svg>
                        </div>
                        <h3>IMPACT</h3>
                        <p>We align leadership and teams around clear priorities.</p>
                    </article>
                    <article class="nca-home-card">
                        <div class="nca-home-card__icon">
                            <svg viewBox="0 0 64 64" aria-hidden="true"><circle cx="32" cy="32" r="19" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="32" cy="32" r="10" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="32" cy="32" r="3" fill="currentColor"></circle><path d="M41 23 52 12M48 12h4v4" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                        <h3>EXECUTION</h3>
                        <p>We improve execution with measurable focus and accountability.</p>
                    </article>
                    <article class="nca-home-card">
                        <div class="nca-home-card__icon">
                            <svg viewBox="0 0 64 64" aria-hidden="true"><circle cx="32" cy="20" r="9" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M13 49c0-10.4 8.4-18.8 19-18.8S51 38.6 51 49" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round"></path></svg>
                        </div>
                        <h3>EXPERIENCE</h3>
                        <p>We elevate customer and employee experiences.</p>
                    </article>
                    <article class="nca-home-card">
                        <div class="nca-home-card__icon">
                            <svg viewBox="0 0 64 64" aria-hidden="true"><path d="M10 49h10V31H10zM27 49h10V21H27zM44 49h10V13H44z" fill="none" stroke="currentColor" stroke-width="2.6"></path></svg>
                        </div>
                        <h3>OUTCOMES</h3>
                        <p>We drive meaningful, lasting business outcomes.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="nca-home-approach">
            <div class="nca-home-approach__copy nca-dark-slab">
                <h2 class="nca-title-md">Our approach</h2>
                <div class="nca-rule"></div>
                <p class="nca-text-md">We partner closely with our clients to understand the human dynamics behind their challenges.<br>Our approach blends data, behavioral science, and real-world experience to design solutions that are both strategic and actionable.<br>We don't just advise; we work alongside teams to implement, adapt, and sustain change.</p>
                <a class="nca-button nca-button--outline" href="<?php echo esc_url(home_url('/services/')); ?>">OUR APPROACH <span class="nca-button__arrow">&rarr;</span></a>
            </div>
            <div class="nca-home-approach__image-wrap">
                <img src="<?php echo esc_url($theme_uri . '/assets/images/home-approach.png'); ?>" alt="" class="nca-home-approach__image">
            </div>
        </section>

        <section class="nca-home-services nca-section--tight">
            <div class="nca-home-services__grid">
                <div class="nca-home-services__intro">
                    <h2 class="nca-title-md">Our services</h2>
                    <p class="nca-text-sm">Our services are designed to move organizations forward&#151;developing people, shaping behavior, and driving performance at every level.</p>
                    <a class="nca-button nca-button--outline" href="<?php echo esc_url(home_url('/services/')); ?>">EXPLORE SERVICES <span class="nca-button__arrow">&rarr;</span></a>
                </div>
                <div class="nca-home-services__cards nca-card-rail">
                    <article class="nca-home-service-card">
                        <span class="nca-home-service-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><circle cx="22" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="40" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M12 48c0-8 7-14 16-14s16 6 16 14M30 48c0-8 7-14 16-14 1.7 0 3.4.2 5 .7" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round"></path></svg></span>
                        <h3>LEADERSHIP</h3>
                    </article>
                    <article class="nca-home-service-card">
                        <span class="nca-home-service-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><path d="M11 45 24 31l10 10 18-19M46 22h6v6" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"></path></svg></span>
                        <h3>DEVELOPMENT</h3>
                    </article>
                    <article class="nca-home-service-card">
                        <span class="nca-home-service-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><path d="M14 26a19 19 0 0 1 11-12l4-1M50 38a19 19 0 0 1-11 12l-4 1M14 26l1-8 8 1M50 38l-1 8-8-1M50 26a19 19 0 0 0-11-12M14 38a19 19 0 0 0 11 12" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"></path></svg></span>
                        <h3>CHANGE MANAGEMENT</h3>
                    </article>
                    <article class="nca-home-service-card">
                        <span class="nca-home-service-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><circle cx="28" cy="22" r="9" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M10 50c0-10.4 8.4-18.8 19-18.8S48 39.6 48 50M47 20l2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-3-5.6 3 1.1-6.2-4.5-4.4 6.2-.9z" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linejoin="round"></path></svg></span>
                        <h3>CUSTOMER EXPERIENCE</h3>
                    </article>
                    <article class="nca-home-service-card">
                        <span class="nca-home-service-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><circle cx="18" cy="22" r="7" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="32" cy="18" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="46" cy="22" r="7" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M8 50c0-8 6.5-14 14.5-14h19C49.5 36 56 42 56 50" fill="none" stroke="currentColor" stroke-width="2.6"></path></svg></span>
                        <h3>INCLUSION</h3>
                    </article>
                </div>
            </div>
        </section>

        <section class="nca-home-bottom">
            <div class="nca-home-bottom__strength nca-dark-slab">
                <h2 class="nca-title-md">Our strength<br>is our people.</h2>
                <div class="nca-rule"></div>
                <p class="nca-text-sm">NCA is uniquely diverse, bringing together a wide range of backgrounds, perspectives, and disciplines.<br>This diversity allows us to see challenges differently, connect more authentically, and design solutions that are truly resonant.<br>We balance analytical rigor with human understanding, ensuring our work delivers results that stick.</p>
            </div>
            <div class="nca-home-bottom__cta">
                <h2 class="nca-title-md">Ready to unlock performance through people?</h2>
                <div class="nca-rule"></div>
                <p class="nca-text-md">Let's build what's next&#151;together.</p>
                <a class="nca-button nca-button--dark" href="<?php echo esc_url(home_url('/services/')); ?>">LET'S CONNECT <span class="nca-button__arrow">&rarr;</span></a>
            </div>
        </section>
    </article>
</main>
<?php
get_footer();
