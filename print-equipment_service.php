<?php  
include "session-start.php";
 
		$titlepage = "ครุภัณฑ์ที่ให้บริการ";
	 	$showStatus = "Where(date(date) BETWEEN '".$_GET['Date1']."' AND '".$_GET['Date2']."')";
 


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
<body onload="window.print(); window.location='main.php?page=equipment_service-list-report';">
<!--
 <body> 
<body onload="window.print(); window.location='main.php?page=order_repair-list-report';">
 -->
<div style="width:850px; margin: 20px auto 20px auto; ">
<?php //  include "inc-menu-report.php"; ?>
<div id="box-list">
	
<h2 id="title-list" style="text-align:center; margin-bottom: 20px; padding: 20px 0px 20px 0px;"><?=$titlepage?></h2> 
<?php  
 	$tableSql = "equipment_service";
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
	 </div>
	  <table id="table-hover" width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-condensed  table-bordered" style="font-size: 12px;">
        <tr>
          <td id="f-center" width="6%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ลำดับ</strong></td>
          <td id="f-center" width="9%" align="center" valign="middle" bgcolor="#F4F4F4"><strong> เลขครุภัณฑ์</strong></td>
          <td id="f-center" width="20%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ข้อมูลครุภัณฑ์</strong></td>
          <td id="f-center" width="17%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ผู้ใช้ครุภัณฑ์</strong></td>
          <td id="f-center" width="22%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>สถานที่</strong></td>
          <td id="f-center" width="11%" align="center" valign="middle" bgcolor="#F4F4F4"><strong>ห้อง</strong></td>
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
          <td id="f-center" width="6%" align="center" valign="middle"><b><?=$no?></b></td>
          <td id="f-center" align="left" valign="middle"><a href="main.php?page=<?=$pageUrl?>-detail&amp;ID=<?=$ID?>">
          <?=$equipment_code?> 
          </a></td>
          <td id="f-left" valign="middle"><?=$model_equipment?></td>
          <td align="center" valign="middle"><?=$mb_name?></td>
          <td align="center" valign="middle"><?=$location_name?></td>
          <td  align="center" valign="middle" ><?=$lab_name?></td>
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
