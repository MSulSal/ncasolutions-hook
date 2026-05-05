<?php
/**
 * Core bootstrap class.
 */

if (! defined('ABSPATH')) {
    exit;
}

final class NCA_Core
{
    public static function boot(): void
    {
        add_action('init', [self::class, 'register_image_sizes']);
    }

    public static function register_image_sizes(): void
    {
        add_image_size('nca-team-card', 480, 560, true);
        add_image_size('nca-service-card', 640, 400, true);
    }
}
