<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title><?= _("Consumer Profile")?></title>

    <style type="text/css">
        tr:nth-child(odd) {
            background-color: rgb(200,200,200);
        }
        tr:nth-child(even) {
            background-color: rgb(256,256,256);
        }
    </style>
</head>
<body>
	<div class='container'>
    <?php
			$this->view('shared/navigation');
		?>

    <h1>Yolk</h1>
	<h2><?= _("My Order History")?></h2>
	<p><?= _("All previous orders.")?></p>

    <table>
    <?php
    if (!$data) {
        echo "<p>" ._('No previously ordered items!') . "</p>";
    } else {
        foreach ($data as $key => $value) {

            echo "<tr>";
            echo "<td>";

            $checkout = new \app\models\Checkout();
            
            // $total = $cart->totalPrice($value->cart_consumer_id);

              $cart = new \app\models\Cart();
            $product = new \app\models\Product();
            $product = $product->get($value->checkout_product_id);

            $link = "";
            $link2 = "/ProductReturn/create/".$value->checkout_product_id;
            $link3 = "/Request/create/" . $value->checkout_product_id;
            echo "<img src='/pictures/" . $product->picture . "' height='200' width='200'> ";
            echo "<a href='" . $link . "'>" . $product->product_name . "</a>\t | \t";
            echo _('Amount: ');
            echo $value->checkout_product_quantity . "\t | \t";	// to be changed
            echo _('Total Item Price: $') . $value->totalPrice . "\t | \t";
            echo _('Date Purchased: ') . $value->dateOfPurchase . "\t | \t";
            echo "<a href='" . $link3 . "' name='service'>" . _('Service') . " </a>\t | \t";
            echo "<a href='" . $link2 . "'>" . _('Return') . "</a>\t <br>";


            // $link = "/Product/page/" . $value->cart_product_id;
            // echo "<a href='" . $link . "'>" . $product->product_name . "</a>\t | \t";
            // echo "Amount: ";
            // echo $value->cart_product_quantity . "\t | \t";	// to be changed
            // echo "Price: $" . $value->cart_order_price . "\t | \t";

            echo "</tr>";
            echo "</td>";
        }

        echo "</table>";
    }
    ?>



		
	</div>
</body>
</html>