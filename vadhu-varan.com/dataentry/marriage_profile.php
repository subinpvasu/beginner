<?php
session_start ();
?>
<script src="../validation.js"></script>
<style type="text/css">
/* Larger Side Border */
.textbox {
	color: #000481;
	width: 230px;
	height: 23px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

.minibox {
	color: #000481;
	width: 85px;
	height: 23px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

.horobox {
	height: 35px;
	width: 80px;
	border: 2px solid #C4160F;
	text-align: center;
}

/* Hover Button 1 */
.button {
	background-color: #C4160F;
	padding-left: 6px;
	padding-right: 6px;
	padding-top: 3px;
	padding-bottom: 3px;
	color: #ffffff;
	border: 1px solid #C4160F;
	font-weight: bold;
	background-image: url(images/red.jpg);
}

.button:hover {
	background-color: #000000;
	border: 1px solid #000000;
	color: #FEB914;
	font-weight: bold;
	background-image: url(images/black.jpg);
}

.select {
	width: 235px;
	height: 23px;
	color: #000481;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

.ser_select {
	color: #000481;
	width: 120px;
	text-align: center;
	height: 22px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

.minisel {
	color: #000481;
	width: 85px;
	height: 23px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

.a {
	text-decoration: none;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}

.tb11 { /*background:#FFFFFF url(images/search.png) no-repeat 4px 4px;*/
	padding: 4px;
	border: 1px solid #CCCCCC;
	width: 150px;
	height: 15px;
}

.fb7 {
	border: 1px solid #3366FF;
	background-color: #B3C6FF;
	height: 15px;
}

.textarea {
	color: #000481;
	width: 230px;
	height: 60px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

.miniarea {
	color: #000481;
	width: 85px;
	height: 60px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

.true {
	background: #FFFFFF url(images/search.png) no-repeat 4px 4px;
}

div {
	
}

.pagebar {
	background-image: url(../images/greenpremiumbck.png);
	background-repeat: no-repeat;
	width: 100%;
	float: left;
	color: white;
}
-->
</style>
<?php
if ($_SESSION ['data'] == 'true') {
	?>
<a
	style="text-align: right; position: absolute; left: 78%; top: 13px; text-transform: uppercase; text-decoration: none;"
	href="index.php?txt=bye">logout</a>
<?php
}
?>
<marquee style="color: green; font-weight: bold; position: fixed; text-align: left; top: 30px" scrollamount="3">Upload
should be less than 1 MB &amp; supported formats are<b style="color:blue"> .jpg, .jpeg, .png,
.gif. </b><b style="color: red"> Other formats will be rejected.</b></marquee>
<form method="post" action="datacontroller.php"
	enctype="multipart/form-data">
<table align="center" cellspacing="3" cellpadding="3"
	style="color: #3F3FA6">
	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bolder; color: #C4160F; text-transform: uppercase; text-transform: uppercase; background-color: #FEB914">Create
		Profile Now</td>

	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase;; text-transform: uppercase; text-decoration: underline">Personal
		Details</td>

	</tr>

	<tr>
		<td>Marital Status</td>
		<td>:</td>
		<td>Unmarried<input type="radio" checked="checked" name="marriage"
			value="U" /> Divorced<input type="radio" name="marriage" value="D" />
		Widowed<input type="radio" name="marriage" value="W" />Seperated<input type="radio" name="marriage" value="S" /></td>
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
		<td><select name="height" id="height" class="select">
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
			value="<?php
			echo $_SESSION ['optr'];
			?>" /> <input type="hidden"
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
		<td colspan="3" align="center"><input type="submit" name="dataprofile"
			value="Submit" class="button" /></td>

	</tr>


</table>
</form>