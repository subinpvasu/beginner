// global variables //search results
var TIMER = 5;
var SPEED = 10;
var WRAPPER = "subject";

// calculate the current window width //
function pageWidth() {
	return window.innerWidth != null ? window.innerWidth
			: document.documentElement && document.documentElement.clientWidth ? document.documentElement.clientWidth
					: document.body != null ? document.body.clientWidth : null;
}

// calculate the current window height //
function pageHeight() {
	return window.innerHeight != null ? window.innerHeight
			: document.documentElement && document.documentElement.clientHeight ? document.documentElement.clientHeight
					: document.body != null ? document.body.clientHeight : null;
}

// calculate the current window vertical offset //
function topPosition() {
	return typeof window.pageYOffset != 'undefined' ? window.pageYOffset
			: document.documentElement && document.documentElement.scrollTop ? document.documentElement.scrollTop
					: document.body.scrollTop ? document.body.scrollTop : 0;
}

// calculate the position starting at the left of the window //
function leftPosition() {
	return typeof window.pageXOffset != 'undefined' ? window.pageXOffset
			: document.documentElement && document.documentElement.scrollLeft ? document.documentElement.scrollLeft
					: document.body.scrollLeft ? document.body.scrollLeft : 0;
}

// build/show the dialog box, populate the data and call the fadeDialog function
// //

var titlemsg;
/*
 * ########################################################################################################
 * ########################################################################################################
 */
function advancedSearchResults(){
	titlemsg = 'www.vadhu-varan.com';

	
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				dialogcontent.style.height = '550px';
				dialogcontent.style.overflow = 'auto';
				dialogcontent.innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET", "admprocess.php?msg=advancedSearch", true);
		xmlhttp.send();
	

	type = 'success';

	var dialog;
	var dialogheader;
	var dialogclose;
	var dialogtitle;
	var dialogcontent;
	var dialogmask;
	if (!document.getElementById('dialog')) {
		dialog = document.createElement('div');
		dialog.id = 'dialog';
		dialogheader = document.createElement('div');
		dialogheader.id = 'dialog-header';
		dialogtitle = document.createElement('div');
		dialogtitle.id = 'dialog-title';
		dialogclose = document.createElement('div');
		dialogclose.id = 'dialog-close';
		dialogcontent = document.createElement('div');
		dialogcontent.id = 'dialog-content';
		dialogmask = document.createElement('div');
		dialogmask.id = 'dialog-mask';
		document.body.appendChild(dialogmask);
		document.body.appendChild(dialog);
		dialog.appendChild(dialogheader);
		dialogheader.appendChild(dialogtitle);
		dialogheader.appendChild(dialogclose);
		dialog.appendChild(dialogcontent);
		dialogclose.setAttribute('onclick', 'hideDialog()');
		dialogclose.onclick = hideDialog;
	} else {
		dialog = document.getElementById('dialog');
		dialogheader = document.getElementById('dialog-header');
		dialogtitle = document.getElementById('dialog-title');
		dialogclose = document.getElementById('dialog-close');
		dialogcontent = document.getElementById('dialog-content');
		dialogmask = document.getElementById('dialog-mask');
		dialogmask.style.visibility = "visible";
		dialog.style.visibility = "visible";
	}
	dialog.style.opacity = .00;
	dialog.style.filter = 'alpha(opacity=0)';
	dialog.alpha = 0;
	var width = pageWidth();
	var height = pageHeight();
	var left = leftPosition();
	var top = topPosition();
	var dialogwidth = dialog.offsetWidth;
	var dialogheight = dialog.offsetHeight;
	var topposition = top;
	var leftposition = left + (width / 2) - (dialogwidth / 2);
	dialog.style.top = topposition + "px";
	dialog.style.left = leftposition + "px";
	dialogheader.className = type + "header";
	dialogtitle.innerHTML = titlemsg;
	dialogcontent.className = "success";
	dialogcontent.innerHTML = '<img src="../images/loading.gif" />';
	var content = document.getElementById(WRAPPER);
	dialogmask.style.height = content.offsetHeight + 'px';
	dialog.timer = setInterval("fadeDialog(1)", TIMER);

}





/*
 * #######################################################################################################
 * #######################################################################################################
 */
