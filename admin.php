<?php 
  session_start(); 

  $id=$_SESSION['id'];
  if ($id != 1) {
    header('location: index.php');
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
		<link href="admin.css" rel="stylesheet" type="text/css">
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<title>MEL</title>

	</head>

	<body>
		<div class="backgroundImage">
				<!------ Logo ------>
				<div class="adminLogoContainer">
					<h1>MyEntertainmentList</h1>
				</div>

				<!------ Options ------>
				<div class="adminTopnav">
                    <a href="index.php"><i class="fa-solid fa-arrow-left" style="background:transparent;"></i></a>
				</div>
		</div>


        <div class="adminBox">
            <div class="accounts">
                <a>Accounts</a>
            </div>

            <div class="createAndSearch">
                <div class="createNew">
                    <div class="newMovie">
                        <a href="movieCreation.php">MOVIE</a>
                    </div>
                    <div class="newSeries">
                        <a href="seriesCreation.php">SERIES</a>
                    </div>
                    <div class="newGame">
                        <a href="gamesCreation.php">GAME</a>
                    </div>
                </div>

                <div class="searchAndResult">
                    <div class="search">
                        <div class="searchAreaConfig">
                            <button class="showMoviesButton" onclick="myFunctionMovies()">Movies</button>
                            <button class="showGamesButton" onclick="myFunctionGames()">Games</button>
                            <button class="showSeriesButton" onclick="myFunctionSeries()">Series</button>
                        </div>
                        <div class="searchArea">
                            <input type="text" class="search" id="searchMovies" name="search" placeholder="Search for movies... ">
                            <input type="text" class="search" id="searchGames" name="search" style="display:none;" placeholder="Search for games... ">
                            <input type="text" class="search" id="searchSeries" name="search" style="display:none;" placeholder="Search for series... ">
                        </div>
                    </div>

                    <div class="result" id="result">
                        <a>Search for movies...</a>
                    </div>
                </div>
            </div>
        </div>
		
		<!------ Footer ------>
		<div class="adminFooter">
            © copyright MyEntertainmentList.rf.gd
        </div>

	</body>
</html>

<script>
function myFunctionMovies() {
  var x = document.getElementById("searchMovies");
  var y = document.getElementById("searchGames");
  var z = document.getElementById("searchSeries");
  if (x.style.display === "none") {
	y.style.display = "none";
	z.style.display = "none";
    x.style.display = "block";
	
  }
}

function myFunctionGames() {
  var x = document.getElementById("searchMovies");
  var y = document.getElementById("searchGames");
  var z = document.getElementById("searchSeries");
  if (y.style.display === "none") {
    y.style.display = "block";
	z.style.display = "none";
    x.style.display = "none";
  }
}

function myFunctionSeries() {
  var x = document.getElementById("searchMovies");
  var y = document.getElementById("searchGames");
  var z = document.getElementById("searchSeries");
  if (z.style.display === "none") {
    z.style.display = "block";
	y.style.display = "none";
    x.style.display = "none";
  }
}
</script>