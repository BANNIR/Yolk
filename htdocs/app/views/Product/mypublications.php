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
	<title>My Publications</title>
</head>
<body>
	<div class='container'>
	

	<h1>Writers</h1>
	<h2>My Publications</h2>
    <p>List of all my publications.</p>
	<form method='post' action=''>
	<input type="text" placeholder="Search..." style="margin-bottom: 20px" name="bar"> <input type="submit" name='search' value='Go!' style="background-color: rgb(256,256,256);" />
	</form>
		<table>
		<?php
			foreach ($data as $key => $value) {
					echo "<tr>";
					echo "<td>";
	  				$profile = new \app\models\Profile();
					$profile = $profile->get($value->profile_id);

					$link = "/Publication/page/" . $value->publication_id;
					echo "<a href='" . $link . "'>" . $value->publication_title . "</a>\t | \t";
					$publication_status = $value->publication_status;
					if ($publication_status == "public") {
						$publication_status = "Public";
					}
					if ($publication_status == "private") {
						$publication_status = "Private";
					}
					echo $publication_status ."\t | \t";
					echo $value->timestamp ."\t | \t";
                    $updateLink = "/Publication/update/" . $value->publication_id;
                    echo "<a href='" . $updateLink . "'>" ."Update". "</a>\t | \t";
                    $deleteLink = "/Publication/delete/" . $value->publication_id;
                    echo "<a href='" . $deleteLink . "'>" ."Delete". "</a>";
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