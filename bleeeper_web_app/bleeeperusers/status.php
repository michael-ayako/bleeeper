<?php 
session_start();
?>
<div id="statuspane">
<div id="status-content">
<div id="boinkerz">
<div id="update">
<label>Boink your friends</label><br/>
<textarea placeholder="What are you upto?" id="boink_update"></textarea>
<input type="Button" value="Boink!" dropzone="link" onclick="_boinking('<?php echo base64_decode($_SESSION['id']);?>');return false;"/><br/>
<div id='boink_success'>Your boink was successful</div>
</div>

<div id="others">
</div>
<br/><br/><br/><br/><br/><br/><br/><br/>
</div> 

<div id="following">
<div id="shoutout">
<label> Send a shout out to your followers</label><br/>
<textarea placeholder="What do you wana tell your followers?" id="_shoutout_update"></textarea>
<input type="Button" value="Post" onclick="_shoutout('<?php echo base64_decode($_SESSION['id']);?>');return false;"/><br/>
<div id='shoutout_success'>You have successfully sent a shout out</div>
</div>

<div id="shoutouts">
</div>
<br/><br/><br/><br/><br/><br/><br/><br/>

</div>
</div>
</div>