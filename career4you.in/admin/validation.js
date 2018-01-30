function manStatus(sbn)
{

	var r = confirm("Change the  Status now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=prostatus&q="+sbn,true);
xmlhttp.send();
	
	}
}
function Consider(sbn)
{
	var datapass = document.getElementById(sbn).innerHTML;
	if(datapass == 'pending')
	  {
	var r = confirm("Consider this Order now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
  
xmlhttp.open("GET","validadmin.php?msg=consider&q="+sbn,true);
xmlhttp.send();
  }
  
	}
 if(datapass == 'Processing')
	  {
		var r = confirm("Process this Order now?");
		if(r == true)
		{
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
	    rld=xmlhttp.responseText;
		reFreshed();
	    }
	  };
		  xmlhttp.open("GET","validadmin.php?msg=process&q="+sbn,true);
		  xmlhttp.send(); 
	  }
}
}
function externalReload()
{
	rld='Y';
	reFreshed();
}
function changePublish(sbn,smn)
{

	var r = confirm("Change the Publish Status now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=publish&q="+sbn+"&p="+smn,true);
xmlhttp.send();
	
	}
}
function changePaid(sbn,smn)
{
	
	var r = confirm("Change the Payment Status now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=paid&q="+sbn+"&p="+smn,true);
xmlhttp.send();
	}
}
function changePremier(sbn,smn)
{
	var r = confirm("Change the Premier Status now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=premier&q="+sbn+"&p="+smn,true);
xmlhttp.send();
	
	}
}
function showInfo(ss)
{
	if(ss<4)		      {document.getElementById("dataid").value="Enter the name....";}
	else if(ss>=4 && ss<7){document.getElementById("dataid").value="Enter the ID....";}
	else if(ss==7)		  {document.getElementById("dataid").value="Place,Category,Skill....";}
	else if(ss==8) 		  {document.getElementById("dataid").value="Place,Category,Type....";}
	else if(ss==9)		  {document.getElementById("dataid").value="Father,Place,....";}
}
function doClear()
{
	var temp = document.getElementById("dataid").value;
	if(temp=='Enter the name....'||temp=='Enter the ID....'||temp=='Place,Category,Skill....'||temp=='Place,Category,Type....'||temp=='Father,Place,....')
	{
	document.getElementById("dataid").value='';	
	}
}
function performSearch()
{
	var srvalue = document.getElementById("keyid").value;
	var srtxt   = document.getElementById("dataid").value;
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
	if(xmlhttp.readyState==4 && xmlhttp.status==200)	
	{
		document.getElementById("google").innerHTML=xmlhttp.responseText;
	}
	};
	xmlhttp.open("GET","searchresults.php?val="+srvalue+"&txt="+srtxt,true);
	xmlhttp.send();
		
}
function chekform()
{
	var u = document.getElementById("mail").value;
	var p = document.getElementById("pass").value;
	if(u != null && u != "" && p != null && p != "")
	{
		return true;
	}
	else
	{
		return false;
	}
}
function nextPage()
{
	var pg  = "<?php if(empty($_GET['page'])){echo 2;}else{echo $_GET['page']+1;} ?>";
	var url = "<?php echo $_SERVER['PHP_SELF'];?>";
	var msg = "<?php echo $_GET['msg'];?>";
	
		
		window.location=url+"?msg="+msg+"&page="+pg;
	
	
}
var rld="";
function result()
{
	
	var m = document.getElementById("searchkey").value; 
	var n = document.getElementById("idsearch").value;
	if(n != null && m != null)
	{
		window.open("searchresults.php?key="+m+"&value="+n,"_blank","width=500,height=500,left=100,top=100");
		
	}
	
}
function dynamicSearch(sbn)
    {
		 var m = document.getElementById("searchkey").value; 
	     if(m==3 || m==4 || m==6 || m==12 || m==13)
{
var xmlhttp;
if (sbn.length==0)
  {
  document.getElementById("restse").innerHTML="";
   document.getElementById("restse").style.visibility="hidden";
  return;
  }
  document.getElementById("restse").style.visibility="visible";
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
    document.getElementById("restse").innerHTML=xmlhttp.responseText;
    }
  };
