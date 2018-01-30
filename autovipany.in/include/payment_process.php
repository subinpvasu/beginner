<?php
function success()
{

header('location:../template.php?msg=order&name='.$_POST['custid']);
}
function successed()
{
	header('location:../template.php?msg=promo&name='.$_POST['custid']);
}

if(isset($_POST['order']))
{

$tempd = $_POST['date'];
$tempm = ".".$_POST['month'];
$tempy = ".".$_POST['year'];

$profileid  = trim($_POST['proid']);
$cost		= trim($_POST['tariff']);
$amount		= trim($_POST['deposit']);
$mode		= trim($_POST['paymode']);
$bank		= trim($_POST['bank']);
$branch		= trim($_POST['branch']);
$date		= trim($tempd.$tempm.$tempy);//hidden variable
$time		= trim($_POST['hour'].$_POST['minute'].$_POST['meridian']);//hidden variable
$customer	= trim($_POST['customer']);
$phone		= trim($_POST['phone']);
$email		= trim($_POST['mail']);
$address	= trim($_POST['address']);
$custid     = trim($_POST['custid']);


################################################
############
############ Select DB
############
################################################


$sql = "INSERT INTO payment(profileid,cost,amount,mode,bank,branch,time,date,customer,phone,email,address,custid)VALUES
('$profileid','$cost','$amount','$mode','$bank','$branch','$time','$date','$customer','$phone','$email','$address','$custid')";


if (!mysql_query($sql))
{
die('Error: ' . mysql_error());
}
else
{

//send mail
$to=$email;
$subject="Order Details";
$message="
				<table>
				<tr><td colspan=3 align=center>Order Details </td></tr>
				<tr>	<td>
For which Profile ID this order is placed?</td><td>	: </td><td>$_POST[proid]</td>
</tr><tr><td>
Total Cost of the profiles as per Tariff</td><td>	: </td><td>$_POST[tariff]</td>
</tr><tr><td>
Amount Deposited 	</td><td>						: </td><td>$_POST[deposit]</td>
</tr><tr><td>
Mode of Payment	</td><td>							:</td><td> $_POST[paymode]</td>
</tr><tr><td>
Name of the Bank/Office where the Money is
Deposited/Transferred/DD/Pay Order taken </td><td>	:</td><td> $_POST[bank]</td>
</tr><tr><td>
Branch		</td><td>								: </td><td>$_POST[branch]</td>
</tr><tr><td>
Date of remittance	</td><td>						:</td><td> $_POST[date]/$_POST[month]/$_POST[year]</td>
</tr><tr><td>
Time 			</td><td>							: </td><td>$_POST[hour]$_POST[minute]$_POST[meridian]</td>
</tr><tr><td>
Name of the Account holder/Customer	</td><td>		:</td><td> $_POST[customer]</td>
</tr><tr><td>
Contact Mob:/Phone No	</td><td>					: </td><td>$_POST[phone]</td>
</tr><tr><td>
E-mail id 			</td><td>						: </td><td>$_POST[mail]</td>
</tr><tr><td>
Full Postal address </td><td>						: </td><td>$_POST[address]</td>
</tr>


</table>

";

$from="response@realspot.in";
$headers="from:".$from."\r\n";
$headers .= "Reply-To: realspot.in@gmail.com\r\n";
$headers  .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html";

mail($to,$subject,$message,$headers);


success();


}




}




if(isset($_POST['adv_order']))
{

$tempd = $_POST['date'];
$tempm = ".".$_POST['month'];
$tempy = ".".$_POST['year'];

$profileid  = trim($_POST['proid']);
$cost		= trim($_POST['tariff']);
$amount		= trim($_POST['deposit']);
$mode		= trim($_POST['paymode']);
$bank		= trim($_POST['bank']);
$branch		= trim($_POST['branch']);
$date		= trim($tempd.$tempm.$tempy);//hidden variable
$time		= trim($_POST['hour'].$_POST['minute'].$_POST['meridian']);//hidden variable
$customer	= trim($_POST['customer']);
$phone		= trim($_POST['phone']);
$email		= trim($_POST['mail']);
$address	= trim($_POST['address']);
$custid     = trim($_POST['custid']);
$type 		= 'advert';

################################################
############
############ Select DB
############
################################################

$sql = "INSERT INTO payment(profileid,cost,amount,mode,bank,branch,time,date,customer,phone,email,address,custid,type)VALUES
('$profileid','$cost','$amount','$mode','$bank','$branch','$time','$date','$customer','$phone','$email','$address','$custid','$type')";


if (!mysql_query($sql))
{
die('Error: ' . mysql_error());
}
else
{

//send mail
$to=$email;
$subject="Package Details";
$message="
				<table>
				<tr><td colspan=3 align=center>Package Details </td></tr>
				<tr>	<td>
For which Profile ID this Package is placed?</td><td>	: </td><td>$_POST[proid]</td>
</tr><tr><td>
Total Cost of the Package as per Tariff</td><td>	: </td><td>$_POST[tariff]</td>
</tr><tr><td>
Amount Deposited 	</td><td>						: </td><td>$_POST[deposit]</td>
</tr><tr><td>
Mode of Payment	</td><td>							:</td><td> $_POST[paymode]</td>
</tr><tr><td>
Name of the Bank/Office where the Money is
Deposited/Transferred/DD/Pay Order taken </td><td>	:</td><td> $_POST[bank]</td>
</tr><tr><td>
Branch		</td><td>								: </td><td>$_POST[branch]</td>
</tr><tr><td>
Date of remittance	</td><td>						:</td><td> $_POST[date]/$_POST[month]/$_POST[year]</td>
</tr><tr><td>
Time 			</td><td>							: </td><td>$_POST[hour]$_POST[minute]$_POST[meridian]</td>
</tr><tr><td>
Name of the Account holder/Customer	</td><td>		:</td><td> $_POST[customer]</td>
</tr><tr><td>
Contact Mob:/Phone No	</td><td>					: </td><td>$_POST[phone]</td>
</tr><tr><td>
E-mail id 			</td><td>						: </td><td>$_POST[mail]</td>
</tr><tr><td>
Full Postal address </td><td>						: </td><td>$_POST[address]</td>
</tr>


</table>

";

$from="response@realspot.in";
$headers="from:".$from."\r\n";
$headers .= "Reply-To: realspot.in@gmail.com\r\n";
$headers  .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html";

mail($to,$subject,$message,$headers);


successed();


}




}























?>