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
	
	function getByProduct($checkout_product_id){
		$SQL = 'SELECT * FROM checkout WHERE checkout_product_id = :checkout_product_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['checkout_product_id'=>$checkout_product_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Checkout");
		return $STMT->fetch();
	}

	function insert(){
		$SQL = 'INSERT INTO checkout(checkout_product_id, checkout_product_quantity, checkout_consumer_id, totalPrice, dateOfPurchase) VALUES(:checkout_product_id, :checkout_product_quantity, :checkout_consumer_id,:totalPrice,:dateOfPurchase)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['checkout_product_id'=>$this->checkout_product_id,'checkout_product_quantity'=>$this->checkout_product_quantity,'checkout_consumer_id'=>$this->checkout_consumer_id,'totalPrice'=>$this->totalPrice,'dateOfPurchase'=>$this->dateOfPurchase]);
	}

	function delete($checkout_id){
		$SQL = 'DELETE FROM checkout WHERE checkout_product_id = :checkout_product_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['checkout_id'=>$checkout_id]);
	}
	function getLatestCheckout($checkout_consumer_id) {
		$SQL = 'SELECT * FROM checkout WHERE dateOfPurchase IN (SELECT max(dateOfPurchase) FROM checkout) AND checkout_consumer_id = :checkout_consumer_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['checkout_consumer_id'=>$checkout_consumer_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Checkout");
		return $STMT->fetchAll();
	}
}