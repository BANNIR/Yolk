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
		<label class='form-label'>Title:<input type='text' name='publication_title' class='form-control' value='<?=$data->publication_title ?>' /></label><br>
		<label for="publication_text">Text:</label>
		<textarea id="publication_text" name="publication_text" rows="5" cols="150"><?=$data->publication_text ?></textarea>
		<p>Visibility of your publication:</p>
		<input type="radio" id="public" name="publication_status" value="public" checked>
		<label for="public">Public</label><br>
		<input type="radio" id="private" name="publication_status" value="private">
		<label for="private">Private</label><br>
		<input type="submit" name='update' value='Update!' class='form-control' />
	</form>
		<?php
			$this->view('shared/navigation');
		?>
	</div>
</body>
</html>

