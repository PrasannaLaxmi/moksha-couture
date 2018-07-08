<div id="bodyright">
<?php 
include 'inc/database.php';
if(isset($_GET['add_sub_sub_cat']))
{
    $subcat_id=$_GET['add_sub_sub_cat'];
    $sqls = "SELECT * FROM  sub_cat  where sub_cat_id='$subcat_id'";
    $results = $conn->query($sqls);
    $i=1;
    if ($results->num_rows > 0)
    {
        if($rows = $results->fetch_assoc())
            echo '<div class="row"> <h3 style="color:black;margin-top:1.3%">Mid-Category : ',$rows['sub_cat_name'],'</h3>';
    }
    ?>
    <form method="post">
<div class="col-sm-3 add_product">

<label style="margin-left: 3%;padding-bottom:15px;">Enter Sub Category Name</label>
<label style="margin-left: 3%;padding-bottom:5px;">Enter Sub Category Description </label>

</div>
<div class="col-md-6 add_pro_input">

<label style=""><input  style="width: 35em;" type="text" class="form-control" name="sub_sub_cat_name"><input type="hidden" name="subcat_id" value="<?php echo $subcat_id;?>"></label><br><br>


<label style=""><input style="width: 35em;" class="form-control" type="text" name="sub_sub_cat_desc"></label><br><br>
</div>
<button name="add_sub_sub_cat">Add Sub Category</button>

</form>
</div>
<?php 
}
include 'inc/function.php';
echo add_sub_sub_cat();
?></div>
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