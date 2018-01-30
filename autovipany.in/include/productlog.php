<?php
session_start();
include_once 'include/functions.php';
/*
 * list all the properties by the image and details.click to edit.
 * copy
 * 
 *just edit the box and put a row  to the the products.
 */
//$i = 0 ;

$c = 0 ;
global $person;
$mysql = "SELECT * FROM vehicle WHERE holder=".$person;
$myresult = mysql_query($mysql)or die(mysql_error());
if(mysql_num_rows($myresult) > 0)
{/*
while($col = mysql_fetch_array($myresult))
	{
	$c++;
	}
	}
	echo $c;
*/
	?>
<!DOCTYPE html><html>
<head>
<style type="text/css">
#till a {
	text-decoration:none;
color :blue;
}
</style>
</head>
<body>
<table width="500px" cellpadding="2" id="till">
	<tr>
		<td colspan="5" align="center"
			style="font-weight: bold; text-transform: uppercase">Your Profiles</td>
	</tr>
	<tr>
		<td colspan="5" align="left"><img src="./images/blue_line.png"
			alt="photo" width="500px" /></td>
	</tr>
	<tr>
<?php 
	while($col = mysql_fetch_array($myresult))
	{
		if(!empty($col['title']))
		{
				$catgo  = $col['title'];
				$cat    = $catgo;
				$catgo  = substr($catgo,0,20)."..";
  				$string = "<br/>PRICE : <img src=images/rupee.png height=9px/> ".number_format($col['price'])."/-";
		}
		
  	if($c%3==0)
  	{
  		echo'</tr><tr>
<td align="center" width="125px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
<div  style="height:110px;width:124px;padding-top:8px">';


if($col['photo']=='autovipany.jpg')
{	
	echo '<img src="images/autovipany.png" title="'.$cat.'" width="124px" height="110px"  alt="PHOTO" />';
}
else
	{
	echo '<p style="position:absolute;visibility:hidden;color:white;font-weight:bold;padding-top:25px;"
	 id="check">Change Profile Picture</p>';
	echo '<img src="upload/'.$col["photo"].'" title="'.$cat.'"  width="95px" height="110px" alt="PHOTO" />';
 	}
  		
echo '<a target="_blank" href="index.php">
</a></div>
<div align="center" style="background-image: url(../images/details.png);background-repeat: no-repeat;
width:122px;height:56px;padding-top:8px;margin-top:5px">
<a target="_blank"  title="'.$cat.'"  href="index.php?msg=first&first='.$col['id'].'">'.$catgo . $string.'</a></div>
</td> 
';
  	}
  	else {
 echo'
<td align="center" width="125px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
<div  style="height:110px;width:124px;padding-top:8px">';
if($col['photo']=='autovipany.jpg')
{
	echo '<img src="images/autovipany.png" title="'.$cat.'"  width="124px" height="110px"  alt="PHOTO" />';
}
else
{
	echo '<p style="position:absolute;visibility:hidden;color:white;font-weight:bold;padding-top:25px;" 
	 id="check">Change Profile Picture</p>';
	echo '<img src="upload/'.$col["photo"].'" title="'.$cat.'"  width="95px" height="110px" alt="PHOTO" />';
}
echo '<a target="_blank" href="index.php">
</a></div>
<div align="center" style="background-image: url(../images/details.png);background-repeat: no-repeat;
width:122px;height:56px;padding-top:8px;margin-top:5px">
<a target="_blank" title="'.$cat.'"  href="index.php?msg=first&first='.$col['id'].'">'.$catgo . $string.'</a></div>
</td> 
';
  }
 $c++;
	}
	 ?>
</tr>
</table>
<?php }?>
</body></html>