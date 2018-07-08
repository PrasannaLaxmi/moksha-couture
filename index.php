<?php
session_start();
error_reporting('0');
if(!empty($_SESSION['username']))
{
   
?>
<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php 
include 'inc/header.php';
include 'inc/body_left.php';
include 'inc/body_right.php';
include 'inc/footer.php';
?>
</body>
</html>
<?php 
}
else 
{
    include 'loginform.php';
}
?>
