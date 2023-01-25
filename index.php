<?php

define('_', (PHP_OS == 'Windows' || PHP_OS == 'WINNT') ? '\\' : '/');
define('__ROOT__', __DIR__);
define('__REQ_PATH__', parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
define('__REQ_METHOD__', $_SERVER['REQUEST_METHOD']);
define('__ENGINE__', __ROOT__ . _ . 'Engine');
define('__LIBRARY__', __ENGINE__ . _ . 'Library');

require_once __ENGINE__ . _ . 'Loader.php';

define('__CONFIG__', Config\Parser::parse_acf(__DIR__ ._.'.acf'));


var_dump(__CONFIG__);
