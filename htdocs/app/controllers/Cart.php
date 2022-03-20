<?php
namespace app\controllers;

class Cart extends \app\core\Controller {
	function index() {
		if (!isset($_POST['checkout'])) {
			$consumer = new \app\models\Consumer();
			$consumer = $consumer->getUserId($_SESSION['user_id']);

			$cart = new \app\models\Cart();

			$cart = $cart->getAll($consumer->consumer_id);
			$this->view('Cart/index', $cart);
		} else {
			header("location:Checkout/index");
		}
	}

	function update ($cart_id, $consumer_id) {
		$cart = new \app\models\Cart();
		$cart= $cart->get($cart_id);
		$product = new \app\models\Product();
		$product = $product->get($cart->cart_product_id);

		if(!isset($_POST['update'])){
			$this->view('Cart/update', $cart);
		}else{
			$consumer = new \app\models\Consumer();
			$consumer = $consumer->getUserId($_SESSION['user_id']);
			if($consumer_id == $consumer->consumer_id){
				
				if($_POST['quantity'] > $product->product_quantity){
					$this->view('Cart/update', $cart_id, $consumer_id);
					echo "Your ordering more than available!!!!!!";
				} else{
					$cart->cart_product_quantity=$_POST['quantity'];
					$cart->cart_id = $cart_id;
					$cart->update();
				}
			}

			header('location:/Cart/index/' . $_SESSION['user_id']);
        }
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