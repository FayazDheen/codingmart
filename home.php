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

$result = mysqli_query($conn,"Select * from users where email='$email' limit 1");
$user = array();
while($rows=mysqli_fetch_assoc($result))
{
    $user=$rows;
}

?>

<h3>User Name: <?php echo $user['name'] ?></h3>
<h3>Mail ID: <?php echo $email ?></h3>
<h2>Profile Update</h2>
<form action="update.php" method = "post">
  <label for="dob">Date of Birth</label>
  <input type="date" id="dob" name="dob" value= "<?php echo $user['dob'] ?>"><br><br>
  <label for="address">Address:</label>
  <input type="text" id="address" name="address" value= "<?php echo $user['address'] ?>"><br><br>
 
  <input type="submit" value="Submit">
</form>

<br>
<a href="signOut.php" >Sign Out</a> 