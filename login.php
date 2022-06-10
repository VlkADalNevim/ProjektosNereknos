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
		<link href="login.css" rel="stylesheet" type="text/css">

		<title>Login</title>
	</head>

	<body>
		<div class="backgroundImage">
			<!------- Logo ------>
			<div class="loginLogoContainer">
				<h1>MyEntertainmentList</h1>
			</div>


			<!------ Options ------>
			<div class="loginTopnav">
				<a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
				<a href="register.php">Register</a>
			</div>
			<div class="space"><span style="opacity:0;">.</span></div>
		</div>
		<!------ Login ------>
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
			</form>
		</div>
			 
		</div>
		<!-- Footer -->
		<div class="loginFooter">© copyright MyEntertainmentList.rf.gd</div>

	</body>
</html>
