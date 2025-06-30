<?php	
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
$Date = date("Y-m-d");
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
$strField = " 
`id_equipment_type` ,
`name` ";
							
	
									
// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$_REQUEST['name']."' "; 
							
		$id = 'id_equipment_type';
// Update -------------------------------------------------------------------------------------//
		$strCommand = "  `name` = '".$_REQUEST['name']."' ";
								
		$strCondition = "$id ='".$_REQUEST['ID']."'";
		
// Delelte -------------------------------------------------------------------------------------//
		$strCondition = "$id ='".$_REQUEST['ID']."'";
		$page_Insert = "main.php?page=equipment_type-list"; 
		$page_Update = "main.php?page=equipment_type-list";
		$page_Delelte = "main.php?page=equipment_type-list"; 
		
		$msg_Insert = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		$msg_Update = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		

// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//

	}else{ 
		// Field Table
 
	$ID = $rs['id_equipment_type'];
	$id_equipment_type = $rs['id_equipment_type'];
	$name = $rs['name'];

		} // End SQL
	
 ?>