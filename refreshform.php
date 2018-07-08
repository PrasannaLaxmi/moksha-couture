<?php 
include 'inc/database.php';

    $statusupdate=$_POST['statusupdate1'];
    $order_id=$_POST['order_id1'];
    $product_id=$_POST['product_id1'];
   
   
            $sql = "update orders set order_status='Pendings' where order_id='$order_id'";
            $sqls = "update orders set order_id_dummy='',tracking_id_dummy=''";
            $results = $conn->query($sqls);
            $result = $conn->query($sql);
            
            
            echo "Updated Successfully";
                             
      

?>
