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
define('DB_NAME', 'gsn');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** define Encryption key */
define('ENCRYPTION_KEY', '10f94de8193835eb828b73210d1d0d89');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ').YY]R{~:C,Zj`l#WffC #Wl*3[5h?[GWK=a~n[[aR1_e2I/FS})np!]VK?$>7e[');
define('SECURE_AUTH_KEY',  'Z6yK14B}iVT(h2Ot0*]$}|L^kXrCiYo,i/-`QrZs-Wjq_}>bx>qGpw@/a(BD<L2+');
define('LOGGED_IN_KEY',    '0rfl-,$:+ha0<4:x,g&7M4jUqtsPZ7pu~5sd48f`-D2Rh3bdq7<etpn?hgj]T;d@');
define('NONCE_KEY',        '*I<=eU>25))}RD%3b))%ty3,#65y*jQu0sLL/iz9E?*GpfY|Yi}{VMxzAs+Dy+ey');
define('AUTH_SALT',        'M3v:Euy,vtow<@nI%t6r8,/:PSMf@Z=[Ul2/0#B/%3{s/aFz`_[ OjJfu&m>o8Hw');
define('SECURE_AUTH_SALT', 'I[2)XB?GzZy^U+~5BP5&L(pW:D$C)qI:8q7|XLaw@b1RRS9JHz-4[-U! a~f;:.[');
define('LOGGED_IN_SALT',   'P!A5hhIJU; 4yZ.ysI(Mbw.%iuo] 8enA2%v}V?U;VY{:H@T;Rgg~iWXZvO)WOso');
define('NONCE_SALT',       '10&b69M1:h)25<0f0AQ+`Q^<`d_~{f`iAHQ h8^,nW/TD:,upWJDd[*D2B;-Q >Q');

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
ini_set('log_errors','On');
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


