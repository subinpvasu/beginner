<?php
session_start ();
include_once '../include/admin.php';
$hgt = array (0 => "--- Select ---", "Less than 4' 5&quot; (1.35 mts)", "4' 5&quot; (1.35 mts)", 
"4' 6&quot; (1.37 mts)", "4' 7&quot; (1.40 mts)", "4' 8&quot; (1.42 mts)", "4' 9&quot; (1.45 mts)",
 "4' 10&quot; (1.47 mts)", "4' 11&quot; (1.50 mts)", "5' 0&quot; (1.52 mts)", "5' 1&quot; (1.55 mts)", 
 "5' 2&quot; (1.58 mts)", "5' 3&quot; (1.60 mts)", "5' 4&quot; (1.63 mts)", "5' 5&quot; (1.65 mts)",
 "5' 6&quot; (1.68 mts)", "5' 7&quot; (1.70 mts)", "5' 8&quot; (1.73 mts)", "5' 9&quot; (1.75 mts)",
 "5' 10&quot; (1.78 mts)", "5' 11&quot; (1.80 mts)", "6' 0&quot; (1.83 mts)", "6' 1&quot; (1.85 mts)",
 "6' 2&quot; (1.88 mts)", "6' 3&quot; (1.91 mts)", "6' 4&quot; (1.93 mts)", "6' 5&quot; (1.96 mts)",
 "6' 6&quot; (1.98 mts)", "6' 7&quot; (2.01 mts)", "6' 8&quot; (2.03 mts)", "6' 9&quot; (2.06 mts)",
 "6' 10&quot; (2.08 mts)", "6' 11&quot; (2.11 mts)", "7' (2.13 mts)", "Greater than 7' (2.13 mts)" );
