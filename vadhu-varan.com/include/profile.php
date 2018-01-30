<?php
session_start ();
if ($_SESSION ['profile'] == 'true') {
	$pid = $_SESSION ['who'];
} else {
	backToindex ();
}
include_once 'include/admin.php';
//include_once 'include/topmenu.php';
include_once 'include/functions.php';

//check session
//show menu
//show profile details
//thumbnail
//viewed profile
//followed profile
//activity log
//complete percent
//set  search preferences
//publishing status
//plan details
///*
/*
 * hot news w.r.t preferencs.
 * send mail when new registration occur
 * edit settings like skillpages
 * dynamically change the details
 * mobile number verificationhhh
 * 
 * 
 */
if($_GET['wall']=='ready')
{
	
	prepareAccount($pid);
}
if(!isset($_GET['msg'])){
	
$sql = "SELECT * FROM personal_details LEFT JOIN qualification ON personal_details.id=qualification.person_id
		WHERE personal_details.id=".$pid;
$result = mysql_query($sql);
$data = mysql_fetch_array($result);	
////////show details of the personality
?>
<style type="text/css">
.frontface {
	width:725px;
	/*border:1px solid red;*/
	height:350px;
}
.faceleft {
	width:400px;
	float:left;
	/*border:1px dotted blue;*/
	height:340px;
	margin:4px;
padding-left:25px;
}
.faceright {
	width:225px;
	float:right;
	/*border:1px dotted green;*/
	height:340px;
	margin:20px;
}
.other_tabs {
	width:725px;
	float:left;
	height:20px;
	margin-top:20px;
}
.other_tabs ul {
	list-style-type: none;
    padding-left: 20px;
vertical-align: middle;
}
.other_tabs ul li {
	float:left;
	text-transform: uppercase;
background-color:#FFA500;
}
.other_tabs ul li a{
	color:#06068C;
background-image: url("images/right-bullet_newb.jpg");
background-position: 7px center;
}
.screen   {
margin-top:20px;
/*border:1px solid;*/
background-color: #FFE294;
float:left;
margin-left:29px;
width:671px;
}

</style>
<p>&nbsp;</p>
<div class="frontface" onmouseover="verifyEmail(<?php echo $pid; ?>)" >
<div id="accountshower" style="position:absolute;top:315px;width:725px;text-align:center;font-weight:bold;">
</div>
<div class="faceleft">
<!-- show the details -->
<table align="left" cellspacing="15">

<tr>
<td>Name</td>
<td>:</td>
<td><?php echo $data['name']; ?></td>
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
<td >Caste</td>
<td>:</td>
<td><?php echo $data['caste']; ?></td>
</tr>

<tr>
<td>Date of Birth</td>
<td>:</td>
<td><?php echo $data['dob']; ?></td>
</tr>

<tr>
<td>Age</td>
<td>:</td>
<td><?php echo $data['age']; ?></td>
</tr>

<tr>
<td>Education</td>
<td>:</td>
<td><?php echo $data['education']; ?></td>
</tr>

<tr>
<td>Designation</td>
<td>:</td>
<td><?php echo $data['designation']; ?></td>
</tr>

<tr>
<td>Place</td>
<td>:</td>
<td><?php echo $data['location']; ?></td>
</tr>

</table>
</div>


<div style="border:1px solid;background-color:lightgrey" class="faceright">
<div style="height:240px;border:1px solid green;margin:10px;background-color:grey">
<?php 
$zql	 = "SELECT * FROM other WHERE person_id=".$pid;
$rezult	 = mysql_query($zql);
$zata 	 = mysql_fetch_array($rezult);
if($zata['profile_image']=='')
{
	if($data['gender']=='B'){
	?>
	<!-- put link in between after completing the uplloading oif the image -->
<a href="index.php?msg=other" id="picture">
<img src="images/girl.png" width="205px" height="242px" title="Click To Change Image" alt="PHOTO" <?php echo "onerror" ?>="personDisplay(<?php echo $pid;?>)" <?php echo "onload" ?>="personDisplay(<?php echo $pid;?>)"/>
</a>
	<?php 
}
else 
{
	?><a href="index.php?msg=other" id="picture">
<img src="images/boy.png" width="205px" height="242px" title="Click To Change Image" alt="PHOTO" <?php echo "onerror" ?>="personDisplay(<?php echo $pid;?>)" <?php echo "onload" ?>="personDisplay(<?php echo $pid;?>)"/>
</a>
	<?php 
}

?>


<!-- show some images 205*242 -->

<?php }
else {?>
<a href="index.php?msg=other"  id="picture">
<?php echo '<p style="position:absolute;visibility:hidden;color:white;font-weight:bold;padding-top:25px;"  id="check">Change Profile Picture</p>';
if($zata['profile_image']=='YR'){
?>
<img src="upload/<?php echo $zata['photos']?>" width="205px" height="242px" alt="PHOTO" <?php echo "onerror" ?>="personDisplay(<?php echo $pid;?>)" <?php echo "onload" ?>="personDisplay(<?php echo $pid;?>)"  onmouseover="show('check')" onmouseout="hide('check')"/>
<?php }
if($zata['profile_image']=='YC'){
?>
<img src="upload/<?php echo $zata['photou']?>" width="205px" height="242px" alt="PHOTO" <?php echo "onerror" ?>="personDisplay(<?php echo $pid;?>)" <?php echo "onload" ?>="personDisplay(<?php echo $pid;?>)"  onmouseover="show('check')" onmouseout="hide('check')"/>
<?php }
if($zata['profile_image']=='YL'){
?>
<img src="upload/<?php echo $zata['photob']?>" width="205px" height="242px" alt="PHOTO" <?php echo "onerror" ?>="personDisplay(<?php echo $pid;?>)" <?php echo "onload" ?>="personDisplay(<?php echo $pid;?>)"  onmouseover="show('check')" onmouseout="hide('check')"/>
<?php }
?>
</a>
<?php 
}
?>
</div>
<div style="height:48px;background-color:black;margin:10px;padding-top:20px;color:white;
font-weight:bold;text-transform: uppercase">
<?php echo $data['name']; ?><br>
AGE:<?php echo $data['age']; ?><br>
</div>
</div>
<div class="other_tabs">
<ul style="margin-left:10px">
<li><a href="javascript:personDisplay(<?php echo $pid;?>)">Personal Details</a></li>
<li><a href="javascript:physicalDisplay(<?php echo $pid;?>)">Physical</a></li>
<li><a href="javascript:educationDisplay(<?php echo $pid;?>)">Education &amp; Employment</a></li>
<li><a href="javascript:familyDisplay(<?php echo $pid;?>)">Family</a></li>
<li><a href="javascript:horoscopeDisplay(<?php echo $pid;?>)">Horoscope</a></li>
<li><a href="javascript:otherDisplay(<?php echo $pid;?>)">Other</a></li>
</ul>
</div>
<div class="screen" id="data"></div></div>
<?php }?>
