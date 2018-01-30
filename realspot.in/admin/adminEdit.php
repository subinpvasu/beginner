<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Details</title>
</head>
<body>
<?php
if($_GET['msg'] == 'done')
{
echo '
<script>
this.window.close();

</script>
';	
	
}
$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);
//return the id and edit the customer details,property details,Order details
//
//
//
//
//
//
//
$key = $_GET['key'];
if($_GET['msg'] == 'register')
{
	$sql = "SELECT * FROM register WHERE Id='$key'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
    while($row = mysql_fetch_array($result))
    {
echo' 
<form  action="admprocess.php"  method="post" name="reg_form">
<table   style="padding-left:15px" align="center" width="450px">
<tr><td>I am</td><td ><select class="select" name="type">
    <option name="" value="">--Select--</option>
    <option name="" value="Seller" ';
         if($row['type'] == 'Seller'){echo "selected";}
    echo '>Seller</option><option name="" value="Buyer" ';
         if($row['type'] == 'Buyer'){echo "selected";}
    echo '>Buyer</option><option name="" value="Agent" ';
         if($row['type'] == 'Agent'){echo "selected";}
    echo	'>Agent</option></select></td>
</tr>
<tr><td>Name </td><td ><input name="name" class="tb8" type="text" size="30" maxlength="30"  value=" '.strip_tags( $row['name'] ).'" /></td>
</tr>
<tr><td>Mobile</td><td >
    <input name="mobile" type="text" size="30" maxlength="12" id="mobile"
    value="'.  $row['mobile'].'"  class="tb8"/> </td>
</tr>
<tr><td>LandLine </td><td >
    <input type="text" name="phone" size="30" id="landline" class="tb8" 
    value="'.  $row['landline'].'" /></td>
</tr>
<tr><td>E-mail </td><td ><input name="email" type="text" class="tb8" size="30" maxlength="60" id="mail" 
	value="'.  $row['email'].'" /></td>
</tr>
<tr><td>NickName</td><td><input type="text" name="nickname" value="'.$row['nickname'].'" size="30" maxlength="60" /> </td>
</tr>
<tr><td>Place</td><td>  <input type="text" value="'.$row['place'].'" name="place" size="30" maxlength="60" />   </td></tr>
<tr><td>Address</td><td> <textarea name="address"> '.$row['address'].' </textarea>  </td>
</tr>
<tr><td></td><td align="left" colspan="2" valign="middle">
    <input type="hidden" name="id" value="'.$row['Id'].'">
    <input name="update" class="fb5" type="submit" value="Update" />
</td>
</tr>
</table>
</form>';
}

	}
}

if($_GET['msg'] == 'property')
{
$sql = "SELECT * FROM property WHERE  id='$key'";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{
while($row = mysql_fetch_array($result))
{
 $district = $row['district'];
 $city     = $row['city'];
 $place    = $row['place'];
 $landmark = $row['landmark'];
 $area     = $row['area'];
 $price    = $row['amount'];
 $type     = $row['type'];
 $category = $row['category'];
 $desc     = $row['description'];
 $cap      = $row['caption'];
 $remark   = $row['remarks'];
 $image    = $row['image'];
}
}
$ar = explode(".",$area);
$ardig = $ar[0];
$armea = $ar[1];
?>
<script>

function showpropChange(str)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("propcity").innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","../include/searchdata.php?msg=search&dist="+str,true);
xmlhttp.send();
}

var district = [
				"Thrissur",
				"Thiruvananthapuram",
				"Kollam",
				"Pathanamthitta",
				"Kottayam", 
				"Alappuzha",
				"Idukki",
				"Ernakulam",
				"Palakkad",
				"Malappuram",
				"Kozhikode",
				"Wayanad",
				"Kannur",
				"Kasargod"
			   ]; 
 
 
   var category = [
					
					"Independent House/Villa", 
					"Flat/Apartment/Villa",
					"Agricultural Land/Plantation",
					"Commercial Building", 
					"Quarry/Factory", 
					"Office Space/Shop/Godown",
					"Agricultural Land/Farm House",
					"Hotel/Resorts", 
					"Commercial/Residential plot"
 				 ];
				 
			
	function displayCity()
	{  
	var city = '<?php echo $city  ?>'; 
	var str  = '<?php echo $district ?>';
	
	
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
document.getElementById("disp").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","../include/searchdata.php?msg=dosearch&dist="+str+"&city="+city,true);
xmlhttp.send();
}
		
		function numberShow()
		{
var k =  document.getElementById("userid").value;		
		document.getElementById("warnings").innerHTML=k;
		}
	
</script>

<form name="property" action="admprocess.php"  enctype="multipart/form-data" method="post"> 
<table   align="center" width="400px"> 

