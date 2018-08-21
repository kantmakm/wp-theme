<?php /*
	Plugin Name: Must-Use Plugin Loader
	Plugin URI: https://codex.wordpress.org/Must_Use_Plugins/
	Description: A simple script that loads plugins from the mu-plugins folder. Currently loading the following plugins: Advanced Custom Fields Pro, ACF Flexible Layout Output, WP Migrate DB Pro, WP Migrate DB Pro Media Files.
	Version: 1.0
	Author: Dan Luchs (Spire Digital)
	Author URI: http://www.spiredigital.com/
	License: GPLv2
	License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

//Custom post-types and taxonomies
require( WPMU_PLUGIN_DIR . '/site-cpt-settings/site-cpt-settings.php' );
//ACF Pro
//require( WPMU_PLUGIN_DIR . '/advanced-custom-fields-pro/acf.php' );
//Dependent on ACF
require( WPMU_PLUGIN_DIR . '/acf-flexible-layout-output/acf-flexible-layout-output.php' );
//WP Migrate DB Pro
//require( WPMU_PLUGIN_DIR . '/wp-migrate-db-pro/wp-migrate-db-pro.php' );
//WP Migrate DB Pro Media Files
//require( WPMU_PLUGIN_DIR . '/wp-migrate-db-pro-media-files/wp-migrate-db-pro-media-files.php' );
