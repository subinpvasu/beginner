var fresh;
function sameFirm()
{
	var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
         fresh = xmlhttp.responseText;
         fresher();
        }
    };
    xmlhttp.open("GET","processor.php?msg=samefirm",true);
    xmlhttp.send();
}
function newFirm()
{
	var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
        	fresh = xmlhttp.responseText;
        	fresher();
        }
    };
    xmlhttp.open("GET","processor.php?msg=newfirm",true);
    xmlhttp.send();
}	

function postJob()
{
	var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
        	fresh = xmlhttp.responseText;
        	fresher();
        }
    };
    xmlhttp.open("GET","processor.php?msg=postjob",true);
    xmlhttp.send();
}	
function postResume()
{
	var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
        	fresh = xmlhttp.responseText;
        	fresher();
        }
    };
    xmlhttp.open("GET","processor.php?msg=postresume",true);
    xmlhttp.send();
}	
function newResume()
{
	var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
        	fresh = xmlhttp.responseText;
        	fresher();
        }
    };
    xmlhttp.open("GET","processor.php?msg=newresume",true);
    xmlhttp.send();
}	
function backHome()
{
	var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
        	fresh = xmlhttp.responseText;
        	fresher();
        }
    };
    xmlhttp.open("GET","processor.php?msg=backhome",true);
    xmlhttp.send();
}	
function cancelOper()
{
	var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
        	fresh = xmlhttp.responseText;
        	fresher();
        }
    };
    xmlhttp.open("GET","processor.php?msg=canceloper",true);
    xmlhttp.send();
}	
function fresher()
{
	
	if(fresh == 'Y')
	{
		
this.window.parent.location.reload();
	}
}