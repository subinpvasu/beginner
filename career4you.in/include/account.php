<?php
session_start ();
include_once 'include/config.php';

$id = $_SESSION ['id'];
$sql = "SELECT * FROM register WHERE id='$id'";
$result = mysql_query ( $sql ) or die ( mysql_error () );
if (mysql_num_rows ( $result ) > 0)
   {
      while ( $row = mysql_fetch_array ( $result ) )
         {
            ?>
<div style="width: 350px; float: left; border-right: 1px solid #465615">
<table align="left" width="100%">
	<tr>
		<td
			style="padding-bottom: 8px; width: 100%; height: 30px; vertical-align: middle"
			onmouseover="showList()" onmouseout="hideList()">
  <?php
            echo $row ['name'];
            if ($row ['resume'] == 'NO')
               {
                  ?>
  <a href="" title="Upload Your Resume Now!"
			onclick="javascript:void window.open('/include/upimage.php','_blank','width=500,height=200,scrollbars=1,resizable=1,left=100,top=100');">
		<img src="images/word_icon.png" style="padding-left: 200px"
			width="30px" height="30px" alt="Select Resume" /> </a>
  <?php
               }
            else
               {
                  ?>
  <ol id="resume"
			style="list-style-type: none; position: absolute; visibility: hidden; width: 150px; float: right; margin-left: 210px;">
			<li style="padding-bottom: 15px"><a href=""
				onclick="javascript:void window.open('/include/downimage.php','_blank','width=500,height=200,scrollbars=1,resizable=1,left=100,top=100');">Download
			Resume </a></li>
			<li><a href=""
				onclick="javascript:void window.open('/include/upimage.php','_blank','width=500,height=200,scrollbars=1,resizable=1,left=100,top=100');">Upload
			New Resume</a></li>
		</ol>
		<img src="images/word_ico.png" style="padding-left: 200px"
			width="30px" height="30px" alt="Resume" />
  <?php
               }
            ?></td>
	</tr>
	<tr>
		<td style="padding-bottom: 5px"><b>Permanent Address</b></td>
	</tr>
	<tr>
		<td style="padding-bottom: 3px"><?php
            echo $row ['peraddress']?></td>
	</tr>
	<tr>
		<td style="padding-bottom: 5px"><b>Present Address</b></td>
	</tr>
	<tr>
		<td style="padding-bottom: 5px"><?php
            echo $row ['preaddress']?></td>
	</tr>
	<tr>
		<td>Phone : <?php
            echo $row ['phone']?></td>
	</tr>
	<tr>
		<td>Mobile : <?php
            echo $row ['mobile']?></td>
	</tr>
	<tr>
		<td>Email : <?php
            echo $row ['email']?></td>
	</tr>
	<tr>
		<td style="padding-bottom: 15px" id="fax">Fax : <?php
            echo $row ['fax']?></td>
	</tr>
	<tr>
		<td style="padding-bottom: 8px"><b>Personal Details</b></td>
	</tr>
	<tr>
		<td>Father Name : <?php
            echo $row ['father']?></td>
	</tr>
	<tr>
		<td>Birth Place : <?php
            echo $row ['birthplace']?></td>
	</tr>
	<tr>
		<td>DOB : <?php
            echo $row ['birthday']?></td>
	</tr>
	<tr>
		<td>Age : <?php
            echo $row ['age']?></td>
	</tr>
	<tr>
		<td>Marital Status : <?php
            if ($row ['marriage'] == 'S')
               {
                  echo "Single";
               }
            else
               {
                  echo "Married";
               }
            ?></td>
	</tr><?php
            if ($row ['marriage'] != 'S')
               {
                  ?>
   <tr>
		<td>Name of Spouse : <?php
                  echo $row ['wife']?></td>
	</tr>
	<tr>
		<td>No.of Children : <?php
                  echo $row ['child']?></td>
	</tr><?php
               }
            ?>
  <tr>
		<td style="text-align: right"><a href="index.php?msg=regedit">Edit
		Details</a></td>
	</tr><?php
         
         }
   }

?>
   
 </table>
</div>
<div style="float: right; width: 350px">
  <?php
$id = $_SESSION ['id'];
$sql = "SELECT technical.summary AS summary,employment.firm AS firm,employment.designation AS designation,
 		 employment.current AS current,employment.capability AS capability,education.course AS course,education.school AS school,
 		 education.too AS too,education.hobby AS hobby FROM education JOIN technical ON education.regid=technical.regid JOIN employment
 		 ON technical.regid=employment.regid WHERE education.regid=" . $id;
