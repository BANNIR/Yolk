<?php
namespace app\models;

class Seller extends \app\core\Model{

    function __construct(){
		parent::__construct();
	}

	function get($seller_id){
		$SQL = 'SELECT * FROM seller WHERE seller_id = :seller_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['seller_id'=>$seller_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Seller");
		return $STMT->fetch();
	}

	function getUserId($user_id_seller){
		$SQL = 'SELECT * FROM seller WHERE user_id_seller = :user_id_seller';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id_seller'=>$user_id_seller]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Seller");
		return $STMT->fetch();
	}

	function insert(){
		$SQL = 'INSERT INTO seller(user_id_seller, name) VALUES(:user_id_seller,:name)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id_seller'=>$this->user_id_seller,'name'=>$this->name]);
		return self::$_connection->lastInsertId();
	}

	function update(){
		$SQL = 'UPDATE seller SET name = :name WHERE user_id_seller = :user_id_seller';     // seller id or user id seller
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['name'=>$this->name, 'user_id_seller'=>$this->user_id_seller]); //might cause problems from naming
	}

}