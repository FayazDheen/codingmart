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
if(!isset($_POST["email"])||!isset($_POST["password"]))
{
    
    echo '<script type="text/javascript">'; 
    echo 'alert("Invalid Credentials!");'; 
    echo 'window.location= "index.php";';
    echo '</script>'; 
    die;
}

$email = $_POST["email"];
$password = $_POST["password"];


$sql = "Select * from users where email='$email' and password='$password'";

$result = mysqli_query($conn,$sql);
while($rows=mysqli_fetch_assoc($result))
{
    if($rows["email"]==$email && $rows["password"]==$password)
    {
    echo '<script type="text/javascript">'; 
    echo 'alert("Login SUccess");'; 
    echo 'window.location= "home.php";';
    echo '</script>'; 
   
    $_SESSION["username"]=$email;
    }else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Invalid Credentials");'; 
        echo 'window.location= "index.php";';
        echo '</script>';  
    }
}
?>