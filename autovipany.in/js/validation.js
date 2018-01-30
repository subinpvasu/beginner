
function showUser(str)
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
    document.getElementById("msgmail").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","./include/validation.php?msg=email&q="+str,true);
xmlhttp.send();
}

///*******************type
function showType(str)
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
    document.getElementById("msgtype").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","./include/validation.php?msg=type&q="+str,true);
xmlhttp.send();
}
////////************************name
function showName(str)
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
    document.getElementById("msgname").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","./include/validation.php?msg=name&q="+str,true);
xmlhttp.send();
}
//**********************************mobile
function showMobile(str)
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
    document.getElementById("msgmobile").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","./include/validation.php?msg=mobile&q="+str,true);
xmlhttp.send();
}
//*********************************landline 
function showPhone(str)
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
    document.getElementById("msgphone").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","./include/validation.php?msg=phone&q="+str,true);
xmlhttp.send();
}
//************************password