<div id="bodyright">
<script src="js/jscolor.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">

</script>
<div class="row">
<h3 style="color:black;margin-top:1.3%">Add New Products From Here</h3>
<form method="post" enctype="multipart/form-data">
<div class="col-sm-3 add_product">
  <label style="margin-left: 3%;padding-bottom:1px;">Enter Product Name Here </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Enter Product Id Here </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Enter Product Description </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Select Category Name </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Select MidCategory Name </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Select SubCategory Name </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Select Product Image1 </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Select Product Image2 </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Select Product Image3 </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Select Product Image4 </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Select Product Image5</label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Enter Product Keywords </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Enter Product Color </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Enter Product Size </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Enter Product Price </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Enter Product Discount </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Select Stcock Availability </label><br/>
  <label style="margin-left: 3%;padding-bottom:1px;">Select Product Priroity </label><br/>

</div>
<div class="col-md-6 add_pro_input">
<label style=""><input style="width: 35em;" class="form-control" type="text" name="product_name" required></label><br/>

<label style=""><input class="form-control" style="width: 35em;" type="text" name="product_id" required></label><br/>

<label style=""><input style="width: 35em;" class="form-control" type="text" name="product_description"></label><br/>

<label class="sel_cat_name" style=""><select style="width: 35em;" class="form-control" class="form-control" name="main_cat" id="category">
<option>Select Category</option>
<?php 
include 'inc/function.php'; echo view_all_categories();
?>
</select></label><br>

<label style=""><select style="width: 35em;" class="form-control" name="sub_cat" id="subcategory">
<option>Select Mid Category First</option>
</select></label><br>

<label style=""><select style="width: 35em;" class="form-control" name="sub_sub_cat" id="subsubcategory">
<option>Select SubCategory First</option>
</select></label><br>

<label style=""><input style=""  type="file" name="img1"></label><br>

<label style=""><input  style=""  type="file" name="img2"></label><br>

<label style=""><input  style=";"  type="file" name="img3"></label><br>

<label style=""><input  style=""  type="file" name="img4"></label><br>

<label style=""><input   style="" type="file" name="img5"></label><br>

<label style=""><input style="width: 35em;" class="form-control" type="text" name="keywords"></label><br>

<label style=""><!--<input  type="color" name="color"><input class="jscolor {required:false}"  type="hidden" >  -->
<select style="width:35em;" class="form-control" name="color" >
<option value="" style="width: 35em;">Select Color</option>
<option value="Red" id="one" style="background:#FF0000">Red</option>
<option value="Blue" id="three" style="background:  #1E90FF">Blue</option>
<option value="Orange" id="five" style="background: #FF4500">Orange</option>
<option value="Green" id="four" style="background:#008000">Green</option>
<option value="Yellow" id="two" style="background:#FFFF00">Yellow</option>
<option value="Purple" id="eight" style="background:#800080">Purple</option>
<option value="Pink" id="nine" style="background:#ff69b4">Pink</option>
<option value="Gray" id="eleven" style="background:#808080">Gray</option>
<option value="Brown" id="six" style="background: #8B4513">Brown</option>
<option value="White" id="ten" style="background:white">White</option>
<option value="Black" id="seven" style="background:black">Black</option>
<option value="Magenta" id="twelve" style="background:#660033">Magenta</option>
<option value="Maroon" id="fourteen" style="background:#800000">Maroon</option>
<option value="Peach" id="thirteen" style="background:#FF8362 ">Peach</option>
<option value="Rust" id="fourteen" style="background:#b7410e">Rust</option>    
</select></label><br>

<label style=""><select style="width:35em;" class="form-control" name="size">
<?php 
 echo view_all_sizes();
?>
</select></label><br>
<label>

<label style=""><input style="width: 35em;" class="form-control" type="text" name="price" required></label><br>


<label style=""><input style="width: 35em;" class="form-control" type="text" name="discount"></label><br>

<label style="">
<select  style="width:35em;" class="form-control" name="stock_availability" >
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
</label ><br>

<label style=""><select style="width:35em;" class="form-control" name="product_priority">
<option value="High">High</option>
<option value="Medium">Medium</option>
<option value="Low">Low</option>
</select></label><br>

</div>
</form>
</div>


<table style="border-top:1px solid #A9A9A9;margin-top:1%">
</table><br>










<center><button  name="add_product">Add product</button>
</center>
</form>
</div>
<?php 
include 'inc/database.php';
if(isset($_POST['add_product']))
{
    
    
    $product_name=$_POST['product_name'];
    $product_id=$_POST['product_id'];
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
    $discount=$_POST['discount'];
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
    else{
        if(empty($product_id)){
            echo "<script>alert('Please Enter Product Id')</script>";
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
                          $add_products=$conn->prepare("insert into products(product_id, product_name, cat_id, sub_cat_id,sub_sub_cat_id, product_desc,
product_img1, product_img2, product_img3, product_img4, product_img5, product_color, product_size, product_price,keywords,
Product_stock_avail, product_priroty,product_discount)
 values('$product_id','$product_name','$cat_id','$sub_cat_id','$sub_sub_cat_id','$product_desc','$product_img1','$product_img2','$product_img3','$product_img4',
'$product_img5','$product_color','$product_size','$product_price','$keywords','$product_stock_avail','$product_prority','$discount')");
                          if($add_products->execute())
                          {
                              echo "<script>alert('Product added Successfully');
                             
                                   window.location='index.php?viewall_products'</script>";
                          }
                          else
                          {
                              echo "<script>alert('Product Not added Successfully')</script>";
                          }
                      }
          
                  }
              }
          }
      }
 }
    }
    
}

?>
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

@media only screen and (min-width: 1920px) {
bodyright .sel_cat_name{
padding-left:10.5%;
}
}
</style>
