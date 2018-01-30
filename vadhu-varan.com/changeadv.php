<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
.titlebar{
background-image: url(../images/redbck.png);
	background-repeat: repeat-y;
	width: 230px;
	
	color:#F9E7E5;
}

</style>
</head>

<body>
<p class="titlebar" align="center">
PREMIUM ADVERTISEMENTS
</p>

<?php 
include_once 'include/admin.php';

$t = 'Y';
$sql = "SELECT * FROM personal_details WHERE  premium='$t' AND visibility='$t' AND faceplay='$t' LIMIT 0,4 ";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{
//$string = substr($row['area'].'@'.$row['city'],0,20).'...';
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
echo '

<div style="height:270px;width:200px;float:left;  margin:5px 20px;padding-top:10px"> 
<div align="center" style=""><a  target="_blank" href="index.php?msg=second&second='.$row['id'].'">';

$zql	 = "SELECT * FROM other WHERE person_id=".$row[0];
$rezult	 = mysql_query($zql);
$zata 	 = mysql_fetch_array($rezult);
if($zata['profile_image']=='')
{
	if($row['gender']=='B')
	{
	echo '<img src="images/girl.png" width="154px" height="160px"  alt="PHOTO" />';
	}
else 
{
	echo '<img src="images/boy.png" width="154px" height="160px"  alt="PHOTO" />';
	}
 }
else {
	echo '<p style="position:absolute;visibility:hidden;color:white;font-weight:bold;padding-top:25px;"  id="check">Change Profile Picture</p>';
if($zata['profile_image']=='YR'){

echo '<img src="upload/'.$zata["photos"].'" width="154px" height="160px" alt="PHOTO" />';
 }
if($zata['profile_image']=='YC'){

echo '<img src="upload/'.$zata["photou"].'" width="154px" height="160px" alt="PHOTO" />';
 }
if($zata['profile_image']=='YL'){

echo '<img src="upload/'.$zata["photob"].'" width="154px" height="160px" alt="PHOTO" />';
 }
}


echo '</a></div>
<div align="center" style="margin-top:25px;margin-left:8px;height:56px;margin-right:8px;color:#379B37">
<a style="color:#379B37;text-decoration:none" target="_blank" href="index.php?msg=second&second='.$row['id'].'">'.$catgos . $strings.'</a>
</div>
</div>
';
}
}
else
{
echo 'Advertise here!';	
}
?>
</body>
</html>