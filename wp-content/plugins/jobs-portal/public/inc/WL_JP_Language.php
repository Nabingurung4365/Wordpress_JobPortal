<?php
defined( 'ABSPATH' ) || die();

class WL_JP_Language {
	public static function load_translation() {
		load_plugin_textdomain( WL_JP_DOMAIN, false, basename( WL_JP_PLUGIN_DIR_PATH ) . '/languages' );
	}
}