<div id="bodyright">
<div class="row">
<h3 style="color:black;margin-top:1.3%">Add New Category</h3>
<form method="post" >
<div class="col-sm-3 add_product">

<label style="margin-left: 3%;padding-bottom:1px;">Enter Category Name</label><br>
<label style="margin-left: 3%;padding-bottom:1px;">Enter Category Description</label>

</div>

<div class="col-md-6 add_pro_input">

<label style=""><input style="width: 35em;" class="form-control" type="text" name="cat_name"></label><br>
<label style=""><input style="width: 35em;" class="form-control" type="text" name="cat_description"></label><br>
<button  name="add_cat">Add Category</button>

</div>
</form>

<?php 
include 'inc/function.php';
 echo add_cat();
?>
</div>
</div>

<style>
#bodyright form button:hover{
color:black;
}


</style>
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