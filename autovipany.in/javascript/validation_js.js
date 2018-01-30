/*

var error=new Array(); 
error[0] = 'false';
error[1] = 'false';
error[2] = 'false';
error[3] = 'false';
error[4] = 'false';
error[5] = 'false';
error[6] = 'false';
error[7] = 'false';
function loadEmail()
{
document.getElementById("warning").innerHTML = "<font color=red>Enter Valid email ID.</font>";
error[0] = 'true';

}

function loadEuse()
{
document.getElementById("warning").innerHTML = "<font color=red>Email ID already in Use.</font>";
error[0] = 'true';
				}

function loadtEuse()
{
	error[0] = 'false';
error[1] = 'false';
document.getElementById("warning").innerHTML = "";

}
function loadType()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Select the Type.</font>";
error[2] = 'true';
				}

function loadtType()
{
	error[2] = 'false';
document.getElementById("warning").innerHTML = "";
}

				function loadMobile()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Enter Valid Mobile Number.</font>";
error[3] = 'true';
				}

function loadtMobile()
{
	error[3] = 'false';
document.getElementById("warning").innerHTML = "";

}

				function loadPhone()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Enter Valid LandLine Number.</font>";
error[4] = 'true';
				}

function loadtPhone()
{
	error[4] = 'false';
document.getElementById("warning").innerHTML = "";
}

				function loadName()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Enter a Valid Name.</font>";
error[5] = 'true';
				}

function loadtName()
{
	error[5] = 'false';
document.getElementById("warning").innerHTML = "";
}

function validateForm()
{
if(error[0] == 'false' && error[1] == 'false' &&  error[2] == 'false' &&  error[3] == 'false' && 
error[4] == 'false' &&  error[5] == 'false' )
{
return true;
}
else
{
alert("Please fill up Correctly!");
return false;
}

}

function propArea(str)
{
var d = document.getElementById("unit").value;
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

					"Independent House/Villa", 
"Flat/Apartment/Villa",
"Agricultural Land/Plantation",
"Commercial Building", 
"Quarry/Factory", 
"Office Space/Shop/Godown",
"Agricultural Land/Farm House",
"Hotel/Resorts", 
"Commercial/Residential plot"
 				 ];
	function numberShow()
	{
var k =  document.getElementById("userid").value;		
document.getElementById("warnings").innerHTML=k;
}

function showmenu(elmnt)
{
document.getElementById(elmnt).style.visibility="visible";
}
function hidemenu(elmnt)
{
document.getElementById(elmnt).style.visibility="hidden";
}

var error=new Array(); 
error[0] = 'subin';
error[1] = 'subin';
error[2] = 'subin';
error[3] = 'subin';
error[4] = 'subin';
error[5] = 'subin';
error[6] = 'subin';
error[7] = 'subin';

function loadEmail()
{
document.getElementById("warning").innerHTML = "<font color=red>Enter Valid email ID.</font>";
error[0] = 'true';

}

function loadEuse()
{
document.getElementById("warning").innerHTML = "<font color=red>Email ID already in Use.</font>";
error[0] = 'true';
				}

function loadtEuse()
{
	error[0] = 'false';
error[1] = 'false';
document.getElementById("warning").innerHTML = "";

}

				function loadType()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Select the Type.</font>";
error[2] = 'true';
				}

function loadtType()
{
	error[2] = 'false';
document.getElementById("warning").innerHTML = "";
}

				function loadMobile()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Enter Valid Mobile Number.</font>";
error[3] = 'true';
				}

function loadtMobile()
{
	error[3] = 'false';
document.getElementById("warning").innerHTML = "";

}

				function loadPhone()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Enter Valid LandLine Number.</font>";
error[4] = 'true';
				}

function loadtPhone()
{
	error[4] = 'false';
document.getElementById("warning").innerHTML = "";
}

				function loadName()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Enter a Valid Name.</font>";
error[5] = 'true';
				}

function loadtName()
{
	error[5] = 'false';
document.getElementById("warning").innerHTML = "";
}

				function loadPassa()
				{
				document.getElementById("warning").innerHTML = "<font color=red>Password not Matching.</font>";
error[6] = 'true';
}

function loadPassb()
{
document.getElementById("warning").innerHTML = "<font color=red>Password not Matching.</font>";
error[7] = 'true';
				}

function loadtPassa()
{

document.getElementById("warning").innerHTML = "<font color=green>Password  Matching.</font>";	
error[6] = 'false';
error[7] = 'false';
}



var error=new Array(); 
error[0] = 'subin';

function paStatus()
				{
			
				error[0] = 'true';
				}

function pcStatus()
{
	error[0] = 'false';

}

	function passCheck()
	{
	var pa = document.getElementById("passb").value;
var pb = document.getElementById("passc").value;
if( pa == "" || pa == null  ||  pb == ""  ||  pb == null )
{
alert ("Enter Valid Password!");
return false;

}

if(pa == pb && error[0] == 'true')
{

return true;
}
else
{
alert("Password Not Matching!");
return false;
}

}
function newWin(k)
{
window.open('./include/ordershow.php?or='+k,'_blank','width=500,height=500,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');

		}
		

		function fresh()
		{

		  location.reload();

		}
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
function validateLog()
{

var user = document.getElementById("username").value;
user=user.replace(/(^\s+)(\s+$)/, "");

if(user == null || user == "" || user == " ")
{
 alert("Username must be filled out");
  return false;

}

}
function newWindow()
{
window.open('forpass.php','_blank','width=500,height=200,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');
}





function validateLogin()
{

var user = document.getElementById("usernames").value;
user=user.replace(/(^\s+)(\s+$)/, "");
 
if(user == null || user == "" || user == " ")
{
 alert("Username must be filled out");
  return false;

}
}
function newWindows()

{
window.open('forpass.php','_blank','width=500,height=200,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');

}

 * 
 * functions from property accept.php/
 * 
 * 
 





function propArea(str)
{
var d = document.getElementById("unit").value;
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
  };
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
mn='<input class="textbox" name="propprice" id="propprice" onchange="propPrice(this.value)"  type="text" size="30"  maxlength="30" />';
}





document.getElementById("vision").innerHTML=mn;



}




				for(var i=0;i<district.length;i++)
				{
				document.write('<option value=\"'+district[i]+'\">'+ district[i]+'</option>');
				}

*/
/*
 * ###############################################################################
 * ###############################################################################
 * NEW FUNCTIONS AND VARIBLES
 * ###############################################################################
 * ###############################################################################
 */
