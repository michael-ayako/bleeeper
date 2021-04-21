<?php
ob_start();
session_start();
$gid=$_POST['grpid'];
$sid=base64_decode($_SESSION['id']);
$_SESSION['gid']=$gid;
?>
<div id='msginteract'>
<textarea id="grpmsg" placeholder="Type your group message area here...."></textarea>
<button id="chat_button" onClick="grpsend_message('<?php echo $sid;?>','<?php echo $gid?>','grpmsg')">Post</button>
<button id="close_button" style="margin-left:6%" onClick="window.open('./tabgroups/grpupload.php', '_blank');">Share</button>
</div>

<div id='msgarchive'>
</div>