<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title><?= _("Product")?></title>
</head>
<body>
	<div class='container'>
		<!-- NOT FINISHED -->

		<h1>Yolk</h1>
		<h2>View Product</h2>

		<form method="post" action="">
		<?php
			$product = new \app\models\Product();
			$product = $product->get($data);
			$seller = new \app\models\Seller();
			$seller = $seller->get($product->seller_id); 
			echo _('Name:') . " ".$product->product_name. "<br>";
			$link = "/Catalog/sellerIndex/" . $seller->seller_id;
			echo _('By:') . "<a href='" . $link . "'>" . $seller->name . "</a>\t \t <br>";
			//echo "By:" . " ".$seller->name. "<br>";
			echo _('Price:') . " ".$product->product_price. "$". "<br>";
			echo _('Quantity in stock:') . " ".$product->product_quantity. "<br>";
		?>
		<img src='/pictures/<?= $product->picture ?>' width="500" length="500"/> <br>
		<label for="product_description"><?= _('Description:')?></label>
		<textarea id="product_description" name="product_description" rows="5" cols="150" readonly><?=$product->product_description ?></textarea><br>
		<br><input type='number' name='quantity' class='form-control' value="1" min="1" /><input type="submit" name="cart" value='<?= _('Add to Cart') ?>'>

	</form>
	<?php
			$this->view('shared/navigation');
		?>
	</div>
</body>
</html>