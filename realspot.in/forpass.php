<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html><head>
<title>
Realspot.in | Real Estate  in Thrissur | Free Realestate websites in Kerala | 
Real Estate Kerala | Kerala top realestate  | Free Real Estate property listing websites | 
Real Estate Property Agents In Kerala | Kerala Real Estate Property listing | 
Kerala Real Estate Properties | RealSpot.in Kerala 
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Real Estate Kerala, Property in Kerala and Real Estate Agents in Kerala, Kerala Real Estate, Thrissur Properties, Flats for sale kerala, Villas in Thrissur, Apartments in Thrissur, Flats at Kerala, Free Real Estate Kerala, Real estate" />
<meta name="keywords" content="Real Estate  Kerala, Property in Kerala, Property Agents In Kerala, real estate Kerala, Kerala RealEstate, free kerala property website, Kerala RealEstate properties, Kerala  land for sale, Villas in Kochi,  house for rent in Thrissur, Thrissur Real Estate, upcoming villas in Thrissur, rubber estate in Idukki, realestate website design in Thrissur" />
<meta name="Real Estate  Kerala" content="Property Agents In Kerala, Real Estate In Kerala"/>
<meta name="page-topic" content="Property Agents In Kerala, Real Estate In Kerala, Property of Kerala, real estate in Kerala, free properties in Kerala, Kerala property, Kerala nri investors, buy, sell, rent, Kerala, India."/>
<meta name="page-type" content="Property Agents In Kerala, Real Estate In Kerala, Property of Kerala, real estate in Kerala, free properties in india, india property, investors, buy, sell, rent, Kerala, India."/>
<meta name="audience" content="all"/>
<meta name="author" content="gitacommunications.com"/>
<meta name="description" content="real estate kerala" />
<meta name="keywords" content="real estate kerala, real estate thrissur,real estate"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>Password Reset</title>
<script>
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
