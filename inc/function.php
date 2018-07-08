<script src="js/jscolor.js"></script>
<style>
button
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


button:hover {
  background: white;
color:black;
  
}
</style>

<?php 
function  add_cat()
{
include 'inc/database.php';
if(isset($_POST['add_cat']))
{
    $cat_name=$_POST['cat_name'];
    $cat_description=$_POST['cat_description'];
    if(empty($cat_name))
    {
        echo "<script>alert('Please Enter Category Name')</script>";
    }
    else
    {
        $add_cat=$conn->prepare("insert into main_cat(cat_name,cat_description) values('$cat_name','$cat_description')");
        if($add_cat->execute())
        {
            echo "<script>alert('Category added Successfully');
                                   window.location='index.php?viewall_cat'</script>";
        }
        else
        {
            echo "<script>alert('Category Not added Successfully')</script>";
        }
    }
   
}
}


function  add_size()
{
    include 'inc/database.php';
    if(isset($_POST['add_size']))
    {
        $product_sizes=$_POST['product_sizes'];
       
        if(empty($product_sizes))
        {
            echo "<script>alert('Please Enter Product Size')</script>";
        }
        else
        {
            $add_cat=$conn->prepare("insert into ProductSize(size) values('$product_sizes')");
            if($add_cat->execute())
            {
                echo "<script>alert('Product Size added Successfully');
                                   window.location='index.php?viewall_cat'</script>";
            }
            else
            {
                echo "<script>alert('Product Not Added Succesfully')</script>";
            }
        }
        
    }
}



function add_sub_cat()
{
include 'inc/database.php';
if(isset($_POST['add_sub_cat']))
{
    $cat_id=$_POST['cat_id'];
    $sub_cat_name=$_POST['sub_cat_name'];
    $sub_cat_desc=$_POST['sub_cat_desc'];
    if(empty($sub_cat_name))
    {
        echo "<script>alert('Please Enter Sub Category Name')</script>";
    }
    else
    {
        $add_sub_cat=$conn->prepare("insert into sub_cat(sub_cat_name,main_cat_id,sub_cat_desc) values('$sub_cat_name','$cat_id','$sub_cat_desc')");
        if($add_sub_cat->execute())
        {
            echo "<script>alert('Sub Category added Successfully');
                                   window.location='index.php?viewall_cat'</script>";
        }
        else
        {
            echo "<script>alert('Sub Category Not added Successfully')</script>";
        }
    }
   
}
}



function add_sub_sub_cat()
{
    include 'inc/database.php';
    if(isset($_POST['add_sub_sub_cat']))
    {
        $subcat_id=$_POST['subcat_id'];
        $sub_sub_cat_name=$_POST['sub_sub_cat_name'];
        $sub_sub_cat_desc=$_POST['sub_sub_cat_desc'];
        if(empty($sub_sub_cat_name))
        {
            echo "<script>alert('Please Enter Sub Category Name')</script>";
        }
        else
        {
            $add_sub_cat=$conn->prepare("insert into sub_sub_cat(sub_sub_cat_name,subcat_id,sub_sub_cat_desc) values('$sub_sub_cat_name','$subcat_id','$sub_sub_cat_desc')");
            if($add_sub_cat->execute())
            {
                echo "<script>alert('Sub Category added Successfully');
                                   window.location='index.php?viewall_cat'</script>";
            }
            else
            {
                echo "<script>alert('Sub Category Not added Successfully')</script>";
            }
        }
        
    }
}


function view_all_categories()
{
    include 'inc/database.php';
    $sql = "SELECT * FROM main_cat";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0)
    {
        
        while($row = $result->fetch_assoc())
        {
            echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
        }
    }
}

function view_all_sub_categories()
{
    include 'inc/database.php';
    $sql = "SELECT * FROM sub_cat ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0)
    {
        
        while($row = $result->fetch_assoc())
        {
            echo "<option value='".$row['sub_cat_id']."'>".$row['sub_cat_name']."</option>";
        }
    }
}


function view_all_sub_sub_categories()
{
    include 'inc/database.php';
    $sql = "SELECT * FROM sub_sub_cat ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0)
    {
        
        while($row = $result->fetch_assoc())
        {
            echo "<option value='".$row['sub_sub_cat_id']."'>".$row['sub_sub_cat_name']."</option>";
        }
    }
}
function viewall_categories()
{
    include 'inc/database.php';
    $sql = "SELECT * FROM main_cat m left outer join sub_cat s on m.cat_id=s.main_cat_id group by m.cat_id";
    $result = $conn->query($sql);
    $i=1;
    if ($result->num_rows > 0)
    {
        $count=1;
        while($row = $result->fetch_assoc())
        {
            $count=$row['cat_id'];
            if(!empty($count))
            echo "<tr><td>",$i,"</td>";
            echo "<td>",$row['cat_name'],"</td>";
            echo "<td>",$row['cat_description'],"</td>";
            
            if(empty($row['sub_cat_name']))
            {
                
              echo "<td><button><a href='index.php?add_sub_cat=".$row['cat_id']."'>Add</a></button>
               </td>";
            
            }
            else 
            {
                echo "<td><button><a style='color:white;' href='index.php?viewall_sub_cat=".$row['main_cat_id']."'>View</a></button>
               </td>";
            }
           
            echo "<td><a style='color:white;padding: 10px;border-radius:5px;background:#202020;' href='delete_cat.php?delete_cat=".$row['cat_id']."'>Delete</a></td></tr>";
            $i++; 
        }
    }
}



function viewall_products()
{
    include 'inc/database.php';
    $sql = "SELECT * FROM products where status!='Deleted'";
    $result = $conn->query($sql);
    $i=1;
    if ($result->num_rows > 0)
    {
        ?>
        <table id="scroll" style="border-top:1px solid #A9A9A9;margin-top:1%">
   
  
  
<tr>
<th style="width:1px !important">S.No</th>
<th style="width:20px;">Product ID</th>
<th>Product Name</th>
<th>Product Description</th>
<th>Product Images</th>
<th>Product Color</th>
<th>Product Size</th>
<th>Product Price</th>
<th>Product Discount</th>
<th>Stock</th>
<th>Priroty</th>
<th>Edit</th>
<th>Delete</th></tr>
        <?php 
       
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>",$i,"</td>"."<br/>";
            echo "<td>",$row['product_id'],"</td>"."<br/>";
            echo "<td>",$row['product_name'],"</td>"."<br/>"."<br/>";
            echo "<td>",$row['product_desc'],"</td>"."<br/>"."<br/>";
            echo "<td>
              
              <img src='../images/product_images/".$row['product_img1']."'/>
              <img src='../images/product_images/".$row['product_img2']."'/>
              <img src='../images/product_images/".$row['product_img3']."'/>
              <img src='../images/product_images/".$row['product_img4']."'/>
              <img src='../images/product_images/".$row['product_img5']."'/>";
              echo "</td>";
            echo "<td >",$row['product_color'],"</td>";
            echo "<td >",$row['product_size'],"</td>";
            echo "<td>",$row['product_price'],"</td>";
            if(empty($row['product_discount']))
            {
                echo "<td>NA</td>";
            }
            else 
            {
                echo "<td>",$row['product_discount'],"%</td>";
            }   
           
            echo "<td>",$row['Product_stock_avail'],"</td>";
            echo "<td>",$row['product_priroty'],"</td>";
            
            echo "<td><a href='index.php?edit_product=".$row['product_id']." '>Edit</a></td>";
            echo "<td><a href='delete_cat.php?delete_product=".$row['product_id']."'>Delete</a></td></tr>";
            $i++;
        }
        echo "</table>";
    }
    else
    {
        ?>
        <table id="scroll" style="border-top:2px solid #A9A9A9;margin-top:1%"><tr><td>
        <?php 
        echo "<h4 style='text-align:cenetr;margin-top:20px;'>No Data Available</h4></td></tr></table>";
    }
}



