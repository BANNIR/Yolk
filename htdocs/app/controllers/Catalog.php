<?php
namespace app\controllers;

class Catalog extends \app\core\Controller {
    function index() {
		$catalog = new \app\models\Catalog();
		$catalog = $catalog->getAll();
		$this->view('Catalog/index',$catalog);
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