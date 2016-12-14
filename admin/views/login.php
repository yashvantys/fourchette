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
	
 <div id="login-page">
        <div class="container">
        
                <form class="form-login" name="myform" id="myfrom" action="index.php?option=com_login"  method="post">
                <h2 class="form-login-heading">sign in now</h2>
                <div class="login-wrap">
                    <!--input type="text" class="form-control" placeholder="User ID" autofocus-->
                    <input type="text" class="form-control" placeholder="Username" name="chrUserName" id="chrUserName" required autofocus>
                    <br>
                    <!--input type="password" class="form-control" placeholder="Password"-->
                    <input type="password" class="form-control" placeholder="Password" name="chrPassword" id="chrPassword" required>
                    <label class="checkbox">
                        <!--span class="pull-right">
                            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
        
                        </span-->
                    </label>
                    <!--button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button-->
                    <input type="submit" class="btn btn-theme btn-block" value="Login" name="submit" >
                    <hr>
                    
                    <div class="login-social-link centered">
                    <p>Fourchette @ 2016</p>
                        
                    </div>
                    
        
                </div>
        
                  <!-- Modal -->
                  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Forgot Password ?</h4>
                              </div>
                              <div class="modal-body">
                                  <p>Enter your e-mail address below to reset your password.</p>
                                  <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
        
                              </div>
                              <div class="modal-footer">
                                  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                  <button class="btn btn-theme" type="button">Submit</button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- modal -->
        
              </form>       
        <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
        </div>
      </div>