function edit_cat()
{
    include 'inc/database.php';
    if(isset($_GET['edit_cat']))
    {
        $cat_id=$_GET['edit_cat'];
        $sql = "SELECT * FROM main_cat where cat_id='$cat_id'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
          ?>
<h3 style="color:black;margin-top:1.3%">Edit Category Name From Here</h3>
<form method="post">
<table style="color:black;border-top:1px solid #A9A9A9;margin-top:1%">
</table><br>
<label style="margin-left: 3%">Update Category Name</label>
<label style="padding-left:12%;"><input style="height:5%;width: 30%;" type="text" name="up_cat_name" value="<?php echo $row['cat_name'];?>"></label><br><br>

<label style="margin-left: 3%">Update Category Description</label>
<label style="padding-left:8.9%;"><input style="height:5%;width: 30%;" type="text" name="up_cat_desc" value="<?php echo $row['cat_description'];?>"></label><br><br>


<button style="margin-left: 30%" name="update_cat_name">Update Category</button>

</form><?php
        }
        
     }
     if(isset($_POST['update_cat_name']))
     {
         $up_cat_name=$_POST['up_cat_name'];
         $up_cat_desc=$_POST['up_cat_desc'];
         if(empty($up_cat_name))
         {
             echo "alert('Enter Category Name')";
         }
         else 
         {
             
             $sqls = "update main_cat set cat_name='$up_cat_name',cat_description='$up_cat_desc' where cat_id='$cat_id'";
             $results = $conn->query($sqls);
             if ($results)
             {
                 echo "<script>alert('Updated Successfully');
            window.location='index.php?viewall_cat'</script>";
             }
         }
         
     }
}


function edit_sub_cat()
{
    include 'inc/database.php';
    if(isset($_GET['edit_sub_cat']))
    {
        $sub_cat_id=$_GET['edit_sub_cat'];
        $sql = "SELECT * FROM sub_cat where sub_cat_id='$sub_cat_id'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            ?>
<h3 style="color:black;margin-top:1.3%">Edit Mid-Category Name From Here</h3>
<form method="post">
<table  style="color:black;border-top:1px solid #A9A9A9;margin-top:1%"></table><br>
<label style="margin-left: 3%">Update Mid-Category Name</label>
<label style="padding-left:12%;"><input style="height:5%;width: 30%;" type="text" name="up_sub_cat_name" value="<?php echo $row['sub_cat_name'];?>"></label><br><br>

<label style="margin-left: 3%">Update Mid-Category Description</label>
<label style="padding-left:8.9%;"><input style="height:5%;width: 30%;" type="text" name="up_sub_cat_desc" value="<?php echo $row['sub_cat_desc'];?>"></label><br><br>

<button  style="margin-left: 30%" name="update_sub_cat_name">Update MidCategory</button>

</form><?php
        }
        
     }
     if(isset($_POST['update_sub_cat_name']))
     {
         $up_sub_cat_name=$_POST['up_sub_cat_name'];
         $up_sub_cat_desc=$_POST['up_sub_cat_desc'];
         if(empty($up_sub_cat_name))
         {
             echo "alert('Enter MidCategory Name')";
         }
         else 
         {
             
             $sqls = "update sub_cat set sub_cat_name='$up_sub_cat_name',sub_cat_desc='$up_sub_cat_desc' where sub_cat_id='$sub_cat_id'";
             $results = $conn->query($sqls);
             if ($results)
             {
                 echo "<script>alert('Updated Successfully');
            window.location='index.php?viewall_cat'</script>";
             }
         }
         
     }
}




function edit_sub_sub_cat()
{
    include 'inc/database.php';
    if(isset($_GET['edit_sub_sub_cat']))
    {
        $sub_sub_cat_id=$_GET['edit_sub_sub_cat'];
        $sql = "SELECT * FROM sub_sub_cat where sub_sub_cat_id='$sub_sub_cat_id'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            ?>
<h3 style="color:black;margin-top:1.3%">Edit Sub-Category Name From Here</h3>
<form method="post">
<table  style="color:black;border-top:2px solid #A9A9A9;margin-top:1%"></table><br>
<label style="margin-left: 3%">Update Sub-Category Name</label>
<label style="padding-left:12%;"><input style="height:5%;width: 30%;" type="text" name="up_sub_sub_cat_name" value="<?php echo $row['sub_sub_cat_name'];?>"></label><br><br>


<label style="margin-left: 3%">Update Sub-Category Description</label>
<label style="padding-left:8.9%;"><input style="height:5%;width: 30%;" type="text" name="up_sub_sub_cat_desc" value="<?php echo $row['sub_sub_cat_desc'];?>"></label><br><br>


<button  style="margin-left: 30%" name="update_sub_sub_cat_name">Update SubCategory</button>

</form><?php
        }
        
     }
     if(isset($_POST['update_sub_sub_cat_name']))
     {
         $up_sub_sub_cat_name=$_POST['up_sub_sub_cat_name'];
         $up_sub_sub_cat_desc=$_POST['up_sub_sub_cat_desc'];
         if(empty($up_sub_sub_cat_name))
         {
             echo "alert('Enter SubCategory Name')";
         }
         else 
         {
             
             $sqls = "update sub_sub_cat set sub_sub_cat_name='$up_sub_sub_cat_name',sub_sub_cat_desc='$up_sub_sub_cat_desc' where sub_sub_cat_id='$sub_sub_cat_id'";
             $results = $conn->query($sqls);
             if ($results)
             {
                 echo "<script>alert('Updated Successfully');
            window.location='index.php?viewall_cat'</script>";
             }
         }
         
     }
}





