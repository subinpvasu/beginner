<?php 
session_start();
$id = $_SESSION['id'];
$k  = $_GET['or'];
$status = 'active';
$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);

$sql = "SELECT * FROM payment WHERE id='$k' AND status='$status' AND custid=".$id;
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
if(mysql_num_rows($result) > 0) 
{
while($row = mysql_fetch_array($result))
{


echo '





				<table>
				<tr><td colspan=3 align=center><font color="green">Order Details </font></td></tr>	
				<tr>	<td>					
For which Profile ID this order is placed?</td><td>	: </td><td>'.$row["profileid"].'</td>
</tr><tr><td>
Total Cost of the profiles as per Tariff</td><td>	: </td><td>'.$row["cost"].'</td>
</tr><tr><td>
Amount Deposited 	</td><td>						: </td><td>'.$row["amount"].'</td>
</tr><tr><td>
Mode of Payment	</td><td>							:</td><td> '.$row["mode"].'</td>
</tr><tr><td>
Name of the Bank/Office where the Money is 
Deposited/Transferred/DD/Pay Order taken </td><td>	:</td><td> '.$row["bank"].'</td>
</tr><tr><td>
Branch		</td><td>								: </td><td>'.$row["branch"].'</td>
</tr><tr><td>
Date of remittance	</td><td>						:</td><td> '.$row["date"].'</td>
</tr><tr><td>
Time 			</td><td>							: </td><td>'.$row["time"].'</td>
</tr><tr><td>
Name of the Account holder/Customer	</td><td>		:</td><td> '.$row["customer"].'</td>
</tr><tr><td>
Contact Mob:/Phone No	</td><td>					: </td><td>'.$row["phone"].'</td>
</tr><tr><td>
E-mail id 			</td><td>						: </td><td>'.$row["email"].'</td>
</tr><tr><td>
Full Postal address </td><td>						: </td><td>'.$row["address"].'</td>
</tr>


</table>


';

}
}


?>
