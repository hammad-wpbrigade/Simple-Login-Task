<?php
/**
 * Plugin Name: Simple Login Task
 * Description: Adds radio buttons and input fields on the registration form and saves them in user meta.
 * Version: 1.0
 * Author: Hammad Meer
 */

// Activation hook
register_activation_hook(__FILE__, 'lp_plugin_activate');
function lp_plugin_activate() {
    if (!get_option('lp_plugin_active')) {
        update_option('lp_plugin_active', 1);
    }
}


// Deactivation hook
register_deactivation_hook(__FILE__, 'lp_plugin_deactivate');
function lp_plugin_deactivate() {
    delete_option('lp_plugin_active');
}

// Show radio buttons and extra fields on registration form
add_action('register_form', 'lp_show_radio_inputs');
function lp_show_radio_inputs() {
    ?>
    <p>
        <label>Enter Extra Detail</label><br>
        <label><input type="radio" name="lp_choice" value="yes" /> Yes</label>
        <label><input type="radio" name="lp_choice" value="no" /> No</label>
    </p>

    <div id="lp-extra-fields" style="display:none;">
        <p><input type="text" name="FirstName" placeholder="First Name" /></p>
        <p><input type="text" name="LastName" placeholder="Last Name" /></p>
    </div>

    <script>
        document.addEventListener('change', function(e) {
            if(e.target.name === 'lp_choice' && e.target.value === 'yes') {
                document.getElementById('lp-extra-fields').style.display = 'block';
            } else if (e.target.name === 'lp_choice') {
                document.getElementById('lp-extra-fields').style.display = 'none';
            }
        });
    </script>
    <?php
}

// Save user meta after registration
add_action('user_register', 'lp_save_registration_meta', 10, 1);
function lp_save_registration_meta($user_id) {
    if (!empty($_POST['lp_choice'])) {
        update_user_meta($user_id, 'lp_choice', sanitize_text_field($_POST['lp_choice']));
    }

    if (!empty($_POST['FirstName'] || !empty($_POST['LastName']))) {
        wp_update_user(array(
    'ID' => $user_id,
    'first_name' => sanitize_text_field($_POST['FirstName']),
    'last_name' => sanitize_text_field($_POST['LastName'])
));
    }
}



if (!defined('ABSPATH')) {
    exit;
}
?>