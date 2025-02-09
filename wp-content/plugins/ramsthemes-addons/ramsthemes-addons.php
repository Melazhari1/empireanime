<?php
/**
 * Plugin Name:       RAMSTHEMES Addons
 * Description:       Addons used for RAMSTHEMES.
 * Version:           1.0.0
 * Author:            RAMSTHEMES
 * Author URI:        https://www.templatemonster.com/vendors/ramsthemes/
 * Text Domain:       zettaiwp
 */
 
/*
 * Plugin constants
 */
 
if(!defined('RAMSTHEMES_URL'))
define('RAMSTHEMES_URL', plugin_dir_url( __FILE__ ));
if(!defined('RAMSTHEMES_PATH'))
define('RAMSTHEMES_PATH', plugin_dir_path( __FILE__ )); 
 
require_once RAMSTHEMES_PATH . 'includes/custom-taxonomy.php';
require_once RAMSTHEMES_PATH . 'includes/custom-post-types.php';
require_once RAMSTHEMES_PATH . 'includes/custom-shortcodes.php';

// ENABLE SVG UPLOAD

function zettaiwp_custom_mtypes( $m ){
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}
add_filter( 'upload_mimes', 'zettaiwp_custom_mtypes' );

// UPDATE JQUERY

if (!is_admin()) add_action('wp_enqueue_scripts', 'zettaiwp_jquery_enqueue', 11); /* replace default jquery by our own */
	function zettaiwp_jquery_enqueue() {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery/jquery.min.js', false, '3.4', 'all');
	   wp_enqueue_script('jquery');
	}
 
// LOAD PLUGIN TEXTDOMAIN

function zettaiwp_load_plugin_textdomain() {
    load_plugin_textdomain( 'zettaiwp', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'zettaiwp_load_plugin_textdomain' ); 