/*

function edit_product()
{
    include 'inc/database.php';
    if(isset($_GET['edit_product']))
    {
        $edit_product_id=$_GET['edit_product'];
        $sql = "SELECT * FROM products where product_id='$edit_product_id'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            ?>
            <h3 style="color:black;margin-top:1.3%">Edit Product Information From Here</h3>
<form method="post" enctype="multipart/form-data">
<table style="color:black;border-top:1px solid #A9A9A9;margin-top:1%"></table><br>
<label style="margin-left: 3%">Enter Product Name Here </label>
<label style="padding-left:8.2%;"><input style="height:5%;width:30%" type="text"  name="product_name" value="<?php echo $row['product_name'];?>"></label><br><br>

<label style="margin-left: 3%">Enter Product Description </label>
<label style="padding-left:8.2%;"><input style="height:5%;width:30%" name="product_description" value="<?php echo $row['product_desc'];?>"></label><br><br>

<label style="margin-left: 3%">Select Category Name </label>
<label style="padding-left:10.5%;"><select style="height:5%;"name="main_cat" id="category">
<?php 
 echo view_all_categories();
?>
</select></label><br><br>

<label style="margin-left: 3%">Select MidCategory Name </label>
<label style="padding-left:8.3%;"><select style="height:5%;" name="sub_cat" id="subcategory">
<option>Select Category First</option>
</select></label><br><br>

<label style="margin-left: 3%">Select SubCategory Name </label>
<label style="padding-left:8.4%;"><select style="height:5%;"name="sub_sub_cat" id="subsubcategory">
<option>Select Category First</option>
</select></label><br><br>

<label style="margin-left: 3%">Select Product Image1 </label>
<label style="padding-left:10.3%;"><input style="height:5%;" type="file" name="img1"></label><br><br>

<label style="margin-left: 3%">Select Product Image2:</td>
<label style="padding-left:10%;"><input style="height:5%;" type="file" name="img2"></label><br><br>

<label style="margin-left: 3%">Select Product Image3:</td>
<label style="padding-left:10%;"><input style="height:5%;" type="file" name="img3"></label><br><br>

<label style="margin-left: 3%">Select Product Image4:</td>
<label style="padding-left:10%;"><input style="height:5%;" type="file" name="img4"></label><br><br>

<label style="margin-left: 3%">Select Product Image5:</td>
<label style="padding-left:10%;"><input style="height:5%;" type="file" name="img5"></label><br><br>

<label style="margin-left: 3%">Update Product Color:</td>
<label style="padding-left:10.5%;"><!--<input  type="color" name="color"><input class="jscolor {required:false}"  type="hidden" >  -->
<select style="height:5%;" name="color">
<option value="">Select Color</option>
<option value="Red" id="one" style="background:red">Red</option>
<option value="Orange" id="five" style="background:#FF4500">Orange</option>
<option value="Yellow" id="two" style="background:yellow">Yellow</option>
<option value="Green" id="four" style="background:green">Green</option>
<option value="Blue" id="three" style="background:#ADD8E6">Blue</option>
<option value="Purple" id="eight" style="background:purple">Purple</option>
<option value="Pink" id="nine" style="background:pink">Pink</option>
<option value="Gray" id="eleven" style="background:gray">Gray</option>
<option value="Brown" id="six" style="background:#8B4513">Brown</option>
<option value="White" id="ten" style="background:white">White</option>
<option value="Black" id="seven" style="background:black">Black</option>
<option value="Magenta" id="twelve" style="background:magenta">Magenta</option>
<option value="Peach" id="thirteen" style="background:#ffdab9 ">Peach</option>
<option value="Maroon" id="fourteen" style="background:#800000">Maroon</option>    
</select></label><br><br>


<label style="margin-left: 3%">Update Product Size:</td>
<label style="padding-left:11.4%;">
<select style="height:5%;" name="size" value="<?php echo $row['product_size'];?>">
<option value="S">S</option>
<option value="M">M</option>
<option value="L">L</option>
<option value="XL">XL</option>
<option value="2XL">2XL</option>
</select></label><br><br>

<label style="margin-left: 3%">Update Product Price:</td>
<label style="padding-left:10.8%;"><input style="height:5%;width:10%"type="text" name="price" value="<?php echo $row['product_price'];?>"></label><br><br>
<tr>

<label style="margin-left: 3%">Update Product Keywords:</td>
<label style="padding-left:8%;"><input style="height:5%;width: 30%;" type="text" name="keywords" value="<?php echo $row['keywords'];?>"></label><br><br>

<label style="margin-left: 3%">Select Stcock Availability</td>
<label style="padding-left:9.3%;">
<select style="height:5%;" name="stock_availability">
<?php 
$i=1;
for($i=1;$i<=10;$i++)
{
    ?>
<option value="<?php echo $i;?>"><?php echo $i;?></option> 
<?php
}
?>
</select>
</label><br><br>

<label style="margin-left: 3%">Select Product Pririty:</td>
<label style="padding-left:10.9%;">
<select style="height:5%;"name="product_priority">
<option value="High">High</option>
<option value="Medium">Medium</option>
<option value="Low">Low</option>
</select></label><br><br>
</table>
<center><button name="update_product">Update product</button>
</center>
</form>
<?php 
        }
    }
    if(isset($_POST["update_product"]))
    {
      
    $product_name=$_POST['product_name'];
    $cat_id=$_POST['main_cat'];
    $sub_cat_id=$_POST['sub_cat'];
    $sub_sub_cat_id=$_POST['sub_sub_cat'];
    $product_desc=$_POST['product_description'];
    $product_img1 = $_FILES['img1']['name'];
    $product_img1_tmp =$_FILES['img1']['tmp_name'];
    
    $product_img2 = $_FILES['img2']['name'];
    $product_img2_tmp =$_FILES['img2']['tmp_name'];
    
    $product_img3 = $_FILES['img3']['name'];
    $product_img3_tmp =$_FILES['img3']['tmp_name'];
    
    $product_img4 = $_FILES['img4']['name'];
    $product_img4_tmp =$_FILES['img4']['tmp_name'];
    
    $product_img5 = $_FILES['img5']['name'];
    $product_img5_tmp =$_FILES['img5']['tmp_name'];
    $product_color=$_POST['color'];
    $product_size=$_POST['size'];
    $product_price=$_POST['price'];
    $keywords=$_POST['keywords'];
    $product_stock_avail=$_POST['stock_availability'];
    $product_prority=$_POST['product_priority'];
    date_default_timezone_set("Asia/Calcutta");
    $date=date("H:i:s");
    move_uploaded_file($product_img1_tmp,"../images/product_images/$product_img1");
    move_uploaded_file($product_img2_tmp,"../images/product_images/$product_img2");
    move_uploaded_file($product_img3_tmp,"../images/product_images/$product_img3");
    move_uploaded_file($product_img4_tmp,"../images/product_images/$product_img4");
    move_uploaded_file($product_img5_tmp,"../images/product_images/$product_img5");
    
    
    if(empty($product_name))
    {
        echo "<script>alert('Please Enter Product Name')</script>";
    }
    else
    {
        if(empty($product_color))
        {
            echo "<script>alert('Please Enter Product Color')</script>";
        }
        else
        {
            if(empty($product_size))
            {
                echo "<script>alert('Please Enter Product Size')</script>";
            }
            else
            {
                if(empty($product_price))
                {
                    echo "<script>alert('Please Enter Product Price')</script>";
                }
                else
                {
                    if(empty($product_stock_avail))
                    {
                        echo "<script>alert('Please Enter Product Stock Availability')</script>";
                    }
                    else
                    {
                        $pattern = '/^\d+(?:\.\d{2})?$/';
                        
                        if (preg_match($pattern, $_POST['price']) == '0') {
                            echo "<script>alert('Please Enter Valid Price')</script>";
                            exit;
                        }
                        else {
                            $add_products=$conn->prepare("update products set product_name='$product_name',cat_id='$cat_id',
sub_cat_id='$sub_cat_id', sub_sub_cat_id='$sub_sub_cat_id', product_desc='$product_desc',
product_img1='$product_img1', product_img2='$product_img2', product_img3='$product_img3', product_img4='$product_img4',
 product_img5='$product_img5', product_color='$product_color', product_size='$product_size', product_price='$product_price',
keywords='$keywords',
Product_stock_avail='$product_stock_avail', product_priroty='$product_prority' where product_id='$edit_product_id'");
                            if($add_products->execute())
                            {
                                echo "<script>alert('Update added Successfully');
                                   window.location='index.php?viewall_products'</script>";
                            }
                            else
                            {
                                echo "<script>alert('Product Not Updated Successfully')</script>";
                            }
                        }
                        
                    }
                }
            }
        }
       
    }
    }
}


*/
function delete_cat()
{
    include 'inc/database.php';
    
        $delete_product_cat_id=$_GET['delete_cat'];
        //echo $delete_product_cat_id;
        $sql = "delete FROM main_cat  where cat_id='$delete_product_cat_id'";
        $sqls = "delete FROM sub_cat where main_cat_id='$delete_product_cat_id'";
        $results = $conn->query($sqls);
        $result = $conn->query($sql);
        if($result)
        {
            echo "<script>alert('Category Deleted Successfully');
                                   window.location='index.php?viewall_cat'</script>";
        }
    
   
}



