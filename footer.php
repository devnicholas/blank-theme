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

	<footer id="colophon" class="site-footer container-fluid p-0">
		<div class="footer-menu container">
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
		<div class="copyright bg-dark">
			&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?> 
			<span class="sep"> | </span>
			<?php print_r(wp_get_theme()['Name']) ?>
		</div><!-- .copyrigth -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
