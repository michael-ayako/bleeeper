<?php
$host="127.0.0.1";
$acct="root";
$passw="";
$dbname="private_db";
$dbnameadmin="admin_db";
$con=mysqli_connect($host,$acct,$passw,$dbname)
		or die("Connection has not been established");		
$con2=mysqli_connect($host,$acct,$passw,$dbnameadmin)
		or die("Connection has not been established");
?>