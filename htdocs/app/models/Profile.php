<?php
namespace app\models;

class Profile extends \app\core\Model{

    function __construct(){
		parent::__construct();
	}

	function get($profile_id){
		$SQL = 'SELECT * FROM profile WHERE profile_id = :profile_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Profile");
		return $STMT->fetch();
	}

	function getUserId($user_id){
		$SQL = 'SELECT * FROM profile WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Profile");
		return $STMT->fetch();
	}

	function insert(){
		$SQL = 'INSERT INTO profile(user_id, first_name, middle_name, last_name) VALUES(:user_id,:first_name,:middle_name,:last_name)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id,'first_name'=>$this->first_name,'middle_name'=>$this->middle_name,'last_name'=>$this->last_name]);
		return self::$_connection->lastInsertId();
	}

	function update(){
		$SQL = 'UPDATE profile SET first_name = :first_name, middle_name = :middle_name, last_name = :last_name WHERE user_id = :user_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['first_name'=>$this->first_name,'middle_name'=>$this->middle_name,'last_name'=>$this->last_name,'user_id'=>$this->user_id]);
	}

}