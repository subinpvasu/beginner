<?php 
session_start();
include_once 'include/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/
xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body style="font-size:12px" onload="showEra()">
<h3 style="color:#FF0000"> THANK YOU <?php echo $_SESSION['name']  ?> <br />
FOR THE INTEREST SHOWN IN THE PROFILES<br />
WOULD YOU LIKE TO PURCHASE  RESUMES?<br />
PURCHASE ANY OF THE PLANS BELOW<br />
USING ANY OF THE FOLLOWING METHODS....</h3>
<br />
<br />
<div style="font-family:Verdana, Arial, Helvetica, sans-serif">
<table cellspacing="1" style="color:#990033">
<tr><td colspan="3"><b style="font-size:16px;color:#0033FF;">I.  Cash Deposit/Money Transfer from 
any Bank </b></td></tr>
<tr><td width="171">SB Account No</td><td>:</td>
<td width="391">20010857522</td>
</tr>
<tr><td>IFS Code</td><td>:</td><td>SBIN0008679</td>
</tr>
<tr><td>Name of Account Holder</td><td>:</td><td>Vijayan.V.K</td>
</tr>
<tr><td>Contact Mobile</td><td>:</td><td>09387335165</td>
</tr>
<tr><td>Name of Bank</td><td>:</td><td>State Bank of India</td>
</tr>
<tr><td>Branch</td><td>:</td><td>Thrissur Town Branch,</td>
</tr>
<tr><td>Address</td><td>:</td><td> 2nd Floor,  Pooma Complex, M.G.Road, Thrissur - 1.</td>
</tr>
<tr><td>Telephone No</td><td>:</td><td> 0487 2335165, 2323926, 2325306.</td>
</tr>
</table>
<br/>
<br/>
<table width="572" cellspacing="1" style="color:#990033">
<tr>
<td width="561">
<b style="font-size:16px;color:#0033FF;">
II.  By  Demand Draft / Pay Order</b></td>
</tr><tr><td>
Demand Draft/Pay order shall be taken in favour of : Mr. Vijayan.V.K.</td>
</tr><tr><td>  SB A/C  No:   20010857522                                       </td>
</tr><tr><td> Payable at Thrissur, Kerala and send it by Registered Post/Courier or by Hand.</td>
</tr><tr><td><b style="color:#339900">
Address: </b></td>
</tr><tr><td> <b style="color:#990033">M/s.Gitacommunications</b></td>
</tr><tr><td>  T.M.K. Complex,Mannath Lane, </td>
</tr><tr><td>M.G.Road, Thrissur,</td>
</tr><tr><td> Kerala, PIN: 680 001.</td>
</tr><tr><td>
E-mail: gitacommunications@gmail.com</td>
</tr><tr><td>
Office Telephone Nos: 0487 2335165, 2323926, 2325306.</td>
</tr><tr><td>
Helpline Mobiles: 09387335165, 0924955735
</td>
</tr>
</table>
<br/>
<br/>
<table width="571" cellspacing="1" style="color:#990033">
<tr>
<td width="565">
<b style="font-size:16px;color:#0033FF;">III.  Direct Cash Deposit at our Office counter or send
 Money Order</b></td>
