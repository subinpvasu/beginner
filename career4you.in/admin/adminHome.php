<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Career4you.in|Administrator</title>
<script type="text/javascript" src="validation.js"></script>
<style type="text/css">
table,td,th {
	border: 1px solid green;
	border-collapse: separate;
}

th {
	background-color: #669D2F;
	color: white;
}

ul {
	list-style-type: none;
}

#data a {
	text-decoration: none;
	color: green;
	font-weight: bold;
}

#data a:hover {
	color: red;
}
#sidelinks a{
	text-decoration: none;
	color:white;
	font-weight:bold;
	background-color: #669D2F;
	border:1px solid #E0FFFF;
	width:220px;
	height:18px;
	display:block;
}
#sidelinks a:hover {
	text-decoration: none;
	color:black;
	font-weight:bold;
	background-color: #ADD8E6;
	border:1px solid #E0FFFF;
	width:220px;
	height:18px;
	display:block;
}

</style>
</head>
<body>
	<table width="2300px">
		<tr>
			<td align="center" colspan="2"
				style="background-color: #ADD8E6; height: 84px; white-space: nowrap;">
 <?php
	include_once '../include/config.php';
	$sqlpp = mysql_query ( "SELECT COUNT(*)  FROM employer " );
	if ($sqlpp) {
		$rowpc = mysql_fetch_array ( $sqlpp );
	}
	$sqlppr = mysql_query ( "SELECT COUNT(*)  FROM requirement " );
	if ($sqlppr) {
		$rowpcr = mysql_fetch_array ( $sqlppr );
	}
	$sqlpublish = mysql_query ( "SELECT COUNT(*)  FROM requirement WHERE publish='Y'" );
	if ($sqlpublish) {
		$publish = mysql_fetch_array ( $sqlpublish );
	}
	$sqlnotpublish = mysql_query ( "SELECT COUNT(*)  FROM requirement WHERE publish='N'" );
	if ($sqlnotpublish) {
		$notpublish = mysql_fetch_array ( $sqlnotpublish );
	}
	$sqlpremium = mysql_query ( "SELECT COUNT(*) FROM requirement WHERE premier='Y' AND publish='Y' " );
	if ($sqlpremium) {
		$premium = mysql_fetch_array ( $sqlpremium );
	}
	$sqlgold = mysql_query ( "SELECT COUNT(*)  FROM requirement WHERE publish='Y' AND status='paid' AND premier='N'" );
	if ($sqlgold) {
		$gold = mysql_fetch_array ( $sqlgold );
	}
	$sqlrr = mysql_query ( "SELECT COUNT(*) FROM register" );
	if ($sqlrr) {
		$rowrr = mysql_fetch_array ( $sqlrr );
	}
	
	$mn = $_GET ['page'];
	$end = 50;
	
	if (empty ( $mn )) {
		$mn = 1;
		$begin = 0;
		$counting_variable = 1;
	} else {
		$begin = ($mn - 1) * $end;
		$counting_variable = $begin + 1;
	}
	switch ($_GET ['msg']) {
		case 'candidate' :
			$status = "Candidate Details";
			$result = displayCandidate ( $begin );
			$paging = displayPagination ( $_GET ['page'], 'candidate',getNumberTotal($result[1], $_GET['page']) );
			break;
		case 'firm' :
			$status = "Firm Details";
			$result = displayFirm ( $begin );
			$paging = displayPagination ( $_GET ['page'], 'firm',getNumberTotal($result[1], $_GET['page']) );
			break;
		case 'requirement' :
			$status = "Requirement Details";
			$result = displayRequirement ( $begin );
			$paging = displayPagination ( $_GET ['page'], 'requirement',getNumberTotal($result[1], $_GET['page']) );
			break;
		case 'order' :
			$status = "Order Details";
			$result = displayOrder ( $begin );
			$paging = displayPagination ( $_GET ['page'], 'order',getNumberTotal($result[1], $_GET['page']) );
			break;
		case 'datacandidate' :
			$status = "Data Entry Candidate Details";
			$result = displayDataCandidate ( $begin );
			$paging = displayPagination ( $_GET ['page'], 'datacandidate',getNumberTotal($result[1], $_GET['page']) );
			break;
		case 'datafirm' :
			$status = "Data Entry Firm Details";
			$result = displayDataFirm ( $begin );
			$paging = displayPagination ( $_GET ['page'], 'datafirm' ,getNumberTotal($result[1], $_GET['page']));
			break;
		case 'datarequirement' :
			$status = "Data Entry Requirement Details";
			$result = displayDataRequirement ( $begin );
			$paging = displayPagination ( $_GET ['page'], 'datarequirement' ,getNumberTotal($result[1], $_GET['page']));
			break;
		case 'dataoperator' :
			$status = "Data Entry Operator";
			$result = displayDataOperator ( $begin );
			$paging = displayPagination ( $_GET ['page'], 'dataoperator',getNumberTotal($result[1], $_GET['page']) );
			break;
		case 'addetails' :
			$status = "Advertisement Details";
			break;
		case 'ad_order' :
			$status = "Advertisement Orders";
			break;
		case 'golden' :
			$status = "Golden Profiles";
			$result = displayRequirementGolden($begin);
			$paging = displayPagination ( $_GET ['page'], 'golden' ,getNumberTotal($result[1], $_GET['page']));
			break;
		case 'premium' :
			$status = "Premium Profiles";
			$result = displayRequirementPremium($begin);
			$paging = displayPagination ( $_GET ['page'], 'premium' ,getNumberTotal($result[1], $_GET['page']));
			break;
		case 'publish' :
			$status = "Published Profiles";
			$result = displayRequirementPublish($begin);
			$paging = displayPagination ( $_GET ['page'], 'publish' ,getNumberTotal($result[1], $_GET['page']));
			break;
		case 'unpublish' :
			$status = "Unpublished Profiles";
			$result = displayRequirementUnPublish($begin);
			$paging = displayPagination ( $_GET ['page'], 'unpublish' ,getNumberTotal($result[1], $_GET['page']));
			break;
		case 'profile' :
			$status = "Profile Packages";
			$result = displayProfile ( $begin );
			$paging = displayPagination ( $_GET ['page'], 'profile',getNumberTotal($result[1], $_GET['page']) );
			break;
		case 'admin' : 
			$_SESSION['data']='true';
			$_SESSION['key']=6;
			$_SESSION['firm'] = 'true';
			$ksql = "UPDATE dataentry SET last=NOW() WHERE id=4";
			mysql_query($ksql) or die(mysql_error());
			echo '<script>window.open("../dataentry/index.php","_blank");</script>';
			break;
		default :
			$status = "Career4you.in|Administrator";
			break;
	
	}
	/*
	 * add provition for data entry for admin. it would be very easy and quite
	 */
	
	echo '<div style="position:fixed;left:40%;top:15px"><h2>' . $status . '</h2>
