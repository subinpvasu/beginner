<?php
session_start ();
include_once 'admin.php';
include_once 'functions.php';
$hgt = array (0 => "--- Select ---", "Less than 4' 5&quot; (1.35 mts)", "4' 5&quot; (1.35 mts)", "4' 6&quot; (1.37 mts)", "4' 7&quot; (1.40 mts)", "4' 8&quot; (1.42 mts)", "4' 9&quot; (1.45 mts)", "4' 10&quot; (1.47 mts)", "4' 11&quot; (1.50 mts)", "5' 0&quot; (1.52 mts)", "5' 1&quot; (1.55 mts)", "5' 2&quot; (1.58 mts)", "5' 3&quot; (1.60 mts)", "5' 4&quot; (1.63 mts)", "5' 5&quot; (1.65 mts)", "5' 6&quot; (1.68 mts)", "5' 7&quot; (1.70 mts)", "5' 8&quot; (1.73 mts)", "5' 9&quot; (1.75 mts)", "5' 10&quot; (1.78 mts)", "5' 11&quot; (1.80 mts)", "6' 0&quot; (1.83 mts)", "6' 1&quot; (1.85 mts)", "6' 2&quot; (1.88 mts)", "6' 3&quot; (1.91 mts)", "6' 4&quot; (1.93 mts)", "6' 5&quot; (1.96 mts)", "6' 6&quot; (1.98 mts)", "6' 7&quot; (2.01 mts)", "6' 8&quot; (2.03 mts)", "6' 9&quot; (2.06 mts)", "6' 10&quot; (2.08 mts)", "6' 11&quot; (2.11 mts)", "7' (2.13 mts)", "Greater than 7' (2.13 mts)" );

