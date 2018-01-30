 <style type="text/css">
 
 .menu{
 position:absolute;
 background-color:#FFFFFF;
 
 
 
 }
 
 
 
 
 
 
 </style> 
  <script type="text/javascript">
				function showmenu(elmnt)
				{
				document.getElementById(elmnt).style.visibility="visible";
				}
				function hidemenu(elmnt)
				{
				document.getElementById(elmnt).style.visibility="hidden";
				}
  </script>
  
  
  <?php
  echo '<h1 align="left" class="title">Welcome <span> '.$_SESSION['name'] .'</span></h1>';
  ?>
      
      <ul style="border-right: 1px solid grey; padding: 5px;list-style-type: none;width:155px;float:left">
        <li><a href="template.php?cat=inception&sms=show"><span>Account</span></a></li>
        <li><a href="template.php?sms=edit&cat=inception&name=<?php echo $_SESSION['id'] ?>">Edit Details</a></li>
        <li><a href="template.php?add=true">Add More Details</a></li>
        <li><a href="template.php?sell=sell"><span>Add Property</span></a></li>
        
<?php
$id = $_SESSION['id'];

$con = mysql_connect("localhost","wwwreals_realtes","test@123");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);


$sql="SELECT * FROM property WHERE informed_id='".$id."'";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result) > 0 ) 

{
?>
 
 
<table>
 <tr>
  <td onmouseover="showmenu('tutorials')" onmouseout="hidemenu('tutorials')">
   <li><a href="" style="background-position:4px center">Edit Property Details</a></li>
   <table style="position:absolute;visibility:hidden;background-color:#FFFFFF"  id="tutorials">
   

<?php 
while($row = mysql_fetch_array($result))
{
echo '
<tr><td><a href="template.php?edit=property&id='.$row['id'].'" style="text-decoration:none">'.$row['area'].'@'.$row['city'].'</a></td></tr>

';


}

}

?>

</table>
</td>
</tr>
</table>




        
        
     
        









<li><a href="template.php?msg=promo&name=<?php echo $_SESSION['id'] ?>"><span>Advertise With Us</span></a></li>
<li><a href="template.php?msg=pass&name=<?php echo $_SESSION['id'] ?>">Change Password</a></li>
<li><a href="template.php?msg=pay&name=<?php echo $_SESSION['id'] ?>">Payment Details</a></li>
        
        <?php 
		
		$m = 'status';
		$k = $_SESSION['id'];
		$con = mysql_connect("localhost","wwwreals_realtes","test@123");


if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("wwwreals_realestate", $con);


$sql = "SELECT * FROM payment WHERE status IN ('active','processing','delivered') AND custid=".$k;
$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error());

if(mysql_num_rows($result) > 0) 
{


	?>
    
    <li><a href="template.php?msg=order&name=<?php echo $_SESSION['id'] ?>">Order Details</a></li>
	
	
	<?php
	
					



}
		
		
		
		
		?>
        
        
        
        
        <li><a href="template.php?contact=yes"><span>Contact Us</span></a></li>
        <li><a href="template.php?info=quit"><span>LogOut</span></a></li>
      </ul>
  
