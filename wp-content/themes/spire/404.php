<?php get_template_part( 'templates/header' ); ?>

	<main role="document">
		<div><?php _e('Sorry, but the page you were trying to view does not exist.', 'SD'); ?></div>

		<p><?php _e('It looks like this was the result of either:', 'SD'); ?></p>
		<ul>
			<li><?php _e('a mistyped address', 'SD'); ?></li>
			<li><?php _e('an out-of-date link', 'SD'); ?></li>
		</ul>

		<?php get_search_form(); ?>

	</main><!--/role="document"-->

<?php get_template_part( 'templates/footer' );
