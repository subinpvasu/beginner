<?php 
session_start();
include_once 'include/config.php';
$id = $_SESSION['id'];
$sql = "SELECT * FROM payment WHERE status<>'deleted' AND empid=".$id;
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());

if(mysql_num_rows($result) > 0) 
{
?>
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
	style='text-decoration:none;font-weight:bold; '> Order No" .$t. "</a></td>
	<td>" .$row['status']. "</td><td>";
if($row['status'] == 'Processing'){echo 'Cancel Order</td></tr>';}else{
	echo '<a href="javascript: makeSure('.$row['id'].')" 
	style="text-decoration:none;font-weight:bold;">
	Cancel Order</a></td></tr>';}
			$t++;

///ordered resume list should display here 
}
echo "</table>";
}
else
{
echo '<b style="color:red">You have no orders yet.!</b>
<script>
var url = "index.php?msg=resume";
setInterval(function(){window.onload = move();},2000);
function move()
{
window.location=url;
}
</script>
';
}
?>
</table>