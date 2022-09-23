<?php

use Src\Core\View;

/**
 * URL - Returns the current URL with the given path
 *
 * @param string|null $path
 * @return string
 */
function url(string $path = null): string
{
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ?
        'https://' : 'http://';

    $url .= $_SERVER['HTTP_HOST'] . ($path ? $path : '');
    return $url;
}

/**
 * A better way to insert the assets to your view
 *
 * @param string $path
 * @return string
 */
function assets(string $path): string
{
    return url('/assets/' . $path);
}

/**
 * Returns a Twig rendered view
 *
 * @param string $view
 * @param array $data
 * @return void
 */
function view(string $view, $data = []): string
{
    return (new View(VIEWS_PATH))->render($view . '.' . VIEW_DEFAULT_EXT, $data);
}
