<?php get_template_part( 'templates/header' );

if ( function_exists( 'FLO_get_flexible_content_layouts' ) ) :
	FLO_get_flexible_content_layouts( 'pre_content' );
endif;

// get_template_part( 'templates/sidebar' ); ?>

<main role="document">
	<?php get_template_part( 'templates/loop' ); ?>
</main>

<?php if ( function_exists( 'FLO_get_flexible_content_layouts' ) ) :
	FLO_get_flexible_content_layouts( 'post_content' );
endif;

get_template_part( 'templates/footer' );
