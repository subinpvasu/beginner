<?php 
session_start();
include_once 'include/config.php';
if(!isset($_GET['page']) || $_GET['page']<0)
{
     $page = 1;
}
else
{
   $page = $_GET['page'];
}
?>
<form method="post" action="">
<table>
<tr>
	<td>
		<input type="text" name="query" title="Enter the Qualification of Required Resume."
		 size="50" maxlength="80" value="<?php echo $_POST['query']?>" class="textbox"/>
	</td>
	<td>
		<input type="submit" name="resume" value="Find Resume" class="fb5"/> 
		<input type="hidden" id="page" name="page" value="<?php echo $page;?>"/>
	</td>
</tr>
</table>
</form>

<?php 

if($_POST['resume']=='Find Resume')
{
if(!isset($_GET['page']) || $_GET['page']<0)
{
     $page = 1;
}
else
{
   $page = $_GET['page'];
}
	$lowercont = 1;
	if(!empty($_POST['query']))
	{
		
$qry = $_POST['query'];	//php mysql,joomla,css,html
echo '<b style="color:red;padding-bottom:25px">You Searched for " '.$qry.' "</b><br>';

if(strpos($qry,","))
{
	$qry = explode(",",$qry);
	$qry = array_filter($qry);
    $qry = array_values($qry);
}
else
{
	$qry = explode(" ",$qry);
	$qry = array_filter($qry);
    $qry = array_values($qry);
}


$sql = "SELECT summary,regid FROM technical";
$result = mysql_query($sql) or die(mysql_error());
while($row = mysql_fetch_array($result))
{
	$id = $row['regid'];
	$summary = $row['summary'];
	if(strpos($summary,","))
{
	$summary = explode(",",$summary);
	$summary = array_filter($summary);
    $summary = array_values($summary);
}
else
{
	$summary = explode(" ",$summary);
	$summary = array_filter($summary);
    $summary = array_values($summary);
}
$summary  = array_map('strtolower', $summary);
$qry = array_map('strtolower', $qry);
$match = array_intersect($summary,$qry);

if(count($match)>0)
{
	
	$msql = "SELECT register.id AS id,register.name AS name,technical.summary AS summary,education.course AS course,
			 education.school AS school,employment.firm AS firm,employment.designation AS designation,
			 employment.place AS place,education.too AS too,employment.current AS current,
			 register.resume AS resume FROM register INNER JOIN employment ON register.id=employment.regid
			 INNER JOIN education ON education.regid=register.id INNER JOIN technical ON 
			 technical.regid=register.id WHERE register.id=".$id;
	$msre = mysql_query($msql) or die(mysql_error());
	$col  = mysql_fetch_array($msre);	
	$name = $col['name'];
	$summ = $col['summary'];
	$cour = $col['course'];//arr
	$scho = $col['school'];//arr
	$firm = $col['firm'];//arre
	$desg = $col['designation'];//arre
	$plce = $col['place'];//arre
	$too  = $col['too'];//ARR
	$crnt = $col['current'];
	$resu = $col['resume'];
	$cid  = $col['id'];
	
	switch ($crnt)
	{
		case 'PA':
			$cr = 0;
			break;
		case 'PB':
			$cr = 1;
			break;
		default :
			$cr = 2;	
	}
	$firm = explode("|",$firm);
	$desg = explode("|",$desg);
	$plce = explode("|",$plce);
//	$firm[$cr];
	$cour = explode("|",$cour);
	$cour = array_filter($cour);
	$cour = array_values($cour);
	$cour = implode(",",$cour);
	$scho = explode("|",$scho);
	$too  = explode("|",$too);
	$oot  = array();
	$oot  = $too;
	rsort($oot);
	$ced  = array_search($oot[0],$too);
	$kid = $_SESSION['id'];
	$mmsql = "SELECT * FROM payment INNER JOIN profile ON payment.plan=profile.profile WHERE
	 payment.status='activated' AND payment.expired='N' AND payment.empid=".$kid;
	$res = mysql_query($mmsql);
	if(mysql_num_rows($res)>0)
	{
	   $plan = 'active';
	}
	else {
	   $plan = 'none';
	}
                                    $class = ceil($lowercont/12);
                                    $sub   = $lowercont/12;
                                    if($class==$page)
                                    {
                                       $style='display:block;';
                                    }
                                    else
                                    {
                                     $style='display:none;';  
                                    }

			if($lowercont%2==1)
			{
		?>

<table cellspacing="3" style="border-bottom:1px solid grey;width: 300px;float: left;padding-bottom:10px;<?php echo $style;?>">
<tr>
<td style="text-align: left" colspan="2"><b >
</b></td>
</tr>
<tr>
  <td colspan="2" style="padding-bottom: 8px;width:100%;height: 30px;vertical-align: middle">
  <?php
if($plan == 'active')
{
   echo '<a href="javascript:employerApply('.$kid.','.$cid.')" style="text-decoration:none;color:black;font-weight:bold">
  			  Candidate Name</a>';
}else{
  echo '<a href="index.php?msg=payment" style="text-decoration:none;color:black;font-weight:bold">
  			  Candidate Name</a>';
}
  if($resu == 'NO'){?>
  <img src="images/word_icon.png"  width="15px" height="15px" title="No Resume Found" alt="No Resume"/>
  <?php }else{ ?>
  <img src="images/word_ico.png"   width="15px" height="15px" title="Resume Found" alt="Resume"/>
  <?php }?></td>
  </tr>
<!--<tr>
<td style="text-align: left;width: 150px;" colspan="1">Name</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php /*echo $name;*/?></td>
</tr>
--><tr>
<td style="text-align: left;width: 150px;" colspan="1">Current Designation</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php echo $desg[$cr];?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Current Firm</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php echo $firm[$cr];?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Current Location</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php echo $plce[$cr];?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Education </td>
<td style="text-align: left;width: 150px;" colspan="1" 
title="">
<?php if(!empty($too[$ced])){
	  echo substr($cour,0,20)."..";}?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;color:#789324" colspan="2" title="<?php echo $summ;?>">
<?php echo substr($summ,0,40)."..";?>
</td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Last Update:</td>
<td ></td>
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
<td style="text-align: left" colspan="2"><b >
</b></td>
</tr>
<tr>
  <td colspan="2" style="padding-bottom: 8px;width:100%;height: 30px;vertical-align: middle">
  <?php if($plan == 'active')
{
   echo '<a href="javascript:employerApply('.$kid.','.$cid.')" style="text-decoration:none;color:black;
   font-weight:bold">Candidate Name</a>';
}else{
  echo '<a href="index.php?msg=payment" style="text-decoration:none;color:black;font-weight:bold">
  			  Candidate Name</a>';
}
  if($resu == 'NO'){?>
  <img src="images/word_icon.png" width="15px" height="15px" title="No Resume Found" alt="No Resume"/>
  <?php }else{ ?>
  <img src="images/word_ico.png"  width="15px" height="15px" title="Resume Found" alt="Resume"/>
  <?php }?></td>
  </tr>
<!--<tr>
<td style="text-align: left;width: 150px;" colspan="1">Name</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php /*echo $name;*/?></td>
</tr>
--><tr>
<td style="text-align: left;width: 150px;" colspan="1">Current Designation</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php echo $desg[$cr];?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Current Firm</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php echo $firm[$cr];?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Current Location</td>
<td style="text-align: left;width: 150px;" colspan="1"><?php echo $plce[$cr];?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Education </td>
<td style="text-align: left;width: 150px;" colspan="1"
title="">
<?php  if(!empty($too[$ced])){
echo substr($cour,0,20)."..";}?></td>
</tr>
<tr>
<td style="text-align: left;width: 150px;color:#789324" colspan="2" title="<?php echo $summ;?>">
<?php echo substr($summ,0,40)."..";?>
</td>
</tr>
<tr>
<td style="text-align: left;width: 150px;" colspan="1">Last Update:</td>
<td ></td>
</tr>
</table><?php 
			}
	$lowercont +=1;
	
	/*if($lowercont>15)
	{
	break;	
	}*/
	
	
	
}	
}
}

?>
<table width="700px" align="center" style="padding-top:40px;display:block;" cellpadding="5">
<tbody> <tr> <td align="left" style="width:350px">
 <?php if($page>=2){?>
 <a href="javascript:backResumeSearch()" >
 <img src="/images/back.png" alt="Previous Page"  width="75px" height="27px"/></a>
 <?php  }?></td> 
 <td align="right"  style="width:350px"> 
 <?php  if($lowercont>$page*12){?>
 <a href="javascript:forResumeSearch()" >
 <img src="/images/next.png" alt="Next Page"  width="75px" height="27px"/></a></td><?php }?>
  </tr> </tbody></table>
<?php 

}

?>