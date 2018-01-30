<?php
session_start ();
include_once 'config.php';
include_once 'sendMailAgent.php';
if ($_GET ['msg'] == 'checkdate')
   {
      $month = $_GET ['m'];
      $day = $_GET ['d'];
      $year = $_GET ['y'];
      if (! empty ( $month ) && ! empty ( $day ))
         {
            if (checkdate ( $month, $day, $year ))
               {
                  echo '<input type="hidden" id="din" value="123456"/>';
                  echo '<input type="hidden" name="payday" id="payday" value="' . $day . '/' . $month . '/' . $year . '"/>';
               }
            else
               {
                  echo '<input type="hidden" id="din" value=""/>';
               }
         }
      else
         {
            echo '<input type="hidden" id="din" value=""/>';
         }
   }
if ($_GET ['msg'] == 'change')
   {
      $id = $_GET ['p'];
      $pw = $_GET ['q'];
      $sql = "SELECT * FROM register WHERE password='$pw' AND id='$id'";
      $result = mysql_query ( $sql ) or die ( mysql_error () );
      if (mysql_num_rows ( $result ) == 1)
         {
            echo "Y";
         }
      else
         {
            echo "N";
         }
   }
if ($_GET ['msg'] == 'changeem')
   {
      $id = $_GET ['p'];
      $pw = $_GET ['q'];
      $sql = "SELECT * FROM employer WHERE password='$pw' AND id='$id'";
      $result = mysql_query ( $sql ) or die ( mysql_error () );
      if (mysql_num_rows ( $result ) == 1)
         {
            echo "Y";
         }
      else
         {
            echo "N";
         }
   }