$temporaryvariable_register = 0;
if ($_GET ['msg'] == 'seeage') {
	$date = $_GET ['d'];
	$month = $_GET ['m'];
	$year = $_GET ['y'];
	$l = 0;
	$birthDate = $month . "/" . $date . "/" . $year;
	$birthDate = explode ( "/", $birthDate );
	$age = (date ( "md", date ( "U", mktime ( 0, 0, 0, $birthDate [0], $birthDate [1], $birthDate [2] ) ) ) > date ( "md" ) ? ((date ( "Y" ) - $birthDate [2]) - 1) : (date ( "Y" ) - $birthDate [2]));
	echo $age;
}
if ($_GET ['msg'] == 'sendmail') {
	
	$name = strip_tags ( $_POST ['name'] );
	$address = strip_tags ( $_POST ['address'] );
	$mobile = strip_tags ( $_POST ['phone'] );
	$mail = strip_tags ( $_POST ['email'] );
	$sub = strip_tags ( $_POST ['subject'] );
	$msg = strip_tags ( $_POST ['message'] );
	$to = "gitacommunications@gmail.com";
	$subject = "FeedBack";
	$message = "<table><tr><td>Name</td><td>:</td><td>$name</td></tr><tr><td>Address</td><td>:</td><td>$address</td></tr>
<tr><td>Mobile</td><td>:</td><td>$mobile</td></tr>	<tr><td>Mail</td><td>:</td><td>$mail</td></tr>	<tr><td>Subject</td>
<td>:</td><td>$sub</td></tr>	<tr><td>Message</td><td>:</td><td>$msg</td></tr></table>";
	$from = "response@vadhu-varan.com";
	$headers = "from:VADHU-VARAN.COM<response@vadhu-varan.com>\r\n";
	$headers .= "Reply-To: gitacommunications@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html";
	mail ( $to, $subject, $message, $headers );
	echo 'Mail Sent!
	<script>function closeIt(){self.close();}</script>';
}
if ($_GET ['msg'] == 'ajaxperson') {
	$person = $_GET ['id'];
	if ($_SESSION ['who'] == $person) {
		$sql = "SELECT * FROM personal_details WHERE id=" . $person;
		$result = mysql_query ( $sql );
		$data = mysql_fetch_array ( $result );
		?>
<table
	style="width: 600px; text-align: center; font-weight: bold; padding-bottom: 15px; padding-top: 15px"
	cellspacing="5">
	<tr>
		<td
			style="text-align: center; color: #C4160F; font-weight: bold; padding: 8px 0; text-transform: uppercase; text-decoration: underline; padding-bottom: 20px;"
			colspan="3">Personal Details</td>
	</tr>
	<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php
		echo $data ['present'];
		?></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
		echo $data ['place'];
		?></td>
	</tr>

	<tr>
		<td>Pincode</td>
		<td>:</td>
		<td><?php
		echo $data ['pin'];
		?></td>
	</tr>

	<tr>
		<td>City</td>
		<td>:</td>
		<td><?php
		echo $data ['city'];
		?></td>
	</tr>

	<tr>
		<td>District</td>
		<td>:</td>
		<td><?php
		echo $data ['district'];
		?></td>
	</tr>

	<tr>
		<td>State</td>
		<td>:</td>
		<td><?php
		echo $data ['state'];
		?></td>
	</tr>

	<tr>
		<td>Country</td>
		<td>:</td>
		<td><?php
		echo $data ['country'];
		?></td>
	</tr>

	<tr>
		<td>TelePhone</td>
		<td>:</td>
		<td><?php
		echo $data ['telephone'];
		?></td>
	</tr>

	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><?php
		echo $data ['mobile'];
		?></td>
	</tr>

	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php
		echo $data ['email'];
		?></td>
	</tr>

	<tr>
		<td colspan="3" align="right" style="padding-top: 20px;"><a
			href="index.php?msg=person" style="font-weight: bold;">Edit Details</a></td>
	</tr>

</table>

<?php
	} else {
		
		$sql = "SELECT * FROM personal_details WHERE id=" . $person;
		$result = mysql_query ( $sql );
		$data = mysql_fetch_array ( $result );
		?>
<table
	style="width: 600px; text-align: center; font-weight: bold; padding-bottom: 15px; padding-top: 15px"
	cellspacing="5">
	<tr>
		<td
			style="text-align: center; color: #C4160F; font-weight: bold; padding: 8px 0; text-transform: uppercase; text-decoration: underline; padding-bottom: 20px;"
			colspan="3">Personal Details</td>
	</tr>
	<?php
		if ($data ['golden'] == 'Y' || $data ['premium'] == 'Y') {
			?>
	<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php
			echo $data ['present'];
			?></td>
	</tr>
<?php
		}
		?>
	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
		echo $data ['place'];
		?></td>
	</tr>
<?php
		if ($data ['golden'] == 'Y' || $data ['premium'] == 'Y') {
			?>
	<tr>
		<td>Pincode</td>
		<td>:</td>
		<td><?php
			echo $data ['pin'];
			?></td>
	</tr>
<?php
		}
		?>
	<tr>
		<td>City</td>
		<td>:</td>
		<td><?php
		echo $data ['city'];
		?></td>
	</tr>

	<tr>
		<td>District</td>
		<td>:</td>
		<td><?php
		echo $data ['district'];
		?></td>
	</tr>

	<tr>
		<td>State</td>
		<td>:</td>
		<td><?php
		echo $data ['state'];
		?></td>
	</tr>

	<tr>
		<td>Country</td>
		<td>:</td>
		<td><?php
		echo $data ['country'];
		?></td>
	</tr>
<?php
		if ($data ['golden'] == 'Y' || $data ['premium'] == 'Y') {
			?>
	<tr>
		<td>TelePhone</td>
		<td>:</td>
		<td><?php
			echo $data ['telephone'];
			?></td>
	</tr>

	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><?php
			echo $data ['mobile'];
			?></td>
	</tr>

	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php
			echo $data ['email'];
			?></td>
	</tr>

	<?php
		}
		?>

</table>

<?php
	}
}
if ($_GET ['msg'] == 'ajaxphysical') {
	$person = $_GET ['id'];
	if ($_SESSION ['who'] == $person) {
		$sql = "SELECT * FROM physical_details WHERE person_id=" . $person;
		$result = mysql_query ( $sql );
		$data = mysql_fetch_array ( $result );
		?>
<table
	style="width: 600px; text-align: center; font-weight: bold; padding-bottom: 15px; padding-top: 15px"
	cellspacing="5">

	<tr>
		<td
			style="text-align: center; color: #C4160F; font-weight: bold; padding: 8px 0; text-transform: uppercase; text-decoration: underline; padding-bottom: 20px;"
			colspan="3">Physical Details</td>
	</tr>

	<tr>
		<td>Body</td>
		<td>:</td>
		<td><?php
		echo $data ['body'];
		?></td>
	</tr>

	<tr>
		<td>Diet</td>
		<td>:</td>
		<td><?php
		echo $data ['diet'];
		?></td>
	</tr>

	<tr>
		<td>Height</td>
		<td>:</td>
		<td><?php
		echo $hgt [$data ['height']];
		?> </td>
	</tr>
	<tr>
		<td>Weight</td>
		<td>:</td>
		<td><?php
		echo $data ['weight'];
		?></td>
	</tr>
	<tr>
		<td>Complexion</td>
		<td>:</td>
		<td><?php
		echo $data ['complexion'];
		?></td>
	</tr>

	<tr>
		<td>Health</td>
		<td>:</td>
		<td><?php
		echo $data ['health'];
		?></td>
	</tr>

	<tr>
		<td>Blood</td>
		<td>:</td>
		<td><?php
		echo $data ['blood'];
		?></td>
	</tr>

	<tr>
		<td>Disability</td>
		<td>:</td>
		<td><?php
		$data ['disability'] == 'Y' ? print "Yes" : print "No";
		?></td>
	</tr>
<?php
		if ($data ['disability'] == 'Y') {
			?>
	<tr>
		<td>Details</td>
		<td>:</td>
		<td><?php
			echo $data ['details'];
			?></td>
	</tr>
<?php
		}
		?>
	<tr>
		<td colspan="3" align="right" style="padding-top: 20px;"><a
			href="index.php?msg=physical" style="font-weight: bold;">Edit Details</a></td>
	</tr>

</table>

<?php
	} else {
		$sql = "SELECT * FROM physical_details WHERE person_id=" . $person;
		$result = mysql_query ( $sql );
		$data = mysql_fetch_array ( $result );
		?>
<table
	style="width: 600px; text-align: center; font-weight: bold; padding-bottom: 15px; padding-top: 15px"
	cellspacing="5">

	<tr>
		<td
			style="text-align: center; color: #C4160F; font-weight: bold; padding: 8px 0; text-transform: uppercase; text-decoration: underline; padding-bottom: 20px;"
			colspan="3">Physical Details</td>
	</tr>

	<tr>
		<td>Body</td>
		<td>:</td>
		<td><?php
		echo $data ['body'];
		?></td>
	</tr>

	<tr>
		<td>Diet</td>
		<td>:</td>
		<td><?php
		echo $data ['diet'];
		?></td>
	</tr>

	<tr>
		<td>Height</td>
		<td>:</td>
		<td><?php
		echo $hgt [$data ['height']];
		?> </td>
	</tr>
	<tr>
		<td>Weight</td>
		<td>:</td>
		<td><?php
		echo $data ['weight'];
		?></td>
	</tr>
	<tr>
		<td>Complexion</td>
		<td>:</td>
		<td><?php
		echo $data ['complexion'];
		?></td>
	</tr>

	<tr>
		<td>Health</td>
		<td>:</td>
		<td><?php
		echo $data ['health'];
		?></td>
	</tr>

	<tr>
		<td>Blood</td>
		<td>:</td>
		<td><?php
		echo $data ['blood'];
		?></td>
	</tr>

	<tr>
		<td>Disability</td>
		<td>:</td>
		<td><?php
		$data ['disability'] == 'Y' ? print "Yes" : print "No";
		?></td>
	</tr>
<?php
		if ($data ['disability'] == 'Y') {
			?>
	<tr>
		<td>Details</td>
		<td>:</td>
		<td><?php
			echo $data ['details'];
			?></td>
	</tr>
<?php
		}
		?>


</table>

<?php
	}

}
if ($_GET ['msg'] == 'ajaxeducation') {
	$person = $_GET ['id'];
	if ($_SESSION ['who'] == $person) {
		$sql = "SELECT * FROM qualification WHERE person_id=" . $person;
		$result = mysql_query ( $sql );
		$data = mysql_fetch_array ( $result );
		?>
<table
	style="width: 600px; text-align: center; font-weight: bold; padding-bottom: 15px; padding-top: 15px"
	cellspacing="5">

	<tr>
		<td
			style="text-align: center; color: #C4160F; font-weight: bold; padding: 8px 0; text-transform: uppercase; text-decoration: underline; padding-bottom: 20px;"
			colspan="3">Education &amp; Job</td>
	</tr>

	<tr>
		<td>Highest Education</td>
		<td>:</td>
		<td><?php
		echo $data ['education'];
		?></td>
	</tr>

	<tr>
		<td>Institute</td>
		<td>:</td>
		<td><?php
		echo $data ['institute'];
		?></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
		echo $data ['place'];
		?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
		echo $data ['period'];
		?></td>
	</tr>

	<tr>
		<td>More Education Details</td>
		<td>:</td>
		<td><?php
		echo $data ['more'];
		?></td>
	</tr>

	<tr>
		<td>Present Employer</td>
		<td>:</td>
		<td><?php
		echo $data ['employer'];
		?></td>
	</tr>

	<tr>
		<td>Designation</td>
		<td>:</td>
		<td><?php
		echo $data ['designation'];
		?></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
		echo $data ['location'];
		?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
		echo $data ['duration'];
		?></td>
	</tr>

	<tr>
		<td>Previous Employer</td>
		<td>:</td>
		<td><?php
		echo $data ['last_employer'];
		?></td>
	</tr>

	<tr>
		<td>Location</td>
		<td>:</td>
		<td><?php
		echo $data ['last_location'];
		?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
		echo $data ['last_duration'];
		?></td>
	</tr>

	<tr>
		<td>Salary</td>
		<td>:</td>
		<td><?php
		echo $data ['salary'];
		?></td>
	</tr>

	<tr>
		<td>Income</td>
		<td>:</td>
		<td><?php
		echo $data ['income'];
		?></td>
	</tr>

	<tr>
		<td colspan="3" align="right" style="padding-top: 20px;"><a
			href="index.php?msg=job" style="font-weight: bold;">Edit Details</a></td>
	</tr>

</table>

<?php
	} else {
		
		$sql = "SELECT * FROM qualification WHERE person_id=" . $person;
		$result = mysql_query ( $sql );
		$data = mysql_fetch_array ( $result );
		?>
<table
	style="width: 600px; text-align: center; font-weight: bold; padding-bottom: 15px; padding-top: 15px"
	cellspacing="5">

	<tr>
		<td
			style="text-align: center; color: #C4160F; font-weight: bold; padding: 8px 0; text-transform: uppercase; text-decoration: underline; padding-bottom: 20px;"
			colspan="3">Education &amp; Job</td>
	</tr>

	<tr>
		<td>Highest Education</td>
		<td>:</td>
		<td><?php
		echo $data ['education'];
		?></td>
	</tr>

	<tr>
		<td>Institute</td>
		<td>:</td>
		<td><?php
		echo $data ['institute'];
		?></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
		echo $data ['place'];
		?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
		echo $data ['period'];
		?></td>
	</tr>

	<tr>
		<td>Present Employer</td>
		<td>:</td>
		<td><?php
		echo $data ['employer'];
		?></td>
	</tr>

	<tr>
		<td>Designation</td>
		<td>:</td>
		<td><?php
		echo $data ['designation'];
		?></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
		echo $data ['location'];
		?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
		echo $data ['duration'];
		?></td>
	</tr>

	<tr>
		<td>Previous Employer</td>
		<td>:</td>
		<td><?php
		echo $data ['last_employer'];
		?></td>
	</tr>

	<tr>
		<td>Location</td>
		<td>:</td>
		<td><?php
		echo $data ['last_location'];
		?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
		echo $data ['last_duration'];
		?></td>
	</tr>

	<tr>
		<td>Salary</td>
		<td>:</td>
		<td><?php
		echo $data ['salary'];
		?></td>
	</tr>

	<tr>
		<td>Income</td>
		<td>:</td>
		<td><?php
		echo $data ['income'];
		?></td>
	</tr>



</table>

<?php
	}

}
if ($_GET ['msg'] == 'ajaxfamily') {
	$person = $_GET ['id'];
	if ($_SESSION ['who'] == $person) {
		$sql = "SELECT * FROM family WHERE person_id=" . $person;
		$result = mysql_query ( $sql );
		$data = mysql_fetch_array ( $result );
		?>
<table
	style="width: 600px; text-align: center; font-weight: bold; padding-bottom: 15px; padding-top: 15px"
	cellspacing="5">

	<tr>
		<td
			style="text-align: center; color: #C4160F; font-weight: bold; padding: 8px 0; text-transform: uppercase; text-decoration: underline; padding-bottom: 20px;"
			colspan="3">Family Details</td>
	</tr>

	<tr>
		<td>Family Members</td>
		<td>:</td>
		<td><?php
		echo $data ['total'];
		?></td>
	</tr>

	<tr>
		<td>Father</td>
		<td>:</td>
		<td><?php
		echo $data ['father'];
		?></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><?php
		echo $data ['fjob'];
		?></td>
	</tr>

	<tr>
		<td>Mother</td>
		<td>:</td>
		<td><?php
		echo $data ['mother'];
		?></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><?php
		echo $data ['mjob'];
		?></td>
	</tr>

	<tr>
		<td>Brother(s)</td>
		<td>:</td>
		<td><?php
		echo $data ['brother'];
		?></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><?php
		echo $data ['bmarried'];
		?></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><?php
		echo $data ['bunmarried'];
		?></td>
	</tr>

	<tr>
		<td>Sister(s)</td>
		<td>:</td>
		<td><?php
		echo $data ['sister'];
		?></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><?php
		echo $data ['smarried'];
		?></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><?php
		echo $data ['sunmarried'];
		?></td>
	</tr>

	<tr>
		<td>Other Family Member(s) Details</td>
		<td>:</td>
		<td><?php
		echo $data ['otherz'];
		?></td>
	</tr>

	<tr>
		<td colspan="3" align="right" style="padding-top: 20px;"><a
			href="index.php?msg=family" style="font-weight: bold;">Edit Details</a></td>
	</tr>

</table>

<?php
	} else {
		$sql = "SELECT * FROM family WHERE person_id=" . $person;
		$result = mysql_query ( $sql );
		$data = mysql_fetch_array ( $result );
		?>
<table
	style="width: 600px; text-align: center; font-weight: bold; padding-bottom: 15px; padding-top: 15px"
	cellspacing="5">

	<tr>
		<td
			style="text-align: center; color: #C4160F; font-weight: bold; padding: 8px 0; text-transform: uppercase; text-decoration: underline; padding-bottom: 20px;"
			colspan="3">Family Details</td>
	</tr>

	<tr>
		<td>Family Members</td>
		<td>:</td>
		<td><?php
		echo $data ['total'];
		?></td>
	</tr>

	<tr>
		<td>Father</td>
		<td>:</td>
		<td><?php
		echo $data ['father'];
		?></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><?php
		echo $data ['fjob'];
		?></td>
	</tr>

	<tr>
		<td>Mother</td>
		<td>:</td>
		<td><?php
		echo $data ['mother'];
		?></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><?php
		echo $data ['mjob'];
		?></td>
	</tr>

	<tr>
		<td>Brother(s)</td>
		<td>:</td>
		<td><?php
		echo $data ['brother'];
		?></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><?php
		echo $data ['bmarried'];
		?></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><?php
		echo $data ['bunmarried'];
		?></td>
	</tr>

	<tr>
		<td>Sister(s)</td>
		<td>:</td>
		<td><?php
		echo $data ['sister'];
		?></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><?php
		echo $data ['smarried'];
		?></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><?php
		echo $data ['sunmarried'];
		?></td>
	</tr>

	<tr>
		<td>Other Family Member(s) Details</td>
		<td>:</td>
		<td><?php
		echo $data ['other'];
		?></td>
	</tr>



</table>

<?php
	}
}
if ($_GET ['msg'] == 'ajaxhoroscope') {
	$person = $_GET ['id'];
	if ($_SESSION ['who'] == $person) {
		$sql = "SELECT * FROM horoscope WHERE person_id=" . $person;
		$result = mysql_query ( $sql );
		$data = mysql_fetch_array ( $result );
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
<table
	style="width: 600px; text-align: center; font-weight: bold; padding-bottom: 15px; padding-top: 15px"
	cellspacing="5">

	<tr>
		<td
			style="text-align: center; color: #C4160F; font-weight: bold; padding: 8px 0; text-transform: uppercase; text-decoration: underline; padding-bottom: 20px;"
			colspan="3">horoscope</td>
	</tr>

	<tr>
		<td>Birth Star</td>
		<td>:</td>
		<td><?php
		echo $data ['star'];
		?></td>
	</tr>

	<tr>
		<td>Date of Birth</td>
		<td>:</td>
		<td><?php
		echo $data ['dob'];
		?></td>
	</tr>

	<tr>
		<td>Time of Birth</td>
		<td>:</td>
		<td><?php
		echo $data ['tob'];
		?></td>
	</tr>

	<tr>
		<td>Place of Birth</td>
		<td>:</td>
		<td><?php
		echo $data ['pob'];
		?></td>
	</tr>

	<tr>
		<td>Rasi</td>
		<td>:</td>
		<td><?php
		echo $data ['rasi'];
		?></td>
	</tr>

	<tr>
		<td>Janma Sista Dasa</td>
		<td>:</td>
		<td><?php
		echo $data ['sista_dasa'];
		?></td>
	</tr>

	<tr>
		<td>Janma Sista Dasa End</td>
		<td>:</td>
		<td><?php
		echo $data ['dasa_end'];
		?></td>
	</tr>

	<tr>
		<td>Horoscope</td>
		<td>:</td>
		<td><img src="../upload/<?php
		echo $data ['horo'];
		?>"
			width="100px" height="100px" /></td>
	</tr>

	<tr>
		<td>Other Details</td>
		<td>:</td>
		<td><?php
		echo $data ['other'];
		?></td>
	</tr>


<?php
		$horoarray = $data ['horobox'];
		$horoarray = explode ( "|", $horoarray );
		?>

<tr style="">
		<td>

		<table id="horoone"
			style="width: 300px; height: 250px; padding-top: 25px">
			<tr>
				<td><?php
		echo $horoarray [0];
		?></td>
				<td><?php
		echo $horoarray [1];
		?></td>
				<td><?php
		echo $horoarray [2];
		?></td>
				<td><?php
		echo $horoarray [3];
		?></td>
			</tr>
			<tr>
				<td><?php
		echo $horoarray [4];
		?></td>
				<td
					style="text-align: center; background-color: #FEB914; font-weight: bold"
					rowspan="2" colspan="2">Rasi Grahanila</td>
				<td><?php
		echo $horoarray [5];
		?></td>
			</tr>
			<tr>
				<td><?php
		echo $horoarray [6];
		?></td>
				<td><?php
		echo $horoarray [7];
		?></td>
			</tr>
			<tr>
				<td><?php
		echo $horoarray [8];
		?></td>
				<td><?php
		echo $horoarray [9];
		?></td>
				<td><?php
		echo $horoarray [10];
		?></td>
				<td><?php
		echo $horoarray [11];
		?></td>
			</tr>
		</table>
		</td>

		<td width="20px"></td>
		<td>

		<table id="horotwo"
			style="width: 300px; height: 250px; padding-top: 25px">
			<tr>
				<td><?php
		echo $horoarray [12];
		?></td>
				<td><?php
		echo $horoarray [13];
		?></td>
				<td><?php
		echo $horoarray [14];
		?></td>
				<td><?php
		echo $horoarray [15];
		?></td>
			</tr>
			<tr>
				<td><?php
		echo $horoarray [16];
		?></td>
				<td
					style="text-align: center; background-color: #FEB914; font-weight: bold"
					rowspan="2" colspan="2">Navamsakam</td>
				<td><?php
		echo $horoarray [17];
		?></td>
			</tr>
			<tr>
				<td><?php
		echo $horoarray [18];
		?></td>
				<td><?php
		echo $horoarray [19];
		?></td>
			</tr>
			<tr>
				<td><?php
		echo $horoarray [20];
		?></td>
				<td><?php
		echo $horoarray [21];
		?></td>
				<td><?php
		echo $horoarray [22];
		?></td>
				<td><?php
		echo $horoarray [23];
		?></td>
			</tr>
		</table>


		</td>

	</tr>



	<tr>
		<td colspan="3" align="right" style="padding-top: 20px;"><a
			href="index.php?msg=horo" style="font-weight: bold;">Edit Details</a></td>
	</tr>

</table>

<?php
	} else {
		$sql = "SELECT * FROM horoscope WHERE person_id=" . $person;
		$result = mysql_query ( $sql );
		$data = mysql_fetch_array ( $result );
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
<table
	style="width: 600px; text-align: center; font-weight: bold; padding-bottom: 15px; padding-top: 15px"
	cellspacing="5">

	<tr>
		<td
			style="text-align: center; color: #C4160F; font-weight: bold; padding: 8px 0; text-transform: uppercase; text-decoration: underline; padding-bottom: 20px;"
			colspan="3">horoscope</td>
	</tr>

	<tr>
		<td>Birth Star</td>
		<td>:</td>
		<td><?php
		echo $data ['star'];
		?></td>
	</tr>

	<tr>
		<td>Date of Birth</td>
		<td>:</td>
		<td><?php
		echo $data ['dob'];
		?></td>
	</tr>

	<tr>
		<td>Time of Birth</td>
		<td>:</td>
		<td><?php
		echo $data ['tob'];
		?></td>
	</tr>

	<tr>
		<td>Place of Birth</td>
		<td>:</td>
		<td><?php
		echo $data ['pob'];
		?></td>
	</tr>

	<tr>
		<td>Rasi</td>
		<td>:</td>
		<td><?php
		echo $data ['rasi'];
		?></td>
	</tr>

	<tr>
		<td>Janma Sista Dasa</td>
		<td>:</td>
		<td><?php
		echo $data ['sista_dasa'];
		?></td>
	</tr>

	<tr>
		<td>Janma Sista Dasa End</td>
		<td>:</td>
		<td><?php
		echo $data ['dasa_end'];
		?></td>
	</tr>

	<tr>
		<td>Horoscope</td>
		<td>:</td>
		<td><img src="../upload/<?php
		echo $data ['horo'];
		?>"
			width="100px" height="100px" /></td>
	</tr>

	<tr>
		<td>Other Details</td>
		<td>:</td>
		<td><?php
		echo $data ['other'];
		?></td>
	</tr>


<?php
		$horoarray = $data ['horobox'];
		$horoarray = explode ( "|", $horoarray );
		?>

<tr style="">
		<td>

		<table id="horoone"
			style="width: 300px; height: 250px; padding-top: 25px">
			<tr>
				<td><?php
		echo $horoarray [0];
		?></td>
				<td><?php
		echo $horoarray [1];
		?></td>
				<td><?php
		echo $horoarray [2];
		?></td>
				<td><?php
		echo $horoarray [3];
		?></td>
			</tr>
			<tr>
				<td><?php
		echo $horoarray [4];
		?></td>
				<td
					style="text-align: center; background-color: #FEB914; font-weight: bold"
					rowspan="2" colspan="2">Rasi Grahanila</td>
				<td><?php
		echo $horoarray [5];
		?></td>
			</tr>
			<tr>
				<td><?php
		echo $horoarray [6];
		?></td>
				<td><?php
		echo $horoarray [7];
		?></td>
			</tr>
			<tr>
				<td><?php
		echo $horoarray [8];
		?></td>
				<td><?php
		echo $horoarray [9];
		?></td>
				<td><?php
		echo $horoarray [10];
		?></td>
				<td><?php
		echo $horoarray [11];
		?></td>
			</tr>
		</table>
		</td>

		<td width="20px"></td>
		<td>

		<table id="horotwo"
			style="width: 300px; height: 250px; padding-top: 25px">
			<tr>
				<td><?php
		echo $horoarray [12];
		?></td>
				<td><?php
		echo $horoarray [13];
		?></td>
				<td><?php
		echo $horoarray [14];
		?></td>
				<td><?php
		echo $horoarray [15];
		?></td>
			</tr>
			<tr>
				<td><?php
		echo $horoarray [16];
		?></td>
				<td
					style="text-align: center; background-color: #FEB914; font-weight: bold"
					rowspan="2" colspan="2">Navamsakam</td>
				<td><?php
		echo $horoarray [17];
		?></td>
			</tr>
			<tr>
				<td><?php
		echo $horoarray [18];
		?></td>
				<td><?php
		echo $horoarray [19];
		?></td>
			</tr>
			<tr>
				<td><?php
		echo $horoarray [20];
		?></td>
				<td><?php
		echo $horoarray [21];
		?></td>
				<td><?php
		echo $horoarray [22];
		?></td>
				<td><?php
		echo $horoarray [23];
		?></td>
			</tr>
		</table>


		</td>

	</tr>





</table>

<?php
	}
}
if ($_GET ['msg'] == 'ajaxother') {
	$person = $_GET ['id'];
	if ($_SESSION ['who'] == $person) {
		$sql = "SELECT * FROM other WHERE person_id=" . $person;
		$result = mysql_query ( $sql );
		$data = mysql_fetch_array ( $result );
		?>
<table
	style="width: 600px; text-align: center; font-weight: bold; padding-bottom: 15px; padding-top: 15px"
	cellspacing="5">

	<tr>
		<td
			style="text-align: center; color: #C4160F; font-weight: bold; padding: 8px 0; text-transform: uppercase; text-decoration: underline; padding-bottom: 20px;"
			colspan="3">other details</td>
	</tr>
	<tr>

		<td
			style="text-align: left; color: blue; font-weight: bold; padding: 8px 0; text-transform: uppercase;"
			colspan="3">Partner Preferences</td>
	</tr>

	<tr>
		<td>Age From</td>
		<td>:</td>
		<td><?php
		echo $data ['age_from'];
		?></td>
	</tr>

	<tr>
		<td>Age To</td>
		<td>:</td>
		<td><?php
		echo $data ['age_to'];
		?></td>
	</tr>

	<tr>
		<td>Height From</td>
		<td>:</td>
		<td><?php
		echo $hgt [$data ['height_from']];
		?></td>
	</tr>

	<tr>
		<td>Height To</td>
		<td>:</td>
		<td><?php
		echo $hgt [$data ['height_to']];
		?></td>
	</tr>

	<tr>
		<td>Marital Status</td>
		<td>:</td>
		<td><?php
		$data ['mar_status'] == 'U' ? print "Unmarried" : print "";
		$data ['mar_status'] == 'D' ? print "Divorced" : print "";
		$data ['mar_status'] == 'W' ? print "Widowed" : print "";
		?></td>
	</tr>


	<tr>
		<td>Caste No Bar</td>
		<td
			title="It means they're willing to marry someone outside of their caste, or social class.">:</td>
		<td
			title="It means they're willing to marry someone outside of their caste, or social class.">
	 <?php
		$data ['caste_bar'] == 'N' ? print "NO" : print "YES";
		?> 
		
		</td>
	</tr>

	<tr>
		<td>Job Description</td>
		<td>:</td>
		<td><?php
		echo $data ['mar_job'];
		?></td>
	</tr>



	<tr>
		<td>Education Description</td>
		<td>:</td>
		<td><?php
		echo $data ['mar_education'];
		?></td>
	</tr>

	<tr>
		<td>Family Location</td>
		<td>:</td>
		<td><?php
		echo $data ['mar_religion'];
		?></td>
	</tr>

	<tr>
		<td>Job Location</td>
		<td>:</td>
		<td><?php
		echo $data ['mar_joblo'];
		?></td>
	</tr>

	<tr>
		<td>Special Cases</td>
		<td>:</td>
		<td><?php
		echo $data ['special'];
		?></td>
	</tr>

	<tr>
		<td>Any Other Requirements</td>
		<td>:</td>
		<td><?php
		echo $data ['mar_other'];
		?></td>
	</tr>



	<tr>
		<td>Expectation About Life Partner</td>
		<td>:</td>
		<td><?php
		echo $data ['partner']?></td>
	</tr>

	<tr>

		<td
			style="text-align: left; color: blue; font-weight: bold; padding: 8px 0; text-transform: uppercase;"
			colspan="3">other details</td>
	</tr>
	<tr>
		<td>Profile Registered By</td>
		<td>:</td>
		<td><?php
		echo $data ['register']?></td>
	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><?php
		echo $data ['name']?></td>
	</tr>

	<tr>
		<td>Phone</td>
		<td>:</td>
		<td><?php
		echo $data ['number']?></td>
	</tr>

	<!--<tr>
		<td>Job Status</td>
		<td>:</td>
		<td><?php
		$data ['job_status'] == 'Y' ? print "Yes" : print "No";
		?></td>
	</tr>



	-->
	<?php
		$zql = "SELECT marriage FROM personal_details WHERE id=" . $person;
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


	
	
<!--<?php
		$sqlz = "SELECT gender FROM personal_details WHERE id=" . $person;
		$resultz = mysql_query ( $sqlz );
		$dataz = mysql_fetch_array ( $resultz );
		if ($dataz ['gender'] == 'B') {
			?>
<tr>
		<td align="center" colspan="3" style="padding: 20px;">
<?php
			if (empty ( $data ['photos'] )) {
				?>
<a href="index.php?msg=other" style="margin: 0 50px 0 0px" id="sideleft">
		</a>
<?php
			} else {
				?>
<a href="index.php?msg=other" style="margin: 0 50px 0 0px" id="sideleft"
			onmousemove="show('checkleft')" onmouseout="hide('checkleft')"> <img
			src="upload/<?php
				echo $data ['photos'];
				?>" height="106px"
			width="73px"></a>
<?php
			}
			if (empty ( $data ['photou'] )) {
				?>
<a href="index.php?msg=other" style="margin: 0 50px" id="proimg"> </a> pro img 
<?php
			} else {
				?>
<a href="index.php?msg=other" style="margin: 0 50px" id="proimg"
			onmousemove="show('checkimg')" onmouseout="hide('checkimg')"> <img
			src="upload/<?php
				echo $data ['photou'];
				?>" height="106px"
			width="73px"></a> pro img 
<?php
			}
			if (empty ( $data ['photob'] )) {
				?>
<a href="index.php?msg=other" style="margin: 0 50px" id="sideright"> </a>
<?php
			} else {
				?>
<a href="index.php?msg=other" style="margin: 0 50px" id="sideright"
			onmousemove="show('checkright')" onmouseout="hide('checkright')"> <img
			src="upload/<?php
				echo $data ['photob'];
				?>" height="106px"
			width="73px"></a>
<?php
			}
			?>
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
<a href="index.php?msg=other" style="margin: 0 50px 0 0px" id="sideleft">
		</a>
<?php
			} else {
				?>
<a href="index.php?msg=other" style="margin: 0 50px 0 0px" id="sideleft"
			onmousemove="show('checkleft')" onmouseout="hide('checkleft')"> <img
			src="upload/<?php
				echo $data ['photos'];
				?>" alt="PHOTO"
			height="106px" width="73px"></a>
<?php
			}
			if (empty ( $data ['photou'] )) {
				?>
<a href="index.php?msg=other" style="margin: 0 50px" id="proimg"> </a> pro img 
<?php
			} else {
				?>
<a href="index.php?msg=other" style="margin: 0 50px" id="proimg"
			onmousemove="show('checkimg')" onmouseout="hide('checkimg')"> <img
			src="upload/<?php
				echo $data ['photou'];
				?>" alt="PHOTO"
			height="106px" width="73px"></a> pro img 
<?php
			}
			if (empty ( $data ['photob'] )) {
				?>
<a href="index.php?msg=other" style="margin: 0 50px" id="sideright"> </a>
<?php
			} else {
				?>
<a href="index.php?msg=other" style="margin: 0 50px" id="sideright"
			onmousemove="show('checkright')" onmouseout="hide('checkright')"> <img
			src="upload/<?php
				echo $data ['photob'];
				?>" alt="PHOTO"
			height="106px" width="73px"></a>
<?php
			}
			?>
		<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; padding-top: 5px; padding-left: 420px"
			id="checkright"><input type="radio" name="mainimage"
			onchange="updateProimg(this.value)" value="YL"
			<?php
			if ($data ['profile_image'] == 'YL') {
				echo "checked";
			}
			?>></p>
		<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; padding-top: 5px; padding-left: 245px"
			id="checkimg"><input type="radio" name="mainimage"
			onchange="updateProimg(this.value)" value="YC"
			<?php
			if ($data ['profile_image'] == 'YC') {
				echo "checked";
			}
			?>></p>
		<p
			style="position: absolute; visibility: hidden; color: black; font-weight: bold; padding-top: 5px; padding-left: 65px"
			id="checkleft"><input type="radio" name="mainimage"
			onchange="updateProimg(this.value)" value="YR"
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
	
	-->
	<tr>
		<td colspan="3" align="right"><a href="index.php?msg=other"
			style="font-weight: bold;">Edit Details</a></td>
	</tr>

</table>


<?php
	} else {
		$sql = "SELECT * FROM other WHERE person_id=" . $person;
		$result = mysql_query ( $sql );
		$data = mysql_fetch_array ( $result );
		?>
<table
	style="width: 600px; text-align: center; font-weight: bold; padding-bottom: 15px; padding-top: 15px"
	cellspacing="5">

	<tr>
		<td
			style="text-align: center; color: #C4160F; font-weight: bold; padding: 8px 0; text-transform: uppercase; text-decoration: underline; padding-bottom: 20px;"
			colspan="3">other details</td>
	</tr>
	<tr>

		<td
			style="text-align: left; color: blue; font-weight: bold; padding: 8px 0; text-transform: uppercase;"
			colspan="3">Partner Preferences</td>
	</tr>

	<tr>
		<td>Age From</td>
		<td>:</td>
		<td><?php
		echo $data ['age_from'];
		?></td>
	</tr>

	<tr>
		<td>Age To</td>
		<td>:</td>
		<td><?php
		echo $data ['age_to'];
		?></td>
	</tr>

	<tr>
		<td>Height From</td>
		<td>:</td>
		<td><?php
		echo $hgt [$data ['height_from']];
		?></td>
	</tr>

	<tr>
		<td>Height To</td>
		<td>:</td>
		<td><?php
		echo $hgt [$data ['height_to']];
		?></td>
	</tr>

	<tr>
		<td>Marital Status</td>
		<td>:</td>
		<td><?php
		$data ['mar_status'] == 'U' ? print "Unmarried" : print "";
		$data ['mar_status'] == 'D' ? print "Divorced" : print "";
		$data ['mar_status'] == 'W' ? print "Widowed" : print "";
		?></td>
	</tr>


	<tr>
		<td>Caste No Bar</td>
		<td
			title="It means they're willing to marry someone outside of their caste, or social class.">:</td>
		<td
			title="It means they're willing to marry someone outside of their caste, or social class.">
	 <?php
		$data ['caste_bar'] == 'N' ? print "NO" : print "YES";
		?> 
		
		</td>
	</tr>

	<tr>
		<td>Job Description</td>
		<td>:</td>
		<td><?php
		echo $data ['mar_job'];
		?></td>
	</tr>



	<tr>
		<td>Education Description</td>
		<td>:</td>
		<td><?php
		echo $data ['mar_education'];
		?></td>
	</tr>

	<tr>
		<td>Family Location</td>
		<td>:</td>
		<td><?php
		echo $data ['mar_religion'];
		?></td>
	</tr>

	<tr>
		<td>Job Location</td>
		<td>:</td>
		<td><?php
		echo $data ['mar_joblo'];
		?></td>
	</tr>

	<tr>
		<td>Special Cases</td>
		<td>:</td>
		<td><?php
		echo $data ['special'];
		?></td>
	</tr>

	<tr>
		<td>Any Other Requirements</td>
		<td>:</td>
		<td><?php
		echo $data ['mar_other'];
		?></td>
	</tr>



	<tr>
		<td>Expectation About Life Partner</td>
		<td>:</td>
		<td><?php
		echo $data ['partner']?></td>
	</tr>
	<tr>

		<td
			style="text-align: left; color: blue; font-weight: bold; padding: 8px 0; text-transform: uppercase;"
			colspan="3">other details</td>
	</tr>
	
	<?php 
	$mysql = "SELECT golden,premium FROM personal_details WHERE id=".$person;
	$myresult = mysql_query($mysql);
	$row = mysql_fetch_array($myresult);
	
	if($row[0]=='Y'||$row[1]=='Y')
	{
	?>
	
	<tr>
		<td>Profile Registered By</td>
		<td>:</td>
		<td><?php
		echo $data ['register']?></td>
	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><?php
		echo $data ['name']?></td>
	</tr>

	<tr>
		<td>Phone</td>
		<td>:</td>
		<td><?php
		echo $data ['number']?></td>
	</tr>
<?php }else{?>
<tr>
		<td>Profile Registered By</td>
		<td>:</td>
		<td>********************</td>
	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td>********************</td>
	</tr>

	<tr>
		<td>Phone</td>
		<td>:</td>
		<td>********************</td>
	</tr>
<?php }?>
	<!--<tr>
		<td>Job Status</td>
		<td>:</td>
		<td><?php
		$data ['job_status'] == 'Y' ? print "Yes" : print "No";
		?></td>
	</tr>
	-->
	<!-- create some functions to get the details of whole table using person_id -->
	
	<?php
		$zql = "SELECT marriage FROM personal_details WHERE id=" . $person;
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
	
<!--<?php
		$sqlz = "SELECT gender FROM personal_details WHERE id=" . $person;
		$resultz = mysql_query ( $sqlz );
		$dataz = mysql_fetch_array ( $resultz );
		if ($dataz ['gender'] == 'B') {
			?>
<tr>
		<td align="center" colspan="3" style="padding: 20px;">
<?php
			if (empty ( $data ['photos'] )) {
				?>
<a href="#" style="margin: 0 50px 0 0px" id="sideleft"> </a>
<?php
			} else {
				?>
<a href="#" style="margin: 0 50px 0 0px" id="sideleft"> <img
			src="upload/<?php
				echo $data ['photos'];
				?>" height="106px"
			width="73px"></a>
<?php
			}
			if (empty ( $data ['photou'] )) {
				?>
<a href="#" style="margin: 0 50px" id="proimg"> </a> pro img 
<?php
			} else {
				?>
<a href="#" style="margin: 0 50px" id="proimg"> <img
			src="upload/<?php
				echo $data ['photou'];
				?>" height="106px"
			width="73px"></a> pro img 
<?php
			}
			if (empty ( $data ['photob'] )) {
				?>
<a href="#" style="margin: 0 50px" id="sideright"> </a>
<?php
			} else {
				?>
<a href="#" style="margin: 0 50px" id="sideright"> <img
			src="upload/<?php
				echo $data ['photob'];
				?>" height="106px"
			width="73px"></a>
<?php
			}
			?>
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
<a href="#" style="margin: 0 50px 0 0px" id="sideleft"> </a>
<?php
			} else {
				?>
<a href="#" style="margin: 0 50px 0 0px" id="sideleft"> <img
			src="upload/<?php
				echo $data ['photos'];
				?>" alt="PHOTO"
			height="106px" width="73px"></a>
<?php
			}
			if (empty ( $data ['photou'] )) {
				?>
<a href="#" style="margin: 0 50px" id="proimg"> </a> pro img 
<?php
			} else {
				?>
<a href="#" style="margin: 0 50px" id="proimg"> <img
			src="upload/<?php
				echo $data ['photou'];
				?>" alt="PHOTO"
			height="106px" width="73px"></a> pro img 
<?php
			}
			if (empty ( $data ['photob'] )) {
				?>
<a href="#" style="margin: 0 50px" id="sideright"> </a>
<?php
			} else {
				?>
<a href="#" style="margin: 0 50px" id="sideright"> <img
			src="upload/<?php
				echo $data ['photob'];
				?>" alt="PHOTO"
			height="106px" width="73px"></a>
<?php
			}
			?>
		</td>
	</tr>
	
	<?php
		}
		
		?>
	

-->
</table>


<?php
	}
}
if ($_GET ['msg'] == 'truephoto') {
	$url = $_GET ['data'];
	$auth = $_GET ['auth'];
	$id = $_GET ['idt'];
	if ($url == "") {
		$url = "default.jpg";
	}
	if ($auth == 'true') {
		echo $url;
	} else {
		if ($id == 'picture') {
			echo '
<img src="./upload/' . $url . '" alt="Change Image"  height="242px" width="205px"/>
<input type="hidden" value="' . $url . '" name="photo-' . $id . '" />
';
		} else if ($id == 'sideleft' || $id == 'proimg' || $id == 'sideright') {
			echo '
<img src="./upload/' . $url . '" alt="Change Image"  height="106px" width="73px"/>
<input type="hidden" value="' . $url . '" name="photo-' . $id . '" />
';
		}
	}
}
if ($_GET ['msg'] == 'truehoro') {
	$url = $_GET ['data'];
	$auth = $_GET ['auth'];
	$id = $_GET ['idt'];
	if ($url == "") {
		$url = "default.jpg";
	}
	if ($auth == 'true') {
		echo $url;
	} else {
		
		echo '
<img src="./upload/' . $url . '" alt="Change Horoscope"  height="100px" width="100px" id="opg"/>
<input type="hidden" value="' . $url . '" name="photo-' . $id . '" />
';
	
	}
}
if ($_GET ['msg'] == 'profileImage') {
	$key = $_GET ['key'];
	$id = $_SESSION ['who'];
	$sql = "UPDATE other SET profile_image='$key' WHERE person_id=" . $id;
	mysql_query ( $sql );
	echo "Y";

}
if ($_GET ['msg'] == 'profileImages') {
	$key = $_GET ['key'];
	$id = $_SESSION ['whose'];
	$sql = "UPDATE other SET profile_image='$key' WHERE person_id=" . $id;
	mysql_query ( $sql );
	echo "Y";

}
if ($_GET ['msg'] == 'adsearch') {
	?>
<table align="center" style="color: #000000; padding-top: 20px;">

	<tr>
		<td>Select</td>
		<td>:</td>
		<td align="left"><select class="select" id="gender">
<?php
	if (is_numeric ( $_SESSION ['who'] )) {
		$zql = "SELECT gender FROM personal_details WHERE id=" . $_SESSION ['who'];
		$result = mysql_query ( $zql );
		$data = mysql_fetch_array ( $result );
		if ($data [0] == 'B') {
			echo '<option value="G">VARAN</option>';
		}
		if ($data [0] == 'G') {
			echo '<option value="B">VADHU</option>';
		}
	} else {
		
		?>
	
			<option value="B">VADHU</option>
			<option value="G">VARAN</option><?php
	}
	?>
		</select></td>
	</tr>

	<tr>
		<td>Religion</td>
		<td>:</td>
		<td align="left"><select class="select" name="religion" id="religion"
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
	</tr>

	<tr>
		<td>Caste</td>
		<td>:</td>
		<td align="left"><select name="caste" id="caste" class="select"
			id="caste">
			<option value="">Caste</option>
		</select></td>
	</tr>

	<tr>
		<td colspan="4">
		<table>
			<tr>
				<td style="width: 66px">Height</td>
				<td>:</td>
				<td style="width: 150px">FROM <select name="" id="fromheight"
					class="select" style="width: 100px;">
					<option value="">--- Select ---</option>
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
				<td style="width: 150px">TO <select name="" id="toheight"
					class="select" style="width: 100px;">
					<option value="">--- Select ---</option>
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
		</table>
		</td>
	</tr>

	<tr>
		<td>Weight</td>
		<td>:</td>
		<td align="left">UPTO <select name="" id="weight" class="select">
			<option value="">Select Weight</option>
			<option value="30">30 Kg.</option>
			<option value="31">31 Kg.</option>
			<option value="32">32 Kg.</option>
			<option value="33">33 Kg.</option>
			<option value="34">34 Kg.</option>
			<option value="35">35 Kg.</option>
			<option value="36">36 Kg.</option>
			<option value="37">37 Kg.</option>
			<option value="38">38 Kg.</option>
			<option value="39">39 Kg.</option>
			<option value="40">40 Kg.</option>
			<option value="41">41 Kg.</option>
			<option value="42">42 Kg.</option>
			<option value="43">43 Kg.</option>
			<option value="44">44 Kg.</option>
			<option value="45">45 Kg.</option>
			<option value="46">46 Kg.</option>
			<option value="47">47 Kg.</option>
			<option value="48">48 Kg.</option>
			<option value="49">49 Kg.</option>
			<option value="50">50 Kg.</option>
			<option value="51">51 Kg.</option>
			<option value="52">52 Kg.</option>
			<option value="53">53 Kg.</option>
			<option value="54">54 Kg.</option>
			<option value="55">55 Kg.</option>
			<option value="56">56 Kg.</option>
			<option value="57">57 Kg.</option>
			<option value="58">58 Kg.</option>
			<option value="59">59 Kg.</option>
			<option value="60">60 Kg.</option>
			<option value="61">61 Kg.</option>
			<option value="62">62 Kg.</option>
			<option value="63">63 Kg.</option>
			<option value="64">64 Kg.</option>
			<option value="65">65 Kg.</option>
			<option value="66">66 Kg.</option>
			<option value="67">67 Kg.</option>
			<option value="68">68 Kg.</option>
			<option value="69">69 Kg.</option>
			<option value="70">70 Kg.</option>
			<option value="71">71 Kg.</option>
			<option value="72">72 Kg.</option>
			<option value="73">73 Kg.</option>
			<option value="74">74 Kg.</option>
			<option value="75">75 Kg.</option>
			<option value="76">76 Kg.</option>
			<option value="77">77 Kg.</option>
			<option value="78">78 Kg.</option>
			<option value="79">79 Kg.</option>
			<option value="80">80 Kg.</option>
			<option value="81">81 Kg.</option>
			<option value="82">82 Kg.</option>
			<option value="83">83 Kg.</option>
			<option value="84">84 Kg.</option>
			<option value="85">85 Kg.</option>
			<option value="86">86 Kg.</option>
			<option value="87">87 Kg.</option>
			<option value="88">88 Kg.</option>
			<option value="89">89 Kg.</option>
			<option value="90">90 Kg.</option>
			<option value="91">91 Kg.</option>
			<option value="92">92 Kg.</option>
			<option value="93">93 Kg.</option>
			<option value="94">94 Kg.</option>
			<option value="95">95 Kg.</option>
			<option value="96">96 Kg.</option>
			<option value="97">97 Kg.</option>
			<option value="98">98 Kg.</option>
			<option value="99">99 Kg.</option>
			<option value="100">100 Kg.</option>
			<option value="101">101 Kg.</option>
			<option value="102">102 Kg.</option>
			<option value="103">103 Kg.</option>
			<option value="104">104 Kg.</option>
			<option value="105">105 Kg.</option>
			<option value="106">106 Kg.</option>
			<option value="107">107 Kg.</option>
			<option value="108">108 Kg.</option>
			<option value="109">109 Kg.</option>
			<option value="110">110 Kg.</option>
			<option value="111">111 Kg.</option>
			<option value="112">112 Kg.</option>
			<option value="113">113 Kg.</option>
			<option value="114">114 Kg.</option>
			<option value="115">115 Kg.</option>
			<option value="116">116 Kg.</option>
			<option value="117">117 Kg.</option>
			<option value="118">118 Kg.</option>
			<option value="119">119 Kg.</option>
			<option value="120">120 Kg.</option>
			<option value="121">121 Kg.</option>
			<option value="122">122 Kg.</option>
			<option value="123">123 Kg.</option>
			<option value="124">124 Kg.</option>
			<option value="125">125 Kg.</option>
			<option value="126">126 Kg.</option>
			<option value="127">127 Kg.</option>
			<option value="128">128 Kg.</option>
			<option value="129">129 Kg.</option>
			<option value="130">130 Kg.</option>
		</select></td>
	</tr>

	<tr>
		<td colspan="4">
		<table>
			<tr>
				<td style="width: 66px;">Age</td>
				<td>:</td>
				<td style="width: 150px">FROM <select name="" class="select"
					id="agefrom" style="width: 100px;">
					<option value="">Select</option>
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
					<option value="32">32</option>
					<option value="33">33</option>
					<option value="34">34</option>
					<option value="35">35</option>
					<option value="36">36</option>
					<option value="37">37</option>
					<option value="38">38</option>
					<option value="39">39</option>
					<option value="40">40</option>
					<option value="41">41</option>
					<option value="42">42</option>
					<option value="43">43</option>
					<option value="44">44</option>
					<option value="45">45</option>
					<option value="46">46</option>
					<option value="47">47</option>
					<option value="48">48</option>
					<option value="49">49</option>
					<option value="50">50</option>
				</select></td>
				<td style="width: 150px;">TO <select name="" class="select"
					id="ageto" style="width: 100px;">
					<option value="">Select</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option selected value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
					<option value="32">32</option>
					<option value="33">33</option>
					<option value="34">34</option>
					<option value="35">35</option>
					<option value="36">36</option>
					<option value="37">37</option>
					<option value="38">38</option>
					<option value="39">39</option>
					<option value="40">40</option>
					<option value="41">41</option>
					<option value="42">42</option>
					<option value="43">43</option>
					<option value="44">44</option>
					<option value="45">45</option>
					<option value="46">46</option>
					<option value="47">47</option>
					<option value="48">48</option>
					<option value="49">49</option>
					<option value="50">50</option>
				</select></td>
			</tr>
		</table>
		</td>
	</tr>

	<tr>
		<td>Status</td>
		<td>:</td>
		<td align="left"><select class="select" id="status">
			<option value="">Select</option>
			<option value="U">Single</option>
			<option value="D">Divorced</option>
			<option value="W">Widowed</option>
			<option value="S">Seperated</option>
		</select></td>
	</tr>

	<!--<tr>
		<td>Arrears</td>
		<td>:</td>
		<td align="left"><select class="select" id="arrears">
			<option value="">Select</option>
			<option value="Y">Yes</option>
			<option value="N">No</option>
		</select></td>
	</tr>

	-->
	<tr>
		<td>Job Status</td>
		<td align="left">:</td>
		<td align="left"><select id="job" class="select">
			<option value="">Any</option>
			<option value="Y">Yes</option>
			<option value="N">No</option>
		</select></td>
	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td align="left"><input type="text" class="textbox" value="" id="name" /></td>
	</tr>

	<tr>
		<td>Location</td>
		<td>:</td>
		<td align="left"><input type="text" name="" id="location" value=""
			class="textbox" /></td>
	</tr>

	<tr>

		<td colspan="4">Profiles with Photo Only<input type="checkbox" name=""
			id="photo" value="ticked" /></td>
	</tr>

	<tr>

		<td colspan="4"><input type="button" name="" onclick="googleIt()"
			class="button" value="Search Now" /></td>
	</tr>

	<tr>
		<td colspan="4" id="searchresults" style="padding: 30px;"></td>
	</tr>

</table>

<?php
}
if ($_GET ['msg'] == 'advanced') {
	$sbn = $_GET ['val'];
	$arsbn = explode ( "|", $sbn );
	//echo '<b style="color:red" onmouseover="hideDialog()">Your Request will be Processed Shortly.!</b>';
	

	/*
	 * gender+"0"+religion+"1"+caste+"2"+fromheight+"3"+toheight+"4"+weight+"5"+agefrom+"6"+ageto+"7"+
	 * status+"8"+arrears+"9"+job+"10"+name+"11"+location+"12"+photo;
	 */
	
	/*
	 * 0,1,2,6,7,8,11,12--p-R
	 * 3,4,5----ph_r
	 * 9,10,13 --otr
	 */
	$sql = "SELECT * FROM personal_details LEFT JOIN physical_details ON personal_details.id=physical_details.person_id
		  LEFT JOIN other ON personal_details.id=other.person_id WHERE ";
	
	if (! empty ( $arsbn [0] )) {
		$sql .= "personal_details.gender='$arsbn[0]' "; //gender
	}
	
	if (! empty ( $arsbn [1] )) {
		$sql .= " AND personal_details.religion='$arsbn[1]' ";
	}
	
	if (! empty ( $arsbn [2] )) {
		$sql .= " AND personal_details.caste='$arsbn[2]'  ";
	}
	
	if (! empty ( $arsbn [6] ) && ! empty ( $arsbn [7] )) {
		$sql .= " AND personal_details.age BETWEEN $arsbn[6] AND $arsbn[7]   ";
	}
	
	if (! empty ( $arsbn [8] )) {
		$sql .= " AND personal_details.marriage='$arsbn[8]'  ";
	}
	
	if (! empty ( $arsbn [10] )) {
		$sql .= " AND personal_details.name LIKE '%$arsbn[10]%' ";
	}
	
	if (! empty ( $arsbn [11] )) {
		$sql .= " AND personal_details.city LIKE '%$arsbn[11]%' ";
	}
	if (! empty ( $arsbn [3] ) && ! empty ( $arsbn [4] )) {
		$sql .= " AND physical_details.height BETWEEN $arsbn[3] AND $arsbn[4] ";
	}
	if (! empty ( $arsbn [5] )) {
		$sql .= " AND physical_details.weight < $arsbn[5]";
	}
	/*if (! empty ( $arsbn [9] )) {
		if ($arsbn [9] == 'Y') {
			$sql .= " AND other.arrears!='' ";
		}
		if ($arsbn [9] == 'N') {
			$sql .= " AND other.arrears='' ";
		}
	}*/
	if (! empty ( $arsbn [9] )) {
		if ($arsbn [9] == 'Y') {
			$sql .= " AND other.job_status='Y'";
		}
		if ($arsbn [9] == 'N') {
			$sql .= " AND other.job_status='N'";
		}
	}
	if ($arsbn [12] == 'true') {
		$sql .= " AND other.profile_image!=''";
	}
	
	$sql .= " AND personal_details.guest='Y' AND personal_details.visibility='Y' ";
	
	$result = mysql_query ( $sql ) or die ( mysql_error () );
	$cnt = mysql_num_rows ( $result );
	
	if ($cnt > 0) {
		$_SESSION ['query'] = $sql;
		echo '<p style="color:blue;font-weight:bold;">You have found ' . $cnt . ' Search Result(s)</p>
		 
			<a href="javascript:void showSearchDetails(1)" style="text-decoration:none;">Click Here to View the Profile(s)</a>';
	} else {
		echo '<b style="color:red;">No Results Found.!</b>
	  <input type="hidden" id="sql" value="' . $sql . '" />';
	}
}
if ($_GET ['msg'] == 'detailsearch') {
	$sqlz = $_SESSION ['query'];
	$cur = $_GET ['cur'];
	if ($cur == 0 || empty ( $cur )) {
		$cur = 1;
		$pre = 0;
		$nxt = 2;
	}
	
	$limit = 8;
	$begin = ($cur - 1) * $limit;
	$sqlz = stripslashes ( $sqlz );
	$rezultz = mysql_query ( $sqlz ) or die ( mysql_error () );
	$row = mysql_num_rows ( $rezultz );
	$sql = $sqlz . " ORDER BY personal_details.id LIMIT $begin , $limit ";
	$rezult = mysql_query ( $sql ) or die ( mysql_error () );
	// $row = mysql_num_rows($rezult);
	//echo $row;
	/////////Set the image box and display the text ssooon
	$k = 1;
	
	$total = ceil ( $row / $limit );
	
	?>
<div id="container"
	style="width: 100%; height: 500px; position: relative;"><input
	type="hidden" id="sql" value="" />
<?php
	while ( $data = mysql_fetch_array ( $rezult ) ) {
		?>
<div id="div<?php
		echo $k;
		?>"
	style="position: absolute; bottom: 0; width: 190px; height: 230px;">
<?php
		if ($data ['profile_image'] == '') {
			if ($data ['gender'] == 'B') {
				?>
	<img src="images/girl.png" width="140px" height="160px" alt="PHOTO" />

	<?php
			} else {
				?>
<img src="images/boy.png" width="140px" height="160px" alt="PHOTO" />
<?php
			}
		} else {
			if ($data ['profile_image'] == 'YR') {
				?>
<img src="upload/<?php
				echo $data ['photos']?>" width="140px"
	height="160px" alt="PHOTO" />
<?php
			}
			if ($data ['profile_image'] == 'YC') {
				?>
<img src="upload/<?php
				echo $data ['photou']?>" width="140px"
	height="160px" alt="PHOTO" />
<?php
			}
			if ($data ['profile_image'] == 'YL') {
				?>
<img src="upload/<?php
				echo $data ['photob']?>" width="140px"
	height="160px" alt="PHOTO" />
<?php
			}
		}
		?>
<div><?php
		echo $data [2]?></div>
<div>Age : <?php
		echo $data ['age']?></div>
<a href="javascript:void checkProfile(<?php
		echo $data [0]?>)"
	style="text-align: right; padding-left: 70px">View Full Profile</a><a
	id="test" href="#123456"></a></div>
<?php
		$k ++;
	
	}
	if ($total > 1) { //////////set the number of the division by calculating the page.
		$z = "";
		for($i = 1; $i <= $total; $i ++) {
			if ($i == $cur) //put the link for the next and put a non link to  the current pa
#put the same link call the value as the parrametere to pas through the functrion to show\
			#the next page#fdgf#fg//gdsgf/rfer
			{
				$z = $z . '<button type="button">' . $i . '</button>';
			} else {
				$z = $z . '<button type="button" onclick="showSearchDetails(' . $i . ')">' . $i . '</button>';
				;
			}
		}
		?>
<div
	style="bottom: 10px; position: absolute; text-align: center; width: 100%;"><?php
		echo $z;
		?></div>
<?php
	}
	
	?>
