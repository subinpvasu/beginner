<?php
session_start ();
include_once 'include/admin.php';
if ($_SESSION ['profile'] == 'true') {
	$pid = $_SESSION ['who'];
} else {
	backToindex ();
}
$sql = "SELECT * FROM personal_details WHERE id=" . $pid;
$result = mysql_query ( $sql );
$data = mysql_fetch_array ( $result );
?><p>&nbsp;</p>
<form method="post" action="controller_in.php" id="registerForm">
<table style="float:left;width:700px;padding-left:140px" onmouseover="doThese()" cellpadding="2">

	<tr>
		<td
			style="text-align: center; color: rgb(196, 22, 15); font-weight: bold; padding: 8px 0; text-transform: uppercase;"
			colspan="3">Personal Details</td>
	</tr>


	<tr>
		<td>Name</td>
		<td>:<input type="hidden" name="postage" value="true"/></td>
		<td><input type="text" class="textbox"
			onblur="allLetters(this.value,this.id,4)"
			onkeyup="allLetters(this.value,this.id,4)" name="name"
			value="<?php
			echo $data ['name'];
			?>" id="name" /></td>
		<td id="namer"><img  style="position:absolute" width="20px" height="10px" name="true" id="namep" src="images/right.gif"/></td>
	</tr>
