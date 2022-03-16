<?php 
namespace app\core;

class DBConnection{

	static $connection = null;

	private function __construct(){
		if(self::$connection == null){
			$host = 'localhost';
			$DBname = 'assignment2';
			$user = 'root';
			$password = '';
			self::$connection = new \PDO("mysql:host=$host;dbname=$DBname", $user, $password);
		}
	}

	public static function getInstance(){
		new DBConnection();
		return self::$connection;
	}

}