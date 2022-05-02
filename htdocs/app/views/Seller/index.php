<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title><?= _("Seller Profile")?></title>
</head>
<body>
	<div class='container'>


		<h1>Yolk</h1>
		<h2><?= _("Profile")?></h2>
		<p><?= _("Welcome to your profile!")?></p>
		<form method='post' action=''>
		<label class='form-label'><?= _('Name')?>:<input type='text' name='name' class='form-control' value='<?=$data->name ?>' readonly/></label><br>

		<?php 
		$seller = new \app\models\Seller();
		$seller = $seller->getUserId($_SESSION['user_id']);
		$link = "/Seller/update/" . $seller->seller_id;
				echo "<li><a href=" . $link . ">" ._('Update my profile') . "</a></li>"; 
		
		 $link2 = "/Product/index/" . $seller->seller_id;
				echo "<li><a href=" . $link2 . ">" ._('My Products') . "</a></li>"; 

			$link3 = "/Request/sellerIndex/" . $seller->seller_id;
			echo "<li><a href=" . $link3 . " name='requests'>" ._('Service Requests') . "</a></li>"; 

			$link4 = "/ProductReturn/sellerIndex/" . $seller->seller_id;
			echo "<li><a href=" . $link4 . " name='return'>" ._('Return Requests') . "</a></li>"; ?>
	</form>
		<?php
			$this->view('shared/navigation');
		?>
	</div>
</body>
</html>