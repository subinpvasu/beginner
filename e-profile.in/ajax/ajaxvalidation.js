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
function showStatesAj() {
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("states").innerHTML = 'Please Wait...';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("states").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?call=states", true);
	xmlhttp.send();
}
function ajaxAccountLog(user,pass)
{
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			//document.getElementById("states").innerHTML = 'Please Wait...';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var retu =xmlhttp.responseText;
		if(retu=='Y')
		{
		window.location="index.php?profile";	
		}
		else
		{
		alert("Email & Password Not Matching.!");	
		}
		}
	};
	xmlhttp.open("GET", "./include/validation.php?call=login&user="+user+"&pass="+pass, true);
	xmlhttp.send();
}
function statusUpdateAj(sbn)
{
	loadAJAX().onreadystatechange = function() {
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			showRecentUpdates();
		}
	};
	xmlhttp.open("GET", "./include/validation.php?call=status&msg="+sbn, true);
	xmlhttp.send();
}
function showRecentUpdates()
{
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			//document.getElementById("states").innerHTML = 'Please Wait...';
		}
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("showhere").innerHTML=xmlhttp.responseText;
			document.getElementById("statusnow").value='You have Something to say......';
		}
	};
	xmlhttp.open("GET", "./include/validation.php?call=recent", true);
	xmlhttp.send();
}