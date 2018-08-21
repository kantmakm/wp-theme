<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post();
		/*$post_format could be:
			'post', 'page', 'attachment', 'revision', 'nav_menu_item', or the name of the custom post type*/
		$post_format = get_post_type();

		if ( is_post_type_archive() ) :
			get_template_part( 'templates/content', $post_format . '-archive' );
		elseif ( is_archive() ) :
			get_template_part( 'templates/content' );
		else :
			get_template_part( 'templates/content', $post_format );
		endif;
	endwhile; ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no results were found.', 'SD' ); ?></p>
	<?php get_search_form(); ?>
<?php endif;
