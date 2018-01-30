var storage;
var fresh;

function nextPageDetails()
{
	var page = document.getElementById("page").value;
	page.style.display='none';
	
	
}


function disLoad() {
	if (fresh == 'Y') {
		window.location.reload();
	}
}
function displayonVadhu(sbn) {
	/*
	 * begin end numbers needed for pagination
	 */

	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '';
			document.getElementById("linkcol").style.left = '';
			document.getElementById("linkcol").style.top = '';
			document.getElementById("linkcol").style.position = '';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
			document.getElementById("admin-title").innerHTML = 'Vadhu Details - Online Entry';
		}
	};
	xmlhttp.open("GET", "admprocess.php?vadhu-on=true&begin="+sbn, true);
	xmlhttp.send();
}
function displayonVaran(sbn) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '';
			document.getElementById("linkcol").style.left = '';
			document.getElementById("linkcol").style.top = '';
			document.getElementById("linkcol").style.position = '';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
			document.getElementById("admin-title").innerHTML = 'Varan Details - Online Entry';
		}
	};
	xmlhttp.open("GET", "admprocess.php?varan-on=true&begin="+sbn, true);
	xmlhttp.send();
}
function displaydtVaran(sbn) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '';
			document.getElementById("linkcol").style.left = '';
			document.getElementById("linkcol").style.top = '';
			document.getElementById("linkcol").style.position = '';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
			document.getElementById("admin-title").innerHTML = 'Varan Details - Data Entry';
		}
	};
	xmlhttp.open("GET", "admprocess.php?varan-dt=true&begin="+sbn, true);
	xmlhttp.send();
}
function displaydtVadhu(sbn) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '';
			document.getElementById("linkcol").style.left = '';
			document.getElementById("linkcol").style.top = '';
			document.getElementById("linkcol").style.position = '';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
			document.getElementById("admin-title").innerHTML = 'Vadhu Details - Data Entry';
		}
	};
	xmlhttp.open("GET", "admprocess.php?vadhu-dt=true&begin="+sbn, true);
	xmlhttp.send();
}
function doTheses() {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

			storage = xmlhttp.responseText;
			serveNow();
			document.getElementById("admin-details").innerHTML = '';
			displayonVadhu(0);
		}
	};
	xmlhttp.open("GET", "admprocess.php?these=true", true);
	xmlhttp.send();
}
function serveNow() {
	var n = storage.split("|");
	document.getElementById("vdp").innerHTML = n[0];
	document.getElementById("vrp").innerHTML = n[1];
	document.getElementById("pup").innerHTML = n[2];
	document.getElementById("upp").innerHTML = n[3];
	document.getElementById("tpo").innerHTML = n[4];
	document.getElementById("tpd").innerHTML = n[5];
	document.getElementById("gup").innerHTML = n[6];
	document.getElementById("glp").innerHTML = n[7];
	document.getElementById("prp").innerHTML = n[8];
	document.getElementById("vtp").innerHTML = n[9];
}
function createForm() {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '';
			document.getElementById("linkcol").style.left = '';
			document.getElementById("linkcol").style.top = '';
			document.getElementById("linkcol").style.position = '';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
			document.getElementById("admin-title").innerHTML = 'Data Entry Operator Registration Form';
		}
	};
	xmlhttp.open("GET", "admprocess.php?dataform=true", true);
	xmlhttp.send();
}
function submitForm() {
	var name = document.getElementById("name").value;
	var addr = document.getElementById("address").value;
	var mobl = document.getElementById("mobile").value;
	var mail = document.getElementById("email").value;
	var pass = document.getElementById("password").value;

	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '';
			document.getElementById("linkcol").style.left = '';
			document.getElementById("linkcol").style.top = '';
			document.getElementById("linkcol").style.position = '';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
			displayOperator();
		}
	};
	xmlhttp.open("GET", "admprocess.php?dataform=submitted&name=" + name
			+ "&addr=" + addr + "&mobl=" + mobl + "&mail=" + mail + "&pass="
			+ pass, true);
	xmlhttp.send();
}
function displayOperator() {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '';
			document.getElementById("linkcol").style.left = '';
			document.getElementById("linkcol").style.top = '';
			document.getElementById("linkcol").style.position = '';
			document.getElementById("admin-title").innerHTML = 'Data Entry Operator Details';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "admprocess.php?operator=show", true);
	xmlhttp.send();
}
function displayForm() {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '178px';
			document.getElementById("linkcol").style.left = '40px';
			document.getElementById("linkcol").style.top = '50px';
			document.getElementById("linkcol").style.position = 'fixed';
			document.getElementById("admin-title").innerHTML = 'Add Profile';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "adminEdit.php?msg=dataform", true);
	xmlhttp.send();

}
function editadForm(sbn) {
	hideDialog();
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '178px';
			document.getElementById("linkcol").style.left = '40px';
			document.getElementById("linkcol").style.top = '50px';
			document.getElementById("linkcol").style.position = 'fixed';
			document.getElementById("admin-title").innerHTML = 'Add Profile';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "adminEdit.php?msg=dataformsed&id="+sbn, true);
	xmlhttp.send();

}
function changeStatus(id, tuple, value) {
	var r = confirm("Click OK to Proceed.........");
	if (r == true) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

				fresh = xmlhttp.responseText;
				disLoad();
				// put some code to reload the page;

			}
		};
		xmlhttp.open("GET", "admprocess.php?msg=statuschange&id=" + id
				+ "&tuple=" + tuple + "&value=" + value, true);
		xmlhttp.send();
	}
}
function displayGuestPro(sbn) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '';
			document.getElementById("linkcol").style.left = '';
			document.getElementById("linkcol").style.top = '';
			document.getElementById("linkcol").style.position = '';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
			document.getElementById("admin-title").innerHTML = 'Guest Profiles';
		}
	};
	xmlhttp.open("GET", "admprocess.php?guestpro=true&begin="+sbn, true);
	xmlhttp.send();
}
function displayGoldPro(sbn) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '';
			document.getElementById("linkcol").style.left = '';
			document.getElementById("linkcol").style.top = '';
			document.getElementById("linkcol").style.position = '';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
			document.getElementById("admin-title").innerHTML = 'Golden Profiles';
		}
	};
	xmlhttp.open("GET", "admprocess.php?goldpro=true&begin="+sbn, true);
	xmlhttp.send();
}
function displayPremiumPro(sbn) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '';
			document.getElementById("linkcol").style.left = '';
			document.getElementById("linkcol").style.top = '';
			document.getElementById("linkcol").style.position = '';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
			document.getElementById("admin-title").innerHTML = 'Premium Profiles';
		}
	};
	xmlhttp.open("GET", "admprocess.php?premiumpro=true&begin="+sbn, true);
	xmlhttp.send();
}
function displayPublishPro(sbn) {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '';
			document.getElementById("linkcol").style.left = '';
			document.getElementById("linkcol").style.top = '';
			document.getElementById("linkcol").style.position = '';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
			document.getElementById("admin-title").innerHTML = 'Premium Profiles';
		}
	};
	xmlhttp.open("GET", "admprocess.php?publishpro=true&begin="+sbn, true);
	xmlhttp.send();
}
function displayUnpubPro(sbn){
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '';
			document.getElementById("linkcol").style.left = '';
			document.getElementById("linkcol").style.top = '';
			document.getElementById("linkcol").style.position = '';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
			document.getElementById("admin-title").innerHTML = 'Premium Profiles';
		}
	};
	xmlhttp.open("GET", "admprocess.php?unpubpro=true&begin="+sbn, true);
	xmlhttp.send();
}
function displayAbuse()
{
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '';
			document.getElementById("linkcol").style.left = '';
			document.getElementById("linkcol").style.top = '';
			document.getElementById("linkcol").style.position = '';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
			document.getElementById("admin-title").innerHTML = 'Abuse Profiles';
		}
	};
	xmlhttp.open("GET", "admprocess.php?abuse=true", true);
	xmlhttp.send();
}
function displaysearchAdv()
{
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("admin-details").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("linkrow").style.width = '';
			document.getElementById("linkcol").style.left = '';
			document.getElementById("linkcol").style.top = '';
			document.getElementById("linkcol").style.position = '';
			document.getElementById("admin-details").innerHTML = xmlhttp.responseText;
			document.getElementById("admin-title").innerHTML = 'advanced search';
		}
	};
	xmlhttp.open("GET", "admprocess.php?advsearch=true", true);
	xmlhttp.send();
}
function getDoc(sbn)
{
	return document.getElementById(sbn);
}
function getResultsNow()
{
	var who = getDoc('whois').value;
	var mar = getDoc('marriage').value;
	var rel = getDoc('religion').value;
	var cas = getDoc('caste').value;
	
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("resultDisplay").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("resultDisplay").innerHTML = xmlhttp.responseText;
			}
	};
	xmlhttp.open("GET", "admprocess.php?msg=displayResult&who="+who+"&mar="+mar+"&rel="+rel+"&cas="+cas, true);
	xmlhttp.send();
	
}
function showHeadings(sbn,smn)
{
var gender = document.getElementById(sbn).value;
var religi = document.getElementById(smn).value;
/*
 * change the function to get the desired details and the present query to page.
 */

	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("searchHead").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("searchHead").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "admprocess.php?msg=headerShow&gender="+gender+"&religion="+religi, true);
	xmlhttp.send();
}
function showCandidateByParam(religion,gender,caste)
{
	
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("resultDisplay").innerHTML = '<img src="../images/loading.gif" />';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("resultDisplay").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "admprocess.php?msg=profilelist&gender="+gender+"&religion="+religion+"&caste="+caste, true);
	xmlhttp.send();
	
}