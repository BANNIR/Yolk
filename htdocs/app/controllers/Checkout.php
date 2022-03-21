<?php
namespace app\controllers;

#[\app\filters\Login]
class Checkout extends \app\core\Controller {
    function index() {
		if (!isset($_POST['purchase'])) {
			$consumer = new \app\models\Consumer();
			$consumer = $consumer->getUserId($_SESSION['user_id']);

			$cart = new \app\models\Cart();
            $cart = $cart->getAll($consumer->consumer_id);

           

			$this->view('Checkout/index', $cart);
		} else {
            $checkout = new \app\models\Cart();
            $checkout = $checkout->insert();
			header("location:/Confirm/"); // later
		}
	}

}