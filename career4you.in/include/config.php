<?php
$con = mysql_connect("localhost","career4y_career","test@123");
if (!$con){die('Could not connect: ' . mysql_error());}
mysql_select_db("career4y_employment", $con);

	/*$con = mysql_connect('localhost','alansari_alansar','test@123') or 
	       die('Database Connection Error; '. mysql_error());
	mysql_select_db('alansari_alansaridb',$con) or die('Could not Select Database : '. mysql_error());
	*/
?>