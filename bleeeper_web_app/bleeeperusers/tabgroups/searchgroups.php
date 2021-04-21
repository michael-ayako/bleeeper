<?php
ob_start();
session_start();
?>
<div id="groups-pane-content">
<div id="search_grp">
<label>Search:</label>
<input type="text" id="elementsearch" placeholder="Type a 'Group Name'..."  onKeyUp="funcgroupsearch('elementsearch','groupsearchedres');return false;" autofocus  autocomplete="on" />
</div>
<div id="groupsearchedres">
<div class='success' >Type a group name to find a group</div>
</div>
</div>