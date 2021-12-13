<?php 
require_once("libs/session.php");
require_once("Adminmanage/libs/connect.php");
?>

<?php if($_POST["myaction"]=="datalist"){?>
  <form action="" method="post" name="myForm" id="myForm">
    <input name="myaction" type="hidden" id="myaction" value="" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST["module_pageshow"]?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST["module_pagesize"]?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST["module_orderby"]?>" />
    <input name="module_adesc" type="hidden" id="module_adesc" value="<?php echo $_REQUEST["module_adesc"]?>" /> 
      
    <br><br><br>
    <div class="content">
      <h5 class="title text-primary" style="margin-left: 13px;">เลือกซื้อหุ้น</h5>
    </div>
    <br>
    <div class="shell">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="wsk-cp-product">
              <div class="wsk-cp-img">
                <!-- <img src="https://3.bp.blogspot.com/-eDeTttUjHxI/WVSvmI-552I/AAAAAAAAAKw/0T3LN6jABKMyEkTRUUQMFxpe6PLvtcMMwCPcBGAYYCw/s1600/001-culture-clash-matthew-gianoulis.jpg" alt="Product" class="img-responsive" /> -->
              </div>
              <div class="wsk-cp-text">
                <!-- <div class="category">
                  <span>Ethnic</span>
                </div> -->
                <div class="title-product">
                  <h3>Cryptoplanes</h3> 
                </div>
                <div class="description-prod">
                  <p>Ari force 10</p>
                  <p>port 2,000,000</p>
                </div>
                <div class="card-footer">
                  <a class="btn btn-success btn-block text-white" onclick="ModBuyplan()">ซื้อหุ้น</a>
                  <a class="btn btn-danger btn-block text-white" data-toggle="modal" data-target="#detail<?php echo "" ?>">รายละเอียด</a>
                  <!-- <div class="wcf-left"><span class="price">Rp500.000</span></div>
                  <div class="wcf-right"><a href="#" class="buy-btn"><i class="zmdi zmdi-shopping-basket"></i></a></div> -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="wsk-cp-product">
              <!-- <div class="wsk-cp-img"><img src="https://1.bp.blogspot.com/-b-2SgNUrFHg/WVSvmewWqgI/AAAAAAAAAK0/1K4YCcbYjhokHwV_IgiVJN9mEnQoWunIwCPcBGAYYCw/s1600/fashion-portrait-nicole-6347.jpg" alt="Product" class="img-responsive" /></div> -->
              <div class="wsk-cp-text">
                <!-- <div class="category">
                  <span>Introvert</span>
                </div> -->
                <div class="title-product">
                  <h3>Cryptocars</h3>
                </div>
                <div class="description-prod">
                  <p>Fast 1</p>
                  <p>port 1,000,000</p>
                </div>
                <div class="card-footer">
                  <a class="btn btn-success btn-block text-white" onclick="ModBuyplan()">ซื้อหุ้น</a>
                  <a class="btn btn-danger btn-block text-white"  data-toggle="modal" data-target="#detail<?php echo "" ?>">รายละเอียด</a>
                  <!-- <div class="wcf-left"><span class="price">Rp500.000</span></div>
                  <div class="wcf-right"><a href="#" class="buy-btn"><i class="zmdi zmdi-shopping-basket"></i></a></div> -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="wsk-cp-product">
              <!-- <div class="wsk-cp-img"><img src="https://1.bp.blogspot.com/-XL_Ba-178Fo/WVSvm5AbApI/AAAAAAAAAK4/X5109HTqUiAhPjbmz4NFVHcpL7ZWe6T3ACPcBGAYYCw/s1600/wow-29.jpg" alt="Product" class="img-responsive" /></div> -->
              <div class="wsk-cp-text">
                <!-- <div class="category">
                  <span>Beauty</span>
                </div> -->
                <div class="title-product">
                  <h3>BombCrypto</h3>
                </div>
                <div class="description-prod">
                  <p>Boomboom 1</p>
                  <p>port 1,000,000</p>
                </div>
                <div class="card-footer">
                  <a class="btn btn-success btn-block text-white" onclick="ModBuyplan()">ซื้อหุ้น</a>
                  <a class="btn btn-danger btn-block text-white" data-toggle="modal" data-target="#detail<?php echo "" ?>">รายละเอียด</a>
                  <!-- <div class="wcf-left"><span class="price">Rp500.000</span></div>
                  <div class="wcf-right"><a href="#" class="buy-btn"><i class="zmdi zmdi-shopping-basket"></i></a></div> -->
                </div>
              </div>
            </div>
          </div>

          <!-- The Modal -->
          <div class="modal fade" id="detail<?php echo "" ?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">ตารางรายได้ ...</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                  content ...
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                </div>
                
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </form>



<?php }else if($_POST["myaction"]=="ModBuyplan"){?>
  <form action="plansell_action.php" method="post" name="myForm" id="myForm" enctype="multipart/form-data">
    <input name="myaction" type="hidden" id="myaction" value="" />
    <input name="module_pageshow" type="hidden" id="module_pageshow" value="<?php echo $_REQUEST["module_pageshow"]?>" />
    <input name="module_pagesize" type="hidden" id="module_pagesize" value="<?php echo $_REQUEST["module_pagesize"]?>" />
    <input name="module_orderby" type="hidden" id="module_orderby" value="<?php echo $_REQUEST["module_orderby"]?>" />
    <input name="module_adesc" type="hidden" id="module_adesc" value="<?php echo $_REQUEST["module_adesc"]?>" /> 
      
    <br><br><br>
    <div class="content center">
      <div class="row">

        <div class="col-md-12">
          <div class="card h-100 ">
            <!-- <div class="card-header">
              <h5 class="title">Edit Profile</h5>
            </div> -->
            <br>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="text-primary"  >จำนวนหุ้นที่สนใจ (ใส่แค่ตัวเลข)</label>
                          <input type="number" class="form-control" placeholder="จำนวนหุ้นที่สนใจ" id="share" name="share" require/>
                      </div>
                  </div>
                  <div class="col-md-12"> 
                      <div class="form-group">
                          <label class="text-primary">โอนเงินสด(หุ้นละ 20,000) หรือ BUSD(หุ้นละ 597)</label>
                          <div class="form-check" style="margin-left: 25px;">
                            <input class="form-check-input" type="radio" name="transfer" id="transfer1" value="1" checked>
                            <label class="form-check-label" for="transfer1">
                              โอนเงิน
                            </label>
                          </div>
                          <div class="form-check" style="margin-left: 25px;">
                            <input class="form-check-input" type="radio" name="transfer" id="transfer2" value="2">
                            <label class="form-check-label" for="transfer2">
                              โอน BUSD
                            </label>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12"><br>
                     
                      <label class="text-primary">KBank: 1143154420 (ธีรวัชน์ คูหาทรัพย์ไพบูลย์)</label>
                       
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" >
                          <span class="form-check-sign"> โอนแล้ว</span>
                        </label>
                      </div>
                  </div>
                  <div class="col-md-12"><br>
                     
                      <label class="text-primary">Address: 0x12D68cf0FbAcCE36AeD6C8fd0d101a70cA004323</label>
                       
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" >
                          <span class="form-check-sign"> โอนแล้ว</span>
                        </label>
                      </div>
                  </div>
                  
                  <div class="col-md-12"><br>
                    <label class="text-primary">แนบสลิป</label>
                      <div class="col-sm-12 text-center">   
                          <img id="output1" width="500" height="auto" />
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input"  id="customFile" name="fileslip"  onchange="loadFile1(event)" />
                        <label class="custom-file-label" for="uploadslip">เลือก file</label>
                      </div>
                  </div>
              </div>
            </div> 
            <div class="card-footer text-center" >
              <a class="btn btn-success  text-white addclass disabled" style="display: inline-block; justify-content: center; " type="submit" id="typeslip" onclick="modinsert()" >ตกลง</a>
              <a class="btn btn-danger   text-white addclass" style="display: inline-block; justify-content: center; " onclick="modLoadContent()">กลับ</a>
            </div><br>
            <br>
          </div>
        </div>

      </div>
    </div>
  </form>


<?php }else if($_POST["myaction"]=="insert"){?>
    <?php
      // insert balance
      if($_REQUEST['transfer']==1){
        $amounttf=(int)$_REQUEST['share']*20000;
      }elseif($_REQUEST['transfer']==2){
        $amounttf=(int)$_REQUEST['share']*597;
      }
      // echo "KKK: ".$amounttf;
      // echo "<br>";
      // print_r($_FILES["fileslip"]['name']);

      // $sql_wallet = "SELECT * FROM  md_plan_log WHERE 1=1 ";
      // $query_wallet=$mysqli->query($sql_wallet);
      // $Row_wallet=$query_wallet->fetch_array();
      // print_r($Row_wallet);

      $tr_code="SL-".$_SESSION["front_session_sys_id"].strtotime(date("Y-m-d H:i:s"));
      $locate_img ="upload/";
      ///===============================================================
      $rename_card =  $tr_code.".webp"; 
      $type = strrchr($_FILES["fileslip"]['name'],".");
      if($type==".jpg" || $type==".JPG" || $type==".jpeg" || $type==".JPEG" || $type==".png" || $type==".PNG"){
        if(@copy($_FILES["fileslip"]['tmp_name'],$locate_img."/".$rename_card)){
          $images = $locate_img."/".$rename_card;
          $new_images = $locate_img."/".$rename_card; //$new_images = "photoresize/".$photono.".jpg";
          $width=800; //*** Fix Width & Heigh (Autu caculate) ***//
          $size=GetimageSize($images);
          $height=round($width*$size[1]/$size[0]);
          if($type==".png" || $type==".PNG"){
            $images_orig = ImageCreateFromPNG($images);
          }else{
            $images_orig = ImageCreateFromJPEG($images);
          }
          $photoX = ImagesX($images_orig);
          $photoY = ImagesY($images_orig);
          $images_fin = ImageCreateTrueColor($width, $height);
          ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
          ImageJPEG($images_fin,$new_images);
          ImageDestroy($images_orig);
          ImageDestroy($images_fin);

          unset($insert);
          $insert["plan_id"] = "'1'";
          $insert["account_id"] = "'".$_SESSION["front_session_sys_id"]."'";
          $insert["share_invest"] = "'".$_REQUEST['share']."'";
          $insert["amount"] = "'".$amounttf."'";
          $insert["credate"] = "'".date('Y-m-d H:i:s')."'";
          $insert["creby_id"] = "'".$_SESSION["front_session_sys_id"]."'";		
          $insert["status"] = "'W'";	
          $insert["slip"] = "'".$rename_card."'"; 
          //echo	"sql_insert=".
          $sql_insert="INSERT INTO md_plan_log(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
          $Query_insert=$mysqli->query($sql_insert);

          // unset($insert); 
          // $insert["plan_id"] = "'3'";
          // $sql_insert="INSERT INTO md_plan_join(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
          // $Query_insert=$mysqli->query($sql_insert);
          echo '<script type="text/javascript">swal("Success","Success!!, Transaction Payment Successfully","success")</script>';
          echo '<meta http-equiv="refresh" content="3;url=plansell.php" />';
          exit;

          // $sql = "UPDATE md_plan_log SET share_invest= '99'  WHERE plan_id='1'";
		      // $Query=$mysqli->query($sql);

        }
      }    

      

    ?>



<?php }else if($_POST["myaction"]=="update"){?>
    <?php
      
    ?>


<?php }else if($_POST["myaction"]=="delete"){?>
    <?php
     
    ?>

 
<?php } ?>


