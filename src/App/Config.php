<?php

define('ENV', str_contains($_SERVER['HTTP_HOST'], 'localhost') ? 'dev' : 'prod');
define('BASE', (ENV === 'dev') ? 'http://localhost:8100' : 'https://yourwebsite.com');
define('DIR', __DIR__ . DIRECTORY_SEPARATOR . "../../");

// Database
define('DATA_LAYER_CONFIG', [
    "driver" => "mysql",
    "host" => "127.0.0.1",
    "port" => "3306",
    "dbname" => "singular",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

// Views
define('VIEWS_PATH', DIR . 'views');
define('VIEWS_CACHE', DIR . 'storage/cache/views');

// Authentication
define('LOGIN_ATTEMPTS_WAITING_TIME', time() + 300); // 5 minutes