if ($_GET ['msg'] == 'passmail')
   {
      $mailid = $_GET ['q'];
      if (! preg_match ( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+$/", $mailid ))
         {
            echo "Enter Valid email ID";
         }
      else
         {
            $sql = "SELECT * FROM register WHERE email='$mailid' ";
            $result = mysql_query ( $sql ) or die ( mysql_error () );
            if (mysql_num_rows ( $result ) > 0)
               {
                  echo '<input type="button" onclick="sentPass()" name="mailbut" value="Submit" />';
               }
            else
               {
                  echo 'Enter Registered EmailId';
               }
         }
   }
if ($_GET ['msg'] == 'empmail')
   {
      $mailid = $_GET ['q'];
      if (! preg_match ( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+$/", $mailid ))
         {
            echo "Enter Valid email ID";
         }
      else
         {
            $sql = "SELECT * FROM employer WHERE email='$mailid' ";
            $result = mysql_query ( $sql ) or die ( mysql_error () );
            if (mysql_num_rows ( $result ) > 0)
               {
                  echo '<input type="button" onclick="semtPass()" name="mailbut" value="Submit" />';
               }
            else
               {
                  echo 'Enter Registered EmailId';
               }
         }
   }
if ($_GET ['msg'] == 'mailsent')
   {
      $mid = $_GET ['q'];
      $sql = "SELECT password FROM register WHERE email='$mid'";
      $result = mysql_query ( $sql ) or die ( "Error in query: $sql. " . mysql_error () );
      if (mysql_num_rows ( $result ) > 0)
         {
            while ( $row = mysql_fetch_array ( $result ) )
               {
                  $pass = $row ['password'];
               }
         }
         //send mail
      $to = $mid;
      $subject = "Password Information";
      $message = "<table><tr><td>	Your Current Password is: </td><td>$pass</td></tr>
		  <tr><td>	Login to </td>
		  <td>http://www.career4you.in/</td></tr>
		  </table>";
      $from = "response@career4you.in";
      $headers = "from:" . $from . "\r\n";
      $headers .= "Reply-To: career4you.in@gmail.com\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html";
      mail ( $to, $subject, $message, $headers );
      echo '<p onmouseover="javascript:self.close();">Thank you for your patience</p><br>';
   }
if ($_GET ['msg'] == 'mailsemt')
   {
      $mid = $_GET ['q'];
      $sql = "SELECT password FROM employer WHERE email='$mid'";
      $result = mysql_query ( $sql ) or die ( "Error in query: $sql. " . mysql_error () );
      if (mysql_num_rows ( $result ) > 0)
         {
            while ( $row = mysql_fetch_array ( $result ) )
               {
                  $pass = $row ['password'];
               }
         }
         //send mail
      $to = $mid;
      $subject = "Password Information";
      $message = "<table><tr><td>	Your Current Password is: </td><td>$pass</td></tr>
		  <tr><td>	Login to </td>
		  <td>http://www.career4you.in/</td></tr></table>";
      $from = "response@career4you.in";
      $headers = "from:" . $from . "\r\n";
      $headers .= "Reply-To: career4you.in@gmail.com\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html";
      mail ( $to, $subject, $message, $headers );
      echo '<p onmouseover="javascript:self.close();">Thank you for your patience</p><br>';
   }
if ($_GET ['msg'] == 'status')
   {
      $k = $_GET ['q'];
      $status = 'deleted';
      $sql = "UPDATE payment SET status='$status' WHERE Id =" . $k;
      $result = mysql_query ( $sql ) or die ( "Error in query: $sql. " . mysql_error () );
      echo "Y";
   }
if ($_GET ['msg'] == 'apply')
   {
      $id = $_GET ['q'];
      $cd = $_GET ['p'];
      $mt = 'X';
      $tm = array ($mt );//cd<-->mt
      if (is_numeric ( $id ))
         {
            $sql = "SELECT * FROM requirement WHERE id=" . $id;
            $result = mysql_query ( $sql ) or die ( mysql_error () );
            if (mysql_num_rows ( $result ) > 0)
               {
                  while ( $row = mysql_fetch_array ( $result ) )
                     {
                        $applicant = $row ['applicant'];
                        if (empty ( $applicant ))
                           {
                              $msql = "UPDATE requirement SET applicant=$mt WHERE id=" . $id;//mt<-->cd
                              mysql_query ( $msql );
                             // echo 'You Successfully Applied For this Job.';
                                   $sqlll = "SELECT requirement.id AS rid,employer.id AS eid,requirement.designation AS designation,
      employer.name AS name,employer.address AS address,employer.district AS place,employer.mobile AS mobile,
      employer.email AS email,employer.paid AS paid,employer.premier AS premier,requirement.paid
      AS rpaid,requirement.premier AS rpremier FROM requirement INNER JOIN employer ON 
      requirement.empid=employer.id WHERE 	employer.publish='Y' AND requirement.publish='Y' AND 
      requirement.id=".$id;
      $rst = mysql_query($sqlll);
      $col = mysql_fetch_array($rst);
      
      
      $sqlcd = "SELECT register.id AS id,register.name AS name,register.preaddress AS preaddress,
      	register.mobile AS mobile,register.email AS email,register.gender AS gender,
      	technical.summary AS summary,employment.capability AS capability,employment.firm AS firm,
      	employment.salary AS salary,
      	employment.expect AS expect,education.course AS course FROM register
            INNER JOIN technical ON register.id = technical.regid
            INNER JOIN employment ON register.id = employment.regid
            INNER JOIN education ON education.regid = register.id
            WHERE register.id =".$cd;
   $rest = mysql_query($sqlcd);
   $row = mysql_fetch_array($rest);
   
$reqrid  = $col['rid'];   
$emplid  = $col['eid'];
$candid  = $row['id'];
$name    = $row['name'];
$address = $row['preaddress'];
$mobile  = $row['mobile'];
$email   = $row['email'];
$gender  = $row['gender'];
$cours   = $row['course'];
$firm    = $row['firm'];
$cours   = str_replace("|",",",$cours);
$firm    = str_replace("|",",",$firm);
$summry  = $row['summary'];
$capab   = $row['capability'];
$salar   = $row['salary'];
$expct   = $row['expect'];
$desig  = $col['designation'];
$firme  = $col['name'];
$addre  = $col['address'];
$place  = $col['place'];
$emall  = $col['email'];
$mobil  = $col['mobile'];
$epaid  = $col['paid'];
$rpaid  = $col['rpaid'];
$eprem  = $col['premier'];
$rprem  = $col['rpremier'];

      // start from here.............
      /*
       * 
       * available
       * cand id,requir id
       * $cd,$id
       * 
       * send an email including the details are candidateID,requirement ID ,employer ID and some job details
       * to if they are a paid member then to corresponding mail or to the career 4 you.in
       * "$message";
       *  with some details are as followed
       * //unpaid
       * Candi name:
       * Cand ID :
       * Firm :
       * Firm ID
       * Requi:
       * Requir ID
       * information msg to the client and send some  details to career4you.in
       * contact career4 further detraoils
       * 
       * create the query and then to forward details and send the details to us
       * 
       * 
       * //Paid :
       * Candi Name:
       * Address:
       * Phone:
       * Edu .Qualifi:
       * Emplo:
       * desig:
       * //
       */
if($epaid=='Y'||$rpaid=='Y'||$rprem=='Y'||$eprem=='Y')
{
      $message  = '
     
      <html><head>
      </head>
      <body>
      <table align="center" style="text-align:center">
            <tr><td colspan="3" align="center" style="color:black;font-weight:bold"> <b style="color:red;font-style: italic;">'.$name.'</b> Applied for the Post of <b style="color:red;font-style: italic;">'.$desig.'</b> in your firm</td></tr>
      <tr><td colspan="3" align="center" style="color:blue;font-weight:bold">Job Application</td></tr>
      <tr style="background-color:pink"><td colspan="3" align="left" style="color:green;font-weight:bold">Candidate details</td></tr>
   <tr><td style="width:33%">Candidate Name</td>	<tdstyle="width:33%">:</td><tdstyle="width:33%">'.$name.'</td></tr>
   <tr><td>Address</td>		    <td>:</td><td>'.$address.'</td></tr>
   <tr><td>Email</td>			<td>:</td><td>'.$email.'</td></tr>
   <tr><td>Mobile</td>			<td>:</td><td>'.$mobile.'</td></tr>
   <tr><td>Education</td>		<td>:</td><td>'.$cours.'</td></tr>
   <tr><td>Employment Status</td>		<td>:</td><td>'.$firm.'</td></tr>
   <tr><td>Summary</td>			<td>:</td><td>'.$summry.'</td></tr>
   <tr><td>Current Salary</td>	<td>:</td><td>'.$salar.'</td></tr>
   <tr><td>Expected Salary</td> <td>:</td><td>'.$expct.'</td></tr>
      <tr style="background-color:pink"><td colspan="3" align="left" style="color:green;font-weight:bold">Employer Details</td></tr>
   <tr><td>Designation</td>  	<td>:</td><td>'.$desig.'</td></tr>
   <tr><td>Firm</td>			<td>:</td><td>'.$firme.'</td></tr>
   <tr><td>Firm Address</td>	<td>:</td><td>'.$addre.'</td></tr>
   <tr><td>Place</td>			<td>:</td><td>'.$place.'</td></tr>
   <tr><td>Email</td>			<td>:</td><td>'.$emall.'</td></tr>
   <tr><td>Mobile</td>			<td>:</td><td>'.$mobil.'</td></tr>
    <tr style="background-color:pink"><td colspan="3" align="left" style="color:green;font-weight:bold">Career4you Reference</td></tr>
   <tr><td>Candidate ID</td><td>Requirement ID</td><td>Employer ID</td></tr>
   <tr><td>'.$candid.'</td><td>'.$reqrid.'</td><td>'.$emplid.'</td></tr>
      </table>
      </body>
      </html>';
      
      }
    else {
       
  $message = '
      
      <html><head>
      </head>
      <body>
      <table align="center" style="text-align:center">
      <tr><td colspan="3" align="center" style="color:black;font-weight:bold"> <b style="color:red;font-style: italic;">'.$name.'</b> Applied for the Post of <b style="color:red;font-style: italic;">'.$desig.'</b> in your firm</td></tr>
      <tr><td colspan="3" align="center" style="color:blue;font-weight:bold">Job Application</td></tr>
      <tr style="background-color:pink"><td colspan="3" align="left" style="color:green;font-weight:bold">Candidate details</td></tr>
   <tr><td style="width:33%">Candidate Name</td>	<tdstyle="width:33%">:</td><tdstyle="width:33%">'.$name.'</td></tr>
   <tr><td>Address</td>		    <td>:</td><td>XXXXXXXXXX</td></tr>
   <tr><td>Email</td>			<td>:</td><td>XXXXXXXXXX</td></tr>
   <tr><td>Mobile</td>			<td>:</td><td>XXXXXXXXXX</td></tr>
   <tr><td>Education</td>		<td>:</td><td>'.$cours.'</td></tr>
   <tr><td>Employment Status</td>		<td>:</td><td>'.$firm.'</td></tr>
   <tr><td>Summary</td>			<td>:</td><td>'.$summry.'</td></tr>
   <tr><td>Current Salary</td>	<td>:</td><td>'.$salar.'</td></tr>
   <tr><td>Expected Salary</td> <td>:</td><td>'.$expct.'</td></tr>
      <tr style="background-color:pink"><td colspan="3" align="left" style="color:green;font-weight:bold">Employer Details</td></tr>
   <tr><td>Designation</td>  	<td>:</td><td>'.$desig.'</td></tr>
   <tr><td>Firm</td>			<td>:</td><td>'.$firme.'</td></tr>
   <tr><td>Firm Address</td>	<td>:</td><td>'.$addre.'</td></tr>
   <tr><td>Place</td>			<td>:</td><td>'.$place.'</td></tr>
   <tr><td>Email</td>			<td>:</td><td>'.$emall.'</td></tr>
   <tr><td>Mobile</td>			<td>:</td><td>'.$mobil.'</td></tr>
    <tr style="background-color:pink"><td colspan="3" align="left" style="color:green;font-weight:bold">Career4you Reference</td></tr>
   <tr><td>Candidate ID</td><td>Requirement ID</td><td>Employer ID</td></tr>
   <tr><td>'.$candid.'</td><td>'.$reqrid.'</td><td>'.$emplid.'</td></tr>
    <tr><td colspan="3" style="text-decoration:none;color:green;font-weight:bold">
Visit <a href="http://www.career4you.in/">career4you.in</a> for more details
    </td></tr>
      </table>
      </body>
      </html>';
      
    }
      
      
      $to       = "career4you.in@gmail.com";
    
      $subject  = "Recruitment through Career4you.in--".$desig;
      $from     = "response@career4you.in";
      $headers  = "from:" . $from . "\r\n";
      $headers .= "Reply-To: career4you.in@gmail.com\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html\n";
      $headers .= "Bcc:".$email.",".$emall."\n";
     /*$resp = mail ( $to, $subject, $message, $headers );
     if($resp)
     {
           echo 'You Successfully Applied For this Job.';
     }//*/echo 'Unable to send Application .Contact career4you.in';
       
                           }
                        else
                           {
                              if(strpos($applicant,",")){
                              $appli = explode ( ",", $applicant );
                              }else
                              {
                                 $appli = explode(" ",$applicant);
                              }
                              if ((array_search ( $cd, $appli ))!="")
                                 {
                                    echo 'You  Applied Once.';
                                 }
                              else
                                 {
                                    $tem = array_merge ( $appli, $tm );
                                    $tep = implode ( ",", $tem );
                                    $msql = "UPDATE requirement SET applicant='$tep' WHERE id=" . $id;
                                    mysql_query ( $msql );
                                   
      $sqlll = "SELECT requirement.id AS rid,employer.id AS eid,requirement.designation AS designation,
      employer.name AS name,employer.address AS address,employer.district AS place,employer.mobile AS mobile,
      employer.email AS email,employer.paid AS paid,employer.premier AS premier,requirement.paid
      AS rpaid,requirement.premier AS rpremier FROM requirement INNER JOIN employer ON 
      requirement.empid=employer.id WHERE 	employer.publish='Y' AND requirement.publish='Y' AND 
      requirement.id=".$id;
      $rst = mysql_query($sqlll);
      $col = mysql_fetch_array($rst);
      
      
      $sqlcd = "SELECT register.id AS id,register.name AS name,register.preaddress AS preaddress,
      	register.mobile AS mobile,register.email AS email,register.gender AS gender,
      	technical.summary AS summary,employment.capability AS capability,employment.firm AS firm,
      	employment.salary AS salary,
      	employment.expect AS expect,education.course AS course FROM register
            INNER JOIN technical ON register.id = technical.regid
            INNER JOIN employment ON register.id = employment.regid
            INNER JOIN education ON education.regid = register.id
            WHERE register.id =".$cd;
   $rest = mysql_query($sqlcd);
   $row = mysql_fetch_array($rest);
   
$reqrid  = $col['rid'];   
$emplid  = $col['eid'];
$candid  = $row['id'];
$name    = $row['name'];
$address = $row['preaddress'];
$mobile  = $row['mobile'];
$email   = $row['email'];
$gender  = $row['gender'];
$cours   = $row['course'];
$firm    = $row['firm'];
$cours   = str_replace("|",",",$cours);
$firm    = str_replace("|",",",$firm);
$summry  = $row['summary'];
$capab   = $row['capability'];
$salar   = $row['salary'];
$expct   = $row['expect'];
$desig  = $col['designation'];
$firme  = $col['name'];
$addre  = $col['address'];
$place  = $col['place'];
$emall  = $col['email'];
$mobil  = $col['mobile'];
$epaid  = $col['paid'];
$rpaid  = $col['rpaid'];
$eprem  = $col['premier'];
$rprem  = $col['rpremier'];

      // start from here.............
      /*
       * 
       * available
       * cand id,requir id
       * $cd,$id
       * 
       * send an email including the details are candidateID,requirement ID ,employer ID and some job details
       * to if they are a paid member then to corresponding mail or to the career 4 you.in
       * "$message";
       *  with some details are as followed
       * //unpaid
       * Candi name:
       * Cand ID :
       * Firm :
       * Firm ID
       * Requi:
       * Requir ID
       * information msg to the client and send some  details to career4you.in
       * contact career4 further detraoils
       * 
       * create the query and then to forward details and send the details to us
       * 
       * 
       * //Paid :
       * Candi Name:
       * Address:
       * Phone:
       * Edu .Qualifi:
       * Emplo:
       * desig:
       * //
       */
if($epaid=='Y'||$rpaid=='Y'||$rprem=='Y'||$eprem=='Y')
{
      $message  = '
     
      <html><head>
      </head>
      <body>
      <table align="center" style="text-align:center">
            <tr><td colspan="3" align="center" style="color:black;font-weight:bold"> <b style="color:red;font-style: italic;">'.$name.'</b> Applied for the Post of <b style="color:red;font-style: italic;">'.$desig.'</b> in your firm</td></tr>
      <tr><td colspan="3" align="center" style="color:blue;font-weight:bold">Job Application</td></tr>
      <tr style="background-color:pink"><td colspan="3" align="left" style="color:green;font-weight:bold">Candidate details</td></tr>
   <tr><td style="width:33%">Candidate Name</td>	<tdstyle="width:33%">:</td><tdstyle="width:33%">'.$name.'</td></tr>
   <tr><td>Address</td>		    <td>:</td><td>'.$address.'</td></tr>
   <tr><td>Email</td>			<td>:</td><td>'.$email.'</td></tr>
   <tr><td>Mobile</td>			<td>:</td><td>'.$mobile.'</td></tr>
   <tr><td>Education</td>		<td>:</td><td>'.$cours.'</td></tr>
   <tr><td>Employment Status</td>		<td>:</td><td>'.$firm.'</td></tr>
   <tr><td>Summary</td>			<td>:</td><td>'.$summry.'</td></tr>
   <tr><td>Current Salary</td>	<td>:</td><td>'.$salar.'</td></tr>
   <tr><td>Expected Salary</td> <td>:</td><td>'.$expct.'</td></tr>
      <tr style="background-color:pink"><td colspan="3" align="left" style="color:green;font-weight:bold">Employer Details</td></tr>
   <tr><td>Designation</td>  	<td>:</td><td>'.$desig.'</td></tr>
   <tr><td>Firm</td>			<td>:</td><td>'.$firme.'</td></tr>
   <tr><td>Firm Address</td>	<td>:</td><td>'.$addre.'</td></tr>
   <tr><td>Place</td>			<td>:</td><td>'.$place.'</td></tr>
   <tr><td>Email</td>			<td>:</td><td>'.$emall.'</td></tr>
   <tr><td>Mobile</td>			<td>:</td><td>'.$mobil.'</td></tr>
    <tr style="background-color:pink"><td colspan="3" align="left" style="color:green;font-weight:bold">Career4you Reference</td></tr>
   <tr><td>Candidate ID</td><td>Requirement ID</td><td>Employer ID</td></tr>
   <tr><td>'.$candid.'</td><td>'.$reqrid.'</td><td>'.$emplid.'</td></tr>
      </table>
      </body>
      </html>';
      
      }
    else {
       
  $message = '
      
      <html><head>
      </head>
      <body>
      <table align="center" style="text-align:center">
      <tr><td colspan="3" align="center" style="color:black;font-weight:bold"> <b style="color:red;font-style: italic;">'.$name.'</b> Applied for the Post of <b style="color:red;font-style: italic;">'.$desig.'</b> in your firm</td></tr>
      <tr><td colspan="3" align="center" style="color:blue;font-weight:bold">Job Application</td></tr>
      <tr style="background-color:pink"><td colspan="3" align="left" style="color:green;font-weight:bold">Candidate details</td></tr>
   <tr><td style="width:33%">Candidate Name</td>	<tdstyle="width:33%">:</td><tdstyle="width:33%">'.$name.'</td></tr>
   <tr><td>Address</td>		    <td>:</td><td>XXXXXXXXXX</td></tr>
   <tr><td>Email</td>			<td>:</td><td>XXXXXXXXXX</td></tr>
   <tr><td>Mobile</td>			<td>:</td><td>XXXXXXXXXX</td></tr>
   <tr><td>Education</td>		<td>:</td><td>'.$cours.'</td></tr>
   <tr><td>Employment Status</td>		<td>:</td><td>'.$firm.'</td></tr>
   <tr><td>Summary</td>			<td>:</td><td>'.$summry.'</td></tr>
   <tr><td>Current Salary</td>	<td>:</td><td>'.$salar.'</td></tr>
   <tr><td>Expected Salary</td> <td>:</td><td>'.$expct.'</td></tr>
      <tr style="background-color:pink"><td colspan="3" align="left" style="color:green;font-weight:bold">Employer Details</td></tr>
   <tr><td>Designation</td>  	<td>:</td><td>'.$desig.'</td></tr>
   <tr><td>Firm</td>			<td>:</td><td>'.$firme.'</td></tr>
   <tr><td>Firm Address</td>	<td>:</td><td>'.$addre.'</td></tr>
   <tr><td>Place</td>			<td>:</td><td>'.$place.'</td></tr>
   <tr><td>Email</td>			<td>:</td><td>'.$emall.'</td></tr>
   <tr><td>Mobile</td>			<td>:</td><td>'.$mobil.'</td></tr>
    <tr style="background-color:pink"><td colspan="3" align="left" style="color:green;font-weight:bold">Career4you Reference</td></tr>
   <tr><td>Candidate ID</td><td>Requirement ID</td><td>Employer ID</td></tr>
   <tr><td>'.$candid.'</td><td>'.$reqrid.'</td><td>'.$emplid.'</td></tr>
    <tr><td colspan="3" style="text-decoration:none;color:green;font-weight:bold">
Visit <a href="http://www.career4you.in/">career4you.in</a> for more details
    </td></tr>
      </table>
      </body>
      </html>';
      
    }
      
      
      $to       = "career4you.in@gmail.com";
    
      $subject  = "Recruitment through Career4you.in--".$desig;
      $from     = "response@career4you.in";
      $headers  = "from:" . $from . "\r\n";
      $headers .= "Reply-To: career4you.in@gmail.com\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html\n";
      $headers .= "Bcc:".$email.",".$emall."\n";
     /*$resp = mail ( $to, $subject, $message, $headers );
     if($resp)
     {
           echo 'You Successfully Applied For this Job.';
     }*/echo 'Unable to send Application .Contact career4you.in';
                                 
                                 }
                           
                           }
                     
                     }
               }
         }
   
   }
if ($_GET ['msg'] == 'check')
   {
      $skill = strip_tags ( $_GET ['s'] );
      $locat = str_replace ( " ", "", strip_tags ( $_GET ['l'] ) );
      $categ = strip_tags ( $_GET ['c'] );
      $exper = str_replace ( " ", "", strip_tags ( $_GET ['e'] ) );
      $pages = $_GET['p'];
      /*echo '<b style="color:red">Search Results</b>';*/
      
      //``````````````````````````````````````````````````````````````````````````````````````````````````````````````
      

      $lower = 15;////lower
      $qry = "" . $skill . " , " . $locat . " , " . $categ . " , " . $exper;
      //echo '<b style="color:red;padding-bottom:25px" id="apply">You Searched for " '.$qry.' "</b><br>';
      $skill = str_replace ( ",", " ", $skill );
      $skill = explode ( " ", $skill );
      $skill = array_filter ( $skill );
      $skill = array_values ( $skill );
      $time = 'Time';
      ?>
<table width="700px" cellpadding="2" id="homefill"
	style="visibility: visible; margin-top: 25px;">
	<tr>
		<td colspan="4" align="center" style="font-weight: bold">Search
		Results</td>
	</tr>
	<tr>
		<td colspan="5" align="left"><img src="../images/green_line.png"
			alt="photo" width="700px" /></td>
	</tr>
	<tr>
		<td>
<?php
      $sql = "SELECT requirement.id AS id,requirement.requirement AS requirement,requirement.designation AS
		 designation,requirement.category AS category FROM requirement INNER JOIN
		 employer ON employer.id=requirement.empid WHERE ";
      if (! empty ( $locat ))
         {
            $sql .= " employer.district='$locat' AND ";
         }
      if (! empty ( $categ ))
         {
            $sql .= " requirement.category='$categ'  AND  ";
         }
      if (! empty ( $exper ))
         {
            $sql .= " requirement.experience LIKE '%$exper%' AND ";
         }
      $sql .= "requirement.type LIKE '%$time%' AND employer.publish='Y' AND requirement.publish='Y' ";
      $sql .= "ORDER BY requirement.id DESC";
      $result = mysql_query ( $sql );
      if (! $result)
         {
            echo '<b style="color:red">No Results Found!</b>';
         }
      else if (mysql_num_rows ( $result ) > 0)
         { //lab1	
            while ( $row = mysql_fetch_array ( $result ) )
               { //lab2
                  $requrn = $row ['requirement'];
                  $design = $row ['designation'];
                  $categr = $row ['category'];
                  $id = $row ['id'];
                  $dbskl = $requrn . " " . $design . " " . $categr;
                  $dbskl = str_replace ( ",", " ", $dbskl );
                  
                  $requrp = explode ( " ", $dbskl );
                  $requrp = array_filter ( $requrp );
                  $requrp = array_values ( $requrp );
                  
                  $skill = array_map ( 'strtolower', $skill );
                  $requrm = array_map ( 'strtolower', $requrp );
                  $match = array_intersect ( $skill, $requrm );
                  if (count ( $match ) > 0)
                     { //lab3
                        $mysql = "SELECT requirement.designation AS designation,requirement.experience AS experience,
		  requirement.type AS type,requirement.lastchange AS postdate,employer.district AS district,
		  requirement.id AS reqid,employer.name AS company,employer.profile AS profile,
		  requirement.lastchange AS lastchange,requirement.category AS category FROM employer 
		  INNER JOIN requirement ON employer.id=requirement.empid WHERE requirement.id=" . $id;
                        $myresult = mysql_query ( $mysql ) or die ( mysql_error () );
                        if (mysql_num_rows ( $myresult ) > 0)
                           { //lab4	
                              while ( $col = mysql_fetch_array ( $myresult ) )
                                 { //lab5
                                    $reqid = ucwords ( strtolower ( $col ['reqid'] ) );
                                    $desig = ucwords ( strtolower ( $col ['designation'] ) );
                                    $expri = ucwords ( strtolower ( $col ['experience'] ) );
                                    $jtype = ucwords ( strtolower ( $col ['type'] ) );
                                    $postd = ucwords ( strtolower ( $col ['postdate'] ) );
                                    $place = ucwords ( strtolower ( $col ['district'] ) );
                                    $compn = ucwords ( strtolower ( $col ['company'] ) );
                                    $profil = ucwords ( strtolower ( $col ['profile'] ) );
                                    $last = ucwords ( strtolower ( $col ['lastchange'] ) );
                                    $cate = ucwords ( strtolower ( $col ['category'] ) );
                                    $class = ceil(($lower-14)/14);
                                   
                                    $sub   = $lower/14;
                                    if($class==$pages)
                                    {
                                       $style='display:block;';
                                    }
                                    else
                                    {
                                     $style='display:none;';  
                                    }
                                    if ($lower % 2 == 0)
                                       {
                                          ?>
<table cellspacing="3"
			style="border-bottom: 1px solid grey; width: 300px; float: left; padding-bottom: 10px;<?php echo $style;?>"
			onmouseover="showIt(<?php
                                          echo $lower?>)"
			onmouseout="hideIt(<?php
                                          echo $lower?>)">
			<tr>
				<td style="text-align: left" colspan="2"
					title="<?php
                                          echo substr ( trim ( $desig ) . " @ " . trim ( $place ), 0, 100 ) . "..";
                                          ?>"><b title="<?php
                                          echo $cate;
                                          ?>">
<?php
                                          echo substr ( trim ( $desig ) . " @ " . trim ( $place ), 0, 30 ) . "..";
                                          ?></b></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Role</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo substr(trim ( $desig ),0,18)."..";
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Experience<a
					id="<?php
                                          echo $lower?>"
					style="position: absolute; padding: 20px 25px; visibility: hidden"
					onmouseover="showIt(<?php
                                          echo $lower?>)"
					onmouseout="hideIt(<?php
                                          echo $lower?>)"
					href="javascript:showDisplay(<?php
			echo $reqid?>)">View &amp; Apply </a></td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo trim ( $expri );
                                          ?> Year(s)</td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Job Type</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo trim ( $jtype );
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Company Name</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo substr ( trim ( $compn ), 0, 18 ) . "..";
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px; color: #789324"
					colspan="2"
					title="<?php
                                          echo substr ( trim ( $profil ), 0, 100 ) . "...";
                                          ?>">
<?php
                                          echo substr ( trim ( $profil ), 0, 30 ) . "...";
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Posted:</td>
				<td><?php
                                          echo $last?></td>
			</tr>
		</table>
		<?php
                                       }
                                    else
                                       {
                                          ?>
			<table cellspacing="3"
			style="border-bottom: 1px solid grey;
			 width: 300px; 
			 float: right; 
			 padding-bottom: 10px;
			 <?php echo $style;?>"
			onmouseover="showIt(<?php
                                          echo $lower?>)"
			onmouseout="hideIt(<?php
                                          echo $lower?>)">
			<tr>
				<td style="text-align: left" colspan="2"
					title="<?php
                                          echo substr ( trim ( $desig ) . " @ " . trim ( $place ), 0, 100 ) . "..";
                                          ?>"><b title="<?php
                                          echo $cate;
                                          ?>">
<?php
                                          echo substr ( trim ( $desig ) . " @ " . trim ( $place ), 0, 30 ) . "..";
                                          ?></b></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Role</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo substr(trim ( $desig ),0,18)."..";
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Experience<a
					id="<?php
                                          echo $lower?>"
					style="position: absolute; padding: 20px 25px; visibility: hidden"
					onmouseover="showIt(<?php
                                          echo $lower?>)"
					onmouseout="hideIt(<?php
                                          echo $lower?>)"
					href="javascript:showDisplay(<?php
			echo $reqid?>)">View &amp; Apply </a></td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo trim ( $expri );
                                          ?> Year(s)</td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Job Type</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo trim ( $jtype );
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Company Name</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo substr ( trim ( $compn ), 0, 18 ) . "..";
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px; color: #789324"
					colspan="2"
					title="<?php
                                          echo substr ( trim ( $profil ), 0, 100 ) . "...";
                                          ?>">
<?php
                                          echo substr ( trim ( $profil ), 0, 30 ) . "...";
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Posted:</td>
				<td><?php
                                          echo $last?></td>
			</tr>
		</table><?php
                                       }
                                       
                                    //$lower<13?$lower++:exit();
                                    /*if ($lower < 33)
                                       {*/
                                          $lower++;
                                       /*}
                                    else
                                       {
                                          exit ();
                                       }*/
                                 
                                 } //lab5
                           } //lab4
                     

                     } //lab3
               

               } //lab2
         } //lab1
      if ($lower == 15)
         {
            echo '<table align="center"><tr><td style="text-align:center" > <b style="color:red;"> No Results Found</b></td></tr></table>';
         }
      
      ?>
