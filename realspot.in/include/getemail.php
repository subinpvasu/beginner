<?php
$q=$_GET["q"];

if(isset($_GET["q"]) && $_GET["q"] != '' && $_GET["q"] != '  ')
{
$q=$_GET["q"];
}
if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$q))
{
echo "<font color=red> Enter Valid email ID.</font>";

}
else
{




$con = mysql_connect("localhost","wwwreals_realtes","test@123");


if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);

$sql="SELECT * FROM register WHERE email = '".$q."'";

$result = mysql_query($sql);

if(mysql_num_rows($result) > 0) 
{
echo "<font color=red> Email ID already in Use.</font>";
}
else
{
echo "<font color=green>  Email ID Available to Use.</font>";
}
mysql_close($con);
}
?> 