<?php
if (!function_exists('blank_theme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function blank_theme_setup()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Blank Theme, use a find and replace
		 * to change 'blank-theme' to the name of your theme in all the template files.
		 */
        load_theme_textdomain('blank-theme', get_template_directory() . '/languages');

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'blank-theme'),
                'menu-footer' => esc_html__('Footer', 'blank-theme'),
            )
        );

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

        /**
         * Add Woocommerce support
         */
        add_theme_support('woocommerce');
    }
endif;
add_action('after_setup_theme', 'blank_theme_setup');

function blank_theme_copyright()
{
    echo "Created using <a href='https://github.com/devnicholas/blank-theme' target='_blank'>Blank Theme</a> by <a href='https://devnicholas.github.io/' target='_blank'>Nicholas Stefano</a>.";
}
add_filter('admin_footer_text', 'blank_theme_copyright');
