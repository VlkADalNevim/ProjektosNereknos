<?php 
session_start();
?>
<?php 
include "db.php";
         

	// Movie data
	$movie_ID = $_GET['movie_ID'];
	$query=mysqli_query($connection,"SELECT * FROM movie where id=$movie_ID");
	$row=mysqli_fetch_array($query);
	$moveid_ID = $row['id'];

	// User rating
	$id = $_SESSION["id"];
	$query = "SELECT * FROM rating WHERE movie_ID=".$movie_ID." and accounts_ID=".$id;
	$userresult = mysqli_query($connection,$query);
	$fetchRating = mysqli_fetch_array($userresult);
	$userRating = $fetchRating['userRating'];

	// Average/Total rating
	$query = "SELECT ROUND(AVG(userRating),2) as averageRating FROM rating WHERE movie_ID=".$moveid_ID;
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
		<link href="movie.css" rel="stylesheet" type="text/css">
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<title>MEL</title>
	</head>

	<body>
		<!------ Logo ------>
		<div class="movieLogoContainer">
			<h1>MyEntertainmentList</h1>
		</div>

		<!------ Options ------>
		<div class="movieTopnav">
			<a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
		</div>

		<!------ topBox ------>
		<div class="movieTopBox">
			<div class="movieTopBoxLeft">
				<div class="movieIcon">
					<a class="movieIconImage">*Image* <?= $row['mIcon'] ?></a> 
				</div>

				<div class="movieName">
					<form action="#" method="POST">
						<div class="movieNameText">
							<?= $row['mName'] ?>
						</div>
						<div class="movieStatInputs">
						<!--
							<div>
								Colletion:
									<select name="userStatus" class="movieStatInput">
										<option>Add movie to: </option>
										<option value="Completed">Completed</option>
										<option value="Planned">Plan to Watch</option>
										<option value="On-Hold">On-Hold</option>
										<option value="Dropped">Dropped</option>
									</select>
							</div>
						-->
							<div>
								Your Score:
								<select class="movieStatInput" name="selectMovieRating">

								<?php if (isset($_SESSION['username'])) { ?>
									<option value="<?php echo $userRating; ?>"><?php echo $userRating; ?></option>
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
						</div>
						<input type="submit" name="submitStatus" value="Submit">
					</form>
				</div>
			</div>
			<div class="movieTopBoxRight">

				<div class="movieScore">
					SCORE
					<a><?php echo $averageRating; ?></a>
				</div>
			</div>
		</div>

		<!------ Info area ------>
		<div class="movieInfoBox">
            <div class="movieDescription">
                <p> <?= $row['mDescription'] ?></p>
			</div>

            <div class="movieAddInfo">
                <p>Director: <a><?= $row['mDirector'] ?></a></p>
				<p>Camera: <a><?= $row['camera'] ?></a></p>
				<p>Music: <a><?= $row['music'] ?></a></p>
				<p>Actors: <a><?= $row['actors'] ?></a></p>
			</div>
		</div>

		<!------ Comments ------>
		<div class="movieCommentsBox">
			<div class="movieComment">
            	<p>Comments</p>
			</div>
		</div>

		<!------ Footer ------>
		<div class="movieFooter">© copyright MyEntertainmentList.rf.gd</div>

	</body>
	
</html>

<?php
if (isset($_POST['submitStatus'])) {
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	else{
	$movieRating = $_POST['selectMovieRating'];

// Check entry within table
$query = "SELECT COUNT(*) AS postCount FROM rating WHERE movie_ID=".$movie_ID." and accounts_ID=".$id;
$result = mysqli_query($connection,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['postCount'];
if($count == 0){ 
    $insertquery = "INSERT INTO rating (movie_ID, accounts_ID, userRating) VALUES('$movie_ID', '$id', '$movieRating')";
    mysqli_query($connection,$insertquery);

   }else {
    $updatequery = "UPDATE rating SET userRating=" . $movieRating . " where accounts_ID=" . $id . " and movie_ID=" . $movie_ID;
    mysqli_query($connection,$updatequery);
   }
   // get average
   $query = "SELECT ROUND(AVG(userRating),2) as averageRating FROM rating WHERE movie_ID=".$movie_ID;
   $result = mysqli_query($connection,$query);
   $fetchAverage = mysqli_fetch_array($result);
   $averageRating = $fetchAverage['averageRating'];
   $return_arr = array("averageRating"=>$averageRating);
   echo json_encode($return_arr);

   header("Refresh:0");
	}
}
?>