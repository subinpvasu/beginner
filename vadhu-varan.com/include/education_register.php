<?php
session_start ();
include_once 'include/admin.php';
if ($_SESSION ['profile'] == 'true') {
	$pid = $_SESSION ['who'];
} else {
	backToindex ();
}
try {
	$sql = "SELECT * FROM qualification WHERE person_id=" . $pid;
	$result = mysql_query ( $sql );
	$data = mysql_fetch_array ( $result );
} catch ( Exception $e ) {
}

?>
<form method="post" action="controller_in.php"
	onsubmit="return eduCheck()">
<table style="float: left; width: 700px; padding-left: 140px"
	cellpadding="2">

	<tr>
		<td
			style="text-align: center; color: #06068C; font-weight: bold; padding: 8px 0; text-transform: uppercase;"
			colspan="3">Education &amp; Employment Details</td>
	</tr>

	<tr>
		<td>Highest Education</td>
		<td>:</td>
		<td><input type="text" name="education"
			value="<?php
			echo $data ['education']?>" onkeyup="" onblur=""
			id="education" class="textbox" /></td>
		<td id="educationr"></td>
	</tr>

	<tr>
		<td>Institute</td>
		<td>:<input type="hidden" name="person" value="<?php
		echo $pid;
		?>" /></td>
		<td><input type="text" onkeyup="" onblur="" name="institute"
			value="<?php
			echo $data ['institute']?>" id="institute"
			class="textbox" /></td>
		<td id="instituter"></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><input type="text" onkeyup="" onblur="" name="place"
			value="<?php
			echo $data ['place']?>" id="place" class="textbox" /></td>
		<td id="placer"></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><input type="text" onkeyup="" onblur="" name="period"
			value="<?php
			echo $data ['period']?>" id="period" class="textbox" /></td>
		<td id="periodr"></td>
	</tr>



	<tr>
		<td>Other Education Details</td>
		<td>:</td>
		<td><textarea class="textarea" name="more"><?php
		echo $data ['more']?></textarea></td>
		<td id=""></td>
	</tr>




	<tr>
		<td>Present Employer</td>
		<td>:</td>
		<td><input type="text" onkeyup="" onblur="" name="employer"
			value="<?php
			echo $data ['employer']?>" id="employer" class="textbox" /></td>
		<td id="employerr"></td>
	</tr>

	<tr>
		<td>Designation</td>
		<td>:</td>
		<td><input type="text" onkeyup="" onblur="" name="designation"
			value="<?php
			echo $data ['designation']?>" id="designation"
			class="textbox" /></td>
		<td id="designationr"></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><input type="text" onkeyup="" onblur="" name="location"
			value="<?php
			echo $data ['location']?>" id="location" class="textbox" /></td>
		<td id="locationr"></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><input type="text" onkeyup="" onblur="" name="duration"
			value="<?php
			echo $data ['duration']?>" id="duration" class="textbox" /></td>
		<td id="durationr"></td>
	</tr>

	<tr>
		<td>Previous Employer</td>
		<td>:</td>
		<td><input type="text" onkeyup="" onblur="" name="last_employer"
			value="<?php
			echo $data ['last_employer']?>" id="last_employer"
			class="textbox" /></td>
		<td id="last_employerr"></td>
	</tr>

	<tr>
		<td>Location</td>
		<td>:</td>
		<td><input type="text" onkeyup="" onblur="" name="last_location"
			value="<?php
			echo $data ['last_location']?>" id="last_location"
			class="textbox" /></td>
		<td id="last_locationr"></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><input type="text" onkeyup="" onblur="" onkeyup="" onblur=""
			name="last_duration" value="<?php
			echo $data ['last_duration']?>"
			id="last_duration" class="textbox" /></td>
		<td id="last_durationr"></td>
	</tr>

	<tr>
		<td>Present Salary</td>
		<td>:</td>
		<td><input type="text" onkeyup="" onblur="" name="salary"
			value="<?php
			echo $data ['salary']?>" id="salary" class="textbox" /></td>
		<td id="salaryr"></td>
	</tr>

	<tr>
		<td>Family Income</td>
		<td>:</td>
		<td><input type="text" onkeyup="" onblur="" name="income"
			value="<?php
			echo $data ['income']?>" id="income" class="textbox" /></td>
		<td id="incomer"></td>
	</tr>

	<tr>
		<td colspan="3" align="center"><input type="submit" class="button"
			name="educated" value="Save &amp; Continue" /></td>
	</tr>

</table>
</form>