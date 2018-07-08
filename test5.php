<?php
$flag = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Moksha Couture</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="css/sidebar.css" rel="stylesheet"/>
    <link href="css/product.css" rel="stylesheet"/>

  <style>
      .noLeftPadding {
          padding-left: 0 !important;
      }
   @media (min-width: 768px)
navbar.less:385
.navbar-right {
    float: right!important;
    margin-right: -15px;
    margin-top: -72px;
}

.dropdown-menu>li>a {
    display: block;
    padding: 0px 0px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
}

   .content-wrapper {
       min-height: 650px;
       margin: 1em 0;
   }

  </style>
</head>


<?php include"includes/header.php"; ?>
<div class="container-fluid content-wrapper">
    <div class="row">
        <div class="col-sm-2 noLeftPadding">
            <div class="sidebar">
                <h2>Categories</h2>
                <div class="btn-group" role="group">
                    <button id="wom_btn" type="button" class="btn btn-default categories active">
                        Women
                    </button>
                    <button type="button" id="kid_btn" class="btn btn-default">
                        Kids
                    </button>
                </div>
                /* <?php getMainCart() ?> */
<!--
                    <h4>Filter by color</h4>
                    <ul class="filter_color">
                    <?php getColor(); ?>
                    </ul>



                    <h4>Filter by size</h4>
                    <ul class="filter_size"> -->
/*                         <?php getSize(); ?> */
<!--
                    </ul>

                <h4>Filter by price</h4>
                <form class="form-group">
                <input type="text" placeholder="max" style="width: 37px;padding: 2px;;">
                <input type="text" placeholder="min"  style="width: 37px;padding: 2px;">
                <input type="submit" style="width:65px;">
                </form>
            </div>
        </div>
        <div class="col-sm-9">
            <div id="products_box"> -->
/*
                <?php
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                    $ids=explode(",", $id);

                    $get_pro = "select * from products p join sub_cat s on p.sub_cat_id = s.sub_cat_id where s.sub_cat_id='$id' or s.sub_cat_name like '$id%'";

                    $run_pro = mysql_query($get_pro);
                    if($count=mysql_num_rows($run_pro)>0)
                    {
                        //echo "hi";

                    }
                    else {
                        $id1=$ids['0'];
                        $id2=$ids['1'];
                        if($id1=='') {
                            if($id2=='All') {
                                $get_pro1 = "select * from products p join sub_cat s on p.sub_cat_id = s.sub_cat_id";
                            }
                            else {
                                $get_pro1 = "select * from products p join sub_cat s on p.sub_cat_id = s.sub_cat_id where s.sub_cat_name='$id2'";
                            }
                        }
                        else {
                            if($id2=='All') {
                                $get_pro1 = "select * from products p join sub_cat s on p.sub_cat_id = s.sub_cat_id where s.sub_cat_id='$id' or s.sub_cat_name like '$id1%'";
                            }
                            else {
                                $get_pro1 = "select * from products p join sub_cat s on p.sub_cat_id = s.sub_cat_id where s.sub_cat_id='$id' or s.sub_cat_name like '$id1%' or s.sub_cat_name like '$id2%'";
                            }
                        }
                    }
                    $get_pro1 = "select * from products p join sub_cat s on p.sub_cat_id = s.sub_cat_id";
                    $run_pro1 = mysql_query($get_pro1);
                    while($row_pro=mysql_fetch_array($run_pro1))
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
                <div class='product-item col-md-3 col-sm- col-xs-12'>
                    <a href='details.php?id=$pro_id'>
                        <img src='admin_area/product_images/$pro_img1' 
                        width='180' height='180' class='img-responsive img-thumbnail' />
                    </a>
                    <div class='product-detail'>
                        <h4>$pro_name</h4>
                        <p>$sub_cat_name/<b> Price: <i class='fa fa-inr' aria-hidden='true'></i> $pro_price </b></p>
                        <div class='btn-group btn-group-justified'>
                            <a href='details.php?id=$pro_id' class='btn btn-primary'>View</a>
                            <a class='btn btn-primary' href='check_cart.php?id=$pro_id'>Add To Cart</a>
                        </div>
                        
                    </div>
                        
                </div> ";
                    }
                }
                else {
                    $sql = "select * from products p join sub_cat s on p.sub_cat_id = s.sub_cat_id ";
                    $query = mysql_query($sql);
                    while ($row_pro = mysql_fetch_array($query)) {
                        $pro_id = $row_pro['product_id'];
                        $pro_img1 = $row_pro['product_img1'];
                        $pro_name = $row_pro['product_name'];
                        $sub_cat_name = $row_pro['sub_cat_name'];
                        $pro_price = $row_pro['product_price'];

                        echo "
    <div class='product-item col-sm-3'>
       <a href='details.php?id=$pro_id'>
            <img src='admin_area/product_images/$pro_img1' width='180' height='180' />
       </a>
          <h4>$pro_name</h4><a href='wishlist.php?id=$pro_id'><i class='fa fa-heart pull-right' aria-hidden='true' style='margin-top: -30px;margin-right: 28px;'></i></a>
            <p>$sub_cat_name/<b> Price: <i class='fa fa-inr' aria-hidden='true'></i> $pro_price </b></a><br>
                <div class='btn-group btn-group-justified'>
                            <a href='details.php?id=$pro_id' class='btn btn-primary'>View</a>
                            <a class='btn btn-primary' href='check_cart.php?id=$pro_id'>Add To Cart</a>
                </div>
      </div>
    ";
                    }
                }
                ?> */
<!--
            </div>
        </div>
    </div>
    </div>


-->
<!-- Footer -->
<?php include "includes/footer.php"; ?>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

  // Product Loop Select Items
    $('.main-category .title-category').each(function() {
       $(this).on('click',function() {
           var angleUpDown = $(this).find('.cart').children('i').hasClass('fa-angle-up');
           $(this).siblings('div').addClass('hide');
           $(this).siblings('div').removeClass('show');
           $(this).find('.cart').children('i').removeClass('fa-angle-up');
           $(this).find('.cart').children('i').addClass('fa-angle-down');
           console.log($(this).find('.cart').children('i').hasClass('fa-angle-up'));
           console.log($(this).find('.cart').children('i').hasClass('fa-angle-down'));
           if(angleUpDown) {
               $(this).siblings('div').addClass('hide');
               $(this).siblings('div').removeClass('show');
               $(this).find('.cart').children('i').removeClass('fa-angle-up');
               $(this).find('.cart').children('i').addClass('fa-angle-down');
           } else {
               $(this).siblings('div').addClass('show');
               $(this).siblings('div').removeClass('hide');
               $(this).find('.cart').children('i').addClass('fa-angle-up');
               $(this).find('.cart').children('i').removeClass('fa-angle-down');
           }
       });
    });

$('#wom_btn').click(function(){
          $('#').show();
          $('#').hide();
        });
});
</script>


