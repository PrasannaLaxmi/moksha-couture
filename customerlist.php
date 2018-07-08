<?php 
if(isset($_GET['category1'])  && !empty($_GET['category1']))
{
include 'inc/database.php';
$categoryid1=$_GET['category1'];
$sql="SELECT COUNT( o.customer_id ) count, c.Name,c.customer_id
FROM orders o
JOIN customers c ON c.customer_id = o.customer_id
GROUP BY o.customer_id
HAVING COUNT( o.customer_id ) >=$categoryid1";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    if ($result->num_rows == 1)
    {
        
        while($row = $result->fetch_assoc())
        {
            ?>
       <input style="width:2.2%;text:inline;" type="checkbox" id="persons" class="checkbox" name="persons[]" value="<?php echo $row['customer_id'];?>"><?php echo $row['Name'];echo 	"&nbsp	&nbsp	&nbsp Orders &nbsp"," - 	&nbsp";echo $row['count'];?>
   <br><?php 
    }
    }
    else
    {
        
        ?>
    <input style="width:2.2%;text:inline;" type="checkbox" name="select-all" id="select_all" />All<br>
    <?php
    while($row = $result->fetch_assoc())
    {
        ?>
       <input style="width:2.2%;text:inline;" type="checkbox" id="persons" class="checkbox" name="persons[]" value="<?php echo $row['customer_id'];?>"><?php echo $row['Name'];echo 	"&nbsp	&nbsp	&nbsp Orders &nbsp"," - 	&nbsp";echo $row['count'];?>
   <br><?php 
    }
    }
}
else
{
    echo "No Data Available";
  
}


}

else {
    echo "No Data Available";
}
?>
<script>
var select_all = document.getElementById("select_all"); //select all checkbox
var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items

//select all checkboxes
select_all.addEventListener("change", function(e){
    for (i = 0; i < checkboxes.length; i++) { 
        checkboxes[i].checked = select_all.checked;
    }
});


for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener('change', function(e){ //".checkbox" change 
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){
            select_all.checked = false;
        }
        //check "select all" if all checkbox items are checked
        if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
            select_all.checked = true;
        }
    });
}
</script>