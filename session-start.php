<?php
session_start();
session_id(); 
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
include "cke_date_func.php";
if((!$_SESSION['sess_adm_userid'] == session_id()) and (!$_SESSION['sess_mb_userid'] == session_id())) { 
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
			echo "<script>alert('กรุณาลงชื่อเข้าใช้ระบบก่อนนะ')</script>";
			echo "<meta http-equiv='refresh' content='0;url=index.php?stt=login'>" ; 
			exit();
}
include "config.inc.php";
?>