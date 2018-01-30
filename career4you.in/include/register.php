<form method="post" action="checkout.php" name="register_form" onsubmit="return validateForm()" 
enctype="multipart/form-data"  >
<table style="margin: 0 auto;">
<tr>
<td colspan="3" style="color:#465615;margin: 0 auto;font-weight: bold;height:20px;">Create your Profile Now!</td>
</tr>
</table>

<hr/>
<?php 
if ($_GET['e']=='email')
{
echo'
<h2 style="color:blue;position:fixed;margin:0 auto;background-color:white;" id="eror" onmouseover="javascript:setTimeout(function(){document.getElementById(&apos;eror&apos;).style.display=&apos;none&apos;;},5000)">E-mail ID Already Registered.Please Login to Continue<br>
<b style="color:red">OR</b><br/>Enter a Valid E-mail ID to Continue..</h2>
';
}
?>
<table style=" margin: 0 auto;">

<tr>
<td>E-mail</td>
<td>:</td>
<td><input type="text" name="email" id="email"  placeholder="Eg:career4you.in@gmail.com" class="textbox" /></td>
</tr>

<tr>
<td>Set Password</td>
<td>:</td>
<td><input type="password" name="setpass" id="setpass" placeholder="*********" class="textbox" /></td>
</tr>

<tr>
<td>Confirm Password</td>
<td>:</td>
<td><input type="password" name="conpass" id="conpass" placeholder="*********" class="textbox" /></td>
</tr>

</table>

<hr/>

<table style=" margin: 0 auto;">

<tr>
<td style="width:116px;">Full Name</td>
<td>:</td>
<td><input type="text" name="fullname" id="fullname"  placeholder="Enter full name here..." class="textbox" /></td>
</tr>

<tr>
<td>Gender</td>
<td>:</td>
<td>
Male <input type="radio" checked  name="gender" value="M" />
Female <input type="radio"  value="F" name="gender" /></td>
</tr>

<tr>
<td>Mobile</td>
<td>:</td>
<td><input type="text" name="mobile" id="mobile" onkeypress="return isNumberKey(event)"  placeholder="Eg:9387335165" class="textbox" />
</td>
</tr>

<tr>
<td>District</td>
<td>:</td>
<td><input type="text" name="district" id="district" placeholder="Eg:Thrissur" class="textbox" /></td>
</tr>

</table>

<hr/>

<table style=" margin: 0 auto;">

<tr>
<td  style="width:116px;">Experience</td>
<td>:</td>
<td><select name="experience" class="select" id="experience">
<option value="Less than 1 Yr">Less than 1 Yr</option>
<option value="1 Yr or more">1 Yr or more</option>
<option value="2 Yr or more">2 Yr or more</option>
<option value="3 Yr or more">3 Yr or more</option>
<option value="5 Yr or more">5 Yr or more</option>
<option value="7 Yr or more">7 Yr or more</option>
<option value="9 Yr or more">9 Yr or more</option>
<option value="10 Yr or more">10 Yr or more</option>
</select> </td>

</tr>

<tr>
<td>Skill</td>
<td>:</td>
<td><textarea placeholder="Eg:MS Office,Tally,DTP,etc.."  id="skills" name="skills"   class="textarea"></textarea></td>
</tr>

<tr>
<td>Profile Title</td>
<td>:</td>
<td><input type="text"  placeholder="Eg:Office Assistant more than 1Yr." id="title" name="title" class="textbox" /></td>
</tr>

<tr>
<td>Job Category</td>
<td>:</td>
<td><div id="ctgry" style="height:80px;overflow:auto;width:auto;border:1px solid;border-left:4px solid ;">
<input type="checkbox" name="category[]"  value="IT Jobs" />IT Jobs<br/>
<input type="checkbox" name="category[]"  value="Tele Calling / BPO Jobs" />Tele Calling / BPO Jobs<br/>
<input type="checkbox" name="category[]"  value="Engineering Jobs" />Engineering Jobs<br/>
<input type="checkbox" name="category[]"  value="Marketing Jobs" />Marketing Jobs<br/>
<input type="checkbox" name="category[]"  value="Sales Jobs" />Sales Jobs<br/>
<input type="checkbox" name="category[]"  value="Office, Admin / HR Jobs" />Office, Admin / HR Jobs<br/>
<input type="checkbox" name="category[]"  value="Finance / Accounting Jobs" />Finance / Accounting Jobs<br/>
<input type="checkbox" name="category[]"  value="Medical / Health Care" />Medical / Health Care<br/>
<input type="checkbox" name="category[]"  value="Education / Teaching" />Education / Teaching<br/>
<input type="checkbox" name="category[]"  value="Apprentice / Internship" />Apprentice / Internship<br/>
<input type="checkbox" name="category[]"  value="Other Jobs " />Other Jobs <br/></div></td>
</tr>

</table>

<hr/>

<table style=" margin: 0 auto;">

<tr>
<td>Resume</td>
<td>:</td>
<td><input name="resumes" type="file"  /></td>
</tr>

