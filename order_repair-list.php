<?php
$img_status="
		[ <img src=\"images/bubble_16.png\" /> รอตอบรับ ] 
		[ <img src=\"images/statistics_16.png\" /> กำลังดำเนินการ   ] 
		[ <img src=\"images/clock_16.png\" /> เสร็จ  ] 
		[ <img src=\"images/noting_16.png\" /> ซ่อมไม่ได้  ] 
		[ <img src=\"images/tick_16.png\" />  จัดส่งครุภัณฑ์ ] 
		";

?>

<div id="frm-search">
		<form method="post" name="form1" action="<?=$_SERVER['PHP_SELF']?>?page=<?=$_GET['page']?>" style="padding:0px; margin:0px;">
  <div class="input-append">
    <input type="text" id="txt" name="keyword" style="width:35%;">
    <button type="submit" class="btn">ค้นหา</button> 
	<?php if(!empty($_SESSION['sess_adm_id'])){ ?>
	<!-- <button type="button" class="btn" onclick="parent.location='main.php?page=<?=$tableSql?>-add'">เพิ่มข้อมูลใหม่</button> -->
	<?php } ?>
	
	<button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
  </div>
</form>
</div>
	  
	  
<?php


	
	if(!empty($_REQUEST['stt'])){
			$stt = $_GET['stt'];
		  	$showStatus = " status in('$stt')";
			
		switch($_REQUEST['stt']){
			case '1':
				$titlepage = "รายการแจ้งซ่อม<span id='red'>รอดำเนินการ</span>";
			break;
			case '2':
				$titlepage = "รายการแจ้งซ่อม<span id='green'>กำลังดำเนินการ</span>";
			break;
			case '3':
				$titlepage = "รายการแจ้งซ่อม<span id='blue'>ดำเนินการเรียบร้อย</span>";
			break;
			case '4':
				if(!empty($_SESSION['sess_adm_id'])){
					$titlepage = "รายการแจ้งซ่อม<span id='pink'>จัดส่งแล้ว</span>";
					}else{
					$titlepage = "รายการแจ้งซ่อม<span id='pink'>รับครุภัณฑ์แล้ว</span>";
					}
				
			break;
			
		}
		
	}else{
		$titlepage = "รายการแจ้งซ่อม";
	 	$showStatus = " status in('1', '2', '3', '4')";
	}
	 
	  
	  	if(!empty($_SESSION['sess_adm_id'])){
		include "$pageUrl-report.php";
		}else{
			if($_SESSION['sess_mb_menu']==1){
			include "$pageUrl-report.php";
			}else{
			include "$pageUrl-report-user.php";
			}
		}
	   
	   
	    ?>  