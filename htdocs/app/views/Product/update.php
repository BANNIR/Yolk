<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Update comment</title>
</head>
<body>
	<div class='container'>
	


	<h1>Yolk</h1>
	<h2><?= _("Update your product")?></h2>
	<p><?= _("Please fill the required fields to update your comment.")?></p>
	<form method='post' action='' enctype="multipart/form-data">
		<label class='form-label'><?=_('Product Name')?>:<input type='text' name='name' class='form-control' value="<?=$data->product_name ?>" /></label><br>
		<img src='/pictures/<?= $data->picture ?>' width="500" length="500"/> <br>
		<label for="product_description"><?=_('Description')?>:</label>
		<textarea id="product_description" name="product_description" rows="5" cols="150"><?=$data->product_description ?></textarea><br>
		<label class='form-label'><?=_('Product Image')?>:<input type='file' name='image' class='form-control'/></label><br>
		<label for="advertisement"><?=_('Advertisement')?>:</label><br>
		<textarea id="advertisement" name="advertisement" rows="5" cols="150"><?=$data->advertisement ?></textarea><br>
		<label class='form-label'><?=_('Price')?>:<input type='text' name='product_price' class='form-control'  value="<?=$data->product_price ?>"/></label><br>
		<label class='form-label'><?=_('Quantity')?>:<input type='number' name='product_quantity' class='form-control' value="<?=$data->product_quantity ?>"/></label><br>
		<input type="submit" name='update' value='<?= _('Update!')?>' class='form-control' />
	</form>
		<?php
			$this->view('shared/navigation');
		?>
	</div>
</body>
</html>

