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
define( 'DB_NAME', 'weblearning' );

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
define( 'AUTH_KEY',         '`?F{8j?^;KU*So48alOtsL]6|:6FNg/&mYoix$wX*mU@lz:X^6o_wDkRUdt}qK6>' );
define( 'SECURE_AUTH_KEY',  '(t-u$kvSg{X 6PeDYq1m{DHwA,t%:h5Y8^[oG%zzK]LS)$LaQzT4a(JAIB((P%uZ' );
define( 'LOGGED_IN_KEY',    '?V)2$bV=GSh8s2#R2.utj$tz^yn%{9njr;nYLT$7 I=97Di$,X]fa=~416k$C;Nd' );
define( 'NONCE_KEY',        ',5F~h.=#kq*i6T5gIVH2JV*8R|)kT7rmn06UB3iVO@ Y?9oFypWLL2C$ptI6G|*x' );
define( 'AUTH_SALT',        '&H;3$%YL`#QjHlxhQBAUVR zj) x,15OazT5:@vCT/[CsgYySoY|2FDs|CljZ<C7' );
define( 'SECURE_AUTH_SALT', ':[9I+MN*&|>x@+Ze[3y~DTZl5&3SuT%w=1rbl@%Kt=%.!QD2EJ[V*SCMGpvJjeEU' );
define( 'LOGGED_IN_SALT',   '~//RakqaE{pKQoi9JzRZAmN.t34Mfn`|@LBwCy/qJGo|u*8LeM}<+)U|s.M<+%*s' );
define( 'NONCE_SALT',       '^}/WGGWv;IXSC!^dz=3c,:5w(_HZ+=Bt&ZJUnSxTh4Ws^KK#n`{$7Q.hCsoQMT-u' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
