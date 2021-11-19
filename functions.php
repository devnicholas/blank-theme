<?php
/**
 * WP Boilerplate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Boilerplate
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'wp_boilerplate_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wp_boilerplate_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WP Boilerplate, use a find and replace
		 * to change 'wp-boilerplate' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wp-boilerplate', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'wp-boilerplate' ),
				'menu-footer' => esc_html__( 'Footer', 'wp-boilerplate' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'wp_boilerplate_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
	}
endif;
add_action( 'after_setup_theme', 'wp_boilerplate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_boilerplate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_boilerplate_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_boilerplate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_boilerplate_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wp-boilerplate' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp-boilerplate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wp_boilerplate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_boilerplate_scripts() {
	wp_enqueue_style('wp-boilerplate-slicknav-css', get_template_directory_uri() . '/assets/slicknav.min.css', array(), _S_VERSION);
	wp_enqueue_style('wp-boilerplate-slick-css', get_template_directory_uri() . '/assets/slick.css', array(), _S_VERSION);
	wp_enqueue_style('wp-boilerplate-style', get_stylesheet_uri(), array(), _S_VERSION);

	wp_enqueue_script('wp-boilerplate-jquery', get_template_directory_uri() . '/assets/jquery-1.11.0.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('wp-boilerplate-slick-js', get_template_directory_uri() . '/assets/slick.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('wp-boilerplate-slicknav-js', get_template_directory_uri() . '/assets/jquery.slicknav.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('wp-boilerplate-scripts', get_template_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true);
	wp_enqueue_script('wp-boilerplate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_boilerplate_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load default contents.
 */
require get_template_directory() . '/configs/default-contents.php';

/**
 * Load ACF Fields.
 */
require get_template_directory() . '/configs/acf-fields.php';

/**
 * Load Custom types.
 */
require get_template_directory() . '/configs/custom-types.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Add Woocommerce support
 */
add_theme_support( 'woocommerce' );

/**
 * Remove default WooCommerce hooks
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/**
 * Dont use CSS default to WooCommerce
 */
define('WOOCOMMERCE_USE_CSS', false);

/**
 * Add hooks functions
 */
require get_template_directory() . '/hooks/hooks.php';

/**
 * Add theme options
 */
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title'    => 'Opções do tema',
		'menu_title'    => 'Opções do tema',
		'menu_slug'     => 'theme-options',
		'capability'    => 'edit_posts',
		'position'	=> 35
	));
	acf_add_options_sub_page(array(
		'page_title'    => 'Opções do rodapé',
		'parent_slug'   => 'theme-options',
		'menu_title'    => 'Opções do rodapé',
		'menu_slug'     => 'footer-settings',
	));
}

function mail_config($phpmailer)
{
	$phpmailer->isSMTP();
	$phpmailer->Host = 'smtp.host.com';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 587;
	$phpmailer->Username = 'mail@test.com';
	$phpmailer->Password = 'secret';
}

add_action('phpmailer_init', 'mail_config');
