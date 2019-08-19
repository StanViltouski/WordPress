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
define( 'DB_NAME', 'stone-lab' );

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
define( 'AUTH_KEY',         '9V$u5B :cZxG* 2K:~VWHtEz:L*n]X;:KM6]YQSelEFI=}w_jv#g(i~RwImVC.e.' );
define( 'SECURE_AUTH_KEY',  '+EKC}61V]dJZo;ZT#C^N*T?Y2smpsRGW2*o^k(%^_6^xC~Mjk(@rzQf-Sjb[ 2Dt' );
define( 'LOGGED_IN_KEY',    ':KWAV/NKNyn(jYv2ty8b.z&J ;l2<)&LzNJTJ/hxx3aEp)*D*M}ZT@i[)Y5SFWF~' );
define( 'NONCE_KEY',        'w9D-VrLgiigI>)mDTvRax0B(,TK,Hn3aUKb1ELctkt[,]#/9n6uAIV=6c`]UQk&|' );
define( 'AUTH_SALT',        ';l1EXPN*4&qRpoZe=vP>qP*:$Q.J<<B[_Q;EP%SM!6 #z@uy9+ON,#W]>{vp.6!w' );
define( 'SECURE_AUTH_SALT', '?R>ntv=Ca)516RyJSoqgd@EEWvnlvk}=dhwczL(3Ka/E6#m6:QS2bz@IH>sT%xT]' );
define( 'LOGGED_IN_SALT',   'a_Nmbf`bD089`zabS~lWL(8aiCQX]h$t6OjO(nYYRSAlE.=cP@K>0P^Put/o4{-!' );
define( 'NONCE_SALT',       'y2`1wdC~6l}QQ[pCxLZfA(>Ck)ct5N!|/hmnTe16e~HG(~j^>03b@K,TD{<B/o0m' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
