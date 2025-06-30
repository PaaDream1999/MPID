<?php	
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
$Date = date("Y-m-d");
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
$strField = " 
`id_order_repair` ,
`service_id` ,
`member_id` ,
`admin_id` ,
`code` ,
`malfunction` ,
`price` ,
`note` ,
`total` ,
`status` ,
`date` ";
 
 
if($Sql=="Insert"){

	 if(empty($_REQUEST['detail'])){
	 exit("<script>alert('กรุณากรอกข้อมูลอาการเสียหรือปัญหาของครุภัณฑ์ด้วยนะ !');(history.back());</script>");
	 
	 }

}			
	
			
								
	$status  = "1";	
	$note = eregi_replace(chr(13), "<br>", $_POST['note']);
	$malfunction = eregi_replace(chr(13), "<br>", $_POST['detail']);
	$price = "";
	$admin_id = "";
	$total=0;
// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$_REQUEST['service_id']."', 
						'".$_REQUEST['member_id']."', 
						'".$admin_id."', 
						'".$_REQUEST['code']."', 
						'".$malfunction."',
						'".$price."', 
						'".$note."', 
						'".$total."', 
						'".$status."', 
						'".$DateTime."' "; 
							
$id = 'id_order_repair';
if(!empty($_SESSION['sess_adm_id'])){

	// Update -------------------------------------------------------------------------------------//
		$strCommand = "
								`malfunction` = '".$malfunction."', 
								`price` = '".$_REQUEST['price']."', 
								`note` = '".$note."' ";
} 						