</td>
	</tr>
</table>
<table width="700px" align="center" style="padding-top:40px;display:block;" cellpadding="5">
<tbody> <tr> <td align="left" style="width:350px">
 <?php if($pages>=2){?>
 <a href="javascript:backhomeSearch()" >
 <img src="/images/back.png" alt="Previous Page"  width="75px" height="27px"/></a>
 <?php  }?></td> 
 <td align="right"  style="width:350px"> 
 <?php  if(($lower-14)>$pages*14){?>
 <a href="javascript:forhomeSearch()" >
 <img src="/images/next.png" alt="Next Page"  width="75px" height="27px"/></a></td><?php }?>
  </tr> </tbody></table>
<?php
      //````````````````````````````````````````````````````````````````````````````````````	
   
/*echo $class."----".$lower."----".$pages;*/
   } //if ends


//`````````````````````````````````````````````````````````` 
if ($_GET ['msg'] == 'searchadv')
   { //1
      $skill = strip_tags ( $_GET ['s'] ) . " "; //requ  empid
      $locat = str_replace ( " ", "", strip_tags ( $_GET ['l'] ) ); //empl
      $categ = str_replace ( " ", " ", strip_tags ( $_GET ['c'] ) ); //requ
      $exper = str_replace ( " ", "", strip_tags ( $_GET ['e'] ) ); //``
      $timin = str_replace ( " ", " ", strip_tags ( $_GET ['t'] ) ); //``
      $minsa = str_replace ( " ", "", strip_tags ( $_GET ['sn'] ) ); //``
      $maxsa = str_replace ( " ", "", strip_tags ( $_GET ['sx'] ) ); //``
      $page  = $_GET['page'];
      $prev  = $_GET['last'];
      $lower = 1;
      //$class = "page";
      $qry = "" . $skill . " , " . $locat . " , " . $categ . " , " . $exper . " , " . $timin . " , " . $minsa . " , " . $maxsa;
      //echo '<b style="color:red;padding-bottom:25px" id="apply">You Searched for " '.$qry.' "</b><br>';
      $skill = str_replace ( ",", " ", $skill );
      $skill = explode ( " ", $skill );
      $skill = array_filter ( $skill );
      $skill = array_values ( $skill );
      ?>
<table width="700px" cellpadding="2" id="homefill"
	style="visibility: visible; margin-top: 25px;">
	<tr>
		<td colspan="4" align="center" style="font-weight: bold">Search
		Results  <input type="hidden" value="account" id="account"/>
		<input type="hidden" value="<?php echo $_SESSION ['id']?>" id="whois" /></td>
	</tr>
	<tr>
		<td colspan="5" align="left"><img src="../images/green_line.png"
			alt="photo" width="700px" /></td>
	</tr>
	<tr>
		<td align="center">
<?php
      $sql = "SELECT requirement.id AS id,requirement.requirement AS requirement,requirement.designation AS
		 designation,requirement.category AS category FROM requirement INNER JOIN
		 employer ON employer.id=requirement.empid WHERE ";
      if (! empty ( $locat ) && $locat != 'Location')
         {
            $sql .= " employer.district='$locat' AND ";
         }
      if (! empty ( $categ ))
         {
            $sql .= " requirement.category='$categ'  AND  ";
         }
      if (! empty ( $exper ))
         {
            $sql .= " requirement.experience LIKE '%$exper%'  AND  ";
         }
      if (! empty ( $timin ))
         {
            $sql .= " requirement.type='$timin' ";
         }
      if (! empty ( $minsa ) && ! empty ( $maxsa ) && is_numeric ( $maxsa ) && is_numeric ( $minsa ))
         {
            $sql .= " AND requirement.salary BETWEEN $minsa AND $maxsa ";
         }
      $sql .= " AND employer.publish='Y' AND requirement.publish='Y' ORDER BY requirement.id DESC";
      $result = mysql_query ( $sql );
      if (! $result)
         {
            echo '<b style="color:red">No Results Found!</b>';
         }
      else if (mysql_num_rows ( $result ) > 0)
         { //lab1	
            while ( $row = mysql_fetch_array ( $result ) )
               { //lab2
                  $requrn = $row ['requirement'];
                  $design = $row ['designation'];
                  $categr = $row ['category'];
                  $id = $row ['id'];
                  $dbskl = $requrn . " " . $design . " " . $categr;
                  $dbskl = str_replace ( ",", " ", $dbskl );
                  
                  $requrp = explode ( " ", $dbskl );
                  $requrp = array_filter ( $requrp );
                  $requrp = array_values ( $requrp );
                  
                  $skill = array_map ( 'strtolower', $skill );
                  $requrm = array_map ( 'strtolower', $requrp );
                  $match = array_intersect ( $skill, $requrm );
                  if (count ( $match ) > 0)
                     { //lab3
                        $mysql = "SELECT requirement.designation AS designation,requirement.experience AS experience,
		  requirement.type AS type,requirement.lastchange AS postdate,employer.district AS district,
		  requirement.id AS reqid,employer.name AS company,employer.profile AS profile,
		  requirement.lastchange AS lastchange,requirement.category AS category FROM employer 
		  INNER JOIN requirement ON employer.id=requirement.empid WHERE requirement.id=" . $id;
                        $myresult = mysql_query ( $mysql ) or die ( mysql_error () );
                        $cond = mysql_num_rows($myresult);
                        //echo $cond;
                        if (mysql_num_rows ( $myresult ) > 0)
                           { //lab4	
                              while ( $col = mysql_fetch_array ( $myresult ) )
                                 { //lab5
                                    $reqid = ucwords ( strtolower ( $col ['reqid'] ) );
                                    $desig = ucwords ( strtolower ( $col ['designation'] ) );
                                    $expri = ucwords ( strtolower ( $col ['experience'] ) );
                                    $jtype = ucwords ( strtolower ( $col ['type'] ) );
                                    $postd = ucwords ( strtolower ( $col ['postdate'] ) );
                                    $place = ucwords ( strtolower ( $col ['district'] ) );
                                    $compn = ucwords ( strtolower ( $col ['company'] ) );
                                    $profil = ucwords ( strtolower ( $col ['profile'] ) );
                                    $last = ucwords ( strtolower ( $col ['lastchange'] ) );
                                    $cate = ucwords ( strtolower ( $col ['category'] ) );
                                    $class = ceil($lower/12);
                                    $sub   = $lower/12;
                                    if($class==$page)
                                    {
                                       $style='display:block;';
                                    }
                                    else
                                    {
                                     $style='display:none;';  
                                    }
                                  
                                    if ($lower % 2 == 1)
                                       {
                                          ?>
<table    cellspacing="3"
			style="border-bottom: 1px solid grey; width: 300px; float: left; padding-bottom: 10px;<?php echo $style;?>"
			onmouseover="showIt(<?php
                                          echo $lower?>)"
			onmouseout="hideIt(<?php
                                          echo $lower?>)">
			<tr>
				<td style="text-align: left" colspan="2"
					title="<?php
                                          echo substr ( trim ( $desig ) . " @ " . trim ( $place ), 0, 100 ) . "..";
                                          ?>"><b title="<?php
                                          echo $cate;
                                          ?>">
<?php
                                          echo substr ( trim ( $desig ) . " @ " . trim ( $place ), 0, 30 ) . "..";
                                          ?></b></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Role</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo substr(trim ( $desig ),0,18)."..";
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Experience<a
					id="<?php
                                          echo $lower?>"
					style="position: absolute; padding: 20px 25px; visibility: hidden"
					onmouseover="showIt(<?php
                                          echo $lower?>)"
					onmouseout="hideIt(<?php
                                          echo $lower?>)"
					href="javascript:showDisplay(<?php
			echo $reqid?>)">View &amp; Apply </a></td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo trim ( $expri );
                                          ?> Year(s)</td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Job Type</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo trim ( $jtype );
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Company Name</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo substr ( trim ( $compn ), 0, 18 ) . "..";
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px; color: #789324"
					colspan="2"
					title="<?php
                                          echo substr ( trim ( $profil ), 0, 100 ) . "...";
                                          ?>">
<?php
                                          echo substr ( trim ( $profil ), 0, 30 ) . "...";
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Posted:</td>
				<td><?php
                                          echo $last?></td>
			</tr>
		</table>
		<?php
                                       }
                                    else
                                       {
                                          ?>
<table      cellspacing="3" 
	style="border-bottom: 1px solid grey;
	width: 300px;
	float: right; 
	padding-bottom: 10px;<?php echo $style;?>"	
	onmouseover="showIt(<?php echo $lower?>)"
	onmouseout="hideIt(<?php echo $lower?>)">
			<tr>
				<td style="text-align: left" colspan="2"
					title="<?php
                                          echo substr ( trim ( $desig ) . " @ " . trim ( $place ), 0, 100 ) . "..";
                                          ?>"><b title="<?php
                                          echo $cate;
                                          ?>">
<?php
                                          echo substr ( trim ( $desig ) . " @ " . trim ( $place ), 0, 30 ) . "..";
                                          ?></b></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Role</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo substr(trim ( $desig ),0,18)."..";
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Experience<a
					id="<?php
                                          echo $lower?>"
					style="position: absolute; padding: 20px 25px; visibility: hidden"
					onmouseover="showIt(<?php
                                          echo $lower?>)"
					onmouseout="hideIt(<?php
                                          echo $lower?>)"
					href="javascript:showDisplay(<?php
			echo $reqid?>)">View &amp; Apply </a></td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo trim ( $expri );
                                          ?> Year(s)</td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Job Type</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo trim ( $jtype );
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Company Name</td>
				<td style="text-align: left; width: 150px;" colspan="1"><?php
                                          echo substr ( trim ( $compn ), 0, 18 ) . "..";
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px; color: #789324"
					colspan="2"
					title="<?php
                                          echo substr ( trim ( $profil ), 0, 100 ) . "...";
                                          ?>">
