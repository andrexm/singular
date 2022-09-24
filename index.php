<?php

ob_start();

use Src\Controllers\Home;
use Src\Core\Router;

require "vendor/autoload.php";

$router = new Router(BASE);

$router->get('/', [Home::class, 'index']);

$router->dispatch();
if ($router->error) {
    echo view('error');
}

ob_end_flush();
