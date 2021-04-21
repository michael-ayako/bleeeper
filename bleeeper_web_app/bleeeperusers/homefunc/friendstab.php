<?php
if(!isset ($_SESSION)){
session_start();
}
$newmessage=$newreq=$numess=$numreq=NULL;

include('../bleeeperphp/conn.php');
$sen=base64_decode($_SESSION['id']);


//Fetching all unread messages
$sqlmess="SELECT * FROM msg_tb WHERE id_reciever='$sen' AND msg_state_rec='1'";
$resultmess=mysqli_query($con,$sqlmess);
$rowmess=mysqli_fetch_array($resultmess);
$numess=mysqli_num_rows($resultmess);
if($numess<=0) 
$newmessage=NULL;
else
$newmessage="<span class='newalert'>".$numess."</span>";

//Fetching all bleeperrequests
$sqlreq="SELECT * FROM freind_req_tb WHERE id_reciever='$sen' AND state='4'";
$resultreq=mysqli_query($con,$sqlreq);
$rowreq=mysqli_fetch_array($resultreq);
$numreq=mysqli_num_rows($resultreq);
if($numreq<=0) 
$newreq=NULL;
else
$newreq="<span class='newalert'>".$numreq."</span>"; 
?>

<a href="" style="text-decoration:none" onclick="loadstatus('./status.php' ,'contentpane');return false;"><div class="tabsfrds">Boinkerz</div></a>
<a href="" style="text-decoration:none" onclick="loadseg('./friends.php' ,'contentpane');return false;"><div class="tabsfrds">Bleeepers<?php echo $newreq; ?></div></a>
<a href="" style="text-decoration:none" onclick="loadseg('./groups.php' ,'contentpane');return false;"><div class="tabsfrds">Groups</div></a>
<a href="" style="text-decoration:none" onclick="loadmessages('./messages.php' ,'contentpane');return false;"><div class="tabsfrds">Messages<?php echo $newmessage; ?></div></a>
