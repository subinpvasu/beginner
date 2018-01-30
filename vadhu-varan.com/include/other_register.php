<?php
session_start ();
include_once 'include/admin.php';
if ($_SESSION ['profile'] == 'true') {
	$pid = $_SESSION ['who'];
} else {
	backToindex ();
}
try {
	$sql = "SELECT * FROM other WHERE person_id=" . $pid;
	$result = mysql_query ( $sql );
	$data = mysql_fetch_array ( $result );
} catch ( Exception $e ) {
}
?>
<form method="post" action="controller_in.php">
<table align="center"
	style="float: left; width: 700px; padding-left: 140px" cellpadding="2">
	<tr>
		<td
			style="text-align: center; color: #06068C; font-weight: bold; padding: 8px 0; text-transform: uppercase;"
			colspan="3">other Details</td>
	</tr>
	<tr>

		<td
			style="text-align: left; color: blue; font-weight: bold; padding: 8px 0; text-transform: uppercase;"
			colspan="3">Partner Preferences</td>
	</tr>

	<tr>
		<td>Age From</td>
		<td>:</td>
		<td><input type="text" class="textbox" name="age_from"
			value="<?php
			echo $data ['age_from'];
			?>" /></td>
	</tr>

	<tr>
		<td>Age To</td>
		<td>:</td>
		<td><input type="text" class="textbox" name="age_to"
			value="<?php
			echo $data ['age_to'];
			?>" /></td>
	</tr>

	<tr>
		<td>Height From</td>
		<td>:</td>
		<td><select name="height_from" id="height_from" class="select">
			<option <?php
			if ($data ['height_from'] == '0') {
				echo "selected";
			}
			?>
				value="0">--- Select ---</option>
			<option <?php
			if ($data ['height_from'] == '1') {
				echo "selected";
			}
			?>
				value="1">Less than 4' 5&quot; (1.35 mts)</option>
			<option <?php
			if ($data ['height_from'] == '2') {
				echo "selected";
			}
			?>
				value="2">4' 5&quot; (1.35 mts)</option>
			<option <?php
			if ($data ['height_from'] == '3') {
				echo "selected";
			}
			?>
				value="3">4' 6&quot; (1.37 mts)</option>
			<option <?php
			if ($data ['height_from'] == '4') {
				echo "selected";
			}
			?>
				value="4">4' 7&quot; (1.40 mts)</option>
			<option <?php
			if ($data ['height_from'] == '5') {
				echo "selected";
			}
			?>
				value="5">4' 8&quot; (1.42 mts)</option>
			<option <?php
			if ($data ['height_from'] == '6') {
				echo "selected";
			}
			?>
				value="6">4' 9&quot; (1.45 mts)</option>
			<option <?php
			if ($data ['height_from'] == '7') {
				echo "selected";
			}
			?>
				value="7">4' 10&quot; (1.47 mts)</option>
			<option <?php
			if ($data ['height_from'] == '8') {
				echo "selected";
			}
			?>
				value="8">4' 11&quot; (1.50 mts)</option>
			<option <?php
			if ($data ['height_from'] == '9') {
				echo "selected";
			}
			?>
				value="9">5' 0&quot; (1.52 mts)</option>
			<option <?php
			if ($data ['height_from'] == '10') {
				echo "selected";
			}
			?>
				value="10">5' 1&quot; (1.55 mts)</option>
			<option <?php
			if ($data ['height_from'] == '11') {
				echo "selected";
			}
			?>
				value="11">5' 2&quot; (1.58 mts)</option>
			<option <?php
			if ($data ['height_from'] == '12') {
				echo "selected";
			}
			?>
				value="12">5' 3&quot; (1.60 mts)</option>
			<option <?php
			if ($data ['height_from'] == '13') {
				echo "selected";
			}
			?>
				value="13">5' 4&quot; (1.63 mts)</option>
			<option <?php
			if ($data ['height_from'] == '14') {
				echo "selected";
			}
			?>
				value="14">5' 5&quot; (1.65 mts)</option>
			<option <?php
			if ($data ['height_from'] == '15') {
				echo "selected";
			}
			?>
				value="15">5' 6&quot; (1.68 mts)</option>
			<option <?php
			if ($data ['height_from'] == '16') {
				echo "selected";
			}
			?>
				value="16">5' 7&quot; (1.70 mts)</option>
			<option <?php
			if ($data ['height_from'] == '17') {
				echo "selected";
			}
			?>
				value="17">5' 8&quot; (1.73 mts)</option>
			<option <?php
			if ($data ['height_from'] == '18') {
				echo "selected";
			}
			?>
				value="18">5' 9&quot; (1.75 mts)</option>
			<option <?php
			if ($data ['height_from'] == '19') {
				echo "selected";
			}
			?>
				value="19">5' 10&quot; (1.78 mts)</option>
			<option <?php
			if ($data ['height_from'] == '20') {
				echo "selected";
			}
			?>
				value="20">5' 11&quot; (1.80 mts)</option>
			<option <?php
			if ($data ['height_from'] == '21') {
				echo "selected";
			}
			?>
				value="21">6' 0&quot; (1.83 mts)</option>
			<option <?php
			if ($data ['height_from'] == '22') {
				echo "selected";
			}
			?>
				value="22">6' 1&quot; (1.85 mts)</option>
			<option <?php
			if ($data ['height_from'] == '23') {
				echo "selected";
			}
			?>
				value="23">6' 2&quot; (1.88 mts)</option>
			<option <?php
			if ($data ['height_from'] == '24') {
				echo "selected";
			}
			?>
				value="24">6' 3&quot; (1.91 mts)</option>
			<option <?php
			if ($data ['height_from'] == '25') {
				echo "selected";
			}
			?>
				value="25">6' 4&quot; (1.93 mts)</option>
			<option <?php
			if ($data ['height_from'] == '26') {
				echo "selected";
			}
			?>
				value="26">6' 5&quot; (1.96 mts)</option>
			<option <?php
			if ($data ['height_from'] == '27') {
				echo "selected";
			}
			?>
				value="27">6' 6&quot; (1.98 mts)</option>
			<option <?php
			if ($data ['height_from'] == '28') {
				echo "selected";
			}
			?>
				value="28">6' 7&quot; (2.01 mts)</option>
			<option <?php
			if ($data ['height_from'] == '29') {
				echo "selected";
			}
			?>
				value="29">6' 8&quot; (2.03 mts)</option>
			<option <?php
			if ($data ['height_from'] == '30') {
				echo "selected";
			}
			?>
				value="30">6' 9&quot; (2.06 mts)</option>
			<option <?php
			if ($data ['height_from'] == '31') {
				echo "selected";
			}
			?>
				value="31">6' 10&quot; (2.08 mts)</option>
			<option <?php
			if ($data ['height_from'] == '32') {
				echo "selected";
			}
			?>
				value="32">6' 11&quot; (2.11 mts)</option>
			<option <?php
			if ($data ['height_from'] == '33') {
				echo "selected";
			}
			?>
				value="33">7' (2.13 mts)</option>
			<option <?php
			if ($data ['height_from'] == '34') {
				echo "selected";
			}
			?>
				value="34">Greater than 7' (2.13 mts)</option>
		</select></td>
	</tr>

	<tr>
		<td>Height To</td>
		<td>:</td>
		<td><select name="height_to" id="height_to" class="select">
			<option <?php
			if ($data ['height_to'] == '0') {
				echo "selected";
			}
			?>
				value="0">--- Select ---</option>
			<option <?php
			if ($data ['height_to'] == '1') {
				echo "selected";
			}
			?>
				value="1">Less than 4' 5&quot; (1.35 mts)</option>
			<option <?php
			if ($data ['height_to'] == '2') {
				echo "selected";
			}
			?>
				value="2">4' 5&quot; (1.35 mts)</option>
			<option <?php
			if ($data ['height_to'] == '3') {
				echo "selected";
			}
			?>
				value="3">4' 6&quot; (1.37 mts)</option>
			<option <?php
			if ($data ['height_to'] == '4') {
				echo "selected";
			}
			?>
				value="4">4' 7&quot; (1.40 mts)</option>
			<option <?php
			if ($data ['height_to'] == '5') {
				echo "selected";
			}
			?>
				value="5">4' 8&quot; (1.42 mts)</option>
			<option <?php
			if ($data ['height_to'] == '6') {
				echo "selected";
			}
			?>
				value="6">4' 9&quot; (1.45 mts)</option>
			<option <?php
			if ($data ['height_to'] == '7') {
				echo "selected";
			}
			?>
				value="7">4' 10&quot; (1.47 mts)</option>
			<option <?php
			if ($data ['height_to'] == '8') {
				echo "selected";
			}
			?>
				value="8">4' 11&quot; (1.50 mts)</option>
			<option <?php
			if ($data ['height_to'] == '9') {
				echo "selected";
			}
			?>
				value="9">5' 0&quot; (1.52 mts)</option>
			<option <?php
			if ($data ['height_to'] == '10') {
				echo "selected";
			}
			?>
				value="10">5' 1&quot; (1.55 mts)</option>
			<option <?php
			if ($data ['height_to'] == '11') {
				echo "selected";
			}
			?>
				value="11">5' 2&quot; (1.58 mts)</option>
			<option <?php
			if ($data ['height_to'] == '12') {
				echo "selected";
			}
			?>
				value="12">5' 3&quot; (1.60 mts)</option>
			<option <?php
			if ($data ['height_to'] == '13') {
				echo "selected";
			}
			?>
				value="13">5' 4&quot; (1.63 mts)</option>
			<option <?php
			if ($data ['height_to'] == '14') {
				echo "selected";
			}
			?>
				value="14">5' 5&quot; (1.65 mts)</option>
			<option <?php
			if ($data ['height_to'] == '15') {
				echo "selected";
			}
			?>
				value="15">5' 6&quot; (1.68 mts)</option>
			<option <?php
			if ($data ['height_to'] == '16') {
				echo "selected";
			}
			?>
				value="16">5' 7&quot; (1.70 mts)</option>
			<option <?php
			if ($data ['height_to'] == '17') {
				echo "selected";
			}
			?>
				value="17">5' 8&quot; (1.73 mts)</option>
			<option <?php
			if ($data ['height_to'] == '18') {
				echo "selected";
			}
			?>
				value="18">5' 9&quot; (1.75 mts)</option>
			<option <?php
			if ($data ['height_to'] == '19') {
				echo "selected";
			}
			?>
				value="19">5' 10&quot; (1.78 mts)</option>
			<option <?php
			if ($data ['height_to'] == '20') {
				echo "selected";
			}
			?>
				value="20">5' 11&quot; (1.80 mts)</option>
			<option <?php
			if ($data ['height_to'] == '21') {
				echo "selected";
			}
			?>
				value="21">6' 0&quot; (1.83 mts)</option>
			<option <?php
			if ($data ['height_to'] == '22') {
				echo "selected";
			}
			?>
				value="22">6' 1&quot; (1.85 mts)</option>
			<option <?php
			if ($data ['height_to'] == '23') {
				echo "selected";
			}
			?>
				value="23">6' 2&quot; (1.88 mts)</option>
			<option <?php
			if ($data ['height_to'] == '24') {
				echo "selected";
			}
			?>
				value="24">6' 3&quot; (1.91 mts)</option>
			<option <?php
			if ($data ['height_to'] == '25') {
				echo "selected";
			}
			?>
				value="25">6' 4&quot; (1.93 mts)</option>
			<option <?php
			if ($data ['height_to'] == '26') {
				echo "selected";
			}
			?>
				value="26">6' 5&quot; (1.96 mts)</option>
			<option <?php
			if ($data ['height_to'] == '27') {
				echo "selected";
			}
			?>
				value="27">6' 6&quot; (1.98 mts)</option>
			<option <?php
			if ($data ['height_to'] == '28') {
				echo "selected";
			}
			?>
				value="28">6' 7&quot; (2.01 mts)</option>
			<option <?php
			if ($data ['height_to'] == '29') {
				echo "selected";
			}
			?>
				value="29">6' 8&quot; (2.03 mts)</option>
			<option <?php
			if ($data ['height_to'] == '30') {
				echo "selected";
			}
			?>
				value="30">6' 9&quot; (2.06 mts)</option>
			<option <?php
			if ($data ['height_to'] == '31') {
				echo "selected";
			}
			?>
				value="31">6' 10&quot; (2.08 mts)</option>
			<option <?php
			if ($data ['height_to'] == '32') {
				echo "selected";
			}
			?>
				value="32">6' 11&quot; (2.11 mts)</option>
			<option <?php
			if ($data ['height_to'] == '33') {
				echo "selected";
			}
			?>
				value="33">7' (2.13 mts)</option>
			<option <?php
			if ($data ['height_to'] == '34') {
				echo "selected";
			}
			?>
				value="34">Greater than 7' (2.13 mts)</option>
		</select></td>
	</tr>

	<tr>
		<td>Marital Status</td>
		<td>:</td>
		<td>Unmarried<input type="radio"
			<?php
			if ($data ['mar_status'] == 'U') {
				echo "checked";
			}
			?>
			name="marriage" value="U" /> Divorced<input
			<?php
			if ($data ['mar_status'] == 'D') {
				echo "checked";
			}
			?>
			type="radio" name="marriage" value="D" /> Widowed<input type="radio"
			name="marriage"
			<?php
			if ($data ['mar_status'] == 'W') {
				echo "checked";
			}
			?>
			value="W" /></td>
	</tr>


	<tr>
		<td>Caste No Bar</td>
		<td
			title="It means they're willing to marry someone outside of their caste, or social class.">:</td>
		<td
			title="It means they're willing to marry someone outside of their caste, or social class.">
		<select class="select" name="castebar">
			<option <?php
			if ($data ['caste_bar'] == 'N') {
				echo "selected";
			}
			?>
				value="N">No</option>
			<option <?php
			if ($data ['caste_bar'] == 'Y') {
				echo "selected";
			}
			?>
				value="Y">Yes</option>
		</select></td>
	</tr>

	<tr>
		<td>Job Description</td>
		<td>:</td>
		<td><textarea class="textarea" name="mar_job"><?php
		echo $data ['mar_job'];
		?></textarea></td>
	</tr>



	<tr>
		<td>Education Description</td>
		<td>:</td>
		<td><textarea class="textarea" name="edu_desc"><?php
		echo $data ['mar_education'];
		?></textarea></td>
	</tr>

	<tr>
		<td>Family Location</td>
		<td>:</td>
		<td><textarea class="textarea" name="mar_fam"><?php
		echo $data ['mar_religion'];
		?></textarea></td>
	</tr>

	<tr>
		<td>Job Location</td>
		<td>:</td>
		<td><textarea class="textarea" name="job_lo"><?php
		echo $data ['mar_joblo'];
		?></textarea></td>
	</tr>

	<tr>
		<td>Special Cases</td>
		<td>:</td>
		<td><textarea class="textarea" name="cases"><?php
		echo $data ['special'];
		?></textarea></td>
	</tr>

	<tr>
		<td>Any Other Requirements</td>
		<td>:</td>
		<td><textarea class="textarea" name="reqrother"><?php
		echo $data ['mar_other'];
		?></textarea></td>
	</tr>

	<tr>
		<td>Expectation About Life Partner</td>
		<td>:</td>
		<td><textarea name="expectation" class="textarea"><?php
		echo $data ['partner']?></textarea></td>
	</tr>
	
	<?php
	$zql = "SELECT marriage FROM personal_details WHERE id=" . $pid;
	$rezult = mysql_query ( $zql );
	$zata = mysql_fetch_array ( $rezult );
	if ($zata ['marriage'] != 'U') {
		?>
	<tr>
		<td>Arrears</td>
		<td>:</td>
		<td><textarea name="arrears" class="textarea"><?php
		echo $data ['arrears']?></textarea></td>
	</tr>
	<?php
	}
	?>
	
	<tr>

		<td
			style="text-align: left; color: blue; font-weight: bold; padding: 8px 0; text-transform: uppercase;"
			colspan="3">other details</td>
	</tr>
	
