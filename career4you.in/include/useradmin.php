<?php 
session_start();
include_once 'include/config.php';
//golden profile--15
//premium profile--25
$id = $_SESSION['id'];
$sql = "SELECT payment.plan AS plan,payment.cost AS cost,payment.actiondate AS actiondate,profile.cound AS cound,
payment.used AS used FROM payment INNER JOIN profile ON profile.profile=payment.plan WHERE payment.status='activated' AND payment.expired='N' AND payment.empid=".$id;
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
?>
<table>
<tr><td align="center" colspan="3">Plan Summary</td></tr>
<tr><td>Name</td><td>:</td><td><?php echo $row['plan']?></td></tr>
<tr><td>Cost</td><td>:</td><td><?php echo $row['cost']?></td></tr>
<tr><td>Activated On</td><td>:</td><td><?php echo $row['actiondate']?></td></tr>
<tr><td>Allowed Data</td><td>:</td><td><?php echo $row['cound']?></td></tr>
<tr><td>Used Data</td><td>:</td><td><?php echo $row['used']?></td></tr>
<tr><td>Remaining Data</td><td>:</td><td><?php echo $row['cound']-$row['used']?></td></tr>
</table>