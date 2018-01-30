<?php
include_once 'include/functions.php';
global $cond,$scooter,$bike,$car,$color,$fuel,$trans,$year,$type;
$flag = $_GET['second'];
?>
<!DOCTYPE html>
<html>
<head>
<script>
function reportSpamNow(sbn)
{
	loadAJAX().onreadystatechange = function() {
		if (xmlhttp.readyState < 4) {
			document.getElementById("guard").style.display = 'block';
		}
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("guard").style.display = 'none';
			document.getElementById("searchbrand").innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET", "./include/validation.php?msg=report&key="+sbn, true);
	xmlhttp.send();	
}
</script>

</head>
<body>
<table cellspacing="5">

<tr>
<td colspan="2" align="center"><h2><?php echo getDetailsFromTable('title','vehicle',$flag);?></h2></td>
</tr>



<tr>
<td style="width:436px;height:327px;">
<?php 
if (getDetailsFromTable('photo','vehicle',$flag)=='autovipany.jpg')
{
	echo '<img src="images/autovipany.png" width="430px" height="320px"/>';
}
else 
{
	echo '<img src="upload/'.getDetailsFromTable('photo','vehicle',$flag).'" width="430px" height="320px"/>';	
}
?>
</td><td>

<table cellspacing="5" style="font-size:14px;color:brown;" >

<tr><td colspan="3">

</td></tr>

<tr>
<td>Profile ID</td>
<td>:</td>
<td><?php $formattedNumber = sprintf('%06d',$flag);echo $formattedNumber;?></td>
</tr>

<tr>
<td>Brand</td>
<td>:</td>
<td><?php
$z = strtolower($type[getDetailsFromTable('type','vehicle',$flag)]);//$car
echo  displayArrayasString($$z,getDetailsFromTable('brand','vehicle',$flag)); ?></td>
</tr>

<tr>
<td>Model</td>
<td>:</td>
<td><?php echo getDetailsFromTable('model','vehicle',$flag);?></td>
</tr>

<tr>
<td>Year of Release</td>
<td>:</td>
<td><?php echo displayArrayasString($year,getDetailsFromTable('years','vehicle',$flag))?></td>
</tr>

<tr>
<td>Price</td>
<td>:</td>
<td><?php echo "<img src=images/rupee.png height=10px/> ".digitAliasPrice(trim(getDetailsFromTable('price','vehicle',$flag)))."/-";?></td>
</tr>

<tr>
<td>Kms Driven</td>
<td>:</td>
<td><?php echo getDetailsFromTable('driven','vehicle',$flag);?></td>
</tr>

<tr>
<td>Color</td>
<td>:</td>
<td><?php echo displayArrayasString($color,getDetailsFromTable('color','vehicle',$flag))?></td>
</tr>

<tr>
<td>Fuel</td>
<td>:</td>
<td><?php echo displayArrayasString($fuel,getDetailsFromTable('fuel','vehicle',$flag))?></td>
</tr>

<tr>
<td>Transmission(Gear)</td>
<td>:</td>
<td><?php echo displayArrayasString($trans,getDetailsFromTable('transmission','vehicle',$flag))?></td>
</tr>

<tr>
<td>Condition</td>
<td>:</td>
<td><?php echo displayArrayasString($cond,getDetailsFromTable('conditions','vehicle',$flag))?></td>
</tr>

<tr>
<td>Details</td>
<td>:</td>
<td><?php echo getDetailsFromTable('description','vehicle',$flag);?></td>
</tr>

<tr>
<td>Posted On</td>
<td>:</td>
<td><?php echo substr(getDetailsFromTable('time','vehicle',$flag),0,11);?></td>
</tr>

</table></td>
</tr>
</table>
<button class="button" onclick="reportSpamNow(<?php echo $flag;?>)">Report Spam</button>
<hr/>
<table  style="background-color:#BDE2F4;width:500px;height:150px;vertical-align: middle;" cellpadding="5">

<tbody><tr>
<td style="text-align:center;"><h2>Contact Details</h2></td>
</tr>

<tr>
<td>
<?php 
if ((getDetailsFromTable('golden','vehicle',$flag)=='Y') || (getDetailsFromTable('premium','vehicle',$flag)=='Y')){
?>
<p style="text-align:center;color:blue;font-size:14px;"><?php echo getDetailsFromTable('name','rcowner',getDetailsFromTable('holder','vehicle',$flag));?></p>
<p style="text-align:center;color:blue;font-size:14px;"><?php echo getDetailsFromTable('mobile','rcowner',getDetailsFromTable('holder','vehicle',$flag));?></p>
<p style="text-align:center;color:blue;font-size:14px;"><?php echo getDetailsFromTable('email','rcowner',getDetailsFromTable('holder','vehicle',$flag));?></p>
<p style="text-align:center;color:blue;font-size:14px;"><?php echo getDetailsFromTable('address','rcowner',getDetailsFromTable('holder','vehicle',$flag));?></p>
<?php }else{?>
<p style="text-align:center;color:blue;font-size:14px;">www.autovipany.in</p>
<p style="text-align:center;color:blue;font-size:14px;">Gita Communications</p>
<p style="text-align:center;color:blue;font-size:14px;">TMK Complex,Mannath Lane,MG ROAD Thrissur.</p>
<p style="text-align:center;color:blue;font-size:14px;">Mob : 9387335165</p>
<?php }?>
</td>
</tr>


</tbody></table>

</body>

</html>