<!DOCTYPE html><html>
<head>
<style type="text/css">
.textbox {
	width: 230px;
	height: 23px;
	border: 1px solid #209CDC;
	border-left: 4px solid #209CDC;
}

.button {
	background-color: #479D34;
	padding-left: 6px;
	padding-right: 6px;
	padding-top: 3px;
	text-transform:uppercase;
	padding-bottom: 3px;
	color: #ffffff;
	border: 1px solid #479D34;
	background-image: url(images/button_bg.jpg);
}

.button:hover {
	text-transform:uppercase;
	background-color: #000000;
	border: 1px solid #000000;
	background-image: url(images/button_bg_over.jpg);
}
</style>
</head>
<body>
<h1 style="color:green;text-align: center;text-transform:uppercase;">welcome to autovipany data entry</h1>
<div align="center">
<form name="login" action="dataprocess.php" method="post">
<table cellpadding="6" align="center">
	<tr>
		<td>Email</td>
		<td><input type="text" class="textbox" name="username" size="30" /></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" class="textbox" name="password" size="30" /></td>
	</tr>
</table>
<br />
<input type="submit" class="button" name="login" value="Sign In" /></form>
</div>
<p style="text-align:center;">www.autovipany.in</p>
</body></html>