<div id="bodyright">
<h3 style="color:black;margin-top:1.3%;">Guest Customers</h3>
<form method="post" enctype="multipart/form-data">
<table id="scroll" style="margin-top:1%;border-top:1px solid #A9A9A9">
<tr>
<th width="6%">S.No</th>
<th width="15%">Name</th>
<th  width="15%">Mobile</th>
<th  width="20%">Email</th>
<th>View</th>
</tr>

<?php include 'inc/function.php';
echo viewall_guestcustomers();?>
</table>
</form>
<style>
table{
   
    table-layout: fixed;
   
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
</div>