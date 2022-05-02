<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<style type="text/css">
	tr:nth-child(odd) {
		background-color: rgb(200,200,200);
	}
	tr:nth-child(even) {
		background-color: rgb(256,256,256);
	}
</style>
	<title><?= _("Cart")?></title>
</head>
<body>
	<div class='container'>
	

	<h1>Yolk</h1>
	<h2><?= _('Cart')?></h2>
	<p><?= _('List of items in cart.') ?></p>
	
		<table>
		<?php
		if (!$data) {
			echo "<p>" . '_("No items in cart!")' . "</p>";
		} else {
			foreach ($data as $key => $value) {

					echo "<tr>";
					echo "<td>";

					$cart = new \app\models\Cart();
					$total = $cart->totalPrice($value->cart_consumer_id);

	  				$product = new \app\models\Product();
					$product = $product->get($value->cart_product_id);

					$link = "/Product/page/" . $value->cart_product_id;
					$link2 = "/Cart/delete/" . $value->cart_product_id . "/" . $value->cart_consumer_id;
					$link3 = "/Cart/update/" . $value->cart_id . "/". $value->cart_consumer_id;
					echo "<img src='/pictures/" . $product->picture . "' height='200' width='200'> ";
					echo "<a href='" . $link . "'>" . $product->product_name . "</a>\t | \t";
					echo _("Amount:");
					echo $value->cart_product_quantity . "\t | \t";	// to be changed
					echo _("Price per Item: $") . $value->cart_order_price . "\t | \t";
					echo _("Total Item Price: $") . $value->cart_total_price_item . "\t | \t";
					echo "<a href='" . $link3 . "'>" ._('Update') . "</a>\t | \t";
					echo "<a href='" . $link2 . "'>" ._('Remove') . "</a>\t";
					// echo $value->product_quantity . " in stock\t | \t";
					// echo "<a href='" . $link2 . "'>" . "Update" . "</a>\t | ";
					// echo "<a href='" . $link3 . "'>" . "Delete" . "</a>\t | <br>";
					// echo $value->product_description . "\t";
					echo "</tr>";
					echo "</td>";
			}
			echo "<tr><td>" . _("Total Order Price: $") . $total[0] . "</tr></td>";
			echo "</table>";
			echo '<form method="post" action=""> <br><input type="submit" name="checkout" value="Checkout!"></form>';
		}
			
		?>
		<!--</table>-->

		<form method='post' action=''>
		<!-- <input type="text" placeholder="Search..." style="margin-bottom: 20px" name="bar"> <input type="submit" name='search' value='Go!' style="background-color: rgb(256,256,256);" /> -->
		
		</form>

		<?php
			$this->view('shared/navigation');
		?>
	</div>

</body>
</html>