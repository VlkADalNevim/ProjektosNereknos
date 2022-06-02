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
		<div class="topnavLogin">
				<a href="register.php"><button class="registerButtonLogin">Register</button></a>
			<div>
				<a href="index.php"><button class="backArrowlogin"><i class="fa-solid fa-arrow-left"></i></button></a>
			</div>
		</div>

		<div class="bottomLine"></div>

		<!-- Login -->
		<div class="loginForm">
			<h1>Login</h1>
			<form action="login.php" method="post">
				<div>
					<label for="username"><i class="fa-solid fa-user"></i></label>
					<input type="text" name="username" placeholder="Username" id="username" required>
				</div>

				<div>
					<label for="password"><i class="fa-solid fa-lock"></i></label>
					<input type="password" name="password" placeholder="Password" id="password" required>
				</div>

				<button type="submit" class="loginButtonSubmit" name="LoginUser">Login</button>
			</form>
		</div>
			 
		</div>
		<!-- Footer -->
		<div class="footerLogin">© copyright MyEntertainmentList.rf.gd</div>

	</body>
</html>
