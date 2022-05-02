<?php
namespace app\controllers;

#[\app\filters\Login]
class Checkout extends \app\core\Controller {
    function index() {
    	$consumer = new \app\models\Consumer();
		$consumer = $consumer->getUserId($_SESSION['user_id']);
		$cartM = new \app\models\Cart();
        $cart = $cartM->getAll($consumer->consumer_id);
		if (!isset($_POST['purchase'])) {
			// $consumer = new \app\models\Consumer();
			// $consumer = $consumer->getUserId($_SESSION['user_id']);

			// $cart = new \app\models\Cart();
   			// $cart = $cart->getAll($consumer->consumer_id);
			$this->view('Checkout/index', $cart);
		} else {
			if ($_POST['fname'] == null || $_POST['lname'] == null || $_POST['address'] == null || $_POST['phone'] == null || $_POST['cardnum'] == null || $_POST['carddate'] == null || $_POST['cardcvv'] == null) {
				echo "Error! Some fields are empty";

				$this->view('Checkout/index', $cart);
			} else {

	            
	            foreach ($cart as $key => $value) {
	            	// var_dump($key);
	            	var_dump($value);
					date_default_timezone_set('America/Toronto');
					$date = date('Y/m/d H:i:s');
	            	$checkout = new \app\models\Checkout();
					$checkout->checkout_product_id = $value->cart_product_id;
					$checkout->checkout_product_quantity = $value->cart_product_quantity;
	            	$checkout->checkout_consumer_id = $value->cart_consumer_id;
		            $checkout->totalPrice = $value->cart_total_price_item;
					$checkout->dateOfPurchase = date($date, time());
		            $checkout = $checkout->insert();
	            }
	            $cart = new \app\models\Cart();
				$cart->deleteByConsumer($consumer->consumer_id);
				header("location:/Confirm/index/" . $consumer->consumer_id); // later
			}
		}
	}
}