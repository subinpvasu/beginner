<?php
$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);


if($_POST['update'])
{
$type 		=   $_POST['type'];
$name		=   $_POST['name'];
$mobile		=   $_POST['mobile'];
$landline	=   $_POST['phone'];
$email		=   $_POST['email'];
$place		=   $_POST['place'];
$address	=   $_POST['address'];
$id			=   $_POST['id'];
$nickname	=   $_POST['nickname'];

    $mysql = "UPDATE register SET type='$type',name='$name',mobile='$mobile',landline='$landline',email='$email',place='$place',nickname='$nickname',address='$address'  WHERE Id=".$id;
    $result = mysql_query($mysql) or die ("Error in query: $mysql. " . mysql_error());
	header("Location:adminEdit.php?msg=done");
}

if($_POST['acceptedit'])
{
$district		=trim($_POST['propdist']);
$city			=str_replace("_"," ",$_POST['propcity']);
$place			=trim($_POST['propplace']);
$landmark		=trim($_POST['landmark']);
$area			=trim($_POST['proparea'].$_POST['areameasure']);
$category		=trim($_POST['propcat']);
$caption        =trim($_POST['caption']);
$remarks		=trim($_POST['remarks']);
$price			=trim($_POST['propprice']);
$description	=trim($_POST['description']);
$type           =trim($_POST['proptype']);
$id				=trim($_POST['userid']);
$image			=trim($_POST['photo']);
	
	$sql = 	"UPDATE property SET  place='$place',city='$city',district='$district',area='$area',amount='$price',description='$description',type='$type',landmark='$landmark',caption='$caption',category='$category',remarks='$remarks',image='$image' WHERE id =".$id;

$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());


header("Location:adminEdit.php?msg=done");
}
?>