<?php 

	class Config{
		/*
			This function will get the values from the init file/array
		*/
			// ~> Todo: Check what is on the argument, check if exist on the array
		public static function get($path = null){
			if ($path){
				$config = $GLOBALS['config'];
				$path = explode('/', $path);

				foreach ($path as $bit) {
					if(isset($config[$bit])){
						$config = $config[$bit];
					}
				}
				return $config;
			}
			return false;
		}
	}

 ?>