<?php
$userObj->userAuthentication();
if($_POST['submit']=="Login")
{
//print_r($_POST); exit;
     $logincheck=$userObj->checkAdmin();
}

if($_POST['forgot']=='Submit') {
//print_r($_POST); exit;
 $forgotpwd=$userObj->forgotpwd($_POST);
}
?>
<script>
function getforgotpwd(a) {

document.getElementById('forgotpassword').style.display='block';
document.getElementById('loginform').style.display='none';
}

function getsignin(b) {
document.getElementById('forgotpassword').style.display='none';
document.getElementById('loginform').style.display='block';
}
</script>
	
 <div class="login_wrap">
    	<div class="mid_login">
        	<div class="login_blg">
            	<h1>cheapsleepingpills</h1>
                <div class="sign_blg" id="loginform">	
                	<h2>Sign in to access this admin</h2>
                    <form name="myform" id="myfrom" action="index.php?option=com_login"  method="post">
                        <input type="text"  placeholder="Username" name="chrUserName" id="chrUserName" required>
                        <input type="password"  placeholder="Password" name="chrPassword" id="chrPassword" required>
                        <input type="submit" value="Login" name="submit" >
                        <!--<input type="checkbox">-->
                    </form>
                    <!--<span>Remember</span>
                    <b><a href="#" onclick="getforgotpwd('forgot')">Forgot Password?</a></b>-->
                </div><!--sign_blg-->
				
				
				<div class="sign_blg" id="forgotpassword" style="display:none">	
                	<h2>Enter the Email ID with which you are registered on admin</h2>
                    <form name="forgotpwd" id="forgotpwd" action="index.php?option=com_login"  method="post">
                        <input type="text"  placeholder="email" name="email" id="email" required pattern="[^ @]*@[^ @]*">
                        <input type="submit" value="Submit" name="forgot" >
                        <input type="checkbox">
                    </form>
                    <span>Remember</span>
                    <b><a href="#" onclick="getsignin('signin')">Sign In</a></b>
                </div>
				
                <div class="creat_acc">
                	<p>2015 &copy; cheapsleepingpills.</p>
                </div><!--creat_acc-->	
                <div class="copy_wrt">
                	 
                </div><!--copy_wrt-->
            </div><!--login_blg-->
        </div><!--mid_login-->
    </div><!--login_wrap-->