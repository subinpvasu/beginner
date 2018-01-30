<?php


################################################
############
############ Select DB
############
################################################


$sql = "SELECT * FROM payment ";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());

if(mysql_num_rows($result) > 0)
{

while($row = mysql_fetch_array($result))
{
	echo "Id:".$row['id']."<br>customer:".$row['customer']."<br><br>";

}

}




?>