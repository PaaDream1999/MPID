<?php	
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
$Date = date("Y-m-d");
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
$strField = " 
`mb_id` ,
`mb_user` ,
`mb_pass` ,
`mb_name` ,
`mb_affiliation` ,
`mb_address` ,
`mb_province` ,
`mb_zipcode` ,
`mb_tel` ,
`mb_telephone` ,
`mb_email` ,
`mb_status` ,
`mb_date` ";


if($Sql=="Insert"){

	if(strlen($_POST['mb_user'])<4){
		exit("<script>alert('ชื่อเข้าใช้ระบบไม่ควรน้อยกว่า 4 ตัวอักษร !');(history.back());</script>");
		}
	if(strlen($_POST['mb_pass'])<4){
		exit("<script>alert('รหัสผ่านไม่ควรน้อยกว่า 4 ตัวอักษร !');(history.back());</script>");
		}
	
	if(!is_numeric($_POST['mb_zipcode'])) { 
		exit("<script>alert('กรุณากรอก รหัสไปรษณีย์ เป็นตัวเลขเท่านั้น !');(history.back());</script>");
		}		
	if(strlen($_POST['mb_zipcode'])<5){
		exit("<script>alert('กรุณากรอก รหัสไปรษณีย์ให้ครบ 5 ตัวด้วยนะ !');(history.back());</script>");
		}
		
	if(!is_numeric($_POST['mb_tel'])) { 
		exit("<script>alert('กรุณากรอก - เบอร์โทร เป็นตัวเลขเท่านั้น !');(history.back());</script>");
		}		
	if(strlen($_POST['mb_tel'])<10){
		exit("<script>alert('กรุณากรอกเบอร์โทรให้ครับ 10 ตัวด้วยนะ !');(history.back());</script>");
		}
	
	if(!is_numeric($_POST['mb_telephone'])) { 
		exit("<script>alert('กรุณากรอก - เบอร์โทร เป็นตัวเลขเท่านั้น !');(history.back());</script>");
		}		
		
	if(ereg( "^[^@]+@([a-zA-Z0-9\-]+\.)+([a-zA-z0-9\-](2)|net|com|gov|mil|org|edu|int|co.th)$",$_POST['mb_email'])){
		}else{
		exit("<script>alert('รูปแบบ e-mail ไม่ถูกต้อง');(history.back());</script>");
		}	
	  
}			
			
if($Sql=="Update"){

	if(!is_numeric($_POST['mb_zipcode'])) { 
		exit("<script>alert('กรุณากรอก รหัสไปรษณีย์ เป็นตัวเลขเท่านั้น !');(history.back());</script>");
		}		
	if(strlen($_POST['mb_zipcode'])<5){
		exit("<script>alert('กรุณากรอก รหัสไปรษณีย์ให้ครบ 5 ตัวด้วยนะ !');(history.back());</script>");
		}
		
	if(!is_numeric($_POST['mb_tel'])) { 
		exit("<script>alert('กรุณากรอก - เบอร์โทร เป็นตัวเลขเท่านั้น !');(history.back());</script>");
		}		
	if(strlen($_POST['mb_tel'])<10){
		exit("<script>alert('กรุณากรอกเบอร์โทรให้ครับ 10 ตัวด้วยนะ !');(history.back());</script>");
		}
	
	if(!is_numeric($_POST['mb_telephone'])) { 
		exit("<script>alert('กรุณากรอก - เบอร์โทร เป็นตัวเลขเท่านั้น !');(history.back());</script>");
		}		
		
	if(ereg( "^[^@]+@([a-zA-Z0-9\-]+\.)+([a-zA-z0-9\-](2)|net|com|gov|mil|org|edu|int|co.th)$",$_POST['mb_email'])){
		}else{
		exit("<script>alert('รูปแบบ e-mail ไม่ถูกต้อง');(history.back());</script>");
		}	
	  
}			
			
	$status  = "1";	
// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$_REQUEST['mb_user']."', 
						'".$_REQUEST['mb_pass']."', 
						'".$_REQUEST['mb_name']."', 
						'".$_REQUEST['mb_affiliation']."', 
						'".$_REQUEST['mb_address']."', 
						'".$_REQUEST['mb_province']."', 
						'".$_REQUEST['mb_zipcode']."', 
						'".$_REQUEST['mb_tel']."', 
						'".$_REQUEST['mb_telephone']."', 
						'".$_REQUEST['mb_email']."', 
						'".$_REQUEST['mb_status']."', 
						'".$DateTime."' "; 
							
		$id = 'mb_id';
		$fld_name = 'mb_user';
		$strCheck = "$fld_name='".$_REQUEST['mb_user']."'";
		$msg_check = "ชื่อ Loing ";						

 

