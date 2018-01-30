<?php 
include_once 'include/functions.php';
?>
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
	
	color:white;
}

</style>
</head>

<body style="width:180px;margin:0 auto;">
<p class="titlebar" align="center" style="">
PREMIUM ADS
</p>

<?php


################################################
############
############ Select DB
############
################################################


$t = 'Y';
$sql = "SELECT * FROM vehicle WHERE  premium='$t' AND visibility='$t' AND frontpage!='N' LIMIT 0,4 ";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0)
{
//$string = substr($row['area'].'@'.$row['city'],0,20).'...';
	while($col = mysql_fetch_array($result))
	{
		
			$catgo  = $col['title'];
			$cat    = $catgo;
			$catgo  = substr($catgo,0,20)."..";
			$string = "<br/>PRICE : <img src=images/rupee.png height=9px/> ".digitAliasPrice(trim($col['price']))."/-";
		
	##########################################
	
	/*		
			echo '
			
			<div style="margin-left:7px;height:270px;width:141px;float:left;background-image: url(../images/ad_box.png);background-repeat: no-repeat;  margin:5px;padding-top:10px">
			<div align="center" style=""><a  href="javascript:window.parent.showDialog('.$col['id'].')"><embed src="../upload/'.$row["image"].'" alt=""  height="150px" width="120px"></a></div>
			<div align="center" style="background-image: url(../images/detail.png);background-repeat: no-repeat;margin-top:25px;margin-left:8px;height:56px;margin-right:8px;color:#379B37">
			<a style="color:#379B37;text-decoration:none"  href="javascript:window.parent.showDialog('.$col['id'].')">'.$string.' </a>
			</div>
			</div>
			';
			*/
			
			
	##########################################
	
			echo'<div style="text-align:center;margin:0 auto;padding-left:20px;height:250px;">
			<div  style="height:130px;width:134px;padding-top:8px"><a target="_blank" href="index.php?msg=second&second='.$col['id'].'">';
			if($col['photo']=='autovipany.jpg')
			{
				echo '<img src="images/autovipany.png" title="'.$cat.'" width="124px" height="110px"  alt="PHOTO" />';
			}
			else
			{
				echo '<img src="upload/'.$col["photo"].'" title="'.$cat.'"  width="135px" height="140px" alt="PHOTO" />';
			}
			echo '
			</a></div>
			<div align="center" style="background-image: url(../images/details.png);background-repeat: no-repeat;width:140px;height:56px;padding-top:15px;margin-top:15px">
			<a target="_blank"  title="'.$cat.'"  href="index.php?msg=second&second='.$col['id'].'">'.$catgo . $string.'</a></div>
			</div>';
		
	}
		

/* while($row = mysql_fetch_array($result))
{

    $string = substr($row['area'].' @ '.$row['city'],0,25).'...';*/


/*
} */
}
else
{
echo 'Advertise here!';
}
?>
</body>
</html>