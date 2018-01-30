<?php
session_start ();
include_once 'include/functions.php';
include_once 'include/sendSomeMail.php';
if ($_POST ['submit'] == 'Create Account' && !is_numeric($_SESSION['id'])) {
	$type = strip_tags ( $_POST ['type'] );
	$name = strip_tags ( $_POST ['name'] );
	$mobile = strip_tags ( $_POST ['mobile'] );
	$landline = strip_tags ( $_POST ['phone'] );
	$email = strip_tags ( $_POST ['email'] );
	$pass = strip_tags ( $_POST ['passa'] );
	$ip = $_SERVER ['REMOTE_ADDR'];
	$entry = 'Y';
	$sql = "INSERT INTO rcowner(name,mobile,phone,email,password,type,time,ip,entrance)VALUES('$name','$mobile',
	'$landline','$email','$pass','$type',NOW(),'$ip','$entry')";
	
	if (! mysql_query ( $sql )) {
		header('location:index.php?exception');
	} else {
		$_SESSION ['id'] = mysql_insert_id ();
		$topic = 'Account Created Successfully';
		$messag = 'Hi '.$name.',<br/>Your Account has been created successfully.Please stay close with us <a href="http://autovipany.in/" style="color:lightblue;text-decoration:none;">Here</a>.<br/>
					Your Credentials are <br/>Username:'.$email.' <br/>Password:'.$pass.'<br/>';
		postTheMail(composeNewMessage($topic,$messag),$email,$topic);
		success ();
	}
}
if (isset ( $_POST ['login'] ) && !is_numeric($_SESSION['id'])) {
	$email = strip_tags ( $_POST ['username'] );
	$pass = strip_tags ( $_POST ['password'] );
	$sql = "SELECT * FROM rcowner WHERE email='$email' AND password='$pass' AND entrance='Y'";
	$result = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $result ) > 0) {
		while ( $row = mysql_fetch_array ( $result ) ) {
			$_SESSION ['id'] = $row ['id'];
			success ();
		}
	} else {
			header('location:index.php?exception');
	}
}
if ($_POST ['update'] == 'Update') {
	global $person;
	$sql = "UPDATE rcowner SET name='$_POST[name]',mobile='$_POST[mobile]',phone='$_POST[phone]' WHERE id = " . $person;
	$result = mysql_query ( $sql ) or die ( "Error in query: $sql. " . mysql_error () );
	success ();
}
if ($_POST ['additional'] == 'Add Details') {
	global $person;
	
	$sql = "UPDATE rcowner SET nickname='$_POST[name]',address='$_POST[address]',place='$_POST[place]',other='$_POST[other]' WHERE id=" . $person;
	$result = mysql_query ( $sql ) or die ( "Error in query: $sql. " . mysql_error () );
	success ();
}
if ($_POST ['changepass'] == 'Change Password') {
	global $person;
	$passa = strip_tags ( $_POST ['passa'] );
	$passb = strip_tags ( $_POST ['passb'] );
	$passc = strip_tags ( $_POST ['passc'] );
	if (getDetailsFromTable ( 'password' ) == $passa) {
		if ($passb == $passc) {
			$sql = "UPDATE rcowner SET password='$passb' WHERE id=" . $person;
			mysql_query ( $sql );
			$topic = 'Account Password Changed';
			$messag = 'Hi '.getDetailsFromTable('name').',<br/>Your Account Password has been changed to '.$passb.'.<br/>Stay close with us <a style="text-decoration:none;color:lightblue;" herf="http://autovipany.in/">www.autovipany.in</a>';
			postTheMail(composeNewMessage($topic,$messag),getDetailsFromTable('email'),$topic);
			success ();
		} else {
			#error
			echo '1';
		}
	} else {
		#error
		echo '2';
	}
}
if ($_POST ['motor'] == 'ADD VEHICLE') {
	
	$adtitle = strip_tags ( $_POST ['adtitle'] );
	$category = strip_tags ( $_POST ['category'] );
	$condition = strip_tags ( $_POST ['condition'] );
	$price = strip_tags ( $_POST ['price'] );
	$brand = strip_tags ( $_POST ['brand'] );
	$model = strip_tags ( $_POST ['model'] );
	$year = strip_tags ( $_POST ['year'] );
	$driven = strip_tags ( $_POST ['driven'] );
	$color = strip_tags ( $_POST ['color'] );
	$fuel = strip_tags ( $_POST ['fuel'] );
	$transmission = strip_tags ( $_POST ['transmission'] );
	$other = strip_tags ( $_POST ['other'] );
	$state = strip_tags ( $_POST ['state'] );
	$district = strip_tags ( $_POST ['district'] );
	$location = strip_tags ( $_POST ['location'] );
	$photo = strip_tags ( $_POST ['photo'] );
	$holder = $_SESSION ['id'];
	$entry = 'Y';
	
	$sql = "INSERT INTO vehicle(title,type,conditions,price,brand,years,model,driven,color,fuel,transmission,
		description,holder,online_entry,photo) VALUES ('$adtitle','$category','$condition','$price','$brand',
		'$year','$model','$driven','$color','$fuel','$transmission','$other','$holder','$entry','$photo')";
	if (mysql_query ( $sql ) or die ( ".$sql." . mysql_error () )) {
		$topic ='Automobile Added';
		$messag = 'Hi '.getDetailsFromTable('name').',<br/>Your Automobile has been added to your account<br/>Stay close with us .
					<br/>Please Check it Out <a style="text-decoration:none;color:lightblue;" href="http://autovipany.in/index.php?msg=second&second='.mysql_insert_id().'">Here</a>';
		postTheMail(composeNewMessage($topic,$messag),getDetailsFromTable('email'),$topic);
		success ();
	} else {
			header('location:index.php?exception');
	}

}
if ($_POST ['motoredit'] == 'SAVE CHANGES') {
	
	$adtitle = strip_tags ( $_POST ['adtitle'] );
	$category = strip_tags ( $_POST ['category'] );
	$condition = strip_tags ( $_POST ['condition'] );
	$price = strip_tags ( $_POST ['price'] );
	$brand = strip_tags ( $_POST ['brand'] );
	$model = strip_tags ( $_POST ['model'] );
	$year = strip_tags ( $_POST ['year'] );
	$driven = strip_tags ( $_POST ['driven'] );
	$color = strip_tags ( $_POST ['color'] );
	$fuel = strip_tags ( $_POST ['fuel'] );
	$transmission = strip_tags ( $_POST ['transmission'] );
	$other = strip_tags ( $_POST ['other'] );
	$photo = strip_tags ( $_POST ['photo'] );
	
	$sql = "UPDATE vehicle SET title='$adtitle',type='$category',conditions='$condition',price='$price',brand='$brand',
years='$year',model='$model',driven='$driven',color='$color',fuel='$fuel',transmission='$transmission',
description='$other',photo='$photo',time=NOW() WHERE id=" . $_SESSION ['flag'];
	if (mysql_query ( $sql ) or die ( ".$sql." . mysql_error () )) {
		success ();
	} else {
		header('location:index.php?exception');
	}

}
if ($_POST ['cont_submit']=='Send Now') 
{
	postTheMail(composeNewMessage($_POST["cont_subject"],$_POST["cont_msg"],$_POST["cont_name"],$_POST["cont_type"],$_POST["cont_mobile"],$_POST["cont_mail"],$_POST['cont_name']),'autovipany.in@gmail.com',$_POST["cont_subject"]);
	successmail ();
}
successmail();
?>