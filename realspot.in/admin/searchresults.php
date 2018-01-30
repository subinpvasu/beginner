<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/
xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search</title>
<script>
function changePremier(str)
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
xmlhttp.open("GET","validadmin.php?msg=premier&q="+str,true);
xmlhttp.send();
	
	}
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
</script>
</head>
<body>
<?php
$key   = $_GET['key'];
$value = $_GET['value'];
//1.ad id   ///key  //properyt
//2.customer
//3.name
//4.place
$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);
if($key == 1)//*******************************************************************************
{
	if(is_numeric($value)){
	$sql = "SELECT property.id AS id,property.informed_id AS informed_id,property.info_type AS info_type,
			property.time AS time,property.type AS type,property.place AS place,property.city AS city,
			property.district AS district,property.area AS area,property.amount AS amount,
			property.image AS image,property.landmark AS landmark,property.category AS category,
			property.status AS status,property.sale_status AS sale_status,property.publish AS publish,
			register.name AS name,property.description AS description,property.caption AS caption,
			property.remarks AS remarks,property.premier AS premier FROM property INNER JOIN register ON 
			property.informed_id=register.Id WHERE  property.id=".$value;
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		while($row = mysql_fetch_array($result))
		{
			echo '
<div align="center">			
			<table width="100%">
  <tr>
    <td>AD ID</td>
    <td>'.$row['id'].'</td>
  </tr>
  <tr>
    <td>Customer ID</td>
    <td>'.$row['informed_id'].'</td>
  </tr>
  <tr>
    <td>Customer Name</td>
    <td>'.$row['name'].'</td>
  </tr>
  <tr>
    <td>Customer Type</td>
    <td>'.$row['info_type'].'</td>
  </tr>
  <tr>
    <td>Time</td>
    <td>'.$row['time'].'</td>
  </tr>
  <tr>
    <td>Type</td>
    <td>'.$row['type'].'</td>
  </tr>
  <tr>
    <td>Place</td>
    <td>'.$row['place'].'</td>
  </tr>
  <tr>
    <td>City</td>
    <td>'.$row['city'].'</td>
  </tr>
  <tr>
    <td>District</td>
    <td>'.$row['district'].'</td>
  </tr>
  <tr>
    <td>Area</td>
    <td>'.$row['area'].'</td>
  </tr>
  <tr>
    <td>Amount</td>
    <td>'.$row['amount'].'</td>
  </tr>
  <tr>
    <td>Image</td>
    <td><img src="../upload/'.$row['image'].'" alt="photo" height=20px width=20px /></td>
  </tr>
  <tr>
    <td>Landmark</td>
    <td>'.$row['landmark'].'</td>
  </tr>
  <tr>
    <td>Category</td>
    <td>'.$row['category'].'</td>
  </tr>
   <tr>
    <td>Description</td>
    <td>'.$row['description'].'</td>
  </tr>
   <tr>
    <td>Caption</td>
    <td>'.$row['caption'].'</td>
  </tr>
   <tr>
    <td>Remarks</td>
    <td>'.$row['remarks'].'</td>
  </tr>
  <tr>
    <td>Status</td>
   <td ><a href="javascript:changeStatus('.$row['id'].')">'.$row['status'].'</a></td>
  </tr>
  <tr>
    <td>Sale Status</td>
   <td ><a href="javascript:changeSales('.$row['id'].')">'.$row['sale_status'].'</a></td>

  </tr>
  <tr>
    <td>Publishing Status</td>
   <td ><a href="javascript:changePublish('.$row['id'].')">'.$row['publish'].'</a></td></tr>

  </tr>
  <tr>
    <td>Premier Status</td>
   <td ><a href="javascript:changePremier('.$row['id'].')">'.$row['premier'].'</a></td></tr>

  </tr>
</table></div>
<div align="center"><a href="adminEdit.php?msg=property&key='.$row['id'].'">Edit</div>
';
           
		 }
	}
	else
	{
	echo "There are no results to show";	
	}
	}else
	{
	echo "Enter Valid ID  Number";	
	}
}
 if($key == 2)//---------------------------------------------------------------------
{
	if(is_numeric($value)){
	$sql = "SELECT * FROM property INNER JOIN register ON property.informed_id=register.Id WHERE  
			property.informed_id=".$value;
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		
		$k = 1;
		$i = 0;
		$arr = array();
		while($row = mysql_fetch_array($result))
		{
			if($k == 1)
			{
			echo '
			<table width="100%">
			<tr><td colspan="2">The Customer Details are</td></tr>
			<tr><td>Customer ID   </td><td>:</td> <td>'.$row['informed_id'].'</td></tr>
			<tr><td>Customer Name </td><td>:</td> <td>'.$row['name'].'</td></tr>
			<tr><td>Customer Type </td><td>:</td> <td>'.$row['info_type'].'</td></tr>
			
			';
			}
			$arr[$i] = $row['area'].'@'.$row['city'];
			$brr[$i] = $row['id'];
			$k++;
			$i++;
			
		}
$c = count($arr);
echo '<tr></tr><tr><td align="center" colspan="2">The Properties are</td></tr>';
for($m=0;$m<=$c;$m++)
{
echo'
<tr><td align="left" style="padding-left:15px" colspan="2">
<a href="searchresults.php?key=1&value='.$brr[$m].'" target="_blank">'.$arr[$m].'</a></td></tr>
';	
}


	}
	else
	{
		echo "There are no results to show";	
	}
	}else
	{
	echo "Enter Valid ID  Number";	
	}
}
if($key == 3)//------------------------------------------------------------------------------------
{
	$sql = "SELECT * FROM property INNER JOIN register ON property.informed_id=register.Id 
			WHERE  register.name='$value'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		
		$k = 1;
		$i = 0;
		$arr = array();
		while($row = mysql_fetch_array($result))
		{
			
			$arr[$i] = $row['name'].'|----|'.$row['area'].'@'.$row['city'];
			$brr[$i] = $row['id'];
			$k++;
			$i++;
			
		}
$c = count($arr);
echo '<table><tr></tr><tr><td align="center" colspan="2">The Properties are</td></tr>';
for($m=0;$m<=$c;$m++)
{
echo'
<tr><td align="left" style="padding-left:15px" colspan="2">
<a href="searchresults.php?key=1&value='.$brr[$m].'" target="_blank">'.$arr[$m].'</a></td></tr>
';	
}


	}
	else
	{
		echo "There are no results to show";	
	}
	
}
else if($key == 4)//------------------------------------------------------------------------------------
{
$sql = "SELECT * FROM property  WHERE  place='$value'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		
		$k = 1;
		$i = 0;
		$arr = array();
		while($row = mysql_fetch_array($result))
		{
			
			$arr[$i] = $row['place'].'|----|'.$row['area'];
			$brr[$i] = $row['id'];
			$k++;
			$i++;
			
		}
$c = count($arr);
echo '<table><tr></tr><tr><td align="center" colspan="2">The Properties are</td></tr>';
for($m=0;$m<=$c;$m++)
{
echo'
<tr><td align="left" style="padding-left:15px" colspan="2">
<a href="searchresults.php?key=1&value='.$brr[$m].'" target="_blank">'.$arr[$m].'</a></td></tr>
';	
}


	}
	else
	{
		echo "There are no results to show";	
	}	
}
else if($key == 5)//-----------------------------------------------
{
	if(is_numeric($value)){
	$sql = "SELECT * FROM register  WHERE  Id=".$value;
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		
	
		$arr = array();
		while($row = mysql_fetch_array($result))
		{
			echo '
<div align="center">			
			<table width="100%">
  <tr>
    <td>ID</td>
    <td>'.$row['Id'].'</td>
  </tr>
 
  <tr>
    <td>Customer Name</td>
    <td>'.$row['name'].'</td>
  </tr>
  <tr>
    <td>Mobile</td>
    <td>'.$row['mobile'].'</td>
  </tr>
  <tr>
    <td>LandLine</td>
    <td>'.$row['landline'].'</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>'.$row['email'].'</td>
  </tr>
  <tr>
    <td>Type</td>
    <td>'.$row['type'].'</td>
  </tr>
  <tr>
    <td>Time</td>
    <td>'.$row['time'].'</td>
  </tr>
  <tr>
    <td>Address</td>
    <td>'.$row['address'].'</td>
  </tr>
  <tr>
    <td>NickName</td>
    <td>'.$row['nickname'].'</td>
  </tr>
  <tr>
    <td>Place</td>
    <td>'.$row['place'].'</td>
  </tr>
  
   
</table></div>
<div align="center"><a href="adminEdit.php?msg=register&key='.$row['Id'].'">Edit</div>
';
			
		}


	}
	else
	{
		echo "There are no results to show";	
	}
	}else
	{
	echo "Enter Valid ID  Number";	
	}
}
else if($key == 6)//-----------------------------------------------
{
	
	$sql = "SELECT * FROM register WHERE name='$value'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		
		$k = 1;
		$i = 0;
		$arr = array();
		while($row = mysql_fetch_array($result))
		{
			
			$arr[$i] = $row['name'].'|----|'.$row['place'];
			$brr[$i] = $row['Id'];
			$k++;
			$i++;
			
		}
$c = count($arr);
echo '<table><tr></tr><tr><td align="center" colspan="2">The Properties are</td></tr>';
for($m=0;$m<=$c;$m++)
{
echo'
<tr><td align="left" style="padding-left:15px" colspan="2">
<a href="searchresults.php?key=5&value='.$brr[$m].'" target="_blank">'.$arr[$m].'</a></td></tr>
';	
}


	}
	else
	{
		echo "There are no results to show";	
	}
}
else if($key == 7)//-----------------------------------------------
{
	
	$sql = "SELECT * FROM register WHERE email='$value'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		while($row = mysql_fetch_array($result))
		{
				echo '
<div align="center">			
			<table width="100%">
  <tr>
    <td>ID</td>
    <td>'.$row['Id'].'</td>
  </tr>
 
  <tr>
    <td>Customer Name</td>
    <td>'.$row['name'].'</td>
  </tr>
  <tr>
    <td>Mobile</td>
    <td>'.$row['mobile'].'</td>
  </tr>
  <tr>
    <td>LandLine</td>
    <td>'.$row['landline'].'</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>'.$row['email'].'</td>
  </tr>
  <tr>
    <td>Type</td>
    <td>'.$row['type'].'</td>
  </tr>
  <tr>
    <td>Time</td>
    <td>'.$row['time'].'</td>
  </tr>
  <tr>
    <td>Address</td>
    <td>'.$row['address'].'</td>
  </tr>
  <tr>
    <td>NickName</td>
    <td>'.$row['nickname'].'</td>
  </tr>
  <tr>
    <td>Place</td>
    <td>'.$row['place'].'</td>
  </tr>
  
   
</table></div>
';
			
		}


	}
	else
	{
		echo "There are no results to show";	
	}
	
		}