<select id="keyid" onchange="showInfo(this.value)" name="keydata"><option value="1">Employer</option><option value="2">Requirement</option><option value="3">Candidate</option><option value="4">Employer ID</option><option value="5">Requirement ID</option><option value="6">Candidate ID</option><option value="7">Other(Requirement)</option><option value="8">Other(Employer)</option><option value="9">Other(Candidate)</option></select><input value="Enter the name...." onfocus="doClear()" type="text" id="dataid"  name="data" size="30"/> <input type="button" onclick="performSearch()" value="Search"/></div>
<div style="position:fixed;left:40%;top:120px;background-color:white;visibility:visible;" id="google" ></div>';
	
	?>

			</td>
		</tr>
		<tr>
<td	style="background-color: #E0FFFF; width: 220px; vertical-align: top; white-space: nowrap;" id="sidelinks">

<a href="adminHome.php?msg=admin" >Add	Candidate</a>
<a href="adminHome.php?msg=admin" >Add Resume</a>
<a href="adminHome.php?msg=candidate" >Candidate Details</a>
<a href="adminHome.php?msg=firm" >Firm Details</a>
<a href="adminHome.php?msg=requirement" >Requirement Details</a>
<a href="adminHome.php?msg=datacandidate" >Data Entry Candidate Details </a>
<a href="adminHome.php?msg=datafirm" >Data Entry Firm Details </a>
<a href="adminHome.php?msg=datarequirement" >Data Entry Requirement Details</a>
<a href="adminHome.php?msg=dataoperator" >Data Entry Operator Details</a>
<a href="adminHome.php?msg=order" >Order Details</a>
<a href="adminHome.php?msg=profile" >Profile Details</a>
<a href="" onclick="javascript:void window.open('create.php','_blank',
'width=500,height=300,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=1,resizable=0,left=100,top=100');"
				>Create New Data Operator </a>
<a href="" onclick="javascript:void window.openasdasdsa('flashadvert.php','_blank',
'width=500,height=300,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=1,resizable=0,left=100,top=100');"
				>Upload Advertisement </a>
<a href="adminHome.php?msg=" >Advertisement Details</a>
<a href="adminHome.php?msg=" >Advertisement Orders</a>
<a href="adminHome.php?msg=golden" >Golden Profiles : <?php echo $gold[0]?></a>
<a href="adminHome.php?msg=premium" >Premium Profiles : <?php echo $premium[0]?></a>
<a href="adminHome.php?msg=publish" >Published Profiles : <?php echo $publish[0]?></a>
<a href="adminHome.php?msg=unpublish" >Unpublished Profiles : <?php echo $notpublish[0]?></a>

Total Candidates:<?php echo $rowrr[0]?><br />Total Employers:<?php echo $rowpc[0]?><br />Total Requirements:<?php echo $rowpcr[0]?><br />
			</td>
			<td id="data"
				style="background-color: lightblue; text-align: center; vertical-align: top">

<?php
echo $result[0];
echo $paging;
?>
</td>
		</tr>
		<tr>
			<td colspan="2" style="background-color: #9FC; text-align: center;">
				Copyright &copy; Gitacommunications.com</td>
		</tr>
	</table>
