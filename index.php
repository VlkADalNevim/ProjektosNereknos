<?php 
  session_start(); 

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
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
		<link href="index.css" rel="stylesheet" type="text/css">
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<title>MEL</title>

	</head>

	<body>
		<div class="backgroundImage">
				<!------ Logo ------>
				<div class="indexLogoContainer">
					<h1>MyEntertainmentList</h1>
				</div>

				<!------ Options ------>
				<div class="indexTopnav">
					<a href="profile.php">Profile</a>
					<?php if (isset($_SESSION['username'])) { ?>
						<p><a href="index.php?logout='1'">Logout</a></p>
					<?php } else { ?>
						<a href="login.php">Login</a>
					<?php } ?>
				</div>
		</div>
		<!------ Search input ------>
		<div class="searchInputsButtons">
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

		<!------ Results ------>
		<div class="indexContent">
			<div id="result">
				<a>Search for movies...</a>
			</div>
        </div>
		
		<!------ Footer ------>
		<div class="indexFooter">
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

<!--Movies AJAX-->
<script>
	$(document).ready(function(){
		load_data();
		function load_data(query)
		{
			$.ajax({
			url:"searchresult.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
			});
		}
		$('#searchMovies').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
		});
	});
</script>
<!--Games AJAX-->
<script>
	$(document).ready(function(){
		load_data();
		function load_data(query)
		{
			$.ajax({
			url:"searchresultGames.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
			});
		}
		$('#searchGames').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
		});
	});
</script>
<!--Series AJAX-->
<script>
	$(document).ready(function(){
		load_data();
		function load_data(query)
		{
			$.ajax({
			url:"searchresultSeries.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
			});
		}
		$('#searchSeries').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
		});
	});
</script>
