<?php 
/*include 'inc/database.php';
if(isset($_POST['add_product']))
{
    
    
    $product_name=$_POST['product_name'];
    $cat_id=$_POST['main_cat'];
    $sub_cat_id=$_POST['sub_cat'];
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
                          $add_products=$conn->prepare("insert into products(product_name, cat_id, sub_cat_id, product_desc,
product_img1, product_img2, product_img3, product_img4, product_img5, product_color, product_size, product_price,keywords,
Product_stock_avail, product_priroty)
 values('$product_name','$cat_id','$sub_cat_id','$product_desc','$product_img1','$product_img2','$product_img3','$product_img4',
'$product_img5','$product_color','$product_size','$product_price','$keywords','$product_stock_avail','$product_prority')");
                          if($add_products->execute())
                          {
                              echo "<script>alert('Product added Successfully')</script>";
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
    
}*/
?>


<?php 
include 'inc/function.php'; 
echo edit_product();?>