<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title><?= _('User login') ?></title>
</head>
<body>
	<div class='container'>
	
	<h1>Yolk</h1>
	<h2>Log in to your user account</h2>
	<form method='post' action=''>
		<label class='form-label'><?=_("Username")?>:<input type='text' name='username' class='form-control' /></label><br>
		<label class='form-label'><?=_("Password")?>:<input type='password' name='password' class='form-control' /></label><br>

		<input type="submit" name='action' value='<?=_('Login!')?>' class='form-control' />
	</form>
	<?=_('No account?')?> <a href="/Account/register"><?=_('Register here.')?></a>
		<?php
			$this->view('shared/navigation');
		?>
	</div>
</body>
</html>