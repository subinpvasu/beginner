<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.titlebar{
	background-image: url(../images/greenpremiumbck.png);
	background-repeat: no-repeat;
	width: 100%;
	float: left;
	color:white;
}

</style>
</head>

<body>
<p class="titlebar" align="center">
PREMIUM ADVERTISEMENTS
</p>

<?php 
$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);

$t = 'Y';
$sql = "SELECT * FROM property WHERE  premier='$t' AND publish='$t' AND frontpage='Y' LIMIT 0,8 ";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{
//$string = substr($row['area'].'@'.$row['city'],0,20).'...';
while($row = mysql_fetch_array($result))
{
	
    $string = substr($row['area'].' @ '.$row['city'],0,25).'...';
echo '

<div style="margin-left:7px;height:270px;width:141px;float:left;background-image: url(../images/ad_box.png);background-repeat: no-repeat;  margin:5px;padding-top:10px"> 
<div align="center" style=""><a  href="javascript:window.parent.showDialog('.$row['id'].')"><embed src="../upload/'.$row["image"].'" alt=""  height="150px" width="120px"></a></div>
<div align="center" style="background-image: url(../images/detail.png);background-repeat: no-repeat;margin-top:25px;margin-left:8px;height:56px;margin-right:8px;color:#379B37">
<a style="color:#379B37;text-decoration:none"  href="javascript:window.parent.showDialog('.$row['id'].')">'.$string.' </a>
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