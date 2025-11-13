<?php get_header(); ?>
<?php 
// The active taxonomy can be retrieved with get_queried_object()
get_template_part('resources/views/lists/list', get_post_type()); 
?>
<?php get_footer(); ?>