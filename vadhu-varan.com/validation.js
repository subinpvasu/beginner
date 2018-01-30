function doSomeFunctions()
{
	
}
function showClose()
{
var name    =	document.getElementById("name").value;
var address =	document.getElementById("address").value;
var phone   =	document.getElementById("phone").value;
var email   =	document.getElementById("email").value;
var subject =	document.getElementById("subject").value;
var message =	document.getElementById("message").value;

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
			if(xmlhttp.readyState<4)
			{
			document.getElementById("ack").innerHTML = 'Please Wait...';
			}
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("ack").innerHTML  = xmlhttp.responseText;
			} 
			};
xmlhttp.open("GET","./include/validation.php?msg=sendmail&name="+name+"&address="+address+"&phone="+phone+"&email="+email+"&subject="+subject+"&message="+message,true);
			xmlhttp.send();
}
function showDemo()
{
	var k = '<img src="images/loading.gif" />';
	document.getElementById("data").innerHTML=k;
}
function populateDob()
{
	var sbn = document.getElementById("dobshow").value;// 15/10/1986,thedate,themonth
	var smn = sbn.split('/');// smn0-15,smn1-10
	document.getElementById("thedate").options.selectedIndex=smn[0];
	document.getElementById("themonth").options.selectedIndex=smn[1];

}
var accountvariable = 0;
function doThese()
{ 
		
	accountvariable++;
	if(accountvariable==1)
	{
	
	
	var rl = document.getElementById("rlgshow").value; 
	var cs = document.getElementById("cstshow").value;
	try{var k = document.getElementById("dbheight").value;
	document.getElementById("height").options.selectedIndex=k;}
	catch(err){}
	
		
	populateCaste(rl, cs);
	populateDob();
	//displayAge();
	}
}
function doThose()
{
	var rpt = document.getElementById("report").value;
	if(rpt == 0)
	{
	
			var rl = document.getElementById("rlgshow").value; 
			var cs = document.getElementById("cstshow").value;
			try{var k = document.getElementById("dbheight").value;}
			catch(err){}
			
			document.getElementById("height").options.selectedIndex=k;	
			populateCaste(rl, cs);
			populateDob();
			rpt++;
			document.getElementById("report").value=rpt;
}
}
function enableTextarea()
{
	var kkkk =
'<td>Details</td><td>:</td><td><textarea  class="textarea" name="details" id="details"></textarea></td><td id="detailsr"></td>';
	
	document.getElementById("rowdetails").innerHTML=kkkk;
	
}
function disableTextarea()
{
	var kkkk = '';
	document.getElementById("rowdetails").innerHTML=kkkk;
}
function doItnow()
{
	
	accountvariable++;
if(accountvariable==1||accountvariable==2||accountvariable==3)
{
	displayTextarea();
	try{var k = document.getElementById("dbheight").value;}
	catch(err){}
	
	document.getElementById("height").options.selectedIndex=k;	
	
}
}
function displayTextarea()
{
	var ta = document.getElementById("disabl").value;
	if(ta == 'Y')
	{
	enableTextarea();	
	}
	else
	{
		disableTextarea();
	}
}
function openUpload(sbn)
{
window.open('./include/image_profile.php?auth=false&keyid='+sbn,'1348219726554','width=500,height=150,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');
return false;
}
function openHoro(sbn)
{
	window.open('./include/horo_profile.php?auth=false&keyid='+sbn,'1348219726554','width=500,height=150,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');
	return false;	
}
function openHoroad(sbn)
{
	window.open('horo_ad_profile.php?auth=true&keyid='+sbn,'1348219726554','width=500,height=150,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');
	return false;	
}
function openUploadad(sbn)
{
window.open('image_ad_profile.php?auth=true&keyid='+sbn,'1348219726554','width=500,height=150,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');
return false;
}
function askImage(sbn)
{
	var lk = '<a href="" style="position:absolute;color:red;">Set this Image as Profile Picture</a>';
	document.write=lk;
}
var reload_var;
function updateProimg(sbn)
{
	try{
		var data = document.getElementById("dataentry").value;	
		}
		catch(e){}
		if(data=='verygood')
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
			if(xmlhttp.readyState<4)
			{
			//document.getElementById("ack").innerHTML = 'Please Wait...';
			}
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				reload_var  = xmlhttp.responseText;
				//repeatLoading();
				
			} 
			};
		xmlhttp.open("GET","../include/validation.php?msg=profileImages&key="+sbn,true);
			xmlhttp.send();
		
		
	}else{
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
	if(xmlhttp.readyState<4)
	{
	//document.getElementById("ack").innerHTML = 'Please Wait...';
	}
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		reload_var  = xmlhttp.responseText;
		repeatLoading();
		
	} 
	};
xmlhttp.open("GET","./include/validation.php?msg=profileImage&key="+sbn,true);
	xmlhttp.send();
}
}
function repeatLoading()
{
	if(reload_var=='Y')
	{
	window.location.reload();	
	}
}


function warningShow()
{
	var r=confirm("Press a button!");
	if (r==true)
	  {
	  alert("You pressed OK!");
	  }
	else
	  {
	  alert("You pressed Cancel!");
	  }
	
	
	
/*var r = confirm("Please Save the Changes You have made.....");
if(r == true)
{
return false;
}
else
{
return true;	
}*/
}
function show(sbn)
{
document.getElementById(sbn).style.visibility="visible";
}
function hide(sbn)
{
	setTimeout(function(){document.getElementById(sbn).style.visibility="hidden";},5000);

}
// /////////////////////////////////////////////////////////////////////////////////////////////////////////
// ///// random variables /////////
// /////////////////////////////////////////////////////////////////////////////////////////////////////////
var popser = 0;
var agecount = 0;
var restcount = 0;
var chris 	= new Array(" Select","Caldiyan Syrian","Jacobite","Latin",
						"Marthoma","Nadar","Orthodox","Pentecost","Protestant","Roman Catholic",
						"Others" );