function delete_sub_cat()
{
    include 'inc/database.php';
    
    $delete_product_sub_cat_id=$_GET['delete_sub_cat'];
    //echo $delete_product_cat_id;
    $sql = "delete FROM sub_cat where sub_cat_id='$delete_product_sub_cat_id'";
    $result = $conn->query($sql);
    if($result)
    {
        echo "<script>alert('Mid-Category Deleted Successfully');
                                   window.location='index.php?viewall_cat'</script>";
    }
    
    
}

function delete_sub_sub_cat()
{
    include 'inc/database.php';
    
    $delete_product_sub_cat_id=$_GET['delete_sub_sub_cat'];
    //echo $delete_product_cat_id;
    $sql = "delete FROM sub_sub_cat where sub_sub_cat_id='$delete_product_sub_cat_id'";
    $result = $conn->query($sql);
    if($result)
    {
        echo "<script>alert('Sub Category Deleted Successfully');
                                   window.location='index.php?viewall_cat'</script>";
    }
    
    
}


function delete_product()
{
    include 'inc/database.php';
    
    $delete_product_id=$_GET['delete_product'];
    //echo $delete_product_cat_id;
    $sql = "update products set status='Deleted' where product_id='$delete_product_id'";
    $result = $conn->query($sql);
    if($result)
    {
        echo "<script>alert('Product Deleted Successfully');
                                   window.location='index.php?viewall_products'</script>";
    }
    
    
}



function viewall_admins()
{
    include 'inc/database.php';
    $sql = "SELECT * FROM admin";
    $result = $conn->query($sql);
    $i=1;
    if ($result->num_rows > 0)
    {
        
        while($row = $result->fetch_assoc())
        {
            echo "<td>",$i,"</td>";
            echo "<td>",$row['Name'],"</td>";
            echo "<td>",$row['UserName'],"</td>";
            if($row['Admin_id']=='1')
            {
                echo "<td>Edit</td>";
            }
            else 
            {
                echo "<td><a href='index.php?edit_admin=".$row['Admin_id']."'>Edit</a></td>";
            }
           
            echo "<td>",$row['Mobile'],"</td>";
            echo "<td>",$row['Email'],"</td>";
           
            if($row['Admin_id']=='1')
            {
                echo "<td>No Option</td></tr>";
            }
            else
            {
                echo "<td><a href='delete_cat.php?delete_admin=".$row['Admin_id']."'>Delete</a></td></tr>";
            }
           
            $i++;
        }
    }
}



function  add_admin()
{
   
    include 'inc/database.php';
    if(isset($_POST['add_admin']))
    {
        $admin_name=$_POST['admin_name'];
        $admin_username=$_POST['admin_username'];
        $admin_mobile=$_POST['admin_mobile'];
        $admin_email=$_POST['admin_email'];
        $admin_password=$_POST['admin_password'];
        if(empty($admin_name))
        {
            echo "<script>alert('Please Enter Name')</script>";
        }
        else 
        {
            if(empty($admin_username))
            {
                echo "<script>alert('Please Enter UserName')</script>";
            }
            else 
            {
                if(empty($admin_password))
                {
                    echo "<script>alert('Please Enter Password')</script>";
                }
                else 
                {
                    if(empty($admin_mobile))
                    {
                        echo "<script>alert('Please Enter Mobile Number')</script>";
                    }
                    else
                    {
                        if(empty($admin_email))
                        {
                            echo "<script>alert('Please Enter Email')</script>";
                        }
                        else 
                        {
                            if (!preg_match("/^[a-zA-Z ]*$/",$admin_name)) {
                                echo "<script>alert('Name Allowed letters and white space allowed')</script>";
                            }
                            else if (!preg_match("/^[a-zA-Z0-9 ]*$/",$admin_username))
                            {
                               echo "<script>alert('UserName Allowed letters numbers and white space allowed')</script>";
                            }
                            elseif (!preg_match(" /^[A-Za-z0-9]\w{6,14}$/",$admin_password))
                            {
                                echo "<script>alert('Password Should be 6 to 14 Characters only')</script>";
                            }
                            elseif (!preg_match('/^[789]\d{9}$/',$admin_mobile))
                            {
                                echo "<script>alert('Invalid Mobile Number')</script>";
                            }
                            elseif (!filter_var($admin_email, FILTER_VALIDATE_EMAIL))
                            {
                                echo "<script>alert('Invalid Email Address')</script>"; 
                                   
                            }
                            else 
                            {
                                $sql = "SELECT * FROM admin where UserName='$admin_name'";
                                $result = $conn->query($sql);
                                $count=mysqli_num_rows($result);
                                if($count>0)
                                {
                                    echo "<script>alert('Username already exist');
                                   window.location='index.php?admin_accounts'</script>";
                                }
                                else 
                                {
                                    $add_cat=$conn->prepare("insert into admin(Name,UserName,Password,Mobile,Email)
                    values('$admin_name','$admin_username','$admin_password','$admin_mobile','$admin_email')");
                                    if($add_cat->execute())
                                    {
                                        echo "<script>alert('Record added Successfully');
                                   window.location='index.php?admin_accounts'</script>";
                                    }
                                    else
                                    {
                                        echo "<script>alert('Record Not added Successfully')</script>";
                                    }
                                }
                        
                                
                            }
                            
                            
                          
                            
                            
                            
                        }
                    }
                }
               
            }
            
        }
        
    }
}


function edit_admin()
{
    include 'inc/database.php';
    if(isset($_GET['edit_admin']))
    {
        $admin_id=$_GET['edit_admin'];
        $sql = "SELECT * FROM admin where Admin_id='$admin_id'";
        $result = $conn->query($sql);
        if($row = $result->fetch_assoc())
        {
            ?>
<h3 style="color:black;margin-top:1.3%">Edit Admin Password</h3>
<form method="post">
<table style="border-top:1px solid #A9A9A9;margin-top:1%">
</table><br>
<label style="margin-left: 3%">Enter Current Password </label>
<label style="padding-left:8%;"><input style="height:5%;width:30%" type="password" name="admin_curr_pwd"> </label><br><br>
<label  style="margin-left: 3%">Enter New Password  </label>
<label  style="padding-left:9.7%;"><input style="height:5%;width:30%" type="password" name="admin_new_pwd"> </label><br><br>
<label  style="margin-left: 3%">Re-Enter The Password  </label>
<label  style="padding-left:8.3%;"><input style="height:5%;width:30%" type="password" name="admin_renew_pwd"> </label><br><br>

<button style="margin-left: 25%"name="update_admin_pwd">Update Password</button>

</form><?php
       
     if(isset($_POST['update_admin_pwd']))
     {
         $admin_curr_pwd=$_POST['admin_curr_pwd'];
         $admin_new_pwd=$_POST['admin_new_pwd'];
         $admin_renew_pwd=$_POST['admin_renew_pwd'];
         if(empty($admin_curr_pwd))
         {
             echo "<script>alert('Enter Current Password')</script>";
         }
         else 
         {
             if(empty($admin_new_pwd))
             {
                 echo "<script>alert('Enter New Password')</script>";
             }
             else 
             {
                 if(empty($admin_renew_pwd))
                 {
                     echo "<script>alert('Re-Enter New Password')</script>";
                 }
                 else
                 {
                     if($admin_curr_pwd==$row['Password'])
                     {
                         if($admin_new_pwd==$admin_renew_pwd)
                         {
                             $sqls = "update admin set Password='$admin_new_pwd' where Admin_id='$admin_id'";
                             $results = $conn->query($sqls);
                             if ($results)
                             {
                                 echo "<script>alert('Updated Successfully');
            window.location='index.php?admin_accounts'</script>";
                             }
                         }
                         else 
                         {
                             echo "<script>alert('Re-Enter Password does not match')</script>";
                         }
                        
                     }
                     else 
                     {
                         echo "<script>alert('Password Wrong')</script>";
                     }
                     
                     
                 }
             }
             
           
         }
         
     }
        }
        
    }
}



function delete_admin()
{
    include 'inc/database.php';
    
    $delete_admin_id=$_GET['delete_admin'];
    //echo $delete_product_cat_id;
    $sql = "delete FROM admin where Admin_id='$delete_admin_id'";
    $result = $conn->query($sql);
    if($result)
    {
        echo "<script>alert('Account Deleted Successfully');
                                   window.location='index.php?admin_accounts'</script>";
    }
    
    
}



function viewall_customers()
{
    include 'inc/database.php';
    $sql = "SELECT * FROM users where customer_status='registered' order by uname asc";
    $result = $conn->query($sql);
    $i=1;
    if ($result->num_rows > 0)
    {
        
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>",$i,"</td>";
            echo "<td>",$row['uname'],"</td>";
            echo "<td>",$row['phone'],"</td>";
            echo "<td>",$row['email'],"</td>";
             echo "<td width='10%;'><a href='index.php?viewall_history=".$row['customer_id']."'>View</a></td>";
            //echo "<td><a href='delete_cat.php?delete_sub_cat=".$row['sub_cat_id']."'>Delete</a></td></tr>";
            $i++;
        }
    }
    else
    {   ?>
     <table id="scroll" style='border-top:1px solid #A9A9A9;margin-top:1%"'><tr><td>
     <?php 
        echo "<h4 style='text-align:cenetr;margin-top:20px;'>No Customers</h4></td></tr></table>";
    }
}



