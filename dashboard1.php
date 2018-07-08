<div id="bodyright">
<h3 style="color:black;margin-top:1.3%;font-size:20px;">Dashboard</h3>
<form method="post" enctype="multipart/form-data">
<table style="border-bottom:1px solid #A9A9A9;margin-top:1%;"></table>
<div id="dashboard">
<table>
<tr>
<th colspan="2">Overview  -  
<?php 
$monthname=date('F');
$monthnumber=date('n');
echo $monthname;
?></th>
</tr>
<tr><td>Total Sales Till Date</td><td style="padding-left: 40%;"><?php include 'inc/database.php';
$sql = "SELECT count(order_id) count from orders";
$result = $conn->query($sql);
if($row = $result->fetch_assoc())
{
    echo $row['count'];
}
?></td></tr>
<tr><td>Total Sales This Month</td><td style="padding-left: 40%;"><?php 

$sql = "SELECT count(order_id) count from orders where Month(date)='$monthnumber'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc())
{
echo $row['count'];
}
?></td></tr>
<tr><td>Total Orders</td><td style="padding-left: 40%;"><?php include 'inc/database.php';
$sql = "SELECT count(order_id) count FROM orders where Month(date)='$monthnumber'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc())
{
echo $row['count'];
}?></td></tr>
<tr><td>No of Customers</td><td style="padding-left: 40%;"><?php 
$sql = "SELECT count(customer_id) count FROM customers ";
$result = $conn->query($sql);
if($row = $result->fetch_assoc())
{
echo $row['count'];
}?></td></tr>
<tr><td>Orders Pending</td><td style="padding-left: 40%;">
<?php 
$sql = "SELECT count(order_id) count FROM orders where order_status!='Completed' and  Month(date)='$monthnumber'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc())
{
echo $row['count'];
}?></td></tr>
<tr><td>Orders Completed</td><td style="padding-left: 40%;">
<?php 
$sql = "SELECT count(order_id) count FROM orders where order_status='Completed' and Month(date)='$monthnumber'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc())
{
echo $row['count'];
}?></td></tr>
<tr><td colspan='2'><div id='d'><button><a href="index.php?show_year">Year</a></div></button>
</td></tr>
</table>

</div>
<div id="dashboardright">
<table>
<tr>
<th>Statistics - <?php 
$monthnumber=date('F');
echo $monthname;
?></th>
</tr>
<tr height="362"><td>
<div class="graph-info">
		<!-- a href="javascript:void(0)" class="visitors">Revenue</a>
		<a href="javascript:void(0)" class="returning">No of orders</a>
 -->
		
	</div>
	 <div id="chart-container"><canvas id="mycanvas"></canvas></div>
	  <script src="js/jquery-3.2.1.min.js"></script>
	  <script src="js/fusioncharts.js"></script>
	  <script src="js/fusioncharts.charts.js"></script>
	    <script type="text/javascript" src="js/Chart.min.js"></script>
	  <script src="js/fusioncharts.zoomscatter.js"></script>
	  <script src="https://cdn.ovo.ua/pub/fusioncharts/themes/fusioncharts.theme.zune.js"></script> 
	  <script src="/mokshaa/js/app1.js"></script>

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
<style>
#d button
{


    float: left;
    margin-top: 1%;
    margin-left: 30%;
    color: white;
    text-decoration: none;
    font-weight: 15px;
    background: #202020;
    padding: 10px;
    border-radius: 5px;
}


#d button:hover {
  background: white;
color:black;
  
}
#d button a
{
color:white
}
#d button a:hover
{
color:black;
} 
</style>

