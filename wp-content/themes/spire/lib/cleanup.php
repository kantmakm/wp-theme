<?php
// Hide admin bar
show_admin_bar( false );
add_filter('the_generator', '__return_false');

function SD_head_cleanup() {
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );

	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));

	if (!class_exists('WPSEO_Frontend')) {
		remove_action('wp_head', 'rel_canonical');
	}
}
add_action('init', 'SD_head_cleanup');

function SD_remove_dashboard_widgets() {
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
	remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
	remove_meta_box('dashboard_primary', 'dashboard', 'normal');
	remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
}
add_action('admin_init', 'SD_remove_dashboard_widgets');

function SD_excerpt_length($length) {
	return 40;
}
add_filter('excerpt_length', 'SD_excerpt_length');

function SD_excerpt_more($more) {
	return '&hellip;';
	// return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'SD') . '</a>';
}
add_filter('excerpt_more', 'SD_excerpt_more');

function SD_get_search_form($form) {
	$form = '';
	locate_template('/templates/searchform.php', true, false);
	return $form;
}
add_filter('get_search_form', 'SD_get_search_form');

function SD_remove_default_description($bloginfo) {
	$default_tagline = 'Just another WordPress site';
	return ($bloginfo === $default_tagline) ? '' : $bloginfo;
}
add_filter('get_bloginfo_rss', 'SD_remove_default_description');
