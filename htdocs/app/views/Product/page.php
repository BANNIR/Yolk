<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Product</title>
</head>
<body>
	<div class='container'>
		<!-- NOT FINISHED -->

		<h1>Writers</h1>
		<h2>Publication view</h2>
		<?php

		$seller = new \app\models\Seller();
		$seller = $seller->get($data->seller_id); 
		echo "Name:" . " ".$data->product_name. "<br>";
		echo "By:" . " ".$seller->name. "<br>";
		echo "Price:" . " ".$data->product_price. "$". "<br>";
		echo "Quantity in stock:" . " ".$data->product_quantity. "<br>";
		?>
		<label for="product_description">Description:</label>
		<textarea id="product_description" name="product_description" rows="5" cols="150" readonly><?=$data->product_description ?></textarea><br>

	</form>
	<?php
			$this->view('shared/navigation');
		?>
	</div>
</body>
</html>