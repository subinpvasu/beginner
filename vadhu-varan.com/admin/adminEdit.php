<?php
session_start();
include_once '../include/admin.php';
$sql = "SELECT * FROM personal_details ";
if($_GET['msg']=='dataform'){?>

<form method="post" action="admprocess.php"
	enctype="multipart/form-data">
<table align="center" cellspacing="3" cellpadding="3"
	style="color: #3F3FA6">
	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bolder; color: #C4160F; text-transform: uppercase; background-color: #FEB914">Create
		Profile Now</td>

	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Personal
		Details</td>

	</tr>

	<tr>
		<td>Marital Status</td>
		<td>:</td>
		<td>Unmarried<input type="radio" checked="checked" name="marriage"
			value="U" /> Divorced<input type="radio" name="marriage" value="D" />
		Widowed<input type="radio" name="marriage" value="W" /></td>
	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><input type="text" name="name" class="textbox" /></td>
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
		</select> <input type="hidden" id="dataentry" value="verygood" /> <select
			class="minisel" id="theyear">
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
</select><input type="hidden" name="dob" id="dobs" value="" /> <input
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
		<td><textarea name="present" class="textarea"></textarea></td>
	</tr>

	<tr>
		<td>Permanent Address</td>
		<td>:</td>
		<td><textarea name="address" class="textarea"></textarea></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><input type="text" name="place" class="textbox" /></td>
	</tr>

	<tr>
		<td>Pincode</td>
		<td>:</td>
		<td><input type="text" name="pincode" class="textbox" /></td>
	</tr>

	<tr>
		<td>City</td>
		<td>:</td>
		<td><input type="text" name="city" class="textbox" /></td>
	</tr>

	<tr>
		<td>District</td>
		<td>:</td>
		<td><input type="text" name="district" class="textbox" /></td>
	</tr>

	<tr>
		<td>State</td>
		<td>:</td>
		<td><input type="text" name="state" class="textbox" /></td>
	</tr>

	<tr>
		<td>Country</td>
		<td>:</td>
		<td><input type="text" name="country" class="textbox" /></td>
	</tr>

	<tr>
		<td>LandLine</td>
		<td>:</td>
		<td><input type="text" name="landline" class="textbox" /></td>
	</tr>

	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><input type="text" name="mobile" class="textbox" /></td>
	</tr>

	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="text" name="email" class="textbox" /></td>
	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Physical
		Details</td>

	</tr>

	<tr>
		<td>Body Type</td>
		<td>:</td>
		<td><select name="body" id="body" class="select">
			<option value="">--- Select ---</option>
			<option value="slim">Slim</option>
			<option value="average">Average</option>
			<option value="athletic">Athletic</option>
			<option value="heavy">Heavy</option>
		</select></td>
	</tr>

	<tr>
		<td>Height</td>
		<td>:</td>
		<td><select name="height" id="height" class="select" >
			<option value="0">--- Select ---</option>
			<option value="1">Less than 4' 5&quot; (1.35 mts)</option>
			<option value="2">4' 5&quot; (1.35 mts)</option>
			<option value="3">4' 6&quot; (1.37 mts)</option>
			<option value="4">4' 7&quot; (1.40 mts)</option>
			<option value="5">4' 8&quot; (1.42 mts)</option>
			<option value="6">4' 9&quot; (1.45 mts)</option>
			<option value="7">4' 10&quot; (1.47 mts)</option>
			<option value="8">4' 11&quot; (1.50 mts)</option>
			<option value="9">5' 0&quot; (1.52 mts)</option>
			<option value="10">5' 1&quot; (1.55 mts)</option>
			<option value="11">5' 2&quot; (1.58 mts)</option>
			<option value="12">5' 3&quot; (1.60 mts)</option>
			<option value="13">5' 4&quot; (1.63 mts)</option>
			<option value="14">5' 5&quot; (1.65 mts)</option>
			<option value="15">5' 6&quot; (1.68 mts)</option>
			<option value="16">5' 7&quot; (1.70 mts)</option>
			<option value="17">5' 8&quot; (1.73 mts)</option>
			<option value="18">5' 9&quot; (1.75 mts)</option>
			<option value="19">5' 10&quot; (1.78 mts)</option>
			<option value="20">5' 11&quot; (1.80 mts)</option>
			<option value="21">6' 0&quot; (1.83 mts)</option>
			<option value="22">6' 1&quot; (1.85 mts)</option>
			<option value="23">6' 2&quot; (1.88 mts)</option>
			<option value="24">6' 3&quot; (1.91 mts)</option>
			<option value="25">6' 4&quot; (1.93 mts)</option>
			<option value="26">6' 5&quot; (1.96 mts)</option>
			<option value="27">6' 6&quot; (1.98 mts)</option>
			<option value="28">6' 7&quot; (2.01 mts)</option>
			<option value="29">6' 8&quot; (2.03 mts)</option>
			<option value="30">6' 9&quot; (2.06 mts)</option>
			<option value="31">6' 10&quot; (2.08 mts)</option>
			<option value="32">6' 11&quot; (2.11 mts)</option>
			<option value="33">7' (2.13 mts)</option>
			<option value="34">Greater than 7' (2.13 mts)</option>
		</select></td>
	</tr>

	<tr>
		<td>Complexion</td>
		<td>:</td>
		<td><select name="colour" id="colour" class="select">
			<option value="">--- Select ---</option>
			<option value="fair">Fair</option>
			<option value="very fair">Very Fair</option>
			<option value="wheatish">Wheatish</option>
			<option value="wheatish brown">Wheatish Brown</option>
			<option value="dark">Dark</option>
			<option value="medium">Medium</option>
		</select></td>
	</tr>

	<tr>
		<td>Diet</td>
		<td>:</td>
		<td><select name="diet" id="diet" class="select">
			<option value="">--- Select ---</option>
			<option value="vegetarian">Vegetarian</option>
			<option value="eggatarian">Eggatarian</option>
			<option value="non vegetarian">Non Vegetarian</option>
			<option value="jain">Jain</option>
		</select></td>
	</tr>

	<tr>
		<td>Weight</td>
		<td>:</td>
		<td><input type="text" name="weight" class="textbox" /></td>
	</tr>

	<tr>
		<td>Health</td>
		<td>:</td>
		<td><input type="text" name="health" class="textbox" /></td>
	</tr>

	<tr>
		<td>Blood Group</td>
		<td>:</td>
		<td><input type="text" name="blood" class="textbox" /></td>
	</tr>

	<tr>
		<td>Physical Challenges</td>
		<td>:</td>
		<td>Yes<input type="radio" onchange="enableTextarea()"
			name="challenge" value="Y" /> No<input type="radio" name="challenge"
			<?php
			echo "checked";
			?> onchange="disableTextarea()" value="N" /></td>
		<td id="namer"></td>
	</tr>

	<tr id="rowdetails">

	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Education
		&amp; Job</td>

	</tr>

	<tr>
		<td>Highest Education</td>
		<td>:</td>
		<td><input type="text" name="education" class="textbox" /></td>
	</tr>

	<tr>
		<td>Institute</td>
		<td>:</td>
		<td><input type="text" name="institute" class="textbox" /></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><input type="text" name="edplace" class="textbox" /></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><input type="text" name="edduration" class="textbox" /></td>
	</tr>

	<tr>
		<td>Present Employer</td>
		<td>:</td>
		<td><input type="text" name="employer" class="textbox" /></td>
	</tr>

	<tr>
		<td>Designation</td>
		<td>:</td>
		<td><input type="text" name="designation" class="textbox" /></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><input type="text" name="preduration" class="textbox" /></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><input type="text" name="location" class="textbox" /></td>
	</tr>

	<tr>
		<td>Previous Employer</td>
		<td>:</td>
		<td><input type="text" name="ememployer" class="textbox" /></td>
	</tr>

	<tr>
		<td>Location</td>
		<td>:</td>
		<td><input type="text" name="emplace" class="textbox" /></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><input type="text" name="emduration" class="textbox" /></td>
	</tr>

	<tr>
		<td>Salary</td>
		<td>:</td>
		<td><input type="text" name="salary" class="textbox" /></td>
	</tr>

	<tr>
		<td>Family Income</td>
		<td>:</td>
		<td><input type="text" name="income" class="textbox" /></td>
	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Family
		Details</td>

	</tr>

	<tr>
		<td>Total Members</td>
		<td>:</td>
		<td><input type="text" name="total" class="textbox" /></td>
	</tr>

	<tr>
		<td>Name of Father</td>
		<td>:</td>
		<td><input type="text" name="father" class="textbox" /></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><input type="text" name="fjob" class="textbox" /></td>
	</tr>

	<tr>
		<td>Name of Mother</td>
		<td>:</td>
		<td><input type="text" name="mother" class="textbox" /></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><input type="text" name="mjob" class="textbox" /></td>
	</tr>

	<tr>
		<td>No of Brothers</td>
		<td>:</td>
		<td><input type="text" name="brother" class="textbox" /></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><input type="text" name="mar_bro" class="textbox" /></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><input type="text" name="unmar_bro" class="textbox" /></td>
	</tr>

	<tr>
		<td>No of Sisters</td>
		<td>:</td>
		<td><input type="text" name="sister" class="textbox" /></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><input type="text" name="mar_sis" class="textbox" /></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><input type="text" name="unmar_sis" class="textbox" /></td>
	</tr>

	<tr>
		<td>Other Details</td>
		<td>:</td>
		<td><textarea name="family_details" class="textarea"></textarea></td>
	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Horoscope</td>

	</tr>

	<tr>
		<td>Birth Star</td>
		<td>:</td>
		<td><input type="text" name="star" class="textbox" /></td>
	</tr>

	<tr>
		<td>Date of Birth (Malayalam)</td>
		<td>:</td>
		<td><input type="text" name="mdob" class="textbox" /></td>
	</tr>

	<tr>
		<td>Time of Birth</td>
		<td>:</td>
		<td><input type="text" name="tob" class="textbox" /></td>
	</tr>

	<tr>
		<td>Place of Birth</td>
		<td>:</td>
		<td><input type="text" name="pob" class="textbox" /></td>
	</tr>

	<tr>
		<td>Rasi</td>
		<td>:</td>
		<td><input type="text" name="rasi" class="textbox" /></td>
	</tr>

	<tr>
		<td>Janma Sista Dasa</td>
		<td>:</td>
		<td><input type="text" name="sista" class="textbox" /></td>
	</tr>

	<tr>
		<td>Janma Sista Dasa End</td>
		<td>:</td>
		<td><input type="text" name="sista_end" class="textbox" /></td>
	</tr>

	<tr>
		<td>Horoscope</td>
		<td>:</td>
		<td><input type="file" name="horoscope" class="textbox" /></td>
	</tr>
	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase;">or</td>
	</tr>
	<tr>
		<td>
		<table>
			<tr>
				<td><input name="horo1" class="horobox" type="text" id="horo1"
					size="5" value="" /></td>
				<td><input name="horo2" class="horobox" type="text" id="horo2"
					size="5" value="" /></td>
				<td><input name="horo3" class="horobox" type="text" id="horo3"
					size="5" value="" /></td>
				<td><input name="horo4" class="horobox" type="text" id="horo4"
					size="5" value="" /></td>
			</tr>
			<tr>
				<td><input name="horo5" class="horobox" type="text" id="horo5"
					size="5" value="" /></td>
				<td
					style="text-align: center; background-color: #FEB914; font-weight: bold"
					rowspan="2" colspan="2">Rasi Grahanila</td>
				<td><input name="horo6" class="horobox" type="text" id="horo6"
					size="5" value="" /></td>
			</tr>
			<tr>
				<td><input name="horo7" class="horobox" type="text" id="horo7"
					size="5" value="" /></td>
				<td><input name="horo8" class="horobox" type="text" id="horo8"
					size="5" value="" /></td>
			</tr>
			<tr>
				<td><input name="horo9" class="horobox" type="text" id="horo9"
					size="5" value="" /></td>
				<td><input name="horo10" class="horobox" type="text" id="horo10"
					size="5" value="" /></td>
				<td><input name="horo11" class="horobox" type="text" id="horo11"
					size="5" value="" /></td>
				<td><input name="horo12" class="horobox" type="text" id="horo12"
					size="5" value="" /></td>
			</tr>
		</table>

		</td>
		<td width="20px"></td>
		<td>

		<table>
			<tr>
				<td><input name="horo13" class="horobox" type="text" id="horo13"
					size="5" value="" /></td>
				<td><input name="horo14" class="horobox" type="text" id="horo14"
					size="5" value="" /></td>
				<td><input name="horo15" class="horobox" type="text" id="horo16"
					size="5" value="" /></td>
				<td><input name="horo16" class="horobox" type="text" id="horo16"
					size="5" value="" /></td>
			</tr>
			<tr>
				<td><input name="horo17" class="horobox" type="text" id="horo17"
					size="5" value="" /></td>
				<td
					style="text-align: center; background-color: #FEB914; font-weight: bold"
					rowspan="2" colspan="2">Navamsakam</td>
				<td><input name="horo18" class="horobox" type="text" id="horo18"
					size="5" value="" /></td>
			</tr>
			<tr>
				<td><input name="horo19" class="horobox" type="text" id="horo19"
					size="5" value="" /></td>
				<td><input name="horo20" class="horobox" type="text" id="horo20"
					size="5" value="" /></td>
			</tr>
			<tr>
				<td><input name="horo21" class="horobox" type="text" id="horo21"
					size="5" value="" /></td>
				<td><input name="horo22" class="horobox" type="text" id="horo22"
					size="5" value="" /></td>
				<td><input name="horo23" class="horobox" type="text" id="horo23"
					size="5" value="" /></td>
				<td><input name="horo24" class="horobox" type="text" id="horo24"
					size="5" value="" /></td>
			</tr>
		</table>

		</td>
	</tr>
	<tr>
		<td>Other Details</td>
		<td>:</td>
		<td><textarea name="horo_details" class="textarea"></textarea></td>
	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Other
		Details <input type="hidden" name="user"
			value="ADMINISTRATOR" /> <input type="hidden"
			name="userip" value="<?php
			echo $_SERVER ['REMOTE_ADDR'];
			?>" /></td>

	</tr>

	<tr>
		<td>Expectation About Life Partner</td>
		<td>:</td>
		<td><textarea name="expectation" class="textarea"></textarea></td>
	</tr>

	<tr>
		<td>Profile Picture</td>
		<td>:</td>
		<td><input type="file" name="picture" class="textbox" /></td>
	</tr>

	<tr>
		<td>Registered By</td>
		<td>:</td>
		<td><select name="register" class="select">
			<option value="">--Select--</option>
			<option value="father">Father</option>
			<option value="mother">Mother</option>
			<option value="brother">Brother</option>
			<option value="sister">Sister</option>
			<option value="friend">Friend</option>
			<option value="relative">Relative</option>
			<option value="myself">Myself</option>
			<option value="cousin">Cousin</option>
		</select></td>
	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><input type="text" name="reg_name" class="textbox" /></td>
	</tr>

	<tr>
		<td>Number</td>
		<td>:</td>
		<td><input type="text" name="reg_number" class="textbox" /></td>
	</tr>

	<tr>
		<td colspan="3" align="center"><input type="submit" name="adminprofile"
			value="Submit" class="button" /></td>

	</tr>


</table>
</form><?php }
if($_GET['msg']=='dataformsed'){
	$id = $_GET['id'];
	$_SESSION['whose'] = $id;
	

$sql = "SELECT * FROM  personal_details LEFT JOIN physical_details ON personal_details.id=physical_details.person_id LEFT JOIN family ON personal_details.id=family.person_id LEFT JOIN horoscope ON personal_details.id=horoscope.person_id LEFT JOIN other ON personal_details.id=other.person_id LEFT JOIN qualification ON personal_details.id=qualification.person_id WHERE personal_details.id=".$id;
$result = mysql_query($sql) or die(mysql_error());
while($data = mysql_fetch_array($result))
{
	?>
<style type="text/css">
#horoone td {
	height: 35px;
	width: 80px;
	border: 2px solid #C4160F;
	text-align: center;
}

#horotwo td {
	height: 35px;
	width: 80px;
	border: 2px solid #C4160F;
	text-align: center;
}
</style>

