<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Boilerplate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="bg-indigo-100 h-screen">
		<header id="masthead" class="container container-lg mx-auto px-2 py-4 border-b border-gray-900 flex items-baseline">
			<div class="flex-shrink w-32">
				<h1 class="text-2xl">
					<?php bloginfo('name'); ?>
				</h1>
			</div>
			<div class="flex-grow">
				<nav class="flex">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
					?>
				</nav>
			</div>
		</header><!-- #masthead -->