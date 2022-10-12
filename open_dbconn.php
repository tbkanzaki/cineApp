<?php
  // Open connection
  $dbconn = mysqli_connect("localhost","root","123456","cinema");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
?>

