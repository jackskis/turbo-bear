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
/*
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
*/
?>

<!DOCTYPE html>
<html style="
	background: url()
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
		<link rel="stylesheet" type="text/css" href="css/tables.css" />
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
					<h1 style="font-family: 'Sigmar One', cursive;">
						Welcome to KenyonParty!
					</h1>
					<h2>
						Faculty Page
					</h2>
			</div>
<?php if (facultyCheck()) : ?>
			<div>

					<?php
					$con=mysqli_connect("users.cejsrq6wzm2i.us-west-2.rds.amazonaws.com:3306","jackskis","tuckerdog","UserList");
					$result = mysqli_query($con, "SELECT * FROM PartyList WHERE selectedDate < (ADDDATE(CURDATE(), INTERVAL 21 DAY));")
					                       or die('cannot show tables');

					echo "<table>
					<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Appartment Group</th>
					<th>Appartment Number</th>
					<th>Age</th>
					<th>Student ID Number</th>
					<th>Event Date</th>
					</tr>";
					
					while($row = mysqli_fetch_array($result)) {
						echo "<tr>";
						echo "<td>" . $row['firstname'] . "</td>";
						echo "<td>" . $row['lastname'] . "</td>";
						echo "<td>" . $row['appartmentgroup'] . "</td>";
						echo "<td>" . $row['appartmentnumber'] . "</td>";
						echo "<td>" . $row['age'] . "</td>";
						echo "<td>" . $row['studentid'] . "</td>";
						echo "<td>" . $row['SelectedDate'] . "</td>";
						echo "</tr>";
					}

	  				?>
			</div>
<?php else : ?>
	Please log in as an admin to view this page
<?php endif; ?>
		</section>

	</body>

</html>