</tr><tr><td><b style="color:#339900">
Address:</b> </td>
</tr><tr><td><b style="color:#990033">  M/s. Gitacommunications</b></td>
</tr><tr><td>  T.M.K. Complex,Mannath Lane, </td>
</tr><tr><td>M.G.Road, Thrissur,</td>
</tr><tr><td> Kerala, PIN: 680 001.</td>
</tr><tr><td>
E-mail: gitacommunications@gmail.com</td>
</tr><tr><td>
Office Telephone Nos.: 0487 2335165, 2323926, 2325306</td>
</tr><tr><td>
Helpline Mobiles: 09387335165, 0924955735</td>
</tr><tr><td><a href="http://infobis.in" style="text-decoration:none">
visit: www.infobis.in </a>(Classifieds for Global Reach)
</td>
</tr>
</table>
<br/>
<br/>
<form name="pay" action="checkout.php" method="post" onsubmit="return submitOrder()">
<table>
<tr>
<td colspan="3" align="center" ><b style="font-size:16px;color:#0033FF;">
Place your online order using  this form. ( All the fields are compulsory )</b>
</td>
</tr>
<tr>
<td>
Select Plan
</td>
<td>:</td>
<td>
<select name="plan" id="plan" class="select" >
<?php 
$msql = "SELECT id,profile FROM profile WHERE status='active' ORDER BY id ASC";
$rest = mysql_query($msql);
while($rows = mysql_fetch_array($rest))
{
   echo '
   <option value="'.$rows["profile"].'">'.$rows["profile"].'</option>
   ';
}
?>
</select>
</td><td><img src="http://www.allegrovolleyball.com/images/iNFO_LOGO.jpg" width="24px" 
title="Profile Information" onclick="showInform()" height="16px"/></td>
</tr>
<tr>
<td>
Amount Deposited
</td>
<td>:</td>
<td>
<input type="text" class="textbox" id="deposit" name="deposit"  size="30" maxlength="30" />
</td><td id="date"><p id="din"></p></td>
</tr>
<tr>
<td>
Mode of Payment
</td>
<td>:</td>
<td>
<select name="paymode"  class="select" id="paymode">
<option value="">--Select-- </option>
<option value="Deposited in Bank">Deposited in Bank </option>
<option value="Money Transfer">Money Transfer </option>
<option value="Demand Draft">Demand Draft </option>
<option value="Pay Order">Pay Order </option>
<option value="Money Order">Money Order </option>
<option value="Cash Deposit at Office Counter">Cash Deposit at Office Counter </option>
</select>
</td>
</tr>
<tr>
<td>
Name of the Bank/Office  where the Money is Deposited/Transferred/DD/Pay Order taken
</td>
<td>:</td>
<td>
<input type="text" class="textbox" id="bank"  name="bank" value="" size="30" maxlength="30" />
</td>
</tr>
<tr>
<td>
Branch
</td>
<td>:</td>
<td>
<input type="text" class="textbox" id="branch" name="branch" value="" size="30" maxlength="30" />
</td>
</tr>
<tr>
<td>
Date of remittance
</td>
<td>:</td>
<td id="predate"><input type="hidden" id="postdate" name="postdate" value="DEV"/>
<select name="month" id="month" onchange="showDate()"></select>
<select name="date" id="today"></select>
<select name="year" id="year"></select>
</td>
</tr>
<tr>
<td>
Time
</td>
<td>:</td>
<td>
<?php //11.15 AM
$h 		  = range(1,12);
$ma 	  = array("00","01","02","03","04","05","06","07","08","09");
$mb 	  = range(10,59);
$m 		  = array_merge($ma,$mb);
$meridian = array("AM","PM");
?>
<select name="hour" id="hour">
<?php
for($i=0;$i<12;$i++)
{
	if($i==11)
	{
		echo '<option selected value='.$h[$i].'>'.$h[$i].'</option>';
	}
	else
	{
		echo '<option value='.$h[$i].'>'.$h[$i].'</option>';
	}
}
?>
 </select>
 <select name="minute" id="minute">
 <?php
for($i=0;$i<60;$i++)
{
if($i==12)
	{
		echo '<option selected value='.'.'.$m[$i].'>'.$m[$i].'</option>';
	}
	else
	{
		echo '<option value='.'.'.$m[$i].'>'.$m[$i].'</option>';
	}

}
 ?>
</select>
 <select name="meridian" id="meridian">
<?php
for($i=0;$i<2;$i++)
{
	if($i==1)
	{
		echo '<option selected value='.'.'.$meridian[$i].'>'.$meridian[$i].'</option>';
	}
	else
	{
		echo '<option value='.'.'.$meridian[$i].'>'.$meridian[$i].'</option>';
	}
	

}
?>
</select>
</td>
</tr>
<?php 
$k = $_SESSION['id'];
$sql = "SELECT * FROM employer WHERE id='$k'";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
if(mysql_num_rows($result) > 0) 
{
while($row = mysql_fetch_array($result))
{
	$mail = $row['email'];		
	$name = $row['person'];
	$mobile = $row['contact'];	
	$addres = $row['address'];
}
}
?>
<tr>
<td>
Name of the Account Holder/Customer
</td>
<td>:</td>
<td>
<input type="text" class="textbox" id="customer"  name="customers" value="<?php echo $name ?>" size="30"
 maxlength="30" />
<input type="hidden" name="empid" value="<?php echo $_SESSION['id']; ?>"/>
</td>
</tr>
<tr>
<td>
Contact Mob/Phone No
</td>
<td>:</td>
<td>
<input type="text" class="textbox" id="phone"  name="phones" value="<?php echo $mobile ?>" size="30"
 maxlength="30" />
<input type="hidden" name="phone"  value="<?php echo $mobile ?>" /> 
</td>
</tr>
<tr>
<td>
E-mail id
</td>
<td>:</td>
<td>
<input type="text" class="textbox" id="mail"  name="mails"   value="<?php echo $mail ?>" 
size="30" maxlength="30" />
<input type="hidden" name="mail" value="<?php echo $mail ?>" /> 
</td>
</tr>
<tr>
<td>
Full Postal address
</td>
<td>:</td>
<td>
<textarea rows="10" name="address"   id="address" class="textarea" cols="10">
<?php echo $addres; ?>
</textarea><input type="hidden" name="custid" value="<?php echo $_GET['name'] ?>" />
</td>
</tr>
<tr>
<td colspan="3" align="center">
<input type="submit" name="order" value="Place My Order" onmouseover="checDate()" class="fb5" />

</td>

</tr></table>
</form>
</div>
</body>
</html>