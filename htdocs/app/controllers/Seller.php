<?php
namespace app\controllers;

#[\app\filters\Login]
class Seller extends \app\core\Controller{
    public function index($seller_id){
        $seller = new \app\models\Seller();
		$seller= $seller->get($seller_id);
        $this->view('Seller/index', $seller);

    }
    public function create($user_id_seller) {
        if(!isset($_POST['action'])){	//display he view if I don't submit the form
			$myUser = new \app\models\Account();
			$myUser = $myUser->get($user_id_seller);
			$this->view('Seller/create',$myUser);
		}else{	//process the data
			$newSeller = new \app\models\Seller();
			$newSeller->user_id_seller = $_SESSION['user_id'];
			$newSeller->name=$_POST['name'];
			$id = $newSeller->insert();

			//set the session seller id
			$_SESSION['seller_id'] = $id;



			header("location:/Seller/index/$user_id_seller");
		}

    }
    public function update($seller_id) {
        //$this->view('seller/create');
		$seller = new \app\models\Seller();
		$seller= $seller->get($seller_id);//get the specific client
		//TODO: check if the client exists
		if(!isset($_POST['action'])){
			//show the view
			$this->view('Seller/update', $seller);
		}else{
			$seller->first_name=$_POST['name'];
			$seller->update();
			header('location:/Seller/index' . $seller->user_id_seller);
		}
    }
}