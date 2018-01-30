<?php 
session_start();
if(is_numeric($_GET['number']))
{
$key =  $_GET['number'];
}
else if(is_numeric($_SESSION['advert']))
{
$key = $_SESSION['advert'];
$_SESSION['advert'] = '';
}
if(is_numeric($key))
{
$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);
$sql = "SELECT * FROM property WHERE id='$key' AND publish='Y' ";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{
while($row = mysql_fetch_array($result))
{
$ad_id			=$row['id'];
$description	=$row['description'];
$caption		=$row['caption'];
$image			=$row['image'];
$district		=$row['district'];
$city 			=$row['city'];	
$type           =$row['category'];
$status			=$row['status'];
$price 			=$row['amount'];
$typ			=$row['type'];
$area			=$row['area'];
/////////paid ads
$location		=$row['place'];
$landmark		=$row['landmark'];
$ownerid		=$row['informed_id'];
}
}
if($status == 'unpaid' && $_SESSION['id'] != $ownerid)
{
$mail = $_SESSION['email'];
$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);
$sql = "SELECT * FROM register WHERE email='$mail' ";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{
while($row = mysql_fetch_array($result))
{
$email 		= $row['email'];
$number		= $row['number'];
$name		= $row['name'];
$mobile		= $row['mobile'];
$landline	= $row['landline'];
}
}
echo '
<table style="padding-top:2px" >
<tr>
<td style="width:410px">
<img src="upload/'.$image.'" alt="" padding-top="10" height="350" width="400"/>  
</td>
<td>
<table>
<tr><td><font  color="#000000"><b>Ad Id</b></font></td>
<td style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$ad_id.' </b></font></td></tr>
<tr><td><font  color="#000000"><b>District</b></font></td>
<td style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$district.'</b></font></td></tr>
<tr><td><font  color="#000000"><b>Nearest Town</b></font></td>
<td style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$city.'</b></font></td></tr>
<tr><td><font  color="#000000"><b>Category</b></font></td>
<td style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$type.' </b></font></td></tr>
<tr><td><font  color="#000000"><b>Area</b></font></td>
<td style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$area.' </b></font></td></tr>
<tr><td><font  color="#000000"><b>Type</b></font></td>
<td style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$typ.' </b></font></td></tr>
<tr><td><font  color="#000000"><b>Price</b></font></td>
<td style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$price.'</b></font></td></tr>
';
if($_SESSION['account'] == 'true' && $_SESSION['email'] == $email && $ad_id == $number)
{
echo '
<tr><td><font  color="#000000"><b>Place</b></font></td>
<td style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$location.'</b></font></td></tr>
<tr><td><font  color="#000000"><b>Landmark</b></font></td>
<td style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$landmark.'</b></font></td></tr>
<tr><td><font  color="#000000"><b>Contact</b></font></td>
<td style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$name.'</b></font></td></tr>
<tr><td><font  color="#000000"><b>Mobile</b></font></td>
<td style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$mobile.'</b></font></td></tr>
<tr><td><font  color="#000000"><b>LandLine</b></font></td>
<td style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$landline.'</b></font></td></tr>
<tr><td><font  color="#000000"><b>Description</b></font></td>
<td style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$description.'</b></font></td></tr>
<tr><td><font  color="#000000"><b>Features</b></font></td>
<td style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$caption.'</b></font></td></tr>
';
}
echo '
</table>
</td>
</tr>
</table>
';
if($_SESSION['account'] == 'true' && $_SESSION['email'] == $email && $ad_id != $number)
{
echo '
<div align="right">
<a href="template.php?msg=pay&name='.$_SESSION['id'] .'&prid='.$ad_id.'">Contact Details </a>
</div> 
';
}
}
else
{
	echo '
	<script>
	document.getElementById("warning").innerHTML="Your Own Property!";
	</script>
	'	;
}
}
?>