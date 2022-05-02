<?php
namespace app\controllers;

#[\app\filters\Login]
class ProductReturn extends \app\core\Controller {

    function index($consumer_id) {
        $productReturn = new \app\models\ProductReturn();
        $productReturn = $productReturn->getAllByConsumer($consumer_id);

        $this->view('productReturn/index', $productReturn);
    }

    function create($return_product_id) {
        $checkout = new \app\models\Checkout();
        $consumer = new \app\models\Consumer();
        $consumer = $consumer->getUserId($_SESSION['user_id']);
        $checkout = $checkout->getByProduct($return_product_id);

        if(!isset($_POST['return_create'])){
            $this->view('ProductReturn/create', $checkout);
        }else{
            date_default_timezone_set('America/Toronto');
            $date = date('Y/m/d H:i:s');
            $product = new \app\models\Product();
            $product = $product->get($return_product_id);
            $return = new \app\models\ProductReturn();
            $return->return_product_id = $return_product_id;
            $return->return_consumer_id = $consumer->consumer_id;
            $return->return_seller_id = $product->seller_id;
            $return->return_description = $_POST['return_description'];
            $return->date=date($date, time());
            $return->insert();
            header('location:/ProductReturn/index/' . $consumer->consumer_id);
        }
    }

    function viewReturn($return_id) {
        $return = new \app\models\ProductReturn();
        $return = $return->get($return_id);

        $this->view('ProductReturn/viewreturn', $return);
    }

    function sellerIndex($seller_id) {
        $return = new \app\models\ProductReturn();
        $return = $return->getAllBySeller($seller_id);
        $seller = new \app\models\Seller();
		$seller = $seller->getUserId($_SESSION['user_id']);
		if($seller->seller_id != $seller_id){			// $seller->seller_id seller_id taken from $seller = $seller->getUserId
	
			header('location:/ProductReturn/sellerIndex/' . $seller->seller_id);
			
		}

        $this->view('ProductReturn/sellerindex', $return);
    }

    function sellerResponse($return_id) {
        $return = new \app\models\ProductReturn();
        $returns = $return->get($return_id);
        if (isset($_POST['return_response_accept'])) {
            $return->isAccepted = 1;
            $return->return_id = $return_id;
            $return->update();
            header('location:/ProductReturn/sellerIndex/' . $returns->return_seller_id);
        } elseif(isset($_POST['return_response_reject'])) {
            $return->isAccepted = 0;
            $return->return_id = $return_id;
            $return->update();
            header('location:/ProductReturn/sellerIndex/' . $returns->return_seller_id);
        } else {
            $this->view('ProductReturn/response', $returns);
        }
    }
}