<?php	
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
$Date = date("Y-m-d");
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
$strField = " 
`id_lab` ,
`location_id` ,
`name` ";
							
 
									
// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$_REQUEST['location_id']."',
						'".$_REQUEST['name']."' "; 
							
		$id = 'id_lab';
// Update -------------------------------------------------------------------------------------//
		$strCommand = "  
		`location_id` = '".$_REQUEST['location_id']."',
		`name` = '".$_REQUEST['name']."'
		 ";
								
		$strCondition = "$id ='".$_REQUEST['ID']."'";
 
// Delelte -------------------------------------------------------------------------------------//
		$strCondition = "$id ='".$_REQUEST['ID']."'";
		$page_Insert = "main.php?page=lab-list"; 
		$page_Update = "main.php?page=lab-list";
		$page_Delelte = "main.php?page=lab-list"; 
		
		$msg_Insert = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		$msg_Update = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		

// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//

	}else{ 
		// Field Table
 
	$ID = $rs['id_lab'];
	$id_lab = $rs['id_lab'];
	$location_id = $rs['location_id'];
	$name = $rs['name'];
	
	$sql2 = mysqli_query($con,"Select * From location Where id_location='".$location_id."'");
	$rs = mysqli_fetch_array($sql2);
	$type_name = $rs['name'];
	
	$sqlcount = mysqli_query($con,"Select * From equipment_service Where lab_id='".$id_lab."'");
	$count = mysqli_num_rows($sqlcount);
	
	
	
	

		} // End SQL
	
 ?>