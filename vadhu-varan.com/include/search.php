<?php 
session_start();
include_once 'include/admin.php';
?>
<div align="center" style="padding-top:25px;">
<table onmousemove="populateSearch()"> 
<tbody><tr><td>
<select id="genderz" class="ser_select">
<?php 
if(is_numeric($_SESSION['who'])){
$zql = "SELECT gender FROM personal_details WHERE id=".$_SESSION['who'];
$result = mysql_query($zql);
$data  = mysql_fetch_array($result);
if($data[0]=='B'){echo '<option value="G">VARAN</option>';}
if($data[0]=='G'){echo '<option value="B">VADHU</option>';}
}
else {
?>
<option value="B">VADHU</option>
<option value="G">VARAN</option>
<?php }?>
</select>
</td>
<td>
<select  class="ser_select" id="fromage">
<option value="">AGE From</option>

</select>
</td>
<td>
<select class="ser_select" id="toage">
<option value="">AGE To</option>
</select>
</td>
<td>
<select id="relgin" class="ser_select">
<option value="">Select Religion</option>
<option value="chri">Christian</option>
<option value="hind">Hindu</option>
<option value="inte">Inter Caste</option>
<option value="jain">Jain</option>
<option value="musl">Muslim</option>
<option value="sikh">Sikh</option>
<option value="nore">No Religion</option>
<option value="othe">Others</option>                                             
</select>
</td>
<td>
<input type="button" name="search"  value="Search" onclick="doRoughSearch(1)"  class="button"/> </td>
</tr>
</tbody></table>
</div>