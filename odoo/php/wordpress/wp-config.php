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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mydatabase' );

/** Database username */
define( 'DB_USER', 'myuser' );

/** Database password */
define( 'DB_PASSWORD', 'mypassword' );

/** Database hostname */
define( 'DB_HOST', 'mysql' );

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
define( 'AUTH_KEY',         '}3[&H$^)W}y%`iA0w{.]tm~ZJ.~TQ!a4c|G$pk_w|4#tpoHU(S6M?6l58>4nn4q5' );
define( 'SECURE_AUTH_KEY',  '!5A6,-C[?PqO@KM]k<X|S_tZHViK*]~((hjPIvhg8M$Tx$?y4>~<;#2xqX!)`.]?' );
define( 'LOGGED_IN_KEY',    'g3rWU8NKy0Sq:_bdSv.i` f4TiE}igG< C4w)ZydU#Yc?w=yggOxI2>kE9M0&q6k' );
define( 'NONCE_KEY',        '3c)%n@[ut3MLb>][syqC^Nx5%/$ai`n `5fSQQRPa[<vL_z;yt}-T6] E9CfFUfz' );
define( 'AUTH_SALT',        '6YKU?}NJb#`a!qSaXFLZadg@OT}>U%vzY7~R_FTJo5zL_I(S!PoZ/f[Gr{ PQzj&' );
define( 'SECURE_AUTH_SALT', '}v}jY|6EO(^u,c#NTI/hBU,3J<_sOJ]~WBs<p@Wi(DpE;=GAj`98f_A,7m4^.[kP' );
define( 'LOGGED_IN_SALT',   '-XZgGpo[fFn79Zwg|b&5*lN(sOX`f(Q92RRecCwO#i6a;PSr!,bJUzp/WFy/&+_9' );
define( 'NONCE_SALT',       'm~dpEY9T(&L}*7#zf18{r}epQugz(%y,NaX%{/IiX>je{GK|%I1`SW]{k?kifDj>' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
define('FS_METHOD','direct');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
