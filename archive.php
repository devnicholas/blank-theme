<?php get_header(); ?>


<div class="my-6">
    <h1 class="text-center font-bold text-3xl uppercase"><?php the_archive_title(); ?></h1>
</div>
<div class="container">
    <div class="flex flex-col md:flex-row flex-wrap">
        <?php
        while (have_posts()) {
            the_post();
            get_template_part('resources/views/parts/', get_post_type());
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>