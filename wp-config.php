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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_shi_new' );

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
define( 'AUTH_KEY',         'E,j^S.4ZCmZxL_wyk$R,<ur<g)D2EmwHr?, YGGk<!W3]d ;`[.N1#JD#g_reyk:' );
define( 'SECURE_AUTH_KEY',  ';]4d*Tq|?q!]tChqyqw){^7*x2q(Zk%Yyc5Q.gr)RtPP~ap{CFFi(QBJd:mbqqo#' );
define( 'LOGGED_IN_KEY',    'RG2g&9Y;Rf!XzBM1{}5y@IL_!|<TY2{!s$AIMdJe)Rc7o|GL`IleWL W-/m7`e@H' );
define( 'NONCE_KEY',        ']^;lVRd@*~M]ySJRkI>h#Qx+x+v=0 S{uBYNe&%(Z`]:%[Ua!EMGf-%i@&5nY==0' );
define( 'AUTH_SALT',        'uaa!r6V)jpT&TQNWlwb}5;pk@GX1_A`p1E`OW%pHFb1&qs:lO4?j#<<oC64tIQr-' );
define( 'SECURE_AUTH_SALT', 'kzp]b*r6!GC 27{?&Y^)3~%XEKJ&n4M(W|b<}L79nC`k{Kd%Zgd^Nj|Q1]A=1p{Q' );
define( 'LOGGED_IN_SALT',   '-0S|oru1(e)-[A:B7w.wh>d%Z}%HXNDsz/$)orKxO`M@^D6.8*hk5[Fv{^6Gy|4$' );
define( 'NONCE_SALT',       'gvksd.${<h@lRWU*)sSK5/3#!,w6`usj#_-vm_x;isJhUOu@DAmU3TOE{HM j]x3' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'shi_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
