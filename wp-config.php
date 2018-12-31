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
define('DB_NAME', 'i3771020_wp7');

/** MySQL database username */
define('DB_USER', 'i3771020_wp7');

/** MySQL database password */
define('DB_PASSWORD', 'W.MN6jBLG6FS79XXCOI18');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'nmFzbKs61mPrwshCoShigP1BWW8zITCAPARAti0PRI2tG7isGqTKDowxMQuF6eaZ');
define('SECURE_AUTH_KEY',  'yTohKolw1SpMCqtwoTQEG7H6zM9ILNm2VSl1mP12sJSftsE8AWEu4dkEAjfQ5NwO');
define('LOGGED_IN_KEY',    'PLlpjlZWZ8lwBJGib8CZ31gtKlTYT7qUdC5MmqUtrs2Sy9FHG9iZea26nWjpLjq8');
define('NONCE_KEY',        'U8rI6eN9ot9JvLcoOIlY0mUN0MM8EH31VzoCyC3lYqx4cBjk4f1OivCZo7P71Evp');
define('AUTH_SALT',        'IVChPEQK2Ovr8KH9Gy5SQmlbcgjj2GbiZqEQctD7XM2YY7GT25BcxiDSny4NliJx');
define('SECURE_AUTH_SALT', 'DKUwGHpgNLWoB5XN4hxviEqC52rq0EaA55xBebdCaqxmITDLzNT0wbvFYcaYPSEi');
define('LOGGED_IN_SALT',   'ZZ9eTnPJ1RGe3npnwLijQVmVTpBWvK9WCUZdkqHWU3QbbAJBlAxYUJtO2Rf5DTGQ');
define('NONCE_SALT',       'Ga16tFAVvfi18GjIwp7r4tDdlJK2mxQcvUycthOogFGjAZak6blaUckky9Y6Rs79');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
