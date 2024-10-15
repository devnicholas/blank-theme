<?php get_header(); ?>

<?php
$taxonomy = get_queried_object();

if (isset($taxonomy->taxonomy)) {
    get_template_part('resources/views/categories/category', $taxonomy->taxonomy);
} else {
    // get_template_part('resources/views/categories/category', 'default');
    echo "<h1>" . $taxonomy->name . "</h1>";
}
?>

<?php get_footer(); ?>