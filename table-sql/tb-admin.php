<?php	
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
$Date = date("Y-m-d");
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
		$strField = "  `adm_id` ,
							`adm_user` ,
							`adm_pass` ,
							`adm_name` ,
							`adm_tel` ,
							`adm_email` ,
							`adm_status` ";
							
	
									
// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$_REQUEST['adm_user']."', 
						'".$_REQUEST['adm_pass']."', 
						'".$_REQUEST['adm_name']."', 
						'".$_REQUEST['adm_tel']."', 
						'".$_REQUEST['adm_email']."', 
						'".$_REQUEST['adm_status']."' "; 
							
		$id = 'adm_id';
		$strCheck = "adm_user='".$_REQUEST['adm_user']."'";
		$msg_check = 'ชื่อใช้ Login';
// Update -------------------------------------------------------------------------------------//
		$strCommand = "   `adm_name` = '".$_REQUEST['adm_name']."', 
									`adm_tel` = '".$_REQUEST['adm_tel']."', 
									`adm_email` = '".$_REQUEST['adm_email']."'  ";
								
		$strCondition = "$id ='".$_REQUEST['ID']."'";
		
// Delelte -------------------------------------------------------------------------------------//
		$strCondition = "$id ='".$_REQUEST['ID']."'";
		$page_Insert = "main.php?page=admin-profile"; 
		$page_Update = "main.php?page=admin-profile&ID=".$_REQUEST['ID']."";
		$page_Repass = "main.php?page=admin-profile&ID=".$_REQUEST['ID']."";
		$page_Delelte = "main.php?page=admin"; 
		
		$msg_Insert = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		$msg_Update = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		
// Start switch case  ==================================================//
	switch($Sql){
		// ----------------------------------------------------------------------------------------//
		case 'Insert':
		// ----------------------------------------------------------------------------------------//
		if(!is_numeric($_POST['adm_tel'])) { 
			exit("<script>alert('กรุณากรอก - เบอร์โทร เป็นตัวเลขเท่านั้น !');(history.back());</script>");
			}		
if(strlen($_POST['adm_tel'])<10){
			exit("<script>alert('กรุณากรอกเบอร์โทรให้ครับ 10 ตัวด้วยนะ !');(history.back());</script>");
			}
								
if(ereg( "^[^@]+@([a-zA-Z0-9\-]+\.)+([a-zA-z0-9\-](2)|net|com|gov|mil|org|edu|int|co.th)$",$_POST['adm_email'])){
			}else{
				exit("<script>alert('รูปแบบ e-mail ไม่ถูกต้อง');(history.back());</script>");
			}	
// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//
		break;
	
	
		// ----------------------------------------------------------------------------------------//
		case 'Repass':
		// ----------------------------------------------------------------------------------------//
		
		if(strlen($_POST['txt_newpass'])<4){
				exit("<script>alert('รหัสผ่านไม่ควรน้อยกว่า 4 ตัวอักษร !');(history.back());</script>");
				}
	
		$sql = mysqli_query($con,"Select * FROM admin WHERE adm_pass='".$_REQUEST['txt_oldpass']."' AND adm_id='".$_SESSION['sess_adm_id']."'");
		$numrs_am = mysqli_num_rows($sql);
			if($numrs_am==1){
				$sql_update = mysqli_query($con,"Update admin SET adm_pass='".$_REQUEST['txt_newpass']."' WHERE adm_id='".$_SESSION['sess_adm_id']."'");
				if($sql_update){
						exit("<script>alert('ระบบได้เปลี่ยนรหัสผ่านใหม่แล้ว');window.location='".$page_Repass."';</script>");	
							}else{
							exit("<script>alert('error : ไม่สามารถเปลี่ยนรหัสผ่านได้!');(history.back());</script>");
							}
				}else{
					exit("<script>alert('error : รหัสผ่านไม่ถูกต้อง!');(history.back());</script>");
					}
					
		break;
		
		case 'Update':
		if(!is_numeric($_POST['adm_tel'])) { 
			exit("<script>alert('กรุณากรอก - เบอร์โทร เป็นตัวเลขเท่านั้น !');(history.back());</script>");
			}		
if(strlen($_POST['adm_tel'])<10){
			exit("<script>alert('กรุณากรอกเบอร์โทรให้ครับ 10 ตัวด้วยนะ !');(history.back());</script>");
			}
								
if(ereg( "^[^@]+@([a-zA-Z0-9\-]+\.)+([a-zA-z0-9\-](2)|net|com|gov|mil|org|edu|int|co.th)$",$_POST['adm_email'])){
			}else{
				exit("<script>alert('รูปแบบ e-mail ไม่ถูกต้อง');(history.back());</script>");
			}	
// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//
		break;
 
		}
// END switch case  ==================================================//	 

// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//

	}else{ 
		// Field Table
 
	$ID = $rs['adm_id'];
	$adm_id = $rs['adm_id'];
	$adm_user = $rs['adm_user'];
	$adm_pass = $rs['adm_pass'];
  	$adm_name = $rs['adm_name'];
	$adm_tel = $rs['adm_tel'];
	$adm_email = $rs['adm_email'];
	$adm_status = $rs['adm_status'];
		} // End SQL
	
 ?>