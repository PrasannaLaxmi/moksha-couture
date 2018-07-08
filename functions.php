<?php
$con=mysql_connect("localhost","root","") or mysql_error("not connected to the server");

$db=mysql_select_db("ecommerce") or mysql_error("database not connected");


/*function getPro()
{

        if(!isset($_GET['silk'])){

        if(!isset($_GET['cotton'])){


    $get_pro = "select * from products p join sub_cat s on p.sub_cat_id = s.sub_cat_id ";

    $run_pro = mysql_query($get_pro);

    while($row_pro=mysql_fetch_array($run_pro))
    {
        $pro_id = $row_pro['product_id'];
        $pro_name = $row_pro['product_name'];
        $cat_id = $row_pro['cat_id'];
        $sub_cat_id = $row_pro['sub_cat_id'];
        $pro_desc = $row_pro['product_desc'];
        $pro_img1 = $row_pro['product_img1'];
        $pro_img2 = $row_pro['product_img2'];
        $pro_img3 = $row_pro['product_img3'];
        $pro_img4 = $row_pro['product_img4'];
        $pro_img5 = $row_pro['product_img5'];
        $pro_color = $row_pro['product_color'];
        $pro_size = $row_pro['product_size'];
        $pro_price = $row_pro['product_price'];
        $keywords = $row_pro['keywords'];
        $Product_stock_avail = $row_pro['Product_stock_avail'];
        $pro_priority = $row_pro['product_priroty'];
        $pro_add_date = $row_pro['product_add_date'];
        $status = $row_pro['status'];
        $sub_cat_name = $row_pro['sub_cat_name'];
        echo "
            <div id='single_product'>



                <img src='admin_area/product_images/$pro_img1' width='180' height='180' />
                    <h4>$pro_name</h4>


                    <p style='float:left;'>$sub_cat_name/<b> Price: $ $pro_price </b></a>
                    <a href='index.php?add_cart=$pro_id'></a>

            </div>
        ";
    }

        }

}

}
*/










function getMainCart()
{

     $sql="select sub_cat.sub_cat_name, sub_sub_cat.sub_sub_cat_name, sub_cat.sub_cat_id,main_cat.cat_id,main_cat.cat_name from
main_cat left join sub_cat on main_cat.cat_id=sub_cat.main_cat_id  left join sub_sub_cat ON sub_cat.sub_cat_id=sub_sub_cat.subcat_id";
    $lastcat = 0;
    $lastmain=0;
    $result = mysql_query($sql);
 echo '<div class="main-category">';

    while ($row = mysql_fetch_array($result))
    {
        $cat_name=$row['cat_name'];
        $cat_id=$row['cat_id'];
        $sub_cat_id=$row['sub_cat_id'];
        $sub_cat_name=$row['sub_cat_name'];
       
    if($lastcat != $row['sub_cat_id']){
        $lastcat = $row['sub_cat_id'];
        ?>
          <div class="title-category" subCat="<?php echo $row['sub_cat_id']; ?>" mainCat="<?php echo $row['cat_id']; ?>">
          <h4><?php  echo $row['sub_cat_name'];?></h4>
          <span class="pull-right cart"><i class="fa fa-angle-up" aria-hidden="true"></i></span>
          <div class="clearfix"></div>
          </div>
      <?php 
    
}
?>
<div style="display:none;" class="showdetail-<?php echo $row['sub_cat_id']; ?>">
        <a style='margin-left:5px;margin-top:1px;' href='products.php?id=<?php echo $lastcat;?>'><?php echo $row['sub_sub_cat_name'];?></a><br>
</div>
  <?php
    }

echo '</div>';
}
function getSize() {
    $size="select * from productsize";
    $run_color=mysql_query($size);
    while($row_cats=mysql_fetch_array($run_color)){
        $s1=$row_cats['size'];
        echo "<li><button><a href='products.php?size_id=$s1'>$s1</a></button></li>";
    }
}

function getcolor() {
    $get_color="select * from colors ";
    $run_color=mysql_query($get_color);
    while($row_colors=mysql_fetch_array($run_color)){
        $color_name=$row_colors['color_name'];
        $color_value=$row_colors['color_value'];
        echo "<li><a href='products.php?color_id=$color_name' style='background:$color_value;padding-right:10px;margin:3px;padding-left:15px;' title='$col_id'></a></li>";
    }
}
/*
$get_sub_cart = "select * from sub_cat where sub_cat_id<=9";
$run_mid=mysql_query($get_sub_cart);
//fetching the sub category
while($row_mid=mysql_fetch_array($run_mid)){
$sub_cat_id=$row_mid['sub_cat_id'];
$mid_cat_id=$row_mid['mid_cat_id'];
$sub_cat_name=$row_mid['sub_cat_name'];
$main_cat_id=$row_mid['main_cat_id'];
$sub_cat_desc=$row_mid['sub_cat_desc'];
echo "<li id='mid_cat' style='padding-left:15px;'>$sub_cat_name</li>";
}*/



