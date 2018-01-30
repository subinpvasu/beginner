<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
Realspot.in | Real Estate  in Thrissur | Free Realestate websites in Kerala | 
Real Estate Kerala | Kerala top realestate  | Free Real Estate property listing websites | 
Real Estate Property Agents In Kerala | Kerala Real Estate Property listing | 
Kerala Real Estate Properties | RealSpot.in Kerala 
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Real Estate  Kerala, Property in Kerala and Real Estate Agents in Kerala, Kerala Real Estate, Thrissur Properties, Flats for sale kerala, Villas in Thrissur, Apartments in Thrissur, Flats at Kerala, Free Real Estate Kerala, Real estate" />
<meta name="keywords" content="Real Estate Kerala, Property in Kerala, Property Agents In Kerala, real estate Kerala, Kerala RealEstate, free kerala property website, Kerala RealEstate properties, Kerala  land for sale, Villas in Kochi,  house for rent in Thrissur, Thrissur Real Estate, upcoming villas in Thrissur, rubber estate in Idukki, realestate website design in Thrissur" />
<meta name="Real Estate Kerala" content="Property Agents In Kerala, Real Estate In Kerala"/>
<meta name="page-topic" content="Property Agents In Kerala, Real Estate In Kerala, Property of Kerala, real estate in Kerala, free properties in Kerala, Kerala property, Kerala nri investors, buy, sell, rent, Kerala, India."/>
<meta name="page-type" content="Property Agents In Kerala, Real Estate In Kerala, Property of Kerala, real estate in Kerala, free properties in india, india property, investors, buy, sell, rent, Kerala, India."/>
<meta name="audience" content="all"/>
<meta name="author" content="www.facebook.com/subinpvasu" />
<meta name="description" content="real estate kerala" />
<meta name="keywords" content="real estate kerala, real estate thrissur,real estate"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<link rel="stylesheet" type="text/css" href="dialog_box.css" />
<script type="text/javascript" src="dialog_box.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
  /* Larger Side Border */
