<?php 
session_start();
if( !isset ($_SESSION['id'])  )
{
echo "<script type=text/javascript>confirm('You must login to proceed');window.location.href='../index.php';</script>";
}


include('./bleeeperphp/conn.php');
$headername=base64_decode($_SESSION['id']);
$sql="SELECT * FROM profiling_tb WHERE id = '$headername'";
$query=mysqli_query($con,$sql);
$res=mysqli_fetch_array($query);


if($res['first_name']==NULL && $res['middle_name']==NULL && $res['last_name']==NULL)
$nm=base64_decode($_SESSION['username']);
else{
$nm=$res['first_name']." ".$res['middle_name']." ".$res['last_name'];
}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo "Hi, ".$nm;?></title>
<link rel="shortcut icon" href="./bleeeperimg/bleeeper.png">
<link type="text/css" href="./bleeepercss/bleeeperstruct.css" rel="stylesheet"/>
<link type="text/css" href="./bleeepercss/bleeeperitem.css" rel="stylesheet"/>
<link type="text/css" href="./bleeepercss/bleeeperfriends.css" rel="stylesheet"/>
<link type="text/css" href="./bleeepercss/bleeeperprofile.css" rel="stylesheet"/>
<link type="text/css" href="./bleeepercss/bleeepersearch.css" rel="stylesheet"/>
<link type="text/css" href="./bleeepercss/bleeeperstatus.css" rel="stylesheet"/>
<link type="text/css" href="./bleeepercss/bleeepermessages.css" rel="stylesheet"/>
<link type="text/css" href="./bleeepercss/msg.css" rel="stylesheet"/>
<link type="text/css" href="./bleeepercss/bleeepernotificator.css" rel="stylesheet"/>
<link type="text/css" href="./bleeepercss/bleeepergroups.css" rel="stylesheet"/>
<link type="text/css" href="./bleeepercss/bleeeperanimations.css" rel="stylesheet"/>
<link type="text/css" href="./bleeepercss/bleeeperscrollbars.css" rel="stylesheet"/>
<script src="bleeeperajax/bleeepernav.js" language="javascript" async type="text/javascript"></script>
<script src="bleeeperajax/bleeeperprofile.js" language="javascript" async type="text/javascript"></script>
<script src="bleeeperajax/bleeepersearch.js" language="javascript" async type="text/javascript"></script>
<script src="bleeeperajax/bleeeperfriends.js" language="javascript" async type="text/javascript"></script>
<script src="bleeeperajax/bleeeperstatus.js" language="javascript" async type="text/javascript"></script>
<script src="bleeeperajax/bleeepermessages.js" language="javascript" async type="text/javascript"></script>
<script src="bleeeperajax/bleeepernotificator.js" language="javascript" async type="text/javascript"></script>
<script src="bleeeperajax/bleeepergrps.js" language="javascript" async type="text/javascript"></script>
<script src="bleeeperajax/bleeepersettings.js" language="javascript" async type="text/javascript"></script>
<script src="bleeeperajax/faq.js" language="javascript" async type="text/javascript"></script>

</head>

<body onload="loadsects()">

<div id="header" >
<div class="bleeepertitle"><img src="./bleeeperimg/bleeepertitle.png" height="50px"></div>
<div id="loadbar"></div>


<div class="searchbutt">
<form method="POST" action="<?php  $PHP_SELF;?>" enctype="multipart/form-data" id="search">
<label>Search:</label>
<input type="text" id="searchtab" onFocus="searchloadseg('./search.php' ,'contentpane');return false;" onKeyUp="searchbutt();return false;" placeholder="Search..." autocomplete="on" />
</form>
</div> 

<nav>
<ol>
<li><a href=""  onclick="loadseg('./profile.php' ,'contentpane');return false;">Profile</a></li>
<li><a href="" onclick="loadseg('./settings.php' ,'contentpane');return false;">Settings</a></li>
<li><a href=""  onclick="loadseg('./about.php' ,'contentpane');return false;">About us</a></li>
<li><a href=""  onclick="loadseg('./help.php' ,'contentpane');return false;">Help</a></li>
<li><a href="" onclick="loadseg('./FAQ.php' ,'contentpane');return false;">F.A.Q</a></li>
<li><a href=""  onclick="loadseg('./contacts.php' ,'contentpane');return false;">Contacts</a></li>
<li><a href="./bleeeperphp/logout.php">Logout</a></li>
</ol>
</nav>
</div>


<div id="freinds"></div>
<div id="notificator"></div>
<div id="contentpane"></div>
<div id="purplescreen"></div>
<div id="purplescreen2"></div>
<div id="msgdialog"></div>
<div id="tabmessages">
<div id="tabmessages-content">
</div>
</div>
<div id="tabgroupspopup">
<div id="tabgroupspopup-content"></div>
</div>
</body>
</html>