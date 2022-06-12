<?php 
session_start(); 

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>
<?php 
include "db.php";

    $id=$_SESSION['id'];

	// Account data
	$query=mysqli_query($connection,"SELECT * FROM accounts where id=$id");
	$row=mysqli_fetch_array($query);

    // Movie Stats
    $planmovie = "SELECT COUNT(*) AS total FROM rating where accounts_ID = $id and userStatus='Plan to Watch'";
    $resultplan = mysqli_query($connection, $planmovie);
    $planmoviedata = mysqli_fetch_assoc($resultplan);

    $complmovie = "SELECT COUNT(*) AS total FROM rating where accounts_ID = $id and userStatus='Completed'";
    $resultcompl = mysqli_query($connection, $complmovie);
    $complmoviedata = mysqli_fetch_assoc($resultcompl);

    $holdmovie = "SELECT COUNT(*) AS total FROM rating where accounts_ID = $id and userStatus='On-Hold'";
    $resulthold = mysqli_query($connection, $holdmovie);
    $holdmoviedata = mysqli_fetch_assoc($resulthold);

    $dropmovie = "SELECT COUNT(*) AS total FROM rating where accounts_ID = $id and userStatus='Dropped'";
    $resultdrop = mysqli_query($connection, $dropmovie);
    $dropmoviedata = mysqli_fetch_assoc($resultdrop);


    // Series Stats
    $planseries = "SELECT COUNT(*) AS total FROM seriesRating where accountsSeries_ID = $id and userSeriesStatus='Plan to Watch'";
    $resulplan = mysqli_query($connection, $planseries);
    $planseriesdata = mysqli_fetch_assoc($resulplan);

    $watchseries = "SELECT COUNT(*) AS total FROM seriesRating where accountsSeries_ID = $id and userSeriesStatus='Watching'";
    $resulwatch = mysqli_query($connection, $watchseries);
    $watchseriesdata = mysqli_fetch_assoc($resulwatch);

    $complseries = "SELECT COUNT(*) AS total FROM seriesRating where accountsSeries_ID = $id and userSeriesStatus='Completed'";
    $resulcompl = mysqli_query($connection, $complseries);
    $complseriesdata = mysqli_fetch_assoc($resulcompl);

    $holdseries = "SELECT COUNT(*) AS total FROM seriesRating where accountsSeries_ID = $id and userSeriesStatus='On-Hold'";
    $resulhold = mysqli_query($connection, $holdseries);
    $holdseriesdata = mysqli_fetch_assoc($resulhold);

    $dropseries = "SELECT COUNT(*) AS total FROM seriesRating where accountsSeries_ID = $id and userSeriesStatus='Dropped'";
    $resuldrop = mysqli_query($connection, $dropseries);
    $dropseriesdata = mysqli_fetch_assoc($resuldrop);

    // Episodes
    $seriesepisodes = "SELECT SUM(userSeriesEpisodes) AS total FROM seriesRating where accountsSeries_ID = $id";
    $seriesepisodesresult = mysqli_query($connection, $seriesepisodes);
    $episodesseriesdata = mysqli_fetch_assoc($seriesepisodesresult);


    // Games Stats
    $plangames = "SELECT COUNT(*) AS total FROM gamesRating where accountsGames_ID = $id and userGameStatus='Plan to Play'";
    $resuplan = mysqli_query($connection, $plangames);
    $plangamesdata = mysqli_fetch_assoc($resuplan);

    $watchgames = "SELECT COUNT(*) AS total FROM gamesRating where accountsGames_ID = $id and userGameStatus='Playing'";
    $resuwatch = mysqli_query($connection, $watchgames);
    $watchgamesdata = mysqli_fetch_assoc($resuwatch);

    $complgames = "SELECT COUNT(*) AS total FROM gamesRating where accountsGames_ID = $id and userGameStatus='Finished'";
    $resucompl = mysqli_query($connection, $complgames);
    $complgamesdata = mysqli_fetch_assoc($resucompl);

    $holdgames = "SELECT COUNT(*) AS total FROM gamesRating where accountsGames_ID = $id and userGameStatus='On-Hold'";
    $resuhold = mysqli_query($connection, $holdgames);
    $holdgamesdata = mysqli_fetch_assoc($resuhold);

    $dropgames = "SELECT COUNT(*) AS total FROM gamesRating where accountsGames_ID = $id and userGameStatus='Dropped'";
    $resudrop = mysqli_query($connection, $dropgames);
    $dropgamesdata = mysqli_fetch_assoc($resudrop);
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
		<link href="profile.css" rel="stylesheet" type="text/css">

        <title>Profile</title>
	</head>

	<body>
        <div class="backgroundImage">
            <!------ Logo ------>
            <div class="profileLogoContainer">
                <h1>MyEntertainmentList</h1>
            </div>

            <!------ Options ------>
            <div class="profileTopnav">
                <a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
                <a href="myAccount.php"><i class="fa-solid fa-gear"></i></a>
            </div>
        </div>
		<!------ Content ------>
        <div class="profileAll">
            <div class="profileAccount">
                <div class="profileAccountImage">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['userIcon']); ?>" />
                </div>
                <div class="profileAccountName">
                    <div>
                        <h2 style="text-transform: uppercase;"><?php echo $row['username']; ?></h2>
                    </div>
                    <!--
                    <div>
                        <a>Friends</a>
                        <a>IDK</a>
                    </div>
                    -->
                </div>
            </div>
            <div class="profileContent">
                <div class="profileContentStats">
                    <h1>Stats</h1>
                    <div class="statsEntertainmentMovies">
                        <h2>Movies:</h2>
                        <a>Plan to Watch - <?php echo $planmoviedata['total']; ?></a>
                        <a>Completed - <?php echo $complmoviedata['total']; ?></a>
                        <a>On-Hold - <?php echo $holdmoviedata['total']; ?></a>
                        <a>Dropped - <?php echo $dropmoviedata['total']; ?></a>
                    </div>
                    <div class="statsEntertainmentSeries">
                        <h2>Series:</h2>
                        <a>Plan to Watch - <?php echo $planseriesdata['total']; ?></a>
                        <a>Watching - <?php echo $watchseriesdata['total']; ?></a>
                        <a>Completed - <?php echo $complseriesdata['total']; ?></a>
                        <a>On-Hold - <?php echo $holdseriesdata['total']; ?></a>
                        <a>Dropped - <?php echo $dropseriesdata['total']; ?></a>
                        <a class="space">Episodes - <?php echo $episodesseriesdata['total']; ?></a>
                    </div>
                    <div class="statsEntertainmentGames">
                        <h2>Games:</h2>
                        <a>Plan to Play - <?php echo $plangamesdata['total']; ?></a>
                        <a>Watching - <?php echo $watchgamesdata['total']; ?></a>
                        <a>Finished - <?php echo $complgamesdata['total']; ?></a>
                        <a>On-Hold - <?php echo $holdgamesdata['total']; ?></a>
                        <a>Dropped - <?php echo $dropgamesdata['total']; ?></a>
                    </div>
                </div>
                <div class="profileContentData">
                            <div class="profileLeft">
                                <h2>Movies:</h2>
                                <a href="moviePlanToWatch.php" class="href"><div class="statusHrefMovies">Plan to Watch</div></a>
                                <a href="movieCompleted.php" class="href"><div class="statusHrefMovies">Completed</div></a>
                                <a href="movieOn-Hold.php" class="href"><div class="statusHrefMovies">On-Hold</div></a>
                                <a href="movieDropped.php" class="href"><div class="statusHrefMovies">Dropped</div></a>
                            </div>

                            <div class="profileMain">
                            <h2>Series:</h2>
                                <a href="seriesPlanToWatch.php" class="href"><div class="statusHrefSeries">Plan to Watch</div></a>
                                <a href="seriesWatching.php" class="href"><div class="statusHrefSeries">Watching</div></a>
                                <a href="seriesCompleted.php" class="href"><div class="statusHrefSeries">Completed</div></a>
                                <a href="seriesOn-Hold.php" class="href"><div class="statusHrefSeries">On-Hold</div></a>
                                <a href="seriesDropped.php" class="href"><div class="statusHrefSeries">Dropped</div></a>
                            </div>

                            <div class="profileRight">
                            <h2>Games:</h2>
                                <a href="gamesPlanToPlay.php" class="href"><div class="statusHrefGames">Plan to Play</div></a>
                                <a href="gamesPlaying.php" class="href"><div class="statusHrefGames">Playing</div></a>
                                <a href="gamesFinished.php" class="href"><div class="statusHrefGames">Finished</div></a>
                                <a href="gamesOn-Hold.php" class="href"><div class="statusHrefGames">On-Hold</div></a>
                                <a href="gamesDropped.php" class="href"><div class="statusHrefGames">Dropped</div></a>
                            </div>
                </div>
            </div>
        </div>

		<!------ Footer ------>
		<div class="profileFooter">
            © copyright MyEntertainmentList.rf.gd
        </div>

	</body>
</html>
