<div id="bodyright">
<h3 style="color:black;  margin-bottom: 1.8%;margin-top:1.3%;">Completed Orders</h3>


<?php //include 'inc/function.php';
//echo viewall_completedorders();
include 'inc/database.php';
if(isset($_GET['completedorders']))
{
    $order_id=$_GET['completedorders'];
    if(!empty($order_id))
    {
        $sql = "SELECT * FROM orders o join customers c on o.customer_id=c.customer_id join products p on p.product_id=o.product_id where o.order_id='$order_id' and order_status='Completed' ORDER BY c.Name ASC ";
        
        
    }
    else
    {
        $sql = "SELECT * FROM orders o join customers c on o.customer_id=c.customer_id join products p on p.product_id=o.product_id and order_status='Completed' ORDER BY c.Name ASC ";
        
    }
    $result = $conn->query($sql);
    $i=1;
    if ($result->num_rows > 0)
    {
        ?>
        <table id="scrolls"  width="100%" style='border-top:1px solid #A9A9A9;margin-top:1%'>
<tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<th scope="col" width="4%">S.No</th>
<th scope="col" colspan="2" width="8%">Customer Name</th>
<th scope="col" colspan="2" width="4%">Order ID</th>
<th scope="col" colspan="2" width="5%">Product ID</th>
<th scope="col" colspan="2" width="8%">Product Name</th>
<th scope="col" colspan="2" width="6%">Mobile</th>
<th scope="col" colspan="2" width="12%">Email</th>
<th scope="col" colspan="2" width="8%">Billing Address</th>
<th scope="col" colspan="2" width="4%">Quantity</th>
<th scope="col" colspan="2" width="4%">Price</th>
<th scope="col" colspan="2" width="6%">Payment</th>
<th scope="col" colspan="2">Date</th>
</tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        <?php 
       
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>",$i,"</td>";
            echo "<td scope='col' colspan='2'>",$row['Name'],"</td>"; 
            echo "<td scope='col' colspan='2'>",$row['order_id'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['product_id'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['product_name'],"</td>";
            //echo "<td>
              
             // <img src='../images/product_images/".$row['product_img1']."'/>
             // <img src='../images/product_images/".$row['product_img2']."'/>
             // <img src='../images/product_images/".$row['product_img3']."'/>
             // <img src='../images/product_images/".$row['product_img4']."'/>
              //<img src='../images/product_images/".$row['product_img5']."'/>";
             // echo "</td>";
            echo "<td scope='col' colspan='2'>",$row['Mobile'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['Email'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['Address'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['pquantity'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['total'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['Payment'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['date'],"</td></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
           // echo "<td><a href='index.php?edit_product=".$row['product_id']."'>Edit</a></td>";
           // echo "<td><a href='delete_cat.php?delete_product=".$row['product_id']."'>Delete</a></td></tr>";
            $i++;
        }
        echo "</table>";
    }
    else
    {   ?>
    <table id="scrolls"  width="100%" style='border-top:1px solid #A9A9A9;'></table>
     <?php 
        echo "<h4 style='text-align:cenetr;margin-top:20px;   margin-left: 28%;'>No Orders Available</h4></td></tr></table>";
    }
      
    }
    else
    {
    
    
    }
   
?>
<style>
#bodyright
{
overflow:scroll;

}
 #scrolls
   {
   width:140%;
   }
   #scrolls tr th
   {
   text-align:left;
   font-size: 14px;
   }
     #scrolls tr td
   {
   color: black;
    
    font-size: 14px;
    text-align:left;

	</style></td></tr></table></table></div>