</div>
<div id="proshow" style="position: relative; width: 100%"></div>
<?php
}
if ($_GET ['msg'] == 'procheck') {
	$id = $_GET ['val'];
	$sql = "SELECT * FROM personal_details WHERE id=" . $id;
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		while ( $row = mysql_fetch_array ( $result ) ) {
			$guest = $row ['guest'];
			$gold = $row ['golden'];
			$premi = $row ['premium'];
		
		}
	}
	if ($guest == 'Y' && $gold != 'Y' && $premi != 'Y') {
		echo "guest|" . $id;
	}
	if ($guest == 'Y' && $gold == 'Y') {
		echo "gold|" . $id;
	}
	if ($guest == 'Y' && $premi == 'Y') {
		echo "premium|" . $id;
	}
}
if ($_GET ['profile'] == 'premium') {
	#add links to the xps intrst,reqst cntct,
	#check the id for which is either premium or not
	$id = $_GET ['num'];
	$sql = "SELECT * FROM personal_details WHERE id=" . $id;
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		while ( $row = mysql_fetch_array ( $result ) ) {
			$premi = $row ['premium'];
		}
	}
	if ($premi == 'Y') {
		$sqlz = "SELECT * FROM  personal_details LEFT JOIN physical_details ON personal_details.id=physical_details.person_id LEFT JOIN family ON personal_details.id=family.person_id LEFT JOIN horoscope ON personal_details.id=horoscope.person_id LEFT JOIN other ON personal_details.id=other.person_id LEFT JOIN qualification ON personal_details.id=qualification.person_id WHERE personal_details.visibility='Y' AND  personal_details.id=" . $id;
		$resultz = mysql_query ( $sqlz ) or die ( mysql_error () );
		while ( $data = mysql_fetch_array ( $resultz ) ) {
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
<table align="center" cellspacing="3" cellpadding="3"
	style="color: #3F3FA6" onmouseover="showLinks()">

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Personal
		Details<a href="#" name="123456"></a> <input type="hidden" id="person"
			value="<?php
			echo $data [0];
			?>" /> <input type="hidden" id="cipher"
			value="<?php
			echo sha1 ( $data [0] );
			?>" /> <input type="hidden" id="prefunction" value="0" />
		<div id="ban"></div>
		</td>

	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><?php
			echo $data [2];
			?></td>
	</tr>

	<tr>
		<td>Gender</td>
		<td>:</td>
		<td><?php
			$data ['gender'] == 'B' ? print "VADHU" : print "VARAN";
			?></td>
	</tr>

	<tr>
		<td>Status</td>
		<td>:</td>
		<td><?php
			$data ['marriage'] == 'U' ? print "Unmarried" : print "";
			$data ['marriage'] == 'D' ? print "Divorced" : print "";
			$data ['marriage'] == 'W' ? print "Widowed" : print "";
			$data ['marriage'] == 'S' ? print "Seperated" : print "";
			?></td>
	</tr>

	<tr>
		<td>Religion</td>
		<td>:</td>
		<td>
<?php
			if ($data ['religion'] == 'chri') {
				echo "Christian";
			}
			if ($data ['religion'] == 'hind') {
				echo "Hindu";
			}
			if ($data ['religion'] == 'inte') {
				echo "Inter Caste";
			}
			if ($data ['religion'] == 'jain') {
				echo "Jain";
			}
			if ($data ['religion'] == 'musl') {
				echo "Muslim";
			}
			if ($data ['religion'] == 'sikh') {
				echo "Sikh";
			}
			if ($data ['religion'] == 'nore') {
				echo "No Religion";
			}
			if ($data ['religion'] == 'othe') {
				echo "Others";
			}
			?> 
</td>
	</tr>

	<tr>
		<td>Caste</td>
		<td>:</td>
		<td><?php
			echo $data ['caste'];
			?></td>
	</tr>

	<tr>
		<td>Date of Birth</td>
		<td>:</td>
		<td><?php
			echo $data [4];
			?></td>
	</tr>

	<tr>
		<td>Age</td>
		<td>:</td>
		<td><?php
			echo $data ['age'];
			?></td>
	</tr>

	<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php
			echo $data ['present'];
			?></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
			echo $data [10];
			?></td>
	</tr>

	<tr>
		<td>Pincode</td>
		<td>:</td>
		<td><?php
			echo $data ['pin'];
			?></td>
	</tr>

	<tr>
		<td>City</td>
		<td>:</td>
		<td><?php
			echo $data ['city'];
			?></td>
	</tr>

	<tr>
		<td>District</td>
		<td>:</td>
		<td><?php
			echo $data ['district'];
			?></td>
	</tr>

	<tr>
		<td>State</td>
		<td>:</td>
		<td><?php
			echo $data ['state'];
			?></td>
	</tr>

	<tr>
		<td>Country</td>
		<td>:</td>
		<td><?php
			echo $data ['country'];
			?></td>
	</tr>

	<tr>
		<td>TelePhone</td>
		<td>:</td>
		<td><?php
			echo $data ['telephone'];
			?></td>
	</tr>

	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><?php
			echo $data ['mobile'];
			?></td>
	</tr>

	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php
			echo $data ['email'];
			?></td>
	</tr>


	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Physical
		Details</td>

	</tr>

	<tr>
		<td>Body</td>
		<td>:</td>
		<td><?php
			echo $data ['body'];
			?></td>
	</tr>

	<tr>
		<td>Diet</td>
		<td>:</td>
		<td><?php
			echo $data ['diet'];
			?></td>
	</tr>

	<tr>
		<td>Height</td>
		<td>:</td>
		<td><?php
			echo $hgt [$data ['height']];
			?></td>
	</tr>
	<tr>
		<td>Weight</td>
		<td>:</td>
		<td><?php
			echo $data ['weight'];
			?></td>
	</tr>
	<tr>
		<td>Complexion</td>
		<td>:</td>
		<td><?php
			echo $data ['complexion'];
			?></td>
	</tr>

	<tr>
		<td>Health</td>
		<td>:</td>
		<td><?php
			echo $data ['health'];
			?></td>
	</tr>

	<tr>
		<td>Blood</td>
		<td>:</td>
		<td><?php
			echo $data ['blood'];
			?></td>
	</tr>

	<tr>
		<td>Disability</td>
		<td>:</td>
		<td><?php
			$data ['disability'] == 'Y' ? print "Yes" : print "No";
			?></td>
	</tr>
<?php
			if ($data ['disability'] == 'Y') {
				?>
	<tr>
		<td>Details</td>
		<td>:</td>
		<td><?php
				echo $data ['details'];
				?></td>
	</tr>
<?php
			}
			?>
	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Education
		&amp; Job</td>

	</tr>

	<tr>
		<td>Highest Education</td>
		<td>:</td>
		<td><?php
			echo $data ['education'];
			?></td>
	</tr>

	<tr>
		<td>Institute</td>
		<td>:</td>
		<td><?php
			echo $data ['institute'];
			?></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
			echo $data ['place'];
			?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
			echo $data ['period'];
			?></td>
	</tr>

	<tr>
		<td>Present Employer</td>
		<td>:</td>
		<td><?php
			echo $data ['employer'];
			?></td>
	</tr>

	<tr>
		<td>Designation</td>
		<td>:</td>
		<td><?php
			echo $data ['designation'];
			?></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
			echo $data ['location'];
			?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
			echo $data ['duration'];
			?></td>
	</tr>

	<tr>
		<td>Previous Employer</td>
		<td>:</td>
		<td><?php
			echo $data ['last_employer'];
			?></td>
	</tr>

	<tr>
		<td>Location</td>
		<td>:</td>
		<td><?php
			echo $data ['last_location'];
			?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
			echo $data ['last_duration'];
			?></td>
	</tr>

	<tr>
		<td>Salary</td>
		<td>:</td>
		<td><?php
			echo $data ['salary'];
			?></td>
	</tr>

	<tr>
		<td>Income</td>
		<td>:</td>
		<td><?php
			echo $data ['income'];
			?></td>
	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Family
		Details</td>

	</tr>

	<tr>
		<td>Family Members</td>
		<td>:</td>
		<td><?php
			echo $data ['total'];
			?></td>
	</tr>

	<tr>
		<td>Father</td>
		<td>:</td>
		<td><?php
			echo $data ['father'];
			?></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><?php
			echo $data ['fjob'];
			?></td>
	</tr>

	<tr>
		<td>Mother</td>
		<td>:</td>
		<td><?php
			echo $data ['mother'];
			?></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><?php
			echo $data ['mjob'];
			?></td>
	</tr>

	<tr>
		<td>Brother(s)</td>
		<td>:</td>
		<td><?php
			echo $data ['brother'];
			?></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><?php
			echo $data ['bmarried'];
			?></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><?php
			echo $data ['bunmarried'];
			?></td>
	</tr>

	<tr>
		<td>Sister(s)</td>
		<td>:</td>
		<td><?php
			echo $data ['sister'];
			?></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><?php
			echo $data ['smarried'];
			?></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><?php
			echo $data ['sunmarried'];
			?></td>
	</tr>

	<tr>
		<td>Other Family Member(s) Details</td>
		<td>:</td>
		<td><?php
			echo $data ['other'];
			?></td>
	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Horoscope</td>

	</tr>

	<tr>
		<td>Birth Star</td>
		<td>:</td>
		<td><?php
			echo $data ['star'];
			?></td>
	</tr>

	<tr>
		<td>Date of Birth</td>
		<td>:</td>
		<td><?php
			echo $data ['dob'];
			?></td>
	</tr>

	<tr>
		<td>Time of Birth</td>
		<td>:</td>
		<td><?php
			echo $data ['tob'];
			?></td>
	</tr>

	<tr>
		<td>Place of Birth</td>
		<td>:</td>
		<td><?php
			echo $data ['pob'];
			?></td>
	</tr>

	<tr>
		<td>Rasi</td>
		<td>:</td>
		<td><?php
			echo $data ['rasi'];
			?></td>
	</tr>

	<tr>
		<td>Janma Sista Dasa</td>
		<td>:</td>
		<td><?php
			echo $data ['sista_dasa'];
			?></td>
	</tr>

	<tr>
		<td>Janma Sista Dasa End</td>
		<td>:</td>
		<td><?php
			echo $data ['dasa_end'];
			?></td>
	</tr>

	<tr>
		<td>Other Details</td>
		<td>:</td>
		<td><?php
			echo $data ['other'];
			?></td>
	</tr>
	<tr>
		<td>Horoscope</td>
		<td>:</td>
		<td><img src="../upload/<?php
			echo $data ['horo'];
			?>"
			width="100px" height="100px" onmousemove="show('horo_one')"
			onmouseout="hide('horo_one')" /></td>
	</tr>


<?php
			$horoarray = $data ['horobox'];
			$horoarray = explode ( "|", $horoarray );
			?>

<tr style="">
		<td>

		<table id="horoone"
			style="width: 300px; height: 250px; padding-top: 25px">
			<tr>
				<td><?php
			echo $horoarray [0];
			?></td>
				<td><?php
			echo $horoarray [1];
			?></td>
				<td><?php
			echo $horoarray [2];
			?></td>
				<td><?php
			echo $horoarray [3];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [4];
			?></td>
				<td
					style="text-align: center; background-color: #FEB914; font-weight: bold"
					rowspan="2" colspan="2">Rasi Grahanila</td>
				<td><?php
			echo $horoarray [5];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [6];
			?></td>
				<td><?php
			echo $horoarray [7];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [8];
			?></td>
				<td><?php
			echo $horoarray [9];
			?></td>
				<td><?php
			echo $horoarray [10];
			?></td>
				<td><?php
			echo $horoarray [11];
			?></td>
			</tr>
		</table>
		</td>

		<td width="20px"></td>
		<td>

		<table id="horotwo"
			style="width: 300px; height: 250px; padding-top: 25px">
			<tr>
				<td><?php
			echo $horoarray [12];
			?></td>
				<td><?php
			echo $horoarray [13];
			?></td>
				<td><?php
			echo $horoarray [14];
			?></td>
				<td><?php
			echo $horoarray [15];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [16];
			?></td>
				<td
					style="text-align: center; background-color: #FEB914; font-weight: bold"
					rowspan="2" colspan="2">Navamsakam</td>
				<td><?php
			echo $horoarray [17];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [18];
			?></td>
				<td><?php
			echo $horoarray [19];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [20];
			?></td>
				<td><?php
			echo $horoarray [21];
			?></td>
				<td><?php
			echo $horoarray [22];
			?></td>
				<td><?php
			echo $horoarray [23];
			?></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Other
		Details</td>

	</tr>

	<tr>
		<td>Expectation About Life Partner</td>
		<td>:</td>
		<td><?php
			echo $data ['partner']?></td>
	</tr>

	<tr>
		<td>Registered By</td>
		<td>:</td>
		<td><?php
			echo $data ['register']?></td>
	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><?php
			echo $data ['name']?></td>
	</tr>

	<tr>
		<td>Phone</td>
		<td>:</td>
		<td><?php
			echo $data ['number']?></td>
	</tr>

	<tr>
		<td colspan="3" style="padding-left: 180px"><img
			src="../upload/<?php
			echo $data ['photos']?>" width="100px"
			height="100px" alt="" onmousemove="show('photo_one')"
			onmouseout="hide('photo_one')"
			onload="javascript:document.getElementById(&quot;test&quot;).click();"
			onerror="javascript:document.getElementById(&quot;test&quot;).click();"
			style="float: left; position: absolute; top: 0px; left: 15px; top: 40px; color: red;" />
		<img src="../upload/<?php
			echo $data ['photou']?>" width="100px"
			height="100px" alt="" onmousemove="show('photo_two')"
			onerror="javascript:document.getElementById(&quot;test&quot;).click();"
			onmouseout="hide('photo_two')"
			onload="javascript:document.getElementById(&quot;test&quot;).click();"
			style="float: left; position: absolute; top: 0px; left: 15px; top: 150px; color: red;" />
		<img src="../upload/<?php
			echo $data ['photob']?>" width="100px"
			onerror="javascript:document.getElementById(&quot;test&quot;).click();"
			height="100px" alt=""
			onload="javascript:document.getElementById(&quot;test&quot;).click();"
			onmousemove="show('photo_three')" onmouseout="hide('photo_three')"
			style="float: left; position: absolute; top: 0px; left: 15px; top: 260px; color: red;" /></td>
	</tr>

</table>
<div
	style="visibility: hidden; width: 500px; height: 500px; position: absolute; left: 300px; top: 0px;"
	id="horo_one"><img src="../upload/<?php
			echo $data ['horo']?>"
	width="490px" height="490px" /></div>
<div
	style="visibility: hidden; width: 500px; height: 500px; position: absolute; left: 300px; top: 0px;"
	id="photo_one"><img src="../upload/<?php
			echo $data ['photos']?>"
	width="490px" height="490px" /></div>
<div
	style="visibility: hidden; width: 500px; height: 500px; position: absolute; left: 300px; top: 0px;"
	id="photo_two"><img src="../upload/<?php
			echo $data ['photou']?>"
	width="490px" height="490px" /></div>
<div
	style="visibility: hidden; width: 500px; height: 500px; position: absolute; left: 300px; top: 0px;"
	id="photo_three"><img src="../upload/<?php
			echo $data ['photob']?>"
	width="490px" height="490px" /></div>
<?php
		}
		
	//echo $id;
	}
	
