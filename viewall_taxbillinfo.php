<div id="bodyright">
<h3 style="color:red;">Tax/Bill information</h3>
<div id="rightt">
<button><a href='index.php?taxbillinfo'>Add</a></button>
</div>
<form method="post" enctype="multipart/form-data">
<table id="scroll" style='border-top:2px solid #400040;'>
<tr>
<th>S.No</th>
<th>GST</th>
<th>CGST</th>
<th>Name</th>
<th>Mobile</th>
<th>Email</th>
<th>Store Address</th>
<th>Action</th></tr>

<?php include 'inc/function.php';
echo viewall_taxbillinfo();?>
</table>
</form>

</div>

 <style>

 #bodyright
{
overflow:scroll;

}


#rightt  button
{

float:right;margin-top:-2%;
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;

  text-decoration: none;
  font-size: 15px;
    padding: 4px 10px 4px 12px;

}
#rightt  button:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
	
#rightt button a
{
 text-decoration: none;
}
	</style>
