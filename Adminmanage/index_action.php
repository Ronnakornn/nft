<?php 
require_once("../Adminmanage/libs/session.php");
require_once("../Adminmanage/libs/connect.php");
?>

<?php if($_POST["myaction"]=="datalist"){?>
<style>

  :root {
    --surface-color: #fff;
    --curve: 40;
  }

  * {
    box-sizing: border-box;
  }

  body {
    font-family: 'Noto Sans JP', sans-serif;
    background-color: #000;
  }

  .cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin: 2rem 3vw;
    padding: 0;
    list-style-type: none;
  }

  .card {
    position: relative;
    display: block;
    height: 500px;  
    border-radius: calc(var(--curve) * 1px);
    overflow: hidden;
    text-decoration: none;
  }

  .card__image {      
    width: 100%;
    height: auto;
  }

  .card__overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;      
    border-radius: calc(var(--curve) * 1px);    
    background-color: var(--surface-color);      
    transform: translateY(100%);
    transition: .2s ease-in-out;
  }

  .card:hover .card__overlay {
    transform: translateY(0);
  }

  .card__header {
    position: relative;
    /* display: flex; */
    align-items: center;
    gap: 2em;
    padding: 2em;
    border-radius: calc(var(--curve) * 1px) 0 0 0;    
    background-color: var(--surface-color);
    transform: translateY(-100%);
    transition: .2s ease-in-out;
  }

  .card__arc {
    width: 80px;
    height: 80px;
    position: absolute;
    bottom: 100%;
    right: 0;      
    z-index: 1;
  }

  .card__arc path {
    fill: var(--surface-color);
    d: path("M 40 80 c 22 0 40 -22 40 -40 v 40 Z");
  }       

  .card:hover .card__header {
    transform: translateY(0);
  }

  .card__thumb {
    flex-shrink: 0;
    width: 50px;
    height: 50px;      
    border-radius: 50%;      
  }

  .card__title {
    font-size: 1em;
    margin: 0 0 .3em;
    color: #000;
  }

  .card__tagline {
    display: block;
    margin: 1em 0;
    /* font-family: "MockFlowFont";   */
    font-size: .8em; 
    color: #000;  
  }

  .card__status {
    font-size: .8em;
    color: #000;
  }

  .card__description {
    padding: 0 2em 2em;
    margin: 0;
    color: #000;
    /* font-family: "MockFlowFont";    */
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    overflow: hidden;
  }    
</style>
  <form action="" method="post" name="myForm" id="myForm">
    <input name="myaction" type="hidden" id="myaction" value="" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST["module_pageshow"]?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST["module_pagesize"]?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST["module_orderby"]?>" />
    <input name="module_adesc" type="hidden" id="module_adesc" value="<?php echo $_REQUEST["module_adesc"]?>" /> 
      
    <br><br><br>
    
      <ul class="cards">

      <?php 
          $sql = "SELECT * FROM md_game  WHERE 1";
          $Query = $mysqli->query($sql);
          
          while($Row=$Query->fetch_array()){
        ?>
      <li>
        <a  class="card" style="background-color: coral;">
          <!-- <img src="https://i.imgur.com/oYiTqum.jpg" class="card__image" alt="" /> -->

          <?php 
             $sql_allin = "SELECT SUM(amount) as all_invest FROM md_plan  WHERE game_id = '".$Row['id']."'";
             $Query_allin = $mysqli->query($sql_allin);
             $Row_allin = $Query_allin->fetch_array();

            // $Row_allin['all_invest'];

             $sql_sumShare = "SELECT SUM(share_invest) as all_share FROM md_plan  WHERE game_id = '".$Row['id']."'";
             $Query_sumShare = $mysqli->query($sql_sumShare);
             $Row_sumShare=$Query_sumShare->fetch_array();

            // $Row_allin['all_share'];
          
          ?>
         <input type="hidden" class="form-control"  id="id_game<?php echo $Row['id'] ?>" name="id_game<?php echo $Row['id'] ?>" value="<?php echo $Row['id'] ?>" />

          <div class="card__overlay">
            <div class="card__header"> 
              <center><h6 class="title text-primary">GAME : <?php echo $Row['name']?></h6></center>
              
              <div class="card__header-text"> 
                
                <div class="row">
                  <div class="col-6"><h3 class="card__title">เงินลงทุนทั้งหมด</h3></div>
                  <div class="col-6  text-primary" style="text-align: right;"><?php echo   $Row_allin['all_invest'];?></div>
                </div>  
                <div class="row">
                  <div class="col-6"><h3 class="card__title">หุ้นทั้งหมด</h3></div>
                  <div class="col-6  text-primary" style="text-align: right;"><?php echo  $Row_sumShare['all_share'];?></div>
                </div>  
                <div class="row">
                  <div class="col-6"><h3 class="card__title">ราคา <?php echo $Row['game_name']?>  ปัจจุบัน</h3></div>
                  <div class="col-6 text-primary" style="text-align: right;">201.45</div>
                </div>
                <!-- <div class="row">
                  <div class="col-6"><h3 class="card__title">Cpan ที่ได้รับ</h3></div>
                  <div class="col-6 text-primary" style="text-align: right;">500</div>
                </div>
                <div class="row">
                  <div class="col-6"><h3 class="card__title">รายได้ปัจบัน</h3></div>
                  <div class="col-6 text-primary" style="text-align: right;">15,000</div>
                </div> -->
              </div>
            </div>
            <div class="card__description">
           
              <button type="button" class="btn btn-lg btn-primary btn-block" id="bt<?php echo $Row['id'] ?>" onclick="management(document.getElementById('id_game'+<?php echo $Row['id'] ?>).value)">Management</button>

            </div>
          </div>
        </a>      
      </li>
      <?php }?>
        
    </ul>
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

