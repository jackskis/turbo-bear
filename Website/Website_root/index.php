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
//$con=mysqli_connect("localhost:3306","root","","kenyon");
$con=mysqli_connect("users.cejsrq6wzm2i.us-west-2.rds.amazonaws.com:3306","jackskis","tuckerdog","UserList");
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
	background: url(https://farm5.staticflickr.com/4153/4995993145_9416cfc59a_b.jpg)
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
						<a href="/">Home <?php echo htmlentities($_SESSION['username']); ?></a>
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
<?php
//echo $_SESSION['user_id'];
//echo $_SESSION['username'];
//echo $_SESSION['emaill'];
?> 
				<?php if (login_check($mysqli) == false) : ?>
					<h1 style="font-family: 'Sigmar One', sans-serif;">
						Welcome to KenyonParty!
					</h1>
					<h2>
						find and register parties at kenyon college
					</h2>
					<h3>
						<!--PUT SOMETHING HERE!!!! "login or something"-->
						<?php

        				if (isset($_GET['error'])) {
						echo '<p class="error">Error Logging In!</p>';
						}
						?> 
						
					</h3>
					<form action="includes/process_login.php"
					      method="post"
					      name="login_form"
					      style="margin:20px;"> 
						<input class="register-input"
						name="email"
							   type="text"
							   placeholder="Email Address" />
						<input class="register-input"
						type="password" 
                               name="password" 
                               id="password" placeholder="Password" />

						<button class="register-new-account-button"
								type="button"
                   				value="Login" 
                   				onclick="formhash(this.form, this.form.password);">
							Submit
						</button>
					</form>

					<FORM id="register-now-button"
					      METHOD="LINK"
					      ACTION="register.php">
						<button class="register-new-account-button"
								TYPE="submit"
						        VALUE="Clickable Button">
							Register New Account!
						</button>
					</FORM>

					<form id="register-now-button"
						  method = "LINK"
						  ACTION="forgot_password.php">
						  <button class="register-new-account-button"
								  TYPE="submit"
						          VALUE="Clickable Button">
							Forgot Password?
						</button>
					</form>

				<?php else : ?>

				<h1>
					Welcome to KenyonParty, <?php echo htmlentities($_SESSION['username']); ?>!<br>
				</h1>

				<h1>
					You're logged in.
				</h1>

					<form>
						<button class="register-new-account-button">View Request Status</button>
					</form>

					<form METHOD="LINK"
						  ACTION="register_party/index.php">
						<button class="register-new-account-button" VALUE="Clickable Button">
							Register New Party
						</button>
					</form>
						<button class="register-new-account-button" id="account-info-button">Account info</button>

					<form action="../includes/logout.php">
						<button class="register-new-account-button" id="account-info-button">Log Out</button>
					</form>

				<?php endif; ?>

			</div>


		</section>

	</body>

</html>
