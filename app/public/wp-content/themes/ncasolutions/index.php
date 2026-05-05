<?php
/**
 * Main template.
 *
 * @package ncasolutions
 */

get_header();
?>
<main id="primary" class="site-main">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('nca-post'); ?>>
                <header class="nca-post-header">
                    <?php the_title('<h1 class="nca-post-title">', '</h1>'); ?>
                </header>

                <div class="nca-post-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php
get_footer();
