<?php
session_start();
if($_SESSION['userid'] <= 0)
{
header('Location:login.php');

}
else
{




?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Details <?php echo $_SESSION['userid']  ?></title>
<style type="text/css"> 
<!-- 
body  {
	font: 100% Verdana, Arial, Helvetica, sans-serif;
	background: #000000;
	margin: 0; /* it's good practice to zero the margin and padding of the body element to account for differing browser defaults */
	padding: 0;
	text-align: center; /* this centers the container in IE 5* browsers. The text is then set to the left aligned default in the #container selector */
	color: #000000;
}

/* Tips for Elastic layouts 
1. Since the elastic layouts overall sizing is based on the user's default fonts size, they are more unpredictable. Used correctly, they are also more accessible for those that need larger fonts size since the line length remains proportionate.
2. Sizing of divs in this layout are based on the 100% font size in the body element. If you decrease the text size overall by using a font-size: 80% on the body element or the #container, remember that the entire layout will downsize proportionately. You may want to increase the widths of the various divs to compensate for this.
3. If font sizing is changed in differing amounts on each div instead of on the overall design (ie: #sidebar1 is given a 70% font size and #mainContent is given an 85% font size), this will proportionately change each of the divs overall size. You may want to adjust these divs based on your final font sizing.
*/
.twoColElsRt #container { 
	width: 46em;  /* this width will create a container that will fit in an 800px browser window if text is left at browser default font sizes */
	background: #CCCC99;
	margin: 0 auto; /* the auto margins (in conjunction with a width) center the page */
	border: 1px solid #000000;
	text-align: left; /* this overrides the text-align: center on the body element. */
} 

/* Tips for sidebar1:
1. Be aware that if you set a font-size value on this div, the overall width of the div will be adjusted accordingly.
2. Since we are working in ems, it's best not to use padding on the sidebar itself. It will be added to the width for standards compliant browsers creating an unknown actual width. 
3. Space between the side of the div and the elements within it can be created by placing a left and right margin on those elements as seen in the ".twoColElsRt #sidebar1 p" rule.
*/
.twoColElsRt #sidebar1 {
	float: right; 
	width: 12em; /* since this element is floated, a width must be given */
	height:inherit;
	background:#FFFFFF; /* the background color will be displayed for the length of the content in the column, but no further */
	padding: 15px 0; /* top and bottom padding create visual space within this div */
}
.twoColElsRt #sidebar1 h3, .twoColElsRt #sidebar1 p {
	margin-left: 10px; /* the left and right margin should be given to every element that will be placed in the side columns */
	margin-right: 10px;
}

/* Tips for mainContent:
1. If you give this #mainContent div a font-size value different than the #sidebar1 div, the margins of the #mainContent div will be based on its font-size and the width of the #sidebar1 div will be based on its font-size. You may wish to adjust the values of these divs.
2. The space between the mainContent and sidebar1 is created with the left margin on the mainContent div.  No matter how much content the sidebar1 div contains, the column space will remain. You can remove this left margin if you want the #mainContent div's text to fill the #sidebar1 space when the content in #sidebar1 ends.
3. To avoid float drop, you may need to test to determine the approximate maximum image/element size since this layout is based on the user's font sizing combined with the values you set. However, if the user has their browser font size set lower than normal, less space will be available in the #mainContent div than you may see on testing.
4. In the Internet Explorer Conditional Comment below, the zoom property is used to give the mainContent "hasLayout." This avoids several IE-specific bugs that may occur.
*/
.twoColElsRt #mainContent {
    color:#660000;
	margin: 0 13em 0 1.5em; /* the left margin can be given in ems or pixels. It creates the space down the left side of the page. */
}  

/* Miscellaneous classes for reuse */
.fltrt { /* this class can be used to float an element right in your page. The floated element must precede the element it should be next to on the page. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* this class can be used to float an element left in your page */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* this class should be placed on a div or break element and should be the final element before the close of a container that should fully contain a float */
	clear:both;
    height:0;
    font-size: 1px;
    line-height: 0px;
}
.select{
width:215px;
height:23px;
	
}
.selectm{
width:100px;
height:23px;
	
}
.tb8 {
	width: 210px;
	height:20px;
	
}
.ta8 {
	width: 210px;
	height:60px;
	
}

