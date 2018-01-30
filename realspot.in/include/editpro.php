<?php
session_start ();

$id = $_GET ['id'];
$k = $_SESSION ['id'];

$con = mysql_connect ( "localhost", "wwwreals_realtes", "test@123" );

if (! $con) {
	die ( 'Could not connect: ' . mysql_error () );
}
mysql_select_db ( "wwwreals_realestate", $con );

$sql = "SELECT * FROM property WHERE  id='$id' AND informed_id='$k'";

$result = mysql_query ( $sql ) or die ( mysql_error () );

if (mysql_num_rows ( $result ) > 0) {
	while ( $row = mysql_fetch_array ( $result ) ) {
		$district = $row ['district'];
		$city = $row ['city'];
		$place = $row ['place'];
		$landmark = $row ['landmark'];
		$area = $row ['area'];
		$price = $row ['amount'];
		$type = $row ['type'];
		$category = $row ['category'];
		$desc = $row ['description'];
		$cap = $row ['caption'];
		$remark = $row ['remarks'];
		$image = $row ['image'];
	
	}
}
$ar = explode ( ".", $area );
$ardig = $ar [0];
$armea = $ar [1];
?>

<script type="text/javascript">






function propArea(str)
{
var d = document.getElementById("unit").value
if(d == "")
{
document.getElementById("unit").style.background="red";
}
}



function showResult(str)
{
if(str != "")
{

document.getElementById("unit").style.background="green";
}
else
{
document.getElementById("unit").style.background="red";
}


}

function correctForm()
{


var dist      = document.getElementById("propdist").value;
var city      = document.getElementById("propcity").value;
var place     = document.getElementById("propplace").value;
var mark      = document.getElementById("landmark").value;
var area      = document.getElementById("proparea").value;
var cat       = document.getElementById("propcat").value;
var type      = document.getElementById("division").value;
var price     = document.getElementById("propprice").value;
var measure   = document.getElementById("unit").value;

if(dist == null || dist == "" || dist == "--Select--" || dist == "Select Location")
{
dist = 'false';
}
if(city == null || city == "" || city == " Select Location")
{
city = 'false';

}

if(place)
{
for(var indx=0;indx<place.length;indx++)
if(place.toUpperCase().charAt(indx)<'A'||place.toUpperCase().charAt(indx)>'Z' )
if(place.charAt(indx)!=' ')
{

place = 'false';
}
}


if(mark)
{


if(mark.charAt(0)!=' ' )
{
if(mark.length < 5)
{
mark = 'false';
}
}
}

if(isNaN(area))
{
area = 'false';
}
if(cat == null || cat == "" || cat =="--Select--" )
{
cat = 'false';
}
if(type == null || type=="" )
{
type='false';
}

if(measure == null || measure=="")
{
measure='false';
}
if(measure!='false'  && type!='false' && cat != 'false' && area != 'false' &&  mark != 'false' && place != 'false' && 
city != 'false' && dist != 'false' )
{

return true;

}
else
{
alert ("Please Check the Form...!");
return false;
}

}












function showpropChange(str)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("propcity").innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","./include/searchdata.php?msg=search&dist="+str,true);
xmlhttp.send();
}




