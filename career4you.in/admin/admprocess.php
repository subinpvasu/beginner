<?php
include_once '../include/config.php';
//update three tables amake  those things are updated with the other three tables like,education,technical,employment.
if(isset($_POST['editjobs']))
{

$desgn  = $_POST['designation'];
$vacan  = $_POST['vacancy'];
$age    = $_POST['age'];
$gender = $_POST['gender'];
$salary = $_POST['salary'];
$remark = $_POST['remarks'];
$exprie = $_POST['experience'];
$type   = $_POST['type'];
$categ  = $_POST['category'];
$rqrmnt = $_POST['requirement'];
$key 	= $_POST['userid'];
 
$sql = "UPDATE requirement SET designation='$desgn',vacancy='$vacan',age='$age',sex='$gender',salary='$salary', remarks='$remark',experience='$exprie',type='$type',category='$categ',requirement='$rqrmnt' WHERE id=".$key;
mysql_query($sql);
echo ' 
<script language="JavaScript" type="text/javascript">  
var count =4;  
var sign;
function countDown(){  
if (count <=0){  
self.close(); 
}else{  
count--;  
if(count==3){sign=".";}if(count==2){sign=".."}if(count==1){sign="..!"}

document.getElementById("timer").innerHTML = "Changes Saved Successfully."+sign; 
setTimeout("countDown()", 1000)  
}  
}  
</script>  
<span align="center" style="color:red;font-weight:bold;text-align:center" id="timer">  
<script>  
countDown();  
</script>  
</span>  
';
}
if(isset($_POST['editemploy']))
{
$name = $_POST['name'];
$type = $_POST['comtype'];
$addr = $_POST['address'];
$plce = $_POST['place'];
$pin  = $_POST['pin'];
$stte = $_POST['state'];
$cntr = $_POST['country'];
$phne = $_POST['phone'];
$mobl = $_POST['mobile'];
$fax  = $_POST['fax'];
$emil = $_POST['email'];
$wbst = $_POST['website'];
$prfl = $_POST['profile'];
$cntt = $_POST['contact'];
$dsnt = $_POST['designation'];
$nmbr = $_POST['number'];
$key  = $_POST['userid'];

$sql = "UPDATE employer SET name='$name',type='$type',address='$addr',pin='$pin',state='$stte',country='$cntr',phone='$phne',mobile='$mobl', fax='$fax',email='$emil',website='$wbst',profile='$prfl',person='$cntt',designation='$dsnt',contact='$nmbr',district='$plce' WHERE id=".$key;
mysql_query($sql);
echo ' <script language="JavaScript" type="text/javascript">  
var count =4;  
var sign;
function countDown(){  
if (count <=0){  
self.close(); 
}else{  
count--;  
if(count==3){sign=".";}if(count==2){sign=".."}if(count==1){sign="..!"}

document.getElementById("timer").innerHTML = "Changes Saved Successfully."+sign; 
setTimeout("countDown()", 1000)  
}  
}  
</script>  
<span align="center" style="color:red;font-weight:bold;text-align:center" id="timer">  
<script>  
countDown();  
</script>  
</span>  
';
}
if(isset($_POST['editcandi']))
{
$name = $_POST['name'];
$fthr = $_POST['father'];
$plce = $_POST['place'];
$brth = $_POST['birth'];
$age  = $_POST['age'];
$gndr = $_POST['gender'];
$mrtl = $_POST['marital'];
$spse = $_POST['spouse'];
$chld = $_POST['child'];
$prad = $_POST['peraddress'];
$pred = $_POST['preaddress'];
$phne = $_POST['phone'];
$mble = $_POST['mobile'];
$fax  = $_POST['fax'];
$emle = $_POST['email'];
$key  = $_POST['userid'];

$sql = "UPDATE register SET name='$name',father='$fthr',birthplace='$plce',birthday='$brth',age='$age',marriage='$mrtl', wife='$spse',child='$chld',peraddress='$prad',preaddress='$pred',phone='$phne',mobile='$mble',fax='$fax', email='$emle',gender='$gndr' WHERE id=".$key;
mysql_query($sql);
echo ' <script language="JavaScript" type="text/javascript">  
var count =4;  
var sign;
function countDown(){  
if (count <=0){  
self.close(); 
}else{  
count--;  
if(count==3){sign=".";}if(count==2){sign=".."}if(count==1){sign="..!"}

document.getElementById("timer").innerHTML = "Changes Saved Successfully."+sign; 
setTimeout("countDown()", 1000)  
}  
}  
</script>  
<span  style="color:red;font-weight:bold;text-align:center" id="timer">  
<script>  
countDown();  
</script>  
</span>  
';
}
if($_POST['subprofile']=='Save Changes')
{
         $prfl = $_POST['profile'];
         $cost = $_POST['cost'];
         $nmbr = $_POST['numbers'];
         $vldt = $_POST['validity'];
         $id   = $_POST['userid'];
         $sql = "UPDATE profile SET profile='$prfl',cost='$cost',cound='$nmbr',validity='$vldt' WHERE id=".$id;
         mysql_query($sql);
         echo ' <script language="JavaScript" type="text/javascript">  
var count =4;  
var sign;
function countDown(){  
if (count <=0){  
self.close(); 
}else{  
count--;  
if(count==3){sign=".";}if(count==2){sign=".."}if(count==1){sign="..!"}

document.getElementById("timer").innerHTML = "Profile Changes Saved Successfully."+sign; 
setTimeout("countDown()", 1000)  
}  
}  
</script>  
<span  style="color:red;font-weight:bold;text-align:center" id="timer">  
<script>  
countDown();  
</script>  
</span>  
';
}
if($_POST['subpro']=='Save Profile')
{
         $prfl = $_POST['profile'];
         $cost = $_POST['cost'];
         $nmbr = $_POST['numbers'];
         $vldt = $_POST['validity'];
      
         $sql = "INSERT INTO profile(profile,cost,cound,validity)VALUES('$prfl','$cost','$nmbr','$vldt')";
        if(mysql_query($sql)){
         echo ' <script language="JavaScript" type="text/javascript">  
var count =4;  
var sign;
function countDown(){  
if (count <=0){  
self.close(); 
}else{  
count--;  
if(count==3){sign=".";}if(count==2){sign=".."}if(count==1){sign="..!"}

document.getElementById("timer").innerHTML = "Profile Created Successfully."+sign; 
setTimeout("countDown()", 1000)  
}  
}  
</script>  
<span  style="color:red;font-weight:bold;text-align:center" id="timer">  
<script>  
countDown();  
</script>  
</span>  
';
}
else
{
  echo ' <script language="JavaScript" type="text/javascript">  
var count =4;  
var sign;
function countDown(){  
if (count <=0){  
self.close(); 
}else{  
count--;  
if(count==3){sign=".";}if(count==2){sign=".."}if(count==1){sign="..!"}

document.getElementById("timer").innerHTML = "Profile Creation Failed."+sign; 
setTimeout("countDown()", 1000)  
}  
}  
</script>  
<span  style="color:red;font-weight:bold;text-align:center" id="timer">  
<script>  
countDown();  
</script>  
</span>  
'; 
 
}
}
?>