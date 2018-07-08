<?php
$flag=1;




?>



<?php include"includes/header.php"; 

$cid=$_SESSION['user_id'];
echo $cid;
$cname=$_SESSION['usernamec'];
echo $cname;

$sum = $_GET['sum'];

if(!empty($cname)){
$get_drop = "select * from users ";
$run_get_drop = mysql_query($get_drop);

while($row_pro=mysql_fetch_array($run_get_drop)) {
    $cus_mob = $row_pro['phone'];
    $cus_mail = $row_pro['email'];
    $cus_name = $row_pro['uname'];

    $cus_status = $row_pro['customer_status'];
$_SESSION['customer_status'] = $row_pro['customer_status'];
}
}
else{
echo"";
}

?>
<div class="row" style="padding:60px;">
    <div class="col-md-6" style="border:1px solid lightgrey;box-sizing: border-box;padding:25px;height:464px;">
        <h4>PERSONAL DETAILS</h4>
        <form method="post" action="payment/submit.php" name="frmTransaction" id="frmTransaction" >
            <input type="email"class="form-control"name="email" id="email" placeholder="Enter your email" value="<?php echo $cus_mail; ?>" required/ >
            <input type="text"class="form-control"name="phone" id="phone" placeholder="Enter your phone number" value="<?php echo $cus_mob; ?>" required/>
            <br/>


        <div class="deliver_address">
            <h4>DELIVERY ADDRESS</h4>
            <input type="text" name="ship_name" id="ship_name" value="<?php echo $cname; ?>" placeholder="Name"class="form-control" />
            <input type="text" name="ship_phone" id="ship_phone" placeholder="Phone"class="form-control" />
            <input type="text" name="ship_address" id="ship_address" placeholder="Ship Address"class="form-control" />
            <input type="text" name="ship_postal_code" id="ship_postal_code" placeholder="Pin Code" class="form-control"  />
            <input type="text" name="ship_country" id="ship_country" placeholder="Country" class="form-control" />
            <input type="text" name="ship_city" id="city" placeholder="Town/City"class="form-control" />
            <input type="text" name="ship_state" id="ship_state" placeholder="State"class="form-control" />
        </div>

    </div>


    <div class="col-md-6" style=" border:1px solid lightgrey;box-sizing: border-box;padding:25px;height:464px;">
        <h4>BILLING ADDRESS</h4>
        <input type="text" name="name" value="<?php echo $cname; ?>" id="name" placeholder="Full Name"class="form-control"required />
        <input type="text" name="postal_code" id="postal_code" placeholder="Pin Code"class="form-control"required />
         <select name="ship_country" class="form-control" required>
          <option value="IND">IND</option>
          <option value="AUS">AUS</option>
          <option value="USA">USA</option>
         </select>
        <!-- <input type="text" name="country" id="country" placeholder="Country"class="form-control"required /> -->
        <input type="text" name="address" id="address" placeholder="Address"class="form-control"/>
        <input type="text" name="city" id="city" placeholder="Town/City"class="form-control"required />
        <input type="text" name="state" id="state" placeholder="State"class="form-control"required />
        <label>Are the billing address and delivery address same ?</label>
        <input type="checkbox" class="answer">No
    </div>
</div>

<div>


    <input name="channel" type="hidden" id="channel" value="0"class="form-control"/>
    <input name="account_id" id="account_id" type="hidden" value="24411"class="form-control"/>
    <input name="reference_no" id="reference_no" type="hidden" value="<?php echo $cid;?>"class="form-control"/>
    <input name="amount" type="hidden" id="amount" value="<?php echo $sum; ?>"class="form-control"/>
    <input name="mode" type="hidden" id="mode" value="TEST"class="form-control"/>
    <input name="currency" type="hidden" id="currency" value="INR"class="form-control"/>
    <input name="return_url" type="hidden" id="return_url" value=" https://mokshacouture.com/payment/response.php "class="form-control"/>
    <input name="description" type="hidden"  id="description" value="something"class="form-control"/>
    <input type="hidden"class="form-control"name="display_currency"  id="display_currency" value="INR" required/>
    <input type="hidden"class="form-control"name="country" id="country" value="IND" required/>
    <input type="hidden"class="form-control"name="address" id="address" value="abcd" required/>
    <input class="btn btn-primary center-block" onclick="display()" type="submit" class="form-control"/>

   

    </form>

