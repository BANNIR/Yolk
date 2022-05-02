<?php
namespace app\models;


class ProductReturn extends \app\core\Model{

    function __construct(){
		parent::__construct();
	}

	function get($return_id){
		$SQL = 'SELECT * FROM productreturn WHERE return_id = :return_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['return_id'=>$return_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\ProductReturn");
		return $STMT->fetch();
	}

	function getAllByConsumer($return_consumer_id){
			$SQL = 'SELECT * FROM productreturn WHERE return_consumer_id = :return_consumer_id';
			$STMT = self::$_connection->prepare($SQL);
			$STMT->execute(['return_consumer_id'=>$return_consumer_id]);
			//TODO:add something here to make the return types cooler
			$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\ProductReturn");
			return $STMT->fetchAll();
	}

	function getAllBySeller($return_seller_id){
		$SQL = 'SELECT * FROM productreturn WHERE return_seller_id = :return_seller_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['return_seller_id'=>$return_seller_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\ProductReturn");
		return $STMT->fetchAll();
}

	// function getAllProduct($profile_id) {
	// 		$SQL = 'SELECT * FROM publication_request WHERE profile_id = :profile_id';
	// 		$STMT = self::$_connection->prepare($SQL);
	// 		$STMT->execute(['profile_id'=>$profile_id]);
	// 		//TODO:add something here to make the return types cooler
	// 		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\request");
	// 		return $STMT->fetchAll();
	// }


	function insert(){
		$SQL = 'INSERT INTO productreturn(return_consumer_id, date, return_seller_id, return_description, return_product_id) VALUES(:return_consumer_id, :date, :return_seller_id, :return_description, :return_product_id)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['return_consumer_id'=>$this->return_consumer_id, 'date'=>$this->date, 'return_seller_id'=>$this->return_seller_id, 'return_description'=>$this->return_description, 'return_product_id'=>$this->return_product_id]);
	}

	function update(){
		$SQL = 'UPDATE productreturn SET isAccepted = :isAccepted WHERE return_id = :return_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['isAccepted'=>$this->isAccepted, 'return_id'=>$this->return_id]);
	}

	function delete($publication_request_id){
		$SQL = 'DELETE FROM productreturn WHERE publication_request_id = :publication_request_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_request_id'=>$publication_request_id]);
	}
}