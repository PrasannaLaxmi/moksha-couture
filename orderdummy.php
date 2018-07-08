
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
#submit
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
#submits
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
#submit:hover
{
color:black;
background:white;

}
#submits:hover
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
                 <form name="form"  id="form"><input 
   
    type='text' id='statusupdate' placeholder='Scanning Barcode'>
    <input  type='hidden' id='order_id' value='<?php echo $row["order_id"];?>'>
    <input  type='hidden' id='product_id' value='<?php echo $row["product_id"];?>'><input 
  	
   type="button" id="submit"  name='submit' value='Update'></form></td>
    <td scope='col' colspan='2'><input 
    
      
type="text" name="" id="tracking_id" value="" placeholder="Tracking ID" disabled><input 
  
    type="button" id="submit" onclick="myFunction()"name='submit' value='Update' disabled></td>
                
                <?php    
                    
                }
                else {
                    
                    ?>
                   <form name="form"  id="form"><input 
   
    type='text' id='statusupdate' value='<?php echo $row["product_id"];?>' placeholder='Scanning Barcode'>
    <input  type='hidden' id='order_id' value='<?php echo $row["order_id"];?>'>
    <input  type='hidden' id='product_id' value='<?php echo $row["product_id"];?>'><input 
  	
   type="button" id="submit"  name='submit' value='Update'></form></td>
    <td scope='col' colspan='2'><input 
    
      
type="text" name="" id="tracking_id" value="" placeholder="Tracking ID" disabled><input 
  
    type="button" id="submit"  name='submit' value='Update' disabled></td>
                
                <?php  
                    
                }
                   
                
            ?>
           
                
             
    <?php
    echo "<td scope='col' colspan='2'>",$row['order_status'],"</td>";
    echo "<td scope='col' colspan='2'><a class='edit' id='".$row['order_id']."' href='#' class='not-active'>Edit</a></td>";
            }
            elseif($row['order_status']=='Pendings')
           
            {
                
                
                
                if(empty($row['order_id_dummy']))
                
                {
                    ?>
                  
                   <form name="form"  id="form">
            <input 
  
    type='text' id='statusupdate' value="<?php echo $row['product_id']?>" placeholder='Scanning Barcode' disabled><input 
  
    type="button" id="submit" onclick="myFunction()" name='submit' value='Update' disabled></td><td scope='col' colspan='2'>
            <input 
    
    type='text' id="tracking_id" placeholder='Enter Tracking ID'>
    <input type='hidden' id='order_id' value='<?php echo $row["order_id"];?>'><input 
  
    type="button" id="submits" onclick="myFunction()" name='submits' value='Update'></form></td>
                  <?php 
                  
                   
                
                   
                }
                else
                {
                    ?>
                    
                        <form name="form"  id="form"><input 
   
    type='text' id='statusupdate' value="<?php echo $row['product_id'];?>" placeholder='Scanning Barcode'>
    <input  type='hidden' id='order_id' value='<?php echo $row["order_id"];?>'>
    <input  type='hidden' id='product_id' value='<?php echo $row["product_id"];?>'><input 
  	
   type="button" id="submit" onclick="myFunction()" name='submit' value='Update'></form></td>
    <td scope='col' colspan='2'><input 
    
      
type="text" name="" id="tracking_id" value="" placeholder="Tracking ID" disabled><input 
  
    type="button" id="submit" onclick="myFunction()" name='submit' value='Update' disabled></td>
                    <?php 
                    
                }    
                ?>
                
               
    <?php
    echo "<td scope='col' colspan='2'>Pending</td>";
    echo "<td scope='col' colspan='2'><a class='edit' id='".$row['order_id']."' href='#'>Edit</a></td>";
            }
            elseif($row['order_status']=='Shipped')
            
            {
                
                if(!empty($row['tracking_id_dummy']))
                
                {
                    ?>
                   <form name="form"  id="form">
            <input 
  
    type='text' id='statusupdate' value="<?php echo $row['product_id']?>" placeholder='Scanning Barcode' disabled><input 
  
  type="button" id="submit"  name='submit' value='Update' disabled></td><td scope='col' colspan='2'>
            <input 
    
    type='text' id="tracking_id" value="<?php echo $row['tracking_id_dummy']?>" placeholder='Enter Tracking ID' >
    <input type='hidden' id='order_id' value='<?php echo $row["order_id"];?>'><input 
  
    type="button" id="submits" onclick="myFunction()" name='submits' value='Update'></form></td>
                 <?php   
                }
                else 
                    
                {
                 ?>
                 
                  <form name="form"  id="form">
            <input 
  
    type='text' id='statusupdate' value="<?php echo $row['product_id']?>" placeholder='Scanning Barcode' disabled><input style='color:white;background: #202020;'
  
  type="button" id="submit" onclick="myFunction()" name='submit' value='Update' id='up_btn' disabled></td><td scope='col' colspan='2'>
            <input 
    
    type='text' id="tracking_id"  value="<?php echo $row['tracking_id']?>" placeholder='Enter Tracking ID' disabled>
    <input type='hidden' id='order_id' value='<?php echo $row["order_id"];?>'><input  
  
   type="button" id="submits" onclick="myFunction()" name='submits' value='Update' disabled></form></td>
                 
                 
                 
                 <?php    
                }
                
                
                ?>
            
                
                
           
    <?php
    echo "<td>",$row['order_status'];
    ?>
<a style="color:blue;" href='index.php?update_orderstatus=<?php echo $row['order_id'];?>'>(Delivered)</a></td>
<?php 
echo "<td scope='col' colspan='2'><a class='edit' id='".$row['order_id']."' href='#'>Edit</a></td></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
            }
            //echo "<td>",$row['order_status'],"</td>";
           // echo "<td><a href='index.php?edit_product=".$row['product_id']."'>Edit</a></td>";
           // echo "<td><a href='delete_cat.php?delete_product=".$row['product_id']."'>Delete</a></td></tr>

            $i++;
        }
        echo "</table>";
    }
    
      else
      
    {
        $sql = "SELECT * FROM orders o join customers c on o.customer_id=c.customer_id join products p on p.product_id=o.product_id where o.order_id='$order_id' and order_status='Completed' order by c.Name asc";
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
          
    }
      
    }
  
   
    ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
    	$("#submit").click(function() {
        
    	var statusupdate = $("#statusupdate").val();
    	var order_id = $("#order_id").val();
    	var product_id = $("#product_id").val();
    	
    	if (statusupdate == '') {
    	alert("Scan the Barcode ....!!");
    	} else {
        	if(statusupdate==product_id)
        	{
        		$.post("refreshform.php", {
            		statusupdate1: statusupdate,
            		order_id1: order_id,
            		product_id1: product_id
            	
            	}, function(data) {
            	alert(data);
            	$('#form')[0].reload(); // To reset form fields
            //	window.location.href = 'index.php?orders1=' + order_id
            	});
        	}
        	else
        	{
        		alert("Product Id not matching");

        	}
    	// Returns successful data submission message when the entered information is stored in database.
    
    	}
    	});
    	});



    $(document).ready(function() {
    	$("#submits").click(function() {
        	
    	var tracking_id = $("#tracking_id").val();
    	var order_id = $("#order_id").val();
    
    	if (tracking_id == '') {
    	alert("Enter Tracking Id....!!");
    	} else {
    	// Returns successful data submission message when the entered information is stored in database.
    	$.post("refreshform1.php", {
    		tracking_id1: tracking_id,
    		order_id1: order_id
    		
    	
    	}, function(data) {
    	alert(data);
    	$('#form')[0].reload(); // To reset form fields
//    	window.location.href = 'index.php?orders1=' + order_id
    	});
    	}
    	});
    	});
	



    $('.edit').click(function() {

        var val = $( this ).attr('id');
       
        $.ajax({
        	
            type: "POST",
            url: "editorders.php",
            data: {prodID:val},
            complete:function(){
               
              alert('Edited Successfully'); 
            } 
       });
    });
    </script>
    </div>
   
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