<form method="post" action="admprocess.php"
	enctype="multipart/form-data">
<table align="center" cellspacing="3" cellpadding="3"
	style="color: #3F3FA6" onmouseover="doThose()">
	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bolder; color: #C4160F; text-transform: uppercase; background-color: #FEB914">edit
		Profile Now</td>

	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Personal
		Details<input type="hidden" value="<?php echo $_SESSION['whose']?>" /></td>

	</tr>

	<tr>
		<td>Marital Status</td>
		<td>:<input type="hidden" id="report" value="0"/></td>
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
			value="W" /></td>
	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><input type="text" name="name" class="textbox" value="<?php echo $data[2]; ?>" /></td>
	</tr>

	<tr >
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
			echo $data [4]?>" /> <input type="hidden"
			id="rlgshow" value="<?php
			echo $data ['religion']?>" /> <input
			type="hidden" id="cstshow" value="<?php
			echo $data ['caste']?>" /></td>
	</tr>
<?php 
$dt = $data [4];
$kk = explode ( "/", $dt );

?>
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
</select><input type="hidden" name="dobs" id="dobs" value="<?php echo $data [4]?>" /> 
<input type="hidden" name="ddsfdsf" id="dataentry" value="verygood" /></td>
		<td id="bod"></td>
	</tr>

	<tr>
		<td>Age</td>
		<td>:</td>
		<td><input type="hidden" name="age" id="age" value="<?php echo $data ['age']; ?>" /> <input
			type="text" onfocus="displayAge()" onblur="displayAge()" id="seeage"
			class="textbox" value="<?php echo $data ['age']; ?>" /></td>
		<td id="dateofbirth"></td>
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
		<td><select name="caste" id="caste" class="select" id="caste">
			<option value="caste">Caste</option>
		</select></td>
		<td id="caster"></td>
	</tr>

	<tr>
		<td>Present Address</td>
		<td>:</td>
		<td><textarea name="present" class="textarea"><?php
			echo $data ['present'];
			?></textarea></td>
	</tr>

	<tr>
		<td>Permanent Address</td>
		<td>:</td>
		<td><textarea name="address" class="textarea"><?php
			echo $data ['address'];
			?></textarea></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><input type="text" name="place" class="textbox"  value="<?php
			echo $data [10];
			?>" /></td>
	</tr>

	<tr>
		<td>Pincode</td>
		<td>:</td>
		<td><input type="text" name="pincode" class="textbox" value="<?php
			echo $data ['pin'];
			?>"/></td>
	</tr>

	<tr>
		<td>City</td>
		<td>:</td>
		<td><input type="text" name="city" class="textbox" value="<?php
			echo $data ['city'];
			?>"/></td>
	</tr>

	<tr>
		<td>District</td>
		<td>:</td>
		<td><input type="text" name="district" class="textbox" value="<?php
			echo $data ['district'];
			?>"/></td>
	</tr>

	<tr>
		<td>State</td>
		<td>:</td>
		<td><input type="text" name="state" class="textbox" value="<?php
			echo $data ['state'];
			?>"/></td>
	</tr>

	<tr>
		<td>Country</td>
		<td>:</td>
		<td><input type="text" name="country" class="textbox" value="<?php
			echo $data ['country'];
			?>"/></td>
	</tr>

	<tr>
		<td>LandLine</td>
		<td>:</td>
		<td><input type="text" name="landline" class="textbox" value="<?php
			echo $data ['telephone'];
			?>"/></td>
	</tr>

	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><input type="text" name="mobile" class="textbox" value="<?php
			echo $data ['mobile'];
			?>"/></td>
	</tr>

	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="text" name="email" class="textbox" value="<?php
			echo $data ['email'];
			?>"/></td>
	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Physical
		Details</td>

	</tr>

	<tr>
		<td>Body Type</td>
		<td>:</td>
		<td><select name="body" id="body" class="select">
			<option
				<?php
				if ($data ['body'] == '') {
					echo "selected";
				}
				?>
				value="">--- Select ---</option>
			<option
				<?php
				if ($data ['body'] == 'slim') {
					echo "selected";
				}
				?>
				value="slim">Slim</option>
			<option
				<?php
				if ($data ['body'] == 'average') {
					echo "selected";
				}
				?>
				value="average">Average</option>
			<option
				<?php
				if ($data ['body'] == 'athletic') {
					echo "selected";
				}
				?>
				value="athletic">Athletic</option>
			<option
				<?php
				if ($data ['body'] == 'heavy') {
					echo "selected";
				}
				?>
				value="heavy">Heavy</option>
		</select> <input type="hidden" name="dbheight" id="dbheight"
			value="<?php
			echo $data ['height'];
			?>" />
		</td>
	</tr>

	<tr onmouseover="doItnow()">
		<td>Height</td>
		<td>:</td>
		<td><select name="height" id="height" class="select" >
			<option value="0">--- Select ---</option>
			<option value="1">Less than 4' 5&quot; (1.35 mts)</option>
			<option value="2">4' 5&quot; (1.35 mts)</option>
			<option value="3">4' 6&quot; (1.37 mts)</option>
			<option value="4">4' 7&quot; (1.40 mts)</option>
			<option value="5">4' 8&quot; (1.42 mts)</option>
			<option value="6">4' 9&quot; (1.45 mts)</option>
			<option value="7">4' 10&quot; (1.47 mts)</option>
			<option value="8">4' 11&quot; (1.50 mts)</option>
			<option value="9">5' 0&quot; (1.52 mts)</option>
			<option value="10">5' 1&quot; (1.55 mts)</option>
			<option value="11">5' 2&quot; (1.58 mts)</option>
			<option value="12">5' 3&quot; (1.60 mts)</option>
			<option value="13">5' 4&quot; (1.63 mts)</option>
			<option value="14">5' 5&quot; (1.65 mts)</option>
			<option value="15">5' 6&quot; (1.68 mts)</option>
			<option value="16">5' 7&quot; (1.70 mts)</option>
			<option value="17">5' 8&quot; (1.73 mts)</option>
			<option value="18">5' 9&quot; (1.75 mts)</option>
			<option value="19">5' 10&quot; (1.78 mts)</option>
			<option value="20">5' 11&quot; (1.80 mts)</option>
			<option value="21">6' 0&quot; (1.83 mts)</option>
			<option value="22">6' 1&quot; (1.85 mts)</option>
			<option value="23">6' 2&quot; (1.88 mts)</option>
			<option value="24">6' 3&quot; (1.91 mts)</option>
			<option value="25">6' 4&quot; (1.93 mts)</option>
			<option value="26">6' 5&quot; (1.96 mts)</option>
			<option value="27">6' 6&quot; (1.98 mts)</option>
			<option value="28">6' 7&quot; (2.01 mts)</option>
			<option value="29">6' 8&quot; (2.03 mts)</option>
			<option value="30">6' 9&quot; (2.06 mts)</option>
			<option value="31">6' 10&quot; (2.08 mts)</option>
			<option value="32">6' 11&quot; (2.11 mts)</option>
			<option value="33">7' (2.13 mts)</option>
			<option value="34">Greater than 7' (2.13 mts)</option>
		</select></td>
	</tr>

	<tr>
		<td>Complexion</td>
		<td>:</td>
		<td><select name="colour" id="colour" class="select">
			<option
				<?php
				if ($data ['complexion'] == '') {
					echo "selected";
				}
				?>
				value="">--- Select ---</option>
			<option
				<?php
				if ($data ['complexion'] == 'fair') {
					echo "selected";
				}
				?>
				value="fair">Fair</option>
			<option
				<?php
				if ($data ['complexion'] == 'very fair') {
					echo "selected";
				}
				?>
				value="very fair">Very Fair</option>
			<option
				<?php
				if ($data ['complexion'] == 'wheatish') {
					echo "selected";
				}
				?>
				value="wheatish">Wheatish</option>
			<option
				<?php
				if ($data ['complexion'] == 'wheatish brown') {
					echo "selected";
				}
				?>
				value="wheatish brown">Wheatish Brown</option>
			<option
				<?php
				if ($data ['complexion'] == 'dark') {
					echo "selected";
				}
				?>
				value="dark">Dark</option>
			<option
				<?php
				if ($data ['complexion'] == 'medium') {
					echo "selected";
				}
				?>
				value="medium">Medium</option>
		</select></td>
	</tr>

	<tr>
		<td>Diet</td>
		<td>:</td>
		<td><select name="diet" id="diet" class="select">
			<option
				<?php
				if ($data ['diet'] == '') {
					echo "selected";
				}
				?>
				value="">--- Select ---</option>
			<option
				<?php
				if ($data ['diet'] == 'vegetarian') {
					echo "selected";
				}
				?>
				value="vegetarian">Vegetarian</option>
			<option
				<?php
				if ($data ['diet'] == 'eggatarian') {
					echo "selected";
				}
				?>
				value="eggatarian">Eggatarian</option>
			<option
				<?php
				if ($data ['diet'] == 'non vegetarian') {
					echo "selected";
				}
				?>
				value="non vegetarian">Non Vegetarian</option>
			<option
				<?php
				if ($data ['diet'] == 'jain') {
					echo "selected";
				}
				?>
				value="jain">Jain</option>
		</select></td>
	</tr>

	<tr>
		<td>Weight</td>
		<td>:</td>
		<td><input type="text" name="weight" class="textbox" value="<?php
			echo $data ['health'];
			?>"/></td>
	</tr>

	<tr>
		<td>Health</td>
		<td>:</td>
		<td><input type="text" name="health" class="textbox" value="<?php
			echo $data ['weight'];
			?>"/></td>
	</tr>

	<tr>
		<td>Blood Group</td>
		<td>:</td>
		<td><input type="text" name="blood" class="textbox" value="<?php
			echo $data ['blood'];
			?>"/></td>
	</tr>

	<tr>
		<td>Physical Challenges</td>
		<td>:<input type="hidden" id="disabl"
			value="<?php
			echo $data ['disability'];
			?>" /></td>
		<td>Yes<input type="radio" onchange="enableTextarea()"
			name="challenge"
			<?php
			if ($data ['disability'] == 'Y') {
				echo "checked";
			}
			?>
			value="Y" /> No<input type="radio"
			<?php
			if ($data ['disability'] == 'N') {
				echo "checked";
			}
			?>
			name="challenge" onchange="disableTextarea()" value="N" /></td>
		<td id="namer"></td>
	</tr>

	<tr id="rowdetails">

	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Education
		&amp; Job</td>

	</tr>

	<tr>
		<td>Highest Education</td>
		<td>:</td>
		<td><input type="text" name="education" class="textbox" value="<?php echo $data['education'] ?>"/></td>
	</tr>

	<tr>
		<td>Institute</td>
		<td>:</td>
		<td><input type="text" name="institute" class="textbox" value="<?php echo $data['institute'] ?>"/></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><input type="text" name="edplace" class="textbox" value="<?php echo $data['place'] ?>"/></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><input type="text" name="edduration" class="textbox" value="<?php echo $data['period'] ?>"/></td>
	</tr>

	<tr>
		<td>Present Employer</td>
		<td>:</td>
		<td><input type="text" name="employer" class="textbox" value="<?php echo $data['employer'] ?>"/></td>
	</tr>

	<tr>
		<td>Designation</td>
		<td>:</td>
		<td><input type="text" name="designation" class="textbox" value="<?php echo $data['designation'] ?>"/></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><input type="text" name="preduration" class="textbox" value="<?php echo $data['duration'] ?>"/></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><input type="text" name="location" class="textbox" value="<?php echo $data['location'] ?>"/></td>
	</tr>

	<tr>
		<td>Previous Employer</td>
		<td>:</td>
		<td><input type="text" name="ememployer" class="textbox" value="<?php echo $data['last_employer'] ?>"/></td>
	</tr>

	<tr>
		<td>Location</td>
		<td>:</td>
		<td><input type="text" name="emplace" class="textbox" value="<?php echo $data['last_location'] ?>"/></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><input type="text" name="emduration" class="textbox" value="<?php echo $data['last_duration'] ?>"/></td>
	</tr>

	<tr>
		<td>Salary</td>
		<td>:</td>
		<td><input type="text" name="salary" class="textbox" value="<?php echo $data['salary'] ?>"/></td>
	</tr>

	<tr>
		<td>Family Income</td>
		<td>:</td>
		<td><input type="text" name="income" class="textbox" value="<?php echo $data['income'] ?>"/></td>
	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Family
		Details</td>

	</tr>

	<tr>
		<td>Total Members</td>
		<td>:</td>
		<td><input type="text" name="total" class="textbox" value="<?php
			echo $data ['total']?>"/></td>
	</tr>

	<tr>
		<td>Name of Father</td>
		<td>:</td>
		<td><input type="text" name="father" class="textbox" value="<?php
			echo $data ['father']?>"/></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><input type="text" name="fjob" class="textbox" value="<?php
			echo $data ['fjob']?>"/></td>
	</tr>

	<tr>
		<td>Name of Mother</td>
		<td>:</td>
		<td><input type="text" name="mother" class="textbox" value="<?php
			echo $data ['mother']?>"/></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><input type="text" name="mjob" class="textbox" value="<?php
			echo $data ['mjob']?>"/></td>
	</tr>

	<tr>
		<td>No of Brothers</td>
		<td>:</td>
		<td><input type="text" name="brother" class="textbox" value="<?php
			echo $data ['brother']?>"/></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><input type="text" name="mar_bro" class="textbox" value="<?php
			echo $data ['bmarried']?>"/></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><input type="text" name="unmar_bro" class="textbox" value="<?php
			echo $data ['bunmarried']?>"/></td>
	</tr>

	<tr>
		<td>No of Sisters</td>
		<td>:</td>
		<td><input type="text" name="sister" class="textbox" value="<?php
			echo $data ['sister']?>"/></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><input type="text" name="mar_sis" class="textbox" value="<?php
			echo $data ['smarried']?>"/></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><input type="text" name="unmar_sis" class="textbox" value="<?php
			echo $data ['sunmarried']?>"/></td>
	</tr>

	<tr>
		<td>Other Details</td>
		<td>:</td>
		<td><textarea name="family_details" class="textarea"><?php
			echo $data ['otherz']?></textarea></td>
	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Horoscope</td>

	</tr>

	<tr>
		<td>Birth Star</td>
		<td>:</td>
		<td><input type="text" name="star" class="textbox" value="<?php
			echo $data ['star']?>"/></td>
	</tr>

	<tr>
		<td>Date of Birth (Malayalam)</td>
		<td>:</td>
		<td><input type="text" name="mdob" class="textbox" value="<?php
			echo $data ['dob']?>"/></td>
	</tr>

	<tr>
		<td>Time of Birth</td>
		<td>:</td>
		<td><input type="text" name="tob" class="textbox" value="<?php
			echo $data ['tob']?>"/></td>
	</tr>

	<tr>
		<td>Place of Birth</td>
		<td>:</td>
		<td><input type="text" name="pob" class="textbox" value="<?php
			echo $data ['pob']?>"/></td>
	</tr>

	<tr>
		<td>Rasi</td>
		<td>:</td>
		<td><input type="text" name="rasi" class="textbox" value="<?php
			echo $data ['rasi']?>"/></td>
	</tr>

	<tr>
		<td>Janma Sista Dasa</td>
		<td>:</td>
		<td><input type="text" name="sista" class="textbox" value="<?php
			echo $data ['sista_dasa']?>"/></td>
	</tr>

	<tr>
		<td>Janma Sista Dasa End</td>
		<td>:</td>
		<td><input type="text" name="sista_end" class="textbox" value="<?php
			echo $data ['dasa_end']?>"/></td>
	</tr>

	<tr>
		<td>Horoscope</td>
		<td>:</td>
		<td>
		<?php if(empty($data['horo'])){?>
		<a href="javascript:void openHoroad('imghoro')" id="imghoro" onmousemove="show('jathakam')" onmouseout="hide('jathakam')">
		<img  src="../images/horo.PNG" width="100px" height="100px">
		<input type="hidden" value="<?php echo $data['horo'];?>" name="photo-imghoro"/></a>
		<?php }
		else
		{?>
		<a href="javascript:void openHoroad('imghoro')" id="imghoro" onmousemove="show('jathakam')" onmouseout="hide('jathakam')">
		<img src="../upload/<?php echo $data['horo']?>" width="100px" height="100px">
		<input type="hidden" value="<?php echo $data['horo']?>" name="photo-imghoro"/></a>
		<?php }?>
		
		
		
		
		<div style="visibility:hidden;width:500px;height:500px;position:absolute;left:500px;" id="jathakam" onclick="openHoroad('imghoro')">
		<?php if(empty($data['horo'])){?>
		<img  src="../images/horo.PNG" width="490px" height="490px" >
		<?php }else{?>
		<img src="../upload/<?php echo $data['horo']?>" width="490px" height="490px"/>      
		<?php }?>
		</div>
		
		
		</td>
	</tr>
	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase;">or</td>
	</tr>
	<tr>
