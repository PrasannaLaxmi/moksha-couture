<div id="bodyright">
<div class="row">

<h3 style="color:black;margin-top:1.3%">Add Coupon </h3>
<form method="post" >
<div class="col-sm-3 add_product">

<label style="margin-left: 3%;padding-bottom:px;">Coupon Name</label><br/>
<label style="margin-left: 3%;padding-bottom:3px;">Code</label><br/>
<label style="margin-left: 3%;padding-bottom:7px;">Type </label><br/>
<label style="margin-left: 3%;padding-bottom:8px;">Discount </label><br/>
<label style="margin-left: 3%;padding-bottom:5px;">Total Amount </label><br/>
<label style="margin-left: 3%;padding-bottom:1px;">Customer Login</label><br/>
<label style="margin-left: 3%;padding-bottom:16px;">Free Shipping</label><br/>
<label style="margin-left: 3%;padding-bottom:2px;">Products </label><br/>
<label style="margin-left: 3%;padding-bottom:2px;">Category </label><br/>
<label style="margin-left: 3%;padding-bottom:4px;">Date Start </label><br/>
<label style="margin-left: 3%;padding-bottom:4px;">Date End </label><br/>
<label style="margin-left: 3%;padding-bottom:5px;">Uses Per Coupon</label><br/>
<label style="margin-left: 3%;padding-bottom:1px;">Uses Per Customer</label><br/>
<label style="margin-left: 3%;padding-bottom:1px;">Status </label><br/>

</div>
<div class="col-md-6 add_pro_input">

<label style=""><input style="width:35em;" class="form-control" type="text" name="coupon_name" value="<?php echo isset($_POST['coupon_name']) ? $_POST['coupon_name'] : ''?>"></label><br/>
<label style=""><input style="width:35em;" class="form-control" type="text" name="code" value="<?php echo isset($_POST['code']) ? $_POST['code'] : ''?>"></label><br>
<label style=""><select style="width:35em;" class="form-control" name="type"><option value="Percentage">Percentage</option>
<option value="FixedAmount">Fixed Amount</option></select></label><br>
<label style=""><input style="width:35em;" class="form-control" type="text" name="discount" value="<?php isset($_POST['discount']) ? $_POST['discount'] : ''?>"></label><br>
<label style=""><input style="width:35em" class="form-control" type="text" name="totalamount" value="<?php isset($_POST['totalamount']) ? $_POST['totalamount'] : ''?>"></label><br><br>
<label class="radio-inline">
<input type="radio" name="customerlogin" value="Yes">Yes
</label>
<label class="radio-inline">
<input type="radio" name="customerlogin" value="No" checked>No
</label><br/><br>
<label class="radio-inline">
<input type="radio" name="freeshipping" value="Yes">Yes
</label>
<label class="radio-inline">
<input type="radio" name="freeshipping" value="No" checked>No
</label><br/><br>
<label style=""><input style="width:35em;" class="form-control" type="text" name="products" value="<?php isset($_POST['products']) ? $_POST['products'] : ''?>"></label><br>
<label style=""><input style="width:35em;" class="form-control" type="text" name="category" value="<?php echo isset($_POST['category']) ? $_POST['category'] : ''?>"></label><br>
<label style=""><input  style="width:35em;" class="form-control"  name="datestart" id="date" type="date" value="<?php echo date("m/d/Y");?>"></label><br>
<label style=""><input style="width:35em;" class="form-control" type="date" name="dateend" id="date" value="<?php echo date("m/d/Y");?>"></label><br>
<label style=""><input style="width:35em;" class="form-control" type="text" name="userpercoupon" value="1"></label><br>
<label style=""><input style="width:35em;"" class="form-control" type="text" name="userpercustomer" value="1"></label><br>
<label style=""><select style="width:35em;" class="form-control" name="couponstatus"><option value="Enabled">Enabled</option>
<option value="Disabled">Disabled</option></select>

</div>
















<center><button style='color:white;' name="add_coupon">Add Coupon</button>
</center>
</form>
</div>
<script>
var dateControl = document.querySelector('input[type="date"]');
dateControl.value = 'date("Y/m/d")';
</script>
<?php 
include 'inc/function.php';
 echo add_coupon();
?></div>