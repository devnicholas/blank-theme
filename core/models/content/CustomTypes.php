<?php
class CustomTypes
{
    private $slug = '';
    private $label = '';
    private $haveCategories = false;
    private $hasList = true;

    function __construct($slug, $label, $haveCategories = false, $hasList = true)
    {
        $this->slug = $slug;
        $this->label = $label;
        $this->haveCategories = $haveCategories;
        $this->hasList = $hasList;
    }

    public function create($options = [])
    {
        $postTypeConfigs = [
            'label' => $this->label,
            'description' => 'Listagem',
            'public' => true,
            'menu_icon' => 'dashicons-media-default',
            'menu_position' => 5,
            'supports' => ['title', 'editor', 'thumbnail'],
            'show_in_rest' => true,
            'has_archive' => $this->hasList,
        ];
        $taxonomyConfigs = [];
        if ($this->haveCategories) {
            $taxonomyConfigs = [
                'hierarchical' => true,
                'query_var' => true,
                'taxonomies' => [$this->slug . '_categories'],
                'rewrite' => [
                    'slug' => $this->slug,
                    'with_front' => false
                ]
            ];
        }
        register_post_type($this->slug, array_merge($postTypeConfigs, $taxonomyConfigs, $options));

        if ($this->haveCategories) $this->createTaxonomy();
    }

    private function createTaxonomy()
    {
        register_taxonomy(
            $this->slug . '_categories',
            $this->slug,
            [
                'hierarchical' => true,
                'show_in_rest' => true,
                'label' => 'Categorias',
                'query_var' => true,
                'rewrite' => [
                    'slug' => $this->slug . '_category',
                    'with_front' => false
                ]
            ]
        );
    }
}
