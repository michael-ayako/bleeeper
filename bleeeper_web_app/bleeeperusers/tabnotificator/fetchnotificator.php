<?php
if(!isset($con)){
include('../bleeeperphp/conn.php');
include('../bleeeperphp/time.php');
}
if(!isset ($_SESSION)){
session_start();
}


$q=0;
$rec=base64_decode($_SESSION['id']);
$sql="
SELECT * FROM notificator_tb WHERE
id_reciever='$rec' AND notification_state='2' ORDER BY DATE_AND_TIME DESC LIMIT 30";
$result=mysqli_query($con,$sql);
$notcount=mysqli_num_rows($result);
if($notcount>0){
?>
<div class="notificator_alert" style="font-size:smaller;color:#000000;">You have <?php echo $notcount ?> new notifications</div>
<?php
}else{
?>
<div class="notificator_msg" style="font-size:smaller;color:#000000;">You have no new notifications</div>
<?php
}
while($row=mysqli_fetch_array($result)){
if($q>=mysqli_num_rows($result)){
break;
}
else
{
$sen=$row['id_sender'];
$sql="SELECT * FROM profiling_tb WHERE id='$sen'";
$query=mysqli_query($con,$sql);    
$res=mysqli_fetch_array($query);


if($res['first_name']==NULL && $res['middle_name']==NULL && $res['last_name']==NULL)
$names=$res['username'];
else{
$names=$res['first_name']." ".$res['middle_name']." ".$res['last_name'];
}

$date2=$row['DATE_AND_TIME'];
$date1=not_ago($date2);
$notificatorid=$row['id'];
if($row['notification_type']=='1'){
    ?>
    <div id="notread"  onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">has accepted your your bleeeper buddy request</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    }
else if($row['notification_type']=='2'){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">has requested to be your new bleeeper buddy</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    }    
else if($row['notification_type']=='3' ){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">is now following you on bleeeper</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    } 
else if($row['notification_type']=='494'){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">has just blocked you</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    }
else if($row['notification_type']=='595'){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">has just unblocked you, you can now friend request them</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    } 
else if($row['notification_type']=='4'){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">has just rejected your friend request</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    } 
else if($row['notification_type']=='5'){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">has stopped following you</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    }
else if($row['notification_type']=='7'){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">has requested to join one of your groups</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    }
else if($row['notification_type']=='8'){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">has sent you a group invite</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    }
else if($row['notification_type']=='9'){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')" >
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">has accepted your group invite</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    }
else if($row['notification_type']=='696'){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">has denied your group invite</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    }
else if($row['notification_type']=='797'){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">has kicked you out of a group</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    }
else if($row['notification_type']=='10'){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">has allowed you to join group</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    }
else if($row['notification_type']=='11'){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">has left your group</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    }
else if($row['notification_type']=='12'){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">denied your group join request</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    }
else if($row['notification_type']=='13'){
    ?>
    <div id="notread" onMouseOut="removenotificator('<?php echo $notificatorid;?>')">
    <span id="notreadsender"><?php echo $names; ?></span>
    <span id="notreadmessage">is no longer friends with you</span><br/>
    <span id="notreadtime"><?php echo $date1; ?></span>
    </div>
    <?php
    }
$q++;
}
}

?>




