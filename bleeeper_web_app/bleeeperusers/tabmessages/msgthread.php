<?php
ob_start();
session_start();
include('../bleeeperphp/conn.php');
$sen=base64_decode($_SESSION['id']);        
$rec=$_POST['id'];
$name=$_POST['name'];
?>
<div id="msgbox">
<textarea id='msg_throw' placeholder='What do you have to say?'></textarea><br/>
<button id="chat_button" onClick="chat_message('<?php echo base64_decode($_SESSION['id'])?>','<?php echo $rec?>','<?php echo $name?>');return false;">Send</button>
<button id="close_button" onClick="unload_scripts()">Close</button>
</div>
<div id="msg_user_thread">
<?php
include("./thread.php");
?>
</div>
