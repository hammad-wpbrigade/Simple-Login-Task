<?php
/**
 * Registration form extra fields template.
 *
 * @package SimpleLoginTask
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="additional-registration-div">
	<?php wp_nonce_field( 'registration_nonce_action', 'registration_nonce' ); ?>
	<p>
		<label><?php esc_html_e( 'Enter Extra Detail', 'simple-login-task' ); ?></label><br>
		<label>
			<input type="radio" name="lp_choice" value="yes" />
			<?php esc_html_e( 'Yes', 'simple-login-task' ); ?>
		</label>
		<label>
			<input type="radio" name="lp_choice" value="no" />
			<?php esc_html_e( 'No', 'simple-login-task' ); ?>
		</label>
	</p>

	<div id="lp-extra-fields" class="input-div">
		<p>
			<input type="text" name="FirstName" placeholder="<?php esc_attr_e( 'First Name', 'simple-login-task' ); ?>" />
		</p>
		<p>
			<input type="text" name="LastName" placeholder="<?php esc_attr_e( 'Last Name', 'simple-login-task' ); ?>" />
		</p>
	</div>
</div>
