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
	<title><?= _("Request")?></title>
</head>
<body>
	<div class='container'>
	<h1>Yolk</h1>
	<h2><?= _("View your requests")?></h2>

	<table>
		<?php
		if (!$data) {
			echo "<p>" ._('No requests made') . "</p>";
		} else {
			foreach ($data as $key => $value) {

					echo "<tr>";
					echo "<td>";

	  				$product = new \app\models\Product();
					$product = $product->get($value->request_product_id);
					$seller = new \app\models\Seller();
					$seller = $seller->get($product->seller_id);
					// var_dump($value);

					$link = "/Request/viewRequest/" . $value->request_id;
					echo "<a href='" . $link . "'>" . $product->product_name . "</a>\t | \t";
					echo $seller->name . "\t | \t";
					echo _('Request: ');
					if ($value->isDone == 0) {
						echo _('Pending') . "\t | \t";
					} else {
						echo _('Done') . "\t | \t";
					}
					echo "</tr>";
					echo "</td>";
			}
			
		}
			
		?>
		</table>

		<?php
			$this->view('shared/navigation');
		?>
	</div>

</body>
</html>