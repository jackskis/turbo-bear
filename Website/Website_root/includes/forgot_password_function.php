<?php
    include_once 'db_connect.php';

    if ($_POST['email'])
    {
        $email = $_POST['email'];
        //var_dump($mysqli);
        //Prepare statement...
        $stmt = $mysqli->prepare("SELECT COUNT(*) FROM Members WHERE email = ?");
        $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
        $stmt->bind_result($emailCount);
        $stmt->fetch();
 
        //Check the number of rows that match the SELECT statement...
        if ($emailCount > 0) {
            $permission = true;
            $resetHash = md5( rand(0,1000) );
            //var_dump($resetHash);
            //mysqli_connect($mysqli);
            mysqli_real_escape_string($mysqli, $email);
            //echo "Hello world";
            //This is where the problem lies...
            mysqli_query($mysqli, "UPDATE UserList.Members SET resetHash = '".$resetHash."' WHERE email = '".$email."';");


        }else {
            $permission = false;
            echo "That email doesn't exist in the system.";
        }
        if ($permission) {
            //Send email to user...
            $to      = $email;
            $subject = 'Forgot Password'; // Give the email a subject 
            $message = '
            So you forgot your password...

            Your email address: '.$email.'
            Click this link to reset your password:
            http://localhost/password_reset.php?email='.$email.'&hash='.$resetHash.'
             
            '; // Our message above including the link
                                 
            $headers = 'From:noreply@kenyonparty.com' . "\r\n"; // Set from headers
            mail($to, $subject, $message, $headers); // Send our email

            header("../register_success.php");
            }else {
            echo '';
            }
        }

?>