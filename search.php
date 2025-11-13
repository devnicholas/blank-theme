<?php get_header(); ?>	
<section class="container mx-auto p-4 md:p-0 flex flex-col gap-4">
    <header class="border-b border-neutral-200 py-3">
        <h1 class="text-xl font-bold text-center">Resultado da busca por "<?php echo get_search_query(); ?>"</h1>
    </header>
    <?php if (have_posts()) { ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-6">
            <?php while (have_posts()) { the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="mx-auto flex flex-col justify-center items-center gap-2">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="w-full">
                    <p class="text-lg font-bold"><?php the_title(); ?></p>
                </a>
            <?php } ?>
        </div>
    <?php } else { ?>
        <p class="text-center text-gray-800 text-xl my-12">Nenhum item encontrado</p>
    <?php } ?>
</section>
<?php get_footer(); ?>