function add_text()
{
    
        include 'inc/database.php';
        if(isset($_POST['add_text']))
        {
            $image1text=$_POST['image1text'];
            $image2text=$_POST['image2text'];
            $image3text=$_POST['image3text'];
            $image4text=$_POST['image4text'];
            $image5text=$_POST['image5text'];
            if(empty($image1text) and empty($image2text) and empty($image3text) and empty($image4text) and empty($image5text))
            {
                echo "<script>alert('Please Enter anyone');
                                   window.location='index.php'</script>";
            }
            else 
            {
                $add_text=$conn->prepare("insert into offerstext(Image1,Image2,Image3,Image4,Image5) 
             values('$image1text','$image2text','$image3text','$image4text','$image5text')");
                if($add_text->execute())
                {
                    echo "<script>alert('Text added Successfully');
                                   window.location='index.php'</script>";
                }
                else
                {
                    echo "<script>alert('Please Enter Valid Details')</script>";
                }
            
            }
        }
    
}




function viewall_orders()

{  
}



function viewall_sizes()
{
    include 'inc/database.php';
    $sql = "SELECT * FROM productsize";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0)
    {
        
        while($row = $result->fetch_assoc())
        {
            echo '<td style="border: 1px solid black;height:30px;width:0.5%;
    border-collapse: collapse;padding: 8px;text-align:center;">',$row['size'],"</td>";
        }
    }
}



function view_all_sizes()
{
    include 'inc/database.php';
    $sql = "SELECT * FROM productsize";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0)
    {
        
        while($row = $result->fetch_assoc())
        {
            echo "<option value='".$row['size']."'>".$row['size']."</option>";
        }
    }
}


function view_all_dashorders()
{
    include 'inc/database.php';
    $sql = "SELECT * FROM orders o join customers c on o.customer_id=c.customer_id join products p on p.product_id=o.product_id";
    $result = $conn->query($sql);
    $i=1;
    if ($result->num_rows > 0)
    {
        
        while($row = $result->fetch_assoc())
        {
            
            echo "<tr><td>",$row['order_id'],"</td>";
            echo "<td>",$row['Name'],"</td>";
            if($row['order_status']=='Pendings')
            {
                echo "<td>Pending</td>";
            }
            else 
            {
                echo "<td>",$row['order_status'],"</td>";
            }
            
            echo "<td>",$row['date'],"</td>";
            echo "<td>",$row['total'],".00</td>";
            echo "<td><a style='text-decoration:none;'href='index.php?orders1=".$row['order_id']."'>View</a></td></tr>";
        }
    }
}


function viewall_coupons()
{
    include 'inc/database.php';
    $sql = "SELECT * FROM Coupons";
    $result = $conn->query($sql);
    $i=1;
    if ($result->num_rows > 0)
    {
        
        while($row = $result->fetch_assoc())
        {
            
            echo "<tr><td>",$row['CouponName'],"</td>";
            echo "<td>",$row['Code'],"</td>";
            echo "<td>",$row['CouponDiscount'],"</td>";
            echo "<td>",$row['DateStart'],"</td>";
            echo "<td>",$row['DateEnd'],"</td>";
            echo "<td>",$row['CouponStatus'],"</td>";
            echo "<td><a href='index.php?edit_coupon=".$row['CouponID']."'>Edit</a></td></tr>";
        }
    }
    else 
    {
       echo "<tr><td colspan='5' style='text-align:center;'>No Coupons Available</td></tr>";
    }
    
}


