var message_Array = ['0','Introduce Yourself here <b id="c1" class="smalltext"></b>',
                     'Let  Others know about your favourites <b id="c2" class="smalltext"></b>',
                     'Let  Others know about your aim in your life <b id="c3" class="smalltext"></b>',
                     'Mention your own method of making /having fun <b id="c4" class="smalltext"></b>',
                     'Story of your once impossible mission has been possible <b id="c5" class="smalltext"></b>',
                     'Who/What are you most prefered in your life. <b id="c6" class="smalltext"></b>',
                     'Most irritated events/peoples/something <b id="c7" class="smalltext"></b>',
                     'What would be your words to the WORLD whether they hear you once <b id="c8" class="smalltext"></b>',
                     'What do you think about your Last Birth <b id="c9" class="smalltext"></b>',
                     'When do you think you were/are/will Happy.! <b id="c10" class="smalltext"></b>'];
var rev = "fwd";
function titlebar(val)
{
	var msg  = "WWW.E-PROFILE.IN | WWW.E-PROFILE.IN | WWW.E-PROFILE.IN | WWW.E-PROFILE.IN | ";
	var res = " ";
	var speed = 61;
	var pos = val;

	var le = msg.length;
	if(rev == "fwd"){
		if(pos < le){
		pos = pos+1;
		scroll = msg.substr(0,pos);
		document.title = scroll;
		timer = window.setTimeout("titlebar("+pos+")",speed);
		}
		else{
		rev = "bwd";
		timer = window.setTimeout("titlebar("+pos+")",speed);
		}
	}
	else{
		if(pos > 0){
		pos = pos-1;
		var ale = le-pos;
		
		scrol = msg.substr(ale,le);
		document.title = scrol;
		timer = window.setTimeout("titlebar("+pos+")",speed);
		
		}
		else{
		rev = "fwd";
		timer = window.setTimeout("titlebar("+pos+")",speed);                                                                                                                                                                                                                                                                                                                                                                                     
		}	
	}
}
function populateState(sbn)
{
	if(sbn=='India'){
		showStatesAj();
}
	else
	{
	document.getElementById("states").innerHTML='Not Applicable';	
	}
}
function accountLogin()
{
	var em = document.getElementById("email").value;
	var pw = document.getElementById("password").value;
	if(emailChecker(em))
	{
	ajaxAccountLog(em,pw);
	}
	else
	{
	alert("Enter a Valid Email Address");	
	return false;
	}
}
function emailChecker(ipt)
{
	var letters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(ipt.match(letters))
	{
		return true;
	}
	else
	{
		return false;
	}
}
function directLocation(tmp)
{
	window.location=tmp;
}
function publishStatusNow()
{
	var status = document.getElementById("statusnow").value;
	var patt1=/\S/g;
	if(status.match(patt1)==null)
	{
	return false;
	}
	else
	{
	statusUpdateAj(status);	
	}
}
var stat = 0;
function visualizeMenu(sbn)
{
	stat++;
	if(stat%2==0)
	{
		document.getElementById(sbn).style.display='none';
	}
	else
	{
		document.getElementById(sbn).style.display='block';
		setTimeout(function(){visualizeMenu(sbn);}, 60000);
	}
}
function showHelpData(sbn)
{
	var num =sbn.replace("m","");
	displayMessageHelp(num,sbn);
	numberOfLetters(sbn);
}
function displayMessageHelp(arrayKey,areaID)
{
	var k = areaID.replace("m","");
	var l = "n"+k;
	var board;
	board = document.createElement('p');
	board.id = 'board';
	board.style.backgroundImage='url("/images/popup.png")';
	board.style.backgroundRepeat="no-repeat";
	board.style.cssFloat="none";
	board.style.marginTop="-160px";
	board.style.marginLeft="410px";
	board.style.width="240px";
	board.style.height="65px";
	board.style.paddingTop="18px";
	board.style.paddingLeft="10px";
	board.style.color="white";
	board.style.position="absolute";
	board.style.display='block';
	board.style.textAlign="center";
	board.innerHTML = message_Array[k];
	document.getElementById(l).appendChild(board);
}
function removeMessageHelp(areaID)
{
	var k = areaID.replace("m","");
	var l = "n"+k;
	var parent=document.getElementById(l);
	var child=document.getElementById("board");
	parent.removeChild(child);
}
function numberOfLetters(sbn)
{
	var k = sbn.replace("m","");
	var l = "c"+k;
	var m = document.getElementById(sbn).value;
	var n = 300-(m.length);
	document.getElementById(l).innerHTML=n+" Characters Left";
}