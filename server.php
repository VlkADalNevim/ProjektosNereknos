<?php
session_start();

$dbservername = 'sql307.epizy.com';
$dbusername = 'epiz_31599999';
$dbpassword = 'FtxnQQ9xMj';
$dbname = "epiz_31599999_mel";

$errors = array(); 
$connection = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
  
// Check connection
if(!$connection){
    die('Database connection error : ' .mysql_error());
}


if (isset($_POST['registerUser'])) {
	// receive all input values from the form
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	  array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM accounts WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($connection, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  if (count($errors) == 0) {
	$password = md5($password_1);//encrypt the password before saving in the database

	$query = "INSERT INTO accounts (username, email, password) 
			  VALUES('$username', '$email', '$password')";
	mysqli_query($connection, $query);
	$_SESSION['username'] = $username;
  if ($stmt = $connection->prepare('SELECT id FROM accounts WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
      if ($stmt->num_rows > 0) {
          $stmt->bind_result($id);
          $stmt->fetch();
      }
  }
  $_SESSION['id'] = $id;
	$_SESSION['success'] = "You are now logged in";
	header('location: index.php');
}
}

// -----------------LOGIN USER-----------------------
if (isset($_POST['loginUser'])) {
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT id, username, email, password FROM accounts WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($connection, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
      if ($stmt = $connection->prepare('SELECT id FROM accounts WHERE username = ?')) {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();
          if ($stmt->num_rows > 0) {
              $stmt->bind_result($id);
              $stmt->fetch();
          }
      }
      $_SESSION['id'] = $id;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
?>