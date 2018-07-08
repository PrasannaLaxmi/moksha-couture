<?php
include "db.php";
ini_set('display_errors',1);
error_reporting(E_ALL);

$secret_key = "5ad7afcfd2fc8fea1bb2d2d17ccfb98e";	 // Pass Your Registered Secret Key from EBS secure Portal
if(isset($_REQUEST)){
	 $response = $_REQUEST;
     $sh = $response['SecureHash'];	
     $params = $secret_key;
     ksort($response);
		    foreach ($response as $key => $value){
		        if (strlen($value) > 0 and $key!='SecureHash') {
				        $params .= '|'.$value;
			        }
		        }
				
    //$hashValue = strtoupper(md5($params));//for MD5
    //$hashValue = strtoupper(hash("sha1",$params));//for SHA1
    $hashValue = strtoupper(hash("sha512",$params));// for SHA512
  	 if($sh!=$hashValue)
		 echo "<center><h3>Hash validation Failed!</H3></center>";
}
?>
<HTML>
<HEAD>
<TITLE>E-Billing Solutions Pvt Ltd - Payment Page</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

</HEAD>

<?php
		foreach( $response as $key => $value) {
      if($key!='IsFlagged' and $key!='ResponseCode' and $key!='SecureHash'){
           if($key=='MerchantRefNo'){
//echo "<script>window.location='../receipt.php?id=$value'</script>;"

}



?>			
        
<!--         <?php echo $key; ?>
            <?php echo $value; ?>
-->
        </tr>
<?php
	}
else{
  echo "";
  }
}

$trans_id = $_POST['TransactionID'];
$bill_name = $_POST['BillingName'];
$bill_address = $_POST['BillingAddress'];
$bill_city = $_POST['BillingCity'];
$bill_state = $_POST['BillingState'];
$bill_code = $_POST['BillingPostalCode'];
$bill_country = $_POST['BillingCountry'];
$price = $_POST['Amount'];
$bill_phone = $_POST['BillingPhone'];
$bill_email = $_POST['BillingEmail'];
$ref_no = $_POST['MerchantRefNo'];
?>	


<div class="container" style="width:55em;border:1px solid grey;">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-left">
                <img src="../images/Moksha Logo.png" width="33px"  height="45px">
                <img src="../images/name.png" width="246px"  height="55px">
            </div>
            <div class="pull-right">
                <h6>ORDER CONFIRMATION</h6>
                <h5>TRANSACTION ID: <?php echo $trans_id; ?></h5>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <h4>Hello <?php echo $bill_name; ?>!</h4>
        <h5>Thank you for your order.</h5>
        <hr>
    </div>
<div class="col-sm-4 pull-left text-left" style="margin-right:90px;">
        <h5><strong>Your order will be sent to</strong></h5>
        <address>
            <strong><?php echo $bill_address; ?></strong><br>
            <?php echo $bill_city; ?>,<br>
            <?php echo $bill_state; ?>,<br>
            <?php echo $bill_code; ?>,<br>
            <?php echo $bill_country; ?>

            <!--<abbr title="Phone">P:</abbr> (123) 456-7890-->
        </address>
    </div>
</div>

<?php

$sql = "update users set phone ='$bill_phone', email ='$bill_email', uname ='$bill_name' where user_id =$ref_no";
$query = mysql_query($sql);
if($query){
$sql = "select * from products p join sub_cat s on p.sub_cat_id = s.sub_cat_id ";
$query = mysql_query($sql);
while($row=mysql_fetch_array($query)){
$pro_name = $row['product_name'];
$pro_date = $row['product_add_date'];
$pro_img1 = $row['product_img1'];
$sub_name = $row['sub_cat_name'];
}
}
else{
echo mysql_error();
}
?>
<h4>Order Details</h4>
    <hr>
<div class="row">
    <h5>TRANSACTION ID: <?php echo $trans_id; ?></h5>
    <h6>Placed on <?php echo $pro_date; ?></h6>
    <table class='table table-bordered cart'>
        <tbody>
        <tr>
            <td scope='row'><?php echo "<img src='../admin_area/product_images/$pro_img1' width='180' height='180' class='img-thumbnail' style='height:10em;' />"; ?></td scope='row'>
            <td>
                <p><?php echo $pro_name; ?></p>
                <p><?php echo $sub_name; ?></p>
                <p>sold by moksha</p>
            </td>
            <td><?php echo $price; ?></td>
        </tr>
        </tbody>
    </table>
</div>
</div>
<br/>





<div class='btn-group btn-group-justified det_btn'>
                            <a href=''onclick='myFunction()' class='btn btn-primary'>Print</a>
                            <a class='btn btn-primary' href='../products.php'>Continue Shopping</a>
                </div>
</div>
  
<script>
function myFunction() {
    window.print();
}
</script>

