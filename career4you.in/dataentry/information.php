<?php 
include_once '../include/config.php';
session_start();
if($_SESSION['data'] == 'true')
{
?>
<html>
<head>
<script>
function hideFor()
{
window.location="logout.php";
}
function submitForm()
{

}
</script>
</head>
<body >
<?php  if($_SESSION['firm']=='true'){?>
<form action="processor.php" method="post" id="firm" style="visibility:visible;">
<table cellspacing="3" align="center" style="background-color: white;text-align: center">
<tr>
<td colspan="3"  style="color:green;font-weight: bold;padding-bottom: 15px;"> Enter Company Details Here</td>
</tr>
<tr>
<td>Company Name</td>
<td>:</td>
<td><input type="text" name="company" size="30" value="" class="textbox"/></td>
</tr>

<tr>
<td>Type</td>
<td>:</td>
<td><select name="type" class="select">
<option value="Industry">Industry</option>
<option value="Business">Business</option>
<option value="Service">Service</option>
</select></td>
</tr>

<tr>
<td>Address</td>
<td>:</td>
<td><textarea name="address" class="textarea"></textarea></td>
</tr>

<tr>
<td>Place</td>
<td>:</td>
<td><input type="text" name="place" size="30" value="" class="textbox"/></td>
</tr>

<tr>
<td>Pin</td>
<td>:</td>
<td><input type="text" name="pin" size="30" value="" class="textbox"/></td>
</tr>

<tr>
<td>District</td>
<td>:</td>
<td><input type="text" name="district" size="30" value="" class="textbox"/></td>
</tr>

<tr>
<td>State</td>
<td>:</td>
<td><input type="text" name="state" size="30" value="" class="textbox"/></td>
</tr>

<tr>
<td>Company Profile</td>
<td>:</td>
<td><textarea title="Something about the Company,it's service,etc.." name="profile" class="textarea"></textarea></td>
</tr>

<tr>
<td>Mobile</td>
<td>:</td>
<td><input type="text" name="mobile" size="30" value="" class="textbox"/></td>
</tr>

<tr>
<td>Landline</td>
<td>:</td>
<td><input type="text" name="phone" size="30" value="" class="textbox"/></td>
</tr>

<tr>
<td>Fax</td>
<td>:</td>
<td><input type="text" name="fax" size="30" value="" class="textbox"/></td>
</tr>

<tr>
<td>Email</td>
<td>:</td>
<td><input type="text" name="email" size="30" value="" class="textbox"/></td>
</tr>

<tr>
<td>Website</td>
<td>:</td>
<td>
<input type="text" name="website" size="30" value="" class="textbox"/>
<input type="hidden" name="userid"  value="<?php echo $_SESSION['key'];?>" /></td>
</tr>
<tr><td colspan="3" style="padding-left:15%;">
<input type="submit" name="firm" class="fb5" value="Add Company" />
<input type="button" value="Cancel" class="fb5" onclick="cancelOper()"/></td></tr>
</table>
</form>
<!--Company details are over-->
<!--Job Details-->
<?php 
}
else if(is_numeric($_SESSION['firm']))
{
?>
<form method="post" action="processor.php" id="job" style="">
<table cellspacing="3" align="center" style="background-color: white;text-align: center">
<tr>
<td colspan="3" style="color:green;font-weight: bold;padding-bottom: 15px;">
<?php echo $_SESSION['company']."----";?>
 Enter Job Details Here</td>
</tr>
<tr>
<td>Designation</td>
<td>:<input type="hidden" name="lastchange" value="<?php echo date("d-m-Y");?>"/></td>
<td><input type="text" name="designation" size="30" value="" class="textbox"/></td>
</tr>

<tr>
<td>Vacancy</td>
<td>:</td>
<td><input type="text" name="vacancy" size="30" value="" class="textbox"/>
<input type="hidden" name="firmid" value="<?php echo $_SESSION['firm'];?>"/></td>
</tr>

<tr>
<td>Category</td>
<td>:</td>
<td><select name="category" class="select">
<option value="IT Jobs"> IT Jobs</option>
<option value="Tele Calling / BPO Jobs"> Tele Calling / BPO Jobs</option>
<option value="Engineering Jobs"> Engineering Jobs</option>
<option value="Marketing Jobs"> Marketing Jobs</option>
<option value="Sales Jobs"> Sales Jobs</option>
<option value="Office, Admin / HR Jobs"> Office, Admin / HR Jobs</option>
<option value="Finance / Accounting Jobs"> Finance / Accounting Jobs</option>
<option value="Medical / Health Care"> Medical / Health Care</option>
<option value="Education / Teaching"> Education / Teaching</option>
<option value="Apprentice / Internship">Apprentice / Internship</option>
<option value="Other Jobs">Other Jobs </option>
</select></td>
</tr>

<tr>
<td>Age Limit</td>
<td>:</td>
<td><select name="age" class="select">
<option value="Less than 20 Yr">Less than 20 Yr</option>
<option value="20-30 Yr">20-30 Yr</option>
<option value="30-40 Yr">30-40 Yr</option>
<option value="40-50 Yr">40-50 Yr</option>
<option value="50+ Yr">50+ Yr</option>
<option value="nolimit">No Age Limit</option>
</select></td>
</tr>

<tr>
<td>Experience</td>
<td>:</td>
<td><select name="experience" class="select">
<option value="Less than 1 Yr">Less than 1 Yr</option>
<option value="1 Yr or more">1 Yr or more</option>
<option value="2 Yr or more">2 Yr or more</option>
<option value="3 Yr or more">3 Yr or more</option>
<option value="5 Yr or more">5 Yr or more</option>
<option value="7 Yr or more">7 Yr or more</option>
<option value="9 Yr or more">9 Yr or more</option>
<option value="10 Yr or more">10 Yr or more</option>
</select></td>
</tr>

<tr>
<td>Gender</td>
<td>:</td>
<td><select name="gender" class="select">
<option value="Male/Female">Male/Female</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select></td>
</tr>

<tr>
<td>Requirement</td>
<td>:</td>
<td><textarea name="requirement" class="textarea"></textarea></td>
</tr>

<tr>
<td>Salary</td>
<td>:</td>
<td><input type="text" name="salary" value="" size="30" class="textbox"/></td>
</tr>

<tr>
<td>Type of Job</td>
<td>:</td>
<td><select name="jobtype" class="select">
<option value="Full Time">Full Time</option>
<option value="Part Time">Part Time</option>
</select></td>
</tr>
<tr>
<td colspan="3" style="padding-left:15%;">
<input type="submit" name="jobpost" value="Post Job" class="fb5"/>
<input type="button" value="Cancel" class="fb5" onclick="cancelOper()"/></td>
</tr>
</table>
</form>

</body></html>
<?php 
}
}
else
{
echo "You are Not suppose to be here!<br>";
echo '
<script>
window.location="http://www.career4you.in";
</script>
';	
}
?>