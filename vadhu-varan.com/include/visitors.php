<?php 
session_start();
include_once 'include/functions.php';

#do these two things with the functions and switchesso you can make it clean.
#
#
?>
<html><body onmouseover="arrangeGridshape()">
<?php 
switch ($_GET['msg'])
{
	case 'visit'  : showVisitors();break;
	case 'follow' : showFollower();break;
	default:break;
	
}



?></body></html>