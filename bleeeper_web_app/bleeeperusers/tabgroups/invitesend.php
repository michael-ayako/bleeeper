<?php
ob_start();
session_start();
?>
<div id="_load">
<div id="search_grp" style="margin-left:46px;">
<label>Search:</label>
<input type="text" id="invitesearch" placeholder="Type a 'Username, E-mail or Name of person'..."  onKeyUp="funcmyinvite('invitesearch','invitesearchresult',<?php echo $_POST['grpid'];?>);return false;" autofocus  autocomplete="on" />
</div>
<div id="invitesearchresult">

</div>
</div>