--> 
</style><!--[if IE]>
<style type="text/css"> 
/* place css fixes for all versions of IE in this conditional comment */
.twoColElsRt #sidebar1 { padding-top: 30px; }
.twoColElsRt #mainContent { zoom: 1; padding-top: 15px; }
/* the above proprietary zoom property gives IE the hasLayout it needs to avoid several bugs */
</style>
<![endif]-->
<script type="text/javascript">




function showpropChange(str)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("propcity").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","../include/searchdata.php?msg=search&dist="+str,true);
xmlhttp.send();
}




var district = [
				"Thrissur",
				"Thiruvananthapuram",
				"Kollam",
				"Pathanamthitta",
				"Kottayam", 
				"Alappuzha",
				"Idukki",
				"Ernakulam",
				"Palakkad",
				"Malappuram",
				"Kozhikode",
				"Wayanad",
				"Kannur",
				"Kasargod"
			   ]; 
 
   var category = [
					
					"Independent House/Villa ", 
					"Flat/Apartment/Villa ",
					"Agricultural Land/Plantation ",
					"Commercial Building ", 
					"Quarry/Factory ", 
					"Office Space/Shop/Godown ",
					"Agricultural Land/Farm House ",
					"Hotel/Resorts ", 
					"Commercial/Residential plot "
 				 ];

</script>

</head>

<body class="twoColElsRt" >

<div id="container">
<div id="sidebar1">

<a href="logout.php">Logout</a>
<h3>Details to Follow</h3>
<!-- end #sidebar1 --></div>
<div id="mainContent">

<h3 align="center" style="color:#FF0000"> Details Here!</h3><br />
<div align="left"> 

<form  action="dataprocess.php" method="post" name="dataentry" enctype="multipart/form-data">

<table><tr><td >
<tr><td width="30%" style="padding-bottom:20px">
<font color="blue" size="3"><b><strong>
Personal Details
</strong></b></font><hr/>
</td><td></td></tr>
<tr><td >
I am:
</td><td >
<select class="select" name="detype" id="type" >
<option  value="">--Select--</option>
<option  value="Seller">Seller</option>
<option  value="Buyer">Buyer</option>
<option  value="Agent">Agent</option>
</select></td>
</tr>

<tr><td >
Name: 
</td><td >
<input name="dename" class="tb8" type="text" size="30" maxlength="30"
 id="name"/></td>
</tr>

<tr><td >
Mobile:
</td><td >
<input name="demobile" type="text" size="30" maxlength="12" id="mobile" class="tb8" /></td>
</tr>

<tr><td >  
Any LandLine :
</td><td >
<input type="text" name="dephone" size="30" id="landline" class="tb8" /></td>
</tr>
<tr><td >Contact Address:</td><td>  <textarea class="ta8" name="deaddress"  cols="23" rows="3"></textarea><td  id="msg"></td></tr>
 

<tr><td >
E-mail: 
</td><td ><input name="deemail"type="text" class="tb8" size="30" maxlength="60"
id="mail" /></td>
</tr>


<tr><td >
Password:
 </td><td ><input name="depassa" class="tb8" type="hidden" size="30" maxlength="30" id="passa"/></td>
 </tr>
 
<tr><td >
Confirm Password: 
</td><td ><input name="depassb" class="tb8" type="hidden" size="30" maxlength="30" id="passb" 
 /></td>
</tr>

<tr><td >
<tr><td width="30%" style="padding-bottom:20px">
<font color="blue" size="3"><b><strong>
Property Details</strong></b></font><hr/>
</td><td></td></tr>
 <tr><td >District:</td><td>
   
<select class="select"  name="depropdist" id="propdist" onchange="showpropChange(this.value)" >
<option name="" value="--Select--">--Select--</option>
<script type="text/javascript">
for(var i=0;i<district.length;i++)
{
document.write('<option value=\"'+district[i]+'\">'+ district[i]+'</option>');
}
</script>
</select>
 
 <td  id="msg"></td></tr> 
 <tr><td >Near to: </td><td>
 
 