/* -----------------------------

function getGrid(){


}

function getLinear(){
error_reporting('0');
$page = $_GET['page'];

if($page=="" || $page=="1"){

$page1=0;
}
else{

$page1=($page*3)-3;

}

$get_pro = "select * from products p join sub_cat s on p.sub_cat_id = s.sub_cat_id where s.sub_cat_id='$id' or s.sub_cat_name like '$id%'";

      $run_pro = mysql_query($get_pro);

      while($row_pro=mysql_fetch_array($run_pro))
      {
          $pro_id = $row_pro['product_id'];
          $pro_name = $row_pro['product_name'];
          $cat_id = $row_pro['cat_id'];
          $sub_cat_id = $row_pro['sub_cat_id'];
          $pro_desc = $row_pro['product_desc'];
          $pro_img1 = $row_pro['product_img1'];
          $pro_img2 = $row_pro['product_img2'];
          $pro_img3 = $row_pro['product_img3'];
          $pro_img4 = $row_pro['product_img4'];
          $pro_img5 = $row_pro['product_img5'];
          $pro_color = $row_pro['product_color'];
          $pro_size = $row_pro['product_size'];
          $pro_price = $row_pro['product_price'];
          $keywords = $row_pro['keywords'];
          $Product_stock_avail = $row_pro['Product_stock_avail'];
          $pro_priority = $row_pro['product_priroty'];
          $pro_add_date = $row_pro['product_add_date'];
          $status = $row_pro['status'];
          $sub_cat_name = $row_pro['sub_cat_name'];

echo "
<div id='single_product1'>
<div id='left' style='width:200px;'>
<img src='admin_area/images/product_images/$pro_img1' width='180' height='135' style='margin-left:10px;margin-top:10px;'>
</div>

<div id='line_break1'>
<ul id='right_cart' style=' margin-top:-170px;margin-left:200px;background:yellow;'><br/>
<li><b>$pro_name</b></li>

<li><b><input type='number' value='1' style='width:40px;border: #2980b9 1px solid;'/></b></li>
<li><b>$pro_price</b></li>
<li><b><input type='button' value='Remove' style='width:90px;border: #2980b9 1px solid;'/></b></li>
</ul>
<ul style='list-style:none;margin-left:250px;'>
<li>In Stock</li>
<li>$address</li></ul>
</div>

</div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
";

}
}

function getSubCat()
{
/*

if(isset($_GET['silk'])){

$cat_id=$_GET['silk'];
if(isset($_GET['cotton'])){

$cat_id=$_GET['cotton'];
if(isset($_GET['shiffon'])){

$cat_id=$_GET['shiffon'];
if(isset($_GET['georgette'])){

$cat_id=$_GET['georgette'];
if(isset($_GET['chanderi'])){

$cat_id=$_GET['chanderi'];
if(isset($_GET['supernet'])){

$cat_id=$_GET['supernet'];
if(isset($_GET['fancy'])){

$cat_id=$_GET['fancy'];
if(isset($_GET['designer'])){

$cat_id=$_GET['designer'];
if(isset($_GET['ready to use'])){

$cat_id=$_GET['ready to use'];
$get_cat_pro = "select * from products where product_cat='$cat_id'";

$run_cat_pro = mysql_query($get_cat_pro);

$count_cats = mysql_num_rows($run_cat_pro);

if($count_cats==0){
echo "<h2 style='padding:20px;'>No products where found in this category</h2>";
exit();
}
else{
while($row_cat_pro=mysql_fetch_array($run_cat_pro))
{
$pro_id = $row_cat_pro['product_id'];
$pro_cat = $row_cat_pro['product_cat'];
$pro_brand = $row_cat_pro['product_brand'];
$pro_title = $row_cat_pro['product_title'];
$pro_price = $row_cat_pro['product_price'];
$pro_image = $row_cat_pro['product_image'];




echo "
<div id='single_product'>

<h3>$pro_title</h3>

<img src='admin_area/product_images/$pro_image' width='180' height='180' />

    <p><b> Price: $ $pro_price </b></p>

    <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
    <a href='index.php?pro_id=$pro_id'><button style='float:right;'>Add to Cart</button></a>

</div>
";
}
}

}
}}}}}}}
}*/


/*function getMidCart(){
$get_mid_cart = "select * from mid_cat";
$run_mid=mysql_query($get_mid_cart);

while($row_mid=mysql_fetch_array($run_mid)){
$mid_cat_id=$row_mid['mid_cat_id'];
$cat_id=$row_mid['cat_id'];
$cat_name=$row_mid['mid_cat_name'];

echo "<li><a href='products.php?mid=$mid_cat_id'>$cat_name</a></li>";
}



}
*/

function getCartPro() {
    error_reporting('0');
    $page = $_GET['page'];

    if($page=="" || $page=="1"){
        $page1=0;
    }
    else{
        $page1=($page*3)-3;
    }
    $pro_id = $_GET['id'];
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

}



