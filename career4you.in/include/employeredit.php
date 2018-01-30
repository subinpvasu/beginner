<?php 
session_start();
include_once 'include/config.php';
$id = $_SESSION['id']; 
$sql = "SELECT * FROM employer WHERE id=".$id;
$result = mysql_query($sql) or die(mysql_error());
 if(mysql_num_rows($result)>0)
 {
 	while($row = mysql_fetch_array($result))
  		{
?>
<form method="post" action="checkout.php" >
<table>
<tr>
<td>Company Name</td>
<td>:</td>
<td>
<input type="text" name="comname" size="30" id="emcompany" value="<?php echo $row['name']?>" class="textbox"/>
</td>
</tr>

<tr>
<td>Type</td>
<td>:</td>
<td><select name="comtype" id="emtype" class="select">
	<option <?php  if($row['type']=='Industry'){echo "selected";}?> value="Industry">Industry</option>
	<option <?php  if($row['type']=='Business'){echo "selected";}?> value="Business">Business</option>
	<option <?php  if($row['type']=='Service') {echo "selected";}?> value="Service">Service</option>
	</select></td>
</tr>

<tr>
<td>Address</td>
<td>:</td>
<td><textarea name="address" id="emsaddress"  class="textarea"><?php echo $row['address']?></textarea></td>
</tr>

<tr>
<td>Place</td>
<td>:</td>
<td><input type="text" name="place" id="emplace" size="30" value="<?php echo $row['district']?>" class="textbox" /></td>
</tr>

<tr>
<td>Pin</td>
<td>:</td>
<td><input type="text" name="pin" id="empin" size="30" value="<?php echo $row['pin']?>" class="textbox" /></td>
</tr>

<tr>
<td>State</td>
<td>:</td>
<td>
<input type="text" name="state" id="emstate" size="30" value="<?php echo $row['state']?>" class="textbox" />
</td>
</tr>

<tr>
<td>Country</td>
<td>:</td>
<td>
<input type="text" name="country" id="emcountry"  value="<?php echo $row['country']?>" class="textbox"/></td>
</tr>

<tr>
<td>Phone</td>
<td>:</td>
<td>
<input type="text" name="phone" id="emphone" size="30" value="<?php echo $row['phone']?>" class="textbox" />
</td>
</tr>

<tr>
<td>Mobile</td>
<td>:</td>
<td>
<input type="text" name="mobile" id="emmobile" size="30" value="<?php echo $row['mobile']?>" class="textbox" />
</td>
</tr>

<tr>
<td>Fax</td>
<td>:</td>
<td><input type="text" name="fax" id="emfax" size="30" value="<?php echo $row['fax']?>" class="textbox" /></td>
</tr>

<tr>
<td>
<input type="hidden" name="email" id="ememail" size="30" value="<?php echo $row['email']?>" class="textbox"/>
</td>
</tr>

<tr>
<td>Website</td>
<td>:</td>
<td>
<input type="text" name="website" id="emwebsite" size="30" value="<?php echo $row['website']?>" class="textbox"/>
</td>
</tr>

<tr>
<td>Company Profile</td>
<td>:</td>
<td><textarea name="profile" id="emprofile" class="textarea"><?php echo $row['profile']?></textarea></td>
</tr>

<tr>
<td>Contact Person</td>
<td>:</td>
<td><input type="text" name="person" id="emperson" size="30" value="<?php echo $row['person']?>" class="textbox" /></td>
</tr>

<tr>
<td>Designation</td>
<td>:</td>
<td>
<input type="text" name="designation" id="emdesignation"  value="<?php echo $row['designation']?>" class="textbox"/>
</td>
</tr>

<tr>
<td>Mobile/Phone</td>
<td>:</td>
<td>
<input type="text" name="contact" id="emcontact" size="30" value="<?php echo $row['contact']?>" class="textbox"/>
</td>
</tr>

<tr>
<td colspan="3" align="center">
<input type="hidden" name="userid" value="<?php echo $_SESSION['id'];?>" />
<input type="submit" name="manemployer" onclick="return validateEmped()" value="Save Changes" class="fb5" /></td>
</tr>
</table>
</form>
<?php 

  		}
 }

?>