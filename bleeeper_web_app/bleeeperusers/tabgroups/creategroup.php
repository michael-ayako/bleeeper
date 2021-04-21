<?php
ob_start();
session_start();
?>
<div id="groups-pane-content">
<?php
include('../bleeeperphp/conn.php');
$headername=base64_decode($_SESSION['id']);
$sql="SELECT * FROM profiling_tb WHERE id = '$headername'";
$query=mysqli_query($con,$sql);
$res=mysqli_fetch_array($query);


if($res['first_name']==NULL && $res['middle_name']==NULL && $res['last_name']==NULL)
$nm=base64_decode($_SESSION['username']);
else{
$nm=$res['first_name']." ".$res['middle_name']." ".$res['last_name'];
}
?>

<div id="createnewgroupform">
<form method="POST" action="<?php  $PHP_SELF;?>" enctype="multipart/form-data" id="loginform">
<legend>Create your Own group</legend>
<div id='err' style="display:none"></div>
<label>*Group Name:</label><br/>
<input type="text" name="grpname" id="grpname" placeholder="Group Name....." required autofocus/><br/>
<label>Group Adminisrator:</label><br/>
<input type="text" name="grpadmin" id="grpadmin" placeholder="<?php echo $nm;?>" disabled/><br/>
<label>*About Group</label><br/>
<textarea id="abtgrp" placeholder="What is your group about....." required></textarea><br/>
<button onclick="submitnewgroup('<?php echo base64_decode($_SESSION['id'])?>');return false;">Create Group</button>
</form>
</div>
</div>