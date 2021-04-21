<div class="bleeepertitle">bleeeper.Com</div>
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
<li><a href="./bleeeperphp/logout.php">Logout</a></li>
</ol>
</nav>