function  add_coupon()
{
    include 'inc/database.php';
    if(isset($_POST['add_coupon']))
    {
        $coupon_name=$_POST['coupon_name'];
        $code=$_POST['code'];
        $type=$_POST['type'];
        $discount=$_POST['discount'];
      
        $totalamount=$_POST['totalamount'];
        $customerlogin=$_POST['customerlogin'];
        $freeshipping=$_POST['freeshipping'];
        $products=$_POST['products'];
        $category=$_POST['category'];
        $datestart=$_POST['datestart'];
        $dateend=$_POST['dateend'];
        $userpercoupon=$_POST['userpercoupon'];
        $userpercustomer=$_POST['userpercustomer'];
        $couponstatus=$_POST['couponstatus'];
        if(empty($coupon_name))
        {
            echo "<script>alert('Please Enter Coupon Name')</script>";
        }
        else
        {
            if(empty($code))
            {
                echo "<script>alert('Please Enter Code')</script>";
            }
            else
            {
                $add_coupon=$conn->prepare("insert into Coupons(CouponName,Code,CouponType,CouponDiscount,CouponTAmount,CustomerLogin,FreeShipping,Products,Category,DateStart,DateEnd,UsesPerCoupon,UsesPerCustomer,CouponStatus) 
values('$coupon_name','$code','$type','$discount','$totalamount','$customerlogin','$freeshipping','$products','$category','$datestart','$dateend','$userpercoupon','$userpercustomer','$couponstatus')");
                if($add_coupon->execute())
                {
                    echo "<script>alert('Coupon added Successfully');
                                   window.location='index.php?coupons'</script>";
                }
                else
                {
                    echo "<script>alert('Coupon Not added Successfully')</script>";
                }
            }
          
        }
        
    }
}





function edit_coupon()
{
    include 'inc/database.php';
    if(isset($_GET['edit_coupon']))
    {
        $coupon_id=$_GET['edit_coupon'];
        $sql = "SELECT * FROM Coupons where CouponID='$coupon_id'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            ?>
<h3 style="color:black;margin-top:1.3%">Edit Coupon From Here</h3>
<form method="post">
<table style="color:black;border-top:1px solid #A9A9A9;margin-top:1%"></table>
<br><label style="margin-left: 3%">Coupon Name</label>
<label style="padding-left:8.2%;"><input  style="height:5%;width:30%" class="textbox" type="text" name="coupon_name" value="<?php echo $row['CouponName'];?>"></label><br><br>

<label style="margin-left: 3%">Code </label>
<label style="padding-left:13.4%;"><input  style="height:5%;width:30%" class="textbox" type="text" name="code" value="<?php echo $row['Code'];?>"></label><br><br>

<label style="margin-left: 3%">Type</label>
<label style="padding-left:13.7%;"><select name="type"><option value="Percentage">Percentage</option>
<option value="FixedAmount">Fixed Amount</option></select></label><br><br>

<label style="margin-left: 3%">Discount</label>
<label style="padding-left:11.4%;"><input  style="height:5%;width:5%" class="textbox" type="text" name="discount" value="<?php echo $row['CouponDiscount'];?>"></label><br><br>

<label style="margin-left: 3%">Total Amount</label>
<label style="padding-left:8.8%;"><input  style="height:5%;width:5%" class="textbox" type="text" name="totalamount" value="<?php echo $row['CouponTAmount'];?>"></label><br><br>

<label style="margin-left: 3%">Customer Login </label>
<label style="padding-left:1%;"><input style="width:20%;height: 21px;" type="radio" name="customerlogin" value="Yes">Yes
<input style="width:20%;height: 21px;" type="radio" name="customerlogin" value="No" checked>No</label><br><br>

<label>
<label style="margin-left: 3%">Free Shipping </label>
<label style="padding-left:2.2%;"><input style="width:20%;height: 21px;" type="radio" name="freeshipping" value="Yes">Yes
<input style="width:20%;height: 21px;" type="radio" name="freeshipping" value="No" checked>No</label><br><br>

<label style="margin-left: 3%">Products</label>
<label style="padding-left:11.6%;"></label><input  style="height:5%;width:30%" class="textbox" type="text" name="products" value="<?php echo $row['Products'];?>"></label><br><br>

<label style="margin-left: 3%">Category </label>
<label style="padding-left:11.6%;"><input  style="height:5%;width:30%" class="textbox" type="text" name="category" value="<?php echo $row['Category'];?>"></label><br><br>


<label style="margin-left: 3%">Date Start </label>
<label style="padding-left:11%;"></label><input  style="height:5%;width:12%" class="textbox"  name="datestart" id="date" type="date" value="<?php echo $row['DateStart'];?>"></label><br><br>

<label style="margin-left: 3%">Date End </label>
<label style="padding-left:11.6%;"><input  style="height:5%;width:12%" class="textbox" type="date" name="dateend" id="date" value="<?php echo $row['DateEnd'];?>"></label><br><br>

<label style="margin-left: 3%">Uses Per Coupon</label>
<label  style="padding-left:7%;"><input  style="height:5%;width:4%" class="textbox" type="text" name="userpercoupon" value="1"></label><br><br>

<label>
<label style="margin-left: 3%">Uses Per Customer</label>
<label  style="padding-left:6%;"><input   style="height:5%;width:4%" class="textbox" type="text" name="userpercustomer" value="1"></label><br><br>

<label style="margin-left: 3%">Status </label>
<label style="padding-left:13.2%;"style="padding-left:13.2%;"><select name="couponstatus"><option value="Enabled">Enabled</option>
<option value="Disabled">Disabled</option></select></label><br><br>
</table>
<center><button name="update_coupon">Update Coupon</button>
</center>
</form><?php
        }
        
    
     if(isset($_POST['update_coupon']))
     {
         $coupon_name=$_POST['coupon_name'];
         $code=$_POST['code'];
         $type=$_POST['type'];
         $discount=$_POST['discount'];
         
         $totalamount=$_POST['totalamount'];
         $customerlogin=$_POST['customerlogin'];
         $freeshipping=$_POST['freeshipping'];
         $products=$_POST['products'];
         $category=$_POST['category'];
         $datestart=$_POST['datestart'];
         $dateend=$_POST['dateend'];
         $userpercoupon=$_POST['userpercoupon'];
         $userpercustomer=$_POST['userpercustomer'];
         $couponstatus=$_POST['couponstatus'];
         if(empty($coupon_name))
         {
             echo "alert('Enter Coupon  Name')";
         }
         else 
         {
             if(empty($code))
             {
                 echo "alert('Enter Coupon Code')";
             }
             else
             {
                 
                 $sqls = "update Coupons set CouponName='$coupon_name',Code='$code',CouponType='$type',CouponDiscount='$discount',CouponTAMount='$totalamount',
CustomerLogin='$customerlogin',FreeShipping='$freeshipping',products='$products',Category='$category',DateStart='$datestart',DateEnd='$dateend',UsesPerCoupon='$userpercoupon',UsesPerCustomer='$userpercustomer',CouponStatus='$couponstatus' where CouponID='$coupon_id'";
                 $results = $conn->query($sqls);
                 if ($results)
                 {
                     echo "<script>alert('Updated Successfully');
            window.location='index.php?coupons'</script>";
                 }
             }
           
         }
         
     }
    }
}




function viewall_guestcustomers()
{
    include 'inc/database.php';
    $sql = "SELECT * FROM users where customer_status='guest' order by uname asc";
    $result = $conn->query($sql);
    $i=1;
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $uname = $row['uname'];
            if(!empty($uname)){
            echo "<tr><td>",$i,"</td>";
            echo "<td>",$row['uname'],"</td>";
            echo "<td>",$row['phone'],"</td>";
            echo "<td>",$row['email'],"</td>";
            echo "<td><a href='index.php?viewall_history=".$row['customer_id']."'>View</a></td>";
            //echo "<td><a href='delete_cat.php?delete_sub_cat=".$row['sub_cat_id']."'>Delete</a></td></tr>";
            $i++;}
        }
    }
    else
    {   ?>
     <table id="scroll" style='border-top:1px solid #400040;margin-top:1%"'><tr><td>
     <?php 
        echo "<h4 style='text-align:cenetr;margin-top:20px;'>No Customers</h4></td></tr></table>";
    }
}




function viewall_completedorders()
{
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
        <table id="scroll" style='border-top:1px solid #A9A9A9;margin-top:1%"'>
<tr>
<th class="sno">S.No</th>
<th>Customer Name</th>
<th>Order ID</th>
<th>Product ID</th>
<th>Product Name</th>
<th>Mobile</th>
<th>Email</th>
<th>Billing Address</th>
<th>Quantity</th>
<th>Price</th>
<th>Payment</th>
<th>Date</th>
</tr>
        <?php 
       
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>",$i,"</td>";
            echo "<td>",$row['Name'],"</td>"; 
            echo "<td>",$row['order_id'],"</td>";
            echo "<td>",$row['product_id'],"</td>";
            echo "<td>",$row['product_name'],"</td>";
            //echo "<td>
              
             // <img src='../images/product_images/".$row['product_img1']."'/>
             // <img src='../images/product_images/".$row['product_img2']."'/>
             // <img src='../images/product_images/".$row['product_img3']."'/>
             // <img src='../images/product_images/".$row['product_img4']."'/>
              //<img src='../images/product_images/".$row['product_img5']."'/>";
             // echo "</td>";
            echo "<td >",$row['Mobile'],"</td>";
            echo "<td >",$row['Email'],"</td>";
            echo "<td>",$row['Address'],"</td>";
            echo "<td>",$row['pquantity'],"</td>";
            echo "<td>",$row['total'],"</td>";
            echo "<td>",$row['Payment'],"</td>";
            echo "<td>",$row['date'],"</td>";
           // echo "<td><a href='index.php?edit_product=".$row['product_id']."'>Edit</a></td>";
           // echo "<td><a href='delete_cat.php?delete_product=".$row['product_id']."'>Delete</a></td></tr>";
            $i++;
        }
        echo "</table>";
    }
    else
    {   ?>
     <table id="scroll" style='border-top:2px solid #A9A9A9;"'><tr><td>
     <?php 
        echo "<h4 style='text-align:cenetr;margin-top:20px;'>No Orders Available</h4></td></tr></table>";
    }
      
    }
    else
    {
    
    
    }
   
}




