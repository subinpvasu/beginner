<?php 
include_once '../include/config.php';
session_start();
$_SESSION['chk']='true';
?>
<html>
<head><title>Data Entry Form - Career4you.in</title>
<style type="text/css">
  /* Larger Side Border */
.textbox {
	width: 230px;
	height:23px;
	border: 1px solid #465615;
	border-left: 4px solid #465615;
}
/* Hover Button 1 */
.fb5 {
	background-color: #465615;
	padding-left:6px;
	padding-right:6px;
	padding-top:3px;
	padding-bottom:3px;	
	color: #ffffff;
	border:1px solid #465615;
	background-image: url(images/button_bg.jpg);
}
.fb5:hover {
	background-color: #000000;	
	border:1px solid #000000;
	background-image: url(images/button_bg_over.jpg);
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
<script type="text/javascript"  src="validation.js"></script>
</head><body>

<?php
if($_SESSION['data'] != 'true')
{
	include_once 'login.php';
}
else
{
echo '<div style="width: 100%;text-align: right">
	<a  href="javascript:backHome()"  style="text-decoration: none;color:blue;">
	Back</a>
		<a href="logout.php" style="text-decoration:none;color:red;font-weight:bold">LogOut</a></div>';
	
	if($_SESSION['resume']=='true' && $_SESSION['more'] != 'true')
	{
		include_once 'candidate.php';
	}
	if($_SESSION['resume']=='false' && $_SESSION['job'] != 'added')
	{
		include_once 'information.php';
	}
	else 
	{
		include_once 'buffer.php';
	}
	
}
?>
</body>
</html>