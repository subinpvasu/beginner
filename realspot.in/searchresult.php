<html><head>
<title>
Realspot.in | Real Estate  in Thrissur | Real Estate Kerala | Kerala top realestate  | Free Real Estate property listing websites | 
Real Estate Property Agents In Kerala | Kerala Real Estate Property listing | 
Kerala Real Estate Properties | RealSpot.in Kerala | Free Realestate websites in Kerala |
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Real Estate Kerala, Property in Kerala and Real Estate Agents in Kerala, Kerala Real Estate, Thrissur Properties, Flats for sale kerala, Villas in Thrissur, Apartments in Thrissur, Flats at Kerala, Free Real Estate Kerala, Real estate" />
<meta name="keywords" content="Real Estate Kerala, Property in Kerala, Property Agents In Kerala, real estate Kerala, Kerala RealEstate, free kerala property website, Kerala RealEstate properties, Kerala  land for sale, Villas in Kochi,  house for rent in Thrissur, Thrissur Real Estate, upcoming villas in Thrissur, rubber estate in Idukki, realestate website design in Thrissur" />
<meta name="Real Estate Kerala" content="Property Agents In Kerala, Real Estate In Kerala"/>
<meta name="page-topic" content="Property Agents In Kerala, Real Estate In Kerala, Property of Kerala, real estate in Kerala, free properties in Kerala, Kerala property, Kerala nri investors, buy, sell, rent, Kerala, India."/>
<meta name="page-type" content="Property Agents In Kerala, Real Estate In Kerala, Property of Kerala, real estate in Kerala, free properties in india, india property, investors, buy, sell, rent, Kerala, India."/>
<meta name="audience" content="all"/>
<meta name="author" content="gitacommunications.com"/>
<meta name="description" content="real estate kerala" />
<meta name="keywords" content="real estate kerala, real estate thrissur,real estate"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<script type="text/javascript">
function redirekt(sbn)
{
	var direkt = "template.php?catid=login&number="+sbn;
	window.opener.location = direkt;
	this.window.close();
}
</script>
</head>
<body bgcolor="#C9E2BB" style="padding-left:25px">
<?php 
if($_GET['search'] == 'true')
{

$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);


$value = $_GET['key'];
if(is_numeric($value)){
//////////////////////////////////////////////////////////////////////



$sql = "SELECT * FROM property WHERE id='$value' AND publish='Y' ";
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
$price			=$row['amount'];
$area			=$row['area'];
$typ			=$row['type'];
/////////paid ads
$location		=$row['place'];
$landmark		=$row['landmark'];
$ownerid		=$row['informed_id'];
}
$sql = "SELECT * FROM register WHERE Id=".$ownerid;
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{
while($row = mysql_fetch_array($result))
{
$name		= $row['name'];
$mobile		= $row['mobile'];
$landline	= $row['landline'];
}
}
}
    else
	{
	echo "There are no results to show";	
	}
if($status == 'unpaid')
{
echo '
<table>
<tr>
<td style="width:510px">
<img src="upload/'.$image.'" alt="" padding-top="10" height="400" width="500"/>  
</td>
<td>
<table>
<tr><td colspan="2" align="center"><font  color="#CC3333"><b>Property For '.$typ.'</b></font></td></tr>
<tr><td></td></tr>
<tr><td align="center"><font  color="#000000"><b>Ad Id</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$ad_id.' </b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>District</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$district.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Nearest Town</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$city.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Type</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$type.' </b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Price</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$price.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Area</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$area.'</b></font></td></tr></table>
</td>
</tr>
</table>
<div align="right">
<a href="javascript:redirekt('.$ad_id.')">More Details</a>
</div>
';
}
else if($status == 'paid')
{
///////////////change these as soon as necessary
/*<!-- 
<tr><td align="center"><font  color="#000000"><b>Contact</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$name.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Mobile</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$mobile.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>LandLine</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$landline.'</b></font></td></tr>
-->*/
echo '
<table>
<tr>
<td style="width:510px">
<img src="upload/'.$image.'" alt="" padding-top="10" height="400" width="500"/>  
</td>
<td>
<table align="center">
<tr><td colspan="2" align="center"><font  color="#CC3333"><b>Property For '.$typ.'</b></font></td></tr>
<tr><td></td></tr>
<tr><td align="center"><font  color="#000000"><b>Ad Id</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$ad_id.' </b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>District</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$district.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Nearest Town</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$city.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Place</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$location.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Landmark</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$landmark.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Type</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$type.' </b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Area</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$area.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Price</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$price.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Contact</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$name.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Mobile</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$mobile.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>LandLine</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$landline.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Description</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$description.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Features</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$caption.'</b></font></td></tr>
</table>
</td>
</tr>
</table>
';
}
//////////////////////////////////////////////////////////////////////

}
else
	{
	echo "Enter Valid ID  Number";	
	}

	 }

?>
</body>
</html>