<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Details</title>
<script type="text/javascript" src="validation.js"></script>

</head>
<body  style="text-align: center">
<?php
include_once '../include/config.php';
$key = $_GET['num'];
if($_GET['msg'] == 'jobs')
{
	if(is_numeric($key))
	{
		//do some code
		$sql = "SELECT * FROM requirement WHERE id=".$key;
		$res = mysql_query($sql);
		if(mysql_num_rows($res)>0)
		{
			while($row = mysql_fetch_array($res))
			{
				
				//create form and make the data editable.
				?>
				<form method="post" action="admprocess.php">
				<table align="center">
				
				<tr>
				<td>Designation</td>
				<td>:<input type="hidden" name="userid" value="<?php echo $row['id']?>" /> </td>
				<td><input type="text" name="designation" value="<?php echo $row['designation']; ?>" /></td>
				</tr> 
				
				<tr>
				<td>Vacancy</td>
				<td>:</td>
				<td><input type="text" name="vacancy" value="<?php echo $row['vacancy']; ?>" /></td>
				</tr>
				
				<tr>
				<td>Age</td>
				<td>:</td>
				<td><select name="age">
<option <?php  if($row['age'] == 'Less than 20 Yr'){echo "selected";} ?> value="Less than 20 Yr">Less than 20 Yr</option>
<option <?php  if($row['age'] == '20-30 Yr'){echo "selected";} ?> value="20-30 Yr">20-30 Yr</option>
<option <?php  if($row['age'] == '30-40 Yr'){echo "selected";} ?>value="30-40 Yr">30-40 Yr</option>
<option <?php  if($row['age'] == '40-50 Yr'){echo "selected";} ?>value="40-50 Yr">40-50 Yr</option>
<option <?php  if($row['age'] == '50+ Yr'){echo "selected";} ?>value="50+ Yr">50+ Yr</option>
<option <?php  if($row['age'] == 'nolimit'){echo "selected";} ?>value="nolimit">No Age Limit</option>
</select></td>
				</tr>
				
				<tr>
				<td>Sex</td>
				<td>:</td>
				<td><select name="gender">
<option <?php  if($row['sex'] == 'M/F')   {echo "selected";} ?> value="M/F">M/F</option>
<option <?php  if($row['sex'] == 'MALE')  {echo "selected";} ?> value="MALE">MALE</option>
<option <?php  if($row['sex'] == 'FEMALE'){echo "selected";} ?> value="FEMALE">FEMALE</option>
</select></td>
				</tr>
				
				<tr>
				<td>Salary</td>
				<td>:</td>
				<td><input type="text" name="salary" value="<?php echo $row['salary']; ?>" /></td>
				</tr>
				
				<tr>
				<td>Remarks</td>
				<td>:</td>
				<td><textarea name="remarks"><?php echo $row['remarks']; ?></textarea></td>
				</tr>
				
				<tr>
				<td>Employer</td>
				<td>:</td>
				<td>
				<?php
                $msql = "SELECT name FROM employer WHERE id=".$row['empid'];
                $rsl  = mysql_query($msql);
                $col = mysql_fetch_array($rsl);
                echo $col[0];
				?>
				</td>
				</tr>
				
				<tr>
				<td>Experience</td>
				<td>:</td>
				<td><select name="experience">
<option <?php  if($row['experience'] == 0)  {echo "selected";} ?> value="0"> &lt;1 Year</option>
<option <?php  if($row['experience'] == 1)  {echo "selected";} ?> value="1">1</option>
<option <?php  if($row['experience'] == 2)  {echo "selected";} ?> value="2">2</option>
<option <?php  if($row['experience'] == 3)  {echo "selected";} ?> value="3">3</option>
<option <?php  if($row['experience'] == 4)  {echo "selected";} ?> value="4">4</option>
<option <?php  if($row['experience'] == 5)  {echo "selected";} ?> value="5">5</option>
<option <?php  if($row['experience'] == 6)  {echo "selected";} ?> value="6">6</option>
<option <?php  if($row['experience'] == 7)  {echo "selected";} ?> value="7">7</option>
<option <?php  if($row['experience'] == 8)  {echo "selected";} ?> value="8">8</option>
<option <?php  if($row['experience'] == 9)  {echo "selected";} ?> value="9">9</option>
<option <?php  if($row['experience'] == 10) {echo "selected";} ?> value="10">&gt;10 Years</option>
</select></td>
				</tr>
				
				<tr>
				<td>Type</td>
				<td>:</td>
				<td><select name="type">
<option <?php  if($row['type'] == 'Full Time')  {echo "selected";} ?> value="Full Time">Full Time</option>
<option <?php  if($row['type'] == 'Part Time')  {echo "selected";} ?> value="Part Time">Part Time</option>
</select></td>
				</tr>
				
				<tr>
				<td>Last Change</td>
				<td>:</td>
				<td><?php echo $row['lastchange']; ?></td>
				</tr>
				
				<tr>
				<td>Category</td>
				<td>:</td>
				<td><select name="category">
<option <?php if($row['category'] == "IT Jobs")  {echo "selected";} ?> value="IT Jobs">  IT Jobs</option>
<option <?php if($row['category'] == "Tele Calling / BPO Jobs")  {echo "selected";} ?> value="Tele Calling / BPO Jobs">  Tele Calling / BPO Jobs</option>
<option <?php if($row['category'] == "Engineering Jobs")  {echo "selected";} ?> value="Engineering Jobs">  Engineering Jobs</option>
<option <?php if($row['category'] == "Marketing Jobs")  {echo "selected";} ?> value="Marketing Jobs">  Marketing Jobs</option>
<option <?php if($row['category'] == "Sales Jobs")  {echo "selected";} ?> value="Sales Jobs">  Sales Jobs</option>
<option <?php if($row['category'] == "Office, Admin / HR Jobs")  {echo "selected";} ?> value="Office, Admin / HR Jobs">  Office, Admin / HR Jobs</option>
<option <?php if($row['category'] == "Finance / Accounting Jobs")  {echo "selected";} ?> value="Finance / Accounting Jobs">  Finance / Accounting Jobs</option>
<option <?php if($row['category'] == "Medical / Health Care")  {echo "selected";} ?> value="Medical / Health Care">  Medical / Health Care</option>
<option <?php if($row['category'] == "Education / Teaching")  {echo "selected";} ?> value="Education / Teaching">  Education / Teaching</option>
<option <?php if($row['category'] == "Apprentice / Internship") {echo "selected";} ?> value="Apprentice / Internship"> Apprentice / Internship</option>
<option <?php if($row['category'] == "Other Jobs") {echo "selected";} ?> value="Other Jobs"> Other Jobs </option>
</select></td>
				</tr>
				
				<tr>
				<td>Applicants(ID)</td>
				<td>:</td>
				<td><?php echo $row['applicant']; ?></td>
				</tr>
				
				<tr>
				<td>Requirement</td>
				<td>:</td>
				<td><textarea name="requirement"><?php echo $row['requirement']; ?></textarea></td>
				</tr>
				
				<tr>
				<td>Publish</td>
				<td>:</td>
				<td><?php echo '<a href="javascript:changePublish(222,'.$row["id"].')" >'.$row['publish'].'</a>'; ?></td>
				</tr>
				
				<tr>
				<td>Paid</td>
				<td>:</td>
				<td><?php echo '<a href="javascript:changePaid(222,'.$row["id"].')" >'.$row['paid'].'</a>'; ?></td>
				</tr>
				
				<tr>
				<td>Premier</td>
				<td>:</td>
				<td><?php echo '<a href="javascript:changePremier(222,'.$row["id"].')" >'.$row['premier'].'</a>'; ?></td>
				</tr>
				
				<tr>
				<td>Status</td>
				<td>:</td>
				<td><?php echo $row['status']; ?></td>
				</tr>
<tr><td colspan="3" align="center"><input type="submit" name="editjobs" value="Save Changes" /></td></tr>				
				</table></form>
				<?php 
			}//do something editable..............
		}
	}
	else
	{
		echo "No Result Found.!";
	}
	
}
if($_GET['msg']=='employ')
{
if(is_numeric($key))
	{
		$sql = "SELECT * FROM employer WHERE id=".$key;
		$res = mysql_query($sql);
		if(mysql_num_rows($res)>0)
		{
			while($row = mysql_fetch_array($res))
			{
				?>
<form method="post" action="admprocess.php">
<table align="center">
				
<tr>
<td>Name</td>
<td>:<input type="hidden" name="userid" value="<?php echo $row['id']?>" /></td>
<td><input type="text" name="name" value="<?php echo $row['name']; ?>" /></td></tr>
<tr>
<td>Type</td>
<td>:</td>
<td><select name="comtype" >
	<option <?php  if($row['type']=='Industry'){echo "selected";}?> value="Industry">Industry</option>
	<option <?php  if($row['type']=='Business'){echo "selected";}?> value="Business">Business</option>
	<option <?php  if($row['type']=='Service') {echo "selected";}?> value="Service">Service</option>
	</select></td></tr>
<tr>
<td>Address</td>
<td>:</td>
<td><textarea name="address"><?php echo $row['address']; ?></textarea></td></tr>
<tr>
<td>Place</td>
<td>:</td>
<td><input type="text" name="place" value="<?php echo $row['district']; ?>" /></td></tr>
<tr>
<td>PIN</td>
<td>:</td>
<td><input type="text" name="pin" value="<?php echo $row['pin']; ?>" /></td></tr>
<tr>
<td>State</td>
<td>:</td>
<td><input type="text" name="state" value="<?php echo $row['state']; ?>" /></td></tr>
<tr>
<td>Country</td>
<td>:</td>
<td><input type="text" name="country" value="<?php echo $row['country']; ?>" /></td></tr>
<tr>
<td>Phone</td>
<td>:</td>
<td><input type="text" name="phone" value="<?php echo $row['phone']; ?>" /></td></tr>
<tr>
<td>Mobile</td>
<td>:</td>
<td><input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" /></td></tr>
<tr>
<td>Fax</td>
<td>:</td>
<td><input type="text" name="fax" value="<?php echo $row['fax']; ?>" /></td></tr>
<tr>
<td>Email</td>
<td>:</td>
<td><input type="text" name="email" value="<?php echo $row['email']; ?>" /></td></tr>
<tr>
<td>Website</td>
<td>:</td>
<td><input type="text" name="website" value="<?php echo $row['website']; ?>" /></td></tr>
<tr>
<td>Profile</td>
<td>:</td>
<td><textarea name="profile"><?php echo $row['profile']; ?></textarea></td></tr>
<tr>
<td>Authority</td>
<td>:</td>
<td><input type="text" name="contact" value="<?php echo $row['person']; ?>" /></td></tr>
<tr>
<td>Designation</td>
<td>:</td>
<td><input type="text" name="designation" value="<?php echo $row['designation']; ?>" /></td></tr>
<tr>
<td>Contact Number</td>
<td>:</td>
<td><input type="text" name="number" value="<?php echo $row['contact']; ?>" /></td></tr>
<tr>
<td>IP Address</td>
<td>:</td>
<td><?php echo $row['ip']; ?></td></tr>
<tr>
<td>Password</td>
<td>:</td>
<td><?php echo $row['password']; ?></td></tr>
<tr>
<td>Last IP</td>
<td>:</td>
<td><?php echo $row['lastip']; ?></td></tr>
<tr>
<td>Entry</td>
<td>:</td>
<td><?php echo $row['arrival']; ?></td></tr>
<tr>
<td>Entered By</td>
<td>:</td>
<td><?php echo $row['userid']; ?></td></tr>
<tr>
<td>Publish</td>
<td>:</td>
<td><?php echo '<a href="javascript:changePublish(111,'.$row["id"].')" >'.$row['publish'].'</a>'; ?></td></tr>
<tr>
<td>Paid</td>
<td>:</td>
<td><?php echo '<a href="javascript:changePaid(111,'.$row["id"].')" >'.$row['paid'].'</a>'; ?></td></tr>
<tr>
<td>Premier</td>
<td>:</td>
<td><?php echo '<a href="javascript:changePremier(111,'.$row["id"].')" >'.$row['premier'].'</a>'; ?></td></tr>
<tr><td colspan="3" align="center"><input type="submit" name="editemploy" value="Save Changes" /></td></tr>
</table>
</form>
			<?php 
			}
			
		}

	}
	else
	{
		echo "No Result Found.!";
	}
}
if($_GET['msg']=='candi')
{
if(is_numeric($key))
	{
		$sql = "SELECT * FROM register WHERE id=".$key;
		$res = mysql_query($sql);
		if(mysql_num_rows($res)>0)
		{
			while($row = mysql_fetch_array($res))
			{
		?>
		<form method="post" action="admprocess.php">
<table align="center">
<tr><td>Name</td>
<td>:<input type="hidden" name="userid" value="<?php echo $row['id']?>" /></td>
<td><input type="text" name="name" value="<?php echo $row['name']; ?>" /></td></tr>
<tr><td>Father's Name</td>
<td>:</td>
<td><input type="text" name="father" value="<?php echo $row['father']; ?>" /></td></tr>
<tr><td>Birth Place</td>
<td>:</td>
<td><input type="text" name="place" value="<?php echo $row['birthplace']; ?>" /></td></tr>
<tr><td>Birth Day</td>
<td>:</td>
<td><input type="text" name="birth" value="<?php echo $row['birthday']; ?>"/></td></tr>
<tr><td>Age</td>
<td>:</td>
<td><input type="text" name="age" value="<?php echo $row['age']; ?>" /></td></tr>
<tr>
<td>Gender</td>
<td>:</td>
<td>Male<input type="radio"  <?php if($row['gender']=='M'){echo "checked";}?>
  name="gender" value="M" />Female
<input type="radio"  <?php if($row['gender']=='F'){echo "checked";}?> 
value="F" name="gender" /></td>
</tr>
<tr><td>Marital Status</td>
<td>:</td>
<td>Married<input type="radio"  <?php if($row['marriage']=='M'){echo "checked";}?>
  name="marital" value="M" />Single
<input type="radio"  <?php if($row['marriage']=='S'){echo "checked";}?> 
value="S" name="marital"/></td></tr>
<tr><td>Spouse</td>
<td>:</td>
<td><input type="text" name="spouse" value="<?php echo $row['wife']; ?>"/></td></tr>
<tr><td>Children</td>
<td>:</td>
<td><input type="text" name="child" value="<?php echo $row['child']; ?>"/></td></tr>
<tr><td>IP</td>
<td>:</td>
<td><?php echo $row['ip']; ?></td></tr>
<tr><td>Permanent Address</td>
<td>:</td>
<td><textarea name="peraddress"><?php echo $row['peraddress']; ?></textarea></td></tr>
<tr><td>Present Address</td>
<td>:</td>
<td><textarea name="preaddress"><?php echo $row['preaddress']; ?></textarea></td></tr>
<tr><td>Phone</td>
<td>:</td>
<td><input type="text" name="phone" value="<?php echo $row['phone']; ?>" /></td></tr>
<tr><td>Mobile</td>
<td>:</td>
<td><input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" /></td></tr>
<tr><td>Fax</td>
<td>:</td>
<td><input type="text" name="fax" value="<?php echo $row['fax']; ?>" /></td></tr>
<tr><td>Email</td>
<td>:</td>
<td><input type="text" name="email" value="<?php echo $row['email']; ?>" /></td></tr>
<tr><td>Password</td>
<td>:</td>
<td><?php echo $row['password']; ?></td></tr>
<tr><td>Last IP</td>
<td>:</td>
<td><?php echo $row['lastip']; ?></td></tr>
<tr><td>Resume</td>
<td>:</td>
<td><?php echo $row['resume']; ?></td></tr>
<tr><td>Entry</td>
<td>:</td>
<td><?php echo $row['entry']; ?></td></tr>
<tr><td>Entered By</td>
<td>:</td>
<td><?php echo $row['user']; ?></td></tr>
<tr><td>Publish</td>
<td>:</td>
<td><?php echo $row['publish']; ?></td></tr>
<tr><td>Paid</td>
<td>:</td>
<td><?php echo $row['paid']; ?></td></tr>
<tr><td>Premier</td>
<td>:</td>
<td><?php echo $row['premier']; ?></td></tr>
		
<tr><td colspan="3" align="center"><input type="submit" name="editcandi" value="Save Changes" /></td></tr>
		</table></form>
		<?php 		
			}
		}
	}
	else
	{
		echo "No Result Found.!";
	}
}
if($_GET['msg']=='profile')
{
   $sql = "SELECT * FROM profile WHERE id=".$key;
		$res = mysql_query($sql);
		if(mysql_num_rows($res)>0)
		{
			while($row = mysql_fetch_array($res))
			{
		?>
		<form method="post" action="admprocess.php">
<table>
<tr><td colspan="3" align="center">Profile Details</td></tr>
<tr><td>Profile Name<input type="hidden" name="userid" value="<?php echo $row['id']?>" /></td><td>:</td><td><input type="text" name="profile" value="<?php echo $row['profile'];?>" /></td></tr>
<tr><td>Cost</td><td>:</td><td><input type="text" name="cost" value="<?php echo $row['cost'];?>" /></td></tr>
<tr><td>Number of Profile</td><td>:</td><td><input type="text" name="numbers" value="<?php echo $row['cound'];?>" /></td></tr>
<tr><td>Validity</td><td>:</td><td><input type="text" name="validity" value="<?php echo $row['validity'];?>" /></td></tr>
<tr><td colspan="3" align="center"><input type="submit" name="subprofile" value="Save Changes" /></td></tr>

</table>		
		</form>
		<?php 	   
			}
			
		}
}
if($_GET['msg']=='newpro')
{?>
		<form method="post" action="admprocess.php">
<table>
<tr><td colspan="3" align="center">Profile Details</td></tr>
<tr><td>Profile Name</td><td>:</td><td><input type="text" name="profile" value="" /></td></tr>
<tr><td>Cost</td><td>:</td><td><input type="text" name="cost" value="" /></td></tr>
<tr><td>Number of Profile</td><td>:</td><td><input type="text" name="numbers" value="" /></td></tr>
<tr><td>Validity</td><td>:</td><td><input type="text" name="validity" value="" /></td></tr>
<tr><td colspan="3" align="center"><input type="submit" name="subpro" value="Save Profile" /></td></tr>

</table>		
		</form>
<?php 		
}
?>
</body>
</html>