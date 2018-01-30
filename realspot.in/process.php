<?php
function successmail()
{
	header('Location:template.php?msgs=Thank you for your valued enquiry/feedback.We will contact you shortly.<br>
	Please feel free to contact our helpline numbers.');
}
function success()
{
header('location:template.php?cat=inception&sms=show&msgs=Registration Successful');
}
function successup()
{
header('location:template.php?cat=inception&sms=show&msgs=Data Updated Successfully');
}
function successlog()
{
header('location:template.php?cat=inception&sms=show');
}
?>
<?php
session_start();

////////**********************************************************register
$con = mysql_connect("localhost","wwwreals_realtes","test@123");


if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);




if(isset($_POST['submit']))
			{
				
							
							
$_SESSION['advert']	 = trim($_POST['advertid']);
$ip        = trim($_POST['address']);
$type      = trim($_POST['type']);
$name      = trim($_POST['name']);
$mobile    = trim($_POST['mobile']);
$landline  = trim($_POST['phone']);
$email     = trim($_POST['email']);
$pass      = trim($_POST['passa']);


					
$sql = "INSERT INTO register(name,mobile,landline,email,password,type,time,ip)VALUES
('$name','$mobile','$landline','$email','$pass','$type',NOW(),'$ip')";


if (!mysql_query($sql))
{
die('Error: ' . mysql_error());
}
else
{


														$_SESSION['name']    =  $name;
														$_SESSION['account'] = 'true';
														$_SESSION['email']   =  $email;
														$_SESSION['id']      = mysql_insert_id();

$to =  trim($_POST['email']);
$subject="Registration Details";
$message="
					Thank you for Registration.
					
					Login to 
					
					http://realspot.in/
					
					
					with the details below.
					
					Email    : $_POST[email]
					Password : $_POST[passa]

";
$from="response@realspot.in";
$header="from:".$from;
mail($to,$subject,$message,$header);
														
														success();

}
}


//******************************************************************************Sign in

if(isset($_POST['login']))
			{
$email     = trim($_POST['username']);
$pass      = trim($_POST['password']);
$_SESSION['advert']	 = trim($_POST['advertid']);
$_SESSION['email']   = $email;
 
 
 $sql = "SELECT * FROM register WHERE email='$email' AND password='$pass'";

$result = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($result) > 0) 
{

while($row = mysql_fetch_array($result))
{
		$_SESSION['name']    =  $row['name'];
		$_SESSION['account'] = 'true';
		$_SESSION['id']      = $row['Id'];
		successlog();
																			
}

}

else
{
header('location:template.php?catid=login&display=true&text=Username and Password does not matching');

}
}


///////////*************************************************Update

if(isset($_POST['update']))
{
$type      = trim($_POST['type']);
$name      = trim($_POST['name']);
$mobile    = trim($_POST['mobile']);
$landline  = trim($_POST['phone']);
$email     = trim($_POST['email']);

$id        = trim($_POST['id']);

$sql = 	"UPDATE register SET type='$type',name='$name',mobile='$mobile',landline='$landline',email='$email' WHERE Id = $id";

$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());

		$_SESSION['name']    =  $name;
		$_SESSION['account'] = 'true';
		$_SESSION['email']   = $email;
		successup();
}

if($_POST['cont_submit'])
{
$to="realspot.in@gmail.com";
$subject="Feedback";
$message="
				<table>
				<tr><td colspan=3 align=center>Feedback </td></tr>	
				<tr>	<td>					
Type</td><td>	: </td><td>$_POST[cont_type]</td>
</tr><tr><td>
Name</td><td>	: </td><td>$_POST[cont_name]</td>
</tr><tr><td>
Mobile 	</td><td>						: </td><td>$_POST[cont_mobile]</td>
</tr><tr><td>
Mail ID	</td><td>							:</td><td> $_POST[cont_mail]</td>
</tr><tr><td>
Subject </td><td>	:</td><td> $_POST[cont_subject]</td>
</tr><tr><td>
Message	</td><td>								: </td><td>$_POST[cont_msg]</td>
</tr>


</table>

";

$from="response@realspot.in";
$headers="from:".$from."\r\n";
$headers .= "Reply-To: $_POST[cont_mail]\r\n";
$headers  .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html";

mail($to,$subject,$message,$headers);

successmail();
}
?>