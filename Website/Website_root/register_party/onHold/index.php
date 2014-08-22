
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
		<script src="../kenyon_party_website/js/jquery-2.1.1.min.js"></script>
		<script src="../kenyon_party_website/js/KenyonEvents.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" type="text/css" href="../css/kenyonEvents.css"/>
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

			<h1>Register A User</h1>

			<form action="action.php" method="post">
				
				<div id="left">
					<h3>Please Enter Your<br>New Account Info</h3>
					<input name="email" type="text" placeholder="Email Address" id="seperator-margin" /><br>
					<input name="password" type="password" placeholder="Password" /><br>
					<input name="confirmPassword" type="password" placeholder="Confirm Password" /><br>
					<br>
				</div>	
				
				<!--div-->
				
				<div id="right">
					<input name="firstname"        type="text" placeholder="First Name"/>  <br>
					<input name ="lastname"        type="text" placeholder="Last Name"/>   <br>
					<input name ="appartmentGroup" type="text" placeholder="Appt. Group"/> <br>
					<input name="appartment"       type="text" placeholder="Appt. #"/>     <br>
					<input name="age"              type="text" placeholder="Age"/>         <br>
					<input name="studentid"        type="text" placeholder="Student ID"/>
				</div>

				<div id="submit-button">
					<button type="submit">Submit</button>
				</div>
				
			</form>
		</section>


		<footer>

		</footer>

	</body>
</html>
