<?php
$id = $_SESSION['id'];
$con = mysql_connect("localhost","wwwreals_realtes","test@123");


if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);

$sql = "SELECT * FROM register WHERE Id=".$id;

$result = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($result) > 0 ) 
{
while($row = mysql_fetch_array($result))
{
$nick    = $row['nickname'];
$address = $row['address'];
$place   = $row['place'];

}
}
?>
<form action="./include/validation.php" method="post" name="additional">
<table>
<tr>
<td> Nickname:</td><td><input type="text" name="name" class="tb8" value="<?php echo $nick ;   ?>" size="30" /> </td></tr>

<tr>
<td> Contact Address:</td><td><textarea class="ta8" name="address"  cols="23" rows="3"><?php echo $address;    ?></textarea> </td></tr>

<tr>
<td> Place:</td><td><input type="text" name="place" value="<?php echo $place;   ?>" class="tb8" size="30" /> </td></tr>
<tr><td> </td>
 <td align="center" rowspan="10" valign="middle">
  <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
 <input name="additional" class="fb5" type="submit" value="Add Details" />
  
</td></tr>
</table>
</form>



