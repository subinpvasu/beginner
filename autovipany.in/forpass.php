<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html><head>
<meta name="author" content="www.facebook.com/subinpvasu"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>Password Reset</title>
<script>
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
				}
				};
				xmlhttp.open("GET","./include/validation.php?msg=mailsent&q="+msd,true);
				xmlhttp.send();
}
</script>
</head>
<body id="passresult">
<div align="center">Enter Your Email ID:
<input type="text" size="30" maxlength="60" name="mail" onkeyup="showUser(this.value)" id="mail"/><br />
<p id="resultant"></p>
</div>
</body>
</html>
