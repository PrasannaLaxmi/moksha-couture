<div class="row">
 <div class="body-left">
  <div class="col-sm-2 menu" style="margin-left:0px;margin-top:0px;padding:30px;height:57em;background: #1a1a1a;">
   <ul class="page-links links">
    <li><a href="index.php?dashboard" onclick="clearlocalstorage()">DASHBOARD</a></li>
    <li><a href="index.php?viewall_cat" onclick="clearlocalstorage()" >CATEGORIES</a></li>
    <li><a href="index.php?viewall_products" onclick="clearlocalstorage()">PRODUCTS</a></li>
    <li><a href="index.php?coupons" onclick="clearlocalstorage()">OFFERS</a></li>
    <li><a href="index.php?taxbillinfo" onclick="clearlocalstorage()">TAX/BILL INFO</a></li>
 <li>   
<div class="dropmenu">
<a onclick="myFunction(this);" class="button1" onclick="clearlocalstorage()">ORDERS</a>
  <div id="Dropdown1" class="dropmenu-content">
 <a class="btn "  data-popup-open="popup-1" href="index.php?orders" onclick="clearlocalstorage()">-RECEIVED</a><br/>
<a  class="btn"  data-popup-open="popup-1" href="index.php?completedorders" onclick="clearlocalstorage()">-COMPLETED</a>
  </div>
</div>
</li>
<li>
<div class="dropmenu">
<a onclick="myFunction(this);" class="button1" onclick="clearlocalstorage()" >PROMOTION</a>
  <div id="Dropdown3" class="dropmenu-content">
      <a class="btn"  data-popup-open="popup-2" href="index.php?bulk" onclick="clearlocalstorage()">-BULK</a><br/>
<a  class="btn"  data-popup-open="popup-2" href="index.php?selective" onclick="clearlocalstorage()">-SELECTIVE</a>
  </div>
</div>
</li>
<li>
<div class="dropmenu">
<a onclick="myFunction(this);" class="button1" onclick="clearlocalstorage()">CUSTOMERS</a>
  <div id="Dropdown2" class="dropmenu-content">
   <a class="btn"  data-popup-open="popup-3" href="index.php?admin_customers" onclick="clearlocalstorage()">-REGISTERED</a><br/>
<a  class="btn"  data-popup-open="popup-3" href="index.php?admin_guestcustomers" onclick="clearlocalstorage()">-GUEST</a>
  </div>
</div>
</li>
<li>
<div class="dropmenu">
<a href="index.php?admin_accounts" onclick="clearlocalstorage()">ADMIN ACCOUNT</a><br/>
  <div id="Dropdown4" class="dropmenu-content">

  </div>
<li><a href="https://sso.godaddy.com/?app=email&realm=pass" onclick="clearlocalstorage()">EMAIL LOGIN</a></li>
</div>
</li>
   </ul>
  
</div>
</div>






<!--<div id="bodyleft">
<ul>
<li><a href="index.php?dashboard" onclick="clearlocalstorage()">Dashboard</a></li>
<li><a href="index.php?viewall_cat" onclick="clearlocalstorage()" >Categories</a></li>
<li><a href="index.php?viewall_products" onclick="clearlocalstorage()">Products</a></li> -->
<!-- <li><a href="index.php?orders">Orders</a></li>  -->
<!--
<li><a href="index.php?coupons" onclick="clearlocalstorage()">Offers</a></li>-->
<!-- <li><a href="index.php?admin_customers">Customers</a></li> -->
<!--
<li><a href="index.php?taxbillinfo" onclick="clearlocalstorage()">Tax/Bill Info</a></li>
<li>
<div class="dropmenu">
<a onclick="myFunction(this);" class="button1" onclick="clearlocalstorage()">Orders</a>
  <div id="Dropdown1" class="dropmenu-content">
 <a class="btn"  data-popup-open="popup-1" href="index.php?orders" onclick="clearlocalstorage()">-Receieved</a>
<a  class="btn"  data-popup-open="popup-1" href="index.php?completedorders" onclick="clearlocalstorage()">-Completed</a>
  </div>
</div>
<div class="dropmenu">
<a onclick="myFunction(this);" class="button1" onclick="clearlocalstorage()" >Promotion</a>
  <div id="Dropdown3" class="dropmenu-content">
      <a class="btns"  data-popup-open="popup-2" href="index.php?bulk" onclick="clearlocalstorage()">-Bulk</a>
