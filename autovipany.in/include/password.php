<h2 align="center" style="color: blue; margin: 10px;">Password Settings</h2>
<hr style="width: 50%; color: red;" />
<form action="process.php" method="post">
<table>
	<tr>
		<td>Current Password</td>
		<td>:</td>
		<td><input class="textbox" type="password" name="passa" /></td>
	</tr>
	<tr>
		<td>New Password</td>
		<td>:</td>
		<td><input class="textbox" type="password" name="passb" /></td>
	</tr>
	<tr>
		<td>Confirm Password</td>
		<td>:</td>
		<td><input class="textbox" type="password" name="passc" /></td>
	</tr>
	<tr>
		<td colspan="3" align="center"><input type="submit" class="button" value="Change Password"
			name="changepass" /><input type="button"
			onclick='javascript:window.location="index.php"' class="button"
			value="Cancel" /></td>
	</tr>
</table>
</form>