<?php
session_start ();
include_once 'include/admin.php';
if ($_SESSION ['profile'] == 'true') {
	$pid = $_SESSION ['who'];
} else {
	backToindex ();
}
try {
	$sql = "SELECT * FROM family WHERE person_id=" . $pid;
	$result = mysql_query ( $sql );
	$data = mysql_fetch_array ( $result );
} catch ( Exception $e ) {
}
?>
<form method="post" action="controller_in.php" onsubmit="return famCheck()">
<table style="float:left;width:700px;padding-left:140px" cellpadding="2">

	<tr>
		<td
			style="text-align: center; color: #06068C; font-weight: bold; padding: 8px 0; text-transform: uppercase;"
			colspan="3">Family Details</td>
	</tr>

	<tr>
		<td>No. of Family Members</td>
		<td>:</td>
		<td><input type="text" onkeyup="fieldCheck(this.value,this.id)"
			onblur="fieldCheck(this.value,this.id)"
			value="<?php
			echo $data ['total']?>" name="members" class="textbox"
			id="members" /></td>
		<td id="membersr"></td>
	</tr>

	<tr>
		<td>Name of Father</td>
		<td>:</td>
		<td><input type="text" onkeyup="fieldCheck(this.value,this.id)"
			onblur="fieldCheck(this.value,this.id)"
			value="<?php
			echo $data ['father']?>" name="father" class="textbox"
			id="father" /></td>
		<td id="fatherr"></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:<input type="hidden" name="person" value="<?php echo $pid;?>" /></td>
		<td><input type="text" onkeyup="fieldCheck(this.value,this.id)"
			onblur="fieldCheck(this.value,this.id)"
			value="<?php
			echo $data ['fjob']?>" name="occupation" class="textbox"
			id="occupation" /></td>
		<td id="occupationr"></td>
	</tr>

	<tr>
		<td>Name of Mother</td>
		<td>:</td>
		<td><input type="text" onkeyup="fieldCheck(this.value,this.id)"
			onblur="fieldCheck(this.value,this.id)"
			value="<?php
			echo $data ['mother']?>" name="mother" class="textbox"
			id="mother" /></td>
		<td id="motherr"></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><input type="text" onkeyup="fieldCheck(this.value,this.id)"
			onblur="fieldCheck(this.value,this.id)"
			value="<?php
			echo $data ['mjob']?>" name="mother_occu" class="textbox"
			id="mother_occu" /></td>
		<td id="mother_occur"></td>
	</tr>

	<tr>
		<td>No. of Brother(s)</td>
		<td>:</td>
		<td><input type="text" onkeyup="fieldCheck(this.value,this.id)"
			onblur="fieldCheck(this.value,this.id)"
			value="<?php
			echo $data ['brother']?>" name="nobro" class="textbox"
			id="nobro" /></td>
		<td id="nobror"></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><input type="text" onkeyup="fieldCheck(this.value,this.id)"
			onblur="fieldCheck(this.value,this.id)"
			value="<?php
			echo $data ['bmarried']?>" name="mar_bro" class="textbox"
			id="mar_bro" /></td>
		<td id="mar_bror"></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><input type="text" onkeyup="fieldCheck(this.value,this.id)"
			onblur="fieldCheck(this.value,this.id)"
			value="<?php
			echo $data ['bunmarried']?>" name="unmar_bro"
			class="textbox" id="unmar_bro" /></td>
		<td id="unmar_bror"></td>
	</tr>

	<tr>
		<td>No. of Sister(s)</td>
		<td>:</td>
		<td><input type="text" onkeyup="fieldCheck(this.value,this.id)"
			onblur="fieldCheck(this.value,this.id)"
			value="<?php
			echo $data ['sister']?>" name="nosis" class="textbox"
			id="nosis" /></td>
		<td id="nosisr"></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><input type="text" onkeyup="fieldCheck(this.value,this.id)"
			onblur="fieldCheck(this.value,this.id)"
			value="<?php
			echo $data ['smarried']?>" name="mar_sis" class="textbox"
			id="mar_sis" /></td>
		<td id="mar_sisr"></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><input type="text" onkeyup="fieldCheck(this.value,this.id)"
			onblur="fieldCheck(this.value,this.id)"
			value="<?php
			echo $data ['sunmarried']?>" name="unmar_sis"
			class="textbox" id="unmar_sis" /></td>
		<td id="unmar_sisr"></td>
	</tr>

	<tr>
		<td>Other Family Member(s) Details</td>
		<td>:</td>
		<td><textarea class="textarea" id="family_details"
			name="family_details"><?php
			echo $data ['other']?></textarea></td>
		<td id="family_detailsr"></td>
	</tr>

	<tr>
		<td colspan="3" align="center"><input
			 type="submit" name="family"
			class="button" value="Save &amp; Continue" /></td>
	</tr>


</table>
</form>