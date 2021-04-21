<?php
include('./conn.php');
$uname=$_POST['uname'];
$cod=0;

if (!preg_match("/^[a-zA-Z0-9]*$/",$uname)) {
$cod=1;
}else
{
$sql="SELECT * FROM profiling_tb WHERE username = '$uname'";
$posta = mysqli_query($con,$sql);
while($row=mysqli_fetch_array($posta)){
if($uname==($row['username']) ){
$cod=2;
break;
}
}
}

if(strlen($uname) < 5){
$x='err';
$cod=3;
}
echo $cod;
?>