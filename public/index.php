<?php

require_once(dirname(__FILE__, 2) . '/src/config/config.php');

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri === '' || $uri === '/') {
    $uri = '/users.php';
}

require_once(realpath(CONTROLLERS_PATH . "{$uri}"));