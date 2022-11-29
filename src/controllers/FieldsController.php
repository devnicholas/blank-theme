<?php
class FieldsController
{
    /**
     * @param String $slug
     * @param String $label
     * @param String $type Optional. See possible values in docs. Default value is 'text'
     * @param Array $options Optional. Non-default options to Field
     * 
     * @return Array Field data formatted
     */
    static function create($slug, $label, $type = 'text', $options = [])
    {
        if ($type == 'editor') {
            $type = 'wysiwyg';
        }
        
        if ($type == 'image' || $type == 'file') {
            $options['return_format'] = 'url';
        } else if ($type == 'wysiwyg') {
            $options['return_format'] = 'html';
        }

        return array_merge([
            'key' => 'field_' . $slug,
            'name' => $slug,
            'label' => $label,
            'type' => $type,
        ], $options);
    }

    /**
     * Creating iterable fields, from 'repeater' and 'group' types
     * @param String $slug
     * @param String $label
     * @param Boolean $isRepeater If the field is 'repeater' or not. Default value is true
     * @param Array $fields List of subfields. See the docs
     * @param Array $options Optional. Non-default options to Field
     * 
     * @return Array Field data formatted
     */
    static function group($slug, $label, $isRepeater = false, $fields = [], $options = [])
    {
        $type = $isRepeater ? 'repeater' : 'group';
        $options['layout'] = 'block';
        if (count($fields) > 0) $options['sub_fields'] = $fields;

        return array_merge([
            'key' => 'field_' . $slug,
            'name' => $slug,
            'label' => $label,
            'type' => $type,
        ], $options);
    }

    /**
     * Creating iterable fields, from 'repeater' and 'group' types
     * @param String $slug
     * @param String $label
     * @param Array $fields List of subfields
     * 
     * @return Array Layout data formatted
     */
    static function createLayout($key, $label, $fields)
    {
        return [
            'key' => 'layout_' . $key,
            'name' => $key,
            'label' => $label,
            'sub_fields' => $fields,
        ];
    }
}
