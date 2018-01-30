<?php
$con = mysql_connect("localhost","career4y_career","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("career4y_employment", $con);
$sql = "SELECT * FROM register";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
{
   echo	$row['name'];
}

//expired/
?>