<?php
class ContentController
{
    public static function getContent($post_id = null)
    {
        $content = [];
        $fields = get_fields($post_id);
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

        if ($fields) {
            foreach ($fields as $key => $field) {
                if (!is_array($field)) {
                    $content[$key] = $field;
                } else {
                    $content[$key] = self::clearArray($key, $field);
                }
            }
        }

        return $content;
    }

    private static function clearArray($string, $array)
    {
        $newArray = [];
        foreach ($array as $key => $value) {
            $replacedKey = str_replace($string . '_', '', $key);
            if (is_array($value)) {
                if (is_int($key)) {
                    $newArray[$replacedKey] = self::clearArray($string, $value);
                } else {
                    $newArray[$replacedKey] = self::clearArray($key, $value);
                }
            } else {
                $newArray[$replacedKey] = $value;
            }
        }

        return $newArray;
    }
}
