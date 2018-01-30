<?php
include_once 'include/config.php';
if ($_SESSION['account']!='true'||$_SESSION['employer']!='true'){
$mysql = "SELECT requirement.designation AS designation,requirement.experience AS experience,
		  requirement.type AS type,requirement.lastchange AS postdate,employer.district AS district,
		  requirement.id AS reqid,employer.name AS company,employer.profile AS profile,
		  requirement.lastchange AS lastchange,requirement.category AS category FROM employer 
		  INNER JOIN requirement ON employer.id=requirement.empid WHERE 
		   employer.publish='Y' AND requirement.publish='Y' ORDER BY requirement.id DESC LIMIT 0,12";
$myresult = mysql_query ( $mysql ) or die ( mysql_error () );

//echo $pages;
if (mysql_num_rows ( $myresult ) > 0) {
	?>
<table width="700px" cellpadding="2" id="homefill"
	style="margin-top: 25px;">
	<tr>
		<td colspan="4" align="center" style="font-weight: bold">HOT VACANCIES</td>
	</tr>
	<tr>
		<td colspan="5" align="left"><img src="../images/green_line.png"
			alt="photo" width="700px" /></td>
	</tr>
	<tr>
		<td>
<?php
	$lowercont = 0;
	while ( $col = mysql_fetch_array ( $myresult ) ) {
		$reqid = ucwords ( strtolower ( $col ['reqid'] ) );
		$desig = ucwords ( strtolower ( $col ['designation'] ) );
		$expri = ucwords ( strtolower ( $col ['experience'] ) );
		$jtype = ucwords ( strtolower ( $col ['type'] ) );
		$postd = ucwords ( strtolower ( $col ['postdate'] ) );
		$place = ucwords ( strtolower ( $col ['district'] ) );
		$compn = ucwords ( strtolower ( $col ['company'] ) );
		$profil = ucwords ( strtolower ( $col ['profile'] ) );
		$last = ucwords ( strtolower ( $col ['lastchange'] ) );
		$cate = ucwords ( strtolower ( $col ['category'] ) );
		
		if ($lowercont % 2 == 0) {
			?>
<table cellspacing="3"
			style="border-bottom: 1px solid grey; width: 300px; float: left; padding-bottom: 10px;height:161px;"
			onmouseover="showIt(<?php
			echo $lowercont?>)"
			onmouseout="hideIt(<?php
			echo $lowercont?>)">
			<tr>
				<td style="text-align: left" colspan="2"><b
					title="<?php
			echo $cate;
			?>">
<?php
			echo substr ( trim ( $desig ) . " @ " . trim ( $place ), 0, 40 ) . "..";
			?></b></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Role</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
			echo substr(trim ( $desig ),0,18)."..";
			?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Experience<a
					id="<?php
			echo $lowercont?>"
					style="position: absolute; padding: 20px 25px; visibility: hidden"
					onmouseover="showIt(<?php
			echo $lowercont?>)"
					onmouseout="hideIt(<?php
			echo $lowercont?>)"
					href="javascript:showDisplay(<?php
			echo $reqid?>)">View &amp;
				Apply </a></td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
			echo trim ( $expri );
			?> Year(s)</td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Job Type</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
			echo trim ( $jtype );
			?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Company Name</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
			echo substr ( trim ( $compn ), 0, 18 ) . "..";
			?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px; color: #789324"
					title="<?php
			echo $profil;
			?>" colspan="2">
<?php
			echo substr ( trim ( $profil ), 0, 30 ) . "...";
			?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Posted:</td>
				<td><?php
			echo $last?></td>
			</tr>
		</table>
		<?php
		} else {
			?>
<table cellspacing="3"
			style="border-bottom: 1px solid grey; width: 300px;  float: right; padding-bottom: 10px;height:161px;"
			onmouseover="showIt(<?php
			echo $lowercont?>)"
			onmouseout="hideIt(<?php
			echo $lowercont?>)">
			<tr>
				<td style="text-align: left" colspan="2"><b
					title="<?php
			echo $cate;
			?>">
<?php
			echo substr ( trim ( $desig ) . " @ " . trim ( $place ), 0, 40 ) . "..";
			?></b></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Role</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
			echo substr(trim ( $desig ),0,18)."..";
			?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Experience<a
					id="<?php
			echo $lowercont?>"
					style="position: absolute; padding: 20px 25px; visibility: hidden"
					onmouseover="showIt(<?php
			echo $lowercont?>)"
					onmouseout="hideIt(<?php
			echo $lowercont?>)"
					href="javascript:showDisplay(<?php
			echo $reqid?>)">View &amp;
				Apply </a></td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
			echo trim ( $expri );
			?> Year(s)</td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Job Type</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
			echo trim ( $jtype );
			?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Company Name</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
			echo substr ( trim ( $compn ), 0, 18 ) . "..";
			?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px; color: #789324"
					title="<?php echo $profil;?>" colspan="2">
<?php echo substr(trim($profil),0,30)."..."; ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Posted:</td>
				<td><?php echo $last?></td>
			</tr>
		</table>
<?php 
			}
	$lowercont +=1;
	
	
	
	}
	
	  
	
}

?>
</td>
	</tr>
</table><?php }?>