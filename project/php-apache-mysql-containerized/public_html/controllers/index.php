<?php

get_init();
$user = new User();

function needs_login(){
    $user = new User();
    if(!$user->isLoggedIn()) {
        Session::flash('deniedIndex', 'Please log in first');
        Redirect::to('/login');
      }
}

?>