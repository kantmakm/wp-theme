<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<nav class="pagination">
		<div class="previous">
		<?php next_posts_link( __('Older posts', 'SD') ); ?>
		</div>
		<div class="next">
		<?php previous_posts_link( __('Newer posts', 'SD') ); ?>
		</div>
	</nav>
<?php endif;
