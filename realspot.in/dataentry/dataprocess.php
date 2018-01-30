<?php
function success()
{
header('Location:useraccount.php');
}
function successful()
{
header('Location:success.php');
}
session_start();




$con = mysql_connect("localhost","wwwreals_realtes","test@123");


if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);





if($_POST['login'])
{
$user = $_POST['username'];
$pass = $_POST['password'];
if(!empty($user) && !empty($pass))
{
$sql = "SELECT * FROM operator WHERE username='$user' AND password='$pass'";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());


$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$k =  date('d-m-Y H:i:s');


if(mysql_num_rows($result) > 0) 
{

while($row = mysql_fetch_array($result))
{
	$_SESSION['userid'] = $row['id'];	
	$mysql = "UPDATE operator SET last_login ='$k'  WHERE id=".$row['id'];
    $results = mysql_query($mysql) or die ("Error in query: $mysql. " . mysql_error());

success();

}
}
}
else
{
echo "Try again";

}
}


///// dataprocess


if(isset($_POST['deaccept']))
{
			if($_FILES['image']['name'] != '')
			{
			$file_name = $_FILES['image']['name'];
				$prefix = exec("hostname");
				$random_digit = uniqid($prefix, true);
				$new_file_name=$random_digit.$file_name;
				$path= "../upload/".$new_file_name;
				if($ufile != none)//$_FILES[image][tmp_name];
				{
				if(copy($_FILES['image']['tmp_name'], $path))
				{
				$image = $new_file_name;
				}
				}
				}
				else
				{
				$image = "default.jpg";
				}
				

//*********************Variables  for Register

$type			=trim($_POST['detype']);
$name			=trim($_POST['dename']);
$mobile			=trim($_POST['demobile']);
$landline		=trim($_POST['dephone']);
$address		=trim($_POST['deaddress']);
$email			=trim($_POST['deemail']);
$ip				=trim($_POST['deipaddress']);
$user           =trim($_POST['userid']);
$password		=trim($_POST['depassa']);


//*********************variables for property
//$informed       =trim($_POST['userid']);
$infotype		='operator';
$district		=trim($_POST['depropdist']);
$city			=str_replace("_"," ",$_POST['depropcity']);
$place			=trim($_POST['depropplace']);
$landmark		=trim($_POST['delandmark']);
$area			=trim($_POST['deproparea'].$_POST['areameasure']);
$category		=trim(str_replace("_"," ",$_POST['depropcat']));
$caption        =trim($_POST['decaption']);
$remarks		=trim($_POST['deremarks']);
$price			=trim($_POST['depropprice']);
$description	=trim($_POST['dedescription']);
//$image			=trim($_POST['deimage']);




if(empty($_POST['range']))
{
$proptype		=trim($_POST['deproptype']);

}
else
{
$proptype		=trim($_POST['deproptype'].$_POST['range']);
}



$sql = "INSERT INTO register(type,name,mobile,landline,address,email,password,time,user,ip)VALUES
 ('$type','$name','$mobile','$landline','$address','$email','$password',NOW(),'$user','$ip')";

$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());

$informed = mysql_insert_id();


 $sqll = "INSERT INTO property(type,place,city,district,area,amount,description,landmark,category,time,informed_id,info_type,caption,remarks,image)VALUES
 ('$proptype','$place','$city','$district','$area','$price','$description','$landmark','$category',NOW(),
 '$informed','$infotype','$caption','$remarks','$image')";
 
$resultl = mysql_query($sqll) or die ("Error in query: $sqll. " . mysql_error());
 
  

successful();

 

 
 
}