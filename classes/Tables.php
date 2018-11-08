<?php

	class Tables {

		public static function getUserFromTask($userID) {
			$dbUser       = DB::getInstance();

			$findUserInformation = $dbUser->get('dash_users', array(
				'id', '=', $userID
			));

			$userCompleteName = $findUserInformation->first()->name." ".$findUserInformation->first()->lastname;

			return $userCompleteName;
		}

		public static function priorityLabel($number) {
			switch ($number) {
				case 1: //High
					$label = '<span class="label label-danger">High</span>';
					break;

				case 2:
					$label = '<span class="label label-success">Medium</span>';
					break;

				default:
					$label = '<span class="label label-info">Low</span>';
					break;
			}

			return $label;
		}

		public static function approvalLabel($number) {
			switch ($number) {
				case 1:
					$label = '<span class="label label-danger">Denied</span>';
					break;

				case 2:
					$label = '<span class="label label-success">Accepted</span>';
					break;

				default:
					$label = '<span class="label label-info">Pending</span>';
					break;
			}
			return $label;
		}

		public static function task_view_link_by_rank($rank) {
			if($rank > 2) {
				return "updatetask.php?tid=";
			} else{
				return "viewtask.php?tid=";
			}
		}

		public static function loading_bar_status($percent){

			if($percent < 40) {
				return 'progress-bar progress-bar-danger progress-bar-striped active';
			} else if($percent >= 40 && $percent < 80) {
				return 'progress-bar progress-bar-warning progress-bar-striped active';
			} else if ($percent >= 80 && $percent != 100) {
				return 'progress-bar progress-bar-info progress-bar-striped active';
			}  else {
				return 'progress-bar-success progress-bar';
			}

			return false;

		}




}

 ?>