else if($key == 8)//-----------------------------------------------
{
	
	$sql = "SELECT * FROM register WHERE mobile='$value'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		$k = 1;
		$i = 0;
		$arr = array();
		while($row = mysql_fetch_array($result))
		{
			
			$arr[$i] = $row['name'].'|----|'.$row['mobile'];
			$brr[$i] = $row['Id'];
			$k++;
			$i++;
			
		}
$c = count($arr);
echo '<table><tr></tr><tr><td align="center" colspan="2">The Properties are</td></tr>';
for($m=0;$m<=$c;$m++)
{
echo'
<tr><td align="left" style="padding-left:15px" colspan="2">
<a href="searchresults.php?key=5&value='.$brr[$m].'" target="_blank">'.$arr[$m].'</a></td></tr>
';	
}



	}
	else
	{
		echo "There are no results to show";	
	}
	
		}


else if($key == 9)//-----------------------------------------------
{
	?>
    <script>
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
function reFreshed()
{
	if(rld == 'Y')
	{
location.reload();
}
}

</script>
    
    <?php
	$sql = "SELECT * FROM payment WHERE id='$value'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		while($row = mysql_fetch_array($result))
		{
				echo '
<div align="center">			
			<table width="100%">
  <tr>
    <td>ID</td>
    <td>'.$row['id'].'</td>
  </tr>
 <tr>
    <td>User ID</td>
    <td>'.$row['custid'].'</td>
  </tr><tr>
    <td>Profile ID</td>
    <td>'.$row['profileid'].'</td>
  </tr>
  <tr>
    <td>Customer Name</td>
    <td>'.$row['customer'].'</td>
  </tr>
  <tr>
    <td>Cost</td>
    <td>'.$row['cost'].'</td>
  </tr>
  <tr>
    <td>Amount</td>
    <td>'.$row['amount'].'</td>
  </tr>
  <tr>
    <td>Mode</td>
    <td>'.$row['mode'].'</td>
  </tr>
  <tr>
    <td>Bank</td>
    <td>'.$row['bank'].'</td>
  </tr>
  <tr>
    <td>Branch</td>
    <td>'.$row['branch'].'</td>
  </tr>
  <tr>
    <td>Date</td>
    <td>'.$row['date'].'</td>
  </tr>
  <tr>
    <td>Time</td>
    <td>'.$row['time'].'</td>
  </tr>
  <tr>
    <td>Mobile</td>
    <td>'.$row['phone'].'</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>'.$row['email'].'</td>
  </tr>
  <tr>
    <td>Address</td>
    <td>'.$row['address'].'</td>
  </tr>
  <tr>
    <td>Admin Status</td>
    
	<td align="center"><select onchange="admChange('.$row['id'].',this.value)">';?>
  <option <?php if($row['admin_status'] == 'Recieved'){echo "selected";} ?> value="Recieved">Recieved</option>
  <option <?php if($row['admin_status'] == 'Processing'){echo selected;} ?> >Processing</option>
  <option <?php if($row['admin_status'] == 'Delivered'){echo selected;} ?> >Delivered</option>
  <?php echo ' </select></td>
';
if($row['admin_status'] == 'Processing')
{?>
<td align="center"> 
<a href="" onclick="javascript:void window.open('sendDetails.php?oid=<?php echo $row['id'] ?>&cid=
<?php echo $row['custid'] ?>&pid=<?php echo $row['profileid'] ?>&mid=<?php echo $row['email'] ?>','_blank',
'width=500,height=700,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=1,
resizable=0,left=100,top=100');return false;">Send Details</a></td>';	
<?php
}
	
?>	
	
	
	
  </tr>
   
</table></div>
<?php
		}
	}
	else
	{
		echo "There are no results to show";	
	}
	
		}

	else if($key == 10)//-----------------------------------------------
{
	
	$sql = "SELECT * FROM payment WHERE custid='$value'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		$k = 1;
		$i = 0;
		$arr = array();
		while($row = mysql_fetch_array($result))
		{
			
			$arr[$i] = $row['customer'].'|----|'.$row['profileid'];
			$brr[$i] = $row['id'];
			$k++;
			$i++;
			
		}
$c = count($arr);
echo '<table><tr></tr><tr><td align="center" colspan="2">The Properties are</td></tr>';
for($m=0;$m<=$c;$m++)
{
echo'
<tr><td align="left" style="padding-left:15px" colspan="2">
<a href="searchresults.php?key=9&value='.$brr[$m].'" target="_blank">'.$arr[$m].'</a></td></tr>
';	
}



	}
	else
	{
		echo "There are no results to show";	
	}
	
		}
		else if($key == 11)//-----------------------------------------------
{
	
	$sql = "SELECT * FROM payment WHERE profileid='$value'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		$k = 1;
		$i = 0;
		$arr = array();
		while($row = mysql_fetch_array($result))
		{
			
			$arr[$i] = $row['customer'].'|----|'.$row['phone'];
			$brr[$i] = $row['id'];
			$k++;
			$i++;
			
		}
$c = count($arr);
echo '<table><tr></tr><tr><td align="center" colspan="2">The Properties are</td></tr>';
for($m=0;$m<=$c;$m++)
{
echo'
<tr><td align="left" style="padding-left:15px" colspan="2">
<a href="searchresults.php?key=9&value='.$brr[$m].'" target="_blank">'.$arr[$m].'</a></td></tr>
';	
}



	}
	else
	{
		echo "There are no results to show";	
	}
	
		}
		else if($key == 12)//-----------------------------------------------
{
	
	$sql = "SELECT * FROM payment WHERE customer='$value'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		$k = 1;
		$i = 0;
		$arr = array();
		while($row = mysql_fetch_array($result))
		{
			
			$arr[$i] = $row['customer'].'|----|'.$row['phone'];
			$brr[$i] = $row['id'];
			$k++;
			$i++;
			
		}
$c = count($arr);
echo '<table><tr></tr><tr><td align="center" colspan="2">The Properties are</td></tr>';
for($m=0;$m<=$c;$m++)
{
echo'
<tr><td align="left" style="padding-left:15px" colspan="2">
<a href="searchresults.php?key=9&value='.$brr[$m].'" target="_blank">'.$arr[$m].'</a></td></tr>
';	
}



	}
	else
	{
		echo "There are no results to show";	
	}
	
		}
		else if($key == 13)//-----------------------------------------------
{
	
	$sql = "SELECT * FROM payment WHERE phone='$value'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		$k = 1;
		$i = 0;
		$arr = array();
		while($row = mysql_fetch_array($result))
		{
			
			$arr[$i] = $row['customer'].'|----|'.$row['phone'];
			$brr[$i] = $row['id'];
			$k++;
			$i++;
			
		}
$c = count($arr);
echo '<table><tr></tr><tr><td align="center" colspan="2">The Properties are</td></tr>';
for($m=0;$m<=$c;$m++)
{
echo'
<tr><td align="left" style="padding-left:15px" colspan="2">
<a href="searchresults.php?key=9&value='.$brr[$m].'" target="_blank">'.$arr[$m].'</a></td></tr>
';	
}



	}
	else
	{
		echo "There are no results to show";	
	}
	
		}
		else if($key == 14)//-----------------------------------------------
{
	
	$sql = "SELECT * FROM payment WHERE email='$value'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		$k = 1;
		$i = 0;
		$arr = array();
		while($row = mysql_fetch_array($result))
		{
			
			$arr[$i] = $row['customer'].'|----|'.$row['email'];
			$brr[$i] = $row['id'];
			$k++;
			$i++;
			
		}
$c = count($arr);
echo '<table><tr></tr><tr><td align="center" colspan="2">The Properties are</td></tr>';
for($m=0;$m<=$c;$m++)
{
echo'
<tr><td align="left" style="padding-left:15px" colspan="2">
<a href="searchresults.php?key=9&value='.$brr[$m].'" target="_blank">'.$arr[$m].'</a></td></tr>
';	
}



	}
	else
	{
		echo "There are no results to show";	
	}
	
		}
		
		if($key == 15)
		{
		$sql = "SELECT * FROM flashads WHERE id='$value'";
		}
		
		if($key == 25)//-----------------------------------------------
{
	if(is_numeric($value)){
	$sql = "SELECT * FROM register  WHERE  user=".$value;
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	$y = mysql_num_rows($result);
	if($y > 0) 
	{?>
		
			<table width="100%">
		<tr><td  align="center">Property List of Total-- <?php echo $y?></td></tr>
		<?php 
		
		while($row = mysql_fetch_array($result))
		{
			echo '

		
  			<tr><td style="padding="10px 50px"> </td></tr>
   			<tr><td><a href="searchresults.php?key=26&value='.$row['Id'].'">Property'.$row['Id'].'</a></td></tr>
';
			
		}
?></table>
<?php 

	}
	else
	{
		echo "There are no results to show";	
	}
	}else
	{
	echo "Enter Valid ID  Number";	
	}
}
if($key == 26)//-----------------------------------------------
{

	if(is_numeric($value)){
	$sql = "SELECT property.id AS id,property.informed_id AS informed_id,property.info_type AS info_type,
			property.time AS time,property.type AS type,property.place AS place,property.city AS city,
			property.district AS district,property.area AS area,property.amount AS amount,
			property.image AS image,property.landmark AS landmark,property.category AS category,
			property.status AS status,property.sale_status AS sale_status,property.publish AS publish,
			register.name AS name,property.description AS description,property.caption AS caption,
			property.remarks AS remarks,property.premier AS premier FROM property INNER JOIN register ON 
			property.informed_id=register.Id WHERE  property.informed_id=".$value;
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
		while($row = mysql_fetch_array($result))
		{
			echo '
<div align="center">			
			<table width="100%">
  <tr>
    <td>AD ID</td>
    <td>'.$row['id'].'</td>
  </tr>
  <tr>
    <td>Customer ID</td>
    <td>'.$row['informed_id'].'</td>
  </tr>
  <tr>
    <td>Customer Name</td>
    <td>'.$row['name'].'</td>
  </tr>
  <tr>
    <td>Customer Type</td>
    <td>'.$row['info_type'].'</td>
  </tr>
  <tr>
    <td>Time</td>
    <td>'.$row['time'].'</td>
  </tr>
  <tr>
    <td>Type</td>
    <td>'.$row['type'].'</td>
  </tr>
  <tr>
    <td>Place</td>
    <td>'.$row['place'].'</td>
  </tr>
  <tr>
    <td>City</td>
    <td>'.$row['city'].'</td>
  </tr>
  <tr>
    <td>District</td>
    <td>'.$row['district'].'</td>
  </tr>
  <tr>
    <td>Area</td>
    <td>'.$row['area'].'</td>
  </tr>
  <tr>
    <td>Amount</td>
    <td>'.$row['amount'].'</td>
  </tr>
  <tr>
    <td>Image</td>
    <td><img src="../upload/'.$row['image'].'" alt="photo" height=20px width=20px /></td>
  </tr>
  <tr>
    <td>Landmark</td>
    <td>'.$row['landmark'].'</td>
  </tr>
  <tr>
    <td>Category</td>
    <td>'.$row['category'].'</td>
  </tr>
   <tr>
    <td>Description</td>
    <td>'.$row['description'].'</td>
  </tr>
   <tr>
    <td>Caption</td>
    <td>'.$row['caption'].'</td>
  </tr>
   <tr>
    <td>Remarks</td>
    <td>'.$row['remarks'].'</td>
  </tr>
  <tr>
    <td>Status</td>
   <td ><a href="javascript:changeStatus('.$row['id'].')">'.$row['status'].'</a></td>
  </tr>
  <tr>
    <td>Sale Status</td>
   <td ><a href="javascript:changeSales('.$row['id'].')">'.$row['sale_status'].'</a></td>

  </tr>
  <tr>
    <td>Publishing Status</td>
   <td ><a href="javascript:changePublish('.$row['id'].')">'.$row['publish'].'</a></td></tr>

  </tr>
  <tr>
    <td>Premier Status</td>
   <td ><a href="javascript:changePremier('.$row['id'].')">'.$row['premier'].'</a></td></tr>

  </tr>
</table></div>
<div align="center"><a href="adminEdit.php?msg=property&key='.$row['id'].'">Edit</div>
';
           
		 }
	}
	else
	{
	echo "There are no results to show";	
	}
	}else
	{
	echo "Enter Valid ID  Number";	
	}
}
?>

</body>
</html>