<link type="text/css" href="bleeepercss/bleeeperstruct.css" rel="stylesheet" media="screen"/>
<div id="bodystyle">
<div id="loginpane">
<form name='registerform' id="registerform" method='POST' action="<?php $PHP_SELF?>" enctype="multipart/form-data" onsubmit="reg();return false;">
<legend>Sign up</legend><br/>
<div id='crr' style="display:none"></div>
<label>E-mail Address:</label><br/>
<input type="email" name="email" id= "email"placeholder="Email..." required autofocus onBlur="liveemailcheck();return false;" onChange="liveemailcheck();return false;"  /><br/>
<div id='err1' style="display:none"></div>

<label>Username:</label><br/>
<input type="text" name="uname" id="uname"placeholder="Username..." required  maxlength="15" onBlur="liveunamecheck();return false;" onChange="liveunamecheck();return false;" /><br/>
<div id='err2' style="display:none"></div>

<label>Password:</label><br/>
<input type="password" name="pass" id="pass" placeholder="Password..." required  maxlength="16" /><br/>
<div id='err3' style="display:none"></div>

<label>Confirm Password:</label><br/>
<input type="password" name="cpass" id="cpass" placeholder="Confirm Password..." required maxlength="16" onKeyUp="livepasswordcheck();return false;" /><br/>
<div id='err4' style="display:none"></div>

<input type="submit" value="Sign up" id="register" name="register"/>
<div id='crr' style="display:none"></div>




</form>
</div>
<div id="content">
<img src="bleeeperimg/img001.png" width="800px" height="400px;" alt="bleeeper" class="welcomephoto"/><br/>
</div>


</div>