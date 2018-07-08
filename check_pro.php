<?php
include "includes/db.php";


$saree = array();
$halfsaree = array();
$dress = array();
$lehenga = array();
$gown = array();
$color = array();
if(isset($_REQUEST['saree'])){
    //query string value to array and removing empty index of array
    $saree = array_filter(explode("-",$_REQUEST['saree']));
}
if(isset($_REQUEST['halfsaree'])){
 
 $halfsaree = array_filter(explode("-",$_REQUEST['halfsaree']));
}

if(isset($_REQUEST['dress'])){
 
 $dress = array_filter(explode("-",$_REQUEST['dress']));
}

if(isset($_REQUEST['lehenga'])){
 
 $lehenga = array_filter(explode("-",$_REQUEST['lehenga']));
}

if(isset($_REQUEST['gown'])){
 
 $gown = array_filter(explode("-",$_REQUEST['gown']));
}


?>
<?php include"includes/header.php"; ?>
<div class="list-group">


    <?php

    $sql = "select sub_cat.sub_cat_name, sub_sub_cat.sub_sub_cat_name, sub_cat.sub_cat_id,main_cat.cat_id,main_cat.cat_name from
main_cat left join sub_cat on main_cat.cat_id=sub_cat.main_cat_id  left join sub_sub_cat ON sub_cat.sub_cat_id=sub_sub_cat.subcat_id";


    $lastcat = 0;
    $lastmain = 0;

    $query = mysql_query($sql);

    while ($row = mysql_fetch_array($query)) {
        $cat_name = $row['cat_name'];
        $cat_id = $row['cat_id'];
        $sub_cat_id = $row['sub_cat_id'];
        $sub_cat_name = $row['sub_cat_name'];
        $sub_sub_cat_name = $row['sub_sub_cat_name'];
        if ($lastmain != $row['cat_id']) {
            $lastmain = $row['cat_id'];

        }

        if ($lastcat != $row['sub_cat_id']) {
            $lastcat = $row['sub_cat_id'];
    ?>

    <div class="main-category">
        <div class="title-category">
            
            
            <?php


            }

            $lastsub = 0;
            $query = "select * from sub_sub_cat where subcat_id=24";
    $rs = mysql_query($query) or die("Error : ".mysql_error());?>

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
</div>



<div class="title-category" subCat="<?php echo $row['sub_cat_id']; ?>" mainCat="<?php echo $row['cat_id']; ?>">
          <h4><?php  echo $row['sub_cat_name'];?></h4>
          <span class="pull-right cart"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
          <div class="clearfix"></div>
          </div>
<?php
    while($saree_data = mysql_fetch_assoc($rs)){

        ?>
        <a href="javascript:void(0);" class="">

         
<div style="" class="showdetail-<?php echo $row['sub_cat_id']; ?>">
            <input type="checkbox" class="item_filter saree" value="<?php echo $saree_data['sub_sub_cat_id']; ?>" <?php if(in_array($saree_data['sub_sub_cat_id'],$saree)){ echo "checked";  } ?> >
            <?php echo $saree_data['sub_sub_cat_name']; ?>
            </div>

        </a>
    <?php  }

$query = "select * from sub_sub_cat where subcat_id=25";
    $rs = mysql_query($query) or die("Error : ".mysql_error());?>
<div class="title-category" subCat="<?php echo $row['sub_cat_id']; ?>" mainCat="<?php echo $row['cat_id']; ?>">
          <h4><?php  echo "Half Saree";?></h4>
          <span class="pull-right cart"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
          <div class="clearfix"></div>
          </div>
<?php
    while($halfsaree_data = mysql_fetch_assoc($rs)){

        ?>
        <a href="javascript:void(0);" class="">

            
<div style="" class="showdetail-<?php echo $row['sub_cat_id']; ?>">
            <input type="checkbox" class="item_filter halfsaree" value="<?php echo $halfsaree_data['sub_sub_cat_id']; ?>" <?php if(in_array($halfsaree_data['sub_sub_cat_id'],$halfsaree)){ echo "checked";  } ?> >
            <?php echo $halfsaree_data['sub_sub_cat_name']; ?>
           </div> 
        </a>
    <?php  }
$query = "select * from sub_sub_cat where subcat_id=26";
    $rs = mysql_query($query) or die("Error : ".mysql_error());
?>
<div class="title-category" subCat="<?php echo $row['sub_cat_id']; ?>" mainCat="<?php echo $row['cat_id']; ?>">
          <h4><?php  echo "Dress";?></h4>
          <span class="pull-right cart"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
          <div class="clearfix"></div>
          </div>
  <?php
  while($dress_data = mysql_fetch_assoc($rs)){

        ?>
        <a href="javascript:void(0);" class="">

            

            <div style="" class="showdetail-<?php echo $row['sub_cat_id']; ?>">
            <input type="checkbox" class="item_filter dress" value="<?php echo $dress_data['sub_sub_cat_id']; ?>" <?php if(in_array($dress_data['sub_sub_cat_id'],$dress)){ echo "checked";  } ?> >
            <?php echo $dress_data['sub_sub_cat_name']; ?>
           </div> 
            
        </a>
    <?php  }

$query = "select * from sub_sub_cat where subcat_id=27";
    $rs = mysql_query($query) or die("Error : ".mysql_error()); ?>

<div class="title-category" subCat="<?php echo $row['sub_cat_id']; ?>" mainCat="<?php echo $row['cat_id']; ?>">
          <h4><?php  echo "Lehenga";?></h4>
          <span class="pull-right cart"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
          <div class="clearfix"></div>
          </div>
<?php
    while($lehenga_data = mysql_fetch_assoc($rs)){

        ?>
        <a href="javascript:void(0);" class="">

            

           <input type="checkbox" class="item_filter lehenga" value="<?php echo $lehenga_data['sub_sub_cat_id']; ?>" <?php if(in_array($lehenga_data['sub_sub_cat_id'],$lehenga)){ echo "checked";  } ?> >
            <?php echo $lehenga_data['sub_sub_cat_name']; ?>
            
        </a>
    <?php  }

$query = "select * from sub_sub_cat where subcat_id=28";
    $rs = mysql_query($query) or die("Error : ".mysql_error()); ?>

<div class="title-category" subCat="<?php echo $row['sub_cat_id']; ?>" mainCat="<?php echo $row['cat_id']; ?>">
          <h4><?php  echo "Gown";?></h4>
          <span class="pull-right cart"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
          <div class="clearfix"></div>
          </div>

<?php
    while($gown_data = mysql_fetch_assoc($rs)){

        ?>
        <a href="javascript:void(0);" class="">

            

            <input type="checkbox" class="item_filter gown" value="<?php echo $gown_data['sub_sub_cat_id']; ?>" <?php if(in_array($gown_data['sub_sub_cat_id'],$gown)){ echo "checked";  } ?> >
            <?php echo $gown_data['sub_sub_cat_name']; ?>
            
        </a>
    <?php  }

?>

</div>

 <h4>Filter by color</h4>
                    <ul class="filter_color">
                    <?php getColor(); ?>
                    </ul>



                    <h4>Filter by size</h4><br/>
                    <ul class="filter_size">
                        <?php getSize(); ?>
                    </ul>

                <h4>Filter by price</h4><br/>
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

</div></div>

<?php include"includes/footer.php"; ?>


<?php
$query = "select * from sub_sub_cat s join products p on s.sub_sub_cat_id=p.sub_sub_cat_id limit 0,12";
//filter query start
if(!empty($saree)){
    $sareedata =implode("','",$saree);
    $query = "select * from sub_sub_cat s join products p on s.sub_sub_cat_id=p.sub_sub_cat_id where s.sub_sub_cat_id in('$sareedata') limit 0,12";
    //$query .= " ";
}
$rs = mysql_query($query) or die("Error : ".mysql_error());

while($product_data = mysql_fetch_assoc($rs)){  $pro_name=$product_data['product_name'];
   
}


if(!empty($halfsaree)){
    $sareedata =implode("','",$halfsaree);
    $query = "select * from sub_sub_cat s join products p on s.sub_sub_cat_id=p.sub_sub_cat_id where s.sub_sub_cat_id in('$halfsareedata') limit 0,12";
    //$query .= " ";
}
$rs = mysql_query($query) or die("Error : ".mysql_error());

while($product_data = mysql_fetch_assoc($rs)){  $pro_name=$product_data['product_name'];
   
}

if(!empty($dress)){
    $dressdata =implode("','",$dress);
    $query = "select * from sub_sub_cat s join products p on s.sub_sub_cat_id=p.sub_sub_cat_id where s.sub_sub_cat_id in('$dressdata') limit 0,12";
    //$query .= " ";
}
$rs = mysql_query($query) or die("Error : ".mysql_error());

while($product_data = mysql_fetch_assoc($rs)){  $pro_name=$product_data['product_name'];
   
}

if(!empty($lehenga)){
    $lehengadata =implode("','",$lehenga);
    $query = "select * from sub_sub_cat s join products p on s.sub_sub_cat_id=p.sub_sub_cat_id where s.sub_sub_cat_id in('$lehengadata') limit 0,12";
    //$query .= " ";
}
$rs = mysql_query($query) or die("Error : ".mysql_error());

while($product_data = mysql_fetch_assoc($rs)){  $pro_name=$product_data['product_name'];
   
}

if(!empty($gown)){
    $gowndata =implode("','",$gown);
    $query = "select * from sub_sub_cat s join products p on s.sub_sub_cat_id=p.sub_sub_cat_id where s.sub_sub_cat_id in('$gowndata') limit 0,12";
    //$query .= " ";
}
$rs = mysql_query($query) or die("Error : ".mysql_error());

while($product_data = mysql_fetch_assoc($rs)){  $pro_name=$product_data['product_name'];
   
}

}

$rs = mysql_query($query) or die("Error : ".mysql_error());
     
      while($product_data = mysql_fetch_assoc($rs)){
      

?>
 <p><strong><a href="#"><?php echo $product_data['product_name']; ?></a>
 </strong></p>
      <?php } ?>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

<script>
    $(function(){
        $('.item_filter').click(function(){
            var saree = multiple_values('saree');
            var halfsaree = multiple_values('halfsaree');
            var dress = multiple_values('dress');
            var lehenga = multiple_values('lehenga');
            var gown = multiple_values('gown');
            var url ="check_pro.php?saree="+saree+"&halfsaree="+halfsaree+"&dress="+dress+"&lehenga="+lehenga+"&gown="+gown;
            window.location=url;
        });

    });

    function multiple_values(inputclass){
        var val = new Array();
        $("."+inputclass+":checked").each(function() {
            val.push($(this).val());
        });
        return val.join('-');
    }


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

</script>

