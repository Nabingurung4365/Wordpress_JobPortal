<?php
/*
 * Plugin Name: Jobs Portal
 * Plugin URI: 
 * Description: A powerful and robust plugin to create and manage job portal on your WordPress website where recruiter can post job requirements. Also, applicants can filter jobs and apply to a job in an easy and elegant way.
 * Version: 1.1
 * Author: Weblizar
 * Author URI: https://weblizar.com/
 * Text Domain: WL-JP
*/
defined( 'ABSPATH' ) || die();

if ( ! defined( 'WL_JP_DOMAIN' ) ) {
	define( 'WL_JP_DOMAIN', 'WL-JP' );
}

if ( ! defined( 'WL_JP_PLUGIN_URL' ) ) {
	define( 'WL_JP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'WL_JP_PLUGIN_DIR_PATH' ) ) {
	define( 'WL_JP_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'WL_JP_PLUGIN_BASE_NAME' ) ) {
	define( 'WL_JP_PLUGIN_BASE_NAME', plugin_basename( __FILE__ ) );
}

final class WL_JP_Jobs_Portal {
	private static $instance = null;

	private function __construct() {
		$this->initialize_hooks();
		$this->setup_database();
	}

	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function initialize_hooks() {
		if ( is_admin() ) {
			require_once( WL_JP_PLUGIN_DIR_PATH . 'admin/admin.php' );
		}
		require_once( WL_JP_PLUGIN_DIR_PATH . 'public/public.php' );
	}

	private function setup_database() {
		require_once( WL_JP_PLUGIN_DIR_PATH . 'admin/inc/WL_JP_Database.php' );
		register_activation_hook( __FILE__, array( 'WL_JP_Database', 'activation' ) );
		register_deactivation_hook( __FILE__, array( 'WL_JP_Database', 'deactivation' ) );
		register_uninstall_hook( __FILE__, array( 'WL_JP_Database', 'deactivation' ) );
	}
}
WL_JP_Jobs_Portal::get_instance(); ?>