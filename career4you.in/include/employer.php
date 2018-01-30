<html>
<head>
</head>
<body>
<form method="post" action="checkout.php">
<table>

<tr>
<td colspan="4" align="center"><h4>New Employer Registration</h4></td>
</tr>

<tr>
	<td>Company Name</td>
	<td>:</td>
	<td><input type="text" name="comname" size="30" id="emcompany" class="textbox" /></td>
	<td width="10px" id="com"></td>
</tr>
<tr>
<td>Type</td>
<td>:</td>
	<td>
		<select name="comtype" id="emtype" class="select">
		<option value="Industry">Industry</option>
		<option value="Business">Business</option>
		<option value="Service">Service</option>
		</select>
	</td>
	<td width="10px" id="typ"></td>
</tr>
<tr>
	<td>Address</td>
	<td>:</td>
	<td><textarea name="address" id="emsaddress"  class="textarea"></textarea></td>
	<td width="10px" id="add"></td>
</tr>
<tr>
	<td>Place</td>
	<td>:</td>
	<td><input type="text" name="place" id="emplace" size="30" class="textbox" /></td>
	<td width="10px" id="pla"></td>
</tr>
<tr>
	<td>Pin</td>
	<td>:</td>
	<td><input type="text" name="pin" id="empin" size="30" class="textbox" /></td>
	<td width="10px" id="pin"></td>
</tr>
<tr>
	<td>State</td>
	<td>:</td>
	<td><input type="text" name="state" id="emstate" size="30" class="textbox" /></td>
	<td width="10px" id="sta"></td>
</tr>
<tr>
	<td>Country</td>
	<td>:</td>
	<td><input type="text" name="country" id="emcountry" size="30" class="textbox" /></td>
	<td width="10px" id="cou"></td>
</tr>
<tr>
	<td>Phone</td>
	<td>:</td>
	<td><input type="text" name="phone" id="emphone" size="30" class="textbox" /></td>
	<td width="10px" id="pho"></td>
</tr>
<tr>
	<td>Mobile</td>
	<td>:</td>
	<td><input type="text" name="mobile" id="emmobile" size="30" class="textbox" /></td>
	<td width="10px" id="mob"></td>
</tr>


<tr>
	<td>Website</td>
	<td>:</td>
	<td><input type="text" name="website" id="emwebsite" size="30" class="textbox" /></td>
	<td width="10px" id="web"></td>
</tr>

<tr>
	<td>Contact Person</td>
	<td>:</td>
	<td><input type="text" name="person" id="emperson" size="30" class="textbox" /></td>
	<td width="10px" id="per"></td>
</tr>

<tr>
	<td>Email</td>
	<td>:</td>
	<td><input type="text" name="email" id="ememail" size="30" class="textbox" /></td>
	<td width="10px" id="ema"></td>
</tr>

<tr>
	<td>Password</td>
	<td id="print">:</td>
	<td><input type="password" name="password" id="empassword" size="30" class="textbox" /></td>
</tr>

<tr>
	<td>Confirm Password</td>
	<td>:</td>
	<td><input type="password" name="passworda" id="empassworda" size="30" class="textbox" /></td>
	<td width="10px" id="pas"></td>
</tr>

<tr>
	<td colspan="3" align="center">
	<input type="hidden" name="ipaddress" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" />
	<input type="submit" name="employer" onclick="return validateEmp()" value="Register" class="fb5" /></td>
</tr>
</table>
</form>
<div align="right">
<h4><a href="index.php?msg=employer-login" style="text-decoration:none">Login Here</a></h4></div>
</body>
</html>
