<?php
//registering a new user
include('./conn.php');
$x="";
$date1=date("Y-m-d H:i:s");
$email=$_POST['email'];
$uname=$_POST['uname'];
$pass=MD5($_POST['pass']);
$cpass=MD5($_POST['cpass']);
$cod=NULL;

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$cod=3;
	$x='err';
}

if (!preg_match("/^[a-zA-Z0-9]*$/",$uname)) {
	$cod=3;
	$x='err';
}

$email=$_POST['email'];
$sql="SELECT * FROM profiling_tb WHERE email = '$email'";
$posta = mysqli_query($con,$sql);
while($row=mysqli_fetch_array($posta)){
if($email==($row['email']) ){
$cod=3;
$x='err';
break;
}
}

$uname=$_POST['uname'];
$sql="SELECT * FROM profiling_tb WHERE username = '$uname'";
$posta = mysqli_query($con,$sql);
while($row=mysqli_fetch_array($posta)){
if($uname==($row['username']) ){
$cod=3;
$x='err';
break;
}
}

if(($_POST['pass'])!=($_POST['cpass']) ){
$x='err';
$cod=3;
}

if(strlen($_POST['pass']) < 5){
$x='err';
$cod=4;
}

if(strlen($_POST['uname']) < 5){
$x='err';
$cod=3;
}

if($x!='err'){
$sql="INSERT INTO profiling_tb (email,username,password,date)VALUES('$email','$uname','$pass','$date1')";
$res = mysqli_query($con,$sql);

$cod=5;
}

echo $cod;
   
?>