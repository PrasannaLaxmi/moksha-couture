<?php
include"includes/db.php";
$flag=0;
$sql="select * from products where product_priority=High";
$query = mysql_query($sql);
while($row=mysql_fetch_array($query)){
    $pro_img1 = $row['product_img1'];
}
$sql="select * from products where product_priority='High'";
$query = mysql_query($sql);
while($row=mysql_fetch_array($query)){
    $pro_img2 = $row['product_img1'];
}
$sql="select * from products where product_priority='High'";
$query = mysql_query($sql);
while($row=mysql_fetch_array($query)){
    $pro_img3 = $row['product_img1'];
}

$sql="select * from users";
$run=mysql_query($sql);
while($row_pro=mysql_fetch_array($run)){
    $name = $row_pro['uname'];

}
?>

<?php include "includes/header.php"; ?>
    <!-- Header Component -->

    <section>
        <div id="carouselFade" class="carousel slide carousel-fade" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="carousel-caption">
                        <a type="button" class="btn btn-primary pull-right" href="products.php" id="shop_btn">SHOP NOW</a>

                    </div>
                </div>
                <div class="item">
                    <div class="carousel-caption">

                        <a type="button" class="btn btn-primary pull-right" href="products.php" id="shop_btn">SHOP NOW</a>
                    </div>
                </div>
                <div class="item">
                    <div class="carousel-caption">

                        <a type="button" class="btn btn-primary pull-right" href="products.php" id="shop_btn">SHOP NOW</a>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carouselFade" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="left:15px;"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carouselFade" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="right:15px;"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </section>
    <section class="spacer2">
        <div class="container">
            <h1 class="section-header">Welcome to Moksha</h1>
        </div>
        <div class="container fadeInUp">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="panel panel-default about-panel shadow">
                        <div class="panel-body">
                               <p>
                                Moksha Couture Line of clothing is all about elegance in traditional Indian wear.
                                It is an adorable collection of fresh designs with a hint of classics.

                            </p>
                            <p>
                                We at Moksha, work on customized orders for Bridal Sarees, Engagement Lehengas, Anarkalis and sarees for your special occasion.
                                Embracing your elegance since 2012, we give you the most memorable and lovely experience in creating your perfect look on your special day.
                            </p>
                            <button class="btn btn-primary" ><a style="color:white;text-decoration: none;" href="about.php">Read More</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="spacer2">
        <div class="container banner">
            <h1 class="section-header">Trendings</h1>
        </div>
        <div class="container banner-block fadeInUp">
            <div class="row">
                <ul class="trendings">
                    <li class="col-sm-4">
                        <div class="trend-box">
                            <?php echo "<img src='admin_area/product_images/$pro_img1' class='img-responsive img-thumbnail'>"; ?>
                        </div>
                    </li>
                    <li class="col-sm-4">
                        <div class="trend-box">
                            <?php echo "<img src='admin_area/product_images/$pro_img2' class='img-responsive img-thumbnail'>"; ?>
                        </div>
                    </li>
                    <li class="col-sm-4">
                        <div class="trend-box">
                            <?php echo "<img src='admin_area/product_images/$pro_img3' class='img-responsive img-thumbnail'>"; ?>
                        </div>
                    </li>
                </ul>
                <button class="btn btn-primary pull-right" ><a style="color:white;text-decoration: none;" href="products.php">More.</a></button>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!--<section class="spacer5">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <address>
                        <strong>Twitter, Inc.</strong><br>
                        1355 Market Street, Suite 900<br>
                        San Francisco, CA 94103<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                </div>
                <div class="col-sm-8">
                    <div id="googleMap" style="width:100%;height:400px;"></div>
                </div>
            </div>
        </div>
    </section>-->
   <?php include "includes/footer.php"; ?>
    <!-- Ends -->
