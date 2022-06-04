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
		<!------ Logo ------>
		<div class="indexLogoContainer">
			<h1>MyEntertainmentList</h1>
		</div>

		<!------ Options ------>
		<div class="indexTopnav">
			<a href="profile.php"><i class="fa-solid fa-user-large"></i></a>
			<?php if (isset($_SESSION['username'])) { ?>
				<p><a href="index.php?logout='1'">Logout</a></p>
			<?php } else { ?>
				<a href="login.php">Login</a>
			<?php } ?>
		</div>

		<!------ Search input ------>
		<div class="searchArea">
	   		<input type="text" class="search" id="search" name="search" placeholder="Search for movies... ">
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