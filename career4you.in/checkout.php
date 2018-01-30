<?php
session_start ();
include_once 'include/config.php';
include_once 'include/validation.php';

// new register
if ($_POST['register']=='Join Career4you.in'){
if (($_FILES["resumes"]["type"] == "text/plain" || $_FILES['resumes']['type'] == "application/msword" ||
$_FILES['resumes']['type'] == "application/octet-stream" || 
$_FILES['resumes']['type'] == "application/pdf") && ($_FILES["resumes"]["size"] / 1024) < 200 )
  {
  if ($_FILES["resumes"]["error"] > 0)
    {
    $check='false';
    }
  else
    {
   	$check = 'true';
	}
  }
else
  {
  $check='false';
  }
if($check == 'true')
{
$prefix = exec("hostname");
$random_digit = uniqid($prefix, true);
$new_file_name=$random_digit."-".$_FILES["resumes"]["name"];
$path= "./upload/".$new_file_name;
if($resumes != none)
{
if(copy($_FILES['resumes']['tmp_name'], $path))
{
$resumes = $new_file_name;
}else{
	$resumes="NO";}
}else{$resumes="NO";}
}else{echo $_FILES['resumes']['type'];$resumes="NO";}

$email = strip_tags ( $_POST ['email'] );//r
$conpass = strip_tags ( $_POST ['conpass'] );//r
$fullname = strip_tags ( $_POST ['fullname'] );//r
$gender = strip_tags ( $_POST ['gender'] );//r
$mobile = strip_tags ( $_POST ['mobile'] );//r
$district = strip_tags($_POST['district']);//r
$experince = strip_tags ( $_POST ['experience'] );//tot_exp-empl
$skills = strip_tags ( $_POST ['skills'] );//professionals capabilities
$title = strip_tags ( $_POST ['title'] );//technical sumary
foreach ($_POST['category'] as $value)
{
	$cat .= $value."|";
}
foreach ($_POST['category'] as $m)
{
	$mall .= $m.","; 
}
//fewdata
$notify = strip_tags ( $_POST ['notify'] );//fewdata
$offer = strip_tags ( $_POST ['offer'] );//fewdata
$promo = strip_tags ( $_POST ['promo'] );//fewdata

$myzql = "SELECT id FROM register WHERE email ='$email'";
$rezult = mysql_query($myzql);
$col = mysql_fetch_array($rezult);
if (empty($col[0]) && filter_var($email,FILTER_VALIDATE_EMAIL)){
	
$sql = "INSERT INTO register(name,email,mobile,gender,password,resume,district)VALUES('$fullname','$email','$mobile','$gender','$conpass','$resumes','$district')";
mysql_query ( $sql ) or die ( mysql_error () );
$key = mysql_insert_id ();
$_SESSION ['account'] = 'true';
$_SESSION ['id'] = $key;
$mysqlz = "INSERT INTO education(regid)VALUES($key)";
$mysqlo = "INSERT INTO employment(regid,tot_exp,capability)VALUES($key,'$experince','$skills')";
$mysqlt = "INSERT INTO technical(regid,summary)VALUES($key,'$title')";
$mysqlf = "INSERT INTO fewdata(regid,notify,promo,offer,categry)VALUES($key,'$notify','$promo','$offer','$cat')";
mysql_query ( $mysqlz ) or die ( mysql_error () );
mysql_query ( $mysqlo ) or die ( mysql_error () );
mysql_query ( $mysqlt ) or die ( mysql_error () );
mysql_query ( $mysqlf ) or die ( mysql_error () );

header ( 'location:index.php?registered' );
}else {header('location:index.php?msg=register&&e=email');}
}


