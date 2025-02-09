<?php

require get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'zettaiwp_register_required_plugins' );

function zettaiwp_register_required_plugins() {

/**
 * Array of plugin arrays. Required keys are name and slug.
 * If the source is NOT from the .org repo, then source is also required.
 */
$plugins = array(

    array(
			'name'               => 'Advanced Custom Fields PRO',
			'slug'               => 'advanced-custom-fields-pro',
			'source'             => 'https://ramsthemes-files.s3.us-east-2.amazonaws.com/plugins/advanced-custom-fields-pro.zip',
			'required'           => true, // this plugin is required
			'version'            => '',
			'force_activation'   => true, // Force activation because we need Advanced Custom Fields,
			'force_deactivation' => false, // deactivate this plugin when the user switches to another theme
			'external_url'       => ''
	),
	array(
			'name'               => 'RAMSTHEMES Addons',
			'slug'               => 'ramsthemes-addons',
			'source'             => 'https://ramsthemes-files.s3.us-east-2.amazonaws.com/updates/zettai/zettai-free/ramsthemes-addons.zip',
			'required'           => true, // this plugin is required
			'version'            => '',
			'force_activation'   => true, // Force activation because we need shortcode for galleries,
			'force_deactivation' => false, // deactivate this plugin when the user switches to another theme
			'external_url'       => ''
	),
	array(
			'name' 				 => 'All-in-One WP Migration',
			'slug' 				 => 'all-in-one-wp-migration',
			'required' 			 => true,
	),
	array(
			'name' 				 => 'AddToAny Share Buttons',
			'slug' 				 => 'add-to-any',
			'required' 			 => false,
	),
	array(
			'name' 				 => 'Classic Editor and Classic Widgets',
			'slug' 				 => 'classic-editor-and-classic-widgets',
			'required' 			 => false,
	),
	array(
			'name' 				 => 'Contact Form 7',
			'slug' 				 => 'contact-form-7',
			'required' 			 => false,
	),
	array(
			'name' 				 => 'Lightbox with PhotoSwipe',
			'slug' 				 => 'lightbox-photoswipe',
			'required' 			 => false,
	),
	
);

    // Change this to your theme text domain, used for internationalising strings
$theme_text_domain = 'zettaiwp';

$config = array(
        'domain'            => $theme_text_domain,           // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                           // Default absolute path to pre-packaged plugins
        'parent_slug'   => 'themes.php',         // Default parent URL slug
        'menu'              => 'install-required-plugins',   // Menu slug
        'has_notices'       => true,                         // Show admin notices or not
        'is_automatic'      => false,            // Automatically activate plugins after installation or not
        'message'           => '',               // Message to output right before the plugins table
        
);

tgmpa( $plugins, $config );

}

?>