var musls  	= new Array(" Select","Ahmedia","Islam","Mappila","Pakhni","Pattanies",
						"Rowther","Shafi","Shia","Sunni","Others");
var sikhs 	= new Array(" Select","Arora","Gursikh","Jat","Kamboj","Kesadhari",
						"Khatri","Khashap","Rajpoot","Labana","Ramgarhia","Saini","Others");
var jains 	= new Array(" Select","Digamber","Shwetamber","others");
var nores 	= new Array(" Select","No Caste");
var othes 	= new Array(" Select","Others");
var intes 	= new Array(" Select","InterCaste");
var seles 	= new Array(" Select");
var hinds   = new Array(" Select","Adi Dravida","Adiyan","Adiyodi","Aiyyer","Aggarwal","Agri","Ambalavasi",
						"Arora","Araya","Arunthathiyar","Arya Vysya","Ayyanavar","Baghel/Pal/gaderiya","Bari","Bhandari","Bharathar",
						"Bhatia","Bhattathiri","Bhavsar","Billava","Blacksmith","Boyer","Brahmin","Brahmin 6000 Niyogi","Brahmin Anavil",
						"Brahmin Audichya","Brahmin Bhumihar","Brahmin Daivadnya","Brahmin Deshastha","Brahmin Garhwali",
						"Brahmin Gaud Saraswat(GSB)","Brahmin Gour","Brahmin Goswami","Brahmin Havyaka",
						"Brahmin Iyer","Brahmin Kanyakabj","Brahmin Karhade","Brahmin Kashmiri Pandit",
						"Brahmin Koknastha","Brahmin Kumaoni","Brahmin Madhwa","Brahmin Maithil","Brahmin Nagar",
						"Brahmin Narmadiya","Brahmin Pushkarna","Brahmin Rigvedi","Brahmin Sanadya","Brahmin Saraswat",
						"Brahmin Suryaparin","Brahmin Smartha","Brahmin - Tamil","Brahmin Tyagi","Brahmin vaidiki",
						"Brahmin Viswa","Bunt","Carpenter","chambhar","Chakkala Nair","Chaurasia","Chavalakaran","Cheramar",
						"Cheruman","Chettiyar","Chetty","Chetty - Tamil","CKP","Coorgi","Devadigas",
						"Devanga","Devender","Dhargar","Dheevara","Dheevara-Araya","Dheevara-Mukaya",
						"Dheevara-Mukkuva","Dheevara-Vala","Dhobi","Edigas","Elayathu","Embrandiri","Ezhava",
						"Ezhavathy","Ezhuthachan","Gandla","Ganiga","Ganigashetty","Gauda Sar. Brahmin",
						"Gavara","Goldsmith","Goud","Goundar","Gowda","Gujjar","Gupthan","Guruckal",
						"Haveega Brahmin","Hegde","Ilayath","Iyengar","Iyer","Jain","Jaiswal","Jat",
						"Jatav","Kadaiyan","Kaimal","Kakkalan","Kalar","Kalari Kuruppu","Kalari Panicker","Kalinga",
						"Kamboj","Kamma","Kammalar","Kapu","Kapu Mannuru",
						"Kanakkan","Kani","Kanisan","Kaniyan","Kartha","Karuneegar","Karuvan","Kavadia",
						"Kavuthiyya","Kitaran","Kshathriya","Kudumbi","Kulala","Kumbaran","Kunbi","Kurava",
						"Kurmi","Kuruba","Kurukkal","Kayastha","Somvanshi Kayastha Prabhu","Khandayat",
						"Khantik","Koli","Kongu Vellala Goundar","Kshatriya","Kshatriya Agnikula","Kulalar",
						"Kumawat","Kumbhar","Kushwaba","Leva Patidar","Lingayat","Lohana","Madiya",
						"Maheswari","Mahisya","Mala","Malayarayan","Mali","Mallah","Maniyani Nair",
						"Mannadiar","Mannan","Marar","Marutha","Maruthuvar","Marwari","Mason","Maurya",
						"Meenavar","Menon","Moger","Meru","Mogaveera","Moosari","Moosath","Moothan","Mukkuva","Mudaliyar",
						"Mudaliyar Arcot","Muthuvan","Monchi","Mudiraj","Mukkulathor",
						"Muthuraja","Nadar","Naicker","Naidu","Nair","Nair Veluthedathu","Naik",
						"Nambeesan","Nambiar","Nambidi","Namboodiri","Nayaka","Nepali","Odan","Oorali",
						"Padmashali","Padanna","Panan","Pandithar","Panicker","Paravar","Paraya",
						"Parkava Kulam","Patel","Patel Dodia","Patel Kadva","Patel Leva","Patil",
						"Patil Leva","Patnaick","Pattarya","Perumannan","Peruvannan",
						"Pillai","Pisharody","Poduval","Potti","Prajapati","Pulaya","Pushpakaunni",
						"Rajaka","Rajput","Rajput Garhwali","Rajput Kumaoni","Rajput Rohella/Tank",
						"Reddy","Sadgope","Saini","Salva Pillai","Saliya","Samantha","Sambava","Scheduled Caste",
						"Senai Thalaivar","Setti Balija","Shah","Shetty","Shimpi","Sidhamar",
						"Sindhi","Somvanshi","Sonar","Sourashtra","Sozhiya Vellalar","Srisayani",
						"Sutar","Swarnaka","Tamil Yadava","Tantuway","Telaga","Teli","Telugu Brahmin",
						"Tulu Brahmin","Thakur","Thandan","Thevar","Thiyya","Udayar","Ullada",
						"Unnithan","vadagalai","Vaishnav","Vaishnav Vanik","Vaishya",
						"Valluvan","Valmiki","Vaniar","Vanjari","Vankar","Vannar","Vannia Kula Kshtriyar",
						"V-Nair","Vanniyar","Varma","Varshney","Vedan","Veera Saivam","Veerashaiva",
						"Velan","Velar","Vellala Pillai","Vellalar","Vellalar Devandra Kula",
						"Velama","Veluthedathu Nair","Venniar","Vettuva","Vilakkithala Nair",
						"Viswabrahmin","Viswakarma","Vokkaliya","Vysya","Warrier","Yadava","Others");

