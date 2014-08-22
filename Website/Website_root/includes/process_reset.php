<?php
include_once 'process_reset.php';
include_once 'db_connect.php';
include_once 'functions.php';
if (isset($_POST['password'], $_POST['confirm_password'])) {
    $newPassword = mysql_escape_string($_POST['password']);
    $newConfirmPassword = mysql_escape_string($_POST['confirm_password']);
    if($newPassword == $newConfirmPassword) {
        // Create a random salt
        $newRandomSalt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        $email = 'zellweherj@kenyon.edu';
        // Create salted password 
        $saltedHashed = hash('sha512', $newPassword . $newRandomSalt);
        $stmt3 = $mysqli->prepare("UPDATE UserList.Members SET password = '".$saltedHashed."' WHERE email = '".$email."';");
        
        //Maybe it will be faster to do a direct mysqli query without prepared statements...
        //mysqli_query($mysqli, "UPDATE UserList.Members SET password = '".$saltedHashed."' WHERE email = '".$email."';")

        // Execute the prepared query.
        if ($stmt3->execute()) {
            echo "Query executed";
        }else {
            echo "Invalid Query";
        }
    }else {
        echo "The passwords don't match.";  

    }

}



?>