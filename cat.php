<div id="bodyright">
<h3 style="color:black;margin-top:1.3%">Categories</h3>

<div id="hover"><button><a href='index.php?add_category'>Add Category</a></button></div>

<form method="post" enctype="multipart/form-data">
<table id="scroll" style='border-top:1px solid #A9A9A9;border-bottom:1px solid #A9A9A9;margin-top:1%'>
<tr>
<th  width='6%'>S.No</th>
<th width="15%">Category Name</th>
<th width="15%">Description</th>
<th width="15%">Mid-category</th>
<th width="10%">Edit</th>
<th>Delete</th></tr>
<style>
table{
   
    table-layout: fixed;
   
}

#scroll td button a:hover{
color:black;
}


</style>
<?php //include 'inc/function.php';
//echo viewall_categories();
include 'inc/database.php';
$sql = "SELECT * FROM main_cat m left outer join sub_cat s on m.cat_id=s.main_cat_id group by m.cat_id";
$result = $conn->query($sql);
$i=1;
if ($result->num_rows > 0)
{
    $count=1;
    while($row = $result->fetch_assoc())
    {
        $count=$row['cat_id'];
        if(!empty($count))
            echo "<tr><td>",$i,"</td>";
            echo "<td>",$row['cat_name'],"</td>";
            echo "<td>",$row['cat_description'],"</td>";
            
            if(empty($row['sub_cat_name']))
            {
                
                echo "<td><div id='c'><button><a href='index.php?add_sub_cat=".$row['cat_id']."'>Add</a></div></button>
               </td>";
                
            }
            else
            {
                echo "<td><div id='c'><button><a  href='index.php?viewall_sub_cat=".$row['main_cat_id']."'>View</a></div></button>
               </td>";
            }
            
            echo "<td><a  href='index.php?edit_cat=".$row['cat_id']."'>Edit</a></td>";
            echo "<td><a   href='delete_cat.php?delete_cat=".$row['cat_id']."'>Delete</a></td></tr>";
            $i++;
    }
}
?>
</table>
</form>
<h3 style="color:black;margin-top:20px;">Available Sizes</h3>
<form method="post" enctype="multipart/form-data">


<table style="width:20%;">
<tr>
<?php 
include 'inc/function.php';
echo viewall_sizes();?>
</tr>
</table>
</form>
<div style="text-align: center;">
<form method="post">
<br>
<label style="margin-left: -5%">Enter Size :</label>
<input class="textbox" type="text" name="product_sizes"></td><td><div id="b"><button  name="add_size">Add Size</button></div></input>

</form>
</div>

</div>
<?php  
echo add_size();?>
 <style>
.textbox { 
    border: 1px solid #A9A9A9; 
    -webkit-border-radius: 30px; 
    -moz-border-radius: 30px; 
    border-radius: 30px; 
    outline:0; 
    height:25px; 
    width: 275px; 
    padding-left:10px; 
    padding-right:10px; 
  } 
 
#hover button
{


    float: left;
    margin-top: -40px;
    margin-left: 75%;
    color: white;
    text-decoration: none;
    font-weight: 15px;
    background: #202020;
    padding: 10px;
    border-radius: 5px;
}


#hover  button:hover {
  background: white;
color:black;
  
}
#hover  button a {
text-decoration:none;
color:white;
}
#hover  button a:hover {
text-decoration:none;
color:black;
}
a
{
text-decoration:none;
}

#b button {
  float: left;
    margin-top: -40px;
    margin-left: 67%;
    color: white;
    text-decoration: none;
    font-weight: 15px;
    background: #202020;
    padding: 10px;
    border-radius: 5px;
  
}
#b  button:hover {
  background: white;
color:black;
  
}
#b  button a {
text-decoration:none;
color:white;
}
#b  button a:hover {
text-decoration:none;
color:black;
}



#c button {
  float: left;
    margin-top: -0%;
    margin-left: 10%;
    color: white;
    text-decoration: none;
    font-weight: 15px;
    background: #202020;
    padding: 10px;
    border-radius: 5px;
  
}
#c  button:hover {
  background: white;
color:black;
  
}
#c  button a {
text-decoration:none;
color:white;
}
#c  button a:hover {
text-decoration:none;
color:black;
}


	</style>
