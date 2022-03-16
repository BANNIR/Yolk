<?php
namespace app\controllers;

#[\app\filters\Login]
class Profile extends \app\core\Controller{
    public function index($profile_id){
        $profile = new \app\models\Profile();
		$profile= $profile->get($profile_id);
        $this->view('Profile/index', $profile);

    }
    public function create($user_id) {
        if(!isset($_POST['action'])){	//display he view if I don't submit the form
			$myUser = new \app\models\User();
			$myUser = $myUser->get($user_id);
			$this->view('Profile/create',$myUser);
		}else{	//process the data
			$newProfile = new \app\models\Profile();
			$newProfile->user_id = $_SESSION['user_id'];
			$newProfile->first_name=$_POST['first_name'];
			$newProfile->middle_name=$_POST['middle_name'];
            $newProfile->last_name=$_POST['last_name'];
			$id = $newProfile->insert();

			//set the session profile id
			$_SESSION['profile_id'] = $id;



			header("location:/Profile/index/$user_id");
		}

    }
    public function update($profile_id) {
        //$this->view('Profile/create');
		$profile = new \app\models\Profile();
		$profile= $profile->get($profile_id);//get the specific client
		//TODO: check if the client exists
		if(!isset($_POST['action'])){
			//show the view
			$this->view('Profile/update', $profile);
		}else{
			$profile->first_name=$_POST['first_name'];
			$profile->middle_name=$_POST['middle_name'];
            $profile->last_name=$_POST['last_name'];
			$profile->update();
			header('location:/Profile/index' . $profile->user_id);
		}
    }
}