function showDisplay(str) {
	titlemsg = 'Profile Details';

	if (str) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				dialogcontent.style.height = '550px';
				dialogcontent.style.overflow = 'auto';
				dialogcontent.innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET", "admprocess.php?msg=profile&num=" + str, true);
		xmlhttp.send();
	}

	type = 'success';

	var dialog;
	var dialogheader;
	var dialogclose;
	var dialogtitle;
	var dialogcontent;
	var dialogmask;
	if (!document.getElementById('dialog')) {
		dialog = document.createElement('div');
		dialog.id = 'dialog';
		dialogheader = document.createElement('div');
		dialogheader.id = 'dialog-header';
		dialogtitle = document.createElement('div');
		dialogtitle.id = 'dialog-title';
		dialogclose = document.createElement('div');
		dialogclose.id = 'dialog-close';
		dialogcontent = document.createElement('div');
		dialogcontent.id = 'dialog-content';
		dialogmask = document.createElement('div');
		dialogmask.id = 'dialog-mask';
		document.body.appendChild(dialogmask);
		document.body.appendChild(dialog);
		dialog.appendChild(dialogheader);
		dialogheader.appendChild(dialogtitle);
		dialogheader.appendChild(dialogclose);
		dialog.appendChild(dialogcontent);
		dialogclose.setAttribute('onclick', 'hideDialog()');
		dialogclose.onclick = hideDialog;
	} else {
		dialog = document.getElementById('dialog');
		dialogheader = document.getElementById('dialog-header');
		dialogtitle = document.getElementById('dialog-title');
		dialogclose = document.getElementById('dialog-close');
		dialogcontent = document.getElementById('dialog-content');
		dialogmask = document.getElementById('dialog-mask');
		dialogmask.style.visibility = "visible";
		dialog.style.visibility = "visible";
	}
	dialog.style.opacity = .00;
	dialog.style.filter = 'alpha(opacity=0)';
	dialog.alpha = 0;
	var width = pageWidth();
	var height = pageHeight();
	var left = leftPosition();
	var top = topPosition();
	var dialogwidth = dialog.offsetWidth;
	var dialogheight = dialog.offsetHeight;
	var topposition = top;
	var leftposition = left + (width / 2) - (dialogwidth / 2);
	dialog.style.top = topposition + "px";
	dialog.style.left = leftposition + "px";
	dialogheader.className = type + "header";
	dialogtitle.innerHTML = titlemsg;
	dialogcontent.className = "success";
	dialogcontent.innerHTML = '<img src="../images/loading.gif" />';
	var content = document.getElementById(WRAPPER);
	dialogmask.style.height = content.offsetHeight + 'px';
	dialog.timer = setInterval("fadeDialog(1)", TIMER);

}

// ///////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////
function doRoughSearch(klm) {
	titlemsg = 'Search Results';
	var g = document.getElementById("genderz").value;
	var t = document.getElementById("toage").value;
	var f = document.getElementById("fromage").value;
	var r = document.getElementById("relgin").value;
	if (g.length == 0 || t.length == 0 || f.length == 0 || r.length == 0) {
		alert("Please Select Valid Data");
		return false;
	} else {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState < 4) {
				try {
					document.getElementById("container").innerHTML = '<img src="images/loading.gif" />';
				} catch (e) {
					// TODO: handle exception
				}
			}
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				dialog.style.top = '50px';
				dialogcontent.innerHTML = xmlhttp.responseText;

			}
		};
		xmlhttp.open("GET", "./include/validation.php?roughsearch=true&gender="
				+ g + "&toage=" + t + "&fromage=" + f + "&relg=" + r + "&cur="
				+ klm, true);
		xmlhttp.send();

		type = 'success';

		var dialog;
		var dialogheader;
		var dialogclose;
		var dialogtitle;
		var dialogcontent;
		var dialogmask;
		if (!document.getElementById('dialog')) {
			dialog = document.createElement('div');
			dialog.id = 'dialog';
			dialogheader = document.createElement('div');
			dialogheader.id = 'dialog-header';
			dialogtitle = document.createElement('div');
			dialogtitle.id = 'dialog-title';
			dialogclose = document.createElement('div');
			dialogclose.id = 'dialog-close';
			dialogcontent = document.createElement('div');
			dialogcontent.id = 'dialog-content';
			dialogmask = document.createElement('div');
			dialogmask.id = 'dialog-mask';
			document.body.appendChild(dialogmask);
			document.body.appendChild(dialog);
			dialog.appendChild(dialogheader);
			dialogheader.appendChild(dialogtitle);
			dialogheader.appendChild(dialogclose);
			dialog.appendChild(dialogcontent);
			dialogcontent.setAttribute('onmouseover', 'arrageGrid()');
			dialogclose.setAttribute('onclick', 'hideDialog()');
			dialogclose.onclick = hideDialog;
		} else {
			dialog = document.getElementById('dialog');
			dialogheader = document.getElementById('dialog-header');
			dialogtitle = document.getElementById('dialog-title');
			dialogclose = document.getElementById('dialog-close');
			dialogcontent = document.getElementById('dialog-content');
			dialogmask = document.getElementById('dialog-mask');
			dialogmask.style.visibility = "visible";
			dialog.style.visibility = "visible";
		}
		dialog.style.opacity = .00;
		dialog.style.filter = 'alpha(opacity=0)';
		dialog.alpha = 0;
		var width = pageWidth();
		var height = pageHeight();
		var left = leftPosition();
		var top = topPosition();
		var dialogwidth = dialog.offsetWidth;
		var dialogheight = dialog.offsetHeight;
		var topposition = top;
		var leftposition = left + (width / 2) - (dialogwidth / 2);
		dialog.style.top = topposition + "px";
		dialog.style.left = leftposition + "px";
		dialogheader.className = type + "header";
		dialogtitle.innerHTML = titlemsg;
		dialogcontent.className = "success";
		// dialogcontent.innerHTML= '<img src="../images/loading.gif" />';
		var content = document.getElementById(WRAPPER);
		dialogmask.style.height = content.offsetHeight + 'px';
		dialog.timer = setInterval("fadeDialog(1)", TIMER);

	}
}

