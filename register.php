<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
        <script src="https://kit.fontawesome.com/9526c175c2.js" crossorigin="anonymous"></script>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
			<div class="logoContainer">
					<h1>MyEntertainmentList</h1>
			</div>
			    <div class="topnav">
					<a href="login.php"><button class="loginButton">Login</button></a>
				<div>
					<a href="login.php"><button class="backarrowregister"><i class="fa-solid fa-arrow-left"></i></button></a>
				</div>
			</div>




			<div class="register">
                <h1>Register</h1>
                <form action="authenticate.php" method="post">
                    <div>
                        <label for="username"><i class="fas fa-user"></i></label>
                        <input type="text" name="username" placeholder="Username" id="username" required>
                    </div>

                    <div>
                        <label for="password"><i class="fas fa-lock"></i></label>
                        <input type="password" name="password" placeholder="Password" id="password" required>
                    </div>

					<div>
                        <label for="email"><i class="fas fa-lock"></i></label>
                        <input type="email" name="email" placeholder="E-mail" id="email" required>
                    </div>

                    <input type="submit" value="Register">
                </form>
			</div>

			<div class="background">
				<img>
			</div>
	</body>
</html>