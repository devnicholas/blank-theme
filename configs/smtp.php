<?php
add_action('phpmailer_init', 'mail_config');
function mail_config($phpmailer)
{
	$phpmailer->isSMTP();
	$phpmailer->Host = 'smtp.host.com';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 587;
	$phpmailer->Username = 'mail@test.com';
	$phpmailer->Password = 'secret';
}