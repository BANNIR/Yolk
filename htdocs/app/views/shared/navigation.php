
<div style = "position:absolute; right:1700px; bottom:850px; padding-right:20px; height: 20px; width: 200px;">
		<ul>
			<li><a href='/Main/index'><?= _("Home page")?></a></li>
			<li><a href='/Catalog/index'><?= _("Shop")?> </a></li>
			<?php
			
				global $locales;
				foreach($locales as $locale){
					echo "<li><a href='/Main/index?lang=$locale'>" . \Locale::getDisplayName($locale, $locale) . "</a></li>";
				}
			?>

		<?php 
				if (isset($_SESSION['secretkey'])) {
					$logged = true;
				} else {
					$logged = false;
				}

				if ($logged != true) {?>

					<li><a href= '<?='/Account/login' . $_SESSION['lang']?>' ><?= _("Log in/Register")?></a></li>

				<?php } else {
					$seller = new \app\models\Seller();
					$seller = $seller->getUserId($_SESSION['user_id']);
					$consumer = new \app\models\Consumer();
					$consumer = $consumer->getUserId($_SESSION['user_id']);
	
					if ($seller) {
					$link = "/Seller/index/" . $_SESSION['user_id'];
					echo "<li><a href=" . $link . ">" . "$seller->name - " . _('My Profile') ."</a></li>";
					}
					else if ($consumer) {
						$link = "/Consumer/index/" . $_SESSION['user_id'];
						echo "<li><a href=" . $link . ">" . "$consumer->first_name, $consumer->last_name -" . _('My profile') ."</a></li>";
						$link2 = "/Cart/index/" . $_SESSION['user_id'];
						echo "<li><a href=" . $link2 . ">" . _('Cart') . "</a></li>";
					}
					?> <li><a href='/Account/logout' name='logout'><?= _("Log out")?></a></li> <?php 
		 }?>
		</ul>
	</div>