</body>
</html>
<?php
function getNumberTotal($sql,$page)
{
	global $end;
	$rest = mysql_query($sql);
	$cnt  = mysql_num_rows($rest);
	$total_page = ceil($cnt/$end);
	isset($page)?$page:$page=1;
	$result = '<span style="text-align:center;color:red;position: fixed; left: 45%; bottom: 30px;background-color: white;">Page '.$page.'<br/>Total '.$cnt.' Result(s) in '.$total_page.' Page(s).</span>';
	return $result;
}
function displayCandidate($begin) {
	global $counting_variable, $end;
	$sql = "SELECT * FROM register WHERE entry!='operator' ORDER BY id DESC";
	$xql = $sql;
	$sql .= " LIMIT $begin,$end";
	$rst = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $rst ) > 0) {
		$data = '<table><tr><th>No</th>
						<th>Name</th>
						<th>Age</th>
						<th>Marriage</th>
						<th>Present Address</th>
						<th>Phone</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Resume</th>
						<th>Password</th>
					</tr>';
		while ( $row = mysql_fetch_array ( $rst ) ) {
			$data .= '
<tr><td><a target="_blank" href="adminEdit.php?msg=candi&num=' . $row ["id"] . '">' . $counting_variable . '</a></td><td>' . $row ["name"] . '</td><td>' . $row ["age"] . '</td><td>' . $row ["marriage"] . '</td><td>' . $row ["peraddress"] . '</td><td>' . $row ["phone"] . '</td><td>' . $row ["mobile"] . '</td><td>' . $row ["email"] . '</td><td>' . $row ["resume"] . '</td><td>' . $row ["password"] . '</td></tr>';
			$counting_variable ++;
		}
	}
	$data .= '</table>';
	$datum[] = $data;
	$datum[] = $xql;
	return $datum;
}
function displayDataCandidate($begin) {
	global $counting_variable, $end;
	$sql = "SELECT register.id AS id,register.name AS name,register.father AS father,register.birthplace AS birthplace,register.birthday AS birthday,register.age AS age,register.marriage AS marriage,register.wife AS wife,register.child AS child,register.peraddress AS peraddress,register.preaddress AS preaddress,register.phone AS phone,register.mobile AS mobile,register.fax AS fax,register.email AS email,register.resume AS resume,dataentry.name AS intro_name,register.password AS password FROM register INNER JOIN dataentry ON register.user=dataentry.id WHERE entry='operator' ORDER BY register.id DESC";
	$xql = $sql;
	$sql .= " LIMIT $begin,$end";
	$rst = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $rst ) > 0) {
		$data = '
<table>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Age</th>
						<th>Marriage</th>
						<th>Present Address</th>
						<th>Phone</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Resume</th>
						<th>Password</th>
						<th>Entered By</th>
					</tr>';
		while ( $row = mysql_fetch_array ( $rst ) ) {
			$data .= '
<tr><td><a target="_blank" href="adminEdit.php?msg=candi&num=' . $row ["id"] . '">' . $counting_variable . '</a></td><td>' . $row ["name"] . '</td><td>' . $row ["age"] . '</td><td>' . $row ["marriage"] . '</td><td style="white-space:normal;">' . $row ["peraddress"] . '</td><td>' . $row ["phone"] . '</td><td>' . $row ["mobile"] . '</td><td>' . $row ["email"] . '</td><td>' . $row ["resume"] . '</td><td>' . $row ["intro_name"] . '</td><td>' . $row ["password"] . '</td></tr>';
			$counting_variable ++;
		}
	}
	
	$data .= '</table>';
	$datum[] = $data;
	$datum[] = $xql;
	return $datum;
}
function displayFirm($begin) {
	global $counting_variable, $end;
	$sql = "SELECT * FROM employer WHERE arrival!='operator' ORDER BY id DESC";
	$xql = $sql;
	$sql .= " LIMIT $begin,$end";
	$rst = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $rst ) > 0) {
		$data = '
<table>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Type</th>
						<th>Address</th>
						<th>Place</th>
						<th>Pin</th>
						<th>State</th>
						<th>Country</th>
						<th>Phone</th>
						<th>Mobile</th>
						<th>Fax</th>
						<th>Email</th>
						<th>Website</th>
						<th>Profile</th>
						<th>Enquiry Officer</th>
						<th>Enquiry Designation</th>
						<th>Enquiry Number</th>
						<th>Publish</th>
						<th>Paid</th>
						<th>Premier</th>
					</tr>';
		while ( $row = mysql_fetch_array ( $rst ) ) {
			$data .= '
<tr><td><a target="_blank" href="adminEdit.php?msg=employ&num=' . $row ["id"] . '">' . $counting_variable . '</a></td><td>' . $row ['name'] . '</td><td>' . $row ['type'] . '</td><td>' . $row ['address'] . '</td><td>' . $row ['district'] . '</td><td>' . $row ['pin'] . '</td><td>' . $row ['state'] . '</td><td>' . $row ['country'] . '</td><td>' . $row ['phone'] . '</td><td>' . $row ['mobile'] . '</td><td>' . $row ['fax'] . '</td><td>' . $row ['email'] . '</td><td>' . $row ['website'] . '</td><td>' . $row ['profile'] . '</td><td>' . $row ['person'] . '</td><td>' . $row ['designation'] . '</td><td>' . $row ['contact'] . '</td><td><a href="javascript:changePublish(111,' . $row ["id"] . ')" >' . $row ['publish'] . '</a></td><td><a href="javascript:changePaid(111,' . $row ["id"] . ')" >' . $row ['paid'] . '</a></td><td><a href="javascript:changePremier(111,' . $row ["id"] . ')" >' . $row ['premier'] . '</a></td></tr>';
			$counting_variable ++;
		}
	}
	$data .= '</table>';
	$datum[] = $data;
	$datum[] = $xql;
	return $datum;
}
function displayDataFirm($begin) {
	global $counting_variable, $end;
	$sql = "SELECT employer.id AS id,employer.name AS name,employer.type AS type,employer.address AS address,employer.district AS district,employer.pin AS pin,employer.state AS state,employer.country AS country,employer.phone AS phone,employer.mobile AS mobile,employer.fax AS fax,employer.website AS website,employer.profile AS profile,employer.person AS person,employer.email AS email,employer.designation AS designation,dataentry.name AS intro_name,employer.publish AS publish,employer.paid AS paid,employer.premier AS premier FROM employer INNER JOIN dataentry ON employer.userid=dataentry.id WHERE arrival='operator' ORDER BY employer.id DESC";
	$xql = $sql;
	$sql .= " LIMIT $begin,$end";
	$rst = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $rst ) > 0) {
		$data = '
<table>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Type</th>
						<th>Address</th>
						<th>Place</th>
						<th>Pin</th>
						<th>State</th>
						<th>Country</th>
						<th>Phone</th>
						<th>Mobile</th>
						<th>Fax</th>
						<th>Email</th>
						<th>Website</th>
						<th>Profile</th>
						<th>Enquiry Officer</th>
						<th>Enquiry Designation</th>
						<th>Enquiry Number</th>
						<th>Entered By</th>
						<th>Publish</th>
						<th>Paid</th>
						<th>Premier</th>
					</tr>';
		while ( $row = mysql_fetch_array ( $rst ) ) {
			$data .= '
<tr><td><a target="_blank" href="adminEdit.php?msg=employ&num=' . $row ["id"] . '">' . $counting_variable . '</a></td><td>' . $row ['name'] . '</td><td>' . $row ['type'] . '</td><td>' . $row ['address'] . '</td><td>' . $row ['district'] . '</td><td>' . $row ['pin'] . '</td><td>' . $row ['state'] . '</td><td>' . $row ['country'] . '</td><td>' . $row ['phone'] . '</td><td>' . $row ['mobile'] . '</td><td>' . $row ['fax'] . '</td><td>' . $row ['email'] . '</td><td>' . $row ['website'] . '</td><td>' . $row ['profile'] . '</td><td>' . $row ['person'] . '</td><td>' . $row ['designation'] . '</td><td>' . $row ['contact'] . '</td><td>' . $row ['intro_name'] . '</td><td><a href="javascript:changePublish(111,' . $row ["id"] . ')" >' . $row ['publish'] . '</a></td><td><a href="javascript:changePaid(111,' . $row ["id"] . ')" >' . $row ['paid'] . '</a></td><td><a href="javascript:changePremier(111,' . $row ["id"] . ')" >' . $row ['premier'] . '</a></td></tr>';
			$counting_variable ++;
		}
	}
	$data .= '
