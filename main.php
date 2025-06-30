<?php 
include "session-start.php";
 $url = explode("-",$_GET['page']);   
 $pageUrl = $url[0];
  $tableSql = $url[0];
$tableInc = "table-sql";
if(!empty($_SESSION['sess_adm_id'])){
$Query = mysqli_query($con,"Select * From admin Where adm_id='".$_SESSION['sess_adm_id']."'");
$rs = mysqli_fetch_array($Query);
include $tableInc.'/tb-admin.php'; 
}else if(!empty($_SESSION['sess_mb_id'])){ 
$Query = mysqli_query($con,"Select * From member Where mb_id='".$_SESSION['sess_mb_id']."'");
$rs = mysqli_fetch_array($Query);
include $tableInc.'/tb-member.php'; 
}else{
echo "<script>alert('กรุณาลงชื่อเข้าใช้ระบบก่อนนะ')</script>";
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $TitlePage; ?></title>
<script type="text/javascript" src="css/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="slimbox/js/slimbox2.js"></script>
<link rel="stylesheet" href="slimbox/css/slimbox2.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/template-js-off.css" />
<link rel="stylesheet" type="text/css" href="css/template.css" />
<link rel="stylesheet" type="text/css" href="css/css-menu.css" />
<style type="text/css">
input#txt{
padding: 5px;
}
</style>
</head>

<body style="background-image:url(images/bg-main.jpg)">
<div id="Container-box">
<div id="header"> 
<?php include "inc-header.php"; ?>
</div>
<div id="menu">
<?php  include "inc-menu-top.php"; ?>
</div>
<div id="container">
<!-- menu left
<div id="left-content">
<?php // include "inc-menu-left.php"; ?>
</div>
-->
<!-- content -->
<div id="center-content">
<div id="box-table">
 
  <!-- content -->
    
  <?php
$page = $_GET['page'];
if(!empty($page)){
	
 include "$page.php"; 
	
	}else{ 		
 
	exit("<script>window.location='main.php?page=order_repair-list';</script>");	
	}
 ?>
 </div>
 
 <!-- 
 <div style="text-align:right; padding-right: 10px;">
 <button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
 </div> 
 -->
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;  </p>
</div>			
<!-- end content -->		
</div>
<!-- end content -->

<!--  <div id="right-content"></div>  -->
<div id="clear-both"></div>
<div id="footer">
<?php include "inc-footer.php"; ?>
</div>
</div>
</body>
</html>
