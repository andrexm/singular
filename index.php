<?php

ob_start();

use Src\Controllers\Home;
use Pecee\SimpleRouter\SimpleRouter;

require "vendor/autoload.php";

SimpleRouter::setDefaultNamespace('\src\Controllers');
SimpleRouter::get('/', [Home::class, 'index']);

// Start the routing
SimpleRouter::start();

ob_end_flush();
