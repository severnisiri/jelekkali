<?php
define( 'WP_CACHE', true );




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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bocohtsn_wp593' );

/** Database username */
define( 'DB_USER', 'bocohtsn_wp593' );

/** Database password */
define( 'DB_PASSWORD', 'p6-8.v(SL][12NL1' );

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
define( 'AUTH_KEY',         'e45x2tljxeaucnxos4wh5ozrf4m1kfinxsr1llqzbnr79atsqrdbjxgzbecsacfy' );
define( 'SECURE_AUTH_KEY',  't1fy19uxxipmjizfnhor6mq5aefkkzzhiblckv9ao05p0ndokxvzitdoro10satc' );
define( 'LOGGED_IN_KEY',    'dm64rkcslhuwgi8eanhuwsldnibbejeotyquz3alqblcirjpc9ol8dsmj3ih03zl' );
define( 'NONCE_KEY',        'krwq2j42rmpdfjflzw31zpkxds28ojiiilpejzkmos6vtgpztdrv3rcjojd5pvzf' );
define( 'AUTH_SALT',        'gku93emjq0hzjniaarxksvaac4gsnwprywprxesiqmtriqn9p58x80pr2tvgcpqy' );
define( 'SECURE_AUTH_SALT', '39f8rgo2pjegubevyi4cv7o6zsib6x9vfcpzh4yjiaup2c9mti2a4x3z4ymnqelf' );
define( 'LOGGED_IN_SALT',   'mlrqmdsgyjkgfdvvor1xvze06dpivqm5e95hn8ne7hhwrm8rnacnwm96kh68gr5v' );
define( 'NONCE_SALT',       'xsiyemzpzyvjatfboyhgrldepir2gmgryfjmgtcjexjuiuqvijnnuxwzy42rpvzp' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp9t_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
