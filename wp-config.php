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
define( 'DB_NAME', 'VPS' );

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
define( 'AUTH_KEY',         'EKu3r2+k<6rr}$_vu0VK,F6nz@_xvP+3z|OD@yd{0Jc=x_eZvxx&L0%d7Z$5Hjt!' );
define( 'SECURE_AUTH_KEY',  ';QnZz^XH WbBp~sKeH>M -_atyw$g8a!@xv@Z{`%-R$Kwpr<sR;PSOLNg*|*m&m/' );
define( 'LOGGED_IN_KEY',    '.7W/VH@1[zna,}w0T6u9mTp5,X{JA<ADM()2zFf:v6X(wuV+CbR4C%~V,u0nl6Qf' );
define( 'NONCE_KEY',        'r-fRhHh:h2wca2>]a0^|)biF4l/0Z*[|*O_seMgG.?L8(sPc8$Na`ts=q-2EU@`@' );
define( 'AUTH_SALT',        'm5#(|aQ(}GR<K.Xmq>UtZXif $!6>4I=uni?N_Nd5<BOG:g:jhWZFJT+!.oMlI6r' );
define( 'SECURE_AUTH_SALT', '%uz25I|hS#a&<dzzTl^=g5&Cf8-UxmUg7AV=Jb6X[2-;N3Q`#`:o&_(>bB1r5J8!' );
define( 'LOGGED_IN_SALT',   ':;O,D-cbBPa|A>#Q>}eDW99 oCN]c K-xN.[EQ]]*h^91_X5ZWZaJ*FnB73h&u-|' );
define( 'NONCE_SALT',       '6}lo/2|9?nB1Ndq.P 5n<L]9Mn)h@J5v/p0nd}m%wb$BbZgLq/PPc0uLT(+%H~T[' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
