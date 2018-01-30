<?php
session_start ();
include_once 'include/validation.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/
xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Leading Job Consultancy at Thrissur|Job at Thrissur|Office Jobs |
	Administrative Jobs | HR Jobs | Thrissur - Career4You.in</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description"
	content="Leading Job Consultancy at Thrissur,Find HR jobs,
 administrative jobs and office jobs in Thrissur. - click.in Thrissur" />
<meta name="keywords"
	content="Leading Job Consultancy at Thrissur,administrative jobs,
 hr jobs, office jobs, vacancies" />
<meta name="robots" content="index,follow" />
<meta http-equiv="content-language" content="en" />
<meta
	name="Leading Job Consultancy at Thrissur,jobs at thrissur, employment at thrissur"
	content="jobs at thrissur, employment at thrissur,jobs at thrissur, employment at thrissur" />
<meta name="page-topic"
	content="Leading Job Consultancy at Thrissur,jobs at thrissur,
 employment at thrissurjobs at thrissur, employment at thrissurjobs at thrissur, employment at thrissur" />
<meta name="page-type"
	content="Leading Job Consultancy at Thrissur,jobs at thrissur,
 employment at thrissurjobs at thrissur, employment at thrissurjobs at thrissur, employment at thrissur" />
<meta name="audience" content="all" />
<meta name="author" content="www.facebook.com/subinpvasu" />
<meta name="description"
	content="Leading Job Consultancy at Thrissur,jobs at thrissur" />
<meta name="keywords"
	content="Leading Job Consultancy at Thrissur,jobs at thrissur, 
employment at thrissur" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="validation.js"></script>
<link rel="stylesheet" type="text/css" href="dialog_box.css" />
<script type="text/javascript" src="dialog_box.js"></script>
<style type="text/css">
/* Larger Side Border */
.textbox {
	width: 230px;
	height: 23px;
	border: 1px solid #465615;
	border-left: 4px solid #465615;
}

.minibox {
	width: 85px;
	height: 23px;
	border: 1px solid #465615;
	border-left: 4px solid #465615;
}

/* Hover Button 1 */
.fb5 {
	background-color: #465615;
	padding-left: 6px;
	padding-right: 6px;
	padding-top: 3px;
	padding-bottom: 3px;
	color: #ffffff;
	border: 1px solid #465615;
	background-image: url(images/button_bg.jpg);
}

.fb5:hover {
	background-color: #000000;
	border: 1px solid #000000;
	background-image: url(images/button_bg_over.jpg);
}

.select {
	width: 235px;
	height: 23px;
	border: 1px solid #465615;
	border-left: 4px solid #465615;
}

.minisel {
	width: 85px;
	height: 23px;
	border: 1px solid #465615;
	border-left: 4px solid #465615;
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
	width: 230px;
	height: 60px;
	border: 1px solid #465615;
	border-left: 4px solid #465615;
}

