<?php

define('ENV', str_contains($_SERVER['HTTP_HOST'], 'localhost') ? 'dev' : 'prod');
define('BASE', (ENV === 'dev') ? 'http://localhost:8000' : '');
