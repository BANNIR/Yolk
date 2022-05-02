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
	<title><?= _("Shop")?></title>
</head>
<body>
	<div class='container'>
	

	<h1>Yolk</h1>
	<h2><?php foreach ($data as $key => $value) { 
        $seller = new \app\models\Seller(); 
        $seller = $seller->getName($value->seller_id);
		echo $seller->name . _('Shop'); break; } ?></h2>
	<form method='post' action=''>
	<input type="text" placeholder='<?= _('Search...') ?>' style="margin-bottom: 20px" name="bar"> <input type="submit" name='search' value='<?= _('Search!') ?>' style="background-color: rgb(256,256,256);" /> 
	</form>
		<table>
		<?php
			foreach ($data as $key => $value) {
				
					echo "<tr>";
					echo "<td>";
	  				$product = new \app\models\Product();
					$product = $product->get($value->seller_id);
					$seller = new \app\models\Seller();
					$seller = $seller->getName($value->seller_id);
					$link = "/Product/page/" . $value->product_id;
					echo "<img src='/pictures/" . $value->picture . "' height='200' width='200'> ";
					echo "<a href='" . $link . "'>" . $value->product_name . "</a>\t | \t";
					echo _('From: ');
					echo $seller->name . "\t | \t";	// to be changed
					echo "$" . $value->product_price . "\t | \t";
					echo $value->product_quantity . _('in stock') . "\t | \t";	
					echo $value->product_description . "\t | \t";
					echo "<b>" . $value->advertisement . "</b>\t";
					
					echo "</tr>";
					echo "</td>";
				
			}
		?>
		</table>

		<?php
			$this->view('shared/navigation');
		?>
	</div>

</body>
</html>