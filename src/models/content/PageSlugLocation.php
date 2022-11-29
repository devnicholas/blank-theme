<?php
if (function_exists('acf_register_location_type')) {
    class PageSlugLocation extends ACF_Location
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
    acf_register_location_type('PageSlugLocation');
}