</table>';
	$datum[] = $data;
	$datum[] = $xql;
	return $datum;
}
function displayRequirement($begin) {
	global $counting_variable, $end;
	$sql = "SELECT * FROM employer INNER JOIN requirement ON employer.id=requirement.empid WHERE employer.arrival!='operator' ORDER BY requirement.id DESC";
	$xql = $sql;
	$sql .= " LIMIT $begin,$end";
	$rst = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $rst ) > 0) {
		$data = '
<table>
					<tr>
						<th>No</th>
						<th>Designation</th>
						<th>Vacancy</th>
						<th>Age</th>
						<th>Gender</th>
						<th>Salary</th>
						<th>Posted On</th>
						<th>Employer</th>
						<th>Experience</th>
						<th>Time</th>
						<th>Category</th>
						<th>Applicants</th>
						<th>Requirement</th>
						<th>Publish</th>
						<th>Paid</th>
						<th>Premier</th>
						<th style="white-space:nowrap;">Send  AS Mail</th>
						<th>Mail Sent ON</th>
					</tr>';
		while ( $row = mysql_fetch_array ( $rst ) ) {
			$data .= '
<tr><td><a  href="adminEdit.php?msg=jobs&num=' . $row ["id"] . '" target="_blank">' . $counting_variable . '</a></td><td>' . $row ['designation'] . '</td><td>' . $row ['vacancy'] . '</td><td>' . $row ['age'] . '</td><td>' . $row ['sex'] . '</td><td>' . $row ['salary'] . '</td><td>' . $row ['lastchange'] . '</td><td>' . $row ['name'] . '</td><td>' . $row ['experience'] . '</td><td>' . $row ['type'] . '</td><td>' . $row ['category'] . '</td><td>' . $row ['applicant'] . '</td><td>' . $row ['requirement'] . '</td><td><a href="javascript:changePublish(222,' . $row ["id"] . ')" >' . $row ['publish'] . '</a></td><td><a href="javascript:changePaid(222,' . $row ["id"] . ')" >' . $row ['paid'] . '</a></td><td><a href="javascript:changePremier(222,' . $row ["id"] . ')" >' . $row ['premier'] . '</a></td>';
			if (empty ( $row ['mailedtoOn'] )) {
				$data .= '<td><button style=" background-color: green; color: white; border: green;" onclick="sendJobASMail(' . $row ['id'] . ')">Send Mail</button></td><td>Not Send</td></tr>';
			} else {
				$data .= '<td><button style=" background-color: red; color: white; border: red;" return="false" onclick="sendJobASMail(' . $row ['id'] . ')">Mail Sent</button></td><td>' . $row ['mailedtoOn'] . '</td></tr>';
			
			}
			$counting_variable ++;
		}
	}
	$data .= '
