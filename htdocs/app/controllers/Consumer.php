<?php
namespace app\controllers;

#[\app\filters\Login]
class Consumer extends \app\core\Controller{
    public function index($user_id_consumer){
        $consumer = new \app\models\Consumer();
		$consumer = $consumer->getUserId($user_id_consumer);
        $this->view('Consumer/index', $consumer);

    }
    public function create($user_id_consumer) {
        if(!isset($_POST['action'])){	//display he view if I don't submit the form
			$myUser = new \app\models\Account();
			$myUser = $myUser->get($user_id_consumer);
			$this->view('Consumer/create',$myUser);
		}else{	//process the data
			$newConsumer = new \app\models\Consumer();
			$newConsumer->user_id_consumer = $_SESSION['user_id'];
			$newConsumer->first_name=$_POST['first_name'];
			$newConsumer->last_name=$_POST['last_name'];
			$newConsumer->address=$_POST['address'];
			$id = $newConsumer->insert();

			//set the session consumer id
			$_SESSION['consumer_id'] = $id;



			header("location:/Consumer/index/$user_id_consumer");
		}

    }
    public function update($user_id_consumer) {
        //$this->view('consumer/create');
		$consumer = new \app\models\Consumer();
		$consumer= $consumer->getUserId($user_id_consumer);//get the specific client
		//TODO: check if the client exists
		if(!isset($_POST['action'])){
			//show the view
			$this->view('Consumer/update', $consumer);
		}else{
			$consumer->first_name=$_POST['first_name'];
			$consumer->last_name = $_POST['last_name'];
			$consumer->address=$_POST['address'];
			$consumer->update();
			header('location:/Consumer/index/' . $consumer->user_id_consumer);
		}
    }

	public function purchases($user_id_consumer) {
        $checkout = new \app\models\Checkout();
		$consumer = new \app\models\Consumer();
		$consumer = $consumer->getUserId($user_id_consumer);
		$checkout = $checkout->getAll($consumer->consumer_id);

		$this->view('Consumer/purchases', $checkout);
    }
}