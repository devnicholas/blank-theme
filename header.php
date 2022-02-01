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
			<div class="flex-grow hidden sm:block">
				<nav class="flex justify-end">
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
			<div class="sm:hidden flex-grow flex justify-center items-center ml-6 mr-1">
				<div class="active-menu-mobile">
					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 50 50" style=" fill:#000000;">
						<path d="M 0 9 L 0 11 L 50 11 L 50 9 Z M 0 24 L 0 26 L 50 26 L 50 24 Z M 0 39 L 0 41 L 50 41 L 50 39 Z"></path>
					</svg>
				</div>
			</div>
			<div class="fixed w-full h-full top-0 bg-white z-20" id="sidebar-container" style="left: -100%;">
				<div class="p-4">
					<div class="flex justify-around items-center">
						<a href="<?= home_url(); ?>" class="brand">
							<img src="<?= get_template_directory_uri(); ?>/images/logo.png" class="mx-auto" alt="">
						</a>
						<div class="desactive-menu-mobile ml-4">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 50 50" style=" fill:#000000;">
								<path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"></path>
							</svg>
						</div>
					</div>
					<div class="mt-6">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'mobile-menu',
							)
						);
						?>
					</div>
				</div>
			</div>
		</header><!-- #masthead -->