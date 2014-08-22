<?php
    include_once './includes/db_connect.php';
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" style="
    background: url(https://farm9.staticflickr.com/8524/8578431212_6124c2bedd_h.jpg)
    no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">
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
        <?php
            mysqli_connect("users.cejsrq6wzm2i.us-west-2.rds.amazonaws.com:3306","jackskis","tuckerdog","UserList"); // Connect to database server(localhost) with username and password.
            mysqli_select_db($mysqli, "UserList") or die(mysql_error()); // Select registration database.
            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
                // Verify data
                $email = mysql_escape_string($_GET['email']); // Set email variable
                $hash = mysql_escape_string($_GET['hash']); // Set hash variable
                             
                $search = mysqli_query($mysqli, "SELECT email, hash, active FROM Members WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
                $match  = mysqli_num_rows($search);
                             
                if($match > 0){
                    // We have a match, activate the account
                    mysqli_query($mysqli, "UPDATE Members SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
                    echo '<section id="home-page">
                            <div class="banner">
                                <h1>Registration successful!</h1>
                                <h2>You can now go back to the <a href="index.php">login page</a> and log in</h2>
                            </div>
                            </section>';
                }else{
                    // No match -> invalid url or account has already been activated.
                    echo '<section id="home-page">
                            <div class="banner">
                                <h1>Invalid</h1>
                                <h2>The URL is invalid or you have already activated your account.<br>
                                Go back to the <a href="index.php">login page</a></h2>
                            </div>
                            </section>';
                }
            }else{
                // Invalid approach
                echo '<section id="home-page">
                            <div class="banner">
                                <h1>Invalid Approach</h1>
                                <h2>Please use the link that has been sent to your email.</h2>
                            </div>
                            </section>';
            }
             
        ?>
</body>

</html>