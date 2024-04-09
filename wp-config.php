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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '[MvmApC9CgPwRF2kU!Qt7YxMqcz8-GimZ*~Gm,UotzL>-2daIGtQOf`;7D+7{zn~' );
define( 'SECURE_AUTH_KEY',   '61IImMg|a&BV#mgsvzx;OJU%.jtj!s!c7N*:/M&gOKkeJk^o~-Qf_6@r~~BK=Bqw' );
define( 'LOGGED_IN_KEY',     '^H^R:eo-PR` Q9uv[T[,50[(.;QkQ,n@!cXN6&@c!9IVff|_.3 TckdnKi@i~(b]' );
define( 'NONCE_KEY',         'N^GTNXq|lZQaS<JYPeZOTDDbA2D1_k$(zngvtc%jJb7K{+J[:(fIq`2lo!BRv 5N' );
define( 'AUTH_SALT',         'opM]WVrfJ>G /|)Vx|VG_megzLK]4r)9F9@Oj/p?gju};5h:W.eFy/>l1M|;Lxn4' );
define( 'SECURE_AUTH_SALT',  'kEuTE`?Mi[w1p,VNi, XKin(w|*>BK]-p%rnx7>7o3)=dpA_&foJwYFViJOWT2`T' );
define( 'LOGGED_IN_SALT',    'f+K5`!H=qnAwhy=^9F(w4ji 7bX1Z88;F(`4`N,b(aNLGJdExQ~uOtcy?l.X[$jR' );
define( 'NONCE_SALT',        '+y7[a4Qp9)10{n,/RVm[w[<+KSvZt}!t:n3Vr^n8({20AP$3iDuQR|<.{w:#pT~[' );
define( 'WP_CACHE_KEY_SALT', 'LePOiws0Bk<h/6t+xkdCF7^|gXY52JGTk_BybeX3ogL`.y=(YzxV_$Hw$OChrlF0' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
