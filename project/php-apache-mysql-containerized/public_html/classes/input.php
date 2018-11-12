<?php 

class input{

	public static function cleanInput($input) {

		if(is_numeric($input)) {
			return $input;
		} 

		$tmp = strval($input);
		//$tmp = mb_convert_encoding($string, 'UTF-8', 'UTF-8');
		$tmp = htmlentities($tmp, ENT_QUOTES, 'UTF-8');
		return $tmp;
	}

	public static function exists($type = 'post'){
		switch ($type) {
			case 'post':
				return (!empty($_POST)) ? true : false;
				break;
			case 'get':
				return (!empty($_GET)) ? true : false;
				break;
			default:
				return false;
				break;
		}
	}

	public static function get($item){
		if(isset($_POST[$item])) {
			return $_POST[$item];
		}else if(isset($_GET[$item])) {
			return $_GET[$item];
		}
		return '';
	}
}

 ?>