<?php
require_once 'src/Autoload.php';

use Src\AutoLoad;

// Theme version
if (!defined('_S_VERSION')) {
    define('_S_VERSION', '2.0.0');
}

// Theme directory
if (!defined('THEME_DIR') || !defined('THEME_URL')) {
    define('THEME_DIR', get_template_directory());
    define('THEME_URL', get_template_directory_uri());
}

// Load core theme files
$autoload = new AutoLoad(THEME_DIR . '/src');

// Load plugins install
$autoload->add(THEME_DIR . '/plugins/index.php');

// Load custom types and fields
$autoload->add(THEME_DIR . '/acf');

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
        'jquery' => THEME_URL . '/src/inc/jquery-1.11.0.min.js',
        'slick' => THEME_URL . '/src/inc/slick.min.js',
        'script' => THEME_URL . '/dist/scripts.js',
    ]);
    $themeEnqueue->setStyles([
        'slick' => THEME_URL . '/src/inc/slick.min.css',
        'style' => THEME_URL . '/dist/style.css',
    ]);

    $themeEnqueue->enqueue();
});

add_action('after_setup_theme', function() {
    $defaultPages = new DefaultPages();
    $defaultPages->setPages(['Home']);
    $defaultPages->create();
});
