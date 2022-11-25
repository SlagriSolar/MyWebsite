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
define( 'DB_NAME', 'codeanddesign' );

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
define( 'AUTH_KEY',         '3kkh/~kYAzx.nEf5xKsE;A5W{PYwM<M/f=LEOcU1R5AGtfE&vdg?OhL#fHI`m+)-' );
define( 'SECURE_AUTH_KEY',  'da:2:IwA2O>vl,5EnOwa-76nY VR9p&tt77W25%/qTC5*Vc0qN[Jh2s3}Qgv[2Ir' );
define( 'LOGGED_IN_KEY',    'k|^5/@P&uu[qYR;|9e;ipJo:}[3ZHSM{M`4o{CcM6;)sv(>We>oUJBQkU*~5r$[s' );
define( 'NONCE_KEY',        '`)}Bq?JBAxt!=,Z5Vs.Ko~/TBPUI28WjV?1NYPKU-,1mSArU4,Pw_<8CjVzL>cdQ' );
define( 'AUTH_SALT',        'Uz7$DcIzu~#MF7JOg (v.!6|=Tj8FgjsMpGIEEO5py/yG!l/vIw@J]cSw]/YtQ4I' );
define( 'SECURE_AUTH_SALT', '3!fY`neY=ZWT6SBh80W<1A-ft+LDi(fshatz4=A>YJ$pPwpmKtn3T+mm[RxlTA,H' );
define( 'LOGGED_IN_SALT',   'W,oD4vYW4gJ]}iU q_0chX<^6,luHX2)K3k/89WbW0u=zEBl390c&Q`@y(aC|ez=' );
define( 'NONCE_SALT',       '6lUOn]*wYX,TxNDiCdWe:ivW(.Hb<<B|}753|V+U&XNF<q=&y=0Izu3]s#ae`S#x' );

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
