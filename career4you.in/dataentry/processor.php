<?php
include_once '../include/config.php';
include_once '../include/validation.php';
session_start();
if($_SESSION['chk'] != 'true')
{
echo "You are Not suppose to be here!<br>";
echo '
<script>
window.location="http://www.career4you.in";
</script>
';	
}
if($_POST['submit'] =='Login')
{
$user = $_POST['user'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM dataentry WHERE email='$user' AND password='$pass'";

$rs = mysql_query($sql)or die(mysql_error());
$k = mysql_fetch_array($rs);
if($k>0)
{
	$ksql = "UPDATE dataentry SET last=NOW() WHERE id=".$k[0];
	mysql_query($ksql) or die(mysql_error());
	$_SESSION['data']='true';
	$_SESSION['key']=$k[0];
	$_SESSION['firm'] = 'true';
	header('Location:index.php');
}
else
{
	header('Location:index.php');
}
}
if($_POST['firm']=='Add Company')
{
$comp = strip_tags($_POST['company']); 
$type = strip_tags($_POST['type']); 
$addr = strip_tags($_POST['address']); 
$plce = strip_tags($_POST['place']); 
$pins = strip_tags($_POST['pin']); 
$dist = strip_tags($_POST['district']); 
$stte = strip_tags($_POST['state']); 
$mobl = strip_tags($_POST['mobile']); 
$phne = strip_tags($_POST['phone']); 
$faxs = strip_tags($_POST['fax']); 
$mail = strip_tags($_POST['email']); 
$wste = strip_tags($_POST['website']); 
$user = strip_tags($_POST['userid']);
$prfl = strip_tags($_POST['profile']);
$arrv = 'operator';
$sql = "INSERT INTO employer(name,type,address,pin,state,phone, mobile, fax, email,website, district,arrival,
		userid,profile)VALUES('$comp','$type','$addr','$pins','$stte','$phne','$mobl','$faxs','$mail','$wste','$dist',
		'$arrv','$user','$prfl')";
	mysql_query($sql)  or die(mysql_error());
	$_SESSION['firm'] = mysql_insert_id();
	$_SESSION['company']=$comp;
	header('Location:index.php');
}	

if($_POST['jobpost']=='Post Job')
{
$desg = strip_tags($_POST['designation']); 
$vcnc = strip_tags($_POST['vacancy']); 
$catr = strip_tags($_POST['category']); 
$aged = strip_tags($_POST['age']); 
$expr = strip_tags($_POST['experience']); 
$gend = strip_tags($_POST['gender']); 
$rqur = strip_tags($_POST['requirement']); 
$salr = strip_tags($_POST['salary']); 
$jtpe = strip_tags($_POST['jobtype']); 
$newi = strip_tags($_POST['firmid']);
$last = strip_tags($_POST['lastchange']);

	
	$msql = "INSERT INTO requirement(designation, vacancy, age, sex, salary, empid, experience, type, category,
	requirement,lastchange) VALUES ('$desg','$vcnc','$aged','$gend','$salr','$newi','$expr','$jtpe','$catr',
	'$rqur','$last')";
	mysql_query($msql) or die(mysql_error());
	$_SESSION['job']='added';
	/*
	 * send mail
	 */
	header('Location:index.php');
}
if($_GET['msg']=='newfirm')
{
	$_SESSION['firm']='true';
	$_SESSION['job']='notadd';
	echo "Y";
}
if($_GET['msg']=='samefirm')
{
	$_SESSION['job']='notadd';
	echo "Y";
}
if($_GET['msg']=='postjob')
{
	$_SESSION['resume']='false';
	$_SESSION['firm']  ='true';
	echo "Y";
}
if($_GET['msg']=='postresume')
{
	$_SESSION['resume']='true';
	echo "Y";
}
if($_GET['msg']=='newresume')
{
	$_SESSION['more']='false';
	echo "Y";
}
if($_GET['msg']=='backhome')
{
	$_SESSION['resume']='correct';
	$_SESSION['job']   ='correct';
	$_SESSION['more']  ='correct';
	
	echo "Y";
}
if($_GET['msg']=='canceloper')
{
	
	echo "Y";
}

