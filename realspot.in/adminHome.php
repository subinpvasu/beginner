<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Realspot.in|Administrator</title>
<style type="text/css">
table, td, th
{
border:1px solid green;
border-collapse:separate;
}
th
{
background-color:#669D2F;
color:white;
}
ul{
list-style-type:none;	
}
</style>
<script type="text/javascript">

var rld="";
function result()
{
	
	var m = document.getElementById("searchkey").value; 
	var n = document.getElementById("idsearch").value;
	if(n != null && m != null)
	{
		window.open("searchresults.php?key="+m+"&value="+n,"_blank","width=500,height=500,left=100,top=100");
		
	}
	
}
function dynamicSearch(sbn)
    {
		 var m = document.getElementById("searchkey").value; 
	     if(m==3 || m==4 || m==6 || m==12 || m==13)
{
var xmlhttp;
if (sbn.length==0)
  {
  document.getElementById("restse").innerHTML="";
   document.getElementById("restse").style.visibility="hidden";
  return;
  }
  document.getElementById("restse").style.visibility="visible";
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
    document.getElementById("restse").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","validadmin.php?msg=property&q="+sbn+"&r="+m,true);
xmlhttp.send();
	
}
}
function selterm(str)
{
	var n=str.replace("_"," "); 
	//alert("dsfgsdfgnjhnj"+str);
	document.getElementById("serbut").focus();
	document.getElementById("idsearch").value=n;
	
}

function changeStatus(str)
{
	//var k = document.getElementById("").value;
	var r = confirm("Change the Payment Status now?");
	if(r == true)
	{
	var xmlhttp;
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  }
xmlhttp.open("GET","validadmin.php?msg=status&q="+str,true);
xmlhttp.send();
	}
	}

function changeSales(str)
{
//	var k = document.getElementById("").value;
	var r = confirm("Change the Sale Status now?");
	if(r == true)
	{
var xmlhttp;
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
  rld=xmlhttp.responseText;
	reFreshed();
    }
  }
xmlhttp.open("GET","validadmin.php?msg=sales&q="+str,true);
xmlhttp.send();
	}
}

function changePublish(str)
{
	
	var r = confirm("Change the Publish Status now?");
	if(r == true)
	{
	var xmlhttp;
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  }
xmlhttp.open("GET","validadmin.php?msg=publish&q="+str,true);
xmlhttp.send();
	
	}
}

function reFreshed()
{
	if(rld == 'Y')
	{
location.reload();
}
}

function admChange(str,sbn)
{
//alert("this----"+str+"-----is---"+sbn);	
var r = confirm("Change the Admin Status now?");
	if(r == true)
	{
	var xmlhttp;
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  }
xmlhttp.open("GET","validadmin.php?msg=order&q="+str+"&r="+sbn,true);
xmlhttp.send();
	
	}
}

function useDelet(str)
{
//alert("this----"+str+"-----is---"+sbn);	
var r = confirm("Delete the User Now?");
	if(r == true)
	{
	var xmlhttp;
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  }
xmlhttp.open("GET","validadmin.php?msg=delete&q="+str,true);
xmlhttp.send();
	
	}
}

function changeadPublish(str)
{
	
	var r = confirm("Change the Publish Status now?");
	if(r == true)
	{
	var xmlhttp;
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  }
xmlhttp.open("GET","validadmin.php?msg=adpublish&q="+str,true);
xmlhttp.send();
	
	}
}
function changeadPremier(str)
{
	
	var r = confirm("Change the Premier Status now?");
	if(r == true)
	{
	var xmlhttp;
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  }
xmlhttp.open("GET","validadmin.php?msg=adpremier&q="+str,true);
xmlhttp.send();
	
	}
}
</script>
</head>
<body>
<table width="2300px" >
<tr>
<td align="center" colspan="2" style="background-color:#ADD8E6;">
<h1> <?php 
$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);

