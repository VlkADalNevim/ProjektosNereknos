<?php 
include "db.php";

?>

<?php            
	$id = $_GET['id'];
	$query=mysqli_query($connection,"SELECT * FROM movie where id=$id");
	$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!-- Responsive Design -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/9526c175c2.js" crossorigin="anonymous"></script>
		<!-- Back button javaScript -->
		<script type="text/javascript" src="code.js"></script>
		<!-- CSS -->
		<link href="style.css" rel="stylesheet" type="text/css">
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<title>MEL</title>

	</head>

	<body>
		<!-- Logo -->
		<div class="logoContainer">
			<h1>MyEntertainmentList</h1>
		</div>

		<!-- TOPNAV - backArrow, registerButton -->
		<div class="topnavMovie">
			<div>
				<a href="index.php"><button class="backArrowlogin"><i class="fa-solid fa-arrow-left"></i></button></a>
			</div>
			<div class="bottomLineMovie"></div>
		</div>

		<!-- topBox -->
		<div class="topBox">
				<div class="movieIcon">
					<p>*Image* <?= $row['mIcon'] ?></p> 
				</div>

				<div class="movieName">
					<p><?= $row['mName'] ?></p>
				</div>

				<div class="movieScore">
					<p><?= $row['mRating'] ?></p>
				</div>

				<div class="bottomLine"></div>
		</div>

		<!-- StatusBox -->
		<div class="statusBox">
			<div class="movieStatus"> <!-- watching,finished,... -->
				<p>Status: </p> 
			</div>
			<div class="movieStatusInput"> <!-- watching,finished,... -->
				<input class="movieStatInput" type="text" name="username" id="username" value="<?= $row['userrating'] ?>" required>
			</div>
		</div>
		<div class="topLine"></div>
		<!-- Info area -->
		<div class="infoArea">
            <div class="description">
                <p> <?= $row['mDescription'] ?></p>
			</div>

            <div class="additionalInfo">
                <p>Director: <?= $row['mDirector'] ?></p>
				<p>Camera: <?= $row['camera'] ?></p>
				<p>Music: <?= $row['music'] ?></p>
				<p>Actors: <?= $row['actors'] ?></p>
			</div>

		</div>

		<div class="bottomLine"></div>

		<!-- Comments -->
		<div class="commentsArea">
			<div class="comments">
            	<p>Comments</p>
			</div>
		</div>

		<!-- Footer -->
		<div class="movieFooter">© copyright MyEntertainmentList.rf.gd</div>

	</body>
	
</html>