.miniarea {
	width: 85px;
	height: 60px;
	border: 1px solid #465615;
	border-left: 4px solid #465615;
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
<body id="subject" style="color: #465615">

	<div class="page-out">
		<div class="page">
			<div class="header">
				<div class="header-top">
					<p
						style="font-size: 12px; float: left; color: #465615; padding-left: 5px; padding-top: 8px;">
						Welcome to career4you.in</p>  
<?php
echo '
<ul>
<li><a href="' . $_SERVER ['PHP_SELF'] . '"><span>Home</span></a></li>';
if ($_SESSION ['account'] != 'true' && $_SESSION ['employer'] != 'true') {
	echo '<li><a href="' . $_SERVER ['PHP_SELF'] . '?msg=login"><span>login</span></a></li>';
}
echo '
<li><a href="' . $_SERVER ['PHP_SELF'] . '?msg=register"><span>Post Resume</span></a></li>
<li><a href="' . $_SERVER ['PHP_SELF'] . '?msg=employer-login"><span>Employer</span></a></li>
<li><a href=""><span>Services</span></a></li>
<li><a href="' . $_SERVER ['PHP_SELF'] . '?msg=contact"><span>Contact Us</span></a></li>';
if ($_SESSION ['account'] == 'true' || $_SESSION ['employer'] == 'true') {
	echo '<li><a href="' . $_SERVER ['PHP_SELF'] . '?msg=quit"><span>LogOut</span></a></li>';
}
echo '</ul>';
?></div>
				<div class="header-dis">
					<span
						style="height: 180px; width: 20%; float: left; vertical-align: middle">
						<img src="images/employment_logo.jpg" alt="logo" width="266"
						height="101" style="margin: 35px 10px 5px 10px" />
					</span> <span
						style="height: 130px; width: 55%; float: left; border: 0px solid #FFFFFF; padding-top: 15px; margin-top: 30px; text-align: center">
						<font color="#FFFFFF" size="+2"
						face="Times New Roman, Times, serif" style="text-align: center"> <!-- The Real Place for Realestate Buying/Selling/Rental  -->
					</font> <br /> <br /> <a
						href="<?php
						echo $_SERVER ['PHP_SELF'] . "?msg=register";
						?>"
						<?php
						if ($_SESSION ['account'] == 'true') {
							echo 'onclick="return false"';
						}
						?>> <input type="button"
							style="background-color: #465615; border: 1px solid #465615; padding: 3px 6px; color: white;"
							value="REGISTER FREE" />
					</a>
					</span> <span
						style="height: 150px; border-radius: 15px; width: 23%; background-color: white; float: right; margin-right: 10px; margin-top: 12px">
						<form method="post" action="checkout.php"
							onsubmit="return validateLogin()">
							<table style="padding-left: 2px">
								<tr>
									<td align="center" colspan="2"
										style="background-color: #465615; border-radius: 15px; color: white; font-weight: bold">Login
										Here</td>
								</tr>
								<tr>
									<td>Username</td>
									<td><input id="usernames" type="text" name="username"
										style="height: 16px; width: 140px; border: 1px solid #465615; border-left: 4px solid #465615" />
										<input type="hidden" name="ipaddress"
										value=<?php
										echo $_SERVER ['REMOTE_ADDR']?> /></td>
								</tr>
								<tr>
									<td>Password</td>
									<td><input type="password" name="password"
										style="height: 16px; width: 140px; border: 1px solid #465615; border-left: 4px solid #465615" /></td>
								</tr>
								<tr>
									<td align="right"><input type="submit"
										<?php
										if ($_SESSION ['account'] == 'true') {
											echo "disabled";
										}
										?>
										name="login" class="fb5" value="Login"
										style="background-color: #549008; color: white; border-radius: 15px;" />
									</td>
									<td align="right"><a href=""
										<?php
										if ($_SESSION ['account'] == 'true') {
											echo 'onclick="return false"';
										}
										?>
										onclick="newWindows(this.id)"
										style="text-decoration: none; color: #990033">Forgot Password?</a></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="2">
										<hr />
									</td>
								</tr>
								<tr>
									<td align="center" style="color: blue;">New User?</td>
									<td align="center"><a
										href="<?php
										echo $_SERVER ['PHP_SELF'] . "?msg=register";
										?>"
										<?php
										if ($_SESSION ['account'] == 'true') {
											echo 'onclick="return false"';
										}
										?>
										style="text-decoration: none; font-weight: bold; color: blue">Register
											Here</a></td>
								</tr>
							</table>
						</form>
					</span>
					<div class="header-img">
<?php
include_once './include/search.php';
?>
</div>
				</div>
			</div>
			<div align="center" id="warning"
				style="background-color: #FFFFFF; color: red; padding-top: 10px; font-weight: bold">
			</div>
			<div align="center" class="previews">
				<div class="left-out" align="center">
					<div class="left-in" align="center">
						<div class="left-panel" align="center">
							<table width="100%" id="indication" style="visibility: visible">
								<tr>
									<td style="width: 30%; color: white;" id="one"></td>
									<td
										style="width: 30%; color: white; text-align: center; font-weight: bold;"
										id="two">Please Wait..</td>
									<td style="width: 30%; color: white;" id="three"></td>
								</tr>
							</table>
							<div align="center" id="search" style="display: block"
								class="presearch">
<?php
if ($_GET ['msg'] == 'employer-register' && $_SESSION ['account'] != 'true') {
	include_once './include/employer.php';
}
if ($_GET ['msg'] == 'employer-login' && $_SESSION ['account'] != 'true') {
	include_once './include/signin.php';
}
if ($_SESSION ['account'] != 'true' && $_GET ['msg'] != 'employer-login' && $_GET ['msg'] != 'employer-register' && $_SESSION ['employer'] != 'true' && $_GET ['msg'] != 'login' && $_GET ['msg'] != 'register') {
	if ($_GET ['msg'] == 'contact') {
		include_once 'contactus.php';
	} else {
		include_once 'frontshow.php';
	}
}
if ($_GET ['msg'] == 'login' && $_SESSION ['account'] != 'true' && $_SESSION ['employer'] != 'true') {
	include_once './include/login.php';
} else if ($_GET ['msg'] == 'register' && $_SESSION ['account'] != 'true' && $_SESSION ['employer'] != 'true') {
	include_once './include/register.php';
} else if ($_GET ['msg'] == 'err' && $_SESSION ['account'] != 'true' && $_SESSION ['employer'] != 'true') {
	include_once './include/error.php';
}

?></div>
							<div align="center" id="result" class="presearch"></div>
<?php

if ($_SESSION ['account'] == 'true') {
	enquirySendOnce ();
	include_once 'include/topmenu.php';
	switch ($_GET ['msg']) {
		case 'quit' :
			include_once 'include/logout.php';
			break;
		
		case 'skill' :
			
			include_once 'include/education.php';
			break;
		case 'password' :
			
			include_once 'include/password.php';
			break;
		case 'regedit' :
			
			include_once 'include/registeredit.php';
			break;
		case 'pass' :
			
			include_once 'include/password.php';
			break;
		case 'profsearch' :
			
			include_once 'include/profsearch.php';
			break;
		case 'pay' :
			
			include_once 'include/payment.php';
			break;
		case 'search' :
			
			include_once 'include/advanced_search.php';
			break;
		case 'apply' :
			
			include_once 'include/applied_job.php';
			break;
		case 'advorder' :
			
			include_once 'include/advpayment.php';
			break;
		case 'contact' :
			
			include_once 'contactus.php';
			break;
		default :
			include_once 'include/account.php';
	}
}
if ($_SESSION ['employer'] == 'true') {
	include_once 'include/topmenu.php';
	switch ($_GET ['msg']) {
		case 'quit' :
			include_once 'include/logout.php';
			break;
		case 'reqire' :
			include_once 'include/requirement.php';
			break;
		case 'password' :
			include_once 'include/password.php';
			break;
		case 'empedit' :
			include_once 'include/employeredit.php';
			break;
		case 'resume' :
			include_once 'include/resume_search.php';
			break;
		case 'payment' :
			include_once 'include/payment.php';
			break;
		case 'order' :
			include_once 'include/order.php';
			break;
		case 'plan' :
			include_once 'include/useradmin.php';
			break;
		case 'contact' :
			include_once 'contactus.php';
			break;
		default :
			include_once 'include/profile.php';
			break;
	}
}

?>
</div>
					</div>
				</div>
				<div class="right-out">
					<iframe src="changeadv.php" scrolling="no" width="235px"
						height="1200px" frameborder="0"> </iframe>
				</div>
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