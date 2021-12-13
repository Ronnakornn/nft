<?php
ob_start();
include("libs/session.php");
// include("../libss/config.php");
include("libs/connect.php");
// include("../libss/function.php");
$inputUser = trim($_POST["inputUser"]);
$inputPass= md5($_POST["inputPass"]);

	$_SESSION["front_session_logout"]=1;
	//echo "<br> sql == ".
	$sql = "SELECT account_id, account_password, account_fname, account_lname FROM md_member  WHERE account_username ='".$inputUser."' ";
	$Query = $mysqli->query($sql) OR DIE("Error: <br />$sql<br />\n");
	$RecordCount = $Query->num_rows;
	//exit;
	if($RecordCount>=1) {
		$Row=$Query->fetch_array();

		$myPassword=$Row["account_password"];
		if($myPassword==$inputPass){
			$_SESSION["front_session_sys_id"]	= $Row["account_id"]; 
			$_SESSION["front_session_sys_name"]	= $Row["account_fname"]." ".$Row["account_lname"];
			// $_SESSION["front_session_sys_level"] = $Row["account_level"]; 

			// //echo "<br> UPDATE == ".
			// $sql = "UPDATE md_member SET member_logdate ='".date('Y-m-d H:i:s')."' WHERE member_id ='".$_SESSION["front_session_sys_id"]."'";
			// $Query=$mysqli->query($sql);
 

			// unset($insert);
			// $insert["log_signinout_memid"] = "'".$_SESSION["front_session_sys_id"]."'";
			// $insert["log_signinout_date"] = "'".date('Y-m-d H:i:s')."'";
			// $insert["log_signinout_type"] = "'Login'";
			// $insert["log_signinout_ip"] = "'".$ipaddress."'";
			// $insert["log_signinout_crebyid"] = "'".$_SESSION["front_session_sys_id"]."'";
			// $insert["log_signinout_credate"] = "'".date('Y-m-d H:i:s')."'";
			// //echo "<br> INSERT == ".
			// $sql="INSERT INTO log_signinout(".implode(",",array_keys($insert)).") VALUES (".implode(",",array_values($insert)).")";
			// $Query=$mysqli->query($sql) OR DIE("Error:  <br>$sql<br>\n");
			// //echo "<br> 1";
			Header("Location:index.php");
					
		}else{//if($myPassword==$inputPass){
			//echo "<br> 2";
			Header("Location:login.php?alert=yesNoPass");		
		}
	}else{//if($RecordCount>=1) {
		//echo "<br> 3";
		Header("Location:login.php?alert=yesNoUser");
	}

include("libs/disconnect.php");

?>