<div id="bodyright">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script type="text/javascript">
 $(document).ready(function()
			{
	 $('#category1').on('change',function()
			 {
	         var categoryid1=$(this).val();
	         if(categoryid1)
	         {
	             $.get(
	                     "customerlist.php",
	                     {
	                         category1: categoryid1
	                         },
	                     function(data)
	                     {
	                         $('#subcategory1').html(data);
	                     }
	         );
	         
			}
	 else
	 {
		 $('#subcategory1').html('<option>Select Category First</option>')
	 }
			});
	             });



 $(document).ready(function()
			{
	 $('#category2').on('change',function()
			 {
	         var categoryid2=$(this).val();
	         if(categoryid2)
	         {
	             $.get(
	                     "customerslists.php",
	                     {
	                         category2: categoryid2
	                         },
	                     function(data)
	                     {
	                         $('#subcategory1').html(data);
	                     }
	         );
	         
			}
	 else
	 {
		 $('#subcategory1').html('<option>Select Category First</option>')
	 }
			});
	             });
     </script>
<h3 style="color:black;margin-top:1.3%">Selective Messages</h3>
<form method="post" enctype="multipart/form-data">
<table id="scroll" style="border-top:1px solid #A9A9A9;margin-top:1%" >
<?php include 'inc/function.php';
?>
</table>
</form>
<form method="post">
<table>
<tr style="height:2px;">
<td>Month:</td>
<td><select style="margin-left: 0%;"name="forwhom" id="category2">
<option value="">Select</option>
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select></td></tr>
<tr><td style='text-align:center;'>(or)</td></tr>
<tr><td>Orders Wise:</td>
<td><select style="margin-left: 0%;padding-right:28px;" name="orderwise" id="category1">
<option value="">Select</option>
<option value="00">0</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
</select></td></tr>
<tr><td>Select Persons 
<p></td>
<td><p id="subcategory1">Select Any Above Option
<p></td></tr>
<tr>
<td>Subject:</td>
<td><input name="subject" type="text" style="width:44%;border: 1px solid #A9A9A9;"></td></tr>
<tr>
<tr>
<td>Enter Message:</td>
<td><textarea rows="5" cols="50" name="msg"></textarea></td></tr>
<tr>
</table>
<center><div id="hover"><button style=""name="send_selective">Send</button></div>
</center>
</form>
</div>
<?php  echo send_selective(); ?>



