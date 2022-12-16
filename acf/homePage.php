<?php
$acf = new AcfBuilder('home', 'Home');
$acf->setLocate('home', 'page_slug');
$acf->createGroup('slider', 'Slider', true, [
    FieldsController::create('image', 'Imagem', 'image'),
    FieldsController::create('title', 'Título'),
    FieldsController::create('url', 'URL', 'url'),
]);