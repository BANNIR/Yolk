<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Consumer Profile</title>
</head>
<body>
	<div class='container'>


		<h1>Yolk</h1>
		<h2><?= _("Profile")?></h2>
		<p><?= _("Welcome to your profile!")?></p>
		<form method='post' action=''>
		<label class='form-label'><?= _('First name')?>:<input type='text' name='first_name' class='form-control' value='<?=$data->first_name ?>' readonly/></label><br>
		<label class='form-label'><?= _('Last name')?>:<input type='text' name='last_name' class='form-control' value='<?=$data->last_name ?>' readonly/></label><br>
		<label class='form-label'><?= _('Address:')?>:<input type='text' name='address' class='form-control' value='<?=$data->address ?>' readonly/></label><br>
		<?php $link = "/Consumer/update/" . $_SESSION['user_id'];
				echo "<li><a href=" . $link . ">" ._('Update my profile') . "</a></li>";

		$link2 = "/Consumer/purchases/" . $_SESSION['user_id'];
				echo "<li><a href=" . $link2 . " name='purchases' >" ._('Order History') . "</a></li>"; 

		$consumer = new \app\models\Consumer();
		$consumer = $consumer->getUserId($_SESSION['user_id']);
		$link3 = "/Request/index/" . $consumer->consumer_id;
				echo "<li><a href=" . $link3 . ">" ._('Requests') . "</a></li>"; 
		$link4 = "/ProductReturn/index/" . $consumer->consumer_id;
				echo "<li><a href=" . $link4 . ">" ._('Returns') . "</a></li>"; ?>
		
		
	</form>
		<?php
			$this->view('shared/navigation');
		?>
	</div>
</body>
</html>