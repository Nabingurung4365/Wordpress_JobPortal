<?php
defined( 'ABSPATH' ) || die();

class WL_JP_User {
	/* Login */
	public static function login() {
		if ( ! wp_verify_nonce( $_POST['login'], 'login' ) ) {
			die();
		}

		$username = isset( $_POST['username'] ) ? $_POST['username'] : NULL;
		$password = isset( $_POST['password'] ) ? $_POST['password'] : NULL;

		$user = wp_authenticate( $username, $password );
		if ( is_wp_error( $user ) ) {
			wp_send_json_error( __( $user->get_error_message(), WL_JP_DOMAIN ) );
		}

        wp_set_current_user( $user->ID, $user->user_login );
        wp_set_auth_cookie( $user->ID );
        do_action( 'wp_login', $user->user_login );

		wp_send_json_success( array( 'message' => __( "You are logged in successfully.", WL_JP_DOMAIN ), 'reload' => true ) );
	}

	/* Signup */
	public static function signup() {
		if ( ! wp_verify_nonce( $_POST['signup'], 'signup' ) ) {
			die();
		}

		$username         = isset( $_POST['username'] ) ? sanitize_text_field( $_POST['username'] ) : NULL;
		$email            = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : NULL;
		$password         = isset( $_POST['password'] ) ? $_POST['password'] : NULL;
		$confirm_password = isset( $_POST['confirm_password'] ) ? $_POST['confirm_password'] : NULL;

		/* Validations */
		$errors = [];
		if ( empty( $username ) ) {
			$errors['username'] = __( 'Please provide username.', WL_JP_DOMAIN );
		}

		if ( empty( $email ) ) {
			$errors['email'] = __( 'Please provide email address.', WL_JP_DOMAIN );
		}

		if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
			$errors['email'] = __( 'Please provide a valid email address.', WL_JP_DOMAIN );
		}

		if ( empty( $password ) ) {
			$errors['password'] = __( 'Please provide password.', WL_JP_DOMAIN );
		}

		if ( empty( $confirm_password ) ) {
			$errors['password_confirm'] = __( 'Please confirm password.', WL_JP_DOMAIN );
		}

		if ( $password !== $confirm_password ) {
			$errors['password'] = __( 'Passwords do not match.', WL_JP_DOMAIN );
		}
		/* End validations */

		if ( count( $errors ) < 1 ) {
			$data = array(
			    'user_login' => $username,
			    'user_email' => $email,
			    'user_pass'  => $password
			);

			$user_id = wp_insert_user( $data );
			if ( is_wp_error( $user_id ) ) {
				wp_send_json_error( __( $user_id->get_error_message(), WL_JP_DOMAIN ) );
			}

			update_user_meta( $user_id, 'wljp_signup_as', 'candidate' );

	        wp_set_current_user( $user_id, $username );
	        wp_set_auth_cookie( $user_id );
	        do_action( 'wp_login', $username );

			wp_send_json_success( array( 'message' => __( 'Thank you for signing up.', WL_JP_DOMAIN ), 'reload' => true ) );
		}
		wp_send_json_error( $errors );
	}

	/* Update Account Settings */
	public static function update_account_settings() {
		$email            = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : NULL;
		$password         = isset( $_POST['password'] ) ? $_POST['password'] : NULL;
		$confirm_password = isset( $_POST['confirm_password'] ) ? $_POST['confirm_password'] : NULL;

		/* Validations */
		$errors = [];
		if ( empty( $email ) ) {
			$errors['email'] = __( 'Please provide email address.', WL_JP_DOMAIN );
		}

		if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
			$errors['email'] = __( 'Please provide a valid email address.', WL_JP_DOMAIN );
		}

		if ( empty( $password ) ) {
			$errors['password'] = __( 'Please provide password.', WL_JP_DOMAIN );
		}

		if ( empty( $confirm_password ) ) {
			$errors['password_confirm'] = __( 'Please confirm password.', WL_JP_DOMAIN );
		}

		if ( $password !== $confirm_password ) {
			$errors['password'] = __( 'Passwords do not match.', WL_JP_DOMAIN );
		}
		/* End validations */

		if ( count( $errors ) < 1 ) {
			$data = array(
				'ID'         => get_current_user_id(),
			    'user_email' => $email,
			    'user_pass'  => $password
			);

			$user_id = wp_update_user( $data );
			if ( is_wp_error( $user_id ) ) {
				wp_send_json_error( __( $user_id->get_error_message(), WL_JP_DOMAIN ) );
			}

			wp_send_json_success( array( 'message' => __( 'Account settings updated.', WL_JP_DOMAIN ) ) );
		}
		wp_send_json_error( $errors );
	}
}