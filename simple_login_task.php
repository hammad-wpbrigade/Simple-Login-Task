<?php
/**
 * Plugin Name: Simple Login Task
 * Description: Adds radio buttons and input fields on the registration form and saves them in user meta.
 * Version: 2.0
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

// Enqueue scripts and styles
add_action(
	'login_enqueue_scripts',
	function() {
		wp_enqueue_style(
			'lp-style',
			plugin_dir_url( __FILE__ ) . 'assets/css/style.css',
			array(),
			'1.0'
		);

		wp_enqueue_script(
			'lp-script',
			plugin_dir_url( __FILE__ ) . 'assets/js/script.js',
			array( 'jquery' ),
			'1.0',
			true
		);
	}
);