$end = 30;
if ($_GET ['vadhu-on'] == 'true') {
	
	$begin = $_GET['begin'];global $end;
	if($begin<0){$begin=0;}
	$k = $begin+1;
	$sql = "SELECT * FROM personal_details 	WHERE  personal_details.gender='B' AND personal_details.visibility='Y' ORDER BY personal_details.id DESC";
	$rest = mysql_query($sql);
	$cnt  = mysql_num_rows($rest);
	$tot  = ceil($cnt/$end);
	$sql .= " LIMIT $begin,$end";
	$result = mysql_query ( $sql ) or die(mysql_error());
	if (mysql_num_rows ( $result ) > 0) {
		?><table id="output"
	style="border: 1px solid black; border-collapse: collapse; white-space: nowrap;">
	<tr>
		<th>No.</th>
		<th>ID</th>
		<th>Name</th>
		<th>Gender</th>
		<th>Status</th>
		<th>Religion</th>
		<th>Age</th>
		<th>Place</th>
		<th>Email</th>
		<th>Password</th>
		<th>Registered On</th>
		<th>Visibility</th>
		<th>Guest Profile</th>
		<th>Golden Profile</th>
		<th>Premium Profile</th>
		<th>Delete Account</th>
	</tr>
	<?php
		while ( $row = mysql_fetch_array ( $result ) ) {
			?>
	<tr>
		<td><?php
			echo $k?></td>
		<td><a href="javascript:void showDisplay(<?php echo $row[0] ?>)"><?php
			echo $row [0]?></a></td>

		<td><?php
			echo $row ['name']?></td>
		<td><?php
			$row ['gender'] == 'B' ? print "VADHU" : print "VARAN";
			?></td>
		<td><?php
			$row ['marriage'] == 'U' ? print "Unmarried" : print "";
			$row ['marriage'] == 'D' ? print "Divorced" : print "";
			$row ['marriage'] == 'W' ? print "Widowed" : print "";
			?></td>
		<td><?php
			if ($row ['religion'] == 'chri') {
				echo "Christian";
			}
			if ($row ['religion'] == 'hind') {
				echo "Hindu";
			}
			if ($row ['religion'] == 'inte') {
				echo "Inter Caste";
			}
			if ($row ['religion'] == 'jain') {
				echo "Jain";
			}
			if ($row ['religion'] == 'musl') {
				echo "Muslim";
			}
			if ($row ['religion'] == 'sikh') {
				echo "Sikh";
			}
			if ($row ['religion'] == 'nore') {
				echo "No Religion";
			}
			if ($row ['religion'] == 'othe') {
				echo "Others";
			}
			?> </td>
		
		<td><?php
			echo $row ['age']?></td>
		<td><?php
			echo $row ['location']?></td>
			<td><?php
			echo $row ['email']?></td>
			<td><?php
			echo $row ['password']?></td>
			<td><?php
			echo $row ['added']?></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','visibility','<?php
			echo $row ['visibility']?>')"><?php
			echo $row ['visibility']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','guest','<?php
			echo $row ['guest']?>')"><?php
			echo $row ['guest']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','golden','<?php
			echo $row ['golden']?>')"><?php
			echo $row ['golden']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','premium','<?php
			echo $row ['premium']?>')"><?php
			echo $row ['premium']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','delete','<?php
			echo $row ['delete']?>')"><?php
			echo $row ['delete']?></a></td>
	</tr>
		<?php
			$k ++;
		}
		?>
		
	</table>
	
<!-- Pagination here begins.. -->
	
	<input type="hidden" id="begin" value="<?php echo $k-1;?>"/>
	<input type="hidden" id="page"  value="<?php echo ($begin/$end)+1;?>"/>
	
<?php 

/*
 *
 * available:
 * total Pages
 * total rows
 * current page
 * 
 * 
 */


?>	
	

<div style="height:25px;width:1000px;position:fixed;left:0px;bottom:0px;">

<div style="width:300px;position:absolute;height:20px;left:30px;">
<?php if (((($begin/$end)-1)*$end)>-1){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displayonVadhu(<?php echo (($begin/$end)-1)*$end;?>)">Previous Page</button>
<?php }?>
<!-- <?php echo ((($begin/$end)-1)*$end);?> -->
</div>
<div style="width:300px;position:absolute;height:20px;left:360px;color:red;background-color: white;">
<b style="color:blue;">Page <?php echo ($begin/$end)+1;?></b> of 
Total <?php echo $cnt; ?> Profiles in <?php echo $tot; ?> Pages.</div>

<div style="width:300px;position:absolute;height:20px;left:690px">
<?php if (((($begin/$end)+1)*$end)<$cnt){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displayonVadhu(<?php echo (($begin/$end)+1)*$end; ?>)">Next Page</button>
<?php }?></div>
<!-- <?php echo ((($begin/$end)+1)*$end)."|".$tot;?> -->
</div>	
	
	
<!-- Pagination Ends here... -->
	
<?php
	} else {
		?>
<table id="output"
	style="border: 1px solid #dddddd; border-collapse: collapse; margin-top: 225px; white-space: nowrap;">
	<tr>
		<td
			style="width: 600px; text-align: center; color: green; font-weight: bold; border: 1px solid #dddddd;">No
		Details Found.!</td>
	</tr>
</table>
<?php
	}
}
if ($_GET ['varan-on'] == 'true') {
	
	$begin = $_GET['begin'];global $end;
	$k = $begin+1;
	$sql = "SELECT * FROM personal_details 	WHERE  personal_details.gender='G' AND personal_details.visibility='Y'  ORDER BY personal_details.id DESC";
	$rest = mysql_query($sql);
	$cnt  = mysql_num_rows($rest);
	$tot  = ceil($cnt/$end);
	$sql .= " LIMIT $begin,$end";
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		?><table id="output"
	style="border: 1px solid black; border-collapse: collapse; white-space: nowrap;">
	<tr>
		<th>No.</th>
		<th>ID</th>

		<th>Name</th>
		<th>Gender</th>
		<th>Status</th>
		<th>Religion</th>
		<th>Age</th>
		<th>Place</th>
		<th>Email</th>
		<th>Password</th>
		<th>Registered On</th>
		<th>Visibility</th>
		<th>Guest Profile</th>
		<th>Golden Profile</th>
		<th>Premium Profile</th>
		<th>Delete Account</th>
	</tr>
	<?php
		while ( $row = mysql_fetch_array ( $result ) ) {
			?>
	<tr>
		<td><?php
			echo $k?></td>
		<td><a href="javascript:void showDisplay(<?php echo $row[0] ?>)"><?php
			echo $row [0]?></a></td>
		<td><?php
			echo $row ['name']?></td>
		<td><?php
			$row ['gender'] == 'B' ? print "VADHU" : print "VARAN";
			?></td>
		<td><?php
			$row ['marriage'] == 'U' ? print "Unmarried" : print "";
			$row ['marriage'] == 'D' ? print "Divorced" : print "";
			$row ['marriage'] == 'W' ? print "Widowed" : print "";
			?></td>
		<td><?php
			if ($row ['religion'] == 'chri') {
				echo "Christian";
			}
			if ($row ['religion'] == 'hind') {
				echo "Hindu";
			}
			if ($row ['religion'] == 'inte') {
				echo "Inter Caste";
			}
			if ($row ['religion'] == 'jain') {
				echo "Jain";
			}
			if ($row ['religion'] == 'musl') {
				echo "Muslim";
			}
			if ($row ['religion'] == 'sikh') {
				echo "Sikh";
			}
			if ($row ['religion'] == 'nore') {
				echo "No Religion";
			}
			if ($row ['religion'] == 'othe') {
				echo "Others";
			}
			?> </td>
		
		<td><?php
			echo $row ['age']?></td>
		<td><?php
			echo $row ['location']?></td>
			<td><?php
			echo $row ['email']?></td>
			<td><?php
			echo $row ['password']?></td>
			<td><?php
			echo $row ['added']?></td>
			
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','visibility','<?php
			echo $row ['visibility']?>')"><?php
			echo $row ['visibility']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','guest','<?php
			echo $row ['guest']?>')"><?php
			echo $row ['guest']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','golden','<?php
			echo $row ['golden']?>')"><?php
			echo $row ['golden']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','premium','<?php
			echo $row ['premium']?>')"><?php
			echo $row ['premium']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','delete','<?php
			echo $row ['delete']?>')"><?php
			echo $row ['delete']?></a></td>
	</tr>
		<?php
			$k ++;
		}
		?>
	</table>
	<!-- Pagination here begins.. -->
	
	<input type="hidden" id="begin" value="<?php echo $k-1;?>"/>
	<input type="hidden" id="page"  value="<?php echo ($begin/$end)+1;?>"/>
	
<?php 

/*
 *
 * available:
 * total Pages
 * total rows
 * current page
 * 
 * 
 */


?>	
	

<div style="height:25px;width:1000px;position:fixed;left:0px;bottom:0px;">

<div style="width:300px;position:absolute;height:20px;left:30px;">
<?php if (((($begin/$end)-1)*$end)>-1){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displayonVaran(<?php echo (($begin/$end)-1)*$end;?>)">Previous Page</button>
<?php }?>
<!-- <?php echo ((($begin/$end)-1)*$end);?> -->
</div>
<div style="width:300px;position:absolute;height:20px;left:360px;color:red;background-color: white;">
<b style="color:blue;">Page <?php echo ($begin/$end)+1;?></b> of 
Total <?php echo $cnt; ?> Profiles in <?php echo $tot; ?> Pages.</div>

<div style="width:300px;position:absolute;height:20px;left:690px">
<?php if (((($begin/$end)+1)*$end)<$cnt){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displayonVaran(<?php echo (($begin/$end)+1)*$end; ?>)">Next Page</button>
<?php }?></div>
<!-- <?php echo ((($begin/$end)+1)*$end)."|".$tot;?> -->
</div>	
	
	
<!-- Pagination Ends here... -->
<?php
	} else {
		?>
<table id="output"
	style="border: 1px solid #dddddd; border-collapse: collapse; margin-top: 225px; white-space: nowrap;">
	<tr>
		<td
			style="width: 600px; text-align: center; color: green; font-weight: bold; vertical-align: middle; border: 1px solid #dddddd;">No
		Details Found.!</td>
	</tr>
</table>

<?php
	}
}
if ($_GET ['varan-dt'] == 'true') {
	
	$begin = $_GET['begin'];global $end;
	$k = $begin+1;
	$sql = "SELECT * FROM personal_details INNER JOIN qualification ON personal_details.id=qualification.person_id
		 	WHERE personal_details.dataentry!='N' AND personal_details.gender='G' AND personal_details.visibility='Y' ORDER BY personal_details.id DESC";
	$rest = mysql_query($sql);
	$cnt  = mysql_num_rows($rest);
	$tot  = ceil($cnt/$end);
	$sql .= " LIMIT $begin,$end";
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		?><table id="output"
	style="border: 1px solid black; border-collapse: collapse; white-space: nowrap;">
	<tr>
		<th>No.</th>
		<th>ID</th>

		<th>Name</th>
		<th>Gender</th>
		<th>Status</th>
		<th>Religion</th>
		<th>Age</th>
		<th>Place</th>
		<th>Email</th>
		<th>Password</th>
		<th>Registered On</th>
		<th>Visibility</th>
		<th>Guest Profile</th>
		<th>Golden Profile</th>
		<th>Premium Profile</th>
		<th>Delete Account</th>
	</tr>
	<?php
		while ( $row = mysql_fetch_array ( $result ) ) {
			?>
	<tr>
		<td><?php
			echo $k?></td>
	<td><a href="javascript:void showDisplay(<?php echo $row[0] ?>)"><?php
			echo $row [0]?></a></td>

		<td><?php
			echo $row ['name']?></td>
		<td><?php
			$row ['gender'] == 'B' ? print "VADHU" : print "VARAN";
			?></td>
		<td><?php
			$row ['marriage'] == 'U' ? print "Unmarried" : print "";
			$row ['marriage'] == 'D' ? print "Divorced" : print "";
			$row ['marriage'] == 'W' ? print "Widowed" : print "";
			?></td>
		<td><?php
			if ($row ['religion'] == 'chri') {
				echo "Christian";
			}
			if ($row ['religion'] == 'hind') {
				echo "Hindu";
			}
			if ($row ['religion'] == 'inte') {
				echo "Inter Caste";
			}
			if ($row ['religion'] == 'jain') {
				echo "Jain";
			}
			if ($row ['religion'] == 'musl') {
				echo "Muslim";
			}
			if ($row ['religion'] == 'sikh') {
				echo "Sikh";
			}
			if ($row ['religion'] == 'nore') {
				echo "No Religion";
			}
			if ($row ['religion'] == 'othe') {
				echo "Others";
			}
			?> </td>
		
		<td><?php
			echo $row ['age']?></td>
		<td><?php
			echo $row ['location']?></td>
		<td><?php
		echo $row ['email']?></td>
		<td><?php
		echo $row ['password']?></td>
		<td><?php
		echo $row ['added']?></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','visibility','<?php
			echo $row ['visibility']?>')"><?php
			echo $row ['visibility']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','guest','<?php
			echo $row ['guest']?>')"><?php
			echo $row ['guest']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','golden','<?php
			echo $row ['golden']?>')"><?php
			echo $row ['golden']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','premium','<?php
			echo $row ['premium']?>')"><?php
			echo $row ['premium']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','delete','<?php
			echo $row ['delete']?>')"><?php
			echo $row ['delete']?></a></td>
	</tr>
		<?php
			$k ++;
		}
		?>
	</table>
	<!-- Pagination here begins.. -->
	
	<input type="hidden" id="begin" value="<?php echo $k-1;?>"/>
	<input type="hidden" id="page"  value="<?php echo ($begin/$end)+1;?>"/>
	
<?php 

/*
 *
 * available:
 * total Pages
 * total rows
 * current page
 * 
 * 
 */


?>	
	

<div style="height:25px;width:1000px;position:fixed;left:0px;bottom:0px;">

<div style="width:300px;position:absolute;height:20px;left:30px;">
<?php if (((($begin/$end)-1)*$end)>-1){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displaydtVaran(<?php echo (($begin/$end)-1)*$end;?>)">Previous Page</button>
<?php }?>
<!-- <?php echo ((($begin/$end)-1)*$end);?> -->
</div>
<div style="width:300px;position:absolute;height:20px;left:360px;color:red;background-color: white;">
<b style="color:blue;">Page <?php echo ($begin/$end)+1;?></b> of 
Total <?php echo $cnt; ?> Profiles in <?php echo $tot; ?> Pages.</div>

<div style="width:300px;position:absolute;height:20px;left:690px">
<?php if (((($begin/$end)+1)*$end)<$cnt){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displaydtVaran(<?php echo (($begin/$end)+1)*$end; ?>)">Next Page</button>
<?php }?></div>
<!-- <?php echo ((($begin/$end)+1)*$end)."|".$tot;?> -->
</div>	
	
	
<!-- Pagination Ends here... -->
<?php
	} else {
		?>
<table id="output"
	style="border: 1px solid #dddddd; border-collapse: collapse; margin-top: 225px; white-space: nowrap;">
	<tr>
		<td
			style="width: 600px; text-align: center; color: green; font-weight: bold; vertical-align: middle; border: 1px solid #dddddd;">No
		Details Found.!</td>
	</tr>
</table>

<?php
	}
}
if ($_GET ['vadhu-dt'] == 'true') {
	$begin = $_GET['begin'];global $end;
	$k = $begin+1;
	$sql = "SELECT * FROM personal_details INNER JOIN qualification ON personal_details.id=qualification.person_id
		 	WHERE personal_details.dataentry!='N' AND personal_details.gender='B' AND personal_details.visibility='Y' ORDER BY personal_details.id DESC";
	$rest = mysql_query($sql);
	$cnt  = mysql_num_rows($rest);
	$tot  = ceil($cnt/$end);
	$sql .= " LIMIT $begin,$end";
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		?><table id="output"
	style="border: 1px solid black; border-collapse: collapse; white-space: nowrap;">
	<tr>
		<th>No.</th>
		<th>ID</th>

		<th>Name</th>
		<th>Gender</th>
		<th>Status</th>
		<th>Religion</th>
		<th>Age</th>
		<th>Place</th>
		<th>Email</th>
		<th>Password</th>
		<th>Registered On</th>
		<th>Visibility</th>
		<th>Guest Profile</th>
		<th>Golden Profile</th>
		<th>Premium Profile</th>
		<th>Delete Account</th>
	</tr>
	<?php
		while ( $row = mysql_fetch_array ( $result ) ) {
			?>
	<tr>
		<td><?php
			echo $k?></td>
		<td><a href="javascript:void showDisplay(<?php echo $row[0] ?>)"><?php
			echo $row [0]?></a></td>
		<td><?php
			echo $row ['name']?></td>
		<td><?php
			$row ['gender'] == 'B' ? print "VADHU" : print "VARAN";
			?></td>
		<td><?php
			$row ['marriage'] == 'U' ? print "Unmarried" : print "";
			$row ['marriage'] == 'D' ? print "Divorced" : print "";
			$row ['marriage'] == 'W' ? print "Widowed" : print "";
			?></td>
		<td><?php
			if ($row ['religion'] == 'chri') {
				echo "Christian";
			}
			if ($row ['religion'] == 'hind') {
				echo "Hindu";
			}
			if ($row ['religion'] == 'inte') {
				echo "Inter Caste";
			}
			if ($row ['religion'] == 'jain') {
				echo "Jain";
			}
			if ($row ['religion'] == 'musl') {
				echo "Muslim";
			}
			if ($row ['religion'] == 'sikh') {
				echo "Sikh";
			}
			if ($row ['religion'] == 'nore') {
				echo "No Religion";
			}
			if ($row ['religion'] == 'othe') {
				echo "Others";
			}
			?> </td>
		<td><?php
			echo $row ['age']?></td>
		<td><?php
			echo $row ['location']?></td>
		<td><?php
			echo $row ['email']?></td>
		<td><?php
			echo $row ['password']?></td>
		<td><?php
			echo $row ['added']?></td>	
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','visibility','<?php
			echo $row ['visibility']?>')"><?php
			echo $row ['visibility']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','guest','<?php
			echo $row ['guest']?>')"><?php
			echo $row ['guest']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','golden','<?php
			echo $row ['golden']?>')"><?php
			echo $row ['golden']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','premium','<?php
			echo $row ['premium']?>')"><?php
			echo $row ['premium']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','delete','<?php
			echo $row ['delete']?>')"><?php
			echo $row ['delete']?></a></td>
	</tr>
		<?php
			$k ++;
		}
		?>
	</table><!-- Pagination here begins.. -->
	
	<input type="hidden" id="begin" value="<?php echo $k-1;?>"/>
	<input type="hidden" id="page"  value="<?php echo ($begin/$end)+1;?>"/>
	
<?php 

/*
 *
 * available:
 * total Pages
 * total rows
 * current page
 * 
 * 
 */


?>	
	

<div style="height:25px;width:1000px;position:fixed;left:0px;bottom:0px;">

<div style="width:300px;position:absolute;height:20px;left:30px;">
<?php if (((($begin/$end)-1)*$end)>-1){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displaydtVadhu(<?php echo (($begin/$end)-1)*$end;?>)">Previous Page</button>
<?php }?>
<!-- <?php echo ((($begin/$end)-1)*$end);?> -->
</div>
<div style="width:300px;position:absolute;height:20px;left:360px;color:red;background-color: white;">
<b style="color:blue;">Page <?php echo ($begin/$end)+1;?></b> of 
Total <?php echo $cnt; ?> Profiles in <?php echo $tot; ?> Pages.</div>

<div style="width:300px;position:absolute;height:20px;left:690px">
<?php if (((($begin/$end)+1)*$end)<$cnt){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displaydtVadhu(<?php echo (($begin/$end)+1)*$end; ?>)">Next Page</button>
<?php }?></div>
<!-- <?php echo ((($begin/$end)+1)*$end)."|".$tot;?> -->
</div>	
	
	
<!-- Pagination Ends here... -->
<?php
	} else {
		?>
<table id="output"
	style="border: 1px solid #dddddd; border-collapse: collapse; margin-top: 225px; white-space: nowrap;">
	<tr>
		<td
			style="width: 600px; text-align: center; color: green; font-weight: bold; vertical-align: middle; border: 1px solid #dddddd;">No
		Details Found.!</td>
	</tr>
</table>

<?php
	}
}
if ($_GET ['these'] == 'true') {
	/*
 * guest
 * golden
 * premium
 * publish
 * unpublished
 * vadhu
 * varan
 * total
 */
	$sqlz = "SELECT * FROM personal_details";
	$resultz = mysql_query ( $sqlz );
	$totalz = mysql_num_rows ( $resultz );
	
	$sqla = "SELECT * FROM personal_details WHERE gender='B' AND visibility='Y'";
	$resulta = mysql_query ( $sqla );
	$totala = mysql_num_rows ( $resulta );
	
	$sqlb = "SELECT * FROM personal_details WHERE gender='G' AND visibility='Y'";
	$resultb = mysql_query ( $sqlb );
	$totalb = mysql_num_rows ( $resultb );
	
	$sqlc = "SELECT * FROM personal_details WHERE visibility='Y'";
	$resultc = mysql_query ( $sqlc );
	$totalc = mysql_num_rows ( $resultc );
	
	$sqld = "SELECT * FROM personal_details WHERE visibility='N'";
	$resultd = mysql_query ( $sqld );
	$totald = mysql_num_rows ( $resultd );
	
	$sqle = "SELECT * FROM personal_details WHERE dataentry='N' AND visibility='Y'";
	$resulte = mysql_query ( $sqle );
	$totale = mysql_num_rows ( $resulte );
	
	$sqlf = "SELECT * FROM personal_details WHERE dataentry!='N' AND visibility='Y'";
	$resultf = mysql_query ( $sqlf );
	$totalf = mysql_num_rows ( $resultf );
	
	$sqlg = "SELECT * FROM personal_details WHERE guest='Y' AND golden!='Y' AND premium!='Y' AND visibility='Y'";
	$resultg = mysql_query ( $sqlg );
	$totalg = mysql_num_rows ( $resultg );
	
	$sqlh = "SELECT * FROM personal_details WHERE golden='Y' AND visibility='Y'";
	$resulth = mysql_query ( $sqlh );
	$totalh = mysql_num_rows ( $resulth );
	
	$sqli = "SELECT * FROM personal_details WHERE premium='Y' AND visibility='Y'";
	$resulti = mysql_query ( $sqli );
	$totali = mysql_num_rows ( $resulti );
	
	echo $totala . "|" . $totalb . "|" . $totalc . "|" . $totald . "|" . $totale . "|" . $totalf . "|" . $totalg . "|" . $totalh . "|" . $totali . "|" . $totalz;

}
if ($_GET ['dataform'] == 'true') {
	?>
<table align="center"
	style="width: 500px; padding-left: 80px; margin-top: 80px;">

	<tr>
		<td colspan="3"
			style="text-align: center; color: green; font-weight: bold;">Create
		Data Entry Operator Now</td>
	</tr>

	<tr>
		<td>Name</td>
		<td>:</td>
		<td><input type="text" id="name" class="textbox" /></td>
	</tr>

	<tr>
		<td>Address</td>
		<td>:</td>
		<td><textarea id="address" class="textarea"></textarea></td>
	</tr>

	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><input type="text" id="mobile" class="textbox" /></td>
	</tr>

	<tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="text" id="email" class="textbox" /></td>
	</tr>

	<tr>
		<td>Password</td>
		<td>:</td>
		<td><input type="password" id="password" class="textbox" /></td>
	</tr>

	<tr>
		<td colspan="3" align="center"><input type="button" name="operator"
			onclick="submitForm()" value="Create Account Now" class="button" /></td>

	</tr>
</table>
<?php
}
if ($_GET ['dataform'] == 'submitted') {
	$name = $_GET ['name'];
	$addr = $_GET ['addr'];
	$mail = $_GET ['mail'];
	$mobl = $_GET ['mobl'];
	$pass = $_GET ['pass'];
	
	$sql = "INSERT INTO dataentry(name,address,email,password,mobile)VALUES('$name','$addr','$mail','$pass','$mobl')";
	$result = mysql_query ( $sql );
	if ($result) {
		$to = $mail;
		$subject = "Data Entry Operator Registration";
		$message = "<table><tr><td>Username</td><td>:</td><td>$mail</td></tr>
<tr><td>Password</td><td>:</td><td>$pass</td></tr><tr><td>URL</td><td>:</td>
<td>http://www.vadhu-varan.com/dataentry</td></tr>
<tr><td colspan=3 align=center>Click on the URL &amp; enter the given details for login to your account.</td></tr></table>";
		$from = "response@vadhu-varan.com";
		$headers = "from:" . $from . "\r\n";
		$headers .= "Reply-To: gitacommunications@gmail.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html";
		$sent = mail ( $to, $subject, $message, $headers );
		if ($sent) {
			echo "Data entry operator account created &amp; Details forwarded to mailbox";
		}
	}
}
if ($_GET ['operator'] == 'show') {
	$k = 1;
	
	$sql = "SELECT * FROM dataentry ORDER BY id ASC";
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		?><table id="output"
	style="border: 1px solid black; border-collapse: collapse; white-space: nowrap;">
	<tr>
		<th>No.</th>
		<th>ID</th>
		<th>Name</th>
		<th>Address</th>
		<th>Mobile</th>
		<th>Email</th>
		<th>Password</th>
		<th>Last Seen</th>
		<th>Status</th>
	</tr>
	<?php
		while ( $row = mysql_fetch_array ( $result ) ) {
			?>
			<tr>
		<td><?php
			echo $k?></td>
		<td><?php
			echo $row ['id']?></td>
		<td><?php
			echo $row ['name']?></td>
		<td><?php
			echo $row ['address']?></td>
		<td><?php
			echo $row ['mobile']?></td>
		<td><?php
			echo $row ['email']?></td>
		<td><?php
			echo $row ['password']?></td>
		<td><?php
			echo $row ['last']?></td>
		<td><?php
			echo $row ['status']?></td>
	</tr>
			<?php
			$k ++;
		}
		?></table><?php
	} else {
		?>
<table id="output"
	style="border: 1px solid #dddddd; border-collapse: collapse; margin-top: 225px;">
	<tr>
		<td
			style="width: 600px; text-align: center; color: green; font-weight: bold; vertical-align: middle; border: 1px solid #dddddd;">No
		Details Found.!</td>
	</tr>
</table>
<?php
	}
}

