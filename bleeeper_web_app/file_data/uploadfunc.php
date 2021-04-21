<?php
session_start();
$id=base64_decode($_SESSION['id']);
include("../bleeeperphp/conn.php");
$date1=date("Y-m-d H:i:s");
$pid=array();

$sql="SELECT * FROM  ppic_tb WHERE user_id='$id' ORDER BY ID DESC LIMIT 1";
$qchck=mysqli_query($con,$sql);
while($state=mysqli_fetch_array($qchck)){
array_push($pid,$state['id']);
}
if(count($pid)==0){
mkdir($id);
$target_dir =$id.'/';
}else{
$target_dir =$id.'/';
}




$target_file = $target_dir . basename($_FILES["ppic"]["name"]);
$uploadOk = 1;
$filename=basename($_FILES["ppic"]["name"]);

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["ppic"]["tmp_name"]);
$filetype=$check["mime"] ;

// Check if file already exists
if (file_exists($target_file)) {
    echo "<script type=text/javascript>confirm('File already exists');window.location.href='../bleeeperusers/tabprofile/upload.php';</script>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["ppic"]["size"] > 1000000) {
    echo "<script type=text/javascript>confirm('File size is larger than 1MB');window.location.href='../bleeeperusers/tabprofile/upload.php';</script>";
    $uploadOk = 0;
}
// Allow certain file formats
if(
$imageFileType != "jpg" && 
$imageFileType != "png" && 
$imageFileType != "jpeg"&& 
$imageFileType != "gif" ) {
echo "<script type=text/javascript>confirm('Sorry, only JPG, JPEG, PNG & GIF files are allowed');window.location.href='../bleeeperusers/tabprofile/upload.php';</script>";

    $uploadOk = 0;
}
    

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {	
	
	if (move_uploaded_file($_FILES["ppic"]["tmp_name"], $target_file)) {
	
	$sql123="UPDATE ppic_tb SET ppic_state='2' WHERE user_id='$id'";
	$query123=mysqli_query($con,$sql123);
	$sql="INSERT INTO ppic_tb (user_id,ppic_link,ppic_state,file_type,date_and_time) VALUES('$id','$filename','1','$filetype','$date1')";
	$res = mysqli_query($con,$sql);
	echo "<script type=text/javascript>confirm('Upload successful');window.location.href='../bleeeperusers/tabprofile/upload.php';</script>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
	}
	
?>