<?php if($_SESSION['verification']!=true){?>
	<tr>
		<td>Marital Status</td>
		<td>:</td>
		<td>Unmarried<input type="radio"
			<?php
			if ($data ['marriage'] == 'U') {
				echo "checked";
			}
			?> name="marriage"
			value="U" /> Divorced<input
			<?php
			if ($data ['marriage'] == 'D') {
				echo "checked";
			}
			?> type="radio"
			name="marriage" value="D" /> Widowed<input type="radio"
			name="marriage" <?php
			if ($data ['marriage'] == 'W') {
				echo "checked";
			}
			?>
			value="W" />
			Seperated<input type="radio"
			name="marriage" <?php
			if ($data ['marriage'] == 'S') {
				echo "checked";
			}
			?>
			value="S" /></td>
		<td id=""></td>
	</tr>

	<tr>
		<td>Gender</td>
		<td>:</td>
		<td>VADHU<input type="radio"
			<?php
			if ($data ['gender'] == 'B') {
				echo "checked";
			}
			?> name="gender"
			value="B" />VARAN<input type="radio" name="gender" value="G"
			<?php
			if ($data ['gender'] == 'G') {
				echo "checked";
			}
			?> /></td>
		<td id=""><input type="hidden" id="dobshow"
			value="<?php
			echo $data ['dob']?>" /> <input type="hidden"
			id="rlgshow" value="<?php
			echo $data ['religion']?>" /> <input
			type="hidden" id="cstshow" value="<?php
			echo $data ['caste']?>" /></td>
	</tr>
	<!-- 14/05/1980 -->
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
$dt = $data ['dob'];
$kk = explode ( "/", $dt );
$l = $kk [2];
$k = date ( "Y" );
$opt = '<option value="year">Year</option>';
$begin = $k - 68;
$end = $k - 18;
for($i = $end; $i > $begin; $i --) {
	if ($i == $l) {
		$opt .= '<option selected value="' . $i . '">' . $i . '</option>';
	} else {
		$opt .= '<option value="' . $i . '">' . $i . '</option>';
	}
}
echo $opt;

?>
</select><input type="hidden" name="dob" id="dob" value="" /> <input
			type="hidden" name="ipaddress"
			value="<?php
			echo $_SERVER ['REMOTE_ADDR'];
			?>" />
			<input type="hidden" name="person" value="<?php echo $pid;?>" /></td>
		<td id="bod"></td>
	</tr>

	<tr>
		<td>Age</td>
		<td>:</td>
		<td><input type="hidden" name="age" id="age" value="" /> <input
			type="text" onfocus="displayAge()" onblur="displayAge()" id="seeage"
			class="textbox" value="<?php
			echo $data ['age'];
			?>" /></td>
		<td id="dateofbirth"><img  style="position:absolute" width="20px" height="10px" name="true" id="dateofbirthp" src="images/right.gif"/></td>
	</tr>

	<tr>
		<td>Religion</td>
		<td>:</td>
		<td><select class="select" name="religion" id="religion"
			onchange="populateCaste(this.value,'<?php echo $data['caste'];?>')">
			<option <?php if($data['religion']=='sele'){echo "selected";}?> value="sele">Select Religion</option>
			<option <?php if($data['religion']=='chri'){echo "selected";}?> value="chri">Christian</option>
			<option <?php if($data['religion']=='hind'){echo "selected";}?> value="hind">Hindu</option>
			<option <?php if($data['religion']=='inte'){echo "selected";}?> value="inte">Inter Caste</option>
			<option <?php if($data['religion']=='jain'){echo "selected";}?> value="jain">Jain</option>
			<option <?php if($data['religion']=='musl'){echo "selected";}?> value="musl">Muslim</option>
			<option <?php if($data['religion']=='sikh'){echo "selected";}?> value="sikh">Sikh</option>
			<option <?php if($data['religion']=='nore'){echo "selected";}?> value="nore">No Religion</option>
			<option <?php if($data['religion']=='othe'){echo "selected";}?> value="othe">Others</option>
		</select></td>
		<td id=""></td>
	</tr>

	<tr onmouseover="clearVar()">
		<td>Caste</td>
		<td>:</td>
		<td><select name="caste" id="caste" class="select">
			<option value="caste">Caste</option>
		</select></td>
		<td id="caster"><img  style="position:absolute" width="20px" height="10px" name="true" id="castep" src="images/right.gif"/></td>
	</tr>
<?php }
if($_SESSION['verification']==true)
{
?>
<tr>
		<td>Marital Status</td>
		<td>:</td>
		<td><?php  $data['marriage']=='U' ? print "Unmarried" :print "";
		   $data['marriage']=='D' ? print "Divorced" :print "";
		   $data['marriage']=='W' ? print "Widowed" :print "";?></td>
		<td id=""></td>
	</tr>

	<tr>
		<td>Gender</td>
		<td>:</td>
		<td><?php $data['gender']=='B'? print "VADHU": print "VARAN"; ?></td>
		<td id=""></td>
	</tr>
	<!-- 14/05/1980 -->
	<tr >
		<td>Date of Birth</td>
		<td>:</td>
		<td><?php echo $data['dob']; ?></td>
		<td id="bod"></td>
	</tr>

	<tr>
		<td>Age</td>
		<td>:</td>
		<td><?php echo $data['age']; ?></td>
		<td id="dateofbirth"><img  style="position:absolute" width="20px" height="10px" name="true" id="dateofbirthp" src="images/right.gif"/></td>
	</tr>

	<tr>
		<td>Religion</td>
		<td>:</td>
		<td><?php 
 if($data['religion']=='chri'){echo "Christian";}
 if($data['religion']=='hind'){echo "Hindu";}
 if($data['religion']=='inte'){echo "Inter Caste";}
 if($data['religion']=='jain'){echo "Jain";}
 if($data['religion']=='musl'){echo "Muslim";}
 if($data['religion']=='sikh'){echo "Sikh";}
 if($data['religion']=='nore'){echo "No Religion";}
 if($data['religion']=='othe'){echo "Others";}
 ?> </td>
		<td id="">
<input type="hidden" name="marriage" value="<?php echo $data['marriage']; ?>"/> 
<input type="hidden" name="gender" value="<?php echo $data['gender']; ?>"/>
<input type="hidden" name="dob" value="<?php echo $data['dob']; ?>"/>
<input type="hidden" name="age" value="<?php echo $data['age']; ?>"/>
<input type="hidden" name="religion" value="<?php echo $data['religion']; ?>"/>
<input type="hidden" name="caste" value="<?php echo $data['caste']; ?>"/>
<input type="hidden" name="person" value="<?php echo $pid;?>" />
		</td>
	</tr>

	<tr >
		<td>Caste</td>
		<td>:</td>
		<td><?php echo $data['caste']; ?></td>
		<td id="caster"><img  style="position:absolute" width="20px" height="10px" name="true" id="castep" src="images/right.gif"/></td>
	</tr>
<?php }?>
	<tr>
		<td>Present Address</td>
		<td>:</td>
		<td><textarea name="present"
			onblur="alphanumeric(this.value,this.id,20)"
			onkeyup="alphanumeric(this.value,this.id,20)" id="present"
			class="textarea"><?php
			echo $data ['present'];
			?></textarea></td>
		<td id="presentr"><img  style="position:absolute" width="20px" height="10px" name="true" id="presentp" src="images/right.gif"/></td>
	</tr>

	<tr>
		<td>Permanent Address</td>
		<td>:</td>
		<td><textarea name="address"
			onblur="alphanumeric(this.value,this.id,20)"
			onkeyup="alphanumeric(this.value,this.id,20)" id="address"
			class="textarea"><?php
			echo $data ['address'];
			?></textarea></td>
		<td id="addressr"><img  style="position:absolute" width="20px" height="10px" name="true" id="addressp" src="images/right.gif"/></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><input type="text" id="place"
			onblur="allLetters(this.value,this.id,4)"
			onkeyup="allLetters(this.value,this.id,4)" class="textbox"
			name="place" value="<?php
			echo $data ['place'];
			?>" /></td>
		<td id="placer"><img  style="position:absolute" width="20px" height="10px" name="true" id="placep" src="images/right.gif"/></td>
	</tr>

	<tr>
		<td>Pincode</td>
		<td>:</td>
		<td><input type="text" id="pincode"
			onblur="allNumbers(this.value,this.id,6)"
			onkeyup="allNumbers(this.value,this.id,6)" class="textbox"
			name="pincode" value="<?php
			echo $data ['pin'];
			?>" /></td>
		<td id="pincoder"><img  style="position:absolute" width="20px" height="10px" name="true" id="pincodep" src="images/right.gif"/></td>
	</tr>

	<tr>
		<td>City</td>
		<td>:</td>
		<td><input type="text" id="city"
			onblur="allLetters(this.value,this.id,4)"
			onkeyup="allLetters(this.value,this.id,4)" class="textbox"
			name="city" value="<?php
			echo $data ['city'];
			?>" /></td>
		<td id="cityr"><img  style="position:absolute" width="20px" height="10px" name="true" id="cityp" src="images/right.gif"/></td>
	</tr>

	<tr>
		<td>District</td>
		<td>:</td>
		<td><input type="text" id="district"
			onblur="allLetters(this.value,this.id,4)"
			onkeyup="allLetters(this.value,this.id,4)" class="textbox"
			name="district" value="<?php
			echo $data ['district'];
			?>" /></td>
		<td id="districtr"><img  style="position:absolute" width="20px" height="10px" name="true" id="districtp" src="images/right.gif"/></td>
	</tr>

	<tr>
		<td>State</td>
		<td>:</td>
		<td><input type="text" id="state"
			onblur="allLetters(this.value,this.id,3)"
			onkeyup="allLetters(this.value,this.id,3)" class="textbox"
			name="state" value="<?php
			echo $data ['state'];
			?>" /></td>
		<td id="stater"><img  style="position:absolute" width="20px" height="10px" name="true" id="statep" src="images/right.gif"/></td>
	</tr>

	<tr>
		<td>Country</td>
		<td>:</td>
		<td><input type="text" id="country"
			onblur="allLetters(this.value,this.id,3)"
			onkeyup="allLetters(this.value,this.id,3)" class="textbox"
			name="country" value="<?php
			echo $data ['country'];
			?>" /></td>
		<td id="countryr"><img  style="position:absolute" width="20px" height="10px" name="true" id="countryp" src="images/right.gif"/></td>
	</tr>

	<!-- <tr>
		<td>Email ID</td>
		<td>:</td>
		<td><input type="text" id="email"
			onkeyup="chkEmail(this.value,this.id)"
			onblur="chkEmail(this.value,this.id)" class="textbox" name="email"
			value="<?php
			echo $data ['email'];
			?>" /></td>
		<td id="emailr"></td>
	</tr>-->

	<tr>
		<td>LandLine</td>
		<td>:</td>
		<td><input type="text" id="landline"
			onblur="allNumbers(this.value,this.id,10)"
			onkeyup="allNumbers(this.value,this.id,10)" class="textbox"
			name="landline" value="<?php
			echo $data ['telephone'];
			?>" /></td>
		<td id="landliner"><img  style="position:absolute" width="20px" height="10px" name="true" id="landlinep" src="images/right.gif"/></td>
	</tr>

	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><input type="text" id="mobile"
			onblur="allNumbers(this.value,this.id,10)"
			onkeyup="allNumbers(this.value,this.id,10)" class="textbox"
			name="mobile" value="<?php
			echo $data ['mobile'];
			?>" /></td>
		<td id="mobiler"><img  style="position:absolute" width="20px" height="10px" name="true" id="mobilep" src="images/right.gif"/></td>
	</tr>


	<tr>
		<td colspan="3" align="center"><input type="button" class="button"
			name="registered" 
			value="Save Changes" onmouseover="doRest()"
			onclick="return verifyForm_acc()" /> <input type="hidden" name="register"
			value="Create Account Now" /></td>
	</tr>
	<tr>
		<td><input type="hidden" id="randomvar" value="0" /></td>
	</tr>

</table>
</form>