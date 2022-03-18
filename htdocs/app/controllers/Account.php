<?php 
namespace app\controllers;

class Account extends \app\core\Controller{
	
	//TODO: Model with get, insert, exists
	//TODO: registration and login view

	function index(){//login here
		if(!isset($_POST['action'])){//there is no form being submitted
			$this->view('Account/login');
		}else{//there is a form submitted
			$account = new \app\models\Account();
			$account = $account->get($_POST['username']);
			if($account != false){
				if(password_verify($_POST['password'],$account->password_hash)){
					//yay! login - store that state in a session
					$_SESSION['username'] = $account->username;
					$_SESSION['user_id'] = $account->user_id;
					/*
					$profile = new \app\models\Profile();
					$user_id = $account->user_id;
					f$proile = $profile->getUserId($user_id);
					*/
					$seller = new \app\models\Seller();
					$user_id = $account->user_id;
					$seller = $seller->getUserId($user_id);
					$consumer = new \app\models\Consumer();
					$consumer = $consumer->getUserId($user_id);
					// here we can check if a seller or consumer exists for given account and if not, redirect to seller/consumer page to put details
					$isSeller = $account->isSeller($_SESSION['username']);
					if ($isSeller) {
					if (!$seller) {
						header("location:/Seller/create/$user_id");
					} else {
						header("location:/Seller/index/$user_id");
					}
					} else {
					
					if (!$consumer) {		
						header("location:/Consumer/create/$user_id");
					} else {
						header("location:/Consumer/index/$user_id");
						//set the profile_id in a session variable
					}
				}
				}else{
					//not the correct password
					$this->view('Account/login','Incorrect username/password combination.');
				}
			}else{
				$this->view('Account/login','Incorrect username/password combination.');
			}
		}
	}

	function register(){//register here
		if(!isset($_POST['action'])){//there is no form being submitted
			$this->view('Account/register');
		}else{//there is a form submitted
			$newAccount = new \app\models\Account();
			$newAccount->username = $_POST['username'];
			var_dump($_POST['choice']);

			 if(!$newAccount->exists() && $_POST['password'] == $_POST['password_confirm']){
			 	$newAccount->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
			 	if ($_POST['choice'] == "isSeller") {
			 		$newAccount->isSeller = 1;
			 		$newAccount->isConsumer = 0;
			 	}else {
			 		$newAccount->isSeller = 0;
			 		$newAccount->isConsumer = 1;
			 	}

			 	$newAccount->email = $_POST['email'];

			 	$newAccount->insert();
			 	header('location:/Account/index');
			 }else{
				$this->view('Account/register','The user account with that username already exists.');
			 }
		}
	}

	#[\app\filters\Login]
	function logout(){
		session_destroy();//deletes the session ID and all data
		header('location:/Account/index');
	}

	//toy application
	//TODO: learn about access filtering
	
	//#[\app\filters\Login]
	// function secureplace(){
	// 	echo 'You are logged in!<a href="/User/logout">Logout</a>';
	// }

}