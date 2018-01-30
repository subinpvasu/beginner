<?php
if($_SESSION['data'] != 'true')
{
echo "You are Not suppose to be here!<br>";
echo '
<script>
window.location="http://www.career4you.in";
</script>
';	
}

?>
<html><head><style type="text/css">
  /* Larger Side Border */
.textbox {
	width: 230px;
	height:23px;
	border: 1px solid #465615;
	border-left: 4px solid #465615;
}
.textboxtt {
	width: 150px;
	height:23px;
	border: 1px solid #465615;
	border-left: 4px solid #465615;
}
.textboxsm {
	width: 85px;
	height:23px;
	border: 1px solid #465615;
	border-left: 4px solid #465615;
}
.textarea {
	width: 230px;
	height:60px;
	border:1px solid #465615;
	border-left: 4px solid #465615;
}
.textareatt {
	width: 150px;
	height:30px;
	border:1px solid #465615;
	border-left: 4px solid #465615;
}
td {
	text-align: center;
}
</style> 
</head>
<body>
<form action="processor.php"  method="post" >
<table align="center" width="900px" >
<tbody>
<tr>
<td colspan="2" style="color:blue;font-weight: bold">
Bio-data</td>
</tr>
<tr>
<td style="text-align: right">Full Name </td>
<td style="text-align: left;">
<input type="text" class="textbox" id="name" name="name"/></td>
</tr>
<tr>
<td style="text-align: right">Father's Name </td>
<td style="text-align: left;">
<input type="hidden" name="userid"  value="<?php echo $_SESSION['key'];?>" />
<input type="text" class="textbox" id="guardian" name="guardian"/></td>
</tr>
<!--<tr>
<td style="text-align: right">Place of Birth</td>
<td style="text-align: left;"><input type="text" class="textbox" id="pob" name="pob"/></td>
</tr>
--><tr>
<td style="text-align: right">Date of Birth </td>
<td style="text-align: left;"><input type="text" class="textbox" id="dob" name="dob"/></td>
</tr>
<tr>
<td style="text-align: right">Gender : </td>

