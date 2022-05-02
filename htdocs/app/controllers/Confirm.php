<?php
namespace app\controllers;

#[\app\filters\Login]
class Confirm extends \app\core\Controller {
	function index($checkout_consumer_id) {
		$checkout = new \app\models\Checkout();
		$checkout = $checkout->getLatestCheckout($checkout_consumer_id); // change this to consumer id

		$this->view('Confirm/index', $checkout);
	}
}