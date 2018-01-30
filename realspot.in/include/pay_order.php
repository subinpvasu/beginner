<?php
session_start();

$id = $_GET['name'];
if( $id == $_SESSION['id'])


$status = "active";

$con = mysql_connect("localhost","wwwreals_realtes","test@123");


if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);

$sql = "SELECT * FROM payment WHERE status ='$status' AND custid=".$id;
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());

if(mysql_num_rows($result) > 0) 
{
?>
<script>
function newWin(k)
{
window.open('./include/ordershow.php?or='+k,'_blank','width=500,height=500,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');

}
function makeSure(k)
{

var r = confirm("Delete the Order Now...?");
if(r == true)
{

                        if (window.XMLHttpRequest)
						{
						xmlhttp=new XMLHttpRequest();
						}
						else
						{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				xmlhttp.onreadystatechange=function()
				{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("warning").innerHTML=xmlhttp.responseText;
				
				}
				};
				xmlhttp.open("GET","./include/validation.php?msg=status&q="+k,true);
				xmlhttp.send();
				
		


}
}
function fresh()
{

  location.reload()
 

}

</script>
<table  cellspacing="5" width="400px"> <tr><td colspan="4" align="center">
<b><font color="#009933">Your Order Status</font></b>
</td>
</tr>
<tr>
<td>No</td><td>Order Name</td><td>Order Status</td><td>Delete Order</td></tr>
<?php
$t = 1;
while($row = mysql_fetch_array($result))
{
	echo "<tr><td>"	.$t. "</td><td><a href='javascript:void newWin(".$row["id"].")' 
	style='text-decoration:none;font-weight:bold; '> Order No" .$row["id"]. "</a></td>
	<td>" .$row['admin_status']. "</td><td>";
if($row['admin_status'] == 'Processing'){echo 'Cancel Order</td></tr>';}else{
	echo '<a href="javascript: makeSure('.$row['id'].')" style="text-decoration:none;font-weight:bold;">
	Cancel Order</a></td></tr>';}
			
     $t++;
}
echo "</table>";
}
else
{
echo '
<script>
var url = "template.php?cat=inception&sms=show";
function move()
{
window.location=url;
}

window.onload = move();
</script>

';

}
?>
</table>