<?php
include_once '../include/dblog.php';
include_once '../include/sendSomeMail.php';
include_once '../include/functions.php';
?>
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
$sql = "INSERT INTO data_entry_operator(email,password,name,address,mobile)VALUES('$user','$pass','$name','$address','$mobilep')";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
$topic = 'DATA ENTRY LOGIN DETAILS';
$mesag = 'Hi '.$name.',<br/>Your Data Entry Login Credentials are <br/>Username:'.$user.'<br/>Password:'.$pass.'<br/>
		<a style="text-decoration:none;color:lightblue;" href="http://autovipany.in/dataentry/login.php">Click Here To Login</a>';
postTheMail(composeNewMessage($topic,$mesag),$user,$topic);
echo 'Account Created Successfully.';
sleep(3);
echo '<script>
		this.window.close();
		</script>';
}
if($_GET['msg']=='resend')
{
	$who = $_GET['who'];
	$topic = 'DATA ENTRY LOGIN DETAILS';
$mesag = 'Hi '.getDetailsFromTable('name','data_entry_operator',$who).',<br/>Your Data Entry Login Credentials are <br/>Username:'.getDetailsFromTable('email','data_entry_operator',$who).'<br/>Password:'.getDetailsFromTable('password','data_entry_operator',$who).'<br/>
		<a style="text-decoration:none;color:lightblue;" href="http://autovipany.in/dataentry/login.php">Click Here To Login</a>';
postTheMail(composeNewMessage($topic,$mesag),getDetailsFromTable('email','data_entry_operator',$who),$topic);
}
?>