.tb8 {
	width: 230px;
	height:23px;
	border: 1px solid #3366FF;
	border-left: 4px solid #3366FF;
}
/* Hover Button 1 */
.fb5 {
	background-color: #479D34;
	padding-left:6px;
	padding-right:6px;
	padding-top:3px;
	padding-bottom:3px;	
	color: #ffffff;
	border:1px solid #479D34;
	background-image: url(images/button_bg.jpg);
}
.fb5:hover {
	background-color: #000000;	
	border:1px solid #000000;
	background-image: url(images/button_bg_over.jpg);
}
.select{
width:235px;
height:23px;
	border: 1px solid #3366FF;
	border-left: 4px solid #3366FF;

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
.ta8 {
	width: 230px;
	height:60px;
	border:1px solid #3366FF;
	border-left: 4px solid #3366FF;
}
.true
{
background:#FFFFFF url(images/search.png) no-repeat 4px 4px;
}
div{
	}
.pagebar{
background-image: url(../images/greenpremiumbck.png);
	background-repeat: no-repeat;
	width: 100%;
	float: left;
	color:white;
}
--></style>
<script type="text/javascript">
function validateLogin()
{

var user = document.getElementById("usernames").value;
user=user.replace(/(^\s+)(\s+$)/, "");
 
if(user == null || user == "" || user == " ")
{
 alert("Username must be filled out");
  return false;

}
}
function newWindows()
{
window.open('forpass.php','_blank','width=500,height=200,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');

}
</script>
</head><body style="color: #549008">
<p  id="subject"></p>
<div class="page-out">
<div class="page" >
<div class="header">
<div class="header-top">
<p style="font-size:12px;float:left;color:#00A650;padding-left:5px;padding-top:8px;">Welcome to realspot.in 
</p>  
<?php if($_SESSION['account'] == 'true' && $_SESSION['email'] != 'exit')
{
echo'
<ul>
<li><a href="template.php?cat=inception"><span>Home</span></a></li>
<li><a href="template.php?sell=sell"><span>Sell</span></a></li>
<li><a href="template.php?cat=inception&sms=show"><span>Account</span></a></li>
<li><a href="template.php?contact=yes"><span>Contact</span></a></li>
<li><a href="template.php?info=quit"><span>LogOut</span></a></li>
</ul>
';
}
else if($_GET['info'] == 'quit')
{
echo '
<ul>
<li><a href="template.php"><span>Home</span></a></li>
<li><a href="template.php?catid=login"><span>Login</span></a></li>
<li><a href="template.php?catid=register"><span>Register</span></a></li>
<li><a href="template.php?contact=yes"><span>Contact</span></a></li>
</ul>
';
} 
else
{
echo '
<ul>
<li><a href="template.php"><span>Home</span></a></li>
<li><a href="template.php?catid=login"><span>Login</span></a></li>
<li><a href="template.php?catid=register"><span>Register</span></a></li>
<li><a href="template.php?contact=yes"><span>Contact</span></a></li>
</ul>
';
} ?></div>
<div class="header-dis">
<span  style="height:180px;width:20%;float:left;">
<img src="images/logo.png" alt="logo" width="150" height="150" style="margin:12px 10px 5px 10px" />
</span>   
<span   style="height:130px;width:55%;float:left;border: 0px solid #FFFFFF;padding-top:15px;margin-top:30px;text-align:center">
<font color="#FFFFFF" size="+2" face="Times New Roman, Times, serif" style="text-align:center"> 
The Real Place for Realestate Buying/Selling/Rental
</font>
<br /><br />
<a  href="template.php?catid=register" >
<input type="button" style="background-color: #000000;border:1px solid #000000;background-image: url(images/button_bg_over.jpg);padding:3px 6px;color: #ffffff;" value="Register Free"/>
</a>            
</span>
<span  style="height:150px;border-radius:15px;width:23%;background-color:white;float:right;margin-right:10px;margin-top:12px">  
<form method="post" action="process.php" onsubmit="return validateLogin()">
<table style="padding-left:2px">
<tr><td align="center" colspan="2" style="background-color: #549008;border-radius:15px;color:white;font-weight: bold">Login Here</td></tr>
<tr><td>Username</td><td><input id="usernames" type="text" name="username" size="20"/></td></tr>
<tr><td>Password</td><td><input type="password" name="password" size="20"/></td></tr>
<tr><td align="right"><input type="submit" <?php if($_SESSION['account'] == 'true'){echo "disabled";} ?> name="login" class="fb5" value="Login" style="background-color:#549008;color:white; border-radius:15px;"/></td><td align="right"><a href="" onclick="newWindows()" style="text-decoration:none;color:#990033">Forgot Password?</a></td></tr>
<tr><td></td><td></td></tr>
<tr><td colspan="2"><hr /></td></tr>
<tr><td align="center">New User?</td><td align="center"><a href="template.php?catid=register&number=<?php echo $_GET['number'] ?>" style="text-decoration:none;font-weight: bold">Register Here</a></td></tr>
</table>
</form>
</span>
<div class="header-img">
<?php 
include_once'./include/search.php';
?>
</div>    
</div>
</div>
<div align="center" id="warning" style="background-color:#FFFFFF;color: red;padding-top:10px;font-weight: bold">
</div>  
<div align="center" class="previews">
<div class="left-out">
<div class="left-in">
<div class="left-panel" align="center">
<div align="center" id="search"  class="presearch">

</div> 
<?php 
if($_SESSION['account'] != 'true' && $_GET['catid'] != 'login' && $_GET['catid'] != 'register' && $_GET['contact'] != 'yes')
{
include_once 'randomshow.php';
}
if($_GET['contact'] == 'yes' && $_SESSION['account'] != 'true' )
{
	include_once 'contactus.php';
}
if($_GET['display'] == 'true' )      {$ms = $_GET['text'];
echo '<script type="text/javascript">alert("'.$ms.'");</script>'              ;}
if(isset($_GET['msgs'])){$sms = $_GET['msgs'];$k = explode("<br>",$sms);?>
<script>
var k = "<?php echo $k[0] ?>";
var l = "<?php echo $k[1] ?>"; 
alert(k+"\n"+l);
</script>						                                        <?php ;}
     if($_GET['info'] == 'quit')      {include_once'./include/logout.php'     ;}
else if($_SESSION['account']=='true' ){include_once './include/left_menu.php' ;
	 if($_GET['sms'] =='show' )	      {include_once './include/account.php'   ;}
else if($_GET['sms'] =='edit')        {include_once './include/edit.php'	  ;}
else if($_GET['edit'] =='property')   {include_once './include/editpro.php'   ;}
else if($_GET['sell'] =='sell')	      {include_once './property/accept.php'   ;}
else if($_GET['add'] =='true')        {include_once './include/additional.php';}
else if($_GET['msg'] =='pass')        {include_once './include/password.php'  ;}
else if($_GET['msg'] =='pay')         {include_once './include/payment.php'   ;}
else if($_GET['msg'] =='order')       {include_once './include/pay_order.php' ;}
else if($_GET['msg'] =='promo')       {include_once './include/promote.php'   ;}
else if($_GET['msg'] =='advorder')    {include_once './include/advpayment.php';}
else if($_GET['contact'] == 'yes')    {include_once 'contactus.php'           ;}
else							      {include_once './include/account.php'   ;}
																			   }
     if($_GET['catid'] == 'login' &&    $_GET['cat'] != 'inception' && $_SESSION['account'] != 'true')
	                                  {include_once './include/signin.php'    ;}
else if($_GET['catid'] == 'register' && $_GET['cat'] != 'inception' && $_SESSION['account'] != 'true')
                                      {include_once './include/new_form.php'  ;}
else if(($_GET['catid'] == 'register' || $_GET['catid'] == 'login') && $_SESSION['account'] == 'true')
                                      {include'./include/search_result.php'   ;}
else if($_GET['trap'] == 'ready' && $_SESSION['account'] == 'true' )
                                      {include'./include/search_result.php'   ;}
?>
</div>
</div>
</div>
<div class="right-out">
<iframe src="changeadv.php" scrolling="no" width="320px"  height="1200px" frameborder="0">
</iframe>
</div>
</div>

<div align="center" class="preview">
<?php 
include_once 'changeimage.php';
?>
</div>
<div class="footer" align="center" >
<p style="color:#FFFFFF;padding-top:10px">    Powered by Gitacommunications 9387335165 </p>
<?php include_once 'xmlparse.php';?>
</div>
</div>
</div>

</body>
</html>