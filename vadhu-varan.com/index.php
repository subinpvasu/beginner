<?php
session_start ();
include_once 'include/functions.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/
xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>VADHU-VARAN.COM Welcomes YOU...</title>
<meta name="author" content="www.facebook.com/subinpvasu" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="validation.js"></script>
<link rel="stylesheet" type="text/css" href="profile_screen.css" />
<script type="text/javascript" src="profile_screen.js"></script>
<style type="text/css">
/* Larger Side Border */
.textbox {
	color: #000481;
	width: 230px;
	height: 23px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

.minibox {
	color: #000481;
	width: 85px;
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
	background-image: url(images/red.jpg);
}

.button:hover {
	background-color: #000000;
	border: 1px solid #000000;
	color: #FEB914;
	font-weight: bold;
	background-image: url(images/black.jpg);
}

.select {
	width: 235px;
	height: 23px;
	color: #000481;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

.ser_select {
	color: #000481;
	width: 120px;
	text-align: center;
	height: 22px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

.minisel {
	color: #000481;
	width: 85px;
	height: 23px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

.a {
	text-decoration: none;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}

.tb11 { /*background:#FFFFFF url(images/search.png) no-repeat 4px 4px;*/
	padding: 4px;
	border: 1px solid #CCCCCC;
	width: 150px;
	height: 15px;
}

.fb7 {
	border: 1px solid #3366FF;
	background-color: #B3C6FF;
	height: 15px;
}

.textarea {
	color: #000481;
	width: 230px;
	height: 60px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

.miniarea {
	color: #000481;
	width: 85px;
	height: 60px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

.true {
	background: #FFFFFF url(images/search.png) no-repeat 4px 4px;
}

div {
	
}

.pagebar {
	background-image: url(../images/greenpremiumbck.png);
	background-repeat: no-repeat;
	width: 100%;
	float: left;
	color: white;
}
-->
</style>
</head>
<body id="subject" style="color: #000481" onload="doSomeFunctions()">

<div class="page-out">
<div class="page">
<div class="header">
<div class="header-top">
<p
	style="font-size: 12px; float: left; color: white; padding-left: 5px; padding-top: 8px;">
Welcome to www.vadhu-varan.com</p>  
<?php
echo '
<ul>
<li><a href="' . $_SERVER ['PHP_SELF'] . '';
if ($_SESSION ['profile'] == 'true') {
	echo '?msg=home"';
}else{echo '"';}
echo '
><span style="font-weight:bold">Home</span></a></li>
<li><a href="' . $_SERVER ['PHP_SELF'] . '?msg=login"><span style="font-weight:bold">Login</span></a></li>';
if ($_SESSION ['account'] != 'true' && $_SESSION ['employer'] != 'true') {
	echo '<li><a href="' . $_SERVER ['PHP_SELF'] . '?msg=member"';
if ($_SESSION ['profile'] == 'true') {
	echo ' target="_blank"';
}
	echo '><span style="font-weight:bold">Membership</span></a></li>';
}
echo '
<li><a href="' . $_SERVER ['PHP_SELF'] . '?msg=regular"';
if ($_SESSION ['profile'] == 'true') {
	echo ' target="_blank"';
}
echo '><span style="font-weight:bold">Rules & Regulations</span></a></li>

<li><a href="' . $_SERVER ['PHP_SELF'] . '?msg=service"';
if ($_SESSION ['profile'] == 'true') {
	echo ' target="_blank"';
}
echo '><span style="font-weight:bold">Services</span></a></li>
<li><a href="' . $_SERVER ['PHP_SELF'] . '?msg=contact"';
if ($_SESSION ['profile'] == 'true') {
	echo ' target="_blank"';
}
echo ' >

<span style="font-weight:bold">Contact Us</span></a></li>';

echo '</ul>';
?></div>
<div class="header-dis">
<table align="right" style="padding-top: 35px; padding-right: 30px">
	<tbody>
		<tr>
			<td><a href="index.php?msg=register"><img src="images/blueicon_1.png"
				style="padding-left: 55px" /></a></td>
		</tr>
		<tr>
			<td><a href="javascript:void showSearch()"><img src="images/blueicon_2.png"
				style="padding-left: 80px" /></a></td>
		</tr>
		<tr>
			<td><a href="index.php?msg=login"><img src="images/blueicon_3.png"
				style="padding-left: 105px" /></a></td>
		</tr>
	</tbody>
</table>
<div class="header-img">
<?php
include_once './include/search.php';
?>
</div>
</div>
</div>
<div align="center"
	style="background-color: transparent; color: red; padding-top: 10px; font-weight: bold; position: fixed; top: 275px"
	id="warning"></div>
<div align="center" class="previews">
<div class="left-out" align="center">
<div class="left-in" align="center">
<div class="left-panel" align="center">
<div align="center" id="search" style="display: block" class="presearch">
<?php
if ($_SESSION ['profile'] == 'true') {
							include_once 'include/topmenu.php';
		switch ($_GET['msg']){
		case 'logout'	:	include_once 'include/signout.php'; 			break;
		case 'person'	:	include_once 'include/personal_register.php'; 	showSubmitResponse($_GET['result']);	break;
		case 'physical'	:	include_once 'include/physical_register.php'; 	showSubmitResponse($_GET['result']);	break;
		case 'job'		:	include_once 'include/education_register.php'; 	showSubmitResponse($_GET['result']);	break;
		case 'family'	:	include_once 'include/family_register.php'; 	showSubmitResponse($_GET['result']);	break;
		case 'horo'		:	include_once 'include/horoscope_register.php'; 	showSubmitResponse($_GET['result']);	break;
		case 'other'	:	include_once 'include/other_register.php'; 		showSubmitResponse($_GET['result']);	break;
		case 'member'	:	include_once 'include/membership.php'; 			break;
		case 'regular'	:	include_once 'include/regulations.php'; 		break;
		case 'service'	:	include_once 'include/services.php'; 			break;
		case 'second'	:	include_once 'include/second_profile.php'; 		break;
		case 'visit'	:	include_once 'include/visitors.php'; 			break;
		case 'follow'	:	include_once 'include/visitors.php'; 			break;
		case 'home'		:	include_once 'randomshow.php'; 					break;
		default			:	include_once 'include/profile.php'; 			break;
							 }
									}
if ($_SESSION ['profile'] != 'true') {
		switch ($_GET['msg']){
		case  'register' : include_once 'include/register.php';	 	  break;
		case  'login'	 : include_once 'include/login.php';		  break;
		case  'service'  : include_once 'include/services.php';		  break;
		case  'regular'  : include_once 'include/regulations.php'; 	  break;
		case  'contact'  : include_once 'include/contactus.php';	  break;
		case  'member'   : include_once 'include/membership.php';	  break;
		case  'second'   : include_once 'include/second_profile.php'; break;
		default  		 : include_once 'randomshow.php';			  break;
					         }
									 }
?></div>
<div align="center" id="result" class="presearch"></div>
<?php
/*
 * free div use it
 * 
 * 
 */
?>
</div>
</div>
</div>
<div class="right-out">
<p id="response"></p>
<iframe src="changeadv.php" scrolling="no"
	width="235px" height="1200px" frameborder="0"> </iframe></div>
</div>
<div align="center" class="preview">
<?php
include_once 'changeimage.php';
?>
</div>
<div class="footer" align="center">
<p style="color: #FFFFFF; padding-top: 10px">Powered by
Gitacommunications 9387335165</p>
<?php include_once 'xmlparse.php';?>
</div>
</div>
</div>
</body>
</html>