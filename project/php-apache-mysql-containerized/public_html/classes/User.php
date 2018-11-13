<?php

class User {
	private $_db,
			$_data,
			$_sessionName,
			$_isLoggedIn;


	public function __construct($user = null) {
		$this->_db = DB::getInstance();

		$this->_sessionName = Config::get('session/session_name');

		if(!$user){
			if(Session::exists($this->_sessionName)) {
				$user = Session::get($this->_sessionName);

				if($this->find($user)) {
					$this->_isLoggedIn = true;
				}else {
					//logout
				}

			}
			else {
				$this->find($user);
			}
		}
	}

	public function create($fields = array()) {
		if(!$this->_db->insert('Person', $fields)) {
			throw new Exception('Sorry mistakes were made. Error creating your account.' . print_r($fields));
		}
	}

	public function update($where, $id, $fields = array()) {
		if(!$this->_db->update('Person', $where, $id, $fields)) {
			throw new Exception('Sorry mistakes were made. Error Updating your account.' . print_r($fields));
		}
	}

	private function find($user = null){
		if($user) {

			$field = (is_numeric($user)) ? 'pid' : 'pemail';
			$data = $this->_db->get('Person', array(
				$field, '=', $user
			));

		   if($data->count()) {
		   	$this->_data = $data->first();
		   	return true;
		   }
		}

		return false;
	}

	public function login($email = null, $password = null) {
		$user = $this->find($email);

		if($user) {
			if($this->data()->ppwd === Hash::make($password, $this->data()->salt)) {
				Session::put($this->_sessionName, $this->data()->pid);
				return true;
			}
		}

		return false;
	}


	public function logout() {
		Session::delete($this->_sessionName);
	}

	public function hasPermission($getRank) {
		if($this->rank() >= $getRank) {
			return true;
		}
		return false;
	}

	public function rank() {
		return $this->data()->pacceslvl;
	}
	public function data() {
		return $this->_data;
	}

	public function isLoggedIn(){
		return $this->_isLoggedIn;
	}
}


 ?>
