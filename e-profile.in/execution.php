<?php
session_start();
include_once 'include/myadmin.php';
include_once 'include/functions.php';
$name		=	strip_tags($_POST['name']);
$user		=	strip_tags($_POST['username']);
$mail 		=	strip_tags($_POST['email']);
$pass		=	strip_tags($_POST['password']);
$conf		=	strip_tags($_POST['confirm']);
$gend		=	strip_tags($_POST['gender']);
$day		=	strip_tags($_POST['day']);
$mon		=	strip_tags($_POST['month']);
$year		=	strip_tags($_POST['year']);
$coun		=	strip_tags($_POST['country']);
$city		=	strip_tags($_POST['city']);
$term		=	strip_tags($_POST['terms']);
$ip 		=   strip_tags($_POST['address']);
$mar_sts    =   strip_tags($_POST['marital_status']);
		  empty($_POST['state'])?$stat=null:$stat=strip_tags($_POST['state']);
		  empty($_POST['advert'])?$advt=null:$advt=strip_tags($_POST['advert']);
$vari  = array($name,$user,$gend,$day,$mon,$year,$coun,$city,$term,$pass,$mar_sts);
if (filter_var($mail, FILTER_VALIDATE_EMAIL) && ($pass==$conf)) 
	{$tot = true;
	foreach ($vari as $values)
{
	$ret = inputValidation($values);
	if ($ret==false)
	{
		$msg =  'There are some errors'.$values;
		header('location:index.php?'.$msg);
	}
	else 
	{
		$age = calculateAge($day,$mon,$year);
		$dob =  $mon . "/" . $day . "/" . $year;
	}
}
	}
	else 
	{
      $tot = false;
    }
if ($ret && $tot && ($age<70))
{
	/*
	 * store these values to the db and make the account true
	 * we need sessions
	 * they are : id,get by function gender,age,city.
	 */
	$sql = "INSERT INTO members(name,username,email,password,gender,dob,age,country,state,city,terms,advert,ip,
	last,marital_status)VALUES('$name','$user','$mail','$pass','$gend','$dob','$age','$coun','$stat','$city',
	'$term','$advt','$ip',NOW())";
	$result = mysql_query($sql);
	$_SESSION['pin'] = mysql_insert_id();
	header('location:index.php?profile');
	
}
else
{
		$msg =  'There are some errors';
		header('location:index.php?'.$msg);
}