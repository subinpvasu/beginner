<?php 
session_start();
if($_SESSION['account'] == 'true')
{
?>
<form action="checkout.php"  method="post" onsubmit="return passCheck()">
<table>
<tr>
<td>Current Password:</td>
<td><input class="textbox" type="password" onkeyup="javascript:showStatus(this.value)"
	id="passa" name="passa" size="30" maxlength="20" />
<input type="hidden" id="password" value="<?php echo $_GET['key'];?>"/>
<input type="hidden" name="old" id="funcheck" value="N"/></td>
</tr>
<tr>
<td>New Password:</td>
<td><input class="textbox" type="password" name="passb" id="passb" size="30" maxlength="20"  /></td>
</tr>
<tr>
<td>Confirm Password:</td>
<td><input class="textbox" type="password" name="passc" id="passc" size="30" maxlength="20"  /></td>
</tr>
<tr>
<td><input type="hidden" name="userid" id="userid" value="<?php echo $_GET['key'] ?> "/></td>
<td> <input type="submit" class="fb5" value="Change Password" name="changepass" /> 
</td>
</tr>
</table>
</form>
<?php 
}
else if($_SESSION['employer'] == 'true')
{
?>
<form action="checkout.php"  method="post" onsubmit="return passCheckem()">
<table>
<tr>
<td>Current Password:</td>
<td><input class="textbox" type="password" onkeyup="javascript:showStatusem(this.value)" 
	id="passa" name="passa" size="30" maxlength="20" />
<input type="hidden" id="password" value="<?php echo $_GET['key'];?>"/>
<input type="hidden" name="old" id="funcheck" value="N"/></td>
</tr>
<tr>
<td>New Password:</td>
<td><input class="textbox" type="password" name="passb" id="passb" size="30" maxlength="20"  /></td>
</tr>
<tr>
<td>Confirm Password:</td>
<td><input class="textbox" type="password" name="passc" id="passc" size="30" maxlength="20"  /></td>
</tr>
<tr>
<td><input type="hidden" name="userid" id="userid" value="<?php echo $_GET['key'] ?> "/></td>
<td> <input type="submit" class="fb5" value="Change Password" name="changepassem" /> 
</td>
</tr>
</table>
</form>
<?php
}
?>