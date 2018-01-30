<?php
session_start ();
include_once '../include/dblog.php';

if ($_POST ['login']) {
	$user = $_POST ['username'];
	$pass = $_POST ['password'];
	if (! empty ( $user ) && ! empty ( $pass )) {
		$sql = "SELECT * FROM data_entry_operator WHERE email='$user' AND password='$pass'";
		$result = mysql_query ( $sql ) or die ( "Error in query: $sql. " . mysql_error () );
		
		$timezone = "Asia/Calcutta";
		if (function_exists ( 'date_default_timezone_set' ))
			date_default_timezone_set ( $timezone );
		$k = date ( 'd-m-Y H:i:s' );
		$ip = $_SERVER ['REMOTE_ADDR'];
		
		if (mysql_num_rows ( $result ) > 0) {
			
			while ( $row = mysql_fetch_array ( $result ) ) {
				$_SESSION ['user'] = $row ['id'];
				$mysql = "UPDATE data_entry_operator SET last='$k',ip='$ip'  WHERE id=" . $row ['id'];
				$results = mysql_query ( $mysql ) or die ( "Error in query: $mysql. " . mysql_error () );
				success ();
			
			}
		}
	} else {
		echo "Try again";
	
	}
}
function success() {
	header ( 'Location:useraccount.php' );
}
function successful() {
	header ( 'Location:success.php' );
}
function getDataEntryOperator($var,$table='data_entry_operator') {
	if ($table=='data_entry_operator')
	{
		$persons = $_SESSION['user'];
	}
	else
	{
		$persons = $_SESSION['person'];
	}
	$sql = "SELECT $var FROM $table WHERE id=" . $persons;
	mysql_query ( $sql ) or die ( "Error in query: $sql. " . mysql_error () );
	//connect using and return name
}
if ($_POST ['motor'] == 'ADD VEHICLE') {
	if ($_FILES ['image'] ['name'] != '') {
		$file_name = $_FILES ['image'] ['name'];
		$prefix = exec ( "hostname" );
		$random_digit = uniqid ( $prefix, true );
		$new_file_name = $random_digit . $file_name;
		$path = "../upload/" . $new_file_name;
		if ($ufile != none) //$_FILES[image][tmp_name];
{
			if (copy ( $_FILES ['image'] ['tmp_name'], $path )) {
				$image = $new_file_name;
			}
		}
	} else {
		$image = "autovipany.jpg";
	}
	
	$type = strip_tags ( $_POST ['type'] );
	$name = strip_tags ( $_POST ['name'] );
	$mobile = strip_tags ( $_POST ['mobile'] );
	$landline = strip_tags ( $_POST ['phone'] );
	$address = strip_tags ( $_POST ['address'] );
	$email = strip_tags ( $_POST ['email'] );
	$ip = $_SERVER ['REMOTE_ADDR'];
	
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
	$entry = 'N';
	$operator = $_SESSION ['user'];
	if (!is_numeric($_SESSION['person'])){
	$sql = "INSERT INTO rcowner(name,mobile,phone,email,type,time,ip,address)VALUES('$name','$mobile','$landline','$email',
		'$type',NOW(),'$ip','$address')";
	mysql_query ( $sql ) or die ( "Error in query: $sql. " . mysql_error () ); 
		$holder = mysql_insert_id ();
		$_SESSION ['person'] = $holder;
	}
	else
	{
		$holder = $_SESSION['person'];
	} 
		
		$mysql = "INSERT INTO vehicle(title,type,conditions,price,brand,years,model,driven,color,fuel,transmission,
		description,holder,online_entry,photo,time,ip,deo) VALUES ('$adtitle','$category','$condition','$price',
		'$brand','$year','$model','$driven','$color','$fuel','$transmission','$other','$holder','$entry',
		'$image',NOW(),'$ip','$operator')";
		mysql_query ( $mysql ) or die ( "Error in query: $mysql. " . mysql_error () );
			successful ();
		
	
}