// //////////////////////////////////////////////////////////////////////////////////////////////////////////
// //// function definitions /////////
// //////////////////////////////////////////////////////////////////////////////////////////////////////////
function verifyForm_acc()
{
	try{
var aa =	document.getElementById("namep").name;
var bb =	document.getElementById("dateofbirthp").name;
var cc =	document.getElementById("castep").name;	
var dd =	document.getElementById("presentp").name;
var ee =	document.getElementById("addressp").name;	
var ff =	document.getElementById("placep").name;
var gg =	document.getElementById("pincodep").name;	
var hh =	document.getElementById("cityp").name;
var ii =	document.getElementById("districtp").name;	
var jj =	document.getElementById("statep").name;
var kk =	document.getElementById("countryp").name;	
// var ll = document.getElementById("emailp").name;
var mm =	document.getElementById("landlinep").name;	
var nn =	document.getElementById("mobilep").name;
// var oo = document.getElementById("confirmp").name;
// var pp = document.getElementById("terms").value;
	}
	catch(err)
	{
		  txt="Fill up the Form Completely.\n\n";
		  
	}
if((aa=='true') && (bb=='true')&& (cc=='true')&& (dd=='true')&& (ee=='true')&& (ff=='true')&& (gg=='true')
		&& (hh=='true')&& (ii=='true')&& (jj=='true')&& (kk=='true')&&  (mm=='true')
		&& (nn=='true') ){
		var rr = confirm("Click OK to Save Changes..");
		if(rr==true)
		{
			document.getElementById("registerForm").submit();
			return true;
		}else
		{
			return false;
		}
	}
	else
	{
		alert(txt);
	    return false;	
	}
}
function verifyForm()
{
	try{
var aa =	document.getElementById("namep").name;
var bb =	document.getElementById("dateofbirthp").name;
var cc =	document.getElementById("castep").name;	
var dd =	document.getElementById("presentp").name;
var ee =	document.getElementById("addressp").name;	
var ff =	document.getElementById("placep").name;
var gg =	document.getElementById("pincodep").name;	
var hh =	document.getElementById("cityp").name;
var ii =	document.getElementById("districtp").name;	
var jj =	document.getElementById("statep").name;
var kk =	document.getElementById("countryp").name;	
var ll =	document.getElementById("emailp").name;
var mm =	'true';//document.getElementById("landlinep").name;	
var nn =	document.getElementById("mobilep").name;
var oo =	document.getElementById("confirmp").name;
var pp =    document.getElementById("terms").value;
	}
	catch(err)
	{
		  txt="Fill up the Form Completely.\n\n";
		  
	}
if((aa=='true') && (bb=='true')&& (cc=='true')&& (dd=='true')&& (ee=='true')&& (ff=='true')&& (gg=='true')
		&& (hh=='true')&& (ii=='true')&& (jj=='true')&& (kk=='true')&& (ll=='true')&& (mm=='true')
		&& (nn=='true')&& (oo=='true') && (pp == 'Y') ){
		var rr = confirm("Click OK to Create Account..");
		if(rr==true)
		{
			document.getElementById("registerForm").submit();
			return true;
		}else
		{
			return false;
		}
	}
	else
	{
		alert(txt);
	    return false;	
	}
}
/*
 * +aa+"--"+bb+"--"+cc+"--"+dd+"--"+ee+"--"+ff+"--"+gg+"--"+hh+"--"+ii+"--"+jj+"--"+kk+"--"+ll+"--" +
 * "--"+mm+"--"+nn+"--"+oo+"--"
 */
