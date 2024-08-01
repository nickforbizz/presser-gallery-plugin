<?php
/*
 * Plugin Name: Presser Gallery PLUGIN 
 * Plugin URI: supertechnomads.com
 * Description: A plugin to display presser images
 * Version: 1.0.0
 * Requires PHP: 7^
 * Author: Nicholas W
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( !defined('WPINC') ) {
    exit('Not allowed to access this file directly');
}

define("PRESSER_GALLERY_PLUGIN_FOR_WP_VERSION", time());
define("PRESSER_GALLERY_PLUGIN_FOR_WP_FILE", __FILE__);
define("PRESSER_GALLERY_PLUGIN_FOR_WP_DIR",dirname(PRESSER_GALLERY_PLUGIN_FOR_WP_FILE));
define("PRESSER_GALLERY_PLUGIN_FOR_WP_URL",plugins_url('', PRESSER_GALLERY_PLUGIN_FOR_WP_FILE));


// check class
if( !class_exists("LearnPluginForWp")){
    include_once PRESSER_GALLERY_PLUGIN_FOR_WP_DIR.'/includes/class-presser-gallery-plugin-for-wp.php';
}