<tr><td >District<font color="red">*</font>:</td><td>
<select class="select"  name="propdist" id="propdist"   onchange="showpropChange(this.value)" >
<option name="" value="--Select--">--Select--</option>
<script type="text/javascript">
var k = '<?php echo $district ?>';

for(var i=0;i<district.length;i++)
{
if(k == district[i])
{
document.write('<option selected value=\"'+district[i]+'\">'+ district[i]+'</option>');


}
else
{
document.write('<option value=\"'+district[i]+'\">'+ district[i]+'</option>');
}

}
</script>
</select>
<td  id="msgdist"></td></tr> 
<tr><td >Near to<font color="red">*</font>: </td><td id="disp">
<input class="tb8" type="text" name="propcity" id="propcity" value="<?php echo $city ?>" onmouseover="displayCity()"><td  id="msgcity"></td></tr>
<tr><td >Place<font color="red">*</font>:</td><td> <input class="tb8" name="propplace" id="propplace"  onchange="propPlace(this.value)"  value=" <?php echo $place; ?>" type="text" size="30" maxlength="30" /><td  id="msgplace"></td></tr>
<tr><td>Landmark<font color="red">*</font>:</td><td> <input class="tb8" name="landmark" id="landmark" onchange="propMark(this.value)" value=" <?php echo $landmark; ?>"  type="text" size="30" maxlength="30" /><td  id="msgmark"></td></tr>
<tr><td >Area<font color="red">*</font>:</td>
<td> 
<input class="tb8" id="proparea" name="proparea" value=" <?php echo $ardig; ?>" type="text" size="30"  onfocus="propArea(this.value)" onkeyup="propAreas(this.value)"
 maxlength="30"/></td>
<td id="msge">
<select class="selectm" id="unit" name="areameasure" onchange="showResult(this.value)" >
<option name="" value="">--Select--</option>
<option name="" <?php if($armea == 'sqft'){echo selected;}  ?> value=".sqft">sqft</option>
<option name="" <?php if($armea == 'cents'){echo selected;}  ?> value=".cents">cents</option>

<option name="" <?php if($armea == 'acres'){echo selected;}  ?> value=".acres">acres</option>
</select>
</td></tr>
 
 <tr><td>Category<font color="red">*</font>:</td><td>
 <select class="select"  name="propcat" id="propcat" onchange="showcatChange(this.value)" >
<option name="" value="--Select--">Category</option>
<script type="text/javascript">
var tem = "<?php echo $category; ?>";
category.sort();
for(var j=0;j<category.length;j++)
{
if(tem == category[j])
{
document.write('<option selected value=\"'+category[j]+'\">'+ category[j]+'</option>');
}
else
{
document.write('<option  value=\"'+category[j]+'\">'+ category[j]+'</option>');
}

}
function change()
{
var ks = document.getElementById("division").value;
if(ks == "Rent")
{
var prize = [
			"Upto 5000",
			"5000-10000",
			"10000-25000",
			"25000-50000",
			"50000-1 Lakh",
			"1 Lakh-2 Lakhs",
			"2 Lakhs-3 Lakhs",
			"3 Lakhs-5 Lakhs",
			"5 Lakhs-10 Lakhs",
			"10 Lakhs-15 Lakhs",
			"15 Lakhs-25 Lakhs",
			"25 Lakhs-50 Lakhs",
			"50 Lakhs  Above"
			];

				var mn="",i;
				var pq = 0;
				
				var abc = "<?php echo $type   ?>";
				if(abc == "Rent")
				{
				 pq = 1;
				var pqr = "<?php echo $price   ?>";
				}
				
		if(pq == 1 )
		{		
for (i=0;i<prize.length;i++)
  {

     if(prize[i] == pqr)
	  {
	  mn=mn+'<option selected value=\"'+prize[i]+'\">' + prize[i] + '</option>';
	  }
	  else
	  {
	   mn=mn+'<option value=\"'+prize[i]+'\">' + prize[i] + '</option>';
	  }
  }
      }
  else
	  {
	  for (i=0;i<prize.length;i++)
      {
	  mn=mn+'<option value=\"'+prize[i]+'\">' + prize[i] + '</option>';
	  }
	  }
	  document.getElementById("vision").innerHTML="<select class=select name=propprice id=propprice>"+mn+"</select>";
  }

else
{
mn='<input class="tb8" name="propprice" id="propprice" value="<?php if($type != "Rent"){echo $price;} ?>" onchange="propPrice(this.value)"  type="text" size="30"  maxlength="30" />';
document.getElementById("vision").innerHTML=mn;
}

}


function showText()
				{
				document.getElementById("text").style.visibility="visible";
				}
				function hideText()
				{
				document.getElementById("text").style.visibility="hidden";
				}


</script>
</select>
 <td  id="msg"></td></tr>
 <tr><td>Type<font color="red">*</font>:</td><td>  
