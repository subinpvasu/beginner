<?php 
session_start();
include_once 'config.php';
$id = $_SESSION['id'];
$k  = $_GET['or'];
$status = 'active';
$sql = "SELECT * FROM payment WHERE id='$k' AND  empid=".$id;
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
if(mysql_num_rows($result) > 0) 
{
while($row = mysql_fetch_array($result))
{
echo '
<table><tr><td colspan=3 align=center>
<font color="green"><b>Order Details </b></font></td></tr>	
<tr><td>
Total Cost of the Plan as per Tariff</td><td>	    :</td><td>'.$row["cost"].'</td>
</tr><tr><td>
Amount Deposited Rs.	</td><td>					:</td><td>'.$row["deposit"].'</td>
</tr><tr><td>
Mode of Payment	</td><td>							:</td><td>'.$row["mode"].'</td>
</tr><tr><td>
Name of the Bank/Office Where the Money is 
Deposited/Transferred/DD/Pay Order taken </td><td>	:</td><td>'.$row["bank"].'</td>
</tr><tr><td>
Branch		</td><td>								:</td><td>'.$row["branch"].'</td>
</tr><tr><td>
Date of remittance	</td><td>						:</td><td>'.$row["remit"].'</td>
</tr><tr><td>
Time 			</td><td>							:</td><td>'.$row["time"].'</td>
</tr><tr><td>
Name of the Account Holder/Customer	</td><td>		:</td><td>'.$row["name"].'</td>
</tr><tr><td>
Contact Mobile No	</td><td>  					    :</td><td>'.$row["mobile"].'</td>
</tr><tr><td>
E-mail id 			</td><td>						:</td><td>'.$row["email"].'</td>
</tr><tr><td>
Full Postal address </td><td>						:</td><td>'.$row["address"].'</td>
</tr><tr style="color:green;font-weight:bold;"><td>
Order Status </td><td>			        			:</td><td>'.$row["status"].'</td>
</tr></table>
<script>
setTimeout(function(){self.close();},25000);
</script>
';
}
}?>