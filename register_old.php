<?php
session_start();
 
?>
 
<?php include 'include_head.php';?>


    
 
                     
        
    <div class="col-lg-6 col-sm-12 col-pad-0 align-self-center">
        <div class="login-inner-form">
            <div class="details">
                <h3><?php echo $txt_mod["regis:sub"]; ?></h3>
                <form action="register_action.php" name="register" id="register" method="post">

                    <div class="modal fade" tabindex="-1" id="loadmodal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" id="loadmodalcontent"> 
                            </div>
                        </div>
                    </div> 

                    <?php if(!empty($_REQUEST['iba'])){ ?>
                        <input type="hidden" name="ib_account" value="<?php echo $_REQUEST['iba']?>">
                    <?php } ?>
                    <div class="form-group">
                        <input type="text" name="usr" id="usr" minlength="6" maxlength="15" class="input-text" placeholder="<?php echo $txt_mod["regis:username"]?>" autocomplete="off" required onkeyup="checkengusername()">
                        <span id="errorusr" style="color: red;"></span>
                    </div>   
                    <div class="form-group">
                        <input type="password" name="pwd" id="pwd" minlength="6" class="input-text" placeholder="<?php echo $txt_mod["regis:pass"] ?>" autocomplete="off" required>
                        <span id="errorpass" style="color: red;"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="names" id="names" class="input-text" placeholder="<?php echo $txt_mod["regis:name"] ; ?>" autocomplete="off" required onkeyup="checkengnames()">
                    </div>
                    <div class="form-group">
                        <input type="text" name="lname" id="lname" class="input-text" placeholder="<?php echo $txt_mod["regis:lname"]; ?>" autocomplete="off" required onkeyup="checkenglname()">
                    </div>
                    <div class="form-group">
                        <input type="text" name="mobile" id="mobile" class="input-text" placeholder="<?php echo $txt_mod["regis:phone"]; ?>" autocomplete="off" required onkeypress="checkNumber()">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="input-text" placeholder="<?php echo $txt_mod["regis:email"]; ?>" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <script> // กำหนดปุ่มเป็น disable ไว้ ต้องทำ reCHAPTCHA ก่อนจึงกดได้
                        function makeaction(){
                                document.getElementById('submit1').disabled = false;  
                        }
                        </script>
                        <div class="g-recaptcha" data-callback="makeaction" data-sitekey="6LcYcLAZAAAAAEg1j316D00Z5rgSE4K5VEI5H7_T"></div>
                    </div>
                    
                    <div class="custom-control custom-control-sm ">
                        <input type="checkbox" class="custom-control-input" id="customCheck7" required>
                        <label class="custom-control-label" for="customCheck7">
                            <?php echo $txt_mod["regis:accept"]; ?> <a href="https://member.fxtrb.com/TermsAndConditions.pdf" target="_blank" class="terms"><?php echo $txt_mod["regis:require"]; ?></a>
                        </label>
                    </div>
                    <br><br>
                    

                    <!-- <div class="checkbox clearfix">
                    
                        <div class="form-check checkbox-theme">
                            <input class="form-check-input" type="checkbox" value="" id="checkbox-signup" autocomplete="off" required>
                            <label class="form-check-label" for="checkbox-signup" id="checkbox-signuperror">
                                <?php echo $txt_mod["regis:accept"]; ?> <a href="https://member.fxtrb.com/TermsAndConditions.pdf" target="_blank" class="terms"><?php echo $txt_mod["regis:require"]; ?></a>

                            </label>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block"><?php echo $txt_mod["regis:sub"] ; ?></button>
                    </div>
                </form>
                <p><?php echo $txt_mod["regis:haveacc"] ; ?> <a href="signin.php" style="color:#0f3f6f"><b><?php echo $txt_mod["regis:login"] ; ?></b></a></p>
            </div>
        </div>
    </div>

            
         
     
    <?php include 'include_footer.php';?>    
    <!-- app-root @e -->
    <!-- JavaScript -->
    <?php include 'include_foot.php';?>
