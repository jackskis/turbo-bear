<?php
// Create connection
$con = mysqli_connect("localhost:3306","root","","kenyon");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
$appartmentGroup = $_POST["appartmentGroup"];
$apartment = $_POST["appartment"];
$age = mysqli_real_escape_string($con, $_POST['age']);
$studentId = $_POST["studentid"];
//$id = NOW()d; //What does this 'NOW()' function do?


$sql = "INSERT INTO NewUser (email, password, confirmPassword, firstName, lastName, appartmentGroup, appartmentNumber, age, studentId)
        VALUES ($email, $password, $confirmPassword, $firstname, $lastname, $appartmentGroup, $appartment, $age, $studentId)";
$result = mysqli_query($con, $sql);
?>