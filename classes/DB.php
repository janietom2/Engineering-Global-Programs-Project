<?php

	class DB {

		private static $_instance = null;
		private $_pdo,
				$_query,
		 		$_error = false,
		 		$_results,
		 		$_count = 0,
		 		$_last;

		/*
			This will build the connection for the database using PDO. It will use a try and catch to check if the connectio contains any error
		*/
		private function __construct() {
			try {
				$this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname=' . Config::get('mysql/db').';charset=UTF8', Config::get('mysql/username'), Config::get('mysql/password'));

			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}

		/*
			Set the instance of the databse once it is create, this will only use one instance of the database, no need to conect over and over again
		*/
	 	public static function getInstance() {
	 		if (!isset(self::$_instance)) {
	 			self::$_instance = new DB();
	 		}
	 		return self::$_instance;
	 	}

	 	/*
			This will create/set/execute and check the query. Also will bind values, taking as param the query and also array. Avoiding any SQL injection
	 	*/
	 	public function query($sql, $params = array()) {

	 		$this->_error = false;

	 		if ($this->_query = $this->_pdo->prepare($sql)) {
	 			$v = 1;
	 			if (count($params)) {
	 				foreach ($params as $param) {
	 					$this->_query->bindValue($v, $param);
	 					$v++;
	 				}
	 			}

	 			if($this->_query->execute()) {
	 				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
	 				$this->_count = $this->_query->rowCount();
	 			}else{
	 				$this->_error = true;
	 			}

	 		}

	 		/* Return the current object we are working with */
	 		return $this;
	 	}

	 	/*
	 		This will bind values, count if there is any rows. This will execute the query, this will get the operators, and conditions. This will facilitate the usage of a complete query. It will validate also the usage of operators to avoid any possible injection
	 	*/
	 	private function action($action, $table, $where = array()) {
	 		if(count($where) === 3) {
	 			$operators = array('=', '>', '<', '>=', '<=');

	 			$field		 = $where[0];
	 			$operator  = $where[1];
	 			$value 		 = $where[2];

	 			if(in_array($operator, $operators)) {
	 				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

	 				if (!$this->query($sql, array($value))->error()) {
	 					return $this;
	 				}
	 			}
	 		}
	 		return false;
	 	}

	 	/*
			This will use the SELECT on SQL to get results. NOTE: if you are going to user * (all) user query(<ARG>) instead.
	 	*/
	 	public function get($table, $where) {
	 		return $this->action('SELECT *', $table, $where);
	 	}

	 	/*
			This functions will delete the specific table and another condition
	 	*/
	 	public function delete($table, $where) {
	 		return $this->action('DELETE ', $table, $where);
	 	}


		/*
			This will call a PROCEDURE with arguments as an array. Values will be binded
		*/
		public function call($procedure, $fields = array()) {
			$values = '';
			$x 		  = 1;

			foreach ($fields as $field) {
				$values .= "?";
				if ($x < count($fields)) {
					$values .= ', ';
				}
				$x++;
			}

			$sql = "CALL {$procedure}({$values})";

			if(!$this->query($sql, $fields)->error()) {
				return $this;
			}

			return false;
		}

	 	/*
			Insert any information securely, by using the action and query functions. It also accepts arrays
	 	*/
	 	public function insert($table, $fields = array()) {
	 		if(count($fields)) {
	 			$keys = array_keys($fields);
	 			$values = '';
	 			$x = 1;

	 			foreach ($fields as $field ) {
	 				$values .= "?";
	 				if ($x < count($fields)) {
	 					$values .= ', ';
	 				}
	 				$x++;
	 			}

	 			$sql = "INSERT INTO {$table} (`". implode('`,`', $keys) . "`) VALUES ({$values})";

	 			if (!$this->query($sql, $fields)->error()) {
	 				return $this;
	 			}

	 		}

	 		return false;
	 	}

	 	/*
			This will update the values of an especific value and field
	 	*/
	 	public function update($table, $where, $id, $fields) {
	 		$set = '';
	 		$x = 1;

	 		foreach ($fields as $name => $value) {
	 			$set .= "{$name} = ?";
	 			if($x < count($fields)){
	 				$set .= ', ';
	 			}
	 			$x++;
	 		}

	 		$sql = "UPDATE {$table} SET {$set} WHERE {$where} = {$id} ";


	 		if(!$this->query($sql, $fields)->error()){
	 			return $this;
	 		}

	 		return false;

	 	}

	 	/*
			This function will count the rows got from the query
	 	*/
	 	public function count() {
	 		return $this->_count;
	 	}

	 	/*
			This will return the results on a object form
	 	*/
	 	public function results() {
	 		return $this->_results;
	 	}

	 	/*
			Gives the user the first result from a query
	 	*/
	 	public function first() {
	 		$first = $this->results();
	 		return $first[0];
	 	}

	 	/*
	 		This will return the last of a column selected

	 	*/
	 	public function last($col = null) {
	 		return $this->_pdo->lastInsertId($col);
	 	}

	 	/*
	 		Check for errors in the database or the results, this will get the returned object from the query
	 	*/
	 	public function error() {
	 		return $this->_error;
	 	}

	}

 ?>
