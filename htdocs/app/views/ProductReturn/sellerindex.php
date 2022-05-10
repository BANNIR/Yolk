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
	<title><?= _("Product Returns")?></title>
</head>
<body>
	<div class='container'>
	<h1>Yolk</h1>
	<h2><?= _("View your requests")?></h2>

	<table>
		<?php
		if (!$data) {
			echo "<p> No requests made </p>";
		} else {
			foreach ($data as $key => $value) {

					echo "<tr>";
					echo "<td>";

	  				$product = new \app\models\Product();
					$product = $product->get($value->return_product_id);
					$consumer = new \app\models\Consumer();
					$consumer = $consumer->get($value->return_consumer_id);
					// var_dump($value);

					$link = "/ProductReturn/sellerResponse/" . $value->return_id;
					echo "<a href='" . $link . "'>" . $product->product_name . "</a>\t | \t";
					echo $consumer->first_name . " " . $consumer->last_name . "\t | \t";
					echo _('Request: ');
					if ($value->isAccepted == 1) {
						echo _('Accepted') . "\t | \t";
					} 
					if($value->isAccepted == 0) {
                        echo _('Refused') . "\t | \t";
                    } 
					if($value->isAccepted == 2) {
						echo _('Pending') . "\t | \t";
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