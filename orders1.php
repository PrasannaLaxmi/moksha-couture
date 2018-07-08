
<div class="scrolls" id="bodyright">
 <style>
   #scrolls
   {
   width:200%;
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
  
  #scrolls1
   {
   width:150%;
   }
   #scrolls1 tr th
   {
   text-align:left;
   font-size: 14px;
   }
     #scrolls1 tr td
   {
   color: black;
    
    font-size: 14px;
    text-align:left;
  }
   </style>    
<style>

#bodyright
{
overflow:scroll;
}
input[type="text"] {

 width: 60%;height: 30px;
    border_radius: 3px;
    border: 1px solid #A9A9A9;
    padding-left: 1px;
    float: left;' 

}

.not-active {
 pointer-events: none;
 cursor: default;
}
#submitbutton
{

float: left;
    margin-left:5%;
    margin-top: -1%;
    width: 20%;
    border-radius: 6px;
    background: #202020;
    -webkit-border-radius: 6;
    -moz-border-radius: 6;
    border-radius: 6px;
    font-family: calibri;
    color: white;
    text-decoration: none;
    font-size: 15px;
    padding: 4px 10px 4px 12px;'
}
a{

text-decoration:none;
color:black;
}
a:hover
{
color:blue;
}
#submitbutton:hover
{
color:black;
background:white;

}

#up_btn:hover
{
color:black;
background:white;
}


	</style><br>
	<?php
    include 'inc/database.php';
    
    if(isset($_GET['orders1']))
    {
        $order_id=$_GET['orders1'];
      
        if(empty($order_id))
        {
            echo "hi";
            $sql = "SELECT * FROM orders o join customers c on o.customer_id=c.customer_id join products p on p.product_id=o.product_id and order_status!='Completed' where order_id='$order_id' order by c.Name asc";
            
            $result = $conn->query($sql);
            $i=1;
            if ($result->num_rows > 0)
            {
                ?>
            <h3 style="color:black;  margin-bottom: 1.8%;margin-top:1.3%">Receieved Orders</h3>
        <table id="scrolls"  width="100%" style='border-top:1px solid #A9A9A9;margin-top:1%;'>
<thead><tr></tr><tr></tr><tr></tr>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col" colspan="3">Customer Name</th>
      <th scope="col" colspan="2">Order ID</th>
      <th scope="col" colspan="2">Product ID</th>
      <th scope="col" colspan="2">Product Name</th>
      <th scope="col" colspan="2">Mobile</th>
      <th scope="col" colspan="2" width="10%">Email</th>
      <th scope="col" colspan="2" >Billing Address</th>
      <th scope="col" colspan="2">Price</th>
      <th scope="col" colspan="2">Payment</th>
      <th scope="col" colspan="2">Date</th>
      <th scope="col" colspan="2">Allocation</th>
      <th scope="col" colspan="2">Tracking ID</th>
      <th scope="col" colspan="2">Status</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  <tr></tr>
  <tr></tr><tr></tr>

        <?php 
       
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>",$i,"</td>";
            echo "<td scope='col' colspan='3'>",$row['Name'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['order_id'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['product_id'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['product_name'],"</td>";
            
            echo "<td scope='col' colspan='2'>",$row['Mobile'],"</td>";
            echo "<td scope='col' colspan='2'width='10%'>",$row['Email'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['Address'],"</td>";
          
            echo "<td scope='col' colspan='2'>",$row['total'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['Payment'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['date'],"</td>";
            echo "<td scope='col' colspan='2'>";
            if($row['order_status']=='Pending')
            {
                if(empty($row['order_id_dummy']))
                    
                {
                    
                ?>
                 <form method='post' action=''><input 
   
    type='text' name='statusupdate' placeholder='Scanning Barcode'>
    <input  type='hidden' name='order_id' value='<?php echo $row["order_id"];?>'>
    <input  type='hidden' name='product_id' value='<?php echo $row["product_id"];?>'><input 
  	
    type='submit' id="submitbutton" name='submit' value='Update'></form></td>
    <td scope='col' colspan='2'><input 
    
      
type="text" name="" value="" placeholder="Tracking ID" disabled><input 
  
    type='submit' id="submitbutton" name='submit' value='Update' disabled></td>
                
                <?php    
                    
                }
                else {
                    
                    ?>
                 <form method='post' action=''><input 
   
    type='text' name='statusupdate' value='<?php echo $row["product_id"];?>' placeholder='Scanning Barcode'>
    <input  type='hidden' name='order_id' value='<?php echo $row["order_id"];?>'>
    <input  type='hidden' name='product_id' value='<?php echo $row["product_id"];?>'><input 
  	
    type='submit' id="submitbutton" name='submit' value='Update'></form></td>
    <td scope='col' colspan='2'><input 
    
      
type="text" name="" value="" placeholder="Tracking ID" disabled><input 
  
    type='submit' id="submitbutton" name='submit' value='Update' disabled></td>
                
                <?php  
                    
                }
                   
                
            ?>
           
    <?php
    echo "<td scope='col' colspan='2'>",$row['order_status'],"</td>";
    echo "<td scope='col' colspan='2'><a href='index.php?edit_product1=".$row['product_id']."'  class='not-active'>Edit</a></td>";
            }
            elseif($row['order_status']=='Pendings')
           
            {
                
                
                if(empty($row['order_id_dummy']))
                
                {
                  ?>
                  
                    <form method='post' action=''>
            <input 
  
    type='text' name='statusupdate' value="<?php echo $row['product_id']?>" placeholder='Scanning Barcode' disabled><input 
  
    type='submit' id="submitbutton" name='submit' value='Update' disabled></td><td scope='col' colspan='2'>
            <input 
    
    type='text' name='statusupdate' placeholder='Enter Tracking ID'>
    <input type='hidden' name='order_id' value='<?php echo $row["order_id"];?>'><input 
  
    type='submit' id="submitbutton" name='submits' value='Update'></form></td>
                  <?php 
                  
                   
                
                   
                }
                else
                {
                    ?>
                    
                      <form method='post' action=''><input 
   
    type='text' name='statusupdate' value="<?php echo $row['product_id'];?>" placeholder='Scanning Barcode'>
    <input  type='hidden' name='order_id' value='<?php echo $row["order_id"];?>'>
    <input  type='hidden' name='product_id' value='<?php echo $row["product_id"];?>'><input 
  	
    type='submit' id="submitbutton" name='submit' value='Update'></form></td>
    <td scope='col' colspan='2'><input 
    
      
type="text" name="" value="" placeholder="Tracking ID" disabled><input 
  
    type='submit' id="submitbutton" name='submit' value='Update' disabled></td>
                    <?php 
                    
                }    
                ?>
          
    <?php
    echo "<td scope='col' colspan='2'>Pending</td>";
    echo "<td scope='col' colspan='2'><a href='index.php?edit_orderstatus1=".$row['order_id']."' onclick='windowScroll()'>Edit</a></td>";
            }
            elseif($row['order_status']=='Shipped')
            
            {
                if(!empty($row['tracking_id_dummy']))
                
                {
                    ?>
                   <form method='post' action=''>
            <input 
  
    type='text' name='statusupdate' value="<?php echo $row['product_id']?>" placeholder='Scanning Barcode' disabled><input 
  
    type='submit' id="submitbutton" name='submit' value='Update' disabled></td><td scope='col' colspan='2'>
            <input 
    
    type='text' name='statusupdate' value="<?php echo $row['tracking_id_dummy']?>" placeholder='Enter Tracking ID' >
    <input type='hidden' name='order_id' value='<?php echo $row["order_id"];?>'><input 
  
    type='submit' id="submitbutton" name='submits' value='Update'></form></td>
                 <?php   
                }
                else 
                    
                {
                 ?>
                 
                  <form method='post' action=''>
            <input 
  
    type='text' name='statusupdate' value="<?php echo $row['product_id']?>" placeholder='Scanning Barcode' disabled><input style='color:white;background: #202020;'
  
    type='submit' id="submitbutton" name='submit' value='Update' id='up_btn' disabled></td><td scope='col' colspan='2'>
            <input 
    
    type='text' name='statusupdate'  value="<?php echo $row['tracking_id']?>" placeholder='Enter Tracking ID' disabled>
    <input type='hidden' name='order_id' value='<?php echo $row["order_id"];?>'><input  
  
    type='submit' id="submitbutton" name='submits' value='Update' disabled></form></td>
                 
                 
                 
                 <?php    
                }
                
                
                ?>
            
    <?php
    echo "<td scope='col' colspan='2'>",$row['order_status'];
    ?>
<a style="color:blue;"href='index.php?update_orderstatus=<?php echo $row['order_id'];?>'>(Delivered)</a></td>
<?php 
echo "<td scope='col' colspan='2'><a href='index.php?edit_orderstatuss1=".$row['order_id'].",".$row['tracking_id']."'>Edit</a></td></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
            }
        
          //  echo "<td>",$row['order_status'],"</td>";
           // echo "<td><a href='index.php?edit_product=".$row['product_id']."'>Edit</a></td>";
           // echo "<td><a href='delete_cat.php?delete_product=".$row['product_id']."'>Delete</a></td></tr>";
            $i++;
        }
        echo "</table>";
    }
    else
    {   ?>
     <h3 style="color:black;  margin-bottom: 1.8%;">Receieved Orders</h3>
     <table id="scrolls" style='border-top:1px solid #A9A9A9"'><tr></tr><tr></tr><tr></tr><tr><td>
     <?php 
        echo "<h4 style='text-align:cenetr;margin-top:20px;'>No Orders Available</h4></td></tr></table>";
    }
            
        }
        
        
        else 
        {
            $sql = "SELECT * FROM orders o join customers c on o.customer_id=c.customer_id join products p on p.product_id=o.product_id where o.order_id='$order_id' and order_status='Completed'  order by c.Name asc";
            $results = $conn->query($sql);
           
            if ($results->num_rows > 0)
            {
                //echo "hi";
            
                $result = $conn->query($sql);
                $i=1;
                if ($result->num_rows > 0)
                {
                    ?>
                    <h3 style="color:black;  margin-bottom: 1.8%;">Completed Orders</h3>
       
  <table id="scrolls1"  width="100%" style='border-top:1px solid #A9A9A9'><tr></tr><tr></tr><tr></tr>
<tr>
<th scope="col" width="3%">S.No</th>
<th scope="col" colspan="2" width="8%">Customer Name</th>
<th scope="col" colspan="2" width="6%">Order ID</th>
<th scope="col" colspan="2" width="6%">Product ID</th>
<th scope="col" colspan="2" width="8%">Product Name</th>
<th scope="col" colspan="2" width="6%">Mobile</th>
<th scope="col" colspan="2" width="12%">Email</th>
<th scope="col" colspan="2" width="8%">Billing Address</th>
<th scope="col" colspan="2" width="5%">Quantity</th>
<th scope="col" colspan="2" width="4%">Price</th>
<th scope="col" colspan="2" width="5%">Payment</th>
<th scope="col" colspan="2">Date</th>
</tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
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
            echo "<td scope='col' colspan='2'>",$row['date'],"</td></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
            // echo "<td><a href='index.php?edit_product=".$row['product_id']."'>Edit</a></td>";
            // echo "<td><a href='delete_cat.php?delete_product=".$row['product_id']."'>Delete</a></td></tr>";
            $i++;
        }
        echo "</table>";
    }
    else
    {   ?>
     <h3 style="color:black;  margin-bottom: 1.8%;">Completed Orders</h3>
     <table id="scrolls1" style='border-top:1px solid #A9A9A9'><tr></tr><tr></tr><tr></tr><tr><td>
     <?php 
        echo "<h4 style='text-align:cenetr;margin-top:20px;'>No Orders Available</h4></td></tr></table>";
    }
        
                
            
            }
            else 
            {
                $sql = "SELECT * FROM orders o join customers c on o.customer_id=c.customer_id join products p on p.product_id=o.product_id where o.order_id='$order_id' and order_status!='Completed' order by c.Name asc";
                
                $result = $conn->query($sql);
                $i=1;
                if ($result->num_rows > 0)
                {
                    ?>
            <h3 style="color:black; margin-bottom: 1.8%; ">Receieved Orders</h3>
        <table id="scrolls"  width="100%" style='border-top:1px solid #A9A9A9'>
<thead><tr></tr><tr></tr><tr></tr>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col" colspan="3">Customer Name</th>
      <th scope="col" colspan="2">Order ID</th>
      <th scope="col" colspan="2">Product ID</th>
      <th scope="col" colspan="2">Product Name</th>
      <th scope="col" colspan="2">Mobile</th>
      <th scope="col" colspan="2" width="10%">Email</th>
      <th scope="col" colspan="2">Billing Address</th>
      <th scope="col" colspan="2">Price</th>
      <th scope="col" colspan="2" >Payment</th>
      <th scope="col" colspan="2">Date</th>
      <th scope="col" colspan="2">Allocation</th>
      <th scope="col" colspan="2">Tracking ID</th>
      <th scope="col" colspan="2">Status</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  <tr></tr>
  <tr></tr><tr></tr>

        <?php 
       
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>",$i,"</td>";
            echo "<td scope='col' colspan='3'>",$row['Name'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['order_id'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['product_id'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['product_name'],"</td>";
            
            echo "<td scope='col' colspan='2'>",$row['Mobile'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['Email'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['Address'],"</td>";
            
            echo "<td scope='col' colspan='2'>",$row['total'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['Payment'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['date'],"</td>";
            echo "<td scope='col' colspan='2'>";
            if($row['order_status']=='Pending')
            {
                if(empty($row['order_id_dummy']))
                
                {
                    
                    ?>
                 <form method='post' action=''><input 
   
    type='text' name='statusupdate' placeholder='Scanning Barcode'>
    <input  type='hidden' name='order_id' value='<?php echo $row["order_id"];?>'>
    <input  type='hidden' name='product_id' value='<?php echo $row["product_id"];?>'><input 
  	
    type='submit' id="submitbutton" onclick="myFunction()" name='submit' value='Update'></form></td>
    <td scope='col' colspan='2'><input 
    
      
type="text" name="" value="" placeholder="Tracking ID" disabled><input 
  
    type='submit' id="submitbutton" onclick="myFunction()"name='submit' value='Update' disabled></td>
                
                <?php    
                    
                }
                else {
                    
                    ?>
                 <form method='post' action=''><input 
   
    type='text' name='statusupdate' value='<?php echo $row["product_id"];?>' placeholder='Scanning Barcode'>
    <input  type='hidden' name='order_id' value='<?php echo $row["order_id"];?>'>
    <input  type='hidden' name='product_id' value='<?php echo $row["product_id"];?>'><input 
  	
    type='submit' id="submitbutton" onclick="myFunction()" name='submit' value='Update'></form></td>
    <td scope='col' colspan='2'><input 
    
      
type="text" name="" value="" placeholder="Tracking ID" disabled><input 
  
    type='submit' id="submitbutton" onclick="myFunction()" name='submit' value='Update' disabled></td>
                
                <?php  
                    
                }
                   
                
            ?>
           
                
             
    <?php
    echo "<td scope='col' colspan='2'>",$row['order_status'],"</td>";
    echo "<td scope='col' colspan='2'><a href='index.php?edit_orderstatus1=".$row['product_id']."'  class='not-active'>Edit</a></td>";
            }
            elseif($row['order_status']=='Pendings')
           
            {
                
                
                
                if(empty($row['order_id_dummy']))
                
                {
                    ?>
                  
                    <form method='post' action=''>
            <input 
  
    type='text' name='statusupdate' value="<?php echo $row['product_id']?>" placeholder='Scanning Barcode' disabled><input 
  
    type='submit' id="submitbutton" onclick="myFunction()" name='submit' value='Update' disabled></td><td scope='col' colspan='2'>
            <input 
    
    type='text' name='statusupdate' placeholder='Enter Tracking ID'>
    <input type='hidden' name='order_id' value='<?php echo $row["order_id"];?>'><input 
  
    type='submit' id="submitbutton" onclick="myFunction()" name='submits' value='Update'></form></td>
                  <?php 
                  
                   
                
                   
                }
                else
                {
                    ?>
                    
                      <form method='post' action=''><input 
   
    type='text' name='statusupdate' value="<?php echo $row['product_id'];?>" placeholder='Scanning Barcode'>
    <input  type='hidden' name='order_id' value='<?php echo $row["order_id"];?>'>
    <input  type='hidden' name='product_id' value='<?php echo $row["product_id"];?>'><input 
  	
    type='submit' id="submitbutton" onclick="myFunction()" name='submit' value='Update'></form></td>
    <td scope='col' colspan='2'><input 
    
      
type="text" name="" value="" placeholder="Tracking ID" disabled><input 
  
    type='submit' id="submitbutton" onclick="myFunction()" name='submit' value='Update' disabled></td>
                    <?php 
                    
                }    
                ?>
                
               
    <?php
    echo "<td scope='col' colspan='2'>Pending</td>";
    echo "<td scope='col' colspan='2'><a href='index.php?edit_orderstatus1=".$row['order_id']."'>Edit</a></td>";
            }
            elseif($row['order_status']=='Shipped')
            
            {
                
                if(!empty($row['tracking_id_dummy']))
                
                {
                    ?>
                   <form method='post' action=''>
            <input 
  
    type='text' name='statusupdate' value="<?php echo $row['product_id']?>" placeholder='Scanning Barcode' disabled><input 
  
    type='submit' id="submitbutton" onclick="myFunction()" name='submit' value='Update' disabled></td><td scope='col' colspan='2'>
            <input 
    
    type='text' name='statusupdate' value="<?php echo $row['tracking_id_dummy']?>" placeholder='Enter Tracking ID' >
    <input type='hidden' name='order_id' value='<?php echo $row["order_id"];?>'><input 
  
    type='submit' id="submitbutton" onclick="myFunction()" name='submits' value='Update'></form></td>
                 <?php   
                }
                else 
                    
                {
                 ?>
                 
                  <form method='post' action=''>
            <input 
  
    type='text' name='statusupdate' value="<?php echo $row['product_id']?>" placeholder='Scanning Barcode' disabled><input style='color:white;background: #202020;'
  
    type='submit' id="submitbutton" onclick="myFunction()" name='submit' value='Update' id='up_btn' disabled></td><td scope='col' colspan='2'>
            <input 
    
    type='text' name='statusupdate'  value="<?php echo $row['tracking_id']?>" placeholder='Enter Tracking ID' disabled>
    <input type='hidden' name='order_id' value='<?php echo $row["order_id"];?>'><input  
  
    type='submit' id="submitbutton" onclick="myFunction()" name='submits' value='Update' disabled></form></td>
                 
                 
                 
                 <?php    
                }
                
                
                ?>
            
                
                
           
    <?php
    echo "<td>",$row['order_status'];
    ?>
<a style="color:blue;"href='index.php?update_orderstatus=<?php echo $row['order_id'];?>'>(Delivered)</a></td>
<?php 
echo "<td scope='col' colspan='2'><a href='index.php?edit_orderstatuss1=".$row['order_id']."'>Edit</a></td></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
            }
            //echo "<td>",$row['order_status'],"</td>";
           // echo "<td><a href='index.php?edit_product=".$row['product_id']."'>Edit</a></td>";
           // echo "<td><a href='delete_cat.php?delete_product=".$row['product_id']."'>Delete</a></td></tr>

            $i++;
        }
        echo "</table>";
    }
    else
    {   ?>
     <h3 style="color:black; margin-bottom: 1.8%; ">Receieved Orders</h3>
     <table id="scrolls" style='border-top:1px solid #A9A9A9'><tr><td>
     <?php 
        echo "<h4 style='text-align:cenetr;margin-top:20px;'>No Orders Available</h4></td></tr></table>";
    }
            }
           
        }

      
    }
    else
    {
    
    
    }
    ?>
    </div>
   <?php 
include 'inc/database.php';
if(isset($_POST['submit']))
{
    $statusupdate=$_POST['statusupdate'];
    $order_id=$_POST['order_id'];
    $product_id=$_POST['product_id'];
   // echo $product_id;
    ?>
   <script>
   localStorage.setItem("visit","");
   </script>
   <?php
    if($statusupdate==$product_id)
    {
        if(!empty($statusupdate))
        {
            $sql = "update orders set order_status='Pendings' where order_id='$order_id'";
            $sqls = "update orders set order_id_dummy='',tracking_id_dummy=''";
            $results = $conn->query($sqls);
            $result = $conn->query($sql);
            
            
            echo "<script>alert('Updated Successfully');
                                   window.location='index.php?orders1=$order_id'</script>";
        }
        else
        {
            echo "<script>alert('Scan the Barcode of Product');
                                   window.location='index.php?orders1=$order_id'</script>";
        }
        
    }
    else
    {
        echo "<script>alert('Product ID not Matching');
                                   window.location='index.php?orders1=$order_id'</script>";
    }
    
    
}



if(isset($_POST['submits']))
{
    $statusupdate=$_POST['statusupdate'];
    $order_id=$_POST['order_id'];
   // echo $order_id;
    ?>
   <script>
   localStorage.setItem("visit","");
   </script>
   <?php
    if(!empty($statusupdate))
    {
        $sql = "update orders set order_status='Shipped',tracking_id='$statusupdate' where order_id='$order_id'";
        $sqls = "update orders set tracking_id_dummy='',order_id_dummy=''";
        $results = $conn->query($sqls);
        $result = $conn->query($sql);
        
        
        echo "<script>alert('Updated Successfully');
                                   window.location='index.php?orders1=$order_id'</script>";
    }
    else
    {
        echo "<script>alert('Enter Trackind Id');
                                   window.location='index.php?orders1=$order_id'</script>";
    }
  
    
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
/*$(window).scroll(function() {
	  sessionStorage.scrollLeft = $(this).scrollLeft();
	});

	$(document).ready(function() {
	  if (sessionStorage.scrollLeft != "undefined") {
	    $(window).scrollLeft(sessionStorage.scrollLeft);
	  }
	});

*/
	//function readyFn( jQuery ) {
	    // Code to run when the document is ready.
//	}

//When the user clicks on <div>, open the popup
function myFunction() {
 var popup = document.getElementById("myPopup");
 popup.classList.toggle("show");
}




	$( window ).on( "load",  function myfunction()
	{

		var a=localStorage.getItem("visit");
		if(a==null)
		{
			
		}
		else
		{
			//alert("bhanu");
			var $scroller = $('.scrolls');
		    // assign click handler
		      
		        // get the partial id of the div to scroll to
		              
		        
		        // retrieve the jquery ref to the div
		        var scrollTo = $('#submitbutton')           
		            // change its bg
		            //.css('background', '#9f3')          
		            // retrieve its position relative to its parent
		         .position().left;                   
		       //console.log(scrollTo);
		        // simply update the scroll of the scroller
		        // $('.scroller').scrollLeft(scrollTo); 
		        // use an animation to scroll to the destination
		     // $('#submitbutton').localScroll({duration:100});
		   // $scroller.scrollLeft(1100);
		       $scroller.animate({'scrollLeft': scrollTo}, 10);
		         $scroller.focus(); 
		    
		}	});
	
	
</script>

</td>
</tr>
</table>
</tbody>
</table>
</td>
</tr>
</table>
</table>
</td>

</tr>
</table>
</tbody>
</table>
</div>

<style>

.popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* The actual popup */
 .popuptext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
}

/* Popup arrow */
.popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}
</style>













