<?php
/**
 * 
 * Simple routing schema
 * 
 */

$request = $_SERVER['REDIRECT_URL'];
require_once './base/base.php';

switch ($request) {
    case '/home' :
        require_once './controllers/index.php';
        require __DIR__ . '/app/views/index.php';
        break;
    case '' :
        require_once './controllers/index.php';
        require __DIR__ . '/app/views/index.php';
        break;
    case '/login' :
        require_once './controllers/login.php';
        require __DIR__ . '/app/views/login.php';
        break;
    case '/createuser' :
        require __DIR__ . '/app/views/createuser.php';
        break;
    case '/logout' :
        require_once './controllers/logout.php';
        break;
    case '/programs':
        require_once './controllers/programs.php';
        require __DIR__ . '/app/views/programs.php';
        break;
    case '/index.php':
        require __DIR__ . '/app/views/404.php';
        break;
    default: 
        require __DIR__ . '/app/views/404.php';
        break;
}

?>