$result = mysql_query ( $sql ) or die ( mysql_error () );
if($result){
if (mysql_num_rows ( $result ) > 0)
   {
      while ( $row = mysql_fetch_array ( $result ) )
         {
            ?>
 <table width="100%">
	<tr>
		<td style="border-bottom: 1px solid black; width: 100%;"> <a style="color: blue;"
			href="index.php?msg=skill&sms=technical&key=<?php
            echo $_SESSION ['id']?>">Edit</a>
		<b style="padding-left: 174px; color: black;">Profile Summary</b></td>
	</tr>
 <?php
            if (empty ( $row ['summary'] ))
               {
                  $sumry = '<a href="index.php?msg=skill&sms=technical&key=' . $id . '">Please Update Your Profile Summary</a>';
               }
            else
               {
                  $sumry = $row ['summary'];
               }
            ?>
 <tr>
		<td style="padding-bottom: 25px"><?php
            echo $sumry?></td>
	</tr>
	<tr>
		<td
			style="color: blue; border-bottom: 1px solid black; width: 100%; padding-top: 25px;">
		<a style="color: blue;"
			href="index.php?msg=skill&sms=employment&key=<?php
            echo $_SESSION ['id']?>">Edit</a>
		<b style="padding-left: 155px; color: black;">Employment Details</b></td>
	</tr>
 <?php
            if (empty ( $row ['capability'] ))
               {
                  ?>
 <tr>
		<td style="padding-bottom: 25px"><?php
                  echo "Please Update Your Employment Details";
                  ?></td>
	</tr>
 <?php
               }
            else
               {
                  $com = explode ( "|", $row ['firm'] );
                  $deg = explode ( "|", $row ['designation'] );
                  $cur = $row ['current'];
                  if ($cur == 'PA')
                     {
                        $t = 0;
                     }
                  else if ($cur == 'PB')
                     {
                        $t = 1;
                     }
                  else if ($cur == 'PC')
                     {
                        $t = 2;
                     }
                  else
                     {
                        $t = 0;
                     }
                  $a = array (0, 1, 2 );
                  $b = array_search ( $t, $a );
                  unset ( $a [$b] );
                  $p = 0;
                  foreach ( $a as $value )
                     {
                        $c [$p] = $value;
                        $p ++;
                     }
                  $x = $c [0];
                  $y = $c [1];
                  ?>
 <tr><?php
                  if (! empty ( $com [$t] ))
                     {
                        ?>
 <td style="padding-bottom: 5px">Currently working at <b> <?php
                        echo $com [$t];
                        ?></b>
		as <b>
 <?php
                        echo $deg [$t];
                        ?>.</b></td>
	</tr><?php
                     }
                  if (! empty ( $com [$x] ))
                     {
                        ?>
 <tr>
		<td style="padding-bottom: 5px">Previously worked with<b> <?php
                        echo $com [$x];
                        ?></b>
		as <b>
 <?php
                        echo $deg [$x];
                        ?></b>.</td>
	</tr><?php
                     }
                  if (! empty ( $com [$y] ))
                     {
                        ?>
 <tr>
		<td style="padding-bottom: 5px">Previously worked with<b> <?php
                        echo $com [$y];
                        ?></b>
		as <b>
 <?php
                        echo $deg [$y];
                        ?>.</b></td>
	</tr><?php
                     }
               }
            ?>
 <tr>
		<td
			style="border-bottom: 1px solid black; width: 100%; padding-top: 25px;"> <a style="color: blue;"
			href="index.php?msg=skill&sms=education&key=<?php
            echo $_SESSION ['id']?>">Edit</a>
		<b style="padding-left: 170px; color: black;">Education Details</b></td>
	</tr>
 <?php
            if (empty ( $row ['hobby'] ))
               {
                  ?>
 <tr>
		<td style="padding-bottom: 25px"><?php
                  echo "Please Update Your Educational Details";
                  ?></td>
	</tr>
 <?php
               }
            else
               {
                  $cors = explode ( "|", $row ['course'] );
                  $sch = explode ( "|", $row ['school'] );
                  $too = explode ( "|", $row ['too'] );
                  $cors = array_filter ( $cors );
                  $sch = array_filter ( $sch );
                  $too = array_filter ( $too );
                  $cors = array_values ( $cors );
                  $sch = array_values ( $sch );
                  $too = array_values ( $too );
                  $n = count ( $sch );
                  for($i = 0; $i < $n; $i ++)
                     {
                        if (! empty ( $cors [$i] ) && ! empty ( $sch [$i] ) && ! empty ( $too [$i] ))
                           {
                              echo '
		<tr>
		<td style="padding-bottom: 5px">Completed <b> ' . $cors [$i] . '</b> from  <b>
		 ' . $sch [$i] . '</b> in the year<b> ' . $too [$i] . '</b>.</td>
		</tr>';
                           }
                        else
                           {
                              echo "   ";
                           }
                     }
                  
                  
               }
            
         }
   }
   }
   
else
   {
      
      echo "you are not a valid user Exception@accphp";
     
   }
   ?>
 </table></div>