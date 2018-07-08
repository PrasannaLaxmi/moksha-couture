<?php
  
include 'inc/database.php';
    $tracking_id=$_POST['tracking_id1'];
    $order_id=$_POST['order_id1'];
   // echo $order_id;
   
    $sql = "update orders set order_status='Shipped',tracking_id='$tracking_id' where order_id='$order_id'";
        $sqls = "update orders set tracking_id_dummy='',order_id_dummy=''";
        $results = $conn->query($sqls);
        $result = $conn->query($sql);
        
        
        echo "updated successfully";
                                  
  
?>