if($_GET['msg'] == 'property')
{
$status="Property Details";	
}
if($_GET['msg'] == 'register')
{
$status="Customer Details";	
}
if($_GET['msg'] == 'order')
{
$status="Order Details";	
}
echo $status;
?></h1>
</td>
</tr>
<tr>
<td style="background-color:#E0FFFF;width:200px;vertical-align:top">
<a href="adminHome.php?msg=register" style="text-decoration:none">Customer Details			 </a><br>
<a href="adminHome.php?msg=property" style="text-decoration:none">Property Details			 </a><br>
<a href="adminHome.php?msg=order"    style="text-decoration:none">Order Details				 </a><br>
<a href="adminHome.php?msg=dataproperty"    style="text-decoration:none">Data Entry Property Details</a><br>
<a href="adminHome.php?msg=datacustomer"    style="text-decoration:none">Data Entry Customer Details</a><br>
<a href="adminHome.php?msg=dataoperator"    style="text-decoration:none">Data Entry Operator Details</a><br>

<a href="" onclick="javascript:void window.open('create.php','_blank',
'width=500,height=300,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=1,resizable=0,left=100,top=100');return false;" style="text-decoration:none">Create New Data Operator				 </a><br>
<a href="" onclick="javascript:void window.open('flashadvert.php','_blank',
'width=500,height=300,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=1,resizable=0,left=100,top=100');return false;" style="text-decoration:none">Upload Advertisement				 </a><br>
<a href="adminHome.php?msg=addetails"    style="text-decoration:none">Advertisement Details</a><br>


