<script type="text/javascript">
var begin;
function validateBegin(sbn)
{
	
		begin = sbn;
		validate();
}	
	
function validate()
{

var dist = document.getElementById("dist").value;
var city = document.getElementById("city").value;
var cat  = document.getElementById("cat").value;
var type = document.getElementById("type").value;


if(dist == "--Select--"  ||  type == "--Select--")
{
return false;
}
else
{
searchData(dist,city,cat,type,begin);

}

}


function searchData(dist,city,cat,type,begin)
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
    document.getElementById("search").innerHTML=xmlhttp.responseText;
    document.getElementById("homefill").style.visibility="hidden";
    document.getElementById("homefilled").style.visibility="hidden";
    document.getElementById("setabid").style.position="absolute";
    }
  }
xmlhttp.open("GET","./include/validation.php?msg=search&dist="+dist+"&city="+city+"&cat="+cat+"&type="+type+"&begin="+begin,true);
xmlhttp.send();
}

function showChange(str)
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
    document.getElementById("city").innerHTML=xmlhttp.responseText;
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

	function clearField(sbn)
	{
document.getElementById("sekey").value="";
if(sbn == "search by id")
{

	document.getElementById("sekey").value="";
}
else
{
	document.getElementById("sekey").value=sbn;
}
	}

	function checkField(sbn)
	{
if(sbn == "" || sbn == " " || sbn == null)
{
document.getElementById("sekey").value="search by id"; 
}
	}
	function showResult()
	{
		var k = document.getElementById("sekey").value;
		if(k)
		{
		window.open('../searchresult.php?search=true&key='+k,'_blank','fullscreen=yes');
		return false; 
		}		
	}
	function runScript(e) {
	    if (e.keyCode == 13) {
	    	showResult();
	    	return false;
	    }
	}

	function hidHome()
	{
	document.getElementById("homefill").style.visibility="hidden";
	}
</script>
<div align="center" style="margin: 0 4px">

<table> 
<tr>
<td width="155px" ><input type="text" name="searchkey" value="search by id" onkeypress="return runScript(event)" onfocus="clearField(this.value)" onblur="checkField(this.value)" id="sekey" class="tb8" style="width:150px;border: 1px solid #549008;border-left: 4px solid #549008;border-right: 4px solid #549008;"  size="30"/></td>
<td><input type="button" name="" value="GO" class="fb5" onclick="showResult()"/></td>
<td style="padding:13px;"></td>
<td width="16%">
<select class="tb11" style="height:27px" name="dist" id="dist" onchange="showChange(this.value)" >
<option  value="--Select--">Search</option>
<script type="text/javascript">
for(var i=0;i<district.length;i++)
{
document.write('<option value=\"'+district[i]+'\">'+ district[i]+'</option>');
}
</script>
</select>
</td>

<td width="16%">
<select class="tb11" style="height:27px" name="city" id="city">
<option  id="new"  value="--Select--">Near to</option>
</select>
</td>

<td width="16%">
<select class="tb11" style="height:27px" name="cat" id="cat" onchange="showcatChange(this.value)" >
<option  value="">Category</option>
<script type="text/javascript">
category.sort();
for(var i=0;i<category.length;i++)
{
document.write('<option value=\"'+category[i]+'\">'+ category[i]+'</option>');
}
</script>
</select>
</td>

<td width="16%">
<select class="tb11" style="height:27px" name="type" id="type" onchange="showtypeChange(this.value)" >
<option  value="--Select--">Purpose</option>
<option  value="Sale">Buy</option>
<option  value="Rent">Rent/Lease/Pledge</option>
</select>
</td>

<td width="10%" align="center">
<input type="submit"  onClick="validate()" style="height:27px; width:100px; vertical-align:baseline" class="fb5" value="Search"  name="search"/> </td>

</tr>
</table>

</div>



