<?php
$con = mysqli_connect("users.cejsrq6wzm2i.us-west-2.rds.amazonaws.com:3306","jackskis","tuckerdog","UserList");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
date_default_timezone_set('America/Chicago');
// escape variables for security
//$email = mysqli_real_escape_string($con, $_POST["email"]);
$email = mysqli_real_escape_string($con, $_SESSION['username']);
//What's wrong here????^^ We want EMAIL, not USERNAME!!!
$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
$appartmentGroup = mysqli_real_escape_string($con, $_POST['appartmentGroup']);;
$apartment = mysqli_real_escape_string($con, $_POST['appartment']);;
$age = mysqli_real_escape_string($con, $_POST['age']);
$studentId = mysqli_real_escape_string($con, $_POST['studentid']);;
$timeCreated = date('Y-m-d H:i:s');;
$PartyDate = mysqli_real_escape_string($con, $_POST['SelectedDate']);;

$sql="INSERT INTO 
PartyList (
email,
firstName,
lastName,
appartmentGroup,
appartmentNumber,
age,
studentId,
timegen,
SelectedDate)
VALUES
('$email',
'$firstname',
'$lastname',
'$appartmentGroup',
'$apartment',
'$age',
'$studentId',
'$timeCreated',
'$PartyDate')";

if (!mysqli_query($con, $sql)) {
  die('Error: ' . mysqli_error($con));
}
?>
<!DOCTYPE html>
<html style="
	background: url(https://farm9.staticflickr.com/8524/8578431212_6124c2bedd_h.jpg)
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
		<link rel="stylesheet" type="text/css" href="../css/input.css"/>
		<script src="js/jquery-2.1.1.min.js"></script>
		<script src="js/KenyonEvents.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" type="text/css" href="../css/kenyonEvents.css" />
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
				<h1>Registration successful!</h1>
				<h2>You can check in on the status of your part on the  <a href="index.php">status page</a></h2>
			</div>


		</section>

	</body>

</html>
