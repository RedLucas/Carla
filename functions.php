<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// WooFramework init
require_once ( get_template_directory() . '/functions/admin-init.php' );

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 			// Options panel settings and custom settings
				'includes/theme-functions.php', 		// Custom theme functions
				'includes/theme-actions.php', 			// Theme actions & user defined hooks
				'includes/theme-comments.php', 			// Custom comments/pingback loop
				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
				'includes/sidebar-init.php', 			// Initialize widgetized areas
				'includes/theme-widgets.php'			// Theme widgets
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );

foreach ( $includes as $i ) {
	locate_template( $i, true );
}

if ( is_woocommerce_activated() ) {
	locate_template( 'includes/theme-woocommerce.php', true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/

function carla_enqueue_script() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
	        wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2');
	        wp_enqueue_script('jquery');
		}

	wp_enqueue_script("kinetic", get_stylesheet_directory_uri()."/js/smoothscroll/jquery.kinetic.min.js", "jquery", "", true);
	wp_enqueue_script("yepnope", get_stylesheet_directory_uri()."/bower_components/yepnope/yepnope.1.5.4-min.js", "", "1.5.4");
	wp_enqueue_script("jquery ui", "//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js", "jquery", "1.10.3");
	wp_enqueue_script("mousewheel", get_stylesheet_directory_uri()."/js/smoothscroll/jquery.mousewheel.min.js", "jquery", "1.3", true);
	
	wp_enqueue_script("smoothScroll", get_stylesheet_directory_uri()."/js/smoothscroll/jquery.smoothdivscroll-1.3-min.js", "jquery", "1.3", true);
	wp_enqueue_script("modernizr", "//ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.7.1.js", "2.7.1");
	
	wp_enqueue_script("slider init", get_stylesheet_directory_uri()."/js/slider.js", "jquery", "" , true);
	
}
add_action( 'wp_enqueue_scripts', 'carla_enqueue_script' );

/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>