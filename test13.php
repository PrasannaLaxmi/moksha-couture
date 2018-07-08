<?php
include "includes/db.php";
?>


<div class="container-fluid content-wrapper">
    <div class="row">
        <div class="col-sm-2 noLeftPadding">
            <div class="sidebar">
                <h2>Categories</h2>

                <?php getMainCart() ?>
            </div>
        </div>
        <div class="col-sm-9">
            <div id="products_box">
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
                        <p>$sub_cat_name/<b> Price: $ $pro_price </b>
                        <div class='btn-group btn-group-justified'>
                            <a href='details.php?id=$pro_id' class='btn btn-primary'>View</a>
                            <a class='btn btn-primary' href='index.php?add_cart=$pro_id'>Add To Cart</a>
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
            <div class='details'>view</div>
            </a>
          <h4>$pro_name</h4>
        <p>$sub_cat_name/<b> Price: $ $pro_price </b></a>
          <a href='index.php?add_cart=$pro_id'>Add to Cart</a>
      </div>
    ";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>





<?php
function getMainCart()
{
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
            $lastcat = $row['sub_cat_id']; ?>

<div class="main-category">
    <div class="title-category">
        <h4><?php  echo $row['sub_cat_name'];?></h4>
        <span class="pull-right cart"><i class="fa fa-angle-up" aria-hidden="true"></i></span>
        <div class="clearfix"></div>
    </div>
    <div class="show">
<?php


        }

?>

        <a class="type-category" href='products.php?id=<?php echo $lastcat;?>'>
            <input type="checkbox" name="<?php echo $lastcat;?>" value="<?php echo $row['sub_sub_cat_name'];?>"> <?php echo $row['sub_sub_cat_name'];?>
        </a>

        <?php




    }
}

?>




