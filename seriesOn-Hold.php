<?php 
session_start(); 
include "db.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$id=$_SESSION['id'];
$query=mysqli_query($connection, "SELECT seriesRating.userSeriesEpisodes, seriesRating.userSeriesRating, series.sName, series.sRating, series.sEpisodes, series.id 
                                  FROM seriesRating 
                                  INNER JOIN series ON seriesRating.series_ID = series.id 
                                  WHERE accountsSeries_ID=$id and userSeriesStatus='On-Hold'");


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
		<link href="seriesPages.css" rel="stylesheet" type="text/css">

        <title>Series - On-Hold</title>

	</head>

	<body>
        <div class="backgroundImage">
            <!------ Logo ------>
            <div class="seriesPagesLogoContainer">
                <h1>MyEntertainmentList</h1>
            </div>

            <!------ Options ------>
            <div class="seriesPagesTopnav">
                <a href="profile.php"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
        </div>
        
		<!------ Content ------>
		<div class="seriesPagesContent">
            <div class="seriesPagesTitle">
                <a>Series - On-Hold</a>
            </div>

            <div class="seriesPagesTable">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Total rating</th>
                            <th>Your rating</th>
                            <th>Episodes</th>
                        </tr>
                    </thead>
                        <?php while ($row = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><a href="series.php?series_ID=<?php echo $row['id']; ?>"><?php echo $row['sName']; ?></a></td>
                                <td><?php echo $row['sRating']; ?></td>
                                <td><?php echo $row['userSeriesRating']; ?></td>
                                <td><?php echo $row['userSeriesEpisodes']; ?> / <?php echo $row['sEpisodes']; ?></td>
                            </tr>
                        <?php } ?>
                </table>
            </div>

        </div>

		<!------ Footer ------>
		<div class="seriesPagesFooter">
            © copyright MyEntertainmentList.rf.gd
        </div>

	</body>
</html>