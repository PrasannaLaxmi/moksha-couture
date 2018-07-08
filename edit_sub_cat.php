<?php 
//include 'inc/function.php'; 
//echo edit_sub_cat();
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