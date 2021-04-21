<?php
session_start();
include("../bleeeperphp/conn.php");

$code=base64_decode($_SESSION['id']);
$sql="SELECT * FROM freind_req_tb WHERE id_sender = '$code' AND state='3'";
$res = mysqli_query($con,$sql);

$sql1="SELECT * FROM profiling_tb WHERE id = '$code'";
$res1 = mysqli_query($con,$sql1);
$fetch1=mysqli_fetch_array($res1);
$email=$fetch1["email"];
$uname=$fetch1["username"];

?>
<style>
.blockedlist{
	
	}
</style>

<div id="profile-content" style="width:100%;">
<div class="titlename">Profile Settings</div>

<div class="dataent">
<div class="credentials" style="margin-left:0px;">
<h1>Personal Information<span style="font-size:15px;">(Click on any tab to edit it.)</span></h1>
<table>
<tr>
<td class="lbl" >Email Address:</td><td class="fld"  onClick="emailchange('<?php echo $email?>','email','<?php echo base64_decode($_SESSION['id'])?>');return false;"><?php echo $email; ?></td>
<td class="lbl" >Username:</td><td class="fld" onClick="usernamechange('<?php echo $uname?>','username','<?php echo base64_decode($_SESSION['id'])?>');return false;"><?php echo $uname ?></td>
<td class="lbl" >Password:</td><td class="fld" onClick="passwordchange('password','<?php echo base64_decode($_SESSION['id'])?>');return false;">***********</td>
</tr>
</table>

<h1>People you have blocked</h1>
<table>
<th style="font-size: 17px;">Email</th>
<th style="font-size: 17px;">Username</th>
<th style="font-size: 17px;">Name</th>
<?php 
while($fetch=mysqli_fetch_array($res)){
	$blocked=$fetch['id_reciever'];
	$sql1="SELECT * FROM profiling_tb WHERE id = '$blocked'";
	$res1 = mysqli_query($con,$sql1);
	$fetch1=mysqli_fetch_array($res1);
	$fname=$fetch1["first_name"];
	$mname=$fetch1["middle_name"];
	$lname=$fetch1["last_name"];
	$email=$fetch1["email"];
	$username=$fetch1["username"];
	
	?>
<tr>
<td class="lbl" style="width: auto;padding-left:5px;padding-right:5px;padding-top:2px;padding-bottom:2px;"><?php echo $email;?></td>
<td class="lbl" style="width: auto;padding-left:5px;padding-right:5px;padding-top:2px;padding-bottom:2px;" ><?php echo $username;?></td>
<td class="lbl" style="width: auto;padding-left:5px;padding-right:5px;padding-top:2px;padding-bottom:2px;"><?php echo $fname.' '.$mname.' '.$lname;?></td>
<td class="fld" onClick="_unblock('<?php echo $code;?>','<?php echo $blocked;?>');return false;">Unblock</td>
</tr>	
<?php	
	}
?>
</table>
</div>
</div>
</div>