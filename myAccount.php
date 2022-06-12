<?php 
session_start(); 
include "db.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
         
    $id=$_SESSION['id'];

	// Movie data
	$query=mysqli_query($connection,"SELECT * FROM accounts where id=$id");
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
                <a href="profile.php"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
        </div>

		<!------ Content ------>
        <div class="space"></div>
		<div class="editFormAccount">
            <h1 style="text-transform: capitalize;"><?php echo $row['username']; ?></h1>
			<form action="#" method="post" enctype="multipart/form-data">
				<div>
                    <label for="aIcon">User icon:</label>
					<input type="file" name="aIcon" style="text-transform: capitalize;" class="creationIcon" placeholder="Icon" value="<?php echo $row['mIcon']; ?>" >
				</div>

				<div>
                    <label for="firstName">First name:</label>
					<input type="text" name="firstName" value="<?php echo $row['firstName']; ?>">
				</div>

                <div>
                    <label for="lastName">Last name:</label>
					<input type="text" name="lastName" value="<?php echo $row['lastName']; ?>">
				</div>

                <div>
                    <label for="birth">Date of birth:</label>
					<input type="date" name="birth" value="<?php echo $row['dateOfBirth']; ?>">
				</div>

                <div>
                    <label for="gender">Gender:</label>
                    <select class="movieStatInput" name="gender">
                        <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                        <option value="---">---</option>
                    </select>
				</div>
                <div class="buttonDiv">
				    <button type="submit" class="accountUpdateButtonSubmit" name="updateAccount">Update</button>
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
if(isset($_POST['updateAccount']))
{	 
	$firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
    $birth = $_POST['birth'];

    if(!empty($_FILES["aIcon"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["aIcon"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['aIcon']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 

            $updatequery = "UPDATE accounts 
                            SET userIcon='$imgContent', firstName='$firstName', lastName='$lastName', gender='$gender', dateOfBirth='$birth' 
                            where id='$id'";
            mysqli_query($connection,$updatequery);
            ?>
            <script type="text/javascript">
                window.location = "myAccount.php";
            </script>
            <?php
        }
    }
}
?>