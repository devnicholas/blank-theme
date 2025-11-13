<div class="container px-4 md:px-0">
    <div class="my-6">
        <h1 class="text-center font-bold text-3xl uppercase"><?php the_archive_title(); ?></h1>
    </div>
    <div class="flex flex-col md:flex-row flex-wrap">
        <?php if (!have_posts()) { ?>
            <p class="text-center text-gray-800 text-xl my-12">Nenhum item encontrado</p>
        <?php } ?>
        <div class="grid grid-cols-1 md:grid-cols-3 my-6 gap-4">
            <?php
            while (have_posts()) {
                the_post();
                $item = new ContentController();
            ?>
                <a href="<?= $item->get('link') ?>" class="mx-auto flex flex-col justify-center items-center gap-2">
                    <img src="<?= $item->get('image') ?>" alt="">
                    <p class="text-lg font-bold"><?= $item->get('title') ?></p>
                </a>
            <?php } ?>
        </div>
        <div class="mt-12 text-center">
            <?php the_posts_pagination(); ?>
        </div>
    </div>
</div>