<?php 
$horoarray = $data['horobox'];
$horoarray = explode("|",$horoarray);



?>
		<td>

		<table>
			<tr>
				<td><input name="horo1" class="horobox" type="text" id="horo1"
					size="5" value="<?php
					echo $horoarray[0];?>" /></td>
				<td><input name="horo2" class="horobox" type="text" id="horo2"
					size="5" value="<?php
					echo $horoarray[1];?>" /></td>
				<td><input name="horo3" class="horobox" type="text" id="horo3"
					size="5" value="<?php
					echo $horoarray[2];?>" /></td>
				<td><input name="horo4" class="horobox" type="text" id="horo4"
					size="5" value="<?php
					echo $horoarray[3];?>" /></td>
			</tr>
			<tr>
				<td><input name="horo5" class="horobox" type="text" id="horo5"
					size="5" value="<?php
					echo $horoarray[4];?>" /></td>
				<td
					style="text-align: center; background-color: #FEB914; font-weight: bold"
					rowspan="2" colspan="2">Rasi Grahanila</td>
				<td><input name="horo6" class="horobox" type="text" id="horo6"
					size="5" value="<?php
					echo $horoarray[5];?>" /></td>
			</tr>
			<tr>
				<td><input name="horo7" class="horobox" type="text" id="horo7"
					size="5" value="<?php
					echo $horoarray[6];?>" /></td>
				<td><input name="horo8" class="horobox" type="text" id="horo8"
					size="5" value="<?php
					echo $horoarray[7];?>" /></td>
			</tr>
			<tr>
				<td><input name="horo9" class="horobox" type="text" id="horo9"
					size="5" value="<?php
					echo $horoarray[8];?>" /></td>
				<td><input name="horo10" class="horobox" type="text" id="horo10"
					size="5" value="<?php
					echo $horoarray[9];?>" /></td>
				<td><input name="horo11" class="horobox" type="text" id="horo11"
					size="5" value="<?php
					echo $horoarray[10];?>" /></td>
				<td><input name="horo12" class="horobox" type="text" id="horo12"
					size="5" value="<?php
					echo $horoarray[11];?>" /></td>
			</tr>
		</table>

		</td>
		<td width="20px"></td>
		<td>

		<table>
			<tr>
				<td><input name="horo13" class="horobox" type="text" id="horo13"
					size="5" value="<?php
					echo $horoarray[12];?>" /></td>
				<td><input name="horo14" class="horobox" type="text" id="horo14"
					size="5" value="<?php
					echo $horoarray[13];?>" /></td>
				<td><input name="horo15" class="horobox" type="text" id="horo16"
					size="5" value="<?php
					echo $horoarray[14];?>" /></td>
				<td><input name="horo16" class="horobox" type="text" id="horo16"
					size="5" value="<?php
					echo $horoarray[15];?>" /></td>
			</tr>
			<tr>
				<td><input name="horo17" class="horobox" type="text" id="horo17"
					size="5" value="<?php
					echo $horoarray[16];?>" /></td>
				<td
					style="text-align: center; background-color: #FEB914; font-weight: bold"
					rowspan="2" colspan="2">Navamsakam</td>
				<td><input name="horo18" class="horobox" type="text" id="horo18"
					size="5" value="<?php
					echo $horoarray[17];?>" /></td>
			</tr>
			<tr>
				<td><input name="horo19" class="horobox" type="text" id="horo19"
					size="5" value="<?php
					echo $horoarray[18];?>" /></td>
				<td><input name="horo20" class="horobox" type="text" id="horo20"
					size="5" value="<?php
					echo $horoarray[19];?>" /></td>
			</tr>
			<tr>
				<td><input name="horo21" class="horobox" type="text" id="horo21"
					size="5" value="<?php
					echo $horoarray[20];?>" /></td>
				<td><input name="horo22" class="horobox" type="text" id="horo22"
					size="5" value="<?php
					echo $horoarray[21];?>" /></td>
				<td><input name="horo23" class="horobox" type="text" id="horo23"
					size="5" value="<?php
					echo $horoarray[22];?>" /></td>
				<td><input name="horo24" class="horobox" type="text" id="horo24"
					size="5" value="<?php
					echo $horoarray[23];?>" /></td>
			</tr>
		</table>


		</td>

	</tr>
	
	<tr>
	<td style="padding-left:135px">Other Details</td>
	<td>:</td>
	<td><textarea class="textarea" name="otherhoro"><?php echo $data['other'];?></textarea></td>
	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Other
		Details </td>

	</tr>

	<tr>
		<td>Expectation About Life Partner</td>
		<td>:</td>
		<td><textarea name="expectation" class="textarea"><?php
		echo $data ['partner']?></textarea></td>
	</tr>

	<?php
