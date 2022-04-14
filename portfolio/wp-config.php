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
define( 'DB_NAME', 'portfolio' );

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
define( 'AUTH_KEY',         'd2 4KjeRX+]zK|ST!e,ChMV.W!M0IraG WUT;lLl#goD}NoxR- nmfJ)h0.`0,3b' );
define( 'SECURE_AUTH_KEY',  'jYX^ 3%Nl).</C4!<(@B-a_KBkBvzu,a/}yn/qBc*dK_Si(qipF2hz/XU.b`K-e;' );
define( 'LOGGED_IN_KEY',    ' _~T~^2jCaNu:C9A}H/Dw ~x) N8wepwK{2wD.-ym4{c Ub;uZ6]>ybDF5t4;8%d' );
define( 'NONCE_KEY',        '_@l.~eQ9~TO)nTmd`=axV*Sc4E=8KmQH?ID8O/uM&Su$0~t/_X{b]rohwY-[Ie33' );
define( 'AUTH_SALT',        'R,56>rN)2}tiB8,V!Xk582_E>%`)5JvhdS2}28J/2f}#n{kl4ud>zd`EwsfTmXm|' );
define( 'SECURE_AUTH_SALT', '4jBLE9ekG!7JPXoT_CV|/e!bp}.&seK{dr:kS<2QyqZby%d-UAQr+s,}P^<]3D+p' );
define( 'LOGGED_IN_SALT',   'VqfmOMD_uWeB%Xu7r:pUiP0t*)H8P:@Vu]L/@K$`.!T3Vf&~8^(l80PSc(F:)fNV' );
define( 'NONCE_SALT',       '>SWJU[fPE;g!f$scxC6OUj33iQf2#W8-?dRNB_Z7r3R(atS-Sm]8rNQ},< w(5M/' );

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
