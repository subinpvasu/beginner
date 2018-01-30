<?php


################################################
############
############ Select DB
############
################################################


$sql = "SELECT * FROM operator ";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());

if(mysql_num_rows($result) > 0)
{

while($row = mysql_fetch_array($result))
{
	echo "Id:".$row['id']."<br>Mail:".$row['username']."<br><br>";

}

}



echo "-------------------------Property----------------------";


$user = "operator";

$sql = "SELECT * FROM property WHERE info_type='$user'";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());

if(mysql_num_rows($result) > 0)
{

while($row = mysql_fetch_array($result))
{

echo "<br>Id:".$row['informed_id']."<br> Time:".$row['time']."<br><br>";

}

}



?>