<?php
/**
 * Generic page template.
 *
 * @package ncasolutions
 */

get_header();
?>
<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class('nca-page'); ?>>
            <?php if (! is_front_page()) : ?>
                <header class="nca-page-header nca-container">
                    <?php the_title('<h1 class="nca-page-title">', '</h1>'); ?>
                </header>
            <?php endif; ?>

            <div class="nca-page-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>
<?php
get_footer();
