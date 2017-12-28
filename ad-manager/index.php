<?php

namespace DFP\Plugins\AdManager;

/**
 * Plugin Name: DFP Manager
 * Plugin URI: https://www.google.com/dfp/
 * Description: DFP Ads Manager Plugin
 * Version: 1.0.0
 * Author: DFP
 * Author URI: https://www.google.com/dfp/
 * License: Proprietary
 */


if (!defined('ABSPATH')) die;

define('DFP_PLUGIN_VERSION', '1.0.0');
define('DFP_BASE_FILE', __FILE__);

if (is_admin()) {
    require __DIR__ . '/inc/class-admin.php';
    require __DIR__ . '/inc/trait-loads-view.php';
    require __DIR__ . '/inc/class-settings.php';
    new Admin();
}
