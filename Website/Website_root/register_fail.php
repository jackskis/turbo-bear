<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

//Create custom secure session
sec_session_start();

// Check if logged in
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

// Create connection
$con=mysqli_connect("localhost:3306","root","","kenyon");
$result = mysqli_query($con, 'SELECT COUNT(1) FROM Students');
if (!$result) {
   print($result);
}
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html style="
	background: url(https://farm3.staticflickr.com/2852/9953867915_e7bc057f4c_h.jpg)
	no-repeat center center fixed; 
  	-webkit-background-size: cover;
  	-moz-background-size: cover;
  	-o-background-size: cover;
  	background-size: cover;"
>
	<head>
		<title>KenyonParty</title>
		<script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
		<link rel="stylesheet" type="text/css" href="css/input.css"/>
		<script src="js/jquery-2.1.1.min.js"></script>
		<script src="js/KenyonEvents.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" type="text/css" href="css/kenyonEvents.css" />
		<link href='http://fonts.googleapis.com/css?family=Sigmar+One' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<header>
			<nav>
				<ul>
					<li>
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">How To</a>
					</li>
					<li>
						<a href="#">About Us</a>
					</li>
				</ul>
			</nav>
		</header>

		<section id="home-page">
			<div class="banner">
				<h1>Register Failure</h1>
				<h3>Please use an authorized Kenyon email address.</h3>
			</div>


		</section>

	</body>

</html>
