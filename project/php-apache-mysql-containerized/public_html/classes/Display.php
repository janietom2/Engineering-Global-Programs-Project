<?php

	class Display {

		public static function flashMessages($messages = array()) {
			if(!empty($messages)) {

				return $messages;
			}

			return false;
		}

		public static function sendMessages($messages = array(), $color){
			if($messages){
				if($color == 'success') {
					$color = 'alert-success';
				}

				if($color == 'error') {
					$color = 'alert-danger';

				}

						echo "<br>
								<div class='alert ".$color." fade in block-inner'>
								<button type='button' class='close' data-dismiss='alert'>×</button>
								<i class='icon-cancel-circle'></i>
								<ul>";
						foreach($messages as $message) {
								echo "<div style = 'padding-left:20px; height:5px;'></div><li>$message</li>";
						}

						echo " </ul>
						</div>";

			}
			return false;
		}

		public static function sendMessage($message, $color) {
			if($message){
				if($color == 'success') {
					$color = 'alert-success';
				}

				if($color == 'error') {
					$color = 'alert-danger';

				}

						echo "<br>
								<div class='alert ".$color." fade in block-inner'>
								<button type='button' class='close' data-dismiss='alert'>×</button>
								<i class='icon-cancel-circle'></i>";
						echo $message;
						echo  "</div>";

			}

			return false;
		}


		//Table

	}


 ?>
