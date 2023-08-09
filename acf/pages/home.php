<?php
$acf = new AcfBuilder('home', 'Home');
$acf->setLocate('home', 'page_slug'); // ('front_page', 'page-type')
$acf->createGroup('slider', 'Slider', true, [
    FieldsController::createField('image', 'Imagem', 'image'),
    FieldsController::createField('title', 'Título'),
    FieldsController::createField('url', 'URL', 'url'),
]);