var district = [
				"Thrissur",
				"Thiruvananthapuram",
				"Kollam",
				"Pathanamthitta",
				"Kottayam", 
				"Alappuzha",
				"Idukki",
				"Ernakulam",
				"Palakkad",
				"Malappuram",
				"Kozhikode",
				"Wayanad",
				"Kannur",
				"Kasargod"
			   ]; 
 
 
   var category = [
					
					"Independent House/Villa", 
					"Flat/Apartment/Villa",
					"Agricultural Land/Plantation",
					"Commercial Building", 
					"Quarry/Factory", 
					"Office Space/Shop/Godown",
					"Agricultural Land/Farm House",
					"Hotel/Resorts", 
					"Commercial/Residential plot"
 				 ];
				 
			

				 
	function displayCity()
	{  
	var city = '<?php echo $city?>'; 
	var str  = '<?php echo $district?>';
	
	
if (window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("disp").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","./include/searchdata.php?msg=dosearch&dist="+str+"&city="+city,true);
xmlhttp.send();


}
				 
		
		function numberShow()
		{
var k =  document.getElementById("userid").value;		
		document.getElementById("warnings").innerHTML=k;
		}
	
		
	
	
	
		
		
		
		
		
				 
				 
				 

</script>

<form name="property" action="./property/property_procees.php"
	onsubmit="return correctForm()" enctype="multipart/form-data"
	method="post">
<table align="center" width="400px" onmouseover="numberShow()">
	<caption>
	<h4><font color="#000099">Edit Property Details</font></h4>
	</caption>



	<tr>
		<td>District<font color="red">*</font>:</td>
		<td><select class="select" name="propdist" id="propdist"
			onchange="showpropChange(this.value)">
			<option name="" value="--Select--">--Select--</option>
			<script type="text/javascript">
var k = '<?php
echo $district?>';

for(var i=0;i<district.length;i++)
{
if(k == district[i])
{
document.write('<option selected value=\"'+district[i]+'\">'+ district[i]+'</option>');


}
else
{
document.write('<option value=\"'+district[i]+'\">'+ district[i]+'</option>');
}

}
</script>
		</select>
		<td id="msgdist"></td>
	
	</tr>


	<tr>
		<td>Near to<font color="red">*</font>:</td>
		<td id="disp"><input class="tb8" type="text" name="propcity"
			id="propcity" value="<?php
			echo $city?>" onmouseover="displayCity()">

		<td id="msgcity"></td>
	
	</tr>


	<tr>
		<td>Place<font color="red">*</font>:</td>
		<td><input class="tb8" name="propplace" id="propplace"
			onchange="propPlace(this.value)" value=" <?php
			echo $place;
			?>"
			type="text" size="30" maxlength="30" />
		<td id="msgplace"></td>
	
	</tr>

	<tr>
		<td>Landmark<font color="red">*</font>:</td>
		<td><input class="tb8" name="landmark" id="landmark"
			onchange="propMark(this.value)" value=" <?php
			echo $landmark;
			?>"
			type="text" size="30" maxlength="30" />
		<td id="msgmark"></td>
	
	</tr>

	<tr>
		<td>Area<font color="red">*</font>:</td>
		<td><input class="tb8" id="proparea" name="proparea"
			value=" <?php
			echo $ardig;
			?>" type="text" size="30"
			onfocus="propArea(this.value)" onkeyup="propAreas(this.value)"
			maxlength="30" /></td>
		<td id="msge"><select class="selectm" id="unit" name="areameasure"
			onchange="showResult(this.value)">
			<option name="" value="">--Select--</option>
			<option name="" <?php
			if ($armea == 'sqft') {
				echo selected;
			}
			?>
				value=".sqft">sqft</option>
			<option name="" <?php
			if ($armea == 'cents') {
				echo selected;
			}
			?>
				value=".cents">cents</option>
			<option name="" <?php
			if ($armea == 'acres') {
				echo selected;
			}
			?>
				value=".acres">acres</option>
		</select></td>
	</tr>

	<tr>
		<td>Category<font color="red">*</font>:</td>
		<td><select class="select" name="propcat" id="propcat"
			onchange="showcatChange(this.value)">
			<option name="" value="--Select--">Category</option>
			<script type="text/javascript">
var tem = "<?php
echo $category;
?>";
category.sort();
for(var j=0;j<category.length;j++)
{
if(tem == category[j])
{
document.write('<option selected value=\"'+category[j]+'\">'+ category[j]+'</option>');
}
else
{
document.write('<option  value=\"'+category[j]+'\">'+ category[j]+'</option>');
}

}
 

function change()
{
var ks = document.getElementById("division").value;
if(ks == "Rent")
{
var prize = [
			"Upto 5000",
			"5000-10000",
			"10000-25000",
			"25000-50000",
			"50000-1 Lakh",
			"1 Lakh-2 Lakhs",
			"2 Lakhs-3 Lakhs",
			"3 Lakhs-5 Lakhs",
			"5 Lakhs-10 Lakhs",
			"10 Lakhs-15 Lakhs",
			"15 Lakhs-25 Lakhs",
			"25 Lakhs-50 Lakhs",
			"50 Lakhs  Above"
			];

				var mn="",i;
				var pq = 0;
				
				var abc = "<?php
				echo $type?>";
				if(abc == "Rent")
				{
				 pq = 1;
				var pqr = "<?php
				echo $price?>";
				}
				
		if(pq == 1 )
		{		
for (i=0;i<prize.length;i++)
  {

     if(prize[i] == pqr)
	  {
	  mn=mn+'<option selected value=\"'+prize[i]+'\">' + prize[i] + '</option>';
	  }
	  else
	  {
	   mn=mn+'<option value=\"'+prize[i]+'\">' + prize[i] + '</option>';
	  }
  }
      }
  else
	  {
	  for (i=0;i<prize.length;i++)
      {
	  mn=mn+'<option value=\"'+prize[i]+'\">' + prize[i] + '</option>';
	  }
	  }
	  document.getElementById("vision").innerHTML="<select class=select name=propprice id=propprice>"+mn+"</select>";
  }












else
{
mn='<input class="tb8" name="propprice" id="propprice" value="<?php
if ($type != "Rent") {
	echo $price;
}
?>" onchange="propPrice(this.value)"  type="text" size="30"  maxlength="30" />';
document.getElementById("vision").innerHTML=mn;
}








}


function showText()
				{
				document.getElementById("text").style.visibility="visible";
				}
				function hideText()
				{
				document.getElementById("text").style.visibility="hidden";
				}


</script>
		</select>
		<td id="msg"></td>
	
	</tr>

	<tr>
		<td>Type<font color="red">*</font>:</td>
		<td><select class="select" name="proptype" id="division"
			onchange="change()">
			<option name="" value="">--Select--</option>
			<option name="" <?php
			if ($type == 'Sale') {
				echo selected;
			}
			?>
				value="Sale">Sale</option>
			<option name="" <?php
			if ($type == 'Rent') {
				echo selected;
			}
			?>
				value="Rent">Rent/Lease/Pledge</option>
		</select>
		<td id="msg"></td>
	
	</tr>

	<tr>
		<td>Price <font color="red">*</font><img width="10" height="12"
			style="vertical-align: baseline" src="./images/rupees.png" alt="INR" />:
		</td>
		<td id="vision"><input class="tb8" name="propprice" id="propprice"
			onmouseover="change()" onchange="propPrice(this.value)" type="text"
			size="30" value="<?php
			echo $price?> " maxlength="30" /></td>
		<td id="msgprice"></td>
	</tr>

	<tr>
		<td>Decription:</td>
		<td><textarea class="ta8" name="description" cols="23" rows="3"><?php
		echo $desc;
		?></textarea>
		<td id="msg"></td>
	
	</tr>

	<tr>
		<td>Caption:</td>
		<td><textarea class="ta8" name="caption" cols="23" rows="3"><?php
		echo $cap;
		?></textarea>
		<td id="msg"></td>
	
	</tr>

	<tr>
		<td>Remarks:</td>
		<td><textarea class="ta8" name="remarks" cols="23" rows="3"><?php
		echo $remark;
		?> </textarea></td>
		<td id="disphoto">
		<p style="position: absolute; visibility: hidden" id="text">Change
		Image</p>
		<img src="./upload/<?php
		echo $image?>" alt="Change Image"
			onmouseover="showText()" onmouseout="hideText()" height="50"
			width="50" title="Change Image"
			onclick="javascript:void window.open('./popup/upimage.php','1348219726554','width=500,height=200,toolbar=0,menubar=0,location=0,status=0,addressbars=0,scrollbars=0,resizable=0,left=100,top=100');return false;" />
		<input type="hidden" name="photo" value="<?php
		echo $image?>" /></td>
	</tr>



	<tr>
		<td></td>
		<td align="center" rowspan="10" valign="middle"><input type="submit"
			class="fb5" name="acceptedit" value="Add to Internet" /> <input
			type="hidden" name="ipaddress"
			value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" /> <input type="hidden"
			name="userid" id="userid" value="<?php echo $_GET['id']; ?>" /></td>
	</tr>

</table>
</form>

