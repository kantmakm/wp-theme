# Spire Digital Wordpress Starter Theme
*By: Dan Luchs, c/o [Spire Digital](http://www.spiredigital.com)*

Use this plugin to create the desired Custom Post-Types and Taxonomies.

# Steps
- Create the settings array for each Custom Post Type or Taxonomy within the appropriate function [configure_custom_post_types() or configure_custom_taxonomies()]
- Each Custom Post Type / Taxonomy will need its own uniquely-named settings array e.g. 'book' or 'food'
- Include each settings array name in the $settings array within the appropriate configure function [$settings = array( 'book', 'car', 'food' );]
- The plugin will do the rest

## Use this to configure each CPT
$sample_cpt = array(
    'type' => 'post',
    'singular_label' => '',
    'plural_label' => '',
    'slug' => '',
    'position' => 10,
    'icon' => '',
    'queryable' => true,
    'taxonomies' => array()
);
**NEVER** use these words as post-type names/slugs, they are reserved in Wordpress:
- post
- page
- attachment
- revision
- nav_menu_item
- custom_css
- customize_changeset
- action
- author
- order
- theme

"type", "singular_label", and "plural_label" are required
"type" is either "post" or "page"
"icon" is the name of dashicons icon, or 'get_template_directory_uri() . "/images/cutom-posttype-icon-name.png"' for custom icon

## Use this to configure each Taxonomy
$sample_tax = array(
    'custom_post_type' => '',
    'singular_label' => '',
    'plural_label' => '',
    'hierarchical' => true,
    'slug' => '',
    'queryable' => true
);

"custom_post_type", "singular_label", and "plural_label" are required
"custom_post_type" is the slug of the post-type the taxonomy will be attached to
