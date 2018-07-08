<?php
$flag = 1;
$pro_id=$_GET['id'];
echo $pro_id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
@media only screen and (max-width: 1920px) {
.col-sm-3{
width:22%;
}
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


<?php include"functions/functions.php"; ?>
<div class="container-fluid content-wrapper" style="margin-top:5em;">
    <div class="row">
        <div class="col-sm-2 noLeftPadding">
            <div class="sidebar">
                <h2>Categories</h2>
                <div class="btn-group" role="group">
                   <a class="women" data-toggle="tab" href="#women"> <button id="wom_btn" type="button" class="btn btn-default categories active"> 
                        Women
                    </button> </a>
                   <a class="kids" data-toggle="tab" href="#kids"> <button type="button" id="kid_btn" class="btn btn-default">
                        Kids
                    </button> </a>
                
               <div class="tab-content">
                <?php getMainCart() ?>
               </div></div>
                    <h4>Filter by color</h4>
                    <ul class="filter_color">
                    <?php getColor(); ?>
                    </ul>



                    <h4>Filter by size</h4>
                    <ul class="filter_size">
                        <?php getSize(); ?>
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
            <div id="products_box">
                <?php
                    $sql = "select * from products p join sub_cat s on p.sub_cat_id = s.sub_cat_id where product_priroty='High' LIMIT 0,9";
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
          <h4 class='details_name'>$pro_name</h4><a href='wishlist.php?id=$pro_id'><i class='fa fa-heart-o pull-right' aria-hidden='true' style='margin-top: -30px;margin-right: 5px;'></i></a>
            <p  class='details_name'>$sub_cat_name/<b> Price: <i class='fa fa-inr' aria-hidden='true'></i> $pro_price </b></a><br>
                <div class='btn-group btn-group-justified product_det_btn'>
                            <a href='details.php?id=$pro_id' class='btn btn-primary'>View</a>
                            <a class='btn btn-primary' href='check_cart.php?id=$pro_id'>Add To Cart</a>
                </div>
      </div>
    ";
                    
                }
                ?>
            </div>
        </div>
    </div>
    </div>



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
   
$('#wom_btn').click(function(){
          $('#').show();
          $('#').hide();
        });



});
</script>



<script>
 $('.main-category .title-category').each(function() {
	$(this).on('click',function() {
		var titleCatId = $(this).attr('subCat');
		console.log(titleCatId);
		var angleUpDown = $(this).find('.cart').children('i').hasClass('fa-angle-up');
		$(this).siblings('div.showdetail-'+titleCatId).addClass('show');
		$(this).siblings('div.showdetail-'+titleCatId).removeClass('hide');
		$(this).find('.cart').children('i').removeClass('fa-angle-up');
		$(this).find('.cart').children('i').addClass('fa-angle-down');
		console.log($(this).find('.cart').children('i').hasClass('fa-angle-up'));
		console.log($(this).find('.cart').children('i').hasClass('fa-angle-down'));
		if(angleUpDown) {
		   $(this).siblings('div.showdetail-'+titleCatId).addClass('hide');
		   $(this).siblings('div.showdetail-'+titleCatId).removeClass('show');
		   $(this).find('.cart').children('i').removeClass('fa-angle-up');
		   $(this).find('.cart').children('i').addClass('fa-angle-down');
		} else {
		   $(this).siblings('div.showdetail-'+titleCatId).addClass('show');
		   $(this).siblings('div.showdetail-'+titleCatId).removeClass('hide');
		   $(this).find('.cart').children('i').addClass('fa-angle-up');
		   $(this).find('.cart').children('i').removeClass('fa-angle-down');
		}
	});
});

$('.kids').each(function(){
	$(this).on('click',function() {
        var sub = $('.title-category').attr('mainCat');
        console.log(sub);
        if(sub==24){
        console.log("hi");
var sub_sub =  $('.title-category').attr('subCat:last');
console.log(sub_sub);
         $('.title-category').find('subCat').removeClass('show'); 
        }
        else{
        console.log("hello");  
        }
    });
});


</script>
