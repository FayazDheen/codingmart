<?php
$conn = mysqli_connect("localhost","root","","codingmart");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
