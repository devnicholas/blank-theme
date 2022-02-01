<?php 
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