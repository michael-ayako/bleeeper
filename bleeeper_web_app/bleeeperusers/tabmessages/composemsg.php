<?php
ob_start();
session_start();
?>
<div id="msgcompose">
<h1>Compose</h1>
<div id="msgto_css">
<label>To:</label><input type="text" id="rec" onKeyUp="searchlist();return false;" placeholder="Type bleeeper buddy's name..."/>
<img id='msgcancel'src='./bleeeperimg/cancel.jpg' width='0px' height='30px' onClick="msgactivate();return false;"/>
</div>
<div id="msgscript_css">
<textarea id="msgscript" placeholder="Message"></textarea>
</div>
<div  id="button_post_css">
<button id="button_send" onClick="send_message('<?php echo base64_decode($_SESSION['id'])?>');return false;">Send</button>
<button id="button_cancel" onClick="unload_scripts()">Close</button>
</div>

</div>
<div id="searchfriendlist">

</div>