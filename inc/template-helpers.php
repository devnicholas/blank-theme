<?php
function format_price($price)
{
	return number_format($price, 2, ',', '.');
}