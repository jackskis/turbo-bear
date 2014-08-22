<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html style="
    background: url(https://farm5.staticflickr.com/4149/4996000523_acd94ac58b_b.jpg)
    no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
            ">
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <script src="../js/jquery-2.1.1.min.js"></script>
        <script src="../js/KenyonEvents.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css' />
        <link href="../css/kenyonEvents.css" rel="stylesheet" type="text/css" />
        <link href="../css/htmlDatePicker.css" rel="stylesheet" />
        <link href="../css/input.css" rel="stylesheet" />

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

        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->


        <h1>Create an account with us</h1>

        <h3>Return to the <a href="index.php">login page</a>.</h3>


        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>

        <!--
        <ul>
            <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one upper case letter (A..Z)</li>
                    <li>At least one lower case letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
        -->

        <form   action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                method="post" 
                name="registration_form">

        <input     class="register-input"
                   type="text" 
                   name="usersFirstName" 
                   id="usersFirstName"
                   placeholder="First Name"/><br>

        <input     
                   class="register-input"
                   type="text" 
                   name="usersLastName" 
                   id="usersLastName"
                   placeholder="Last Name"/><br>
        <input     
                   class="register-input"
                   type="text" 
                   name="studentId" 
                   id="studentId"
                   placeholder="Student Id"
                   maxlength="7"/><br>

            <input class="register-input"
                   type='text' 
                   name='username' 
                   id='username'
                   placeholder="Username" /><br>

            <input class="register-input"
                   type="text"
                   name="email"
                   id="email"
                   placeholder="Email"/><br>

            <input class="register-input"
                   type="password"
                   name="password" 
                   id="password"
                   placeholder="Password"/><br>

            <input class="register-input"
                   type="password" 
                   name="confirmpwd" 
                   id="confirmpwd"
                   placeholder="Confirm Password"/><br>

            <input class="radio"
                   type="radio" 
                   name="type" 
                   id="type"
                   value="Student"/><h4>Student</h3><br>

            <input class="radio"
                   type="radio" 
                   name="type" 
                   id="type"
                   value="Faculty"/><h4>Faculty</h4><br>

            <input id="register-button"
                   type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd,
                                   this.form.usersLastName,
                                   this.form.usersFistName,
                                   this.form.studentId,
                                   this.form.type);" /> 
        </form>

        </section>
    </body>
</html>