<?php
                                          echo substr ( trim ( $profil ), 0, 30 ) . "...";
                                          ?></td>
			</tr>
			<tr>
				<td style="text-align: left; width: 150px;" colspan="1">Posted:</td>
				<td><?php
                                          echo $last?></td>
			</tr>
		</table><?php
                                       }
         
	 
                                 
                                       $lower ++;
                                      
                                 } 
                                 
                            
                                 //lab5
                           } //lab4
                     
                     } //lab3
               
               } //lab2
              
         }
      else
         {
            echo "    ";
         }
      if ($lower == 1)
         {
            echo '<table align="center"><tr><td style="text-align:center" > <b style="color:red;"> No Results Found</b></td></tr></table>';
         }
      ?>
</td>
	</tr>
</table>
<table width="700px" align="center" style="padding-top:40px;display:block;" cellpadding="5">
<tbody> <tr> <td align="left" style="width:350px">
 <?php if($page>=2){?>
 <a href="javascript:backSearch()" >
 <img src="/images/back.png" alt="Previous Page"  width="75px" height="27px"/></a>
 <?php  }?></td> 
 <td align="right"  style="width:350px"> 
 <?php  if($lower>$page*12){?>
 <a href="javascript:forSearch()" >
 <img src="/images/next.png" alt="Next Page"  width="75px" height="27px"/></a></td><?php }?>
  </tr> </tbody></table> <?php 
         


