<?php
$file=base64_decode($_GET['thread']);
$name=$_GET['name'];
header("Content-Description: File Transfer"); 
header("Content-Type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=\"$name\""); 
readfile($file);
?>