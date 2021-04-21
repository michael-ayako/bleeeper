<?php
    // Get image string posted from Android App
	include("../bleeeperphp/conn.php");
	$id=$_POST['id'];
    $base=$_POST['image'];
	$pid=array();
	$date1=date("Y-m-d H:i:s");
    // Get file name posted from Android App
    $filename = $_POST['filename'];
	
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
	

    // Decode Image
	$binary=base64_decode($base);
    header('Content-Type: bitmap; charset=utf-8');
    $file = fopen($id.'/'.$filename, 'wb');
    fwrite($file, $binary);
    fclose($file);
	
	$sql123="UPDATE ppic_tb SET ppic_state='2' WHERE id='$id'";
	$query123=mysqli_query($con,$sql123);
	$sql="INSERT INTO ppic_tb (user_id,ppic_link,ppic_state,file_type,date_and_time) VALUES('$id','$filename','1','android','$date1')";
	$res = mysqli_query($con,$sql);
	
?>