<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send Details To Email</title>
</head>

<body>
<?php
################################################
############
############ Select DB
############
################################################







?>

<table>

<tr><td>To</td><td>:</td><td><?php echo $_GET['mid']; ?></td> </tr>
<tr><td>From</td><td>:</td><td>realspot.in@gmail.com</td></tr>
<tr><td>Subject</td><td>:</td><td>Property Details(Property ID:<?php echo $_GET['pid']; ?>)</td></tr>
<tr><td colspan="3">

<?php
$value = $_GET['pid'];
	if(is_numeric($value)){
	$sql = "SELECT property.id AS id,property.informed_id AS informed_id,property.info_type AS info_type,property.time AS time,property.type AS type,property.place AS place,property.city AS city,property.district AS district,property.area AS area,property.amount AS amount,property.image AS image,property.landmark AS landmark,property.category AS category,property.status AS status,property.sale_status AS sale_status,property.publish AS publish,register.name AS name,register.mobile AS mobile,register.landline AS landline,register.address AS address,register.place AS plase FROM property INNER JOIN register ON property.informed_id=register.Id WHERE  property.id=".$value;
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());
	if(mysql_num_rows($result) > 0)
	{
		while($row = mysql_fetch_array($result))
		{
			echo '
<div align="center">
			<table width="100%">

  <tr>
    <td>Contact Name</td>
    <td>'.$row['name'].'</td>
  </tr>
  <tr>
    <td>Contact Mobile</td>
    <td>'.$row['mobile'].'</td>
  </tr>
  <tr>
    <td>Contact Phone</td>
    <td>'.$row['landline'].'</td>
  </tr>

  <tr>
    <td>Contact Address</td>
    <td>'.$row['address'].'</td>
  </tr>
  <tr>
    <td>Contact Addressee Place</td>
    <td>'.$row['plase'].'</td>
  </tr>

  <tr>
    <td>Type</td>
    <td>'.$row['type'].'</td>
  </tr>
  <tr>
    <td>Place</td>
    <td>'.$row['place'].'</td>
  </tr>
  <tr>
    <td>City</td>
    <td>'.$row['city'].'</td>
  </tr>
  <tr>
    <td>District</td>
    <td>'.$row['district'].'</td>
  </tr>
  <tr>
    <td>Area</td>
    <td>'.$row['area'].'</td>
  </tr>
  <tr>
    <td>Amount</td>
    <td>'.$row['amount'].'</td>
  </tr>
  <tr>
    <td>Image</td>
    <td><img src="../upload/'.$row['image'].'" alt="photo" height=20px width=20px /></td>
  </tr>
  <tr>
    <td>Landmark</td>
    <td>'.$row['landmark'].'</td>
  </tr>
  <tr>
    <td>Category</td>
    <td>'.$row['category'].'</td>
  </tr>

</table></div>
<div align="center"><form method="post" action="sendDetails.php">

<input type="hidden" name="name" value="'.$row["name"].'"/>
<input type="hidden" name="mobile" value="'.$row["mobile"].'"/>
<input type="hidden" name="landline" value="'.$row["landline"].'"/>
<input type="hidden" name="address" value="'.$row["address"].'"/>
<input type="hidden" name="plase" value="'.$row["plase"].'"/>
<input type="hidden" name="type" value="'.$row["type"].'"/>
<input type="hidden" name="place" value="'.$row["place"].'"/>
<input type="hidden" name="city" value="'.$row["city"].'"/>
<input type="hidden" name="district" value="'.$row["district"].'"/>
<input type="hidden" name="area" value="'.$row["area"].'"/>
<input type="hidden" name="amount" value="'.$row["amount"].'"/>
<input type="hidden" name="landmark" value="'.$row["landmark"].'"/>
<input type="hidden" name="category" value="'.$row["category"].'"/>
<input type="hidden" name="mid" value="'.$_GET["mid"].'"/>
<input type="submit" value="Send Now" name="mailbutton" />

</form></div>
';



		 }
	}
	else
	{
	echo "There are no results to show";
	}
	}else
	{
	echo "Enter Valid ID  Number";
	}



//////
if($_POST['mailbutton'] == 'Send Now')
{
$to=$_POST["mid"];
$subject="Details";
$nme = $_POST["name"];
$mob = $_POST["mobile"];
$pho = $_POST["landline"];
$adr = $_POST["address"];
$pls = $_POST["plase"];
$tpe = $_POST["type"];
$plc = $_POST["place"];
$cty = $_POST["city"];
$dst = $_POST["district"];
$ara = $_POST["area"];
$amt = $_POST["amount"];
$img = $_POST["image"];
$lmk = $_POST["landmark"];
$ctg = $_POST["category"];
$message="

			<table>

  <tr>
    <td>Contact Name</td>
    <td>$nme</td>
  </tr>
  <tr>
    <td>Contact Mobile</td>
    <td>$mob</td>
  </tr>
  <tr>
    <td>Contact Phone</td>
    <td>$pho</td>
  </tr>

  <tr>
    <td>Contact Address</td>
    <td>$adr</td>
  </tr>
  <tr>
    <td>Contact Addressee Place</td>
    <td>$pls</td>
  </tr>

  <tr>
    <td>Type</td>
    <td>$tpe</td>
  </tr>
  <tr>
    <td>Place</td>
    <td>$plc</td>
  </tr>
  <tr>
    <td>City</td>
    <td>$cty</td>
  </tr>
  <tr>
    <td>District</td>
    <td>$dst</td>
  </tr>
  <tr>
    <td>Area</td>
    <td>$ara</td>
  </tr>
  <tr>
    <td>Amount</td>
    <td>$amt</td>
  </tr>

  <tr>
    <td>Landmark</td>
    <td>$lmk</td>
  </tr>
  <tr>
    <td>Category</td>
    <td>$ctg</td>
  </tr>

</table>

";

$from="response@realspot.in";
$headers="from:".$from."\r\n";
$headers .= "Reply-To: realspot.in@gmail.com\r\n";
$headers  .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html";

mail($to,$subject,$message,$headers);
echo'
<script>
window.close();


</script>

';

}
?>

</td></tr>
</table>
</body>
</html>