</div>		<!--
		<div class="box_check">
		<h2>Enter a new delivery address</h2>
			<form method="post" action="check_out.php">
				<label>Full Name:</label><br/>
				<input type="text" name="uname"  class="email1" required /><br/>
				<label>Phone Number:</label><br/>
				<input type="text" name="phone"  class="email1" required /><br/>
				<label>Pin Code:</label><br/>
				<input type="text" name="pin"  class="email1" required />
				<label>Flat / House No. / Floor / Building: </label><br/>
				<input type="text" name="flat"  class="email1" required />
				<label>Colony / Street / Locality: </label><br/>
				<input type="text" name="locality"  class="email1" required />
				<label>Landmark:(optional) </label><br/>
				<input type="text" name="landmark"  class="email1" />
				<label>Town/City:  </label><br/>
				<input type="text" name="city"  class="email1" required />
				<label>State: </label><br/>
				<input type="text" name="state"  class="email1" required />
				<label style="font-weight:bold;">Additional Address: </label><br/>
				<label>Add another address</label>
				<input type="text" name="add_add"  class="email1"  />
				<input type="submit" class="btn" value="Submit">--> <!-- End Btn -->
<!--</form><br/><br/><br/><br/>

</div> -->





<?php include"includes/footer.php"; ?>

</body>
</html>
<style>

    #footer {
        width: 100%;
        background: #202020;
        height: relative;
        margin-top: 2.6%;
        color: white;
        font-family: calibri;
        height: 80px;
    }

    input:not([type]), input[type="email" i], input[type="number" i], input[type="password" i],
    input[type="tel" i], input[type="url" i], input[type="text" i] {
        padding: 1px 15px;
    }

</style>
<script>
$(".deliver_address").hide();
$(".answer").click(function() {
if($(this).is(":checked")) {
$(".deliver_address").show();
} else {
$(".deliver_address").hide();
}
});

</script>
<script type="text/javascript">
    function submit(){
details = "5ad7afcfd2fc8fea1bb2d2d17ccfb98e"+" "+document.getElementById('account_id').value
+" "+document.getElementById('address').value+" "+document.getElementById('amount').value
+" "+document.getElementById('channel').value+" "+document.getElementById('city').value
+" "+document.getElementById('country').value+" "+document.getElementById('currency').value
+" "+document.getElementById('description').value+" "+document.getElementById('display_currency').value
+" "+document.getElementById('email').value+" "+document.getElementById('mode').value
+" "+document.getElementById('name').value+" "+document.getElementById('phone').value
+" "+document.getElementById('postal_code').value+" "+document.getElementById('reference_no').value
+" "+document.getElementById('return_url').value+" "+document.getElementById('ship_address').value
+" "+document.getElementById('ship_address').value+" "+document.getElementById('ship_city').value
+" "+document.getElementById('ship_country').value+" "+document.getElementById('ship_name').value
+" "+document.getElementById('ship_phone').value+" "+document.getElementById('ship_postal_code').value
+" "+document.getElementById('ship_state').value+" "+document.getElementById('state').value;
alert(details);
}


function display(){
var display_name = document.getElementById('name').value;
var display_email = document.getElementById('email').value;
var display_phone = document.getElementById('phone').value;
var get_name = localStorage.setItem("display_name",display_name);
var get_email = localStorage.setItem("display_email",display_email);
var get_phone = localStorage.setItem("display_phone",display_phone);
alert(localStorage.getItem("display_email"));
alert(localStorage.getItem("display_name"));
alert(localStorage.getItem("display_phone"));
}
</script>


