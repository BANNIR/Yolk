<?php
namespace app\models;

class User extends \app\core\Model{

	function __construct(){
		parent::__construct();
	}

	function exists(){ //returns false if the record does not exist and true otherwise
		return $this->get($this->username) != false;
	}

	function get($username){
		$SQL = 'SELECT * FROM user WHERE username = :username';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
		return $STMT->fetch();
	}

	function insert(){
		$SQL = 'INSERT INTO user(username,password_hash) VALUES(:username,:password_hash)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$this->username,'password_hash'=>$this->password_hash]);
	}


}