<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'laalizakia' );

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
define( 'AUTH_KEY',         'eFCiI2D6bzJ;%%DL{|>quiTFn1SFa uyy>nakT|VN#ng*`T^1wF$]] 1A .aP Kr' );
define( 'SECURE_AUTH_KEY',  'V<?T#&iWp_ua<{%[&NNT1J;MiKHJsJ;x*W<*mux&wo94VncJRN xn+&sgZR?]4CJ' );
define( 'LOGGED_IN_KEY',    '4e}LR:R./Z5M>/MA?BveDkY|N2{DIUGc5~juj!$JwtFkno/M) {ohl8MWI{2l]8K' );
define( 'NONCE_KEY',        '.RdvUq.=I!RL)WHt,Kb5AjDvaDyTjMn`bR,><L7wv]%dHv5-R^swNKkp!%/;j+=h' );
define( 'AUTH_SALT',        'Xy`EbDHowDg6G:;M:iG{GI#^Kaw&-#@1b jLfD6e]c,N:v*,!/$3=l*k<14GdTxR' );
define( 'SECURE_AUTH_SALT', 'yBzAH1IMeKB/jc6DJ_IWRd2UrX?xR<32&<H.`or$dWnq`d,lCYO=_v:4U>!5M?81' );
define( 'LOGGED_IN_SALT',   'uv5.Z9xltuQI,G2>(;ZaUc+ZEu9h6T|I:l8GnGC?uz?hgM;H^*WH~KM4R~h@itX9' );
define( 'NONCE_SALT',       '1IGR<V(!ST#t2r|Rc`,CQ^XC><(G-P{T9sVi5{>zR[XpZPoA1xQ^>G{ExEZYQD?x' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