function showSearch() {
	titlemsg = 'Advanced Search';

	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			try {
				document.getElementById("container").innerHTML = '<img src="images/loading.gif" />';
			} catch (e) {
				// TODO: handle exception
			}
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			dialog.style.top = '50px';
			dialogcontent.innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=adsearch", true);
	xmlhttp.send();

	type = 'success';

	var dialog;
	var dialogheader;
	var dialogclose;
	var dialogtitle;
	var dialogcontent;
	var dialogmask;
	if (!document.getElementById('dialog')) {
		dialog = document.createElement('div');
		dialog.id = 'dialog';
		dialogheader = document.createElement('div');
		dialogheader.id = 'dialog-header';
		dialogtitle = document.createElement('div');
		dialogtitle.id = 'dialog-title';
		dialogclose = document.createElement('div');
		dialogclose.id = 'dialog-close';
		dialogcontent = document.createElement('div');
		dialogcontent.id = 'dialog-content';
		dialogmask = document.createElement('div');
		dialogmask.id = 'dialog-mask';
		document.body.appendChild(dialogmask);
		document.body.appendChild(dialog);
		dialog.appendChild(dialogheader);
		dialogheader.appendChild(dialogtitle);
		dialogheader.appendChild(dialogclose);
		dialog.appendChild(dialogcontent);
		dialogclose.setAttribute('onclick', 'hideDialog()');
		dialogclose.onclick = hideDialog;
	} else {
		dialog = document.getElementById('dialog');
		dialogheader = document.getElementById('dialog-header');
		dialogtitle = document.getElementById('dialog-title');
		dialogclose = document.getElementById('dialog-close');
		dialogcontent = document.getElementById('dialog-content');
		dialogmask = document.getElementById('dialog-mask');
		dialogmask.style.visibility = "visible";
		dialog.style.visibility = "visible";
	}
	dialog.style.opacity = .00;
	dialog.style.filter = 'alpha(opacity=0)';
	dialog.alpha = 0;
	var width = pageWidth();
	var height = pageHeight();
	var left = leftPosition();
	var top = topPosition();
	var dialogwidth = dialog.offsetWidth;
	var dialogheight = dialog.offsetHeight;
	var topposition = top;
	var leftposition = left + (width / 2) - (dialogwidth / 2);
	dialog.style.top = topposition + "px";
	dialog.style.left = leftposition + "px";
	dialogheader.className = type + "header";
	dialogtitle.innerHTML = titlemsg;
	dialogcontent.className = "success";
	// dialogcontent.innerHTML= '<img src="../images/loading.gif" />';
	var content = document.getElementById(WRAPPER);
	dialogmask.style.height = content.offsetHeight + 'px';
	dialog.timer = setInterval("fadeDialog(1)", TIMER);

}

