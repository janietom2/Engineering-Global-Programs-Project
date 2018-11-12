<?php
/**
 * 
 * Simple routing schema
 * 
 */

$request = $_SERVER['REDIRECT_URL'];
require_once './base/base.php';

switch ($request) {
    case '/index' :
        require_once './controllers/index.php';
        require __DIR__ . '/app/views/index.php';
        break;
    case '' :
        require_once './controllers/index.php';
        require __DIR__ . '/app/views/index.php';
        break;
    case '/login' :
        require __DIR__ . '/app/views/login.php';
        break;
    case '/verifycred' :
        require __DIR__ . '/controllers/login.php';
        break;
    case '/createuser' :
        require __DIR__ . '/app/views/createuser.php';
        break;
    case '/test' :
        require __DIR__ . '/app/views/test.php';
        break;
    default: 
        require __DIR__ . '/app/views/404.php';
        break;
}

?>