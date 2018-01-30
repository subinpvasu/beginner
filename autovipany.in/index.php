<?php
session_start ();
include_once 'include/functions.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>AUTOVIPANY.IN</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="" content="" />
<meta name="page-topic" content="" />
<meta name="page-type" content="" />
<meta name="audience" content="all" />
<meta name="author" content="www.facebook.com/subinpvasu" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="dialog_box.css" />
<script type="text/javascript" src="dialog_box.js"></script>
<script type="text/javascript" src="javascript/validation_js.js"></script>
<?php 
if ($_SERVER['QUERY_STRING']=='exception')
{
?>
<script type="text/javascript">
throwExceptionasAlert();
</script>
<?php 
}
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body style="color: #253B48">
<div id="guard" style="position:fixed;background-color:black;opacity:0.4;width:100%;height:100%;display:none;">
</div>
<p id="subject"></p>
<div class="page-out">
<div class="page">
<div class="header">
<div class="header-top">
<p
	style="font-size: 12px; float: left; color: #485129; padding-left: 5px; padding-top: 8px;">Welcome
to autovipany.in</p>
<?php
include_once 'include/menu.php';
?>
</div>
<div class="header-dis"><span
	style="height: 180px; width: 20%; float: left;"> <img
	src="images/logo.png" alt="logo" width="150" height="150"
	style="margin: 12px 10px 5px 10px" /> </span> <span
	style="height: 130px; width: 55%; float: left; border: 0px solid #FFFFFF; padding-top: 15px; margin-top: 30px; text-align: center">
<font color="#FFFFFF" size="+2" face="Times New Roman, Times, serif"
	style="text-align: center; font-weight: bold; font-style: italic">
Website for Automobile <br />
Buying,Selling,Rentals </font> <br />
<br />
<a href="index.php?msg=register"> <input type="button"
	style="background-color: #000000; border: 1px solid #000000; background-image: url(images/button_bg_over.jpg); padding: 3px 6px; color: #ffffff;"
	value="Register Free" /> </a> </span>
<div class="toplogin"><?php
include_once 'include/toplogin.php';
?></div>
<div class="header-img">
<?php
include_once './include/search.php';
?>
</div>
</div>
</div>
<div align="center" id="warning"
	style="background-color: transparent; color: red; padding-top: 10px; font-weight: bold; position: absolute; text-align: center; width: 99%; top: 250px;">
</div>
<div align="center" class="previews">
<div class="left-out">
<div class="left-in">
<div class="left-panel" align="center">
<div align="center" id="search" class="presearch"></div> 
<?php
if (is_numeric ( $_SESSION ['id'] )) {
	switch ($_GET ['msg']) {
		case 'home' :
			include_once 'include/left_menu.php';
			include_once 'include/account.php';
			break;
		case 'quit' :
			include_once 'include/logout.php';
			break;
		case 'edit' :
			include_once 'include/left_menu.php';
			include_once 'include/edit.php';
			break;
		case 'prod' :
			include_once 'include/left_menu.php';
			include_once 'include/productlog.php';
			break;
		case 'sell' :
			include_once 'include/left_menu.php';
			include_once 'property/accept.php';
			break;
		case 'add' :
			include_once 'include/left_menu.php';
			include_once 'include/additional.php';
			break;
		case 'pass' :
			include_once 'include/left_menu.php';
			include_once 'include/password.php';
			break;
		case 'first' :
			include_once 'include/left_menu.php';
			include_once 'include/editpro.php';
			break;
		case 'order' :
			include_once 'include/pay_order.php';
			break;
		case 'promo' :
			include_once 'include/promote.php';
			break;
		case 'advorder' :
			include_once 'include/advpayment.php';
			break;
		case 'contact' :
			include_once 'contactus.php';
			break;
		case 'second'  :
			include_once 'secondary.php';
			break;
		default :
			include_once 'randomshow.php';
			break;
	}
} else {
	switch ($_GET ['msg']) {
		case 'register' :
			include_once 'include/new_form.php';
			break;
		case 'login' :
			include_once 'include/signin.php';
			break;
		case 'contact' :
			include_once 'contactus.php';
			break;
		case 'second'  :
			include_once 'secondary.php';
			break;
		default :
			include_once 'randomshow.php';
			break;
	}
}

?>
					                                       
</div>
</div>
</div>
<div class="right-out">
<iframe src="changeadv.php" scrolling="no" width="196px"
	height="1200px" frameborder="0"> </iframe></div>
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