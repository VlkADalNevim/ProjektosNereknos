<?php 
include('server.php');
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<!-- Responsive Design -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/9526c175c2.js" crossorigin="anonymous"></script>
		<!-- CSS -->
		<link href="dataCreation.css" rel="stylesheet" type="text/css">

		<title>Data creation</title>
	</head>

	<body>
		<div class="backgroundImage">
			<!------- Logo ------>
			<div class="creationLogoContainer">
				<h1>MyEntertainmentList</h1>
			</div>

			<!------ Options ------>
			<div class="creationTopnav">
				<a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
			</div>
			<div class="space"><span style="opacity:0;">.</span></div>
		</div>

		<!-- New Record -->
		<div class="creationForm">
			<h1>New game record</h1>
			<form action="#" method="post">
				<div>
					<input class="creationIcon" type="file" name="gIcon" placeholder="Icon" value="<?php echo $row['gIcon']; ?>" >
				</div>

				<div>
					<input type="text" name="gName" placeholder="Title" value="<?php echo $row['gName']; ?>" required>
				</div>

                <div>
					<input type="text" name="gDescription" placeholder="Description" value="<?php echo $row['gDescription']; ?>">
				</div>

                <div>
					<input type="text" name="gAuthor" placeholder="Author" value="<?php echo $row['gAuthor']; ?>">
				</div>
				
				<button type="submit" class="creationButtonSubmit" name="createRecord">Create</button>
			</form>
		</div>
			 
		<!-- Footer -->
		<div class="creationFooter">© copyright MyEntertainmentList.rf.gd</div>
	</body>
</html>

<?php
if(isset($_POST['createRecord']))
{	 
	$gIcon = $_POST['gIcon'];
	$gName = $_POST['gName'];
    $gDescription = $_POST['gDescription'];
	$gAuthor = $_POST['gAuthor'];

	$sql = "INSERT INTO games (gIcon,gName,gDescription,gAuthor)
	VALUES ('$gIcon','$gName','$gDescription','$gAuthor')";
	if (mysqli_query($connection, $sql)) {
		echo "New record created!";
	} else {
		echo "Error: " . $sql . " " . mysqli_error($connection);
	}
	?>
	<script type="text/javascript">
		window.location = "index.php";
	</script>
	<?php
}
?>