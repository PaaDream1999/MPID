<?php	
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
$Date = date("Y-m-d");
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
$strField = " 
`id_equipment_service` ,
`user_id` ,
`model_id` ,
`lab_id` ,
`equipment_code` ,
`note` ,
`status` ,
`date` ";
 
 
if($Sql=="Insert"){

	 if(empty($_POST['user_id'])){
	 exit("<script>alert('กรุณาเลือกข้อมูลผู้ใช้ด้วยนะ !');(history.back());</script>");
	 
	 }
	 if(empty($_POST['model_id'])){
	 exit("<script>alert('กรุณาเลือกข้อมูลครุภัณฑ์ด้วยนะ  !');(history.back());</script>");
	 
	 }
	 if(empty($_POST['lab_id'])){
	 exit("<script>alert('กรุณาเลือกข้อมูลห้องที่ใช้ครุภัณฑ์ด้วยนะ !');(history.back());</script>");
	 
	 }
	 
 
  
}			
			
if($Sql=="Update"){
	 if($_POST['user_id']==""){
	 exit("<script>alert('กรุณาเลือกข้อมูลผู้ใช้ด้วยนะ !');(history.back());</script>");
	 
	 }
	 if($_POST['model_id']==""){
	 exit("<script>alert('กรุณาเลือกข้อมูลครุภัณฑ์ด้วยนะ  !');(history.back());</script>");
	 
	 }
	 if($_POST['lab_id']==""){
	 exit("<script>alert('กรุณาเลือกข้อมูลห้องที่ใช้ครุภัณฑ์ด้วยนะ !');(history.back());</script>");
	 
	 }
}			
			
								
	$status  = "1";	
	$note = eregi_replace(chr(13), "<br>", $_POST['note']);
// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$_REQUEST['user_id']."', 
						'".$_REQUEST['model_id']."', 
						'".$_REQUEST['lab_id']."', 
						'".$_REQUEST['equipment_code']."', 
						'".$note."', 
						'".$status."', 
						'".$DateTime."' "; 
							
		$id = 'id_equipment_service';
		$fld_name = 'equipment_code';
		$strCheck = "$fld_name='".$_REQUEST['equipment_code']."'";
		$msg_check = "ข้อมูล";
 

if(!empty($_SESSION['sess_adm_id'])){

	// Update -------------------------------------------------------------------------------------//
		$strCommand = "
								`user_id` = '".$_REQUEST['user_id']."', 
								`model_id` = '".$_REQUEST['model_id']."', 
								`lab_id` = '".$_REQUEST['lab_id']."', 
								`equipment_code` = '".$_REQUEST['equipment_code']."', 
								`model_id` = '".$_REQUEST['model_id']."', 
								`note` = '".$note."' ";
} 						

// Delelte Update -------------------------------------------------------------------------------------//
		$strCondition =  " $id='".$_REQUEST['ID']."' ";
 		$page = "equipment_service";
		
			if(!empty($_SESSION['sess_adm_id'])){
				$pageUpdate = "main.php?page=$page-detail&ID=".$_REQUEST['ID']."";
				$page_Delelte = "main.php?page=$page-list";
				} 
 
		$msg_Insert = 'บันทึกข้อมูลเรียบร้อยแล้ว';
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
			$pageInsert = "main.php?page=$page-detail&ID=".$list_id."";	
			exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='".$pageInsert."';</script>");	
			}else{
			exit("<script>alert('บันทึกข้อมูลไม่ได้!');(history.back());</script>");
			}
 
		break;
		
		// ----------------------------------------------------------------------------------------//
		case 'Update':
		// ----------------------------------------------------------------------------------------//
		$sql_Update = mysqli_query($con,"Update ".$Table." Set  $strCommand Where $strCondition ");
		if($sql_Update){
			exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='".$pageUpdate."';</script>");	
			}else{
			exit("<script>alert('บันทึกข้อมูลไม่ได้!');(history.back());</script>");
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
		$ID = $rs['id_equipment_service'];
		
		
	 	$id_equipment_service = $ID;
		$user_id = $rs['user_id'];
		$model_id = $rs['model_id'];
		$lab_id = $rs['lab_id'];
		$equipment_code = $rs['equipment_code'];
		$note = $rs['note'];
		$status = $rs['status'];
		$date = $rs['date'];
		
		
		$sqlMember = mysqli_query($con,"Select * From member Where mb_id='".$user_id."'");
 		$rs = mysqli_fetch_array($sqlMember);
 
		$mb_name = $rs['mb_name'];
		$mb_affiliation = $rs['mb_affiliation'];
 	
		$sqlModel = mysqli_query($con,"Select * From equipment_model Where id_equipment_model='".$model_id."'");
 		$rs = mysqli_fetch_array($sqlModel);
		$type_id = $rs['type_id'];
		$model_equipment = $rs['name'];
		
		$sqltype = mysqli_query($con,"Select * From equipment_type Where id_equipment_type='".$type_id."'");
 		$rs = mysqli_fetch_array($sqltype);
	 	$id_equipment_type = $rs['id_equipment_type'];
		$type_equipment = $rs['name'];
		
		
		$sqlLab = mysqli_query($con,"Select * From lab Where id_lab='".$lab_id."'");
 		$rs = mysqli_fetch_array($sqlLab);
		$id_lab = $rs['id_lab'];
		$location_id = $rs['location_id'];
		$lab_name = $rs['name'];
	
		$sql2 = mysqli_query($con,"Select * From location Where id_location='".$location_id."'");
		$rs = mysqli_fetch_array($sql2);
		$location_name = $rs['name'];
 
		
		
		
		} // End SQL

 ?>