$sqlz = "SELECT gender FROM personal_details WHERE id=" . $id;
$resultz = mysql_query ( $sqlz );
$dataz = mysql_fetch_array ( $resultz );
if ($dataz ['gender'] == 'B') {
	?>
<tr>
		<td align="center" colspan="3" style="padding: 20px;">
<?php
	if (empty ( $data ['photos'] )) {
		?>
<a href="javascript:void openUploadad('sideleft')"
			style="margin: 0 50px 0 0px" id="sideleft"> <img
			src="../images/girl.png"></a>
<?php
	} else {
		?>
<a href="javascript:void openUploadad('sideleft')"
			style="margin: 0 50px 0 0px" id="sideleft" onmousemove="show('checkleft')"
			onmouseout="hide('checkleft')"> <img
			src="../upload/<?php
		echo $data ['photos'];
		?>" height="106px"
			width="73px" > <input type="hidden"
			name="photo-sideleft" value="<?php
		echo $data ['photos']?>" /> </a>
<?php
	}
	if (empty ( $data ['photou'] )) {
		?>
<a href="javascript:void openUploadad('proimg')" style="margin: 0 50px"
			id="proimg"> <img src="../images/girl.png"></a><!-- pro img -->
<?php
	} else {
		?>
<a href="javascript:void openUploadad('proimg')" style="margin: 0 50px"
			id="proimg" onmousemove="show('checkimg')"
			onmouseout="hide('checkimg')"> <img src="../upload/<?php
		echo $data ['photou'];
		?>"
			height="106px" width="73px" > <input type="hidden"
			name="photo-proimg" value="<?php
		echo $data ['photou']?>" /> </a><!-- pro img -->
<?php
	}
	if (empty ( $data ['photob'] )) {
		?>
<a href="javascript:void openUploadad('sideright')" style="margin: 0 50px"
			id="sideright"> <img src="../images/girl.png"></a>
<?php
	} else {
		?>
<a href="javascript:void openUploadad('sideright')" style="margin: 0 50px"
			id="sideright"  onmousemove="show('checkright')"
			onmouseout="hide('checkright')"> <img
			src="../upload/<?php
		echo $data ['photob'];
		?>" height="106px"
			width="73px"> <input type="hidden"
			name="photo-sideright" value="<?php
		echo $data ['photob']?>" /> </a>
<?php
	}
	?>
	<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; margin-top:-1px; padding-left: 435px"
			id="checkright">Profile Picture<input type="radio" name="mainimage"  onchange="updateProimg(this.value)"
			value="YL" <?php if($data['profile_image']=='YL'){echo "checked";}?>></p>
		<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; margin-top:-1px; padding-left: 260px"
			id="checkimg">Profile Picture<input type="radio" name="mainimage" onchange="updateProimg(this.value)"
			value="YC" <?php if($data['profile_image']=='YC'){echo "checked";}?>></p>
		<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; margin-top:-1px; padding-left: 80px"
			id="checkleft">Profile Picture<input type="radio" name="mainimage" onchange="updateProimg(this.value)"
			value="YR" <?php if($data['profile_image']=='YR'){echo "checked";}?>></p>
</td>
	</tr>
	<?php
} else {
	?>
	<tr>
		<td align="center" colspan="3" style="padding: 20px;">
<?php
	if (empty ( $data ['photos'] )) {
		?>
<a href="javascript:void openUploadad('sideleft')"
			style="margin: 0 50px 0 0px" id="sideleft"> <img src="../images/boy.png"></a>
<?php
	} else {
		?>
<a href="javascript:void openUploadad('sideleft')"
			style="margin: 0 50px 0 0px" id="sideleft" onmousemove="show('checksideleft')" onmouseout="hide('checksideleft')"> <img
			src="../upload/<?php
		echo $data ['photos'];
		?>" alt="PHOTO"
			height="106px" width="73px" > <input type="hidden"
			name="photo-sideleft" value="<?php
		echo $data ['photos']?>" /> </a>
<?php
	}
	if (empty ( $data ['photou'] )) {
		?>
<a href="javascript:void openUploadad('proimg')" style="margin: 0 50px"
			id="proimg"> <img src="../images/boy.png"></a><!-- pro img -->
<?php
	} else {
		?>
<a href="javascript:void openUploadad('proimg')" style="margin: 0 50px"
			id="proimg" onmousemove="show('checkproimg')" onmouseout="hide('checkproimg')"> <img src="../upload/<?php
		echo $data ['photou'];
		?>"
			alt="PHOTO" height="106px" width="73px"
			> <input
			type="hidden" name="photo-proimg"
			value="<?php
		echo $data ['photou']?>" /> </a><!-- pro img -->
<?php
	}
	if (empty ( $data ['photob'] )) {
		?>
<a href="javascript:void openUploadad('sideright')" style="margin: 0 50px"
			id="sideright"> <img src="../images/boy.png"></a>
<?php
	} else {
		?>
<a href="javascript:void openUploadad('sideright')" style="margin: 0 50px"
			id="sideright" onmousemove="show('checksideright')"
			onmouseout="hide('checksideright')"> <img
			src="../upload/<?php
		echo $data ['photob'];
		?>" alt="PHOTO"
			height="106px" width="73px" ><input type="hidden"
			name="photo-sideright" value="<?php
		echo $data ['photob']?>" /> </a>



		
<?php
	}
	?>
	<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; margin-top:-1px; padding-left: 435px"
			id="checksideright">Profile Picture<input type="radio" name="mainimage"  onchange="updateProimg(this.value)"
			value="YL" <?php if($data['profile_image']=='YL'){echo "checked";}?>></p>
		<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; margin-top:-1px; padding-left: 260px"
			id="checkproimg">Profile Picture<input type="radio" name="mainimage" onchange="updateProimg(this.value)"
			value="YC" <?php if($data['profile_image']=='YC'){echo "checked";}?>></p>
		<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; margin-top:-1px; padding-left: 80px"
			id="checksideleft">Profile Picture<input type="radio" name="mainimage" onchange="updateProimg(this.value)"
			value="YR" <?php if($data['profile_image']=='YR'){echo "checked";}?>></p>
</td>
	</tr>
	<?php
}

