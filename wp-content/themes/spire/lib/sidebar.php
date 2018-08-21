<?php
// Sidebar / widget area setup
function SD_widgets_init() {
	// Sidebars
	register_sidebar(array(
		'name'			=> __('Primary', 'SD'),
		'id'			=> 'sidebar-primary',
		'before_widget'	=> '<section class="widget %1$s %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>',
	));

	register_sidebar(array(
		'name'			=> __('Footer', 'SD'),
		'id'			=> 'sidebar-footer',
		'before_widget'	=> '<section class="widget %1$s %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>',
	));
}
add_action('widgets_init', 'SD_widgets_init');
