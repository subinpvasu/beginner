<?php
session_start ();
include_once 'include/admin.php';

///////////////register variable


if ($_POST ['terms'] == 'Y') {
	$marriage = strip_tags ( $_POST ['marriage'] );
	$name = strip_tags ( $_POST ['name'] );
	$gender = strip_tags ( $_POST ['gender'] );
	$dob = strip_tags ( $_POST ['dob'] );
	$age = strip_tags ( $_POST ['age'] );
	$religion = strip_tags ( $_POST ['religion'] );
	$caste = strip_tags ( $_POST ['caste'] );
	$present = strip_tags ( $_POST ['present'] );
	$address = strip_tags ( $_POST ['address'] );
	$place = strip_tags ( $_POST ['place'] );
	$pincode = strip_tags ( $_POST ['pincode'] );
	$city = strip_tags ( $_POST ['city'] );
	$district = strip_tags ( $_POST ['district'] );
	$state = strip_tags ( $_POST ['state'] );
	$country = strip_tags ( $_POST ['country'] );
	$email = strip_tags ( $_POST ['email'] );
	$landline = strip_tags ( $_POST ['landline'] );
	$mobile = strip_tags ( $_POST ['mobile'] );
	$password = strip_tags ( $_POST ['password'] );
	$ipaddress = strip_tags ( $_POST ['ipaddress'] );
	
	$sql = "INSERT INTO personal_details(marriage, name, gender, dob, age, religion, caste, present, address,
	    place, pin, city, district, state, country, telephone, mobile, email, password,ip,added) VALUES ('$marriage',
	    '$name','$gender','$dob','$age','$religion','$caste','$present','$address','$place','$pincode','$city',
	    '$district','$state','$country','$landline','$mobile','$email','$password','$ipaddress',NOW())";
	$result = mysql_query ( $sql );
	
$_SESSION['profile']='true';
$_SESSION['who'] = mysql_insert_id();
//send mail
header('Location:index.php?wall=ready');
} 
if ($_POST ['login'] == 'Login') {
	$email = $_POST ['email'];
	$pass = $_POST ['password'];
	$sql = "SELECT id FROM personal_details WHERE email='$email' AND password='$pass' AND visibility='Y'";
	$result = mysql_query ( $sql );
	if ($result) {
		$id = mysql_fetch_array ( $result );
		
		$k = $id [0];
		//send mail
		if ($k > 0) {
			$_SESSION ['profile'] = 'true';
			$_SESSION ['who'] = $id [0];
			$zql = "UPDATE personal_details SET last=NOW() WHERE id=".$k;
			$qzl = "SELECT verified FROM emailid WHERE person_id=".$k;
			mysql_query($zql);
			$resultz = mysql_query($qzl);
			$row = mysql_fetch_array($resultz);
				$to = $email;
$subject = "Registration Successful";
$message = "<h3>Warm Wishes</h3>
Your VADHU-VARAN profile has been registered Successfully.
<br> Login for further details.<br>
http://www.vadhu-varan.com/index.php?msg=login
<br><br>Team <br>Vadhu-Varan";
	
	$headers  = "from:VADHU-VARAN.COM<response@vadhu-varan.com>\r\n";
	$headers .= "Reply-To: gitacommunications@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html";
	//mail ( $to, $subject, $message, $headers );
			
			
			if($row[0]=='Y')
			{
				$_SESSION['verification']=true;
			}
			else 
			{
				$_SESSION['verification']=false;
			}
			header ( 'Location:index.php' );
		} else {
			
			header ( "Location:index.php?msg=login" );
		}
	}
} 

if (isset ( $_POST ['contact'] )) {
	$name = strip_tags ( $_POST ['name'] );
	$address = strip_tags ( $_POST ['address'] );
	$mobile = strip_tags ( $_POST ['phone'] );
	$mail = strip_tags ( $_POST ['email'] );
	$sub = strip_tags ( $_POST ['subject'] );
	$msg = strip_tags ( $_POST ['message'] );
	$to = "gitacommunications@gmail.com";
	$subject = "FeedBack";
	$message = "<table><tr><td>Name</td><td>:</td><td>$name</td></tr>
<tr><td>Address</td><td>:</td><td>$address</td></tr><tr><td>Mobile</td><td>:</td>
<td>$mobile</td></tr><tr><td>Mail</td><td>:</td><td>$mail</td></tr><tr><td>Subject</td><td>:</td>
<td>$sub</td></tr><tr><td>Message</td><td>:</td><td>$msg</td></tr></table>";
	$from = "response@vadhu-varan.com";
	$headers  = "from:VADHU-VARAN.COM<response@vadhu-varan.com>\r\n";
	$headers .= "Reply-To: gitacommunications@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html";
	mail ( $to, $subject, $message, $headers );
	header ( 'location:index.php?msg=contact&its=done' );
}

?>