xmlhttp.open("GET","validadmin.php?msg=property&q="+sbn+"&r="+m,true);
xmlhttp.send();
	
}
}
function selterm(str)
{
	var n=str.replace("_"," "); 
	//alert("dsfgsdfgnjhnj"+str);
	document.getElementById("serbut").focus();
	document.getElementById("idsearch").value=n;
	
}
function changeStatus(str)
{
	//var k = document.getElementById("").value;
	var r = confirm("Change the Payment Status now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=status&q="+str,true);
xmlhttp.send();
	}
	}
function changeSales(str)
{
//	var k = document.getElementById("").value;
	var r = confirm("Change the Sale Status now?");
	if(r == true)
	{
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
  rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=sales&q="+str,true);
xmlhttp.send();
	}
}
/*function changePublish(str)
{
	
	var r = confirm("Change the Publish Status now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=publish&q="+str,true);
xmlhttp.send();
	
	}
}*/
/*function changePremier(str)
{
	
	var r = confirm("Change the Premier Status now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=premier&q="+str,true);
xmlhttp.send();
	
	}
}*/
/*function reFreshed()
{
	if(rld == 'Y')
	{
location.reload();
}
}*/
function admChange(str,sbn)
{
//alert("this----"+str+"-----is---"+sbn);	
var r = confirm("Change the Admin Status now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=order&q="+str+"&r="+sbn,true);
xmlhttp.send();
	
	}
}
function useDelet(str)
{
//alert("this----"+str+"-----is---"+sbn);	
var r = confirm("Delete the User Now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=delete&q="+str,true);
xmlhttp.send();
	
	}
}
function useActive(str)
{
//alert("this----"+str+"-----is---"+sbn);	
var r = confirm("Activate the User Now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=undelete&q="+str,true);
xmlhttp.send();
	
	}
}
function changeadPublish(str)
{
	
	var r = confirm("Change the Publish Status now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=adpublish&q="+str,true);
xmlhttp.send();
	
	}
}
function changeadPremier(str)
{
	
	var r = confirm("Change the Premier Status now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=adpremier&q="+str,true);
xmlhttp.send();
	
	}
}
function adDelet(str)
{
//alert("this----"+str+"-----is---"+sbn);	
var r = confirm("Delete the Ad Now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=addelete&q="+str,true);
xmlhttp.send();
	
	}
}
function changePack(sbn)
{

	var r = confirm("Change the Package now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=adpackage&q="+sbn,true);
xmlhttp.send();
	
	}
}
function nextPage(page,msg)
{
	//alert("Next Page"+page);
	window.location="adminHome.php?msg="+msg+"&page="+page;
	//window.location="http://google.com/";
}
function prevPage(page,msg)
{
	//alert("Prev Page"+page);
	window.location="adminHome.php?msg="+msg+"&page="+page;
	//window.location="http://google.com/";
}
/*function changePremier(str)
{
	
	var r = confirm("Change the Premier Status now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=premier&q="+str,true);
xmlhttp.send();
	
	}
}*/
function changeStatus(str)
{
	//var k = document.getElementById("").value;
	var r = confirm("Change the Payment Status now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=status&q="+str,true);
xmlhttp.send();
	}
	}
function changeSales(str)
{
//	var k = document.getElementById("").value;
	var r = confirm("Change the Sale Status now?");
	if(r == true)
	{
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
  rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=sales&q="+str,true);
xmlhttp.send();
	}
}
/*function changePublish(str)
{
	
	var r = confirm("Change the Publish Status now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=publish&q="+str,true);
xmlhttp.send();
	
	}
}*/
/*function reFreshed()
{
	if(rld == 'Y')
	{
location.reload();
}
}*/
function admChange(str,sbn)
{
//alert("this----"+str+"-----is---"+sbn);	
var r = confirm("Change the Admin Status now?");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	reFreshed();
    }
  };
xmlhttp.open("GET","validadmin.php?msg=order&q="+str+"&r="+sbn,true);
xmlhttp.send();
	
	}
}
function reFreshed()
{
	if(rld == 'Y')
	{
location.reload();
}
}
function sendJobASMail(sbn)
{
	var r = confirm("Click OK to send mail");
	if(r == true)
	{
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
    rld=xmlhttp.responseText;
	alert("Total "+rld+" Mail Sent!");
    }
  };
  
xmlhttp.open("GET","validadmin.php?msg=jobmail&q="+sbn,true);
xmlhttp.send();
  }	
}

