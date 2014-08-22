<?php
    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';
    include_once 'includes/process_reset.php';
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
        <section id="home-page">
            <div class="banner">
        <?php
            mysqli_connect("users.cejsrq6wzm2i.us-west-2.rds.amazonaws.com:3306","jackskis","tuckerdog","UserList"); // Connect to database server(localhost) with username and password.
            mysqli_select_db($mysqli, "UserList") or die(mysql_error()); // Select registration database.
            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
                // Verify data
                $email = mysql_escape_string($_GET['email']); // Set email variable
                $resetHash = mysql_escape_string($_GET['hash']); // Set hash variable
                echo $email."\n".$resetHash;
                             
                $search = mysqli_query($mysqli, "SELECT email, resetHash FROM Members WHERE email='".$email."' AND resetHash='".$resetHash."'") or die(mysql_error()); 
                $match  = mysqli_num_rows($search);
                ?>
                <?php if ($match > 0){ ?>
                    ?>
                    <h1 style="font-family: 'Sigmar One', sans-serif;">
                        Reset Password 
                    </h1>
                    <h2>
                        Enter a new password for your account.
                    </h2>
<?php
    //echo esc_url($_SERVER['PHP_SELF']);
?>
                    <form action="includes/process_reset.php"
                          method="post"
                          name="login_form"
                          style="margin:20px;"> 

                        <input class="register-input"
                        name="password"
                               type="password"
                               placeholder="Password" />

                        <input class="register-input"
                               type="password" 
                               name="confirm_password" 
                               id="password" placeholder="Confirm Password" />

                        <button class="register-new-account-button"
                                type="submit"
                                value="Submit" 
                                onclick="return confirmMatch(this.form, this.form.password, this.form.confirm_password);">
                            Submit
                        </button>';
                    </form>
                <?php } else {
                    // No such email exists?>
                    echo '<section id="home-page">
                            <div class="banner">
                                <h1>Invalid</h1>
                                <h2>Invalid approach, or you've already activated your account!<br>
                                Go back to the <a href="index.php">login page</a></h2>
                            </div>
                            </section>';
                <?php } ?>
            <?php }else{ 
                // Invalid approach
            ?>
                    <section id="home-page">
                            <div class="banner">
                                <h1>Invalid Approach</h1>
                                <h2>Please use the link that has been sent to your email.</h2>
                            </div>
                            </section>
            <?php } ?>
        </div>
    </section>
</body>

</html>

