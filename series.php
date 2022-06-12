<?php 
session_start();
?>
<?php 
include "db.php";
         
$id=$_SESSION['id'];


	// Series data
	$series_ID = $_GET['series_ID'];
	$query=mysqli_query($connection,"SELECT * FROM series where id=$series_ID");
	$row=mysqli_fetch_array($query);
	$seriees_ID = $row['id'];
    $seriesEpisodes = $row['sEpisodes'];

	// User rating
	$query = "SELECT * FROM seriesRating WHERE series_ID=".$series_ID." and accountsSeries_ID=".$id;
	$userresult = mysqli_query($connection,$query);
	$fetchRating = mysqli_fetch_array($userresult);
	$userSeriesRating = $fetchRating['userSeriesRating'];
	$userSeriesStatus = $fetchRating['userSeriesStatus'];
    $userSeriesEpisodes = $fetchRating['userSeriesEpisodes'];

	// Average/Total rating
	$query = "SELECT ROUND(AVG(userSeriesRating),2) as averageRating FROM seriesRating WHERE series_ID=".$seriees_ID." and userSeriesRating>0";
	$avgresult = mysqli_query($connection,$query);
	$fetchAverage = mysqli_fetch_array($avgresult);
	$averageRating = $fetchAverage['averageRating'];
	if($averageRating <= 0){
	$averageRating = "-||-";
	}

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
		<link href="series.css" rel="stylesheet" type="text/css">
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<title>MEL</title>
	</head>

	<body>
		<div class="backgroundImage">
			<!------ Logo ------>
			<div class="seriesLogoContainer">
				<h1>MyEntertainmentList</h1>
			</div>

			<!------ Options ------>
			<div class="seriesTopnav">
				<a href="index.php"><i class="fa-solid fa-arrow-left" style="background:transparent;"></i></a>
			</div>
		</div>
		<!------ topBox ------>
		<div class="seriesTopBox">
			<div class="seriesTopBoxLeft">
				<div class="seriesIcon">
					<a class="seriesIconImage">
						<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['sIcon']); ?>" />
					</a> 
				</div>

				<div class="seriesName">
					<form action="#" method="POST">
						<div class="seriesNameText">
							<?= $row['sName'] ?>
						</div>
						<div class="seriesStatInputs">
							<div class="seriesInputs">
								Colletion:
								<select class="seriesStatInput" name="selectSeriesStatus">

								<?php if (isset($_SESSION['id'])) { ?>
									<option value="<?php echo $userSeriesStatus; ?>"> - <?php echo $userSeriesStatus; ?> - </option>
									<option value="Completed">Completed</option>
                                    <option value="Watching">Watching</option>
                                    <option value="Plan to Watch">Plan to Watch</option>
									<option value="On-Hold">On-Hold</option>
									<option value="Dropped">Dropped</option>
								<?php } else { ?>
									<option value=" ">---</option>
									<option value="Completed">Completed</option>
                                    <option value="Watching">Watching</option>
                                    <option value="Plan to Watch">Plan to Watch</option>
									<option value="On-Hold">On-Hold</option>
									<option value="Dropped">Dropped</option>
								<?php } ?>
								</select>
							</div>

							<div class="seriesInputs">
								Your Score:
								<select class="seriesStatInput" name="selectSeriesRating">

								<?php if (isset($_SESSION['id'])) { ?>
									<option value="<?php echo $userSeriesRating; ?>"> - <?php echo $userSeriesRating; ?> - </option>
									<option value="10">10</option>
									<option value="9">9</option>
									<option value="8">8</option>
									<option value="7">7</option>
									<option value="6">6</option>
									<option value="5">5</option>
									<option value="4">4</option>
									<option value="3">3</option>
									<option value="2">2</option>
									<option value="1">1</option>
								<?php } else { ?>
									<option>---</option>
									<option value="10">10</option>
									<option value="9">9</option>
									<option value="8">8</option>
									<option value="7">7</option>
									<option value="6">6</option>
									<option value="5">5</option>
									<option value="4">4</option>
									<option value="3">3</option>
									<option value="2">2</option>
									<option value="1">1</option>
								<?php } ?>
								</select>
							</div>

                            <div class="seriesInputs">
								    Progress:
                                    <input type="number" class="seriesStatInputProgress" name="selectSeriesProgress" min="0" max="<?php echo $seriesEpisodes; ?>" placeholder="<?php echo $userSeriesEpisodes; ?> / <?php echo $seriesEpisodes; ?>">
							</div>

						</div>
						<input class="submitStatusButton" type="submit" name="submitStatus" value="Submit">
					</form>
				</div>
			</div>
			<div class="seriesTopBoxRight">

				<div class="seriesScore">
					SCORE
					<a><?php echo $averageRating; ?></a>
				</div>
			</div>
		</div>

		<!------ Info area ------>
		<div class="seriesInfoBox">
            <div class="seriesDescription">
                <p> <?= $row['sDescription'] ?></p>
			</div>

            <div class="seriesAddInfo">
                <p>Director: <a><?= $row['sDirector'] ?></a></p>
				<p>Release date: <a><?= $row['sReleaseDate'] ?></a></p>
				<p>Episodes: <a><?php echo $seriesEpisodes; ?></a></p>
				<p>Score: <a><?php echo $averageRating; ?></a></p>
			</div>
		</div>

		<!------ Comments ------>
		<div class="seriesCommentsBox">
			<div class="seriesComment">
            	<p>Comments</p>
			</div>
		</div>

		<!------ Footer ------>
		<div class="seriesFooter">© copyright MyEntertainmentList.rf.gd</div>

	</body>
	
</html>

<?php
if (isset($_POST['submitStatus'])) {
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	else{
	$seriesRating = $_POST['selectSeriesRating'];
	$seriesStatus = $_POST['selectSeriesStatus'];
    $seriesProgress = $_POST['selectSeriesProgress'];

// Check entry within table
$query = "SELECT COUNT(*) AS postCount FROM seriesRating WHERE series_ID=".$series_ID." and accountsSeries_ID=".$id;
$result = mysqli_query($connection,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['postCount'];
if($count == 0){ 
    $insertquery = "INSERT INTO seriesRating (series_ID, accountsSeries_ID, userSeriesRating, userSeriesStatus, userSeriesEpisodes) 
                    VALUES('$series_ID', '$id', '$seriesRating', '$seriesStatus', '$seriesProgress')";
    mysqli_query($connection,$insertquery);

   }else {
    $updatequery = "UPDATE seriesRating SET userSeriesRating='$seriesRating', userSeriesStatus='$seriesStatus', userSeriesEpisodes='$seriesProgress' where accountsSeries_ID='$id' and series_ID='$series_ID'";
    mysqli_query($connection,$updatequery);
   }
   // get average
   $query = "SELECT ROUND(AVG(userSeriesRating),2) as averageRating FROM seriesRating WHERE series_ID=".$series_ID;
   $result = mysqli_query($connection,$query);
   $fetchAverage = mysqli_fetch_array($result);
   $averageRating = $fetchAverage['averageRating'];
   $return_arr = array("averageRating"=>$averageRating);
   echo json_encode($return_arr);
    $updateaveragequery = "UPDATE series SET sRating='$averageRating' where id='$series_ID'";
    mysqli_query($connection,$updateaveragequery);

	?>
	<script type="text/javascript">
		window.location = "series.php?series_ID=<?php echo $seriees_ID?>";
	</script>
	<?php 
	}
}
?>