//echo "Premium Profile".$_GET['num'];
}
if ($_GET ['profile'] == 'golden') {
	
	#check the id for which is either premium or not
	$id = $_GET ['num'];
	$sql = "SELECT * FROM personal_details WHERE id=" . $id;
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		while ( $row = mysql_fetch_array ( $result ) ) {
			$premi = $row ['golden'];
		}
	}
	if ($premi == 'Y') {
		$sqlz = "SELECT * FROM  personal_details LEFT JOIN physical_details ON personal_details.id=physical_details.person_id LEFT JOIN family ON personal_details.id=family.person_id LEFT JOIN horoscope ON personal_details.id=horoscope.person_id LEFT JOIN other ON personal_details.id=other.person_id LEFT JOIN qualification ON personal_details.id=qualification.person_id WHERE personal_details.visibility='Y' AND personal_details.id=" . $id;
		$resultz = mysql_query ( $sqlz ) or die ( mysql_error () );
		while ( $data = mysql_fetch_array ( $resultz ) ) {
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
<table align="center" cellspacing="3" cellpadding="3"
	style="color: #3F3FA6" onmouseover="showLinks()">

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Personal
		Details<a href="#" name="123456"></a> <input type="hidden" id="person"
			value="<?php
			echo $data [0];
			?>" /> <input type="hidden" id="cipher"
			value="<?php
			echo sha1 ( $data [0] );
			?>" /> <input type="hidden" id="prefunction" value="0" />
		<div id="ban"></div>
		</td>

	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><?php
			echo $data [2];
			?></td>
	</tr>

	<tr>
		<td>Gender</td>
		<td>:</td>
		<td><?php
			$data ['gender'] == 'B' ? print "VADHU" : print "VARAN";
			?></td>
	</tr>

	<tr>
		<td>Status</td>
		<td>:</td>
		<td><?php
			$data ['marriage'] == 'U' ? print "Unmarried" : print "";
			$data ['marriage'] == 'D' ? print "Divorced" : print "";
			$data ['marriage'] == 'W' ? print "Widowed" : print "";
			$data ['marriage'] == 'S' ? print "Seperated" : print "";
			?></td>
	</tr>

	<tr>
		<td>Religion</td>
		<td>:</td>
		<td>
<?php
			if ($data ['religion'] == 'chri') {
				echo "Christian";
			}
			if ($data ['religion'] == 'hind') {
				echo "Hindu";
			}
			if ($data ['religion'] == 'inte') {
				echo "Inter Caste";
			}
			if ($data ['religion'] == 'jain') {
				echo "Jain";
			}
			if ($data ['religion'] == 'musl') {
				echo "Muslim";
			}
			if ($data ['religion'] == 'sikh') {
				echo "Sikh";
			}
			if ($data ['religion'] == 'nore') {
				echo "No Religion";
			}
			if ($data ['religion'] == 'othe') {
				echo "Others";
			}
			?> 
</td>
	</tr>

	<tr>
		<td>Caste</td>
		<td>:</td>
		<td><?php
			echo $data ['caste'];
			?></td>
	</tr>

	<tr>
		<td>Date of Birth</td>
		<td>:</td>
		<td><?php
			echo $data [4];
			?></td>
	</tr>

	<tr>
		<td>Age</td>
		<td>:</td>
		<td><?php
			echo $data ['age'];
			?></td>
	</tr>

	<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php
			echo $data ['present'];
			?></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
			echo $data [10];
			?></td>
	</tr>

	<tr>
		<td>Pincode</td>
		<td>:</td>
		<td><?php
			echo $data ['pin'];
			?></td>
	</tr>

	<tr>
		<td>City</td>
		<td>:</td>
		<td><?php
			echo $data ['city'];
			?></td>
	</tr>

	<tr>
		<td>District</td>
		<td>:</td>
		<td><?php
			echo $data ['district'];
			?></td>
	</tr>

	<tr>
		<td>State</td>
		<td>:</td>
		<td><?php
			echo $data ['state'];
			?></td>
	</tr>

	<tr>
		<td>Country</td>
		<td>:</td>
		<td><?php
			echo $data ['country'];
			?></td>
	</tr>

	<tr>
		<td>TelePhone</td>
		<td>:</td>
		<td><?php
			echo $data ['telephone'];
			?></td>
	</tr>

	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><?php
			echo $data ['mobile'];
			?></td>
	</tr>

	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php
			echo $data ['email'];
			?></td>
	</tr>


	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Physical
		Details</td>

	</tr>

	<tr>
		<td>Body</td>
		<td>:</td>
		<td><?php
			echo $data ['body'];
			?></td>
	</tr>

	<tr>
		<td>Diet</td>
		<td>:</td>
		<td><?php
			echo $data ['diet'];
			?></td>
	</tr>

	<tr>
		<td>Height</td>
		<td>:</td>
		<td><?php
			echo $hgt [$data ['height']];
			?></td>
	</tr>
	<tr>
		<td>Weight</td>
		<td>:</td>
		<td><?php
			echo $data ['weight'];
			?></td>
	</tr>
	<tr>
		<td>Complexion</td>
		<td>:</td>
		<td><?php
			echo $data ['complexion'];
			?></td>
	</tr>

	<tr>
		<td>Health</td>
		<td>:</td>
		<td><?php
			echo $data ['health'];
			?></td>
	</tr>

	<tr>
		<td>Blood</td>
		<td>:</td>
		<td><?php
			echo $data ['blood'];
			?></td>
	</tr>

	<tr>
		<td>Disability</td>
		<td>:</td>
		<td><?php
			$data ['disability'] == 'Y' ? print "Yes" : print "No";
			?></td>
	</tr>
<?php
			if ($data ['disability'] == 'Y') {
				?>
	<tr>
		<td>Details</td>
		<td>:</td>
		<td><?php
				echo $data ['details'];
				?></td>
	</tr>
<?php
			}
			?>
	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Education
		&amp; Job</td>

	</tr>

	<tr>
		<td>Highest Education</td>
		<td>:</td>
		<td><?php
			echo $data ['education'];
			?></td>
	</tr>

	<tr>
		<td>Institute</td>
		<td>:</td>
		<td><?php
			echo $data ['institute'];
			?></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
			echo $data ['place'];
			?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
			echo $data ['period'];
			?></td>
	</tr>

	<tr>
		<td>Present Employer</td>
		<td>:</td>
		<td><?php
			echo $data ['employer'];
			?></td>
	</tr>

	<tr>
		<td>Designation</td>
		<td>:</td>
		<td><?php
			echo $data ['designation'];
			?></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
			echo $data ['location'];
			?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
			echo $data ['duration'];
			?></td>
	</tr>

	<tr>
		<td>Previous Employer</td>
		<td>:</td>
		<td><?php
			echo $data ['last_employer'];
			?></td>
	</tr>

	<tr>
		<td>Location</td>
		<td>:</td>
		<td><?php
			echo $data ['last_location'];
			?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
			echo $data ['last_duration'];
			?></td>
	</tr>

	<tr>
		<td>Salary</td>
		<td>:</td>
		<td><?php
			echo $data ['salary'];
			?></td>
	</tr>

	<tr>
		<td>Income</td>
		<td>:</td>
		<td><?php
			echo $data ['income'];
			?></td>
	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Family
		Details</td>

	</tr>

	<tr>
		<td>Family Members</td>
		<td>:</td>
		<td><?php
			echo $data ['total'];
			?></td>
	</tr>

	<tr>
		<td>Father</td>
		<td>:</td>
		<td><?php
			echo $data ['father'];
			?></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><?php
			echo $data ['fjob'];
			?></td>
	</tr>

	<tr>
		<td>Mother</td>
		<td>:</td>
		<td><?php
			echo $data ['mother'];
			?></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><?php
			echo $data ['mjob'];
			?></td>
	</tr>

	<tr>
		<td>Brother(s)</td>
		<td>:</td>
		<td><?php
			echo $data ['brother'];
			?></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><?php
			echo $data ['bmarried'];
			?></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><?php
			echo $data ['bunmarried'];
			?></td>
	</tr>

	<tr>
		<td>Sister(s)</td>
		<td>:</td>
		<td><?php
			echo $data ['sister'];
			?></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><?php
			echo $data ['smarried'];
			?></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><?php
			echo $data ['sunmarried'];
			?></td>
	</tr>

	<tr>
		<td>Other Family Member(s) Details</td>
		<td>:</td>
		<td><?php
			echo $data ['other'];
			?></td>
	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Horoscope</td>

	</tr>

	<tr>
		<td>Birth Star</td>
		<td>:</td>
		<td><?php
			echo $data ['star'];
			?></td>
	</tr>

	<tr>
		<td>Date of Birth</td>
		<td>:</td>
		<td><?php
			echo $data ['dob'];
			?></td>
	</tr>

	<tr>
		<td>Time of Birth</td>
		<td>:</td>
		<td><?php
			echo $data ['tob'];
			?></td>
	</tr>

	<tr>
		<td>Place of Birth</td>
		<td>:</td>
		<td><?php
			echo $data ['pob'];
			?></td>
	</tr>

	<tr>
		<td>Rasi</td>
		<td>:</td>
		<td><?php
			echo $data ['rasi'];
			?></td>
	</tr>

	<tr>
		<td>Janma Sista Dasa</td>
		<td>:</td>
		<td><?php
			echo $data ['sista_dasa'];
			?></td>
	</tr>

	<tr>
		<td>Janma Sista Dasa End</td>
		<td>:</td>
		<td><?php
			echo $data ['dasa_end'];
			?></td>
	</tr>

	<tr>
		<td>Other Details</td>
		<td>:</td>
		<td><?php
			echo $data ['other'];
			?></td>
	</tr>
	<tr>
		<td>Horoscope</td>
		<td>:</td>
		<td><img src="../upload/<?php
			echo $data ['horo'];
			?>"
			width="100px" height="100px" onmousemove="show('horo_one')"
			onmouseout="hide('horo_one')" /></td>
	</tr>


<?php
			$horoarray = $data ['horobox'];
			$horoarray = explode ( "|", $horoarray );
			?>

<tr style="">
		<td>

		<table id="horoone"
			style="width: 300px; height: 250px; padding-top: 25px">
			<tr>
				<td><?php
			echo $horoarray [0];
			?></td>
				<td><?php
			echo $horoarray [1];
			?></td>
				<td><?php
			echo $horoarray [2];
			?></td>
				<td><?php
			echo $horoarray [3];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [4];
			?></td>
				<td
					style="text-align: center; background-color: #FEB914; font-weight: bold"
					rowspan="2" colspan="2">Rasi Grahanila</td>
				<td><?php
			echo $horoarray [5];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [6];
			?></td>
				<td><?php
			echo $horoarray [7];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [8];
			?></td>
				<td><?php
			echo $horoarray [9];
			?></td>
				<td><?php
			echo $horoarray [10];
			?></td>
				<td><?php
			echo $horoarray [11];
			?></td>
			</tr>
		</table>
		</td>

		<td width="20px"></td>
		<td>

		<table id="horotwo"
			style="width: 300px; height: 250px; padding-top: 25px">
			<tr>
				<td><?php
			echo $horoarray [12];
			?></td>
				<td><?php
			echo $horoarray [13];
			?></td>
				<td><?php
			echo $horoarray [14];
			?></td>
				<td><?php
			echo $horoarray [15];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [16];
			?></td>
				<td
					style="text-align: center; background-color: #FEB914; font-weight: bold"
					rowspan="2" colspan="2">Navamsakam</td>
				<td><?php
			echo $horoarray [17];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [18];
			?></td>
				<td><?php
			echo $horoarray [19];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [20];
			?></td>
				<td><?php
			echo $horoarray [21];
			?></td>
				<td><?php
			echo $horoarray [22];
			?></td>
				<td><?php
			echo $horoarray [23];
			?></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Other
		Details</td>

	</tr>

	<tr>
		<td>Expectation About Life Partner</td>
		<td>:</td>
		<td><?php
			echo $data ['partner']?></td>
	</tr>

	<tr>
		<td>Registered By</td>
		<td>:</td>
		<td><?php
			echo $data ['register']?></td>
	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><?php
			echo $data ['name']?></td>
	</tr>

	<tr>
		<td>Phone</td>
		<td>:</td>
		<td><?php
			echo $data ['number']?></td>
	</tr>

	<tr>
		<td colspan="3" style="padding-left: 180px"><img
			src="../upload/<?php
			echo $data ['photos']?>" width="100px"
			height="100px" alt="" onmousemove="show('photo_one')"
			onmouseout="hide('photo_one')"
			onload="javascript:document.getElementById(&quot;test&quot;).click();"
			onerror="javascript:document.getElementById(&quot;test&quot;).click();"
			style="float: left; position: absolute; top: 0px; left: 15px; top: 40px; color: red;" />
		<img src="../upload/<?php
			echo $data ['photou']?>" width="100px"
			height="100px" alt="" onmousemove="show('photo_two')"
			onerror="javascript:document.getElementById(&quot;test&quot;).click();"
			onmouseout="hide('photo_two')"
			onload="javascript:document.getElementById(&quot;test&quot;).click();"
			style="float: left; position: absolute; top: 0px; left: 15px; top: 150px; color: red;" />
		<img src="../upload/<?php
			echo $data ['photob']?>" width="100px"
			onerror="javascript:document.getElementById(&quot;test&quot;).click();"
			height="100px" alt=""
			onload="javascript:document.getElementById(&quot;test&quot;).click();"
			onmousemove="show('photo_three')" onmouseout="hide('photo_three')"
			style="float: left; position: absolute; top: 0px; left: 15px; top: 260px; color: red;" /></td>
	</tr>

</table>
<div
	style="visibility: hidden; width: 500px; height: 500px; position: absolute; left: 300px; top: 0px;"
	id="horo_one"><img src="../upload/<?php
			echo $data ['horo']?>"
	width="490px" height="490px" /></div>
<div
	style="visibility: hidden; width: 500px; height: 500px; position: absolute; left: 300px; top: 0px;"
	id="photo_one"><img src="../upload/<?php
			echo $data ['photos']?>"
	width="490px" height="490px" /></div>
<div
	style="visibility: hidden; width: 500px; height: 500px; position: absolute; left: 300px; top: 0px;"
	id="photo_two"><img src="../upload/<?php
			echo $data ['photou']?>"
	width="490px" height="490px" /></div>
<div
	style="visibility: hidden; width: 500px; height: 500px; position: absolute; left: 300px; top: 0px;"
	id="photo_three"><img src="../upload/<?php
			echo $data ['photob']?>"
	width="490px" height="490px" /></div>
<?php
		}
		
	//echo $id;
	}
	
