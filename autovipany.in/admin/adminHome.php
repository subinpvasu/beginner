<?php 
include_once '../include/functions.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>autovipany.in|Administrator</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
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
<script type="text/javascript" src="../javascript/validation_js.js"></script>
<script type="text/javascript">
/*****************************************************************
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */
function resend(sbn)
{
	loadAJAX().onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    alert("Mail Sent.Please Check the Spam too.");
	    }
	  };
	xmlhttp.open("GET","create.php?msg=resend&who="+sbn,true);
	xmlhttp.send();
}
var temp="";
function changeStatus(prvlg,rid,rvl)//previlege,row id,row value
{
	var  r = confirm("Change Package Now...?");
	if(r==true)
	{
		loadAJAX().onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    temp=xmlhttp.responseText;
		    loadAgain(temp);
		    }
		  };
		xmlhttp.open("GET","validadmin.php?msg=previlege&p="+prvlg+"&i="+rid+"&v="+rvl,true);
		xmlhttp.send();
	} 
}
function loadAgain(temp)
{
	if(temp=='N'||temp=='Y')
	{
window.location.reload();
	}
}
function searchFromAdmin(begin,page)
{
	try {
		var sel = document.getElementById("type").value;
		var ipt = document.getElementById("entry").value;
		} catch (err) {}
			if(sel != null && ipt != null)
			{
				window.open("searchresults.php?msg="+sel+"&value="+ipt+"&begin="+begin+"&page="+page,"_blank","width=500,height=500,left=100,top=100");
			}
}
function populateEverySelectAdmin(sbn)
{
		loadAJAX().onreadystatechange = function() {
			
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("brand").innerHTML = xmlhttp.responseText;
				try {
					document.getElementsByTagName("SELECT")[1].setAttribute("id","entry"); 
				} catch (e) {}
				try {
					document.getElementsByTagName("INPUT")[0].setAttribute("id","entry"); 
				} catch (e) {}
				
				}
		};
		xmlhttp.open("GET", "../include/validation.php?msg=populate&key="+sbn, true);
		xmlhttp.send();
}
/*
 * 
 * 
 * 
 * 
 */


function nextPage()
{
	var pg  = "<?php if(empty($_GET['page'])){echo 2;}else{echo $_GET['page']+1;} ?>";
	var url = "<?php echo $_SERVER['PHP_SELF'];?>";
	var msg = "<?php echo $_GET['msg'];?>";
	window.location=url+"?msg="+msg+"&page="+pg;
}
function prevPage()
{
	var pg  = "<?php if(empty($_GET['page'])||$_GET['page'] == 1){echo 1;} else {echo $_GET['page']-1;} ?>";
	var url = "<?php echo $_SERVER['PHP_SELF'];?>";
	var msg = "<?php echo $_GET['msg'];?>";
	window.location=url+"?msg="+msg+"&page="+pg;
}


</script>
</head>
<body>

<div style="height:27px;width:100%;text-align:center;top:50px;position: fixed;">
<div style="float:left;width:23%;margin-left:20%;text-align:center;">
<select class="select" id="type" onchange="populateEverySelectAdmin(this.value)">
<option value="0">Select Value</option>
<option value="proid">Profile ID</option>
<option value="1">Scooter</option>
<option value="2">Bike</option>
<option value="3">Auto Rikshaw</option>
<option value="4">Car</option>
<option value="5">Bus/Tempo/Truck</option>
<option value="6">Other</option>
<option value="price">Price</option>
<option value="years">Year</option>
</select>
</div>
<div style="float:left;width:23%;margin-left:1%;text-align:center;" id="brand">
<input type="text" class="textbox" value="" id="entry" placeholder="Search Here.."/>
</div>
<div style="float:left;margin-left:1%;text-align:center;">
<input type="button" class="button" value="Search Now" onclick="searchFromAdmin(0,1)"/></div>
</div>


<table width="1300px" >
<tr>
<td align="center" colspan="2" style="background-color:#ADD8E6;height:84px;vertical-align: top;">
 <?php
