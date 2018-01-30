<?php 

session_start();


?>


        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <title>Realspot.in</title>
        
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta http-equiv="Content-Type"
        content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" type="text/css" href="dialog_box.css" />
        <script type="text/javascript" src="dialog_box.js"></script>
        
        
        <link href="css/style.css" rel="stylesheet" type="text/css">
        
  
  
  
  
  <style type="text/css">
  /* Larger Side Border */
.tb8 {
	width: 230px;
	height:23px;
	border: 1px solid #3366FF;
	border-left: 4px solid #3366FF;
}
/* Hover Button 1 */
.fb5 {
	background-color: #db6600;
	padding-left:6px;
	padding-right:6px;
	padding-top:3px;
	padding-bottom:3px;	
	color: #ffffff;
	border:1px solid #db6600;
	background-image: url(images/button_bg.jpg);
}
.fb5:hover {
	background-color: #000000;	
	border:1px solid #000000;
	background-image: url(images/button_bg_over.jpg);
}
.select{
width:235px;
height:23px;
	border: 1px solid #3366FF;
	border-left: 4px solid #3366FF;

}
.a{text-decoration:none;
font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.tb11 {
	background:#FFFFFF url(images/search.png) no-repeat 4px 4px;
	padding:4px 4px 4px 22px;
	border:1px solid #CCCCCC;
	width:180px;
	height:15px;
}
.fb7 {
    border: 1px solid #3366FF;
	background-color:#B3C6FF;
	height:15px;
}
.ta8 {
	width: 230px;
	height:60px;
	border:1px solid #3366FF;
	border-left: 4px solid #3366FF;
}
.true
{
background:#FFFFFF url(images/search.png) no-repeat 4px 4px;
}
--> 
</style>
                                </head>
                                <body>
                                
                                <div id="subject" class="main">
                                <div class="page-out">
                                <div class="page">
                                
                                
                                
<div class="header">

<div class="header-top" >
                                
<?php if($_SESSION['account'] == 'true' && $_SESSION['email'] != 'exit')
{
echo'
<ul>
  <li><a href="template.php?cat=inception"><span>Home</span></a></li>
  <li><a href="#"><span>Buy</span></a></li>
  <li><a href="template.php?sell=sell"><span>Sell</span></a></li>
  <li><a href="template.php?cat=inception&sms=show"><span>Account</span></a></li>
  <li><a href="template.php?info=quit"><span>LogOut</span></a></li>
</ul>
';
}
else if($_GET['info'] == 'quit')
{
echo '
<ul>
  <li><a href="template.php"><span>Home</span></a></li>
  <li><a href="template.php?catid=login"><span>Login</span></a></li>
  <li><a href="template.php?catid=register"><span>Register</span></a></li>
  <li><a href="#"><span>Buy</span></a></li>
  <li><a href="#"><span>Sell</span></a></li>
  <li><a href="#"><span>Contact</span></a></li>
</ul>
';
} 
else
{
echo '
<ul>
  <li><a href="template.php"><span>Home</span></a></li>
  <li><a href="template.php?catid=login"><span>Login</span></a></li>
  <li><a href="template.php?catid=register"><span>Register</span></a></li>
  <li><a href="#"><span>Buy</span></a></li>
  <li><a href="#"><span>Sell</span></a></li>
  <li><a href="#"><span>Contact</span></a></li>
</ul>
';
} ?> 

                            
</div>
        
        
                            
<div class="header-img">
<?php 
//include'./include/search.php';
?>
</div>
                           
 
      <div class="header-dis">

 <span align="left" style="height:200px;width:175px;float:left">
    
    <img src="images/logo.png" alt="logo" width="150" height="150" style="margin:22px 10px 10px 10px" />
    </span>   
    
       
 <span  style="height:150px;width:600px;float:left;border: 0px solid #FFFFFF;padding-top:15px;margin-top:30px;margin-left:30px">
 <font color="#99FFFF" size="+2" face="Times New Roman, Times, serif"> The Real Place for Realestate Buying/Selling/Rental
 </font>
 <br /><br />
 <font color="#000000" size="+2" style="padding-left:150px;"> 
 <a href="template.php?catid=register" style="text-decoration:none;color:#00CC00">Register Free </a>              </font>
 </span>
 
 
 
    
    <span align="left" style="height:175px;width:175px;float:left;background-color:#000000;float:right;margin-right:10px;border: 1px solid #FFFFFF;margin-top:12px;margin-bottom:10px">      </span>
    
    
    
    
    
    
    
</div>


             
             
              </div>
      

 
 
                            <div class="left-out">
                            <div class="left-in">
                            <div class="left-panel">
                            
                             <marquee behavior="alternate" direction="down"  >
                                The space for Advertisements2</marquee>
                          

<?php 
if($_GET['display'] == 'true' )
{
$ms = $_GET['text'];
echo '
<script type="text/javascript">
alert("'.$ms.'");


</script>
';

}





if($_GET['info'] == 'quit')
{
include'./include/logout.php';

}

else if($_SESSION['account']=='true' )

{

echo '
<h1 class="title">Welcome <span> '.$_SESSION['name'] .'</span></h1>
';

include './include/left_menu.php';

if($_GET['sms'] =='show' )
{
 include_once( './include/account.php');
}
else if($_GET['sms'] =='edit')
{

 include './include/edit.php';
}
else if($_GET['sell'] =='sell')
{

 include './property/accept.htm';
}
else if($_GET['add'] =='true')
{

 include './include/additional.php';
}
else if($_GET['msg'] =='pass')
{

 include './include/password.php';
}

}





 if($_GET['catid'] == 'login' && $_GET['cat'] != 'inception' && $_SESSION['account'] != 'true')
 {
 include './include/signin.php';
}
else if($_GET['catid'] == 'register' && $_GET['cat'] != 'inception' && $_SESSION['account'] != 'true')
{
include './include/new_form.php';
}
else if(($_GET['catid'] == 'register' || $_GET['catid'] == 'login') && $_SESSION['account'] == 'true')
{
include'./include/rough.php';
}
else if($_GET['trap'] == 'ready' )
{
include'./include/search_result.php';


}

?>


                               
                              </div>
                              </div>
                                
        </div>
                                
                                
                                <div class="right-out">
                                <div class="right-in">
    <marquee behavior="alternate" direction="down"  >
                                The space for Advertisements</marquee>
                                </div>
                                </div>
                                

                             <div class="sections">
                                        <table  align="center" border="1" width="100%"><tr><td class="section4">
                                        
                                        
                                        
                                       
                                        </td>
                                        <td  class="section4">
                                       
                                        
                                        </td><td  class="section4">
                                      
                                        
                                        </td><td class="section4">
                                        
                                        
                                        </td></tr></table>

</div>   
                                
                                

                                
                            
                                
                                
                                </div>
                                </div>
                                </div>
                                
                                <div class="footer" align="center" >
                                 
                            <p style="color:#FFFFFF;">    Powered by Gitacommunications 9387335165 </p>
                                
                                </div>
                                
                          
                                </body>
                                      
                               
                                </html>
