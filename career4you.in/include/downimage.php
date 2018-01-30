<?php
session_start();
include_once 'config.php';
$id = $_SESSION['id'];
$sql = "SELECT name,resume FROM register WHERE id=".$id;
$result = mysql_query($sql) or die(mysql_error());
$restyp = mysql_fetch_array($result);
$doc = $restyp[1];
$forma = end(explode(".",$doc));
switch ($forma)
{
case 'doc':
 //header("Content-type:application/octet-stream");
 header("Content-type:application/msword ");
  break;
case 'docx':
 //header("Content-type:application/octet-stream");
 header("Content-type:application/msword ");
  break;
case 'pdf':
 header("Content-type:application/pdf");
  break;
case 'txt':
 header("Content-type:text/plain");
  break;
default:
  echo "Unable to perform Download.";
  break;
}
header("Content-Disposition:attachment;filename=".$restyp[0]."_".$forma."_Resume");
readfile("../upload/".$doc);
mysql_close();
?>