<select class="select"  name="depropcity" id="propcity">
<option name="" id="new"  value="--Select--">Select Location</option>
</select>

  <td  id="msg"></td></tr>
 <tr><td >Place:</td><td> <input class="tb8" name="depropplace" type="text" size="30" maxlength="30" /><td  id="msg"></td></tr>
 <tr><td >Landmark:</td><td> <input class="tb8" name="delandmark" type="text" size="30" maxlength="30" /><td  id="msg"></td></tr>
 <tr><td >Area:</td>
 <td> 
 <input class="tb8" id="cap" name="deproparea" type="text" size="30" maxlength="30" /></td><td>
 <select class="selectm" id="caps" name="areameasure" >
<option name="" value="">--Select--</option>
<option name="" value="sqft">sqft</option>
<option name="" value="cents">cents</option>
<option name="" value="acres">acres</option>
</select>
 
 
 
 
   </td></tr>
 <tr><td>Category:</td><td>
 <select class="select"  name="depropcat" id="propcat" onchange="showcatChange(this.value)" >
<option name="" value="--Select--">Category</option>
<script type="text/javascript">
category.sort();
for(var i=0;i<category.length;i++)
{
	var k = category[i];
	var n=k.replace(" ","_");
document.write('<option value='+n+'>'+ category[i]+'</option>');
}

function change(str)
{

var ks = document.getElementById("division").value;
if(ks == "Rent")
{

var mn = '<select class=\"select\" name=\"depropprice\"><option value=\"Upto 5000\">Upto 5000</option><option value=\"5000-10000\">5000\-10000</option><option value=\"10000-25000\">10000\-25000</option><option value=\"25000-50000\">25000\-50000</option><option value=\"50000-1 Lakh\">50000\-1 Lakh</option><option value=\"1 Lakh-2 Lakhs\">1 Lakh\-2 Lakhs</option><option value=\"2 Lakhs-3 Lakhs\">2 Lakhs\-3 Lakhs</option><option value=\"3 Lakhs-5 Lakhs\">3 Lakhs\-5 Lakhs</option><option value=\"5 Lakhs-10 Lakhs\">5 Lakhs\-10 Lakhs</option><option value=\"10 Lakhs-15 Lakhs\">10 Lakhs\-15 Lakhs</option><option value=\"15 Lakhs-25 Lakhs\">15 Lakhs\-25 Lakhs</option><option value=\"25 Lakhs-50 Lakhs\">25 Lakhs\-50 Lakhs</option><option value=\"50 Lakhs  Above\">50 Lakhs  Above</option></select>';

}
else
{
mn='<input class="tb8" name="depropprice" type="text" size="30" maxlength="30" />';
}





document.getElementById("vision").innerHTML=mn;



}


</script>
</select>
    <td  id="msg"></td></tr>
 
 <tr><td >Type:</td><td>  
 
<select class="select" name="deproptype"  id="division" onchange="change(this.value)">
<option name="" value="">--Select--</option>
<option name="" value="Sale">Sale</option>
<option name=""  value="Rent">Rent/Lease/Pledge</option></select>
<td  id="msg"></td></tr> 

 <tr><td >Price <img width="10" height="12" style="vertical-align: baseline" src="../images/rupees.png" alt="INR">:
 </td><td  id="vision">   <input class="tb8" name="depropprice" type="text" size="30" maxlength="30" /><td ></td></tr>
 <tr><td >Decription:</td><td>  <textarea class="ta8" name="dedescription"  cols="23" rows="3"></textarea><td  id="msg"></td></tr>
 <tr><td >Caption:</td><td>  <textarea class="ta8" name="decaption" cols="23" rows="3"></textarea><td  id="msg"></td></tr>
 <tr><td >Remarks:</td><td>  <textarea class="ta8" name="deremarks" cols="23" rows="3"></textarea><td  id="msg"></td></tr>
 <tr><td >Image:</td><td>  <input name="image" type="file"   /><td  id="msg"></td></tr>
 
 
 <tr>
 <td></td>
 <td align="center" rowspan="10" valign="middle" style="padding-top:10px" >
  
   
     <input type="submit" class="fb5" name="deaccept" value="Add Details"/>
     <input type="hidden" name="deipaddress" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>"/> 
     <input type="hidden" name="userid" value="<?php echo $_SESSION['userid'] ?>"/> 
      </td></tr>  

</table>









</form>
  
	<!-- end #mainContent --></div>
	<!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats --><br class="clearfloat" />
<!-- end #container --></div>
</body>
</html>
<?php


}

?>