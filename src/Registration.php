<?php
/**
 * Handles registration form submission.
 *
 * @package SimpleLoginTask
 */

namespace SimpleLoginTask;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Registration
 *
 * Adds extra registration fields and saves user meta.
 */
class Registration {

	/**
	 * Registration constructor.
	 */
	public function __construct() {
		add_action( 'register_form', array( $this, 'show_radio_inputs' ) );
		add_action( 'user_register', array( $this, 'save_registration_meta' ), 10, 1 );
	}

	/**
	 * Show extra radio input fields on registration form.
	 */
	public function show_radio_inputs() {
		// Add a container div for React to mount the form.
		echo '<div id="lp-registration-form" data-nonce="' . esc_attr( wp_create_nonce( 'registration_nonce_action' ) ) . '"></div>';
	}

	/**
	 * Save extra fields to user meta.
	 *
	 * @param int $user_id User ID.
	 */
	public function save_registration_meta( $user_id ) {
		// Verify nonce before processing submitted data.
		if (
			! isset( $_POST['registration_nonce'] ) ||
			! wp_verify_nonce(
				sanitize_text_field( wp_unslash( $_POST['registration_nonce'] ) ),
				'registration_nonce_action'
			)
		) {
			return;
		}

		if ( isset( $_POST['lp_choice'] ) ) {
			$lp_choice = sanitize_text_field( wp_unslash( $_POST['lp_choice'] ) );
			update_user_meta( $user_id, 'lp_choice', $lp_choice );
		}

		$first_name = isset( $_POST['FirstName'] ) ? sanitize_text_field( wp_unslash( $_POST['FirstName'] ) ) : '';
		$last_name  = isset( $_POST['LastName'] ) ? sanitize_text_field( wp_unslash( $_POST['LastName'] ) ) : '';

		if ( $first_name || $last_name ) {
			wp_update_user(
				array(
					'ID'         => $user_id,
					'first_name' => $first_name,
					'last_name'  => $last_name,
				)
			);
		}
	}
}
