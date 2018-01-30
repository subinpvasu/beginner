<?php
session_start ();
include_once 'include/config.php';
?>
<html>
<head>
<style type="text/css">
#reqest td {
	text-align: center;
}
</style>
</head>
<body>
<?php
///
$id = $_SESSION ['id'];
$ky = $_GET ['key'];
if (is_numeric ( $id ) && is_numeric ( $ky ))
   {
      $sql = "SELECT * FROM requirement WHERE empid=$id AND id=$ky";
      $result = mysql_query ( $sql ) or die ( mysql_error () );
      if (mysql_num_rows ( $result ) > 0)
         { //a=3,b=2,a=a+b=5,b=a-b(5-2)=3,a=a-b(5-3)=2
            while ( $row = mysql_fetch_array ( $result ) )
               {
                  ?>
<form id="reqest" method="post" action="checkout.php">
<table width="400px">
	<tr>
		<td align="center" colspan="2" style="font-weight: bold;color:green;">Change Requirement</td>
	</tr>
	<tr>
		<td>Designation</td>
		<td><input type="text" name="design"
			value="<?php
                  echo $row ['designation'];
                  ?>"
			style="width: 150px; height: 22px; border: 1px solid #465615; border-left: 4px solid #465615" /></td>
	</tr>
	<tr>
		<td>Vacancy</td>
		<td><input type="text" name="vacant"
			value="<?php
                  echo $row ['vacancy'];
                  ?>"
			style="width: 150px; height: 22px; border: 1px solid #465615; border-left: 4px solid #465615" />
		</td>
	</tr>
	<tr>
		<td>Category</td>
		<td><select name="cat"
			style="width: 155px; height: 24px; border: 1px solid #465615; border-left: 4px solid #465615">
			<option
				<?php
                  if ($row ['category'] == "IT Jobs")
                     {
                        echo "selected";
                     }
                  ?>
				value="IT Jobs">IT Jobs</option>
			<option
				<?php
                  if ($row ['category'] == "Tele Calling / BPO Jobs")
                     {
                        echo "selected";
                     }
                  ?>
				value="Tele Calling / BPO Jobs">Tele Calling / BPO Jobs</option>
			<option
				<?php
                  if ($row ['category'] == "Engineering Jobs")
                     {
                        echo "selected";
                     }
                  ?>
				value="Engineering Jobs">Engineering Jobs</option>
			<option
				<?php
                  if ($row ['category'] == "Marketing Jobs")
                     {
                        echo "selected";
                     }
                  ?>
				value="Marketing Jobs">Marketing Jobs</option>
			<option
				<?php
                  if ($row ['category'] == "Sales Jobs")
                     {
                        echo "selected";
                     }
                  ?>
				value="Sales Jobs">Sales Jobs</option>
			<option
				<?php
                  if ($row ['category'] == "Office, Admin / HR Jobs")
                     {
                        echo "selected";
                     }
                  ?>
				value="Office, Admin / HR Jobs">Office, Admin / HR Jobs</option>
			<option
				<?php
                  if ($row ['category'] == "Finance / Accounting Jobs")
                     {
                        echo "selected";
                     }
                  ?>
				value="Finance / Accounting Jobs">Finance / Accounting Jobs</option>
			<option
				<?php
                  if ($row ['category'] == "Medical / Health Care")
                     {
                        echo "selected";
                     }
                  ?>
				value="Medical / Health Care">Medical / Health Care</option>
			<option
				<?php
                  if ($row ['category'] == "Education / Teaching")
                     {
                        echo "selected";
                     }
                  ?>
				value="Education / Teaching">Education / Teaching</option>
			<option
				<?php
                  if ($row ['category'] == "Apprentice / Internship")
                     {
                        echo "selected";
                     }
                  ?>
				value="Apprentice / Internship">Apprentice / Internship</option>
			<option
				<?php
                  if ($row ['category'] == "Other Jobs")
                     {
                        echo "selected";
                     }
                  ?>
				value="Other Jobs">Other Jobs</option>
		</select></td>
	</tr>
	<tr>
		<td>Age</td>
		<td><select name="age"
			style="width: 155px; height: 24px; border: 1px solid #465615; border-left: 4px solid #465615">
			<option
				<?php
                  if ($row ['age'] == 'Less than 20 Yr')
                     {
                        echo "selected";
                     }
                  ?>
				value="Less than 20 Yr">Less than 20 Yr</option>
			<option <?php
                  if ($row ['age'] == '20-30 Yr')
                     {
                        echo "selected";
                     }
                  ?>
				value="20-30 Yr">20-30 Yr</option>
			<option <?php
                  if ($row ['age'] == '30-40 Yr')
                     {
                        echo "selected";
                     }
                  ?>
				value="30-40 Yr">30-40 Yr</option>
			<option <?php
                  if ($row ['age'] == '40-50 Yr')
                     {
                        echo "selected";
                     }
                  ?>
				value="40-50 Yr">40-50 Yr</option>
			<option <?php
                  if ($row ['age'] == '50+ Yr')
                     {
                        echo "selected";
                     }
                  ?>
				value="50+ Yr">50+ Yr</option>
			<option <?php
                  if ($row ['age'] == 'nolimit')
                     {
                        echo "selected";
                     }
                  ?>
				value="nolimit">No Age Limit</option>
		</select></td>
	</tr>
	<tr>
		<td>Gender</td>
		<td><select name="gender"
			style="width: 155px; height: 24px; border: 1px solid #465615; border-left: 4px solid #465615">
			<option <?php
                  if ($row ['sex'] == 'M/F')
                     {
                        echo "selected";
                     }
                  ?>
				value="M/F">M/F</option>
			<option <?php
                  if ($row ['sex'] == 'MALE')
                     {
                        echo "selected";
                     }
                  ?>
				value="MALE">MALE</option>
			<option <?php
                  if ($row ['sex'] == 'FEMALE')
                     {
                        echo "selected";
                     }
                  ?>
				value="FEMALE">FEMALE</option>
		</select></td>
	</tr>
	<tr>
		<td>Salary</td>
		<td><input type="text" name="salary"
			value="<?php
                  echo $row ['salary'];
                  ?>"
			style="width: 150px; height: 22px; border: 1px solid #465615; border-left: 4px solid #465615" />
		</td>
	</tr>
	<tr>
		<td>Experience</td>
		<td><select name="experience"
			style="width: 155px; height: 24px; border: 1px solid #465615; border-left: 4px solid #465615">
			<option <?php
                  if ($row ['experience'] == 0)
                     {
                        echo "selected";
                     }
                  ?>
				value="0">&lt;1 Year</option>
			<option <?php
                  if ($row ['experience'] == 1)
                     {
                        echo "selected";
                     }
                  ?>
				value="1">1</option>
			<option <?php
                  if ($row ['experience'] == 2)
                     {
                        echo "selected";
                     }
                  ?>
				value="2">2</option>
			<option <?php
                  if ($row ['experience'] == 3)
                     {
                        echo "selected";
                     }
                  ?>
				value="3">3</option>
			<option <?php
                  if ($row ['experience'] == 4)
                     {
                        echo "selected";
                     }
                  ?>
				value="4">4</option>
			<option <?php
                  if ($row ['experience'] == 5)
                     {
                        echo "selected";
                     }
                  ?>
				value="5">5</option>
			<option <?php
                  if ($row ['experience'] == 6)
                     {
                        echo "selected";
                     }
                  ?>
				value="6">6</option>
			<option <?php
                  if ($row ['experience'] == 7)
                     {
                        echo "selected";
                     }
                  ?>
				value="7">7</option>
			<option <?php
                  if ($row ['experience'] == 8)
                     {
                        echo "selected";
                     }
                  ?>
				value="8">8</option>
			<option <?php
                  if ($row ['experience'] == 9)
                     {
                        echo "selected";
                     }
                  ?>
				value="9">9</option>
			<option <?php
                  if ($row ['experience'] == 10)
                     {
                        echo "selected";
                     }
                  ?>
				value="10">&gt;10 Years</option>
		</select></td>
	</tr>
	<tr>
		<td>Type</td>
		<td><select name="type"
			style="width: 155px; height: 24px; border: 1px solid #465615; border-left: 4px solid #465615">
			<option <?php
                  if ($row ['type'] == 'Full Time')
                     {
                        echo "selected";
                     }
                  ?>
				value="Full Time">Full Time</option>
			<option <?php
                  if ($row ['type'] == 'Part Time')
                     {
                        echo "selected";
                     }
                  ?>
				value="Part Time">Part Time</option>
		</select></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="hidden" name="reqid"
			value="<?php
                  echo $row ['id']?>" /> <input type="hidden"
			name="lastchange" value="<?php
                  echo date ( "d-m-Y" );
                  ?>" /> <input
			type="submit" name="reqired" value="Save Changes" class="fb5" /></td>
	</tr>
</table>
</form>	
<?php
               }
         }
   }