if($_POST['candidate']=='Submit')
{
$name 			= strip_tags($_POST['name']);
$guardian		= strip_tags($_POST['guardian']);
$dob			= strip_tags($_POST['dob']);
$spouse			= strip_tags($_POST['spouse']);
$children		= strip_tags($_POST['children']);
$address		= strip_tags($_POST['address']);
$presentaddress	= strip_tags($_POST['presentaddress']);
$phone			= strip_tags($_POST['phone']);
$mobile			= strip_tags($_POST['mobile']);
$fax			= strip_tags($_POST['fax']);
$email			= strip_tags($_POST['email']);
$entry 			= 'operator';
$user 			= strip_tags($_POST['userid']);
$gender         = strip_tags($_POST['gender']);

$sql = "INSERT INTO register(name, father, birthday, wife, child,  peraddress, preaddress, 
		phone, mobile, fax, email, entry,user,gender)VALUES('$name','$guardian','$dob','$spouse','$children',
		'$address','$presentaddress','$phone','$mobile','$fax','$email','$entry','$user','$gender')";
$result = mysql_query($sql) or die(mysql_error()) ;
$refid = mysql_insert_id();
$_SESSION['employee']=$name;


////////////////////////////////education
$course	  = strip_tags($_POST['course1'].'|'.$_POST['course2'].'|'.$_POST['course3'].'|'.$_POST['course4']);
$college  = strip_tags($_POST['college1'].'|'.$_POST['college2'].'|'.$_POST['college3'].'|'.$_POST['college4']);
$from	  = strip_tags($_POST['from1'].'|'.$_POST['from2'].'|'.$_POST['from3'].'|'.$_POST['from4']);
$to		  = strip_tags($_POST['to1'].'|'.$_POST['to2'].'|'.$_POST['to3'].'|'.$_POST['to4']);
$marks	  = strip_tags($_POST['marks1'].'|'.$_POST['marks2'].'|'.$_POST['marks3'].'|'.$_POST['marks4']);
$activity = strip_tags($_POST['activity']);
$hobby	  = strip_tags($_POST['hobby']);
$achieve  = strip_tags($_POST['achieve']);

$namef			= strip_tags($_POST['name1'].'|'.$_POST['name2'].'|'.$_POST['name3']);
$place			= strip_tags($_POST['place1'].'|'.$_POST['place2'].'|'.$_POST['place3']);
$designation	= strip_tags($_POST['designation1'].'|'.$_POST['designation2'].'|'.$_POST['designation3']);
$from1			= strip_tags($_POST['from11'].'|'.$_POST['from12'].'|'.$_POST['from13']);
$to1			= strip_tags($_POST['to11'].'|'.$_POST['to12'].'|'.$_POST['to13']);
$reason			= strip_tags($_POST['reason1'].'|'.$_POST['reason2'].'|'.$_POST['reason3']);
$present		= strip_tags($_POST['present']);
$profession		= strip_tags($_POST['profession']);
$date12			= strip_tags($_POST['date12']);
$date13			= strip_tags($_POST['date13']);
$summary		= strip_tags($_POST['summary']);
if($result)
{
	
	$msql  = "INSERT INTO education( course, school, frum, too, marks, activities, hobby, achievements, regid)
			 VALUES('$course','$college','$from','$to','$marks','$activity','$hobby','$achieve','$refid')";
	mysql_query($msql) or die(mysql_error());
	$ssql  = "INSERT INTO employment(firm, place, designation, frum, too, reason, capability, salary,
			  expect, regid, current)VALUES('$namef','$place','$designation','$from1','$to1','$reason',
			  '$profession','$date12','$date13','$refid','$present')";
	mysql_query($ssql) or die(mysql_error());
	$ysql  = "INSERT INTO technical(summary,regid)VALUES('$summary','$refid')";
	mysql_query($ysql) or die(mysql_error());
	$_SESSION['more']='true';
header('Location:index.php');
}
}