/*echo '<input type="hidden" id="lowstatus" value="'.$lower.'"/>';*/
//echo $page."-----".$class."----".$lower."----".$sub."<br />";
   } //1
if ($_GET ['msg'] == 'display')
   {
      $key = $_GET ['num'];
      if (is_numeric ( $key ))
         {
            $sql = "SELECT requirement.id AS id,requirement.designation AS designation,requirement.vacancy AS vacancy,requirement.category 
		AS category,requirement.requirement AS requirement,requirement.experience AS experience,
		requirement.age AS age,requirement.sex AS sex,requirement.salary AS salary,requirement.type AS type,
		requirement.lastchange AS lastchange,employer.name AS name,employer.district AS place,employer.address 
		AS address,employer.mobile AS mobile,employer.email AS email,requirement.paid AS paid,requirement.premier AS premier
		 FROM employer INNER JOIN requirement
		 ON employer.id=requirement.empid WHERE requirement.id =" . $key;
            $rst = mysql_query ( $sql );
            while ( $row = mysql_fetch_array ( $rst ) )
               {
                  ?>
<table align="center" width="500px">
	<tr>
		<td>Designation</td>
		<td>:</td>
		<td><?php
                  echo $row ['designation'];
                  ?></td>
	</tr>
	<tr>
		<td>Vacancy</td>
		<td>:</td>
		<td><?php
                  echo $row ['vacancy'];
                  ?></td>
	</tr>
	<tr>
		<td>Category</td>
		<td>:</td>
		<td><?php
                  echo $row ['category'];
                  ?></td>
	</tr>
	<tr>
		<td>Requirement</td>
		<td>:</td>
		<td><?php
                  echo $row ['requirement'];
                  ?></td>
	</tr>
	<tr>
		<td>Experience</td>
		<td>:</td>
		<td><?php
                  echo $row ['experience'];
                  ?></td>
	</tr>
	<tr>
		<td>Age</td>
		<td>:</td>
		<td><?php
                  echo $row ['age'];
                  ?></td>
	</tr>
	<tr>
		<td>Gender</td>
		<td>:</td>
		<td><?php
                  echo $row ['sex'];
                  ?></td>
	</tr>
	<tr>
		<td>Salary</td>
		<td>:</td>
		<td><?php
                  echo $row ['salary'];
                  ?></td>
	</tr>
	<tr>
		<td>Time</td>
		<td>:</td>
		<td><?php
                  echo $row ['type'];
                  ?></td>
	</tr>
	<?php if($row['paid']=='Y' || $row['premier']=='Y'){?>
	<tr>
		<td>Emloyer</td>
		<td>:</td>
		<td><?php
                  echo $row ['name'];
                  ?></td>
	</tr>
	<tr>
		<td>Address</td>
		<td>:</td>
		<td><?php
                  echo $row ['address'];
                  ?></td>
	</tr>
	<tr>
		<td>Place</td>
		<td>:</td>
		<td><?php
                  echo $row ['place'];
                  ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php
                  echo $row ['email'];
                  ?></td>
	</tr>
	<tr>
		<td>Mobile</td>
		<td>:</td>
		<td><?php
                  echo $row ['mobile'];
                  ?></td>
	</tr>
	<?php }else{?>
	<tr>
		<td colspan="3" style="color:blue;text-align:center;text-transform: uppercase;font-weight:bold;">Contact : www.Carre4you.in<br/></td>
	</tr>
	<?php }?>
	<tr>
		<td>Posted On</td>
		<td>:</td>
		<td><?php
                  echo $row ['lastchange'];
                  ?></td>
	</tr>
</table>
<div style="width: 100%; text-align: right;">
<?php if($_SESSION['account']=='true') {?>
<a href="javascript:applyNow(<?php echo $row['id']?>,<?php echo $_SESSION ['id']?>)"
	style="text-decoration: none; color: blue; text-align: right">Apply Now</a><?php }else{?>
	<a href="index.php?msg=login&key=<?php echo $row ['id']; ?>"
	style="text-decoration: none; color: blue; text-align: right">Apply Now</a><?php }?></div>

<?php
               }
         }
   }
