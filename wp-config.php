<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'jobportal' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'lAP2b[k{#QS-BL(g=3n3[:$zyWy/)eV?3G(&v<Gb/,TMcrDhP1{hx, zba`FeYb9' );
define( 'SECURE_AUTH_KEY',  'SjS,CL{Q(E/%TSJXmD<7yg5}-9<,j{l>jg.W>4KeWxheCl>M`5,c-IBxJKz7XRT~' );
define( 'LOGGED_IN_KEY',    '5c3zo-9%jIAt3fP>_..[)vRpd{$o.!=`+xF9,AuCuhZM,^ct{E~}eQkzr|jzNqFY' );
define( 'NONCE_KEY',        'Gwx$]9h5K*ip]u8D:.}fHm_iF|~RO-Dj`ztx8aAnaV?<aXK9O$=C/#a]$K+;t=&C' );
define( 'AUTH_SALT',        'zXQ3rYuwt>poy:Zo/)!pBg!G]JzqI2#i0-e@qgA*;X}n,E*c$mvdnb+YdWgr!e!E' );
define( 'SECURE_AUTH_SALT', 'p0w{6v|mXc58eQxxlfGmxsD0w?y6:Y.F6<]6b>NSz}fo2T{[H^Fbm~^qB,}il5H]' );
define( 'LOGGED_IN_SALT',   '40j4()$iwH*90cub{zuj+:J-NvnosN2.^wi1? *U0|HP5PbQJ_Eob9i>g:/NR=yB' );
define( 'NONCE_SALT',       'Sr_-pWh P<J{}84ibfmus.S]^JEM?en$2;O5 0+R=8UQ%Z^6$!|Isk9uNY_IWI1J' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'jp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