function getOrderPro(){

 error_reporting('0');
    $page = $_GET['page'];

    if($page=="" || $page=="1"){
        $page1=0;
    }
    else{
        $page1=($page*3)-3;
    }
    $pro_id = $_GET['id'];
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
                <td><button class='btn btn-primary'><a href='receipt.php?id=$user_id' style='color:white;padding:10px;'>View</a></button></td>
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
";


}





?>
<?php
function getNm(){
    $sql="select * from users";
    $run=mysql_query($sql);
    while($row_pro=mysql_fetch_array($run)){
        $name = $row_pro['uname'];
        echo $name;
    }
}

function getCn(){
    if(isset($_SESSION['usernamec'])) {
        $user_id = $_SESSION['user_id'];
        $user_status = $_SESSION['status'];
        $sql = "select * from cart where $user_id = customer_id ";
        $run1 = mysql_query($sql);
        if ($run1 > 0) {
            $count = mysql_num_rows($run1);
            echo $count;
        } else {
            echo "<br>";
        }
    }
    else{
        echo "<br>";
    }
}

function getSum(){
    $user_id = $_SESSION['user_id'];
    $id = $_GET['id'];
    $sql="select sum(p.product_price) as sum from cart c join products p on c.product_id=p.product_id where $user_id= c.customer_id";

    $query=mysql_query($sql);

    $sql1= "select *from cart";
    $query1=mysql_query($sql1);
    $count=mysql_num_rows($query1);
    while($row_pro=mysql_fetch_array($query)){


        $sum = $row_pro['sum'];

        echo "<div class='panel panel-primary'>
  <div class='panel-heading'>
    <h3 class='panel-title'>Sub Total($count items)</h3>
  </div>
  <div class='panel-body'>
  <div class = ></div>
  <p><i class='fa fa-inr' aria-hidden='true'></i>$sum</p>
    <a class='btn btn-success btn-lg' href='checkout.php?sum=$sum'>Proceed to Checkout</a>
  </div>
</div>";
    }


}

/*function getMyAcc(){

    $get_drop = "select * from customers where customer_id='1'";
    $run_get_drop = mysql_query($get_drop);

    while($row_pro=mysql_fetch_array($run_get_drop)){
        $cus_name = $row_pro['Name'];
        $cus_pwd = $row_pro['Password'];
        $cus_mob = $row_pro['Mobile'];
        $cus_mail = $row_pro['Email'];
        $cus_add = $row_pro['Address'];
        $cus_status = $row_pro['customer_status'];
        $cus_dob = $row_pro['Dob'];
        echo $_SESSION['customer_id'];
        echo"<form><label>Name</label><br/><input type='text' id='acc' value='$cus_name'><input type='button' id='up_btn' value='Update'><hr>
        <label>Password</label><br/><input type='text' id='acc' value='$cus_pwd'><input type='button' id='up_btn' value='Update'><hr>
        <label>Mobile</label><br/><input type='text' id='acc' value='$cus_mob'><input type='button' id='up_btn' value='Update'><hr>
        <label>Email</label><br/><input type='text' id='acc' value='$cus_mail'><input type='button' id='up_btn' value='Update'><hr>
        <label>Address</label><br/><input type='text' id='acc' value='$cus_add'><input type='button' id='up_btn' value='Update'><br>
        </form>";
    }

}
*/




/* ---------------------
?>
<style type="text/css">
#acc{
background-color: #fff;
height: 25px;
line-height: normal;
border: 1px solid #a6a6a6;
border-top-color: #949494;
border-radius: 3px;
box-shadow: 0 1px 0 rgba(255,255,255,.5), 0 1px 0 rgba(0,0,0,.07) inset;
outline: 0;
width: 250px;
color: black;
margin-top: 10px;
margin-bottom: 10px;
font-size: 13px;
}
#up_btn{
background: white;
color:black;
padding:7px;
border-radius: 4px;
border: #2980b9 1px solid;
margin-left: 125px;
}
.pagination {
display: inline;
}
.pagination a {
color: black;
float: left;
padding: 8px 16px;
text-decoration: none;
border: 1px solid #ddd;
}
.pagination a.active {
background-color: #4CAF50;
color: white;
border: 1px solid #4CAF50;
}
.pagination a:hover:not(.active) {background-color: #ddd;}
.pagination a:first-child {
border-top-left-radius: 5px;
border-bottom-left-radius: 5px;
}
.pagination a:last-child {
border-top-right-radius: 5px;
border-bottom-right-radius: 5px;
}
i {
border: unset;
}
input:not([type]), input[type="email" i], input[type="number" i], input[type="password" i], input[type="tel" i], input[type="url" i], input[type="text" i] {
padding: 1px 0px;
}
</style>
<script>
$(document).ready(function(){


                    $('').click(function(){
                        $('').toggle("slow");
                    });
</script>*/
?>