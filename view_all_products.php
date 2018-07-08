<div id="bodyright">
<h3 style="color:red;">Products</h3>

<button><a style='color:white;background:#202020;' href='index.php?add_products'>Add product</a></button>
             
<?php include 'inc/function.php';
echo viewall_products();?></tr>
</table>
</form>
<style>


#bodyright
{
overflow:scroll;

}
#bodyright  button
{

float:right;margin-top:-2%;
  background: #202020;
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
	</style>