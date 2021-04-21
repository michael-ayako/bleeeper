<?php
session_start();


$sid=base64_decode($_SESSION['id']);
$gid=$_SESSION['gid'];
include("../bleeeperphp/conn.php");

$date1=date("Y-m-d H:i:s");
$fid=array();
$sql="SELECT * FROM  grp_msg_tb WHERE group_id='$gid' AND message_type='file' ORDER BY ID DESC LIMIT 1";
$qchck=mysqli_query($con,$sql);
while($state=mysqli_fetch_array($qchck)){
array_push($fid,$state['id']);
}
if(count($fid)==0){
mkdir($gid);
$target_dir =$gid.'/';
}else{
$target_dir =$gid.'/';
}


$target_file = $target_dir . basename($_FILES["ppic"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$filename=basename($_FILES["ppic"]["name"]);

// Check if file already exists
if (file_exists($target_file)) {
    echo "<script type=text/javascript>confirm('File already exists');window.location.href='../bleeeperusers/tabgroups/grpupload.php';</script>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["ppic"]["size"] > 2000000) {
    echo "<script type=text/javascript>confirm('File size is larger than 2MB');window.location.href='../bleeeperusers/tabgroups/grpupload.php';</script>";
    $uploadOk = 0;
}

// Allow certain file formats
if(
$imageFileType != "docx"  && 
$imageFileType != "txt"  && 
$imageFileType != "doc" ) {
	echo "<script type=text/javascript>confirm('Sorry, only DOCX, txt & DOC files are allowed');window.location.href='../bleeeperusers/tabgroups/grpupload.php';</script>";
    $uploadOk = 0;
}   

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
	} else {	
	
	if (move_uploaded_file($_FILES["ppic"]["tmp_name"], $target_file)) {
	
	$sql="INSERT INTO grp_msg_tb (group_id,sender_id,message_type,file_share,date_and_time) VALUES('$gid','$sid','file','$filename','$date1')";
	$query=mysqli_query($con,$sql);
	
	echo "<script type=text/javascript>confirm('Upload successful');window.location.href='../bleeeperusers/tabgroups/grpupload.php';</script>";
	
	
    echo "The file ". basename( $_FILES["ppic"]["name"]). " has been uploaded.";
	

    }else {
        echo "Sorry, there was an error uploading your file.";
    }
	}
	
?>