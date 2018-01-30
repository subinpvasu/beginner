<?php
session_start();
if($_SESSION['profile']=='true')
{
	header('Location:index.php');
}

?>
<form method="post" action="controller.php" id="registerForm">
<table align="center">

<tr>
<td style="text-align:center;color:rgb(196,22,15);font-weight: bold;padding:8px 0;text-transform:uppercase;" 
colspan="3">Register Here...</td>
</tr>

	
	<tr>
		<td>Name of Applicant</td>
		<td>:</td>
		<td><input type="text" class="textbox"
			onblur="allLetters(this.value,this.id,4)"
			onkeyup="allLetters(this.value,this.id,4)" name="name" value=""
			id="name" /></td>
		<td id="namer"></td>	</tr>
	
<tr>
		<td>Marital Status</td>
		<td>:</td>
		<td>Unmarried<input type="radio" checked="checked" name="marriage"
			value="U" /> Divorced<input type="radio" name="marriage" value="D" />
		Widowed<input type="radio" name="marriage" value="W" />Seperated<input type="radio" name="marriage" value="S" /></td>
		<td id=""></td>
	</tr>

	<tr>
		<td>Gender</td>
		<td>:</td>
		<td>VADHU<input type="radio" checked="checked" name="gender" value="B" />
		VARAN<input type="radio" name="gender" value="G" /></td>
		<td id=""></td>
	</tr>

	<tr onmouseover="clearVar()">
		<td>Date of Birth</td>
		<td>:</td>
		<td><select class="minisel" id="thedate">
			<option value="date">Date</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
		</select> <select class="minisel" id="themonth">
			<option value="month">Month</option>
			<option value="01">January</option>
			<option value="02">February</option>
			<option value="03">March</option>
			<option value="04">April</option>
			<option value="05">May</option>
			<option value="06">June</option>
			<option value="07">July</option>
			<option value="08">August</option>
			<option value="09">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select> <select class="minisel" id="theyear">
<?php
$k = date ( "Y" );
$opt = '<option value="year">Year</option>';
$begin = $k - 68;
$end = $k - 18;
for($i = $end; $i > $begin; $i --) {
	$opt .= '<option value="' . $i . '">' . $i . '</option>';
}
echo $opt;

