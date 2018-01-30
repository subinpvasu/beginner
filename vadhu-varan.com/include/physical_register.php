<?php
session_start ();
include_once 'include/admin.php';
if ($_SESSION ['profile'] == 'true') {
	$pid = $_SESSION ['who'];
} else {
	backToindex ();
}
try {
	$sql = "SELECT * FROM physical_details WHERE person_id=" . $pid;
	$result = mysql_query ( $sql );
	$data = mysql_fetch_array ( $result );
} catch ( Exception $e ) {
}
?>
<form method="post" action="controller_in.php"
	onsubmit="return phyCheck()">
<table align="center" onmouseover="doItnow()"
	style="float: left; width: 700px; padding-left: 140px" cellpadding="2">

	<tr>
		<td
			style="text-align: center; color: #06068C; font-weight: bold; padding: 8px 0; text-transform: uppercase;"
			colspan="3">Physical Details</td>
	</tr>

	<tr>
		<td>Body Type</td>
		<td>:</td>
		<td><select name="body" id="body" class="select"
			onchange="selectionCheck(this.value,this.id)">
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
			?>" /></td>
		<td id="bodyr"></td>
	</tr>

	<tr>
		<td>Height</td>
		<td>:<input type="hidden" name="person"
			value="<?php
			echo $pid;
			?>" /></td>
		<td><select name="height" id="height" class="select"
			onchange="selectionCheck(this.value,this.id)">
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
		<td id="heightr"></td>
	</tr>

	<tr>
		<td>Complexion</td>
		<td>:</td>
		<td><select name="colour" id="colour" class="select"
			onchange="selectionCheck(this.value,this.id)">
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
		<td id="colourr"></td>
	</tr>

	<tr>
		<td>Diet</td>
		<td>:</td>
		<td><select name="diet" id="diet" class="select"
			onchange="selectionCheck(this.value,this.id)">
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
				value="non vegetarian">Occassionally Non Vegetarian</option>
			<option
				<?php
				if ($data ['diet'] == 'jain') {
					echo "selected";
				}
				?>
				value="jain">Jain</option>
		</select></td>
		<td id="dietr"></td>
	</tr>

	<tr>
		<td>Health</td>
		<td>:</td>
		<td><input type="text" onkeyup="fieldCheck(this.value,this.id)"
			onblur="fieldCheck(this.value,this.id)" name="health"
			value="<?php
			echo $data ['health'];
			?>" id="health"
			class="textbox" /></td>
		<td id="healthr"></td>
	</tr>

	<tr>
		<td>Weight</td>
		<td>:</td>
		<td><input type="text" name="weight"
			value="<?php
			echo $data ['weight'];
			?>" class="textbox" /></td>
		<td></td>
	</tr>

	<tr>
		<td>Blood Group</td>
		<td>:</td>
		<td><input type="text" onkeyup="fieldCheck(this.value,this.id)"
			onblur="fieldCheck(this.value,this.id)" name="blood"
			value="<?php
			echo $data ['blood'];
			?>" id="blood"
			class="textbox" /></td>
		<td id="bloodr"></td>
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
		<td colspan="3" align="center"><input type="submit" name="physical"
			class="button" value="Save &amp; Continue" /></td>
	</tr>


</table>
</form>