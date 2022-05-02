<?php
namespace app\controllers;

#[\app\filters\Login]
class Request extends \app\core\Controller {

    function index($consumer_id) {
        $request = new \app\models\Request();
        $request = $request->getAllByConsumer($consumer_id);
        $this->view('Request/index', $request);
    }
    
    function create($request_product_id) {

        if(!isset($_POST['request_create'])){    //display he view if I don't submit the form    // create or action?
            $this->view('Request/create', $request_product_id);
        }else{    //process the data

            $request = new \app\models\Request();
            $consumer= new \app\models\Consumer();
            $consumer = $consumer->getUserId($_SESSION['user_id']);
            $seller = new \app\models\Seller();
            $product = new \app\models\Product();
            $product = $product->get($request_product_id);
            date_default_timezone_set('America/Toronto');
            $date = date('Y/m/d H:i:s');
             $request->request_product_id = $request_product_id;
             $request->request_consumer_id = $consumer->consumer_id;
             $request->request_seller_id = $product->seller_id;
             $request->request_description=$_POST['request_description'];
             $request->date=date($date, time());
             $request->insert();
             header('location:/Request/index/' . $consumer->consumer_id);
        }
    }

    function viewRequest($request_id) {
        $request = new \app\models\Request();
        $request = $request->get($request_id);

        $this->view('Request/viewrequest', $request);
    }

    function sellerIndex($seller_id) {
        $request = new \app\models\Request();
        $request = $request->getAllBySeller($seller_id);
        $seller = new \app\models\Seller();
		$seller = $seller->getUserId($_SESSION['user_id']);
		if($seller->seller_id != $seller_id){			// $seller->seller_id seller_id taken from $seller = $seller->getUserId
	
			header('location:/Request/index/' . $seller->seller_id);
			
		}

        $this->view('Request/sellerindex', $request);
    }

    // function sellerViewRequest($seller_id) {
    //     $request = new \app\models\Request();
    //     $request = $request->getAllBySeller($seller_id);

    //     $this->view('Request/sellerViewRequest', $request);
    // }

    function sellerResponse($request_id) {
        $request = new \app\models\Request();
        $request = $request->get($request_id);
        if (!isset($_POST['request_response_submit'])) {
            $this->view('Request/response', $request);
        } else {
            $request->seller_response = $_POST['request_response'];
            $request->update();
            header('location:/Request/sellerIndex/' . $request->request_seller_id);
        }
    }
}