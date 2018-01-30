<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">






function propArea(str)
{
var d = document.getElementById("unit").value
if(d == "")
{
document.getElementById("unit").style.background="red";
}
}



function showResult(str)
{
if(str != "")
{

document.getElementById("unit").style.background="green";
}
else
{
document.getElementById("unit").style.background="red";
}


}

function correctForm()
{


var dist      = document.getElementById("propdist").value;
var city      = document.getElementById("propcity").value;
var place     = document.getElementById("propplace").value;
var mark      = document.getElementById("landmark").value;
var area      = document.getElementById("proparea").value;
var cat       = document.getElementById("propcat").value;
var type      = document.getElementById("division").value;
var price     = document.getElementById("propprice").value;
var measure   = document.getElementById("unit").value;

if(dist == null || dist == "" || dist == "--Select--" || dist == "Select Location")
{
dist = 'false';
}
if(city == null || city == "" || city == " Select Location")
{
city = 'false';

}

if(place)
{
for(var indx=0;indx<place.length;indx++)
if(place.toUpperCase().charAt(indx)<'A'||place.toUpperCase().charAt(indx)>'Z' )
if(place.charAt(indx)!=' ')
{

place = 'false';
}
}


if(mark)
{


if(mark.charAt(0)!=' ' )
{
if(mark.length < 5)
{
mark = 'false';
}
}
}

if(isNaN(area))
{
area = 'false';
}
if(cat == null || cat == "" || cat =="--Select--" )
{
cat = 'false';
}
if(type == null || type=="" )
{
type='false';
}

if(measure == null || measure=="")
{
measure='false';
}
if(measure!='false'  && type!='false' && cat != 'false' && area != 'false' &&  mark != 'false' && place != 'false' && 
city != 'false' && dist != 'false' )
{

return true;

}
else
{
alert ("Please Check the Form...!");
return false;
}

}












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
xmlhttp.open("GET","./include/searchdata.php?msg=search&dist="+str,true);
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



function submitForm()
{
document.getElementById("fone").submit();
}







</script>

</head>

<body>
<form name="property" action="./property/property_procees.php" onsubmit="return correctForm()" enctype="multipart/form-data"
 method="post"> 
<table   align="center" width="400px"> 
<caption><h4><font color="#000099" >Add Property Details</font></h4></caption>
 
 
 
<tr><td >District<font color="red">*</font>:</td><td>
<select class="select"  name="propdist" id="propdist" onchange="showpropChange(this.value)" >
<option name="" value="--Select--">--Select--</option>
<script type="text/javascript">
for(var i=0;i<district.length;i++)
{
document.write('<option value=\"'+district[i]+'\">'+ district[i]+'</option>');
}
</script>
</select>
<td  id="msgdist"></td></tr> 


<tr><td >Near to<font color="red">*</font>: </td><td>
<select class="select"  name="propcity" id="propcity">
<option name="" id="new" onchange="propCity(this.value)"  value="">Select Location</option>
</select>
<td  id="msgcity"></td></tr>


<tr><td >Place<font color="red">*</font>:</td><td> <input class="tb8" name="propplace" id="propplace"  onchange="propPlace(this.value)"  type="text" size="30" maxlength="30" /><td  id="msgplace"></td></tr>

<tr><td >Landmark<font color="red">*</font>:</td><td> <input class="tb8" name="landmark" id="landmark" onchange="propMark(this.value)"  type="text" size="30" maxlength="30" /><td  id="msgmark"></td></tr>

<tr><td >Area<font color="red">*</font>:</td>
<td> 
<input class="tb8" id="proparea" name="proparea" type="text" size="30" onfocus="propArea(this.value)" onkeyup="propAreas(this.value)"
 maxlength="30"/></td>
<td id="msge">
<select class="selectm" id="unit" name="areameasure" onchange="showResult(this.value)" >
<option name="" value="">--Select--</option>
<option name="" value=".sqft">sqft</option>
<option name="" value=".cents">cents</option>
<option name="" value=".acres">acres</option>
</select>
</td></tr>
 
 <tr><td>Category<font color="red">*</font>:</td><td>
 <select class="select"  name="propcat" id="propcat" onchange="showcatChange(this.value)" >
