<?php
namespace app\models;

class Product extends \app\core\Model{

    function get($product_id){
		$SQL = 'SELECT * FROM product WHERE product_id = :product_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$product_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Product");
		return $STMT->fetch();
	}

	function getAll(){
		$SQL = 'SELECT * FROM product';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Product");
		return $STMT->fetchAll();
	}
	// this one is new
	function getAllBySeller($seller_id){
			$SQL = 'SELECT * FROM product WHERE seller_id = :seller_id';
			$STMT = self::$_connection->prepare($SQL);
			$STMT->execute(['seller_id'=>$seller_id]);
			//TODO:add something here to make the return types cooler
			$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Product");
			return $STMT->fetchAll();
	}

	function getTitle($product_name){
        $SQL = 'SELECT * FROM product WHERE product_name LIKE :product_name';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['product_name'=>$product_name]);
        //TODO:add something here to make the return types cooler
        $STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Product");
        return $STMT->fetchAll();
    }

	function insert(){
		$SQL = 'INSERT INTO product(product_name,seller_id,product_description,picture,product_price,product_quantity,advertisement) VALUES(:product_name,:seller_id,:product_description,:picture,:product_price,:product_quantity,:advertisement)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_name'=>$this->product_name,'seller_id'=>$this->seller_id,'product_description'=>$this->product_description,'picture'=>$this->picture,'product_price'=>$this->product_price,'product_quantity'=>$this->product_quantity,'advertisement'=>$this->advertisement]);
	}

	function update(){
		$SQL = 'UPDATE product SET product_name = :product_name, product_description = :product_description, picture = :picture, product_price = :product_price, product_quantity = :product_quantity, advertisement = :advertisement WHERE product_id = :product_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_name'=>$this->product_name,'product_description'=>$this->product_description,'picture'=>$this->picture,'product_price'=>$this->product_price,'product_quantity'=>$this->product_quantity,'product_id'=>$this->product_id,'advertisement'=>$this->advertisement]);
	}

	function delete($product_id){
		$SQL = 'DELETE FROM product WHERE product_id = :product_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_id'=>$product_id]);
	}

}