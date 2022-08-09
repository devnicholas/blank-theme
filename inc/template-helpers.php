<?php
function format_price($price)
{
	return number_format($price, 2, ',', '.');
}

function image($path){
	return get_template_directory_uri() . '/images/' . $path;
}

function the_theme_field($key)
{
	return the_field($key, 'option');
}

function get_page_url($page)
{
	return get_permalink(get_page_by_title($page));
}