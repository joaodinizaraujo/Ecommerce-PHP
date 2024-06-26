<?php

namespace joaodinizaraujo\DB;

use PDO;

class Sql{
	private $conn;

	public function __construct(){
		$this->conn = new \PDO(
			"mysql:dbname=".$_ENV["DBNAME"].";host=".$_ENV["DBHOSTNAME"],
			$_ENV["DBUSERNAME"],
			$_ENV["DBPASSWORD"]
		);
	}

	private function setParams($statement, $parameters = array()){
		foreach ($parameters as $key => $value) {
			$this->bindParam($statement, $key, $value);
		}
	}

	private function bindParam($statement, $key, $value){
		$statement->bindParam($key, $value);
	}

	public function query($rawQuery, $params = array()){
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
	}

	public function select($rawQuery, $params = array()):array{
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>