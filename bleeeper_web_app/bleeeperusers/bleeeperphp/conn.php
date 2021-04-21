<?php
$host="127.0.0.1";
$acct="root";
$passw="";
$dbname="private_db";
$con=mysqli_connect($host,$acct,$passw,$dbname)
		or die("Connection has not been established".mysqli_error($con));	
$url="https://android.googleapis.com/gcm/send";	
$api="AIzaSyA8yyeNnH0MoP_8iAq0hvCgBGS3TxyIGL0";
?>