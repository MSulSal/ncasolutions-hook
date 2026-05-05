<?php
/**
 * Plugin Name: NCA Solutions Core
 * Description: Functional/admin layer for NCA Solutions site content and setup.
 * Version: 1.0.0
 * Author: NCA Solutions
 * Text Domain: ncasolutions-core
 */

if (! defined('ABSPATH')) {
    exit;
}

define('NCA_CORE_VERSION', '1.0.0');
define('NCA_CORE_FILE', __FILE__);
define('NCA_CORE_PATH', plugin_dir_path(__FILE__));
define('NCA_CORE_URL', plugin_dir_url(__FILE__));

require_once NCA_CORE_PATH . 'includes/class-nca-core.php';

NCA_Core::boot();
