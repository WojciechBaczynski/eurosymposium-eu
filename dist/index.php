<?php
error_reporting(0);
@ini_set('display_errors', 0);

$request = $_SERVER['REDIRECT_URL'];

switch ($request) {
    case '/' :
        require __DIR__ . '/views/index.html';
        break;
    case '' :
        require __DIR__ . '/views/index.html';
        break;
    case '/registration' :
        require __DIR__ . '/views/registration.php';
        break;
    default:
        require __DIR__ . '/views/error.html';
        break;
}
