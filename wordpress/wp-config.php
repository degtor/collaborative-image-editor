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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|4c02vlSMp_5Q[X{wVD=gCkS(-jPSsL5np{Gxo8Z#<%0~mTtFIlQ1x[FU*Rt|X)c');
define('SECURE_AUTH_KEY',  ' ?x|i-=|R6DE|`d|#M|)@1]*6/HwV+)XGP4t?-T++HN7F9^f.~Ug{$;OQB0O2.K[');
define('LOGGED_IN_KEY',    '>0;K(V5pOn$XqAE7|k7/iPDxu;#<jif Z7_|AbmHEm$+]r{[?{fP|IZ`aUhj|Y8 ');
define('NONCE_KEY',        '5(=|--{I}q)DD1MrDL1a}H-LyY%G :er6Y>+O<$ebT*bB(?~~}%nZUBt+UE%h@0k');
define('AUTH_SALT',        '@b[(W(ZRp8yI+6KjDx:yo/oYcQOxB_hdEK/be&TYb8dlr3/&-H-/;Iy#6qQ<vx2&');
define('SECURE_AUTH_SALT', 'uSIoyb`,LGQ9]&uYBN?25tVxw9/=+(}p|vs95;<vlMC 5u:I3m>d%9O.8_zPqEv]');
define('LOGGED_IN_SALT',   ':+VJKiH L G|*O%F!O5vxx-/O_!3+`tCgt2 W^[A>g8QUvi0Y^+,_;+gKF@^Nb}w');
define('NONCE_SALT',       '4&[DP~bsVaUZpPF}r.7{$r:-mQ6f9&x*!PqC>]KPPyCCqGc.-J?;L1!(`j0LqAUd');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