<a  class="btn"  data-popup-open="popup-2" href="index.php?selective" onclick="clearlocalstorage()">-Selective</a>
  </div>
</div>
<div class="dropmenu">
<a onclick="myFunction(this);" class="button1" onclick="clearlocalstorage()">Customers</a>
  <div id="Dropdown2" class="dropmenu-content">
   <a class="btns"  data-popup-open="popup-3" href="index.php?admin_customers" onclick="clearlocalstorage()">-Registered</a>
<a  class="btn"  data-popup-open="popup-3" href="index.php?admin_guestcustomers" onclick="clearlocalstorage()">-Guest</a>
  </div>
</div>
<div class="dropmenu">
<a href="index.php?admin_accounts" onclick="clearlocalstorage()">Admin Account</a>
<a href="https://sso.godaddy.com/?app=email&realm=pass" onclick="clearlocalstorage()">Email Login</a>
  <div id="Dropdown4" class="dropmenu-content">

  </div>
</div>-->
</li>
<style>
.dropmenu-content {
  display: none;
}

.dropmenu-content.show {
  display: block;
  padding-left:4%;
    border-radius:4%;
}
.dropmenu a
{
  padding-bottom: 4%;
}
.dropmenu a:hover
{
cursor:pointer;
}
</style>
</head>
<body>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
window.myFunction = function(e) 
    {
	  var dropdown = e.parentNode.getElementsByClassName('dropmenu-content')[0];
	  dropdown.classList.toggle('show');
	}

window.onclick = function(event) {
	  if (!event.target.matches('.button1')) {

	    var dropdowns = document.getElementsByClassName("dropmenu-content");
	    var i;
	    for (i = 0; i < dropdowns.length; i++) {
	      var openDropdown = dropdowns[i];
	      if (openDropdown.classList.contains('show')) {
	        openDropdown.classList.remove('show');
	      }
	    }
	  }
	}

 function clearlocalstorage()
 {
	localStorage.removeItem("visit");
 }

</script>



</ul>
</div>
<?php 
if(isset($_GET['viewall_cat']))
{
include 'cat.php';
}
if(isset($_GET['viewall_sub_cat']))
{
    include 'sub_cat1.php';
}
if(isset($_GET['add_products']))
{
    include 'products.php';
}
if(isset($_GET['add_sub_cat']))
{
    include 'add_sub_cat.php';
}
if(isset($_GET['add_category']))
{
    include 'add_category.php';
}
if(isset($_GET['viewall_products']))
{
    include 'view_all_products1.php';
}
if(isset($_GET['admin_accounts']))
{
    include 'admin_account.php';
}
if(isset($_GET['admin_customers']))
{
    include 'customers.php';
}
if(isset($_GET['admin_guestcustomers']))
{
    include 'guestcustomers.php';
}
if(isset($_GET['offers']))
{
    include 'offers.php';
}
if(isset($_GET['orders']))
{
    include 'orders.php';
}
if(isset($_GET['orders1']))
{
    include 'orders1.php';
}
if(isset($_GET['completedorders']))
{
    include 'completedorders.php';
}
if(isset($_GET['coupons']))
{
    include 'coupons.php';
}
if(isset($_GET['dashboard']))
{
    include 'dashboard1.php';
}
if(isset($_GET['add_coupon']))
{
    include 'add_coupon.php';
}
if(isset($_GET['viewall_history']))
{
    include 'viewall_history1.php';
}
if(isset($_GET['bulk']))
{
    include 'bulk.php';
}
if(isset($_GET['selective']))
{
    include 'selective.php';
}
if(isset($_GET['edit_orderstatus']))
{
    include 'edit_orderstatus.php';
}
if(isset($_GET['edit_orderstatuss']))
{
    include 'edit_orderstatuss.php';
}
if(isset($_GET['edit_orderstatus1']))
{
    include 'edit_orderstatus1.php';
}
if(isset($_GET['edit_orderstatuss1']))
{
    include 'edit_orderstatuss1.php';
}
if(isset($_GET['taxbillinfo']))
{
    include 'taxbillinfo.php';
}
if(isset($_GET['viewall_taxbillinfo']))
{
    include 'viewall_taxbillinfo.php';
}
if(isset($_GET['add_sub_sub_cat']))
{
    include 'add_sub_sub_cat.php';
}
if(isset($_GET['viewall_sub_sub_cat']))
{
    include 'sub_sub_cat1.php';
}
if(isset($_GET['show_year']))
{
    include 'dashboard2.php';
}
?>