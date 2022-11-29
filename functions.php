<?php
require_once 'src/Autoload.php';

use Src\AutoLoad;

// Theme version
if (!defined('_S_VERSION')) {
    define('_S_VERSION', '2.0.0');
}

// Load core theme files
$autoload = new AutoLoad(get_template_directory() . '/src');

// Load plugins install
$autoload->add(get_template_directory() . '/plugins/index.php');

// Load custom types and fields
$autoload->add(get_template_directory() . '/acf');

// Call files
$autoload->load();

$theme = new ThemeSetup();
$theme->setMenus([
    'menu-primary' => 'Menu primário',
    'menu-footer' => 'Menu do rodapé',
]);
$theme->setThemeSupport([
    'title-tag',
    'post-thumbnails',
    'html5',
    'custom-logo',
    // 'woocommerce',
]);

$theme->initialize();

add_action('wp_enqueue_scripts', function () {
    $themeEnqueue = new ThemeEnqueue();
    $themeEnqueue->setScripts([
        'jquery' => get_template_directory_uri() . '/src/inc/jquery-1.11.0.min.js',
        'slick' => get_template_directory_uri() . '/src/inc/slick.min.js',
        'script' => get_template_directory_uri() . '/dist/scripts.js',
    ]);
    $themeEnqueue->setStyles([
        'slick' => get_template_directory_uri() . '/src/inc/slick.min.css',
        'style' => get_template_directory_uri() . '/dist/style.css',
    ]);

    $themeEnqueue->enqueue();
});
