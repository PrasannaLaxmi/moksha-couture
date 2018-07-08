 
<?php
//Include database configuration file
include 'inc/database.php';

if(isset($_POST["category_id"]) && !empty($_POST["category_id"])){
    //Get all state data
    $categoryid=$_POST['category_id'];
    $sql = "SELECT * FROM sub_cat where main_cat_id='$categoryid'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<option value='".$row['sub_cat_id']."'>".$row['sub_cat_name']."</option>";
        }
    }
    else
    {
        echo "<option value=''>No MidCategory Available</option>";
    }
}

if(isset($_POST["subcategory_id"]) && !empty($_POST["subcategory_id"])){
    //Get all city data
    $subcategory_id=$_POST['subcategory_id'];
    $sql = "SELECT * FROM sub_sub_cat where subcat_id='$subcategory_id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<option value='".$row['sub_sub_cat_id']."'>".$row['sub_sub_cat_name']."</option>";
        }
    }
    else
    {
        echo "<option value=''>No SubCategory Available</option>";
    }
}
?>




?>
