<?php
    session_start();
    include("libs/connect.php"); 
 
   
    if($_REQUEST['sid'] == ''){
        // //check email
        $sql = "SELECT * FROM md_account WHERE account_email ='".$_REQUEST['email']."'";
        $Query = $mysqli->query($sql) OR DIE("Error: <br />$sql<br />\n");
        $result_ck=$Query->fetch_array();
      

        if($result_ck){
            if(!empty($_REQUEST['ib_account'])){
                $iba = $_REQUEST['ib_account'];
                echo "<script language=\"javascript\">alert('!! This email is already in the system.');</script>";
                echo "<meta http-equiv='refresh' content='1;URL=register.php?iba=$iba'>";
                
            }else{
                echo "<script language=\"javascript\">alert('!! This email is already in the system.');</script>";
                echo "<meta http-equiv='refresh' content='1;URL=register.php'>";
                exit;
            }
            exit;
        }

        //check user
        $sql = "SELECT * FROM md_account WHERE account_user ='".$_REQUEST['usr']."'";
        $Query = $mysqli->query($sql) OR DIE("Error: <br />$sql<br />\n");
        $user_ck=$Query->fetch_array();

        if($user_ck){    
            if(!empty($data['ib_account'])){
                $iba = $_REQUEST['ib_account'];
                echo "<script language=\"javascript\">alert('!! This user is already in the system.');</script>";
                echo "<meta http-equiv='refresh' content='1;URL=register.php?iba=$iba'>";
                
            }else{
                echo "<script language=\"javascript\">alert('!! This user is already in the system.');</script>";
                echo "<meta http-equiv='refresh' content='1;URL=register.php'>";
                exit;   
            }
            exit;     
        }

        //check pass
        $Lengthpwd = strlen($_REQUEST['pwd']);
        if($Lengthpwd < 6  || $Lengthpwd > 32){
            echo "<script language=\"javascript\">alert('!!This Password Length is not valid (6 - 32 digit).');</script>";
            echo "<meta http-equiv='refresh' content='1;URL=register.php?iba=".$_REQUEST['ib_account']."'>";
            // $this -> view -> alerttext = "!! Length is not valid (6 - 10 digit).";
            exit;
        }
        $d = date('Y-m-d H:i:s');

        $sql_setup = "SELECT * FROM sys_setup WHERE setup_id = 1";
        $Query_setup = $mysqli->query($sql_setup) OR DIE("Error: <br />$sql_setup<br />\n");
        $mt4limit_setup = $Query_setup->fetch_array();

        unset($insert);
        $insert["account_user"]    = "'".$_REQUEST["usr"]."'";
        $insert["account_pass"]    = "'".md5($_REQUEST["pwd"])."'";
        $insert["account_fname"]   = "'".$_REQUEST["names"]."'";
        $insert["account_lname"]   = "'".$_REQUEST["lname"]."'";
        $insert["account_mobile"]  = "'".$_REQUEST["mobile"]."'";
        $insert["account_email"]   = "'".$_REQUEST["email"]."'";
        $insert["account_credate"] = "'".$d."'"; 
        $insert["account_status"]  = "'W'"; 
        $insert["account_lang"]  = "'".$_SESSION['front_session_sys_language']."'"; 
        $insert["account_mt4limit"] = "'". $mt4limit_setup['setup_limit_account_trade']."'";
        $insert["account_update"]  = "'".date('Y-m-d H:i:s')."'"; 
        $sql="INSERT INTO md_account(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
        $Query=$mysqli->query($sql) OR DIE("Error:  <br>$sql<br>\n");
        $account_id =$mysqli->insert_id;

        if(!empty($_REQUEST['ib_account'])){

            $sql   = "SELECT account_id FROM md_account WHERE account_user ='".$_REQUEST['ib_account']."'";
            $Query = $mysqli->query($sql) OR DIE("Error: <br />$sql<br />\n");
            $dbacc = $Query->fetch_array();

            // $sql   = "SELECT account_id FROM md_account WHERE account_id='".$dbacc['account_id']."'";
            // $Query = $mysqli->query($sql) OR DIE("Error: <br />$sql<br />\n");
            // $find_level1 = $Query->fetch_array();

            $sql = "UPDATE md_account SET account_upline = '".$dbacc['account_id']."',ib_level1 = '".$dbacc['ib_level1']."' WHERE account_user ='".$_REQUEST["usr"]."'";
            $Query=$mysqli->query($sql);

        }
        else{

            $UPLINE_id = 741;
            $sql = "UPDATE md_account SET account_upline = '".$UPLINE_id."',ib_level1 = '".$UPLINE_id."' WHERE account_user ='".$_REQUEST["usr"]."'";
            $Query=$mysqli->query($sql);     
        }

        $user_gmail = $_REQUEST['usr'];
        $input_email = $_REQUEST['email'];
        $MaxID = $account_id;
        $generateauth = 'https://member.fxtrb.com'."/register_action.php?sid=".base64_encode($input_email.$MaxID.$input_email)."&acc=".$input_email;
        $names = $_REQUEST["names"];
        /* ------------------------------------------------------------------------------------------------------------- */
        $message2 = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns=q3r="en">
            <head>
            <!-- Fav Icon  -->
            <link rel="shortcut icon" href="https://member.fxtrb.com/images/favicon.png">
            <!-- Page Title  -->
            <title>FXTRB</title>
            <meta property="og:title" content="Email template">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style type="text/css">
                a{
                    color: #1167c5;
                }
                ul{
                    list-style-type:none;
                    padding-left:20px;
                }
                ul li{
                    background:url(https://member.fxtrb.com/images/sentmail/arrow_bullet.png) no-repeat 0 2px;
                    padding-left:10px;
                    margin-left:0;
                }
                h1 {
                    font-size: 56px;
                }
                h2{
                    font-size: 28px;
                    font-weight: 900; 
                }
                p {
                    font-weight: 100;
                }
                td {
                    vertical-align: top;
                }
                #email {
                    margin: auto;
                    width: 652px;
                    background-color: white;
                }
                
                .subtle-link {
                    font-size: 9px; 
                    text-transform:uppercase; 
                    letter-spacing: 1px;
                    color: #CBD6E2;
                }
                .email-social li { display: inline-block; padding: 4px; }
                .email-social li a { display: inline-block; height: 30px; width: 30px; border-radius: 50%; background: #ffffff; }
                .email-social li a img { width: 30px; }
            </style>
            </head>
                  
            <body bgcolor="#F5F8FA" style="width: 100%; margin: auto 0; padding:0; font-family:Arial,Helvetica,sans-serif;; font-size:14px; color:#8094ae; word-break:break-word;line-height: 22px;">
                <!-- View in Browser Link --> 
                <br><br>
                <div id="email">
                    <table align="right" role="presentation">
                        <tr>
                        <td>
                        <a class="subtle-link" href="#"> </a>
                        </td>
                        <tr>
                    </table>
        
                    <!-- Banner --> 
                    <table role="presentation" width="100%">
                        <tr>
                            <td bgcolor="#fff" align="center" style="color: white;">
                                <img  src="https://member.fxtrb.com/images/sentmail/email_01.jpg" alt="logo">
                            </td>
                    </table>
        
                    <!-- First Row --> 
                    <table role="presentation" width="100%" border="0" cellpadding="0" cellspacing="10px" style="padding: 30px 30px 30px 30px;" >
                        <tr>
                            <td colspan="2" >
                                <p>เรียนคุณ <strong>'.$names.'</strong></p>
                                <p>ขอบคุณที่สมัครเปิดบัญชีกับ FXTRB กรุณายืนยันอีเมลของคุณโดยคลิกที่ปุ่มต่อไปนี้</p>
                                    <a href="'.$generateauth.'" target="_blank" style="text-decoration: none;">
                                        <div align="center" style="width:100px;background-color:#0567bb;border-radius:5px;text-align:center;padding:10px 20px;color:#ffffff;font-size:16px;font-weight:bold;margin:auto;margin-top:30px;">ยืนยันอีเมล</div>
                                    </a>
                                    <p>หรือดำเนินการไปที่ลิงค์ <a href="'.$generateauth.'" target="_blank">'.$generateauth.'</a> </p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" >
                            <p>รบกวนส่งเอกสารเพื่อยืนยันตัวตนและที่อยู่ของคุณ โดยการอัพโหลดเอกสารได้อย่างรวดเร็วและง่ายดายโดยไปที่ My FXTRB Account.</p>
                            </td>
                        </tr>
        
                        <tr>
                            <td style="width:60px;text-align:center"><img src="https://member.fxtrb.com/images/sentmail/1.png"/></td>
                            <td>
                                <h3>ยืนยันตัวตนของคุณ</h3>
                                <p>กรุณาส่งรูปถ่ายของเอกสาร 1 ตัวจากตัวเลือกด่านล่าง และถ่ายรูปหน้าตรงพร้อมบัตรประชาชน</p>
                                <ul style="list-style-type:none;padding-left:20px;">
                                <li style="background:url(https://member.fxtrb.com/images/sentmail/arrow_bullet.png) no-repeat 0 2px; padding-left:10px; margin-left:0;">บัตรประชาชน</li>
                                <li style="background:url(https://member.fxtrb.com/images/sentmail/arrow_bullet.png) no-repeat 0 2px; padding-left:10px; margin-left:0;">ใบขับขี่</li>
                                <li style="background:url(https://member.fxtrb.com/images/sentmail/arrow_bullet.png) no-repeat 0 2px; padding-left:10px; margin-left:0;">พาสปอร์ต</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:60px;text-align:center"><img src="https://member.fxtrb.com/images/sentmail/2.png"/></td>
                            <td>
                                <h3>ยืนยันที่อยู่ของคุณ</h3>
                                <p>กรุณาส่งรูปถ่ายของเอกสาร 1 ตัวจากตัวเลือกด่านล่าง</p>
                                <ul style="list-style-type:none;padding-left:20px;">
                                    <li style="background:url(https://member.fxtrb.com/images/sentmail/arrow_bullet.png) no-repeat 0 2px; padding-left:10px; margin-left:0;">ทะเบียนบ้าน</li>
                                    <li style="background:url(https://member.fxtrb.com/images/sentmail/arrow_bullet.png) no-repeat 0 2px; padding-left:10px; margin-left:0;">บิลสาธารณูปโภค (ค่าน้ำ, ค่าไฟ , ค่าอินเตอร์เน็ต หรือ โทรศัพท์บ้าน)</li>
                                    <li style="background:url(https://member.fxtrb.com/images/sentmail/arrow_bullet.png) no-repeat 0 2px; padding-left:10px; margin-left:0;">สเตเม้นบัตรเครดิต/เดบิต</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:60px;text-align:center"><img src="https://member.fxtrb.com/images/sentmail/3.png"/></td>
                            <td><h3>ยืนยันบัญชีธนาคาร</h3>
                            <p>กรุณาส่งรูปถ่ายของเอกสารหน้าสมุดธนาคาร</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="'.$generateauth.'" target="_blank" style="text-decoration: none;">
                                    <div align="center" style="width:200px;background-color:#0567bb;border-radius:5px;text-align:center;padding:10px 20px;color:#ffffff;font-size:16px;font-weight:bold;margin:auto;margin-top:30px;">ล็อกอินไปยังระบบสมาชิก </div>
                                </a>
                            </td>
                        </tr>
                        
                        <!-- //////// -->
        
                        <tr>
                            <td colspan="2" style="text-align: justify;">
                                <hr style="border-width: 1px;color: #8094ae;" />                    
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: justify;">
                                <p><strong  style="font-size: 17px;">ดาวน์โหลดแพลตฟอร์ม FXTRB MT4</strong></p>
                                <p>เริ่มต้นซื้อขายตราสารที่ท่านต้องการได้บน FXTRB MT4 สำหรับเครื่อง PC และ MAC หรือบนอุปกรณ์พกพาหลากหลายประเภท</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td align="center"><a href="https://fxtrb.com/blog-full-left-sidebar-with-frame__trashed/platforms/metatrader-4-for-windows/" target="_blank"><img src="https://member.fxtrb.com/images/sentmail/mt4-pc.png"/></a></td>
                                        <td align="center"><a href="https://fxtrb.com/blog-full-left-sidebar-with-frame__trashed/platforms/metatrader-4-for-mac/" target="_blank"><img src="https://member.fxtrb.com/images/sentmail/mt4-mac-keyboard.png"/></a></td>
                                        <td align="center"><a href="https://fxtrb.com/blog-full-left-sidebar-with-frame__trashed/platforms/metatrader-4-for-iphone-2/" target="_blank"><img src="https://member.fxtrb.com/images/sentmail/mt4-iphone.png"/></a></td>
                                        <td align="center"><a href="https://fxtrb.com/blog-full-left-sidebar-with-frame__trashed/platforms/metatrader-4-for-android/" target="_blank"><img src="https://member.fxtrb.com/images/sentmail/mt4-android.png"/></a></td>
                                    </tr>
                                    <tr style="font-size:12px;">
                                        <td height="30" align="center"><a href="https://fxtrb.com/blog-full-left-sidebar-with-frame__trashed/platforms/metatrader-4-for-windows/" target="_blank" ><strong>MT4 FOR WINDOWS</strong></a></td>
                                        <td align="center"><a href="https://fxtrb.com/blog-full-left-sidebar-with-frame__trashed/platforms/metatrader-4-for-mac/" target="_blank" ><strong>MT4 FOR MAC</strong></a></td>
                                        <td align="center"><a href="https://fxtrb.com/blog-full-left-sidebar-with-frame__trashed/platforms/metatrader-4-for-iphone-2/" target="_blank" ><strong>MT4 FOR IPHONE & IPAD</strong></a></td>
                                        <td align="center"><a href="https://fxtrb.com/blog-full-left-sidebar-with-frame__trashed/platforms/metatrader-4-for-android/" target="_blank" ><strong>MT4 FOR ANDROID</strong></a></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: justify;">
                                <p>การเทรดในตลาดฟอเร็กซ์มีความเสี่ยง โดยมีโอกาสที่จะขาดทุนได้ จึงไม่เหมาะสำหรับนักลงทุนและเทรดเดอร์บางท่าน และการใช้เลเวอเรจในการเทรดจะเพิ่มความเสี่ยงของท่านได้เช่นกัน สื่อที่ทำขึ้นนี้มีจุดประสงค์เพื่อการสื่อสารด้านการตลาด มิได้มีเจตนาแนะนำหรือชักชวนให้ท่านกระทำการซื้อขายหรือลงทุนในตราสารใดโดยเฉพาะ</p>
                                <p>FXTRB ไม่มีส่วนต้องรับผิดชอบเป้าหมายทางการเงินหรือสถานะทางการเงินของท่าน และไม่เกี่ยวข้องกับผลกำไร/ขาดทุนใดๆ ที่อาจเกิดขึ้นจากการลงทุนตามคำแนะนำ, การคาดการณ์ หรือข้อมูลอื่นๆที่ถูกส่งมาจากพนักงานของ FXTRB รวมถึงบุคคลที่สาม หรืออื่นๆใด</p>
                            </td>
                        </tr>  
        
           
                        <tr>
                            <td colspan="2" style="text-align: justify;">
                                <hr style="border-width: 1px;color: #8094ae;" />                    
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: justify;">
                                <p><strong class="fw-bold" style="font-size: 17px;">FXTRB เป็นชื่อทางธุรกิจของ TRBH International Limited</strong></p>
                                <strong  class="fw-bold">เกี่ยวกับกฎหมาย:</strong> TRBH International Limited คือบริษัทที่จดทะเบียนในฮ่องกงภายใต้หมายเลขจดทะเบียนที่ : 2949329<br><br>
                                <strong  class="fw-bold">ข้อควรระมัดระวัง:&nbsp;</strong> ก่อนเริ่มเทรด คุณควรเข้าใจความเสี่ยงทั้งหมดที่เกี่ยวข้อง กับตลาดค่าเงินเพื่อเทรดบน margin ดังนั้นคุณควรมีประสบการณ์ก่อนที่จะลงทุน โปรดอ่านให้แน่ใจว่าคุณเข้าใจถึงความเสี่ยง <a href="https://member.fxtrb.com/TermsAndConditions.pdf" target="_blank">ข้อมูลความเสี่ยง</a>
                            </td>
                        </tr> 
        
                    </table>
        
                    <!-- Banner Row --> 
                    <table role="presentation" bgcolor="#fff" width="100%" style="margin-top: 50px;" >
                        <table class="email-footer">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td><a href="https://fxtrb.com" target="_blank"><img src="https://member.fxtrb.com/images/sentmail/email_02.jpg"/></a></td>
                                                <td><a href="https://www.facebook.com/TRBThailand29/" target="_blank"><img src="https://member.fxtrb.com/images/sentmail/email_03.jpg"/></a></td>
                                                <td><a href="https://www.instagram.com/trbthailand/" target="_blank"><img src="https://member.fxtrb.com/images/sentmail/email_04.jpg"/></a></td>
                                                <td><a href="https://twitter.com/ThailandTrb" target="_blank"><img src="https://member.fxtrb.com/images/sentmail/email_05.jpg"/></a></td>
                                                <td><a href="https://www.youtube.com/channel/UCLiXUBv35UT66dT_K50Nv-A" target="_blank"><img src="https://member.fxtrb.com/images/sentmail/email_06.jpg"/></a></td>
                                                <td><img src="https://member.fxtrb.com/images/sentmail/email_07.jpg"/></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </table>
                                                                    
                </div>
                                                                    
                <!-- Banner Row --> 
                <table role="presentation" bgcolor="#F5F8FA" width="100%" style="margin-top: 20px;" class="text-center">
                    <tr>
                        <center>
                        <td align="center">
                            <ul class="email-social">
                                <li><a href="https://www.facebook.com/TRBThailand29/" target="_blank"><img src="https://member.fxtrb.com/images/socials/facebook.png" alt=""></a></li>
                                <li><a href="https://twitter.com/ThailandTrb" target="_blank"><img src="https://member.fxtrb.com/images/socials/twitter.png" alt=""></a></li>
                                <li><a href="https://www.youtube.com/channel/UCLiXUBv35UT66dT_K50Nv-A" target="_blank"><img src="https://member.fxtrb.com/images/socials/youtube.png" alt=""></a></li>
                                <li><a href="https://www.instagram.com/trbthailand/" target="_blank"><img src="https://member.fxtrb.com/images/socials/instagram.png" alt=""></a></li>
                            </ul>
                            <p class="email-copyright-text">FXTRB © Copyright 2020 All Right Reserved, TRBH International Limited</p>
                        </td>
                        </center>
                    </tr>
                </table><br><br><br><br>
            </body>
        </html>
        ';
        /* ------------------------------------------------------------------------------------------------------------- */
        
        /* หากต้องการรับข้อมูลจาก Form แบบไม่ระบุชื่อตัวแปร สามารถรับข้อมูลได้ไม่จำกัด ให้ลบบรรทัด 11-14 แล้วใช้ 19-22 แทน 
            
        foreach ($_POST as $key => $value) {
        //echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
        $message.= "Field ".htmlspecialchars($key)." = ".htmlspecialchars($value)."\n";
        }
        
        */
        require("./libs/phpmailer/class.phpmailer.php"); // path to the PHPMailer class.
        require("./libs/phpmailer/class.smtp.php"); // path to the PHPMailer class.

        
        $subj = 'Authentication user account FXTRB.COM';
        
        
        $mesg = $message2;

        $sql   = "SELECT * FROM sys_setup WHERE setup_id = 1";
        $Query = $mysqli->query($sql) OR DIE("Error: <br />$sql<br />\n");
        $app_mail = $Query->fetch_array();

        $app_email = $app_mail['setup_email'];
        $app_email_pwd = $app_mail['setup_email_pwd'];

        $to = $input_email; // อีเมล์ที่ใช้รับข้อมูลจากแบบฟอร์ม


        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP
        
        $mail->Encoding = "quoted-printable";
        $mail->CharSet = "utf-8";
    
        $mail->SMTPSecure = 'tls'; // กำหนดเป็น ssl ถ้าต้องการใช้ (Server ต้องรองรับโรโตคอลนี้)
        $mail->Host = 'smtp.gmail.com'; // mail server ถ้าเป็นบน server ตัวเอง ใช้ localhost (default)
        $mail->Port = '587'; // กำหนด mail port ถ้าไม่สามารถใช้ค่า (default 25)
        $mail->SMTPAuth = true; // กำหนดเป็น true ถ้าส่งเมล์ผ่าน server อี่น หรือจำเป็นต้องใช้ รหัสผ่าน
        $mail->Username = $app_email; // ชื่อและรหัสผ่านบน mail  server ของคุณ
        $mail->Password = $app_email_pwd; // ชื่อและรหัสผ่านบน mail  server ของคุณ

        // $mail->AddReplyTo($replyto, $replyto); // email ตอบกลับเมื่อไม่สามารถส่งเมล์ถึง ปลายทางได้ no-reply@domain.com
        $mail->AddAddress($to, $names); // ส่งเมล์ถึง, ถ้าต้องการส่งหาหลายคนพร้อมกันให้ใช้คำสั่งนี้หลายๆครั้ง (1 คำสั่งต่อ 1 รายชื่อ)
        $mail->SetFrom($app_email, 'FXTRB'); // ส่งมาจาก
        $mail->Subject = $subj; // หัวข้ออีเมล์
        $mail->MsgHTML($mesg); // ข้อความ (HTML)
        // $mail->AddAttachment('image.gif');      // แทรกไฟล์พร้อมกับอีเมล์ สามารถแทรกได้พร้อมกันหลายไฟล์ (1 คำสั่งต่อ 1 ไฟล์)
        $mail->Send();

      
        header( "location: register_activeemail.php" );
        exit(0);
    }
    if($_REQUEST['sid'] != ''){
        $memberID = intval(str_replace($_GET["acc"],"",base64_decode($_GET["sid"])));
        $sql = "UPDATE md_account SET account_status = 'Y' WHERE account_id ='".$memberID."'";
        $Query=$mysqli->query($sql);
        
        
        header( "location: register_activedoc.php" );
        exit(0);
    }

?>
