<?php
defined( 'ABSPATH' ) || die();

require_once( WL_JP_PLUGIN_DIR_PATH . 'includes/WL_JP_Helper.php' );

class WL_JP_Menu {
	/* Add menu */
	public static function create_menu() {
		$dashboard = add_menu_page( esc_html__( 'Jobs Portal', WL_JP_DOMAIN ), esc_html__( 'Jobs Portal', WL_JP_DOMAIN ), 'manage_options', 'job_portal_dashboard', array( 'WL_JP_Menu', 'dashboard' ), 'dashicons-megaphone', 27 );
		add_action( 'admin_print_styles-' . $dashboard, array( 'WL_JP_Menu', 'dashboard_assets' ) );

		$dashboard_submenu = add_submenu_page( 'job_portal_dashboard', esc_html__( 'Dashboard', WL_JP_DOMAIN ), esc_html__( 'Dashboard', WL_JP_DOMAIN ), 'manage_options', 'job_portal_dashboard', array( 'WL_JP_Menu', 'dashboard' ) );
		add_action( 'admin_print_styles-' . $dashboard, array( 'WL_JP_Menu', 'dashboard_assets' ) );

		$jobs = add_submenu_page( 'job_portal_dashboard', esc_html__( 'All Jobs', WL_JP_DOMAIN ), esc_html__( 'All Jobs', WL_JP_DOMAIN ), 'manage_options', 'edit.php?post_type=job' );

		$jobs = add_submenu_page( 'job_portal_dashboard', esc_html__( 'Add New Job', WL_JP_DOMAIN ), esc_html__( 'Add New', WL_JP_DOMAIN ), 'manage_options', 'post-new.php?post_type=job' );

		$job_types = add_submenu_page( 'job_portal_dashboard', esc_html__( 'Job Types', WL_JP_DOMAIN ), esc_html__( 'Job Types', WL_JP_DOMAIN ), 'manage_options', 'edit-tags.php?taxonomy=job_type&post_type=job' );

		$industries = add_submenu_page( 'job_portal_dashboard', esc_html__( 'Industries', WL_JP_DOMAIN ), esc_html__( 'Industries', WL_JP_DOMAIN ), 'manage_options', 'edit-tags.php?taxonomy=industry&post_type=job' );

		$departments = add_submenu_page( 'job_portal_dashboard', esc_html__( 'Departments', WL_JP_DOMAIN ), esc_html__( 'Departments', WL_JP_DOMAIN ), 'manage_options', 'edit-tags.php?taxonomy=department&post_type=job' );

		$skills = add_submenu_page( 'job_portal_dashboard', esc_html__( 'Skills', WL_JP_DOMAIN ), esc_html__( 'Skills', WL_JP_DOMAIN ), 'manage_options', 'edit-tags.php?taxonomy=skill&post_type=job' );

		$job_locations = add_submenu_page( 'job_portal_dashboard', esc_html__( 'Job Locations', WL_JP_DOMAIN ), esc_html__( 'Job Locations', WL_JP_DOMAIN ), 'manage_options', 'edit-tags.php?taxonomy=job_location&post_type=job' );

		$settings = add_submenu_page( 'job_portal_dashboard', esc_html__( 'Settings', WL_JP_DOMAIN ), esc_html__( 'Settings', WL_JP_DOMAIN ), 'manage_options', 'job_portal_settings', array( 'WL_JP_Menu', 'settings' ) );
		add_action( 'admin_print_styles-' . $settings, array( 'WL_JP_Menu', 'settings_assets' ) );

		$job_applications = add_submenu_page( 'edit.php?post_type=candidate', esc_html__( 'Job Applications', WL_JP_DOMAIN ), esc_html__( 'Job Applications', WL_JP_DOMAIN ), 'manage_options', 'job_applications', array( 'WL_JP_Menu', 'job_applications' ) );
		add_action( 'admin_print_styles-' . $job_applications, array( 'WL_JP_Menu', 'job_applications_assets' ) );
	}

	/* Dashboard submenu */
	public static function dashboard() {
		require_once( WL_JP_PLUGIN_DIR_PATH . 'admin/inc/views/wljp_dashboard.php' );
	}

	/* Dashboard submenu assets */
	public static function dashboard_assets() {
		/* Enqueue styles */
		wp_enqueue_style( 'wljp-bootstrap', WL_JP_PLUGIN_URL . 'assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'wljp-font-awesome', WL_JP_PLUGIN_URL . 'assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'wljp-admin', WL_JP_PLUGIN_URL . 'assets/css/wljp-admin.css' );

		/* Enqueue scripts */
		wp_enqueue_script( 'wljp-popper-js', WL_JP_PLUGIN_URL . 'assets/js/popper.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'wljp-bootstrap-js', WL_JP_PLUGIN_URL . 'assets/js/bootstrap.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'wljp-admin-js', WL_JP_PLUGIN_URL . 'assets/js/wljp-admin.js', array( 'jquery' ), true, true );
	}

	/* Settings submenu */
	public static function settings() {
		require_once( WL_JP_PLUGIN_DIR_PATH . 'admin/inc/views/wljp_settings.php' );
	}

	/* Settings submenu assets */
	public static function settings_assets() {
		/* Enqueue styles */
		wp_enqueue_style( 'wljp-admin', WL_JP_PLUGIN_URL . 'assets/css/wljp-admin.css' );
		wp_enqueue_style( 'wljp-toastr', WL_JP_PLUGIN_URL . 'assets/css/toastr.min.css' );

		/* Enqueue scripts */
		wp_enqueue_script( 'wljp-admin-js', WL_JP_PLUGIN_URL . 'assets/js/wljp-admin.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'wljp-toastr-js', WL_JP_PLUGIN_URL . 'assets/js/toastr.min.js', array( 'jquery' ), true, true );
	}

	/* Job applications submenu */
	public static function job_applications() {
		require_once( WL_JP_PLUGIN_DIR_PATH . 'admin/inc/views/wljp_job_applications.php' );
	}

	/* Job applications submenu assets */
	public static function job_applications_assets() {
		/* Enqueue styles */
		wp_enqueue_style( 'wljp-bootstrap', WL_JP_PLUGIN_URL . 'assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'wljp-font-awesome', WL_JP_PLUGIN_URL . 'assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'wljp-admin', WL_JP_PLUGIN_URL . 'assets/css/wljp-admin.css' );

		/* Enqueue scripts */
		wp_enqueue_script( 'wljp-popper-js', WL_JP_PLUGIN_URL . 'assets/js/popper.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'wljp-bootstrap-js', WL_JP_PLUGIN_URL . 'assets/js/bootstrap.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'wljp-admin-js', WL_JP_PLUGIN_URL . 'assets/js/wljp-admin.js', array( 'jquery' ), true, true );
	}
}