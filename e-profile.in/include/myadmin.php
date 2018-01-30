<?php
/*
 * keep db  very secure
 * 
 */

$con = mysql_connect("localhost","wwweprof_prostor","test@123");
if (!$con){die('Could not connect: ' . mysql_error());}
mysql_select_db("wwweprof_store_profile", $con);
?>