if(!empty($_SESSION['sess_adm_id'])){

	// Update -------------------------------------------------------------------------------------//
		$strCommand = "
								`mb_name` = '".$_REQUEST['mb_name']."', 
								`mb_affiliation` = '".$_REQUEST['mb_affiliation']."', 
								`mb_address` = '".$_REQUEST['mb_address']."', 
								`mb_province` = '".$_REQUEST['mb_province']."', 
								`mb_tel` = '".$_REQUEST['mb_tel']."', 
								`mb_telephone` = '".$_REQUEST['mb_telephone']."', 
								`mb_email` = '".$_REQUEST['mb_email']."', 
								`mb_status` = '".$_REQUEST['mb_status']."' ";
} 						

// Delelte Update -------------------------------------------------------------------------------------//
		$strCondition =  " $id='".$_REQUEST['ID']."' ";
		$page = "member";
 
		$page_Delelte = "main.php?page=$page-list";
			if(!empty($_SESSION['sess_mb_id'])){
			$page_Update = "main.php?page=$page-profile&ID=".$_REQUEST['ID']."";
			}else{
			$page_Update = "main.php?page=$page-list&ID=".$_REQUEST['ID']."";
			}
 
		$msg_Insert = 'บันทึกข้อมูลการลงทะเบียน';
		$msg_Update = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		
// Start switch case  ==================================================//
	switch($Sql){
		// ----------------------------------------------------------------------------------------//
		case 'Insert': 
		// ----------------------------------------------------------------------------------------//
		
		//ดึงข้อมูลในตาราง มาตรวจว่ามีข้อมูล่ซ่ำกันหรือไม่
		$sql = mysqli_query($con,"SELECT * FROM ".$Table." WHERE $strCheck");
		if(@mysqli_num_rows($sql)>= 1){
			$rs = mysqli_fetch_array($sql);
				$name = $rs[$fld_name];
				exit("<script>alert('".$msg_check."  [ ".$name." ] มีในระบบแล้ว');(history.back());</script>"); 
				}
	 
		//เพิ่มข้อมูลลงในตาราง 
		$sql_Insert = mysqli_query($con,"INSERT INTO ".$Table." ($strField) VALUES ($strValue) ");
		if($sql_Insert){
			$list_id = mysqli_insert_id($con);
			$page_Insert = "main.php?page=$page-profile&ID=".$list_id."";	
			exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='".$page_Insert."';</script>");	
			}else{
			exit("<script>alert('บันทึกข้อมูลไม่ได้!');(history.back());</script>");
			}
 
		break;
		
		// ----------------------------------------------------------------------------------------//
		case 'Update':
		// ----------------------------------------------------------------------------------------//
		$sql_Update = mysqli_query($con,"Update ".$Table." Set  $strCommand Where $strCondition ");
		if($sql_Update){
			exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='".$page_Update."';</script>");	
			}else{
			exit("<script>alert('บันทึกข้อมูลไม่ได้!');(history.back());</script>");
			}	
 
		break;
	
		// ----------------------------------------------------------------------------------------//
		case 'Repass':
		// ----------------------------------------------------------------------------------------//
		
		if(strlen($_POST['txt_newpass'])<4){
				exit("<script>alert('รหัสผ่านไม่ควรน้อยกว่า 4 ตัวอักษร !');(history.back());</script>");
				}
	
		$sql = mysqli_query($con,"Select * FROM member WHERE mb_pass='".$_REQUEST['txt_oldpass']."' AND mb_id='".$_SESSION['sess_mb_id']."'");
		$numrs_am = mysqli_num_rows($sql);
			if($numrs_am==1){
				$sql_update = mysqli_query($con,"Update member SET mb_pass='".$_REQUEST['txt_newpass']."' WHERE mb_id='".$_SESSION['sess_mb_id']."'");
				if($sql_update){
						exit("<script>alert('ระบบได้เปลี่ยนรหัสผ่านใหม่แล้ว');window.location='main.php?page=$page-profile&ID=".$_SESSION['sess_mb_id']."';</script>");	
							}else{
							exit("<script>alert('error : ไม่สามารถเปลี่ยนรหัสผ่านได้!');(history.back());</script>");
							}
				}else{
					exit("<script>alert('error : รหัสผ่านไม่ถูกต้อง!');(history.back());</script>");
					}
					
		break;
		
		// ----------------------------------------------------------------------------------------//
		default:
		// ----------------------------------------------------------------------------------------//
		}
// END switch case  ==================================================//	 

// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//
	}else{ 
 
	
		// Field Table
		$ID = $rs['mb_id'];
		$name = $rs['mb_name'];
		
	 	$mb_id = $rs['mb_id'];
		$mb_user = $rs['mb_user'];
		$mb_pass = $rs['mb_pass'];
		$mb_name = $rs['mb_name'];
		$mb_affiliation = $rs['mb_affiliation'];
		$mb_address = $rs['mb_address'];
		$mb_province = $rs['mb_province'];
		$mb_zipcode = $rs['mb_zipcode'];
		$mb_telephone = $rs['mb_telephone'];
		$mb_tel = $rs['mb_tel'];
		$mb_email = $rs['mb_email'];
		
		} // End SQL

 ?>