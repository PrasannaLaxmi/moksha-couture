<?php
include "includes/db.php";

$id= $_GET['id'];
echo $id;

$sql = "delete from cart where product_id = $id";

$query = mysql_query($sql);

if($query){
    echo "<script>alert('the product is removed');
window.location='cart.php';
</script>";
}
else{
    echo "<script>alert('the product is not removed');
window.location='cart.php';
</script>";
}

?>