<?php
/**
 * Plugin Name: Simple Login Task
 * Description: Adds radio buttons and input fields on the registration form and saves them in user meta.
 * Version: 3.0
 * Author: Hammad Meer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

use SimpleLoginTask\Registration;
// Activation hook
register_activation_hook(
	__FILE__,
	function() {
		if ( ! get_option( 'lp_plugin_active' ) ) {
			update_option( 'lp_plugin_active', 1 );
		}
	}
);

// Deactivation hook
register_deactivation_hook(
	__FILE__,
	function() {
		delete_option( 'lp_plugin_active' );
	}
);

add_action( 'login_enqueue_scripts', function () {
    $plugin_url = plugin_dir_url( __FILE__ );
    $build_dir  = plugin_dir_path( __FILE__ ) . 'assets/src/build/';

    // Find the JS file
    $js_files = glob( $build_dir . 'static/js/*.js' );
    // Fix: Use correct path matching the file system structure
    $js_file  = $js_files ? $plugin_url . 'assets/src/build/static/js/' . basename( $js_files[0] ) : '';

    // Find the CSS file
    $css_files = glob( $build_dir . 'static/css/*.css' );
    // Fix: Use correct path matching the file system structure
    $css_file  = $css_files ? $plugin_url . 'assets/src/build/static/css/' . basename( $css_files[0] ) : '';

    if ( $css_file ) {
        wp_enqueue_style( 'lp-react-style', $css_file, array(), null );
    }

    if ( $js_file ) {
        wp_enqueue_script( 'lp-react-script', $js_file, array(), null, true );
    }
} );

// Load plugin textdomain
add_action(
	'plugins_loaded',
	function() {
		load_plugin_textdomain(
			'simple-login-task',
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages'
		);
	}
);

// Initialize registration
new Registration();