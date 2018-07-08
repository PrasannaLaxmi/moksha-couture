<?php 
if(isset($_GET['subcategory'])  && !empty($_GET['subcategory']))
{
include 'inc/database.php';
$categoryid=$_GET['subcategory'];
$sql = "SELECT * FROM sub_sub_cat where subcat_id='$categoryid'";
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

else {
    echo "error";
}
?>