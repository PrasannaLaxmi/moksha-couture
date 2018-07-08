<?php

$conn = mysqli_connect("localhost","mokshacouture","moksha123","moksha");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>