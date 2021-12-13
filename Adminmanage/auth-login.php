<?php
ob_start();
include("../Adminmanage/libs/session.php");
// include("../libss/config.php");
include("../Adminmanage/libs/connect.php");
// include("../libss/function.php");
$inputUser = trim($_POST["inputUser"]);
$inputPass= md5($_POST["inputPass"]);

	$_SESSION["core_session_logout"]=1;
	//echo "<br> sql == ".
	$sql = "SELECT staff_id, staff_password, staff_fname, staff_lname FROM sys_staff  WHERE staff_user ='".$inputUser."' ";
	$Query = $mysqli->query($sql) OR DIE("Error: <br />$sql<br />\n");
	$RecordCount = $Query->num_rows;
	//exit;
	if($RecordCount>=1) {
		$Row=$Query->fetch_array();

		$myPassword=$Row["staff_password"];
		if($myPassword==$inputPass){
			$_SESSION["core_session_sys_id"]	= $Row["staff_id"]; 
			$_SESSION["core_session_sys_name"]	= $Row["staff_fname"]." ".$Row["staff_lname"];
			$_SESSION["core_session_sys_level"] = $Row["staff_level"]; 

			// //echo "<br> UPDATE == ".
			// $sql = "UPDATE sys_staff SET staff_logdate ='".date('Y-m-d H:i:s')."' WHERE staff_id ='".$_SESSION["core_session_sys_id"]."'";
			// $Query=$mysqli->query($sql);
 

			// unset($insert);
			// $insert["log_signinout_memid"] = "'".$_SESSION["core_session_sys_id"]."'";
			// $insert["log_signinout_date"] = "'".date('Y-m-d H:i:s')."'";
			// $insert["log_signinout_type"] = "'Login'";
			// $insert["log_signinout_ip"] = "'".$ipaddress."'";
			// $insert["log_signinout_crebyid"] = "'".$_SESSION["core_session_sys_id"]."'";
			// $insert["log_signinout_credate"] = "'".date('Y-m-d H:i:s')."'";
			// //echo "<br> INSERT == ".
			// $sql="INSERT INTO log_signinout(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
			// $Query=$mysqli->query($sql) OR DIE("Error:  <br>$sql<br>\n");
			// //echo "<br> 1";
			Header("Location:../Adminmanage/index.php");
					
		}else{//if($myPassword==$inputPass){
			//echo "<br> 2";
			Header("Location:../Adminmanage/login.php?alert=yesNoPass");		
		}
	}else{//if($RecordCount>=1) {
		//echo "<br> 3";
		Header("Location:../Adminmanage/login.php?alert=yesNoUser");
	}

include("../libs/disconnect.php");

?>