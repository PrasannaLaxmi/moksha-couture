<?php
include 'includes/db.php';
session_start();
$name=$_POST['uname'];

$pwd=$_POST['pwd'];
$query="select * from users where uname='$name' and pwd='$pwd'";
$count=mysql_query($query);
if(mysql_num_rows($count)>0)
{
    while($row=mysql_fetch_array($count))
    {
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['status'] = $row['customer_status'];
    }
    $_SESSION['usernamec']=$name;

	echo"<script>alert('Login Success')
		window.location='products.php';
	</script>";
	
}
else{
	echo"<script>alert('Please Enter Valid Credentials')
window.location='index.php';</script>";
}


?>