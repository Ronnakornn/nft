<?php
ob_start();
include("libs/session.php");
include("libs/connect.php"); 

// unset($insert);
// $insert["log_signinout_memid"] = "'".$_SESSION["front_session_sys_id"]."'";
// $insert["log_signinout_date"] = "NOW()";
// $insert["log_signinout_type"] = "'Logout'";
// $insert["log_signinout_ip"] = "'".$ipaddress."'";
// $insert["log_signinout_crebyid"] = "'".$_SESSION["front_session_sys_id"]."'";
// $insert["log_signinout_credate"] = "NOW()";

// $sql="INSERT INTO log_signinout(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
// $Query=$mysqli->query($sql) OR DIE("Error:  <br>$sql<br>\n");

$_SESSION["front_session_sys_id"]="";
$_SESSION["front_session_sys_name"]="";
// $_SESSION["front_session_sys_level"]=""; 
$_SESSION["front_session_logout"]=""; 
session_destroy();
header('Location: login.php');

?>