<?php
/**
 * Enqueue scripts and styles.
 */
function blank_theme_scripts()
{
	wp_enqueue_script('blank-theme-jquery', get_template_directory_uri() . '/assets/static/jquery-1.11.0.min.js', array(), _S_VERSION, true);

	wp_enqueue_style('blank-theme-style', get_template_directory_uri() . '/dist/style.css', array(), _S_VERSION);
	wp_enqueue_script('blank-theme-scripts', get_template_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true);

	wp_enqueue_style('blank-theme-slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), _S_VERSION);
	wp_enqueue_script('blank-theme-slick-js', get_template_directory_uri() . '/assets/static/slick.min.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'blank_theme_scripts');