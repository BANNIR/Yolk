<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<style type="text/css">
	tr:nth-child(odd) {
		background-color: rgb(200,200,200);
	}
	tr:nth-child(even) {
		background-color: rgb(256,256,256);
	}
</style>
	<title>Publications</title>
</head>
<body>
	<div class='container'>
		<table>
		<?php
			foreach ($data as $key => $value) {
				
					echo "<tr>";
					echo "<td>";
	  				$profile = new \app\models\Profile();
					$profile = $profile->get($value->profile_id);
					$link = "/Publication/page/" . $value->publication_id;
					echo $profile->first_name . "\t";
					echo $profile->middle_name . "\t";
					echo $profile->last_name . "\t | \t";
					echo $value->timestamp . "<br>";
					echo $value->comment_text;
					echo "</tr>";
					echo "</td>";
			}
		?>
		</table>

		<?php
			$this->view('shared/navigation');
		?>
	</div>

</body>
</html>