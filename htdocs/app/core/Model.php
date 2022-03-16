<?php
namespace app\core;

class Model{

	protected static $_connection;
	//connect to the database
	function __construct(){
		self::$_connection = DBConnection::getInstance();
	}

}