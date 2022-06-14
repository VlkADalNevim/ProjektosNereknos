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
				<a href="admin.php"><i class="fa-solid fa-arrow-left" style="background:transparent;"></i></a>
			</div>
			<div class="space"><span style="opacity:0;">.</span></div>
		</div>

		<!-- New Record -->
		<div class="creationFormSeries">
			<h1>New series record</h1>
			<form action="#" method="post" enctype="multipart/form-data">
				<div>
					<input class="creationIcon" type="file" name="sIcon" placeholder="Icon" value="" >
				</div>

				<div>
					<input type="text" name="sName" placeholder="Title" value="<?php echo $row['sName']; ?>" required>
				</div>

                <div>
					<input type="text" name="sDescription" placeholder="Description" value="<?php echo $row['sDescription']; ?>">
				</div>

                <div>
					<input type="text" name="sDirector" placeholder="Director" value="<?php echo $row['sDirector']; ?>">
				</div>

				<div>
					<input type="number" name="sEpisodes" placeholder="Number of episodes" value="<?php echo $row['sEpisodes']; ?>">
				</div>

				<div>
					<input type="date" name="releaseDate" placeholder="Release date" value="<?php echo $row['sReleaseDate']; ?>">
				</div>
				
				<button type="submit" class="creationSeriesButtonSubmit" name="createRecord">Create</button>
			</form>
		</div>
			 
		<!-- Footer -->
		<div class="creationFooter">© copyright MyEntertainmentList.rf.gd</div>
	</body>
</html>

<?php
if(isset($_POST['createRecord']))
{	 
	$sName = $_POST['sName'];
    $sEpisodes = $_POST['sEpisodes'];
    $sDescription = $_POST['sDescription'];
	$sDirector = $_POST['sDirector'];
	$sReleaseDate = $_POST['sReleaseDate'];

if(!empty($_FILES["sIcon"]["name"])) { 
	// Get file info 
	$fileName = basename($_FILES["sIcon"]["name"]); 
	$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
	 
	// Allow certain file formats 
	$allowTypes = array('jpg','png','jpeg','gif'); 
	if(in_array($fileType, $allowTypes)){ 
		$image = $_FILES['sIcon']['tmp_name']; 
		$imgContent = addslashes(file_get_contents($image)); 

		$sql = "INSERT INTO series (sIcon,sName,sDescription,sDirector,sReleaseDate,sEpisodes)
		VALUES ('$imgContent','$sName','$sDescription','$sDirector','$sReleaseDate','$sEpisodes')";
		if (mysqli_query($connection, $sql)) {
			echo "New record created!";
		} else {
			echo "Error: " . $sql . " " . mysqli_error($connection);
		}
		?>
		<script type="text/javascript">
			window.location = "admin.php";
		</script>
		<?php 
	}
}
if(empty($_FILES["sIcon"]["name"])) { 
		$sql = "INSERT INTO series (sIcon,sName,sDescription,sDirector,sReleaseDate,sEpisodes)
		VALUES ('$imgContent','$sName','$sDescription','$sDirector','$sReleaseDate','$sEpisodes')";
		if (mysqli_query($connection, $sql)) {
			echo "New record created!";
		} else {
			echo "Error: " . $sql . " " . mysqli_error($connection);
		}
		?>
		<script type="text/javascript">
			window.location = "admin.php";
		</script>
		<?php 
	}
}
?>