 <?php /*

<form  action="process.php" method="post" name="reg_form">
    
  <table  width="100%" align="left"><tr><td width="30%">
    I am<font color="red">*</font>:</td><td width="50%"><select class="select" name="type"  id="item" onblur="validType()">
    <option name="" value="">--Select--</option>
    <option name="" value="Seller" <?php if($_SESSION['type'] == 'Seller'){echo "selected";}   ?> >Seller</option>
    <option name="" value="Buyer" <?php if($_SESSION['type'] == 'Buyer'){echo "selected";}   ?>>Buyer</option>
    <option name="" value="Agent" <?php if($_SESSION['type'] == 'Agent'){echo "selected";}   ?>>Agent</option>
    </select></td><td width="20%" id="msg"></td></tr>
    
    <tr><td width="30%">
   Name<font color="red">*</font>: </td><td width="50%"><input name="name" class="tb8" type="text" size="30" maxlength="30" 
   onblur="validName()" id="name" value="<?php echo $_SESSION['name']?>" /></td><td width="20%" id="msg"></td></tr>
   <tr><td width="30%">
   Mobile<font color="red">*</font>:</td><td width="50%">
   <input name="mobile" type="text" size="30" maxlength="12" id="mobile"
   value="<?php echo $_SESSION['mobile']?>"  class="tb8" onblur="validMob()"/> </td><td width="20%"><p id="msg" ></p>  </td></tr>
 <tr><td width="30%">  
Any LandLine <font color="red">*</font>:</td><td width="50%">
   <input type="text" name="phone" size="30" id="landline" class="tb8" 
   value="<?php echo $_SESSION['phone']?>" onblur="validLine()"/></td><td width="20%" id="msg"></td></tr>
   

    <tr><td width="30%">
   E-mail<font color="red">*</font>: </td><td width="50%"><input name="email"type="text" class="tb8" size="30" maxlength="60"
   value="<?php echo $_SESSION['email']?>" id="mail"onblur="validMail()"/></td><td width="20%" id="msg"></td></tr>
   
   <tr><td width="30%">
   Password<font color="red">*</font>: </td><td width="50%"><input name="passa" class="tb8" type="password" size="30" maxlength="30" value="<?php echo $_SESSION['pass']?>" id="passa"/></td><td width="20%" id="msg"></td></tr>
   
   </table>
   
   <div  align="center">
   
   
   
   
   
    <input name="update" class="fb5" onclick="javascript:validForm()" type="submit" value="Update" />
    </div>
    
    </form>
	
/*/
?>
<?php 


if($_SESSION['account'] == 'true') 
{


$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("sb_realestate", $con);


$email = $_SESSION['email'];



$sql = "SELECT * FROM register WHERE email = '$email'";

$result = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($result) > 0) 
{
while($row = mysql_fetch_array($result))
{

?>
<h1 class="title">Welcome <span><?php echo $row['name'] ?></span></h1>
<div align="center">
<table cellpadding="10" align="center">
<caption><h4><font color="#000099">Your Profile</font></h4></caption>

<tr><td>I am</td><td>   <?php echo $row['type'] ?>              </td></tr>
<tr><td>Name</td><td>    <?php echo $row['name']?>             </td></tr>
<tr><td>Mobile</td><td>   <?php echo $row['mobile']?>              </td></tr>
<tr><td>LandLine</td><td>  <?php echo $row['landline']?>               </td></tr>
<tr><td>Email</td><td>      <?php echo $row['email']?>           </td></tr>


</table>
</div>

<div align="right">
<h4><a href="template.php?sms=edit&cat=inception&name=<?php echo $row['Id'] ;  ?>" style="text-decoration:none">Edit Details</a></h4>
</div>




<?php 
}

}
}
else
{
echo "you are not a valid user from show.php";
}

?>
<?php 
/*

session_start();
$id = $_SESSION['ssd'];
$status = $_SESSION['account'];

echo "$id"."$status";

*/
?>



