<?php
if($_SESSION['account'] == 'true') 
{
$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);
$email = $_SESSION['email'];
$sql = "SELECT * FROM register WHERE email = '$email'";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0) 
{
while($row = mysql_fetch_array($result))
{
$_SESSION['id'] = $row['Id'];
$_SESSION['name'] = $row['name'];
?>
<table cellpadding="10" align="center">
  <tr>
   <td colspan="3" align="center">
    <h4><font color="#000099">Your Profile</font></h4>
   </td>
  </tr>
  <tr>
   <td>I am</td>
   <td>:</td>
   <td>   <?php echo $row['type'] ?></td>
  </tr>
  <tr>
   <td>Name</td>
   <td>:</td>
   <td id="user">    <?php echo $row['name']?></td>
  </tr>
  <tr>
   <td>Mobile</td>
   <td>:</td>
   <td>   <?php echo $row['mobile']?></td>
  </tr>
  <tr>
   <td>Email</td>
   <td>:</td>
   <td>      <?php echo $row['email']?></td>
   </tr>
</table>
<?php 
}
}
}
else
{
echo "you are not a valid user from show.php";
}
if(is_numeric($_SESSION['advert']))
{
include_once'./include/search_result.php';
}
?>

