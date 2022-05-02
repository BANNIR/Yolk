<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
	<div class='container'>
		<h1>Yolk</h1>
		<h2><?= _("Request") ?> #<?php echo $data->return_id?></h2>
		<h3>
			<?php 
			$product = new \app\models\Product();
			$product = $product->get($data->return_product_id);
			echo _('Product: ') . $product->product_name;
			?>
		</h3>
		<form method='post' action=''>
		<label for="return_description"><?= _("Description of problem:")?> </label>
		<textarea id="return_description" name="return_description" rows="5" cols="150" readonly><?=$data->return_description ?></textarea>
	    
        <?php 
            if ($data->isAccepted == null) {
                echo "<input type='submit' id='return_response_accept' name='return_response_accept' value="._('Accept').">";
                echo "<input type='submit' id='return_response_reject' name='return_response_reject' value="._('Reject').">";
                echo "</form>";
            } elseif($data->isAccepted == 1) {
                echo "</form>";
                echo"<p>" ._('Return Request Accepted') ."</p>";
            } else {
                echo "</form>";
                echo"<p>" ._('Return Request Rejected') . "</p>";
            }
        ?>

    <?php
    $this->view('shared/navigation');
    ?>
	</div>
</body>
</html>