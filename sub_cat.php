<div id="bodyright">
<?php 
include 'inc/database.php';
if(isset($_GET['viewall_sub_cat']))
{
    $cat_id=$_GET['viewall_sub_cat'];
    $sqls = "SELECT * FROM  main_cat  where cat_id='$cat_id'";
    $results = $conn->query($sqls);
    $i=1;
    if ($results->num_rows > 0)
    {
        if($rows = $results->fetch_assoc())
    echo '<h3 style="color:black;">Category : ',$rows['cat_name'],'</h3>';
    echo "<button><a href='index.php?add_sub_cat=".$cat_id."'>Add</a></button>";
    ?>
      
      
      
       <table id="scroll" style="border-top:1px solid #400040;">
<tr>
<th width='1%'>S.No</th>
<th>Mid-Category Name</th>
<th>Description</th>
<th>Subcategory</th>
<th>Edit</th>
<th>Delete</th></tr>

<style>
table{
   
    table-layout: fixed;
   
}


</style>

      <?php
    }
    $sql = "SELECT * FROM  main_cat m  join  sub_cat s on s.main_cat_id=m.cat_id left outer join sub_sub_cat ss on s.sub_cat_id=ss.subcat_id  where m.cat_id='$cat_id' GROUP BY  sub_cat_id";
    $result = $conn->query($sql);
    $i=1;
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            
      echo "<tr><td>",$i,"</td>";
      echo "<td>",$row['sub_cat_name'],"</td>";
      echo "<td>",$row['sub_cat_desc'],"</td>";
      if(empty($row['sub_sub_cat_name']))
      {
          
          echo "<td><button style='margin-right: 38%;'><a href='index.php?add_sub_sub_cat=".$row['sub_cat_id']."'>Add</a></button>
             </td>";
          
      }
      else
      {
          echo "<td><button style='margin-right: 38%;'><a href='index.php?viewall_sub_sub_cat=".$row['sub_cat_id']."'>View</a></button>
               </td>";
      }
      echo "<td><a href='index.php?edit_sub_cat=".$row['sub_cat_id']."'>Edit</a></td>";
      echo "<td><a href='delete_cat.php?delete_sub_cat=".$row['sub_cat_id']."'>Delete</a></td></tr>";
      $i++;
        }
    }
}
?>
<style>
#bodyright  button
{

float:right;margin-top:-2%;margin-right:5%;
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
    clear:both;

}
#bodyright  button:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
	
#bodyright  button a
{
 text-decoration: none;
}
 #bodyright
{
overflow:scroll;

}
</style>
