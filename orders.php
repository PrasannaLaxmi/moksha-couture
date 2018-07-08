<!DOCTYPE html>
<html>
    <head>
        <title>moksha</title>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/fade.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/icons.css">
        <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
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
    <?php include "../includes/header.php"; ?>

<div class="box_login">
        <h1>Login</h1>
        
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
       

        
    </body>
</html>

