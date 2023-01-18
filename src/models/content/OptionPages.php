<?php
class OptionPages
{
    private $title = 'Options';
    private $slug = 'options';

    function __construct($title, $slug, $options = [])
    {
        $this->title = $title;
        $this->slug = $slug;

        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array_merge([
                'page_title'    => $this->title,
                'menu_slug'     => $this->slug,
            ], $options));
        }
    }

    public function child($title, $slug, $options)
    {
        if (function_exists('acf_add_options_sub_page')) {
            acf_add_options_sub_page(array_merge([
                'page_title'    => $title,
                'menu_slug'     => $slug,
                'parent_slug'   => $this->slug,
            ], $options));
        }
    }
}
