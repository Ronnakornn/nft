<?php
ob_start();
include("../Adminmanage/libs/session.php");
include("../Adminmanage/libs/connect.php"); 

// unset($insert);
// $insert["log_signinout_memid"] = "'".$_SESSION["core_session_sys_id"]."'";
// $insert["log_signinout_date"] = "NOW()";
// $insert["log_signinout_type"] = "'Logout'";
// $insert["log_signinout_ip"] = "'".$ipaddress."'";
// $insert["log_signinout_crebyid"] = "'".$_SESSION["core_session_sys_id"]."'";
// $insert["log_signinout_credate"] = "NOW()";

// $sql="INSERT INTO log_signinout(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
// $Query=$mysqli->query($sql) OR DIE("Error:  <br>$sql<br>\n");

$_SESSION["core_session_sys_id"]="";
$_SESSION["core_session_sys_name"]="";
$_SESSION["core_session_sys_level"]=""; 
$_SESSION["core_session_logout"]=""; 
session_destroy();
header('Location: ../Adminmanage/login.php');

?>