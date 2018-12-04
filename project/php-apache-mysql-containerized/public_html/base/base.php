<?php

function get_init(){
    require_once './core/init.php';
}

function get_header(){
    require_once 'header.php';
}

function get_content(){
    require_once 'content.php';
}

function get_navbar(){
    require_once 'navbar.php';
}

function get_footer(){
    require_once 'footer.php';
}

// Admin

function get_adminheader(){
    require_once 'admin_header.php';
}

function get_admincontent(){
    require_once 'admin_content.php';
}

function get_adminnavbar(){
    require_once 'admin_navbar.php';
}

function get_adminfooter(){
    require_once 'admin_footer.php';
}


?>