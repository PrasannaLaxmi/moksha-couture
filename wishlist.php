<?php
include "includes/db.php";
include "includes/header.php";
error_reporting('0');
    $page = $_GET['page'];

    if($page=="" || $page=="1"){
        $page1=0;
    }
    else{
        $page1=($page*3)-3;
    }
$id=$_GET['id'];
echo $id;
$user_id = $_SESSION['user_id'];

$query = "select * from cart c join products p on c.product_id=p.product_id where $user_id= c.customer_id limit $page1,3";

    $run_pro = mysql_query($query);
    echo " <table class='table table-bordered cart'>
                    <thead>
                    <tr>
                        <th></th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>";
    while($row_pro=mysql_fetch_array($run_pro))
    {
        $pro_id = $row_pro['product_id'];
        $pro_name = $row_pro['product_name'];
        $cat_id = $row_pro['cat_id'];
        $sub_cat_id = $row_pro['sub_cat_id'];
        $pro_price = $row_pro['product_price'];
        $pro_img1 = $row_pro['product_img1'];
        $pro_avail = $row_pro['Product_stock_avail'];
        $address=$row_pro['address'];
        $quantity=$row_pro['quantity'];


        echo "<tr>
                <th scope='row'><img src='admin_area/product_images/$pro_img1' class='img-thumbnail'></th>
                <td><input type='number' value='$quantity' class='form-control'></td>
                <td><i class='fa fa-inr' aria-hidden='true'></i> $pro_price</td>
                <td><button class='btn btn-primary'><a href='remove.php?id=$pro_id' style='color:white;padding:10px;'>Remove</a></button></td>
            </tr>";
    }
    echo "</tbody></table><div class='clearfix'></div>";
    echo " <nav aria-label='Page navigation'>
            <ul class='pagination'>
                <li>
                    <!--<a href=''>
                        <span aria-hidden='true'>&laquo;</span>
                    </a>-->
                </li>";
    $query1 = "select * from cart where $user_id= customer_id";
    $run1=mysql_query($query1);
    $count = mysql_num_rows($run1);
    $a = $count/3;
    $a=ceil($a);
    for($b=1;$b<=$a;$b++){
        ?>
        <li><a href="cart.php?page=<?php echo$b; ?>"><?php echo $b; ?></a></li>
        <?php
    }
    echo "<li>
                <!--<a href='#'>
                    <span aria-hidden='true'>&raquo;</span>
                </a>-->
            </li>
        </ul>
    </nav>";

?>