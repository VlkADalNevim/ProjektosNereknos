<?php 
include('server.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Register</title>
        <script src="https://kit.fontawesome.com/9526c175c2.js" crossorigin="anonymous"></script>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<!-- Logo -->
		<div class="logoContainer">
			<h1>MyEntertainmentList</h1>
		</div>

		<!-- TOPNAV - backArrow, registerButton -->
		</div>
			<div class="topnavRegister">
				<a href="login.php"><button class="loginButtonRegister">Login</button></a>
			<div>
				<a href="login.php"><button class="backArrowRegister"><i class="fa-solid fa-arrow-left"></i></button></a>
			</div>
		</div>

		<div class="bottomLine"></div>

		<!-- Register -->
		<div class="registerForm">
			<h1>Register</h1>
			<form action="register.php" method="post">
                <div>
                    <label for="username"><i class="fa-solid fa-user"></i></label>
                    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
                </div>

                <div>
                    <label for="email"><i class="fa-solid fa-envelope"></i></label>
                    <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
                </div>

                <div>
                    <label for="password"><i class="fa-solid fa-lock"></i></label>
                    <input type="password" name="password_1" placeholder="Password" required>
                </div>

				<div>
                    <label for="password"><i class="fa-solid fa-circle-check"></i></label>
					<input type="password" name="password_2" placeholder="Confirm password" required>
                </div>

				<button type="submit" class="registerButtonSubmit" name="registerUser">Register</button>
			</form>
		</div>
			 
		</div>
		<!-- Footer -->
		<div class="footerRegister">© copyright MyEntertainmentList.rf.gd</div>

	</body>
</html>