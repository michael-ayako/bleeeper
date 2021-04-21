<?php
ob_start();
session_start();
?>
<div id="_load">
<div id="search_grp">
<label>Search:</label>
<input type="text" id="elementsearch" placeholder="Type a 'Group Name'..."  onKeyUp="funcmygroupsearch('elementsearch','groupsearchedresult');return false;" autofocus  autocomplete="on" />
</div>
<div id="groupsearchedresult">
<?php include("./loadmygroup.php"); ?>
</div>
</div>


