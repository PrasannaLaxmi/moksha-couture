<div id="bodyright">
<h3 style="color:black;margin-bottom: 1.8%;">Orders History</h3>

              
<style>
   #scrolls
   {
   width:150%;
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
  #bodyright
{
overflow:scroll;

}
   </style>    


<?php 
 include 'inc/database.php';
 if(isset($_GET['viewall_history']))
 {
     $customer_id=$_GET['viewall_history'];
        
     if(!empty($customer_id))
        {
            $sql = "SELECT * FROM orders o join customers c on o.customer_id=c.customer_id join products p on p.product_id=o.product_id where c.customer_id='$customer_id'";
            $result = $conn->query($sql);
            $i=1;
            if ($result->num_rows > 0)
            {
                ?>
        <table id="scrolls" style='border-top:1px solid #400040;"'>
<tr><tr></tr><tr></tr><tr></tr><tr></tr>
<th scope="col">S.No</th>
<th scope="col" colspan="2">Customer Name</th>
<th scope="col" colspan="2">Product ID</th>
<th scope="col" colspan="2">Product Name</th>
<th scope="col" colspan="2">Mobile</th>
<th scope="col" colspan="2">Email</th>
<th scope="col" colspan="2">Billing Address</th>
<th scope="col" colspan="2">Quantity</th>
<th scope="col" colspan="2">Price</th>
<th scope="col" colspan="2">Payment</th>
<th scope="col" colspan="2">Date</th>
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
            echo "<td scope='col' colspan='2'>",$row['Name'],"</td>";
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
     <table id="scrolls" style='border-top:2px solid #400040;"'><tr><td >
     <?php 
        echo "<h4 style='text-align:cenetr;margin-top:20px;    margin-left: 28%;'>No Orders Available</h4></td></tr></table>";
    }
      
    }
    else
    {
    
    
    }
   
}
?>
<style>

#bodyright  button
{

float:right;margin-top:-2%;
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;

  text-decoration: none;
  font-size: 15px;
    padding: 4px 10px 4px 12px;

}
#bodyright  button:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
	
#bodyright  button a
{
 text-decoration: none;
}
	</style>
	</div>