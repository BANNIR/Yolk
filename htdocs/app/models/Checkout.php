<?php
namespace app\models;

class Checkout extends \app\core\Model{

	function getAll($checkout_consumer_id){
		$SQL = 'SELECT * FROM checkout WHERE checkout_consumer_id = :checkout_consumer_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['checkout_consumer_id'=>$checkout_consumer_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Checkout");
		return $STMT->fetchAll();
	}

	function get($checkout_id){
		$SQL = 'SELECT * FROM checkout WHERE checkout_id = :checkout_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['checkout_id'=>$checkout_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Checkout");
		return $STMT->fetch();
	}

	function insert(){
		$SQL = 'INSERT INTO checkout(checkout_cart_id, checkout_consumer_id) VALUES(:checkout_cart_id,:checkout_consumer_id)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['checkout_cart_id'=>$this->checkout_cart_id,'checkout_consumer_id'=>$this->checkout_consumer_id]);
	}

	function delete($checkout_id){
		$SQL = 'DELETE FROM checkout WHERE checkout_product_id = :checkout_product_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['checkout_id'=>$checkout_id]);
	}
}