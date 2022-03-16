<?php
namespace app\models;


class Comment extends \app\core\Model{

    function __construct(){
		parent::__construct();
	}

	function get($publication_comment_id){
		$SQL = 'SELECT * FROM publication_comment WHERE publication_comment_id = :publication_comment_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_comment_id'=>$publication_comment_id]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Comment");
		return $STMT->fetch();
	}

	function getAll(){
		$SQL = 'SELECT * FROM publication_comment';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Comment");
		return $STMT->fetchAll();
	}

	function getAllByPublication($publication_id){
			$SQL = 'SELECT * FROM publication_comment WHERE publication_id = :publication_id';
			$STMT = self::$_connection->prepare($SQL);
			$STMT->execute(['publication_id'=>$publication_id]);
			//TODO:add something here to make the return types cooler
			$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Comment");
			return $STMT->fetchAll();
	}

	function getAllByProfile($profile_id){
			$SQL = 'SELECT * FROM publication_comment WHERE profile_id = :profile_id';
			$STMT = self::$_connection->prepare($SQL);
			$STMT->execute(['profile_id'=>$profile_id]);
			//TODO:add something here to make the return types cooler
			$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Comment");
			return $STMT->fetchAll();
	}


	function insert(){
		$SQL = 'INSERT INTO publication_comment(profile_id, publication_id, timestamp, comment_text) VALUES(:profile_id, :publication_id, :timestamp, :comment_text)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id, 'publication_id'=>$this->publication_id, 'timestamp'=>$this->timestamp, 'comment_text'=>$this->comment_text]);
	}

	function update(){
		$SQL = 'UPDATE publication_comment SET comment_text = :comment_text, timestamp = :timestamp WHERE publication_comment_id = :publication_comment_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['comment_text'=>$this->comment_text,'timestamp'=>$this->timestamp,'publication_comment_id'=>$this->publication_comment_id]);
	}

	function delete($publication_comment_id){
		$SQL = 'DELETE FROM publication_comment WHERE publication_comment_id = :publication_comment_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['publication_comment_id'=>$publication_comment_id]);
	}
}