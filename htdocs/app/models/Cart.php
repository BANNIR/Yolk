<?php
namespace app\models;

class Cart extends \app\core\Model{

	function getAll($consumer_id){
		$SQL = 'SELECT * FROM cart WHERE cart_consumer_id = :cart_consumer_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['cart_consumer_id'=>$consumer_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Cart");
		return $STMT->fetchAll();
	}

	function get($cart_id){
		$SQL = 'SELECT * FROM cart WHERE cart_id = :cart_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['cart_id'=>$cart_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Cart");
		return $STMT->fetch();
	}

	function update(){
		$SQL = 'UPDATE cart SET cart_product_quantity = :cart_product_quantity WHERE cart_id = :cart_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['cart_product_quantity'=>$this->cart_product_quantity,'cart_id'=>$this->cart_id]);
	}

	function insert(){
		$SQL = 'INSERT INTO cart(cart_product_id,cart_consumer_id,cart_product_quantity,cart_order_price,cart_total_price_item) VALUES(:cart_product_id,:cart_consumer_id,:cart_product_quantity,:cart_order_price,:cart_total_price_item)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['cart_product_id'=>$this->cart_product_id,'cart_consumer_id'=>$this->cart_consumer_id,'cart_product_quantity'=>$this->cart_product_quantity,'cart_order_price'=>$this->cart_order_price,'cart_total_price_item'=>$this->cart_total_price_item]);
	}

	function totalPrice($consumer_id) {
		$SQL = 'SELECT SUM(cart_order_price * cart_product_quantity) FROM cart WHERE cart_consumer_id = :cart_consumer_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['cart_consumer_id'=>$consumer_id]);
		// $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Cart");
		return $STMT->fetch();
	}

	function delete($product_id){
		$SQL = 'DELETE FROM cart WHERE cart_product_id = :cart_product_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['cart_product_id'=>$product_id]);
	}
	function deleteByConsumer($consumer_id){
		$SQL = 'DELETE FROM cart WHERE cart_consumer_id = :cart_consumer_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['cart_consumer_id'=>$consumer_id]);
	}
	function checkIfExisting($cart_product_id) {
		$SQL = 'SELECT * FROM cart WHERE cart_product_id = :cart_product_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['cart_product_id'=>$cart_product_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Cart");
		return $STMT->fetch();
	}
}