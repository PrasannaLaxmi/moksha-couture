<?php
include "includes/db.php";
if(!empty($_SESSION['usernamec'])){
    echo "<script>
		window.location='checkout.php';
	</script>";
}else{
    echo "<script>
alert('Please register or continue as a guest')
		window.location='cart.php';
	</script>";
}
?>