function send_bulk()
{
    include 'inc/database.php';
    if(isset($_POST['send_bulk']))
    {
        $forwhom=$_POST['forwhom'];
        $msg=$_POST['msg'];
        $subject=$_POST['subject'];
        if(empty($msg))
        {
            echo "<script>alert('Please Enter Message')</script>";
        }
        else
        {
            if($forwhom=='All')
            {
                $sql = "SELECT * FROM customers";
                $result = $conn->query($sql);
                $i=1;
                if ($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        $to=$row['Email'];
                        $subject = "My subject";
                        $txt = "Hello world!";
                        $headers = "From: bhanu.guddaji@gmail.com" . "\r\n" .
                            "CC: bhanu516g@gmail.com";
                        
                        $results=mail($to,$subject,$txt,$headers);
                        
                        
                    }
                    if($results)
                    {
                        echo "<script>alert('Message Send Successfully')</script>";
                    }
                    else
                    {
                        echo "<script>alert('Message not Send')</script>";
                    }
                    
                }
            }
            else
            {
                $sql = "SELECT * FROM customers where customer_status='$forwhom'";
                $result = $conn->query($sql);
                $i=1;
                if ($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        $to=$row['Email'];
                        $subject = "My subject";
                        $txt = "Hello world!";
                        $headers = "From: bhanu.guddaji@gmail.com" . "\r\n" .
                            "CC: bhanu516g@gmail.com";
                        
                        $results=mail($to,$subject,$txt,$headers);
                        
                        
                    }
                    if($results)
                    {
                        echo "<script>alert('Message Send Successfully')</script>";
                    }
                    else
                    {
                        echo "<script>alert('Message not Send')</script>";
                    }
                    
                }
            }
        
        
        }

    }
}




function send_selective()
{
    include 'inc/database.php';
    if(isset($_POST['send_selective']))
    {
        $forwhom=$_POST['forwhom'];
        $orderwise=$_POST['orderwise'];
        $name = $_POST['persons'];
        $msg=$_POST['msg'];
        $subject=$_POST['subject'];
        if(empty($forwhom) and empty($orderwise))
        {
            echo "<script>alert('Please Select Month or Orderwise')</script>";
        }
        
        else
        {
            if(empty($name))
            {
                echo "<script>alert('Please Select Any one Person')</script>";
            }
            else 
            {
                if(empty($msg))
                {
                    echo "<script>alert('Please Enter Message')</script>";
                }
                else 
                {
                    foreach ($name as $persons)
                    {
                        //echo $persons."<br />";
                        $sql = "SELECT * FROM customers where customer_id='$persons'";
                        $result = $conn->query($sql);
                        $i=1;
                        if ($result->num_rows > 0)
                        {
                            if($row = $result->fetch_assoc())
                            {
                                $to=$row['Email'];
                                $subject = "My subject";
                                $txt = "Hello world!";
                                $headers = "From: bhanu.guddaji@gmail.com" . "\r\n" .
                                    "CC: bhanu516g@gmail.com";
                                
                                
                            }
                        }
                        
                    }
                    $results=mail($to,$subject,$txt,$headers);
                    if($results)
                    {
                        echo "<script>alert('Message Send Successfully')</script>";
                    }
                    else
                    {
                        echo "<script>alert('Message not Send')</script>";
                    }
                }
               
            }
       
              
        }
        
    }
}



function update_orderstatus()
{
    include 'inc/database.php';
    if(isset($_GET['update_orderstatus']))
    {
        
        $order_id=$_GET['update_orderstatus'];
        
        $sql = "update orders set order_status='Completed' where order_id='$order_id'";
        $result = $conn->query($sql);
        if($result)
        {
            echo "<script>alert('Updated Successfully');
            window.location='index.php?orders'</script>";
        }
    }
    
    
}
        



function edit_orderstatus()
{
    include 'inc/database.php';
    if(isset($_GET['edit_orderstatus']))
    {
        
        $order_id=$_GET['edit_orderstatus'];
        
        $sql = "update orders set order_status='Pending',order_id_dummy='$order_id' where order_id='$order_id'";
        $sqls = "update orders set order_id_dummy='',tracking_id_dummy='' where order_id!='$order_id'";
        $result = $conn->query($sqls);
        $result = $conn->query($sql);
        if($result)
        {
            echo "<script>
            window.location='index.php?orders'</script>";
            
        }
    }
    
    
}


function edit_orderstatuss()
{
    include 'inc/database.php';
    if(isset($_GET['edit_orderstatuss']))
    {
        
        $order_id=$_GET['edit_orderstatuss'];
        $order_info=explode(",",$order_id);
        $order_id=$order_info['0'];
        $tracking_id=$order_info['1'];
        $sql = "update orders set order_status='Pendings',order_id_dummy='$order_id',tracking_id_dummy='$tracking_id' where order_id='$order_id'";
        $sqls = "update orders set order_id_dummy='',tracking_id_dummy='' where order_id!='$order_id'";
        $result = $conn->query($sqls);
        $result = $conn->query($sql);
        if($result)
        {
            echo "<script>
            window.location='index.php?orders'</script>";
        }
    }
    
    
}


function edit_orderstatus1()
{
    include 'inc/database.php';
    if(isset($_GET['edit_orderstatus1']))
    {
        
        $order_id=$_GET['edit_orderstatus1'];
        
        $sql = "update orders set order_status='Pending',order_id_dummy='$order_id' where order_id='$order_id'";
        $sqls = "update orders set order_id_dummy='',tracking_id_dummy='' where order_id!='$order_id'";
        $result = $conn->query($sqls);
        $result = $conn->query($sql);
        if($result)
        {
            echo "<script>
            window.location='index.php?orders1=$order_id'</script>";
            
        }
    }
    
    
}


function edit_orderstatuss1()
{
    include 'inc/database.php';
    if(isset($_GET['edit_orderstatuss1']))
    {
        
        $order_id=$_GET['edit_orderstatuss1'];
        $order_info=explode(",",$order_id);
        $order_id=$order_info['0'];
        $tracking_id=$order_info['1'];
        $sql = "update orders set order_status='Pendings',order_id_dummy='$order_id',tracking_id_dummy='$tracking_id' where order_id='$order_id'";
        $sqls = "update orders set order_id_dummy='',tracking_id_dummy='' where order_id!='$order_id'";
        $result = $conn->query($sqls);
        $result = $conn->query($sql);
        if($result)
        {
            echo "<script>
            window.location='index.php?orders1=$order_id'</script>";
        }
    }
    
    
}