else
   {
      ?>  
<form id="reqest" method="post" action="checkout.php">
<table width="400px">
	<tr>
		<td align="center" colspan="2" style="font-weight: bold;color:green;">Add New Requirement</td>
	</tr>
	<tr>
		<td>Designation</td>
		<td><input type="text" name="design" style="width:150px;height:22px;border:1px solid#465615;border-left:4px solid#465615" /></td>
	</tr>
	<tr>
		<td>Vacancy</td>
		<td><input type="text" name="vacant" style="width:150px;height:22px;border:1px solid#465615;border-left:4px solid#465615" /></td>
	</tr>
	<tr>
		<td>Category</td>
		<td><select name="cat" style="width:155px;height:24px;border:1px solid#465615;border-left:4px solid#465615">
			<option value="IT Jobs">IT Jobs</option>
			<option value="Tele Calling / BPO Jobs">Tele Calling / BPO Jobs</option>
			<option value="Engineering Jobs">Engineering Jobs</option>
			<option value="Marketing Jobs">Marketing Jobs</option>
			<option value="Sales Jobs">Sales Jobs</option>
			<option value="Office, Admin / HR Jobs">Office, Admin / HR Jobs</option>
			<option value="Finance / Accounting Jobs">Finance / Accounting Jobs</option>
			<option value="Medical / Health Care">Medical / Health Care</option>
			<option value="Education / Teaching">Education / Teaching</option>
			<option value="Apprentice / Internship">Apprentice / Internship</option>
			<option value="Other Jobs">Other Jobs</option>
		</select></td>
	</tr>
	<tr>
		<td>Age</td>
		<td><select name="age" style="width:155px;height:24px;border:1px solid#465615;border-left:4px solid#465615">
			<option value="Less than 20 Yr">Less than 20 Yr</option>
			<option value="20-30 Yr">20-30 Yr</option>
			<option value="30-40 Yr">30-40 Yr</option>
			<option value="40-50 Yr">40-50 Yr</option>
			<option value="50+ Yr">50+ Yr</option>
			<option value="nolimit">No Age Limit</option>
		</select></td>
	</tr>
	<tr>
		<td>Gender</td>
		<td><select name="gender" style="width:155px;height:24px;border:1px solid#465615;border-left:4px solid#465615">
			<option value="M/F">M/F</option>
			<option value="MALE">MALE</option>
			<option value="FEMALE">FEMALE</option>
		</select></td>
	</tr>
	<tr>
		<td>Salary</td>
		<td><input type="text" name="salary" style="width:150px;height:22px;border:1px solid#465615;border-left:4px solid#465615"/></td>
	</tr>
	<tr>
		<td>Experience</td>
		<td><select name="experience" style="width:155px;height:24px;border:1px solid#465615;border-left:4px solid#465615">
			<option value="Less than 1 Yr">Less than 1 Yr</option>
<option value="1 Yr or more">1 Yr or more</option>
<option value="2 Yr or more">2 Yr or more</option>
<option value="3 Yr or more">3 Yr or more</option>
<option value="5 Yr or more">5 Yr or more</option>
<option value="7 Yr or more">7 Yr or more</option>
<option value="9 Yr or more">9 Yr or more</option>
<option value="10 Yr or more">10 Yr or more</option>
		</select></td>
	</tr>
	<tr>
		<td>Type</td>
		<td><select name="type" style="width:155px;height:24px;border:1px solid#465615;border-left:4px solid#465615">
			<option value="Full Time">Full Time</option>
			<option value="Part Time">Part Time</option>
		</select></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="hidden" name="empid"
			value="<?php echo $_SESSION['id']?>" /> <input type="hidden"
			name="lastchange" value="<?php echo date("d-m-Y");?>" /> <input
			type="submit" name="reqire" value="Add Requirement" class="fb5" /></td>
	</tr>
</table>
</form>
<?php 
}
?>
</body>
</html>