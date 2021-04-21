<?php
ob_start();
session_start();
?>
<div id="group-content">
<div class="navbar-friends">
<ol>
<a href="" onclick="loadseg('./tabgroups/mygroups.php' ,'groups-pane');return false;"><li> My Bleeeper Groups</li></a>
<a href="" onclick="loadseg('./tabgroups/creategroup.php' ,'groups-pane');return false;"><li>Create new Group</li></a>
<a href="" onclick="loadseg('./tabgroups/searchgroups.php' ,'groups-pane');return false;"><li>Search Groups</li></a>
<a href="" onclick="loadseg('./tabgroups/managemygroups.php' ,'groups-pane');return false;"><li>Manage Groups</li></a>
<a href="" onclick="loadseg('./tabgroups/grpinvites.php' ,'groups-pane');return false;"><li>Group Invites</li></a>
</ol>
</div>
<div id="group-body">
<div id="groups-pane">

<?php

		$userspage = @$_GET['friend'];
			switch($userspage){
				case 'My groups':
				    include('./tabgroups/mygroups.php');
				    break;
				
				case 'Search Groups':
				    include('./tabgroups/searchgroups.php');
					break;
                    
				case 'Create new Group':
					include('./tabgroups/creategroup.php');
					break;
                    

                    
                    default:
					include('./tabgroups/mygroups.php');
				    break;
            }
?>

</div>
</div>
</div>