// Delelte Update -------------------------------------------------------------------------------------//
		$strCondition =  " $id='".$_REQUEST['ID']."' ";
 			
			$page = "order_repair";
			if(!empty($_SESSION['sess_adm_id'])){
				$pageUpdate = "main.php?page=$page-detail&ID=".$_REQUEST['ID']."";
				$page_Delelte = "main.php?page=$page-list";
				}else{
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
		case 'Detete':
		// ----------------------------------------------------------------------------------------//
		exit();
		$sql_Update = mysqli_query($con,"Update ".$Table." Set  $strCommand Where $strCondition ");
		if($sql_Update){
			exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='".$pageUpdate."';</script>");	
			}else{
			exit("<script>alert('บันทึกข้อมูลไม่ได้!');(history.back());</script>");
			}	
 
		break;
		
		// ----------------------------------------------------------------------------------------//
		case 'Follow':
		// ----------------------------------------------------------------------------------------//
		$sql_Update = mysqli_query($con,"Update ".$Table." Set  admin_id='".$_REQUEST['admin_id']."', status='2' Where $strCondition ");
		if($sql_Update){
			exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='main.php?page=$page-detail&ID=".$_REQUEST['ID']."';</script>");	
			}else{
			exit("<script>alert('บันทึกข้อมูลไม่ได้!');(history.back());</script>");
			}	
 
		break;
		
		// ----------------------------------------------------------------------------------------//
		case 'Rate':
		// ----------------------------------------------------------------------------------------//
		$sql_Update = mysqli_query($con,"Update ".$Table." Set  price='".number_format($_REQUEST['price'])."', note='".$note."' Where $strCondition ");
		if($sql_Update){
			exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='main.php?page=$page-detail&ID=".$_REQUEST['ID']."';</script>");	
			}else{
			exit("<script>alert('บันทึกข้อมูลไม่ได้!');(history.back());</script>");
			}	
 
		break;
		
		// ----------------------------------------------------------------------------------------//
		case 'successfully':
		// ----------------------------------------------------------------------------------------//
		
			$sql_Update = mysqli_query($con,"Update ".$Table." Set status='3' Where $strCondition ");
			if($sql_Update){
					
					// Field  --------------------------------------------------------------------------------------//
			$strField = " 
			`id_order_repair_detail` ,
			`order_repair_id` ,
			`emp_id` ,
			`malfunction` ,
			`detail` ,
			`total` ,
			`date` ";

			 if(empty($_REQUEST['detail'])){
				 exit("<script>alert('กรุณากรอกข้อมูลรายละเอียดการซ่อมครุภัณฑ์ด้วยนะ !');(history.back());</script>");
				 
				 }
									
 
			// Insert  --------------------------------------------------------------------------------------//					
				$strValue = " '0', 
									'".$_REQUEST['ID']."', 
									'".$_REQUEST['emp_id']."', 
									'".$_REQUEST['malfunction']."',
									'".$_POST['detail']."',
									'".$_REQUEST['total']."', 
									'".$DateTime."' "; 
					
						@mysqli_query($con,"INSERT INTO order_repair_detail ($strField) VALUES ($strValue) "); 
						@mysqli_query($con,"Update order_repair Set  total='".$_REQUEST['total']."', note='".$_POST['detail']."' Where id_order_repair='".$_REQUEST['ID']."' "); 
						exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='main.php?page=$page-detail&ID=".$_REQUEST['ID']."&show=2#1';</script>");	
						}else{
						exit("<script>alert('บันทึกข้อมูลไม่ได้!');(history.back());</script>");
						}	
			 
		break;
		
	// ----------------------------------------------------------------------------------------//
		case 'Shipping':
		// ----------------------------------------------------------------------------------------//
		$sql_Update = mysqli_query($con,"Update ".$Table." Set  status='4' Where $strCondition ");
		if($sql_Update){
			exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='main.php?page=$page-detail&ID=".$_REQUEST['ID']."&show=2#1';</script>");	
			}else{
			exit("<script>alert('บันทึกข้อมูลไม่ได้!');(history.back());</script>");
			}	
 
		break;
		
	// ----------------------------------------------------------------------------------------//
		case 'Not':
		// ----------------------------------------------------------------------------------------//
		$sql_Update = mysqli_query($con,"Update ".$Table." Set  status='5' Where $strCondition ");
		if($sql_Update){
			exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='main.php?page=$page-detail&ID=".$_REQUEST['ID']."&show=2#1';</script>");	
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
		$ID = $rs['id_order_repair'];
		
		
	 	$id_equipment_service = $ID;
		$order_number = sprintf("%05d",$ID);
		$service_id = $rs['service_id'];
		$emp_id = $rs['admin_id'];
		$member_id = $rs['member_id'];
		$code = $rs['code'];
		$malfunction = $rs['malfunction'];
		$price = $rs['price'];
		$note = $rs['note'];
		$ord_total = $rs['total'];
		$status = $rs['status'];
		$ord_date=$date = $rs['date'];
		
		if($price<=0){
			$price = "-";
			}else{
			$price = number_format($price,2);
			}
		
$img_status="
		<img src=\"images/bubble_16.png\" /> รอตอบรับ
		<img src=\"images/statistics_16.png\" /> กำลังดำเนินการ  
		<img src=\"images/clock_16.png\" /> เสร็จ 
		<img src=\"images/noting_16.png\" /> ซ่อมไม่ได้ 
		<img src=\"images/tick_16.png\" /> รับ/จัดส่ง
		";
		
 		switch($status){
			case '1':
				$status = "<span id='red'><img src=\"images/bubble_16.png\" /> </span>"; // รอตอบรับ
				
			break;
			case '2':
				$status = "<span id='green'><img src=\"images/statistics_16.png\" /></span>"; // กำลังดำเนินการ
				
			break;
			case '3':
				$status = "<span id='blue'><img src=\"images/clock_16.png\" /></span>"; // เสร็จ
				
			break;
			case '4':
			
				if(!empty($_SESSION['sess_adm_id'])){
					$status = "<span id='pink'><img src=\"images/tick_16.png\" /></span>";  // รับ/จัดส่ง
					}else{
					$status = "<span id='pink'><img src=\"images/tick_16.png\" /></span>"; // รับ/จัดส่ง
					} 
			break;
			case '5':
				$status = "<span id='blue'><img src=\"images/noting_16.png\" /></span>"; // เสร็จ
				
			break;
		
		}
 
		if($emp_id==0){
			   $emp_name2 = "<span id='blue'>รอช่าง</span>";
			}else{
			$sqlAdmin = mysqli_query($con,"Select * From member Where mb_id='".$emp_id."'");
				$rs = mysqli_fetch_array($sqlAdmin);
				$emp_tel = $rs['mb_tel'];
			 	$emp_name2 = "<b id='blue'>".$rs['mb_name']."</b> (<span id=''>".$emp_tel."</span>)";
				}
  
		 
		$sqlOrderDetail = mysqli_query($con,"Select * From order_repair_detail Where order_repair_id='".$_GET['ID']."'");
		$num_ordes = mysqli_num_rows($sqlOrderDetail);
		// echo $num_ordes;
		 if($num_ordes<=0){
		  	$sqlOrderDetail = mysqli_query($con,"Select * From order_repair_detail  Where order_repair_id='".$service_id."' Order by order_repair_id Desc");
			$num_order2 = mysqli_num_rows($sqlOrderDetail);
			 } 
		 
 		$rs = mysqli_fetch_array($sqlOrderDetail);
		$orders_emp_id = $rs['emp_id'];
		$orders_malfunction = $rs['malfunction'];
		$orders_detail = $rs['detail'];
		$ordd_total=$orders_total = $rs['total'];  
		$orders_date = $rs['date'];
		
		
		$sqlEmp = mysqli_query($con,"Select * From member Where mb_id='".$orders_emp_id."'");
 		$rs = mysqli_fetch_array($sqlEmp);
		$emp_name = $rs['mb_name'];

		
		 		
				
		
		
		$sqlService = mysqli_query($con,"Select * From equipment_service Where id_equipment_service='".$service_id."'");
 		$rs = mysqli_fetch_array($sqlService);
		$type_id = $rs['type_id'];
		$model_equipment = $rs['name'];
		$model_id = $rs['model_id'];
		 $lab_id = $rs['lab_id'];
		
		
		$sqlMember = mysqli_query($con,"Select * From member Where mb_id='".$member_id."'");
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