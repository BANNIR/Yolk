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
		<h2><?= _("Request") ?> #<?php echo $data->request_id?></h2>
		<h3>
			<?php 
			$product = new \app\models\Product();
			$product = $product->get($data->request_product_id);
			echo _('Product: ') . $product->product_name;
			?>
		</h3>
		<form method='post' action=''>
		<label for="request_description"><?= _("Description of problem:")?> </label>
		<textarea id="request_description" name="request_description" rows="5" cols="150" readonly><?=$data->request_description ?></textarea>
	    </form>
        <?php 
            if ($data->isDone == 0) {
                echo "<form method='post' action=''>
                <label for='request_response'>" ._('Response') . ": </label>
                <textarea id='request_response' name='request_response' rows='5' cols='150'></textarea>
                <input type='hidden' name='request_id' value='$data->request_id'>
                <input type='submit' name='request_response_submit' value="._('Submit').">
                </form>";
            } else {
                echo"<form method='post' action=''>
                <label for='request_response'>" ._('Response:'). "</label>
                <textarea id='request_response' name='request_response' rows='5' cols='150' readonly>$data->seller_response</textarea>
                </form>";
            }
        ?>

    <?php
    $this->view('shared/navigation');
    ?>
	</div>
</body>
</html>