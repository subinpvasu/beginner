<script>
function chekform()
{
	var u = document.getElementById("mail").value;
	var p = document.getElementById("pass").value;
	if(u != null && u != "" && p != null && p != "")
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>

<div align="center">
    <form name="login" action="create.php" method="post" onsubmit="return chekform()">
    <table cellpadding="6">
    <tr>
    <td>Email</td>
    <td> <input id="mail" type="text"  class="tb8" name="usernam" size="30" maxlength="30"/></td>
    </tr>
    <tr>
    <td>Password </td>
    <td><input id="pass" type="password" class="tb8" name="passwor" size="30" maxlength="30"/></td>
    </tr>
    <tr>
    <td>Name</td>
    <td> <input id="name" type="text"  class="tb8" name="names" size="30" maxlength="30"/></td>
    </tr>
      <tr>
    <td>Mobile</td>
    <td> <input id="mobile" type="text"  class="tb8" name="mobilephone" size="30" maxlength="12"/></td>
    </tr>
      <tr>
    <td>Address</td>
    <td><textarea name="addressed" maxlength="200"></textarea></td>
    </tr>
    
   </table><br/>
   <input type="submit" class="fb5" name="login" value="Sign In" />
   </form>

</div>






<?php 
if($_POST['login'])
{
$user 	 = $_POST['usernam'];
$pass 	 = $_POST['passwor'];
$name	 = $_POST['names'];
$address = $_POST['addressed'];
$mobilep = $_POST['mobilephone'];


$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);


$sql = "INSERT INTO operator(username,password,name,address,mobile)VALUES('$user','$pass','$name','$address','$mobilep')";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
$subject="DATA ENTRY LOGIN DETAILS";
$message="
		
		<table>
  <tr><td colspan=2 align=center> Login Details</td></tr>
  <tr>
    <td>Username</td>
    <td>$user</td>
  </tr>
  <tr>
    <td>Password</td>
    <td>$pass</td>
  </tr>
  <tr>
    <td>URL</td>
    <td>http://realspot.in/dataentry/login.php</td>
  </tr>
  
</table>

";
$to=$user;
$from="response@realspot.in";
$headers="from:".$from."\r\n";
$headers .= "Reply-To: realspot.in@gmail.com\r\n";
$headers  .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html";

mail($to,$subject,$message,$headers);
sleep(3);
echo '<script>
		this.window.close();
		</script>';
}
?>