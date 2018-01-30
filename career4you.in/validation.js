//Rough Variables
var temporarykforloadNow=1;
var locationreload;

// reload Script
function relocation()
{
	if(locationreload=='Y')
	{
	this.window.location.reload();	
	}
}

// Rough Script
function forResumeSearch()
{/*window.location=url;*/
var pg = document.getElementById("page").value;
pg++;
url = "index.php?msg=order?page="+pg;
window.location=url;
	
}
function backResumeSearch()
{
	var pg = document.getElementById("page").value;
	if(pg<1)
	{
	pg;	
	}
	else
	{
	pg--;
	}
	url = "index.php?msg=order?page="+pg;
	window.location=url;
}
function forResume()
{/*window.location=url;*/
var pg = document.getElementById("page").value;
pg++;
url = "index.php?msg=apply?page="+pg;
window.location=url;
	
}
function backResume()
{
	var pg = document.getElementById("page").value;
	if(pg<1)
	{
	pg;	
	}
	else
	{
	pg--;
	}
	url = "index.php?msg=apply?page="+pg;
	window.location=url;
}
function forhomeSearch()
{//74,74/12=6.167~7 should have back.
	var pagenum  = document.getElementById("pgnbr").value;
	
	pagenum++;
	
	
	document.getElementById("pgnbr").value=pagenum;
	validateSearch();
}
function backhomeSearch()
{
	var pagenum = document.getElementById("pgnbr").value;
	pagenum--;
	document.getElementById("pgnbr").value=pagenum;
	validateSearch();
}
function clearVar()
{
	document.getElementById("pgnbr").value=1;
}
function forSearch()
{//74,74/12=6.167~7 should have back.
	var pagenum  = document.getElementById("pgnbr").value;
	
	pagenum++;
	
	
	document.getElementById("pgnbr").value=pagenum;
	doSearch();
}
function backSearch()
{
	var pagenum = document.getElementById("pgnbr").value;
	pagenum--;
	document.getElementById("pgnbr").value=pagenum;
	doSearch();
}
function resumeSend(sbn,smn)
{//cid,eid
	var r = confirm("Send the Mail Now...?");
	if(r == true)
	{		hideDialog();
							if (window.XMLHttpRequest)
							{
							xmlhttp=new XMLHttpRequest();
							}
							else
							{
							xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
							}
					xmlhttp.onreadystatechange=function()
					{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
					document.getElementById("result").innerHTML=xmlhttp.responseText;
					}
					};
					xmlhttp.open("GET","./include/validation.php?msg=resumesend&q="+sbn+"&p="+smn,true);
					xmlhttp.send();
	}
	
}
function loadAgain(){window.location.reload();}
function doSearch()
{
	try {
		var pnr = document.getElementById("prnbr").value;
		var pgs = document.getElementById("pgnbr").value;
		var skl = document.getElementById("kword").value;
		var lcn = document.getElementById("loctn").value;
		var ctg = document.getElementById("ctgry").value;
		var xpr = document.getElementById("xprnc").value;
		var tmn = document.getElementById("tmngs").value;
		var mns = document.getElementById("samin").value;
		var mxs = document.getElementById("samax").value;
		var xmlhttp;
	} catch (e) {}
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState==1)
		{
			document.getElementById("indication").style.visibility="visible";
			document.getElementById("two").style.visibility="visible";
			document.getElementById("two").style.background="red";
		}
		
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("two").style.visibility="hidden";
			document.getElementById("indication").style.visibility="hidden";
			document.getElementById("advresult").innerHTML=xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=searchadv&s="+skl+"&l="+lcn+"&c="+ctg+"&e="+xpr+"&t="+tmn+"&sn="+mns+"&sx="+mxs+"&page="+pgs+"&last="+pnr, true);
	xmlhttp.send();
}
function validateSearch()
{
	var pgn = document.getElementById("pgnbr").value;
	var skl = document.getElementById("skill").value;
	var lcn = document.getElementById("locat").value;
	var ctg = document.getElementById("categ").value;
	var xpr = document.getElementById("exper").value;
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState==1)
		{
			document.getElementById("indication").style.visibility="visible";
			document.getElementById("two").style.visibility="visible";
			document.getElementById("two").style.background="red";
		}
		
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("two").style.visibility="hidden";
			document.getElementById("indication").style.visibility="hidden";
			document.getElementById("search").style.display="none";
			document.getElementById("result").innerHTML=xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=check&s="+skl+"&l="+lcn+"&c="+ctg+"&e="+xpr+"&p="+pgn, true);
	xmlhttp.send();
}
function applyNow(sbn,smn)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
	xmlhttp = new XMLHttpRequest();	
	}
	else
	{
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==1)
		{
			hideDialog();
			document.getElementById("apply").innerHTML="";	
			document.getElementById("indication").style.visibility="visible";
			document.getElementById("two").style.visibility="visible";
			document.getElementById("two").style.background="red";
		}
	if(xmlhttp.readyState==4 && xmlhttp.status==200)
	{
	document.getElementById("two").style.visibility="hidden";
	document.getElementById("indication").style.visibility="hidden";
	document.getElementById("apply").innerHTML=xmlhttp.responseText;	
	}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=apply&q="+sbn+"&p="+smn,true);
	xmlhttp.send();
}
function newWin(k)
{
window.open('./include/show_order.php?or='+k,'_blank','width=500,height=500,resizable=0,left=100,top=100');
}
function makeSure(k)
{
var r = confirm("Cancel the Order Now...?");
if(r == true)
{/* alert("do some code"); */
	
						if (window.XMLHttpRequest)
						{
						xmlhttp=new XMLHttpRequest();
						}
						else
						{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				xmlhttp.onreadystatechange=function()
				{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				locationreload=xmlhttp.responseText;
				relocation();
				}
				};
				xmlhttp.open("GET","./include/validation.php?msg=status&q="+k,true);
				xmlhttp.send();
}
}
function submitOrder()
{
 doValidation();
		
		if( paymode !== 'false' && bank !== 'false' && branch !== 'false' && customer !== 'false' &&
			 tariff == 'true' && deposit == 'true' && phone == 'true'  && 
			dateCheck == 'true'  )
{
var r=confirm("Place the Order Now..? ");
if (r==true)
  {
  return true;
  }
else
  {
  return false;
  } 

}
else
{
alert("Error:Please Check the Form Again!");
return false;
}

}




