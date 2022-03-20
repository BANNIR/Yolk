<?php
namespace app\controllers;

class Catalog extends \app\core\Controller {
    function index() {
		$product = new \app\models\Product();
		$products = $product->getAll();
		$this->view('Catalog/index',$products);
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
        }

}