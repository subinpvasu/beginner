<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PREMIUM</title>
<style type="text/css">
.titlebar{
background-image: url(../images/greenpremiumbck.png);
	background-repeat: no-repeat;
	width: 100%;
	float: left;
	color:white;
font-weight:bold;
}
#homefilyyl a
{
	color:red;
	font-weight: bold;
}
</style>
<script type="text/javascript" src="validation.js"></script>
</head>
<body>
<p class="titlebar" align="center">
PREMIUM JOBS
</p>
<?php 
include 'include/config.php';
$mysql = "SELECT requirement.designation AS designation,requirement.experience AS experience,
		  requirement.type AS type,requirement.lastchange AS postdate,employer.district AS district,
		  requirement.id AS reqid,employer.name AS company,employer.address AS address,
		  requirement.lastchange AS lastchange,requirement.category AS category FROM employer 
		  INNER JOIN requirement ON employer.id=requirement.empid WHERE 
		  employer.publish='Y' AND requirement.publish='Y' LIMIT 0,8";
$myresult = mysql_query($mysql)or die(mysql_error());
if(mysql_num_rows($myresult) > 0)
{?>
<table width="230px"  cellpadding="2" id="homefilyyl" style="margin-top:25px;position: absolute">
<tr><td>
<?php
$lowercont=0;
while($col = mysql_fetch_array($myresult))
{
$reqid  = ucwords(strtolower($col['reqid']));
$desig 	= ucwords(strtolower($col['designation'])); 
$expri  = ucwords(strtolower($col['experience']));
$jtype  = ucwords(strtolower($col['type']));
$postd  = ucwords(strtolower($col['postdate']));
$place  = ucwords(strtolower($col['district']));
$compn	= ucwords(strtolower($col['company']));
$addres = ucwords(strtolower($col['address']));
$last   = ucwords(strtolower($col['lastchange']));
$cate   = ucwords(strtolower($col['category']));
?>
<table  cellspacing="3" style="border-bottom:1px solid grey;width: 220px;float: left;padding-bottom:10px;
padding-top:10px;text-align: center;"
onmouseover="showIt(<?php echo $lowercont?>)" onmouseout="hideIt(<?php echo $lowercont?>)">
<tr><td style="text-align: center;" colspan="2"><b title="<?php echo $cate;?>">
<?php echo substr(trim($desig) ." @ ".trim($place),0,40).".."; ?></b></td></tr>
<tr><td><a id="<?php echo $lowercont?>" style="position:absolute;visibility:hidden;text-align: center;left:30%;"
 onmouseover="showIt(<?php echo $lowercont?>)" onmouseout="hideIt(<?php echo $lowercont?>)" 
  href="javascript:window.parent.showDisplay(<?php
			echo $reqid?>)">View &amp; Apply </a></td></tr>
<tr><td style="text-align: center;" >


<?php echo $addres; ?>






</td>
</tr>
</table>
		<?php 
			$lowercont++;
}
}

?>
</td>
</tr>
</table>
</body>
</html>
<!-- index.php?msg=login&key=<?php //echo $reqid ?> -->