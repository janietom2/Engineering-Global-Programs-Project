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
    case '/program':
        require_once './controllers/programs.php';
        require __DIR__ . '/app/views/program.php';
        break;
    case '/new_program':
        require_once './controllers/programs.php';
        require __DIR__ . '/app/views/new_program.php';
        break;
    case '/edit_program':
        require_once './controllers/programs.php';
        require __DIR__ . '/app/views/edit_program.php';
        break;
    case '/application':
        require_once './controllers/applications.php';
        require __DIR__ . '/app/views/application.php';
        break;
    case '/new_application':
        require_once './controllers/applications.php';
        require __DIR__ . '/app/views/new_application.php';
        break;
    case '/index.php':
        require __DIR__ . '/app/views/404.php';
        break;
    case '/adminpanel':
        require __DIR__ . '/app/views/adminpanel/production/index.html';
        break;
    case '/admin-programs':
        require_once './controllers/programs.php';
        require __DIR__ . '/app/views/adminpanel/production/admin_programs.php';
        break;
    case '/admin-edit-program':
        require_once './controllers/programs.php';
        require __DIR__ . '/app/views/adminpanel/production/admin_edit_program.php';
        break;
    case '/admin-new-program':
        require_once './controllers/programs.php';
        require __DIR__ . '/app/views/adminpanel/production/admin_new_program.php';
        break;
    case '/admin-applications':
        require_once './controllers/applications.php';
        require __DIR__ . '/app/views/adminpanel/production/admin_applications.php';
        break;
    case '/admin-check-application':
        require_once './controllers/applications.php';
        require __DIR__ . '/app/views/adminpanel/production/admin_check_application.php';
        break;
    case '/mystatus':
        require_once './controllers/applications.php';
        require __DIR__ . '/app/views/mystatus.php';
        break;
    case '/admin':
        require_once './controllers/applications.php';
        require __DIR__ . '/app/views/adminpanel/production/admin_home.php';
        break;
    default: 
        require __DIR__ . '/app/views/404.php';
        break;
}

?>