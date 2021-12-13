<?php 
require_once("libs/session.php");
require_once("libs/connect.php");
?>

<?php if($_POST["myaction"]=="datalist"){?>
  <form action="" method="post" name="myForm" id="myForm">
    <input name="myaction" type="hidden" id="myaction" value="" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST["module_pageshow"]?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST["module_pagesize"]?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST["module_orderby"]?>" />
    <input name="module_adesc" type="hidden" id="module_adesc" value="<?php echo $_REQUEST["module_adesc"]?>" /> 
      
    <?php
      $sql = "SELECT * FROM md_member WHERE account_id ='".$_SESSION["front_session_sys_id"]."'";
      $Query = $mysqli->query($sql);
      $Row=$Query->fetch_array();
    ?>
    <br><br><br>
    <div class="content">
      <div class="row">
        <div class="col-md-8">
          <div class="card h-100">
            <div class="card-header">
              <h5 class="title text-primary">Edit Profile</h5>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="text-primary">Username</label>
                          <input type="text" class="form-control" placeholder="Username"  id="username" name="username" value="<?php echo $Row['account_username'] ?>" disabled readonly/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="text-primary">First Name</label>
                          <input type="text" class="form-control" placeholder="First Name"  id="fname" name="fname" value="<?php echo $Row['account_fname'] ?>" readonly/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="text-primary">Last Name</label>
                          <input type="text" class="form-control" placeholder="Last Name" id="lname" name="lname"   value="<?php echo $Row['account_lname'] ?>" readonly/>
                      </div>
                  </div>

                  <div class="col-md-3">
                      <div class="form-group">
                          <label class="text-primary">Nickname</label>
                          <input type="text" class="form-control" placeholder="Nickname" id="nickname" name="nickname"  value="<?php echo $Row['account_nickname'] ?>" readonly/>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <label class="text-white">* Phone</label>
                          <input type="text" class="form-control" placeholder="Phone" id="phone" name="phone"   value="<?php echo $Row['account_phone'] ?>" onkeyup="myFunction()" readonly/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="text-primary">Email address</label>
                          <input type="email" class="form-control" placeholder="Email"  id="email" name="email"   value="<?php echo $Row['account_email'] ?>" readonly/>
                      </div>
                  </div>
              
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="text-primary">Line</label>
                          <input type="text" class="form-control" placeholder="Line" id="line" name="line"  value="<?php echo $Row['account_line'] ?>" readonly/>
                      </div>
                  </div> 
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="text-primary">Metamask Wallet</label>
                          <input type="text" class="form-control" placeholder="Metamask Wallet"  id="metamask" name="metamask"  value="<?php echo $Row['metamask_wallet'] ?>" readonly/>
                      </div>
                  </div>
              
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="text-primary">Binance Wallet</label>
                          <input type="text" class="form-control" placeholder="Binance Wallet"   id="binance" name="binance"  value="<?php echo $Row['binance_wallet'] ?>" readonly/>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="text-primary">เลขบัญชี (กรณีโอนเป็นเงินสด)</label>
                          <input type="text" class="form-control" placeholder="เลขบัญชี" id="banknumber" name="banknumber" value="<?php echo $Row['bank_number'] ?>" readonly/>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-user h-100">
            <div class="image">
              <!-- <img src="../assets/img/bg5.jpg" alt="..."> -->
            </div>
            <div class="card-body">
              <div class="author">
               
                  <center><div id="profileImage"></div></center>
                  <h5 class="title text-primary" id="firstName" style="display:inline"><?php echo $Row['account_fname'] ?> </h5> <h5 class="title text-primary" id="lastName" style="display:inline"><?php echo $Row['account_lname'] ?></h5>
               
                <p class="description"> <br>
                  <?php echo $Row['account_email'] ?>
                </p>
              </div>
              <!-- <p class="description text-center">
                "Lamborghini Mercy <br>
                Your chick she so thirsty <br>
                I'm in that two seat Lambo"
              </p> -->
            </div>
            <hr>
            <div class="button-container">
              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                <i class="fab fa-facebook-f"></i>
              </button>
              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                <i class="fab fa-twitter"></i>
              </button>
              <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                <i class="fab fa-google-plus-g"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>


<?php }else if($_POST["myaction"]=="insert"){?>
    <?php
       
    ?>

<?php }else if($_POST["myaction"]=="update"){?>
    <?php
      
    ?>


<?php }else if($_POST["myaction"]=="delete"){?>
    <?php
     
    ?>

 
<?php } ?>

<script>
  $(document).ready(function(){
  var firstName = $('#firstName').text();
  var lastName = $('#lastName').text();
  var intials = firstName.charAt(0) + lastName.charAt(0);
  var profileImage = $('#profileImage').text(intials);
});
</script>

<style>
  #profileImage {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: #512DA8;
  font-size: 40px;
  color: #fff;
  text-align: center;
  line-height: 100px;
  margin: 20px 0;
}
</style>