<?php if(is_numeric($_SESSION['pin'])){?>

<table align="center" cellspacing="5" cellpadding="5">

<tr><td class="headers" colspan="3">Personal Details</td></tr>

<tr><td>Name</td><td>:</td><td><?php  echo getDetails('name');?></td></tr>
<tr><td>Username</td><td>:</td><td><?php echo getDetails('username');?></td></tr>
<tr><td>Email</td><td>:</td><td><?php echo getDetails('email');?></td></tr>
<tr><td>Gender</td><td>:</td><td><?php echo getDetails('gender');?></td></tr>
<tr><td>Date of Birth</td><td>:</td><td><?php echo getDetails('dob');?></td></tr>
<tr><td>Age</td><td>:</td><td><?php echo getDetails('age');?></td></tr>
<tr><td>Marital Status</td><td>:</td><td><?php echo ucfirst(getDetails('marital_status'));?></td></tr>
<tr><td>Country</td><td>:</td><td><?php echo getDetails('country');?></td></tr>
<tr><td>State</td><td>:</td><td><?php echo getDetails('state');?></td></tr>
<tr><td>City</td><td>:</td><td><?php echo getDetails('city');?></td></tr>
<tr><td>Promo Mails</td><td>:</td><td><?php echo getDetails('advert');?></td></tr>

<tr><td colspan="3"></td></tr>

</table>
<?php }?>