<?php
include_once '../include/functions.php';
function reroute($id,$user=-1) {
	if($user<0){header ( 'location:adminEdit.php?first=' . $id );}
	if($user>0){header ('location:adminEdit.php?waste='.$id);}
}
function rerouteEn($id,$user=-1) {
	if($user<0){header ( 'location:adminEdit.php?ipt=edit&first=' . $id );}
    if($user>0){header ('location:adminEdit.php?msg=edituser&waste='.$id);}
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
	$id = strip_tags ( $_POST ['user'] );
	$sql = "UPDATE vehicle SET title='$adtitle',type='$category',conditions='$condition',price='$price',brand='$brand',
years='$year',model='$model',driven='$driven',color='$color',fuel='$fuel',transmission='$transmission',
description='$other',photo='$photo',time=NOW() WHERE id=" . $id;
	if (mysql_query ( $sql )) {
		reroute ( $id );
	} else {
		rerouteEn ( $id );
	}

}
if ($_POST ['update'] == 'Update') {
	$sql = "UPDATE rcowner SET name='$_POST[name]',mobile='$_POST[mobile]',phone='$_POST[phone]' ";
	$sql .= " nickname='$_POST[name]',address='$_POST[address]',place='$_POST[place]',other='$_POST[other]' WHERE id=" . $_POST ['userid'];
if (mysql_query ( $sql )) {
		reroute ( $_POST['userid'],1);
	} else {
		rerouteEn ( $_POST['userid'],1 );
	}

}

?>