<?php
session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
			'host' => 'mysql', 
			'port' => 4306,
			'username' => 'root', 
			'password' => 'rootpassword', 
			'db' => 'global_programs'
		),
	'remember' => array(
			'cookie_name' => 'hash',
			'cookie_expiry' => 10
		),
	'session' => array(
			'session_name' => 'user',
			'token_name' => 'token'
		)

	);

spl_autoload_register(function($class) {
	require_once './classes/'. $class . '.php';
});

require_once './functions/sanitize.php';

?>
