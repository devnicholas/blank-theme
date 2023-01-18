<?php
function image($path)
{
    return THEME_URL . '/static/images/' . $path;
}
function static_file($path)
{
    return THEME_URL . '/static/' . $path;
}