<td style="text-align:left">Male<input type="radio"   name="gender" value="M" />Female
<input type="radio"  value="F" name="gender" /></td>
</tr>
<!--<tr>
<td style="text-align: right">Age </td>
<td style="text-align: left;"><input type="text" class="textbox" id="age" name="age"/></td>
</tr>
--><tr >
<td style="background-color: lightblue;color:green;font-weight: bold">If Married </td>
</tr>
<tr style="background-color: lightblue;color:green;">
<td style="text-align: right">Name of Spouse </td>
<td style="text-align: left;">
<input type="text" class="textbox" id="spouse" name="spouse"/></td>
</tr>
<tr style="background-color: lightblue;color:green;">
<td style="text-align: right">No. of Children </td>
<td style="text-align: left;">
<input type="text" class="textbox" id="children" name="children"/></td>
</tr>
<tr>
<td style="text-align: right">Permanent Full Address</td>
<td style="text-align: left;">
<textarea id="address" rows="5" name="address" class="textarea"></textarea>
</td>
</tr>
<tr>
<td style="text-align: right">Present Full Address </td>
<td style="text-align: left;">
<textarea id="presentaddress" rows="5" name="presentaddress" class="textarea">
</textarea></td>
</tr>
<tr>
<td style="text-align: right">Telephone Number with STD code </td>
<td style="text-align: left;">
<input type="text" class="textbox" id="phone" name="phone"/></td>
</tr>
<tr>
<td style="text-align: right">Mobile Number </td>
<td style="text-align: left;">
<input type="text" class="textbox" id="mobile" name="mobile"/></td>
</tr>
<tr>
<td style="text-align: right">Fax Number </td>
<td style="text-align: left;">
<input type="text" class="textbox" id="fax" name="fax"/></td>
</tr>
<tr>
<td style="text-align: right">E-mail ID</td>
<td style="text-align: left;">
<input type="text" class="textbox" size="35" id="email" name="email"/></td>
</tr>
<tr>
<td colspan="2" style="color:blue;font-weight: bold">
Educational Qualification : (From Secondary Level onwards) </td>
</tr>
<tr>
<td colspan="3"><table  align="center" >
<tbody><tr>
<td  bgcolor="#FFCC66"  rowspan="2">Sl.no</td>
<td  bgcolor="#FFCC66"  rowspan="2">Course</td>
<td  bgcolor="#FFCC66"  rowspan="2">School/College/University </td>
<td  bgcolor="#FFCC66"  colspan="2">Period</td>
<td  bgcolor="#FFCC66"  rowspan="2">% of Marks Obtained </td>
</tr>
<tr>
<td width="32" height="23" bgcolor="#FFCC66"  >From</td>
<td width="30" bgcolor="#FFCC66"  >To</td>
</tr>
<tr>
<td >1.</td>
<td><input type="text" class="textboxtt" size="15" id="course1" name="course1"/></td>
<td><input type="text" class="textboxtt" size="30" id="college1" name="college1"/></td>
<td><input type="text" class="textboxtt" size="4" id="from1" name="from1"/></td>
<td><input type="text" class="textboxtt" size="4" id="to1" name="to1"/></td>
<td><input type="text" class="textboxtt" size="10" id="marks1" name="marks1"/></td>
</tr>
<tr>
<td >2.</td>
<td><input type="text" class="textboxtt" size="15" id="course2" name="course2"/></td>
<td><input type="text" class="textboxtt" size="30" id="college2" name="college2"/></td>
<td><input type="text" class="textboxtt" size="4" id="from2" name="from2"/></td>
<td><input type="text" class="textboxtt" size="4" id="to2" name="to2"/></td>
<td><input type="text" class="textboxtt" size="10" id="marks2" name="marks2"/></td>
</tr>
<tr>
<td >3.</td>
<td><input type="text" class="textboxtt" size="15" id="course3" name="course3"/></td>
<td><input type="text" class="textboxtt" size="30" id="college3" name="college3"/></td>
<td><input type="text" class="textboxtt" size="4" id="from3" name="from3"/></td>
<td><input type="text" class="textboxtt" size="4" id="to3" name="to3"/></td>
<td><input type="text" class="textboxtt" size="10" id="marks3" name="marks3"/></td>
</tr>
<tr>
<td >4.</td>
<td><input type="text" class="textboxtt" size="15" id="course4" name="course4"/></td>
<td><input type="text" class="textboxtt" size="30" id="college4" name="college4"/></td>
<td><input type="text" class="textboxtt" size="4" id="from4" name="from4"/></td>
<td><input type="text" class="textboxtt" size="4" id="to4" name="to4"/></td>
<td><input type="text" class="textboxtt" size="10" id="marks4" name="marks4"/></td>
</tr>
</tbody></table></td>
</tr>
<tr>
<td style="text-align: right">Curriculam Activities </td>
<td style="text-align: left;">
<textarea id="activity"  name="activity" class="textarea"></textarea></td>
</tr>
<tr>
<td style="text-align: right">Hobbies</td>
<td style="text-align: left;">
<textarea id="hobby"  name="hobby" class="textarea"></textarea></td>
</tr>
<tr>
<td style="text-align: right">Special Achievements </td>
<td style="text-align: left;">
<textarea id="achieve"  name="achieve" class="textarea"></textarea>
</td>
</tr>
<tr>
<td colspan="2" style="color:blue;font-weight: bold" >
Experience</td>
</tr>
<tr>
<td  colspan="2"><table  align="center" >
<tbody><tr>
<td width="39px"   bgcolor="#FFCC66"  align="center" >Sl.no</td>
<td width="150px"  bgcolor="#FFCC66"  align="center" >Name of Institution </td>
<td width="150px"  bgcolor="#FFCC66"  align="center" >Place</td>
<td width="150px"  bgcolor="#FFCC66"  align="center" >Designation</td>
<td width="150px"  bgcolor="#FFCC66"  align="center" >From</td>
<td width="150px"  bgcolor="#FFCC66"  align="center" >To</td>
<td width="150px"  bgcolor="#FFCC66"  align="center" >Reason for Leaving </td>
<td width="50px"   bgcolor="#FFCC66"  align="center" >Present</td>
</tr>
<tr>
<td >1.</td>
<td ><input type="text" class="textboxtt" size="15" id="name1" name="name1"/></td>
<td ><input type="text" class="textboxtt" size="15" id="name1" name="place1"/></td>
<td ><input type="text" class="textboxtt" size="10" id="designation1" name="designation1"/></td>
<td ><input type="text" class="textboxsm" size="10" id="from11" name="from11"/></td>
<td ><input type="text" class="textboxsm" size="10" id="to11" name="to11"/></td>
<td ><textarea id="reason1" rows="2" name="reason1" class="textareatt"></textarea></td>
<td><input type="radio" name="present" value="PA" /></td>
</tr>
<tr>
<td >2.</td>
<td ><input type="text" class="textboxtt" size="15" id="name2" name="name2"/></td>
<td ><input type="text" class="textboxtt" size="15" id="name1" name="place2"/></td>
<td ><input type="text" class="textboxtt" size="10" id="designation2" name="designation2"/></td>
<td ><input type="text" class="textboxsm" size="10" id="from12" name="from12"/></td>
<td ><input type="text" class="textboxsm" size="10" id="to12" name="to12"/></td>
<td ><textarea id="reason2" name="reason2" class="textareatt"></textarea></td>
<td><input type="radio" name="present" value="PB" /></td>
</tr>
<tr>
<td >3.</td>
<td ><input type="text" class="textboxtt" size="15" id="name3" name="name3"/></td>
<td ><input type="text" class="textboxtt" size="15" id="name1" name="place3"/></td>
<td ><input type="text" class="textboxtt" size="10" id="designation3" name="designation3"/></td>
<td ><input type="text" class="textboxsm" size="10" id="from12" name="from13"/></td>
<td ><input type="text" class="textboxsm" size="10" id="to12" name="to13"/></td>
<td ><textarea id="reason2" name="reason3" class="textareatt"></textarea></td>
<td><input type="radio" name="present" value="PC" /></td>
</tr>
</tbody></table></td>
</tr>
<tr>
<td style="text-align: right">Profile Summary </td>
<td style="text-align: left;">
<textarea id="profession"  name="summary" class="textarea"></textarea>
</td>
</tr>
<tr>
<td style="text-align: right">Professional Capabilities </td>
<td style="text-align: left;">
<textarea id="profession"  name="profession" class="textarea"></textarea>
</td>
</tr>
<tr>
<td style="text-align: right">Present salary </td>
<td style="text-align: left;">
<input type="text" class="textbox" id="date12" name="date12"/></td>
</tr>
<tr>
<td style="text-align: right">Expected Salary </td>
<td style="text-align: left;">
<input type="text" class="textbox" id="date13" name="date13"/></td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="Submit" class="fb5" id="submit" name="candidate"/>
<input type="button" value="Cancel" class="fb5" onclick="cancelOper()" /></td>                  </tr>
</tbody></table>
</form></body>
</html>