function viewall_taxbillinfo()
{
    include 'inc/database.php';
    $sql = "SELECT * FROM taxbillinfo";
    $result = $conn->query($sql);
    $i=1;
    if ($result->num_rows > 0)
    {
        $count=1;
        while($row = $result->fetch_assoc())
        {
            
                echo "<tr><td>",$i,"</td>";
                echo "<td>",$row['sgst'],"%</td>";
                echo "<td>",$row['cgst'],"%</td>";
                echo "<td>",$row['Name'],"</td>";
                echo "<td>",$row['Mobile'],"</td>";
                echo "<td>",$row['Email'],"</td>";
                echo "<td>",$row['storeaddress'],"</td>";
               
                echo "<td><a href='index.php?edit_taxbillinfo=".$row['id']."'>Edit</a> / 
 <a href='delete_cat.php?delete_taxbillinfo=".$row['id']."'>Delete</a></td>";
               
                $i++;
        }
    }
    else
    {
        echo "<tr><td colspan='5'><center>No Data Available</center></td>";
      
    }
}




function edit_taxbillinfo()
{
    include 'inc/database.php';
    if(isset($_GET['edit_taxbillinfo']))
    {
        $id=$_GET['edit_taxbillinfo'];
        $sql = "SELECT * FROM taxbillinfo where id='$id'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            ?>
<h3 style="color:black;margin-top:1.3%">Edit Tax/Bill Information From Here</h3>
<form method="post">
<table  style="color:red;border-top:2px solid #A9A9A9;margin-top:1%">
<tr>
<td>State GST :</td>
<td><input type="text" name="sgst" value="<?php echo $row['sgst'];?>" required></td></tr>
<tr>
<td>Central GST :</td>
<td><input type="text" name="cgst" value="<?php echo $row['cgst'];?>" required></td></tr>
<tr>
<td>Name :</td>
<td><input type="text" name="name" value="<?php echo $row['Name'];?>" required></td></tr>
<tr>
<td>Mobile :</td>
<td><input type="text" name="mobile" value="<?php echo $row['Mobile'];?>" required></td></tr>
<tr>
<td>Email :</td>
<td><input type="text" name="email" value="<?php echo $row['Email'];?>" required></td></tr>
<tr>
<td>Store Address :</td>
<td><input type="text" name="storeaddress" value="<?php echo $row['storeaddress'];?>" required></td></tr>
</table>
<center><button name="update_taxbill">Update</button>
</center>
</form><?php
        }
        
    }
     if(isset($_POST['update_taxbill']))
     {
       // echo "hi";
         $sgst=$_POST['sgst'];
         $cgst=$_POST['cgst'];
         $storeaddress=$_POST['storeaddress'];
         $name=$_POST['name'];
         $mobile=$_POST['mobile'];
         $email=$_POST['email'];
         if(empty($sgst))
         {
             echo "alert('Enter State GST')";
         }
         else 
         {
             
             $sqls = "update taxbillinfo set sgst='$sgst',cgst='$cgst',storeaddress='$storeaddress',Name='$name',Mobile='$mobile',Email='$email' where id='$id'";
             $results = $conn->query($sqls);
             if ($results)
             {
                 echo "<script>alert('Updated Successfully');
            window.location='index.php?viewall_taxbillinfo'</script>";
             }
             
         }
         
     }
     
    
}


function delete_taxbillinfo()
{
    include 'inc/database.php';
    
    $id=$_GET['delete_taxbillinfo'];
    //echo $delete_product_cat_id;
    $sql = "delete FROM taxbillinfo where id='$id'";
    $result = $conn->query($sql);
    if($result)
    {
        echo "<script>alert('Deleted Successfully');
                                   window.location='index.php?viewall_taxbillinfo'</script>";
    }
    
    
}






function add_taxbillinfo()
{
    include 'inc/database.php';
    if(isset($_POST['add_taxbillinfo']))
    {
        
        
        $sgst=$_POST['sgst'];
        $cgst=$_POST['cgst'];
        $storeaddress=$_POST['storeaddress'];
        $name=$_POST['name'];
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];
        
        
        if(empty($sgst))
        {
            echo "<script>alert('Please Enter State GST')</script>";
        }
        else
        {
            if(empty($cgst))
            {
                echo "<script>alert('Please Enter Central GST')</script>";
            }
            else
            {
                if(empty($storeaddress))
                {
                    echo "<script>alert('Please Enter Store Address')</script>";
                }
                elseif (!preg_match('/^[789]\d{9}$/',$mobile))
                {
                    echo "<script>alert('Invalid Mobile Number')</script>";
                }
                else
                {
                    
                    $add_taxbillinfo=$conn->prepare("insert into taxbillinfo(sgst, cgst, storeaddress, Name, Mobile, Email)
 values('$sgst','$cgst','$storeaddress','$name','$mobile','$email')");
                    if($add_taxbillinfo->execute())
                    {
                        echo "<script>alert('Information added Successfully');
            
                                   window.location='index.php?taxbillinfo'</script>";
                    }
                    else
                    {
                        echo "<script>alert('Information Not added Successfully')
window.location='index.php?taxbillinfo'</script>";
                    }
                }
                
            }
        }
    }
    
}




function update_taxbillinfo()
{
    include 'inc/database.php';
    if(isset($_POST['update_taxbillinfo']))
    {
        
        
        $sgst=$_POST['sgst'];
        $cgst=$_POST['cgst'];
        $storeaddress=$_POST['storeaddress'];
        $name=$_POST['name'];
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];
        
        
        if(empty($sgst))
        {
            echo "<script>alert('Please Enter State GST')</script>";
        }
        else
        {
            if(empty($cgst))
            {
                echo "<script>alert('Please Enter Central GST')</script>";
            }
            else
            {
                if(empty($storeaddress))
                {
                    echo "<script>alert('Please Enter Store Address')</script>";
                }
                elseif (!preg_match('/^[789]\d{9}$/',$mobile))
                {
                    echo "<script>alert('Invalid Mobile Number')</script>";
                }
                else
                {
                    
                    $add_taxbillinfo=$conn->prepare("update  taxbillinfo set sgst='$sgst',cgst='$cgst',storeaddress='$storeaddress',
Name='$name',Mobile='$mobile',Email='$email'");
                    if($add_taxbillinfo->execute())
                    {
                        echo "<script>alert('Information Updated Successfully');
        
                                   window.location='index.php?taxbillinfo'</script>";
                    }
                    else
                    {
                        echo "<script>alert('Information Not Updated Successfully')
window.location='index.php?taxbillinfo'</script>";
                    }
                }
                
            }
        }
    }
    
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
<script src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#category').on('change',function(){
        var categoryID = $(this).val();
        if(categoryID){
            $.ajax({
                type:'POST',
                url:'ajax.php',
                data:'category_id='+categoryID,
                success:function(html){
                    $('#subcategory').html(html);
                    $('#subsubcategory').html('<option value="">Select Subcategory first</option>'); 
                }
            }); 
        }else{
            $('#subcategory').html('<option value="">Select Category first</option>');
            $('#subsubcategory').html('<option value="">Select MidCategory first</option>'); 
        }
    });
    
    $('#subcategory').on('change',function(){
        var subcategoryID = $(this).val();
        if(subcategoryID){
            $.ajax({
                type:'POST',
                url:'ajax.php',
                data:'subcategory_id='+subcategoryID,
                success:function(html){
                    $('#subsubcategory').html(html);
                }
            }); 
        }else{
            $('#subsubcategory').html('<option value="">Select Subcategory first</option>'); 
        }
    });
});
</script>







</script>

