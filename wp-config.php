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

/** Get config from .env */
if (!file_exists(__DIR__ . '/config/.env')) {
    throw new Error("No config file.");
}

$config = parse_ini_file(__DIR__ . '/config/.env');
if (!$config) {
    throw new Error("Wrong config file format.");
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', $config['DB_DATABASE'] );

/** MySQL database username */
define( 'DB_USER', $config['DB_USERNAME']  );

/** MySQL database password */
define( 'DB_PASSWORD', $config['DB_PASSWORD'] );

/** MySQL hostname */
define( 'DB_HOST', $config['DB_HOST']  );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         $config['AUTH_KEY'] );
define( 'SECURE_AUTH_KEY',  $config['SECURE_AUTH_KEY'] );
define( 'LOGGED_IN_KEY',    $config['LOGGED_IN_KEY'] );
define( 'NONCE_KEY',        $config['NONCE_KEY'] );
define( 'AUTH_SALT',        $config['AUTH_SALT'] );
define( 'SECURE_AUTH_SALT', $config['SECURE_AUTH_SALT'] );
define( 'LOGGED_IN_SALT',   $config['LOGGED_IN_SALT'] );
define( 'NONCE_SALT',       $config['NONCE_SALT'] );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = $config['TABLE_PREFIX'];

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

// on ajoute des constantes pour configurer notre install custom :

// Je définis l'URL vers la page d'accueil de mon site
define(
    'WP_HOME',
    rtrim ( $config['HOME_URL'], '/' )
);

// Je définis l'URL vers le dossier source de WordPress
define(
    'WP_SITEURL',
    WP_HOME . '/wp'
);

// Je définis l'URL vers le dossier wp-content
define(
    'WP_CONTENT_URL',
    WP_HOME . '/wp-content'
);

// Je définis le path (chemin côté serveur) vers le dossier wp-content
define(
    'WP_CONTENT_DIR',
    __DIR__ . '/wp-content'
);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
