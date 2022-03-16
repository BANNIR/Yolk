<?php
//not yet a full psr-4 autoloader
spl_autoload_register(
	function ($class_name){
		require_once($class_name . '.php');
	}
);