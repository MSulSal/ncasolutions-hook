<?php
/**
 * Fallback comments template.
 *
 * @package ncasolutions
 */

if (post_password_required()) {
    return;
}
?>
<section id="comments" class="comments-area nca-container">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title"><?php esc_html_e('Comments', 'ncasolutions'); ?></h2>
        <ol class="comment-list">
            <?php wp_list_comments(['style' => 'ol', 'short_ping' => true]); ?>
        </ol>
    <?php endif; ?>

    <?php comment_form(); ?>
</section>
