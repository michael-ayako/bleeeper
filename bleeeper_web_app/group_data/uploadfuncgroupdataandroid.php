<?php
include("../bleeeperphp/conn.php");
$sid=$_POST['sid'];
$gid=$_POST['gid'];
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


$target_file = $target_dir . basename($_FILES["uploaded_file"]["name"]);
$filename=basename($_FILES["uploaded_file"]["name"]);

if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_file)) {
	
	$sql="INSERT INTO grp_msg_tb (group_id,sender_id,message_type,file_share,date_and_time) VALUES('$gid','$sid','file','$filename','$date1')";
	$query=mysqli_query($con,$sql);
	
	echo "<script type=text/javascript>confirm('Upload successful');window.location.href='../bleeeperusers/tabgroups/grpupload.php';</script>";
	
	
    echo "The file ". basename( $_FILES["ppic"]["name"]). " has been uploaded.";
    }else {
        echo "Sorry, there was an error uploading your file.";
    }
	
?>