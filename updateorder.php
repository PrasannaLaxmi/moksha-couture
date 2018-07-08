<?php 
include 'inc/database.php';
if(isset($_POST['submit']))
{
    $statusupdate=$_POST['statusupdate'];
    $product_id=$_POST['product_id'];
    echo $product_id;
    
    $sql = "update orders set order_status='Shipped' where product_id='$product_id'";
    $result = $conn->query($sql);
    
    if($result)
    {
        echo "<script>alert('Updated Successfully')<script>";
    }
}
?>

