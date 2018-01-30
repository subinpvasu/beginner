<?php
session_start();

$id = $_GET['name'];
if( $id == $_SESSION['id'])


$status = "active";

################################################
############
############ Select DB
############
################################################


$sql = "SELECT * FROM payment WHERE status ='$status' AND custid=".$id;
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
var url = "index.php?cat=inception&sms=show";
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