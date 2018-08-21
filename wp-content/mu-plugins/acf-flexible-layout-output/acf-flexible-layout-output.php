<?php /*
Plugin Name: ACF Flexible Layout Output
Plugin URI: http://www.spiredigital.com/
Description: This plugin requires <a href="http://www.advancedcustomfields.com/pro/">Advanced Custom Fields Pro</a> be installed and activated. It loops through specified ACF Flexible Content Fields and outputs the template located in the "acf-layouts" folder in either the theme or plugin itself.
Version: 1.0
Author: Dan Luchs (Spire Digital)
Author URI: http://www.spiredigital.com/
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit();
}

/***     NOTES     ***/
/*
This plugin uses the Flexible Content Layout slug to find a template file of the same name.

Flexible Content Layout templates much have the same file name as the slug of the layout,
e.g. "slideshow.php" would be for a layout with a slug of "slideshow"

Layout templates MUST be in a folder named "acf-layouts", in either the theme root, or this plugin's root.

The theme "acf-layouts" folder will override or replace the plugin "acf-layouts" folder.
*/

/***     TEMPLATE TAG EXAMPLE     ***/
/*
This will include each layout of the specified flexible content field into the template file in the
order that is set in the admin area

<?php if ( function_exists( 'FLO_get_flexible_content_layouts' ) ) :
    FLO_get_flexible_content_layouts( 'flexible_content_field_slug' );
endif; ?>
*/

// TEMPLATE TAG: FLO_get_flexible_content_layouts( 'flexible_content_field_slug' );
// Loops through the specified flexible content field and outputs each found layout template.

// Loop through all specified flexible content fields
function FLO_get_flexible_content_layouts( $flex_field = '' ) {
    global $post;
    // Check if ACF is activated, make sure $flex_field is present, only output for singular-type posts
    if ( class_exists( 'acf' ) && is_string( $flex_field ) && is_singular() ) :
        $themepath = get_template_directory();

        if ( have_rows( $flex_field ) ) :
            while ( have_rows( $flex_field ) ) : the_row();
                $layout = get_row_layout();

                if ( $layout && $themepath ) {
                    $filepath = '/acf-layouts/' . $layout . '.php';

                    // Check theme acf-layouts folder first, if nothing exists, check plugin acf-layouts folder
                    if ( file_exists( $themepath . $filepath ) ) {
                        include( $themepath . $filepath );
                    } else {
                        if ( file_exists( dirname(__FILE__) . $filepath ) ) {
                            include( dirname(__FILE__) . $filepath );
                        }
                    } // End file_exists
                } // End if $layout/$themepath

            endwhile; // End while have_rows()
        endif; // End if have_rows()
        
    endif; // End ACF class check
}

// TEMPLATE TAG: FLO_has_flexible_content_field( 'flexible_content_field_slug' );
// Check if a page has a flexible content field of the specified slug available. Returns true or false.
function FLO_has_flexible_content_field( $flex_field = '' ) {
    global $post;

    if ( class_exists( 'acf' ) && is_string( $flex_field ) ) :
        $group = get_field_object( $flex_field );

        if ( $group && $group['type'] == 'flexible_content' && count( $group['value'] ) > 0 ) :
            return true;
        endif; // End if $group

    endif; // End ACF class check

    return false;
}
