<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blank_theme
 */

get_header();
?>

	<main id="primary" class="container">

    <?php woocommerce_content(); ?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
