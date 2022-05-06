<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
        <script src="https://kit.fontawesome.com/9526c175c2.js" crossorigin="anonymous"></script>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
			<div class="logoContainer">
					<h1>MyEntertainmentList</h1>
			</div>
			<div class="topnav">
					<a href="register.php"><button class="loginButton">Register</button></a>
				<div>
					<a href="index.html"><button class="backarrow"><i class="fa-solid fa-arrow-left"></i></button></a>
				</div>
			</div>




			<div class="login">
                <h1>Login</h1>
                <form action="authenticate.php" method="post">
                    <div>
                        <label for="username"><i class="fas fa-user"></i></label>
                        <input type="text" name="username" placeholder="Username" id="username" required>
                    </div>

                    <div>
                        <label for="password"><i class="fas fa-lock"></i></label>
                        <input type="password" name="password" placeholder="Password" id="password" required>
                    </div>

                    <input type="submit" value="Login">
                </form>
			</div>

			<div class="background">
				<img>
			</div>
	</body>
</html>