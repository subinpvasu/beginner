<?php
include_once 'include/admin.php';
$prop  = array();
$k = 'Y'; 
$p = 'Y';
$i = 0 ;
$c = 0 ;

$mysql = "SELECT * FROM personal_details  WHERE visibility='$k' AND golden='$p' AND premium='N' AND faceplay='Y' LIMIT 0,15";
$myresult = mysql_query($mysql)or die(mysql_error());
if(mysql_num_rows($myresult) > 0)
{
	?>
<table width="740px"  cellpadding="2" id="homefill" style="visibility: visible;margin-top:25px;float:left;">
<tr><td colspan="5" align="center" style="font-weight: bold;text-transform: uppercase">Golden Profiles</td></tr>
<tr><td colspan="5" align="left"><img src="../images/red_line.png" alt="photo" width="738px"/> </td></tr>
<tr>
<?php
	while($col = mysql_fetch_array($myresult))
	{
		if(!empty($col['age']))
		{
				$catgo = $col[2]."<br />";
  	$string = "AGE : ".$col['age'];
		}
		else
		{
			$catgo = $col[2]."<br />";
			$string = "AGE : ".$col['age'];
		}
  	if($c%5==0)
  	{
  		echo'</tr><tr>
<td align="center" width="125px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
<div  style="height:110px;width:124px;padding-top:8px">';

$zql	 = "SELECT * FROM other WHERE person_id=".$col[0];
$rezult	 = mysql_query($zql);
$zata 	 = mysql_fetch_array($rezult);
if($zata['profile_image']=='')
{
	if($col['gender']=='B')
	{
	echo '<img src="images/girl.png" width="124px" height="110px"  alt="PHOTO" />';
	}
else 
{
	echo '<img src="images/boy.png" width="124px" height="110px"  alt="PHOTO" />';
	}
 }
else {
	echo '<p style="position:absolute;visibility:hidden;color:white;font-weight:bold;padding-top:25px;"  id="check">Change Profile Picture</p>';
if($zata['profile_image']=='YR'){

echo '<img src="upload/'.$zata["photos"].'" width="100px" height="110px" alt="PHOTO" />';
 }
if($zata['profile_image']=='YC'){

echo '<img src="upload/'.$zata["photou"].'" width="100px" height="110px" alt="PHOTO" />';
 }
if($zata['profile_image']=='YL'){

echo '<img src="upload/'.$zata["photob"].'" width="100px" height="110px" alt="PHOTO" />';
 }
}
  		
echo '<a target="_blank" href="index.php?msg=second&second='.$col['id'].'">
</a></div>
<div align="center" style="background-image: url(../images/details.png);background-repeat: no-repeat;width:122px;height:56px;padding-top:8px;margin-top:5px">
<a target="_blank" href="index.php?msg=second&second='.$col['id'].'">'.$catgo . $string.'</a></div>
</td> 
';
  	}
  	else {
 echo'
<td align="center" width="125px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
<div  style="height:110px;width:124px;padding-top:8px">';
  	$zql	 = "SELECT * FROM other WHERE person_id=".$col[0];
$rezult	 = mysql_query($zql);
$zata 	 = mysql_fetch_array($rezult);
if($zata['profile_image']=='')
{
	if($col['gender']=='B')
	{
	echo '<img src="images/girl.png" width="124px" height="110px"  alt="PHOTO" />';
	}
else 
{
	echo '<img src="images/boy.png" width="124px" height="110px"  alt="PHOTO" />';
	}
 }
else {
	echo '<p style="position:absolute;visibility:hidden;color:white;font-weight:bold;padding-top:25px;"  id="check">Change Profile Picture</p>';
if($zata['profile_image']=='YR'){

echo '<img src="upload/'.$zata["photos"].'" width="100px" height="110px" alt="PHOTO" />';
 }
if($zata['profile_image']=='YC'){

echo '<img src="upload/'.$zata["photou"].'" width="100px" height="110px" alt="PHOTO" />';
 }
if($zata['profile_image']=='YL'){

echo '<img src="upload/'.$zata["photob"].'" width="100px" height="110px" alt="PHOTO" />';
 }
}
 
echo '<a target="_blank" href="index.php?msg=second&second='.$col['id'].'">
</a></div>
<div align="center" style="background-image: url(../images/details.png);background-repeat: no-repeat;width:122px;height:56px;padding-top:8px;margin-top:5px">
<a target="_blank" href="index.php?msg=second&second='.$col['id'].'">'.$catgo . $string.'</a></div>
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
$sql = "SELECT * FROM personal_details WHERE visibility='Y' ORDER BY id DESC LIMIT 0,10 ";
$result = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($result) > 0) 
{
?>

<table  width="740px" cellpadding="2" id="homefilled" style="visibility: visible;margin-top:35px;float:left;">
<tr><td colspan="5" align="center" style="font-weight: bold" >NEW PROFILES</td></tr>
<tr><td colspan="5"><img src="../images/red_line.png" alt="photo" height="5px"  width="738px"/> </td></tr>
<tr>

<?php
while($row = mysql_fetch_array($result))
{
	if(!empty($row['age']))
	{
		$catgos = $row[2]."<br />";
	$strings = "AGE : ".$row['age'];
	}
	else
	{ 
		$catgos = $row[2]."<br />";
			$strings = "AGE : ".$row['age'];
	}
if($i%5 == 0)
{
echo '
</tr><tr>
<td align="center" width="125px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
<div  style="height:110px;width:124px;padding-top:8px">';

$zql	 = "SELECT * FROM other WHERE person_id=".$row[0];
$rezult	 = mysql_query($zql);
$zata 	 = mysql_fetch_array($rezult);
if($zata['profile_image']=='')
{
	if($row['gender']=='B')
	{
	echo '<img src="images/girl.png" width="124px" height="110px"  alt="PHOTO" />';
	}
else 
{
	echo '<img src="images/boy.png" width="124px" height="110px"  alt="PHOTO" />';
	}
 }
else {
	echo '<p style="position:absolute;visibility:hidden;color:white;font-weight:bold;padding-top:25px;"  id="check">Change Profile Picture</p>';
if($zata['profile_image']=='YR'){

echo '<img src="upload/'.$zata["photos"].'" width="100px" height="110px" alt="PHOTO" />';
 }
if($zata['profile_image']=='YC'){

echo '<img src="upload/'.$zata["photou"].'" width="100px" height="110px" alt="PHOTO" />';
 }
if($zata['profile_image']=='YL'){

echo '<img src="upload/'.$zata["photob"].'" width="100px" height="110px" alt="PHOTO" />';
 }
}

echo '<a target="_blank" href="index.php?msg=second&second='.$row['id'].'">
</a></div>
<div align="center" style="background-image: url(../images/details.png);background-repeat: no-repeat;width:122px;height:56px;padding-top:8px;margin-top:5px">
<a target="_blank" href="index.php?msg=second&second='.$row['id'].'">'.$catgos . $strings.'</a></div>
</td> 
  
  ';
  
}
else
{
	echo '

<td align="center" width="125px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
<div  style="height:110px;width:124px;padding-top:8px">';
	
$zql	 = "SELECT * FROM other WHERE person_id=".$row[0];
$rezult	 = mysql_query($zql);
$zata 	 = mysql_fetch_array($rezult);
if($zata['profile_image']=='')
{
	if($row['gender']=='B')
	{
	echo '<img src="images/girl.png" width="100px" height="110px"  alt="PHOTO" />';
	}
else 
{
	echo '<img src="images/boy.png" width="100px" height="110px"  alt="PHOTO" />';
	}
 }
else {
	echo '<p style="position:absolute;visibility:hidden;color:white;font-weight:bold;padding-top:25px;"  id="check">Change Profile Picture</p>';
if($zata['profile_image']=='YR'){

echo '<img src="upload/'.$zata["photos"].'" width="100px" height="110px" alt="PHOTO" />';
 }
if($zata['profile_image']=='YC'){

echo '<img src="upload/'.$zata["photou"].'" width="100px" height="110px" alt="PHOTO" />';
 }
if($zata['profile_image']=='YL'){

echo '<img src="upload/'.$zata["photob"].'" width="100px" height="110px" alt="PHOTO" />';
 }
}
	
echo '<a target="_blank" href="index.php?msg=second&second='.$row['id'].'">
</a></div>
<div align="center" style="background-image: url(../images/details.png);background-repeat: no-repeat;width:122px;height:56px;padding-top:8px;margin-top:5px">
<a target="_blank" href="index.php?msg=second&second='.$row['id'].'">'.$catgos . $strings.'</a></div>
</td> 
  
  ';
}
$i++;
}

}
?>
</tr>
</table>
