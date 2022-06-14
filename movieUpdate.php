<?php 
session_start(); 
include "db.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
         

    $movie_ID = $_GET['movie_ID'];

    $query=mysqli_query($connection,"SELECT * FROM movie where id=$movie_ID");
	$row=mysqli_fetch_array($query);
	$moveid_ID = $row['id'];
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
		<link href="myAccount.css" rel="stylesheet" type="text/css">

        <title>Profile Edit</title>
	</head>

	<body>
        <div class="backgroundImage">
            <!------ Logo ------>
            <div class="editLogoContainer">
                <h1>MyEntertainmentList</h1>
            </div>

            <!------ Options ------>
            <div class="editTopnav">
                <a href="admin.php"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
        </div>

		<!------ Content ------>
        <div class="space"></div>
		<div class="editFormAccount">
            <h1 style="text-transform: capitalize;"><?php echo $row['mName']; ?></h1>
			<form action="#" method="post" enctype="multipart/form-data">
                <div>
					<input type="file" name="mIcon" class="creationIcon" placeholder="Icon" value="" >
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

                <div>
					<input type="date" name="mReleaseDate" placeholder="Release Date" value="<?php echo $row['mReleaseDate']; ?>">
				</div>

                <div class="buttonDiv">
				    <button type="submit" class="accountUpdateButtonSubmit" name="updateMovie">Update</button>
                </div>
			</form>
		</div>
        <div class="space"></div>
		<!------ Footer ------>
		<div class="editFooter">
            © copyright MyEntertainmentList.rf.gd
        </div>

	</body>
</html>


<?php
if(isset($_POST['updateMovie']))
{	 
	$mName = $_POST['mName'];
    $mDescription = $_POST['mDescription'];
	$mDirector = $_POST['mDirector'];
	$mReleaseDate = $_POST['mReleaseDate'];


	if(!empty($_FILES["mIcon"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["mIcon"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['mIcon']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 

			$updatequery = "UPDATE movie 
                            SET mIcon='$imgContent', mName='$mName', mDescription='$mDescription', mDirector='$mDirector', mReleaseDate='$mReleaseDate' 
                            where id='$moveid_ID'";
            mysqli_query($connection,$updatequery);
			?>
			<script type="text/javascript">
				window.location = "index.php";
			</script>
			<?php 
        }
    }
    if(empty($_FILES["mIcon"]["name"])) { 
        $updatequery = "UPDATE movie 
                            SET mIcon='$imgContent', mName='$mName', mDescription='$mDescription', mDirector='$mDirector', mReleaseDate='$mReleaseDate' 
                            where id='$moveid_ID'";
            mysqli_query($connection,$updatequery);
			?>
			<script type="text/javascript">
				window.location = "index.php";
			</script>
			<?php 
        }
}
?>