</td>
<td style="background-color:#eeeeee;text-align:top;">
<?php
if($_GET['msg'] == 'property')
{
?>
<div align="center" style="width:100%;position:fixed;top:1px;" >
<select name="searchkey" id="searchkey" >
<option value="1">AD ID</option>
<option value="2">Customer ID</option>
<option value="3">Name</option>
<option value="4">Place</option>
</select>
<input type="text" name="idsearch" id="idsearch" size="30" value="" onkeyup="dynamicSearch(this.value)" maxlength="60" /><input type="button" name="button" id="serbut" onClick="result()" value="Search"/>
<div  id="restse" style="height:auto;width:150px;border:1px solid #ccc;overflow:auto;visibility:hidden;background-color:#FFF ">
</div>
</div>
<?php
$intype = 'online_user';
$sql = "SELECT property.id AS id,property.informed_id AS informed_id,property.info_type AS info_type,property.time AS time,property.type AS type,property.place AS place,property.city AS city,property.district AS district,property.area AS area,property.amount AS amount,property.image AS image,property.landmark AS landmark,property.category AS category,property.status AS status,property.sale_status AS sale_status,property.publish AS publish,register.name AS name FROM property INNER JOIN register ON property.informed_id=register.Id WHERE info_type='$intype'  ORDER BY property.id ASC";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{?>
<table width="2000px">
<tr> 
<th >AD ID</th>
<th >Customer ID</th>
<th >Customer Name</th>
<th >Customer Type</th>
<th >Time</th>
<th >Type</th>
<th >Place</th>
<th >City</th>
<th >District</th>
<th >Area</th>
<th >Amount</th>
<th >Image</th>
<th >Landmark</th>
<th >Category</th>
<th >Status</th>
<th >Sale Status</th>
<th >Publishing Status</th>
</tr>
<?php
$k = 0;
while($row = mysql_fetch_array($result))
{
echo'<tr id="p'.$row['id'].'">
<td align="center"><a href="searchresults.php?key=1&value='.$row['id'].'" target="_blank">'.$row['id'].'</a></td>
<td align="center">'.$row['informed_id'].'</td>
<td align="center">'.$row['name'].'</td>
<td align="center">'.$row['info_type'].'</td>
<td align="center">'.$row['time'].'</td>
<td align="center">'.$row['type'].'</td>
<td align="center">'.$row['place'].'</td>
<td align="center">'.$row['city'].'</td>
<td align="center">'.$row['district'].'</td>
<td align="center">'.$row['area'].'</td>
<td align="center">'.$row['amount'].'</td>
<td align="center"><img src="../upload/'.$row['image'].'" alt="photo" height=20px width=20px /></td>
<td align="center">'.$row['landmark'].'</td>
<td align="center">'.$row['category'].'</td>
<td align="center"><a href="javascript:changeStatus('.$row['id'].')">'.$row['status'].'</a></td>
<td align="center"><a href="javascript:changeSales('.$row['id'].')">'.$row['sale_status'].'</a></td>
<td align="center"><a href="javascript:changePublish('.$row['id'].')">'.$row['publish'].'</a></td></tr>
';
}
}
?>
</table>
<?php
}
if($_GET['msg'] == 'register')
{
?>
<div align="center" style="width:100%;position:fixed;top:1px;" >
<select name="searchkey" id="searchkey" >
<option value="5">Customer ID</option>
<option value="6">Name</option>
<option value="7">Email</option>
<option value="8">Phone</option>
</select>
<input type="text" name="idsearch" id="idsearch" size="30" value="" onkeyup="dynamicSearch(this.value)" maxlength="60" /><input type="button" name="button" id="serbut" onClick="result()" value="Search"/>
<div  id="restse" style="height:auto;width:150px;border:1px solid #ccc;overflow:auto;visibility:hidden;background-color:#FFF ">
</div>
</div>
<?php
$sql = "SELECT * FROM register WHERE user < 1000 ORDER BY Id ASC";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{?>
<table width="2000px">
<tr> 
<th >ID</th>
<th >Name</th>
<th >Mobile</th>
<th >Landline</th>
<th >Email</th>
<th >Type</th>
<th >Time</th>
<th >Address</th>
<th >IP</th>
<th >Number</th>
<th >Nickname</th>
<th >Place</th>
</tr>
<?php
$k = 0;
while($row = mysql_fetch_array($result))
{
echo'<tr id="'.$row['Id'].'">
<td align="center"><a href="searchresults.php?key=5&value='.$row['Id'].'" target="_blank">'.$row['Id'].'</a></td>
<td align="center">'.$row['name'].'</td>
<td align="center">'.$row['mobile'].'</td>
<td align="center">'.$row['landline'].'</td>
<td align="center">'.$row['email'].'</td>
<td align="center">'.$row['type'].'</td>
<td align="center">'.$row['time'].'</td>
<td align="center">'.$row['address'].'</td>
<td align="center">'.$row['ip'].'</td>
<td align="center">'.$row['number'].'</td>
<td align="center">'.$row['nickname'].'</td>
<td align="center">'.$row['place'].'</td>
';
}
}
?>
</table>
<?php
}
if($_GET['msg'] == 'order')
{
?>
<div align="center" style="width:100%;position:fixed;top:1px;" >
<select name="searchkey" id="searchkey" >
<option value="9" >Order ID</option>
<option value="10">User ID</option>
<option value="11">Profile ID</option>
<option value="12">Customer Name</option>
<option value="13">Mobile</option>
<option value="14">Email</option>
</select>
<input type="text" name="idsearch" id="idsearch" size="30" value="" onkeyup="dynamicSearch(this.value)" maxlength="60" /><input type="button" name="button" id="serbut" onClick="result()" value="Search"/>
<div  id="restse" style="height:auto;width:150px;border:1px solid #ccc;overflow:auto;visibility:hidden;background-color:#FFF ">
</div>
</div>
<?php
$sql = "SELECT * FROM payment ORDER BY id ASC";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{?>
<table width="2100px">
<tr> 
<th > ID</th>
<th >User ID</th>
<th >Profile ID</th>
<th >Cost</th>
<th >Amount</th>
<th >Mode</th>
<th >Bank</th>
<th >Branch</th>
<th >Date</th>
<th >Time</th>
<th >Customer</th>
<th >Phone</th>
<th >Email</th>
<th >Address</th>
<th >Status</th>
<th >Admin Status</th>
<th >Details Forward</th>
</tr>
<?php
$k = 0;
while($row = mysql_fetch_array($result))
{
echo'<tr id="'.$row['id'].'">
<td align="center"><a href="adminEdit.php?msg=order&key='.$row['id'].'" target="_blank">'.$row['id'].'</a></td>
<td align="center">'.$row['custid'].'</td>
<td align="center">'.$row['profileid'].'</td>
<td align="center">'.$row['cost'].'</td>
<td align="center">'.$row['amount'].'</td>
<td align="center">'.$row['mode'].'</td>
<td align="center">'.$row['bank'].'</td>
<td align="center">'.$row['branch'].'</td>
<td align="center">'.$row['date'].'</td>
<td align="center">'.$row['time'].'</td>
<td align="center">'.$row['customer'].'</td>
<td align="center">'.$row['phone'].'</td>
<td align="center">'.$row['email'].'</td>
<td align="center">'.$row['address'].'</td>
<td align="center">'.$row['status'].'</td>
<td align="center"><select onchange=admChange('.$row['id'].',this.value)>';?>
<option <?php if($row['admin_status'] == 'Recieved'){echo "selected";} ?> value="Recieved">Recieved</option>
<option <?php if($row['admin_status'] == 'Processing'){echo "selected";} ?> >Processing</option>
<option <?php if($row['admin_status'] == 'Delivered'){echo "selected";} ?> >Delivered</option>
<?php echo ' </select></td>';
if($row['admin_status'] == 'Processing')
{?>
<td align="center"> <a href="" onclick="javascript:void window.open('sendDetails.php?oid=<?php echo $row['id'] ?>&cid=<?php echo $row['custid'] ?>&pid=<?php echo $row['profileid'] ?>&mid=<?php echo $row['email'] ?>','_blank',
'width=500,height=700,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=1,resizable=0,left=100,top=100');return false;">Send Details</a></td>	
<?php
}
}
}
?>
</table>
<?php
}
if($_GET['msg'] == 'dataproperty')
{
?>
<div align="center" style="width:100%;position:fixed;top:1px;" >
<select name="searchkey" id="searchkey" >
<option value="1">AD ID</option>
<option value="2">Customer ID</option>
</select>
<input type="text" name="idsearch" id="idsearch" size="30" value="" onkeyup="dynamicSearch(this.value)" maxlength="60" /><input type="button" name="button" id="serbut" onClick="result()" value="Search"/>
<div  id="restse" style="height:auto;width:150px;border:1px solid #ccc;overflow:auto;visibility:hidden;background-color:#FFF ">
</div>
</div>
<?php
$intypes='operator';
$sql = "SELECT property.id AS id,property.informed_id AS informed_id,property.info_type AS info_type,property.time AS time,property.type AS type,property.place AS place,property.city AS city,property.district AS district,property.area AS area,property.amount AS amount,property.image AS image,property.landmark AS landmark,property.category AS category,property.status AS status,property.sale_status AS sale_status,property.publish AS publish,register.name AS name FROM property INNER JOIN register ON property.informed_id=register.Id WHERE info_type='$intypes'  ORDER BY property.id ASC";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{?>
<table width="2000px">
<tr> 
<th >AD ID</th>
<th >Customer ID</th>
<th >Customer Name</th>
<th >Customer Type</th>
<th >Time</th>
<th >Type</th>
<th >Place</th>
<th >City</th>
<th >District</th>
<th >Area</th>
<th >Amount</th>
<th >Image</th>
<th >Landmark</th>
<th >Category</th>
<th >Status</th>
<th >Sale Status</th>
<th >Publishing Status</th>
</tr>
<?php
$k = 0;
while($row = mysql_fetch_array($result))
{
echo'<tr id="p'.$row['id'].'">
<td align="center"><a href="searchresults.php?key=1&value='.$row['id'].'" target="_blank">'.$row['id'].'</a></td>
<td align="center">'.$row['informed_id'].'</td>
<td align="center">'.$row['name'].'</td>
<td align="center">'.$row['info_type'].'</td>
<td align="center">'.$row['time'].'</td>
<td align="center">'.$row['type'].'</td>
<td align="center">'.$row['place'].'</td>
<td align="center">'.$row['city'].'</td>
<td align="center">'.$row['district'].'</td>
<td align="center">'.$row['area'].'</td>
<td align="center">'.$row['amount'].'</td>
<td align="center"><img src="../upload/'.$row['image'].'" alt="photo" height=20px width=20px /></td>
<td align="center">'.$row['landmark'].'</td>
<td align="center">'.$row['category'].'</td>
<td align="center"><a href="javascript:changeStatus('.$row['id'].')">'.$row['status'].'</a></td>
<td align="center"><a href="javascript:changeSales('.$row['id'].')">'.$row['sale_status'].'</a></td>
<td align="center"><a href="javascript:changePublish('.$row['id'].')">'.$row['publish'].'</a></td></tr>
';
}
}
?>
</table>
<?php
}
if($_GET['msg'] == 'datacustomer')
{
?>
<div align="center" style="width:100%;position:fixed;top:1px;" >
<select name="searchkey" id="searchkey" >
<option value="5">Customer ID</option>
<option value="6">Name</option>
<option value="7">Email</option>
<option value="8">Phone</option>
</select>
<input type="text" name="idsearch" id="idsearch" size="30" value="" onkeyup="dynamicSearch(this.value)" maxlength="60" /><input type="button" name="button" id="serbut" onClick="result()" value="Search"/>
<div  id="restse" style="height:auto;width:150px;border:1px solid #ccc;overflow:auto;visibility:hidden;background-color:#FFF ">
</div>
</div>
<?php
 $sql = "SELECT * FROM register WHERE user > 1000 ORDER BY Id ASC";
 
$result = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($result) > 0) 
{?>
<table width="2000px">
<tr> 
<th >ID</th>
<th >Name</th>
<th >Mobile</th>
<th >Landline</th>
<th >Email</th>
<th >Type</th>
<th >Time</th>
<th >Address</th>
<th >IP</th>
<th >Number</th>
<th >User</th>
<th >Nickname</th>
<th >Place</th>
</tr>
<?php
$k = 0;
while($row = mysql_fetch_array($result))
{
echo'<tr id="'.$row['Id'].'">
<td align="center"><a href="searchresults.php?key=5&value='.$row['Id'].'" target="_blank">'.$row['Id'].'</a></td>
<td align="center">'.$row['name'].'</td>
<td align="center">'.$row['mobile'].'</td>
<td align="center">'.$row['landline'].'</td>
<td align="center">'.$row['email'].'</td>
<td align="center">'.$row['type'].'</td>
<td align="center">'.$row['time'].'</td>
<td align="center">'.$row['address'].'</td>
<td align="center">'.$row['ip'].'</td>
<td align="center">'.$row['number'].'</td>
<td align="center">'.$row['user'].'</td>
<td align="center">'.$row['nickname'].'</td>
<td align="center">'.$row['place'].'</td></tr>
';
}
}
?>
</table>
<?php
}
if($_GET['msg'] == 'dataoperator')
{
$sql = "SELECT * FROM operator ORDER BY id ASC ";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
if(mysql_num_rows($result) > 0) 
{
?>
<table><tr>
<th>ID</th>
<th>Username</th>
<th>Password</th>
<th>Name</th>
<th>Address</th>
<th>Mobile</th>
<th>Last Login</th>
<th>Action</th>
</tr>
<?php
$k=1;
while($row = mysql_fetch_array($result))
{
	echo '
	<tr>
	<td align="center">'.$k.'</td>
	<td align="center">'.$row['username'].'</td>
	<td align="center">'.$row['password'].'</td>
	<td align="center">'.$row['name'].'</td>
	<td align="center">'.$row['address'].'</td>
	<td align="center">'.$row['mobile'].'</td>
	<td align="center">'.$row['last_login'].'</td>
	<td align="center"><a href="javascript:useDelet('.$row['id'].')">Delete User</a></td>
	<tr>
	';
	$k++;
}?>
</table>
<?php
}
}
if($_GET['msg'] == 'addetails')
{
$sql = "SELECT * FROM flashads ORDER BY id ASC ";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
if(mysql_num_rows($result) > 0) 
{
?>
<table><tr>
<th>ID</th>
<th>Company Name</th>
<th>Customer Name</th>
<th>Ad Name</th>
<th>Address</th>
<th>Mobile</th>
<th>Ad File name</th>
<th>Preview</th>
<th>Publish Status</th>
<th>Premier Status</th>
</tr>
<?php
$k=1;
while($row = mysql_fetch_array($result))
{
	echo '
	<tr>
	<td align="center">'.$row['id'].'</td>
	<td align="center">'.$row['company'].'</td>
	<td align="center">'.$row['payee'].'</td>
	<td align="center">'.$row['adname'].'</td>
	<td align="center">'.$row['address'].'</td>
	<td align="center">'.$row['mobile'].'</td>
	<td align="center">'.$row['adfile'].'</td>
	<td align="center"><embed type="application/x-shockwave-flash" src="../flash/'.$row['adfile'].'" width="200" height="100" style="border:1px solid"></td>
	<td align="center"><a href="javascript:changeadPublish('.$row['id'].')">'.$row['publish'].'</a></td>
	<td align="center"><a href="javascript:changeadPremier('.$row['id'].')">'.$row['premier'].'</a></td>
	<tr>
	';
	
}?>
</table>
<?php
}
}
?>
</td>
</tr>
<tr>
<td colspan="2" style="background-color:#9FC;text-align:center;">
Copyright © Gitacommunications.com </td>
</tr>
</table>
</body>
</html>
