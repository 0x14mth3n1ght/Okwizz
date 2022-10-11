<?php

class DB {

	/**
	 * Get the PDO Object the Database.
	 *
	 * @return PDO
	 */
	public function getDB(){
		if(!isset($GLOBALS["DATABASE"])){
			$db = $this->initDB();
			$this->populate_if_empty($db);
			//$this->populate($db);
			$GLOBALS["DATABASE"] = $db;
		}
		return $GLOBALS["DATABASE"];
	}

	/**
	 * Unpack a PDOStatement and put it's entries in a map.
	 *
	 * @param PDOStatement $stmt
	 * @return unknown[]
	 */
	public function fetchToMap(PDOStatement $stmt){
		$items = [];
		foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $item){
			$items[] = $item;
		}
		return $items;
	}

	/**
	 * Initialize the Database PDO.
	 *
	 * @return PDO
	 */
	private function initDB(){
		try{
			$db = new PDO('sqlite:../../pima2022-group9.sqlite');
		}catch(Exception $e){
			echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
			die();
		}
		return $db;
	}

	/**
	 * Populate the tables in the database if theirs does not already exist.
	 *
	 * @param PDO $db
	 */
	private function populate_if_empty(PDO $db){
		$stmt = $db->prepare("SELECT sm.name FROM sqlite_master sm WHERE sm.type='table' AND sm.name=:table_name;");
		$stmt->bindValue(':table_name', "User", PDO::PARAM_STR);
		$stmt->execute();
		$res = $this->fetchToMap($stmt);
		if(!(isset($res) && isset($res[0]) && isset($res[0]["name"]) && $res[0]["name"] == "User")){
			$this->populate($db);
		}
	}

	private function populate(PDO $db){
		$sql = file_get_contents('../SQL/tables-create.sql');
		$db->exec($sql);
	}
}

?>