//echo "Golden Profile".$_GET['num'];
}
if ($_GET ['profile'] == 'guest') {
	
	#check the id for which is either premium or not
	$id = $_GET ['num'];
	$sql = "SELECT * FROM personal_details WHERE id=" . $id;
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		while ( $row = mysql_fetch_array ( $result ) ) {
			$premi = $row ['guest'];
		}
	}
	if ($premi == 'Y') {
		$sqlz = "SELECT * FROM  personal_details LEFT JOIN physical_details ON personal_details.id=physical_details.person_id LEFT JOIN family ON personal_details.id=family.person_id LEFT JOIN horoscope ON personal_details.id=horoscope.person_id LEFT JOIN other ON personal_details.id=other.person_id LEFT JOIN qualification ON personal_details.id=qualification.person_id WHERE personal_details.visibility='Y' AND  personal_details.id=" . $id;
		$resultz = mysql_query ( $sqlz ) or die ( mysql_error () );
		while ( $data = mysql_fetch_array ( $resultz ) ) {
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
<table align="center" cellspacing="3" cellpadding="3"
	style="color: #3F3FA6" onmouseover="showLinks()">

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Personal
		Details<a href="#" name="123456"></a> <input type="hidden" id="person"
			value="<?php
			echo $data [0];
			?>" /> <input type="hidden" id="cipher"
			value="<?php
			echo sha1 ( $data [0] );
			?>" /> <input type="hidden" id="prefunction" value="0" />
		<div id="ban"></div>
		</td>

	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><?php
			echo $data [2];
			?></td>
	</tr>

	<tr>
		<td>Gender</td>
		<td>:</td>
		<td><?php
			$data ['gender'] == 'B' ? print "VADHU" : print "VARAN";
			?></td>
	</tr>

	<tr>
		<td>Status</td>
		<td>:</td>
		<td><?php
			$data ['marriage'] == 'U' ? print "Unmarried" : print "";
			$data ['marriage'] == 'D' ? print "Divorced" : print "";
			$data ['marriage'] == 'W' ? print "Widowed" : print "";
			$data ['marriage'] == 'S' ? print "Seperated" : print "";
			?></td>
	</tr>

	<tr>
		<td>Religion</td>
		<td>:</td>
		<td>
<?php
			if ($data ['religion'] == 'chri') {
				echo "Christian";
			}
			if ($data ['religion'] == 'hind') {
				echo "Hindu";
			}
			if ($data ['religion'] == 'inte') {
				echo "Inter Caste";
			}
			if ($data ['religion'] == 'jain') {
				echo "Jain";
			}
			if ($data ['religion'] == 'musl') {
				echo "Muslim";
			}
			if ($data ['religion'] == 'sikh') {
				echo "Sikh";
			}
			if ($data ['religion'] == 'nore') {
				echo "No Religion";
			}
			if ($data ['religion'] == 'othe') {
				echo "Others";
			}
			?> 
</td>
	</tr>

	<tr>
		<td>Caste</td>
		<td>:</td>
		<td><?php
			echo $data ['caste'];
			?></td>
	</tr>

	<tr>
		<td>Date of Birth</td>
		<td>:</td>
		<td><?php
			echo $data [4];
			?></td>
	</tr>

	<tr>
		<td>Age</td>
		<td>:</td>
		<td><?php
			echo $data ['age'];
			?></td>
	</tr>

	<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php
			//echo $data ['present'];
			?><p style="color: red; font-weight: bold;">**</p>
		</td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
			#echo $data [10];
			?><p style="color: red; font-weight: bold;">**</p>
		</td>
	</tr>

	<tr>
		<td>Pincode</td>
		<td>:</td>
		<td><?php
			#echo $data ['pin'];
			?><p style="color: red; font-weight: bold;">**</p>
		</td>
	</tr>

	<tr>
		<td>City</td>
		<td>:</td>
		<td><?php
			#echo $data ['city'];
			?><p style="color: red; font-weight: bold;">**</p>
		</td>
	</tr>

	<tr>
		<td>District</td>
		<td>:</td>
		<td><?php
			echo $data ['district'];
			?></td>
	</tr>

	<tr>
		<td>State</td>
		<td>:</td>
		<td><?php
			echo $data ['state'];
			?></td>
	</tr>

	<tr>
		<td>Country</td>
		<td>:</td>
		<td><?php
			echo $data ['country'];
			?></td>
	</tr>

	<tr>
		<td>TelePhone</td>
		<td>:</td>
		<td><?php
			#echo $data ['telephone'];
			?><p style="color: red; font-weight: bold;">**</p>
		</td>
	</tr>

	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><?php
			#echo $data ['mobile'];
			?><p style="color: red; font-weight: bold;">**</p>
		</td>
	</tr>

	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php
			#echo $data ['email'];
			?><p style="color: red; font-weight: bold;">**</p>
		</td>
	</tr>


	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Physical
		Details</td>

	</tr>

	<tr>
		<td>Body</td>
		<td>:</td>
		<td><?php
			echo $data ['body'];
			?></td>
	</tr>

	<tr>
		<td>Diet</td>
		<td>:</td>
		<td><?php
			echo $data ['diet'];
			?></td>
	</tr>

	<tr>
		<td>Height</td>
		<td>:</td>
		<td><?php
			echo $hgt [$data ['height']];
			?></td>
	</tr>
	<tr>
		<td>Weight</td>
		<td>:</td>
		<td><?php
			echo $data ['weight'];
			?></td>
	</tr>
	<tr>
		<td>Complexion</td>
		<td>:</td>
		<td><?php
			echo $data ['complexion'];
			?></td>
	</tr>

	<tr>
		<td>Health</td>
		<td>:</td>
		<td><?php
			echo $data ['health'];
			?></td>
	</tr>

	<tr>
		<td>Blood</td>
		<td>:</td>
		<td><?php
			echo $data ['blood'];
			?></td>
	</tr>

	<tr>
		<td>Disability</td>
		<td>:</td>
		<td><?php
			$data ['disability'] == 'Y' ? print "Yes" : print "No";
			?></td>
	</tr>
<?php
			if ($data ['disability'] == 'Y') {
				?>
	<tr>
		<td>Details</td>
		<td>:</td>
		<td><?php
				echo $data ['details'];
				?></td>
	</tr>
<?php
			}
			?>
	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Education
		&amp; Job</td>

	</tr>

	<tr>
		<td>Highest Education</td>
		<td>:</td>
		<td><?php
			echo $data ['education'];
			?></td>
	</tr>

	<tr>
		<td>Institute</td>
		<td>:</td>
		<td><?php
			echo $data ['institute'];
			?></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
			echo $data ['place'];
			?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
			echo $data ['period'];
			?></td>
	</tr>

	<tr>
		<td>Present Employer</td>
		<td>:</td>
		<td><?php
			echo $data ['employer'];
			?></td>
	</tr>

	<tr>
		<td>Designation</td>
		<td>:</td>
		<td><?php
			echo $data ['designation'];
			?></td>
	</tr>

	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
			echo $data ['location'];
			?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
			echo $data ['duration'];
			?></td>
	</tr>

	<tr>
		<td>Previous Employer</td>
		<td>:</td>
		<td><?php
			echo $data ['last_employer'];
			?></td>
	</tr>

	<tr>
		<td>Location</td>
		<td>:</td>
		<td><?php
			echo $data ['last_location'];
			?></td>
	</tr>

	<tr>
		<td>Duration</td>
		<td>:</td>
		<td><?php
			echo $data ['last_duration'];
			?></td>
	</tr>

	<tr>
		<td>Salary</td>
		<td>:</td>
		<td><?php
			echo $data ['salary'];
			?></td>
	</tr>

	<tr>
		<td>Income</td>
		<td>:</td>
		<td><?php
			echo $data ['income'];
			?></td>
	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Family
		Details</td>

	</tr>

	<tr>
		<td>Family Members</td>
		<td>:</td>
		<td><?php
			echo $data ['total'];
			?></td>
	</tr>

	<tr>
		<td>Father</td>
		<td>:</td>
		<td><?php
			echo $data ['father'];
			?></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><?php
			echo $data ['fjob'];
			?></td>
	</tr>

	<tr>
		<td>Mother</td>
		<td>:</td>
		<td><?php
			echo $data ['mother'];
			?></td>
	</tr>

	<tr>
		<td>Occupation</td>
		<td>:</td>
		<td><?php
			echo $data ['mjob'];
			?></td>
	</tr>

	<tr>
		<td>Brother(s)</td>
		<td>:</td>
		<td><?php
			echo $data ['brother'];
			?></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><?php
			echo $data ['bmarried'];
			?></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><?php
			echo $data ['bunmarried'];
			?></td>
	</tr>

	<tr>
		<td>Sister(s)</td>
		<td>:</td>
		<td><?php
			echo $data ['sister'];
			?></td>
	</tr>

	<tr>
		<td>Married</td>
		<td>:</td>
		<td><?php
			echo $data ['smarried'];
			?></td>
	</tr>

	<tr>
		<td>Unmarried</td>
		<td>:</td>
		<td><?php
			echo $data ['sunmarried'];
			?></td>
	</tr>

	<tr>
		<td>Other Family Member(s) Details</td>
		<td>:</td>
		<td><?php
			echo $data ['other'];
			?></td>
	</tr>

	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Horoscope</td>

	</tr>

	<tr>
		<td>Birth Star</td>
		<td>:</td>
		<td><?php
			echo $data ['star'];
			?></td>
	</tr>

	<tr>
		<td>Date of Birth</td>
		<td>:</td>
		<td><?php
			echo $data ['dob'];
			?></td>
	</tr>

	<tr>
		<td>Time of Birth</td>
		<td>:</td>
		<td><?php
			echo $data ['tob'];
			?></td>
	</tr>

	<tr>
		<td>Place of Birth</td>
		<td>:</td>
		<td><?php
			echo $data ['pob'];
			?></td>
	</tr>

	<tr>
		<td>Rasi</td>
		<td>:</td>
		<td><?php
			echo $data ['rasi'];
			?></td>
	</tr>

	<tr>
		<td>Janma Sista Dasa</td>
		<td>:</td>
		<td><?php
			echo $data ['sista_dasa'];
			?></td>
	</tr>

	<tr>
		<td>Janma Sista Dasa End</td>
		<td>:</td>
		<td><?php
			echo $data ['dasa_end'];
			?></td>
	</tr>

	<tr>
		<td>Other Details</td>
		<td>:</td>
		<td><?php
			echo $data ['other'];
			?></td>
	</tr>
	<tr>
		<td>Horoscope</td>
		<td>:</td>
		<td><img src="../upload/<?php
			echo $data ['horo'];
			?>"
			width="100px" height="100px" onmousemove="show('horo_one')"
			onmouseout="hide('horo_one')" /></td>
	</tr>


<?php
			$horoarray = $data ['horobox'];
			$horoarray = explode ( "|", $horoarray );
			?>

<tr style="">
		<td>

		<table id="horoone"
			style="width: 300px; height: 250px; padding-top: 25px">
			<tr>
				<td><?php
			echo $horoarray [0];
			?></td>
				<td><?php
			echo $horoarray [1];
			?></td>
				<td><?php
			echo $horoarray [2];
			?></td>
				<td><?php
			echo $horoarray [3];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [4];
			?></td>
				<td
					style="text-align: center; background-color: #FEB914; font-weight: bold"
					rowspan="2" colspan="2">Rasi Grahanila</td>
				<td><?php
			echo $horoarray [5];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [6];
			?></td>
				<td><?php
			echo $horoarray [7];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [8];
			?></td>
				<td><?php
			echo $horoarray [9];
			?></td>
				<td><?php
			echo $horoarray [10];
			?></td>
				<td><?php
			echo $horoarray [11];
			?></td>
			</tr>
		</table>
		</td>

		<td width="20px"></td>
		<td>

		<table id="horotwo"
			style="width: 300px; height: 250px; padding-top: 25px">
			<tr>
				<td><?php
			echo $horoarray [12];
			?></td>
				<td><?php
			echo $horoarray [13];
			?></td>
				<td><?php
			echo $horoarray [14];
			?></td>
				<td><?php
			echo $horoarray [15];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [16];
			?></td>
				<td
					style="text-align: center; background-color: #FEB914; font-weight: bold"
					rowspan="2" colspan="2">Navamsakam</td>
				<td><?php
			echo $horoarray [17];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [18];
			?></td>
				<td><?php
			echo $horoarray [19];
			?></td>
			</tr>
			<tr>
				<td><?php
			echo $horoarray [20];
			?></td>
				<td><?php
			echo $horoarray [21];
			?></td>
				<td><?php
			echo $horoarray [22];
			?></td>
				<td><?php
			echo $horoarray [23];
			?></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Other
		Details</td>

	</tr>

	<tr>
		<td>Expectation About Life Partner</td>
		<td>:</td>
		<td><?php
			echo $data ['partner']?></td>
	</tr>

	<tr>
		<td>Registered By</td>
		<td>:</td>
		<td><?php
			echo $data ['register']?></td>
	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><?php
			echo $data ['name']?></td>
	</tr>

	<tr>
		<td>Phone</td>
		<td>:</td>
		<td><?php
			echo "*************************"?></td>
	</tr>

	<tr>
		<td colspan="3" style="padding-left: 180px"><img
			src="../upload/<?php
			echo $data ['photos']?>" width="100px"
			height="100px" alt="" onmousemove="show('photo_one')"
			onmouseout="hide('photo_one')"
			onload="javascript:document.getElementById(&quot;test&quot;).click();"
			onerror="javascript:document.getElementById(&quot;test&quot;).click();"
			style="float: left; position: absolute; top: 0px; left: 15px; top: 40px; color: red;" />
		<img src="../upload/<?php
			echo $data ['photou']?>" width="100px"
			height="100px" alt="" onmousemove="show('photo_two')"
			onerror="javascript:document.getElementById(&quot;test&quot;).click();"
			onmouseout="hide('photo_two')"
			onload="javascript:document.getElementById(&quot;test&quot;).click();"
			style="float: left; position: absolute; top: 0px; left: 15px; top: 150px; color: red;" />
		<img src="../upload/<?php
			echo $data ['photob']?>" width="100px"
			onerror="javascript:document.getElementById(&quot;test&quot;).click();"
			height="100px" alt=""
			onload="javascript:document.getElementById(&quot;test&quot;).click();"
			onmousemove="show('photo_three')" onmouseout="hide('photo_three')"
			style="float: left; position: absolute; top: 0px; left: 15px; top: 260px; color: red;" /></td>
	</tr>

</table>
<div
	style="visibility: hidden; width: 500px; height: 500px; position: absolute; left: 300px; top: 0px;"
	id="horo_one"><img src="../upload/<?php
			echo $data ['horo']?>"
	width="490px" height="490px" /></div>
<div
	style="visibility: hidden; width: 500px; height: 500px; position: absolute; left: 300px; top: 0px;"
	id="photo_one"><img src="../upload/<?php
			echo $data ['photos']?>"
	width="490px" height="490px" /></div>
<div
	style="visibility: hidden; width: 500px; height: 500px; position: absolute; left: 300px; top: 0px;"
	id="photo_two"><img src="../upload/<?php
			echo $data ['photou']?>"
	width="490px" height="490px" /></div>
<div
	style="visibility: hidden; width: 500px; height: 500px; position: absolute; left: 300px; top: 0px;"
	id="photo_three"><img src="../upload/<?php
			echo $data ['photob']?>"
	width="490px" height="490px" /></div>
<?php
		}
	}
}
if ($_GET ['msg'] == 'emailaddress') {
	$id = $_GET ['num'];
	if ($_SESSION ['who'] == $id)
		
		$sql = "SELECT * FROM emailid WHERE person_id=" . $id;
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		
		while ( $row = mysql_fetch_array ( $result ) ) {
			$verified = $row ['verified'];
			$veri_cod = $row ['verification'];
		}
		if ($verified == 'N') {
			echo '		
		<a href="javascript:void verifyAction(' . $id . ')">Verify Your Account Now!</a>';
		} else {
		
		}
	} else {
		echo '		
		<a href="javascript:void verifyAction(' . $id . ')">Verify Your Account Now!</a>';
	}

}
if ($_GET ['msg'] == 'actionmail') {
	$id = $_GET ['num'];
	if ($_SESSION ['who'] == $id)
		$sql = "SELECT personal_details.email AS email,emailid.verified AS verified,
emailid.verification AS verification,emailid.person_id AS person FROM personal_details LEFT JOIN emailid ON 
personal_details.id=emailid.person_id WHERE personal_details.id=" . $id;
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		while ( $row = mysql_fetch_array ( $result ) ) {
			$verify = $row ['verified'];
			$ver_code = $row ['verification'];
			$mail = $row ['email'];
			$person = $row ['person'];
		}
	}
	
	if (empty ( $ver_code )) {
		
		//create and send verification code
		$k = substr ( SHA1 ( $id ), 0, 10 );
		if (! is_numeric ( $person ) || empty ( $person )) {
			$zql = "	INSERT INTO emailid( email, verification, account_status, person_id) VALUES ('$mail','$k',
	'active','$id')";
		} else {
			$zql = "UPDATE emailid SET verification='$k' WHERE person_id=" . $id;
		}
		mysql_query ( $zql );
		
		$to = $mail;
		$subject = "Verify Account";
		$message = "<table>
	<tr>
	<td colspan=3> You have to verify your account to enjoy the service from http://vadhu-varan.com.
	So Please copy the code  and paste where it is asked on the http://vadhu-varan.com</td>
	</tr>
    <tr>
	<td colspan=3>Verification Code : <b style=color:red>$k</b></td>
	</tr></table>";
		
		$from = "response@vadhu-varan.com";
		$headers = "from:VADHU-VARAN.COM<response@vadhu-varan.com>\r\n";
		$headers .= "Reply-To: gitacommunications@gmail.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html";
		$rst = mail ( $to, $subject, $message, $headers );
		
		echo '
    	<div style="position:absolute;top:0px;width:725px;text-align:center;background-color:#EEE7D5;border:2px solid #666;color:green;margin:3px;height:70px;padding-top:35px;z-index:1;" id="msgdiv">
    	An Email has been sent to your mailbox.Please view this mail to verify your account.<br />
    	Please check your spam too.
    	<p style="color:red;font-weight:bold;cursor:pointer" onclick="javascript:window.location.reload();">Close</p>
    	</div>
    	';
	
	} else {
		//verify the code from email.or try with other code.
		echo '
    	<div style="position:absolute;top:0px;width:725px;text-align:center;background-color:#EEE7D5;border:2px solid #666;color:green;margin:3px;height:70px;padding-top:35px;z-index:1;" id="msgdiv">
    	Enter Verification Code Here:<input type="text" id="vericode" value="" class="textbox"/><input type="button" value="Submit" onclick="accountChecked()" class="button"/>
    	<p style="color:red;font-weight:bold;cursor:pointer" onclick=javascript:document.getElementById("msgdiv").style.visibility=\'hidden\'>Close</p>
    	</div>
    	';
	}

}
if ($_GET ['msg'] == 'codecheck') {
	$code = $_GET ['code'];
	$id = $_SESSION ['who'];
	$sql = "SELECT verification,email FROM emailid WHERE person_id=" . $id;
	$result = mysql_query ( $sql );
	$row = mysql_fetch_array ( $result );
	$ma = $row [1];
	if ($row [0] == $code) {
		$xql = "UPDATE personal_details SET visibility='N' WHERE email='$ma' AND id!=" . $id;
		$zql = "UPDATE emailid SET verified='Y' WHERE person_id=" . $id;
		mysql_query ( $zql );
		mysql_query ( $xql );
		$_SESSION ['verification'] = true;
		
		echo '
    	<div style="position:absolute;top:0px;width:725px;text-align:center;background-color:#EEE7D5;border:2px solid #666;color:green;margin:3px;height:70px;padding-top:35px;z-index:1;" id="msgdiv">
    	Account Verified Successfully.!
    	<p style="color:red;font-weight:bold;cursor:pointer" onclick="javascript:window.location.reload();">Close</p>
    	</div>
    	';
	} else {
		echo '
    	<div style="position:absolute;top:0px;width:725px;text-align:center;background-color:#EEE7D5;border:2px solid #666;color:green;margin:3px;height:70px;padding-top:35px;z-index:1;" id="msgdiv">
    	
    	<a href="javascript:void verifyAction(' . $id . ')" style="padding:5px 0px;color:#06068C">TRY AGAIN</a>
    	<p style="color:red;font-weight:bold;cursor:pointer;padding-top:25px" onclick=javascript:document.getElementById("msgdiv").style.visibility=\'hidden\'>Close</p>
    	</div>
    	';
	}
}
if ($_GET ['msg'] == 'checkmail') {
	$mail = $_GET ['num'];
	
	//check whether the mail id used before
	$sql = "SELECT * FROM emailid WHERE email='$mail'";
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		echo "Y";
	} else {
		echo "N";
	}
}
if ($_GET ['msg'] == 'displaylink') {
	$psn = $_GET ['person'];
	$cpr = $_GET ['cipher'];
	
	if (sha1 ( $psn ) == $cpr) { #3div. 1d-name imamge,xpress interest.contact
		

		$sql = "SELECT * FROM personal_details LEFT JOIN other ON personal_details.id=other.person_id 	WHERE personal_details.id=" . $psn; //back swoon
		$result = mysql_query ( $sql );
		$data = mysql_fetch_array ( $result );
		$name = $data [2];
		$imgs = $data ['profile_image'];
		$gend = $data ['gender'];
		$gues = $data ['guest'];
		$gold = $data ['golden'];
		$prem = $data ['premium'];
		
		if ($imgs == 'YR') {
			$pho = $data ['photos'];
		}
		if ($imgs == 'YC') {
			$pho = $data ['photou'];
		}
		if ($imgs == 'YL') {
			$pho = $data ['photob'];
		}
		
		if ($gold == 'Y' || $prem == 'Y') {
			if (! empty ( $pho )) {
				$ret = '<p style="position:fixed;background-color:#06068C;color:white;height:30px;top:100px;width:600px;left:200px;border:1px solid;">
<span style="border:1px solid;width:298px;float:left;height:23px;color:white;background-color:black;padding-top:5px;text-transform:uppercase">
<img width="15px" height="20px"  src="./upload/' . $pho . '" style="float:left;padding-left:5px"/>' . substr ( $name, 0, 15 ) . '</span>';
			} else {
				if ($gend == 'B') {
					$ret = '<p style="position:fixed;background-color:#06068C;color:white;height:30px;top:100px;width:600px;left:200px;border:1px solid;">
<span style="border:1px solid;width:298px;float:left;height:23px;color:white;background-color:black;padding-top:5px;text-transform:uppercase">
<img width="15px" height="20px"  src="./images/girl.png" style="float:left;padding-left:5px"/>' . substr ( $name, 0, 15 ) . '</span>';
				}
				if ($gend == 'G') {
					$ret = '<p style="position:fixed;background-color:#06068C;color:white;height:30px;top:100px;width:600px;left:200px;border:1px solid;">
<span style="border:1px solid;width:298px;float:left;height:23px;color:white;background-color:black;padding-top:5px;text-transform:uppercase">
<img width="15px" height="20px"  src="./images/boy.png" style="float:left;padding-left:5px"/>' . substr ( $name, 0, 15 ) . '</span>';
				}
			}
			if (! is_numeric ( $_SESSION ['who'] ) || empty ( $_SESSION ['who'] )) {
				$ret .= '<button style="border:1px solid;width:300px;float:left;height:30px;color:white;background-color:#3F3FA6;cursor:pointer;text-transform:uppercase" onclick="xpressInterestN(' . $psn . ')">express interest</button>';
			
			} else {
				$ret .= '<button style="border:1px solid;width:300px;float:left;height:30px;color:white;background-color:#3F3FA6;cursor:pointer;text-transform:uppercase" onclick="xpressInterest(' . $psn . ')">express interest</button>';
			
			}
		} else {
			if (! empty ( $pho )) {
				$ret = '<p style="position:fixed;background-color:#06068C;color:white;height:30px;top:100px;width:600px;left:200px;border:1px solid;">
<span style="border:1px solid;width:198px;float:left;height:23px;color:white;background-color:black;padding-top:5px;text-transform:uppercase">
<img width="15px" height="20px"  src="./upload/' . $pho . '" style="float:left;padding-left:5px"/>' . substr ( $name, 0, 15 ) . '</span>';
			} else {
				if ($gend == 'B') {
					$ret = '<p style="position:fixed;background-color:#06068C;color:white;height:30px;top:100px;width:600px;left:200px;border:1px solid;">
<span style="border:1px solid;width:198px;float:left;height:23px;color:white;background-color:black;padding-top:5px;text-transform:uppercase">
<img width="15px" height="20px"  src="./images/girl.png" style="float:left;padding-left:5px"/>' . substr ( $name, 0, 15 ) . '</span>';
				}
				if ($gend == 'G') {
					$ret = '<p style="position:fixed;background-color:#06068C;color:white;height:30px;top:100px;width:600px;left:200px;border:1px solid;">
<span style="border:1px solid;width:198px;float:left;height:23px;color:white;background-color:black;padding-top:5px;text-transform:uppercase">
<img width="15px" height="20px"  src="./images/boy.png" style="float:left;padding-left:5px"/>' . substr ( $name, 0, 15 ) . '</span>';
				}
			}
			if (! is_numeric ( $_SESSION ['who'] ) || empty ( $_SESSION ['who'] )) {
				$ret .= '
<button style="border:1px solid;width:200px;float:left;height:30px;color:white;background-color:#3F3FA6;cursor:pointer;text-transform:uppercase" onclick="xpressInterestN(' . $psn . ')">express interest</button>
<button style="border:1px solid;width:200px;float:left;height:30px;color:white;background-color:#3F3FA6;cursor:pointer;text-transform:uppercase" onclick="requestContactN(' . $psn . ')">request Contact</button></p>';
			} else {
				$ret .= '
<button style="border:1px solid;width:200px;float:left;height:30px;color:white;background-color:#3F3FA6;cursor:pointer;text-transform:uppercase" onclick="xpressInterest(' . $psn . ')">express interest</button>
<button style="border:1px solid;width:200px;float:left;height:30px;color:white;background-color:#3F3FA6;cursor:pointer;text-transform:uppercase" onclick="requestContact(' . $psn . ')">request Contact</button></p>';
			
			}
		
		}
	
	}
	$ret .= '<p style="position:fixed;top:150px;width:600px;text-align:center;left:200px;" id="maildata"></p>';
	echo $ret;
}
if ($_GET ['msg'] == 'xpress') {
	$vd = $_GET ['num'];
	$vr = $_SESSION ['who'];
	
	$done = checkMatch ( $vd, $vr );
	if ($done) {
		
		echo '<div style="background-color:grey;height:25px;"></div>
<div style="background-color:grey;height:50px;">
Are you really interested in this profile..?</br>
<button class="button" onclick="loadSecond(' . $vd . ')" style="margin-right:10px;cursor:pointer">Yes</button>
<button class="button" style="cursor:pointer;"onclick="document.getElementById(&quot;proshow&quot;).innerHTML=\' \'">No</button>
</div>';
	} else {
		echo '
<div style="background-color:grey;height:25px;">
Message
</div>
<div style="background-color:grey;height:25px;">
Caste and religion does not matching.
</div>
';
	}

}
if ($_GET ['msg'] == 'addrequest') {
	$vd = $_GET ['num'];
	$vr = $_SESSION ['who'];
	$done = checkMatch ( $vd, $vr );
	$msg = 'Do you really want to contact them..?';
	if ($done) {
		
		echo '<div style="background-color:grey;height:25px;">
</div>
<div style="background-color:grey;height:50px;">

<p style="color:yellow;font-weight:bold;">' . $msg . '</p>
<button class="button" onclick="loadSecond(' . $vd . ')"  style="margin-right:10px;cursor:pointer">Yes</button>
<button class="button" style="cursor:pointer;" onclick="document.getElementById(&quot;proshow&quot;).innerHTML=\' \'">No</button>
</div>';
	} else {
		echo '
<div style="background-color:grey;height:25px;">
Message
</div>
<div style="background-color:grey;height:25px;">
Caste and religion does not matching.
</div>
';
	}
} #onclick="requestContactByMail(' . $vd . ')"
if ($_GET ['msg'] == 'mailrequest') {
	$vadhu = $_GET ['num'];
	$varan = $_SESSION ['who'];
	$sql = "SELECT email FROM personal_details WHERE id=" . $vadhu;
	$result = mysql_query ( $sql );
	$data = mysql_fetch_array ( $result );
	$mail = $data [0];
	#$to = "gitacommunications@gmail.com";
	$subject = "Contact Address Request";
	$message = "
	<h3>Warm Wishes</h3>

<p style=\"padding-left:10px\">
http://www.vadhu-varan.com/index.php?msg=second&second=" . $varan . " <br> Showed interest on you,
and requested your contact address and waiting for your response.
<br><br>
Team <br>
Vadhu-Varan

";
	$from = "response@vadhu-varan.com";
	$headers = "from:VADHU-VARAN.COM<response@vadhu-varan.com>\r\n";
	$headers .= "Reply-To: gitacommunications@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html";
	
	$zql = "SELECT * FROM proposal WHERE profile=" . $vadhu . " AND request=" . $varan;
	$rez = mysql_query ( $zql );
	if (mysql_num_rows ( $rez ) > 0) {
		$zata = mysql_fetch_array ( $rez );
	}
	$profile = $zata ['profile'];
	$propose = $zata ['proposal'];
	$request = $zata ['request'];
	$dated = $zata ['dated'];
	$ids = $zata ['id'];
	$date1 = date ( "Y-m-d" );
	$diff = abs ( strtotime ( $dated ) - strtotime ( $date1 ) );
	$years = floor ( $diff / (365 * 60 * 60 * 24) );
	$months = floor ( ($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24) );
	$days = floor ( ($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24) );
	if ($days >= 7 || empty ( $dated )) {
		mail ( $mail, $subject, $message, $headers );
		if (empty ( $dated )) {
			$mql = "INSERT INTO proposal(proposal,profile,dated,request)VALUES('Y','$vadhu','$date1','$varan')";
		} else {
			$mql = "UPDATE proposal SET dated='$date1' WHERE id=" . $ids;
		}
		mysql_query ( $mql );
		echo '<div style="background-color:grey;height:25px;">
</div>
<div style="background-color:grey;height:50px;">

<p style="color:yellow;font-weight:bold;">Your request has been sent.</p>

</div>';
	} else {
		echo '<div style="background-color:grey;height:25px;">
</div>
<div style="background-color:grey;height:50px;">

<p style="color:yellow;font-weight:bold;">You Sent your enquiry once.<br> Please make next after 7 Days.</p>

</div>';
	}
}
if ($_GET ['msg'] == 'displaylinkmail') {
	$psn = $_GET ['person'];
	$cpr = $_GET ['cipher'];
	
	if (sha1 ( $psn ) == $cpr) { #3div. 1d-name imamge,xpress interest.contact
		

		$sql = "SELECT * FROM personal_details LEFT JOIN other ON personal_details.id=other.person_id 	WHERE personal_details.id=" . $psn; //back swoon
		$result = mysql_query ( $sql );
		$data = mysql_fetch_array ( $result );
		$name = $data [2];
		$imgs = $data ['profile_image'];
		$gend = $data ['gender'];
		$gues = $data ['guest'];
		$gold = $data ['golden'];
		$prem = $data ['premium'];
		
		if ($imgs == 'YR') {
			$pho = $data ['photos'];
		}
		if ($imgs == 'YC') {
			$pho = $data ['photou'];
		}
		if ($imgs == 'YL') {
			$pho = $data ['photob'];
		}
		
		if ($gold == 'Y' || $prem == 'Y') {
			if (! empty ( $pho )) {
				$ret = '<p style="position:absolute;background-color:#06068C;color:white;height:30px;top:650px;width:400px;left:50px;border:1px solid;">
';
			} else {
				if ($gend == 'B') {
					$ret = '<p style="position:absolute;background-color:#06068C;color:white;height:30px;top:650px;width:400px;left:50px;border:1px solid;">
';
				}
				if ($gend == 'G') {
					$ret = '<p style="position:absolute;background-color:#06068C;color:white;height:30px;top:650px;width:400px;left:50px;border:1px solid;">
';
				}
			}
			if (! is_numeric ( $_SESSION ['who'] ) || empty ( $_SESSION ['who'] )) {
				$ret .= '<button style="text-transform:uppercase;background-color:#06068C;color:white;height:30px;top:650px;width:400px;left:50px;border:1px solid;" onclick="xpressInterestN(' . $psn . ')">express interest</button>';
			
			} else {
				$ret .= '<button style="text-transform:uppercase;background-color:#06068C;color:white;height:30px;top:650px;width:400px;left:50px;border:1px solid;" onclick="requestContactByMail(' . $psn . ')" >express interest</button>';
			
			}
		} else {
			if (! empty ( $pho )) {
				$ret = '<p style="position:absolute;background-color:#06068C;color:white;height:30px;top:650px;width:400px;left:50px;border:1px solid;">
';
			} else {
				if ($gend == 'B') {
					$ret = '<p style="position:absolute;background-color:#06068C;color:white;height:30px;top:650px;width:400px;left:50px;border:1px solid;">
';
				}
				if ($gend == 'G') {
					$ret = '<p style="position:absolute;background-color:#06068C;color:white;height:30px;top:650px;width:400px;left:50px;border:1px solid;">
';
				}
			}
			if (! is_numeric ( $_SESSION ['who'] ) || empty ( $_SESSION ['who'] )) {
				$ret .= '
<button style="border:1px solid;width:200px;float:left;height:30px;color:white;background-color:#3F3FA6;cursor:pointer;text-transform:uppercase" onclick="xpressInterestN(' . $psn . ')">express interest</button>
<button style="border:1px solid;width:200px;float:left;height:30px;color:white;background-color:#3F3FA6;cursor:pointer;text-transform:uppercase" onclick="requestContactN(' . $psn . ')">request Contact</button></p>';
			} else {
				$ret .= '
<button style="border:1px solid;width:200px;float:left;height:30px;color:white;background-color:#3F3FA6;cursor:pointer;text-transform:uppercase" onclick="requestContactByMail(' . $psn . ')" >express interest</button>
<button style="border:1px solid;width:200px;float:left;height:30px;color:white;background-color:#3F3FA6;cursor:pointer;text-transform:uppercase" onclick="requestContactByMail(' . $psn . ')" >request Contact</button></p>';
			
			}
		
		}
	
	}
	$ret .= '<p style="position:fixed;top:150px;width:600px;text-align:center;left:200px;" id="maildata"></p>';
	echo $ret;
}
if ($_GET ['roughsearch'] == 'true') {
	$cur = $_GET ['cur'];
	if ($cur == 0 || empty ( $cur )) {
		$cur = 1;
		$pre = 0;
		$nxt = 2;
	}
	
	$limit = 8;
	$begin = ($cur - 1) * $limit;
	$gend = $_GET ['gender'];
	$relg = $_GET ['relg'];
	$to = $_GET ['toage'];
	$from = $_GET ['fromage'];
	
	$sql = "SELECT * FROM personal_details LEFT JOIN other ON personal_details.id=other.person_id WHERE 
			personal_details.gender='$gend' AND personal_details.religion='$relg' AND 
			personal_details.age BETWEEN $from AND $to AND guest='Y' AND visibility='Y' ";
	$rezz = mysql_query ( $sql ) or die ( mysql_error () );
	$k = 1;
	$rows = mysql_num_rows ( $rezz );
	
	$total = ceil ( $rows / $limit );
	
	$sqlz = $sql . " ORDER BY personal_details.id LIMIT $begin , $limit ";
	$result = mysql_query ( $sqlz );
	
	if (mysql_num_rows ( $result ) > 0) {
		
		?>
<div id="container"
	style="width: 100%; height: 500px; position: relative;">
<?php
		while ( $row = mysql_fetch_array ( $result ) ) {
			
			?>
<div id="div<?php
			echo $k;
			?>"
	style="position: absolute; bottom: 0; width: 190px; height: 230px;">
<?php
			if ($row ['profile_image'] == '') {
				if ($row ['gender'] == 'B') {
					?>
	<img src="images/girl.png" width="140px" height="160px" alt="PHOTO" />

	<?php
				} else {
					?>
<img src="images/boy.png" width="140px" height="160px" alt="PHOTO" />
<?php
				}
			} else {
				if ($row ['profile_image'] == 'YR') {
					?>
<img src="upload/<?php
					echo $row ['photos']?>" width="140px"
	height="160px" alt="PHOTO" />
<?php
				}
				if ($row ['profile_image'] == 'YC') {
					?>
<img src="upload/<?php
					echo $row ['photou']?>" width="140px"
	height="160px" alt="PHOTO" />
<?php
				}
				if ($row ['profile_image'] == 'YL') {
					?>
<img src="upload/<?php
					echo $row ['photob']?>" width="140px"
	height="160px" alt="PHOTO" />
<?php
				}
			}
			?>
<div><?php
			echo $row [2]?></div>
<div>Age : <?php
			echo $row ['age']?></div>
<a href="javascript:void checkProfile(<?php
			echo $row [0]?>)"
	style="text-align: right; padding-left: 70px">View Full Profile</a><a
	id="test" href="#123456"></a></div>
<?php
			$k ++;
		}
		if ($total > 1) { //////////set the number of the division by calculating the page.
			$z = "";
			for($i = 1; $i <= $total; $i ++) {
				if ($i == $cur) //put the link for the next and put a non link to  the current pa
#put the same link call the value as the parrametere to pas through the functrion to show\
				#the next page#fdgf#fg//gdsgf/rfer
				{
					$z = $z . '<button type="button">' . $i . '</button>';
				} else {
					$z = $z . '<button type="button" onclick="doRoughSearch(' . $i . ')">' . $i . '</button>';
					;
				}
			}
			?>
<div
	style="bottom: 10px; position: absolute; text-align: center; width: 100%;"><?php
			echo $z;
			?></div>
<?php
		}
		
		?>
</div>
<div id="proshow" style="position: relative; width: 100%"></div>
<?php
	
	} else {
		echo 'NO Results Found.';
	}
	
