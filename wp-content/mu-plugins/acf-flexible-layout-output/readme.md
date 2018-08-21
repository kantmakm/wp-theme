ACF Flexible Layout Output:

This plugin works with the Advanced Custom Fields Pro plugin, allowing flexible content fields to
output templates.

How to use:
	1:	Download and activate the Advanced Custom Fields Pro plugin. http://www.advancedcustomfields.com/pro/
    2:  Activate this plugin.
    3:  Either create an "acf-layouts" folder in the theme folder, or use the acf-layouts folder in the plugin.
    4:  Use ACF to create a flexible content field, and create layouts within that field.
    5:  Create template layouts to output the content of the flexible content field layouts,
        placing them in the acf-layouts folder. There is a sample file in the plugin acf-layouts folder.
    6:  Use the template tags to place the content in the theme templates as desired.
        The template layout file names must exactly match the slug of the flexible content field layout.

Template usage:
This plugin provides a two template functions that should be used as follows:

<?php if ( function_exists( 'FLO_get_flexible_content_layouts' ) ) :
	FLO_get_flexible_content_layouts( 'flexible_content_field_slug' );
endif; ?>
