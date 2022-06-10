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

		<title>Movie creation</title>
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
		<div class="creationFormMovie">
			<h1>New movie record</h1>
			<form action="#" method="post">
				<div>
					<input class="creationIcon" type="file" name="mIcon" placeholder="Icon" value="<?php echo $row['mIcon']; ?>" >
				</div>

				<div>
					<input type="text" name="mName" placeholder="Title" value="<?php echo $row['mName']; ?>" required>
				</div>

                <div>
					<input type="text" name="mDescription" placeholder="Description" value="<?php echo $row['mDescription']; ?>">
				</div>

                <div>
					<input type="text" name="mDirector" placeholder="Director" value="<?php echo $row['mDirector']; ?>">
				</div>
				
				<button type="submit" class="creationMovieButtonSubmit" name="createRecord">Create</button>
			</form>
		</div>
			 
		<!-- Footer -->
		<div class="creationFooter">© copyright MyEntertainmentList.rf.gd</div>
	</body>
</html>

<?php
if(isset($_POST['createRecord']))
{	 
	$mIcon = $_POST['mIcon'];
	$mName = $_POST['mName'];
    $mDescription = $_POST['mDescription'];
	$mDirector = $_POST['mDirector'];

	$sql = "INSERT INTO movie (mIcon,mName,mDescription,mDirector)
	VALUES ('$mIcon','$mName','$mDescription','$mDirector')";
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