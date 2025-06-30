<?php	
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
$Date = date("Y-m-d");
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
$strField = " 
`id_equipment_model` ,
`type_id` ,
`name` ,
`detail` ,
`price` ,
`note` ,
`date` ,
`status` ";

if($Sql=="Insert"){

	if(!is_numeric($_POST['price'])) { 
				exit("<script>alert('กรุณากรอก ราคา เป็นตัวเลขเท่านั้น !');(history.back());</script>");
				}		
  
}			
			
if($Sql=="Update"){
	 if(!is_numeric($_POST['price'])) { 
				exit("<script>alert('กรุณากรอก ราคา เป็นตัวเลขเท่านั้น !');(history.back());</script>");
				}	
}			
			
								
	$status  = "1";	
	$detail = eregi_replace(chr(13), "<br>", $_POST['detail']);
	$note = eregi_replace(chr(13), "<br>", $_POST['note']);
// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$_REQUEST['type_id']."', 
						'".$_REQUEST['name']."', 
						'".$detail."', 
						'".$_REQUEST['price']."', 
						'".$note."', 
						'".$DateTime."', 
						'".$status."' "; 
							
		$id = 'id_equipment_model';
		$fld_name = 'name';
		$strCheck = "$fld_name='".$_REQUEST['name']."'";
		$msg_check = "ข้อมูล";
 

if(!empty($_SESSION['sess_adm_id'])){

	// Update -------------------------------------------------------------------------------------//
		$strCommand = "
								`type_id` = '".$_REQUEST['type_id']."', 
								`name` = '".$_REQUEST['name']."', 
								`detail` = '".$detail."', 
								`price` = '".$_REQUEST['price']."', 
								`note` = '".$note."' ";
} 						

// Delelte Update -------------------------------------------------------------------------------------//
		$strCondition =  " $id='".$_REQUEST['ID']."' ";
 		$page = "equipment_model";
		
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
		$ID = $rs['id_equipment_model'];
		
		
	 	$id_equipment_model = $ID;
		$type_id = $rs['type_id'];
		$name = $rs['name'];
		$detail = $rs['detail'];
		$price = $rs['price'];
		$note = $rs['note'];
		$date = $rs['date'];
		$status = $rs['status'];
		
		
		$sqltype = mysqli_query($con,"Select * From equipment_type Where id_equipment_type='".$type_id."'");
 		$rs = mysqli_fetch_array($sqltype);
		$type_name = $rs['name'];
		
		$sqlservice = mysqli_query($con,"Select * From equipment_service Where model_id='".$id_equipment_model."'");
		$serviceNum = mysqli_num_rows($sqlservice);
		$rs = mysqli_fetch_array($sqlservice);
		$service_name = $rs['name'];
		
		} // End SQL

 ?>