<?php
define( 'WP_CACHE', true );

//Begin Really Simple Security session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple Security cookie settings
//Begin Really Simple Security key
define('RSSSL_KEY', 'RXisb7e43zAvQ7cBzkz50VAcdF8c59oi9Vyp944c8tBTIowPwPH61AS20Mt2wvh7');
//END Really Simple Security key

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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u226560931_wp_pragmatico' );

/** Database username */
define( 'DB_USER', 'u226560931_wp_pragmatico' );

/** Database password */
define( 'DB_PASSWORD', 'mhJn%uU9Fg^AfO' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );


define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);


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
define( 'AUTH_KEY',         '=%b46PmGrVPhN&u|mE>ae{E]~.B4Ipr^zLlp66Hw^&Z&^Lc:NW=]{WbPffJ6+2Iz' );
define( 'SECURE_AUTH_KEY',  'x$z$-__Ne,DFdYPi6CI2@+h++n7SD@5UZilOvC3?Wd1yj;f)I6+JUOjG=lu=e/U4' );
define( 'LOGGED_IN_KEY',    '/jA-ZBm}es{:~kpi2dINd [NQcN[|Y$h^AVJIPP3-Cz/nhn>JGiH;eWW[huOMZZ1' );
define( 'NONCE_KEY',        ')2i9g?1[,F@-#rM,@EMyCj)8LA9+g;aK+33BJ]+R3Nqa*-TcS#UoC2PE37vc]9l6' );
define( 'AUTH_SALT',        'y,9pyU~fFTsyvj*fb^-=FmJ,F00rcj^`UCD3NUfRIL>BL_/?1r50$n4$dPa:u-B5' );
define( 'SECURE_AUTH_SALT', 'czVTT 1CP?)%<8[e4+F9Xm]ZTw?,<pROJ[pX%&j7.#q*mZs#Y[yl})TA5,fRLSNZ' );
define( 'LOGGED_IN_SALT',   '2%C/`;{K>s}`Ogt<rG$wY+1[`hLG3w?(zCpLg!}uA1x(e)US9^]u*{(:P :T-Ko?' );
define( 'NONCE_SALT',       '@!nWz3:F:h!p.RmRI@jxvj^8!yS9:Aif~sNNyFQqv)JVE+kj2>G^c=%1~v*_-Ka~' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
