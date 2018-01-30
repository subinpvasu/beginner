<?php
session_start ();
if (is_numeric ( $_SESSION ['id'] )) {
	?>
	<h2 align="center" style="color: blue; margin: 10px;">Account Details</h2>
<hr style="width: 50%; color: red;" />
<form action="process.php" onsubmit="return validateForm()"
	method="post">

<table align="center">
	<tr>
		<td>I am</td>
		<td>:</td>
		<td><?php
	echo getDetailsFromTable ( 'type' );
	?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td>:</td>
		<td><input name="name" class="textbox" type="text" size="30" id="name"
			value="<?php
	echo getDetailsFromTable ( 'name' );
	?>" /></td>
	</tr>
	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><input name="mobile" type="text" size="30" id="mobile"
			value="<?php
	echo getDetailsFromTable ( 'mobile' );
	?>" class="textbox" /></td>
	</tr>
	<tr>
		<td>LandLine</td>
		<td>:</td>
		<td><input type="text" name="phone" size="30" id="landline"
			class="textbox" value="<?php
	echo getDetailsFromTable ( 'phone' );
	?>" /></td>
	</tr>
	<tr>
		<td>E-mail</td>
		<td>:</td>
		<td><?php
	echo getDetailsFromTable ( 'email' );
	?></td>
	</tr>
	<tr>
		<td align="center" colspan="3"><input name="update"
			class="button" type="submit" value="Update" /> <input type="button"
			onclick='javascript:window.location="index.php"' class="button"
			value="Cancel" /></td>
	</tr>
</table>
</form>
<?php
}
?>