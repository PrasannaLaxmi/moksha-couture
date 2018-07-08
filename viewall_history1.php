<div id="bodyright">
<h3 style="color:black;margin-bottom: 1.8%;margin-top:1.3%">Customer History</h3>

              
<style>
   #scrolls
   {
   
   width:100%;
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
  }
 
   </style>    


<?php 
 include 'inc/database.php';
 if(isset($_GET['viewall_history']))
 {
     $customer_id=$_GET['viewall_history'];
        
     if(!empty($customer_id))
        {
            $sql = "SELECT * FROM  customers  where customer_id='$customer_id'";
            $result = $conn->query($sql);
            $i=1;
            if ($result->num_rows > 0)
            {
                ?>
        <div id="scrolls" style='border-top:1px solid #A9A9A9;margin-top:1%"'><br><br>
        <?php 
       
        while($row = $result->fetch_assoc())
        {
          
            echo "<label>Name &nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><label>&nbsp&nbsp",$row['Name'],"</label><br><br>";
            echo "<label>DoB &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><label>&nbsp&nbsp",$row['Dob'],"</label><br><br>";
            echo "<label>Phone &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </label><label>&nbsp&nbsp",$row['Mobile'],"</label><br><br>";
            echo "<label>Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: </label><label>&nbsp&nbsp",$row['Email'],"</label><br><br>";
            echo "<label>Address &nbsp&nbsp&nbsp&nbsp&nbsp: </label><label>&nbsp&nbsp",$row['Address'],"</label><br><br><br><br>";
     
           
         
           
      
            ?><div id="hover"><form method="post"><input type="hidden" name="customerids" value="<?php echo $row['customer_id'];?>"><button name="display_customer">View Order History</button></form>
   </div><?php
        }  }
    else
    {   ?>
     <table id="scrolls" style='border-top:1px solid #A9A9A9;margin-top:1%"'><tr><td >
     <?php 
        echo "<h4 style='text-align:cenetr;margin-top:20px;    margin-left: 28%;'></h4></td></tr></table>";
    }
      
    }
    else
    {
    
    
    }
   
}
?>
<br><br>
<?php 
include 'inc/database.php';
if(isset($_POST['customerids']))
{
    $customer_id=$_POST['customerids'];
    //echo $admin_name;
    $sql = "SELECT * FROM orders o join customers c on o.customer_id=c.customer_id join products p on p.product_id=o.product_id where c.customer_id='$customer_id'";
    $result = $conn->query($sql);
    $i=1;
    if ($result->num_rows > 0)
    {
        ?>
        <table id="scrolls" style='border-top:1px solid #A9A9A9;"'>
<tr><tr></tr><tr></tr><tr></tr><tr></tr>
<th scope="col" width="4%">S.No</th>
<th scope="col" colspan="2" width="8%">Product ID</th>
<th scope="col" colspan="2" width="10%">Product Name</th>
<th scope="col" colspan="2" width="10%">Billing Address</th>
<th scope="col" colspan="2" width="6%">Quantity</th>
<th scope="col" colspan="2" width="6%">Price</th>
<th scope="col" colspan="2" width="8%">Payment</th>
<th scope="col" colspan="2" width="15%">Date</th>
<th scope="col" colspan="2">Status</th>
</tr>
<tr>

</tr><tr>

</tr><tr>

</tr><tr>

</tr><tr>

</tr><tr></tr><tr></tr>
        <?php 
       
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>",$i,"</td>";
           
            echo "<td scope='col' colspan='2'>",$row['product_id'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['product_name'],"</td>";
            //echo "<td>
              
             // <img src='../images/product_images/".$row['product_img1']."'/>
             // <img src='../images/product_images/".$row['product_img2']."'/>
             // <img src='../images/product_images/".$row['product_img3']."'/>
             // <img src='../images/product_images/".$row['product_img4']."'/>
              //<img src='../images/product_images/".$row['product_img5']."'/>";
             // echo "</td>";
            
            echo "<td scope='col' colspan='2'>",$row['Address'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['pquantity'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['total'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['Payment'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['date'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['order_status'],"</td></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
           // echo "<td><a href='index.php?edit_product=".$row['product_id']."'>Edit</a></td>";
           // echo "<td><a href='delete_cat.php?delete_product=".$row['product_id']."'>Delete</a></td></tr>";
            $i++;
        }
        echo "</table>";
    }
    else
    {   ?>
     <table id="scrolls" style='border-top:1px solid #A9A9A9;'><tr><td >
     <?php 
        echo "<center>No Orders Available</center>";
    }
    
}
?>


<style>

#hover  button
{

    float: left;
    margin-top: -30px;
    margin-left:10%;
    color:white;
    text-decoration: none;
    font-weight: 15px;
    background: #202020;
    padding: 10px;
    border-radius: 4px;
}
#hover  button:hover {
  background: white;
  color:black;

}
	
	</style></div></div></td></tr></table></table></td></tr></table></div></div>
	