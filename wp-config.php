<?php
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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'FS_METHOD', 'direct' );

define( 'DB_NAME', 'woocommerce' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'o1,+yrX1G_PZK0^#ql%Gj/*(I<7)Pfp6jX}l@}R!G}&%>R}_-jMt&H]noS9^5rlB' );
define( 'SECURE_AUTH_KEY',  'mP~kKS4JORt9G9ibDr&*=2O*vrT?f{9edFBLw}8D*~v&CLby=bz61DRJJuH{q%|y' );
define( 'LOGGED_IN_KEY',    ' uy*UpyU`X}7=@41s<B-TX$5HAL(nd@^.#BkPAUk482~cPl#;N_XE]vw:l-Y*tD(' );
define( 'NONCE_KEY',        '<YDyeb?}iuf!(?H1wg,vGN1TF/Uq`@MzPK-AA>XQ-_COSW V2prW2KLj=P{[WO8c' );
define( 'AUTH_SALT',        ' BvQqAB^@0NziIyfJwXF1J:EmzaYn-9pr$2~;cXyVLehu}(>G7gysE<<?7D:y{}:' );
define( 'SECURE_AUTH_SALT', '&Fs_s#L7uCw*Z5{)S6$eKHN+?r^U8nDqD.?H~!Lmu -]b!p;FTb=CH&[s%YA2d%v' );
define( 'LOGGED_IN_SALT',   't~Rp,8OdaN^s7]]wiB=]Ziah4;Acs=]g%BZbLf$`d#`%]g,1l{Jl8)t}5ldha{Q}' );
define( 'NONCE_SALT',       'gDx!w8N)cb{}gVJtV?|rvxY1Qhbg6E,Oh,Jh<Y_&Wm52^HFFK)pK7]Rm3#Ij9U~$' );

/**#@-*/

/**
 * WordPress database table prefix.
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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
