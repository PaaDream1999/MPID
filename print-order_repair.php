<?php  
include "session-start.php";

if(!empty($_REQUEST['stt'])){
			$stt = $_GET['stt'];
		  	$showStatus = "Where(date(date) BETWEEN '".$_GET['Date1']."' AND '".$_GET['Date2']."') and status in('$stt')";
			
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
	 	$showStatus = "Where(date(date) BETWEEN '".$_GET['Date1']."' AND '".$_GET['Date2']."') and status in('1', '2', '3', '4')";
	}


?>
<?php
$img_status="
		[ <img src=\"images/bubble_16.png\" /> รอตอบรับ ] 
		[ <img src=\"images/statistics_16.png\" /> กำลังดำเนินการ   ] 
		[ <img src=\"images/clock_16.png\" /> เสร็จ  ] 
		[ <img src=\"images/noting_16.png\" /> ซ่อมไม่ได้  ] 
		[ <img src=\"images/tick_16.png\" />  จัดส่งครุภัณฑ์ ] 
		";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รายงาน</title>
<link rel="stylesheet" type="text/css" href="css/template-js-off.css" />
<link rel="stylesheet" type="text/css" href="css/template.css" />
<link rel="stylesheet" type="text/css" href="css/css-menu.css" />
 <style type="text/css">
 body{
  margin: 0;
  width: 100%;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 15px;
  line-height: 20px;
  color: #333333;
  background:none;

	}
 </style>
</head>
<body onload="window.print(); window.location='main.php?page=order_repair-list-report&stt=<?=$_GET['stt']?>';">
<!--
 <body> 
<body onload="window.print(); window.location='main.php?page=order_repair-list-report';">
 -->
<div style="width:850px; margin: 20px auto 20px auto; ">
<?php //  include "inc-menu-report.php"; ?>
<div id="box-list">
	
<h2 id="title-list" style="text-align:center; margin-bottom: 20px; padding: 20px 0px 20px 0px;"><?=$titlepage?></h2> 
<?php  
 	$tableSql = "order_repair";
	$q="SELECT * FROM $tableSql  $showStatus  ORDER BY id_$tableSql Desc";  

$qr=mysqli_query($con,$q);  
$total=mysqli_num_rows($qr);  
$e_page=20; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า     

if(!isset($_GET['s_page'])){     
    	$_GET['s_page']=0;     
		
		}else{     
    		$chk_page=$_GET['s_page'];       
 			   $_GET['s_page']=$_GET['s_page']*$e_page;     
		}  
			   
	$q.=" LIMIT ".$_GET['s_page'].",$e_page";  
	$qr=mysqli_query($con,$q);
	  
	if(mysqli_num_rows($qr)>=1){     
    $plus_p=($chk_page*$e_page)+mysqli_num_rows($qr);     
		}else{     
    $plus_p=($chk_page*$e_page);         //$plus_p มีค่าอยู่ที่ 100
	}    
	 
$total_p=ceil($total/$e_page);     
$before_p=($chk_page*$e_page)+1;    //$before_p มีค่าอยู่ที่ 50
?>
<?php  //	ถ้าไม่มีข้อมูล
		if($total==0){
			echo "<div style='padding-top: 20px; color: red;'><h1>ไม่มีข้อมูล</h1></div>";
				}else{
		?>
	<div style="border-bottom: 3px solid #ddd; padding: 5px;">

	<strong>รายงานวันที่</strong> <?=fcDate($_GET['Date1'])?> <strong>ถึง</strong> <?=fcDate($_GET['Date2'])?> 
	<div style="text-align:right; padding:5px; font-size: 12px;"><?=$img_status?></div>
    </div>
	  <table id="table-hover" width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-condensed  table-bordered" style="font-size: 12px;">
        <tr>
          <td id="f-center" width="3%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>No.</strong></td>
          <td id="f-center" width="15%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ผู้แจ้ง</strong></td>
          <td id="f-center" width="10%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>หน่วยงาน</strong></td>
          <td id="f-center" width="13%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>วันที่แจ้ง</strong></td>
          <td id="f-center" width="11%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>อุปกรณ์</strong></td>
          <td width="18%" align="center" valign="middle" bgcolor="#F4F4F4" id="f-center"><strong>อาการเสีย</strong></td>
          <td id="f-center" width="5%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>สถานะ</strong></td>
          <td align="center" valign="middle" bgcolor="#F4F4F4" id="f-center"><strong>สรุปงานซ่อม</strong> </td>
        </tr>
		
 <?
	}							
  $no = $before_p; // ใช้ตัวนี้เป็นตัวแสดงลำดับ
  $i=0;

while($rs=mysqli_fetch_array($qr)){  
$i;
include "table-sql/tb-$tableSql.php"; 
?>
		
         <tr class="list-hover">
          <td id="f-center" width="3%" align="center" valign="middle"><b><?=$no?></b></td>
          <td id="f-left" align="left" valign="middle">
          <?=$mb_name?>         </td>
          <td id="f-left" valign="middle"><?=$mb_affiliation?></td>
          <td align="center" valign="middle"><?=fcDate($ord_date)?></td>
          <td align="center" valign="middle"><?=$model_equipment?></td>
          <td  align="center" valign="middle" ><?=$malfunction?></td>
          <td id="f-center"  align="center" valign="middle" ><?=$status?></td>
          <td width="21%"  align="center" valign="middle" id="f-left" ><?=$note?></td>
        </tr>
         
		<?PHP $no++; $i++?>
            <?php } ?>
  </table>
  

<?php if($total > $e_page){ ?>
<div class="browse_page">
<?php     
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า     
  page_navigator($before_p,$plus_p,$total,$total_p,$chk_page);       
?>
</div>
<?php } ?>

 <br /> <br />
</div>
<p>&nbsp;</p>
 
</div>
</body>
</html>