function doRest()
{ restcount++;
if(restcount==1){
	var ddm = document.getElementById("thedate").value;
	var mom = document.getElementById("themonth").value;
	var yym = document.getElementById("theyear").value;
	if(isNaN(ddm)||isNaN(mom)||isNaN(yym))
	{
		 var rpl = '<img style="position:absolute" width="20px" height="10px" name="false" id="dateofbirthp" src="images/wrong.png"/>';
	      document.getElementById("bod").innerHTML=rpl;
	
	}
	else
	{
		displayAge();
		 var rpl = '<img style="position:absolute"  width="20px" height="10px" name="true" id="dateofbirthp" src="images/right.gif"/>';
	      document.getElementById("bod").innerHTML=rpl;
	}
	
	casReligion();
}
}
function clearVar()
{
	restcount=0;
}
function fieldCheck(ipt,idv)
{
	var letters = /^[0-9a-zA-Z\.+,-_s ]+$/;
	if(ipt.match(letters))
	{
		 var sms = idv+'r';
	      var img = idv+'p';
	      var rpl = '<img  style="position:absolute" width="20px" height="10px" name="true" id="'+img+'" src="images/right.gif"/>';
	      document.getElementById(sms).innerHTML=rpl;
	      document.getElementById("warning").innerHTML='';
	      return true;
	}
	else
	{
		  var msg = 'Enter  Valid String...';
	      var sms = idv+'r';
	      var img = idv+'p';
	      var rpl = '<img  style="position:absolute" width="20px" height="10px" name="false" id="'+img+'" src="images/wrong.png"/>';
	      document.getElementById(sms).innerHTML=rpl;
		  document.getElementById("warning").innerHTML=msg;
		  document.getElementById(idv).focus();
	      return false;
	}
}
function selectionCheck(ipt,idv)
{
	var letters = /^[0-9a-zA-Z\.+,-_s ]+$/;
	if(ipt.match(letters))
	{
		 var sms = idv+'r';
	      var img = idv+'p';
	      var rpl = '<img  style="position:absolute" width="20px" height="10px" name="true" id="'+img+'" src="images/right.gif"/>';
	      document.getElementById(sms).innerHTML=rpl;
	      document.getElementById("warning").innerHTML='';
	      return true;
	}
	else
	{
		  var msg = 'Select  Some Values...';
	      var sms = idv+'r';
	      var img = idv+'p';
	      var rpl = '<img  style="position:absolute" width="20px" height="10px" name="false" id="'+img+'" src="images/wrong.png"/>';
	      document.getElementById(sms).innerHTML=rpl;
		  document.getElementById("warning").innerHTML=msg;
		  document.getElementById(idv).focus();
	      return false;
	}
}
function famCheck()
{

	try{
		var aaa =	document.getElementById("membersp").name;
		var bbb =	document.getElementById("fatherp").name;
		var ccc =	document.getElementById("occupationp").name;	
		var ddd =	document.getElementById("motherp").name;
		var eee =	document.getElementById("mother_occup").name;	
		var fff =	document.getElementById("nobrop").name;
		var ggg =	document.getElementById("mar_brop").name;	
		var hhh =	document.getElementById("unmar_brop").name;
		var iii =	document.getElementById("nosisp").name;	
		var jjj =	document.getElementById("mar_sisp").name;
		var kkk =	document.getElementById("unmar_sisp").name;	
			
		
			}
			catch(err)
			{
				 txt="Keep Your Form Completed.!\n\n       Click OK to Submit.";
				  
			}
		if((aaa=='true') || (bbb=='true')|| (ccc=='true')|| (ddd=='true')|| (eee=='true')|| (fff=='true')|| (ggg=='true')
				|| (hhh=='true')|| (iii=='true')|| (jjj=='true')|| (kkk=='true')){
				var rr = confirm("Click OK to Save Details...");
				if(rr==true)
				{
										return true;
				}else
				{
					var zz = confirm(txt);
					if(zz==true)
					{
					return true;	
					}
					else
					{
				    return false;	
					}
				}
			}
			else
			{
				var zz = confirm(txt);
				if(zz==true)
				{
				return true;	
				}
				else
				{
			    return false;	
				}
			}
}
function phyCheck()
{

	try{
		var aaa =	document.getElementById("bodyp").name;
		var bbb =	document.getElementById("heightp").name;
		var ccc =	document.getElementById("colourp").name;	
		var ddd =	document.getElementById("dietp").name;
		var eee =	document.getElementById("healthp").name;	
		var fff =	document.getElementById("bloodp").name;
		/*var ggg =	document.getElementById("locationp").name;	*/
		/*var hhh =	document.getElementById("challengep").name;*/
		/*var iii =	document.getElementById("detailsp").name;	*/
			
			}
			catch(err)
			{
				 txt="Keep Your Form Completed.!\n\n       Click OK to Submit.";
				  
			}
		if((aaa=='true') || (bbb=='true')|| (ccc=='true')|| (ddd=='true')|| (eee=='true')|| (fff=='true')){
				var rr = confirm("Click OK to Save Details...");
				if(rr==true)
				{
										return true;
				}else
				{
					var zz = confirm(txt);
					if(zz==true)
					{
					return true;	
					}
					else
					{
				    return false;	
					}
				}
			}
			else
			{
				var zz = confirm(txt);
				if(zz==true)
				{
				return true;	
				}
				else
				{
			    return false;	
				}
			}
}
function eduCheck()
{
	try{
		var aaa =	document.getElementById("educationp").name;
		var bbb =	document.getElementById("institutep").name;
		var ccc =	document.getElementById("placep").name;	
		var ddd =	document.getElementById("periodp").name;
		var eee =	document.getElementById("employerp").name;	
		var fff =	document.getElementById("designationp").name;
		var ggg =	document.getElementById("locationp").name;	
		var hhh =	document.getElementById("durationp").name;
		var iii =	document.getElementById("last_employerp").name;	
		var jjj =	document.getElementById("last_locationp").name;
		var kkk =	document.getElementById("last_durationp").name;	
		var lll =	document.getElementById("salaryp").name;
		var mmm =	document.getElementById("incomep").name;	
		
			}
			catch(err)
			{
				 txt="Keep Your Form Completed.!\n\n       Click OK to Submit.";
				  
			}
		if((aaa=='true') || (bbb=='true')|| (ccc=='true')|| (ddd=='true')|| (eee=='true')|| (fff=='true')|| (ggg=='true')
				|| (hhh=='true')|| (iii=='true')|| (jjj=='true')|| (kkk=='true')|| (lll=='true')|| (mmm=='true')){
				var rr = confirm("Click OK to Save Details...");
				if(rr==true)
				{
										return true;
				}else
				{
					var zz = confirm(txt);
					if(zz==true)
					{
					return true;	
					}
					else
					{
				    return false;	
					}
				}
			}
			else
			{
				var zz = confirm(txt);
				if(zz==true)
				{
				return true;	
				}
				else
				{
			    return false;	
				}
			}
}
function allLetters(ipt,idv,lh)
{
      var letters = /^[A-Za-z \.]+$/;
      var k = ipt.replace(/\s+/g,'');
      if(ipt.match(letters) && k.length>=lh)
      {
      var sms = idv+'r';
      var img = idv+'p';
      var rpl = '<img  style="position:absolute" width="20px" height="10px" name="true" id="'+img+'" src="images/right.gif"/>';
      document.getElementById(sms).innerHTML=rpl;
      document.getElementById("warning").innerHTML='';
      return true;
      }
      else
      {
      var msg = 'Enter  Valid String...';
      var sms = idv+'r';
      var img = idv+'p';
      var rpl = '<img  style="position:absolute" width="20px" height="10px" name="false" id="'+img+'" src="images/wrong.png"/>';
      document.getElementById(sms).innerHTML=rpl;
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
		      var rpl = '<img  style="position:absolute" width="20px" height="10px" name="true" id="'+img+'" src="images/right.gif"/>';
			  document.getElementById(sms).innerHTML=rpl;
			  document.getElementById("warning").innerHTML='';
			  return true;
	}
	else
	{
	  var msg = 'Enter  Valid Number...';
	  var sms = idv+'r';
	  var img = idv+'p';
      var rpl = '<img  style="position:absolute" width="20px" height="10px" name="false" id="'+img+'" src="images/wrong.png"/>';
      document.getElementById(sms).innerHTML=rpl;
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
	      var rpl = '<img  style="position:absolute" width="20px" height="10px" name="true" id="'+img+'" src="images/right.gif"/>';
	      document.getElementById(sms).innerHTML=rpl;
	      document.getElementById("warning").innerHTML='';
	      return true;
	}
	else
	{
	  var msg = 'Enter Valid Details...';
	  var sms = idv+'r';
	  var img = idv+'p';
      var rpl = '<img  style="position:absolute" width="20px" height="10px" name="false" id="'+img+'" src="images/wrong.png"/>';
      document.getElementById(sms).innerHTML=rpl;
	  document.getElementById("warning").innerHTML=msg;
	  document.getElementById(idv).focus();
	  return false;
	}

}
function chkEmail(ipt,idv)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var tep;
if(ipt.match(mailformat))
{

	if (window.XMLHttpRequest)
	{
	xmlhttps=new XMLHttpRequest();
	}
	else
	{
	xmlhttps=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttps.onreadystatechange=function()
	{
	if(xmlhttps.readyState<4)
	{

		try {
			
		} catch (e) {
			// TODO: handle exception
		}
	}
	if (xmlhttps.readyState==4 && xmlhttps.status==200)
	{
	tep=xmlhttps.responseText;
	if(tep=='N')
	{
		var sms = idv+'r';
		var img = idv+'p';
	    var rpl = '<img  style="position:absolute" width="20px" height="10px" name="true" id="'+img+'" src="images/right.gif"/>';
	    document.getElementById(sms).innerHTML=rpl;
	    document.getElementById("warning").innerHTML='';
	    return true;
	}
	else
	{
		var msg = 'Email Address already used...';
		var sms = idv+'r';
		var img = idv+'p';
	    var rpl = '<img  style="position:absolute" width="20px" height="10px" name="false" id="'+img+'" src="images/wrong.png"/>';
	    document.getElementById(sms).innerHTML=rpl;
		document.getElementById("warning").innerHTML=msg;
		document.getElementById(idv).focus();
		return false;
	}
	}
	};
	xmlhttps.open("GET","./include/validation.php?msg=checkmail&num="+ipt,true);
	xmlhttps.send();
	
}
else
{
		var msg = 'Enter Valid Email ID...';
		var sms = idv+'r';
		var img = idv+'p';
	    var rpl = '<img  style="position:absolute" width="20px" height="10px" name="false" id="'+img+'" src="images/wrong.png"/>';
	    document.getElementById(sms).innerHTML=rpl;
		document.getElementById("warning").innerHTML=msg;
		document.getElementById(idv).focus();
		return false;
}
}
function chkPassword()
{
	var pwd = document.getElementById("password").value;
	var cwd = document.getElementById("confirm").value;
	if(pwd == cwd && pwd.length>=6)
	{
		    var rpl = '<img style="position:absolute"  width="20px" height="10px" name="true" id="confirmp" src="images/right.gif"/>';
		    document.getElementById("confirmr").innerHTML=rpl;
		    document.getElementById("warning").innerHTML='';
		    return true;
	}
	else
	{
		var msg = 'Enter same Password &amp; <br /> length greater than 6...';
		var rpl = '<img  style="position:absolute" width="20px" height="10px" name="false" id="confirmp" src="images/wrong.png"/>';
	    document.getElementById("confirmr").innerHTML=rpl;
		document.getElementById("warning").innerHTML=msg;
		return false;
	}
}
function casReligion()
{
	var rel = document.getElementById("religion").value;
	var cas = document.getElementById("caste").value;
	if(cas == ' Select' || cas == 'caste' || rel == ' Select' || rel == 'sele')
	{
		var msg = 'Select Religion &amp; Caste';
		var rpl = '<img style="position:absolute"  width="20px" height="10px" name="false" id="castep" src="images/wrong.png"/>';
	    document.getElementById("caster").innerHTML=rpl;
		document.getElementById("warning").innerHTML=msg;
		return false;
	}
	else
	{
		var rpl = '<img  style="position:absolute" width="20px" height="10px" name="true" id="castep" src="images/right.gif"/>';
	    document.getElementById("caster").innerHTML=rpl;
	    document.getElementById("warning").innerHTML='';
	    return true;
	}
		
}
function showRand()
{
	var ke = document.getElementById("namep").name;
	document.getElementById("response").innerHTML=ke;
}
function displayAge()
{
	try{
	var data = document.getElementById("dataentry").value;	
	}
	catch(e){}
	if(data=='verygood')
	{
	var dd = document.getElementById("thedate").value;
	var mo = document.getElementById("themonth").value;
	var yy = document.getElementById("theyear").value;
	if(isNaN(dd)||isNaN(mo)||isNaN(yy))
	{
	document.getElementById("seeage").value='Correct The Date of Birth Now!....-';	
	
	}else
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
	if(xmlhttp.readyState<4)
	{
		document.getElementById("seeage").value = 'Please Wait...!';
		
		
	}
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("dobs").value = dd+'/'+mo+'/'+yy;
document.getElementById("age").value = xmlhttp.responseText;
document.getElementById("seeage").value = xmlhttp.responseText;
}
};
xmlhttp.open("GET","../include/validation.php?msg=seeage&d="+dd+"&m="+mo+"&y="+yy,true);
xmlhttp.send();
	}
	
}else{
	
	
	
	
	
	
	
	
	var dd = document.getElementById("thedate").value;
	var mo = document.getElementById("themonth").value;
	var yy = document.getElementById("theyear").value;
	if(isNaN(dd)||isNaN(mo)||isNaN(yy))
	{
	document.getElementById("seeage").value='Correct The Date of Birth Now!';	
	
	}else
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
	if(xmlhttp.readyState<4)
	{
		document.getElementById("seeage").value = 'Please Wait...';
		
		
	}
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("dob").value = dd+'/'+mo+'/'+yy;
document.getElementById("age").value = xmlhttp.responseText;
document.getElementById("seeage").value = xmlhttp.responseText;
}
};
xmlhttp.open("GET","./include/validation.php?msg=seeage&d="+dd+"&m="+mo+"&y="+yy,true);
xmlhttp.send();
	}
}
}
function populateCaste(sbn,smn)
{//
	
	
	var  relsel = eval(sbn+"s");
	var x="";
	for(var i=0;i<relsel.length;i++)
	{
		if(relsel[i]==smn)
		{
			x = x + '<option selected value=\"'+relsel[i]+'\">'+relsel[i]+'</option>';
		}
		else
		{
		x = x + '<option value=\"'+relsel[i]+'\">'+relsel[i]+'</option>';
		}
	}
	
	document.getElementById("caste").innerHTML=x;
	
}
function showAge(begin,end,ther)
{
	var x="";
	if(ther == 'fromage')
	{
	x = '<option value="">AGE From</option>';	
	}
	if(ther == 'toage')
	{
		x = '<option value="">AGE To</option>';
	}
	for(var i=begin;i<end;i++)
	{
		x = x + '<option value=\"'+i+'\">'+i+'</option>';
	}
	document.getElementById(ther).innerHTML=x;
}
function populateSearch()
{
	popser++;
	if(popser==1)
	{
	showAge(18,51,'fromage');
	showAge(18,51,'toage');
	}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////
function personDisplay(sbn)
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
		if(xmlhttp.readyState<4)
		{
			document.getElementById("data").innerHTML = '<img src="images/loading.gif" />';
		}
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("data").innerHTML = xmlhttp.responseText;
		}
		};
		xmlhttp.open("GET","./include/validation.php?msg=ajaxperson&id="+sbn,true);
		xmlhttp.send();
}
function physicalDisplay(sbn)
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
		if(xmlhttp.readyState<4)
		{
			document.getElementById("data").innerHTML = '<img src="images/loading.gif" />';
		}
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("data").innerHTML = xmlhttp.responseText;
		}
		};
		xmlhttp.open("GET","./include/validation.php?msg=ajaxphysical&id="+sbn,true);
		xmlhttp.send();
}
function educationDisplay(sbn)
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
		if(xmlhttp.readyState<4)
		{
			document.getElementById("data").innerHTML = '<img src="images/loading.gif" />';
		}
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("data").innerHTML = xmlhttp.responseText;
		}
		};
		xmlhttp.open("GET","./include/validation.php?msg=ajaxeducation&id="+sbn,true);
		xmlhttp.send();
}
function familyDisplay(sbn)
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
		if(xmlhttp.readyState<4)
		{
			document.getElementById("data").innerHTML = '<img src="images/loading.gif" />';
		}
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("data").innerHTML = xmlhttp.responseText;
		}
		};
		xmlhttp.open("GET","./include/validation.php?msg=ajaxfamily&id="+sbn,true);
		xmlhttp.send();
}
function horoscopeDisplay(sbn)
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
		if(xmlhttp.readyState<4)
		{
			document.getElementById("data").innerHTML = '<img src="images/loading.gif" />';
		}
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("data").innerHTML = xmlhttp.responseText;
		}
		};
		xmlhttp.open("GET","./include/validation.php?msg=ajaxhoroscope&id="+sbn,true);
		xmlhttp.send();
}
function otherDisplay(sbn)
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
		if(xmlhttp.readyState<4)
		{
			document.getElementById("data").innerHTML = '<img src="images/loading.gif" />';
		}
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("data").innerHTML = xmlhttp.responseText;
		}
		};
		xmlhttp.open("GET","./include/validation.php?msg=ajaxother&id="+sbn,true);
		xmlhttp.send();
}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
function googleIt()
{
	
try{var gender 		= document.getElementById("gender").value;
	var religion 	= document.getElementById("religion").value;
	var caste 		= document.getElementById("caste").value;
	var fromheight 	= document.getElementById("fromheight").value;
	var toheight 	= document.getElementById("toheight").value;
	var weight 		= document.getElementById("weight").value;
	var agefrom 	= document.getElementById("agefrom").value;
	var ageto 		= document.getElementById("ageto").value;
	var status 		= document.getElementById("status").value;
	//var arrears 	= document.getElementById("arrears").value;
	var job 		= document.getElementById("job").value;
	var name 		= document.getElementById("name").value;
	var location 	= document.getElementById("location").value;
	var photo 		= document.getElementById("photo").checked;
}catch(e){}
var str  = gender+"|"+religion+"|"+caste+"|"+fromheight+"|"+toheight+"|"+weight+"|"+agefrom+"|"+ageto+"|"+status+"|"+job+"|"+name+"|"+location+"|"+photo;
//document.getElementById("searchresults").innerHTML= str;
if(str){
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
if(xmlhttp.readyState<4)
{
document.getElementById("searchresults").innerHTML = '<img src="images/loading.gif" />';
}
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("searchresults").innerHTML = xmlhttp.responseText;
}
};
xmlhttp.open("GET","./include/validation.php?msg=advanced&val="+str,true);
xmlhttp.send();
}
}

