<?php
$con = mysql_connect("localhost","autovipa_storage","test@123");
if (!$con){die('Could not connect: ' . mysql_error());}
mysql_select_db("autovipa_motorengine", $con);
?>
