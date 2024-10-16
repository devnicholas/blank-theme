<footer class="border-t border-neutral-200">
    <div class="container px-4 md:px-0 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center md:text-left">
                <img src="<?= THEME_DATA['logo'] ?>" alt="" class="mx-auto md:ml-0">
                <p class="text-sm flex items-center mt-4 justify-center md:justify-start">
                    <img src="<?= image('icon-map.svg') ?>" alt="" class="w-4 mr-2">
                    <?= THEME_DATA['endereco'] ?>
                </p>
                <p class="text-sm flex items-center mt-2 justify-center md:justify-start">
                    <img src="<?= image('icon-mail.svg') ?>" alt="" class="w-4 mr-2">
                    <?= THEME_DATA['email'] ?>
                </p>
            </div>
            <div class="text-center md:text-left">
                <h3 class="text-xl text-verde font-bold mb-2">Menu</h3>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location'    => 'menu-footer',
                        'menu_class'        => 'menu-footer',
                    )
                );
                ?>
            </div>
            <div class="text-center md:text-left">
                <h3 class="text-xl text-verde font-bold mb-2">Redes sociais</h3>
                <ul class="flex justify-center md:justify-start space-x-2 md:space-x-4 w-full">
                    <?php foreach (THEME_DATA['socials'] as $social) { ?>
                        <li>
                            <a href="<?= $social['link'] ?>" target="_blank" rel="noopener noreferrer">
                                <img src="<?= $social['icon'] ?>" alt="">
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="flex flex-col justify-center items-center space-y-3 w-full py-4 border-t border-verde">
        <p class="text-center">© <?= get_bloginfo('name') ?> - Todos os Direitos Reservados</p>
        <a href="https://github.com/devnicholas/blank-theme" target="_blank" rel="noopener noreferrer">
            <img src="<?= image('blank.png') ?>" alt="" class="w-7">
        </a>
    </div>
</footer>
<?php wp_footer(); ?>

</body>

</html>