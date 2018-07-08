<div id="bodyright">
<h3 style="color:red;">Offers</h3>
<form method="post" enctype="multipart/form-data">
<table style="border-top:2px solid #400040;">
<tr><td>Image1 Text:</td><td><input type="text" name="image1text"></td></tr>
<tr><td>Image2 Text:</td><td><input type="text" name="image2text"></td></tr>
<tr><td>Image3 Text:</td><td><input type="text" name="image3text"></td></tr>
<tr><td>Image4 Text:</td><td><input type="text" name="image4text"></td></tr>
<tr><td>Image5 Text:</td><td><input type="text" name="image5text"></td></tr>
</table>
<center><button name="add_text">Add Text on Image</button>
<button type="reset">Reset</button>
</center>
</form>
<?php include 'inc/function.php';
echo add_text();?>
</div>