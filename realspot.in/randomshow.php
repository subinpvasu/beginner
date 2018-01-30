<?php
$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);
$prop  = array();
$k = 'Y'; 
$p = 'paid';
$i = 0 ;
$c = 0 ;

$mysql = "SELECT * FROM property WHERE publish='$k' AND status='$p' AND frontpage='Y' AND premier='N' LIMIT 0,12";
$myresult = mysql_query($mysql)or die(mysql_error());
if(mysql_num_rows($myresult) > 0)
{
	?>
<table width="600px"  cellpadding="2" id="homefill" style="visibility: visible;margin-top:25px;">
<tr><td colspan="4" align="center" style="font-weight: bold">HOT PROPERTIES</td></tr>
<tr><td colspan="5" align="left"><img src="../images/green_line.png" alt="photo" width="598px"/> </td></tr>
<tr>
<?php
	while($col = mysql_fetch_array($myresult))
	{
		if(!empty($col['area']))
		{
  	$string = substr($col['area'].' @ '.$col['city'],0,40).'...';
		}
		else
		{
			$catgo = str_ireplace("/"," /",$col['category']);
			$string = substr($catgo.' @ '.$col['city'],0,40).'...';
		}
  	if($c%4==0)
  	{
  		echo'</tr><tr>
<td align="center" width="125px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
<div  style="background-image: url(../images/housepic.png);background-repeat: no-repeat;height:110px;width:124px;padding-top:8px">
<a href="javascript: window.parent.showDialog('.$col['id'].')">
<img src="upload/'.$col["image"].'" alt="" padding-top="10px" height="100" width="110"/></a></div>
<div align="center" style="background-image: url(../images/detail.png);background-repeat: no-repeat;width:122px;height:56px;padding-top:8px;margin-top:5px">
<a href="javascript: window.parent.showDialog('.$col['id'].')"> '.$string.'</a></div>
</td> 
';
  	}
  	else {
 echo'
<td align="center" width="125px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
<div  style="background-image: url(../images/housepic.png);background-repeat: no-repeat;height:110px;width:124px;padding-top:8px">
<a href="javascript: window.parent.showDialog('.$col['id'].')">
<img src="upload/'.$col["image"].'" alt="" padding-top="10px" height="100" width="110"/></a></div>
<div align="center" style="background-image: url(../images/detail.png);background-repeat: no-repeat;width:122px;height:56px;padding-top:8px;margin-top:5px">
<a href="javascript: window.parent.showDialog('.$col['id'].')"> '.$string.'</a></div>
</td> 
';
  }
 $c++;
	}

	 ?>
</tr>
</table>
<?php
}
$sql = "SELECT * FROM property WHERE publish='Y' AND status='unpaid' AND premier='N' ORDER BY id DESC LIMIT 0,8 ";
$result = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($result) > 0) 
{
?>

<table  width="600px" cellpadding="2" id="homefilled" style="visibility: visible;margin-top:35px;">
<tr><td colspan="5" align="center" style="font-weight: bold" >NEW PROPERTIES</td></tr>
<tr><td colspan="5"><img src="../images/green_line.png" alt="photo" height="5px"  width="598px"/> </td></tr>
<tr>

<?php
while($row = mysql_fetch_array($result))
{
	if(!empty($row['area']))
	{
	$strings = substr($row['area'].' @ '.$row['city'],0,40).'...';
	}
	else
	{ 
		$catgo = str_ireplace("/"," /",$row['category']);
		$strings = substr($catgo.' @ '.$row['city'],0,40).'...';
	}
if($i%4 == 0)
{
echo '
</tr><tr>
<td align="center" width="125px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
<div  style="background-image: url(../images/housepic.png);background-repeat: no-repeat;height:110px;width:124px;padding-top:8px">
<a href="javascript: window.parent.showDialog('.$row['id'].')">
<img src="upload/'.$row["image"].'" alt="" padding-top="10px" height="100" width="110"/></a></div>
<div align="center" style="background-image: url(../images/detail.png);background-repeat: no-repeat;width:122px;height:56px;padding-top:8px;margin-top:5px">
<a href="javascript: window.parent.showDialog('.$row['id'].')"> '.$strings.'</a></div>
</td> 
  
  ';
  
}
else
{
	echo '

<td align="center" width="125px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
<div  style="background-image: url(../images/housepic.png);background-repeat: no-repeat;height:110px;width:124px;padding-top:8px">
<a href="javascript: window.parent.showDialog('.$row['id'].')">
<img src="upload/'.$row["image"].'" alt="" padding-top="10px" height="100" width="110"/></a></div>
<div align="center" style="background-image: url(../images/detail.png);background-repeat: no-repeat;width:122px;height:56px;padding-top:8px;margin-top:5px">
<a href="javascript: window.parent.showDialog('.$row['id'].')"> '.$strings.'</a></div>
</td> 
  
  ';
}
$i++;
}

}
?>
</tr>
</table>
