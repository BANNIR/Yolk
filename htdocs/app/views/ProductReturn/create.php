<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
	<div class='container'>
		<h1>Yolk</h1>
		<h2><?= _("Return Request")?></h2>
		<h3>
			<?php 
			$product = new \app\models\Product();
			$product = $product->get($data->checkout_product_id);
			echo _('Product:') . $product->product_name;
			?>
		</h3>
		<form method='post' action=''>
		<label for="return_description"><?= _('Reason of Request:')?> </label>
		<textarea id="return_description" name="return_description" rows="5" cols="150" placeholder='<?= _('Please describe any problem or question that you may be having.') ?>' ></textarea>
		<input type="submit" name='return_create' value='<?= _('Make a return request') ?>' class='form-control' />
	</form>
	</div>
	<?php
		$this->view('shared/navigation');
	?>
</body>
</html>