<link href="bleeepercss/bleeeperstruct.css" rel="stylesheet" type="text/css" media="screen">
<div id="bodystyle">
<div id="loginpane">
<form method="POST" action="<?php  $PHP_SELF;?>" enctype="multipart/form-data" onsubmit="faq();return false;">
<legend>Send us your views</legend>
<label>Email Address:</label><br/>
<input type="email" name="email" id="email" placeholder="Email..." required autofocus /><br/>
<label>Subject:</label><br/>
<input type="text" name="subj" id="subj" placeholder="Subject..." required /><br/>
<label>Complaints:</label><br/>
<textarea placeholder="Complaints..." id="txtdata" spellcheck="true" required ></textarea><br/>
<input type="button" value="Send" id="send" onclick="faq();return false;" style="margin-left:10px;">

</form>
</div>
<div id="content">
<h1>FAQ</h1>
<p>In this page post your problems or read past problems and we will be able yo get back to you as soon as possible. you can also post send us some of the improvements you wants us to implement on our website. Thank you for dedicating your time. Have a Nice day!</p>
<?php
include("./bleeeperphp/conn.php");
$sql15="SELECT * FROM faq_table  ORDER BY ID DESC LIMIT 20";
$query15=mysqli_query($con2,$sql15);
while($res2=mysqli_fetch_array($query15)){
?>
<tr>
<h3 ><?php echo $res2['subject']?></h3>
<p style="font-size:15px;"><?php echo "Complaint: ".$res2['complaint']?></p>
<p style="font-size:18px;">
<?php 
if($res2['respond']==NULL)
echo "Waiting for response";
else
echo "Reply from admin: ".$res2['respond'];
?></p>
<p style="font-size:10px;"><?php echo $res2['email']?></p>

<?php
}
?>

</div>