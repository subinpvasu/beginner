  <?php 
  session_start();
  include_once 'include/config.php';
  if($_SESSION['account'] == 'true' && $_SESSION['employer'] != 'true')
  {
  ?>

  <table id="menu" style="font-size: 11px;line-height: 20px;margin-bottom:30px;">
  <tr>
<td id="apply" align="center" colspan="4" style="color:red;font-weight: bold"></td>
</tr>
  <tr>
        <td>|<a  href="index.php"><b> Profile</b></a></td>
        <td>|<a  href="index.php?msg=profsearch"><b> Search Profile</b></a></td>
        <td>|<a  href="index.php?msg=search"><b> Search Jobs</b></a></td>
        <td>|<a  href="index.php?msg=apply"><b> Applied Jobs</b></a></td>
       	<td>|<a  href="index.php?msg=password&key=<?php echo $_SESSION['id']?>">
       	<b> Change Password</b></a>|</td>	   
  </tr>
  
  <tr><td colspan="6" style="border-bottom: 1px solid black"></td>
  </tr>
  </table>
  <?php 
  }
  if ($_SESSION['employer'] == 'true' && $_SESSION['account'] != 'true')
  {
  	?>
  	<table id="menu" style="font-size: 11px;line-height: 20px;margin-bottom:30px;">
  <tr>
        <td>|<a  href="index.php"><b>Profile</b></a></td>
        <td>|<a  href="index.php?msg=resume"><b>Resume Search</b></a></td>
        <td>|<a  href="index.php?msg=order"><b>Resume Orders</b></a></td>
        <td>|<a  href="index.php?msg=reqire"><b>Requirements</b></a></td>	
        <?php 
        $eid = $_SESSION['id'];
        $sql = "SELECT * FROM payment WHERE status='activated' AND empid=".$eid;
        $res = mysql_query($sql) or die("query--".$sql ."--".mysql_error());
        while($row = mysql_fetch_array($res))
        {
        $status = $row['status'];
        } if($status == 'activated'){
         ?>
         <td>|<a  href="index.php?msg=plan"><b>Plan Details</b></a></td>	
         <?php   
       }
        ?>   
       	<td>|<a  href="index.php?msg=password&key=<?php echo $_SESSION['id']?>">
       	<b>Change Password</b></a>|</td>	   
  </tr>
  <tr><td colspan="6" style="border-bottom: 1px solid black"></td>
  </tr>
  </table>
  	
  	<?php 
  }
  if($_SESSION['account'] == 'true' && $_SESSION['employer'] == 'true')
  {
  	include_once 'include/logout.php';
  }
  ?>