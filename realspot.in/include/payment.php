<?php
session_start();

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
b{
color:#0033FF;
}

</style>
<script>

</script>
</head>
<body style="font-size:12px">
<h3 style="color:#FF0000"> THANKS Mr.<?php echo $_SESSION['name']  ?> <br />
FOR THE INTEREST SHOWN IN THE PROPERTY (ID No.<?php echo $_GET['prid'] ?>)<br />
DO YOU LIKE TO PURCHASE THE CONTACT DETAILS?<br />
PAY JUST Rs.300/-<br />
IN ANY OF THE FOLLOWING METHODS....</h3>
<br />
<br />

<div style="margin-left:175px;font-family:Verdana, Arial, Helvetica, sans-serif">

<table cellspacing="1" style="color:#990033">
<tr><td colspan="3"><b style="font-size:16px">I.  Cash Deposit/Money Transfer from any Bank </b></td></tr>
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
<b style="font-size:16px">
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
<b style="font-size:16px">III.  Direct Cash Deposit at our Office counter or send Money Order</b></td>
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

<script type="text/javascript">

function submitOrder()
{
 doValidation();
		
		if( paymode !== 'false' && bank !== 'false' && branch !== 'false' && customer !== 'false' && proid == 'true' && tariff == 'true' && deposit == 'true' && 
		phone == 'true' && mailCheck == 'true' && dateCheck == 'true'  )
{
var r=confirm("Place the Order Now..? ");
if (r==true)
  {
  return true;
  }
else
  {
  return false;
  } 

}
else
{
alert("Error.Please Check the Form Again!");
return false;
}

}




var proid 	  ="subin";
var tariff    ="subin";
var deposit   ="subin";
var paymode   ="subin";
var bank 	  ="subin";
var branch	  ="subin";
var customer  ="subin";
var phone     ="subin";

var mailCheck ="subin";
var dateCheck ="subin";

function doValidation()
{

 proid     	 = document.getElementById("pid").value;//only number
 tariff      = document.getElementById("tariff").value;
 deposit     = document.getElementById("deposit").value;
 paymode     = document.getElementById("paymode").value;//null
 bank     	 = document.getElementById("bank").value;//null
 branch		 = document.getElementById("branch").value;//null
 customer  	 = document.getElementById("customer").value;//null
 phone     	 = document.getElementById("phone").value;//
 address     = document.getElementById("address").value;//null
mailCheck    = document.getElementById("mai").value;
dateCheck    = document.getElementById("din").value;

proid  		= proid.replace(/\s/g, "");
bank     	= bank.replace(/\s/g, "");
tariff		= tariff.replace(/\s/g, "");			
deposit		= deposit.replace(/\s/g, "");
paymode		= paymode.replace(/\s/g, "");
branch		= branch.replace(/\s/g, "");
customer	= customer.replace(/\s/g, "");
phone		= phone.replace(/\s/g, "");
address		= address.replace(/\s/g, "");


if(paymode)
{
for(var indx=0;indx<paymode.length;indx++)
if(paymode.toUpperCase().charAt(indx)<'A'||paymode.toUpperCase().charAt(indx)>'Z' )
if(paymode.charAt(indx)!=' ')
{

paymode = 'false';
}
}


if(bank)
{
for(var indx=0;indx<bank.length;indx++)
if(bank.toUpperCase().charAt(indx)<'A'||bank.toUpperCase().charAt(indx)>'Z' )
if(bank.charAt(indx)!=' ')
{

bank = 'false';
}
}



if(branch)
{
for(var indx=0;indx<branch.length;indx++)
if(branch.toUpperCase().charAt(indx)<'A'||branch.toUpperCase().charAt(indx)>'Z' )
if(branch.charAt(indx)!=' ')
{

branch = 'false';
}
}


if(customer)
{
for(var indx=0;indx<customer.length;indx++)
if(customer.toUpperCase().charAt(indx)<'A'||customer.toUpperCase().charAt(indx)>'Z' )
if(customer.charAt(indx)!=' ')
{

customer = 'false';
}
}


if(!(isNaN(proid)) && proid !=null && proid != "")
{
proid = 'true';
}
else
{
proid = 'false6';
}
if(!(isNaN(tariff)) && tariff !=null && tariff != "")
{
tariff = 'true';
}
else
{
tariff = 'false7';
}
if(!(isNaN(deposit)) && deposit !=null && deposit != "")
{
deposit = 'true';
}
else
{
deposit = 'false8';
}
if(!(isNaN(phone)) && phone !=null && phone != "")
{
phone = 'true';
}
else
{
phone = 'false9';
}
if(!(isNaN(mailCheck)) && mailCheck !=null && mailCheck != "")
{
mailCheck ='true';
}
else
{
mailCheck = 'false10';
}
if(!(isNaN(dateCheck)) && dateCheck !=null && dateCheck != "")
{
dateCheck = 'true';
}
else
{
dateCheck =  'false11';
}

}

