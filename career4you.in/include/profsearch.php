<form method="post" action="checkout.php">

<table style=" margin: 0 auto;">

<tr>
<td  style="width:116px;">Experience</td>
<td>:</td>
<td><select name="experience" class="select" id="experience">
<option value="">Select</option>
<option<?php if (getDetailsFromTables('tot_exp','employment')=='Less than 1 Yr'){echo " selected";}?>  value="Less than 1 Yr">Less than 1 Yr</option>
<option<?php if (getDetailsFromTables('tot_exp','employment')=='1 Yr or more')  {echo " selected";}?>  value="1 Yr or more">1 Yr or more</option>
<option<?php if (getDetailsFromTables('tot_exp','employment')=='2 Yr or more')	{echo " selected";}?>  value="2 Yr or more">2 Yr or more</option>
<option<?php if (getDetailsFromTables('tot_exp','employment')=='3 Yr or more')	{echo " selected";}?>  value="3 Yr or more">3 Yr or more</option>
<option<?php if (getDetailsFromTables('tot_exp','employment')=='5 Yr or more')	{echo " selected";}?>  value="5 Yr or more">5 Yr or more</option>
<option<?php if (getDetailsFromTables('tot_exp','employment')=='7 Yr or more')	{echo " selected";}?>  value="7 Yr or more">7 Yr or more</option>
<option<?php if (getDetailsFromTables('tot_exp','employment')=='9 Yr or more')	{echo " selected";}?>  value="9 Yr or more">9 Yr or more</option>
<option<?php if (getDetailsFromTables('tot_exp','employment')=='10 Yr or more')	{echo " selected";}?>  value="10 Yr or more">10 Yr or more</option>
</select> </td>

</tr>

<tr>
<td>Job Category</td>
<td>:</td>
<?php 
$categor = getDetailsFromTables('categry','fewdata');
$kat = "|".$categor;
$cat = explode("|", $kat);
?>
<td><div id="ctgry" style="height:80px;overflow:auto;width:auto;border:1px solid;border-left:4px solid ;">
<input type="checkbox" name="category[]" <?php if (array_search('IT Jobs', $cat)){echo " checked";}?>    value="IT Jobs" />IT Jobs<br/>
<input type="checkbox" name="category[]" <?php if (array_search('Tele Calling / BPO Jobs', $cat)){echo " checked";}?>    value="Tele Calling / BPO Jobs" />Tele Calling / BPO Jobs<br/>
<input type="checkbox" name="category[]" <?php if (array_search('Engineering Jobs', $cat)){echo " checked";}?>    value="Engineering Jobs" />Engineering Jobs<br/>
<input type="checkbox" name="category[]" <?php if (array_search('Marketing Jobs', $cat)){echo " checked";}?>    value="Marketing Jobs" />Marketing Jobs<br/>
<input type="checkbox" name="category[]" <?php if (array_search('Sales Jobs', $cat)){echo " checked";}?>    value="Sales Jobs" />Sales Jobs<br/>
<input type="checkbox" name="category[]" <?php if (array_search('Office, Admin / HR Jobs', $cat)){echo " checked";}?>    value="Office, Admin / HR Jobs" />Office, Admin / HR Jobs<br/>
<input type="checkbox" name="category[]" <?php if (array_search('Finance / Accounting Jobs', $cat)){echo " checked";}?>    value="Finance / Accounting Jobs" />Finance / Accounting Jobs<br/>
<input type="checkbox" name="category[]" <?php if (array_search('Medical / Health Care', $cat)){echo " checked";}?>    value="Medical / Health Care" />Medical / Health Care<br/>
<input type="checkbox" name="category[]" <?php if (array_search('Education / Teaching', $cat)){echo " checked";}?>    value="Education / Teaching" />Education / Teaching<br/>
<input type="checkbox" name="category[]" <?php if (array_search('Apprentice / Internship', $cat)){echo " checked";}?>    value="Apprentice / Internship" />Apprentice / Internship<br/>
<input type="checkbox" name="category[]" <?php if (array_search('Other Jobs ', $cat)){echo " checked";}?>    value="Other Jobs " />Other Jobs <br/></div></td>
</tr>

<tr>
<td colspan="3"><input name="notify" type="checkbox" <?php if (getDetailsFromTables('notify','fewdata')=='Y'){echo " checked";}?> value="Y"/>
Notifications</td>
</tr>

<tr>
<td colspan="3">
<input type="checkbox"  <?php if (getDetailsFromTables('offer','fewdata')=='Y'){echo " checked";}?>  name="offer" value="Y"/>
Latest Job Offer</td>
</tr>

<tr>
<td colspan="3"><input type="checkbox"  <?php if (getDetailsFromTables('promo','fewdata')=='Y'){echo " checked";}?>  name="promo" value="Y"/>
Promotions</td>
</tr>

<tr>
<td colspan="3"><input type="submit" class="fb5"  name="profsearch" value="Save Changes"/></td>
</tr>

</table>
</form>