</table>';
	$datum[] = $data;
	$datum[] = $xql;
	return $datum;
}
function displayDataRequirement($begin) {
	global $counting_variable, $end;
	$sql = "SELECT requirement.id AS id,requirement.designation AS designation,requirement.vacancy AS vacancy,
	requirement.age AS age,requirement.sex AS sex,requirement.salary AS salary,requirement.lastchange AS lastchange,
	requirement.empid AS empid,requirement.experience AS experience,requirement.type AS type,requirement.category AS category,
	requirement.applicant AS applicant,requirement.requirement AS requirement,employer.name AS ename,dataentry.name AS dname,
	requirement.publish AS publish,requirement.paid AS paid,requirement.premier AS premier,requirement.mailedtoOn AS mailedtoOn 
	FROM employer INNER JOIN requirement ON employer.id=requirement.empid INNER JOIN dataentry ON dataentry.id=employer.userid  
	WHERE employer.arrival='operator' ORDER BY requirement.id DESC";
	$xql = $sql;
	$sql .= " LIMIT $begin,$end";
	$rst = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $rst ) > 0) {
		$data = '
<table>
					<tr>
						<th>No</th>
						<th>Designation</th>
						<th>Vacancy</th>
						<th>Age</th>
						<th>Gender</th>
						<th>Salary</th>
						<th>Posted On</th>
						<th>Experience</th>
						<th>Time</th>
						<th>Category</th>
						<th>Applicants</th>
						<th>Requirement</th>
						<th>Employer</th>
						<th>Entered By</th>
						<th>Publish</th>
						<th>Paid</th>
						<th>Premier</th>
						<th style="white-space:nowrap;">Send  AS Mail</th>
						<th>Mail Sent ON</th>
					</tr>';
		while ( $row = mysql_fetch_array ( $rst ) ) {
			$data .= '
<tr><td><a  href="adminEdit.php?msg=jobs&num=' . $row ["id"] . '" target="_blank">' . $counting_variable . '</a></td><td>' . $row ['designation'] . '</td><td>' . $row ['vacancy'] . '</td><td>' . $row ['age'] . '</td><td>' . $row ['sex'] . '</td><td>' . $row ['salary'] . '</td><td>' . $row ['lastchange'] . '</td><td>' . $row ['experience'] . '</td><td>' . $row ['type'] . '</td><td>' . $row ['category'] . '</td><td>' . $row ['applicant'] . '</td><td>' . $row ['requirement'] . '</td><td>' . $row ['ename'] . '</td><td>' . $row ['dname'] . '</td><td><a href="javascript:changePublish(222,' . $row ["id"] . ')" >' . $row ['publish'] . '</a></td><td><a href="javascript:changePaid(222,' . $row ["id"] . ')" >' . $row ['paid'] . '</a></td><td><a href="javascript:changePremier(222,' . $row ["id"] . ')" >' . $row ['premier'] . '</a></td>';
			if (empty ( $row ['mailedtoOn'] )) {
				$data .= '<td><button style=" background-color: green; color: white; border: green;" onclick="sendJobASMail(' . $row ['id'] . ')">Send Mail</button></td><td>Not Send</td></tr>';
			} else {
				$data .= '<td><button style=" background-color: red; color: white; border: red;" return="false" onclick="sendJobASMail(' . $row ['id'] . ')">Mail Sent</button></td><td>' . $row ['mailedtoOn'] . '</td></tr>';
			
			}
			$counting_variable ++;
		}
	}
	$data .= '
</table>';
	$datum[] = $data;
	$datum[] = $xql;
	return $datum;
}
function displayDataOperator($begin) {
	global $counting_variable, $end;
	$sql = "SELECT * FROM dataentry  ORDER BY id DESC";
	$xql = $sql;
	$sql .= " LIMIT $begin,$end";
	$rst = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $rst ) > 0) {
		$data = '
<table>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Mobile</th>
						<th>Contact</th>
						<th>Email</th>
						<th>Password</th>
						<th>Last</th>
						<th>Status</th>
					</tr>';
		while ( $row = mysql_fetch_array ( $rst ) ) {
			$data .= '
<tr><td>' . $counting_variable . '</td><td>' . $row ['name'] . '</td><td>' . $row ['mobile'] . '</td><td>' . $row ['contact'] . '</td><td>' . $row ['email'] . '</td><td>' . $row ['password'] . '</td><td>' . $row ['last'] . '</td><td>' . $row ['status'] . '</td></tr>';
			$counting_variable ++;
		}
	}
	$data .= '
