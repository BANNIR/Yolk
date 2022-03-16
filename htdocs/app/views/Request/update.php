<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Update publication</title>
</head>
<body>
	<div class='container'>
	


	<h1>Writers</h1>
	<h2>Update your publication</h2>
	<p>Please enter the details required to update your publication.</p>
	<form method='post' action=''>
		<label for="comment_text">Text:</label>
		<textarea id="comment_text" name="comment_text" rows="5" cols="150"><?=$data->comment_text ?></textarea>
		<input type="submit" name='update' value='Update!' class='form-control' />
	</form>
		<?php
			$this->view('shared/navigation');
		?>
	</div>
</body>
</html>