<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>My Profile</title>
</head>
<body>
	<div class='container'>


		<h1>Writers</h1>
		<h2>Profile</h2>
		<p>Welcome to your profile!</p>
		<form method='post' action=''>
		<label class='form-label'>First name:<input type='text' name='first_name' class='form-control' value='<?=$data->first_name ?>' readonly/></label><br>
		<label class='form-label'>Middle name:<input type='text' name='middle_name' class='form-control' value='<?=$data->middle_name ?>' readonly/></label><br>
		<label class='form-label'>Last name:<input type='text' name='last_name' class='form-control' value='<?=$data->last_name ?>' readonly/></label><br>
		<?php $link = "/Publication/mypublications/" . $_SESSION['user_id'];
				echo "<li><a href=" . $link . ">My Publications</a></li>"; ?>
		
		<?php $link = "/Comment/mycomments/" . $_SESSION['user_id'];
				echo "<li><a href=" . $link . ">My Comments</a></li>"; ?>
	</form>
		<?php
			$this->view('shared/navigation');
		?>
	</div>
</body>
</html>