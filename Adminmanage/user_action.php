<?php 
require_once("libs/session.php");
require_once("libs/connect.php");
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php if($_POST["myaction"]=="datalist"){?>
  <form action="" method="post" name="myForm" id="myForm">
    <input name="myaction" type="hidden" id="myaction" value="" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST["module_pageshow"]?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST["module_pagesize"]?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST["module_orderby"]?>" />
    <input name="module_adesc" type="hidden" id="module_adesc" value="<?php echo $_REQUEST["module_adesc"]?>" /> 
      
    <?php
      $sql = "SELECT * FROM md_member WHERE 1 ";
      $Query = $mysqli->query($sql);
    ?>
    <div calss="mt-5"></div>
      <div class="content mt-5">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">รายชื่อสมาชิก</h4>
                <div  align='right' > 
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAdd" >ADD</button>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th style="font-size: 15px; text-align: center; " > <b> User Name </b> </th>
                      <th style="font-size: 15px; text-align: center;" > <b> Name </b></th>
                      <th style="font-size: 15px; text-align: center;" > <b> tel </b></th>
                      <th style="font-size: 15px; text-align: center;" > <b> Email </b></th>
                      <th style="font-size: 15px; text-align: center;" > <b> Line </b></th>
                      <th style="font-size: 15px; text-align: center;" > <b> Metamask Wallet </b></th>
                      <th style="font-size: 15px; text-align: center;" > <b> Binance coin Wallet </b></th>
                      <th> </th>

                    </thead>
                    <tbody>
                     <?php while($Row=$Query->fetch_array()){ ?>
                      <tr>
                        <td style="font-size: 13px;" ><?php echo $Row['account_username']; ?></td>
                        <td style="font-size: 13px;"><?php echo $Row['account_fname'].' '.$Row['account_lname']; ?></td>
                        <td style="font-size: 13px;"><?php echo $Row['account_phone']; ?></td>
                        <td style="font-size: 13px;"><?php echo $Row['account_email']; ?></td>
                        <td style="font-size: 13px;"><?php echo $Row['account_line'] ?></td>
                        <td style="font-size: 13px;"><?php echo $Row['metamask_wallet']; ?></td>
                        <td style="font-size: 13px;"><?php echo $Row['binance_wallet']; ?></td>
                        <td >
                          <div >

                             <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $Row['id']; ?>" >Edit</button>
                          <button type="button" class="btn btn-outline-danger btn-sm" onclick = "modDelete(<?php echo $Row['id'] ?>)">Delete</button>
                          </div>
                       
                        </td>
                
                      </tr>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModal<?php echo $Row['id']; ?>">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">แก้ไขข้อมูล :<?php echo ' '.$Row['id']; ?></h4>
                                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body">
                                  <div class="col-md-12"> 
                                      <div class="nk-block-head">
                                       
                                          <input type="hidden" class="form-control" placeholder="Username"  id="id<?php echo $Row['id']; ?>" name="id<?php echo $Row['id']; ?>" />


                                          <div class="row">
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label class="text-white">Username</label>
                                                      <input type="text" class="form-control" placeholder="Username"  id="editUsername<?php echo $Row['id']; ?>" name="editUsername<?php echo $Row['id']; ?>" value = "<?php echo $Row['account_username']; ?>" require/>
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label class="text-white">Password</label>
                                                      <input type="Password" class="form-control" placeholder="Password" id="editPassword<?php echo $Row['id']; ?>" name="editPassword<?php echo $Row['id'];  ?>" value = "<?php echo $Row['account_password']; ?>" />
                                                  </div>
                                              </div>

                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="text-white">First Name</label>
                                                      <input type="text" class="form-control" placeholder="First Name" id="editfname<?php echo $Row['id']; ?>" name="editfname<?php echo $Row['id']; ?>" value = "<?php echo $Row['account_fname']; ?>" />
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="text-white">Last Name</label>
                                                      <input type="text" class="form-control" placeholder="Last Name" id="editlname<?php echo $Row['id']; ?>" name="editlname<?php echo $Row['id']; ?>"  value = "<?php echo $Row['account_lname']; ?>" />
                                                  </div>
                                              </div>

                                              <div class="col-md-3">
                                                  <div class="form-group">
                                                      <label class="text-white">Nickname</label>
                                                      <input type="text" class="form-control" placeholder="Nickname" id="editNname<?php echo $Row['id']; ?>" name="editNname<?php echo $Row['id']; ?>" value = "<?php echo $Row['account_nickname']; ?>" />
                                                  </div>
                                              </div>
                                              <div class="col-md-3">
                                                  <div class="form-group">
                                                      <label class="text-white">* Phone</label>
                                                      <input type="text" class="form-control" placeholder="Phone"  id="editPhone<?php echo $Row['id']; ?>" name="editPhone<?php echo $Row['id']; ?>" value = "<?php echo $Row['account_phone']; ?>" onkeyup="myFunction1()" require/>
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="text-white">Email address</label>
                                                      <input type="email" class="form-control" placeholder="Email" id="editEmail<?php echo $Row['id']; ?>" name="editEmail<?php echo $Row['id']; ?>" value = "<?php echo $Row['account_email']; ?>"  />
                                                  </div>
                                              </div>
                                      
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label class="text-white">Line</label>
                                                      <input type="text" class="form-control" placeholder="Line" id="editLine<?php echo $Row['id']; ?>" name="editLine<?php echo $Row['id']; ?>" value = "<?php echo $Row['account_line']; ?>"  />
                                                  </div>
                                              </div> 
                                              <?php $supperAdmin = 0; if($_SESSION["core_session_sys_level"] == 'Supperadmin'){ $supperAdmin = 1; ?>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-white">Metamask Wallet</label>
                                                        <input type="text" class="form-control" placeholder="Metamask Wallet" id="editMwallet<?php echo $Row['id']; ?>" name="editMwallet<?php echo $Row['id']; ?>" value = "<?php echo $Row['metamask_wallet']; ?>" />
                                                    </div>
                                                </div>
                                            
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-white">Binance Wallet</label>
                                                        <input type="text" class="form-control" placeholder="Binance Wallet" id="editBwallet<?php echo $Row['id']; ?>" name="editBwallet<?php echo $Row['id']; ?>" value = "<?php echo $Row['binance_wallet']; ?>"  />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-white">เลขบัญชี (กรณีโอนเป็นเงินสด)</label>
                                                        <input type="text" class="form-control" placeholder="เลขบัญชี" id="editBank<?php echo $Row['id']; ?>" name="editBank<?php echo $Row['id']; ?>" value = "<?php echo $Row['bank_number']; ?>"  />
                                                    </div>
                                                </div>
                                              <?php }?>
                                          </div>
                                          <br>
                                    
                                      <!-- <div class="form-group">
                                          <button class="btn btn-lg btn-primary btn-block">Sign up</button>
                                      </div> -->
                                  </div>
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal" onclick="editUser(<?php echo $Row['id']; ?>,<?php echo $supperAdmin ;?>)">Submit</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>

                            </div>
                          </div>
                        </div>
                    <?php  } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- The Modal ADD -->
          <div class="modal fade" id="modalAdd">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">เพิ่มสามชิก</h4>
                  <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-md-12"> 
                        <div class="nk-block-head">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-white">Username</label>
                                        <input type="text" class="form-control" placeholder="Username"  id="addName" name="addName" require/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-white">Password</label>
                                        <input type="Password" class="form-control" placeholder="Password" id="addPassword" name = 'addPassword' />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-white">First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name" id="addfname" name = 'addfname' />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-white">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name"  id="addlanme" name = 'addlname' />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-white">Nickname</label>
                                        <input type="text" class="form-control" placeholder="Nickname" id="addNname" name = 'addNname' />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-white">* Phone</label>
                                        <input type="text" class="form-control" placeholder="Phone"  id="addPhone" name = 'addPhone' onkeyup="myFunction()" require/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-white">Email address</label>
                                        <input type="email" class="form-control" placeholder="Email" id="addEmail" name = 'addEmail' />
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-white">Line</label>
                                        <input type="text" class="form-control" placeholder="Line" id="addLine" name = 'addLine' />
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-white">Metamask Wallet</label>
                                        <input type="text" class="form-control" placeholder="Metamask Wallet" id="addMwallet" name = 'addMwallet' />
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-white">Binance Wallet</label>
                                        <input type="text" class="form-control" placeholder="Binance Wallet" id="addBwallet" name = 'addBwallet' />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-white">เลขบัญชี (กรณีโอนเป็นเงินสด)</label>
                                        <input type="text" class="form-control" placeholder="เลขบัญชี" id="addBank" name = 'addBank' />
                                    </div>
                                </div>
                            </div>
                            <br>
                
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal" onclick="addUser()">Submit</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>
          
        </div>
      </div>
  </form>

<script>
  function myFunction() {
      var x = document.getElementById("addPhone").value;
      document.getElementById("addName").value=x;
  }

  function myFunction1() {
      var x = document.getElementById("addPhone").value;
      document.getElementById("addName").value=x;
  }
</script>

<?php }else if($_POST["myaction"]=="addUser"){?>
  <?php

    $sql = "SELECT * FROM md_member WHERE 1 group by account_id DESC";
    $Query = $mysqli->query($sql);
    $Row=$Query->fetch_array();

    $id = $Row['account_id']+1;

    $_POST["addName"];
    $_POST["addPassword"];
    $_POST["addfname"];
    $_POST["addlname"];
    $_POST["addNname"];
    $_POST["addPhone"];
    $_POST["addEmail"];
    $_POST["addLine"];
    $_POST["addMwallet"];
    $_POST["addBwallet"];
    $_POST["addBank"];

    
    unset($insert);
    $insert["account_id"]    = "'".$id."'";
    $insert["account_username"]    = "'".$_POST["addName"]."'";
    $insert["account_password"]    = "'".md5($_POST["addPassword"])."'";
    $insert["account_fname"]   = "'".$_POST["addfname"]."'";
    $insert["account_lname"]   = "'".$_POST["addlname"]."'";
    $insert["account_nickname"]  = "'".$_POST["addNname"]."'";
    $insert["account_phone"]   = "'".$_POST["addPhone"]."'";
    $insert["account_email"]    = "'".$_POST["addEmail"]."'";
    $insert["account_line"]    = "'".$_POST["addLine"]."'";
    $insert["metamask_wallet"]   = "'".$_POST["addMwallet"]."'";
    $insert["binance_wallet"]   = "'".$_POST["addBwallet"]."'";
    $insert["bank_number"]  = "'".$_POST["addBank"]."'";
  

    $sql="INSERT INTO md_member(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
    $Query=$mysqli->query($sql) OR DIE("Error:  <br>$sql<br>\n");
    $account_id =$mysqli->insert_id;



      
  ?>

<?php }else if($_POST["myaction"]=="editUser"){?>
    <?php

      $sql = "SELECT * FROM md_member WHERE id = '".$_POST["id"]."' ";
      $Query = $mysqli->query($sql);
      $Row=$Query->fetch_array();

      if($Row['account_password'] == $_POST["editPassword"]){
        $pass = $Row['account_password'];
      }
      else if($Row['account_password'] != $_POST["editPassword"]){
        $pass = md5($_POST["editPassword"]);
      }

      unset($update);
      $update[]="account_username ='".$_POST["editUsername"]."'";
      $update[]="account_password ='".$pass."'";
      $update[]="account_fname ='".$_POST["editfname"]."'";
      $update[]="account_lname ='".$_POST["editlname"]."'";
      $updatep[]="account_nickname= '".$_POST["editNname"]."'";
      $update[]="account_phone ='".$_POST["editPhone"]."'";
      $update[]="account_email ='".$_POST["editEmail"]."'";
      $update[]="account_line ='".$_POST["editLine"]."'";

      if($_POST["ck"] == 1){
        $update[]="metamask_wallet ='".$_POST["editMwallet"]."'";
        $updatep[]="binance_wallet= '".$_POST["editBwallet"]."'";
        $updatep[]="bank_number= '".$_POST["editBank"]."'";
      }


      $sql_update="UPDATE md_member SET ".implode(",",$update)." WHERE id='".$_POST["id"]."'";
      $Query=$mysqli->query($sql_update);


      
    ?>


<?php }else if($_POST["myaction"]=="delete"){?>
    <?php
      $sql = "DELETE FROM  md_member WHERE id = '".$_POST['myid']."' ";
      $Query = $mysqli->query($sql);

      echo 'success';
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