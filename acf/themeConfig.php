<?php
$themeConfigs = new OptionPages('Configurações do tema', 'theme_config');

$acf = new AcfBuilder('theme_config', 'Configurações do tema');
$acf->setLocate('theme_config', 'options_page');

$acf->createField('logo', 'Logo', 'image');
$acf->createField('whatsapp', 'Whatsapp');
$acf->createField('whatsapp_link', 'Link do Whatsapp');
$acf->createField('email', 'E-mail');
$acf->createField('endereco', 'Endereço');

$acf->createGroup('socials', 'Redes sociais', true, [
    FieldsController::createField('socials_icon', 'Ícone', 'image'),
    FieldsController::createField('socials_link', 'Link'),
]);
