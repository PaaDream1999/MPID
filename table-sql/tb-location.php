<?php	
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
$Date = date("Y-m-d");
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
$strField = " 
`id_location` ,
`name` ";
							
	
									
// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$_REQUEST['name']."' "; 
							
		$id = 'id_location';
// Update -------------------------------------------------------------------------------------//
		$strCommand = "  `name` = '".$_REQUEST['name']."' ";
								
		$strCondition = "$id ='".$_REQUEST['ID']."'";
 
// Delelte -------------------------------------------------------------------------------------//
		$strCondition = "$id ='".$_REQUEST['ID']."'";
		$page_Insert = "main.php?page=location-list"; 
		$page_Update = "main.php?page=location-list";
		$page_Delelte = "main.php?page=location-list"; 
		
		$msg_Insert = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		$msg_Update = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		

// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//

	}else{ 
		// Field Table
 
	$ID = $rs['id_location'];
	$id_equipment_type = $rs['id_location'];
	$name = $rs['name'];
	
		$sqllab = mysqli_query($con,"Select * From lab Where location_id='".$id_equipment_type."'");
		$labNum = mysqli_num_rows($sqllab);
 		$rs = mysqli_fetch_array($sqllab);
		$lab_id=$rs['id_lab'];
		$lab_name = $rs['name'];
		
		$sqlservice = mysqli_query($con,"Select * From equipment_service Where lab_id='".$lab_id."'");
		$serviceNum = mysqli_num_rows($sqlservice);
		$rs = mysqli_fetch_array($sqlservice);
		$service_name = $rs['name'];
	

		} // End SQL
	
 ?>