var proid 	  ="subin";
var tariff    ="subin";
var deposit   ="subin";
var paymode   ="subin";
var bank 	  ="subin";
var branch	  ="subin";
var customer  ="subin";
var phone     ="subin";


var dateCheck ="subin";

function doValidation()
{

 // proid = document.getElementById("pid").value;//only number
 // tariff = document.getElementById("tariff").value;
 deposit     = document.getElementById("deposit").value;
 paymode     = document.getElementById("paymode").value;// null
 bank     	 = document.getElementById("bank").value;// null
 branch		 = document.getElementById("branch").value;// null
 customer  	 = document.getElementById("customer").value;// null
 phone     	 = document.getElementById("phone").value;//
 address     = document.getElementById("address").value;// null
 dateCheck   = document.getElementById("din").value;

// proid = proid.replace(/\s/g, "");
bank     	= bank.replace(/\s/g, "");
// tariff = tariff.replace(/\s/g, "");
deposit		= deposit.replace(/\s/g, "");
paymode		= paymode.replace(/\s/g, "");
branch		= branch.replace(/\s/g, "");
customer	= customer.replace(/\s/g, "");
phone		= phone.replace(/\s/g, "");
address		= address.replace(/\s/g, "");


if(paymode)
{
for(var indx=0;indx<paymode.length;indx++)
if(paymode.toUpperCase().charAt(indx)<'A'||paymode.toUpperCase().charAt(indx)>'Z' )
if(paymode.charAt(indx)!=' ')
{
paymode = 'false';
}
}
if(bank)
{
for(var indx=0;indx<bank.length;indx++)
if(bank.toUpperCase().charAt(indx)<'A'||bank.toUpperCase().charAt(indx)>'Z' )
if(bank.charAt(indx)!=' ')
{
bank = 'false';
}
}
if(branch)
{
for(var indx=0;indx<branch.length;indx++)
if(branch.toUpperCase().charAt(indx)<'A'||branch.toUpperCase().charAt(indx)>'Z' )
if(branch.charAt(indx)!=' ')
{
branch = 'false';
}
}
if(customer)
{
for(var indx=0;indx<customer.length;indx++)
if(customer.toUpperCase().charAt(indx)<'A'||customer.toUpperCase().charAt(indx)>'Z' )
if(customer.charAt(indx)!=' ')
{
customer = 'false';
}
}
if(!(isNaN(proid)))
{
proid = 'true';
}
else
{
proid = 'false6';
}
/*
 * if(!(isNaN(tariff))) {
 */
tariff = 'true';
/*
 * } else { tariff = 'false7'; }
 */
if(!(isNaN(deposit)))
{
deposit = 'true';
}
else
{
deposit = 'false8';
}
if(!(isNaN(phone)))
{
phone = 'true';
}
else
{
phone = 'false9';
}
mailCheck ='true';
if(!(isNaN(dateCheck)))
{
dateCheck = 'true';
}
else
{
dateCheck =  'false11';
}

}
function mutualChange(sbn)
{
	var k = document.getElementById(sbn).value;
	if(k=='Premium Profile')
	{
		document.getElementById("tariff").value='Rs.1000/-';	
		document.getElementById("maid").value='Rs.1000/-';
	}
	else if(k=='Golden Profile')
	{
		document.getElementById("tariff").value='Rs.600/-';
		document.getElementById("maid").value='Rs.600/-';
	}
}
function showIt(sbn)
{
document.getElementById(sbn).style.visibility="visible";
}
function hideIt(sbn)
{
document.getElementById(sbn).style.visibility="hidden";
}
function showList()
{
	document.getElementById("resume").style.visibility="visible";
}
function hideList()
{
	document.getElementById("resume").style.visibility="hidden";
}
function loadNow()
{
	if(temporarykforloadNow == 1)
	{
	showEra();	
	temporarykforloadNow++;
	}
}
function showUser(str)
{
						if (window.XMLHttpRequest)
						{
						xmlhttp=new XMLHttpRequest();
						}
						else
						{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				xmlhttp.onreadystatechange=function()
				{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("resultant").innerHTML=xmlhttp.responseText;
				}
				};
				xmlhttp.open("GET","./include/validation.php?msg=passmail&q="+str,true);
				xmlhttp.send();
}
function showEmployer(str)
{
						if (window.XMLHttpRequest)
						{
						xmlhttp=new XMLHttpRequest();
						}
						else
						{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				xmlhttp.onreadystatechange=function()
				{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("resultant").innerHTML=xmlhttp.responseText;
				}
				};
				xmlhttp.open("GET","./include/validation.php?msg=empmail&q="+str,true);
				xmlhttp.send();
}

