<?php
namespace app\models;

class Account extends \app\core\Model{

	function __construct(){
		parent::__construct();
	}

	function exists(){ //returns false if the record does not exist and true otherwise
		return $this->get($this->username) != false;
	}

	function get($username){
		$SQL = 'SELECT * FROM account WHERE username = :username';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]);
		//TODO:add something here to make the return types cooler
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\Account");
		return $STMT->fetch();
	}

	function insert(){
		$SQL = 'INSERT INTO account(username,password_hash,isSeller,isConsumer,email) VALUES(:username,:password_hash,:isSeller,:isConsumer,:email)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$this->username,'password_hash'=>$this->password_hash,'isSeller'=>$this->isSeller,'isConsumer'=>$this->isConsumer,'email'=>$this->email]);
	}


}