</table>';
	$datum[] = $data;
	$datum[] = $xql;
	return $datum;
}
function displayOrder($begin) {
	global $counting_variable, $end;
	$sql = "SELECT * FROM payment  ORDER BY id DESC";
	$xql = $sql;
	$sql .= " LIMIT $begin,$end";
	$rst = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $rst ) > 0) {
		$data = '
<table>
					<tr>
						<th>No</th>
						<th>Plan</th>
						<th>Cost</th>
						<th>Deposit</th>
						<th>Mode</th>
						<th>Bank</th>
						<th>Branch</th>
						<th>Date</th>
						<th>Time</th>
						<th>Name</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Address</th>
						<th>Status</th>
						<th>Empid</th>
						<th>Total</th>
						<th>Rest</th>
						<th>Used</th>
						<th>Admin Status</th>
						<th>Result</th>
						<th>Activated On</th>
					</tr>';
		while ( $row = mysql_fetch_array ( $rst ) ) {
			$data .= '
<tr><td>' . $counting_variable . '</td><td>' . $row ['plan'] . '</td><td>' . $row ['cost'] . '</td><td>' . $row ['deposit'] . '</td><td>' . $row ['mode'] . '</td><td>' . $row ['bank'] . '</td><td>' . $row ['branch'] . '</td><td>' . $row ['remit'] . '</td><td>' . $row ['time'] . '</td><td>' . $row ['name'] . '</td><td>' . $row ['mobile'] . '</td><td>' . $row ['email'] . '</td><td>' . $row ['address'] . '</td><td>' . $row ['status'] . '</td><td><a target="_blank" href="adminEdit.php?msg=employ&num=' . $row ["empid"] . '">' . $row ['empid'] . '</a></td><td>' . $row ['cound'] . '</td><td>' . $row ['rest'] . '</td><td>' . $row ['used'] . '</td><td ><a id="' . $row ["id"] . '" href="javascript:Consider(' . $row ["id"] . ')" >' . $row ['admin'] . '</a></td><td>' . $row ['result'] . '</td><td>' . $row ['actiondate'] . '</td></tr>';
			$counting_variable ++;
		}
	} else {
		echo 'No Results';
	}
	$data .= '
</table>';
	$datum[] = $data;
	$datum[] = $xql;
	return $datum;
}
function displayProfile($begin) {
	global $counting_variable, $end;
	$sql = "SELECT * FROM profile WHERE status='active'  ORDER BY id DESC";
	$xql = $sql;
	$sql .= " LIMIT $begin,$end";
	$rst = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $rst ) > 0) {
		$data = '
<table>
					<tr>
						<th>No</th>
						<th>Profile Name</th>
						<th>Cost</th>
						<th>Number of Profile</th>
						<th>Validity</th>
						<th>Status</th>
						<th>------</th>
					</tr>';
		while ( $row = mysql_fetch_array ( $rst ) ) {
			$data .= '
<tr><td>' . $counting_variable . '</td><td>' . $row ['profile'] . '</td><td>' . $row ['cost'] . '</td><td>' . $row ['cound'] . '</td><td>' . $row ['validity'] . '</td><td><a href="javascript:manStatus(' . $row ["id"] . ')">' . $row ['status'] . '</a></td><td><a target="_blank" href="adminEdit.php?msg=profile&num=' . $row ["id"] . '">Edit</a></td></tr>';
			$counting_variable ++;
		}
		$data .= '
</table>';
	$datum[] = $data;
	$datum[] = $xql;
	return $datum;
	}
	?>
<!-- <table>
	<tr>
		<td><a href="adminEdit.php?msg=newpro" target="_blank">Add New Plan</a></td>
	</tr>
</table> -->

