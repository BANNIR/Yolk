<?php
namespace app\controllers;

class Cart extends \app\core\Controller {
	function index($user_id) {
		$this->view('Cart/index');
	}
}