if ($_POST['profsearch']=='Save Changes')
{
	$experince = strip_tags($_POST['experience']);
	$notify =  strip_tags($_POST['notify']);
	$promo =  strip_tags($_POST['offer']);
	$offer =  strip_tags($_POST['promo']);
	foreach ($_POST['category'] as $value)
	{
		$cat .= $value."|";
	}
	global $person;
	$sql = "UPDATE fewdata SET notify='$notify',offer='$offer',promo='$promo',categry='$cat' WHERE regid=".$person;
	$zql = "UPDATE employment SET tot_exp='$experince' WHERE regid=".$person;
	mysql_query($sql);
	mysql_query($zql);
	header ( 'location:index.php');
}

if (isset ( $_POST ['manresume'] )) {
	$name = strip_tags ( $_POST ['name'] );
	$fname = strip_tags ( $_POST ['fname'] );
	$birthplace = strip_tags ( $_POST ['birthplace'] );
	$payday = strip_tags ( $_POST ['payday'] );
	$age = strip_tags ( $_POST ['age'] );
	$gender = strip_tags ( $_POST ['gender'] );
	$marital = strip_tags ( $_POST ['marital'] );
	$wife = strip_tags ( $_POST ['wife'] );
	$child = strip_tags ( $_POST ['child'] );
	$address = strip_tags ( $_POST ['address'] );
	$addcheck = strip_tags ( $_POST ['addcheck'] );
	$address_now = strip_tags ( $_POST ['address_now'] );
	$phone = strip_tags ( $_POST ['phone'] );
	$mobile = strip_tags ( $_POST ['mobile'] );
	$fax = strip_tags ( $_POST ['fax'] );
	$id = strip_tags ( $_POST ['userid'] );
	$sql = "UPDATE register SET name='$name',father='$fname',birthplace='$birthplace',birthday='$payday',
	age='$age',marriage='$marital',wife='$wife',child='$child',peraddress='$address',preaddress='$address_now',
	phone='$phone',mobile='$mobile',fax='$fax',gender='$gender' WHERE id=" . $id;
	mysql_query ( $sql ) or die ( mysql_error () );
	header ( 'location:index.php?registered' );
}
// candidate-login
if (isset ( $_POST ['login'] )) {
	$user = strip_tags ( $_POST ['username'] );
	$pass = strip_tags ( $_POST ['password'] );
	$ip = strip_tags ( $_POST ['ipaddress'] );
	$sql = "SELECT * FROM register WHERE email='$user' AND password='$pass'";
	$result = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $result ) > 0) {
		
		while ( $row = mysql_fetch_array ( $result ) ) {
			mysql_query ( "UPDATE register SET lastip='$ip' WHERE id=" . $row ['id'] );
			$_SESSION ['id'] = $row ['id'];
			$_SESSION ['account'] = 'true';
			header ( 'location:index.php' );
		}
	} else {
		header ( 'Location:index.php?msg=err&aim=login' );
	}
}
// edite detailss
if (isset ( $_POST ['education'] )) {
	$course = strip_tags ( $_POST ['coursea'] . '|' . $_POST ['courseb'] . '|' . $_POST ['coursec'] . '|' . $_POST ['coursed'] . '
				|' . $_POST ['coursee'] );
	$school = strip_tags ( $_POST ['collegea'] . '|' . $_POST ['collegeb'] . '|' . $_POST ['collegec'] . '|' . $_POST ['colleged'] . '
				|' . $_POST ['collegee'] );
	$from = strip_tags ( $_POST ['froma'] . '|' . $_POST ['fromb'] . '|' . $_POST ['fromc'] . '|' . $_POST ['fromd'] . '
				|' . $_POST ['frome'] );
	$to = strip_tags ( $_POST ['toa'] . '|' . $_POST ['tob'] . '|' . $_POST ['toc'] . '|' . $_POST ['tod'] . '|' . $_POST ['toe'] );
	$marks = strip_tags ( $_POST ['marksa'] . '|' . $_POST ['marksb'] . '|' . $_POST ['marksc'] . '|' . $_POST ['marksd'] . '
				|' . $_POST ['markse'] );
	$achieve = strip_tags ( $_POST ['achieve'] );
	$hobby = strip_tags ( $_POST ['hobby'] );
	$active = strip_tags ( $_POST ['activity'] );
	$regid = strip_tags ( $_POST ['regid'] );
	
	$sql = "INSERT INTO education(course,school,frum,too,marks,activities,hobby,achievements,regid)
			 VALUES('$course','$school','$from','$to','$marks','$active','$hobby',
		 	'$achieve','$regid')";
	mysql_query ( $sql ) or die ( "Mysql Error" . mysql_error () );
	header ( 'location:index.php?registered' );
}
if (isset ( $_POST ['edication'] )) {
	$course = strip_tags ( $_POST ['coursea'] . '|' . $_POST ['courseb'] . '|' . $_POST ['coursec'] . '|' . $_POST ['coursed'] . '
				|' . $_POST ['coursee'] );
	$school = strip_tags ( $_POST ['collegea'] . '|' . $_POST ['collegeb'] . '|' . $_POST ['collegec'] . '|' . $_POST ['colleged'] . '
				|' . $_POST ['collegee'] );
	$from = strip_tags ( $_POST ['froma'] . '|' . $_POST ['fromb'] . '|' . $_POST ['fromc'] . '|' . $_POST ['fromd'] . '
				|' . $_POST ['frome'] );
	$to = strip_tags ( $_POST ['toa'] . '|' . $_POST ['tob'] . '|' . $_POST ['toc'] . '|' . $_POST ['tod'] . '|' . $_POST ['toe'] );
	$marks = strip_tags ( $_POST ['marksa'] . '|' . $_POST ['marksb'] . '|' . $_POST ['marksc'] . '|' . $_POST ['marksd'] . '
				|' . $_POST ['markse'] );
	$achieve = strip_tags ( $_POST ['achieve'] );
	$hobby = strip_tags ( $_POST ['hobby'] );
	$active = strip_tags ( $_POST ['activity'] );
	$id = strip_tags ( $_POST ['regid'] );
	// ///////////////////////////////////do wait
	$sql = "UPDATE  education SET course='" . $course . "', school='" . $school . "', frum='" . $from . "', 
	too='" . $to . "', marks='" . $marks . "',activities='" . $active . "', hobby='" . $hobby . "',
	achievements='" . $achieve . "'WHERE regid='$id'";
	mysql_query ( $sql ) or die ( mysql_error () );
	header ( 'location:index.php?registered' );
}
if (isset ( $_POST ['employee'] )) {
	$firm = strip_tags ( $_POST ['firma'] . '|' . $_POST ['firmb'] . '|' . $_POST ['firmc'] );
	$place = strip_tags ( $_POST ['placea'] . '|' . $_POST ['placeb'] . '|' . $_POST ['placec'] );
	$design = strip_tags ( $_POST ['designa'] . '|' . $_POST ['designb'] . '|' . $_POST ['designc'] );
	$from = strip_tags ( $_POST ['froma'] . '|' . $_POST ['fromb'] . '|' . $_POST ['fromc'] );
	$to = strip_tags ( $_POST ['toa'] . '|' . $_POST ['tob'] . '|' . $_POST ['toc'] );
	$reason = strip_tags ( $_POST ['reasona'] . '|' . $_POST ['reasonb'] . '|' . $_POST ['reasonc'] );
	$present = strip_tags ( $_POST ['present'] );
	$capability = strip_tags ( $_POST ['capability'] );
	$assessment = strip_tags ( $_POST ['assessment'] );
	$presalary = strip_tags ( $_POST ['presalary'] );
	$expsalary = strip_tags ( $_POST ['expsalary'] );
	$regid = strip_tags ( $_POST ['regid'] );
	$sql = "INSERT INTO employment(firm, place, designation, frum, too, reason, capability, 
			yourself, salary, expect, regid, current) VALUES('$firm','$place','$design','$from','$to',
			'$reason','$capability','$assessment','$presalary','$expsalary','$regid','$present')";
	mysql_query ( $sql ) or die ( mysql_error () );
	header ( 'location:index.php?registered' );
}
if (isset ( $_POST ['employed'] )) {
	$firm = strip_tags ( $_POST ['firma'] . '|' . $_POST ['firmb'] . '|' . $_POST ['firmc'] );
	$place = strip_tags ( $_POST ['placea'] . '|' . $_POST ['placeb'] . '|' . $_POST ['placec'] );
	$design = strip_tags ( $_POST ['designa'] . '|' . $_POST ['designb'] . '|' . $_POST ['designc'] );
	$from = strip_tags ( $_POST ['froma'] . '|' . $_POST ['fromb'] . '|' . $_POST ['fromc'] );
	$to = strip_tags ( $_POST ['toa'] . '|' . $_POST ['tob'] . '|' . $_POST ['toc'] );
	$reason = strip_tags ( $_POST ['reasona'] . '|' . $_POST ['reasonb'] . '|' . $_POST ['reasonc'] );
	$present = strip_tags ( $_POST ['present'] );
	$capability = strip_tags ( $_POST ['capability'] );
	$assessment = strip_tags ( $_POST ['assessment'] );
	$presalary = strip_tags ( $_POST ['presalary'] );
	$expsalary = strip_tags ( $_POST ['expsalary'] );
	$regid = strip_tags ( $_POST ['regid'] );
	$sql = "UPDATE employment SET firm='" . $firm . "',place='" . $place . "',designation='" . $design . "',
			frum='" . $from . "',too='" . $to . "',reason='" . $reason . "',capability='" . $capability . "',
			yourself='" . $assessment . "',salary='" . $presalary . "',expect='" . $expsalary . "',current='" . $present . "'
			WHERE regid='$regid'";
	mysql_query ( $sql ) or die ( mysql_error () );
	header ( 'location:index.php?registered' );
}
// /technical
if (isset ( $_POST ['technical'] )) {
	$mr = strip_tags ( $_POST ['MR'] );
	$mw = strip_tags ( $_POST ['MW'] );
	$ms = strip_tags ( $_POST ['MS'] );
	$er = strip_tags ( $_POST ['ER'] );
	$ew = strip_tags ( $_POST ['EW'] );
	$es = strip_tags ( $_POST ['ES'] );
	$hr = strip_tags ( $_POST ['HR'] );
	$hw = strip_tags ( $_POST ['HW'] );
	$hs = strip_tags ( $_POST ['HS'] );
	$tr = strip_tags ( $_POST ['TR'] );
	$tw = strip_tags ( $_POST ['TW'] );
	$ts = strip_tags ( $_POST ['TS'] );
	$mso = strip_tags ( $_POST ['MSO'] );
	$tal = strip_tags ( $_POST ['TAL'] );
	$dtp = strip_tags ( $_POST ['DTP'] );
	$tcl = strip_tags ( $_POST ['TCL'] );
	$gdd = strip_tags ( $_POST ['GDD'] );
	$anm = strip_tags ( $_POST ['ANM'] );
	$pcd = strip_tags ( $_POST ['PCD'] );
	$det = strip_tags ( $_POST ['challenge'] );
	$rid = strip_tags ( $_POST ['regid'] );
	$other = strip_tags ( $_POST ['other'] );
	$summ = strip_tags ( $_POST ['summary'] );
	
	$sql = "INSERT INTO technical(mr,mw,ms,er,ew,es,hr,hw,hs,tr,tw,ts,dtp,mso,tal,tcl,gdd,anm,pcd,
 			details,regid,other,summary)VALUES('$mr','$mw','$ms','$er','$ew','$es','$hr','$hw','$hs','$tr',
 			'$tw','$ts','$dtp','$mso','$tal','$tcl','$gdd','$anm','$pcd','$det','$rid','$other','$summ')";
	mysql_query ( $sql ) or die ( mysql_error () );
	header ( 'location:index.php?registered' );
}
if (isset ( $_POST ['technic'] )) {
	$mr = strip_tags ( $_POST ['MR'] );
	$mw = strip_tags ( $_POST ['MW'] );
	$ms = strip_tags ( $_POST ['MS'] );
	$er = strip_tags ( $_POST ['ER'] );
	$ew = strip_tags ( $_POST ['EW'] );
	$es = strip_tags ( $_POST ['ES'] );
	$hr = strip_tags ( $_POST ['HR'] );
	$hw = strip_tags ( $_POST ['HW'] );
	$hs = strip_tags ( $_POST ['HS'] );
	$tr = strip_tags ( $_POST ['TR'] );
	$tw = strip_tags ( $_POST ['TW'] );
	$ts = strip_tags ( $_POST ['TS'] );
	$mso = strip_tags ( $_POST ['MSO'] );
	$tal = strip_tags ( $_POST ['TAL'] );
	$dtp = strip_tags ( $_POST ['DTP'] );
	$tcl = strip_tags ( $_POST ['TCL'] );
	$gdd = strip_tags ( $_POST ['GDD'] );
	$anm = strip_tags ( $_POST ['ANM'] );
	$pcd = strip_tags ( $_POST ['PCD'] );
	$det = strip_tags ( $_POST ['challenge'] );
	$rid = strip_tags ( $_POST ['regid'] );
	$other = strip_tags ( $_POST ['other'] );
	$summ = strip_tags ( $_POST ['summary'] );
	
	$sql = "UPDATE technical SET mr='$mr',mw='$mw',ms='$ms',er='$er',ew='$ew',es='$es',hr='$hr',hw='$hw',
			hs='$hs',tr='$tr',tw='$tw',ts='$ts',dtp='$dtp',mso='$mso',tal='$tal',tcl='$tcl',gdd='$gdd',
			anm='$anm',pcd='$pcd',details='$det',other='$other',summary='$summ' WHERE regid='$rid'";
	mysql_query ( $sql ) or die ( mysql_error () );
	header ( 'location:index.php?registered' );
}
if ($_POST ['changepass'] == 'Change Password') {
	$id = strip_tags ( $_POST ['userid'] );
	$pa = strip_tags ( $_POST ['passb'] );
	
	$sql = "UPDATE register SET password='$pa' WHERE id=$id";
	mysql_query ( $sql ) or die ( mysql_error () );
	header ( 'location:index.php?registered' );
}
if ($_POST ['changepassem'] == 'Change Password') {
	$id = strip_tags ( $_POST ['userid'] );
	$pa = strip_tags ( $_POST ['passb'] );
	
	$sql = "UPDATE employer SET password='$pa' WHERE id=$id";
	mysql_query ( $sql ) or die ( mysql_error () );
	header ( 'location:index.php?employer' );
}
if (isset ( $_POST ['cont_submit'] )) {
	$name = strip_tags ( $_POST ['cont_name'] );
	$mobile = strip_tags ( $_POST ['cont_mobile'] );
	$mail = strip_tags ( $_POST ['cont_mail'] );
	$sub = strip_tags ( $_POST ['cont_subject'] );
	$msg = strip_tags ( $_POST ['cont_msg'] );
	$to = "career4you.in@gmail.com";
	$subject = "FeedBack";
	$message = "
			<table>
			<tr>
			<td>Name</td>
			<td>:</td>
			<td>$name</td>
			</tr>
				<tr>
			<td>Mobile</td>
			<td>:</td>
			<td>$mobile</td>
			</tr>
				<tr>
			<td>Mail</td>
			<td>:</td>
			<td>$mail</td>
			</tr>
				<tr>
			<td>Subject</td>
			<td>:</td>
			<td>$sub</td>
			</tr>
				<tr>
			<td>Message</td>
			<td>:</td>
			<td>$msg</td>
			</tr>
				
					</table>
";
	
	$from = "response@career4you.in";
	$headers = "from:" . $from . "\r\n";
	$headers .= "Reply-To: career4you.in@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html";
	mail ( $to, $subject, $message, $headers );
	header ( 'location:index.php?sent' );
}
// employer
if (isset ( $_POST ['employer'] )) {
	$comname = strip_tags ( $_POST ['comname'] );
	$comtype = strip_tags ( $_POST ['comtype'] );
	$address = strip_tags ( $_POST ['address'] );
	$pin = strip_tags ( $_POST ['pin'] );
	$state = strip_tags ( $_POST ['state'] );
	$country = strip_tags ( $_POST ['country'] );
	$phone = strip_tags ( $_POST ['phone'] );
	$mobile = strip_tags ( $_POST ['mobile'] );
	$fax = strip_tags ( $_POST ['fax'] );
	$email = strip_tags ( $_POST ['email'] );
	$website = strip_tags ( $_POST ['website'] );
	$profile = strip_tags ( $_POST ['profile'] );
	$person = strip_tags ( $_POST ['person'] );
	$designation = strip_tags ( $_POST ['designation'] );
	$contact = strip_tags ( $_POST ['contact'] );
	$ip = strip_tags ( $_POST ['ipaddress'] );
	$password = strip_tags ( $_POST ['pass'] );
	$place = strip_tags ( $_POST ['place'] );
	
	$sql = "INSERT INTO employer(name,type,address,pin,state,country,phone,mobile,fax,email,website,
			profile,person,designation,contact,ip,password,district)VALUES('$comname','$comtype','$address',
			'$pin','$state','$country','$phone','$mobile','$fax','$email','$website','$profile','$person',
			'$designation','$contact','$ip','$password','$place')";
	mysql_query ( $sql ) or die ( mysql_error () );
	$_SESSION ['employer'] = 'true';
	$_SESSION ['id'] = mysql_insert_id ();
	$to = $email;
	$subject = "Registration Details";
	$message = "
				<table>
				<tr>
				<td>Username</td>
				<td>:</td>
				<td>$email</td>
				</tr>
					<tr>
				<td>Password</td>
				<td>:</td>
				<td>$password</td>
				</tr>
					<tr>
				<td>URL</td>
				<td>:</td>
				<td>http://career4you.in/</td>
				</tr>
				</table>
	";
	$from = "WWW.CAREER4YOU.IN<response@career4you.in>";
	$headers = "from:" . $from . "\r\n";
	$headers .= "Reply-To: career4you.in@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html";
	mail ( $to, $subject, $message, $headers );
	header ( 'location:index.php?employer' );
}
if (isset ( $_POST ['manemployer'] )) {
	$comname = strip_tags ( $_POST ['comname'] );
	$comtype = strip_tags ( $_POST ['comtype'] );
	$address = strip_tags ( $_POST ['address'] );
	$pin = strip_tags ( $_POST ['pin'] );
	$state = strip_tags ( $_POST ['state'] );
	$country = strip_tags ( $_POST ['country'] );
	$phone = strip_tags ( $_POST ['phone'] );
	$mobile = strip_tags ( $_POST ['mobile'] );
	$fax = strip_tags ( $_POST ['fax'] );
	$website = strip_tags ( $_POST ['website'] );
	$profile = strip_tags ( $_POST ['profile'] );
	$person = strip_tags ( $_POST ['person'] );
	$designation = strip_tags ( $_POST ['designation'] );
	$contact = strip_tags ( $_POST ['contact'] );
	$id = strip_tags ( $_POST ['userid'] );
	$place = strip_tags ( $_POST ['place'] );
	$sql = "UPDATE employer SET name='$comname',type='$comtype',address='$address',pin='$pin',state='$state',
			country='$country',phone='$phone',mobile='$mobile',fax='$fax',website='$website',
			profile='$profile',person='$person',designation='$designation',contact='$contact',district='$place'
			WHERE id=" . $id;
	mysql_query ( $sql ) or die ( mysql_error () );
	header ( 'location:index.php?employer' );
}
if (isset ( $_POST ['myboss'] )) {
	$user = strip_tags ( $_POST ['username'] );
	$pass = strip_tags ( $_POST ['password'] );
	$ip = strip_tags ( $_POST ['ipaddress'] );
	$sql = "SELECT * FROM employer WHERE email='$user' AND password='$pass'";
	$result = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $result ) > 0) {
		while ( $row = mysql_fetch_array ( $result ) ) {
			$msql = "UPDATE employer SET lastip='$ip' WHERE id=" . $row ['id'];
			mysql_query ( $msql ) or die ( mysql_error () );
			$_SESSION ['employer'] = 'true';
			$_SESSION ['id'] = $row ['id'];
			header ( 'location:index.php?employer' );
		}
	} else {
		header ( 'Location:index.php?msg=err&aim=employer-login' );
	}
}
if (isset ( $_POST ['reqire'] )) {
	$desig = strip_tags ( $_POST ['design'] );
	$vacan = strip_tags ( $_POST ['vacant'] );
	$gend = strip_tags ( $_POST ['gender'] );
	$sala = strip_tags ( $_POST ['salary'] );
	// $remk = strip_tags($_POST['remark']);
	$expr = strip_tags ( $_POST ['experience'] );
	$cata = strip_tags ( $_POST ['cat'] );
	$type = strip_tags ( $_POST ['type'] );
	$age = strip_tags ( $_POST ['age'] );
	$emid = strip_tags ( $_POST ['empid'] );
	$last = strip_tags ( $_POST ['lastchange'] );
	
	$sql = "INSERT INTO requirement(designation,vacancy,age,sex,salary,category,experience,type,empid,
	lastchange)VALUES('$desig','$vacan','$age','$gend','$sala','$cata','$expr','$type','$emid','$last')";
	mysql_query ( $sql ) or die ( mysql_error () );
	header ( 'location:index.php?employer' );
}
if (isset ( $_POST ['reqired'] )) {
	$desig = strip_tags ( $_POST ['design'] );
	$vacan = strip_tags ( $_POST ['vacant'] );
	$gend = strip_tags ( $_POST ['gender'] );
	$sala = strip_tags ( $_POST ['salary'] );
	// $remk = strip_tags($_POST['remark']);
	$expr = strip_tags ( $_POST ['experience'] );
	$cata = strip_tags ( $_POST ['cat'] );
	$type = strip_tags ( $_POST ['type'] );
	$age = strip_tags ( $_POST ['age'] );
	$id = strip_tags ( $_POST ['reqid'] );
	$last = strip_tags ( $_POST ['lastchange'] );
	
	$sql = "UPDATE requirement SET designation='$desig',vacancy='$vacan',age='$age',sex='$gend',
			salary='$sala',experience='$expr',type='$type',category='$cata',lastchange='$last' WHERE id=" . $id;
	mysql_query ( $sql ) or die ( mysql_error () );
	header ( 'location:index.php?employered' );
}
// //create db and tables for the career4u.and make the login successfull

if ($_POST ['order'] == 'Place My Order') {
	$plan = strip_tags ( $_POST ['plan'] );
	$tariff = strip_tags ( $_POST ['cost'] );
	$deposit = strip_tags ( $_POST ['deposit'] );
	$paymode = strip_tags ( $_POST ['paymode'] );
	$bank = strip_tags ( $_POST ['bank'] );
	$branch = strip_tags ( $_POST ['branch'] );
	$day = strip_tags ( $_POST ['payday'] );
	$time = strip_tags ( $_POST ['hour'] . $_POST ['minute'] . $_POST ['meridian'] );
	$customer = strip_tags ( $_POST ['customers'] );
	$mobile = strip_tags ( $_POST ['phones'] );
	$mail = strip_tags ( $_POST ['mails'] );
	$address = strip_tags ( $_POST ['address'] );
	$empid = strip_tags ( $_POST ['empid'] );
	
	$sql = "INSERT INTO payment(plan, cost, deposit, mode, bank, branch, remit, time, name, mobile,
		email, address, empid)VALUES('$plan','$tariff','$deposit','$paymode','$bank','$branch',
		'$day','$time','$customer','$mobile','$mail','$address','$empid')";
	mysql_query ( $sql ) or die ( mysql_error () );
	header ( 'Location:index.php?msg=order' );

}


?>