<?php }else if($_POST["myaction"]=="managementinvest"){
    $sql = "SELECT * FROM md_plan_log inner join md_member on md_plan_log.account_id = md_member.account_id  WHERE plan_id = '".$_POST['id']."'";
    $Query = $mysqli->query($sql);

    $sql2 = "SELECT * FROM md_plan  WHERE plan_id = '".$_POST['id']."'";
    $Query2 = $mysqli->query($sql2);
    $Row2=$Query2->fetch_array()
  ?>
   

      <div class="content mt-5">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">รายการนักลงทุน</h4>
                <!-- <div  align='right' > 
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAdd" >ADD</button>
                </div> -->
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th style="font-size: 15px; text-align: center; " > <b> User Name </b> </th>
                      <th style="font-size: 15px; text-align: center;" > <b> Name </b></th>
                      <th style="font-size: 15px; text-align: center;" > <b> เงินลงทุน </b></th>
                      <th style="font-size: 15px; text-align: center;" > <b> สัดส่วนหุ้น % </b></th>
                      <th style="font-size: 15px; text-align: center;" > <b> รายได้ </b></th>
                      <th style="font-size: 15px; text-align: center;" > <b> Status </b></th>
                      <th style="font-size: 15px; text-align: center;" ></th>
                      <th> </th>

                    </thead>
                    <tbody>
                     <?php while($Row=$Query->fetch_array()){ ?>
                      <tr>
                        <td style="font-size: 13px; text-align: center;" ><?php echo $Row['account_username']; ?></td>
                        <td style="font-size: 13px; text-align: center;"><?php echo $Row['account_fname'] ?></td>
                        <td style="font-size: 13px; text-align: center;"><?php echo $Row['amount']; ?></td>
                        <td style="font-size: 13px; text-align: center;"><?php echo (($Row['amount']/$Row2['max_price'])*100); ?></td>
                        <td style="font-size: 13px; text-align: center;"><?php  ?></td>
                        <td style="font-size: 13px; text-align: center;">
                          <?php 
                         
                            if($Row['status'] == 'W'){
                              ?>
                              <button type="button" class="btn btn-warning btn-sm" >รอดำเนินการ</button>
                          <?php }if($Row['status'] == 'Y'){ ?>
                            <button type="button" class="btn btn-success btn-sm" >ชำระ</button>
                          <?php }if($Row['status'] == 'C'){ ?>
                            <button type="button" class="btn btn-success btn-sm" >ไม่ได้ชำระ</button>
                          <?php }?>
                        </td>
                        <td >
                          <div >
                             <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#myModal" >Edit</button>
                          <button type="button" class="btn btn-outline-danger btn-sm" >Delete</button>
                          </div>
                       
                        </td>
                
                      </tr>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">แก้ไขข้อมูล</h4>
                                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body">
                                <form action="" method="POST">
                                  <div class="col-md-12"> 
                                      <div class="nk-block-head">
                                       
                                      

                                          <div class="row">
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <label class="text-white">Username</label>
                                                      <input type="text" class="form-control" placeholder="Username"  id="username" require/>
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
                                              <?php if($_SESSION["core_session_sys_level"] == 'Supperadmin'){?>
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
                                              <?php }?>
                                          </div>
                                          <br>
                                    
                                      <!-- <div class="form-group">
                                          <button class="btn btn-lg btn-primary btn-block">Sign up</button>
                                      </div> -->
                                  </div>
                                </form>
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
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
                  <form action="" method="POST">
                    <div class="col-md-12"> 
                        <div class="nk-block-head">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-white">Username</label>
                                        <input type="text" class="form-control" placeholder="Username"  id="username" require/>
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
                          
                        <!-- <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block">Sign up</button>
                        </div> -->
                    </div>
                  </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>
          
        </div>
      </div>



<?php }else if($_POST["myaction"]=="management"){?>
    <?php
      $sql_allin = "SELECT * FROM md_plan  WHERE game_id = '".$_POST['id']."'";
      $Query_allin = $mysqli->query($sql_allin);
    ?>
    <div class="mt-5 " align='right' > 
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAdd" >ADD</button>
    </div>
    <div class="row g-gs mt-5 ">
      <?php   while($Row_allin = $Query_allin->fetch_array()){ ?>

        <input type="hidden" class="form-control"  id="id<?php echo $Row_allin['id'] ?>" name="id<?php echo $Row_allin['id'] ?>" value="<?php echo $Row_allin['id'] ?>" />

      <div class="col-md-4 mt-5 ">
          <div class="card card-bordered">
              <div class="card-inner">
                  <div class="card-title-group align-start mt-2">
                      <div class="card-title">
                        <center><h3 class="title text-primary"><?php echo $Row_allin['plan_name'] ?></h3></center>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-6 ml-2"><h6 class="card__title">เงินลงทุนทั้งหมด</h6></div>
                      <!-- <div class="col-6  text-primary " style="text-align: right;"><?php echo   $Row_allin['all_invest'];?></div> -->
                    </div>  
                    <div class="row">
                      <div class="col-6 ml-2"><h6 class="card__title">หุ้นทั้งหมด</h6></div>
                      <!-- <div class="col-6  text-primary " style="text-align: right;"><?php echo  $Row_sumShare['all_share'];?></div> -->
                    </div>  
                    <div class="row">
                      <div class="col-6 ml-2"><h6 class="card__title">ราคา <?php echo $Row['game_name']?>  ปัจจุบัน</h6></div>
                      <!-- <div class="col-6 text-primary" style="text-align: right; ">201.45</div> -->
                    </div>
              </div>
              <center>

                <button type="button" class="btnt btn-outline-danger btn-sm" onclick="managementinvest(document.getElementById('id'+<?php echo $Row_allin['id'] ?>).value)">Management Invester</button>
                <!-- <button type="button" class="btn btn-outline-danger btn-sm" >Report</button> -->
            
              </center>
                <br>
              
          </div>
          
          
      </div><!-- .col -->
       
     <?php }?>
    </div>

    <style>
      :root {
        --gradient: linear-gradient(to left top, #F80D0D 10%, #FF512F 90%) !important;
      }

      body {
        background: #111 !important;
      }

      .card {
        background: #222;
        border: 1px solid #FF512F;
        color: rgba(250, 250, 250, 0.8);
        margin-bottom: 2rem;
      }

      .btnt {
        border: 2px solid;
        border-image-slice: 1;
        background: var(--gradient) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        border-image-source:  var(--gradient) !important; 
        text-decoration: none;
        transition: all .4s ease;
      }

      .btnt:hover, .btnt:focus {
        background: var(--gradient) !important;
        -webkit-background-clip: none !important;
        -webkit-text-fill-color: #fff !important;
        border: 5px solid #fff !important; 
        box-shadow: #222 1px 0 10px;
        text-decoration: underline;
      }

    </style>

   


              






 
<?php } ?>
