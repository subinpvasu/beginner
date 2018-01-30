<?php 
session_start();
include_once 'include/config.php';
$key = $_SESSION['id'];
$lower = 1;
if(!isset($_GET['page']) || $_GET['page']<0)
{
     $page = 1;
}
else
{
   $page = $_GET['page'];
}
$sql = "SELECT id,applicant FROM requirement WHERE applicant LIKE '%$key%'";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)>0)
{?>
<table width="700px"  cellpadding="2" id="homefill" style="visibility: visible;margin-top:25px;">
<tr><td colspan="4" align="center" style="font-weight: bold">Applied Jobs</td></tr>
<tr><td colspan="5" align="left"><img src="../images/green_line.png" alt="photo" width="700px"/> </td></tr>
<tr><td><input type="hidden" id="page" name="page" value="<?php echo $page;?>"/>
<?php
	while($row = mysql_fetch_array($result))
	{
		$id = $row['id'];
		$ap = $row['applicant'];
		$apt = explode(",",$ap);
		if(array_search($key,$apt)>=0)
		{
		
	$mysql = "SELECT requirement.designation AS designation,requirement.experience AS experience,
		  requirement.type AS type,requirement.lastchange AS postdate,employer.district AS district,
		  requirement.id AS reqid,employer.name AS company,employer.profile AS profile,
		  requirement.lastchange AS lastchange,requirement.category AS category FROM employer 
		  INNER JOIN requirement ON employer.id=requirement.empid WHERE requirement.id=".$id;
$myresult = mysql_query($mysql)or die(mysql_error());
if(mysql_num_rows($myresult) > 0)
{	
	while($col = mysql_fetch_array($myresult))
	{
$reqid  = ucwords(strtolower($col['reqid']));
$desig 	= ucwords(strtolower($col['designation'])); 
$expri  = ucwords(strtolower($col['experience']));
$jtype  = ucwords(strtolower($col['type']));
$postd  = ucwords(strtolower($col['postdate']));
$place  = ucwords(strtolower($col['district']));
$compn	= ucwords(strtolower($col['company']));
$profil = ucwords(strtolower($col['profile']));
$last   = ucwords(strtolower($col['lastchange']));
$cate   = ucwords(strtolower($col['category']));
                                  	$class = ceil($lower/12);
                                    $sub   = $lower/12;
                                    if($class==$page)
                                    {
                                       $style='display:block;';
                                    }
                                    else
                                    {
                                     $style='display:none;';  
                                    }
/*if($lower<12)
		{*/
			if($lower%2==1)
			{
		?>
<table cellspacing="3" style="border-bottom:1px solid grey;width: 300px;float: left;padding-bottom:10px;<?php echo $style;?>">

<tr>
<td style="text-align: left" colspan="2"><b title="<?php echo $cate;?>">
<?php echo substr(trim($desig) ." @ ".trim($place),0,40).".."; ?></b></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Role</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php echo trim($desig); ?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Experience</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php echo trim($expri);?> Year(s)</td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Job Type</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php echo trim($jtype); ?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Company Name</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php echo substr(trim($compn),0,18).".."; ?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;color:#789324" colspan="2">
<?php echo substr(trim($profil),0,40)."..."; ?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Posted:</td>
<td ><?php echo $last?></td>
</tr>
</table>
		<?php 
			}
			else
			{
			?>
			<table cellspacing="3" style="border-bottom:1px solid grey;width: 300px;
			float: right;padding-bottom:10px;<?php echo $style;?>">
<tr>
<td style="text-align: left" colspan="2"><b title="<?php echo $cate;?>">
<?php echo substr(trim($desig) ." @ ".trim($place),0,40).".."; ?></b></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Role</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php echo trim($desig); ?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Experience</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php echo trim($expri);?> Year(s)</td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Job Type</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php echo trim($jtype); ?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Company Name</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php echo substr(trim($compn),0,18).".."; ?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;color:#789324" colspan="2">
<?php echo substr(trim($profil),0,40)."..."; ?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Posted:</td>
<td ><?php echo $last?></td>
</tr>
</table><?php 
			}
	$lower++;
	
	/*if($lower>15)
	{
	break;	
	}
	}*/

	}
}


		}
		
	}
	
	?>
	
</td>
</tr>
</table>
<table width="700px" align="center" style="padding-top:40px;display:block;" cellpadding="5">
<tbody> <tr> <td align="left" style="width:350px">
 <?php if($page>=2){?>
 <a href="javascript:backResume()" >
 <img src="/images/back.png" alt="Previous Page"  width="75px" height="27px"/></a>
 <?php  }?></td> 
 <td align="right"  style="width:350px"> 
 <?php  if($lower>$page*12){?>
 <a href="javascript:forResume()" >
 <img src="/images/next.png" alt="Next Page"  width="75px" height="27px"/></a></td><?php }?>
  </tr> </tbody></table>

	<?php 
	
}

else
{
	echo '<b style="color:red;font-weight:bold;">You are NOT Applied any Job</b>
	<script>
var url = "index.php?msg=search";
setInterval(function(){window.onload = move();},2000);
function move()
{
window.location=url;
}
</script>
	';
}

?>