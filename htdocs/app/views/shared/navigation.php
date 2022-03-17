
	<div style = "position:absolute; right:1700px; bottom:850px; padding-right:20px; height: 20px; width: 200px;">
		<ul>
			<li><a href='/Main/index'>Home page</a></li>
			<li><a href='/Publication/index'>Publications</a></li>
		<?php 
				if ($_SESSION) {
					$logged = true;
				} else {
					$logged = false;
				}

				if ($logged != true) {?>

					<li><a href='/Account/login'>Log in/Register</a></li>

				<?php } else {?> <li><a href='/Account/logout'>Log out</a></li> <?php 


				$profile = new \app\models\Profile();
				$profile = $profile->getUserId($_SESSION['user_id']);

			if(!$profile){ ?>

		<?php }else{ 

				$link = "/Profile/index/" . $_SESSION['user_id'];
				echo "<li><a href=" . $link . ">My profile</a></li>";
				$profile = new \app\models\Profile();
				$profile = $profile->getUserId($_SESSION['user_id']);
				$link = "/Publication/create/" . $profile->profile_id;
			echo "<li><a href='" . $link . "'>Create publication</a></li>";
			?>
			
		<?php } }?>
		</ul>
	</div>


