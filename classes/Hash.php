<?php 

	class Hash{

		public static function make($string, $salt = '') {
			return hash('sha256', $string . $salt);
		}

		public static function salt($length) {
			  $salt = '';

			  for($i = 0; $i < $length; $i++) {
			   $salt .= mt_rand(0, 9);
			  }
			  
			  return $salt;
		}

		public static function unique() {
			return self::make(uniqid());
		}

	}


 ?>