<?php
get_init();

$user = new User();

$user->logout();

Redirect::to('/login');

?>