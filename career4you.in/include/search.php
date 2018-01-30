<?php 
session_start();
?>
<div align="center" style="margin: 0 4px">
<table> 
<tr><td><input type="hidden" name="pgnbr" value="1" id="pgnbr"/>
<input type="text" name="skill" id="skill" value="" placeholder="KeyWords,Skills" onkeyup="clearVar()"  style="height:27px;width:150px;border:1px solid#465615"/>
</td>
<td>
<input type="text" value="" placeholder="Location" onkeyup="clearVar()" name="skilcdl" id="locat"  style="height:27px;width:150px;border:1px solid#465615"/>
</td>
<td>
<select class="tb11" onchange="clearVar()" style="height:29px;width:150px;border:1px solid#465615" name="cat" id="categ"  >
<option  value="">Category</option>
<option value="IT Jobs"> IT Jobs</option>
<option value="Tele Calling / BPO Jobs"> Tele Calling / BPO Jobs</option>
<option value="Engineering Jobs"> Engineering Jobs</option>
<option value="Marketing Jobs"> Marketing Jobs</option>
<option value="Sales Jobs"> Sales Jobs</option>
<option value="Office, Admin / HR Jobs"> Office, Admin / HR Jobs</option>
<option value="Finance / Accounting Jobs"> Finance / Accounting Jobs</option>
<option value="Medical / Health Care"> Medical / Health Care</option>
<option value="Education / Teaching"> Education / Teaching</option>
<option value="Apprentice / Internship">Apprentice / Internship</option>
<option value="Other Jobs">Other Jobs </option>
</select>
</td>
<td>
<select class="tb11" onchange="clearVar()" style="height:29px;width:150px;border:1px solid#465615" name="exper" id="exper" >
<option  value="">Experience</option>
<option value="Less">Less than 1 Yr</option>
<option value="1">1 Yr or more</option>
<option value="2">2 Yr or more</option>
<option value="3">3 Yr or more</option>
<option value="5">5 Yr or more</option>
<option value="7">7 Yr or more</option>
<option value="9">9 Yr or more</option>
<option value="10">10 Yr or more</option>
</select>
</td>
<td align="center">
<input type="button"  onClick="validateSearch()" 
	<?php if($_SESSION['account']=='true' || $_SESSION['employer']=='true'){echo "disabled";}?>
	style="height:31px; width:100px; vertical-align:baseline"
 class="fb5" value="Search"  name="search"/> </td>
</tr>
</table>
</div>