</table>

<hr/>

<table style=" margin: 0 auto;">

<tr>
<td><input name="notify" type="checkbox" checked value="Y"/>
Notifications</td>
</tr>

<tr>
<td>
<input type="checkbox" checked name="offer" value="Y"/>
Latest Job Offer</td>
</tr>

<tr>
<td><input type="checkbox" checked name="promo" value="Y"/>
Promotions</td>
</tr>

</table>

<hr/>

<table style=" margin: 0 auto;">

<tr>
<td colspan="3" style=" margin: 0 auto;">
<input type="submit"  name="register" class="fb5" value="Join Career4you.in" /></td>
</tr>

</table>

</form>
<div align="right">
<h4><a href="index.php?msg=login&jobid=<?php echo $_GET['jobid'] ?>" style="text-decoration:none">
Login Here</a></h4></div>
<!-- 

<html>
<head>
</head>
<body onload="showEra()">
<form method="post" action="checkout.php" onsubmit="return validateForm()">
<table>

<tr>
<td colspan="3" align="center" style="color:#465615;font-weight: bold;height:20px;"> Personal Information</td>
</tr>

<tr>
<td>Full Name</td>
<td>:</td>
<td><input type="text" id="cname" name="name" size="30" class="textbox" /></td>
</tr>

<tr>
<td>Father's Name</td>
<td>:</td>
<td><input type="text" id="fname"  name="fname" size="30" class="textbox" /></td>
</tr>

<tr>
<td>Place of Birth</td>
<td>:</td>
<td><input type="text" id="pbirth" name="birthplace" size="30" class="textbox" /></td>
</tr>

<tr>
<td>Date of Birth</td>
<td id="date">:</td>
<td id="predate"><input type="hidden" id="postdate" name="postdate" value="SUBIN"/>
<span style="width:75px"><select name="month" id="month" onchange="showDate()"></select></span>
<span style="width:75px"><select name="day" id="today"></select></span>
<span style="width:75px"><select name="year" id="year"></select></span>
</td>
</tr>

<tr>
<td>Age</td>
<td>:</td>
<td><input type="text" id="age" name="age" size="30" class="textbox" /></td>
</tr>

<tr>
<td>Gender</td>
<td>:</td>
<td>Male<input type="radio"   name="gender" value="M" />Female
<input type="radio"  value="F" name="gender" /></td>
</tr>

<tr>
<td>Marital Status</td>
<td>:</td>
<td>Married<input type="radio" onchange="maritalStatus()"  name="marital" value="M" id="marry"/>Single
<input type="radio" onchange="maritalStatus()" value="S" name="marital" id="single"/></td>
</tr>

<tr >
<td>Name of Spouse</td>
<td>:</td>
<td><input id="wife" type="text" name="wife" disabled size="30" class="textbox" /></td>
</tr>

<tr >
<td>No. of Children</td>
<td>:</td>
<td><input id="child" type="text" name="child" disabled  size="30" class="textbox" /></td>
</tr>

<tr>
<td>Permanent Address</td>
<td>:</td>
<td><textarea id="pmaddr" name="address" class="textarea"></textarea></td>
</tr>

<tr>
<td>Both are Same</td>
<td>:</td>
<td><input type="checkbox" id="addcheck" value="Y" name="addcheck" onchange="copyAddr()" /></td>
</tr>

<tr>
<td>Present Address</td>
<td>:</td>
<td><textarea id="praddr" name="address_now" class="textarea" ></textarea></td>
</tr>

<tr>
<td>Telephone</td>
<td>:</td>
<td><input type="text" id="phone" name="phone" size="30" class="textbox" /></td>
</tr>

<tr>
<td>Mobile</td>
<td>:</td>
<td><input type="text" id="mobile" name="mobile" size="30" class="textbox" />
<input type="hidden" name="ipaddress" value=<?php echo $_SERVER['REMOTE_ADDR'] ?> /></td>
</tr>

<tr>
<td>Fax</td>
<td>:</td>
<td><input type="text" name="fax"  size="30" class="textbox" /></td>
</tr>

<tr>
<td>Email ID</td>
<td>:</td>
<td><input type="text" name="email" id="email" size="30" class="textbox" /></td>
</tr>

<tr>
<td>Select Password</td>
<td id="password">:</td>
<td><input type="password" name="passo" id="passo" size="30" class="textbox" /></td>
</tr>

<tr>
<td>Confirm Password</td>
<td>:</td>
<td><input type="password" name="passt" id="passt" size="30" class="textbox" /></td>
</tr>

<tr>
<td colspan="3" align="center">
<input type="submit" onmouseover="checDate()" name="resume" class="fb5" value="Save & Countinue" /></td>
</tr>

</table>

</form>
<div align="right">
<h4><a href="index.php?msg=login&jobid=<?php echo $_GET['jobid'] ?>" style="text-decoration:none">
Login Here</a></h4></div>
</body>
</html> -->