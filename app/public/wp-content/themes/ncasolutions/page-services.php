<?php
/**
 * Template for the Services page.
 *
 * @package ncasolutions
 */

get_header();

$theme_uri = get_template_directory_uri();
?>
<main id="primary" class="site-main">
    <article class="nca-services-page">
        <section class="nca-services-hero">
            <img src="<?php echo esc_url($theme_uri . '/assets/images/office-hero.png'); ?>" alt="" class="nca-services-hero__image">
            <div class="nca-services-hero__overlay">
                <h1 class="nca-title-xl">Our services</h1>
                <div class="nca-rule"></div>
                <p class="nca-text-md">We partner with organizations to unlock performance through people. Our services combine behavioral insight with practical execution to develop people, shape behavior, and drive lasting results.</p>
            </div>
        </section>

        <section class="nca-services-what nca-section">
            <div class="nca-services-what__head">
                <h2 class="nca-title-lg">What we do</h2>
                <p class="nca-text-md">Our services are built to move organizations forward&#151;developing people, shaping behavior, and driving performance at every level.</p>
                <div class="nca-rule"></div>
            </div>

            <div class="nca-services-what__cards nca-card-rail">
                <article class="nca-services-card">
                    <div class="nca-services-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><circle cx="32" cy="20" r="9" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M13 49c0-10.4 8.4-18.8 19-18.8S51 38.6 51 49" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round"></path></svg></div>
                    <h3>LEADERSHIP</h3>
                    <p>We align leadership and teams around clear priorities and shared purpose.</p>
                    <a href="#" class="nca-services-card__link">LEARN MORE <span class="nca-button__arrow">&rarr;</span></a>
                </article>

                <article class="nca-services-card">
                    <div class="nca-services-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><path d="M11 45 24 31l10 10 18-19M46 22h6v6" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
                    <h3>DEVELOPMENT</h3>
                    <p>We build capability and confidence to help people and teams reach their full potential.</p>
                    <a href="#" class="nca-services-card__link">LEARN MORE <span class="nca-button__arrow">&rarr;</span></a>
                </article>

                <article class="nca-services-card">
                    <div class="nca-services-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><path d="M14 26a19 19 0 0 1 11-12l4-1M50 38a19 19 0 0 1-11 12l-4 1M14 26l1-8 8 1M50 38l-1 8-8-1M50 26a19 19 0 0 0-11-12M14 38a19 19 0 0 0 11 12" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
                    <h3>CHANGE MANAGEMENT</h3>
                    <p>We guide organizations through change with clarity, engagement, and momentum.</p>
                    <a href="#" class="nca-services-card__link">LEARN MORE <span class="nca-button__arrow">&rarr;</span></a>
                </article>

                <article class="nca-services-card">
                    <div class="nca-services-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><circle cx="28" cy="22" r="9" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M10 50c0-10.4 8.4-18.8 19-18.8S48 39.6 48 50M47 20l2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-3-5.6 3 1.1-6.2-4.5-4.4 6.2-.9z" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linejoin="round"></path></svg></div>
                    <h3>CUSTOMER EXPERIENCE</h3>
                    <p>We design and elevate experiences that strengthen loyalty and drive value.</p>
                    <a href="#" class="nca-services-card__link">LEARN MORE <span class="nca-button__arrow">&rarr;</span></a>
                </article>

                <article class="nca-services-card">
                    <div class="nca-services-card__icon" aria-hidden="true"><svg viewBox="0 0 64 64"><circle cx="18" cy="22" r="7" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="32" cy="18" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="46" cy="22" r="7" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M8 50c0-8 6.5-14 14.5-14h19C49.5 36 56 42 56 50" fill="none" stroke="currentColor" stroke-width="2.6"></path></svg></div>
                    <h3>INCLUSION</h3>
                    <p>We create inclusive cultures where people feel they belong and performance thrives.</p>
                    <a href="#" class="nca-services-card__link">LEARN MORE <span class="nca-button__arrow">&rarr;</span></a>
                </article>
            </div>
        </section>

        <section class="nca-services-approach">
            <div class="nca-services-approach__copy">
                <p class="nca-kicker">OUR APPROACH</p>
                <h2 class="nca-title-md">Insight. Execution.<br>Impact.</h2>
                <div class="nca-rule"></div>
                <p class="nca-text-md">We partner closely with our clients to understand the human dynamics behind their challenges.<br>Our approach blends data, behavioral science, and real-world experience to design solutions that are both strategic and actionable.<br>We don't just advise; we work alongside teams to implement, adapt, and sustain change.</p>
                <a class="nca-button nca-button--outline" href="<?php echo esc_url(home_url('/services/')); ?>">LEARN MORE ABOUT OUR APPROACH <span class="nca-button__arrow">&rarr;</span></a>
            </div>
            <div class="nca-services-approach__image-wrap">
                <img src="<?php echo esc_url($theme_uri . '/assets/images/services-approach.png'); ?>" alt="" class="nca-services-approach__image">
            </div>
        </section>

        <section class="nca-services-commitment">
            <div class="nca-services-commitment__image-wrap">
                <img src="<?php echo esc_url($theme_uri . '/assets/images/services-commitment.png'); ?>" alt="" class="nca-services-commitment__image">
            </div>
            <div class="nca-services-commitment__copy">
                <p class="nca-kicker">OUR COMMITMENT</p>
                <h2 class="nca-title-md">People are the path to performance.</h2>
                <div class="nca-rule"></div>
                <p class="nca-text-md">Behavior drives performance, and performance delivers results.<br>At NCA, we focus on what powers it all: people.</p>
                <a class="nca-button nca-button--outline" href="<?php echo esc_url(home_url('/services/')); ?>">LET'S CONNECT <span class="nca-button__arrow">&rarr;</span></a>
            </div>
        </section>
    </article>
</main>
<?php
get_footer();
