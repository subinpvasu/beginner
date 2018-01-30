<?php 
include_once '../include/admin.php';
session_start();
$_SESSION['chk']='true';
?>
<html>
<head><title>Data Entry Form - VADHU-VARAN.COM</title>
<style type="text/css">
  /* Larger Side Border */
.textbox {
	color: #000481;
	width: 230px;
	height: 23px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

/* Hover Button 1 */
.button {
	background-color: #C4160F;
	padding-left: 6px;
	padding-right: 6px;
	padding-top: 3px;
	padding-bottom: 3px;
	color: #ffffff;
	border: 1px solid #C4160F;
	font-weight: bold;
	background-image: url(../images/red.jpg);
}

.button:hover {
	background-color: #000000;
	border: 1px solid #000000;
	color: #FEB914;
	font-weight: bold;
	background-image: url(../images/black.jpg);
}

.select{
width:230px;
height:23px;
	border: 1px solid #465615;
	border-left: 4px solid #465615;

}
.a{text-decoration:none;
font-weight:bold;
font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.tb11 {
	/*background:#FFFFFF url(images/search.png) no-repeat 4px 4px;*/
	padding:4px;
	border:1px solid #CCCCCC;
	width:150px;
	height:15px;
}
.fb7 {
    border: 1px solid #3366FF;
	background-color:#B3C6FF;
	height:15px;
}
.textarea {
	width: 230px;
	height:60px;
	border:1px solid #465615;
	border-left: 4px solid #465615;
}
</style>

</head><body>

<?php
if($_SESSION['data'] != 'true')
{
	include_once 'login.php';
}
else
{
	if($_GET['txt']=='come')
	{
include_once 'marriage_profile.php';
	}
	if($_GET['txt']=='bye')
	{
		include_once 'logout.php';
	}
	if($_GET['txt']=='think')
	{
		include_once 'uploadScript.php';
	}
}
?>
</body>
</html>