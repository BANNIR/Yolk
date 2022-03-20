
	<div style = "position:absolute; right:1700px; bottom:850px; padding-right:20px; height: 20px; width: 200px;">
		<ul>
			<li><a href='/Main/index'>Home page</a></li>
			<li><a href='/Catalog/index'>Shop </a></li>
		<?php 
				if ($_SESSION) {
					$logged = true;
				} else {
					$logged = false;
				}

				if ($logged != true) {?>

					<li><a href='/Account/login'>Log in/Register</a></li>

				<?php } else {
					$seller = new \app\models\Seller();
					$seller = $seller->getUserId($_SESSION['user_id']);
					$consumer = new \app\models\Consumer();
					$consumer = $consumer->getUserId($_SESSION['user_id']);
	
					if ($seller) {
					$link = "/Seller/index/" . $_SESSION['user_id'];
					echo "<li><a href=" . $link . ">$seller->name - My Profile</a></li>";
					}
					else if ($consumer) {
						$link = "/Consumer/index/" . $_SESSION['user_id'];
						echo "<li><a href=" . $link . ">$consumer->first_name, $consumer->last_name - My profile</a></li>";
						$link2 = "/Cart/index/" . $_SESSION['user_id'];
						echo "<li><a href=" . $link2 . ">Cart</a></li>";
					}
					?> <li><a href='/Account/logout'>Log out</a></li> <?php 
		 }?>
		</ul>
	</div>


