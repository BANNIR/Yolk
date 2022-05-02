<?php
	//TODO: more initialization goes in this file
	session_start();
	require_once('app/core/autoload.php');
	include_once('app/core/i18n.php');
	require("app/core/phpqrcode/qrlib.php");
	define('BASE', 'http://localhost');