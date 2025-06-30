<?php
 

			$DBname = "db_project";	// ชื่อ ฐานข้อมูล " 
			$con= mysqli_connect( 'localhost','root','12345678',$DBname) or die ("ติดต่อ Mysql  ไม่ได้ อาจจะเป็นที่รหัสผู้ใช้ไม่ถูกต้อง สามารถแก้ไขรหัสได้ที่ไฟล์ connect.php นะ"); // ติดต่อ My SQL
			@mysqli_query($con,"SET NAMES UTF8");
 	
	//ชื่อตารางทั้งหมดมีดังนี้ 
			$admin ="admin";  
			$equipment_model ="equipment_model";  
 			$equipment_service = "equipment_service";
			$equipment_type ="equipment_type";  
			$lab ="lab";  
			$location ="location";  
			$member ="member"; 
			$order_repair ="order_repair"; 
			$order_repair_detail = "order_repair_detail";  
			$province = "province"; 
			$solution = "solution"; 
			
?>