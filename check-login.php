<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>check-login</title>
</head>

<body>
  <?php
 if($_POST){
  include "connect.php"; 
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			
				//เลือกข้อมูล เพื่อตรวจสอบการเข้าใช้ระบบ
				$QueryTb1 = mysqli_query($con,"SELECT * FROM admin WHERE adm_user='".$user."' AND adm_pass='".$pass."'");
				  $LoginAdmin = mysqli_num_rows($QueryTb1);
				  
				$QueryTb2 = mysqli_query($con,"SELECT * FROM member WHERE mb_user='".$user."' AND mb_pass='".$pass."'");
				  $LoginMember = mysqli_num_rows($QueryTb2);
				
				//ตรวจสอบการเข้าใช้ระบบส่วนของ ผู้ดูแลระบบ แล้วเก็บข้อมูล session ตามผู้ใช้งาน
					if($LoginAdmin==1){
					$rs = mysqli_fetch_array($QueryTb1);
					$_SESSION['sess_adm_id'] = $rs['adm_id'];
					$_SESSION['sess_adm_userid'] = session_id();
					$fname = $rs['adm_name'];
			
					exit("<script>alert('ยินดีต้อนรับคุณ [ ".$fname." ] เข้าระบบ');window.location='main.php';</script>");	
					
					}else if($LoginMember==1){
					$rs = mysqli_fetch_array($QueryTb2);
					$_SESSION['sess_mb_id'] = $rs['mb_id'];
					$_SESSION['sess_mb_userid'] = session_id();
					
					$fname = $rs['mb_name'];
					 		$tomenu = $rs['mb_affiliation'];
					
					if($tomenu=='ฝ่ายเทคโนโลยี'){
					
					$_SESSION['sess_mb_menu'] = 1;
					}else{
						$_SESSION['sess_mb_menu'] = 2;
					
					}
 
					exit("<script>alert('ยินดีต้อนรับคุณ [ ".$fname." ] เข้าระบบ');window.location='main.php';</script>");	
					
					
					
			}else{
			exit("<script>alert('Username หรือ Password ไม่ถูกต้อง');(history.back());</script>");
			}
 
 
	}else{ //***  ----  จบ Check SQL ---- ***  //	
		exit("<script>alert('error!');(history.back());</script>");
		} // End SQL
		

 ?>

</body>
</html>
