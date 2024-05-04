<?php
class ContentController
{
    private $data = [];

    function __construct($post_id = null)
    {
        $this->data = $this->getContent($post_id);
    }

    public function get($field)
    {
        if (isset($this->data[$field])) {
            return $this->data[$field];
        } else {
            return false;
        }
    }

    public function getAll()
    {
        return $this->data;
    }

    private function getContent($post_id = null)
    {
        $content = [];
        $post = get_post($post_id);

        if ($post) {
            $content = [
                'id' => $post->ID,
                'title' => $post->post_title,
                'slug' => $post->post_name,
                'link' => get_permalink($post_id),
                'image' => get_the_post_thumbnail_url($post_id),
                'content' => $post->post_content,
                'excerpt' => $post->post_excerpt,
                'type' => $post->post_type,
                // 'categories' => get_the_terms($post_id),
            ];
        }

        if (function_exists('get_fields')) {
            $fields = get_fields($post_id);
            if ($fields) {
                foreach ($fields as $key => $field) {
                    if (!is_array($field)) {
                        $content[$key] = $field;
                    } else {
                        $content[$key] = $this->clearArray($key, $field);
                    }
                }
            }
        }

        return $content;
    }

    private function clearArray($string, $array)
    {
        $newArray = [];
        foreach ($array as $key => $value) {
            $replacedKey = str_replace($string . '_', '', $key);
            if (is_array($value)) {
                if (is_int($key)) {
                    $newArray[$replacedKey] = $this->clearArray($string, $value);
                } else {
                    $newArray[$replacedKey] = $this->clearArray($key, $value);
                }
            } else {
                $newArray[$replacedKey] = $value;
            }
        }

        return $newArray;
    }
}
