<?php 
include 'inc/database.php';
   
    
        
        $order_id=$_POST['prodID'];
        
        $sql = "update orders set order_status='Pending',order_id_dummy='$order_id' where order_id='$order_id'";
        $sqls = "update orders set order_id_dummy='',tracking_id_dummy='' where order_id!='$order_id'";
        $result = $conn->query($sqls);
        $result = $conn->query($sql);
       
           
            
       
    ?>