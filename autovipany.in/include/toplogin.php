<form method="post" action="process.php"
	onsubmit="return validateLogin()">
<table
	style="padding-left: 2px; background-color: white; margin-top: 15px; padding: 5px;">
	<tr>
		<td align="center" colspan="2"
			style="background-color: #463D3E; border-radius: 15px; color: white; font-weight: bold">Login
		Here</td>
	</tr>
	<tr>
		<td style="color: #485129">Username</td>
		<td><input id="usernames" type="text" name="username" size="20" /></td>
	</tr>
	<tr>
		<td style="color: #485129">Password</td>
		<td><input type="password" name="password" size="20" /></td>
	</tr>
	<tr>
		<td  colspan="2" style="white-space: nowrap;text-align:right"><input type="submit" name="login"
			class="button" value="Login" /> <a href="" onclick="newWindows()"
			style="text-decoration: none; color: #990033">Forgot Password?</a></td>
	</tr>
	<tr>
		<td colspan="2">
		<hr />
		</td>
	</tr>
	<tr style="white-space: nowrap;">
		<td align="center" colspan="2"><a
			style="text-decoration: none; font-weight: bold"
			href="index.php?msg=register">Register Here </a></td>
	</tr>
</table>
</form>