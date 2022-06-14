<?php 
session_start(); 
include "db.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
         

    $series_ID = $_GET['series_ID'];

    $query=mysqli_query($connection,"SELECT * FROM series where id=$series_ID");
	$row=mysqli_fetch_array($query);
	$serieid_ID = $row['id'];
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
            <h1 style="text-transform: capitalize;"><?php echo $row['sName']; ?></h1>
			<form action="#" method="post" enctype="multipart/form-data">
                <div>
					<input type="file" name="sIcon" class="creationIcon" placeholder="Icon" value="" >
				</div>

				<div>
					<input type="text" name="sName" placeholder="Title" value="<?php echo $row['sName']; ?>" required>
				</div>

                <div>
					<input type="number" name="sEpisodes" placeholder="Episodes" value="<?php echo $row['sEpisodes']; ?>">
				</div>

                <div>
					<input type="text" name="sDescription" placeholder="Description" value="<?php echo $row['sDescription']; ?>">
				</div>

                <div>
					<input type="text" name="sDirector" placeholder="Director" value="<?php echo $row['sDirector']; ?>">
				</div>

                <div>
					<input type="date" name="sReleaseDate" placeholder="Release Date" value="<?php echo $row['sReleaseDate']; ?>">
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
	$sName = $_POST['sName'];
    $sEpisodes = $_POST['sEpisodes'];
    $sDescription = $_POST['sDescription'];
	$sDirector = $_POST['sDirector'];
	$sReleaseDate = $_POST['sReleaseDate'];


    $updatequery = "UPDATE series 
                    SET sName='$sName', sEpisodes='$sEpisodes', sDescription='$sDescription', sDirector='$sDirector', sReleaseDate='$sReleaseDate' 
                    where id='$serieid_ID'";
    mysqli_query($connection,$updatequery);
    header("Refresh:0");

	if(!empty($_FILES["sIcon"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["sIcon"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['sIcon']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 

			$updatequery = "UPDATE series 
                            SET sIcon='$imgContent', sName='$sName', sEpisodes='$sEpisodes', sDescription='$sDescription', sDirector='$sDirector', sReleaseDate='$sReleaseDate' 
                            where id='$serieid_ID'";
            mysqli_query($connection,$updatequery);
			?>
			<script type="text/javascript">
				window.location = "admin.php";
			</script>
			<?php 
        }
    }
    if(empty($_FILES["sIcon"]["name"])) { 
            $updatequery = "UPDATE series 
                            SET sName='$sName', sEpisodes='$sEpisodes', sDescription='$sDescription', sDirector='$sDirector', sReleaseDate='$sReleaseDate' 
                            where id='$serieid_ID'";
            mysqli_query($connection,$updatequery);
			?>
			<script type="text/javascript">
				window.location = "admin.php";
			</script>
			<?php 
        }
}
?>