<h2 style="text-align:left"> Are You a Registered Employer?</h2><br>
<div align="center">
   <form  action="checkout.php" onsubmit="return validateLog()" method="post">
    <table cellpadding="6">
	    <tr>
		<td>Email</td>
		 <td>:<input type="text" id="username" class="textbox" name="username" size="30" maxlength="30"/>
		  <input type="hidden" name="ipaddress" value=<?php echo $_SERVER['REMOTE_ADDR'] ?> /></td>
	    </tr>
	    <tr>
		    <td>Password </td>
		    <td>:<input type="password" class="textbox" id="password" name="password" size="30" maxlength="30"/>
		    </td>
	    </tr>
	    <tr>
		    <td></td>
		    <td><a href="" id="1" onclick="newWindows(this.id)" style="text-decoration:none;color:#990033">Forgot Password?</a>
		    </td>
	    </tr>
	    <tr>
	    	<td align="center" colspan="2">  <input type="submit" class="fb5" name="myboss" value="Sign In" />
	    	</td>
	    </tr>
    </table>
   </form>
</div>
<br/>
<br/>
<br/>
<div align="right">
<h4><a href="index.php?msg=employer-register" style="text-decoration:none">OR Create a new  Account</a></h4></div>