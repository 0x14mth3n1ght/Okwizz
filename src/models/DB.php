<?php
include_once 'error.php';

class DB
{

	/**
	 * Get the PDO Object the Database.
	 *
	 * @return PDO
	 */
	public static function getDB()
	{
		if (!isset($GLOBALS["DATABASE"])) {
			$db = DB::initDB();
			DB::populate_if_empty($db);
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
	public static function fetchToMap(PDOStatement $stmt)
	{
		$items = [];
		foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $item) {
			array_push($items, $item);
		}
		return $items;
	}

	public static function tryRunStmt(PDOStatement $stmt, int $nbMods): bool
	{
		try {
			return $stmt->execute() && $stmt->rowCount() == $nbMods;
			return false;
		} catch (PDOException $e) {
			return false;
		}
	}

	public static function tryRunStmtR(PDOStatement $stmt)
	{
		try {
			if ($stmt->execute())
				return DB::fetchToMap($stmt);
			return false;
		} catch (PDOException $e) {
			return false;
		}
	}

	/**
	 * Initialize the Database PDO.
	 *
	 * @return PDO
	 */
	private static function initDB()
	{
		try {
			$db = new PDO('sqlite:../../pima2022-group9-v1.3.sqlite');
		} catch (Exception $e) {
			echo "Impossible d'accéder à la base de données SQLite : " . $e->getMessage();
			die();
		}
		return $db;
	}

	/**
	 * Populate the tables in the database if their does not already exist.
	 *
	 * @param PDO $db
	 */
	private static function populate_if_empty(PDO $db)
	{
		$stmt = $db->prepare("SELECT sm.name FROM sqlite_master sm WHERE sm.type='table' AND sm.name=:table_name;");
		$stmt->bindValue(':table_name', "player", PDO::PARAM_STR);
		$stmt->execute();
		$res = DB::fetchToMap($stmt);
		if (!(isset($res) && isset($res[0]) && isset($res[0]["name"]) && $res[0]["name"] == "player")) {
			DB::populate($db);
		}
	}

	/**
	 * Populate the tables in the database.
	 * 
	 * @param PDO $db
	 */
	private static function populate(PDO $db)
	{
		$sql = file_get_contents('../SQL/tables-create.sql');
		$db->exec($sql);
	}
}
