<?php
session_start();
$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);


///////////////////////////////BEGIN FROM 
if($_GET['msg'] == 'mail' && $_GET['from'] == 'acc')
{
$id = $_GET['p'];
$mail = $_GET['q'];
//first check
if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9\._-]+)+$/",$mail))
{
echo '<img src="images/block.jpg" alt="Enter Valid email ID." onload="loadEmail()" title="Enter Valid email ID." height="15" width="15">';
}else 
{
$sql="SELECT * FROM register WHERE email = '".$mail."' AND Id='".$id."'";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{
echo '<img src="images/ahead.png" onload="loadtEuse()" alt="" height="15" width="15"> ';
}
else
{
echo '<img src="images/block.jpg" alt="Email ID already in Use." onload="loadEuse()" title="Email ID already in Use." height="15" width="15"> ';
}
}
}
////////////////email validation
if($_GET['msg'] == 'email')
{
if(isset($_GET["q"]) && $_GET["q"] != '' && $_GET["q"] != '  ')
{
$q=$_GET["q"];
}
if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9\._-]+)+$/",$q))
{
//echo "<font color=red> Enter Valid email ID.</font>";
echo '<img src="images/block.jpg" alt="Enter Valid email ID." onload="loadEmail()" title="Enter Valid email ID." height="15" width="15">';
}
else 
{
$sql="SELECT * FROM register WHERE email = '".$q."'";
$result = mysql_query($sql);
if(mysql_num_rows($result) > 0) 
{
echo '<img src="images/block.jpg" alt="Email ID already in Use." onload="loadEuse()" title="Email ID already in Use." height="15" width="15"> ';
}
else
{
echo '<img src="images/ahead.png" onload="loadtEuse()" alt="" height="15" width="15"> ';}
mysql_close($con);
}

}
 if($_GET['msg'] == 'type')
	{
	if(isset($_GET["q"]) && $_GET["q"] != '' && $_GET["q"] != '  ')
	{
	echo '<img src="images/ahead.png" onload="loadtType()" alt="" height="15" width="15"> ';
	}
	else
	{
	echo '<img src="images/block.jpg" alt="Select the Type." onload="loadType()" title="Select the Type." height="15" width="15"> ';
	$errors[] = 'Select the Type.';
	}
}
if($_GET['msg'] == 'name')
			{
			if(isset($_GET["q"]) && $_GET["q"] != '' && $_GET["q"] != '  ' && strlen($_GET["q"]) > 6 )
			{
			echo '<img src="images/ahead.png" onload="loadtName()" alt="" height="15" width="15"> ';
			}
			else
			{
			$errors[] = 'Enter a Valid Name.';
			echo '<img src="images/block.jpg" alt="Enter a Valid Name." onload="loadName()" title="Enter a Valid Name." 
			height="15" width="15"> ';
			}
}
if($_GET['msg'] == 'mobile')
			{
			if(isset($_GET["q"]) && $_GET["q"] != '' && $_GET["q"] != '  ' && strlen($_GET["q"]) > 9 && is_numeric($_GET["q"]))
			{
			echo '<img src="images/ahead.png" onload="loadtMobile()" alt="" height="15" width="15"> ';
			}
			else
			{
			$errors[] = 'Enter Valid Mobile Number.';
			echo '<img src="images/block.jpg" alt="Enter Valid Mobile Number." onload="loadMobile()" title="Enter Valid Mobile 		            Number." height="15" width="15"> ';
			}
}
if($_GET['msg'] == 'phone')
		{
			if(isset($_GET["q"]) && $_GET["q"] != '' && $_GET["q"] != '  ' && strlen($_GET["q"]) > 10 && is_numeric($_GET["q"]))
			{
			echo '<img src="images/ahead.png" onload="loadtPhone()" alt="" height="15" width="15"> ';
			}
			else
			{
			$errors[] = 'Enter Valid LandLine Number.';
			echo'<img src="images/block.jpg" alt="Enter Valid LandLine Number"title="Enter Valid LandLine Number." 	
		    onload="loadPhone()" height="15"width="15"> ';
			}
}
if($_GET['msg'] == 'password')
{
$p = $_GET['p'];
$q = $_GET['q'];
if($p == $q)
{
echo '<img src="images/ahead.png" onload="loadtPassa()" alt="" height="15" width="15"> ';
}
else
{
$errors[] = 'Password not Matching.';
echo '<img src="images/block.jpg" alt="Password not Matching." title="Password not Matching." onload="loadPassa()" height="15" width="15"> ';
}
}
if($_GET['msg'] == 'passone')
{
$p = $_GET['p'];
$q = $_GET['q'];
if($p == $q)
{
echo '<img src="images/ahead.png" alt="" onload="loadtPassb()" height="15" width="15"> ';
}
else
{
$errors[] = 'Password not Matching.';
echo '<img src="images/block.jpg" alt="Password not Matching." title="Password not Matching." onload="loadPassb()" height="15" width="15"> ';
}
}
//////////***************************************Search Processes
if($_GET['msg'] == 'search')
{
$dist = $_GET['dist'];
$city = $_GET['city'];
$cat  = $_GET['cat'];
$type = $_GET['type'];
$clen = strlen($city);
$ctlen= strlen($cat);
$cty  = substr($city,-$clen,2);//first two letter 
if(!empty($cat))
{
$cate = substr($cat,-$ctlen,2);
}
else
{
	$cate = '%a';
}
if(is_numeric($_GET['begin']))
{
$page = $_GET['begin'];
}
else
{
$page = 1;
}
$end  = 24;
$rest = mysql_query("SELECT * FROM property WHERE district='$dist'  AND city LIKE '$cty%' AND type='$type' AND category LIKE '$cate%' AND publish='Y'");
$count = mysql_num_rows($rest);
$total = ceil($count/$end);
if($page == 1)
{
	$begin = 0;
}
else
{
	$begin = ($page-1)*$end;
}
echo ' <h1 class="title">Your Search Results </h1>';
$sql = "SELECT * FROM property WHERE district='$dist'  AND city LIKE '$cty%' AND type='$type' AND category LIKE '$cate%' AND publish='Y' ORDER BY id ASC LIMIT $begin,$end";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) == 0)
{
echo "There are no Results";
}
//".$city.$cat.$type ;
?>
<table width="600px" cellpadding="2" id="setabid" >
<tr>
<?php
$c = 0;
while($row = mysql_fetch_array($result))
  { 
  	$string = substr($row['area'].' @ '.$row['city'],0,25).'...';
  if(($c%4) == 0)
  {
 echo'
 </tr><tr> <td width="125px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
  <div align="center" style="height:110px"><a href="javascript: window.parent.showDialog('.$row['id'].')"><img src="upload/'.$row["image"].'" alt="" padding-top="10px" height="100" width="125"/></a></div>
 <div align="center" style="padding-top:0px;height:25px">'.$string.'</div>
  </td>
  ';
  }
  else
  {
echo '   <td width="125px" style="height:150px; border:solid 0px #FF0000; margin:2px;padding-top:10px"> 
  <div align="center" style="height:110px"><a href="javascript: window.parent.showDialog('.$row['id'].')"><img src="upload/'.$row["image"].'" alt="" padding-top="10px" height="100" width="125"/></a></div>
 <div align="center" style="padding-top:0px;height:25px">'.$string.'</div>
    </td>';  
  }
  $c++;  
  }
  ?>
  </tr>
  <tr><td colspan="4" align="center" style="background-color: #067537"> 
  <?php 
 if($total > 1)
 {
 	for($i=1;$i<$total+1;$i++)
 	{
 		if($page == $i)
 		{
 	    echo '<a id="begin" style="padding:0px 3px;color:red;pointer-events:none;cursor:default" href="javascript:validateBegin('.($i).')">'.($i).'</a>';
 		}
 		else 
 		{
 		echo '<a id="begin" style="padding:0px 3px;color:white" href="javascript:validateBegin('.($i).')">'.($i).'</a>';
 		}
 	}
 	
 }
  ?>
  </td></tr>
  </table>
    <?php
}
if($_GET['msg'] == 'advert')
{
$id = $_GET['num'];
$sql = "SELECT * FROM property WHERE id='$id' AND publish='Y' ";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{
while($row = mysql_fetch_array($result))
{
$ad_id			=$row['id'];
$description	=$row['description'];
$caption		=$row['caption'];
$image			=$row['image'];
$district		=$row['district'];
$city 			=$row['city'];	
$type           =$row['category'];
$status			=$row['status'];
$price			=$row['amount'];
$area			=$row['area'];
$typ			=$row['type'];
/////////paid ads
$location		=$row['place'];
$landmark		=$row['landmark'];
$ownerid		=$row['informed_id'];
}
}
if(is_numeric($ownerid)){
///////////////change these as soon as necessary
$sql = "SELECT * FROM register WHERE Id=".$ownerid;
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{
while($row = mysql_fetch_array($result))
{
$name		= $row['name'];
$mobile		= $row['mobile'];
$landline	= $row['landline'];
}
}
}
echo '
<table>
<tr>
<td style="width:510px">
<img src="upload/'.$image.'" alt="" padding-top="10" height="400" width="500"/>  
</td>
<td>
<table align="center">
<tr><td colspan="2" align="center"><font  color="#CC3333"><b>Property For '.$typ.'</b></font></td></tr>
<tr><td></td></tr>
<tr><td align="center"><font  color="#000000"><b>Ad Id</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$ad_id.' </b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>District</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$district.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Nearest Town</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$city.'</b></font></td></tr><!--
<tr><td align="center"><font  color="#000000"><b>Place</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$location.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Landmark</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$landmark.'</b></font></td></tr>-->
<tr><td align="center"><font  color="#000000"><b>Type</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$type.' </b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Area</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$area.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Price</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$price.'</b></font></td></tr>';
if($status == 'paid'){echo'
<tr><td align="center"><font  color="#000000"><b>Contact</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$name.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Mobile</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$mobile.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>LandLine</b></font></td>

<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$landline.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Description</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$description.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Features</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#0099FF"><b>'.$caption.'</b></font></td></tr>
</table>
</td>
</tr>
</table>';}
else
{
 echo '
 </table>
</td>
</tr>
</table><div align="right" style="font-weight:bold;color:blue;">
<a href="template.php?catid=login&number='.$ad_id.' ">More Details</a>
</div>  ';
}
/*echo '
</table>
</td>
</tr>
</table>
';*/
/*
if($status == 'unpaid')
{
echo '
<table>
<tr>
<td style="width:510px">
<img src="upload/'.$image.'" alt="" padding-top="10" height="400" width="500"/>  
</td>
<td>
<table>
<tr><td colspan="2" align="center"><font  color="#CC3333"><b>Property For '.$typ.'</b></font></td></tr>
<tr><td></td></tr>
<tr><td align="center"><font  color="#000000"><b>Ad Id</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$ad_id.' </b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>District</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$district.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Nearest Town</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$city.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Type</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$type.' </b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Price</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$price.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Area</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$area.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Contact Person</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$area.'</b></font></td></tr>
<tr><td align="center"><font  color="#000000"><b>Mobile</b></font></td>
<td align="center" style="padding-left:5px;border-left:1px dotted black " ><font color="#660033"><b>'.$area.'</b></font></td></tr>
</table>
</td>
</tr>
</table>
<div align="right">
<a href="template.php?catid=login&number='.$ad_id.' ">More Details</a>
</div>
';
}*/
}

if($_GET['msg'] == 'change')
{
$pass = $_GET['q'];
$user = $_GET['p'];
$sql="SELECT * FROM register WHERE Id='".$user."'";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0 ) 
{
while($row = mysql_fetch_array($result))
{
$pa = $row['password'];
}
}
if($pa == $pass)
{
echo '<img src="images/ahead.png" onload="paStatus()" alt="" height="15" width="15"> ';
}
else
{
echo '<img src="images/block.jpg" alt="Old Password Not Matching." onload="pcStatus()" title="Old Password Not Matching." height="15" width="15"> ';
}
}
if(isset($_POST['changepass']))
{
$pass = $_POST['passc'];
$user = $_POST['userid'];
$sql = 	"UPDATE register SET password='".$pass."' WHERE Id =".$user;
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
header("Location:../template.php?cat=inception&sms=show&msgs=Password Changed Successfully!");
}
if(isset($_POST['additional']))
{
$nick    = $_POST['name'];
$place	 = $_POST['place'];
$address = $_POST['address'];
$id      = $_POST['id'];
$sql = 	"UPDATE register SET nickname='$nick',place='$place',address='$address' WHERE Id =".$id;
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
header("Location:../template.php?cat=inception&sms=show&msgs=Details Added Successfully!");
}
if($_GET['msg'] == 'upload')
{
?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="get"  enctype="multipart/form-data" name="formone" id="formone">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td><strong>Single File Upload </strong>
<input type="text" name="uploadphoto" value="yes"/>
</td>
</tr>
<tr>
<td>Select file
<input name="ufile" type="file" id="ufile" size="50"  /></td>
<input type="hidden" name="uploadphoto" value="yes"/>
</tr></form>
<tr>
<td align="center"><a href="#" onclick="document.formone.submit()">Upload</a></td>
</tr>
</table>
</td>
</tr>
</table> 
<?php
}
if($_GET['msg'] == 'updatephoto')
{
//$add = $_GET['addr'];
echo "Success";
}
if($_GET['msg'] == 'showmail')
{
$q = $_GET["q"];	 
if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9\._-]+)+$/",$q))
{
echo '<input type="hidden" id="mai" value="123456"/>';
}
else
{
echo '<input type="hidden" id="mai" value=""/>';
}
}
if($_GET['msg'] == 'checkdate')
{
$month  = $_GET['m'];
$day	= $_GET['d'];
$year	= $_GET['y'];
if(!empty($month) && !empty($day))
{
if (checkdate($month,$day,$year)) 
 {
 echo '<input type="hidden" id="din" value="123456"/>';
  echo '<input type="hidden" name="payday" id="payday" value="'.$day.'/'.$month.'/'.$year.'"/>';
 }
 else
 {
 echo '<input type="hidden" id="din" value=""/>';
  }
  }
else
{
echo '<input type="hidden" id="din" value=""/>';
}
}
if($_GET['msg'] == 'status')
{
$k = $_GET['q'];
$status = 'deleted';
$sql = 	"UPDATE payment SET status='$status' WHERE Id =".$k;
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
echo '<font color="green">Order Deleted</font>
<img src="images/ahead.png" onload="fresh()" alt="" height="15" width="15"> ';
}
if($_GET['msg'] == 'passmail')
{
$mailid = $_GET['q'];
if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+$/",$mailid))
{
echo "Enter Valid email ID";
}
else
{
$sql="SELECT * FROM register WHERE email='$mailid' ";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{
echo '<input type="button" onclick="sentPass()" name="mailbut" value="Submit" />';
}
else
{
echo 'Enter Registered EmailId';
}
}
}
if($_GET['msg'] == 'mailsent')
{
$mid = $_GET['q'];
$sql = 	"SELECT password FROM register WHERE email='$mid'";
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
if(mysql_num_rows($result)>0)
{
while($row = mysql_fetch_array($result))
{
$pass = $row['password'];
}
}
//send mail
$to=$mid;
$subject="Password Information";
$message="
			<table><tr><td>	Your Current Password is: </td><td>$pass</td></tr>
				
			<tr><td>	Login to </td><td>
					
					http://realspot.in/</td></tr>
					</table>
";

$from="response@realspot.in";
$headers="from:".$from."\r\n";
$headers .= "Reply-To: realspot.in@gmail.com\r\n";
$headers  .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html";

mail($to,$subject,$message,$headers);
echo "An email sent to your emailid with the details of password";
}
?> 
