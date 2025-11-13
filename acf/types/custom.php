<?php
$partners = new CustomTypes('custom', 'Custom Type', true);
$partners->create();

$acf = new AcfBuilder('custom', 'Custom Type Fields');
$acf->setLocate('custom', 'post_type');

$acf->createField('link', 'Link', 'url');
