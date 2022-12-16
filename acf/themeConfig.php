<?php
$themeConfigs = new OptionPages('Configurações do tema', 'theme_config');

$acf = new AcfBuilder('theme_config', 'Configurações do tema');
$acf->setLocate('theme_config', 'options_page');

$acf->createField('header_logo', 'Logo do cabeçalho', 'image');
$acf->createField('footer_logo', 'Logo do rodapé', 'image');
$acf->createField('copyright', 'Copyright');
