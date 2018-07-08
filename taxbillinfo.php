<?php 
   include 'inc/database.php';
   $sql = "SELECT * FROM taxbillinfo";
    $result = $conn->query($sql);
  
        if($row = $result->fetch_assoc())
        {
        
       
    ?>
<div id="bodyright">
<div class="row">
<h3 style="color:black;margin-top:1.3%">Add Tax/Bill Information</h3>
<form method="post">

<div class="col-sm-3 add_product">

<label style="margin-left: 3%;padding-bottom:3px;">State GST</label><br/>
<label style="margin-left: 3%;padding-bottom:3px;">Central GST</label><br/>
<label style="margin-left: 3%;padding-bottom:3px;">Store Name</label><br/>
<label style="margin-left: 3%;padding-bottom:3px;">Store Phone</label><br/>
<label style="margin-left: 3%;padding-bottom:3px;">Store Email</label><br/>
<label style="margin-left: 3%;padding-bottom:3px;">Store Address</label><br/>

</div>

<div class="col-md-6 add_pro_input">

<label style=""><input style="width:35em;" class="form-control" type="text" name="sgst" value="<?php echo $row['sgst'];?>" required onclick="changeButton();"></label><br>
<label style=""><input style="width:35em;" class="form-control" type="text" name="cgst" value="<?php echo $row['cgst'];?>" required></label><br>
<label style=""><input style="width:35em;" class="form-control" type="text" name="name" value="<?php echo $row['Name'];?>" required></label><br>
<label style=""><input style="width:35em;" class="form-control" type="text" name="mobile" value="<?php echo $row['Mobile']?>" required></label><br>
<label style=""><input style="width:35em;" class="form-control" type="email" name="email" value="<?php echo $row['Email'];?>" required></label><br>
<label style=""><input style="width:35em;" class="form-control" type="text" name="storeaddress" value="<?php echo $row['storeaddress'];?>" required></label><br>


</div>













<?php 
if(!empty($row['sgst']))
{
   echo ' <center><div id="hover"><button  name="update_taxbillinfo">Update</button></div>
    </center>';
}

else
{
   echo ' <center><div id="hover"><button  name="add_taxbillinfo">Save</button></div>
    </center>';
}
        }
?>

</form>
</div>
</div>
<?php
include 'inc/function.php';
echo add_taxbillinfo();
echo update_taxbillinfo();
?>
