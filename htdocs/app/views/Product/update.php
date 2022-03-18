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
	


	<h1>Writers</h1>
	<h2>Update your comment</h2>
	<p>Please enter the details required to update your comment.</p>
	<form method='post' action=''>
		<label class='form-label'>Product Name:<input type='text' name='name' class='form-control' value="<?=$data->product_name ?>" /></label><br>
		<label for="product_description">Description:</label>
		<textarea id="product_description" name="product_description" rows="5" cols="150"><?=$data->product_description ?></textarea><br>
		<label class='form-label'>Price:<input type='text' name='product_price' class='form-control'  value="<?=$data->product_price ?>"/></label><br>
		<label class='form-label'>Quantity:<input type='number' name='product_quantity' class='form-control' value="<?=$data->product_quantity ?>"/></label><br>
		<input type="submit" name='update' value='Update!' class='form-control' />
	</form>
		<?php
			$this->view('shared/navigation');
		?>
	</div>
</body>
</html>

