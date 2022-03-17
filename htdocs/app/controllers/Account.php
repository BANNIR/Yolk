<?php 
namespace app\controllers;

class Account extends \app\core\Controller{
	
	//TODO: Model with get, insert, exists
	//TODO: registration and login view

	function index(){//login here
		if(!isset($_POST['action'])){//there is no form being submitted
			$this->view('Account/login');
		}else{//there is a form submitted
			$user = new \app\models\Account();
			$user = $user->get($_POST['username']);
			if($user != false){
				if(password_verify($_POST['password'],$user->password_hash)){
					//yay! login - store that state in a session
					$_SESSION['username'] = $user->username;
					$_SESSION['user_id'] = $user->user_id;

					$profile = new \app\models\Profile();
					$user_id = $user->user_id;
					$profile = $profile->getUserId($user_id);
					if (!$profile) {
						header("location:/Profile/create/$user_id");
					} else {
						header("location:/Profile/index/$user_id");
						//set the profile_id in a session variable
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
			$newUser = new \app\models\Account();
			$newUser->username = $_POST['username'];
			var_dump($_POST['choice']);

			 if(!$newUser->exists() && $_POST['password'] == $_POST['password_confirm']){
			 	$newUser->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
			 	if ($_POST['choice'] == "isSeller") {
			 		$newUser->isSeller = 1;
			 		$newUser->isConsumer = 0;
			 	}else {
			 		$newUser->isSeller = 0;
			 		$newUser->isConsumer = 1;
			 	}

			 	$newUser->email = $_POST['email'];

			 	$newUser->insert();
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