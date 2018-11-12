<?php

/*
	Secure the inputs of the user, this will clean the input
*/
function escape($string){
	return htmlentities($string, ENT_QUOTE, 'UTF-8');
}

?>