<option name="" value="--Select--">Category</option>
<script type="text/javascript">
category.sort();
for(var i=0;i<category.length;i++)
{
document.write('<option value=\"'+category[i]+'\">'+ category[i]+'</option>');
}

function change(str)
{

var ks = document.getElementById("division").value;
if(ks == "Rent")
{

var mn = '<select class=\"select\" name=\"propprice\" id="propprice"><option value=\"Upto 5000\">Upto 5000</option><option value=\"5000-10000\">5000\-10000</option><option value=\"10000-25000\">10000\-25000</option><option value=\"25000-50000\">25000\-50000</option><option value=\"50000-1 Lakh\">50000\-1 Lakh</option><option value=\"1 Lakh-2 Lakhs\">1 Lakh\-2 Lakhs</option><option value=\"2 Lakhs-3 Lakhs\">2 Lakhs\-3 Lakhs</option><option value=\"3 Lakhs-5 Lakhs\">3 Lakhs\-5 Lakhs</option><option value=\"5 Lakhs-10 Lakhs\">5 Lakhs\-10 Lakhs</option><option value=\"10 Lakhs-15 Lakhs\">10 Lakhs\-15 Lakhs</option><option value=\"15 Lakhs-25 Lakhs\">15 Lakhs\-25 Lakhs</option><option value=\"25 Lakhs-50 Lakhs\">25 Lakhs\-50 Lakhs</option><option value=\"50 Lakhs  Above\">50 Lakhs  Above</option></select>';

}
else
{
mn='<input class="tb8" name="propprice" id="propprice" onchange="propPrice(this.value)"  type="text" size="30"  maxlength="30" />';
}





document.getElementById("vision").innerHTML=mn;



}


function showText()
				{
				document.getElementById("text").style.visibility="visible";
				}
				function hideText()
				{
				document.getElementById("text").style.visibility="hidden";
				}


</script>
</select>
    <td  id="msg"></td></tr>
 
 <tr><td >Type<font color="red">*</font>:</td><td>  
 
<select class="select" name="proptype"  id="division" onchange="change(this.value)">
<option name="" value="">--Select--</option>
<option name="" value="Sale">Sale</option>
<option name=""  value="Rent">Rent/Lease/Pledge</option></select>
<td  id="msg"></td></tr> 

<tr><td >Price <font color="red">*</font><img width="10" height="12" style="vertical-align: baseline" src="./images/rupees.png" 
alt="INR">:
</td><td id="vision">   <input class="tb8" name="propprice" id="propprice" onchange="propPrice(this.value)"  type="text" size="30"  maxlength="30" /><td id="msgprice"  ></td></tr>

<tr><td >Decription:</td><td>  <textarea class="ta8" name="description" maxlength="200"  cols="23" rows="3"></textarea></td><td  id="msg"></td></tr>

<tr><td >Caption:</td><td>  <textarea class="ta8" name="caption" maxlength="200" cols="23" rows="3"></textarea></td><td  id="msg"></td></tr>
<tr><td >Remarks:</td><td>  <textarea class="ta8" name="remarks" maxlength="200" cols="23" rows="3"></textarea></td><td id="disphoto"><p style="position:absolute;visibility:hidden"id="text">Change Image  </p>  <img src="./upload/default.jpg" alt="Change Image" onmouseover="showText()" onmouseout="hideText()" height="50" width="50"    onclick="javascript:void window.open('./popup/upimage.php','1348219726554','width=500,height=200,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');return false;"  />
<input type="hidden" name="photo" value="default.jpg" />
</td></tr>



<tr>
<td></td>
<td align="center" rowspan="10" valign="middle">
<input type="submit" class="fb5" name="accept" value="Add to Internet"/>
<input type="hidden" name="ipaddress" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>"/> 
<input type="hidden" name="userid" value="<?php echo $_SESSION['id'] ?>"/> 
</td></tr>  

</table>
</form>


</body>
</html>
