<?php 
include('server.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
        <script src="https://kit.fontawesome.com/9526c175c2.js" crossorigin="anonymous"></script>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<!-- Logo -->
		<div class="logoContainer">
			<h1>MyEntertainmentList</h1>
		</div>

		<!-- TOPNAV - backArrow, registerButton -->
		<div class="topnavNewRecord">
			<div>
				<a href="index.php"><button class="backArrowNewRecord"><i class="fa-solid fa-arrow-left"></i></button></a>
			</div>
		</div>

		<div class="bottomLine"></div>

		<!-- New Record -->
		<div class="newRecordForm">
            <a class="newRecordTopTitle">New record creation</a>
            <div class="bottomLine"></div>
			<form action="#" method="post">
				<div class="newmIcon">
					<input type="file" name="mIcon" id="icon" placeholder="Icon" value="<?php echo $row['mIcon']; ?>" >
				</div>

				<div class="newmName">
					<input type="text" name="mName" id="name" placeholder="Title" value="<?php echo $row['mName']; ?>" required>
				</div>

                <div class="newmDescription">
					<input type="text" name="mDescription" id="description" placeholder="Description" value="<?php echo $row['mDescription']; ?>">
				</div>

                <div class="newmDirector">
					<input type="text" name="mDirector" id="director" placeholder="Director" value="<?php echo $row['mDirector']; ?>">
				</div>

                <input type="submit" name="createRecord" value="Create" class="createRecordButtonSubmit"></td>
			</form>
		</div>
			 
		</div>
		<!-- Footer -->
		<div class="footerCreateRecord">© copyright MyEntertainmentList.rf.gd</div>

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