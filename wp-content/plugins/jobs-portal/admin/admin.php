<?php
defined( 'ABSPATH' ) || die();

require_once( WL_JP_PLUGIN_DIR_PATH . 'admin/inc/WL_JP_Job.php' );
require_once( WL_JP_PLUGIN_DIR_PATH . 'admin/inc/WL_JP_Candidate.php' );
require_once( WL_JP_PLUGIN_DIR_PATH . 'admin/inc/WL_JP_Menu.php' );
require_once( WL_JP_PLUGIN_DIR_PATH . 'admin/inc/WL_JP_Setting.php' );
require_once( WL_JP_PLUGIN_DIR_PATH . 'includes/WL_JP_Helper.php' );

/* Add plugin settings link */
add_filter( "plugin_action_links_" . WL_JP_PLUGIN_BASE_NAME, array( 'WL_JP_Setting', 'add_settings_link' ) );

/* Add metaboxes */
add_action( 'add_meta_boxes', array( 'WL_JP_Job', 'add_meta_boxes' ) );
add_action( 'add_meta_boxes', array( 'WL_JP_Candidate', 'add_meta_boxes' ) );

/* Enqueue scripts and styles */
add_action( 'admin_enqueue_scripts', array( 'WL_JP_Job', 'enqueue_scripts_styles' ) );
add_action( 'admin_enqueue_scripts', array( 'WL_JP_Candidate', 'enqueue_scripts_styles' ) );

/* Save metaboxes */
add_action( 'save_post', array( 'WL_JP_Job', 'save_metaboxes' ), 10, 2 );
add_action( 'save_post', array( 'WL_JP_Candidate', 'save_metaboxes' ), 10, 2 );

/* Change title text */
add_filter( 'enter_title_here', array( 'WL_JP_Candidate', 'change_title_text' ) );

/* Set candidate columns */
add_filter( 'manage_candidate_posts_columns', array( 'WL_JP_Candidate', 'set_columns' ) );

/* Create menu */
add_action( 'admin_menu', array( 'WL_JP_Menu', 'create_menu' ) );

/* Register settings */
add_action( 'admin_init', array( 'WL_JP_Setting', 'register_settings' ) );
?>