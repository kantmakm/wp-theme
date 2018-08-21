<?php
/* !!!!! IMPORTANT !!!!!
    1: Set up this file
    2: Rename to "wp-config.php"
    3: MOVE IT TO THE WORDPRESS ROOT DIRECTORY

!!!!! NEVER LEAVE THIS FILE IN WP-CONTENT !!!!!
*/

//Apply DB settings
define( 'DB_USER', '' );
define( 'DB_NAME', '' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', '' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// S3 Data (not sure we're keeping this)
//define( 'S3_UPLOADS_BUCKET', 'bucketname' );
//define( 'S3_UPLOADS_KEY', 'key' );
//define( 'S3_UPLOADS_SECRET', 'secret' );
//define( 'S3_UPLOADS_REGION', 'us-east-1' );

//Salt to taste, using https://api.wordpress.org/secret-key/1.1/salt/
define( 'AUTH_KEY',         '' );
define( 'SECURE_AUTH_KEY',  '' );
define( 'LOGGED_IN_KEY',    '' );
define( 'NONCE_KEY',        '' );
define( 'AUTH_SALT',        '' );
define( 'SECURE_AUTH_SALT', '' );
define( 'LOGGED_IN_SALT',   '' );
define( 'NONCE_SALT',       '' );

$table_prefix  = 'wp_';

//Set debugging (only use this locally)
//define( 'WP_DEBUG', true );
//define( 'WP_DEBUG_LOG', true );
//define( 'WP_DEBUG_DISPLAY', false );

//Limit post revisions
define( 'WP_POST_REVISIONS', 3 );

//Only use this locally
//define( 'FS_METHOD', 'direct' );

//Don't touch these
if ( !defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

require_once(ABSPATH . 'wp-settings.php' );
