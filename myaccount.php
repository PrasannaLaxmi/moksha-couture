<?php $flag=1;?>
<style>

		
	#content_wrapper{
height:140px;
}	

.btnreset
{
 background:#2ecc71;
  width:125px;
  padding-top:5px;
  padding-bottom:5px;
  color:white;
  border-radius:4px;
  border: #27ae60 1px solid;
  
  margin-top:20px;
  margin-bottom:20px;
  float:left;
  margin-left:85px;
  font-weight:750px;
  font-size:12px;
}
		
	</style>
	<body>
<div id="content_wrapper">
<?php include 'includes/header.php';?>
<div class="box_myacc">
	<?php //getMyAcc();
$cid=$_SESSION['user_id'];
//echo $cid;
$get_drop = "select * from users where user_id='$cid'";
$run_get_drop = mysql_query($get_drop);

while($row_pro=mysql_fetch_array($run_get_drop)){
    $cus_name = $row_pro['uname'];
    $cus_pwd = $row_pro['pwd'];
    $cus_mob = $row_pro['phone'];
    $cus_mail = $row_pro['email'];
    
    $cus_status = $row_pro['customer_status'];
    
  
    echo"
<div class='container' style='border:1px solid grey'>
    
            <h4>MY ACCOUNT</h4>
            
           <form method='post' enctype='multipart/form-data' action='update_my.php'>

                <div class='form-group'>
                    <input type='text' class='form-control' value='$cus_name' id='exampleInputusername' name='name' placeholder='Enter User Name' required>
                </div>
                
                <div class='form-group'>
                    <input type='text' class='form-control' value='$cus_pwd' id='exampleInputusername' name='pwd' placeholder='Enter password' required>
                </div>
                <div class='form-group'>
                    <input type='email' class='form-control' id='exampleInputEmail1' name='email'  value='$cus_mail' aria-describedby='emailHelp' placeholder='Enter email' required>
                </div>
                <div class='form-group'>
                    <input type='text' class='form-control' name='mobile' value='$cus_mob' id='exampleInputPhone' placeholder='Enter your phone number' required>
                </div>
          
                <button id='snd' style='background:#272727;
						padding:5px;color:white;border:border: 1px solid #eaeaea;'>Update</button>
            </form>
    
</div>




";
	}?>	
</div> <!-- End Box -->
	<?php include'includes/footer.php';?>   
 
 

	<!--	$('#filtersubmit').click(function() { 
    alert('Searching for '+$('#filter').val());
});



-->
		
	</body>
</html>
<?php 
if(isset($_POST['update_account']))
{
    
    
    $name=$_POST['name'];
    $pwd=$_POST['pwd'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $add=$_POST['add'];
    echo $name;
    if(empty($name) or empty($pwd) or empty($mobile) or empty($email) or empty($add))
    {
        echo "<script>alert('Please fill all details')</script>";
    }
    else
    {
        $sqls = "update customers set Name='$name',Password='$pwd',Mobile='$mobile',Email='$email',Address='$add'  where customer_id='$cid'";
        $results = mysql_query($sqls);

        if ($results)
        {
            echo "<script>alert('Updated Successfully');
            window.location='products.php'</script>";
        }
    }
    
}
?>
<script>


 	$(document).ready(function(){
				$('.dropbtn').click(function(){
				    $('.dropdown-content').toggle("slow");
				    });


    $("#btn21").click(function(){
        $(".box_login").hide();
		$(".box_signup").show();
		
    });

    $("#btn22").click(function(){
        $(".box_login").show();
		$(".box_signup").hide();
		
    });
	
	$("#log_click").click(function(){
        $(".box_signup").hide();
		$(".box_login").show();
		
    });
	
	$("#forgot_pwd").click(function(){
        $(".box_signup").hide();
		$(".box_login").hide();
		$(".box_forgot").show();
		
		
    });
});


</script>