<!-- main header @s -->
<?php 
session_start();
// include 'libs/session.php';
include 'include_head.php';
?>


    <!-- content @s -->
    <div class="center"> 
        <div class="card text-white" style="background-color: #000;border-radius: 12px;">
                <div class="card-body">

                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Sign-In</h4>
                                    <div class="nk-block-des">
                                        <p>Access the panel using your Username and Password.</p>
                                    </div>
                                </div>
                            </div>
                            <form action="auth-login.php" method="POST">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label text-white" for="inputUser">Username</label>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" id="inputUser" name="inputUser" placeholder="Enter your username" required>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group ">
                                        <label class="form-label text-white" for="inputPass">Password</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="inputPass">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" class="form-control form-control-lg" id="inputPass" name="inputPass" placeholder="Enter your Password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                                </div>
                            </form>
                            <br>
                            <center>
                            <p>ยังไม่มีบัญชีใช่ไหม? <a href="register.php" ><b> Sign up</b></a></p>
                            </center>
                            <br>
                            </div>
                </div>         
            </div> 
    </div>
    
<style>
.center {
  margin: auto;
  width: 50%;
  padding: 100px;
}
body {background-color: #f96332;}
/* Responsive columns */
@media screen and (max-width: 600px) {
    .center {
        margin: auto;
        width: 80%;
        padding: 150px 0px;
    }
}
</style>