<?php
function create_default_contents()
{
    $idUser = get_current_user_id();
    $pages = [
        [
            'post_type' => 'page',
            'post_title' => 'Home',
            'post_status' => 'publish',
            'post_content' => '',
            'post_author' => $idUser,
        ]
    ];
    foreach ($pages as $page) {
        if (!get_page_by_title($page['post_title'])) wp_insert_post($page);
    }
}
add_action('after_switch_theme', 'create_default_contents');

