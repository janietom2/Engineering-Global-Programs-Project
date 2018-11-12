<?php 

class DSearch{


	public static function departmentSearchByInt($intDepartment) {
		$db = DB::getInstance();

		$department = $db->get('dash_departments', array(
			'id', '=', $intDepartment
		));

		return $department->first()->name;
	}

}


 ?>