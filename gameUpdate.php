<?php 
session_start(); 
include "db.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
         

    $games_ID = $_GET['games_ID'];

    $query=mysqli_query($connection,"SELECT * FROM games where id=$games_ID");
	$row=mysqli_fetch_array($query);
	$gameid_ID = $row['id'];
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
            <h1 style="text-transform: capitalize;"><?php echo $row['gName']; ?></h1>
			<form action="#" method="post" enctype="multipart/form-data">
                <div>
					<input type="file" name="gIcon" class="creationIcon" placeholder="Icon" value="" >
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

                <div>
					<input type="date" name="gReleaseDate" placeholder="Release Date" value="<?php echo $row['gReleaseDate']; ?>">
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
	$gName = $_POST['gName'];
    $gDescription = $_POST['gDescription'];
	$gAuthor = $_POST['gAuthor'];
	$gReleaseDate = $_POST['gReleaseDate'];


    $updatequery = "UPDATE games 
                    SET gName='$gName', gDescription='$gDescription', gAuthor='$gAuthor', gReleaseDate='$gReleaseDate' 
                    where id='$gameid_ID'";
    mysqli_query($connection,$updatequery);
    header("Refresh:0");

	if(!empty($_FILES["gIcon"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["gIcon"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['gIcon']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 

			$updatequery = "UPDATE games 
                            SET gIcon='$imgContent', gName='$gName', gDescription='$gDescription', gAuthor='$gAuthor', gReleaseDate='$gReleaseDate' 
                            where id='$gameid_ID'";
            mysqli_query($connection,$updatequery);
			?>
			<script type="text/javascript">
				window.location = "admin.php";
			</script>
			<?php 
        }
    }
    if(empty($_FILES["gIcon"]["name"])) { 
        $updatequery = "UPDATE games 
                        SET gName='$gName', gDescription='$gDescription', gAuthor='$gAuthor', gReleaseDate='$gReleaseDate' 
                        where id='$gameid_ID'";
        mysqli_query($connection,$updatequery);
        ?>
        <script type="text/javascript">
            window.location = "admin.php";
        </script>
        <?php 
    }

}
?>