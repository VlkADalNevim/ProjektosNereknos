<?php 
session_start(); 

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
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
		<link href="profile.css" rel="stylesheet" type="text/css">

        <title>Profile</title>
	</head>

	<body>

		<!------ Logo ------>
		<div class="profileLogoContainer">
			<h1>MyEntertainmentList</h1>
		</div>

		<!------ Options ------>
		<div class="profileTopnav">
			<a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
			<a href="myAccount.php"><i class="fa-solid fa-gear"></i></a>
		</div>

		<!------ Content ------>
		<div class="profileContent">
                    <div class="profileLeft">
                        <h2>Movies:</h2>
                        <a href="Plan.php" class="href"><div class="statusHref">Plan to Watch</div></a>
                        <a href="Completed.php" class="href"><div class="statusHref">Completed</div></a>
                        <a href="On-Hold.php" class="href"><div class="statusHref">On-Hold</div></a>
                        <a href="Dropped.php" class="href"><div class="statusHref">Dropped</div></a>
                    </div>
                    <div class="profileMain">
                    <h2>Series:</h2>
                        <a href="Plan.php" class="href"><div class="statusHref">Plan to Watch</div></a>
                        <a href="Watching.php" class="href"><div class="statusHref">Watching</div></a>
                        <a href="Completed.php" class="href"><div class="statusHref">Completed</div></a>
                        <a href="On-Hold.php" class="href"><div class="statusHref">On-Hold</div></a>
                        <a href="Dropped.php" class="href"><div class="statusHref">Dropped</div></a>
                    </div>
                    <div class="profileRight">
                    <h2>Games:</h2>
                        <a href="Plan.php" class="href"><div class="statusHref">Plan to Play</div></a>
                        <a href="Progress.php" class="href"><div class="statusHref">Playing</div></a>
                        <a href="Finished.php" class="href"><div class="statusHref">Finished</div></a>
                        <a href="On-Hold.php" class="href"><div class="statusHref">On-Hold</div></a>
                        <a href="Dropped.php" class="href"><div class="statusHref">Dropped</div></a>
                    </div>
        </div>

		<!------ Footer ------>
		<div class="profileFooter">
            © copyright MyEntertainmentList.rf.gd
        </div>

	</body>
</html>
