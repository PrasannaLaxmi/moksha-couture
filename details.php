<?php

 /*echo $_SESSION['user_id'];
    
echo   $_SESSION['usernamec'];*/

 $flag=1;
?>
<style>
 .tiles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  .tile {
    position: relative;
    float: right;
    width: 450px;
    height: 294px;
    overflow: hidden;
    margin: 10px 10px 0px 10px;
  }

  .photo {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    transition: transform .5s ease-out;
  }

.thumb:hover{
cursor:pointer;
}

.gallery #main-img {background: url(admin_area/product_images/$pro_img1) no-repeat 0 0;}
</style>
<?php include "includes/header.php"; 
include "includes/db.php";

 if(isset($_GET['id']))
		        {$id=$_GET['id'];
$sql="select * from products p join sub_cat s on p.sub_cat_id = s.sub_cat_id  where product_id=$id";
$query=mysql_query($sql);
while($row_pro=mysql_fetch_array($query)){
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
		            $pro_dis = $row_pro['product_discount'];
		            $pro_id = $row_pro['product_id'];

echo "
<div class='container-fluid main-container'>
    <div class='row'>    
        <div class='floating-panel col-md-5 pull-left secondary-pic  gallery'>            
            <div class='pull-left'>             
                <ul class='image_details'>
                    <li id='thumb1' ><img id='thumb1' src='admin_area/product_images/$pro_img1' /></li>
                    <li><img class='thumb2' src='admin_area/product_images/$pro_img1' /></li>
                    <li><img class='thumb3' src='admin_area/product_images/$pro_img1' /></li>
                    <li><img class='thumb4' src='admin_area/product_images/$pro_img1' /></li>
                    <li><img class='thumb5' src='admin_area/product_images/$pro_img1' /></li>                    
                </ul>                
            </div>  

<div class='tiles pull-left primary-pic' id='main-img'>
    <div class='tile thumb-show' data-scale='2.4' data-image='admin_area/product_images/$pro_img1'></div>
  </div>
          
        </div>
    
        <div class='col-md-7 pull-right pro_detail'>    
            <h4>$pro_name</h4>
            <h2><i class='fa fa-inr' aria-hidden='true'></i>$pro_price</h2>
            <hr>
             <div class='pull-left'>
                <ul>
                    <li>Color</li>
                    <li>Size</li>
                    <li>Stock Availability</li>
                    <li>Status</li>
                    <li>Description</li>
                    <li>Discount</li>
                </ul>
            </div> 
            <div class='pull-left product_details_values'>
                <ul>
                    <li>$pro_color</li>
                    <li>$pro_size</li>
                    <li>$Product_stock_avail</li>
                    <li> $status</li>
                    <li>$pro_desc</li>
                    <li>$pro_dis</li>
                </ul>
            </div>
            <div class='clearfix'></div> 
            <div class='action-buttons'>
                <a href='checkout.php?id=$pro_id,sum=$pro_price' class='btn btn-lg btn-danger'>BUY</a>
                <a href='check_cart.php?id=$pro_id' class='btn btn-lg btn-danger'>ADD TO CART</a>
            </div>
        </div>
    </div>
<div id='thumb11'></div>
</div>    
";
}
}
?>



<?php
$pro_id=$_GET['id'];
?>



<?php include"includes/footer.php"; ?>

<script>
jQuery(document).ready(function($){
$(".tile")
  // tile mouse actions
  .on("mouseover", function() {
    $(this)
      .children(".photo")
      .css({ transform: "scale(" + $(this).attr("data-scale") + ")" });
  })
  .on("mouseout", function() {
    $(this)
      .children(".photo")
      .css({ transform: "scale(1)" });
  })
  .on("mousemove", function(e) {
    $(this)
      .children(".photo")
      .css({
        "transform-origin":
          (e.pageX - $(this).offset().left) / $(this).width() * 100 +
          "% " +
          (e.pageY - $(this).offset().top) / $(this).height() * 100 +
          "%"
      });
  })
  // tiles set up
  .each(function() {
    $(this)
      // add a photo container
      .append('<div class="photo"></div>')
      // some text just to show zoom level on current item in this example
      // set up a background image for each tile based on data-image attribute
      .children(".photo")
      .css({ "background-image": "url(" + $(this).attr("data-image") + ")" });
  });
 
$("#thumb1")
  // tile mouse actions
  .on("mouseover", function() {
        alert("hi");
  });

});
</script>
