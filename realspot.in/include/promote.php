<?php
session_start();
$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
a{
	text-decoration: none;
	color:green;
}

.titlebar{
background-image: url(../images/greenpremiumbck.png);
	background-repeat: no-repeat;
	width: 100%;
	float: left;
	color:white;
}
.bull{
	background-image: url("../images/bullet.jpg");
    background-repeat: no-repeat;
    background-position: left;
padding-left:7px;
}
</style>
<script>
function packChange(str,sbn)
{
	var k = confirm("Do you want to change th package now?");
	var re = "template.php?msg=advorder&name="+sbn+"&pack="+str;
	if(k == true)
	{
	window.location = re;
	}
}
</script>
</head>
<body style="font-size:12px">
<h3 style="color:#FF0000"> 
PROMOTE YOUR PROPERTIES BY SELECTING ANY OF THE PLANS GIVEN BELOW.<br/>


</h3>

<?php 
$id = $_GET['name'];
$sql = "SELECT * FROM property WHERE informed_id='$id'";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0)
{
	?>
	
	<table cellpadding="5">
	<tr>
	<th>Property ID</th><th>Property Caption</th><th>Plan</th><th>Action</th>
	</tr><tr>
	<?php 
	while ($row = mysql_fetch_array($result))
	{
		
		$mysql  = "SELECT * FROM payment WHERE profileid=".$row['id'];
		$myrest = mysql_query($mysql);
		$val = mysql_fetch_array($myrest);
		echo '<td>'.$row["id"].'</td>
		<td>'.$row["area"].' @ '.$row["city"].'</td>';?>
		<td><select name="plan" onchange="packChange(this.value,<?php echo $row['id'];?>)">
		<option <?php if($row['package'] == 'Guest Profile Free'){echo "selected";}?> value="Guest Profile Free">Guest Profile Free</option>
		<option <?php if($row['package'] == 'Golden Profile Rs.600'   || $val['cost'] == 600){echo "selected";}?> value="Golden Profile Rs.600">Golden Profile Rs.600</option>
		<option <?php if($row['package'] == 'Premium Profile Rs.1000' || $val['cost'] == 1000){echo "selected";}?> value="Premium Profile Rs.1000">Premium Profile Rs.1000</option>
		</select>
		</td>
		<td>
		<?php 
		$m = $row['id'];
		$mql = "SELECT * FROM payment WHERE profileid='$m'";
		$rest = mysql_query($mql);
		while($col = mysql_fetch_array($rest))
		{
		echo $col['admin_status'];	
		}
		
		?>
		</td>
		</tr>
		<?php 	
		
	}
	?></table>
	
	<?php 
}


?>
</body>
</html>