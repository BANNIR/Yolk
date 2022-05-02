<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Create profile</title>
</head>
<body>
	<div class='container'>

	<h1>Yolk</h1>
	<h2><?= _("Create a profile")?></h2>
	<p><?= _("Please fill the required fields to create your profile.")?></p>
	<form method='post' action=''>
		<label class='form-label'><?= _('First name')?> : <input type='text' name='first_name' class='form-control' /></label><br>
		<label class='form-label'><?= _('Last name')?> : <input type='text' name='last_name' class='form-control' /></label><br>
		<label class='form-label'><?= _('Address')?> : <input type='text' name='address' class='form-control' /></label><br>
		<input type="submit" name='action' value='<?= _('Create!') ?>' class='form-control' />
	</form>
		<?php
			$this->view('shared/navigation');
		?>
	</div>
</body>
</html>