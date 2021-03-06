<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>

<body class="<?php body_class(); ?>">
	<div class="container">
		<header class="site-header">
			<div class="header-search">
				<?php get_search_form() ?>
			</div>

			<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<h4><?php bloginfo('description'); ?></h4>

			<nav class="navigation-menu">
				<?php $args = ['theme_location' => 'primary']; ?>
				<?php wp_nav_menu(); ?>
			</nav>
		</header>

		<?php
		if ( is_page('about-us') ) {
			echo "<h3>This is a page!</h3>";
		}