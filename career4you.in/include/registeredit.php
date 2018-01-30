<?php 
session_start();
include_once 'include/config.php';
$id = $_SESSION['id'];
if(is_numeric($id)){
$sql = "SELECT * FROM register WHERE id=".$id;
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0)
{
	
	while($row = mysql_fetch_array($result))
	{
		
?>
<form method="post" action="checkout.php" onsubmit="return validateForm()">
<table onmouseover="loadNow()">
<?php //Personal Information?>
<tr>
<td>Full Name</td>
<td>:</td>
<td><input type="text" id="cname" name="name" value="<?php echo $row['name']?>" size="30" class="textbox" />
</td>
</tr>

<tr>
<td>Father's Name</td>
<td>:</td>
<td><input type="text" id="fname"  name="fname" value="<?php echo $row['father']?>" size="30" class="textbox" />
</td>
</tr>

<tr>
<td>Place of Birth</td>
<td>:</td>
<td>
<input type="text" id="pbirth" name="birthplace" value="<?php echo $row['birthplace']?>"  class="textbox"/>
</td>
</tr>
<?php 
////make something urgent that we have to edit thedob
//edit the method of the date showing thedre and ake necessary changes in the both end
?>
<tr>
<td>Date of Birth</td>
<td id="date"><input type="hidden" id="din" value="ABCD"/>:</td>
<td ><input type="hidden" id="postdate" name="postdate" value="<?php echo $row['birthday']?> "/>
<?php //15/10/1988// ?>
<span style="width:75px">
<select name="month" id="month" onchange="showDate()"></select></span>
<span style="width:75px">
<select name="day" id="today"></select></span>
<span style="width:75px">
<select name="year" id="year"></select></span>
</td>
</tr>

<tr>
<td>Age</td>
<td>:</td>
<td><input type="text" id="age" value="<?php echo $row['age']?>" name="age" size="30" class="textbox" /></td>
</tr>

<tr>
<td>Gender</td>
<td>:</td>
<td>Male<input type="radio"  <?php if($row['gender']=='M'){echo "checked";}?>
  name="gender" value="M" />Female
<input type="radio"  <?php if($row['gender']=='F'){echo "checked";}?> 
value="F" name="gender" /></td>
</tr>

<tr>
<td>Marital Status</td>
<td>:</td>
<td>Married<input type="radio" onchange="maritalStatus()" <?php if($row['marriage']=='M'){echo "checked";}?>
  name="marital" value="M" id="marry">Single
<input type="radio" onchange="maritalStatus()" <?php if($row['marriage']=='S'){echo "checked";}?> 
value="S" name="marital" id="single"></td>
</tr>

<tr >
<td>Name of Spouse</td>
<td>:</td>
<td><input id="wife" type="text" name="wife" value="<?php echo $row['wife']?>"
 disabled size="30" class="textbox" /></td>
</tr>

<tr >
<td>No. of Children</td>
<td>:</td>
<td><input id="child" type="text" name="child" value="<?php echo $row['child']?>"
 disabled  size="30" class="textbox" /></td>
</tr>

<tr>
<td>Permanent Address</td>
<td>:</td>
<td><textarea id="pmaddr" name="address" class="textarea"><?php echo $row['peraddress']?></textarea></td>
</tr>

<tr>
<td>Present Address</td>
<td>:</td>
<td><textarea id="praddr" name="address_now"  class="textarea" ><?php echo $row['preaddress']?></textarea></td>
</tr>

<tr>
<td>Telephone</td>
<td>:</td>
<td><input type="text" id="phone" value="<?php echo $row['phone']?>" name="phone" size="30" class="textbox" />
</td>
</tr>

<tr>
<td>Mobile</td>
<td>:</td>
<td><input type="text" id="mobile" value="<?php echo $row['mobile']?>"
 name="mobile" size="30" class="textbox" />
<input type="hidden" name="userid" value=<?php echo $_SESSION['id'] ?> /></td>
</tr>

<tr>
<td>Fax</td>
<td>:</td>
<td><input type="text" name="fax" value="<?php echo $row['fax']?>"  size="30" class="textbox" /></td>
</tr>

<tr>
<td><input type="hidden" name="email" value="<?php echo $row['email']?>" id="email" size="30" class="textbox" />
</td>
</tr>

<tr>
<td colspan="3" align="center">
<input type="submit" onmouseover="checDate()" name="manresume" class="fb5" value="Save Changes"/></td>
</tr>
</table>
</form>
<?php 
	}
}
}
?>