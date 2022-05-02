<?php
namespace app\controllers;

class Catalog extends \app\core\Controller {
    function index() {
        $product = new \app\models\Product();
        $products = $product->getAll();
         if(isset($_POST['search'])) {
             if (!$_POST['bar']) {
                 $this->view('Catalog/index',$products);
             } else {
                 $product = $product->getTitle('%'.$_POST['bar'].'%');
                 if (!$product) {
                    echo("No matching product has been found!");
                    $this->view('Catalog/index',$products);
                 }
                 else {
                 $this->view('Catalog/index',$product);
                 }
             }
         } else {
             $this->view('Catalog/index',$products);
         }
        }
        function sellerIndex($seller_id) {
            $product = new \app\models\Product();
            $products = $product->getAllBySeller($seller_id);
             if(isset($_POST['search'])) {
                 if (!$_POST['bar']) {
                     $this->view('Catalog/sellerIndex',$products);
                 } else {
                     $product = $product->getTitle('%'.$_POST['bar'].'%');
                     if (!$product) {
                        echo("No matching product has been found!");
                        $this->view('Catalog/sellerIndex',$products);
                     }
                     else {
                     $this->view('Catalog/sellerIndex',$product);
                     }
                 }
             } else {
                 $this->view('Catalog/sellerIndex',$products);
             }
            }

}