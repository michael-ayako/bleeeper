<?php
session_start();
include('../bleeeperphp/conn.php');
?>
<html>
<head>
<title>Group file upload</title>
<link type="text/css" href="../bleeepercss/bleeeperstruct.css" rel="stylesheet"/>
<link type="text/css" href="../bleeepercss/bleeeperitem.css" rel="stylesheet"/>
<link type="text/css" href="../bleeepercss/bleeeperprofile.css" rel="stylesheet"/>

</head>
<body>

<div id="header" >
<div class="bleeepertitle">bleeeper</div>
</div> 

<div id="contentpane" style="margin-left:400px;margin-top:60px;">
<div id="profile-content" style="height:117px;">
<div class="titlename">Upload file here</div>

<div class="dataent"  >
<div class="credentials" style="margin-left:0px;">
<h1><span style="font-size:15px;">Select a file not more that  2 MB for upload allowed formats include(.docx, .doc and .txt)</span></h1>
<form method="POST" action="../../group_data/uploadfuncgroupdata.php" enctype="multipart/form-data" id="picupload"  style="margin-left:10px;">
<label>Picture upload: </label><input type="file" id="ppic" name="ppic" style="width:411px;" /><br/>
<input type="submit" name ="submit" value="Upload" id="close_button" style="margin-left:116px;margin-top:10px;" />
</form>
</div>
</div>
</div>
</body>
