<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blank_theme
 */

?>

	<footer id="colophon" class="bg-gray-300">
		<div class="mx-auto container">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-footer',
					'menu_id'        => 'footer-menu',
				)
			);
			?>
		</div>
		<div class="bg-gray-800 text-white text-center p-3">
			<?php the_theme_field('copyright') ?>
		</div><!-- .copyrigth -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