function checkProfile(str)
{
	var rtn;
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
	if(xmlhttp.readyState<4)
	{

		try {
			document.getElementById("proshow").innerHTML = '<img src="images/loading.gif" />';
		} catch (e) {
			// TODO: handle exception
		}
	}
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		
	rtn = xmlhttp.responseText;
	divideRule(rtn);//gold|15
	}
	};
	xmlhttp.open("GET","./include/validation.php?msg=procheck&val="+str,true);
	xmlhttp.send();
}	

function divideRule(sbn)
{
var val = sbn.split("|");
var smn = val[1];
if(val[0]=='guest')
{
	showGuest(smn);
}
if(val[0]=='gold')
{
	showGolden(smn);
}
if(val[0]=='premium')
{
	showPremium(smn);
}
}
var mailverified = 1;
function verifyEmail(smn)
{
	mailverified++;
	if(mailverified==2)
	{
		if (window.XMLHttpRequest)
		{
		xmlhttps=new XMLHttpRequest();
		}
		else
		{
		xmlhttps=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttps.onreadystatechange=function()
		{
		if(xmlhttps.readyState<4)
		{

			try {
				
			} catch (e) {
				// TODO: handle exception
			}
		}
		if (xmlhttps.readyState==4 && xmlhttps.status==200)
		{
		document.getElementById("accountshower").innerHTML=xmlhttps.responseText;
		}
		};
		xmlhttps.open("GET","./include/validation.php?msg=emailaddress&num="+smn,true);
		xmlhttps.send();
	}
}
function verifyAction(smn)
{
	if (window.XMLHttpRequest)
	{
	xmlhttps=new XMLHttpRequest();
	}
	else
	{
	xmlhttps=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttps.onreadystatechange=function()
	{
	if(xmlhttps.readyState<4)
	{

		try {
			
		} catch (e) {
			// TODO: handle exception
		}
	}
	if (xmlhttps.readyState==4 && xmlhttps.status==200)
	{
	document.getElementById("accountshower").innerHTML=xmlhttps.responseText;
	}
	};
	xmlhttps.open("GET","./include/validation.php?msg=actionmail&num="+smn,true);
	xmlhttps.send();
}
function accountChecked()
{
	var rr = confirm("Once You Verify your Account,You CANNOT change the following....\nAge,Date of Birth,Religion,Caste AND Marital Status");
	var code = document.getElementById("vericode").value;
if(rr===true){
	if (window.XMLHttpRequest)
	{
	xmlhttps=new XMLHttpRequest();
	}
	else
	{
	xmlhttps=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttps.onreadystatechange=function()
	{
	if(xmlhttps.readyState<4)
	{

		try {
			
		} catch (e) {
			// TODO: handle exception
		}
	}
	if (xmlhttps.readyState==4 && xmlhttps.status==200)
	{
	document.getElementById("accountshower").innerHTML=xmlhttps.responseText;
	}
	};
	xmlhttps.open("GET","./include/validation.php?msg=codecheck&code="+code,true);
	xmlhttps.send();
}
	
}

function showLinks()
{ 
	var prefunction = document.getElementById("prefunction").value;
	prefunction++;
	document.getElementById("prefunction").value=prefunction;
if(prefunction==1){
	var psn = document.getElementById("person").value;
	var cpr = document.getElementById("cipher").value;

	if (window.XMLHttpRequest)
	{
	xmlhttps=new XMLHttpRequest();
	}
	else
	{
	xmlhttps=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttps.onreadystatechange=function()
	{
	if(xmlhttps.readyState<4)
	{

		try {
			
		} catch (e) {
			// TODO: handle exception
		}
	}
	if (xmlhttps.readyState==4 && xmlhttps.status==200)
	{
	
		try {
			document.getElementById("ban").innerHTML=xmlhttps.responseText;
		} catch (e) {
			// TODO: handle exception
		}

	}
	};
	xmlhttps.open("GET","./include/validation.php?msg=displaylink&person="+psn+"&cipher="+cpr,true);
	xmlhttps.send();
}
}
function showLinksMail()
{ 
	var prefunction = document.getElementById("prefunctions").value;
	prefunction++;
	document.getElementById("prefunctions").value=prefunction;
if(prefunction==1){
	var psn = document.getElementById("persons").value;
	var cpr = document.getElementById("ciphers").value;

	if (window.XMLHttpRequest)
	{
	xmlhttps=new XMLHttpRequest();
	}
	else
	{
	xmlhttps=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttps.onreadystatechange=function()
	{
	if(xmlhttps.readyState<4)
	{

		try {
			
		} catch (e) {
			// TODO: handle exception
		}
	}
	if (xmlhttps.readyState==4 && xmlhttps.status==200)
	{
	
		try {
			document.getElementById("bans").innerHTML=xmlhttps.responseText;
		} catch (e) {
			// TODO: handle exception
		}

	}
	};
	xmlhttps.open("GET","./include/validation.php?msg=displaylinkmail&person="+psn+"&cipher="+cpr,true);
	xmlhttps.send();
}
}
function xpressInterest(sbn)
{

	if (window.XMLHttpRequest)
	{
	xmlhttps=new XMLHttpRequest();
	}
	else
	{
	xmlhttps=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttps.onreadystatechange=function()
	{
	if(xmlhttps.readyState<4)
	{
		try {
			
		} catch (e) {
			// TODO: handle exception
		}
	}
	if (xmlhttps.readyState==4 && xmlhttps.status==200)
	{
	document.getElementById("maildata").innerHTML=xmlhttps.responseText;
	}
	};
	xmlhttps.open("GET","./include/validation.php?msg=xpress&num="+sbn,true);
	xmlhttps.send();
	
}
function requestContact(sbn)
{
	if (window.XMLHttpRequest)
	{
	xmlhttps=new XMLHttpRequest();
	}
	else
	{
	xmlhttps=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttps.onreadystatechange=function()
	{
	if(xmlhttps.readyState<4)
	{
		try {
			
		} catch (e) {
			// TODO: handle exception
		}
	}
	if (xmlhttps.readyState==4 && xmlhttps.status==200)
	{
	document.getElementById("maildata").innerHTML=xmlhttps.responseText;
	}
	};
	xmlhttps.open("GET","./include/validation.php?msg=addrequest&num="+sbn,true);
	xmlhttps.send();
	
}
function loadSecond(sbn)
{
	window.open('index.php?msg=second&second='+sbn,'_blank');
	setTimeout(function(){document.getElementById("proshow").innerHTML='';},5000);
}
function xpressInterestN(sbn)
{
	window.location="index.php?msg=login";
}
function requestContactN(sbn)
{
	window.location="index.php?msg=login";
}
function requestContactByMail(sbn)
{
	var r = confirm("Click OK to Continue");
	if(r==true){
	if (window.XMLHttpRequest)
	{
	xmlhttps=new XMLHttpRequest();
	}
	else
	{
	xmlhttps=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttps.onreadystatechange=function()
	{
	if(xmlhttps.readyState<4)
	{
		try {
			
		} catch (e) {
			// TODO: handle exception
		}
	}
	if (xmlhttps.readyState==4 && xmlhttps.status==200)
	{
	document.getElementById("maildata").innerHTML=xmlhttps.responseText;
	setTimeout(function(){document.getElementById("maildata").innerHTML='';},5000);
	window.location="index.php";
	this.window.close();
	}
	};
	xmlhttps.open("GET","./include/validation.php?msg=mailrequest&num="+sbn,true);
	xmlhttps.send();
	
}
}
function sendAbuse(sbn,smn)
{
	var r = confirm("Are You Sure.....?");
	if(r==true){
	if (window.XMLHttpRequest)
	{
	xmlhttps=new XMLHttpRequest();
	}
	else
	{
	xmlhttps=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttps.onreadystatechange=function()
	{
	if(xmlhttps.readyState<4)
	{
		try {
			
		} catch (e) {
			// TODO: handle exception
		}
	}
	if (xmlhttps.readyState==4 && xmlhttps.status==200)
	{
	var abs = xmlhttps.responseText;
	if(abs=='Y')
	{
		alert("Your Request has been sent.");
	}
	}
	};
	xmlhttps.open("GET","./include/validation.php?msg=sendabuse&num="+sbn+"&who="+smn,true);
	xmlhttps.send();
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
				document.getElementById("passresult").setAttribute('onmouseover','self.close()');
				}
				};
				xmlhttp.open("GET","./include/validation.php?msg=mailsent&q="+msd,true);
				xmlhttp.send();
}
function newWindow()
{
window.open('forpass.php','_blank','width=500,height=200,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');

}
