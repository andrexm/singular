<?php

define('ENV', str_contains($_SERVER['HTTP_HOST'], 'localhost') ? 'dev' : 'prod');
define('BASE', (ENV === 'dev') ? 'http://localhost:8000' : '');
define('DIR', __DIR__ . "../../../");

const DATA_LAYER_CONFIG = [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "homely",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
];
