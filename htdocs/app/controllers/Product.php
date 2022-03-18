<?php
namespace app\controllers;

class Product extends \app\core\Controller {
	function index() {
		$product = new \app\models\Product();
		$products = $product->getAll();
		
		//search bar - improve to the way the teacher did it
		// if(isset($_POST['search'])) {
		// 	if (!$_POST['bar']) {
		// 		$this->view('Publication/index',$products);
		// 	} else {
		// 		$product = $product->getTitle($_POST['bar']);
		// 		$this->view('Publication/index',$publication);
		// 	}
		// } else {
			// $this->view('Product/index',$products);
		// }

		if (!isset($_POST['add'])) {
			$this->view('Product/index',$products);
		} else {
			header("location:/Product/create");
		}
		
	}

	function create() {
		if(!isset($_POST['create'])){	//display he view if I don't submit the form    // create or action?
			$this->view('Product/create');
		}else{	//process the data
			$newProduct = new \app\models\Product();
			$seller_id = new \app\models\Seller();
			$seller_id = $seller_id->getUserId($_SESSION['user_id']);
            $newProduct->seller_id = $seller_id->seller_id;
			$newProduct->product_name=$_POST['name'];
			$newProduct->product_price=$_POST['product_price'];
			$newProduct->product_quantity=$_POST['product_quantity'];
			$newProduct->product_description=$_POST['product_description'];
			$newProduct->insert();
			header('location:/Product/index');
		}
	}
}