function showSearchDetails(smn) {
	// /return the values that page to go,
	titlemsg = 'Search Results';

	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			try {
				document.getElementById("container").innerHTML = '<img src="images/loading.gif" />';
			} catch (e) {
				// TODO: handle exception
			}
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			dialog.style.top = '50px';
			dialogcontent.style.height = '500px';
			dialogcontent.style.overflow = 'auto';
			dialogcontent.innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=detailsearch&cur=" + smn,
			true);
	xmlhttp.send();

	type = 'success';

	var dialog;
	var dialogheader;
	var dialogclose;
	var dialogtitle;
	var dialogcontent;
	var dialogmask;
	if (!document.getElementById('dialog')) {
		dialog = document.createElement('div');
		dialog.id = 'dialog';
		dialogheader = document.createElement('div');
		dialogheader.id = 'dialog-header';
		dialogtitle = document.createElement('div');
		dialogtitle.id = 'dialog-title';
		dialogclose = document.createElement('div');
		dialogclose.id = 'dialog-close';
		dialogcontent = document.createElement('div');
		dialogcontent.id = 'dialog-content';
		dialogmask = document.createElement('div');
		dialogmask.id = 'dialog-mask';
		document.body.appendChild(dialogmask);
		document.body.appendChild(dialog);
		dialog.appendChild(dialogheader);
		dialogheader.appendChild(dialogtitle);
		dialogheader.appendChild(dialogclose);
		dialog.appendChild(dialogcontent);
		dialogcontent.setAttribute('onmouseover', 'arrageGrid()');
		dialogclose.setAttribute('onclick', 'hideDialog()');
		dialogclose.onclick = hideDialog;
	} else {
		dialog = document.getElementById('dialog');
		dialogheader = document.getElementById('dialog-header');
		dialogtitle = document.getElementById('dialog-title');
		dialogclose = document.getElementById('dialog-close');
		dialogcontent = document.getElementById('dialog-content');
		dialogmask = document.getElementById('dialog-mask');
		dialogcontent.setAttribute('onmouseover', 'arrageGrid()');
		dialogmask.style.visibility = "visible";
		dialog.style.visibility = "visible";
	}
	dialog.style.opacity = .00;
	dialog.style.filter = 'alpha(opacity=0)';
	dialog.alpha = 0;
	var width = pageWidth();
	var height = pageHeight();
	var left = leftPosition();
	var top = topPosition();
	var dialogwidth = dialog.offsetWidth;
	var dialogheight = dialog.offsetHeight;
	var topposition = top;
	var leftposition = left + (width / 2) - (dialogwidth / 2);
	dialog.style.top = topposition + "px";
	dialog.style.left = leftposition + "px";
	dialogheader.className = type + "header";
	dialogtitle.innerHTML = titlemsg;
	dialogcontent.className = "success";
	// dialogcontent.innerHTML= '<img src="../images/loading.gif" />';
	var content = document.getElementById(WRAPPER);
	dialogmask.style.height = content.offsetHeight + 'px';
	dialog.timer = setInterval("fadeDialog(1)", TIMER);

}

function showPremium(str) {
	titlemsg = 'Profile Details';

	if (str) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				/*
				 * dialogcontent.style.height='550px';
				 * dialogcontent.style.overflow='auto';
				 */
				document.getElementById("proshow").innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET", "./include/validation.php?profile=premium&num="
				+ str, true);
		xmlhttp.send();
	}

}

function showGolden(str) {
	titlemsg = 'Profile Details';

	if (str) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				/*
				 * dialogcontent.style.height='550px';
				 * dialogcontent.style.overflow='auto';
				 */
				document.getElementById("proshow").innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET", "./include/validation.php?profile=golden&num="
				+ str, true);
		xmlhttp.send();
	}

}
function showGuest(str) {
	titlemsg = 'Profile Details';

	if (str) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				/*
				 * dialogcontent.style.height='550px';
				 * dialogcontent.style.overflow='auto';
				 */
				document.getElementById("proshow").innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET",
				"./include/validation.php?profile=guest&num=" + str, true);
		xmlhttp.send();
	}

}
// ///////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////////////////////////

