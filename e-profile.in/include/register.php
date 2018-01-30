<?php 
if (!isset($_SESSION['pin']) && !is_numeric($_SESSION['pin'])){
include_once 'include/functions.php';
?>
<h2 style="color:#AD1F35;padding-left:20px;">It's Fun.Begin Now...</h2>
<form method="post" action="execution.php">
<table style="width:70%;margin-top:30px;" cellspacing="5">

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><input type="text" name="name" class="textbox" /></td>
	</tr>
	<tr>
		<td>Create Username</td>
		<td>:</td>
		<td><input type="text" name="username" class="textbox" /></td>
	</tr>

	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="text" name="email" class="textbox" /></td>
	</tr>

	<tr>
		<td>Create Password</td>
		<td>:</td>
		<td><input type="password" name="password" class="textbox" /></td>
	</tr>

	<tr>
		<td>Confirm Password</td>
		<td>:</td>
		<td><input type="password" name="confirm" class="textbox" /></td>
	</tr>




	<tr>
		<td colspan="3" style="border-bottom: 1px solid red;"></td>

	</tr>

	<tr>
		<td>Gender</td>
		<td>:</td>
		<td><input type="radio" value="M" name="gender"/>Man<input type="radio" value="F" name="gender"/>Woman</td>
	</tr>

	<tr>
		<td>Date of Birth</td>
		<td>:</td>
		<td><?php echo registerBirthday();?></td>
	</tr>

<tr>
		<td>Marital Status</td>
		<td><select name="marital_status" style="border:1px solid #DEECF5;width:180px">
		<option value="single">Single</option>
		<option value="married">Married</option>
		<option value="divorced">Divorced</option>
		<option value="seperated">Seperated</option>
		<option value="other">Other</option>
		</select></td>
	</tr>

	<tr>
		<td>Country</td>
		<td>:</td>
		<td><?php echo listCountry();?></td>
	</tr>

	<tr>
		<td>State</td>
		<td>:</td>
		<td id="states">Not Applicable</td>
	</tr>

	<tr>
		<td>City</td>
		<td>:</td>
		<td><input type="text" name="city" class="textbox" /></td>
	</tr>

	<tr>
		<td colspan="3" style="border-top: 1px solid red;"></td>

	</tr>

	<tr>
		<td colspan="3" style="padding-left:160px;">
		<input type="hidden" name="address" value="<?php echo $_SERVER['REMOTE_ADDR'];?>"/>
		<input type="checkbox" name="terms" value="Y" /> Agreed Terms &amp; Conditions</td>
	</tr>

	<tr>
		<td colspan="3" style="padding-left:160px;">
		<input type="checkbox" name="advert" value="Y" /> Send me Advertisement mails &amp; Promotions</td>
	</tr>

	<tr>
		<td colspan="3" align="center"><input type="submit" name="profile"
			value="CREATE PROFILE" class="button" /></td>
	</tr>

</table>
</form>
<?php
}
?>