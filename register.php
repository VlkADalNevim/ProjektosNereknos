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

		<title>Register</title>
	</head>

	<body>
		<div class="backgroundImage">
			<!------- Logo ------>
			<div class="registerLogoContainer">
				<h1>MyEntertainmentList</h1>
			</div>

			<!------ Options ------>
			<div class="registerTopnav">
				<a href="login.php"><i class="fa-solid fa-arrow-left" style="background:transparent;"></i></a>
			</div>

			<div class="space"><span style="opacity:0;">.</span> </div>
		</div>
		<!-- Register -->
		<div class="registerForm">
			<h1>Register</h1>
			<form action="register.php" method="post">
                <div>
                    <label for="username"><i class="fa-solid fa-user"></i></label>
                    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
                </div>

                <div>
                    <label for="email"><i class="fa-solid fa-envelope"></i></label>
                    <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
                </div>

                <div>
                    <label for="password"><i class="fa-solid fa-lock"></i></label>
                    <input type="password" name="password_1" placeholder="Password">
                </div>

				<div>
                    <label for="password"><i class="fa-solid fa-circle-check"></i></label>
					<input type="password" name="password_2" placeholder="Confirm password">
                </div>

				<button type="submit" class="registerButtonSubmit" name="registerUser">Register</button>
			</form>
		</div>
			 
		</div>
		<!-- Footer -->
		<div class="registerFooter">© copyright MyEntertainmentList.rf.gd</div>

	</body>
</html>