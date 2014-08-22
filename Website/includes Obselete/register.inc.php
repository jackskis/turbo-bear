<?php
//obselete
include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'functions.php';
 
$error_msg = "";


//Reference: $con = mysqli_connect("users.cejsrq6wzm2i.us-west-2.rds.amazonaws.com:3306","jackskis","tuckerdog","UserList");

if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {

    if (!endsWith($_POST['email'], '@kenyon.edu')){
      header('Location: ./register_fail.php');
      return;
    }
    // Set variables equal to HTML posted data
    $UsersFirstName = mysqli_real_escape_string($mysqli, $_POST['usersFirstName']);
    $UsersLastName = mysqli_real_escape_string($mysqli, $_POST['usersLastName']);
    $studentId = mysqli_real_escape_string($mysqli, $_POST['studentId']);
    $type = mysqli_real_escape_string($mysqli, $_POST['type']);
    // Defines that the account is not active (until the email has been sent out)
    $active = 0;
    
    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }
    //declares var to send unhashed password in email
    $passwordConf = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);

    //declares var to store hashed password
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
 
    $prep_stmt = "SELECT id FROM Members WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
   // check existing email  
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">A user with this email address already exists.</p>';
                        //$stmt->close();
        }
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                //$stmt->close();
    }
    $stmt->close();
 
    // check existing username
    $prep_stmt = "SELECT id FROM Members WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
                if ($stmt->num_rows == 1) {
                        // A user with this username already exists
                        $error_msg .= '<p class="error">A user with this username already exists</p>';
                        
                }
                //$stmt->close();
        } else {
                $error_msg .= '<p class="error">Database error line 55</p>';
                //$stmt->close();q
        }
        $stmt->close();
 
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
 
    if (empty($error_msg)) {
        // Create a random salt
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
 
        // Create salted password 
        $password = hash('sha512', $password . $random_salt);
 
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO Members (usersFirstName, usersLastName, studentId, username, email, password, salt, type, active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sssssssss',$UsersFirstName, $UsersLastName, $studentId, $username, $email, $password, $random_salt, $type, $active);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
            //Send email to user...
                $name    = mysqli_real_escape_string($mysqli, $_POST['username']);
                //$to      = mysql_escape_string($_POST['email']);
                $to      = 'zellwegerj@kenyon.edu';
                $subject = 'Signup | Verification'; // Give the email a subject 
                $message = '
                One last step!

                Username: '.$name.'
                Email: '.$to.'
                
                Click this link to confirm this email address:
                http://localhost/verify.php?email='.$email.'&hash='.$hash.'
                 
                '; // Our message above including the link
                                     
                $headers = 'From:noreply@kenyonparty.com' . "\r\n"; // Set from headers
                mail($to, $subject, $message, $headers); // Send our email
                echo "mail sent";
        }
    }
}





