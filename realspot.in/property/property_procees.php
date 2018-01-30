<?php 



session_start();

$con = mysql_connect("localhost","wwwreals_realtes","test@123");


if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);



if(isset($_POST['accept']))
			{
			
				

			
			
		
			

			
					$place        = trim($_POST['propplace']);
					$city         = str_replace("_"," ",$_POST['propcity']);
					$district     = trim($_POST['propdist']);
					$area         = trim($_POST['proparea'].$_POST['areameasure']);
					$amount       = trim($_POST['propprice']);
					$description  = trim($_POST['description']);
					$type         = trim($_POST['proptype']);
					$informed     = trim($_SESSION['id']);
					$info_type    = 'online_user';
					$landmark	  = trim($_POST['landmark']);
					$caption	  = trim($_POST['caption']);
					$category	  = trim($_POST['propcat']);
					$remarks   	  = trim($_POST['remarks']);
					$image		  = trim($_POST['photo']);
					
					
$sql = "INSERT INTO property(place,city,district,area,amount,description,image,time,type,informed_id,info_type,
 					landmark,caption,category,remarks)VALUES
	('$place','$city','$district','$area','$amount','$description','$image',NOW(),'$type','$informed','$info_type',
	'$landmark','$caption','$category','$remarks')";
					
					
if (!mysql_query($sql))
{
die('Error: ' . mysql_error());
}
else
{






							$_SESSION['account'] = 'true';
							//$_SESSION['email']   =  $email;
							$_SESSION['id']     = $informed; 
							
						//	success();

header("Location:../template.php?cat=inception&sms=show&msgs=Property Added Successfully!");
}
}



if(isset($_POST['acceptedit']))
{
$district	= trim($_POST['propdist']);
$city		= str_replace("_"," ",$_POST['propcity']);
$place		= trim($_POST['propplace']);
$landmark	= trim($_POST['landmark']);
$area		= trim($_POST['proparea'].$_POST['areameasure']);
$cate   	= trim($_POST['propcat']);
$type   	= trim($_POST['proptype']);
$price  	= trim($_POST['propprice']);
$desc  		= trim($_POST['description']);
$cap  		= trim($_POST['caption']);
$remark 	= trim($_POST['remarks']);
$id			= trim($_POST['userid']);
$image      = trim($_POST['photo']);

$sql = 	"UPDATE property SET  place='$place',city='$city',district='$district',area='$area',amount='$price',description='$desc',type='$type',landmark='$landmark',caption='$cap',category='$cate',remarks='$remark',image='$image' WHERE id = $id";

$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());


header("Location:../template.php?cat=inception&sms=show&msgs=Property Details Changed Successfully!");

}
?>