function sentPass()
{
var msd = document.getElementById("mail").value;
var xmlhttp;
						if (window.XMLHttpRequest)
						{
						xmlhttp=new XMLHttpRequest();
						}
						else
						{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				xmlhttp.onreadystatechange=function()
				{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("passresult").innerHTML=xmlhttp.responseText;
				}
				};
				xmlhttp.open("GET","./include/validation.php?msg=mailsent&q="+msd,true);
				xmlhttp.send();
}
function semtPass()
{
var msd = document.getElementById("mail").value;
var xmlhttp;
						if (window.XMLHttpRequest)
						{
						xmlhttp=new XMLHttpRequest();
						}
						else
						{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				xmlhttp.onreadystatechange=function()
				{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("passresult").innerHTML=xmlhttp.responseText;
				}
				};
				xmlhttp.open("GET","./include/validation.php?msg=mailsemt&q="+msd,true);
				xmlhttp.send();
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
function newWindows(k)
{
	if(k==0)
	{
window.open('forpass.php?m=u','_blank','width=500,height=200,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');
	}
	if(k==1)
	{
window.open('forpass.php?m=e','_blank','width=500,height=200,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');
	}
}
// register form validation-start
	var pastr    = (/^[a-zA-Z\ .,]+$/);
	var pawrd    = (/^[a-zA-Z]+$/);
	var paadd	 = (/^[a-zA-Z0-9]|[\ s.,:]|[\\r?\n|\r]+[^\S]+$/);
	var padig    = (/^[0-9]+$/);
	var pamid	 = (/^\w+([\._]?\w+)*@\w+([\._]?\w+)*(\.\w{2,3})+$/);
	var paweb    = (/^[www.]|(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?$/);
function validateForm()
	{

	if( userValidationForm('email', pamid)      && userValidationForm('fullname', pastr) &&
		userValidationForm('mobile', padig)     && userValidationForm('district', paadd) && 
		userValidationForm('experience', paadd) && userValidationForm('skills', paadd)    && 
		userValidationForm('title', paadd)		&& passWord() && true && checkBoxArray() )
		{
		var r = confirm("Click OK to Continue..");
		if(r){return true;}else{return false;}
		}
	else
		{
		alert("Try Again!");
		return false;
		}
	}
function checkBoxArray()
{
	var flag = 0;
	for (var i = 0; i< 11; i++) {
	if(document.forms["register_form"]["category[]"][i].checked){
	flag ++;
	}
	}
	if(flag==0)
	{
	document.getElementById("ctgry").style.borderColor='red';
	return false;
	}
	else
	{
	return true;
	}
	
}
function userValidationForm(id,patern)
{
	if(getelemenT(id).match(patern))
	{
	return true;	
	}
	else
	{
	document.getElementById(id).style.borderColor='red';
	return false;	
	}
	
}



function checkRegisteredMail()
{
	
	if (window.XMLHttpRequest)
	{
	xmlhttp=new XMLHttpRequest();
	}
	else
	{
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("result").innerHTML=xmlhttp.responseText;
}
};
xmlhttp.open("GET","./include/validation.php?msg=resumesend&q="+sbn+"&p="+smn,true);
xmlhttp.send();

}

function getelemenT(id)
{
	return document.getElementById(id).value;
}
function dateCheck()
{
	var ddd = document.getElementById("din").value;
	if(ddd.match(padig) && ddd != null)
	{
	return true;	
	}
	else
	{
		
	return false;	
	}
	
}
function passWord()
{
	var passo    = document.getElementById("setpass").value;
	var passt    = document.getElementById("conpass").value;
	if(passo == passt && passo != null && passo != '' && passo != ' ')
	{
				return true;
	}
	else
	{
		document.getElementById("setpass").style.borderColor='red';
		document.getElementById("conpass").style.borderColor='red';
		return false;
	}
}
function isNumberKey(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode;
   if (charCode != 46 && charCode > 31 
     && (charCode < 48 || charCode > 57))
      return false;

   return true;
}

function fullname()
{
	var cname    = document.getElementById("fullname").value;
	if(cname.match(pastr) && cname != null )
	{
return true;
	}
	else
	{
return false;
	}
}
function fathername()
{
	var fname    = document.getElementById("fname").value;
	if(fname.match(pastr) && fname != null)
	{
return true;
	}
	else
	{
return false;
	}
}
function birthplace()
{
	var pbirth   = document.getElementById("pbirth").value;
	if(pbirth.match(pastr) && pbirth != null)
	{
return true;
	}
	else
	{
return false;
	}
}
function address()
{
	var pmaddr   = document.getElementById("pmaddr").value;
		pmaddr   = pmaddr.replace(/(^\s+)(\s+$)/, "");
	var praddr   = document.getElementById("praddr").value;
		praddr   = praddr.replace(/(^\s+)(\s+$)/, "");
	if(pmaddr != null && praddr != null)
	{
	if(pmaddr.match(paadd) && praddr.match(paadd))
	{
return true;
	}
	else
	{
return false;
	}
}
	else
	{
return false;
	}
}
function phone()
{	
	var phone    = document.getElementById("phone").value;
	if(phone.match(padig) && phone != null)
	{
return true;
	}
	else
	{
return false;
	}
}
function mobile()
{
	var mobile   = document.getElementById("mobile").value;
	if(mobile.match(padig) && mobile != null)
	{
return true;
	}
	else
	{
return false;
	}
}
function age()
{
	var age      = document.getElementById("age").value;
	if(age.match(padig) && age != null)
	{
return true;
	}
	else
	{
return false;
	}
}
function mail()
{
	var mail    = document.getElementById("email").value;
	if(mail.match(pamid) && mail != null)
	{
return true;
	}
	else
	{
return false;
	}
}
function copyAddr()
{
	if(document.getElementById("addcheck").checked)
	{
		var m = document.getElementById("pmaddr").value;
		document.getElementById("praddr").innerHTML=m;
	}
	else
	{
		document.getElementById("praddr").innerHTML="";
	}
}
function maritalStatus()
{
	if(document.getElementById("single").checked)
	{
document.getElementById("wife").disabled=true;
document.getElementById("child").disabled=true;
	}
	if(document.getElementById("marry").checked)
	{
		document.getElementById("wife").disabled=false;
		document.getElementById("child").disabled=false;
	}
}
function showDate()
{		
	var dob = document.getElementById("postdate").value;
	if(dob !='SUBIN' && dob != 'DEV')
	{
	 birday = dob.split("/");
	}
	else
	{
		if(dob == 'DEV')
		{
		dob="12/12/2012";	
		}
		else
		{
		dob="15/8/1989";
		}
	 birday = dob.split("/");
	}
var date  = '<option value=0>Date</option>';
for(var k=0;k<32;k++)
{
	if(k == birday[0])
	{
		date = date + '<option selected value='+k+'>'+k+'</option>';
	}
	else
	{
		date = date + '<option value='+k+'>'+k+'</option>';
	}
}
document.getElementById("today").innerHTML = date;
}
function showEra()
{
	var dob = document.getElementById("postdate").value;
	
	if(dob !='SUBIN' && dob != 'DEV')
	{
	 birday = dob.split("/");
	}
	else
	{
		if(dob == 'DEV')
		{
		dob="12/12/2012";	
		}
		else
		{
		dob="15/8/1989";
		}
	 birday = dob.split("/");
	}
	var month = [
		            "Month","January","February","March","April","May","June",
					"July","August","September","October","November","December"
					];
	var mon  = '';	
	var yer  = '<option value=0>Year</option>';	
for(var i=0;i<month.length;i++)
{
	if(i == birday[1])
	{
		mon = mon + '<option selected value='+i+'>'+month[i]+'</option>';
	}
	else
	{
		mon = mon + '<option value='+i+'>'+month[i]+'</option>';
	}
}
for(var i=1950;i<2030;i++)
{
	if(i == birday[2])
	{
	yer = yer + '<option selected value='+i+'>'+i+'</option>';
	}
	else
	{
	yer = yer + '<option value='+i+'>'+i+'</option>';
	}
}
document.getElementById("month").innerHTML = mon;
document.getElementById("year").innerHTML = yer;
showDate();
}
function checDate()
{
var da = document.getElementById("today").value;
var mo = document.getElementById("month").value;
var ye = document.getElementById("year").value;
						if (window.XMLHttpRequest)
						{
						xmlhttp=new XMLHttpRequest();
						}
						else
						{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				xmlhttp.onreadystatechange=function()
				{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("date").innerHTML = xmlhttp.responseText;
				}
				};
xmlhttp.open("GET","./include/validation.php?msg=checkdate&d="+da+"&m="+mo+"&y="+ye,true);
				xmlhttp.send();
}
// register - form validation end
function showStatus(str)
{
var user = document.getElementById("password").value;
var xmlhttp;

						if (window.XMLHttpRequest)
						{
						xmlhttp=new XMLHttpRequest();
						}
						else
						{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				xmlhttp.onreadystatechange=function()
				{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("funcheck").value=xmlhttp.responseText;
				}
				};
				xmlhttp.open("GET","./include/validation.php?msg=change&q="+str+"&p="+user,true);
				xmlhttp.send();
}
function showStatusem(str)
{
var user = document.getElementById("password").value;
var xmlhttp;
						if (window.XMLHttpRequest)
						{
						xmlhttp=new XMLHttpRequest();
						}
						else
						{
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				xmlhttp.onreadystatechange=function()
				{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("funcheck").value=xmlhttp.responseText;
				}
				};
				xmlhttp.open("GET","./include/validation.php?msg=changeem&q="+str+"&p="+user,true);
				xmlhttp.send();
}
function passCheck()
		{
    	var sbn = document.getElementById("funcheck").value;
    	if(sbn != 'Y')
		{
		alert("Current Password Not Matching");	
		return false;
		}
    	else
    	{
		var pa = document.getElementById("passb").value;
		var pb = document.getElementById("passc").value;
		if( pa == "" || pa == null  ||  pb == ""  ||  pb == null )
		{
		alert ("Enter Valid Password!");
		return false;
		}
		if(pa == pb && pa != null && pa != ' ' && sbn == 'Y')
		{
			var r = confirm("Do You Really want to Change the Password?");
			if(r == true)
			{
		    return true;
			}
			else
			{
			return false;	
			}
		}
		else
		{
		alert("Password Not Matching!");
		return false;
		}
		
		}
		}
function passCheckem()
{
var sbn = document.getElementById("funcheck").value;
if(sbn != 'Y')
{
alert("Current Password Not Matching");	
return false;
}
else
{
var pa = document.getElementById("passb").value;
var pb = document.getElementById("passc").value;
if( pa == "" || pa == null  ||  pb == ""  ||  pb == null )
{
alert ("Enter Valid Password!");
return false;
}
if(pa == pb && pa != null && pa != ' ' && sbn == 'Y')
{
	var r = confirm("Do You Really want to Change the Password?");
	if(r == true)
	{
    return true;
	}
	else
	{
	return false;	
	}
}
else
{
alert("Password Not Matching!");
return false;
}

}
}
function validateEmped()
{
	if(comName()    	 &&
	   comType()    	 && 
	   comAddress() 	 && 
	   comPin()     	 && 
	   comPlace()		 &&
	   comState()   	 && 
	   comCountry() 	 && 
	   comPhone()  		 && 
	   comMobile() 		 && 
	   comEmail()  		 && 
	   comWebsite()	 	 && 
	   comProfile() 	 && 
	   comPerson()       && 
	   comDesignation()  && 
	   comContact() 	 
	   )
	{
		r = confirm("Please Click OK to Save Changes");
		if(r == true)
		{
		return true;
		}
		else
		{
	
		return false;	
		}
		/*
		 * alert("Success"); return false;
		 */
	}
	else
	{
		alert("Try Again !");
		return false;
	}
	
	/*
	 * alert("you are in emp"); return false;
	 */
}
function validateEmp()
{
	if(comName()    	 &&
	   comType()    	 && 
	   comAddress() 	 && 
	   comPin()     	 &&
	   comPlace()		 &&
	   comState()   	 && 
	   comCountry() 	 && 
	  
	   comMobile() 		 && 
	   comEmail()  		 && 
	   comWebsite()	 	 && 
	   
	   comPerson()       && 
	  
	  
	   comPass() )
	{
		r = confirm("Please Click OK to Registration");
		if(r == true)
		{
		return true;
		}
		else
		{
		
		return false;	
		}
		/*
		 * alert("Success"); return false;
		 */
	}
	else
	{
		alert("Try Again !");
		return false;
	}
	
	/*
	 * alert("you are in emp"); return false;
	 */
}
function comName()
{
	var sbn = document.getElementById("emcompany").value;
	if(sbn.match(pastr))
	{
		return true;
	}
	else
	{
		/*alert("Success");*/
		return false;
		document.getElementById("com").innerHTML="N";
			
	}
}
function comPlace()
{
	var sbn = document.getElementById("emplace").value;
	if(sbn.match(pastr))
	{
		return true;
	}
	else
	{
		return false;
		document.getElementById("pla").innerHTML="N";
	
	}
}
function comType()
{
	var sbn = document.getElementById("emtype").value;
	if(sbn.match(pastr))
	{
		return true;
	}
	else
	{
		return false;
		document.getElementById("typ").innerHTML="N";
		
	}
}
function comAddress()
{ 
var sbn = document.getElementById("emsaddress").value;
	sbn = sbn.replace(/(^\s+)(\s+$)/, "");
	if(sbn.match(paadd))
	{
		return true;
	}
	else
	{
		return false;
		document.getElementById("add").innerHTML="N";
		
	}
}
function comPin()
{
	var sbn = document.getElementById("empin").value;
	sbn = sbn.replace(/(^\s+)(\s+$)/, "");
	if(sbn.match(padig))
	{
		return true;
	}
	else
	{
		return false;
		document.getElementById("pin").innerHTML="N";
	
	}
}
function comState()
{
	var sbn = document.getElementById("emstate").value;
	sbn = sbn.replace(/(^\s+)(\s+$)/, "");
	if(sbn.match(pawrd))
	{
		return true;
	}
	else
	{
		return false;
		document.getElementById("sta").innerHTML="N";
	
	}
}
function comCountry()
{
	var sbn = document.getElementById("emcountry").value;
	sbn = sbn.replace(/(^\s+)(\s+$)/, "");
	if(sbn.match(pawrd))
	{
		return true;
	}
	else
	{
		return false;
		document.getElementById("cou").innerHTML="N";
		
	}
}
function comPhone()
{
	var sbn = document.getElementById("emphone").value;
	sbn = sbn.replace(/(^\s+)(\s+$)/, "");
	if(sbn.match(padig) && sbn.length > 10)
	{
		return true;
	}
	else
	{
		return false;
		document.getElementById("pho").innerHTML="N";
		
	}
}
function comMobile()
{
	var sbn = document.getElementById("emmobile").value;
	sbn = sbn.replace(/(^\s+)(\s+$)/, "");
	if(sbn.match(padig) && sbn.length > 9)
	{
		return true;
	}
	else
	{
		return false;
		document.getElementById("mob").innerHTML="N";
	
	}
}
function comEmail()
{
	var sbn = document.getElementById("ememail").value;
	sbn = sbn.replace(/(^\s+)(\s+$)/, "");
	if(sbn.match(pamid))
	{
		return true;
	}
	else
	{
		return false;
		document.getElementById("ema").innerHTML="N";
		
	}
}
function comWebsite()
{
	var sbn = document.getElementById("emwebsite").value;
	sbn = sbn.replace(/(^\s+)(\s+$)/, "");
	if(sbn.match(paweb))
	{
		return true;
	}
	else
	{
		return false;
		document.getElementById("web").innerHTML="N";
		
	}
}
function comProfile()
{
	var sbn = document.getElementById("emprofile").value;
	sbn = sbn.replace(/(^\s+)(\s+$)/, "");
	if(sbn.match(paadd) && sbn.length>1)
	{
		return true;
	}
	else
	{
		return false;
		document.getElementById("pro").innerHTML="N";
		
	}
}
function comPerson()
{
	var sbn = document.getElementById("emperson").value;
	if(sbn.match(pastr))
	{
		return true;
	}
	else
	{
		return false;
		document.getElementById("per").innerHTML="N";
	
	}
}
function comDesignation()
{
	var sbn = document.getElementById("emdesignation").value;
	if(sbn.match(pastr))
	{
		return true;
	}
	else
	{
		return false;
		document.getElementById("des").innerHTML="N";
		
	}
}
function comContact()
{
	var sbn = document.getElementById("emcontact").value;
	if(sbn.match(padig) && sbn.length > 9)
	{
		return true;
	}
	else
	{
		return false;
		document.getElementById("mop").innerHTML="N";
		
	}
}
function comPass()
{
	var sbn = document.getElementById("empassword").value;
	var sdn = document.getElementById("empassworda").value;
	var patt1=/^\s+$/;
		sbn = sbn.replace(/(^\s+)(\s+$)/, "");
	if(!(sbn.match(patt1)) && sbn == sdn && sbn.length>1)
		{
		var p = '<input type="hidden" name="pass" value="'+sbn+'" />';
		document.getElementById("print").innerHTML=p;
		return true;
		}
		else
		{
			return false;
			document.getElementById("pas").innerHTML="N";
		
		}
}
function editValidation()
{
	return false;
}

function showAdvertisement()
{
  var board;
    board = document.createElement('div');
    board.id = 'boards';
	board.style.backgroundImage="url('images/UNIVERSITY_copy1.jpg')";
	board.style.width='360px';
	board.style.height='240px';
	board.style.position='fixed';
	board.style.right='0px';
	board.style.bottom='0px';
	board.setAttribute('onmouseover','changePosition()');
    document.body.appendChild(board);
   
}
function changePosition()
{try{
document.getElementById("boards").style.left=='0px'?((document.getElementById("boards").style.right='0px') && (document.getElementById("boards").style.left='')):((document.getElementById("boards").style.left='0px') && (document.getElementById("boards").style.right=''));
}
catch(e){}
}

