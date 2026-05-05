<?php
/**
 * Header template.
 *
 * @package ncasolutions
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <header class="site-header">
        <div class="nca-container site-header__inner">
            <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('NCA Solutions Home', 'ncasolutions'); ?>">
                <span class="site-logo__wordmark">NCA</span>
                <span class="site-logo__submark">SOLUTIONS</span>
            </a>

            <button class="site-nav-toggle" type="button" aria-expanded="false" aria-controls="site-navigation">
                <span class="screen-reader-text"><?php esc_html_e('Toggle menu', 'ncasolutions'); ?></span>
                <span></span>
                <span></span>
            </button>

            <nav id="site-navigation" class="site-navigation" aria-label="<?php esc_attr_e('Primary Menu', 'ncasolutions'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'primary-menu',
                    'fallback_cb'    => false,
                ]);
                ?>
            </nav>
        </div>
    </header>