if($_GET['msg']=='inform')
{
   $pro = $_GET['name'];
   $sql = "SELECT * FROM profile WHERE profile='$pro' AND status='active'";
   $res = mysql_query($sql);
   if($res)
   {
      while($row = mysql_fetch_array($res))
      {
         ?>
         <table align="center">
         <tr><td>Profile Name</td><td>:</td><td><?php echo $row['profile']?></td></tr>
         <tr><td>Profile Cost</td><td>:</td><td><?php echo $row['cost']?></td></tr>
         <tr><td>Profile Validity</td><td>:</td><td><?php echo $row['validity']?></td></tr>
         <tr><td>Available Unpublished Data</td><td>:</td><td><?php echo $row['cound']?></td></tr>
         </table>
         
         <?php 
      }
   }
}

if($_GET['msg']=='empapply')
{
   $eid  = $_GET['q'];
   $cid  = $_GET['p'];
   $sql = "SELECT employer.email AS email,payment.plan AS plan,payment.used AS used,profile.cound AS cound FROM payment INNER JOIN
    profile ON  profile.profile=payment.plan INNER JOIN employer ON employer.id=payment.empid WHERE payment.status='activated' AND payment.expired='N' 
    AND payment.empid=".$eid;
   $res = mysql_query($sql);
   if(mysql_num_rows($res)){
   $row = mysql_fetch_array($res);
   //check is it
   $use = str_replace(" ","",$row['used']);
   if(empty($use))
   {
      $use=0;
   }
   if(($row['cound']-$use)>0)
   {
      //$cid candidate id. show some details and link to email the data.never show contact details
      /***
       * for every result .show as confirm that what numbers ou have left.
       * Pagination do must
       * direct apply for students and make the company payable to you
       * send email as soon as they are applied for the job
       * truncate the db and make the resourcesa rea under control.good
       * leave the res to later and start v-vdotcom monday
       * rest,candid,emplid
       * expiry statement should bemade with the corresponding employers
      */
      
      // send to email AND update used.
      
      
      
?>
     <table align="center">
     <tr style="color:blue;font-weight:bold"><td align="center" colspan="3">The Resume Details will send to the below email.</td></tr>
     <tr><td>Email ID</td><td>:</td><td><?php echo $row['email']?></td></tr>
     <tr style="padding-top:20px;color:blue;font-weight:bold"><td align="center" colspan="3">Your Plan Details</td></tr>
     <tr><td>Profile Name</td><td>:</td><td><?php echo $row['plan']?></td></tr>
     <tr><td>Allowed Data</td><td>:</td><td><?php echo $row['cound']?></td></tr>
     <tr><td>Used Data</td><td>:</td><td><?php echo $row['used']?></td></tr>
     <tr><td>Remaining Data</td><td>:</td><td><?php echo $row['cound']-$use;?></td></tr>
     <tr><td align="center" colspan="3"><input type="button" onclick="javascript:resumeSend(<?php echo $cid.",".$eid?>)" name="sendmail" value="Send Mail"/></td></tr>
     </table>
     <?php 
     
      
      
      
      
   }
   }
   else
   {
    echo '<b style="color:red;" onmouseover="loadAgain()">Your Plan Expired!</b>';
    
   }
   
  
}
if($_GET['msg']=='resumesend')
{//q-cid,p-eid
 
$cand = $_GET['q'];
$empl = $_GET['p'];
   $sqlmail = "SELECT email FROM employer WHERE id=".$empl;
   $results = mysql_query($sqlmail);
   $rows = mysql_fetch_array($results);
   $sqlcd = "SELECT register.id AS id,register.name AS name,register.father AS father,register.birthplace AS 
            birthplace,register.birthday AS birthday,register.age AS age,register.marriage AS marriage,
            register.wife AS wife,register.child AS child,register.ip AS ip,register.peraddress AS 
            peraddress,register.preaddress AS preaddress,register.phone AS phone,register.mobile AS 
            mobile,register.fax AS fax,register.email AS email,register.password AS password,
            register.lastip AS lastip,register.resume AS resume,register.entry AS entry,register.user 
            AS user,register.publish AS publish,register.paid AS paid,register.premier AS premier,
            register.gender AS gender,technical.id AS id,technical.mr AS mr,technical.mw AS mw,
            technical.ms AS ms,technical.er AS er,technical.ew AS ew,technical.es AS es,technical.hr 
            AS hr,technical.hw AS hw,technical.hs AS hs,technical.tr AS tr,technical.tw AS tw,
            technical.ts AS ts,technical.mso AS mso,technical.tal AS tal,technical.dtp AS dtp,
            technical.tcl AS tcl,technical.gdd AS gdd,technical.anm AS anm,technical.pcd AS pcd,
            technical.details AS details,technical.regid AS regid,technical.other AS other,
            technical.summary AS summary,employment.id AS id,employment.firm AS firm,employment.place 
            AS place,employment.designation AS designation,employment.frum AS frum,employment.too AS 
            too,employment.reason AS reason,employment.capability AS capability,employment.yourself 
            AS yourself,employment.salary AS salary,employment.expect AS expect,employment.regid AS 
            regid,employment.current AS current,education.id AS id,education.course AS course,
            education.school AS school,education.frum AS frume,education.too AS tooe,
            education.marks AS marks,education.activities AS activities,education.hobby AS hobby,
            education.achievements AS achievements,education.regid AS regid FROM register
            INNER JOIN technical ON register.id = technical.regid
            INNER JOIN employment ON register.id = employment.regid
            INNER JOIN education ON education.regid = register.id
            WHERE register.id =".$cand;
   $rest = mysql_query($sqlcd);
   $row = mysql_fetch_array($rest);
   
  
$candid  = $row['id'];
$name    = $row['name'];
$father  = $row['father'];
$birth   = $row['birthplace'];
$dob     = $row['birthday'];
$age     = $row['age'];
$marry   = $row['marriage'];
$wife    = $row['wife'];
$child   = $row['child'];
$address = $row['peraddress'];
$peradd  = $row['preaddress'];
$phone   = $row['phone'];
$mobile  = $row['mobile'];
$fax     = $row['fax'];
$email   = $row['email'];
$gender  = $row['gender'];
$firm    = $row['firm'];//begin
$plce    = $row['place'];
$postds  = $row['designation'];
$fromw   = $row['frum'];
$toow    = $row['too'];
$reason  = $row['reason'];
$cur     = $row['current'];
$cours   = $row['course'];
$schoo   = $row['school'];
$frum    = $row['frume'];
$tooe    = $row['tooe'];
$mark    = $row['marks'];//end
$summry = $row['summary'];
$capab  = $row['capability'];
$salar  = $row['salary'];
$expct  = $row['expect'];
$activ  = $row['activities'];
$hobby  = $row['hobby'];
$achie  = $row['achievements'];
/*$message = $cand."--------".$empl."---------".$candid.",".$name.",". $father.",". $birth.",". $dob .",". 
$age.",".
$marry   .",".
$wife    .",".
$child   .",".
$address .",".
$peradd  .",".
$phone   .",".
$mobile  .",".
$fax     .",".
$email   .",".
$gender  .",".
$firm   .",".
$plce    .",".
$postds  .",".
$fro     .",".
$toow    .",".
$reason  .",".
$cur     .",".
$cours   .",".
$schoo   .",".
$frum    .",".
$tooe   .",". 
$mark   .",". 
$summry .",".
$capab  .",".
$salar  .",". 
$expct  .",". 
$activ  .",". 
$hobby   .",".
$achie   ;*/
$message = '<html><head><style type="text/css">
 
.textbox {
	width: 230px;
	height:23px;
	border: 1px solid #465615;
	border-left: 4px solid #465615;
}
.textboxtt {
	width: 150px;
	height:23px;
	border: 1px solid #465615;
	border-left: 4px solid #465615;
}
.textboxsm {
	width: 85px;
	height:23px;
	border: 1px solid #465615;
	border-left: 4px solid #465615;
}
.textarea {
	width: 230px;
	height:60px;
	border:1px solid #465615;
	border-left: 4px solid #465615;
}
.textareatt {
	width: 150px;
	height:30px;
	border:1px solid #465615;
	border-left: 4px solid #465615;
}
td {
	text-align: center;
}
</style> 
</head>
<body>

<table align="center" width="900px" >
<tbody>
<tr>
<td colspan="3" style="color:blue;font-weight: bold">
Bio-data</td>
</tr>
<tr>
<td style="text-align: right">Full Name </td><td>:</td>
<td style="text-align: left;">
'.$name.'</td>
</tr>
<tr>
<td style="text-align: right">Father Name </td><td>:</td>
<td style="text-align: left;">
'.$father.'</td>
</tr>
<tr>
<td style="text-align: right">Place of Birth</td><td>:</td>
<td style="text-align: left;">
'.$birth.'</td>
</tr>
<tr>
<td>Gender</td>
<td>:</td>';
if($gender=='M')
{
 $message .= ' <td>Male<input type="radio" checked   name="gender" value="M" />Female
<input type="radio"  value="F" name="gender" /></td>';
}
if($gender=='Y')
{$message .='
<td>Male<input type="radio"   name="gender" value="M" />Female
<input type="radio" checked value="F" name="gender" /></td>';
}
$message .= '
</tr>
<tr>
<td style="text-align: right">Date of Birth </td><td>:</td>
<td style="text-align: left;">
'.$dob.'</td>
</tr>
<tr>
<td style="text-align: right">Age </td><td>:</td>
<td style="text-align: left;">
'.$age.'</td>
</tr>
<tr >
<td colspan="3" style="background-color: lightblue;color:green;font-weight: bold">If Married </td>
</tr>
<tr style="background-color: lightblue;color:green;">
<td style="text-align: right">Name of Spouse </td><td>:</td>
<td style="text-align: left;">
'.$wife.'</td>
</tr>
<tr style="background-color: lightblue;color:green;">
<td style="text-align: right">No. of Children </td><td>:</td>
<td style="text-align: left;">
'.$child.'</td>
</tr>
<tr>
<td style="text-align: right">Permanent Full Address</td><td>:</td>
<td style="text-align: left;">
'.$peradd.'
</td>
</tr>
<tr>
<td style="text-align: right">Present Full Address </td><td>:</td>
<td style="text-align: left;">
'.$address.'</td>
</tr>
<tr>
<td style="text-align: right">Telephone Number with STD code </td><td>:</td>
<td style="text-align: left;">
'.$phone.'</td>
</tr>
<tr>
<td style="text-align: right">Mobile Number </td><td>:</td>
<td style="text-align: left;">
'.$mobile.'</td>
</tr>
<tr>
<td style="text-align: right">Fax Number </td><td>:</td>
<td style="text-align: left;">
'.$fax.'</td>
</tr>
<tr>
<td style="text-align: right">E-mail ID</td><td>:</td>
<td style="text-align: left;">
'.$email.'</td>
</tr>
<tr>
<td colspan="3" style="color:blue;font-weight: bold">
Educational Qualification : (From Secondary Level onwards) </td>
</tr>
<tr>
<td colspan="3"><table  align="center" >
<tbody><tr>
<td  bgcolor="#FFCC66"  rowspan="2">Sl.no</td>
<td  bgcolor="#FFCC66"  rowspan="2">Course</td>
<td  bgcolor="#FFCC66"  rowspan="2">School/College/University </td>
<td  bgcolor="#FFCC66"  colspan="2">Period</td>
<td  bgcolor="#FFCC66"  rowspan="2">% of Marks Obtained </td>
</tr>
<tr>
<td width="32" height="23" bgcolor="#FFCC66"  >From</td>
<td width="30" bgcolor="#FFCC66"  >To</td>
</tr>';
    $cor  = explode("|",$cours);
	$coll = explode("|",$schoo);
	$fro  = explode("|",$frum);
	$too  = explode("|",$tooe);
	$mark = explode("|",$mark);

$message .= '


<tr>
<td>1.</td>
<td>'.$cor[0].'</td>
<td>'.$coll[0].'</td>
<td>'.  $fro[0].'</td>
<td>'. $too[0].'</td>
<td>'.  $mark[0].'</td>
</tr>
<tr>
<td>2.</td>
<td>'. $cor[1].'</td>
<td>'. $coll[1].'</td>
<td>'. $fro[1].'</td>
<td>'. $too[1].'</td>
<td>'. $mark[1].'</td>
</tr>
<tr>
<td>3.</td>
<td>'. $cor[2].'</td>
<td>'.  $coll[2].'</td>
<td>'. $fro[2].'</td>
<td>'.  $too[2].'</td>
<td>'. $mark[2].'</td>
</tr>
<tr>
<td>4.</td>
<td>'.  $cor[3].'</td>
<td>'.  $coll[3].'</td>
<td>'. $fro[3].'</td>
<td>'. $too[3].'</td>
<td>'.  $mark[3].'</td>
</tr>
<tr>
<td>5.</td>
<td>'.  $cor[4].'</td>
<td>'. $coll[4].'</td>
<td>'.  $fro[4].'</td>
<td>'.  $too[4].'</td>
<td>'.  $mark[4].'</td>
</tr>
</tbody></table></td>';

$message .= '
</tr>
<tr>
<td style="text-align: right">Curriculam Activities </td><td>:</td>
<td style="text-align: left;">
'.$activ.'</td>
</tr>
<tr>
<td style="text-align: right">Hobbies</td><td>:</td>
<td style="text-align: left;">
'.$hobby.'</td>
</tr>
<tr>
<td style="text-align: right">Special Achievements </td><td>:</td>
<td style="text-align: left;">
'.$achie.'
</td>
</tr> ';
                $fir  = explode("|",$firm);
				$des  = explode("|",$postds);
				$froo = explode("|",$fromw);
				$too  = explode("|",$toow);
				$reso = explode("|",$reason);
				$plc  = explode("|",$plce);
				$message .= '

<tr>
<td colspan="2" style="color:blue;font-weight: bold" >
Experience</td>
</tr>
<tr>
<td  colspan="3"><table  align="center" >
<tbody><tr>
<td width="39px"   bgcolor="#FFCC66"  align="center" >Sl.no</td>
<td width="150px"  bgcolor="#FFCC66"  align="center" >Name of Institution </td>
<td width="150px"  bgcolor="#FFCC66"  align="center" >Place</td>
<td width="150px"  bgcolor="#FFCC66"  align="center" >Designation</td>
<td width="150px"  bgcolor="#FFCC66"  align="center" >From</td>
<td width="150px"  bgcolor="#FFCC66"  align="center" >To</td>
<td width="150px"  bgcolor="#FFCC66"  align="center" >Reason for Leaving </td>
<td width="50px"   bgcolor="#FFCC66"  align="center" >Present</td>
</tr>
<tr>
<td >1.</td>
<td >'.  $fir[0].'</td>
<td >'.  $plc[0].'</td>
<td >'.  $des[0].'</td>
<td >'.  $froo[0].'</td>
<td >'.  $too[0].'</td>
<td >'.  $reso[0].'</td>';
if($cur == 'PA')
{
   $message .= '<td align="center"><input type="radio" checked name="present"  /></td>';
}
else {
   $message .= '<td align="center"><input type="radio" name="present"  /></td>';
}


$message .= ' </tr>
<tr>
<td >2.</td>
<td >'.  $fir[1].'</td>
<td >'.  $plc[1].'</td>
<td >'.  $des[1].'</td>
<td >'.  $froo[1].'</td>
<td >'.  $too[1].'</td>
<td >'.  $reso[1].'</td>';
if($cur == 'PB')
{
   $message .= '<td align="center"><input type="radio" checked name="present"  /></td>';
}
else {
   $message .= '<td align="center"><input type="radio" name="present"  /></td>';
}
$message .= '</tr>
<tr>
<td >3.</td>
<td >'.  $fir[2].'</td>
<td >'.  $plc[2].'</td>
<td >'.  $des[2].'</td>
<td >'.  $froo[2].'</td>
<td >'.  $too[2].'</td>
<td >'.  $reso[2].'</td>';
if($cur == 'PC')
{
   $message .= '<td align="center"><input type="radio" checked name="present"  /></td>';
}
else {
   $message .= '<td align="center"><input type="radio" name="present" /></td>';
}
$message .= '</tr>
</tbody></table></td>
</tr>';

$message .='
<tr>
<td style="text-align: right">Profile Summary </td><td>:</td>
<td style="text-align: left;">
'.$summry.'
</td>
</tr>
<tr>
<td style="text-align: right">Professional Capabilities </td><td>:</td>
<td style="text-align: left;">
'.$capab.'
</td>
</tr>
<tr>
<td style="text-align: right">Present salary </td><td>:</td>
<td style="text-align: left;">
'.$salar.'</td>
</tr>
<tr>
<td style="text-align: right">Expected Salary </td><td>:</td>
<td style="text-align: left;">
'.$expct.'</td>
</tr>

</tbody></table>
</body>
</html>
';
            $to = $rows['email'];
      $subject  = "Candidate Information ";
      $from     = "response@career4you.in";
      $headers  = "from:" . $from . "\r\n";
      $headers .= "Reply-To: career4you.in@gmail.com\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html";
     $resp = mail ( $to, $subject, $message, $headers );
if($resp)
{
 
   $qry = "SELECT id,used,candetails FROM payment WHERE payment.status='activated' AND payment.expired='N' 
    AND payment.empid=".$empl;
   $rst = mysql_query($qry);
   $cro = mysql_fetch_array($rst);
   $usecount = $cro['used'];
   $eid = $cro['id'];
   $cadetails = $cro['candetails'];
   $cad = explode(",",$cadetails);//$cand
   $ar  = array_search($cand,$cad);
 
   if(!empty($ar))
   {
    $usecount;
   }
   else
   {
      $usecount++;
   }
   if($usecount==5)
   {
      array_push($cad,$cand);
      $cadt = implode(",",$cad);
      $sql = "UPDATE payment SET used=$usecount,expired='Y',candetails='$cadt' WHERE id=".$eid;
      mysql_query($sql);
      echo '<b style="color:red">Mail Sent</b>';
   }
   else
   {
      array_push($cad,$cand);
      $cadt = implode(",",$cad);
      $sql = "UPDATE payment SET used=$usecount,candetails='$cadt' WHERE id=".$eid;
      mysql_query($sql);
      echo '<b style="color:red">Mail Sent</b>';
   }
   
}
}

