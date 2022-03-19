<?php

/**
 * Blank Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blank_theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/configs/theme-setup.php';

/**
 * Theme widgets.
 */
require get_template_directory() . '/configs/theme-widgets.php';

/**
 * Theme scripts and styles enqueue.
 */
require get_template_directory() . '/configs/theme-scripts.php';

/**
 * Load default contents.
 */
require get_template_directory() . '/configs/default-contents.php';

/**
 * Load SMTP configs.
 */
require get_template_directory() . '/configs/smtp.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Helpers function repository for this theme.
 */
require get_template_directory() . '/inc/template-helpers.php';

/**
 * Load TGM plugins activation.
 */
require get_template_directory() . '/plugins/index.php';

/**
 * Add hooks functions
 */
require get_template_directory() . '/hooks/hooks.php';

/**
 * Load ACF files.
 */
add_action('acf/init', 'init_acf_config');
function init_acf_config()
{
	require get_template_directory() . '/custom-fields/helper.php';
	require get_template_directory() . '/custom-fields/index.php';
	require get_template_directory() . '/custom-fields/theme-options.php';
	require get_template_directory() . '/custom-fields/custom-types.php';
}