function showInform() {

	titlemsg = 'Profile Plan Details';

	var str = document.getElementById("plan").value;
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			dialogcontent.innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp
			.open("GET", "./include/validation.php?msg=inform&name=" + str,
					true);
	xmlhttp.send();
	type = 'success';
	var dialog;
	var dialogheader;
	var dialogclose;
	var dialogtitle;
	var dialogcontent;
	var dialogmask;
	if (!document.getElementById('dialog')) {
		dialog = document.createElement('div');
		dialog.id = 'dialog';
		dialogheader = document.createElement('div');
		dialogheader.id = 'dialog-header';
		dialogtitle = document.createElement('div');
		dialogtitle.id = 'dialog-title';
		dialogclose = document.createElement('div');
		dialogclose.id = 'dialog-close';
		dialogcontent = document.createElement('div');
		dialogcontent.id = 'dialog-content';
		dialogmask = document.createElement('div');
		dialogmask.id = 'dialog-mask';
		document.body.appendChild(dialogmask);
		document.body.appendChild(dialog);
		dialog.appendChild(dialogheader);
		dialogheader.appendChild(dialogtitle);
		dialogheader.appendChild(dialogclose);
		dialog.appendChild(dialogcontent);
		;
		dialogclose.setAttribute('onclick', 'hideDialog()');
		dialogclose.onclick = hideDialog;
	} else {
		dialog = document.getElementById('dialog');
		dialogheader = document.getElementById('dialog-header');
		dialogtitle = document.getElementById('dialog-title');
		dialogclose = document.getElementById('dialog-close');
		dialogcontent = document.getElementById('dialog-content');
		dialogmask = document.getElementById('dialog-mask');
		dialogmask.style.visibility = "visible";
		dialog.style.visibility = "visible";
	}
	dialog.style.opacity = .00;
	dialog.style.filter = 'alpha(opacity=0)';
	dialog.alpha = 0;
	var width = pageWidth();
	var height = pageHeight();
	var left = leftPosition();
	var top = topPosition();
	var dialogwidth = dialog.offsetWidth;
	var dialogheight = dialog.offsetHeight;
	var topposition = top;
	var leftposition = left + (width / 2) - (dialogwidth / 2);
	dialog.style.top = topposition + "px";
	dialog.style.left = leftposition + "px";
	dialogheader.className = type + "header";
	dialogtitle.innerHTML = titlemsg;
	dialogcontent.className = "success";
	// dialogcontent.innerHTML = "message"+str;
	var content = document.getElementById(WRAPPER);
	dialogmask.style.height = content.offsetHeight + 'px';
	dialog.timer = setInterval("fadeDialog(1)", TIMER);
}

function employerApply(sbn, smn) {
	titlemsg = 'Send Resume';
	var r = confirm("Do You Really want to buy this Resume.....?");
	if (r == true) {
		document.getElementById("result").innerHTML = "";
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				dialogcontent.innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET", "./include/validation.php?msg=empapply&q=" + sbn
				+ "&p=" + smn, true);
		xmlhttp.send();

		type = 'success';
		var dialog;
		var dialogheader;
		var dialogclose;
		var dialogtitle;
		var dialogcontent;
		var dialogmask;
		if (!document.getElementById('dialog')) {
			dialog = document.createElement('div');
			dialog.id = 'dialog';
			dialogheader = document.createElement('div');
			dialogheader.id = 'dialog-header';
			dialogtitle = document.createElement('div');
			dialogtitle.id = 'dialog-title';
			dialogclose = document.createElement('div');
			dialogclose.id = 'dialog-close';
			dialogcontent = document.createElement('div');
			dialogcontent.id = 'dialog-content';
			dialogmask = document.createElement('div');
			dialogmask.id = 'dialog-mask';
			document.body.appendChild(dialogmask);
			document.body.appendChild(dialog);
			dialog.appendChild(dialogheader);
			dialogheader.appendChild(dialogtitle);
			dialogheader.appendChild(dialogclose);
			dialog.appendChild(dialogcontent);
			;
			dialogclose.setAttribute('onclick', 'hideDialog()');
			dialogclose.onclick = hideDialog;
		} else {
			dialog = document.getElementById('dialog');
			dialogheader = document.getElementById('dialog-header');
			dialogtitle = document.getElementById('dialog-title');
			dialogclose = document.getElementById('dialog-close');
			dialogcontent = document.getElementById('dialog-content');
			dialogmask = document.getElementById('dialog-mask');
			dialogmask.style.visibility = "visible";
			dialog.style.visibility = "visible";
		}
		dialog.style.opacity = .00;
		dialog.style.filter = 'alpha(opacity=0)';
		dialog.alpha = 0;
		var width = pageWidth();
		var height = pageHeight();
		var left = leftPosition();
		var top = topPosition();
		var dialogwidth = dialog.offsetWidth;
		var dialogheight = dialog.offsetHeight;
		var topposition = top;
		var leftposition = left + (width / 2) - (dialogwidth / 2);
		dialog.style.top = topposition + "px";
		dialog.style.left = leftposition + "px";
		dialogheader.className = type + "header";
		dialogtitle.innerHTML = titlemsg;
		dialogcontent.className = "success";
		// dialogcontent.innerHTML = "message"+str;
		var content = document.getElementById(WRAPPER);
		dialogmask.style.height = content.offsetHeight + 'px';
		dialog.timer = setInterval("fadeDialog(1)", TIMER);
	}
}
// //````````````````````````````````````````````````````````/`````````````````````/```````````
// hide the dialog box //
function hideDialog() {
	var dialog = document.getElementById('dialog');
	clearInterval(dialog.timer);
	dialog.timer = setInterval("fadeDialog(0)", TIMER);
}

