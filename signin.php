<!DOCTYPE html>
<html>
	<head>
		<title>moksha</title>
		<meta charset="utf-8">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/fade.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/icons.css">
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript"></script>		
	</head>
	<style>


		
	#content_wrapper{
position: absolute;
    background: rgba(0,0,0,0.75);
    z-index: 112;
    margin-top: -664px;
    height:760px;
    width:100%;
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
<div class="box_login">
		<h1>Login</h1>
		<div id="close-btn"><span style="position: absolute;
    right: 38%;
    cursor:pointer;;
    display: block;
    background: white;
    border-radius: 50%;
    font-weight: bold;
    color: black;
    top: 61px;
    padding: 4px;">X</span></div>
			<form method="post" action="check_log.php">
				<label>User Name or Email</label>
				<input type="text" name="uname"  class="email" required />
				<label>Password</label>
				<a href="forgotpwd.php" id="forgot_pwd" style="text-decoration:none;padding-left:35%;">Forgot Password</a>
				<input type="password" name="pwd"  class="email" required />
				<input type="submit" class="btn" value="Sign In"> <!-- End Btn -->
			</form><br/><br/><br/><br/>
			<div style="margin-left:77px;position: relative;top: 2px;padding-top: 1px;margin-bottom: 14px;line-height: 0;"><h5>New to Moksha?</h5></div>
				<a href="#"><div id="btn21">Create an Account</div></a> <!-- End Btn2 -->
				<div style="margin-left:77px;position: relative;top: 2px;padding-top: 1px;margin-bottom: 14px;line-height: 0;"><h5>Login as a guest?</h5></div>
				<a href="#"><div id="btn23">Login As Guest</div></a> 
</div> <!-- End Box -->
	   
<div class="box_signup">
	<h1>Sign up</h1>
	<form method="post" action="check.php">
		<input type="text" name="uname" placeholder="user name" onFocus="field_focus(this, 'uname');" onblur="field_blur(this, 'uname');" class="email" 
		required />
		<input type="text" name="email" placeholder="email" class="email" required />
		<input type="text" name="phone" placeholder="phone number" class="email" required />
		<input type="password" name="pwd" placeholder="password" class="email" required />
		<input type="password" name="re_pwd" placeholder="re enter password" class="email" required />
		<input type="submit" id="btn21" value="Sign Up"/> 
		</form>
			<div style="margin-left:77px;position: relative;top: 2px;padding-top: 1px;margin-bottom: 14px;line-height: 0;"><h5>Already a User?</h5></div>
	<a href="#"><div id="btn22">Login</div></a> <!-- End Btn2 -->
 	
 <!-- End Box -->
 </div>
 
 <div class="box_guest">
	<h1>Guest</h1>
	<form method="post" action="guest.php">
		<input type="text" name="uname" placeholder="user name" onFocus="field_focus(this, 'uname');" onblur="field_blur(this, 'uname');" class="email" 
		required />
		<input type="text" name="email" placeholder="email" class="email" required />
		<input type="text" name="phone" placeholder="phone number" class="email" required />
		<input type="submit" id="btn24" value="Submit"/> 
		</form>
 <!-- End Box -->
 </div>

 <div class="box_forgot">
		<h1>Forgot Password</h1>
			<form method="post" action="forgotpwd.php">
				<input type="text" name="phonenumber" placeholder="enter your phone number"  class="email" required />
				<input type="password" name="pwd" placeholder="password" class="email" required/>
				<input type="submit" class="btnreset"  value="Reset"/> 
				<!-- End Btn -->	</form>
  </div> <!-- End Box -->
  </div>


	<!--	$('#filtersubmit').click(function() { 
    alert('Searching for '+$('#filter').val());
});
-->
		
	</body>
</html>

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

    $("#btn23").click(function(){
        $(".box_login").hide();
		$(".box_signup").hide();
		$(".box_guest").show();
		
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

		$("#close-btn").click(function(){
        $("#content_wrapper").hide();
		
		
    });
});


</script>