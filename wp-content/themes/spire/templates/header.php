<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

	<?php if (is_front_page()) : ?>
	<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
	<?php else: ?>
	<title><?php wp_title(''); ?> | <?php bloginfo('name'); ?></title>
	<?php endif; ?>

	<?php wp_head(); ?>

	<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
</head>

<body <?php body_class(); ?>>
	<header role="banner">

		<div id="navigation">
			<h1 id="logo">
				<a href="/" title="<?php bloginfo('name'); ?>">
					<!--Logo image/SVG goes here, or-->
					<?php echo bloginfo('name'); ?>
				</a>
			</h1>

			<?php get_template_part('templates/nav'); ?>
		</div>

	</header>
