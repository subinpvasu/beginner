<?php
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="600" />






</head>

<?php 

$con = mysql_connect("localhost","wwwreals_realtes","test@123");


if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);


$sql = "SELECT * FROM property ";//change the table name
$result = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($result) > 0) 
{
?>

<table align="center" width="100%">
<tr>

<?php
while($row = mysql_fetch_array($result))
{
echo '

<td style="width:18%;height:120px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
  <div align="center"><a href="javascript: window.parent.showDialog('.$row['id'].')"><img src="upload/'.$row["image"].'" alt="" padding-top="10px" height="100" width="90%"/></a></div>
 <div align="center" style="padding-top:0px">
 '.$row['area'].'@'.$row['city'].'</div>
  
  
  </td>
  
  ';
  //call it as a new section
}

}


?>
</tr>
</table>


