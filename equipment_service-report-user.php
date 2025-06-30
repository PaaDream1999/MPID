
<div id="box-list">		
<h2 id="title-list">ครุภัณฑ์ที่ให้บริการ </h2> 
<?php  
$TitleKeyword = $_POST['keyword'];
  if(!empty($TitleKeyword)){
		if(is_numeric($TitleKeyword) ) { 
				$keyword = number_format($TitleKeyword); //ทำให้เป็นตัวเลขจำนวนเต็ม
			} else { 
				$keyword = trim($TitleKeyword); //ตัดซ่องวางของสตริง
			}
	echo "<div style='border-bottom: 1px solid #ddd; padding:5px;'><b> -  คำค้นหา : </b>  ".$TitleKeyword."</div>";
	$q="SELECT * FROM $tableSql WHERE(equipment_code LIKE '%".$keyword."%') and user_id='".$_SESSION['sess_mb_id']."' ORDER BY id_$tableSql Desc";  
	}else{

$q="SELECT * FROM $tableSql Where user_id='".$_SESSION['sess_mb_id']."' ORDER BY id_$tableSql Desc";  

}
 
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
 
</div>