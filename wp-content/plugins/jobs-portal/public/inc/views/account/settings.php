<?php
defined( 'ABSPATH' ) || die(); ?>

<div class="col-sm-12 col-md-4 card p-3 mt-3">
	<header>
		<div class="wljp-account-heading p-3">
			<span><?php _e( 'Account Settings', WL_JP_DOMAIN ); ?></span>
		</div>
	</header>
	<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" id="wljp-account-form" class="wljp-account-form">
		<?php
			$user             = wp_get_current_user();
			$account_email    = $user->user_email;
			$account_username = $user->user_login;
		?>
        <input type="hidden" name="action" value="wljp-account">

		<div class="form-group mt-4">
			<label><?php _e( 'Username', WL_JP_DOMAIN ); ?></label><br>
			<span><?php echo $account_username; ?></span>
			<a href="javascript:void(0)" id="wljp-change-password-email-button" class="ml-2"><?php _e( 'Change Password', WL_JP_DOMAIN ); ?></a>
		</div>

		<div class="wljp-change-password-email">
			<div class="form-group">
				<label for="wljp-account-email"><?php _e( 'Email Address', WL_JP_DOMAIN ); ?></label><br>
				<input type="email" name="email" id="wljp-account-email" class="w-100 d-block col" value="<?php echo $account_email; ?>">
			</div>

			<div class="form-group">
				<label for="wljp-signup-password"><?php _e( 'Password', WL_JP_DOMAIN ); ?></label>
				<input type="password" name="password" id="wljp-signup-password" class="w-100 d-block col">
			</div>

			<div class="form-group">
				<label for="wljp-account-confirm-password"><?php _e( 'Confirm Password', WL_JP_DOMAIN ); ?></label>
				<input type="password" name="confirm_password" id="wljp-account-confirm-password" class="w-100 d-block col">
			</div>

			<div class="float-right wljp-account-submit-block">
				<button type="submit" class="wljp-account-submit"><?php _e( 'Update', WL_JP_DOMAIN ); ?></button>
			</div>
		</div>
	</form>
</div>