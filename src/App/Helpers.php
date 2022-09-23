<?php

use Src\Core\Session;
use Src\Core\View;


// URLs --------------------------------------------------------------------

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
 * @return string
 */
function url_back(): string
{
    return ($_SERVER["HTTP_REFERER"] ?? url());
}

/**
 * Redirects to the specified url with also the possibility of passing a flash message
 *
 * @param string $url
 * @param array $with
 * @return void
 */
function redirect(string $url, array $with = []): void
{
    if (count($with)) (new Session)->set($with[0], $with[1]);

    header("HTTP/1.1 302 Redirect");
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        header("Location: {$url}");
        exit;
    }

    if (filter_input(INPUT_GET, "route", FILTER_DEFAULT) != $url) {
        $location = url($url);
        header("Location: {$location}");
        exit;
    }
}

/**
 * Redirects to the previous url
 *
 * @param array $with
 * @return void
 */
function back(array $with = [])
{
    return redirect(url_back(), $with);
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


// VIEWs --------------------------------------------------------------------

/**
 * Returns a Blade rendered view
 *
 * @param string $view
 * @param array $data
 */
function view(string $view, $data = [])
{
    return (new View(VIEWS_PATH))->render($view, $data);
}


// SESSION --------------------------------------------------------------------

/**
 * Returns a flash message or an instance of the Session class
 *
 * @param string|null $name
 * @return void
 */
function session(string $name = null)
{
    if ($name) return (new Session)->flash($name);
    return (new Session);
}
