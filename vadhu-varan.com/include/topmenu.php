<?php 
session_start();
include_once 'include/admin.php';
$sql = "SELECT visited,followed FROM personal_details WHERE id=".$_SESSION['who'];
$result = mysql_query($sql);
$data = mysql_fetch_array($result);
$visit = $data['visited'];
$follo = $data['followed'];
if(!empty($visit)){$vis = count(explode(",",$visit));}
if (!empty($follo)){$fol = count(explode(",",$follo));}
?>
<style type="text/css">
.menuTemplate2 {
	margin: 0 auto;
	width: auto;
	float: left;
	position: relative;
	z-index: 4;
	height: 36px;
	background: none;
	border: none;
	font-family: Arial, Helvetica, sans-serif;
	list-style: none;
	padding: 0;
}

.menuTemplate2 li {
	padding: 0;
	float: left;
	height: 34px;
	_height: 36px;
	position: relative;
	z-index: 5;
	text-transform: uppercase;
	/*border-left: 1px solid;*/
	/*border-right: 1px solid #C4160F;*/
	border-top: 2px solid;
	border-color: transparent;
	_border-color: #FFF;
	/*border-left: 1px solid white; /*IE6 Hack*/
}

.menuTemplate2 li:hover,.menuTemplate2 li.onhover {
	text-transform: uppercase;
	border-color: #DDD;
	border-top: 2px solid #B00;
	border-bottom: 1px solid #DDD;
}

.menuTemplate2 a {
	padding: 0 2px 0 0;
	line-height: 34px;
	/*Note: keep this value the same as the height of .menuTemplate2 li */
	font-size: 12px;
	font-weight: normal;
	display: inline-block;
	outline: 0;
	text-decoration: none;
	color: #000;
	position: relative;
}

.menuTemplate2 li:hover a,.menuTemplate2 li.onhover a {
	background-color: #EEE;
    background-image: url("../images/right-bullet-down.jpg");
	color: red;
	z-index: 9;
}

.menuTemplate2 a.arrow {
	background: url(arrow.gif) no-repeat right center;
}

.menuTemplate2 li.menuRight {
	float: right;
	margin-right: 0px;
}

.menuTemplate2 li.separator {
	display: none;
}

.menuTemplate2 .drop {
	position: absolute;
	z-index: 5;
	left: -9999px;
	border: 1px solid #DDD;
	border-bottom: 2px solid #B00;
	background: #FFF url(bg_grad.gif) repeat-x 0 0;
	text-align: left;
	padding: 20px;
	top: 31px;
}

.menuTemplate2 .drop a {
	padding-left: 0px;
	padding-right: 0px;
	line-height: 24px;
	font-size: 11px;
	font-weight: normal;
	display: inline;
	text-align: left;
	position: static;
	z-index: 0;
}

.menuTemplate2 li:hover .drop,.menuTemplate2 li.onhover .drop {
	left: -1px;
}

.menuTemplate2 li:hover .dropToLeft,.menuTemplate2 li.onhover .dropToLeft
	{
	left: auto;
	right: -1px;
}

.menuTemplate2 li:hover .dropToLeft2,.menuTemplate2 li.onhover .dropToLeft2
	{
	left: auto;
	right: -60px;
}

.menuTemplate2 div.drop div div {
	padding: 6px 20px;
}

.menuTemplate1 li:hover .drop a,.menuTemplate1 li.onhover .drop a {
	background: none;
	background-image: none;
	padding: 0 0;
}

.menuTemplate2 div.drop div a {
	line-height: 24px;
	color: #048;
	background: none;
}

.menuTemplate2 div.drop div a:hover {
	text-decoration: underline;
	cursor: pointer;
	color: Red;
}

.menuTemplate2 div.left {
	float: left;
}

.decor2_1 {
	
}

.decor2_2 {
	
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	-moz-box-shadow: 0 0 14px #AAA;
	-webkit-box-shadow: 0 0 14px #AAA;
	box-shadow: 0 0 14px #AAA;
}
</style>

<ul class="menuTemplate2 decor2_1" style="background-color:#06068C;padding-bottom:2px">

	<li><a href="index.php">Profile</a></li>

	<li class="separator"></li>

	<li><a href="#">Edit Profile Details</a>
	<div class="drop decor2_2" style="width: 75%">
	<div><a href="index.php?msg=person">Personal Details</a></div>
	<div><a href="index.php?msg=physical">Physical Details</a></div>
	<div><a href="index.php?msg=job">Education &amp; Job</a></div>
	<div><a href="index.php?msg=family">Family Details</a></div>
	<div><a href="index.php?msg=horo">Horoscope</a></div>
	<div><a href="index.php?msg=other">Other</a></div>
	</div>
	</li>
	<li class="separator"></li>
	<li><a href="#">Profile View</a>
	<div class="drop decor2_2" style="width: 66%">
	<div><a href="index.php?msg=visit" title="<?php echo $vis." Profile(s)";?>">Visited</a><br />
	</div>
	<div><a href="index.php?msg=follow" title="<?php echo $fol." Profile(s)";?>">Followed</a><br />
	</div>
	
	</div>
	</li>
	<li class="separator"></li>
	<li><a href="index.php?msg=payment">Pay Now</a></li>
	<li class="separator"></li>
	<li><a href="#">Advanced Search</a>
	<div class="drop decor2_2" style="width: 72%">
	<div><a href="index.php?msg=key">Key search</a><br />
	</div>
	<div><a href="index.php?msg=details">Details search</a><br />
	</div>
	</div>
	</li>
	<li class="separator"></li>
	<li><a href="index.php?msg=logout">Sign Out</a></li>
</ul>