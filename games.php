<?php 
session_start();
?>
<?php 
include "db.php";
         
$id=$_SESSION['id'];


	// Game data
	$games_ID = $_GET['games_ID'];
	$query=mysqli_query($connection,"SELECT * FROM games where id=$games_ID");
	$row=mysqli_fetch_array($query);
	$gamees_ID = $row['id'];

	// User rating
	$query = "SELECT * FROM gamesRating WHERE games_ID=".$games_ID." and accountsGames_ID=".$id;
	$userresult = mysqli_query($connection,$query);
	$fetchRating = mysqli_fetch_array($userresult);
	$userGameRating = $fetchRating['userGameRating'];
	$userGameStatus = $fetchRating['userGameStatus'];
    $userGameProgress = $fetchRating['userGameProgress'];

	// Average/Total rating
	$query = "SELECT ROUND(AVG(userGameRating),2) as averageRating FROM gamesRating WHERE games_ID=".$gamees_ID." and userGameRating>0";
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
		<link href="game.css" rel="stylesheet" type="text/css">
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<title>MEL</title>
	</head>

	<body>
		<div class="backgroundImage">
			<!------ Logo ------>
			<div class="gameLogoContainer">
				<h1>MyEntertainmentList</h1>
			</div>

			<!------ Options ------>
			<div class="gameTopnav">
				<a href="index.php"><i class="fa-solid fa-arrow-left" style="background:transparent;"></i></a>
			</div>
		</div>
		<!------ topBox ------>
		<div class="gameTopBox">
			<div class="gameTopBoxLeft">
				<div class="gameIcon">
					<a class="gameIconImage">
						<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['gIcon']); ?>" />
					</a> 
				</div>

				<div class="gameName">
					<form action="#" method="POST">
						<div class="gameNameText">
							<?= $row['gName'] ?>
						</div>
						<div class="gameStatInputs">
							<div class="gameInputs">
								Colletion:
								<select class="gameStatInput" name="selectGameStatus">

								<?php if (isset($_SESSION['id'])) { ?>
									<option value="<?php echo $userGameStatus; ?>"> - <?php echo $userGameStatus; ?> - </option>
									<option value="Finished">Finished</option>
                                    <option value="Playing">Playing</option>
                                    <option value="Plan to Play">Plan to Play</option>
									<option value="On-Hold">On-Hold</option>
									<option value="Dropped">Dropped</option>
								<?php } else { ?>
									<option value=" ">---</option>
									<option value="Finished">Finished</option>
                                    <option value="Playing">Playing</option>
                                    <option value="Plan to Play">Plan to Play</option>
									<option value="On-Hold">On-Hold</option>
									<option value="Dropped">Dropped</option>
								<?php } ?>
								</select>
							</div>

							<div class="gameInputs">
								Your Score:
								<select class="gameStatInput" name="selectGameRating">

								<?php if (isset($_SESSION['id'])) { ?>
									<option value="<?php echo $userGameRating; ?>"> - <?php echo $userGameRating; ?> - </option>
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

                            <div class="gameInputs">
								    Progress:
                                    <input type="number" class="gameStatInput" name="selectGameProgress" min="0" max="100" placeholder="<?php echo $userGameProgress; ?> / 100%">
							</div>

						</div>
						<input class="submitStatusButton" type="submit" name="submitStatus" value="Submit">
					</form>
				</div>
			</div>
			<div class="gameTopBoxRight">

				<div class="gameScore">
					SCORE
					<a><?php echo $averageRating; ?></a>
				</div>
			</div>
		</div>

		<!------ Info area ------>
		<div class="gameInfoBox">
            <div class="gameDescription">
                <p> <?= $row['gDescription'] ?></p>
			</div>

            <div class="gameAddInfo">
                <p>Author: <a><?= $row['gAuthor'] ?></a></p>
				<p>Release date: <a><?= $row['gReleaseDate'] ?></a></p>
				<p>---: <a><?= $row['---'] ?></a></p>
				<p>---: <a><?= $row['---'] ?></a></p>
			</div>
		</div>

		<!------ Comments ------>
		<div class="gameCommentsBox">
			<div class="gameComment">
            	<p>Comments</p>
			</div>
		</div>

		<!------ Footer ------>
		<div class="gameFooter">© copyright MyEntertainmentList.rf.gd</div>

	</body>
	
</html>

<?php
if (isset($_POST['submitStatus'])) {
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	else{
	$gamesRating = $_POST['selectGameRating'];
	$gamesStatus = $_POST['selectGameStatus'];
    $gamesProgress = $_POST['selectGameProgress'];

// Check entry within table
$query = "SELECT COUNT(*) AS postCount FROM gamesRating WHERE games_ID=".$games_ID." and accountsGames_ID=".$id;
$result = mysqli_query($connection,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['postCount'];
if($count == 0){ 
    $insertquery = "INSERT INTO gamesRating (games_ID, accountsGames_ID, userGameRating, userGameStatus, userGameProgress) 
                    VALUES('$games_ID', '$id', '$gamesRating', '$gamesStatus', '$gamesProgress')";
    mysqli_query($connection,$insertquery);

   }else {
    $updatequery = "UPDATE gamesRating SET userGameRating='$gamesRating', userGameStatus='$gamesStatus', userGameProgress='$gamesProgress' where accountsGames_ID='$id' and games_ID='$games_ID'";
    mysqli_query($connection,$updatequery);
   }
   // get average
   $query = "SELECT ROUND(AVG(userGameRating),2) as averageRating FROM gamesRating WHERE games_ID=".$games_ID;
   $result = mysqli_query($connection,$query);
   $fetchAverage = mysqli_fetch_array($result);
   $averageRating = $fetchAverage['averageRating'];
   $return_arr = array("averageRating"=>$averageRating);
   echo json_encode($return_arr);
    $updateaveragequery = "UPDATE games SET gRating='$averageRating' where id='$games_ID'";
    mysqli_query($connection,$updateaveragequery);

	?>
	<script type="text/javascript">
		window.location = "games.php?games_ID=<?php echo $gamees_ID?>";
	</script>
	<?php 
	}
}
?>