// fade-in the dialog box //
function fadeDialog(flag) {
	if (flag == null) {
		flag = 1;
	}
	var dialog = document.getElementById('dialog');
	var value;
	if (flag == 1) {
		value = dialog.alpha + SPEED;
	} else {
		value = dialog.alpha - SPEED;
	}
	dialog.alpha = value;
	dialog.style.opacity = (value / 100);
	dialog.style.filter = 'alpha(opacity=' + value + ')';
	if (value >= 99) {
		clearInterval(dialog.timer);
		dialog.timer = null;
	} else if (value <= 1) {
		dialog.style.visibility = "hidden";
		document.getElementById('dialog-mask').style.visibility = "hidden";
		clearInterval(dialog.timer);
	}
}

// ##########################################@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@%%%%%%%%%%%%%%%%%%%%%%%%%%&&&&&&&&&&&&&&&&quot;
function arrageGrid() {
	try {
		document.getElementById("div1").style.top = '10px'; // firstrow350
		document.getElementById("div1").style.left = '0px';

		document.getElementById("div2").style.top = '10px';
		document.getElementById("div2").style.left = '200px';

		document.getElementById("div3").style.top = '10px';
		document.getElementById("div3").style.left = '400px';

		document.getElementById("div4").style.top = '10px';
		document.getElementById("div4").style.left = '600px'; // first row

		document.getElementById("div5").style.top = '250px'; // scd row
		document.getElementById("div5").style.left = '0px';

		document.getElementById("div6").style.top = '250px';
		document.getElementById("div6").style.left = '200px';

		document.getElementById("div7").style.top = '250px';
		document.getElementById("div7").style.left = '400px';

		document.getElementById("div8").style.top = '250px';
		document.getElementById("div8").style.left = '600px'; // scd row

		document.getElementById("div9").style.top = '500px'; // thrd row
		document.getElementById("div9").style.left = '0px';

		document.getElementById("div10").style.top = '500px';
		document.getElementById("div10").style.left = '200px';

		document.getElementById("div11").style.top = '500px';
		document.getElementById("div11").style.left = '400px';

		document.getElementById("div12").style.top = '500px';
		document.getElementById("div12").style.left = '600px'; // thrd row

	} catch (e) {
		// TODO: handle exception
	}

}
function arrangeGridshape() {
	try {
		document.getElementById("div1").style.top = '350px'; // firstrow350
		document.getElementById("div1").style.left = '0px';

		document.getElementById("div2").style.top = '350px';
		document.getElementById("div2").style.left = '200px';

		document.getElementById("div3").style.top = '350px';
		document.getElementById("div3").style.left = '400px';

		document.getElementById("div4").style.top = '350px';
		document.getElementById("div4").style.left = '600px'; // first row

		document.getElementById("div5").style.top = '600px'; // scd row
		document.getElementById("div5").style.left = '0px';

		document.getElementById("div6").style.top = '600px';
		document.getElementById("div6").style.left = '200px';

		document.getElementById("div7").style.top = '600px';
		document.getElementById("div7").style.left = '400px';

		document.getElementById("div8").style.top = '600px';
		document.getElementById("div8").style.left = '600px'; // scd row

		document.getElementById("div9").style.top = '850px'; // thrd row
		document.getElementById("div9").style.left = '0px';

		document.getElementById("div10").style.top = '850px';
		document.getElementById("div10").style.left = '200px';

		document.getElementById("div11").style.top = '850px';
		document.getElementById("div11").style.left = '400px';

		document.getElementById("div12").style.top = '850px';
		document.getElementById("div12").style.left = '600px'; // thrd row

	} catch (e) {
		// TODO: handle exception
	}

}