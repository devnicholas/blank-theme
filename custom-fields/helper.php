<?php

if (!defined('ABSPATH')) exit;

/**
 * Function to create custom fields easy
 */
function create_field_custom($slug, $label, $type = 'text', $custom_options = [], $sub_fields = [])
{
    $options = $custom_options;
    if ($type == 'image' || $type == 'file') {
        $options['return_format'] = 'url';
    } else if ($type == 'wysiwyg') {
        $options['return_format'] = 'html';
    } else if ($type == 'repeater' || $type == 'group') {
        $options['layout'] = 'block';
        $options['button_label'] = 'Adicionar ' . $label;
        if (count($sub_fields) > 0) $options['sub_fields'] = $sub_fields;
    }
    return array_merge([
        'key' => 'field_' . $slug,
        'name' => $slug,
        'label' => $label,
        'type' => $type
    ], $options);
}

/**
 * Function to create custom types easy
 */
function create_custom_type($slug, $name, $haveCategories = false, $configs = [])
{
    $postTypeConfigs = [
        'label' => $name,
        'description' => 'Listagem',
        'public' => true,
        'menu_icon' => 'dashicons-media-default',
        'menu_position' => 5,
        'supports' => ['title', 'editor', 'thumbnail'],
    ];
    $taxonomyConfigs = [];
    if ($haveCategories) {
        $taxonomyConfigs = [
            'hierarchical' => true,
            'query_var' => true,
            'taxonomies' => [$slug . '_categories'],
            'rewrite' => [
                'slug' => $slug . '/%' . $slug . '_categories%',
                'with_front' => false
            ]
        ];
    }
    register_post_type($slug, array_merge($postTypeConfigs, $taxonomyConfigs, $configs));
    if ($haveCategories) {
        register_taxonomy(
            $slug . '_categories',
            $slug,
            [
                'hierarchical' => true,
                'label' => 'Categorias',
                'query_var' => true,
                'rewrite' => [
                    'slug' => $slug,
                    'with_front' => false
                ]
            ]
        );
    }
}

/**
 * Class to create a custom filter for pages:
 * `page_slug`
 */
class My_ACF_Location_Page_Slug extends ACF_Location
{

    public function initialize()
    {
        $this->name = 'page_slug';
        $this->label = "Título da página";
        $this->category = 'page';
        $this->object_type = 'page';
    }

    public function get_values($rule)
    {
        $choices = array();

        $pages = get_pages();
        if ($pages) {
            foreach ($pages as $page) {
                $choices[$page->post_name] = $page->post_title;
            }
        }
        return $choices;
    }

    public function match($rule, $screen, $field_group)
    {

        // Check screen args for "post_id" which will exist when editing a post.
        // Return false for all other edit screens.
        if (isset($screen['post_id'])) {
            $post_id = $screen['post_id'];
        } else {
            return false;
        }

        // Load the post object for this edit screen.
        $post = get_post($post_id);
        if (!$post) {
            return false;
        }

        // Compare the Post's slug attribute to rule value.
        $result = ($post->post_name == $rule['value']);

        // Return result taking into account the operator type.
        if ($rule['operator'] == '!=') {
            return !$result;
        }
        return $result;
    }
}
if (function_exists('acf_register_location_type')) {
    acf_register_location_type('My_ACF_Location_Page_Slug');
}