?>
</select><input type="hidden" name="dob" id="dob" value="" /> <input
			type="hidden" name="ipaddress"
			value="<?php
			echo $_SERVER ['REMOTE_ADDR'];
			?>" /></td>
		<td id="bod"></td>
	</tr>

	<tr>
		<td>Age</td>
		<td>:</td>
		<td><input type="hidden" name="age" id="age" value="" /> <input
			type="text" onfocus="displayAge()" onblur="displayAge()" id="seeage"
			class="textbox" value="" /></td>
		<td id="dateofbirth"></td>
	</tr>

	<tr>
		<td>Religion</td>
		<td>:</td>
		<td><select class="select" name="religion" id="religion"
			onchange="populateCaste(this.value,' Select')">
			<option value="sele">Select Religion</option>
			<option value="chri">Christian</option>
			<option value="hind">Hindu</option>
			<option value="inte">Inter Caste</option>
			<option value="jain">Jain</option>
			<option value="musl">Muslim</option>
			<option value="sikh">Sikh</option>
			<option value="nore">No Religion</option>
			<option value="othe">Others</option>
		</select></td>
		<td id=""></td>
	</tr>

	<tr onmouseover="clearVar()">
		<td>Caste</td>
		<td>:</td>
		<td><select name="caste" id="caste" class="select" id="caste">
			<option value="caste">Caste</option>
		</select></td>
		<td id="caster"></td>
	</tr>

	<tr>
		<td>Present Address</td>
		<td>:</td>
		<td><textarea name="present"
			onblur="alphanumeric(this.value,this.id,20)"
			onkeyup="alphanumeric(this.value,this.id,20)" id="present"
			class="textarea"></textarea></td>
		<td id="presentr"></td>
	</tr>

	<tr>
		<td>Permanent Address</td>
		<td>:</td>
		<td><textarea name="address"
			onblur="alphanumeric(this.value,this.id,20)"
			onkeyup="alphanumeric(this.value,this.id,20)" id="address"
			class="textarea"></textarea></td>
		<td id="addressr"></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><input type="text" id="place"
			onblur="allLetters(this.value,this.id,4)"
			onkeyup="allLetters(this.value,this.id,4)" class="textbox"
			name="place" value="" /></td>
		<td id="placer"></td>
	</tr>

	<tr>
		<td>Pincode</td>
		<td>:</td>
		<td><input type="text" id="pincode"
			onblur="allNumbers(this.value,this.id,6)"
			onkeyup="allNumbers(this.value,this.id,6)" class="textbox"
			name="pincode" value="" /></td>
		<td id="pincoder"></td>
	</tr>

	<tr>
		<td>City</td>
		<td>:</td>
		<td><input type="text" id="city"
			onblur="allLetters(this.value,this.id,4)"
			onkeyup="allLetters(this.value,this.id,4)" class="textbox"
			name="city" value="" /></td>
		<td id="cityr"></td>
	</tr>

	<tr>
		<td>District</td>
		<td>:</td>
		<td><input type="text" id="district"
			onblur="allLetters(this.value,this.id,4)"
			onkeyup="allLetters(this.value,this.id,4)" class="textbox"
			name="district" value="" /></td>
		<td id="districtr"></td>
	</tr>

	<tr>
		<td>State</td>
		<td>:</td>
		<td><input type="text" id="state"
			onblur="allLetters(this.value,this.id,3)"
			onkeyup="allLetters(this.value,this.id,3)" class="textbox"
			name="state" value="" /></td>
		<td id="stater"></td>
	</tr>

	<tr>
		<td>Country</td>
		<td>:</td>
		<td><input type="text" id="country"
			onblur="allLetters(this.value,this.id,3)"
			onkeyup="allLetters(this.value,this.id,3)" class="textbox"
			name="country" value="" /></td>
		<td id="countryr"></td>
	</tr>

	<tr>
		<td>Email ID</td>
		<td>:</td>
		<td><input type="text" id="email"
			onkeyup="chkEmail(this.value,this.id)"
			onblur="chkEmail(this.value,this.id)" class="textbox" name="email"
			value="" /></td>
		<td id="emailr"></td>
	</tr>

	<tr>
		<td>LandLine</td>
		<td>:</td>
		<td><input type="text" id="landline"
			 class="textbox"
			name="landline" value="" /></td>
		<td id="landliner"></td>
	</tr>

	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><input type="text" id="mobile"
			onblur="allNumbers(this.value,this.id,10)"
			onkeyup="allNumbers(this.value,this.id,10)" class="textbox"
			name="mobile" value="" /></td>
		<td id="mobiler"></td>
	</tr>

	<tr>
		<td>Password</td>
		<td>:</td>
		<td><input type="password" id="password" class="textbox"
			name="password" onblur="chkPassword()" onkeyup="chkPassword()"
			value="" /></td>
		<td id="passwordr"></td>
	</tr>

	<tr>
		<td>Confirm Password</td>
		<td>:</td>
		<td><input type="password" onblur="chkPassword()"
			onkeyup="chkPassword()" id="confirm" class="textbox" name="confirm"
			value="" /></td>
		<td id="confirmr"></td>
	</tr>

	<tr>
		<td colspan="3" align="center">I Agree with your Terms &amp;
		Conditions <input type="checkbox" id="terms" name="terms" value="Y"
			checked /></td>
		<td id=""></td>
	</tr>

	<tr>
		<td colspan="3" align="center"><input type="button" class="button"
			name="registered" value="Create Account Now" onmouseover="doRest()"
			onclick="return verifyForm()" />
			<input type="hidden" name="register" value="Create Account Now" /></td>
	</tr>
	<tr>
		<td><input type="hidden" id="randomvar" value="0" /></td>
	</tr>
	<tr>
<td colspan="3" align="right" style="padding-top:25px">
<a href="index.php?msg=login" style="text-decoration:none;color:blue;font-weight:bold;">Login Now</a></td>

</tr>
</table>
</form>