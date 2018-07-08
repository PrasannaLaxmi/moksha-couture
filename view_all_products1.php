<div id="bodyright">
<h3 style="color:black;margin-top:1.3%">Products</h3>
<button><a href='index.php?add_products'>Add product</a></button><br>

   
<table id="scrolls" width="100%" style="border-top:1px solid #A9A9A9;margin-top:1%">
  <thead>
  <tr></tr><tr></tr><tr></tr>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col" colspan="2">Product Id</th>
      <th scope="col" colspan="2">Product Name</th>
      <th scope="col" colspan="2">Product Description</th>
      <th scope="col" colspan="2">Product Images</th>
      <th scope="col" colspan="2">Product Color</th>
      <th scope="col" colspan="2">Product Size</th>
      <th scope="col" colspan="2">Product Price</th>
      <th scope="col" colspan="2">Product Discount</th>
      <th scope="col" colspan="2" >Stock</th>
      <th scope="col" colspan="2">Priroity</th>
      <th scope="col" colspan="2">Edit</th>
      <th scope="col" colspan="2">Delete</th>
    </tr><tr></tr><tr></tr><tr></tr>
  </thead>
  <tbody>
  <tr></tr>
  <tr></tr><tr></tr>
   <?php 
   include 'inc/database.php';
   $sql = "SELECT * FROM products where status!='Deleted'";
   $result = $conn->query($sql);
   $i=1;
   if ($result->num_rows > 0)
   {
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>",$i,"</td>";
            echo "<td scope='col' colspan='2'>",$row['product_id'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['product_name'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['product_desc'],"</td>";
            echo "<td scope='col' colspan='2'>
              
              <img style='width:30px;height:20px;' src='./product_images/".$row['product_img1']."'/>
              <img style='width:30px;height:20px;' src='./product_images/".$row['product_img2']."'/>
              <img style='width:30px;height:20px;' src='./product_images/".$row['product_img3']."'/>
              <img style='width:30px;height:20px;' src='./product_images/".$row['product_img4']."'/>
              <img style='width:30px;height:20px;' src='./product_images/".$row['product_img5']."'/>";
              echo "</td>";
            echo "<td scope='col' colspan='2'>",$row['product_color'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['product_size'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['product_price'],"</td>";
            if(empty($row['product_discount']))
            {
                echo "<td scope='col' colspan='2'>NA</td>";
            }
            else 
            {
                echo "<td scope='col' colspan='2'>",$row['product_discount'],"%</td>";
            }   
           
            echo "<td scope='col' colspan='2'>",$row['Product_stock_avail'],"</td>";
            echo "<td scope='col' colspan='2'>",$row['product_priroty'],"</td>";
            
            echo "<td scope='col' colspan='2'><a href='index.php?edit_product=".$row['product_id']." '>Edit</a></td>";
            echo "<td scope='col' colspan='2'><a href='delete_cat.php?delete_product=".$row['product_id']."'>Delete</a></td></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
            $i++;
        }
        echo "</table>";
    }
    else
    {
        ?>
        <table id="scroll" style="border-top:1px solid #A9A9A9;margin-top:1"><tr><td>
        <?php 
        echo "<h4 style='text-align:cenetr;margin-top:20px;   margin-left: 28%;'>No Data Available</h4></td></tr></table>";
    }
?>
  
    
  </tbody>
  </table>
  <style>


#bodyright
{
overflow:scroll;

}
button
{


    float: left;
    margin-top: -30px;
    margin-left: 75%;
    color: white;
    text-decoration: none;
    font-weight: 15px;
    background: #202020;
    padding: 10px;
    border-radius: 5px;

}
button:hover {
  background: white;

}
button a
{
 text-decoration: none;
 color:white;
}
button a:hover
{
 text-decoration: none;
 color:black;
}
	</style>
	<style>
   #scrolls
   {
   width:130%;
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
  }
  a
  {
  text-decoration:none;
  color:black;
  }
   </style>    
	</div>