<?php
$sqlz = "SELECT gender FROM personal_details WHERE id=" . $pid;
$resultz = mysql_query ( $sqlz );
$dataz = mysql_fetch_array ( $resultz );
if ($dataz ['gender'] == 'B') {
	?>
<tr>
		<td align="center" colspan="3" style="padding: 20px;">
<?php
	if (empty ( $data ['photos'] )) {
		?>
<a href="javascript:void openUpload('sideleft')"
			style="margin: 0 50px 0 0px" id="sideleft"> <img
			src="images/girl.png"></a>
<?php
	} else {
		?>
<a href="javascript:void openUpload('sideleft')"
			style="margin: 0 50px 0 0px" id="sideleft"
			onmousemove="show('checkleft')" onmouseout="hide('checkleft')"> <img
			src="upload/<?php
		echo $data ['photos'];
		?>" height="106px"
			width="73px"> <input type="hidden" name="photo-sideleft"
			value="<?php
		echo $data ['photos']?>" /> </a>
<?php
	}
	if (empty ( $data ['photou'] )) {
		?>
<a href="javascript:void openUpload('proimg')" style="margin: 0 50px"
			id="proimg"> <img src="images/girl.png"></a><!-- pro img -->
<?php
	} else {
		?>
<a href="javascript:void openUpload('proimg')" style="margin: 0 50px"
			id="proimg" onmousemove="show('checkimg')"
			onmouseout="hide('checkimg')"> <img
			src="upload/<?php
		echo $data ['photou'];
		?>" height="106px"
			width="73px"> <input type="hidden" name="photo-proimg"
			value="<?php
		echo $data ['photou']?>" /> </a><!-- pro img -->
<?php
	}
	if (empty ( $data ['photob'] )) {
		?>
<a href="javascript:void openUpload('sideright')" style="margin: 0 50px"
			id="sideright"> <img src="images/girl.png"></a>
<?php
	} else {
		?>
<a href="javascript:void openUpload('sideright')" style="margin: 0 50px"
			id="sideright" onmousemove="show('checkright')"
			onmouseout="hide('checkright')"> <img
			src="upload/<?php
		echo $data ['photob'];
		?>" height="106px"
			width="73px"> <input type="hidden" name="photo-sideright"
			value="<?php
		echo $data ['photob']?>" /> </a>
<?php
	}
	?>
	<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; padding-top: 5px; padding-left: 355px"
			id="checkright">Profile Picture<input type="radio" name="mainimage"
			onchange="updateProimg(this.value)" value="YL"
			<?php
	if ($data ['profile_image'] == 'YL') {
		echo "checked";
	}
	?>></p>
		<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; padding-top: 5px; padding-left: 180px"
			id="checkimg">Profile Picture<input type="radio" name="mainimage"
			onchange="updateProimg(this.value)" value="YC"
			<?php
	if ($data ['profile_image'] == 'YC') {
		echo "checked";
	}
	?>></p>
		<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; padding-top: 5px; padding-left: 0px"
			id="checkleft">Profile Picture<input type="radio" name="mainimage"
			onchange="updateProimg(this.value)" value="YR"
			<?php
	if ($data ['profile_image'] == 'YR') {
		echo "checked";
	}
	?>></p>
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
<a href="javascript:void openUpload('sideleft')"
			style="margin: 0 50px 0 0px" id="sideleft"> <img src="images/boy.png"></a>
<?php
	} else {
		?>
<a href="javascript:void openUpload('sideleft')"
			style="margin: 0 50px 0 0px" id="sideleft"
			onmousemove="show('checkleft')" onmouseout="hide('checkleft')"> <img
			src="upload/<?php
		echo $data ['photos'];
		?>" alt="PHOTO"
			height="106px" width="73px"> <input type="hidden"
			name="photo-sideleft" value="<?php
		echo $data ['photos']?>" /> </a>
<?php
	}
	if (empty ( $data ['photou'] )) {
		?>
<a href="javascript:void openUpload('proimg')" style="margin: 0 50px"
			id="proimg"> <img src="images/boy.png"></a><!-- pro img -->
<?php
	} else {
		?>
<a href="javascript:void openUpload('proimg')" style="margin: 0 50px"
			id="proimg" onmousemove="show('checkimg')"
			onmouseout="hide('checkimg')"> <img
			src="upload/<?php
		echo $data ['photou'];
		?>" alt="PHOTO"
			height="106px" width="73px" onmousemove="show('checkimg')"
			onmouseout="hide('checkimg')"> <input type="hidden"
			name="photo-proimg" value="<?php
		echo $data ['photou']?>" /> </a><!-- pro img -->
<?php
	}
	if (empty ( $data ['photob'] )) {
		?>
<a href="javascript:void openUpload('sideright')" style="margin: 0 50px"
			id="sideright"> <img src="images/boy.png"></a>
<?php
	} else {
		?>
<a href="javascript:void openUpload('sideright')" style="margin: 0 50px"
			id="sideright" onmousemove="show('checkright')"
			onmouseout="hide('checkright')"> <img
			src="upload/<?php
		echo $data ['photob'];
		?>" alt="PHOTO"
			height="106px" width="73px"><input type="hidden"
			name="photo-sideright" value="<?php
		echo $data ['photob']?>" /> </a>



		
<?php
	}
	?>
	<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; padding-top: 5px; padding-left: 355px"
			id="checkright">Profile Picture<input type="radio" name="mainimage"
			onchange="updateProimg(this.value)" value="YL" id="checkrights"
			<?php
	if ($data ['profile_image'] == 'YL') {
		echo "checked";
	}
	?>></p>
		<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; padding-top: 5px; padding-left: 180px"
			id="checkimg">Profile Picture<input type="radio" name="mainimage"
			onchange="updateProimg(this.value)" value="YC" id="checkimgs"
			<?php
	if ($data ['profile_image'] == 'YC') {
		echo "checked";
	}
	?>></p>
		<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; padding-top: 5px; padding-left: 0px"
			id="checkleft">Profile Picture<input type="radio" name="mainimage"
			onchange="updateProimg(this.value)" value="YR" id="checklefts"
			<?php
	if ($data ['profile_image'] == 'YR') {
		echo "checked";
	}
	?>></p>
		</td>
	</tr>
	<?php
}

?>
	<tr>
		<td>Profile Registered By</td>
		<td>:<input type="hidden" name="person"
			value="<?php
			echo $pid;
			?>" /></td>
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
		<td><input type="text" name="name"
			value="<?php
			echo $data ['name']?>" class="textbox" /></td>
	</tr>

	<tr>
		<td>Contact Number</td>
		<td>:</td>
		<td><input type="text" name="number"
			value="<?php
			echo $data ['number']?>" class="textbox" /></td>
	</tr>
	<tr>

		<td colspan="3" align="center"><input type="submit" class="button"
			name="other" value="Save &amp; Continue" id="othersubmit" /></td>
	</tr>
</table>
</form>