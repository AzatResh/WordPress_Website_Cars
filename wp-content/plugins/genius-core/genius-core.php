<?php
/*
Plugin Name: Genius Core
Plugin URI: https://geniuscourses.com
Description: description
Version: 1.0
Author: Azat
Author URI: https://geniuscourses.com
License: GPLv2 or later
Text Domain: genius-core
*/
if(!function_exists('add_action')){
    echo "No.";
    exit;
}

require plugin_dir_path(__FILE__) . '/inc/widget-about.php';
require plugin_dir_path(__FILE__) . '/inc/metaboxes.php';
require plugin_dir_path(__FILE__) . '/inc/acf.php';
require plugin_dir_path(__FILE__) . '/inc/custom_post_type.php';
require plugin_dir_path(__FILE__) . '/inc/elementor.php';