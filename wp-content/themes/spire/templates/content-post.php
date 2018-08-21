			<article <?php post_class(); ?>>
				<header>
					<h1><?php the_title(); ?></h1>
					<?php get_template_part('templates/entry-meta'); ?>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

				<footer>
					<?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'SD'), 'after' => '</p></nav>')); ?>
				</footer>
			</article>

			<?php comments_template('/templates/comments.php');
