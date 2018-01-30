<?php
session_start();
include_once 'include/config.php';
?>
<html>
<head>
<style type="text/css">
td {
	text-align: center;
}
input {
	text-align:center;
}
.titles {
	text-align: center;
    font-weight:bold;
	color: white; 
	background-color: #465615;
}
</style>
</head>
<body style="position: absolute">
<?php
if($_GET['sms'] == 'education')
{
	$id = $_GET['key'];
	$sql = "SELECT * FROM education WHERE regid=".$id;
	$result = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result) > 0)
	{
		while($row = mysql_fetch_array($result))
		{
	$cor  = explode("|",$row['course']);
	$coll = explode("|",$row['school']);
	$fro  = explode("|",$row['frum']);
	$too  = explode("|",$row['too']);
	$mark = explode("|",$row['marks']);
?>

<form method="post" action="checkout.php">
<table>
<tr>
<td class="titles" colspan="2">Educational Qualification </td>
</tr>
<tr>
<td colspan="3">
<table width="516" height="173" align="center">
<tr>
<td width="31"  style="background-color: #465615;color:white;" rowspan="2">No</td>
<td width="105" style="background-color: #465615;color:white;" rowspan="2">Course</td>
<td width="214" style="background-color: #465615;color:white;" rowspan="2">Name of School/College/University</td>
<td height="23" style="background-color: #465615;color:white;" colspan="2">Period</td>
<td width="84"  style="background-color: #465615;color:white;" rowspan="2">% of Marks</td>
</tr>
<tr>
<td width="32" height="23" style="background-color: #465615;color:white;" align="center">From</td>
<td width="30" style="background-color: #465615;color:white;" align="center">To</td>
</tr>
<tr>
<td>1.</td>
<td><input type="text" name="coursea"  class="minibox"  id="coursea" size="15" value="<?php echo  $cor[0];?>"/></td>
<td><input type="text" name="collegea" class="textbox" id="collegea" size="30" value="<?php echo  $coll[0];?>"/></td>
<td><input type="text" name="froma"    class="minibox" id="froma"    size="4"  value="<?php echo  $fro[0];?>"/></td>
<td><input type="text" name="toa"      class="minibox" id="toa"      size="4"  value="<?php echo  $too[0];?>"/></td>
<td><input type="text" name="marksa"   class="minibox" id="marksa"   size="10" value="<?php echo  $mark[0];?>"/></td>
</tr>
<tr>
<td>2.</td>
<td><input type="text" name="courseb"  class="minibox" id="courseb"  size="15" value="<?php echo  $cor[1];?>"/></td>
<td><input type="text" name="collegeb" class="textbox" id="collegeb" size="30" value="<?php echo  $coll[1];?>"/></td>
<td><input type="text" name="fromb"    class="minibox" id="fromb"    size="4"  value="<?php echo  $fro[1];?>"/></td>
<td><input type="text" name="tob"      class="minibox" id="tob"      size="4"  value="<?php echo  $too[1];?>"/></td>
<td><input type="text" name="marksb"   class="minibox" id="marksb"   size="10" value="<?php echo  $mark[1];?>"/></td>
</tr>
<tr>
<td>3.</td>
<td><input type="text" name="coursec"  class="minibox" id="coursec"  size="15" value="<?php echo  $cor[2];?>"/></td>
<td><input type="text" name="collegec" class="textbox" id="collegec" size="30" value="<?php echo  $coll[2];?>"/></td>
<td><input type="text" name="fromc"    class="minibox" id="fromc"    size="4"  value="<?php echo  $fro[2];?>"/></td>
<td><input type="text" name="toc"      class="minibox" id="toc"      size="4"  value="<?php echo  $too[2];?>"/></td>
<td><input type="text" name="marksc"   class="minibox" id="marksc"   size="10" value="<?php echo  $mark[2];?>"/></td>
</tr>
<tr>
<td>4.</td>
<td><input type="text" name="coursed"  class="minibox" id="coursed"  size="15" value="<?php echo  $cor[3];?>"/></td>
<td><input type="text" name="colleged" class="textbox" id="colleged" size="30" value="<?php echo  $coll[3];?>"/></td>
<td><input type="text" name="fromd"    class="minibox" id="fromd"    size="4"  value="<?php echo  $fro[3];?>"/></td>
<td><input type="text" name="tod"      class="minibox" id="tod"      size="4"  value="<?php echo  $too[3];?>"/></td>
<td><input type="text" name="marksd"   class="minibox" id="marksd"   size="10" value="<?php echo  $mark[3];?>"/></td>
</tr>
<tr>
<td>5.</td>
<td><input type="text" name="coursee"  class="minibox" id="coursee"  size="15" value="<?php echo  $cor[4];?>"/></td>
<td><input type="text" name="collegee" class="textbox" id="collegee" size="30" value="<?php echo  $coll[4];?>"/></td>
<td><input type="text" name="frome"    class="minibox" id="frome"    size="4"  value="<?php echo  $fro[4];?>"/></td>
<td><input type="text" name="toe"      class="minibox" id="toe"      size="4"  value="<?php echo  $too[4];?>"/></td>
<td><input type="text" name="markse"   class="minibox" id="markse"   size="10" value="<?php echo  $mark[4];?>"/></td>
</tr>
</table>
<table>
<tr>
<td colspan="3">Curriculam Activities</td>
<td>:</td>
<td colspan="2"><textarea class="textarea" name="activity"><?php echo  $row['activities'];?></textarea></td>
</tr>
<tr>
<td colspan="3">Hobbies</td>
<td>:</td>
<td colspan="2"><textarea class="textarea" name="hobby"><?php echo  $row['hobby'];?></textarea></td>
</tr>
<tr>
<td colspan="3">Special Achievements</td>
<td>:</td>
<td colspan="2"><textarea class="textarea" name="achieve"><?php echo  $row['achievements'];?></textarea></td>
</tr>
<tr>
<td colspan="3" align="right"><input type="hidden" name="regid" value="<?php echo $_GET['key']?>"/>
<input type="submit" class="fb5" name="edication" value="Save Changes"/></td>
</tr>
</table>
</td>
</tr>
</table>
</form>
	<?php 
		}
	}
	else
	{
		?>
<form method="post" action="checkout.php">
<table>
<tr>
<td class="titles" colspan="2">Educational Qualification </td>
</tr>
<tr>
<td colspan="3">
<table width="516" height="173" align="center">
<tr>
<td width="31"  style="background-color: #465615;color:white;" rowspan="2">No</td>
<td width="105" style="background-color: #465615;color:white;" rowspan="2">Course</td>
<td width="214" style="background-color: #465615;color:white;" rowspan="2">Name of School/College/University</td>
<td height="23" style="background-color: #465615;color:white;" colspan="2">Period</td>
<td width="84"  style="background-color: #465615;color:white;" rowspan="2">% of Marks</td>
</tr>
<tr>
<td width="32" style="background-color: #465615;color:white;" height="23" align="center">From</td>
<td width="30" style="background-color: #465615;color:white;" align="center">To</td>
</tr>
<tr>
<td>1.</td>
<td><input type="text" class="minibox" name="coursea"   id="coursea"  size="15" /></td>
<td><input type="text" class="textbox" name="collegea"  id="collegea" size="30" /></td>
<td><input type="text" class="minibox" name="froma"     id="froma"    size="4"  /></td>
<td><input type="text" class="minibox" name="toa"       id="toa"      size="4"  /></td>
<td><input type="text" class="minibox" name="marksa"    id="marksa"   size="10" /></td>
</tr>
<tr>
<td>2.</td>
<td><input type="text" class="minibox" name="courseb"   id="courseb"  size="15" /></td>
<td><input type="text" class="textbox" name="collegeb"  id="collegeb" size="30" /></td>
<td><input type="text" class="minibox" name="fromb"     id="fromb"    size="4"  /></td>
<td><input type="text" class="minibox" name="tob"       id="tob"      size="4"  /></td>
<td><input type="text" class="minibox" name="marksb"    id="marksb"   size="10" /></td>
</tr>
<tr>
<td>3.</td>
<td><input type="text" class="minibox" name="coursec"   id="coursec"  size="15" /></td>
<td><input type="text" class="textbox" name="collegec"  id="collegec" size="30" /></td>
<td><input type="text" class="minibox" name="fromc"     id="fromc"    size="4"  /></td>
<td><input type="text" class="minibox" name="toc"       id="toc"      size="4"  /></td>
<td><input type="text" class="minibox" name="marksc"    id="marksc"   size="10" /></td>
</tr>
<tr>
<td>4.</td>
<td><input type="text" class="minibox" name="coursed"   id="coursed"  size="15" /></td>
<td><input type="text" class="textbox" name="colleged"  id="colleged" size="30" /></td>
<td><input type="text" class="minibox" name="fromd"     id="fromd"    size="4"  /></td>
<td><input type="text" class="minibox" name="tod"       id="tod"      size="4"  /></td>
<td><input type="text" class="minibox" name="marksd"    id="marksd"   size="10" /></td>
</tr>
<tr>
<td>5.</td>
<td><input type="text" class="minibox" name="coursee"   id="coursee"  size="15" /></td>
<td><input type="text" class="textbox" name="collegee"  id="collegee" size="30" /></td>
<td><input type="text" class="minibox" name="frome"     id="frome"    size="4"  /></td>
<td><input type="text" class="minibox" name="toe"       id="toe"      size="4"  /></td>
<td><input type="text" class="minibox" name="markse"    id="markse"   size="10" /></td>
</tr>
</table>
<table>
<tr>
<td colspan="3">Curriculam Activities</td>
<td>:</td>
<td colspan="2"><textarea class="textarea"  name="activity" ></textarea></td>
</tr>
<tr>
<td colspan="3">Hobbies</td>
<td>:</td>
<td colspan="2"><textarea class="textarea" name="hobby"></textarea></td>
</tr>
<tr>
<td colspan="3">Special Achievements</td>
<td>:</td>
<td colspan="2"><textarea class="textarea" name="achieve"></textarea></td>
</tr>
<tr>
<td colspan="3" align="right"><input type="hidden" name="regid" value="<?php echo $_GET['key']?>"/>
<input type="submit" class="fb5" name="education" value="Save"/></td>
</tr>
</table>
</td>
</tr>
</table>
</form>
<?php 
	}
}
if($_GET['sms'] == 'technical')
{
	$id = $_GET['key'];
	$sql = "SELECT * FROM technical WHERE regid=".$id;
	$result = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result) > 0)
	{
		while($row = mysql_fetch_array($result))
		{
	?>
<form method="post" action="checkout.php">
<table>
<tr><td class="titles">Languages</td></tr>
<tr><td>
<table>
<tr>
<td></td>
<td>Malayalam</td>
<td>English</td>
<td>Hindi</td>
<td>Tamil</td>
</tr>
<tr>
<td>Read</td>
<td><input type="checkbox" <?php if($row['mr']=='Y'){echo "checked";} ?>  name="MR" value="Y"/></td>
<td><input type="checkbox" <?php if($row['er']=='Y'){echo "checked";} ?>  name="ER" value="Y"/></td>
<td><input type="checkbox" <?php if($row['hr']=='Y'){echo "checked";} ?>  name="HR" value="Y"/></td>
<td><input type="checkbox" <?php if($row['tr']=='Y'){echo "checked";} ?>  name="TR" value="Y"/></td>
</tr>
<tr>
<td>Write</td>
<td><input type="checkbox" <?php if($row['mw']=='Y'){echo "checked";} ?>  name="MW" value="Y"/></td>
<td><input type="checkbox" <?php if($row['ew']=='Y'){echo "checked";} ?>  name="EW" value="Y"/></td>
<td><input type="checkbox" <?php if($row['hw']=='Y'){echo "checked";} ?>  name="HW" value="Y"/></td>
<td><input type="checkbox" <?php if($row['tw']=='Y'){echo "checked";} ?>  name="TW" value="Y"/></td>
</tr>
<tr>
<td>Speak</td>
<td><input type="checkbox" <?php if($row['ms']=='Y'){echo "checked";} ?>  name="MS" value="Y"/></td>
<td><input type="checkbox" <?php if($row['es']=='Y'){echo "checked";} ?>  name="ES" value="Y"/></td>
<td><input type="checkbox" <?php if($row['hs']=='Y'){echo "checked";} ?>  name="HS" value="Y"/></td>
<td><input type="checkbox" <?php if($row['ts']=='Y'){echo "checked";} ?>  name="TS" value="Y"/></td>
</tr>
</table>
</td></tr>
<tr>
<td class="titles">Other</td>
</tr>
<tr><td>
<table>
<tr>
<td>Microsoft Office</td>
<td><input type="checkbox" <?php if($row['mso']=='Y'){echo "checked";} ?>  name="MSO" value="Y"/></td>
</tr>
<tr>
<td>Tally</td>
<td><input type="checkbox" <?php if($row['tal']=='Y'){echo "checked";} ?>  name="TAL" value="Y"/></td>
</tr>
<tr>
<td>DTP</td>
<td><input type="checkbox" <?php if($row['dtp']=='Y'){echo "checked";} ?>  name="DTP" value="Y"/></td>
</tr>
<tr>
<td>Tele Calling</td>
<td><input type="checkbox" <?php if($row['tcl']=='Y'){echo "checked";} ?>  name="TCL" value="Y"/></td>
</tr>
<tr>
<td>Graphic Designing</td>
<td><input type="checkbox" <?php if($row['gdd']=='Y'){echo "checked";} ?>  name="GDD" value="Y"/></td>
</tr>
<tr>
<td>2D Animtion</td>
<td><input type="checkbox" <?php if($row['anm']=='Y'){echo "checked";} ?>  name="ANM" value="Y"/></td>
</tr>
</table>
</td></tr>
<tr>
<td>Physically Challenged</td>
<td><input type="checkbox" <?php if($row['pcd']=='Y'){echo "checked";} ?>  name="PCD" value="Y"/></td>
</tr>
<tr>
<td>Details</td>
<td><textarea class="textarea" name="challenge"><?php echo $row['details']; ?></textarea></td>
</tr>
<tr>
<td>Other Details</td>
<td><textarea class="textarea" name="other"><?php echo $row['other']; ?></textarea></td>
</tr>
<tr>
<td>Profile Summary</td>
<td><textarea class="textarea" name="summary"><?php echo $row['summary']; ?></textarea></td>
</tr>
<tr>
<td><input type="hidden" name="regid" value="<?php echo $_GET['key']?>"/>
<input type="submit" class="fb5" name="technic" value="Save Changes"/></td>
</tr>
</table>
</form>
	<?php 
		}
	}
	else
	{
		?>
<form method="post" action="checkout.php">
<table>
<tr><td class="titles">Languages</td></tr>
<tr><td>
<table>
<tr>
<td></td>
<td>Malayalam</td>
<td>English</td>
<td>Hindi</td>
<td>Tamil</td>
</tr>
<tr>
<td>Read</td>
<td><input type="checkbox" name="MR" value="Y"/></td>
<td><input type="checkbox" name="ER" value="Y"/></td>
<td><input type="checkbox" name="HR" value="Y"/></td>
<td><input type="checkbox" name="TR" value="Y"/></td>
</tr>
<tr>
<td>Write</td>
<td><input type="checkbox" name="MW" value="Y"/></td>
<td><input type="checkbox" name="EW" value="Y"/></td>
<td><input type="checkbox" name="HW" value="Y"/></td>
<td><input type="checkbox" name="TW" value="Y"/></td>
</tr>
<tr>
<td>Speak</td>
<td><input type="checkbox" name="MS" value="Y"/></td>
<td><input type="checkbox" name="ES" value="Y"/></td>
<td><input type="checkbox" name="HS" value="Y"/></td>
<td><input type="checkbox" name="TS" value="Y"/></td>
</tr>
</table>
</td></tr>
<tr>
<td class="titles"> Other</td>
</tr>
<tr><td>
<table>
<tr>
<td>Microsoft Office</td>
<td><input class="textbox" type="checkbox" name="MSO" value="Y"/></td>
</tr>
<tr>
<td>Tally</td>
<td><input type="checkbox" name="TAL" value="Y"/></td>
</tr>
<tr>
<td>DTP</td>
<td><input type="checkbox" name="DTP" value="Y"/></td>
</tr>
<tr>
<td>Tele Calling</td>
<td><input type="checkbox" name="TCL" value="Y"/></td>
</tr>
<tr>
<td>Graphic Designing</td>
<td><input type="checkbox" name="GDD" value="Y"/></td>
</tr>
<tr>
<td>2D Animtion</td>
<td><input type="checkbox" name="ANM" value="Y"/></td>
</tr>
</table>
</td></tr>
<tr>
<td>Physically Challenged</td>
<td><input type="checkbox" name="PCD" value="Y"/></td>
</tr>
<tr>
<td>Details</td>
<td><textarea class="textarea"  name="challenge"></textarea></td>
</tr>
<tr>
<td>Other Details</td>
<td><textarea class="textarea"  name="other"></textarea></td>
</tr>
<tr>
<td>Profile Summary</td>
<td><textarea class="textarea"  name="summary"></textarea></td>
</tr>
<tr>
<td><input type="hidden" name="regid" value="<?php echo $_GET['key']?>"/>
<input type="submit" class="fb5" name="technical" value="Save Changes"/></td>
</tr>
</table>
</form> 
		<?php 
	}
		
}
if($_GET['sms'] == 'employment')
{
	$id = $_GET['key'];
	$sql = "SELECT * FROM employment WHERE regid=".$id;
	$result = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result) > 0)
	{
		while($row = mysql_fetch_array($result))
		{
				$fir  = explode("|",$row['firm']);
				$des  = explode("|",$row['designation']);
				$fro  = explode("|",$row['frum']);
				$too  = explode("|",$row['too']);
				$reso = explode("|",$row['reason']);
				$plc  = explode("|",$row['place']);
	?>
<form method="post" action="checkout.php">
<table>
<tr>
<td class="titles" align="center">Employment Status</td>
</tr>
<tr>
<td>
<table>
<tr>
<td style="background-color: #465615;color:white;" align="center">No</td>
<td style="background-color: #465615;color:white;" align="center">Institution</td>
<td style="background-color: #465615;color:white;" align="center">Place</td>
<td style="background-color: #465615;color:white;" align="center">Designation</td>
<td style="background-color: #465615;color:white;" align="center">From</td>
<td style="background-color: #465615;color:white;" align="center">To</td>
<td style="background-color: #465615;color:white;" align="center">Reason for Leaving</td>
<td style="background-color: #465615;color:white;" align="center">Present</td>
</tr>
<tr>
<td >1.</td>
<td ><input type="text" name="firma" id="firma"     style="width:90px;" class="textbox"    size="15" value="<?php echo  $fir[0];?>"/></td>
<td ><input type="text" name="placea" id="placea"   style="width:90px;" class="textbox"  size="15" value="<?php echo  $plc[0];?>"/></td>
<td ><input type="text" name="designa" id="designa" style="width:90px;" class="textbox" size="15" value="<?php echo  $des[0];?>"/></td>
<td ><input type="text" name="froma" id="froma"     class="minibox" size="5"  value="<?php echo  $fro[0];?>"/></td>
<td ><input type="text" name="toa" id="toa"         class="minibox" size="5"  value="<?php echo  $too[0];?>"/></td>
<td ><textarea class="miniarea"  style="width:150px;height:30px" name="reasona"><?php echo  $reso[0];?></textarea></td>
<td align="center"><input type="radio" name="present" value="PA" <?php if($row['current'] == 'PA'){echo "checked";} ?>/></td>
</tr>
<tr>
<td >2.</td>
<td ><input type="text" class="textbox" style="width:90px;" name="firmb" id="firmb" size="15"     value="<?php echo  $fir[1];?>"/></td>
<td ><input type="text" class="textbox" style="width:90px;" name="placeb" id="placeb" size="15"   value="<?php echo  $plc[1];?>"/></td>
<td ><input type="text" class="textbox" style="width:90px;" name="designb" id="designb" size="15" value="<?php echo  $des[1];?>"/></td>
<td ><input type="text" class="minibox" name="fromb" id="fromb" size="5"      value="<?php echo  $fro[1];?>"/></td>
<td ><input type="text" class="minibox" name="tob" id="tob" size="5"          value="<?php echo  $too[1];?>"/></td>
<td ><textarea class="miniarea"  style="width:150px;height:30px" name="reasonb"><?php echo  $reso[1];?></textarea></td>
<td align="center"><input type="radio" name="present" value="PB" <?php if($row['current'] == 'PB'){echo "checked";} ?>/></td>
</tr>
<tr>
<td >3.</td>
<td ><input type="text" class="textbox" style="width:90px;" name="firmc" id="firmc" size="15"     value="<?php echo  $fir[2];?>"/></td>
<td ><input type="text" class="textbox" style="width:90px;" name="placec" id="placec" size="15"   value="<?php echo  $plc[2];?>"/></td>
<td ><input type="text" class="textbox" style="width:90px;" name="designc" id="designc" size="15" value="<?php echo  $des[2];?>"/></td>
<td ><input type="text" class="minibox" name="fromc" id="fromc" size="5"      value="<?php echo  $fro[2];?>"/></td>
<td ><input type="text" class="minibox" name="toc" id="toc" size="5"          value="<?php echo  $too[2];?>"/></td>
<td ><textarea  class="miniarea" style="width:150px;height:30px" name="reasonc"><?php echo  $reso[2];?></textarea></td>
<td align="center"><input type="radio" name="present" value="PC" <?php if($row['current'] == 'PC'){echo "checked";} ?>/></td>
</tr>
</table>
<table>
<tr>
<td colspan="3">Professional Capabilities</td>
<td>:</td>
<td ><textarea class="textarea"  name="capability"><?php echo  $row['capability']?></textarea></td>
</tr>
<tr>
<td colspan="3">Brief Assessment about Yourself</td>
<td>:</td>
<td ><textarea  class="textarea" name="assessment"><?php echo  $row['yourself']?></textarea></td>
</tr>
<tr>
<td colspan="3">Present Salary</td>
<td>:</td>
<td><input type="text" class="textbox" name="presalary"  value="<?php echo  $row['salary']?>" /></td>
</tr>
<tr>
<td colspan="3">Expected Salary</td>
<td>:</td>
<td><input type="text" class="textbox" name="expsalary"  value="<?php echo  $row['expect']?>" />
<input type="hidden" name="regid" value="<?php echo $_GET['key']?>"/></td>
</tr>
<tr>
<td colspan="3" align="right"><input type="submit" name="employed" class="fb5" value="Save Changes" /></td>
</tr>
</table>
</td>
</tr>
</table>
</form>
	<?php 
		}
	}
	else
	{
		?>
<form method="post" action="checkout.php">
<table>
<tr>
<td class="titles" align="center">Employment Status</td>
</tr>
<tr>
<td>
<table>
<tr>
<td style="background-color: #465615;color:white;" align="center">No</td>
<td style="background-color: #465615;color:white;" align="center">Institution</td>
<td style="background-color: #465615;color:white;" align="center">Place</td>
<td style="background-color: #465615;color:white;" align="center">Designation</td>
<td style="background-color: #465615;color:white;" align="center">From</td>
<td style="background-color: #465615;color:white;" align="center">To</td>
<td style="background-color: #465615;color:white;" align="center">Reason for Leaving</td>
<td style="background-color: #465615;color:white;" align="center">Present</td>
</tr>
<tr>
<td >1.</td>
<td ><input type="text" class="textbox" style="width:90px;" name="firma" id="firma" size="15"/></td>
<td ><input type="text" class="textbox" style="width:90px;" name="placea" id="placea" size="15"  /></td>
<td ><input type="text" class="textbox" style="width:90px;" name="designa" id="designa" size="15"/></td>
<td ><input type="text" class="textbox" name="froma" id="froma" size="5"/></td>
<td ><input type="text" class="textbox" name="toa" id="toa" size="5"/></td>
<td ><textarea class="miniarea" style="width:150px;height:30px" name="reasona"></textarea></td>
<td align="center"><input type="radio" name="present" value="PA"/></td>
</tr>
<tr>
<td >2.</td>
<td ><input type="text" class="textbox" style="width:90px;" name="firmb" id="firmb" size="15"/></td>
<td ><input type="text" class="textbox" style="width:90px;" name="placeb" id="placeb" size="15"  /></td>
<td ><input type="text" class="textbox" style="width:90px;" name="designb" id="designb" size="15"/></td>
<td ><input type="text" class="textbox" name="fromb" id="fromb" size="5"/></td>
<td ><input type="text" class="textbox" name="tob" id="tob" size="5"/></td>
<td ><textarea class="miniarea" style="width:150px;height:30px" name="reasonb"></textarea></td>
<td align="center"><input type="radio" name="present" value="PB"/></td>
</tr>
<tr>
<td >3.</td>
<td ><input type="text" class="textbox" style="width:90px;" name="firmc" id="firmc" size="15"/></td>
<td ><input type="text" class="textbox" style="width:90px;" name="placec" id="placec" size="15"  /></td>
<td ><input type="text" class="textbox" style="width:90px;" name="designc" id="designc" size="15"/></td>
<td ><input type="text" class="textbox" name="fromc" id="fromc" size="5"/></td>
<td ><input type="text" class="textbox" name="toc" id="toc" size="5"/></td>
<td ><textarea class="miniarea" style="width:150px;height:30px" name="reasonc"></textarea></td>
<td align="center"><input type="radio" name="present" value="PC"/></td>
</tr>
</table>
<table>
<tr>
<td colspan="3">Professional Capabilities</td>
<td>:</td>
<td ><textarea class="textarea"  name="capability"></textarea></td>
</tr>
<tr>
<td colspan="3">Brief Assessment about Yourself</td>
<td>:</td>
<td ><textarea class="textarea" name="assessment"></textarea></td>
</tr>
<tr>
<td colspan="3">Present Salary</td>
<td>:</td>
<td><input type="text" class="textbox" name="presalary" /></td>
</tr>
<tr>
<td colspan="3">Expected Salary</td>
<td>:</td>
<td><input type="text" class="textbox" name="expsalary" />
<input type="hidden" name="regid" value="<?php echo $_GET['key']?>"/></td>
</tr>
<tr>
<td colspan="3" align="right"><input type="submit" name="employee" class="fb5" value="Save" /></td>
</tr>
</table>
</td>
</tr>
</table>
</form>	
<?php 
	}
}
?>
</body>
</html>