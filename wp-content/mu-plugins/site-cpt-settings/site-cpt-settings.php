<?php
/*
Plugin Name: Site CPT Settings
Plugin URI: http://www.spiredigital.com/
Description: Custom Post Type and Taxonomy setup in a basic plugin form
Version: 1.0
Author: Dan Luchs (Spire Digital)
Author URI: http://www.spiredigital.com/
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit();
}

/*
Create the settings for each Custom Post Type or Taxonomy in the two configure functions below
Each Custom Post Type / Taxonomy will need its own uniquely-named settings array e.g. '$book' or '$food'
Include each settings array name in the $settings array within the appropriate configure function e.g. $settings = array( $book, $food );
The plugin will do the rest
*/

function configure_custom_post_types() {
    //Use this to configure each Custom Post Type
    /*
    NEVER use these words as post-type names/slugs, they are reserved in Wordpress:
        post
        page
        attachment
        revision
        nav_menu_item
        custom_css
        customize_changeset
        action
        author
        order
        theme
    */

    //"type", "singular_label", and "plural_label" are required
    //"type" is either "post" or "page"
    //"icon" is the name of dashicons icon, or 'get_template_directory_uri() . "/images/cutom-posttype-icon-name.png"' for custom icon
    //Dashicons can be found here: https://developer.wordpress.org/resource/dashicons/#admin-post

    /*$sample_cpt = array(
        'type' => 'post',
        'singular_label' => '',
        'plural_label' => '',
        'slug' => '',
        'position' => 10,
        'icon' => '',
        'queryable' => true,
        'taxonomies' => array()
    );*/

    //Each Custom Post Type will need its own uniquely-named settings array
    //Include each Custom Post Type settings array here
    $settings = array();
    create_custom_post_types( $settings );
}

function configure_custom_taxonomies() {
    //Use this to configure each Taxonomy
    //"custom_post_type", "singular_label", and "plural_label" are required
    //"custom_post_type" is the slug of the post-type the taxonomy will be attached to

    /*$sample_tax = array(
        'custom_post_type' => '',
        'singular_label' => '',
        'plural_label' => '',
        'hierarchical' => true,
        'slug' => '',
        'queryable' => true
    );*/

    //Each Taxonomy will need its own uniquely-named settings array
    //Include each Taxonomy settings array here
    $settings = array();
    create_custom_taxonomies( $settings );
}

add_action( 'init', 'configure_custom_post_types', 0 );
add_action( 'init', 'configure_custom_taxonomies', 0 );

function create_custom_post_types( $cpts ) {
    foreach ( $cpts as $cpt ) :
        //Skip if required keys are missing
        if ( empty( $cpt['type'] ) || empty( $cpt['singular_label'] ) || empty( $cpt['plural_label'] ) ) {
            continue;
        }

        //Set slug if none exists
        if ( empty( $cpt['slug'] ) ) {
            $cpt['slug'] = strtolower( preg_replace( '/\s+/', '_', $cpt['singular_label'] ) );
        }

        //Set icon if none exists
        if ( empty( $cpt['icon'] ) ) {
            $cpt['icon'] = 'dashicons-admin-post';
        }

        $args = array(
            'capability_type'    => $cpt['type'],
            'description'        => __( $cpt['singular_label'] ),
            'has_archive'        => ( $cpt['type'] == 'post' ) ? true : false,//false for page type
            'hierarchical'       => ( $cpt['type'] == 'post' ) ? false : true,//true for page type
            'labels'             => array(
                'name'                => _x( $cpt['plural_label'], 'Post Type General Name' ),
                'singular_name'       => _x( $cpt['singular_label'], 'Post Type Singular Name' ),
                'menu_name'           => __( $cpt['plural_label'] ),
                'parent_item_colon'   => __( 'Parent ' . $cpt['singular_label'] ),
                'all_items'           => __( 'All '.$cpt['plural_label'] ),
                'view_item'           => __( 'View ' . $cpt['singular_label'] ),
                'add_new_item'        => __( 'Add New '.$cpt['singular_label'] ),
                'add_new'             => __( 'Add New' ),
                'edit_item'           => __( 'Edit '.$cpt['singular_label'] ),
                'update_item'         => __( 'Update '.$cpt['singular_label'] ),
                'search_items'        => __( 'Search '.$cpt['singular_label'] ),
                'not_found'           => __( 'Not Found' ),
                'not_found_in_trash'  => __( 'Not found in Trash' ),
            ),
            'public'             => true,
            'publicly_queryable' => $cpt['queryable'],
            'query_var'          => $cpt['queryable'],
            'rewrite'            => ( $cpt['queryable'] ) ? array( 'slug' => $cpt['slug'] ) : false,
            'menu_icon'          => $cpt['icon'],
            'menu_position'      => ( $cpt['position'] ) ? $cpt['position'] : null,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => $cpt['queryable'],
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'revisions' ),
            'taxonomies'         => ( count( $cpt['taxonomies'] ) > 0 ) ? $cpt['taxonomies'] : array()
        );

        register_post_type( $cpt['slug'], $args );

    endforeach;
}

function create_custom_taxonomies( $taxes ) {
    foreach ( $taxes as $tax ) :
        //Skip if required keys are missing
        if ( empty( $tax['custom_post_type'] ) || empty( $tax['singular_label'] ) || empty( $tax['plural_label'] ) ) {
            continue;
        }

        //Set slug if none exists
        if ( empty( $tax['slug'] ) ) {
            $tax['slug'] = strtolower( preg_replace( '/\s+/', '_', $tax['singular_label'] ) );
        }

        $args = array(
            'hierarchical'      => $tax['hierarchical'],
            'labels'            => array(
                'name'              => _x( $tax['plural_label'], 'taxonomy general name' ),
                'singular_name'     => _x( $tax['singular_label'], 'taxonomy singular name' ),
                'search_items'      => __( 'Search '. $tax['plural_label'] ),
                'all_items'         => __( 'All '.$tax['plural_label'] ),
                'parent_item'       => __( 'Parent'. $tax['singular_label'] ),
                'parent_item_colon' => __( 'Parent '. $tax['singular_label'] .':' ),
                'edit_item'         => __( 'Edit ' .$tax['singular_label'] ),
                'update_item'       => __( 'Update ' .$tax['singular_label'] ),
                'add_new_item'      => __( 'Add New ' .$tax['singular_label'] ),
                'new_item_name'     => __( 'New ' .$tax['singular_label'] .'Name' ),
                'menu_name'         => __( $tax['singular_label'] ),
            ),
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => ( $tax['queryable'] ) ? $tax['queryable'] : false,
            'rewrite'           => ( $tax['queryable'] ) ? array( 'slug' => $tax['slug'] ) : false
        );

        register_taxonomy( $tax['slug'], $tax['custom_post_type'], $args );

    endforeach;
}
