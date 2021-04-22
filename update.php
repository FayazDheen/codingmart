<?php

require 'connection.php';
session_start();

if(!isset($_SESSION["username"]))
{
    echo '<script type="text/javascript">'; 
    echo 'alert("You are not logged in");'; 
    echo 'window.location= "index.php";';
    echo '</script>'; 
}
$email = $_SESSION["username"];
extract($_POST);
$result = mysqli_query($conn,"Update users set dob = '$dob',address = '$address' where email='$email'");

echo '<script type="text/javascript">'; 
    echo 'alert("Updated successfully");'; 
    echo 'window.location= "home.php";';
    echo '</script>'; 

?>

