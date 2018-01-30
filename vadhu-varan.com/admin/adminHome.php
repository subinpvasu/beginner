<?php 
session_start();
include_once '../include/admin.php';

?>
<html>
<head>
<script src="validation.js"> </script>
<script src="../profile_screen.js"> </script>
<script src="../validation.js"> </script>

<link href="../profile_screen.css" rel="stylesheet" type="text/css">
<title>VADHU-VARAN.COM</title>
<style>
.horobox {
	height: 35px;
	width: 80px;
	border: 2px solid #C4160F;
	text-align: center;
}
.minisel {
	color: #000481;
	width: 85px;
	height: 23px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}

.textbox {
	color: #000481;
	width: 230px;
	height: 23px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}
.button {
	background-color: #C4160F;
	padding-left: 6px;
	padding-right: 6px;
	padding-top: 3px;
	padding-bottom: 3px;
	color: #ffffff;
	border: 1px solid #C4160F;
	font-weight: bold;
	background-image: url(../images/red.jpg);
}

.button:hover {
	background-color: #000000;
	border: 1px solid #000000;
	color: #FEB914;
	font-weight: bold;
	background-image: url(../images/black.jpg);
}
.textarea {
	color: #000481;
	width: 230px;
	height: 60px;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}
#output td {
border:1px solid black;
} 
#output th {
border:1px solid white;
} 
#output th {
	background-color: black;
	color:white;
}
#output td {
	background-color: white;
	color:black;
}
.select {
	width: 235px;
	height: 23px;
	color: #000481;
	border: 1px solid #C4160F;
	border-left: 4px solid #C4160F;
}
</style>
<script src="../validation.js"></script>
</head>

<body onload="doTheses()">
<p id="subject"></p>
<table  align="center" >
<tr><td colspan="2" id="admin-title" style="text-transform:uppercase;font-weight:bold;color:white;font-size:25px;text-align:center;background-color:black">

</td></tr>
<tr>
<td id="linkrow">
<table id="linkcol" style="white-space: nowrap;">
<tr><td><a href="javascript:void displayonVadhu(0)">Vadhu Details				</a></td></tr>
<tr><td><a href="javascript:void displayonVaran(0)">Varan Details				</a></td></tr>
<tr><td><a href="javascript:void advancedSearchResults()">Advanced Search												</a></td></tr>
<tr><td><a href="javascript:void createForm()">Create Data Entry Operator		</a></td></tr>
<tr><td><a href="javascript:void displayOperator()">Data Entry Operator Details	</a></td></tr>
<tr><td><a href="javascript:void displaydtVadhu(0)">Vadhu Details				</a></td></tr>
<tr><td><a href="javascript:void displaydtVaran(0)">Varan Details				</a></td></tr>
<tr><td><a href="javascript:void displayForm()">Add Profile						</a></td></tr>
<tr><td><a href="javascript:void displayAbuse()">Abuse Profile						</a></td></tr>
<tr><td><a href="javascript:void displayGuestPro(0)">Guest Profiles : 						<b id="gup"></b>	</a></td></tr>
<tr><td><a href="javascript:void displayGoldPro(0)">Golden Profiles : 						<b id="glp"></b>	</a></td></tr>
<tr><td><a href="javascript:void displayPremiumPro(0)">Premium Profiles : 						<b id="prp"></b>	</a></td></tr>
<tr><td><a href="javascript:void displayPublishPro(0)">Published Profiles : 					<b id="pup"></b>	</a></td></tr>
<tr><td><a href="javascript:void displayUnpubPro(0)">Unpublished Profiles :					<b id="upp"></b>	</a></td></tr>
<tr><td>Total Vadhu :    									<b id="vdp"></b>		</td></tr>
<tr><td>Total Varan :    									<b id="vrp"></b>		</td></tr>
<tr><td>Profiles-Online :									<b id="tpo"></b>		</td></tr>
<tr><td>Profiles-DataEntry :								<b id="tpd"></b>		</td></tr>
<tr><td>Total Profiles : 									<b id="vtp"></b>		</td></tr>
</table>
</td>
<td id="admin-details" style="text-align: center;background-color:#dddddd;color:white;vertical-align: top;white-space: nowrap;">


</td>
</tr>
<tr>
<td colspan="2" align="center" style="height:30px;"> Gitacommunications &copy; <?php echo date("Y");?></td>
</tr>
</table>

</body>
</html>