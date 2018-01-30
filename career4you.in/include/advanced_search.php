<?php 
session_start();
include_once 'include/config.php';
?>

<table >

<tr>
<td><input type="hidden" name="pgnbr" value="1" id="pgnbr"/>
<input type="hidden" name="prnbr" value="0" id="prnbr"/>
<input type="text" class="minibox" name="skill" id="kword" onkeyup="clearVar()"  placeholder="KeyWords"/>
</td>
<td>
<input type="text" class="minibox" placeholder="Location" onkeyup="clearVar()" id="loctn"  name="locat"/>
</td>
<td >
<select name="categ" onchange="clearVar()" id="ctgry" class="minisel">
<option value="">Category</option>
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
<select  name="exper" onchange="clearVar()" id="xprnc" class="minisel">
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
<td><select name="timin" id="tmngs" onchange="clearVar()" class="minisel">
<option value="Full Time">Full Time</option>
<option value="Part Time">Part Time</option>
</select></td>
<td><input type="text" onkeyup="clearVar()" id="samin" class="minibox" name="minsa"  placeholder="Salary Min"/></td>
<td><input type="text"  onkeyup="clearVar()" id="samax" class="minibox"  name="maxsa" placeholder="Salary Max"/></td>
<td><input type="button" class="fb5" onclick="doSearch()"  name="search" value="Search"/> </td>
</tr>
</table>
<div id="advresult" class="presearch"></div>