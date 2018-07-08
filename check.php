<?php

include 'includes/db.php';

$name=$_POST['uname'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$phone=$_POST['phone'];
$status="registered";
$query = "insert into users values('','$pwd','$phone','$name','$email','$status')";
$sql=mysql_query($query);

if($sql)
{
	
	echo"<script>alert('registered please signin');</script>";
	echo "<script>window.location='index.php';</script>";
	
}
else{
	echo"<script>alert('not registered');</script>";
	echo mysql_error();
	echo "<script>window.location='index.php';</script>";
}


?>