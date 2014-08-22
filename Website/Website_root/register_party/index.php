<?php
	include_once '../includes/db_connect.php';
	include_once '../includes/functions.php';
	sec_session_start();
?>

<!DOCTYPE html>
        <html style="
	background: url(https://farm3.staticflickr.com/2903/14028793383_05d4693e83_b.jpg)
	no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
		    ">
	<head>
		<title>Kenyon Event Scheduler</title>
		<!--<script src="../js/jquery-2.1.1.min.js"></script>-->
		<script src="../js/KenyonEvents.js"></script>
		<!--<script src="../js/htmlDatePicker.js" type="text/javascript"></script>-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css' />
		<link href="../css/kenyonEvents.css" rel="stylesheet" type="text/css" />
		<!--<link href="../css/htmlDatePicker.css" rel="stylesheet" />-->
		<link rel="stylesheet" type="text/css" href="../css/input.css"/>

		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  		<script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
  });
  </script>
	</head>
	<body>
		<header>
			<nav>
				<ul>
					<li>
						<a href="/">Home </a>
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
		<?php if (login_check($mysqli)) : ?>
			<section id="home-page">
				<h1>Register A Party</h1>
				<form action="insert.php" method="post">
					<div id="left">
						<h3>Please Enter Your<br> Party Info
							<h1><?php echo htmlentities($_SESSION['username']); ?></h1>
						</h3>
							<!--s
						<input name="email" type="text" placeholder="Email Address" id="seperator-margin" /><br>
						<input name="password" type="password" placeholder="Password" /><br>
						<input name="confirmPassword" type="password" placeholder="Confirm Password" /><br>
						<br>
							-->
					</div>	
					
					<!--div-->
					
					<div id="right">
						<input class="register-input" name="firstname"        type="text" placeholder="Host First Name"/>  <br>
						<input class="register-input" name ="lastname"        type="text" placeholder="Host Last Name"/>   <br>
						<input class="register-input" name="age"              type="text" placeholder="Host Age"/>         <br>
						<input class="register-input" name="studentid"        type="text" placeholder="Host Student ID" maxlength="7"/>  <br>
						<input class="register-input" name ="appartmentGroup" type="text" placeholder="Party Appt. Group"/> <br>
						<input class="register-input" name="appartment"       type="text" placeholder="Party Appt. #"/>     <br>
						<input class="register-input" name="SelectedDate"     type="text" placeholder="Date of Party" id="datepicker"> <br>
					</div>
					<div id="submit-button">
						<button id="register-button"type="submit">Submit</button>
					</div>
				</form>

		<?php else : ?>
			<section id="home-page">
				<div class="banner">
					<h1>Sorry!</h1>
					<h3>In order to view this page, you must be logged in.<br>
				</div>

			</section>
		<?php endif; ?>
	</body>
</html>