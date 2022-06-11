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
        <div class="backgroundImage">
            <!------ Logo ------>
            <div class="profileLogoContainer">
                <h1>MyEntertainmentList</h1>
            </div>

            <!------ Options ------>
            <div class="profileTopnav">
                <a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
                <a href="myAccount.php"><i class="fa-solid fa-gear"></i></a>
            </div>
        </div>
		<!------ Content ------>
		<div class="profileContent">
            <div class="loginForm">
                <h1>Login</h1>
                <form action="login.php" method="post">
                    <?php include('errors.php'); ?>
                    <div>
                        <label for="username"><i class="fa-solid fa-user"></i></label>
                        <input type="text" name="username" placeholder="Username">
                    </div>

                    <div>
                        <label for="password"><i class="fa-solid fa-lock"></i></label>
                        <input type="password" name="password" placeholder="Password">
                    </div>

                    <button type="submit" class="loginButtonSubmit" name="loginUser">Login</button>
                    <div>
                        <a href="register.php">Not yet a member?</a>
                    </div>
                </form>
            </div>
        </div>

		<!------ Footer ------>
		<div class="profileFooter">
            © copyright MyEntertainmentList.rf.gd
        </div>

	</body>
</html>
