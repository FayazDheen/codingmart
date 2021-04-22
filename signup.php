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
if(!isset($_POST["uname"])||!isset($_POST["email"])||!isset($_POST["password"])||!isset($_POST["cpassword"]))
{
    
    echo '<script type="text/javascript">'; 
    echo 'alert("Fill All Fields!");'; 
    echo 'window.location= "index.php";';
    echo '</script>'; 
    die;
}
$name = $_POST["uname"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];

if($cpassword!=$password)
{
    echo '<script type="text/javascript">'; 
    echo 'alert("Password missmatch!");'; 
    echo 'window.location= "index.php";';
    echo '</script>'; 
    die;
}
$sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";

if(!mysqli_query($conn,$sql))
{
    echo "Data Not inserted";
    echo mysqli_error($conn);
}else{
     echo '<script type="text/javascript">'; 
     echo 'alert("User Created Successfully!");'; 
     echo 'window.location= "index.php";';
     echo '</script>';    
}



?>