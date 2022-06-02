<?php 
	include("db.php");
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

		<!-- TOPNAV - Login,Dropdown -->
		<div class="topnav">
			<div class="dropdown">
				<button class="dropbtn"><i class="fa-solid fa-bars"></i></button>
				<div class="dropdown-content">
					<a href="#">Support</a>
					<a href="#">Info</a>
				</div>
			</div>
			<a href="login.php"><button class="loginButton">Login</button></a>
		</div>

		<!-- Search input -->
		<div class="searchArea">
			<div class="topLine"></div>
			
	   		<input type="text" class="search" id="search" name="search" placeholder="Search for movies... ">

			<div class="bottomLine"></div>
		</div>

		<!-- Results -->
		<div class="resultsArea">
			<div id="result">
				<a>Search for movies...</a>
			</div>
		</div>

		<!-- Footer -->
		<div class="footer">© copyright MyEntertainmentList.rf.gd</div>

	</body>
</html>


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
		$('#search').keyup(function(){
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