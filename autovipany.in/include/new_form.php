<h3 align="left">Register Here!</h3>
<div align="center">
<form action="process.php" onsubmit="return validateForm()" method="post">
<table>
	<tr>
		<td>I am</td>
		<td>:</td>
		<td><select class="select" name="type" id="type"
			onchange="allLetters(this.value,this.id,4)">
			<option value="">--Select--</option>
			<option value="Seller">Seller</option>
			<option value="Buyer">Buyer</option>
			<option value="Agent">Agent</option>
		</select></td>

	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><input name="name" class="textbox" type="text" size="30" id="name"
			onblur="alphanumeric(this.value,this.id,2)" /></td>

	</tr>

	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><input name="mobile" type="text" size="30" id="mobile"
			class="textbox" onblur="allNumbers(this.value,this.id,10)" /></td>

	</tr>

	<tr>
		<td>Any LandLine</td>
		<td>:</td>
		<td><input type="text" name="phone" size="30" id="landline"
			class="textbox" onblur="allNumbers(this.value,this.id,10)" /></td>

	</tr>

	<tr>
		<td>E-mail</td>
		<td>:</td>
		<td><input name="email" type="text" class="textbox" size="30"
			id="mail" onblur="chkEmail(this.value,this.id)" /></td>

	</tr>

	<tr>
		<td>Password</td>
		<td>:</td>
		<td><input name="passa" class="textbox" type="password" size="30"
			id="passa"  onkeyup="chkPassword('passa','passb')"/></td>

	</tr>

	<tr>
		<td>Confirm Password</td>
		<td>:</td>
		<td><input name="passb" class="textbox" type="password" size="30"
			id="passb" onkeyup="chkPassword('passa','passb')" /></td>

	</tr>

</table>

<div align="center"><input name="submit" class="button" 
	type="submit" value="Create Account" /></div>
</form>

</div>

<div align="right">
<h4><a href="index.php?msg=login" style="text-decoration: none">Login
Here</a></h4>
</div>
<input type="hidden" id="typer"     value="" name="kq"/>
<input type="hidden" id="namer"     value="" name="kw"/>
<input type="hidden" id="mobiler"   value="" name="ke"/>
<input type="hidden" id="landliner" value="" name="kr"/>
<input type="hidden" id="mailr"     value="" name="kt"/>
<input type="hidden" id="passbr"    value="" name="ky"/>
<input type="hidden" id="passar"    value="" name="ku"/>