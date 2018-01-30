<?php
include_once 'include/functions.php';
$prop  = array();
$k = 'Y'; 
$p = 'Y';
$i = 0 ;
$c = 0 ;

$mysql = "SELECT * FROM vehicle WHERE visibility='Y' AND golden='Y' AND frontpage='Y' ORDER BY id ASC LIMIT 0,15";
$myresult = mysql_query($mysql)or die(mysql_error());
if(mysql_num_rows($myresult) > 0)
{
	?>
<table width="740px"  cellpadding="2" id="homefill" style="display:block;margin-top:25px;float:left;">
<tr><td colspan="5" align="center" style="font-weight: bold;text-transform: uppercase">Golden Profiles</td></tr>
<tr><td colspan="5" align="left"><img src="./images/blue_line.png" alt="photo" width="738px"/> </td></tr>
<tr>
<?php
	while($col = mysql_fetch_array($myresult))
	{
		if(!empty($col['title']))
		{
				$catgo  = $col['title'];
				$cat    = $catgo;
				$catgo  = substr($catgo,0,20)."..";
  				$string = "<br/>PRICE : <img src=images/rupee.png height=9px/> ".digitAliasPrice(trim($col['price']))."/-";
		}
		
  	if($c%5==0)
  	{
  		echo'</tr><tr>
<td align="center" width="150px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:0px"> 
<div  style="height:130px;width:134px;padding-top:8px"><a target="_blank" href="index.php?msg=second&second='.$col['id'].'">';


if($col['photo']=='autovipany.jpg')
{	
	echo '<img src="images/autovipany.png" title="'.$cat.'" width="124px" height="110px"  alt="PHOTO" />';
}
else
	{
	echo '<p style="position:absolute;visibility:hidden;color:white;font-weight:bold;padding-top:25px;"  id="check">Change Profile Picture</p>';
	echo '<img src="upload/'.$col["photo"].'" title="'.$cat.'"  width="135px" height="140px" alt="PHOTO" />';
 	}
  		
echo '
</a></div>
<div align="center" style="background-image: url(../images/details.png);background-repeat: no-repeat;width:140px;height:56px;padding-top:8px;margin-top:5px">
<a target="_blank"  title="'.$cat.'"  href="index.php?msg=second&second='.$col['id'].'">'.$catgo . $string.'</a></div>
</td> 
';
  	}
  	else {
 echo'
<td align="center" width="150px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:0px"> 
<div  style="height:130px;width:134px;padding-top:8px"><a target="_blank" href="index.php?msg=second&second='.$col['id'].'">';
if($col['photo']=='autovipany.jpg')
{
	echo '<img src="images/autovipany.png" title="'.$cat.'"  width="124px" height="110px"  alt="PHOTO" />';
}
else
{
	echo '<p style="position:absolute;visibility:hidden;color:white;font-weight:bold;padding-top:25px;"  id="check">Change Profile Picture</p>';
	echo '<img src="upload/'.$col["photo"].'" title="'.$cat.'"  width="135px" height="140px" alt="PHOTO" />';
}
echo '
</a></div>
<div align="center" style="background-image: url(../images/details.png);background-repeat: no-repeat;width:140px;height:56px;padding-top:8px;margin-top:5px">
<a target="_blank" title="'.$cat.'"  href="index.php?msg=second&second='.$col['id'].'">'.$catgo . $string.'</a></div>
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
$sql = "SELECT * FROM vehicle WHERE visibility='Y' ORDER BY id DESC LIMIT 0,10";
$result = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($result) > 0) 
{
?>

<table  width="740px" cellpadding="2" id="homefilled" style="display:block;margin-top:0px;float:left;">
<tr><td colspan="5" align="center" style="font-weight: bold" >NEW PROFILES</td></tr>
<tr><td colspan="5"><img src="./images/blue_line.png" alt="photo" height="5px"  width="738px"/> </td></tr>
<tr>

<?php
while($row = mysql_fetch_array($result))
{
	if(!empty($row['title']))
		{
				$catgos = $row['title'];
				$ctg	= $catgos;
				$catgos = substr($catgos,0,20)."..";
  				$strings = "<br/>PRICE : <img src=images/rupee.png height=9px/> ".digitAliasPrice(trim($row['price']))."/-";
		}
		
if($i%5 == 0)
{
echo '
</tr><tr>
<td align="center" width="150px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:0px"> 
<div  style="height:110px;width:124px;padding-top:8px"><a target="_blank" href="index.php?msg=second&second='.$row['id'].'">';


if($row['photo']=='autovipany.jpg')
{
	
	echo '<img src="images/autovipany.png" title="'.$cat.'"  width="124px" height="110px"  alt="PHOTO" />';
	
 }
else {
	echo '<p style="position:absolute;visibility:hidden;color:white;font-weight:bold;padding-top:25px;"  id="check">Change Profile Picture</p>';

echo '<img src="upload/'.$row["photo"].'" title="'.$cat.'"  width="135px" height="140px" alt="PHOTO" />';
 
}

echo '
</a></div>
<div align="center" style="background-image: url(../images/details.png);background-repeat: no-repeat;width:140px;height:56px;padding-top:8px;margin-top:25px">
<a target="_blank" title="'.$cat.'"  href="index.php?msg=second&second='.$row['id'].'">'.$catgos . $strings.'</a></div>
</td> 
  
  ';
  
}
else
{
	echo '

<td align="center" width="150px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:0px"> 
<div  style="height:110px;width:124px;padding-top:8px"><a target="_blank" href="index.php?msg=second&second='.$row['id'].'">';
	
if($row['photo']=='autovipany.jpg')
{
	
	echo '<img src="images/autovipany.png" title="'.$cat.'"  width="100px" height="110px"  alt="PHOTO" />';
	
 }
else {
	echo '<p style="position:absolute;visibility:hidden;color:white;font-weight:bold;padding-top:25px;"  id="check">Change Profile Picture</p>';


echo '<img src="upload/'.$row["photo"].'"  title="'.$cat.'" width="135px" height="140px" alt="PHOTO" />';

}
	
echo '
</a></div>
<div align="center" style="background-image: url(../images/details.png);background-repeat: no-repeat;width:140px;height:56px;padding-top:8px;margin-top:25px">
<a target="_blank" title="'.$cat.'"  href="index.php?msg=second&second='.$row['id'].'">'.$catgos . $strings.'</a></div>
</td> 
  
  ';
}
$i++;
}

}
?>
</tr>
</table>
