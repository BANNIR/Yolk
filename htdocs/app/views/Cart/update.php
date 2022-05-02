<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title><?= _("Update comment")?></title>
</head>
<body>
	<div class='container'>
	


	<h1>Yolk</h1>
	<h2><?= _("Update your cart")?></h2>
	<p><?= _("Please enter the details required to update your comment.")?></p>
	<form method='post' action=''>
		<label class='form-label'><?= _('Quantity')?>:<input type='number' name='quantity' class='form-control' value='<?=$data->cart_product_quantity ?>' min="1"/></label><br>
		<input type="submit" name='update' value='<?= _('Update!') ?>' class='form-control' />
	</form>
		<?php
			$this->view('shared/navigation');
		?>
	</div>
</body>
</html>