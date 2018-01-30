<?php
session_start ();
include_once 'include/admin.php';
if ($_SESSION ['profile'] == 'true') {
	$pid = $_SESSION ['who'];
} else {
	backToindex ();
}
try {
	$sql = "SELECT * FROM horoscope WHERE person_id=" . $pid;
	$result = mysql_query ( $sql );
	$data = mysql_fetch_array ( $result );
} catch ( Exception $e ) {
}
?>
<style type="text/css">
.horobox {
	height: 35px;
	width: 80px;
	border: 2px solid #C4160F;
	text-align: center;
}
</style>
<body onunload="return warningShow()" id="secondary">
<form method="post" action="controller_in.php" id="horoform">
<table style="float:left;width:700px;padding-left:140px" cellpadding="2">

	<tr>
		<td
			style="text-align: center; color: #06068C; font-weight: bold; padding: 8px 0; text-transform: uppercase;"
			colspan="3">horoscope Details</td>
	</tr>

	<tr>
		<td>Birth Star</td>
		<td>:</td>
		<td><input type="text" name="star" id="star"
			value="<?php
			echo $data ['star']?>" class="textbox" /></td>
	</tr>
	<tr>
		<td>Date of Birth(Malayalam)</td>
		<td>:<input type="hidden" name="person" value="<?php echo $pid;?>"/></td>
		<td><input type="text" name="mdob" id="mdob"
			value="<?php
			echo $data ['dob']?>" class="textbox" /></td>
	</tr>
	<tr>
		<td>Time of Birth</td>
		<td>:</td>
		<td><input type="text" name="tob" id="tob"
			value="<?php
			echo $data ['tob']?>" class="textbox" /></td>
	</tr>
	<tr>
		<td>Place of Birth</td>
		<td>:</td>
		<td><input type="text" name="pob" id="pob"
			value="<?php
			echo $data ['pob']?>" class="textbox" /></td>
	</tr>
	<tr>
		<td>Rasi</td>
		<td>:</td>
		<td><input type="text" name="rasi" id="rasi"
			value="<?php
			echo $data ['rasi']?>" class="textbox" /></td>
	</tr>
	<tr>
		<td>Janma Sista Dasa</td>
		<td>:</td>
		<td><input type="text" name="jsd" id="jsd"
			value="<?php
			echo $data ['sista_dasa']?>" class="textbox" /></td>
	</tr>
	<tr>
		<td>Janma Sista Dasa End</td>
		<td>:</td>
		<td><input type="text" name="jsde" id="jsde"
			value="<?php
			echo $data ['dasa_end']?>" class="textbox" /></td>
	</tr>



	<tr>
		<td>Horoscope</td>
		<td>:</td>
		<td>
		<?php if(empty($data['horo'])){?>
		<a href="javascript:void openHoro('imghoro')" id="imghoro" onmousemove="show('jathakam')" onmouseout="hide('jathakam')">
		<img  src="images/horo.PNG" width="100px" height="100px"></a>
		<?php }
		else
		{?>
		<a href="javascript:void openHoro('imghoro')" id="imghoro" onmousemove="show('jathakam')" onmouseout="hide('jathakam')">
		<img src="upload/<?php echo $data['horo']?>" width="100px" height="100px">
		<input type="hidden" value="<?php $data['horo'];?>" name="photo-imghoro"/></a>
		<?php }?>
		
		
		
		
		<div style="visibility:hidden;width:500px;height:500px;position:absolute;" id="jathakam">
		<?php if(empty($data['horo'])){?>
		<img  src="images/horo.PNG" width="490px" height="490px" onclick="openHoro('imghoro')">
		<?php }else{?>
		<img src="upload/<?php echo $data['horo']?>" width="490px" height="490px"/>      
		<?php }?>
		</div>
		
		
		</td>
	</tr>

</table>



<table  style="width:700px;float:left;">

	<tr>
		<td colspan="3"
			style="text-align: center; color: #06068C; font-weight: bold; padding: 8px 0; text-transform: uppercase;">
		OR</td>
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
		<td colspan="3" align="center"><input type="submit"
			 class="button" name="horosubmit" id="horosubmit"
			value="Save &amp; Continue" /></td>
	</tr>
</table>
</form></body>