#1|||0|||2|||0|||0|||1


#echo $cur."|||".$begin."|||".$limit."|||".$rows."|||".$total."|||".$sql;
}
if ($_GET ['msg'] == 'sendabuse') {
	$pid = $_GET ['num'];
	$who = $_SESSION ['who'];
	$sql = "INSERT INTO abuse(profile,person,dated)VALUES('$pid','$who',NOW())";
	$result = mysql_query ( $sql ) or die ( mysql_error () );
	$to = "gitacommunications@gmail.com";
	$subject = "Abuse Request Recieved";
	$message = "<h3>Warm Wishes</h3>
You have a profile Abuse request.Please check it Soon.........
http://www.vadhu-varan.com/index.php?msg=second&second=" . $pid . "
<br><br>Team <br>Vadhu-Varan";
	
	$headers = "from:VADHU-VARAN.COM<response@vadhu-varan.com>\r\n";
	$headers .= "Reply-To: gitacommunications@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html";
	mail ( $to, $subject, $message, $headers );
	echo 'Y';

}
if ($_GET ['msg'] == 'passmail') {
	$mailid = $_GET ['q'];
	if (! preg_match ( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+$/", $mailid )) {
		echo "Enter Valid email ID";
	} else {
		$sql = "SELECT * FROM personal_details WHERE email='$mailid' AND visibility='Y'";
		$result = mysql_query ( $sql ) or die ( mysql_error () );
		if (mysql_num_rows ( $result ) > 0) {
			echo '<input type="button" onclick="sentPass()" name="mailbut" value="Submit" />';
		} else {
			echo 'Enter Registered EmailId';
		}
	}
}
if ($_GET ['msg'] == 'mailsent') {
	$mid = $_GET ['q'];
	$sql = "SELECT password FROM personal_details WHERE email='$mid'";
	$result = mysql_query ( $sql ) or die ( "Error in query: $sql. " . mysql_error () );
	if (mysql_num_rows ( $result ) > 0) {
		while ( $row = mysql_fetch_array ( $result ) ) {
			$pass = $row ['password'];
		}
	}
	//send mail
	$to = $mid;
	$subject = "Password Information";
	$message = "
			<table><tr><td>	Your Current Password is: </td><td>$pass</td></tr>
				
			<tr><td>	Login to </td><td>
					
					http://www.vadhu-varan.com/index.php?msg=login</td></tr>
					</table>
";
	
	$headers = "from:VADHU-VARAN.COM<response@vadhu-varan.com>\r\n";
	$headers .= "Reply-To: gitacommunications@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html";
	mail ( $to, $subject, $message, $headers );
	echo "<b >An email sent to your MailBox with the details of password</b>";
}
?>