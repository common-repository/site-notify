<?php

/**

* Plugin Name: Site Notify

* Description: Display custom notifications, announcements, and alerts on your website

* Author: krishnadhakad, sherdil2015

* Author URI:  https://gaurish.com/site_notify_plugin

* Version: 1.0

* License: GPLv3 or later

*/



if (!defined('ABSPATH')) exit; // EXIT IF ACCESSED DIRECTLY



// SET CONSTANT FOR PLUGIN PATH

if (!defined('SITE_NOTIFY_PLUGIN_PATH')) {

	define('SITE_NOTIFY_PLUGIN_PATH', plugins_url('/', __FILE__));

}



if (!defined('SITE_NOTIFY_BASENAME')) {

	define('SITE_NOTIFY_BASENAME', plugin_basename(__FILE__));

}



if (!defined('SITE_NOTIFY_VERSION')) {

	define('SITE_NOTIFY_VERSION', '1.0');

}

if (!defined('SITE_NOTIFY_URL')) {

	define('SITE_NOTIFY_URL', trailingslashit(plugin_dir_url(__FILE__)));

}


// Include functions to user and admin site
require 'functions/admin-functions.php';

require 'functions/user-functions.php';





/* ##### ADD ACTION HOOKS & FILTERS FOR PLUGIN ##### */

add_action('admin_menu', 'siteNotify_admin_menu');

add_filter("plugin_action_links_".SITE_NOTIFY_BASENAME, 'siteNotify_settings_link');

add_action('admin_enqueue_scripts', 'siteNotify_backend_enqueue', 999999);

add_action('wp_enqueue_scripts', 'siteNotify_frontend_enqueue');

add_filter('body_class', 'siteNotify_body_class');

add_action('wp_head', 'siteNotify_frontend_ui');

add_action('wp_ajax_siteNotify_add_items_into_post', 'siteNotify_add_items_into_post');

add_action('wp_ajax_nopriv_siteNotify_add_items_into_post', 'siteNotify_add_items_into_post');



?>