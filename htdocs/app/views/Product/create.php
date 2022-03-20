<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Create a publication</title>
</head>
<body>
<div class='container'>



	<h1>Yolk</h1>
	<h2>Create a publication</h2>
	<p>Please enter the details required to write a publication.</p>
	<form method='post' action=''>
		<label class='form-label'>Product Name:<input type='text' name='name' class='form-control' /></label><br>
		<label for="product_description">Description:</label>
		<textarea id="product_description" name="product_description" rows="5" cols="150">Here, write anything you would like!</textarea><br>
		<label class='form-label'>Price:<input type='text' name='product_price' class='form-control'  /></label><br>
		<label class='form-label'>Quantity:<input type='number' name='product_quantity' class='form-control' value="1" min="1" /></label><br>
		<input type="submit" name='create' value='Create!' class='form-control' />
	</form>
		<?php
			$this->view('shared/navigation');
		?>
	</div>
</body>
</html>