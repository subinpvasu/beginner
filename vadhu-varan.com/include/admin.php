<?php
$con = mysql_connect("localhost","vadhuvar_wedding","test@123");
if (!$con){die('Could not connect: ' . mysql_error());}
mysql_select_db("vadhuvar_matrimony", $con);
?>