#################################################################################################
#################################################################################################
#################################################################################################
############################# NEW SESSION STARTS HERE  ##########################################
#################################################################################################
#################################################################################################
#################################################################################################
$person = $_SESSION['id'];
function updateEnquiryResult()
{
	global $person;
	$sql = "UPDATE fewdata SET admin_got='Y' WHERE regid=".$person;
	mysql_query($sql);
}
function enquirySendOnce()
{
	global $person;
	if($person<537){updateFewdataRest($person);}
	if (getDetailsFromTables('admin_got','fewdata')=='N')
	{informAdmin();}
}
function updateFewdataRest($id)
{
	$zql = "SELECT * FROM fewdata WHERE regid=".$id;
	$result = mysql_query($zql);
	if(mysql_num_rows($result)<0){
	$sql = "INSERT INTO fewdata(regid)VALUES('$id')";
	mysql_query($sql);
	}
}
function getDetailsFromTables($tuple,$table='register')
{
	global $person;
	$sql = "SELECT $tuple FROM $table WHERE ";
	if ($table=='register'){$sql .= " id=".$person;}else{$sql .= " regid=".$person;}
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	return $row[0];
}

function informAdmin(){
getDetailsFromTables('gender')=='M'?$g='Male':$g='Female';
date_default_timezone_set("Asia/Calcutta");
$k = (date("l dS \\of F Y h:i:s A"));
$my_file = getDetailsFromTables('resume');
$my_path = "./upload/";
$my_name = "WWW.CAREER4YOU.IN";
$my_mail = "response@career4you.in";
$my_replyto = getDetailsFromTables('email');
$my_subject = 'Candidate Registered ON '.$k;
$my_message = "<html><body>
<div style=width:500px;background-color:#465615;color:white;height:auto;>
<table style=margin:0 auto;>
<tr><td colspan=3>PROFILE DETAILS</td></tr>
<tr>
<td>Full Name</td>
<td>:</td>
<td>".getDetailsFromTables('name')."</td>
</tr>

<tr>
<td>Gender</td>
<td>:</td>
<td>$g</td>
</tr>

<tr>
<td>Mobile</td>
<td>:</td>
<td><a style=color:white target=_blank value=".getDetailsFromTables('mobile')." href=".getDetailsFromTables('mobile').">
".getDetailsFromTables('mobile')."</a></td>
</tr>

<tr>
<td>Email</td>
<td>:</td>
<td>
<a style=color:white target=_blank href=mailto:".getDetailsFromTables('email').">".getDetailsFromTables('email')."</a></td>
</tr>

<tr>
<td>District</td>
<td>:</td>
<td>".getDetailsFromTables('district')."</td>
</tr>

<tr>
<td>Profile Title</td>
<td>:</td>
<td>".getDetailsFromTables('summary','technical')."</td>
</tr>

<tr>
<td>Skills</td>
<td>:</td>
<td>".getDetailsFromTables('capability','employment')."</td>
</tr>

<tr>
<td>Job Category</td>
<td>:</td>
<td>".getDetailsFromTables('categry','fewdata')."</td>
</tr>

<tr>
<td>Experience</td>
<td>:</td>
<td>".getDetailsFromTables('tot_exp','employment')."</td>
</tr>

</table>


</div></body></html>

";
mail_attachment($my_file, $my_path, "career4you.in@gmail.com", $my_mail, $my_name, $my_replyto, $my_subject, $my_message);
updateEnquiryResult();
}

function findDetailsFromTable($tuple,$prime,$table='register')
{
	$sql = "SELECT $tuple FROM $table WHERE  ";
	$table=='register'?$sql.=" id=".$prime:$sql.=" regid=".$prime;
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	return $row[0];
}

?>