switch ($_GET['msg'])
{
	case 'vehicle'		:echo "<h1>Online Vehicles</h1>";break;
	case 'datavehicle'	:echo "<h1>Data Entry Vehicles</h1>";break;
	case 'customer'		:echo "<h1>Online Customers</h1>";break;
	case 'datacustomer'	:echo "<h1>Data Entry Customers</h1>";break;
	case 'deo'			:echo "<h1>Data Entry Operators</h1>";break;
	case 'golden'		:echo "<h1>Golden Profiles</h1>";break;
	case 'premium'		:echo "<h1>Premium Profiles</h1>";break;
	case 'publish'		:echo "<h1>Published Profiles</h1>";break;
	case 'unpublish'	:echo "<h1>UnPublished Profiles</h1>";break;
}
$mn = $_GET['page'];
$end = 25;
if(empty($mn))
{
	$mn=1;
	$begin=0;

}
else
{
	$begin=($mn-1)*$end;
}
function TableCounter($table='rcowner',$tuple='entrance',$value='Y')
{
	$sql = "SELECT COUNT(id) FROM $table WHERE $tuple='$value'";
	$result = mysql_query($sql);
	$rr = mysql_fetch_array($result);
	return $rr[0];	
}
?>
<div align="left">
<input type="button" name="previous" value="PREVIOUS PAGE"  onclick="prevPage()" id="prevbutton" <?php if($_GET['page']==1 || empty($_GET['page'])){echo "hidden";}?> style="position: fixed;left: 25px;bottom:30px;background-color: green;color: white;border: green;" />
<input type="button" name="next" value="NEXT PAGE" onclick="nextPage()" id="nextbutton" style="position: fixed;right: 25px;bottom:30px;background-color: green;color: white;border: green;" />
</div>
</td>
</tr>
<tr>
<td style="background-color:#E0FFFF;width:200px;vertical-align:top;white-space:nowrap;">
<a href="adminHome.php?msg=customer" style="text-decoration:none">Customer Details			 </a><br/>
<a href="adminHome.php?msg=vehicle" style="text-decoration:none">Vehicle Details			 </a><br/>
<a href="adminHome.php?msg=datacustomer"    style="text-decoration:none">Data Entry Customer Details				 </a><br/>
<a href="adminHome.php?msg=datavehicle"    style="text-decoration:none">Data Entry Vehicle Details</a><br/>
<a href="adminHome.php?msg=deo"    style="text-decoration:none">Data Entry Operator Details</a><br/>
<a href="" onclick="javascript:void window.open('create.php','_blank',
'width=500,height=300,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=1,resizable=0,left=100,top=100');" style="text-decoration:none">Create New Data Operator				 </a><br/>
<!--<a href="" onclick="javascript:void window.open('flashadvert.php','_blank',
'width=500,height=300,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=1,resizable=0,left=100,top=100');return false;" style="text-decoration:none">Upload Advertisement				 </a><br/>
<!--<a href="adminHome.php?msg=addetails"    style="text-decoration:none">Advertisement Details</a><br/>
<a href="adminHome.php?msg=ad_order"    style="text-decoration:none">Advertisement Orders</a><br/>-->
<a href="adminHome.php?msg=golden"    style="text-decoration:none">Golden Profiles</a> : <?php  echo TableCounter('vehicle','golden','Y');?><br/>
<a href="adminHome.php?msg=premium"    style="text-decoration:none">Premium Profiles</a> : <?php  echo TableCounter('vehicle','premium','Y');?><br/>
<a href="adminHome.php?msg=publish"    style="text-decoration:none">Published Profiles</a> : <?php   echo TableCounter('vehicle','visibility','Y');?><br/>
<a href="adminHome.php?msg=unpublish"    style="text-decoration:none">Unpublished Profiles</a> : <?php   echo TableCounter('vehicle','visibility','N');?><br/><br />
Total Customers :<?php echo TableCounter('rcowner','visibility','Y');?><br/>
Total Profiles  :<?php echo TableCounter('vehicle','visibility','Y')+TableCounter('vehicle','visibility','N');?><br />
</td>
<td style="background-color:#eeeeee;text-align:top;vertical-align: top;text-decoration:none;">
<?php if($_GET['msg']=='vehicle')
{
	$k=$begin+1;
	$sql = "SELECT id FROM vehicle WHERE visibility='Y' AND online_entry='Y' ORDER BY id ASC LIMIT $begin,$end";
	$result = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($result)>0)
	{
	
?>
<table  style="text-align:center;color:brown;">
<tr>
<th>Sl.</th>
<th>Image</th>
<th>Brand</th>
<th>Model</th>
<th>Year</th>
<th>Price</th>
<th>Owner</th>
<th>Visibility</th>
<th>Golden</th>
<th>Premium</th>
<th>Genuine</th>
</tr><?php while($row = mysql_fetch_array($result)){
?>
<tr>
<td title="<?php echo $row[0]; ?>"><a target="_blank"  href="adminEdit.php?first=<?php echo $row[0]; ?>"><?php echo $k;?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo '<img src="../upload/'.getDetailsFromTable('photo','vehicle',$row[0]).'" width="40px" height="40px"/>'; ?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php
$z = strtolower($type[getDetailsFromTable('type','vehicle',$row[0])]);
echo  displayArrayasString($$z,getDetailsFromTable('brand','vehicle',$row[0])); ?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('model','vehicle',$row[0]);?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo displayArrayasString($year,getDetailsFromTable('years','vehicle',$row[0]))?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo "<img src=../images/rupee.png height=10px/> ".number_format(getDetailsFromTable('price','vehicle',$row[0]))."/-";?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('name','rcowner',getDetailsFromTable('holder','vehicle',$row[0]));?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('guest','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('visibility','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('visibility','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('golden','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('golden','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('golden','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('premium','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('premium','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('premium','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('genuine','vehicle',$row[0]);?></td>
</tr><?php $k++;}?>
</table><?php }
}
if($_GET['msg']=='datavehicle')
{
	$k=$begin+1;
	$sql = "SELECT id FROM vehicle WHERE visibility='Y' AND online_entry='N' ORDER BY id ASC LIMIT $begin,$end";
	$result = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($result)>0)
	{
	
?>
<table  style="text-align:center;color:brown;">
<tr>
<th>Sl.</th>
<th>Image</th>
<th>Brand</th>
<th>Model</th>
<th>Year</th>
<th>Price</th>
<th>Owner</th>
<th>Registered By</th>
<th>Visibility</th>
<th>Golden</th>
<th>Premium</th>
<th>Genuine</th>
</tr><?php while($row = mysql_fetch_array($result)){
?>
<tr>
<td title="<?php echo $row[0]; ?>"><a  target="_blank" href="adminEdit.php?first=<?php echo $row[0]; ?>"><?php echo $k;?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo '<img src="../upload/'.getDetailsFromTable('photo','vehicle',$row[0]).'" width="40px" height="40px"/>'; ?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php
$z = strtolower($type[getDetailsFromTable('type','vehicle',$row[0])]);
echo  displayArrayasString($$z,getDetailsFromTable('brand','vehicle',$row[0])); ?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('model','vehicle',$row[0]);?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo displayArrayasString($year,getDetailsFromTable('years','vehicle',$row[0]))?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo "<img src=../images/rupee.png height=10px/> ".number_format(getDetailsFromTable('price','vehicle',$row[0]))."/-";?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('name','rcowner',getDetailsFromTable('holder','vehicle',$row[0]));?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('name','data_entry_operator',getDetailsFromTable('deo','vehicle',$row[0]));?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('guest','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('visibility','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('visibility','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('golden','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('golden','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('golden','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('premium','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('premium','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('premium','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('genuine','vehicle',$row[0]);?></td>
</tr><?php $k++;}?>
</table><?php }
}
if ($_GET['msg']=='customer')
{

	$k=$begin+1;
	$sql = "SELECT id FROM rcowner WHERE visibility='Y' AND entrance='Y' ORDER BY id ASC LIMIT $begin,$end";
	$result = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($result)>0)
	{
	
?>
<table  style="text-align:center;color:brown;">
<tr>
<th>Sl.</th>
<th>Name</th>
<th>Type</th>
<th>Email</th>
<th>Phone</th>
<th>Mobile</th>
<th>Password</th>
</tr><?php while($row = mysql_fetch_array($result)){
?>
<tr>
<td title="<?php echo $row[0]; ?>"><a  target="_blank" href="adminEdit.php?waste=<?php echo $row[0]; ?>"><?php echo $k;?></a></td>
<td><?php echo getDetailsFromTable('name','rcowner',$row[0]);?></td>
<td><?php echo getDetailsFromTable('type','rcowner',$row[0]);?></td>
<td><?php echo getDetailsFromTable('email','rcowner',$row[0]);?></td>
<td><?php echo getDetailsFromTable('phone','rcowner',$row[0]);?></td>
<td><?php echo getDetailsFromTable('mobile','rcowner',$row[0]);?></td>
<td><?php echo getDetailsFromTable('password','rcowner',$row[0]);?></td>
</tr><?php $k++;}?>
</table><?php }
}
if ($_GET['msg']=='datacustomer')
{

	$k=$begin+1;
	$sql = "SELECT id FROM rcowner WHERE visibility='Y' AND entrance='N' ORDER BY id ASC LIMIT $begin,$end";
	$result = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($result)>0)
	{
	
?>
<table  style="text-align:center;color:brown;">
<tr>
<th>Sl.</th>
<th>Name</th>
<th>Type</th>
<th>Email</th>
<th>Phone</th>
<th>Mobile</th>
<th>Password</th>
</tr><?php while($row = mysql_fetch_array($result)){
?>
<tr>
<td title="<?php echo $row[0]; ?>"><a  target="_blank" href="adminEdit.php?waste=<?php echo $row[0]; ?>"><?php echo $k;?></a></td>
<td><?php echo getDetailsFromTable('name','rcowner',$row[0]);?></td>
<td><?php echo getDetailsFromTable('type','rcowner',$row[0]);?></td>
<td><?php echo getDetailsFromTable('email','rcowner',$row[0]);?></td>
<td><?php echo getDetailsFromTable('phone','rcowner',$row[0]);?></td>
<td><?php echo getDetailsFromTable('mobile','rcowner',$row[0]);?></td>
<td><?php echo getDetailsFromTable('password','rcowner',$row[0]);?></td>
</tr><?php $k++;}?>
</table><?php }
}
if ($_GET['msg']=='deo')
{

	$k=$begin+1;
	$sql = "SELECT id FROM data_entry_operator  ORDER BY id ASC";
	$result = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($result)>0)
	{
	
?>
<table  style="text-align:center;color:brown;">
<tr>
<th>Sl.</th>
<th>Name</th>
<th>Mobile</th>
<th>Email</th>
<th>Address</th>
<th>Last Visit</th>
<th>Password</th>
<th>Resend Details</th>
</tr><?php while($row = mysql_fetch_array($result)){
?>
<tr>
<td title="<?php echo $row[0]; ?>"><?php echo $k;?></td>
<td><?php echo getDetailsFromTable('name','data_entry_operator',$row[0]);?></td>
<td><?php echo getDetailsFromTable('mobile','data_entry_operator',$row[0]);?></td>
<td><?php echo getDetailsFromTable('email','data_entry_operator',$row[0]);?></td>
<td><?php echo getDetailsFromTable('address','data_entry_operator',$row[0]);?></td>
<td><?php echo getDetailsFromTable('last','data_entry_operator',$row[0]);?></td>
<td><?php echo getDetailsFromTable('password','data_entry_operator',$row[0]);?></td>
<td><button onclick="resend(<?php echo $row[0]; ?>)">Resend</button></td>
</tr><?php $k++;}?>
</table><?php }
}
if($_GET['msg']=='golden')
{
	$k=$begin+1;
	$sql = "SELECT id FROM vehicle WHERE visibility='Y' AND golden='Y' ORDER BY id ASC LIMIT $begin,$end";
	$result = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($result)>0)
	{
	
?>
<table  style="text-align:center;color:brown;">
<tr>
<th>Sl.</th>
<th>Image</th>
<th>Brand</th>
<th>Model</th>
<th>Year</th>
<th>Price</th>
<th>Owner</th>
<th>Front Page Display</th>
<th>Visibility</th>
<th>Golden</th>
<th>Premium</th>
<th>Genuine</th>
</tr><?php while($row = mysql_fetch_array($result)){
?>
<tr>
<td title="<?php echo $row[0]; ?>"><a target="_blank"  href="adminEdit.php?first=<?php echo $row[0]; ?>"><?php echo $k;?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo '<img src="../upload/'.getDetailsFromTable('photo','vehicle',$row[0]).'" width="40px" height="40px"/>'; ?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php
$z = strtolower($type[getDetailsFromTable('type','vehicle',$row[0])]);//$car
echo  displayArrayasString($$z,getDetailsFromTable('brand','vehicle',$row[0])); ?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('model','vehicle',$row[0]);?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo displayArrayasString($year,getDetailsFromTable('years','vehicle',$row[0]))?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo "<img src=../images/rupee.png height=10px/> ".number_format(getDetailsFromTable('price','vehicle',$row[0]))."/-";?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('name','rcowner',getDetailsFromTable('holder','vehicle',$row[0]));?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('frontpage','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('frontpage','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('frontpage','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('guest','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('guest','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('visibility','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('golden','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('golden','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('golden','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('premium','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('premium','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('premium','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('genuine','vehicle',$row[0]);?></td>
</tr><?php $k++;}?>
</table><?php }
}
if($_GET['msg']=='premium')
{
	$k=$begin+1;
	$sql = "SELECT id FROM vehicle WHERE visibility='Y' AND premium='Y' ORDER BY id ASC LIMIT $begin,$end";
	$result = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($result)>0)
	{
	
?>
<table  style="text-align:center;color:brown;">
<tr>
<th>Sl.</th>
<th>Image</th>
<th>Brand</th>
<th>Model</th>
<th>Year</th>
<th>Price</th>
<th>Owner</th>
<th>Visibility</th>
<th>Golden</th>
<th>Premium</th>
<th>Genuine</th>
</tr><?php while($row = mysql_fetch_array($result)){
?>
<tr>
<td title="<?php echo $row[0]; ?>"><a  target="_blank" href="adminEdit.php?first=<?php echo $row[0]; ?>"><?php echo $k;?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo '<img src="../upload/'.getDetailsFromTable('photo','vehicle',$row[0]).'" width="40px" height="40px"/>'; ?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php
$z = strtolower($type[getDetailsFromTable('type','vehicle',$row[0])]);//$car
echo  displayArrayasString($$z,getDetailsFromTable('brand','vehicle',$row[0])); ?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('model','vehicle',$row[0]);?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo displayArrayasString($year,getDetailsFromTable('years','vehicle',$row[0]))?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo "<img src=../images/rupee.png height=10px/> ".number_format(getDetailsFromTable('price','vehicle',$row[0]))."/-";?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('name','rcowner',getDetailsFromTable('holder','vehicle',$row[0]));?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('guest','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('visibility','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('visibility','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('golden','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('golden','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('golden','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('premium','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('premium','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('premium','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('genuine','vehicle',$row[0]);?></td>
</tr><?php $k++;}?>
</table><?php }
}
if($_GET['msg']=='publish')
{
	$k=$begin+1;
	$sql = "SELECT id FROM vehicle WHERE visibility='Y'  ORDER BY id ASC LIMIT $begin,$end";
	$result = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($result)>0)
	{
	
?>
<table  style="text-align:center;color:brown;">
<tr>
<th>Sl.</th>
<th>Image</th>
<th>Brand</th>
<th>Model</th>
<th>Year</th>
<th>Price</th>
<th>Owner</th>
<th>Visibility</th>
<th>Golden</th>
<th>Premium</th>
<th>Genuine</th>
</tr><?php while($row = mysql_fetch_array($result)){
?>
<tr>
<td title="<?php echo $row[0]; ?>"><a target="_blank"  href="adminEdit.php?first=<?php echo $row[0]; ?>"><?php echo $k;?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo '<img src="../upload/'.getDetailsFromTable('photo','vehicle',$row[0]).'" width="40px" height="40px"/>'; ?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php
$z = strtolower($type[getDetailsFromTable('type','vehicle',$row[0])]);//$car
echo  displayArrayasString($$z,getDetailsFromTable('brand','vehicle',$row[0])); ?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('model','vehicle',$row[0]);?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo displayArrayasString($year,getDetailsFromTable('years','vehicle',$row[0]))?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo "<img src=../images/rupee.png height=10px/> ".number_format(getDetailsFromTable('price','vehicle',$row[0]))."/-";?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('name','rcowner',getDetailsFromTable('holder','vehicle',$row[0]));?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('guest','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('visibility','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('visibility','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('golden','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('golden','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('golden','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('premium','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('premium','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('premium','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('genuine','vehicle',$row[0]);?></td>
</tr><?php $k++;}?>
</table><?php }
}
if($_GET['msg']=='unpublish')
{
	$k=$begin+1;
	$sql = "SELECT id FROM vehicle WHERE visibility='N' ORDER BY id ASC LIMIT $begin,$end";
	$result = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($result)>0)
	{
	
?>
<table  style="text-align:center;color:brown;">
<tr>
<th>Sl.</th>
<th>Image</th>
<th>Brand</th>
<th>Model</th>
<th>Year</th>
<th>Price</th>
<th>Owner</th>
<th>Visibility</th>
<th>Golden</th>
<th>Premium</th>
<th>Genuine</th>
</tr><?php while($row = mysql_fetch_array($result)){
?>
<tr>
<td title="<?php echo $row[0]; ?>"><a target="_blank" href="adminEdit.php?first=<?php echo $row[0]; ?>"><?php echo $k;?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo '<img src="../upload/'.getDetailsFromTable('photo','vehicle',$row[0]).'" width="40px" height="40px"/>'; ?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php
$z = strtolower($type[getDetailsFromTable('type','vehicle',$row[0])]);//$car
echo  displayArrayasString($$z,getDetailsFromTable('brand','vehicle',$row[0])); ?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('model','vehicle',$row[0]);?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo displayArrayasString($year,getDetailsFromTable('years','vehicle',$row[0]))?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo "<img src=../images/rupee.png height=10px/> ".number_format(getDetailsFromTable('price','vehicle',$row[0]))."/-";?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('name','rcowner',getDetailsFromTable('holder','vehicle',$row[0]));?></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('guest','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('visibility','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('visibility','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('golden','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('golden','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('golden','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><a href="javascript:changeStatus('premium','<?php echo $row[0]; ?>','<?php echo getDetailsFromTable('premium','vehicle',$row[0]);?>')"><?php echo getDetailsFromTable('premium','vehicle',$row[0]);?></a></td>
<td title="<?php echo getDetailsFromTable('title','vehicle',$row[0]);?>"><?php echo getDetailsFromTable('genuine','vehicle',$row[0]);?></td>
</tr><?php $k++;}?>
</table><?php }
}
?>
</td>
</tr>
<tr>
<td colspan="2" style="background-color:#9FC;text-align:center;">
Copyright &copy; Gitacommunications.com <?php echo date("Y");?></td>
</tr>
</table>
</body>
</html>
