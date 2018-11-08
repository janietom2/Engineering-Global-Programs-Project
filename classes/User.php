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
		if(!$this->_db->insert('dash_users', $fields)) {
			throw new Exception('Sorry mistakes were made. Error creating your account.' . print_r($fields));
		}
	}

	public function update($where, $id, $fields = array()) {
		if(!$this->_db->update('dash_users', $where, $id, $fields)) {
			throw new Exception('Sorry mistakes were made. Error Updating your account.' . print_r($fields));
		}
	}

	private function find($user = null){
		if($user) {

			$field = (is_numeric($user)) ? 'id' : 'username';
			$data = $this->_db->get('dash_users', array(
				$field, '=', $user
			));

		   if($data->count()) {
		   	$this->_data = $data->first();
		   	return true;
		   }
		}

		return false;
	}

	public function login($username = null, $password = null) {
		$user = $this->find($username);

		if($user) {
			if($this->data()->password === Hash::make($password, $this->data()->salt)) {
				Session::put($this->_sessionName, $this->data()->id);
				return true;
			}
		}

		return false;
	}

	public function checkByPin($username = null, $pin = null) {
		$user = $this->find($username);

		if($user) {
			if($this->data()->pin === Hash::make($pin, $this->data()->salt_pin)) {
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
		return $this->data()->rank;
	}
	public function data() {
		return $this->_data;
	}

	public function isLoggedIn(){
		return $this->_isLoggedIn;
	}
}


 ?>
