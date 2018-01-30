<html>
<head>
<script type="text/javascript">
function letmeIn()
{
return true;
}

</script>
</head>
<body>
<form method="post" action="process.php" onsubmit="return letmeIn()">
<table>
	<tr>
		<td width="170px" valign="middle" align="center"
			style="padding-top: 25px; font-size: 12px; line-height: 20px; border-right: 1px solid black; color: black">
		<a href="http://autovipany.in/" style="text-decoration: none;">www.autovipany.in</a><br />
		C/o Gita Communications<br />
		TMK Complex,Mannath Lane<br />
		M.G.Road,Thrissur-680001<br />
		Office<br />
		0487-2323926,2335165<br />
		2325306,3248206<br />
		Mobile<br />
		9387335165,9249555735<br />
		E-mail : autovipany.in@gmail.com<br />

		</td>
		<td>
		<table width="400px" cellpadding="5">
			<tr>
				<td colspan="3" align="center">
				<h3 style="color: green">Share Your Experience with Us</h3>
				</td>
			</tr>
			<tr>
				<td>I am</td>
				<td>:</td>
				<td><select name="cont_type" class="select">
					<option value="Visitor">Visitor</option>
					<option value="Buyer">Buyer</option>
					<option value="Seller">Seller</option>
					<option value="Agent">Agent</option>
				</select></td>
			</tr>
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><input type="text" class="textbox" name="cont_name" /></td>
			</tr>
			<tr>
				<td>Mobile</td>
				<td>:</td>
				<td><input type="text" class="textbox" name="cont_mobile" /></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input type="text" class="textbox" name="cont_mail" /></td>
			</tr>
			<tr>
				<td>Subject</td>
				<td>:</td>
				<td><input type="text" class="textbox" name="cont_subject" /></td>
			</tr>
			<tr>
				<td>Message</td>
				<td>:</td>
				<td><textarea class="textarea" name="cont_msg"></textarea></td>
			</tr>
			<tr>
				<td colspan="3" align="center"><input type="submit"
					name="cont_submit" class="button" value="Send Now" /> <input
					type="button" onclick='javascript:window.location="index.php"'
					class="button" value="Cancel" /></td>
			</tr>
		</table>
		</td>
	</tr>
</table>
</form>
</body>
</html>