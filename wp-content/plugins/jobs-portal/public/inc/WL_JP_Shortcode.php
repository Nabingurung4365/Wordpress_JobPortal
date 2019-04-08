<?php
defined( 'ABSPATH' ) || die();

class WL_JP_Shortcode {
	/**
	 * Add job_portal shortcode
	 * @param  array $attr
	 * @return void
	 */
	public static function job_portal( $attr ) {
		ob_start();
		require_once( WL_JP_PLUGIN_DIR_PATH . 'public/inc/views/wljp_job_portal.php' );
		return ob_get_clean();
	}

	/**
	 * Add job_portal_account shortcode
	 * @param  array $attr
	 * @return void
	 */
	public static function job_portal_account( $attr ) {
		ob_start();
		require_once( WL_JP_PLUGIN_DIR_PATH . 'public/inc/views/wljp_job_portal_account.php' );
		return ob_get_clean();
	}

	/**
	 * Enqueue shortcode assets
	 * @return void
	 */
	public static function shortcode_assets() {
		global $post;
		if ( is_a( $post, 'WP_Post' ) ) {
			if ( has_shortcode( $post->post_content, 'job_portal' ) || has_shortcode( $post->post_content, 'job_portal_account' ) ) {
				/* Enqueue styles */
				wp_enqueue_style( 'wljp-bootstrap', WL_JP_PLUGIN_URL . 'assets/css/bootstrap.min.css' );
				wp_enqueue_style( 'wljp-font-awesome', WL_JP_PLUGIN_URL . 'assets/css/font-awesome.min.css' );
				wp_enqueue_style( 'wljp-toastr', WL_JP_PLUGIN_URL . 'assets/css/toastr.min.css' );
				wp_enqueue_style( 'wljp-fSelect', WL_JP_PLUGIN_URL . 'assets/css/fSelect.css' );
				wp_enqueue_style( 'wljp-public', WL_JP_PLUGIN_URL . 'assets/css/wljp-public.css' );

				/* Enqueue scripts */
				wp_enqueue_script( 'jquery-form' );
				wp_enqueue_script( 'wljp-popper-js', WL_JP_PLUGIN_URL . 'assets/js/popper.min.js', array( 'jquery' ), true, true );
				wp_enqueue_script( 'wljp-bootstrap-js', WL_JP_PLUGIN_URL . 'assets/js/bootstrap.min.js', array( 'jquery' ), true, true );
				wp_enqueue_script( 'wljp-toastr-js', WL_JP_PLUGIN_URL . 'assets/js/toastr.min.js', array( 'jquery' ), true, true );
				wp_enqueue_script( 'wljp-moment-js', WL_JP_PLUGIN_URL . 'assets/js/moment.min.js', array(), '', true );
				wp_enqueue_script( 'wljp-fSelect-js', WL_JP_PLUGIN_URL . 'assets/js/fSelect.js', array( 'jquery' ), true, true );
				wp_enqueue_script( 'wljp-public-js', WL_JP_PLUGIN_URL . 'assets/js/wljp-public.js', array( 'jquery' ), true, true );
				wp_enqueue_script( 'wljp-public-ajax-js', WL_JP_PLUGIN_URL . 'assets/js/wljp-public-ajax.js', array( 'jquery' ), true, true );
				wp_localize_script( 'wljp-public-ajax-js', 'WLJPAjax', array( 'security' => wp_create_nonce( 'wljp' ) ) );
				wp_localize_script( 'wljp-public-ajax-js', 'wljpajaxurl', esc_url( admin_url( 'admin-post.php' ) ) );
				wp_localize_script( 'wljp-public-ajax-js', 'WLJPAdminUrl', admin_url() );
			}
		}
	}
}