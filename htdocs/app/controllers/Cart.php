<?php
namespace app\controllers;

class Cart extends \app\core\Controller {
	function index() {
		$consumer = new \app\models\Consumer();
		$consumer = $consumer->getUserId($_SESSION['user_id']);

		$cart = new \app\models\Cart();

		$cart = $cart->getAll($consumer->consumer_id);
		$this->view('Cart/index', $cart);
	}

	function update () {
		
	}

	function delete($product_id,$consumer_id) {
		$cart = new \app\models\Cart();
		$consumer = new \app\models\Consumer();
		$consumer = $consumer->getUserId($_SESSION['user_id']);

		if($consumer_id != $consumer->consumer_id){
	
			header('location:/Main/index/');
			
		}
		else {
			$cart->delete($product_id);

		}

		header('location:/Cart/index/' . $_SESSION['user_id']);
	}
}