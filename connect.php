<?php
 

			$DBname = "db_project";	// ���� �ҹ������ " 
			$con= mysqli_connect( 'localhost','root','12345678',$DBname) or die ("�Դ��� Mysql  ����� �Ҩ���繷�����ʼ�������١��ͧ ����ö�������������� connect.php ��"); // �Դ��� My SQL
			@mysqli_query($con,"SET NAMES UTF8");
 	
	//���͵��ҧ�������մѧ��� 
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