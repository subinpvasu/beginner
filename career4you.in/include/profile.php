<?php 
session_start();
include_once 'include/config.php';
$id = $_SESSION['id'];
$sql = "SELECT * FROM employer WHERE id=".$id;
$result =  mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0)
{
	while($row = mysql_fetch_array($result))
	{
?>
<html><head></head>
<body>
  <div style="width: 350px;float: left;border-right:1px solid black;">
<table width="300px">
<tr>
<td><b>Address</b></td>
</tr>
<tr>
<td><?php echo $row['name'] ?></td>
</tr>
<tr>
<td><?php echo $row['address'] ?></td>
</tr>

<tr>
<td><?php echo $row['pin'] ?></td>
</tr>

<tr>
<td><?php echo $row['state'] ?></td>
</tr>

<tr>
<td><?php echo $row['country'] ?></td>
</tr>

<tr>
<td>Phone : <?php echo $row['phone'] ?></td>
</tr>

<tr>
<td>Mobile : <?php echo $row['mobile'] ?></td>
</tr>

<tr>
<td>Fax : <?php echo $row['fax'] ?></td>
</tr>

<tr>
<td>Email : <?php echo $row['email'] ?></td>
</tr>

<tr>
<td style="padding-bottom:25px;">Website : <?php echo $row['website'] ?></td>
</tr>

<tr>
<td><b>Testimonial</b></td>
</tr>
<tr>
<td style="padding-bottom:25px;"><?php echo $row['profile'] ?></td>
</tr>

<tr>
<td><b>Contact Person</b></td>
</tr>

<tr>
<td><?php echo $row['person'] ?></td>
</tr>

<tr>
<td><?php echo $row['designation'] ?></td>
</tr>

<tr>
<td>Contact No : <?php echo $row['mobile'] ?></td>
</tr>
<tr>
<td style="text-align: right"><a href="index.php?msg=empedit">Edit Details</a></td>
</tr> 
</table>
<?php 
	}
}
?>
</div>
<div style="width: 350px;float: right;">
<table width="100%">
<tr><td style="border-bottom: 1px solid black;width:100%;"><span>
 <a href="index.php?msg=reqire" title="Click to Add New Requirements">Add</a></span>
 <span style="padding-left: 195px;color:black;"><b>Requirements</b></span></td>
 </tr>
<?php 
$id = $_SESSION['id'];
$sql = "SELECT * FROM requirement WHERE empid=".$id;
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0)
{
	while($row = mysql_fetch_array($result))
	{
	echo'<tr>
<td><a href="index.php?msg=reqire&key='.$row['id'].'" title="Click to Change Requirement">'.$row['designation']. ' ('.$row['vacancy'].')</a></td>
</tr>';
	}
	}
?>
</table>
</div>
</body>
</html>