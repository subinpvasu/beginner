<?php
session_start ();
include_once 'include/myadmin.php';
include_once 'include/functions.php';
if ($_POST ['username'] == 'Submit') {
	$height = strip_tags ( $_POST ['height'] );
	$body = strip_tags ( $_POST ['body'] );
	$complexion = strip_tags ( $_POST ['complexion'] );
	$hair = strip_tags ( $_POST ['hair'] );
	$hairstyle = strip_tags ( $_POST ['hairstyle'] );
	$eye = strip_tags ( $_POST ['eye'] );
	$sight = strip_tags ( $_POST ['sight'] );
	$diet = strip_tags ( $_POST ['diet'] );
	$smoke = strip_tags ( $_POST ['smoke'] );
	$drink = strip_tags ( $_POST ['drink'] );
	$occupation = strip_tags ( $_POST ['occupation'] );
	$exercise = strip_tags ( $_POST ['exercise'] );
	$religion = strip_tags ( $_POST ['religion'] );
	$beliefs = strip_tags ( $_POST ['beliefs'] );
	$education = strip_tags ( $_POST ['education'] );
	$income = strip_tags ( $_POST ['income'] );
	$relate = implode ( ",", $_POST ['relation'] );
	$ok = false;
	global $pin;
	$vardig = array ($height, $body, $complexion, $hair, $hairstyle, $eye, $sight, $diet, $smoke, $drink, $occupation, $exercise, $religion, $beliefs, $education );
	foreach ( $vardig as $values ) {
		$ret = inputValidationDigit ( $values );
		if ($ret == false) {
			header ( 'location:index.php?profes' );
		} else {
			$ok = true;
		}
	}
	if ($ok) {
		$sql = "UPDATE testimonial SET height='$height',body='$body',complexion='$complexion',hair='$hair',hairstyle='$hairstyle',eye='$eye',sight='$sight',diet='$diet',smoke='$smoke',drink='$drink',occupation='$occupation',exercise='$exercise',religion='$religion',belief='$beliefs',education='$education',income='$income',relation='$relate' WHERE pin=" . $pin;
		mysql_query ( $sql ) or die ( mysql_error () );
		header ( 'location:index.php?profes' );
	}
}
if ($_POST ['manner'] == 'submit') {
	$yourself = strip_tags ( $_POST ['yourself'] );
	$favourite = strip_tags ( $_POST ['favourites'] );
	$motto = strip_tags ( $_POST ['motto'] );
	$fun = strip_tags ( $_POST ['fun'] );
	$mission = strip_tags ( $_POST ['mission'] );
	$prefer = strip_tags ( $_POST ['prefer'] );
	$irritation = strip_tags ( $_POST ['irritation'] );
	$passage = strip_tags ( $_POST ['passage'] );
	$lastlife = strip_tags ( $_POST ['lastlife'] );
	$happy = strip_tags ( $_POST ['happy'] );
	global $pin;
	$sql = "UPDATE mannerism SET yourself='$yourself',favourites='$favourite',motto='$motto',fun='$fun',
		mision='$mission',prefer='$prefer',irritation='$irritation',passage='$passage',lastlife='$lastlife',
		happy='$happy' WHERE pin=" . $pin;
	mysql_query ( $sql ) or die ( mysql_error () );
	header ( 'location:index.php?testim' );
}
?>