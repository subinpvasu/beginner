<?php
include_once '../include/config.php';
if ($_GET ['msg'] == 'process') {
	$id = $_GET ['q'];
	
	$sql = "UPDATE payment SET status='activated',admin='Done',result='Success',actiondate=CURDATE() WHERE status<>'deleted' AND id=" . $id;
	if (mysql_query ( $sql )) {
		echo "Y";
	} else {
		die ( $sql . "  " . mysql_error () );
	}
	/*
	 * echo $sql;
	 */
}
if ($_GET ['msg'] == 'consider') {
	$id = $_GET ['q'];
	
	$sql = "UPDATE payment SET status='Processing',admin='Processing' WHERE status<>'deleted' AND id=" . $id;
	if (mysql_query ( $sql )) {
		echo "Y";
	} else {
		die ( $sql . "  " . mysql_error () );
	}
	/*
	 * echo $sql;
	 */
}
if ($_GET ['msg'] == 'publish') {
	$agent = $_GET ['q'];
	$id = $_GET ['p'];
	if ($agent == 111) {
		$table = 'employer';
	}
	if ($agent == 222) {
		$table = 'requirement';
	}
	$sql = "SELECT publish FROM $table WHERE id=" . $id;
	$rst = mysql_query ( $sql ) or die ( "$sql --" . mysql_error () );
	while ( $var = mysql_fetch_array ( $rst ) ) {
		$k = $var ['publish'];
	}
	if ($k == 'Y') {
		$mql = "UPDATE $table SET publish='N' WHERE id=" . $id;
		mysql_query ( $mql );
		echo "Y";
	}
	if ($k == 'N') {
		$mql = "UPDATE $table SET publish='Y' WHERE id=" . $id;
		mysql_query ( $mql );
		echo "Y";
	}
}
if ($_GET ['msg'] == 'paid') {
	$agent = $_GET ['q'];
	$id = $_GET ['p'];
	if ($agent == 111) {
		$table = 'employer';
	}
	if ($agent == 222) {
		$table = 'requirement';
	}
	$sql = "SELECT paid FROM $table WHERE id=" . $id;
	$rst = mysql_query ( $sql );
	while ( $var = mysql_fetch_array ( $rst ) ) {
		$k = $var ['paid'];
	}
	if ($k == 'Y') {
		$mql = "UPDATE $table SET paid='N' WHERE id=" . $id;
		mysql_query ( $mql );
		echo "Y";
	}
	if ($k == 'N') {
		$mql = "UPDATE $table SET paid='Y' WHERE id=" . $id;
		mysql_query ( $mql );
		echo "Y";
	}
}
if ($_GET ['msg'] == 'premier') {
	$agent = $_GET ['q'];
	$id = $_GET ['p'];
	if ($agent == 111) {
		$table = 'employer';
	}
	if ($agent == 222) {
		$table = 'requirement';
	}
	$sql = "SELECT premier FROM $table WHERE id=" . $id;
	$rst = mysql_query ( $sql );
	while ( $var = mysql_fetch_array ( $rst ) ) {
		$k = $var ['premier'];
	}
	if ($k == 'Y') {
		$mql = "UPDATE $table SET premier='N' WHERE id=" . $id;
		mysql_query ( $mql );
		echo "Y";
	}
	if ($k == 'N') {
		$mql = "UPDATE $table SET premier='Y' WHERE id=" . $id;
		mysql_query ( $mql );
		echo "Y";
	}

}
if ($_GET ['msg'] == 'prostatus') {
	$id = $_GET ['q'];
	$sql = "SELECT status FROM profile WHERE id=" . $id;
	$res = mysql_query ( $sql );
	$row = mysql_fetch_array ( $res );
	$status = $row [0];
	if ($status == 'active') {
		$mql = "UPDATE profile SET status='suspended' WHERE id=" . $id;
		mysql_query ( $mql );
		echo "Y";
	}
	if ($status == 'suspended') {
		$mql = "UPDATE profile SET status='active' WHERE id=" . $id;
		mysql_query ( $mql );
		echo "Y";
	}

}
if ($_GET['msg']=='jobmail')
{
	$jobid = $_GET['q']; 
############################################################
############################################################
############################################################	
	date_default_timezone_set("Asia/Calcutta");
	$k = (date("l dS \\of F Y h:i:s A"));
	$subject="Job Sent ON ".$k;
	$message="
	<table style=background-color:black;color:white;width:550px;height:400px; cellpadding=5 cellspacing=5>
	<tr>
	<td colspan=3 align=center><b style=text-transform:uppercase;>Job Offers Today! </b></td>
	</tr>
	
	<tr>
	<td>Designation</td><td>:</td><td>".getDetailsForAdminJob('designation', $jobid)."</td>
	</tr>
	<tr>
	<td>Age Limit</td><td>:</td><td>".getDetailsForAdminJob('age', $jobid)."</td>
	</tr>
	<tr>
	<td>Salary</td><td>:</td><td>".getDetailsForAdminJob('salary', $jobid)."</td>
	</tr>
	<tr>
	<td>Posted On</td><td>:</td><td>".getDetailsForAdminJob('lastchange', $jobid)."</td>
	</tr>
	<tr>
	<td>Experience</td><td>:</td><td>".getDetailsForAdminJob('experience', $jobid)."</td>
	</tr>
	<tr>
	<td>Availability</td><td>:</td><td>".getDetailsForAdminJob('type', $jobid)."</td>
	</tr>
	<tr>
	<td>Requirement</td><td>:</td><td>".getDetailsForAdminJob('requirement', $jobid)."</td>
	</tr>
	<tr>
	<td colspan=3 align=center ><a href='http://career4you.in/' style=color:white>For More Details Visit here</a></td>
	</tr>
	
	<tr>
	<td colspan=3 align=center >
	Powered by Gitacommunications <a href=tel:9387335165 style=text-decoration:none;color:white;>9387335165</a> &copy; ".date("Y")."
	</td>
	</tr>
	
	</table>
	
	
	";
	
	//$to="subinpvasu@gmail.com";
	$from="WWW.CAREER4YOU.IN <response@career4you.in>";
	$headers="from:".$from."\r\n";
	$headers .= "Reply-To: career4you.in@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html";
	/*
	 * list all mails and send mail to ..
	 * 
	 * 1.1 list all and send mail to everyone till oct 15 2013
	 * 1.2 then send to only those the category registered.
	 * 1.4 get email from register and check it with fewdata
	 * 1.3 check the fewdata and send it to corresponding category OR if WholeNull send everyjob.
	 * that's good
	 * 
	 * 
	 * 
	 */
	
	
	$kound = getEmailtoSendMail( $subject, $message, $headers,getDetailsForAdminJob('category', $jobid) );
	$mailedtoOn = "Total ".$kound." mails sent ON ".$k;
	$xql = "UPDATE requirement SET mailedtoOn='$mailedtoOn' WHERE id=".$jobid;
	mysql_query($xql);
	echo $kound;
	
##############################################################
##############################################################
##############################################################
	
}
function getDetailsForAdminJob($tuple,$prime,$table='requirement')
{
	$sql = "SELECT $tuple FROM $table WHERE id=".$prime;
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	return $row[0];
}
function getEmailtoSendMail($subject,$message,$headers,$category)
{
	$kounter = 0;
	$sql = "SELECT id,email FROM register";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
	$zql = "SELECT *  FROM fewdata WHERE regid=".$row[0];
	$rezult = mysql_query($zql);
	$zow = mysql_fetch_array($rezult);
	if ($zow['offer']=='Y'|| empty($zow['id']))
	{
		if(!empty($zow['categry']))
		{
		$categor = $zow['categry'];
		$kat = "|".$categor;
		$cat = explode("|", $kat);
		if (array_search($category, $cat))
		{
			/*
			 * send mail
			 */
			mail($row[1],$subject,$message,$headers);
			$kounter++;
		}
		}
		else
		{
			/*send a mail
			 * 
			 */
			mail($row[1],$subject,$message,$headers);
			$kounter++;
		}
		
		
	}
	
	}
return $kounter;
}
?>