if ($_POST ['adminprofile'] == 'Submit') {
	$verify = 0;
	
	$check = 'false';
	$allowedExts = array ("jpg", "jpeg", "gif", "png" );
	$extension = end ( explode ( ".", $_FILES ["horoscope"] ["name"] ) );
	if ((($_FILES ["horoscope"] ["type"] == "image/gif") || ($_FILES ["horoscope"] ["type"] == "image/jpeg") || ($_FILES ["horoscope"] ["type"] == "image/png") || ($_FILES ["horoscope"] ["type"] == "image/pjpeg")) && ($_FILES ["horoscope"] ["size"] < 1024000) && in_array ( $extension, $allowedExts )) {
		if ($_FILES ["horoscope"] ["error"] > 0) {
		} else {
			$check = 'true';
		}
	} else {
	}
	if ($check == 'true') {
		$prefix = exec ( "hostname" );
		$random_digit = uniqid ( $prefix, true );
		$horoscope = $random_digit . $_FILES ["horoscope"] ["name"];
		$path = "../upload/" . $horoscope;
		if ($ufile != none) {
			if (copy ( $_FILES ['horoscope'] ['tmp_name'], $path )) {
				$verify ++;
			} else {
				echo "Error";
			}
		}
	}
	$check = 'false';
	$allowedExts = array ("jpg", "jpeg", "gif", "png" );
	$extension = end ( explode ( ".", $_FILES ["picture"] ["name"] ) );
	if ((($_FILES ["picture"] ["type"] == "image/gif") || ($_FILES ["picture"] ["type"] == "image/jpeg") || ($_FILES ["picture"] ["type"] == "image/png") || ($_FILES ["picture"] ["type"] == "image/pjpeg")) && ($_FILES ["picture"] ["size"] < 1024000) && in_array ( $extension, $allowedExts )) {
		if ($_FILES ["picture"] ["error"] > 0) {
		} else {
			$check = 'true';
		}
	} else {
	}
	if ($check == 'true') {
		$prefix = exec ( "hostname" );
		$random_digit = uniqid ( $prefix, true );
		$picture = $random_digit . $_FILES ["picture"] ["name"];
		$path = "../upload/" . $picture;
		if ($ufile != none) {
			if (copy ( $_FILES ['picture'] ['tmp_name'], $path )) {
				$verify ++;
			} else {
				echo "Error";
			}
		}
	}
	
	/*$picture 		= strip_tags($_POST['picture']);
$picture 		= strip_tags($_POST['picture']);*/
	
	///////////////////////
	$marriage = strip_tags ( $_POST ['marriage'] );
	$name = strip_tags ( $_POST ['name'] );
	$gender = strip_tags ( $_POST ['gender'] );
	$dob = strip_tags ( $_POST ['dob'] );
	$age = strip_tags ( $_POST ['age'] );
	$religion = strip_tags ( $_POST ['religion'] );
	$caste = strip_tags ( $_POST ['caste'] );
	$present = strip_tags ( $_POST ['present'] );
	$address = strip_tags ( $_POST ['address'] );
	$place = strip_tags ( $_POST ['place'] );
	$pincode = strip_tags ( $_POST ['pincode'] );
	$city = strip_tags ( $_POST ['city'] );
	$district = strip_tags ( $_POST ['district'] );
	$state = strip_tags ( $_POST ['state'] );
	$country = strip_tags ( $_POST ['country'] );
	$landline = strip_tags ( $_POST ['landline'] );
	$mobile = strip_tags ( $_POST ['mobile'] );
	$email = strip_tags ( $_POST ['email'] );
	////////////////////////
	$ip = strip_tags ( $_POST ['userip'] );
	$dataentry = strip_tags ( $_POST ['user'] );
	///////////////////////
	$body = strip_tags ( $_POST ['body'] );
	$height = strip_tags ( $_POST ['height'] );
	$complexion = strip_tags ( $_POST ['colour'] );
	$diet = strip_tags ( $_POST ['diet'] );
	$weight = strip_tags ( $_POST ['weight'] );
	$health = strip_tags ( $_POST ['health'] );
	$blood = strip_tags ( $_POST ['blood'] );
	$challenge = strip_tags ( $_POST ['challenge'] );
	try {
		$details = strip_tags ( $_POST ['details'] );
	} catch ( Exception $e ) {
	}
	/////////////////////
	$education = strip_tags ( $_POST ['education'] );
	$institute = strip_tags ( $_POST ['institute'] );
	$edplace = strip_tags ( $_POST ['edplace'] );
	$edduration = strip_tags ( $_POST ['edduration'] );
	$employer = strip_tags ( $_POST ['employer'] );
	$designation = strip_tags ( $_POST ['designation'] );
	$duration = strip_tags ( $_POST ['preduration'] );
	$location = strip_tags ( $_POST ['location'] );
	$ememployer = strip_tags ( $_POST ['ememployer'] );
	$emplace = strip_tags ( $_POST ['emplace'] );
	$emduration = strip_tags ( $_POST ['emduration'] );
	$salary = strip_tags ( $_POST ['salary'] );
	$income = strip_tags ( $_POST ['income'] );
	/////////////////////
	$total = strip_tags ( $_POST ['total'] );
	$father = strip_tags ( $_POST ['father'] );
	$fjob = strip_tags ( $_POST ['fjob'] );
	$mother = strip_tags ( $_POST ['mother'] );
	$mjob = strip_tags ( $_POST ['mjob'] );
	$brother = strip_tags ( $_POST ['brother'] );
	$mar_bro = strip_tags ( $_POST ['mar_bro'] );
	$unmar_bro = strip_tags ( $_POST ['unmar_bro'] );
	$sister = strip_tags ( $_POST ['sister'] );
	$mar_sis = strip_tags ( $_POST ['mar_sis'] );
	$unmar_sis = strip_tags ( $_POST ['unmar_sis'] );
	$family_details = strip_tags ( $_POST ['family_details'] );
	////////////////////
	$star = strip_tags ( $_POST ['star'] );
	$mdob = strip_tags ( $_POST ['mdob'] );
	$tob = strip_tags ( $_POST ['tob'] );
	$pob = strip_tags ( $_POST ['pob'] );
	$rasi = strip_tags ( $_POST ['rasi'] );
	$sista = strip_tags ( $_POST ['sista'] );
	$sista_end = strip_tags ( $_POST ['sista_end'] );
	
	$horo1 = strip_tags ( $_POST ['horo1'] );
	$horo2 = strip_tags ( $_POST ['horo2'] );
	$horo3 = strip_tags ( $_POST ['horo3'] );
	$horo4 = strip_tags ( $_POST ['horo4'] );
	$horo5 = strip_tags ( $_POST ['horo5'] );
	$horo6 = strip_tags ( $_POST ['horo6'] );
	$horo7 = strip_tags ( $_POST ['horo7'] );
	$horo8 = strip_tags ( $_POST ['horo8'] );
	$horo9 = strip_tags ( $_POST ['horo9'] );
	$horo10 = strip_tags ( $_POST ['horo10'] );
	$horo11 = strip_tags ( $_POST ['horo11'] );
	$horo12 = strip_tags ( $_POST ['horo12'] );
	$horo13 = strip_tags ( $_POST ['horo13'] );
	$horo14 = strip_tags ( $_POST ['horo14'] );
	$horo15 = strip_tags ( $_POST ['horo15'] );
	$horo16 = strip_tags ( $_POST ['horo16'] );
	$horo17 = strip_tags ( $_POST ['horo17'] );
	$horo18 = strip_tags ( $_POST ['horo18'] );
	$horo19 = strip_tags ( $_POST ['horo19'] );
	$horo20 = strip_tags ( $_POST ['horo20'] );
	$horo21 = strip_tags ( $_POST ['horo21'] );
	$horo22 = strip_tags ( $_POST ['horo22'] );
	$horo23 = strip_tags ( $_POST ['horo23'] );
	$horo24 = strip_tags ( $_POST ['horo24'] );
	$horotype = $horo1 . '|' . $horo2 . '|' . $horo3 . '|' . $horo4 . '|' . $horo5 . '|' . $horo6 . '|' . $horo7 . '|' . $horo8 . '|' . $horo9 . '|' . $horo10 . '|' . $horo11 . '|' . $horo12 . '|' . $horo13 . '|' . $horo14 . '|' . $horo15 . '|' . $horo16 . '|' . $horo17 . '|' . $horo18 . '|' . $horo19 . '|' . $horo20 . '|' . $horo21 . '|' . $horo22 . '|' . $horo23 . '|' . $horo24;
	$horo_details = strip_tags ( $_POST ['horo_details'] );
	/////////////////////
	$expectation = strip_tags ( $_POST ['expectation'] );
	
	$register = strip_tags ( $_POST ['register'] );
	$reg_name = strip_tags ( $_POST ['reg_name'] );
	$reg_number = strip_tags ( $_POST ['reg_number'] );
	
	$sqla = "INSERT INTO personal_details(marriage, name, gender, dob, age, religion, caste, present, address,
		 place, pin, city, district, state, country, telephone, mobile, email,ip,dataentry,added) 
		 VALUES ('$marriage','$name','$gender','$dob','$age','$religion','$caste','$present','$address',
		 '$place','$pincode','$city','$district','$state','$country','$landline','$mobile','$email','$ip',
		 '$dataentry',NOW())";
	mysql_query ( $sqla );
	$result = mysql_insert_id ();
	
	if (is_numeric ( $result )) {
		$sqlb = "INSERT INTO physical_details(person_id, body, diet, height, complexion, health, weight, blood,
 		disability, details) VALUES ('$result','$body','$diet','$height','$complexion','$health','$weight',
 		'$blood','$challenge','$details')";
		
		$sqlc = "INSERT INTO qualification(education, designation, employer, location, duration, salary, institute,
		 place, period, last_employer, last_location, last_duration, income, person_id) VALUES ('$education',
		 '$designation','$employer','$location','$duration','$salary','$institute','$edplace','$edduration',
		 '$ememployer','$emplace','$emduration','$income','$result')";
		
		$sqld = "INSERT INTO family(total, father, fjob, mother, mjob, brother, bmarried, bunmarried, sister,smarried,
		sunmarried, otherz, person_id) VALUES ('$total','$father','$fjob','$mother','$mjob',
		 '$brother','$mar_bro','$unmar_bro','$sister','$mar_sis','$unmar_sis','$family_details','$result')";
		
		$sqle = "INSERT INTO horoscope(star, dob, tob, pob, rasi, sista_dasa, dasa_end, horo, horobox, other,
		 person_id) VALUES ('$star','$mdob','$tob','$pob','$rasi','$sista','$sista_end','$horoscope',
		 '$horotype','$horo_details','$result')";
		
		$sqlf = "INSERT INTO other(register, name, number,  photou, partner, person_id)
		 VALUES ('$register','$reg_name','$reg_number','$picture','$expectation','$result')";
		
		mysql_query ( $sqlb );
		mysql_query ( $sqlc );
		mysql_query ( $sqld );
		mysql_query ( $sqle );
		mysql_query ( $sqlf );
		$variable = 'good';
	}
	if ($variable == 'good') {
		header ( "Location:index.php?goood" );
	} else {
		echo '
<script>
window.location="index.php";
</script>
';
	}

}
if ($_GET ['msg'] == 'statuschange') {
	$id = $_GET ['id'];
	$tp = $_GET ['tuple'];
	$va = $_GET ['value'];
	$zql = "SELECT email FROM personal_details WHERE id=" . $id;
	$rez = mysql_query($zql);
	$zata = mysql_fetch_array($rez);
	$mai = $zata['email'];
	//echo $id."|".$tp."|".$va;
	if ($va == 'N') {
		$sql = "UPDATE personal_details SET $tp='Y' WHERE id=" . $id;
	} else if ($va == 'Y') {
		$sql = "UPDATE personal_details SET $tp='N' WHERE id=" . $id;
	}
	mysql_query ( $sql );
	$to = $mai;
$subject = "Profile Status Changed";
$message = "<h3>Warm Wishes</h3>
Your Profile Status has been changed By Admin.<br>Please check it now,
And Contact Admin If Necessary.
http://www.vadhu-varan.com/
<br><br>Admin <br>Vadhu-Varan";
	
	$headers  = "from:VADHU-VARAN.COM<response@vadhu-varan.com>\r\n";
	$headers .= "Reply-To: gitacommunications@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html";
	mail ( $to, $subject, $message, $headers );
	echo "Y";
}
if($_GET['msg']=='profile')
{
$id = $_GET['num'];
$sql = "SELECT * FROM  personal_details INNER JOIN physical_details ON personal_details.id=physical_details.person_id INNER JOIN 
	family ON personal_details.id=family.person_id INNER JOIN horoscope ON personal_details.id=horoscope.person_id INNER JOIN 
	other ON personal_details.id=other.person_id INNER JOIN qualification ON personal_details.id=qualification.person_id WHERE personal_details.id=".$id;
$result = mysql_query($sql) or die(mysql_error());
while($data = mysql_fetch_array($result))
{
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
	style="color: #3F3FA6">
	
	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Personal
		Details</td>

	</tr>

	<tr>
<td>Name</td>
<td>:</td>
<td><?php echo $data[2]; ?></td>
</tr>

<tr>
<td>Gender</td>
<td>:</td>
<td><?php $data['gender']=='B'? print "VADHU": print "VARAN"; ?></td>
</tr>

<tr>
<td>Status</td>
<td>:</td>
<td><?php  $data['marriage']=='U' ? print "Unmarried" :print "";
		   $data['marriage']=='D' ? print "Divorced" :print "";
		   $data['marriage']=='W' ? print "Widowed" :print "";?></td>
</tr>

<tr>
<td>Religion</td>
<td>:</td>
<td>
<?php 
 if($data['religion']=='chri'){echo "Christian";}
 if($data['religion']=='hind'){echo "Hindu";}
 if($data['religion']=='inte'){echo "Inter Caste";}
 if($data['religion']=='jain'){echo "Jain";}
 if($data['religion']=='musl'){echo "Muslim";}
 if($data['religion']=='sikh'){echo "Sikh";}
 if($data['religion']=='nore'){echo "No Religion";}
 if($data['religion']=='othe'){echo "Others";}
 ?> 
</td>
</tr>

<tr>
<td>Caste</td>
<td>:</td>
<td><?php echo $data['caste']; ?></td>
</tr>

<tr>
<td>Date of Birth</td>
<td>:</td>
<td><?php echo $data[4]; ?></td>
</tr>

<tr>
<td>Age</td>
<td>:</td>
<td><?php echo $data['age']; ?></td>
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
	?> cm</td>
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
	echo $data ['disability'];
	?></td>
	</tr>

	<tr>
		<td>Details</td>
		<td>:</td>
		<td><?php
	echo $data ['details'];
	?></td>
	</tr>

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
		<td><img src="../upload/<?php echo $data ['horo'];?>" width="100px" height="100px" /></td>
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
</table></td></tr>
	<tr>
		<td colspan="3"
			style="text-align: center; font-weight: bold; color: #06068C; text-transform: uppercase; text-decoration: underline">Other
		Details </td>

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
	<td colspan="3" style="padding-left:180px">
	<img src="../upload/<?php echo $data['photos']?>" width="100px" height="100px" style="float:left;"/>
	<img src="../upload/<?php echo $data['photou']?>" width="100px" height="100px" style="float:left;"/>
	<img src="../upload/<?php echo $data['photob']?>" width="100px" height="100px" style="float:left;"/></td>
	</tr>

	<tr>
	<td colspan="3" align="right"><a href="javascript:void editadForm(<?php echo $id ?>)">Edit Profile</a></td>
	</tr>


</table>
	<?php 
}
	
//echo $id;
}
if($_POST['adminprofiledit']=='Submit')
{
$id = $_SESSION['whose'];
/////////////PERSONAL DETAILS
$marriage			=	strip_tags($_POST['marriage']);
$name				=	strip_tags($_POST['name']);
$gender				=	strip_tags($_POST['gender']);
$dobs				=	strip_tags($_POST['dobs']);
$age				=	strip_tags($_POST['age']);
$religion			=	strip_tags($_POST['religion']);
$caste				=	strip_tags($_POST['caste']);
$present			=	strip_tags($_POST['present']);
$address			=	strip_tags($_POST['address']);
$place				=	strip_tags($_POST['place']);
$pincode			=	strip_tags($_POST['pincode']);
$city				=	strip_tags($_POST['city']);
$district			=	strip_tags($_POST['district']);
$state				=	strip_tags($_POST['state']);
$country			=	strip_tags($_POST['country']);
$landline			=	strip_tags($_POST['landline']);
$mobile				=	strip_tags($_POST['mobile']);
$email				=	strip_tags($_POST['email']);
////////////////PHYSICAL		
$body				=	strip_tags($_POST['body']);
$height				=	strip_tags($_POST['height']);
$colour				=	strip_tags($_POST['colour']);
$diet				=	strip_tags($_POST['diet']);
$weight				=	strip_tags($_POST['weight']);
$health				=	strip_tags($_POST['health']);
$blood				=	strip_tags($_POST['blood']);
$challenge			=	strip_tags($_POST['challenge']);
$details			=	strip_tags($_POST['details']);
///////////// JOB		
$education			=	strip_tags($_POST['education']);
$institute			=	strip_tags($_POST['institute']);
$placej				=	strip_tags($_POST['edplace']);
$edduration			=	strip_tags($_POST['edduration']);
$employer			=	strip_tags($_POST['employer']);
$designation		=	strip_tags($_POST['designation']);
$preduration		=	strip_tags($_POST['preduration']);
$location			=	strip_tags($_POST['location']);
$ememployer			=	strip_tags($_POST['ememployer']);
$emplace			=	strip_tags($_POST['emplace']);
$emduration			=	strip_tags($_POST['emduration']);
$salary				=	strip_tags($_POST['salary']);
$income				=	strip_tags($_POST['income']);
/////////////////FAMILY		
$total				=	strip_tags($_POST['total']);
$father				=	strip_tags($_POST['father']);
$fjob				=	strip_tags($_POST['fjob']);
$mother				=	strip_tags($_POST['mother']);
$mjob				=	strip_tags($_POST['mjob']);
$brother			=	strip_tags($_POST['brother']);
$mar_bro			=	strip_tags($_POST['mar_bro']);
$unmar_bro			=	strip_tags($_POST['unmar_bro']);
$sister				=	strip_tags($_POST['sister']);
$mar_sis			=	strip_tags($_POST['mar_sis']);
$unmar_sis			=	strip_tags($_POST['unmar_sis']);
$family_details		=	strip_tags($_POST['family_details']);
/////////////HORO		
$star				=	strip_tags($_POST['star']);
$mdob				=	strip_tags($_POST['mdob']);
$tob				=	strip_tags($_POST['tob']);
$pob				=	strip_tags($_POST['pob']);
$rasi				=	strip_tags($_POST['rasi']);
$sista				=	strip_tags($_POST['sista']);
$sista_end			=	strip_tags($_POST['sista_end']);
$photo_imghoro		=	strip_tags($_POST['photo-imghoro']);
$otherhoro			=	strip_tags($_POST['otherhoro']);
$horo1  			=	strip_tags ( $_POST ['horo1'] );
$horo2  			=	strip_tags ( $_POST ['horo2'] );
$horo3  			=	strip_tags ( $_POST ['horo3'] );
$horo4  			=	strip_tags ( $_POST ['horo4'] );
$horo5  			=	strip_tags ( $_POST ['horo5'] );
$horo6  			=	strip_tags ( $_POST ['horo6'] );
$horo7  			=	strip_tags ( $_POST ['horo7'] );
$horo8  			=	strip_tags ( $_POST ['horo8'] );
$horo9  			=	strip_tags ( $_POST ['horo9'] );
$horo10 			=	strip_tags ( $_POST ['horo10'] );
$horo11 			=	strip_tags ( $_POST ['horo11'] );
$horo12 			=	strip_tags ( $_POST ['horo12'] );
$horo13 			=	strip_tags ( $_POST ['horo13'] );
$horo14 			=	strip_tags ( $_POST ['horo14'] );
$horo15 			=	strip_tags ( $_POST ['horo15'] );
$horo16 			=	strip_tags ( $_POST ['horo16'] );
$horo17 			=	strip_tags ( $_POST ['horo17'] );
$horo18 			=	strip_tags ( $_POST ['horo18'] );
$horo19 			=	strip_tags ( $_POST ['horo19'] );
$horo20 			=	strip_tags ( $_POST ['horo20'] );
$horo21 			=	strip_tags ( $_POST ['horo21'] );
$horo22 			=	strip_tags ( $_POST ['horo22'] );
$horo23 			=	strip_tags ( $_POST ['horo23'] );
$horo24 			=	strip_tags ( $_POST ['horo24'] );
$horotype 			=   $horo1 . '|' . $horo2 . '|' . $horo3 . '|' . $horo4 . '|' . $horo5 . '|' . $horo6 . '|' . $horo7 . '|' . $horo8 . '|' . $horo9 . '|' . $horo10 . '|' . $horo11 . '|' . $horo12 . '|' . $horo13 . '|' . $horo14 . '|' . $horo15 . '|' . $horo16 . '|' . $horo17 . '|' . $horo18 . '|' . $horo19 . '|' . $horo20 . '|' . $horo21 . '|' . $horo22 . '|' . $horo23 . '|' . $horo24;

//////////OTHER		
$expectation		=	strip_tags($_POST['expectation']);
$photo_sideleft		=	strip_tags($_POST['photo-sideleft']);
$photo_proimg		=	strip_tags($_POST['photo-proimg']);
$photo_sideright	=	strip_tags($_POST['photo-sideright']);
$register			=	strip_tags($_POST['register']);
$reg_name			=	strip_tags($_POST['reg_name']);
$reg_number 		=	strip_tags($_POST['reg_number']);

//////////////////


$sqla = "UPDATE personal_details SET marriage='$marriage', name='$name', gender='$gender', dob='$dobs',
 		age='$age',religion='$religion', caste='$caste', present='$present', address='$address',
		place='$place', pin='$pincode', city='$city', district='$district', state='$state', country='$country',
		telephone='$landline', mobile='$mobile', email='$email' WHERE id=".$id;mysql_query ( $sqla ) ;
$sqlb = "UPDATE physical_details SET body='$body', diet='$diet', height='$height', complexion='$colour',
 		health='$health', weight='$weight', blood='$blood',disability='$challenge', details='$details'
 		WHERE person_id=".$id;mysql_query ( $sqlb ) ;
$sqlc = "UPDATE qualification SET education='$education', designation='$designation', employer='$employer', 
		location='$location', duration='$edduration', salary='$salary', institute='$institute',place='$placej',
		period='$preduration', last_employer='$ememployer', last_location='$emplace',last_duration='$emduration',
		income='$income' WHERE person_id=".$id; mysql_query ( $sqlc ) ;
$sqld = "UPDATE family SET total='$total', father='$father', fjob='$fjob', mother='$mother', mjob='$mjob',
		brother='$brother', bmarried='$mar_bro', bunmarried='$unmar_bro', sister='$sister',smarried='$mar_sis',
		sunmarried='$unmar_sis', otherz='$family_details'  WHERE person_id=".$id;mysql_query ( $sqld ) ;
$sqle = "UPDATE horoscope SET star='$star',dob='$mdob',tob='$tob',pob='$pob', rasi='$rasi', sista_dasa='$sista',
		dasa_end='$sista_end', horo='$photo_imghoro', horobox='$horotype', other='$otherhoro' WHERE person_id=".$id;
		mysql_query ( $sqle ) ;
$sqlf = "UPDATE other SET register='$register', name='$reg_name', number='$reg_number',  photos='$photo_sideleft',
		photou='$photo_proimg',photob='$photo_sideright', partner='$expectation' WHERE person_id=".$id;mysql_query ( $sqlf ) ;
		$_SESSION['whose'] = '';
header('Location:index.php');
}
if ($_GET ['guestpro'] == 'true') {
	$begin = $_GET['begin'];global $end;
	$k = $begin+1;
	$sql = "SELECT * FROM personal_details INNER JOIN qualification ON personal_details.id=qualification.person_id
		 	WHERE  personal_details.guest='Y' AND personal_details.golden='N' AND personal_details.premium='N' ORDER BY personal_details.id DESC";
	$rest = mysql_query($sql);
	$cnt  = mysql_num_rows($rest);
	$tot  = ceil($cnt/$end);
	$sql .= " LIMIT $begin,$end";
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		?><table id="output"
	style="border: 1px solid black; border-collapse: collapse; white-space: nowrap;">
	<tr>
		<th>No.</th>
		<th>ID</th>

		<th>Name</th>
		<th>Gender</th>
		<th>Status</th>
		<th>Religion</th>
		<th>Caste</th>
		<th>Date of Birth</th>
		<th>Age</th>
		<th>Education</th>
		<th>Designation</th>
		<th>Place</th>
		<th>Visibility</th>
		<th>Guest Profile</th>
		<th>Golden Profile</th>
		<th>Premium Profile</th>
		<th>Delete Account</th>
	</tr>
	<?php
		while ( $row = mysql_fetch_array ( $result ) ) {
			?>
	<tr>
		<td><?php
			echo $k?></td>
		<td><a href="javascript:void showDisplay(<?php echo $row[0] ?>)"><?php
			echo $row [0]?></a></td>

		<td><?php
			echo $row ['name']?></td>
		<td><?php
			$row ['gender'] == 'B' ? print "VADHU" : print "VARAN";
			?></td>
		<td><?php
			$row ['marriage'] == 'U' ? print "Unmarried" : print "";
			$row ['marriage'] == 'D' ? print "Divorced" : print "";
			$row ['marriage'] == 'W' ? print "Widowed" : print "";
			?></td>
		<td><?php
			if ($row ['religion'] == 'chri') {
				echo "Christian";
			}
			if ($row ['religion'] == 'hind') {
				echo "Hindu";
			}
			if ($row ['religion'] == 'inte') {
				echo "Inter Caste";
			}
			if ($row ['religion'] == 'jain') {
				echo "Jain";
			}
			if ($row ['religion'] == 'musl') {
				echo "Muslim";
			}
			if ($row ['religion'] == 'sikh') {
				echo "Sikh";
			}
			if ($row ['religion'] == 'nore') {
				echo "No Religion";
			}
			if ($row ['religion'] == 'othe') {
				echo "Others";
			}
			?> </td>
		<td><?php
			echo $row ['caste']?></td>
		<td><?php
			echo $row ['dob']?></td>
		<td><?php
			echo $row ['age']?></td>
		<td><?php
			echo $row ['education']?></td>
		<td><?php
			echo $row ['designation']?></td>
		<td><?php
			echo $row ['location']?></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','visibility','<?php
			echo $row ['visibility']?>')"><?php
			echo $row ['visibility']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','guest','<?php
			echo $row ['guest']?>')"><?php
			echo $row ['guest']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','golden','<?php
			echo $row ['golden']?>')"><?php
			echo $row ['golden']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','premium','<?php
			echo $row ['premium']?>')"><?php
			echo $row ['premium']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','delete','<?php
			echo $row ['delete']?>')"><?php
			echo $row ['delete']?></a></td>
	</tr>
		<?php
			$k ++;
		}
		?>
	</table><!-- Pagination here begins.. -->
	
	<input type="hidden" id="begin" value="<?php echo $k-1;?>"/>
	<input type="hidden" id="page"  value="<?php echo ($begin/$end)+1;?>"/>
	
<?php 

/*
 *
 * available:
 * total Pages
 * total rows
 * current page
 * 
 * 
 */


?>	
	

<div style="height:25px;width:1000px;position:fixed;left:0px;bottom:0px;">

<div style="width:300px;position:absolute;height:20px;left:30px;">
<?php if (((($begin/$end)-1)*$end)>-1){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displayGuestPro(<?php echo (($begin/$end)-1)*$end;?>)">Previous Page</button>
<?php }?>
<!-- <?php echo ((($begin/$end)-1)*$end);?> -->
</div>
<div style="width:300px;position:absolute;height:20px;left:360px;color:red;background-color: white;">
<b style="color:blue;">Page <?php echo ($begin/$end)+1;?></b> of 
Total <?php echo $cnt; ?> Profiles in <?php echo $tot; ?> Pages.</div>

<div style="width:300px;position:absolute;height:20px;left:690px">
<?php if (((($begin/$end)+1)*$end)<$cnt){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displayGuestPro(<?php echo (($begin/$end)+1)*$end; ?>)">Next Page</button>
<?php }?></div>
<!-- <?php echo ((($begin/$end)+1)*$end)."|".$tot;?> -->
</div>	
	
	
<!-- Pagination Ends here... -->
<?php
	} else {
		?>
<table id="output"
	style="border: 1px solid #dddddd; border-collapse: collapse; margin-top: 225px; white-space: nowrap;">
	<tr>
		<td
			style="width: 600px; text-align: center; color: green; font-weight: bold; border: 1px solid #dddddd;">No
		Details Found.!</td>
	</tr>
</table>

<?php
	}
}
if ($_GET ['goldpro'] == 'true') {
	$begin = $_GET['begin'];global $end;
	$k = $begin+1;
	$sql = "SELECT * FROM personal_details INNER JOIN qualification ON personal_details.id=qualification.person_id
		 	WHERE  personal_details.guest='Y' AND personal_details.golden='Y' ORDER BY personal_details.id DESC";
	$rest = mysql_query($sql);
	$cnt  = mysql_num_rows($rest);
	$tot  = ceil($cnt/$end);
	$sql .= " LIMIT $begin,$end";
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		?><table id="output"
	style="border: 1px solid black; border-collapse: collapse; white-space: nowrap;">
	<tr>
		<th>No.</th>
		<th>ID</th>

		<th>Name</th>
		<th>Gender</th>
		<th>Status</th>
		<th>Religion</th>
		<th>Age</th>
		<th>Place</th>
		<th>Front Page Display</th>
		<th>Visibility</th>
		<th>Guest Profile</th>
		<th>Golden Profile</th>
		<th>Premium Profile</th>
		<th>Delete Account</th>
	</tr>
	<?php
		while ( $row = mysql_fetch_array ( $result ) ) {
			?>
	<tr>
		<td><?php
			echo $k?></td>
		<td><a href="javascript:void showDisplay(<?php echo $row[0] ?>)"><?php
			echo $row [0]?></a></td>

		<td><?php
			echo $row ['name']?></td>
		<td><?php
			$row ['gender'] == 'B' ? print "VADHU" : print "VARAN";
			?></td>
		<td><?php
			$row ['marriage'] == 'U' ? print "Unmarried" : print "";
			$row ['marriage'] == 'D' ? print "Divorced" : print "";
			$row ['marriage'] == 'W' ? print "Widowed" : print "";
			?></td>
		<td><?php
			if ($row ['religion'] == 'chri') {
				echo "Christian";
			}
			if ($row ['religion'] == 'hind') {
				echo "Hindu";
			}
			if ($row ['religion'] == 'inte') {
				echo "Inter Caste";
			}
			if ($row ['religion'] == 'jain') {
				echo "Jain";
			}
			if ($row ['religion'] == 'musl') {
				echo "Muslim";
			}
			if ($row ['religion'] == 'sikh') {
				echo "Sikh";
			}
			if ($row ['religion'] == 'nore') {
				echo "No Religion";
			}
			if ($row ['religion'] == 'othe') {
				echo "Others";
			}
			?> </td>
		
		<td><?php
			echo $row ['age']?></td>
		
		<td><?php
			echo $row ['location']?></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','faceplay','<?php
			echo $row ['faceplay']?>')"><?php
			echo $row ['faceplay']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','visibility','<?php
			echo $row ['visibility']?>')"><?php
			echo $row ['visibility']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','guest','<?php
			echo $row ['guest']?>')"><?php
			echo $row ['guest']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','golden','<?php
			echo $row ['golden']?>')"><?php
			echo $row ['golden']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','premium','<?php
			echo $row ['premium']?>')"><?php
			echo $row ['premium']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','delete','<?php
			echo $row ['delete']?>')"><?php
			echo $row ['delete']?></a></td>
	</tr>
		<?php
			$k ++;
		}
		?>
	</table>
	<!-- Pagination here begins.. -->
	
	<input type="hidden" id="begin" value="<?php echo $k-1;?>"/>
	<input type="hidden" id="page"  value="<?php echo ($begin/$end)+1;?>"/>
	
<?php 

/*
 *
 * available:
 * total Pages
 * total rows
 * current page
 * 
 * 
 */


?>	
	

<div style="height:25px;width:1000px;position:fixed;left:0px;bottom:0px;">

<div style="width:300px;position:absolute;height:20px;left:30px;">
<?php if (((($begin/$end)-1)*$end)>-1){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displayGoldPro(<?php echo (($begin/$end)-1)*$end;?>)">Previous Page</button>
<?php }?>
<!-- <?php echo ((($begin/$end)-1)*$end);?> -->
</div>
<div style="width:300px;position:absolute;height:20px;left:360px;color:red;background-color: white;">
<b style="color:blue;">Page <?php echo ($begin/$end)+1;?></b> of 
Total <?php echo $cnt; ?> Profiles in <?php echo $tot; ?> Pages.</div>

<div style="width:300px;position:absolute;height:20px;left:690px">
<?php if (((($begin/$end)+1)*$end)<$cnt){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displayGoldPro(<?php echo (($begin/$end)+1)*$end; ?>)">Next Page</button>
<?php }?></div>
<!-- <?php echo ((($begin/$end)+1)*$end)."|".$tot;?> -->
</div>	
	
	
<!-- Pagination Ends here... -->
<?php
	} else {
		?>
<table id="output"
	style="border: 1px solid #dddddd; border-collapse: collapse; margin-top: 225px; white-space: nowrap;">
	<tr>
		<td
			style="width: 600px; text-align: center; color: green; font-weight: bold; border: 1px solid #dddddd;">No
		Details Found.!</td>
	</tr>
</table>

<?php
	}
}
if ($_GET ['premiumpro'] == 'true') {
	$begin = $_GET['begin'];global $end;
	$k = $begin+1;
	$sql = "SELECT * FROM personal_details INNER JOIN qualification ON personal_details.id=qualification.person_id
		 	WHERE  personal_details.guest='Y'   AND personal_details.premium='Y' ORDER BY personal_details.id DESC";
	$rest = mysql_query($sql);
	$cnt  = mysql_num_rows($rest);
	$tot  = ceil($cnt/$end);
	$sql .= " LIMIT $begin,$end";
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		?><table id="output"
	style="border: 1px solid black; border-collapse: collapse; white-space: nowrap;">
	<tr>
		<th>No.</th>
		<th>ID</th>

		<th>Name</th>
		<th>Gender</th>
		<th>Status</th>
		<th>Religion</th>
		<th>Age</th>
		<th>Place</th>
		<th>Front Page Display</th>
		<th>Visibility</th>
		<th>Guest Profile</th>
		<th>Golden Profile</th>
		<th>Premium Profile</th>
		<th>Delete Account</th>
	</tr>
	<?php
		while ( $row = mysql_fetch_array ( $result ) ) {
			?>
	<tr>
		<td><?php
			echo $k?></td>
		<td><a href="javascript:void showDisplay(<?php echo $row[0] ?>)"><?php
			echo $row [0]?></a></td>

		<td><?php
			echo $row ['name']?></td>
		<td><?php
			$row ['gender'] == 'B' ? print "VADHU" : print "VARAN";
			?></td>
		<td><?php
			$row ['marriage'] == 'U' ? print "Unmarried" : print "";
			$row ['marriage'] == 'D' ? print "Divorced" : print "";
			$row ['marriage'] == 'W' ? print "Widowed" : print "";
			?></td>
		<td><?php
			if ($row ['religion'] == 'chri') {
				echo "Christian";
			}
			if ($row ['religion'] == 'hind') {
				echo "Hindu";
			}
			if ($row ['religion'] == 'inte') {
				echo "Inter Caste";
			}
			if ($row ['religion'] == 'jain') {
				echo "Jain";
			}
			if ($row ['religion'] == 'musl') {
				echo "Muslim";
			}
			if ($row ['religion'] == 'sikh') {
				echo "Sikh";
			}
			if ($row ['religion'] == 'nore') {
				echo "No Religion";
			}
			if ($row ['religion'] == 'othe') {
				echo "Others";
			}
			?> </td>
		
		<td><?php
			echo $row ['age']?></td>
				<td><?php
			echo $row ['location']?></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','faceplay','<?php
			echo $row ['faceplay']?>')"><?php
			echo $row ['faceplay']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','visibility','<?php
			echo $row ['visibility']?>')"><?php
			echo $row ['visibility']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','guest','<?php
			echo $row ['guest']?>')"><?php
			echo $row ['guest']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','golden','<?php
			echo $row ['golden']?>')"><?php
			echo $row ['golden']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','premium','<?php
			echo $row ['premium']?>')"><?php
			echo $row ['premium']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','delete','<?php
			echo $row ['delete']?>')"><?php
			echo $row ['delete']?></a></td>
	</tr>
		<?php
			$k ++;
		}
		?>
	</table>
	<!-- Pagination here begins.. -->
	
	<input type="hidden" id="begin" value="<?php echo $k-1;?>"/>
	<input type="hidden" id="page"  value="<?php echo ($begin/$end)+1;?>"/>
	
<?php 

/*
 *
 * available:
 * total Pages
 * total rows
 * current page
 * 
 * 
 */


?>	
	

<div style="height:25px;width:1000px;position:fixed;left:0px;bottom:0px;">

<div style="width:300px;position:absolute;height:20px;left:30px;">
<?php if (((($begin/$end)-1)*$end)>-1){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displayPremiumPro(<?php echo (($begin/$end)-1)*$end;?>)">Previous Page</button>
<?php }?>
<!-- <?php echo ((($begin/$end)-1)*$end);?> -->
</div>
<div style="width:300px;position:absolute;height:20px;left:360px;color:red;background-color: white;">
<b style="color:blue;">Page <?php echo ($begin/$end)+1;?></b> of 
Total <?php echo $cnt; ?> Profiles in <?php echo $tot; ?> Pages.</div>

<div style="width:300px;position:absolute;height:20px;left:690px">
<?php if (((($begin/$end)+1)*$end)<$cnt){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displayPremiumPro(<?php echo (($begin/$end)+1)*$end; ?>)">Next Page</button>
<?php }?></div>
<!-- <?php echo ((($begin/$end)+1)*$end)."|".$tot;?> -->
</div>	
	
	
<!-- Pagination Ends here... -->
<?php
	} else {
		?>
<table id="output"
	style="border: 1px solid #dddddd; border-collapse: collapse; margin-top: 225px; white-space: nowrap;">
	<tr>
		<td
			style="width: 600px; text-align: center; color: green; font-weight: bold; border: 1px solid #dddddd;">No
		Details Found.!</td>
	</tr>
</table>

<?php
	}
}
if ($_GET ['publishpro'] == 'true') {
	$begin = $_GET['begin'];global $end;
	$k = $begin+1;
	$sql = "SELECT * FROM personal_details INNER JOIN qualification ON personal_details.id=qualification.person_id
		 	WHERE  personal_details.visibility='Y'  ORDER BY personal_details.id DESC";
	$rest = mysql_query($sql);
	$cnt  = mysql_num_rows($rest);
	$tot  = ceil($cnt/$end);
	$sql .= " LIMIT $begin,$end";
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		?><table id="output"
	style="border: 1px solid black; border-collapse: collapse; white-space: nowrap;">
	<tr>
		<th>No.</th>
		<th>ID</th>

		<th>Name</th>
		<th>Gender</th>
		<th>Status</th>
		<th>Religion</th>
		<th>Caste</th>
		<th>Date of Birth</th>
		<th>Age</th>
		<th>Education</th>
		<th>Designation</th>
		<th>Place</th>
		<th>Visibility</th>
		<th>Guest Profile</th>
		<th>Golden Profile</th>
		<th>Premium Profile</th>
		<th>Delete Account</th>
	</tr>
	<?php
		while ( $row = mysql_fetch_array ( $result ) ) {
			?>
	<tr>
		<td><?php
			echo $k?></td>
		<td><a href="javascript:void showDisplay(<?php echo $row[0] ?>)"><?php
			echo $row [0]?></a></td>

		<td><?php
			echo $row ['name']?></td>
		<td><?php
			$row ['gender'] == 'B' ? print "VADHU" : print "VARAN";
			?></td>
		<td><?php
			$row ['marriage'] == 'U' ? print "Unmarried" : print "";
			$row ['marriage'] == 'D' ? print "Divorced" : print "";
			$row ['marriage'] == 'W' ? print "Widowed" : print "";
			?></td>
		<td><?php
			if ($row ['religion'] == 'chri') {
				echo "Christian";
			}
			if ($row ['religion'] == 'hind') {
				echo "Hindu";
			}
			if ($row ['religion'] == 'inte') {
				echo "Inter Caste";
			}
			if ($row ['religion'] == 'jain') {
				echo "Jain";
			}
			if ($row ['religion'] == 'musl') {
				echo "Muslim";
			}
			if ($row ['religion'] == 'sikh') {
				echo "Sikh";
			}
			if ($row ['religion'] == 'nore') {
				echo "No Religion";
			}
			if ($row ['religion'] == 'othe') {
				echo "Others";
			}
			?> </td>
		<td><?php
			echo $row ['caste']?></td>
		<td><?php
			echo $row ['dob']?></td>
		<td><?php
			echo $row ['age']?></td>
		<td><?php
			echo $row ['education']?></td>
		<td><?php
			echo $row ['designation']?></td>
		<td><?php
			echo $row ['location']?></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','visibility','<?php
			echo $row ['visibility']?>')"><?php
			echo $row ['visibility']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','guest','<?php
			echo $row ['guest']?>')"><?php
			echo $row ['guest']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','golden','<?php
			echo $row ['golden']?>')"><?php
			echo $row ['golden']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','premium','<?php
			echo $row ['premium']?>')"><?php
			echo $row ['premium']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','delete','<?php
			echo $row ['delete']?>')"><?php
			echo $row ['delete']?></a></td>
	</tr>
		<?php
			$k ++;
		}
		?>
	</table>
	<!-- Pagination here begins.. -->
	
	<input type="hidden" id="begin" value="<?php echo $k-1;?>"/>
	<input type="hidden" id="page"  value="<?php echo ($begin/$end)+1;?>"/>
	
<?php 

/*
 *
 * available:
 * total Pages
 * total rows
 * current page
 * 
 * 
 */


?>	
	

<div style="height:25px;width:1000px;position:fixed;left:0px;bottom:0px;">

<div style="width:300px;position:absolute;height:20px;left:30px;">
<?php if (((($begin/$end)-1)*$end)>-1){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displayPublishPro(<?php echo (($begin/$end)-1)*$end;?>)">Previous Page</button>
<?php }?>
<!-- <?php echo ((($begin/$end)-1)*$end);?> -->
</div>
<div style="width:300px;position:absolute;height:20px;left:360px;color:red;background-color: white;">
<b style="color:blue;">Page <?php echo ($begin/$end)+1;?></b> of 
Total <?php echo $cnt; ?> Profiles in <?php echo $tot; ?> Pages.</div>

<div style="width:300px;position:absolute;height:20px;left:690px">
<?php if (((($begin/$end)+1)*$end)<$cnt){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displayPublishPro(<?php echo (($begin/$end)+1)*$end; ?>)">Next Page</button>
<?php }?></div>
<!-- <?php echo ((($begin/$end)+1)*$end)."|".$tot;?> -->
</div>	
	
	
<!-- Pagination Ends here... -->
<?php
	} else {
		?>
<table id="output"
	style="border: 1px solid #dddddd; border-collapse: collapse; margin-top: 225px; white-space: nowrap;">
	<tr>
		<td
			style="width: 600px; text-align: center; color: green; font-weight: bold; border: 1px solid #dddddd;">No
		Details Found.!</td>
	</tr>
</table>

<?php
	}
}
if ($_GET ['unpubpro'] == 'true') {
	$begin = $_GET['begin'];global $end;
	$k = $begin+1;
	$sql = "SELECT * FROM personal_details INNER JOIN qualification ON personal_details.id=qualification.person_id
		 	WHERE  personal_details.visibility='N'   ORDER BY personal_details.id DESC";
	$rest = mysql_query($sql);
	$cnt  = mysql_num_rows($rest);
	$tot  = ceil($cnt/$end);
	$sql .= " LIMIT $begin,$end";
	$result = mysql_query ( $sql );
	if (mysql_num_rows ( $result ) > 0) {
		?><table id="output"
	style="border: 1px solid black; border-collapse: collapse; white-space: nowrap;">
	<tr>
		<th>No.</th>
		<th>ID</th>

		<th>Name</th>
		<th>Gender</th>
		<th>Status</th>
		<th>Religion</th>
		<th>Caste</th>
		<th>Date of Birth</th>
		<th>Age</th>
		<th>Education</th>
		<th>Designation</th>
		<th>Place</th>
		<th>Visibility</th>
		<th>Guest Profile</th>
		<th>Golden Profile</th>
		<th>Premium Profile</th>
		<th>Delete Account</th>
	</tr>
	<?php
		while ( $row = mysql_fetch_array ( $result ) ) {
			?>
	<tr>
		<td><?php
			echo $k?></td>
		<td><a href="javascript:void showDisplay(<?php echo $row[0] ?>)"><?php
			echo $row [0]?></a></td>

		<td><?php
			echo $row ['name']?></td>
		<td><?php
			$row ['gender'] == 'B' ? print "VADHU" : print "VARAN";
			?></td>
		<td><?php
			$row ['marriage'] == 'U' ? print "Unmarried" : print "";
			$row ['marriage'] == 'D' ? print "Divorced" : print "";
			$row ['marriage'] == 'W' ? print "Widowed" : print "";
			?></td>
		<td><?php
			if ($row ['religion'] == 'chri') {
				echo "Christian";
			}
			if ($row ['religion'] == 'hind') {
				echo "Hindu";
			}
			if ($row ['religion'] == 'inte') {
				echo "Inter Caste";
			}
			if ($row ['religion'] == 'jain') {
				echo "Jain";
			}
			if ($row ['religion'] == 'musl') {
				echo "Muslim";
			}
			if ($row ['religion'] == 'sikh') {
				echo "Sikh";
			}
			if ($row ['religion'] == 'nore') {
				echo "No Religion";
			}
			if ($row ['religion'] == 'othe') {
				echo "Others";
			}
			?> </td>
		<td><?php
			echo $row ['caste']?></td>
		<td><?php
			echo $row ['dob']?></td>
		<td><?php
			echo $row ['age']?></td>
		<td><?php
			echo $row ['education']?></td>
		<td><?php
			echo $row ['designation']?></td>
		<td><?php
			echo $row ['location']?></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','visibility','<?php
			echo $row ['visibility']?>')"><?php
			echo $row ['visibility']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','guest','<?php
			echo $row ['guest']?>')"><?php
			echo $row ['guest']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','golden','<?php
			echo $row ['golden']?>')"><?php
			echo $row ['golden']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','premium','<?php
			echo $row ['premium']?>')"><?php
			echo $row ['premium']?></a></td>
		<td><a
			href="javascript:void changeStatus('<?php
			echo $row [0]?>','delete','<?php
			echo $row ['delete']?>')"><?php
			echo $row ['delete']?></a></td>
	</tr>
		<?php
			$k ++;
		}
		?>
	</table>
	<!-- Pagination here begins.. -->
	
	<input type="hidden" id="begin" value="<?php echo $k-1;?>"/>
	<input type="hidden" id="page"  value="<?php echo ($begin/$end)+1;?>"/>
	
<?php 

/*
 *
 * available:
 * total Pages
 * total rows
 * current page
 * 
 * 
 */


?>	
	

<div style="height:25px;width:1000px;position:fixed;left:0px;bottom:0px;">

<div style="width:300px;position:absolute;height:20px;left:30px;">
<?php if (((($begin/$end)-1)*$end)>-1){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displayUnpubPro(<?php echo (($begin/$end)-1)*$end;?>)">Previous Page</button>
<?php }?>
<!-- <?php echo ((($begin/$end)-1)*$end);?> -->
</div>
<div style="width:300px;position:absolute;height:20px;left:360px;color:red;background-color: white;">
<b style="color:blue;">Page <?php echo ($begin/$end)+1;?></b> of 
Total <?php echo $cnt; ?> Profiles in <?php echo $tot; ?> Pages.</div>

<div style="width:300px;position:absolute;height:20px;left:690px">
<?php if (((($begin/$end)+1)*$end)<$cnt){?>
<button style="background-color:#919B78;border:1px solid #919B78;font-weight:bold;" onclick="displayUnpubPro(<?php echo (($begin/$end)+1)*$end; ?>)">Next Page</button>
<?php }?></div>
<!-- <?php echo ((($begin/$end)+1)*$end)."|".$tot;?> -->
</div>	
	
	
<!-- Pagination Ends here... -->
<?php
	} else {
		?>
<table id="output"
	style="border: 1px solid #dddddd; border-collapse: collapse; margin-top: 225px; white-space: nowrap;">
	<tr>
		<td
			style="width: 600px; text-align: center; color: green; font-weight: bold; border: 1px solid #dddddd;">No
		Details Found.!</td>
	</tr>
</table>

<?php
	}
}
if ($_GET['abuse']=='true')
{
	$k=1;
	$sql = "SELECT * FROM abuse ORDER BY id DESC";
	$result  = mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		?>
		<table id="output"
	style="border: 1px solid black; border-collapse: collapse; white-space: nowrap;">
	<tr>
		<th>No.</th>
		<th>ID</th>
		<th>Profile</th>
		<th>Person</th>
		<th>Status</th>
		<th>Date</th>
		</tr>
		<?php 
	while($row = mysql_fetch_array($result))
	{
	?>
	<tr>
	<td><?php echo $k?></td>
	<td><?php	echo $row [0]?></td>
	<td><a href="javascript:void showDisplay(<?php echo $row['profile']?>)"><?php	echo $row ['profile']?></a></td>
	<td><a href="javascript:void showDisplay(<?php echo $row['person']?>)"><?php	echo $row ['person']?></a></td>
	<td><?php if($row['status']=='Y'){?><a href="javascript:void changeStatus('<?php echo $row ['profile']?>','visibility','<?php echo $row ['status']?>')">
	<?php echo 'Remove Profile'?></a><?php }else{echo 'Profile Removed';}?></td>
	<td><?php echo $row['date']?></td>
	</tr>
	<?php 	
	}
	?>
	</table>
	<?php 	
	}
	else 
	{
	?>
<table id="output"	style="border: 1px solid #dddddd; border-collapse: collapse; margin-top: 225px; white-space: nowrap;">
<tr><td style="width: 600px; text-align: center; color: green; font-weight: bold; border: 1px solid #dddddd;">No
		Details Found.!</td>
	</tr>
</table>
	<?php 	
	}
}
if ($_GET['msg']=='headerShow')
{
	
	$gender = $_GET['gender'];
	$religion = $_GET['religion'];//religion and check caste wise display.
	$available_caste = sortCasteWise($religion, $gender);
	foreach ($available_caste as $val)
	{
		$sql = "SELECT id FROM personal_details
		WHERE gender='$gender' AND caste = '$val' AND  visibility='Y' ORDER BY caste ASC";
		$result  = mysql_query($sql) or die($sql.mysql_error());
		$row = mysql_num_rows($result);
		echo '<button onclick="showCandidateByParam(&apos;'.$religion.'&apos;,&apos;'.$gender.'&apos;,&apos;'.$val.'&apos;)">'.$val.'-'.$row.'</button>';
	}
	
	
}
function sortCasteWise($religion,$gender)
{
	$sql = "SELECT caste FROM personal_details WHERE religion='$religion' AND gender='$gender' AND visibility='Y' ";
	$result = mysql_query($sql) or die($sql.mysql_error());
	$k = 0;
	while($rows = mysql_fetch_array($result))
	{
		$row[$k] = $rows['caste'];
		$k++;
	}
	$row = array_unique($row);
	$row = array_values($row);
	
	return $row;
}
if($_GET['msg']=='advancedSearch')
{
	/*
	 * show profiles by 
	 * 1.religion
	 * 2.caste
	 * 3.choosing AND/OR
	 * 4.id search.
	 * 5.name search
	 * 6.place search
	 * 
	 */
	?>
	
	
	<div  style="margin:0 auto;text-align:center;width:882px;">
	
	<span style="width:150px;text-transform:uppercase;color:black;">Searching for :
	<select id="whois" >
	<option value="">Select</option>
	<option value="B">Vadhu</option>
	<option value="G">Varan</option></select></span>
	
	<!-- <div>2.Marital Status :
	<select id="marriage"><option value="U">Unmarried</option>
	<option value="D">Divorced</option>
	<option value="W">Widowed</option>
	<option value="S">Seperated</option></select>
	</div> -->
	
	<span  style="width:150px;text-transform:uppercase;color:black;"> Religion : <select  id="religion"
			onchange="showHeadings('whois','religion')">
			<option value="sele">Select Religion</option>
			<option value="chri">Christian</option>
			<option value="hind">Hindu</option>
			<option value="inte">Inter Caste</option>
			<option value="jain">Jain</option>
			<option value="musl">Muslim</option>
			<option value="sikh">Sikh</option>
			<option value="nore">No Religion</option>
			<option value="othe">Others</option>
		</select></span>
		
	<!-- <div>3.Caste : <select name="caste" id="caste" >
			<option value="caste">Caste</option>
		</select></div>	
		
	<div style="display:block;"><input type="button" value="Submit" onclick="getResultsNow()"/>  </div> -->
	
	</div>
	<div id="searchHead">
	<!-- show the categories where candidates present when the gender selects. -->
	
	</div>
	
	<div id="resultDisplay" style="width:700px;margin:0 auto;height:450px;overflow:auto;"></div>
	
	<?php 
}
function getProfileImage($person_id)
{
	$sql = "SELECT * FROM other WHERE person_id=".$person_id;
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result))
	{
		$profile_image_status = $row['profile_image'];
		$photos = $row['photos'];//r
		$photou = $row['photou'];//c
		$photob = $row['photob'];//l
	}
	switch ($profile_image_status)
	{
		case 'YR':
			return '<img src="../upload/'.$photos.'" width="50px" height="60px" alt="PHOTO" />';
			break;
		case 'YC':
			return '<img src="../upload/'.$photou.'" width="50px" height="60px" alt="PHOTO" />';
			break;
		case 'YL':
			return '<img src="../upload/'.$photob.'" width="50px" height="60px" alt="PHOTO" />';
			break;
		default:
			return '<img src="asdfsdf" width="50px" height="60px" alt="No Image" />';
			break;
	}
}
if($_GET['msg']=='profilelist')
{
	$gender   = $_GET['gender'];
	$religion = $_GET['religion'];
	$caste 	  = $_GET['caste'];
	$sql = "SELECT id,name,age,mobile FROM personal_details WHERE gender='$gender' AND religion='$religion' AND caste='$caste' AND visibility='Y' ORDER BY age ASC";
	$result = mysql_query($sql);
	
	echo '<h3 style="text-transform:uppercase;display:block;color:indigo">Search Results - '.$caste.' </h3>';
	
	while($row = mysql_fetch_array($result))
	{
		
echo '<div style="border:1px solid red;width:300px;height:80px;float:left;margin:10px;">
<table>
<tr><td style="vertical-align:top;">'.getProfileImage($row['id']).'</td>
<td><table>
<tr><td>Name : '.$row['name'].'</td></tr>
<tr><td>Age : '.$row['age'].'</td></tr>
<tr><td>Mobile : '.$row['mobile'].'</td></tr>
</table></td></tr>
</table></div>';
		 
	}
		
}


if ($_GET['msg']=='displayResult') {
	$who = $_GET['who'];
	$mar = $_GET['mar'];
	$rel = $_GET['rel'];
	$cas = $_GET['cas'];
	
//	echo $who.$mar.$rel.$cas;//BUchriRoman Catholic
	
	$sql = "SELECT * FROM personal_details WHERE marriage='$mar' AND gender='$who' AND religion='$rel' AND caste='$cas' AND visibility='Y'";
	$result = mysql_query($sql);
	$cnt = mysql_num_rows($result);
	
	echo "Total $cnt REsults";
	
	
}
?>