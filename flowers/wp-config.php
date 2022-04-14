<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'flowers' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ZwM!*G8daQgJY]7&&zjRquu2JD&Ru9s^T`~r<wLhA4#CPwj|]`uBPj8grZ.fqv2L' );
define( 'SECURE_AUTH_KEY',  'RQ5sQW{O.c@)ofB@L W]D0X,+E!tx)r]WbBR[_IpbX=q.yJmi~:1Id1T9.[o/y7p' );
define( 'LOGGED_IN_KEY',    '3{m<FIj;+y*k7 (Ggp+jONByYbz,$i`Rb2H da2)JVA=@?m)w> fG_Qw5L$(p2 F' );
define( 'NONCE_KEY',        '{AI-jw1?okReuC!/!Pw u1$7/E_|} j!OQYDK=R&JQm2uOQv+U|)BoRbFcAZruHS' );
define( 'AUTH_SALT',        'Z~l-Y7K<@T4uF^uJx0ExAVn)HxJFVNC$oIzvk;Z<IwOS+=[X<zR| nf!LsC2lIp8' );
define( 'SECURE_AUTH_SALT', ']1h9_`c!K-B&Py.2_%WBDNiwfORTf+UKNmHl]lw;w.|7AyD-|`Ep<oahw4nVSEj4' );
define( 'LOGGED_IN_SALT',   'Z*CG(?RFWAz) S6](v^;W6Y/+4LTd3NbNcX%m6:yGFH4<_oA),]1qh@ z7|&fEUh' );
define( 'NONCE_SALT',       '.S%,[G@)lc}|gdo R+[>,3N&ZirCjr}0|Hv<]q:v%F1@DWX }[VRyzxJW+WF]|zr' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
