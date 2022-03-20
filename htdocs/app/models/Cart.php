<?php
namespace app\models;

class Cart extends \app\core\Model{
	function insert(){
		$SQL = 'INSERT INTO cart(cart_product_id,cart_consumer_id,cart_product_quantity,cart_order_price) VALUES(:cart_product_id,:cart_consumer_id,:cart_product_quantity,:cart_order_price)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['cart_product_id'=>$this->cart_product_id,'cart_consumer_id'=>$this->cart_consumer_id,'cart_product_quantity'=>$this->cart_product_quantity,'cart_order_price'=>$this->cart_order_price]);
	}
}