<?php
if(is_numeric($_SESSION['pin'])){
//include_once 'include/functions.php';
/* * entire profile show w r t session and user 
 * profile must ahve some known values every time and 
 * are id,name,email,gender,age.
 * show some images .and other links and those of which
 * are interest by the vway that the term can be they are their custom messages.
 * SSSSSSSSSSSSSSSSSSS
 * favourites,connections,followers
 * i need some more links,status updates
 * and much more.
 * visitors,followers
 * response indication like viewed by and messsage buzz.
 * --------toplinks
 * photo-----data
 * side links----recent status messages.
 * textbox to say hi and something to
 * post images 3:24 PM 5/31/2013
 */
?>
<div id="profile_note">
<div class="status">
<input type="text" id="statusnow" value="You have Something to say......" 
style="width:300px;height:35px;font-style:oblique;color:grey"/>
<button onclick="publishStatusNow()" class="button">Publish</button></div>
<div class="recent"><script type="text/javascript">showRecentUpdates();</script>
<p id="showhere"></p></div>
<div class="favourites"><!-- favorites -->favourites</div>
<div class="connection"><!-- connection -->connection</div>
<div class="followers"><!-- followers -->followers</div>
<div class="saysome"><!-- textbox to say something -->something</div>
</div>
<?php }?>