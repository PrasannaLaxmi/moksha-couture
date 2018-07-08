<?php
include"../includes/db.php";
$merchant_ref_no = $_GET['id'];

echo $merchant_ref_no;

$sql="select * from users where user_id=$merchant_ref_no ";

$query = mysql_query($sql);

while($row=mysql_fetch_array($query)){
$cus_name = $row['uname'];
$cus_id = $row['user_id'];

echo $cus_name ;

}
?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<?php include "includes/header.php"; ?>
<br/>
<div class="container" style="width:55em;border:1px solid grey;">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-left">
                <img src="images/Moksha Logo.png" width="33px"  height="45px">
                <img src="images/name.png" width="246px"  height="55px">
            </div>
            <div class="pull-right">
                <h6>ORDER CONFIRMATION</h6>
                <h5>TRANSACTION ID: 123456789</h5>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <h4>Hello <?php echo $cus_name; ?>!</h4>
        <h5>Thank you for your order.</h5>
        <hr>
    </div>

    <div class="col-sm-4 pull-left text-left" style="margin-right:90px;">
        <h5><strong>Your order will be sent to</strong></h5>
        <address>
            <strong>MOKSHA COUTURE</strong><br>
            Phase 11,  8-2-293 / 82 / j / 119-A, Journalist colony,<br>
            Road no: 70, Jubilee Hills,<br>
            Hyderabad-500 033,<br>
            Telangana

            <!--<abbr title="Phone">P:</abbr> (123) 456-7890-->
        </address>
    </div>
</div>
    <h4>Order Details</h4>
    <hr>
<div class="row">
    <h5>TRANSACTION ID: 123456789</h5>
    <h6>Placed on Tuesday, November 28, 2017</h6>
    <table class='table table-bordered cart'>
        <tbody>
        <tr>
            <td scope='row'><img src='admin_area/product_images/traditional.jpg' class='img-thumbnail' style='height:10em;'></td scope='row'>
            <td>
                <p>product name</p>
                <p>card</p>
                <p>sub category name</p>
                <p>sold by moksha</p>
            </td>
            <td>price</td>
        </tr>
        </tbody>
    </table>
</div>
</div>
<br/>
<button onclick="print()" class="btn btn-primary" style="margin-left:50%;">Print</button>
<?php include "includes/footer.php"; ?>
