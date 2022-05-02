<?php
namespace app\models;


class Request extends \app\core\Model{

    function __construct(){
		parent::__construct();
	}

	function get($request_id){
		$SQL = 'SELECT * FROM request WHERE request_id = :request_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['request_id'=>$request_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Request");
		return $STMT->fetch();
	}

	function getAllByConsumer($request_consumer_id){
			$SQL = 'SELECT * FROM request WHERE request_consumer_id = :request_consumer_id';
			$STMT = self::$_connection->prepare($SQL);
			$STMT->execute(['request_consumer_id'=>$request_consumer_id]);
			//TODO:add something here to make the return types cooler
			$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Request");
			return $STMT->fetchAll();
	}

	function getAllBySeller($request_seller_id){
		$SQL = 'SELECT * FROM request WHERE request_seller_id = :request_seller_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['request_seller_id'=>$request_seller_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Request");
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
		$SQL = 'INSERT INTO request(request_consumer_id, date, request_seller_id, request_description, isDone, request_product_id) VALUES(:request_consumer_id, :date, :request_seller_id, :request_description, 0, :request_product_id)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['request_consumer_id'=>$this->request_consumer_id, 'date'=>$this->date, 'request_seller_id'=>$this->request_seller_id, 'request_description'=>$this->request_description, 'request_product_id'=>$this->request_product_id]);
	}

	function update(){
		$SQL = 'UPDATE request SET isDone = 1, seller_response = :seller_response WHERE request_id = :request_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['request_id'=>$this->request_id, 'seller_response'=>$this->seller_response]);
	}

	function delete($publication_request_id){
		$SQL = 'DELETE FROM publication_request WHERE publication_request_id = :publication_request_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_request_id'=>$publication_request_id]);
	}
}