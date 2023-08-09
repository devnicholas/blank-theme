<?php
class AcfBuilder
{
    /**
     * Field Group Slug
     */
    public $key;

    /**
     * Field Group Label
     */
    public $title;

    /**
     * @param String $key
     * @param String $title
     */
    function __construct($key, $title)
    {
        $this->key = $key;
        $this->title = $title;
    }

    /**
     * Creating field group and setting locate(s)
     * @param String|Array $templates
     * @param String $param Set locate type. Default is 'post_type'.
     * @param Array $options Optional. Non-default options to Field Group
     */
    function setLocate($templates, $param = 'post_type', $options = [])
    {
        if (is_array($templates)) {
            $location = [];
            foreach ($templates as $template) {
                array_push($location, [
                    [
                        'param' => $param,
                        'operator' => '==',
                        'value' => $template,
                    ]
                ]);
            }
        } else {
            $location = [
                [
                    [
                        'param' => $param,
                        'operator' => '==',
                        'value' => $templates,
                    ],
                ],
            ];
        }

        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array_merge([
                'key' => $this->key,
                'title' => $this->title,
                'fields' => [],
                'location' => $location,
            ], $options));
        }
    }

    /**
     * Creating field parent of Group Field instance.
     * @param String $slug
     * @param String $label
     * @param String $type Optional. See possible values in docs. Default value is 'text'
     * @param Array $options Optional. Non-default options to Field
     */
    function createField($slug, $label, $type = 'text', $options = [])
    {
        $field = FieldsController::createField($slug, $label, $type, array_merge([
            'parent' => $this->key,
        ], $options));

        if (function_exists('acf_add_local_field')) {
            acf_add_local_field($field);
        }
    }

    /**
     * Creating iterable fields, from 'repeater' and 'group' types
     * @param String $slug
     * @param String $label
     * @param Boolean $isRepeater If the field is 'repeater' or not. Default value is true
     * @param Array $fields List of subfields. See the docs
     * @param Array $options Optional. Non-default options to Field
     */
    function createGroup($slug, $label, $isRepeater = false, $fields = [], $options = [])
    {
        $field = FieldsController::createGroup($slug, $label, $isRepeater, $fields, array_merge([
            'parent' => $this->key,
        ], $options));

        if (function_exists('acf_add_local_field')) {
            acf_add_local_field($field);
        }
    }

    /**
     * Creating Flexible Content field type
     * @param String $slug
     * @param String $label
     * @param Array $layouts List of Layouts for this Flexible Content
     * @param Array $options Optional. Non-default options to Field
     */
    function createLayout($slug, $label, $layouts = [], $options = [])
    {
        $formattedLayouts = [];
        foreach ($layouts as $layout) {
            $formattedLayouts[$layout['key']] = $layout;
        }

        if (function_exists('acf_add_local_field')) {
            acf_add_local_field(array_merge([
                'key' => 'field_' . $slug,
                'name' => $slug,
                'label' => $label,
                'type' => 'flexible_content',
                'layouts' => $formattedLayouts,
                'parent' => $this->key
            ], $options));
        }
    }
}
