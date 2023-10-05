<?php
class DefaultPages
{
    private $pages = [];

    public function setPages($pages)
    {
        foreach ($pages as $page) {
            $this->pages[] = [
                'post_type' => 'page',
                'post_title' => $page,
                'post_status' => 'publish',
                'post_content' => '',
                'post_author' => get_current_user_id(),
            ];
        }
    }

    public function create()
    {
        foreach ($this->pages as $page) {
            if (!$this->page_exists($page['post_title'])) wp_insert_post($page);
        }
    }

    private function page_exists($title)
    {
        $query = new \WP_Query([
            'post_type' => 'page',
            'fields' => 'ids',
            'name' => sanitize_title($title),
        ]);

        return $query->have_posts();
    }
}