function showUser(str, b) {
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("msgmail").innerHTML = xmlhttp.responseText;
		}
	};
	runAJAX();
	xmlhttp.open("GET", "./include/validation.php?msg=mail&from=acc&q=" + str
			+ "&p=" + b, true);
	xmlhttp.send();
}
function showType(str) {
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("msgtype").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=type&q=" + str, true);
	xmlhttp.send();
}
function showName(str) {
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("msgname").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=name&q=" + str, true);
	xmlhttp.send();
}
function showMobile(str) {
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("msgmobile").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=mobile&q=" + str, true);
	xmlhttp.send();
}
function showPhone(str) {
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("msgphone").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=phone&q=" + str, true);
	xmlhttp.send();
}
function showpropChange(str) {

	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("propcity").innerHTML = xmlhttp.responseText;

		}
	};
	xmlhttp
			.open("GET", "./include/searchdata.php?msg=search&dist=" + str,
					true);
	xmlhttp.send();
}
function displayCity() {
	var city = '<?php echo $city?>';
	var str = '<?php echo $district?>';
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("disp").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/searchdata.php?msg=dosearch&dist=" + str
			+ "&city=" + city, true);
	xmlhttp.send();
}
function showUser(str) {
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("msgmail").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=email&q=" + str, true);
	xmlhttp.send();
}
function showType(str) {
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("msgtype").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=type&q=" + str, true);
	xmlhttp.send();
}
function showName(str) {
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("msgname").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=name&q=" + str, true);
	xmlhttp.send();
}
function showMobile(str) {
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("msgmobile").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=mobile&q=" + str, true);
	xmlhttp.send();
}
function showPhone(str) {
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("msgphone").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=phone&q=" + str, true);
	xmlhttp.send();
}
function showPass(str) {
	var strr = document.getElementById("passa").value;
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("msgpass").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=password&p=" + str
			+ "&q=" + strr, true);
	xmlhttp.send();
}
function showPassone(str) {
	var strr = document.getElementById("passb").value;
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("msgpass").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=passone&p=" + str + "&q="
			+ strr, true);
	xmlhttp.send();
}
function validForm() {
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("warning").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=validity", true);
	xmlhttp.send();
}
function showStatus(str) {
	var user = "<?php echo $_SESSION['id'] ?>";
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("status").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=change&q=" + str + "&p="
			+ user, true);
	xmlhttp.send();
}
function makeSure(k) {
	var r = confirm("Delete the Order Now...?");
	if (r == true) {
		loadAJAX().onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("warning").innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET", "./include/validation.php?msg=status&q=" + k, true);
		xmlhttp.send();
	}
}
function searchData(dist, city, cat, type, begin) {
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("search").innerHTML = xmlhttp.responseText;
			document.getElementById("homefill").style.visibility = "hidden";
			document.getElementById("homefilled").style.visibility = "hidden";
			document.getElementById("setabid").style.position = "absolute";
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=search&dist=" + dist
			+ "&city=" + city + "&cat=" + cat + "&type=" + type + "&begin="
			+ begin, true);
	xmlhttp.send();
}
function showChange(str) {
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("city").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp
			.open("GET", "./include/searchdata.php?msg=search&dist=" + str,
					true);
	xmlhttp.send();
}