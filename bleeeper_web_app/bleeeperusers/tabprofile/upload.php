<?php
session_start();
include('../bleeeperphp/conn.php');
/*Pic fetch*/
$id=base64_decode($_SESSION['id']);
$sql="SELECT * FROM  ppic_tb WHERE user_id='$id' AND ppic_state='1'";
$qchck=mysqli_query($con,$sql);
$dir="../bleeeperimg/blankuserimg.jpg";
$dircatch=NULL;
while($q=mysqli_fetch_array($qchck)){
$ppic=$q['ppic_link'];
$dircatch="../../file_data/".$id."/".$ppic;
}
if($dircatch!=NULL){
$dir=$dircatch;
}
/*Pic fetch*/



?>
<html>
<head>
<title>Profile picture upload</title>
<link type="text/css" href="../bleeepercss/bleeeperstruct.css" rel="stylesheet"/>
<link type="text/css" href="../bleeepercss/bleeeperitem.css" rel="stylesheet"/>
<link type="text/css" href="../bleeepercss/bleeeperprofile.css" rel="stylesheet"/>

</head>
<body>

<div id="header" >
<div class="bleeepertitle">bleeeper</div>
</div> 

<div id="contentpane" style="margin-left:250px;margin-top:60px;">
<div id="profile-content" style="height:auto;">
<div class="titlename">Upload profile picture here</div>

<div class="dataent">
<div class="profilepic">
<img src="<?php echo $dir ?>"/></div>
<div class="credentials">
<h1><span style="font-size:15px;">Select a picture not more that 1 MB for upload allowed formats include(jpeg, jpg, png and gif)</span></h1>
<form method="POST" action="../../file_data/uploadfunc.php" enctype="multipart/form-data" id="picupload"  style="margin-left:10px;">
<label>Picture upload: </label><input type="file" id="ppic" name="ppic" style="width:411px;" /><br/>
<input type="submit" name ="submit" value="Upload" id="close_button" style="margin-left:116px;margin-top:10px;" />
</form>
</div>
</div>
</div>
</body>
