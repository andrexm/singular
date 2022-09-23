<?php

/**
 * URL - Returns the current URL with the given path
 *
 * @param string|null $path
 * @return void
 */
function url(string $path = null)
{
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = 'https://';
    } else {
        $url = 'http://';
    }
    $url .= $_SERVER['HTTP_HOST'] . ($path ? $path : '');
    return $url;
}
