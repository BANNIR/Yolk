<?php
namespace app\models;

class Consumer extends \app\core\Model{

    function __construct(){
		parent::__construct();
	}

	function get($consumer_id){
		$SQL = 'SELECT * FROM consumer WHERE consumer_id = :consumer_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['consumer_id'=>$consumer_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Consumer");
		return $STMT->fetch();
	}

	function getUserId($user_id_consumer){
		$SQL = 'SELECT * FROM consumer WHERE user_id_consumer = :user_id_consumer';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id_consumer'=>$user_id_consumer]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Consumer");
		return $STMT->fetch();
	}

	function insert(){
		$SQL = 'INSERT INTO consumer(user_id_consumer, first_name, last_name, address) VALUES(:user_id_consumer,:first_name,:last_name,:address)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id_consumer'=>$this->user_id_consumer,'first_name'=>$this->first_name,'last_name'=>$this->last_name, 'address'=>$this->address]);
		return self::$_connection->lastInsertId();
	}

	function update(){
		$SQL = 'UPDATE consumer SET first_name = :first_name, last_name = :last_name, address = :address WHERE user_id_consumer = :user_id_consumer';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['first_name'=>$this->first_name,'last_name'=>$this->last_name,'address'=>$this->address,'user_id_consumer'=>$this->user_id_consumer]);
	}

}