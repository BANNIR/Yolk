<?php
namespace app\models;

class Catalog extends \app\core\Model{

    function get($catalogue_product_id){
		$SQL = 'SELECT * FROM catalogue WHERE catalogue_product_id = :catalogue_product_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['catalogue_product_id'=>$catalogue_product_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Catalog");
		return $STMT->fetch();
	}

	function getAll(){
		$SQL = 'SELECT * FROM catalogue';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Catalog");
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
		$SQL = 'INSERT INTO catalogue VALUES(:product_name,:seller_id,:product_description,:product_price,:product_quantity)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_name'=>$this->product_name,'seller_id'=>$this->seller_id,'product_description'=>$this->product_description,'product_price'=>$this->product_price,'product_quantity'=>$this->product_quantity]);
	}

	function update(){
		$SQL = 'UPDATE product SET product_name = :product_name, product_description = :product_description, product_price = :product_price, product_quantity = :product_quantity WHERE seller_id = :seller_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['product_name'=>$this->product_name,'product_description'=>$this->product_description,'product_price'=>$this->product_price,'product_quantity'=>$this->product_quantity,'seller_id'=>$this->seller_id]);
	}

	function delete($catalogue_product_id){
		$SQL = 'DELETE FROM catalogue WHERE catalogue_product_id = :catalogue_product_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['catalogue_product_id'=>$catalogue_product_id]);
	}

}