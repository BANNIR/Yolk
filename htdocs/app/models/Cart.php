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

	function insert(){
		$SQL = 'INSERT INTO cart(cart_product_id,cart_consumer_id,cart_product_quantity,cart_order_price) VALUES(:cart_product_id,:cart_consumer_id,:cart_product_quantity,:cart_order_price)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['cart_product_id'=>$this->cart_product_id,'cart_consumer_id'=>$this->cart_consumer_id,'cart_product_quantity'=>$this->cart_product_quantity,'cart_order_price'=>$this->cart_order_price]);
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
}