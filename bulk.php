<div id="bodyright">
<h3 style="color:black;margin-top:1.3%">Bulk Messages</h3>
<form method="post" enctype="multipart/form-data">
<table id="scroll" style="border-top:1px solid #A9A9A9;margin-top:1%" >
</table>
</form>
<form method="post">
<table>
<tr>
<td>For:</td>
<td><select name="forwhom">
<option value="All">All</option>
<option value="registered">Register</option>
<option value="guest">Guest</option>
</select></td></tr>
<tr>
<td>Subject:</td>
<td><input type="text" name="subject" style="width:44%;border: 1px solid #A9A9A9;"></td></tr>
<tr>
<td>Enter Message:</td>
<td><textarea rows="5" cols="50" name="msg"></textarea></td></tr>
<tr>
</table>
<center><div id="hover"><button name="send_bulk">Send</button></div>
</center>
</form>
</div>

<?php 
include 'inc/function.php';
echo send_bulk();?>