function showMail()
{
			var str = document.getElementById("mail").value;
						if (window.XMLHttpRequest)
						{
					xmlhttps = new XMLHttpRequest();
						}
						else
						{
				xmlhttps = new ActiveXObject("Microsoft.XMLHTTP");
						}
				xmlhttps.onreadystatechange=function()
				{
				if (xmlhttps.readyState==4 && xmlhttps.status==200)
				{
				document.getElementById("maid").innerHTML = xmlhttps.responseText;
				}
				}
				xmlhttps.open("GET","./include/validation.php?msg=showmail&q="+str,true);
				xmlhttps.send();
}
</script>
<form name="pay" action="./include/payment_process.php" method="post" onsubmit="return submitOrder()">
<table>
<tr>
<td colspan="3" align="center" ><b style="font-size:16px">
Place your online order using  this form. ( All the fields are compulsory )</b>
</td>
</tr>
<tr>
<td>
For which Profile ID this order is placed?
</td>
<td>:</td>
<td>
<input type="text" name="proid" id="pid" class="tb8"   size="30" value="<?php echo $_GET['prid'] ?>" maxlength="30" />
</td><td id="maid"><p id="mai"></p></td>
</tr>
<tr>
<td>
Total Cost of the profiles as per Tariff Rs.
</td>
<td>:</td>
<td>
<input type="text" class="tb8" id="tariff" name="tariff" value="300"  size="30" maxlength="30" />
</td>
<td id="date"><p id="din"></p></td>
</tr>
<tr>
<td>
Amount Deposited
</td>
<td>:</td>
<td>
<input type="text" class="tb8" id="deposit" name="deposit"  size="30" maxlength="30" />
</td>
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
<input type="text" class="tb8" id="bank"  name="bank" value="" size="30" maxlength="30" />
</td>
</tr>

<tr>
<td>
Branch
</td>
<td>:</td>
<td>
<input type="text" class="tb8" id="branch" name="branch" value="" size="30" maxlength="30" />
</td>
</tr>

<tr>
<td>
Date of remittance
</td>
<td>:</td>
<td>
<script>
var month = [
				"Month",
				"January",
				"February",
				"March",
				"April",
				"May",
				"June",
				"July",
				"August",
				"September",
				"October",
				"November",
				"December"

			];
			
function showDate(mon)
{		
		var limit =	"";
		
//var mon = document.getElementById("month").value;

if(mon == 1 || mon == 3 || mon == 5 || mon == 7 || mon == 8 || mon == 10 || mon == 12)
{
limit = 32;
}
else if(mon == 4 || mon == 6 || mon == 9 || mon == 11)
{
 limit = 31;
}
else if(mon == 2)
{
 limit = 29;
}
else
{
limit = 0;
}

var date  = '<option value=0>Date</option>';
var k=1;
while(k<limit)
{
date = date + '<option value='+k+'>'+k+'</option>';
k++;

}

document.getElementById("today").innerHTML = date;

}



var year = [
			"2012",
			"2013",
			"2014",
			"2015"
			];
			
			
			
</script>
<select name="month" id="month" onchange="showDate(this.value)">
<script>
for(var i=0;i<month.length;i++)
{
document.write('<option value='+ i +'>'+month[i]+'</option>');
}
</script>
</select>
<select name="date" id="today">    

</select>
<select name="year" id="year">
<script>
for(var i=0;i<year.length;i++)
{
document.write('<option value='+year[i]+'>'+year[i]+'</option>');
}
</script>
</select>
</td>
<script>

 function checDate()
 {
var da = document.getElementById("today").value;
var mo = document.getElementById("month").value;
var ye = document.getElementById("year").value;
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
				document.getElementById("date").innerHTML = xmlhttp.responseText;
				}
				}
xmlhttp.open("GET","./include/validation.php?msg=checkdate&d="+da+"&m="+mo+"&y="+ye,true);
				xmlhttp.send();
}
</script>
</tr>

<tr>
<td>
Time
</td>
<td>:</td>
<td>

<?php
$h = range(1,12);
$ma = array("00","01","02","03","04","05","06","07","08","09");
$mb = range(10,59);
$m = array_merge($ma,$mb);
$meridian = array("AM","PM");



?>
<select name="hour" id="hour">

<?php
for($i=0;$i<12;$i++)
{
echo '<option value='.$h[$i].'>'.$h[$i].'</option>';
}
 ?>
 
 </select>
 
 <select name="minute" id="minute">
 <?php
for($i=0;$i<60;$i++)
{
echo '<option value='.'.'.$m[$i].'>'.$m[$i].'</option>';
}
 ?>

 </select>
 
 <select name="meridian" id="meridian">
 <?php
for($i=0;$i<2;$i++)
{
echo '<option value='.'.'.$meridian[$i].'>'.$meridian[$i].'</option>';
}
 ?>
 
 </select>

</td>
</tr>
<?php 
$k = $_SESSION['id'];
$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);

$sql = "SELECT * FROM register WHERE Id='$k'";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());

if(mysql_num_rows($result) > 0) 
{

while($row = mysql_fetch_array($result))
{
	$mail = $row['email'];		
	$name = $row['name'];
	$mobile = $row['mobile'];	

}

}


?>
<tr>
<td>
Name of the Account holder/Customer
</td>
<td>:</td>
<td>
<input type="text" class="tb8" id="customer" disabled="disabled" name="customers" value="<?php echo $name ?>" size="30" maxlength="30" />
<input type="hidden" name="customer" value="<?php echo $name?>"/>
</td>
</tr>

<tr>
<td>
Contact Mob:/Phone No
</td>
<td>:</td>
<td>
<input type="text" class="tb8" id="phone" disabled="disabled" name="phones" value="<?php echo $mobile ?>" size="30" maxlength="30" />
<input type="hidden" name="phone"  value="<?php echo $mobile ?>" /> 
</td>
</tr>



<tr>
<td>
E-mail id
</td>
<td>:</td>
<td>
<input type="text" class="tb8" id="mail" disabled="disabled" name="mails" onkeyup="showMail()"  value="<?php echo $mail ?>" size="30" maxlength="30" />
<input type="hidden" name="mail" value="<?php echo $mail ?>" /> 
</td>
</tr>

<tr>
<td>
Full Postal address
</td>
<td>:</td>
<td>
<textarea rows="10" name="address" onmouseover="showMail()" id="address" class="ta8" cols="10">
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