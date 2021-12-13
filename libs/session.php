<?php
@session_start();
#############################
##    BASE Session       ##
#############################
// Session Handle Current User Information ------------------
if(!isset($_SESSION["front_session_sys_id"])) {
   $_SESSION["front_session_sys_id"]="";
}
if(!isset($_SESSION["front_session_sys_name"])){
    $_SESSION["front_session_sys_name"]="";
}
if(!isset($_SESSION["front_session_sys_level"])){
   $_SESSION["front_session_sys_level"]="";
}


$uri = explode('/', $_SERVER['REQUEST_URI']);

// echo "KKK: ".$uri[2];
if($_SESSION["front_session_sys_id"]==""){
  if(strstr($uri[2],"login.php")!="login.php"){
	  echo "<meta charset='UTF-8'><meta http-equiv='refresh' content='0;url=login.php'/>";
  }
}
// if($uri[2]==""){
  
// 	  echo "<meta charset='UTF-8'><meta http-equiv='refresh' content='0;url=login.php'/>";
  
// }
/*function setSessionTime($_timeSecond){  
 if(!isset($_SESSION['ses_time_life'])){  
  $_SESSION['ses_time_life']=time();  
 }  
 if(isset($_SESSION['ses_time_life']) && time()-$_SESSION['ses_time_life']>$_timeSecond){  
  if(count($_SESSION)>0){  
   foreach($_SESSION as $key=>$value){  
    unset($$key);  
    unset($_SESSION[$key]);  
   }  
  }  
 }  
}  
// การใช้งาน  
setSessionTime(30*60); 
// 10 คือจำนวนวินาทีที่ต้องการให้ตัวแปร SESSION หมดอายุ  
// สามารถกำหนดเป็น 30*60  
// หมายถึงกำหนดให้ตัวแปร SESSION หมดอายุภายใน 30 นาที  
// เช่น  setSessionTime(30*60);  
// ฟังก์ชันนี้สามารถนำไปใช้ในการกำหนดเวลาว่าให้ user ต้องทำการล็อกอิน  
// ใหม่ทุกๆ กี่นาทีหรือกี่วินาที หรือกี่ชั่วโมงก็ได้ */
?>