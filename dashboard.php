<div id="bodyright">
<h3 style="color:black;font-size:20px;">Dashboard</h3>
<form method="post" enctype="multipart/form-data">
<table style="border-bottom:1px solid #A9A9A9;"></table>
<div id="dashboard">
<table>
<tr>
<th colspan="2">Overview  -  October</th>
</tr>
<tr><td>Total Sales</td><td style="padding-left: 40%;"><?php include 'inc/database.php';
?></td></tr>
<tr><td>Total Sales This Month</td><td style="padding-left: 40%;"><?php ?></td></tr>
<tr><td>Total Orders</td><td style="padding-left: 40%;"><?php include 'inc/database.php';
$sql = "SELECT count(order_id) count FROM orders";
$result = $conn->query($sql);
if($row = $result->fetch_assoc())
{
echo $row['count'];
}?></td></tr>
<tr><td>No of Customers</td><td style="padding-left: 40%;"><?php 
$sql = "SELECT count(customer_id) count FROM customers";
$result = $conn->query($sql);
if($row = $result->fetch_assoc())
{
echo $row['count'];
}?></td></tr>
<tr><td>Orders Pending</td><td style="padding-left: 40%;">
<?php 
$sql = "SELECT count(order_id) count FROM orders where order_status='Completed'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc())
{
echo $row['count'];
}?></td></tr>
<tr><td>Orders Pending</td><td style="padding-left: 40%;">
<?php 
$sql = "SELECT count(order_id) count FROM orders where order_status!='Completed'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc())
{
echo $row['count'];
}?></td></tr>

</table>

</div>
<div id="dashboardright">
<table>
<tr>
<th>Statistics</th>
</tr>
<tr height="312"><td>
<div  style=" margin-top: -13%;margin-left: 6%;height: 65%;"><img style="height: 133%;width:90%" src="../admin_area/images/graph1.png"></img></div>


</td></tr>
</table>
</div>



<div id="dashboarddown">
<table>

<tr>
<th>Last 5 Orders</th>
</tr>
 <tr height='300'>
    <td><div id="dtable">
    <table border='1'>
    <tr>
    <th class="subject">Order ID</th><th>Customer</th>
    <th>Status</th><th>Date Added</th>
    <th>Total</th><th>Actions</th>
    </tr>
  <?php
  include 'inc/function.php';
  echo view_all_dashorders();?>
    </table>
   </div>
    </td>
  </tr>
</table>
</div>



</form>
</div>
<style>
.subject
{
width:8%;
}

</style>

