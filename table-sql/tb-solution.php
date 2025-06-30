<?php	
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
$Date = date("Y-m-d");
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
$strField = " 
`id_solution` ,
`type_id` ,
`title` ,
`detail` ,
`date` "; 
							
	
									
// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$_REQUEST['type_id']."',
						'".$_REQUEST['title']."',
						'".$_REQUEST['detail']."',
						'".$DateTime."' "; 
							
		$id = 'id_solution';
// Update -------------------------------------------------------------------------------------//
		$strCommand = "  
		`type_id` = '".$_REQUEST['type_id']."',
		`title` = '".$_REQUEST['title']."',
		`detail` = '".$_REQUEST['detail']."',
		`date` = '".$DateTime."' ";
								
		$strCondition = "$id ='".$_REQUEST['ID']."'";
 
// Delelte -------------------------------------------------------------------------------------//
		$strCondition = "$id ='".$_REQUEST['ID']."'";
		$page_Insert = "main.php?page=solution-detail&ID=".$_REQUEST['ID']."";
		$page_Update = "main.php?page=solution-list";
		$page_Delelte = "main.php?page=solution-list"; 
		
		$msg_Insert = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		$msg_Update = 'บันทึกข้อมูลเรียบร้อยแล้ว';
// Start switch case  ==================================================//
	switch($Sql){
		// ----------------------------------------------------------------------------------------//
		case 'Insert': 
		// ----------------------------------------------------------------------------------------//

		//เพิ่มข้อมูลลงในตาราง 
		$sql_Insert = mysqli_query($con,"INSERT INTO ".$Table." ($strField) VALUES ($strValue) ");
		if($sql_Insert){
			$list_id = mysqli_insert_id($con);
			$pageInsert = "main.php?page=solution-detail&ID=".$list_id."";	
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
		
			exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='".$page_Update."';</script>");	
			}else{
			exit("<script>alert('บันทึกข้อมูลไม่ได้!');(history.back());</script>");
			}	
 
		break;

		// ----------------------------------------------------------------------------------------//
		default:
		// ----------------------------------------------------------------------------------------//
		}		

// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//

	}else{ 
		// Field Table
 
	$ID = $rs['id_solution'];
	$id_solution= $rs['id_solution'];
	$type_id = $rs['type_id'];
	$title = $rs['title'];
	$name = $rs['title'];
	$detail = $rs['detail'];
	$date = $rs['date'];
	
	$sqltype = mysqli_query($con,"Select * From equipment_type Where id_equipment_type='".$type_id."'");
 		$rs = mysqli_fetch_array($sqltype);
		$type_name = $rs['name'];

		} // End SQL
	
 ?>