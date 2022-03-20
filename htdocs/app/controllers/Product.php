<?php
namespace app\controllers;

class Product extends \app\core\Controller {
	function index($seller_id) {
		$product = new \app\models\Product();
		$products = $product->getAllBySeller($seller_id);
		
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
			header('location:/Product/index/' . $_SESSION['user_id']);
		}
	}

	public function update($product_id) {
        $product = new \app\models\Product();
		$product= $product->get($product_id);
		if(!isset($_POST['update'])){
			$this->view('Product/update', $product);
		}else{
			$seller_id = new \app\models\Seller();
			$seller_id = $seller_id->getUserId($_SESSION['user_id']);
			if($_SESSION['user_id'] == $product->seller_id){
				
				// $product->seller_id=$seller_id
				$product->product_name=$_POST['name'];
				$product->product_price=$_POST['product_price'];
				$product->product_quantity=$_POST['product_quantity'];
				$product->product_description=$_POST['product_description'];
				$product->update();
			}

			header('location:/Product/index/' . $_SESSION['user_id']);
        }
	}
	
	public function page($product_id) {		// new
        $product = new \app\models\Product();
		$product= $product->get($product_id);
		if(!isset($_POST['page'])){
			$this->view('Product/page', $product);
		}else{
			$seller_id = new \app\models\Seller();
			$seller_id = $seller_id->getUserId($_SESSION['user_id']);
			if($_SESSION['user_id'] == $product->seller_id){
				

				$product->product_name=$_POST['name'];
				$product->product_price=$_POST['product_price'];
				$product->product_quantity=$_POST['product_quantity'];
				$product->product_description=$_POST['product_description'];
				$product->update();
			}

			header('location:/Product/index/' . $_SESSION['user_id']);
        }
	}
	
	public function delete($product_id) {
		$product = new \app\models\Product();
		if($_SESSION){
		$product->delete($product_id);
		header('location:/Product/index/' . $_SESSION['user_id']);
		}
	}

}