<style>
.center {
  margin: auto;
  width: 70%;
  /* padding: 10px; */
}
/* body {background-color: #f96332;} */
/* Responsive columns */
@media screen and (max-width: 600px) {
    .center {
        margin: auto;
        width: 100%;
        /* padding: 150px 0px; */
    }
}
</style>

<style>
@import url('https://fonts.googleapis.com/css?family=Muli:400,400i,700,700i');
body{
  font-family: 'Muli', sans-serif;
  background:#ddd;
}
.shell{
  padding:80px 0;
}
.wsk-cp-product{
  background:#fff;
  padding:15px;
  border-radius:6px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  position:relative;
  margin:-100px auto;
}
.wsk-cp-img{
  position:absolute;
  top:5px;
  left:50%;
  transform:translate(-50%);
  -webkit-transform:translate(-50%);
  -ms-transform:translate(-50%);
  -moz-transform:translate(-50%);
  -o-transform:translate(-50%);
  -khtml-transform:translate(-50%);
  width: 100%;
  padding: 15px;
  transition: all 0.2s ease-in-out;
}
.wsk-cp-img img{
  width:100%;
  transition: all 0.2s ease-in-out;
  border-radius:6px;
}
.wsk-cp-product:hover .wsk-cp-img{
  top:-40px;
}
.wsk-cp-product:hover .wsk-cp-img img{
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}
.wsk-cp-text{
  padding-top:50%;
}
.wsk-cp-text .category{
  text-align:center;
  font-size:12px;
  font-weight:bold;
  padding:5px;
  margin-bottom:45px;
  position:relative;
  transition: all 0.2s ease-in-out;
}
.wsk-cp-text .category > *{
  position:absolute;
  top:50%;
  left:50%;
  transform: translate(-50%,-50%);
  -webkit-transform: translate(-50%,-50%);
  -moz-transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
  -o-transform: translate(-50%,-50%);
  -khtml-transform: translate(-50%,-50%);
    
}
.wsk-cp-text .category > span{
  padding: 12px 30px;
  border: 1px solid #313131;
  background:#212121;
  color:#fff;
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
  border-radius:27px;
  transition: all 0.05s ease-in-out;
  
}
.wsk-cp-product:hover .wsk-cp-text .category > span{
  border-color:#ddd;
  box-shadow: none;
  padding: 11px 28px;
}
.wsk-cp-product:hover .wsk-cp-text .category{
  margin-top: 0px;
}
.wsk-cp-text .title-product{
  text-align:center;
}
.wsk-cp-text .title-product h3{
  font-size:20px;
  font-weight:bold;
  margin:15px auto;
  overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  width:100%;
}
.wsk-cp-text .description-prod p{
  margin:0;
}
/* Truncate */
.wsk-cp-text .description-prod {
  text-align:center;
  width: 100%;
  height:62px;
  overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
  margin-bottom:15px;
}
.card-footer{
  padding: 25px 0 5px;
  border-top: 1px solid #ddd;
}
.card-footer:after, .card-footer:before{
  content:'';
  display:table;
}
.card-footer:after{
  clear:both;
}

