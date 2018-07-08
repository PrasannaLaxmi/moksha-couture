<div id="bodyright">
<?php 
include 'inc/database.php';
if(isset($_GET['viewall_sub_sub_cat']))
{
    $subcat_id=$_GET['viewall_sub_sub_cat'];
    $sqls = "SELECT * FROM  sub_cat  where sub_cat_id='$subcat_id'";
    $results = $conn->query($sqls);
    $i=1;
    if ($results->num_rows > 0)
    {
        if($rows = $results->fetch_assoc())
          echo '<h3 style="color:black;margin-top:1.3%">Mid-Category : ',$rows['sub_cat_name'],'</h3>';
           
   
    ?>
<div id="rightt">
<div id="hover"><button><a href='index.php?add_sub_sub_cat=<?php echo $rows['sub_cat_id'];?>'>Add Sub-Category</a></button></div>
</div>
<form method="post" enctype="multipart/form-data">
<table id="scroll" style='border-top:1px solid #A9A9A9;margin-top:1%'>
<tr>
<th width='6%'>S.No</th>
<th width="15%">Sub-Category Name</th>
<th width="15%">Description</th>
<th width="10%">Edit</th>
<th>Delete</th></tr>
 <?php
    }
}
if(isset($_GET['viewall_sub_sub_cat']))
{
    $subcat_id=$_GET['viewall_sub_sub_cat'];
    $sqls = "SELECT * FROM  sub_cat  where sub_cat_id='$subcat_id'";
    $results = $conn->query($sqls);
    $i=1;
    if ($results->num_rows > 0)
    {
$sql = "SELECT * FROM  main_cat m  join  sub_cat s on s.main_cat_id=m.cat_id left outer join sub_sub_cat ss on s.sub_cat_id=ss.subcat_id  where s.sub_cat_id='$subcat_id'";
$result = $conn->query($sql);
$i=1;
if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        
        echo "<tr><td>",$i,"</td>";
        echo "<td>",$row['sub_sub_cat_name'],"</td>";
        echo "<td>",$row['sub_sub_cat_desc'],"</td>";
        
        echo "<td><a  href='index.php?edit_sub_sub_cat=".$row['sub_sub_cat_id']."'>Edit</a></td>";
        echo "<td><a  href='delete_cat.php?delete_sub_sub_cat=".$row['sub_sub_cat_id']."'>Delete</a></td></tr>";
        $i++;
    }
}
}
}
?>

<style>
table{
   
    table-layout: fixed;
   
}


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
    margin-left: 8%;
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
</style></table></form></div>
