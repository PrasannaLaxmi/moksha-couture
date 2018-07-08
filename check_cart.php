<?php
session_start();
include 'includes/db.php';

if(!empty($_SESSION['usernamec'])) {


    $customer_id = $_SESSION['user_id'];
    $user_name = $_SESSION['usernamec'];
    $user_status = $_SESSION['status'];
    /*
     if($customer_id!=0){
    */
    $pro_id = $_GET['id'];

    date_default_timezone_set('Asia/Calcutta');

    $date = date('Y/m/d s');


    $quantity = 1;

    $status = "registered";
    // $cus_name=$_SESSION['usernamec'];

    $sql = "insert into cart values('$customer_id','$pro_id','$date','$quantity','$status')";

    $query = mysql_query($sql);

    if ($query) {
        echo "<script>window.location='cart.php?id=$pro_id';</script>";
    } else {
        echo "";
    }
}

else{
    $status="guest";
    $query = "insert into users values('','','','','','$status')";
    $sql=mysql_query($query);
    $sql1 = "select * from users";
    $run1 = mysql_query($sql1);
    while($row = mysql_fetch_array($run1)){
         $_SESSION['user_id'] = $row['user_id'];

    }

    $guest_user_id = $_SESSION['user_id'];

    $sql1 = "select * from users where $guest_user_id = user_id";
    $query1 = mysql_query($sql1);
    while($row = mysql_fetch_array($query1)){
        $pro_id = $_GET['id'];
        date_default_timezone_set('Asia/Calcutta');
        $date = date('Y/m/d s');
        $quantity = 1;
        $status="guest";
        $sql = "insert into cart values('$guest_user_id','$pro_id','$date','$quantity','$status')";

        $query = mysql_query($sql);

        if ($query) {
            echo "<script>window.location='cart.php?id=$pro_id';</script>";
        } else {
            echo "";
        }

    }

}
/*else{
	echo"<script>alert('Login Success')
		window.location='index1.php';
	</script>";
}
*/
?>