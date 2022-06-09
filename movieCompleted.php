<?php 
session_start(); 
include "db.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$id=$_SESSION['id'];
$query=mysqli_query($connection, "SELECT rating.userRating, movie.mName, movie.mRating, movie.id 
                                  FROM rating 
                                  INNER JOIN movie ON rating.movie_ID = movie.id 
                                  WHERE accounts_ID=$id and userStatus='Completed'");


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
		<link href="moviePages.css" rel="stylesheet" type="text/css">

        <title>Movies - Completed</title>

	</head>

	<body>

		<!------ Logo ------>
		<div class="moviePagesLogoContainer">
			<h1>MyEntertainmentList</h1>
		</div>

		<!------ Options ------>
		<div class="moviePagesTopnav">
			<a href="profile.php"><i class="fa-solid fa-arrow-left"></i></a>
		</div>

		<!------ Content ------>
		<div class="moviePagesContent">
            <div class="moviePagesTitle">
                <a>Plan to Watch</a>
            </div>

            <div class="moviePagesTable">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Total rating</th>
                            <th>Your rating</th>
                        </tr>
                    </thead>
                        <?php while ($row = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><?php echo $row['mName']; ?></td>
                                <td><?php echo $row['mRating']; ?></td>
                                <td><?php echo $row['userRating']; ?></td>
                            </tr>
                        <?php } ?>
                </table>
            </div>

        </div>

		<!------ Footer ------>
		<div class="moviePagesFooter">
            © copyright MyEntertainmentList.rf.gd
        </div>

	</body>
</html>