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
	<header class="w-full z-10 border-b border-neutral-200">
		<div class="container py-7 flex justify-between items-center px-4 md:px-0">
			<a href="<?= home_url('') ?>">
				<img src="<?= THEME_DATA['logo'] ?>" alt="">
			</a>
			<div class="flex flex-col justify-end items-end">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-primary',
						'menu_id'        => 'menu-primary',
					)
				);
				?>
				<a href="#" class="hamburger-menu-open md:hidden mb-2">
					<img src="<?= image('icon-menu.svg'); ?>" alt="Menu" class="w-12">
				</a>
			</div>
		</div>
	</header>
	<div class="hamburger-menu-wrapper" style="display: none;">
		<div class="hamburger-menu-container" style="left: -100%">
			<img src="<?= THEME_DATA['logo'] ?>" alt="" class="mb-7">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-primary',
					'menu_id'        => 'hamburger-menu',
				)
			);
			?>
		</div>
		<div class="hamburger-menu-close w-1/3"></div>
	</div>