<?php
}
function displayPagination($pag, $msg,$lines) {
	$p = $pag <= 1 ? $pag = 1 : $pag - 1;
	$n = $pag + 1;
	$data = '<div align="left">
	<input type="button" name="previous" value="PREVIOUS PAGE" onclick="prevPage(' . $p . ',\'' . $msg . '\')" id="prevbutton"
	style="position: fixed; left: 25px; bottom: 30px; background-color: blue; color: white; border: blue;" />
	'.$lines.'
<input type="button" name="next" value="NEXT PAGE"	 onclick="nextPage(' . $n . ',\'' . $msg . '\')" id="nextbutton"
style="position: fixed; right: 25px; bottom: 30px; background-color: blue; color: white; border: blue;" /></div>';
	return $data;
}
function displayRequirementGolden($begin) {
	global $counting_variable, $end;
	$sql = "SELECT * FROM employer INNER JOIN requirement ON employer.id=requirement.empid WHERE requirement.publish='Y' AND requirement.paid='Y' ORDER BY requirement.id DESC";
	$sql .= " LIMIT $begin,$end";
	$rst = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $rst ) > 0) {
		$data = '
		<table>
		<tr>
		<th>No</th>
		<th>Designation</th>
		<th>Vacancy</th>
		<th>Age</th>
		<th>Gender</th>
		<th>Salary</th>
		<th>Posted On</th>
		<th>Employer</th>
		<th>Experience</th>
		<th>Time</th>
		<th>Category</th>
		<th>Applicants</th>
		<th>Requirement</th>
		<th>Publish</th>
		<th>Paid</th>
		<th>Premier</th>
		<th style="white-space:nowrap;">Send  AS Mail</th>
		<th>Mail Sent ON</th>
		</tr>';
		while ( $row = mysql_fetch_array ( $rst ) ) {
			$data .= '
			<tr><td><a  href="adminEdit.php?msg=jobs&num=' . $row ["id"] . '" target="_blank">' . $counting_variable . '</a></td><td>' . $row ['designation'] . '</td><td>' . $row ['vacancy'] . '</td><td>' . $row ['age'] . '</td><td>' . $row ['sex'] . '</td><td>' . $row ['salary'] . '</td><td>' . $row ['lastchange'] . '</td><td>' . $row ['name'] . '</td><td>' . $row ['experience'] . '</td><td>' . $row ['type'] . '</td><td>' . $row ['category'] . '</td><td>' . $row ['applicant'] . '</td><td>' . $row ['requirement'] . '</td><td><a href="javascript:changePublish(222,' . $row ["id"] . ')" >' . $row ['publish'] . '</a></td><td><a href="javascript:changePaid(222,' . $row ["id"] . ')" >' . $row ['paid'] . '</a></td><td><a href="javascript:changePremier(222,' . $row ["id"] . ')" >' . $row ['premier'] . '</a></td>';
			if (empty ( $row ['mailedtoOn'] )) {
				$data .= '<td><button style=" background-color: green; color: white; border: green;" onclick="sendJobASMail(' . $row ['id'] . ')">Send Mail</button></td><td>Not Send</td></tr>';
			} else {
				$data .= '<td><button style=" background-color: red; color: white; border: red;" return="false" onclick="sendJobASMail(' . $row ['id'] . ')">Mail Sent</button></td><td>' . $row ['mailedtoOn'] . '</td></tr>';
					
			}
			$counting_variable ++;
		}
	}
	$data .= '
	</table>';
	return $data;
}
function displayRequirementPremium($begin) {
	global $counting_variable, $end;
	$sql = "SELECT * FROM employer INNER JOIN requirement ON employer.id=requirement.empid WHERE requirement.publish='Y' AND requirement.premier='Y' ORDER BY requirement.id DESC";
	$xql = $sql;
	$sql .= " LIMIT $begin,$end";
	$rst = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $rst ) > 0) {
		$data = '
		<table>
		<tr>
		<th>No</th>
		<th>Designation</th>
		<th>Vacancy</th>
		<th>Age</th>
		<th>Gender</th>
		<th>Salary</th>
		<th>Posted On</th>
		<th>Employer</th>
		<th>Experience</th>
		<th>Time</th>
		<th>Category</th>
		<th>Applicants</th>
		<th>Requirement</th>
		<th>Publish</th>
		<th>Paid</th>
		<th>Premier</th>
		<th style="white-space:nowrap;">Send  AS Mail</th>
		<th>Mail Sent ON</th>
		</tr>';
		while ( $row = mysql_fetch_array ( $rst ) ) {
			$data .= '
			<tr><td><a  href="adminEdit.php?msg=jobs&num=' . $row ["id"] . '" target="_blank">' . $counting_variable . '</a></td><td>' . $row ['designation'] . '</td><td>' . $row ['vacancy'] . '</td><td>' . $row ['age'] . '</td><td>' . $row ['sex'] . '</td><td>' . $row ['salary'] . '</td><td>' . $row ['lastchange'] . '</td><td>' . $row ['name'] . '</td><td>' . $row ['experience'] . '</td><td>' . $row ['type'] . '</td><td>' . $row ['category'] . '</td><td>' . $row ['applicant'] . '</td><td>' . $row ['requirement'] . '</td><td><a href="javascript:changePublish(222,' . $row ["id"] . ')" >' . $row ['publish'] . '</a></td><td><a href="javascript:changePaid(222,' . $row ["id"] . ')" >' . $row ['paid'] . '</a></td><td><a href="javascript:changePremier(222,' . $row ["id"] . ')" >' . $row ['premier'] . '</a></td>';
			if (empty ( $row ['mailedtoOn'] )) {
				$data .= '<td><button style=" background-color: green; color: white; border: green;" onclick="sendJobASMail(' . $row ['id'] . ')">Send Mail</button></td><td>Not Send</td></tr>';
			} else {
				$data .= '<td><button style=" background-color: red; color: white; border: red;" return="false" onclick="sendJobASMail(' . $row ['id'] . ')">Mail Sent</button></td><td>' . $row ['mailedtoOn'] . '</td></tr>';
					
			}
			$counting_variable ++;
		}
	}
	$data .= '
	</table>';
	$datum[] = $data;
	$datum[] = $xql;
	return $datum;
}
function displayRequirementPublish($begin) {
	global $counting_variable, $end;
	$sql = "SELECT * FROM employer INNER JOIN requirement ON employer.id=requirement.empid WHERE requirement.publish='Y' ORDER BY requirement.id DESC";
	$xql = $sql;
	$sql .= " LIMIT $begin,$end";
	$rst = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $rst ) > 0) {
		$data = '
		<table>
		<tr>
		<th>No</th>
		<th>Designation</th>
		<th>Vacancy</th>
		<th>Age</th>
		<th>Gender</th>
		<th>Salary</th>
		<th>Posted On</th>
		<th>Employer</th>
		<th>Experience</th>
		<th>Time</th>
		<th>Category</th>
		<th>Applicants</th>
		<th>Requirement</th>
		<th>Publish</th>
		<th>Paid</th>
		<th>Premier</th>
		<th style="white-space:nowrap;">Send  AS Mail</th>
		<th>Mail Sent ON</th>
		</tr>';
		while ( $row = mysql_fetch_array ( $rst ) ) {
			$data .= '
			<tr><td><a  href="adminEdit.php?msg=jobs&num=' . $row ["id"] . '" target="_blank">' . $counting_variable . '</a></td><td>' . $row ['designation'] . '</td><td>' . $row ['vacancy'] . '</td><td>' . $row ['age'] . '</td><td>' . $row ['sex'] . '</td><td>' . $row ['salary'] . '</td><td>' . $row ['lastchange'] . '</td><td>' . $row ['name'] . '</td><td>' . $row ['experience'] . '</td><td>' . $row ['type'] . '</td><td>' . $row ['category'] . '</td><td>' . $row ['applicant'] . '</td><td>' . $row ['requirement'] . '</td><td><a href="javascript:changePublish(222,' . $row ["id"] . ')" >' . $row ['publish'] . '</a></td><td><a href="javascript:changePaid(222,' . $row ["id"] . ')" >' . $row ['paid'] . '</a></td><td><a href="javascript:changePremier(222,' . $row ["id"] . ')" >' . $row ['premier'] . '</a></td>';
			if (empty ( $row ['mailedtoOn'] )) {
				$data .= '<td><button style=" background-color: green; color: white; border: green;" onclick="sendJobASMail(' . $row ['id'] . ')">Send Mail</button></td><td>Not Send</td></tr>';
			} else {
				$data .= '<td><button style=" background-color: red; color: white; border: red;" return="false" onclick="sendJobASMail(' . $row ['id'] . ')">Mail Sent</button></td><td>' . $row ['mailedtoOn'] . '</td></tr>';
					
			}
			$counting_variable ++;
		}
	}
	$data .= '
	</table>';
	$datum[] = $data;
	$datum[] = $xql;
	return $datum;
}
function displayRequirementUnPublish($begin) {
	global $counting_variable, $end;
	$sql = "SELECT * FROM employer INNER JOIN requirement ON employer.id=requirement.empid WHERE requirement.publish='N' ORDER BY requirement.id DESC";
	$xql = $sql;
	$sql .= " LIMIT $begin,$end";
	$rst = mysql_query ( $sql ) or die ( mysql_error () );
	if (mysql_num_rows ( $rst ) > 0) {
		$data = '
		<table>
		<tr>
		<th>No</th>
		<th>Designation</th>
		<th>Vacancy</th>
		<th>Age</th>
		<th>Gender</th>
		<th>Salary</th>
		<th>Posted On</th>
		<th>Employer</th>
		<th>Experience</th>
		<th>Time</th>
		<th>Category</th>
		<th>Applicants</th>
		<th>Requirement</th>
		<th>Publish</th>
		<th>Paid</th>
		<th>Premier</th>
		<th style="white-space:nowrap;">Send  AS Mail</th>
		<th>Mail Sent ON</th>
		</tr>';
		while ( $row = mysql_fetch_array ( $rst ) ) {
			$data .= '
			<tr><td><a  href="adminEdit.php?msg=jobs&num=' . $row ["id"] . '" target="_blank">' . $counting_variable . '</a></td><td>' . $row ['designation'] . '</td><td>' . $row ['vacancy'] . '</td><td>' . $row ['age'] . '</td><td>' . $row ['sex'] . '</td><td>' . $row ['salary'] . '</td><td>' . $row ['lastchange'] . '</td><td>' . $row ['name'] . '</td><td>' . $row ['experience'] . '</td><td>' . $row ['type'] . '</td><td>' . $row ['category'] . '</td><td>' . $row ['applicant'] . '</td><td>' . $row ['requirement'] . '</td><td><a href="javascript:changePublish(222,' . $row ["id"] . ')" >' . $row ['publish'] . '</a></td><td><a href="javascript:changePaid(222,' . $row ["id"] . ')" >' . $row ['paid'] . '</a></td><td><a href="javascript:changePremier(222,' . $row ["id"] . ')" >' . $row ['premier'] . '</a></td>';
			if (empty ( $row ['mailedtoOn'] )) {
				$data .= '<td><button style=" background-color: green; color: white; border: green;" onclick="sendJobASMail(' . $row ['id'] . ')">Send Mail</button></td><td>Not Send</td></tr>';
			} else {
				$data .= '<td><button style=" background-color: red; color: white; border: red;" return="false" onclick="sendJobASMail(' . $row ['id'] . ')">Mail Sent</button></td><td>' . $row ['mailedtoOn'] . '</td></tr>';
					
			}
			$counting_variable ++;
		}
	}
	$data .= '
	</table>';
	$datum[] = $data;
	$datum[] = $xql;
	return $datum;
}
?>









