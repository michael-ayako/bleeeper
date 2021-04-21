<?php
include("../bleeeperphp/conn.php");
include("./bleeeperphp/time.php");
$code=base64_decode($_SESSION['id']);

$sql="SELECT * FROM profiling_tb WHERE id = '$code'";
$res = mysqli_query($con,$sql);
$fetch=mysqli_fetch_array($res);

$fname=$fetch["first_name"];
$mname=$fetch["middle_name"];
$lname=$fetch["last_name"];
$dob=$fetch["date_of_birth"];
$dor1=$fetch["date"];
$gen=$fetch["gender"];
$count=$fetch["country"];
$proffesion=$fetch["proffesion"];

$dor=prof_ago($dor1);

$tfname=$fname;
$tmname=$mname;
$tlname=$lname;


if($fname==NULL){
    $fname="Add";
    }
if($mname==NULL){
    $mname="Add";
}
if($lname==NULL){
    $lname="Add";
}
if($dob==NULL){
    $dob="Add";
}
if($gen==NULL){
    $gen="Add";
}
if($count==NULL){
    $count="Add";
}
if($proffesion==NULL){
    $proffesion="Add";
}




?>