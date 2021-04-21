<?php
session_start();
$fname=$mname=$lname=$dob=$dor=$gen=$count=$town=$resi=$box=$tfname=$tmname=$tlname=$pic=$profession=NULL;
include('./tabprofile/profilefunc.php');

/*Pic fetch*/
$id=base64_decode($_SESSION['id']);
$sql="SELECT * FROM  ppic_tb WHERE user_id='$id' AND ppic_state='1'";
$qchck=mysqli_query($con,$sql);
$dir="./bleeeperimg/blankuserimg.jpg";
$dircatch=NULL;
while($q=mysqli_fetch_array($qchck)){
$ppic=$q['ppic_link'];
$dircatch="../file_data/".$id."/".$ppic;
}
if($dircatch!=NULL){
$dir=$dircatch;
}
/*Pic fetch*/
?>
<div id="profile-content">
<div class="titlename"><?php echo $tfname." ".$tmname." ".$tlname; ?></div>

<div class="dataent">
<div class="profilepic"><img src="<?php echo $dir;?>"/></div>

<div class="credentials">
<h1>Personal Information  <span style="font-size:15px;">(Click on any tab to edit it.)</span></h1>
<table>
<tr>
<td class="lbl" >First Name:</td><td class="fld" id="first_name" onClick="firstname('<?php echo $fname?>','first_name','<?php echo base64_decode($_SESSION['id'])?>');return false;"><?php echo $fname?></td>
<td class="lbl" >Middle Name:</td><td class="fld" id="middle_name" onClick="middlename('<?php echo $mname?>','middle_name','<?php echo base64_decode($_SESSION['id'])?>');return false;"><?php echo $mname?></td>
<td class="lbl">Surname:</td><td class="fld" id="last_name" onClick="lastname('<?php echo $lname?>','last_name','<?php echo base64_decode($_SESSION['id'])?>');return false;"><?php echo $lname?></td>
</tr>
<tr>
<td class="lbl">Date of Birth:</td><td class="fld" id="date_of_birth" onClick="dob('<?php echo $dob?>','date_of_birth','<?php echo base64_decode($_SESSION['id'])?>');return false;"><?php echo $dob?></td>
<td class="lbl">Joined:</td><td class="fld"><?php echo $dor?></td>
</tr>
<tr>
<td class="lbl">Gender:</td><td class="fld" id="gender" onClick="gender('<?php echo $gen?>','gender','<?php echo base64_decode($_SESSION['id'])?>');return false;"><?php echo $gen?></td>
</tr>
<tr>
<td class="lbl">Country:</td><td class="fld" id="country" onClick="country('<?php echo $count?>','country','<?php echo base64_decode($_SESSION['id'])?>');return false;"><?php echo $count?></td>
<td class="lbl">Proffesion:</td><td class="fld" id="profession" onClick="proffesion('<?php echo $proffesion?>','proffesion','<?php echo base64_decode($_SESSION['id'])?>');return false;"><?php echo $proffesion?></td>

</tr>
</table>
<input type="button" value="Upload" id="close_button" onClick="window.open('./tabprofile/upload.php', '_blank');" style="margin-left:3px;"/>
</div>
</div>
