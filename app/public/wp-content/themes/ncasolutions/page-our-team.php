<?php
/**
 * Template for the Our Team page.
 *
 * @package ncasolutions
 */

get_header();

$theme_uri = get_template_directory_uri();
$members = [
    ['name' => 'Nicole Davis', 'role' => 'Founder &amp; Managing Partner', 'image' => 'team-1.png'],
    ['name' => 'Jessica Martinez', 'role' => 'Partner', 'image' => 'team-2.png'],
    ['name' => 'Aisha Thompson', 'role' => 'Partner', 'image' => 'team-3.png'],
    ['name' => 'Lauren Kim', 'role' => 'Director', 'image' => 'team-4.png'],
    ['name' => 'Michael Anderson', 'role' => 'Director', 'image' => 'team-5.png'],
    ['name' => 'Samantha Lee', 'role' => 'Senior Consultant', 'image' => 'team-6.png'],
    ['name' => 'David Park', 'role' => 'Senior Consultant', 'image' => 'team-7.png'],
    ['name' => 'Brianna Cole', 'role' => 'Consultant', 'image' => 'team-8.png'],
    ['name' => 'Marcus Johnson', 'role' => 'Consultant', 'image' => 'team-9.png'],
    ['name' => 'Emily Roberts', 'role' => 'Consultant', 'image' => 'team-10.png'],
];
?>
<main id="primary" class="site-main">
    <article class="nca-team-page">
        <section class="nca-team-hero">
            <img src="<?php echo esc_url($theme_uri . '/assets/images/office-hero.png'); ?>" alt="" class="nca-team-hero__image">
            <div class="nca-team-hero__overlay">
                <p class="nca-kicker">ABOUT US</p>
                <h1 class="nca-title-xl">People. Perspective.<br><span class="nca-title-accent">Performance.</span></h1>
                <div class="nca-rule"></div>
                <p class="nca-text-md">NCA is a management consulting firm that partners with organizations to unlock performance through people.</p>
                <p class="nca-text-md">We blend data, behavioral science, and real-world experience to design solutions that are both strategic and actionable.</p>
            </div>
        </section>

        <section class="nca-team-values nca-section">
            <div class="nca-team-values__grid">
                <div class="nca-team-values__voice">
                    <h2 class="nca-title-md">Our voice</h2>
                    <div class="nca-rule"></div>
                    <p class="nca-title-md nca-team-values__subhead">We speak with confidence.<br>We lead with vision,<br>grounded in diversity.</p>
                    <p class="nca-text-md">Our messaging embodies three pillars: innovation, inclusion, and impact, reflecting who we are and the unique perspectives that make us stronger. Every word we choose moves us forward. Period.</p>
                </div>

                <div class="nca-team-values__vision">
                    <h2 class="nca-title-md">Our vision</h2>
                    <div class="nca-rule"></div>
                    <p class="nca-title-md nca-title-accent">Bold. Authentic. Forward.</p>

                    <div class="nca-team-values__cards">
                        <article class="nca-team-value-card">
                            <div class="nca-team-value-card__icon" aria-hidden="true">
                                <svg viewBox="0 0 64 64"><path d="M32 9c-9.9 0-18 7.8-18 17.4 0 6.1 3.2 11.5 8 14.6V51h20V41c4.8-3.1 8-8.5 8-14.6C50 16.8 41.9 9 32 9zM25 57h14M27 62h10" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </div>
                            <h3>INNOVATION</h3>
                            <p>We challenge the status quo and design thoughtful solutions that create lasting value.</p>
                        </article>
                        <article class="nca-team-value-card">
                            <div class="nca-team-value-card__icon" aria-hidden="true">
                                <svg viewBox="0 0 64 64"><circle cx="22" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><circle cx="40" cy="20" r="8" fill="none" stroke="currentColor" stroke-width="2.6"></circle><path d="M12 48c0-8 7-14 16-14s16 6 16 14M30 48c0-8 7-14 16-14 1.7 0 3.4.2 5 .7" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round"></path></svg>
                            </div>
                            <h3>INCLUSION</h3>
                            <p>We embrace diverse perspectives and build environments where everyone thrives.</p>
                        </article>
                        <article class="nca-team-value-card">
                            <div class="nca-team-value-card__icon" aria-hidden="true">
                                <svg viewBox="0 0 64 64"><path d="M10 49h10V31H10zM27 49h10V21H27zM44 49h10V13H44z" fill="none" stroke="currentColor" stroke-width="2.6"></path></svg>
                            </div>
                            <h3>IMPACT</h3>
                            <p>We deliver measurable results that elevate performance and drive meaningful change.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="nca-team-members nca-section">
            <div class="nca-team-members__head">
                <h2 class="nca-title-md">Our team</h2>
                <div class="nca-rule"></div>
                <p class="nca-text-md">A diverse group of thinkers, doers, and partners&#151;united by a shared commitment to people and performance.</p>
            </div>

            <div class="nca-team-members__grid">
                <?php foreach ($members as $member) : ?>
                    <article class="nca-team-member">
                        <div class="nca-team-member__image-wrap">
                            <img src="<?php echo esc_url($theme_uri . '/assets/images/' . $member['image']); ?>" alt="<?php echo esc_attr($member['name']); ?>" class="nca-team-member__image">
                        </div>
                        <h3><?php echo esc_html($member['name']); ?></h3>
                        <p><?php echo wp_kses_post($member['role']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="nca-team-quote">
            <div class="nca-team-quote__inner">
                <h2 class="nca-title-md">We partner with organizations to unlock human potential and drive performance that lasts.</h2>
                <div class="nca-rule"></div>
            </div>
        </section>
    </article>
</main>
<?php
get_footer();
