<?php
defined( 'ABSPATH' ) || die();

$job_portal_page_url = WL_JP_Helper::general_job_portal_page_url();
$account_page_url    = WL_JP_Helper::general_account_page_url();
$is_user_logged_in   = is_user_logged_in();
$signup_as           = 'candidate';
if ( $is_user_logged_in ) {
	$signup_as = get_user_meta( get_current_user_id(), 'wljp_signup_as', true );
}
?>
<div class="container wrap wljp">
	<div class="row justify-content-md-between">
		<div class="col-sm-12">
			<div class="float-right">
				<div class="row">
					<div class="col-sm-12 text-right wljp-job-portal-navigation">
						<a href="<?php echo $job_portal_page_url; ?>" class="wljp-job-portal-link pr-3 mb-3 border-bottom">&#8594; <?php esc_html_e( 'Back to Job Portal', WL_JP_DOMAIN ); ?></a>
					</div>
					<?php if ( $is_user_logged_in ) : ?>
					<div class="col-sm-12 text-right wljp-logout-navigation">
						<a href="<?php echo wp_logout_url( $job_portal_page_url ); ?>" class="wljp-logout-link pr-3 pb-3"><?php esc_html_e( 'Logout', WL_JP_DOMAIN ); ?></a>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php
			if ( $is_user_logged_in ) :
				/* Jobs Applied */
				require_once( WL_JP_PLUGIN_DIR_PATH . 'public/inc/views/account/jobs_applied.php' );
				/* End Jobs Applied */
			endif;
			?>
		</div>
	</div>
	<?php if ( ! $is_user_logged_in ) :
			/* Login - Signup */
			require_once( WL_JP_PLUGIN_DIR_PATH . 'public/inc/views/account/login_signup.php' );
			/* End Login - Signup */
		else : ?>
	<div class="wljp-profile-cv-company row justify-content-md-between">
		<?php
			/* Candidate Profile */
			require_once( WL_JP_PLUGIN_DIR_PATH . 'public/inc/views/account/candidate.php' );
			/* End Candidate Profile */

			/* Account Settings */
			require_once( WL_JP_PLUGIN_DIR_PATH . 'public/inc/views/account/settings.php' );
			/* End Account Settings */
		?>
	</div>
	<?php endif; ?>
</div>