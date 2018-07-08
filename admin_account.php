<div id="bodyright">
<h3 style="color:black;margin-top:1.3%;">Admin Information</h3>
<form method="post" enctype="multipart/form-data">
<table id="scroll" style="margin-top:1%;border-top:1px solid #A9A9A9;border-bottom:1px solid #A9A9A9;" >
<tr>
<th width='5%'>S.No</th>
<th>Name</th>
<th>User Name</th>
<th>Password</th>
<th>Mobile</th>
<th  width='25%'>Email</th>
<th>Delete</th>
</tr>
<style>
table{
   
    table-layout: fixed;
   
}


</style>
<?php include 'inc/function.php';
echo viewall_admins();?>
</table><br>
</form>
<div class="row">
<h3 style="color:black;">Add Account</h3>
<form method="post">

<div class="col-sm-3 add_product">

<label style="margin-left: 3%;padding-bottom:5px;">Enter Name </label><br>
<label style="margin-left: 3%;padding-bottom:5px;">Enter User Name </label><br>
<label style="margin-left: 3%;padding-bottom:5px;">Enter Password </label><br>
<label style="margin-left: 3%;padding-bottom:5px;">Enter Mobile </label><br>
<label style="margin-left: 3%;padding-bottom:5px;">Enter Email</label><br>

</div>

<div class="col-md-6 add_pro_input">

<label style=""><input style="width:35em;" class="form-control" type="text" name="admin_name" required></label><br>
<label style=""><input style="width:35em;" class="form-control" type="text" name="admin_username" required></label><br>
<label style=""><input style="width:35em;" class="form-control" type="password" name="admin_password" required></label><br>
<label style=""><input style="width:35em;" class="form-control" type="text" name="admin_mobile" required></label><br>
<label style=""><input style="width:35em;" class="form-control" type="text" name="admin_email" required></label><br>

</div>












<div id="hover"><button  name="add_admin">Save</button></div><br>

</form>
</div>
</div>
<?php  echo add_admin(); ?>
<style>

#hover button
{

margin-top: 1%;
    
    color: white;
    text-decoration: none;
    font-weight: 15px;
    background: #202020;
    padding: 10px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 15px;
    padding: 4px 10px 4px 12px;
    margin-left:30%
}
#hover button:hover
{
background-color:white;
color:black;
}
a{

text-decoration:none;
color:black;
}
a:hover
{
color:blue;
}

</style>




