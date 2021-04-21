<?php
ob_start();
session_start();
?>
<div id="friendspane">
<div class="navbar-friends">
<ol>
<a href="" onclick="loadseg('./tabfriends/friendlist.php' ,'friends-content');return false;"><li>Bleeep Buddies</li></a>
<a href="" onclick="loadseg('./tabfriends/friendrequest.php' ,'friends-content');return false;"><li>Friend Request</li></a>
<a href="" onclick="loadseg('./tabfriends/following.php' ,'friends-content');return false;"><li>Following</li></a>
<a href="" onclick="loadseg('./tabfriends/follower.php' ,'friends-content');return false;"><li>Followers</li></a>
</ol>
</div>
<div id="friends-content">
<?php

		$userspage = @$_GET['friend'];
			switch($userspage){
				case 'Friend List':
				    include('./tabfriends/friendlist.php');
				    break;
				
				case 'Friend Request':
				    include('./tabfriends/friendrequest.php');
					break;
                    
				case 'Following':
					include('./tabfriends/following.php');
					break;
                    
                case 'Followers':
                    include('./tabfriends/follower.php');
                    break;
                    
                    default:
					include('./tabfriends/friendlist.php');
				    break;
            }
?>

</div>
<br/><br/><br/>
</div>