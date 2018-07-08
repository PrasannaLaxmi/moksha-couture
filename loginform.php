<!DOCTYPE HTML>
<html>
<head>
<title>LoginForm</title>
<!-- Using external stylesheet to make the registration form look attractive -->
<link rel = "stylesheet" type = "text/css" href="css/styles.css"/>
<!-- Javascript validation for user inputs -->
<script type="text/javascript">
function validate()
{
var username = document.login.username.value;
var password = document.login.password.value;
if (username==null || username=="")
{
alert("Username can't be blank");
return false;
}
else if (password==null || password=="")
{
alert("password can't be blank");
return false;
}
}
</script>
<style>
body
{
	
	
	font-family:calibri;
}
</style>
</head>
<body>
  <div class="vid-container">
  <video id="Video1" class="bgvid back" autoplay="false" muted="muted" preload="auto" loop>
      <source src="http://shortcodelic1.manuelmasiacsasi.netdna-cdn.com/themes/geode/wp-content/uploads/2014/04/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
  </video>
  <div class="inner-container">
    <video id="Video2" class="bgvid inner" autoplay="false" muted="muted" preload="auto" loop>
      <source src="http://shortcodelic1.manuelmasiacsasi.netdna-cdn.com/themes/geode/wp-content/uploads/2014/04/milky-way-river-1280hd.mp4.mp4" type="video/mp4">
    </video>
    <div class="box">
    <h1>Admin Login</h1>
      <form name="login" method="post" action="loginform.php" onsubmit="return validate();" >
<div><label><input type="text" name="username" placeholder="Username"/> </label></div>
<div><label><input type="password" name="password" placeholder="Password"/></label> </div>
<div><button type="submit">Login</button></div>
</form>
      
   
<?php
include 'inc/database.php';
session_start(); //always start a session in the beginning
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
if (empty($_POST['username']) || empty($_POST['password'])) //Validating inputs using PHP code
{
echo "Incorrect username or password";
//header("location: LoginForm.php");//You will be sent to Login.php for re-login
} 
$inUsername = $_POST["username"]; // as the method type in the form is "post" we are using $_POST otherwise it would be $_GET[]
$inPassword = $_POST["password"];

$sql = "SELECT * FROM admin where UserName='$inUsername' and Password='$inPassword'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc())
{

$_SESSION['username']=$inUsername; //Storing the username value in session variable so that it can be retrieved on other pages
//echo $_SESSION['username'];

header("location: index.php?dashboard"); // user will be taken to profile page
}
else
{
echo "<br><center><p style>Invalid Login Details</p></center>"; 


}
}
?>
<script>
//Easy way to wait for all videos to load before start playing

var promises = [];
function makePromise(i, video) {
  promises[i] = new $.Deferred();
  // This event tells us video can be played all the way through, without stopping or buffering
  video.oncanplaythrough = function() {
    // Resolve the promise
    promises[i].resolve();
  }
}
// Pause all videos and create the promise array
$('video').each(function(index){
  this.pause();
  makePromise(index, this);
})

// Wait for all promises to resolve then start playing
$.when.apply(null, promises).done(function () {
  $('video').each(function(){
    this.play();
  });
});
</script> </div>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

   

</body>



</html>
