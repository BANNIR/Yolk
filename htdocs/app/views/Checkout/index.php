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
	<title>Checkout</title>
</head>
<body>
	<div class='container'>
	

	<h1>Yolk</h1>
	<h2>Checkout</h2>
	<p>Confirm your purchase!</p>
	
		<table>
		<?php
		if (!$data) {
			echo "<p> No items in cart! </p>";
		} else {
			foreach ($data as $key => $value) {

					echo "<tr>";
					echo "<td>";

					$cart = new \app\models\Cart();
					$total = $cart->totalPrice($value->cart_consumer_id);

	  				$product = new \app\models\Product();
					$product = $product->get($value->cart_product_id);

					$link = "/Product/page/" . $value->cart_product_id;
					echo "<a href='" . $link . "'>" . $product->product_name . "</a>\t | \t";
					echo "Amount: ";
					echo $value->cart_product_quantity . "\t | \t";	// to be changed
					echo "Price: $" . $value->cart_order_price . "\t | \t";
					// echo $value->product_quantity . " in stock\t | \t";
					// echo "<a href='" . $link2 . "'>" . "Update" . "</a>\t | ";
					// echo "<a href='" . $link3 . "'>" . "Delete" . "</a>\t | <br>";
					// echo $value->product_description . "\t";
					echo "</tr>";
					echo "</td>";
			}
			
		}
			
		?>
		</table>

		<form method='post' action=''>
		<!-- <input type="text" placeholder="Search..." style="margin-bottom: 20px" name="bar"> <input type="submit" name='search' value='Go!' style="background-color: rgb(256,256,256);" /> -->
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname"><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br>
        <label for="phone">Phone Number:</label><br>
        <input type="text" id="phone" name="phone"><br>
        <label for="cardnum">Card Number:</label><br>
        <input type="text" id="cardnum" name="cardnum"><br>
        <label for="carddate">Card Expiration Date:</label><br>
        <input type="text" id="carddate" name="carddate"><br>
        <label for="cardcvv">Card CVV:</label><br>
        <input type="text" id="cardcvv" name="cardcvv"><br>
        <p>Choose the speed of delivery:</p>
        <input type="radio" id="standard" name="delivery" value="Standard">
        <label for="standard">Standard (+0.00$)</label><br>
        <input type="radio" id="fast" name="delivery" value="Fast">
        <label for="css">Fast (+10.00$)</label><br>
        <?php echo "<tr><td>Total Price: " . $total[0] . "$". "</tr></td>"; ?>
		<br><input type="submit" name="purchase" value="Buy now!">
		</form>
        

		<?php
			$this->view('shared/navigation');
		?>
	</div>

</body>
</html>