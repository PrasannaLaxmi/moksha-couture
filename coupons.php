<div id="bodyright">
<h3 style="color:black;margin-top:1.3%">Coupon</h3>
<div id="rightts">
<button><a  href='index.php?add_coupon'>Add Coupon</a></button>
</div>
<form method="post" enctype="multipart/form-data">
<table id="scroll" style='border-top:1px solid #A9A9A9;margin-top:1%'>
<tr>
<th>Coupon Name</th>
<th>Code</th>
<th>Discount</th>
<th>Date Start</th>
<th>Date End</th>
<th>Status</th>
<th>Action</th></tr>
<style>

</style>
<?php include 'inc/function.php';
echo viewall_coupons();?>
</table>
</form>

</div>

 <style>

 


#rightts  button 
{


    float: left;
    margin-top: -40px;
    margin-left: 75%;
    
    text-decoration: none;
    font-weight: 15px;
    background: #202020 ;
    padding: 10px;
    border-radius: 7px;"

}
#rightts  button:hover {
  background-color: white;

}
	
#rightts button a
{
 text-decoration: none;
 color:white;
}
#rightts button a:hover
{
 color:black;
}
a
{
text-decoration:none;
color:black;
}
	</style>