function loadAJAX()
{
if (window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
return xmlhttp;
}
function allLetters(ipt,idv,lh)
{
  var letters = /^[A-Za-z \.]+$/;
  var k = ipt.replace(/\s+/g,'');
  var sms = idv+'r';
  if(ipt.match(letters) && k.length>=lh)
  {
  var rpl = 'truth';
  document.getElementById(sms).value=rpl;
  document.getElementById("warning").innerHTML='';
  return true;
  }
  else
  {
  var msg = 'Enter  Valid String...';
  var rpl = 'wrong';
  document.getElementById(sms).value=rpl;
  document.getElementById("warning").innerHTML=msg;
	  document.getElementById(idv).focus();
      return false;
   }
}
function allNumbers(ipt,idv,lh)
{
	
var numbers = /^[+]?[0-9 ]+$/;
var k = ipt.replace(/\s+/g,'');
if(ipt.match(numbers) && k.length>=lh)
{
  var sms = idv+'r';
  var img = idv+'p';
  var rpl = 'truth';
  document.getElementById(sms).value=rpl;
  document.getElementById("warning").innerHTML='';
		  return true;
}
else
{
  var msg = 'Enter  Valid Number...';
  var sms = idv+'r';
  var img = idv+'p';
  var rpl = 'wrong';
  document.getElementById(sms).value=rpl;
  document.getElementById("warning").innerHTML=msg;
  document.getElementById(idv).focus();
  return false;
	}

}
function alphanumeric(ipt,idv,lh)
{

var letters = /^[0-9a-zA-Z\.,s ]|[\\r?\n|\r]+$/;
var k = ipt.replace(/\s+/g,'');
if(ipt.match(letters) && k.length>=lh)
{
  var sms = idv+'r';
  var img = idv+'p';
  var rpl = 'truth';
  document.getElementById(sms).value=rpl;
  document.getElementById("warning").innerHTML='';
      return true;
}
else
{
  var msg = 'Enter Valid Details...';
  var sms = idv+'r';
  var img = idv+'p';
  var rpl = 'wrong';
  document.getElementById(sms).value=rpl;
  document.getElementById("warning").innerHTML=msg;
	  document.getElementById(idv).focus();
	  return false;
	}

}
function chkEmail(ipt,idv)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var tep='h';
if(ipt.match(mailformat))
{

	loadAJAX().onreadystatechange=function()
	{
	if(xmlhttp.readyState<4)
	{

		try {
			
		} catch (e) {
			// TODO: handle exception
		}
	}
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	{
	tep=xmlhttp.responseText;
	if(tep=='N')
	{
		var sms = idv+'r';
		var img = idv+'p';
	    var rpl = 'truth';
	    document.getElementById(sms).value=rpl;
	    document.getElementById("warning").innerHTML='';
	    return true;
	}
	else
	{
		var msg = 'Email Address already used...';
		var sms = idv+'r';
		var img = idv+'p';
	    var rpl = 'wrong';
	    document.getElementById(sms).value=rpl;
		document.getElementById("warning").innerHTML=msg;
		
		return false;
	}
	}
	};
	xmlhttp.open("GET","./include/validation.php?msg=checkmail&num="+ipt,true);
	xmlhttp.send();
	
}
else
{
		var msg = 'Enter Valid Email ID...';
		var sms = idv+'r';
		var img = idv+'p';
	    var rpl = 'wrong';
	    document.getElementById(sms).value=rpl;
		document.getElementById("warning").innerHTML=msg;
		
		return false;
}
}
function chkPassword(one,two)
{
	var pwd = document.getElementById(one).value;
	var cwd = document.getElementById(two).value;
	if(pwd == cwd && pwd.length>=6)
	{
		    var rpl = 'truth';
		    document.getElementById(two+"r").value=rpl;
		    document.getElementById(one+"r").value=rpl;
		    document.getElementById("warning").innerHTML='';
		    return true;
	}
	else
	{
		var msg = 'Enter same Password &amp;  length greater than 6...';
		var rpl = 'wrong';
	    document.getElementById(two+"r").value=rpl;
	    document.getElementById(one+"r").value=rpl;
		document.getElementById("warning").innerHTML=msg;
		return false;
	}
}
function shower(kl)
{
var m = document.getElementById(kl);
return m;
}
function validateForm()
{
	var flag=0;
	var identiFier = ["type","name","mobile","landline","mail","passb","passa"];
	for(var i=0;i<identiFier.length;i++)
	{
		if(shower(identiFier[i]+"r").value!='truth')
		{
			shower(identiFier[i]).style.border='1px solid #FF3C52';
			shower(identiFier[i]).style.borderLeft='4px solid #FF3C52';
			flag++;
		}
		else
		{
			shower(identiFier[i]).style.border='1px solid #209CDC';
			shower(identiFier[i]).style.borderLeft='4px solid #209CDC';
		}
	}
	if(flag>0){alert("Please Check the field...!");return false;}
	
}
function populateEverySelect(sbn)
{
		loadAJAX().onreadystatechange = function() {
			if (xmlhttp.readyState < 4) {
				document.getElementById("guard").style.display = 'block';
			}
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("brand").innerHTML = xmlhttp.responseText;
				populateEveryYear(sbn);
			}
		};
		xmlhttp.open("GET", "./include/validation.php?msg=populate&key="+sbn, true);
		xmlhttp.send();
}
function populateEveryYear(sbn)
{
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("year").innerHTML = xmlhttp.responseText;
			populateEveryColor(sbn);
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=populaty&key="+sbn, true);
	xmlhttp.send();
}
function populateEveryColor(sbn)
{
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("color").innerHTML = xmlhttp.responseText;
			populateEveryFuel(sbn);
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=populatc&key="+sbn, true);
	xmlhttp.send();
}
function populateEveryFuel(sbn)
{
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("guard").style.display = 'none';
			document.getElementById("fuel").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=populatf&key="+sbn, true);
	xmlhttp.send();
}
function populateEverySelectSearch(sbn)
{
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("guard").style.display = 'block';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("guard").style.display = 'none';
			document.getElementById("searchbrand").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=populate&key="+sbn, true);
	xmlhttp.send();
}
function keepSearching(begin,page)
{
	
	try{
	var c = this.document.forms["search"]["categorysearch"].value;
	var b = this.document.forms["search"]["brand"].value;
	var n = this.document.forms["search"]["paymin"].value;
	var x = this.document.forms["search"]["paymax"].value;
	begin=null?begin=0:begin;
	end=null?end=25:end;
	}
	catch(err){}
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("homefill").style.display='none';
			document.getElementById("homefilled").style.display='none';
			document.getElementById("guard").style.display = 'block';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("guard").style.display = 'none';
			document.getElementById("search").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=searchrf&type="+c+"&brand="+b+"&min="+n+"&max="+x+"&begin="+begin+"&pg="+page, true);
	xmlhttp.send();
}
function isNumberKey(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode;
   if (charCode != 46 && charCode > 31 
     && (charCode < 48 || charCode > 57))
      return false;

   return true;
}
function newWindows()
{
window.open('forpass.php','_blank','width=500,height=200,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');
}
function throwExceptionasAlert()
{
	alert("Try Again");
}
function showText()
{
document.getElementById("text").style.visibility="visible";
}
function hideText()
{
document.getElementById("text").style.visibility="hidden";
}