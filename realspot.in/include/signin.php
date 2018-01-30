<script type="text/javascript">
function validateLog()
{

var user = document.getElementById("username").value;
user=user.replace(/(^\s+)(\s+$)/, "");
 
if(user == null || user == "" || user == " ")
{
 alert("Username must be filled out");
  return false;

}



}
function newWindow()
{
window.open('forpass.php','_blank','width=500,height=200,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');

}


</script>



<h2 style="text-align:left"> Are You a Registered User?</h2><br>


<div align="center">
    <form name="login" action="process.php" onsubmit="return validateLog()" method="post">
    <table cellpadding="6"><tr><td>
   Email</td><td>:<input type="text" id="username" class="tb8" name="username" size="30" maxlength="30"/></td></tr>
   <tr><td>Password </td><td>:<input type="password" class="tb8" id="password" name="password" size="30" maxlength="30"/></td></tr>
  <tr><td></td><td><a href="" onclick="newWindow()" style="text-decoration:none;color:#990033">Forgot Password?</a></td></tr>
   <input type="hidden" name="advertid" value=<?php echo $_GET['number'] ?> />
 <tr><td align="center" colspan="2">  <input type="submit" class="fb5" name="login" value="Sign In" /></td></tr>
   </table></form>

</div>
<br/>
<br/>
<br/>
<div align="right">
<h4><a href="template.php?catid=register&number=<?php echo $_GET['number'] ?>" style="text-decoration:none">OR Create a new  Account</a></h4></div>