?>

	<tr>
		<td>Registered By</td>
		<td id="checker">:</td>
		<td><select name="register" class="select">
			<option
				<?php
				if ($data ['register'] == '') {
					echo "selected";
				}
				?>
				value="">--Select--</option>
			<option
				<?php
				if ($data ['register'] == 'father') {
					echo "selected";
				}
				?>
				value="father">Father</option>
			<option
				<?php
				if ($data ['register'] == 'mother') {
					echo "selected";
				}
				?>
				value="mother">Mother</option>
			<option
				<?php
				if ($data ['register'] == 'brother') {
					echo "selected";
				}
				?>
				value="brother">Brother</option>
			<option
				<?php
				if ($data ['register'] == 'sister') {
					echo "selected";
				}
				?>
				value="sister">Sister</option>
			<option
				<?php
				if ($data ['register'] == 'friend') {
					echo "selected";
				}
				?>
				value="friend">Friend</option>
			<option
				<?php
				if ($data ['register'] == 'relative') {
					echo "selected";
				}
				?>
				value="relative">Relative</option>
			<option
				<?php
				if ($data ['register'] == 'myself') {
					echo "selected";
				}
				?>
				value="myself">Myself</option>
			<option
				<?php
				if ($data ['register'] == 'cousin') {
					echo "selected";
				}
				?>
				value="cousin">Cousin</option>
		</select></td>
	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><input type="text" name="reg_name" class="textbox" value="<?php
			echo $data ['name']?>"/></td>
	</tr>

	<tr onmouseover="displayAge()">
		<td>Number</td>
		<td>:</td>
		<td><input type="text" name="reg_number" class="textbox" value="<?php
			echo $data ['number']?>"/></td>
	</tr>

	<tr>
		<td colspan="3" align="center"><input type="submit"  name="adminprofiledit"
			value="Submit" class="button"  id="editpro"/></td>

	</tr>


</table>
</form><?php }
}
?>