<select class="select" name="proptype"  id="division"    onchange="change()">
<option name="" value="">--Select--</option>
<option name=""<?php if($type == 'Sale'){echo selected;}  ?>  value="Sale">Sale</option>
<option name=""<?php if($type == 'Rent'){echo selected;}  ?>  value="Rent">Rent/Lease/Pledge</option></select>
<td  id="msg"></td></tr> 

<tr><td >Price <font color="red">*</font><img  width="10" height="12" style="vertical-align: baseline" src="../images/rupees.png" 
alt="INR" />:
</td><td id="vision">
  <input class="tb8" name="propprice" id="propprice" onmouseover="change()" onchange="propPrice(this.value)"  type="text" size="30" value="<?php echo $price ?> " maxlength="30" /></td><td id="msgprice"  ></td></tr>

<tr><td >Decription:</td><td>  <textarea  class="ta8" name="description"  cols="23" rows="3"><?php echo $desc; ?></textarea><td  id="msg"></td></tr>

<tr><td >Caption:</td><td>  <textarea class="ta8" name="caption" cols="23" rows="3"><?php echo $cap; ?></textarea><td  id="msg"></td></tr>

<tr><td >Remarks:</td><td>  <textarea class="ta8" name="remarks" cols="23" rows="3"><?php echo $remark; ?> </textarea></td><td id="disphoto"><p style="position:absolute;visibility:hidden"id="text">Change Image  </p>  <img src="../upload/<?php echo $image  ?>" alt="Change Image" onmouseover="showText()" onmouseout="hideText()" height="50" width="50" title="Change Image"   
onclick="javascript:void window.open('../popup/upimage.php?auth=true','1348219726554',
'width=500,height=200,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');return false;"  />
<input type="hidden" name="photo" value="<?php echo $image  ?>" />
</td></tr>
<tr>
<td></td>
<td align="center" rowspan="10" valign="middle">
<input type="submit" class="fb5" name="acceptedit" value="Add to Internet"/>
<input type="hidden" name="ipaddress" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>"/> 
<input type="hidden" name="userid" id="userid" value="<?php echo $_GET['key']; ?>"/> 
</td></tr>  

</table>
</form>

<?php


}
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


if($_GET['msg'] == 'order')
{
	$sql = "SELECT * FROM payment WHERE id='$key' AND status='active'";
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
    
	<td ><select onchange="admChange('.$row['id'].',this.value)">';?>
  <option <?php if($row['admin_status'] == 'Recieved'){echo "selected";} ?> value="Recieved">Recieved</option><option <?php if($row['admin_status'] == 'Processing'){echo selected;} ?> >Processing</option><option <?php if($row['admin_status'] == 'Delivered'){echo selected;} ?> >Delivered</option><?php echo ' </select></td>
';
if($row['admin_status'] == 'Processing')
{?>
<td align="center"> <a href="" onclick="javascript:void window.open('sendDetails.php?oid=<?php echo $row['id'] ?>&cid=<?php echo $row['custid'] ?>&pid=<?php echo $row['profileid'] ?>&mid=<?php echo $row['email'] ?>','_blank',
'width=500,height=700,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=1,resizable=0,left=100,top=100');return false;">Send Details</a></td>';	
<?php
}
	
?>	
	
	
	
  </tr>
   
</table></div>
<?php
		}
		}
}

if($_GET['msg'] == 'flashads')
{
	$sql = "SELECT * FROM flashads WHERE id='$key'";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0) 
	{
    while($row = mysql_fetch_array($result))
    {
    ?>
    <table width="100%"  align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form action="flashadvert.php"  method="post" onsubmit="" enctype="multipart/form-data" name="form" id="form">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td>Name</td><td> <input type="text" name="name" value="<?php echo $row['payee'] ?>" size="30" maxlength="20"/></td>
</tr>
<tr>
<td>Company Name</td><td><input type="text" value="<?php echo $row['company'] ?>" name="comname" size="30" maxlength="60"/></td>
</tr>
<tr>
<td>Mobile</td><td><input type="text" value="<?php echo $row['mobile'] ?>" name="mobile" size="30" maxlength="20"/></td>
</tr>
<tr>
<td>Address</td><td><textarea name="address"><?php echo $row['address'] ?></textarea></td>
</tr>
<tr>
<td>Advertisement Name</td><td><input type="text" name="adname" value="<?php echo $row['adname'] ?>" size="30" maxlength="40"/></td>
</tr>
<tr>
<td>Caption</td><td><textarea name="caption"><?php echo $row['caption'] ?></textarea></td>
</tr>
<tr>
<input type="hidden" name="fid" value="<?php echo $row['id']?>" />

	<td align="center"><embed type="application/x-shockwave-flash" src="../flash/<?php echo $row['adfile'] ?>" width="200" height="100" style="border:1px solid"></embed></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="edit_submitted"  value="Upload" /></td>
</tr>
</table>
</td>
</form>
</tr>
</table> 
    <?php 
    }
	}
}
?>