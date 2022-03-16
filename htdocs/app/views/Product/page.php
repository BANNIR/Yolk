<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title><?php echo $data->publication_title;?></title>
</head>
<body>
	<div class='container'>
		<!-- NOT FINISHED -->

		<h1>Writers</h1>
		<h2>Publication view</h2>
		<?php
		$profile = new \app\models\Profile();
		$profile = $profile->get($data->profile_id); 
		echo "Name:" . " ".$profile->first_name. " " .$profile->middle_name. " " .$profile->last_name. "<br>";
		echo "Time:" . " ".$data->timestamp. "<br>";
		echo "Title:" . " ".$data->publication_title. "<br>";
		?>
		<label for="publication_text">Text:</label>
		<textarea id="publication_text" name="publication_text" rows="5" cols="150" readonly><?=$data->publication_text ?></textarea><br>
		<label class='form-label'>Comments:</label><br> <form method='post' action=''> <input type="submit" name='create' value='Comment' /></form>
		<!-- INSERT THE COMMENTS HERE -->

	</form>
	</div>
</body>
</html>