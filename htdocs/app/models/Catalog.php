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

	function insert($catalogue_product_id){
		$SQL = 'INSERT INTO catalogue(catalogue_product_id) VALUES(:catalogue_product_id)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['catalogue_product_id'=>$this->$catalogue_product_id]);
	}

	function delete($catalogue_product_id){
		$SQL = 'DELETE FROM catalogue WHERE catalogue_product_id = :catalogue_product_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['catalogue_product_id'=>$catalogue_product_id]);
	}

}