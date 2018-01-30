<?php
session_start();
if($_SESSION['profile']=='true')
{
	backToindex();
}

?>
<form method="post" action="controller.php">
<table cellspacing="5" style="padding-top: 25px">

<tr>
<td colspan="3" align="left" style="color:rgb(196,22,15);font-weight: bold;padding-bottom:30px;">
Login Here...</td>

</tr>


<tr>
<td>Email</td>
<td>:</td>
<td><input type="text" name="email" value="" class="textbox" /></td>
</tr>

<tr>
<td>Password</td>
<td>:</td>
<td><input type="password" name="password" value="" class="textbox" /></td>
</tr>

<tr>
<td colspan="3" align="center">
<a href="" onclick="newWindow()" style="text-decoration:none;color:blue;font-weight:bold;">Forgot Password..?</a></td>

</tr>

<tr>
<td colspan="3" align="center"><input type="submit" name="login" class="button" value="Login" /></td>

</tr>

<tr>
<td colspan="3" align="right" style="padding-top:25px">
<a href="index.php?msg=register" style="text-decoration:none;color:blue;font-weight:bold;">Register Now</a></td>

</tr>


</table></form>