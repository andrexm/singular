<?php

ob_start();

use Src\Controllers\Home;
use Src\Core\Router;

require "vendor/autoload.php";

$router = new Router(BASE);

$router->get('/', [Home::class, 'index']);
$router->post('/contact', [Home::class, 'save']);

$router->dispatch();
if ($router->error) {
    echo 'Pádginad =';
}

ob_end_flush();
