<?php 
//include 'inc/function.php'; 
//echo edit_cat();

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


<button  name="update_cat_name">Update Category</button>

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
</style>