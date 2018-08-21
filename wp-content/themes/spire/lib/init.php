<?php
function SD_setup() {
	load_theme_textdomain('SD', get_template_directory() . '/lang');

	// Theme support
	add_theme_support('post-thumbnails');
	add_theme_support('menus');
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	add_theme_support('root-relative-urls');    // Enable relative URLs
	add_theme_support('nice-search');           // Enable /?s= to /search/ redirect

	// Image sizes
	add_image_size('category-thumb', 300, 300, true);

	//Register nav menus
	register_nav_menus(array(
		'primary_navigation' => __('Primary Navigation', 'SD'),
	));

	add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'SD_setup');

//Sets production site search engine tracking to true
add_action( 'wp_loaded', 'config_blog_public' );

function config_blog_public() {
	if ( defined( 'BLOG_PUBLIC' ) ) {
		if ( BLOG_PUBLIC == false ) {
			add_filter( 'pre_option_blog_public', '__return_false' );
		}
		if ( BLOG_PUBLIC == true ) {
			add_filter( 'pre_option_blog_public', '__return_true' );
		}
	}
}