.card-footer .wcf-left{
  float:left;
  
}

.card-footer .wcf-right{
  float:right;
}

.price{
  font-size:18px;
  font-weight:bold;
}

a.buy-btn{
  display:block;
  color:#212121;
  text-align:center;
  font-size: 18px;
  width:35px;
  height:35px;
  line-height:35px;
  border-radius:50%;
  border:1px solid #212121;
  transition: all 0.2s ease-in-out;
}
a.buy-btn:hover , a.buy-btn:active, a.buy-btn:focus{
  border-color: #FF9800;
  background: #FF9800;
  color: #fff;
  text-decoration:none;
}
.wsk-btn{
  display:inline-block;
  color:#212121;
  text-align:center;
  font-size: 18px;
  transition: all 0.2s ease-in-out;
  border-color: #FF9800;
  background: #FF9800;
  padding:12px 30px;
  border-radius:27px;
  margin: 0 5px;
}
.wsk-btn:hover, .wsk-btn:focus, .wsk-btn:active{
  text-decoration:none;
  color:#fff;
}  
.red{
  color:#F44336;
  font-size:22px;
  display:inline-block;
  margin: 0 5px;
}
@media screen and (max-width: 991px) {
  .wsk-cp-product{
    margin:40px auto;
  }
  .wsk-cp-product .wsk-cp-img{
  top:-40px;
}
.wsk-cp-product .wsk-cp-img img{
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}
  .wsk-cp-product .wsk-cp-text .category > span{
  border-color:#ddd;
  box-shadow: none;
  padding: 11px 28px;
}
.wsk-cp-product .wsk-cp-text .category{
  margin-top: 0px;
}
a.buy-btn{
  border-color: #FF9800;
  background: #FF9800;
  color: #fff;
}
}
</style>
