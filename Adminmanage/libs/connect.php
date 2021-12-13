<?php
## Database Connect #################################################

$db_config=array(
    "host"=>"localhost",  // กำหนด host
    "user"=>"root", // กำหนดชื่อ user
    "pass"=>"",   // กำหนดรหัสผ่าน
    "dbname"=>"nft_plan",  // กำหนดชื่อฐานข้อมูล
    "charset"=>"utf8"  // กำหนด charset
);
// $db_config=array(
//     "host"=>"localhost",  // กำหนด host
//     "user"=>"forexide_database", // กำหนดชื่อ user
//     "pass"=>"Apicha26",   // กำหนดรหัสผ่าน
//     "dbname"=>"forexide_database",  // กำหนดชื่อฐานข้อมูล
//     "charset"=>"utf8"  // กำหนด charset
// );
$mysqli = @new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["dbname"]);
if(mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    exit;
}
if(!$mysqli->set_charset($db_config["charset"])) { // เปลี่ยน charset เป้น utf8 พร้อมตรวจสอบการเปลี่ยน
//    printf("Error loading character set utf8: %sn", $mysqli->error);  // ถ้าเปลี่ยนไม่ได้
}else{
//    printf("Current character set: %sn", $mysqli->character_set_name()); // ถ้าเปลี่ยนได้
}

############################################
function mysqli_result($res,$row=0,$col=0)
############################################
{ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}
// $sql_setup = "SELECT *  FROM sys_setup WHERE 1=1 ORDER BY setup_id DESC";
// $Query_setup=$mysqli->query($sql_setup);
// $Row_setup=$Query_setup->fetch_array();
// date_default_timezone_set("Asia/Bangkok");
?>