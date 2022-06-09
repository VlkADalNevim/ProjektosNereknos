<?php 
session_start(); 
include "db.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$id=$_SESSION['id'];
$query=mysqli_query($connection, "SELECT gamesRating.userGameRating, games.gName, games.gRating, games.id 
                                  FROM gamesRating 
                                  INNER JOIN games ON gamesRating.games_ID = games.id 
                                  WHERE accountsGames_ID=$id and userGameStatus='On-Hold'");


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
		<link href="gamesPages.css" rel="stylesheet" type="text/css">

        <title>Games - On-Hold</title>

	</head>

	<body>

		<!------ Logo ------>
		<div class="gamesPagesLogoContainer">
			<h1>MyEntertainmentList</h1>
		</div>

		<!------ Options ------>
		<div class="gamesPagesTopnav">
			<a href="profile.php"><i class="fa-solid fa-arrow-left"></i></a>
		</div>

		<!------ Content ------>
		<div class="gamesPagesContent">
            <div class="gamesPagesTitle">
                <a>Games - On-Hold</a>
            </div>

            <div class="gamesPagesTable">
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
                                <td><?php echo $row['gName']; ?></td>
                                <td><?php echo $row['gRating']; ?></td>
                                <td><?php echo $row['userGameRating']; ?></td>
                            </tr>
                        <?php } ?>
                </table>
            </div>

        </div>

		<!------ Footer ------>
		<div class="gamesPagesFooter">
            © copyright MyEntertainmentList.rf.gd
        </div>

	</body>
</html>