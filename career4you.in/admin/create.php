<html><head>
<title></title>
</head><body>
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
    <td><textarea name="addressed" ></textarea></td>
    </tr>
    
   </table><br/>
   <input type="submit" class="fb5" name="login" value="Sign In" />
   </form>
</div>

<?php 
include_once '../include/config.php';
if($_POST['login'])
{
$user 	 = $_POST['usernam'];
$pass 	 = $_POST['passwor'];
$name	 = $_POST['names'];
$address = $_POST['addressed'];
$mobilep = $_POST['mobilephone'];
$sql = "INSERT INTO dataentry(email,password,name,contact,mobile)VALUES
('$user','$pass','$name','$address','$mobilep')";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
$subject="DATA ENTRY LOGIN DETAILS";
$message="<table><tr><td colspan=2 align=center> Login Details</td></tr>
<tr><td>Username</td><td>$user</td></tr><tr><td>Password</td>
<td>$pass</td></tr><tr><td>URL</td><td>http://career4you.in/dataentry/</td>
</tr></table>";
$to=$user;
$from="response@career4you.in";
$headers="from:".$from."\r\n";
$headers .= "Reply-To: career4you.in@gmail.com\r\n";
$headers  .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html";
mail($to,$subject,$message,$headers);
sleep(3);
echo '<script>this.window.close();</script>';
}
?>
</body>
</html>