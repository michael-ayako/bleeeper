<link href="bleeepercss/bleeeperstruct.css" rel="stylesheet" type="text/css" media="screen">
<div id="bodystyle">
<div id="loginpane">
<form method="POST" action="<?php  $PHP_SELF;?>" enctype="multipart/form-data" onsubmit="logincheck();return false;"id="loginform">
<legend>Login</legend>
<div id='err' style="display:none"></div>
<label>Username or Email Address:</label><br/>
<input type="text" name="code" id="code" placeholder="Email or Username..." required autofocus/><br/>
<label>Password:</label><br/>
<input type="password" name="pass" id="pass"placeholder="Password..."  maxlength="16"/><br/>
<input type="submit" value="Login" id="login" name="login" />

</form>
</div>
<div id="content">
<img src="bleeeperimg/img001.png" width="800px" height="400px;" alt="Bleeeper" class="welcomephoto"/><br/>
</div>
</div>