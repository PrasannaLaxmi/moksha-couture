<?php
include 'includes/db.php';

$name = $_POST['uname'];
$mail = $_POST['email'];
$phone = $_POST['phone'];

$query = "insert into guest (uname,email,phone) values ('$name','$mail','$phone')";

$run_query = mysql_query($query);

if($run_query)
{
	echo "<script>window.open('products.php','_self')</script>";
}

else{
	echo mysql_error();
}
?>

