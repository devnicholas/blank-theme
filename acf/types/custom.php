<?php
$partners = new CustomTypes('custom', 'Custom Type');
$partners->create();

$acf = new AcfBuilder('custom', 'Custom Type Fields');
$acf->setLocate('custom', 'post_type');

$acf->createField('link', 'Link', 'url');