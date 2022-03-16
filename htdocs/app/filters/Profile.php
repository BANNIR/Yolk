<?php
namespace app\filters;
//classes in this namespace will have an execute method
//the framework runs execute to ensure the filtering

#[\Attribute]
class Profile{

	function execute(){
		$profile = new \app\models\Profile();
		$profile = $profile->getUserId($_SESSION['user_id']);
		if(!$profile){ 
			header('location:/Profile/create/' . $_SESSION['user_id']);
			return true; //I want to indicate to the framework that the user is filtered
		}
		return false;
	}

}