<form method="post" action="https://secure.ebs.in/pg/ma/sale/pay" name="frmConfirm" >
<!--?
$user_name="Your User Name"; 
$user_address="Your Address"; 
$user_zipcode="Your City Pin code"; 
$user_city="Your City"; 
$user_state="Your State"; 
$user_country="Your Country"; 
$user_phone="Your Phone Number"; 
$user_email="Your Email"; 
$user_id="Your User ID"; 
$modelno="Model No of Product on Website"; 
$key="Your EBS Key"; 
$account_id="Your EBS Account ID"; 
$finalamount=20000; //Amount of Order 
$order_no="123456"; /Order No on Website 
$return_url="http://mention your website return url/response.php?DR={DR}"; 
$mode="TEST"; 
$hash = $key."|".$account_id."|".$finalamount."|".$order_no."|".$return_url."|".$mode; 
$secure_hash = md5($hash); ?-->
 
?-->
 
<input name="account_id" value="<?php" echo="" $account_id;="" ?="" type="hidden"> />
<input name="return_url" size="60" value="<?php echo  $return_url; ?>" type="hidden">
<input name="mode" size="60" value="TEST" type="hidden">
<input name="reference_no" value="<?php echo $order_no; ?>" type="hidden">
<input name="description" value="<?php echo $modelno; ?>" type="hidden">
<input name="name" maxlength="255" value="<?php echo $user_name; ?>" type="hidden">
<input name="address" maxlength="255" value="<?php echo $user_address; ?>" type="hidden">
<input name="city" maxlength="255" value="<?php echo $user_city; ?>" type="hidden">
<input name="state" maxlength="255" value="<?php echo $user_state; ?>" type="hidden">
<input name="postal_code" maxlength="255" value="<?php echo $user_zipcode; ?>" type="hidden">
<input name="country" maxlength="255" value="<?php echo $user_country; ?>" type="hidden">
<input name="phone" maxlength="255" value="<?php echo $user_phone; ?>" type="hidden">
<input name="email" size="60" value="<?php echo $user_email; ?>" type="hidden">
<input name="secure_hash" size="60" value="<? echo $secure_hash; ?>" type="hidden">
<input name="amount" id="amount" readonly="" value="<?php echo $finalamount; ?>" type="hidden">
 
<p>Your transaction will not be billed yet.</p>
<input value="Place an Order" id="submit" name="submit" type="submit">
</form>