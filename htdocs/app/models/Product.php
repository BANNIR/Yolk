<?php
namespace app\models;

class Product extends \app\core\Model{

    function get($seller_id){
		$SQL = 'SELECT * FROM product WHERE seller_id = :seller_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['seller_id'=>$seller_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Product");
		return $STMT->fetch();
	}

	function getAll(){
		$SQL = 'SELECT * FROM product';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Publication");
		return $STMT->fetchAll();
	}
	// this one is new
	function getAllByProfile($profile_id){
			$SQL = 'SELECT * FROM publication WHERE profile_id = :profile_id';
			$STMT = self::$_connection->prepare($SQL);
			$STMT->execute(['profile_id'=>$profile_id]);
			//TODO:add something here to make the return types cooler
			$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Publication");
			return $STMT->fetchAll();
	}

	function getTitle($publication_title){
		$SQL = 'SELECT * FROM publication WHERE publication_title = :publication_title';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_title'=>$publication_title]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Publication");
		return $STMT->fetchAll();
	}

	function insert(){
		$SQL = 'INSERT INTO product(product_name,seller_id,product_description,product_price,product_quantity) VALUES(:product_name,:seller_id,:product_description,:product_price,:product_quantity)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_name'=>$this->product_name,'seller_id'=>$this->seller_id,'product_description'=>$this->product_description,'product_price'=>$this->product_price,'product_quantity'=>$this->product_quantity]);
	}

	function update(){
		$SQL = 'UPDATE product SET product_name = :product_name, product_description = :product_description, product_price = :product_price, product_quantity = :product_quantity WHERE seller_id = :seller_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_name'=>$this->product_name,'product_description'=>$this->product_description,'product_price'=>$this->product_price,'product_quantity'=>$this->product_quantity,'seller_id'=>$this->seller_id]);
	}

	function delete($publication_id){
		$SQL = 'DELETE FROM publication WHERE publication_id = :publication_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_id'=>$publication_id]);
	}

}