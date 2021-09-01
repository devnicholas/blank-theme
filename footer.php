<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Boilerplate
 */

?>

	<footer id="colophon" class="bg-gray-300">
		<div class="mx-auto container">
			<h3>Menu</h3>
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
			&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?> 
			<span> | </span>
			<?php print_r(wp_get_theme()['Name']) ?>
		</div><!-- .copyrigth -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
