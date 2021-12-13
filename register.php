<!-- main header @s -->
<?php include 'include_head.php';;?>


    <!-- content @s -->
    <div class="center"> 
        <div class="card text-white" style="background-color: #000;border-radius: 12px;">
                <div class="card-body">

                            
                            </div>
                                <form action="" method="POST">
                                    <div class="col-md-12"> 
                                        <div class="nk-block-head">
                                            
                                            <h4 class="nk-block-title">Register</h4>
                                            <div class="nk-block-des">
                                                <p>* Username ของท่านคือเบอร์โทรศัพท์ ที่ท่านได้ทำการลงทะเบียน</p>
                                            </div>
                                        

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="text-white">Username</label>
                                                        <input type="text" class="form-control" placeholder="Username" disabled id="username" require/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="text-white">Password</label>
                                                        <input type="Password" class="form-control" placeholder="Password" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-white">First Name</label>
                                                        <input type="text" class="form-control" placeholder="First Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-white">Last Name</label>
                                                        <input type="text" class="form-control" placeholder="Last Name"  />
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-white">Nickname</label>
                                                        <input type="text" class="form-control" placeholder="Nickname" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="text-white">* Phone</label>
                                                        <input type="text" class="form-control" placeholder="Phone" id="phone" onkeyup="myFunction()" require/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-white">Email address</label>
                                                        <input type="email" class="form-control" placeholder="Email" />
                                                    </div>
                                                </div>
                                        
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-white">Line</label>
                                                        <input type="text" class="form-control" placeholder="Line" />
                                                    </div>
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-white">Metamask Wallet</label>
                                                        <input type="text" class="form-control" placeholder="Metamask Wallet" />
                                                    </div>
                                                </div>
                                            
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-white">Binance Wallet</label>
                                                        <input type="text" class="form-control" placeholder="Binance Wallet" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-white">เลขบัญชี (กรณีโอนเป็นเงินสด)</label>
                                                        <input type="text" class="form-control" placeholder="เลขบัญชี" />
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="custom-control custom-control-sm ">
                                                <input type="checkbox" class="custom-control-input" id="customCheck7" required>
                                                <label class="custom-control-label text-white" for="customCheck7">
                                                ฉันเข้าใจและยอมรับ  <a href="#" >ข้อกำหนดและเงื่อนไข</a>
                                                </label>
                                            </div>
                                            <br>
                                       
                                        <div class="form-group">
                                            <button class="btn btn-lg btn-primary btn-block">Sign up</button>
                                        </div>
                                    </div>
                                </form>
                                <br>
                                <center>
                                <p>มีบัญชีอยู่แล้ว? <a href="login.php" ><b> Sign in</b></a></p>
                                </center>
                                <br>
                            </div>
                </div>         
            </div> 
    </div>
    
<script>
    function myFunction() {
        var x = document.getElementById("phone").value;
        document.getElementById("username").value=x;
    }
</script>

<style>
.center {
  margin: auto;
  width: 70%;
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